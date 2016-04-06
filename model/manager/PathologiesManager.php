<?php

/* Classe récupérant les pathologies depuis la base de données
   Auteur : Robin */

require_once('model/acu/Pathologie.php');
require_once('model/manager/MeridiensManager.php');
require_once('model/manager/SymptomesManager.php');

class PathologiesManager
{
	private $_db;		// PDO Object
	private $_baseSelectQuery;
	private $_orderByClause;
	private $_subQuery;
	
	/* Constructeur */
	public function __construct($_db)
	{
		$this->_db = $_db;
		$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$this->_baseSelectQuery = "SELECT patho.idP as 'idP', patho.type as 'type', patho.desc as 'desc', meridien.code as 'code'
					   FROM patho
					   LEFT JOIN meridien ON meridien.code = patho.mer
				   	  ";

		$this->_subQuery = 'SELECT patho.idP
				    FROM patho
				    LEFT JOIN symptPatho ON symptPatho.idP = patho.idP
				    LEFT JOIN symptome ON symptome.idS = symptPatho.idS
				    LEFT JOIN keySympt ON keySympt.idS = symptome.idS
				    LEFT JOIN keywords ON keywords.idK = keySympt.idK
				   ';

		$this->_orderByClause = 'order by patho.type, patho.desc, meridien.yin, meridien.element, meridien.nom';
	}

	/* Récupération d'objets de type acu.Pathologie */
	
	/* Renvoie la pathologie d'ID $idP
	   @throws PDOException
	   @param $idP : String
	   @return acu.Pathologie		*/
	public function get($idP)
	{
		$q = $this->_db->query($this->_baseSelectQuery.' WHERE patho.idP = '.$idP);

		$ligne = $q->fetch(PDO::FETCH_ASSOC);

		return $this->_getPathoFromLine($ligne);
	}

	/* Renvoie la liste de toutes les pathologies
	   @throws PDOException
	   @return List<acu.Pathologie>			*/
	public function getList()
	{
		$q = $this->_db->query($this->_baseSelectQuery.''.$this->_orderByClause);

		$donnees = $q->fetchAll(PDO::FETCH_ASSOC);

		$list = array();		

		foreach ($donnees as $ligne)
		{
			$list[] = $this->_getPathoFromLine($ligne);
		}

		return $list;
	}
	
	/* Renvoie la liste des valeurs distinctes d'un des critères utilisés pour la fonction "find"
	   @throws PDOException
	   @param $criteria : String
	   	Valeurs possibles : 'meridien' (nom du méridien), 'type' (type de pathologie), 'desc' (description de la pathologie), 'keyword' (mot-clé associé à un symptôme de la pathologie)
	   @return List<String>
	*/
	public function getValuesOfCriteria($criteria)
	{
		if ($criteria == 'meridien')
		{
			$table = 'meridien';
			$field = 'nom';
		}
		else if ($criteria == 'type')
		{
			$table = 'patho';
			$field = 'type';
		}
		else if ($criteria == 'desc')
		{
			$table = 'patho';
			$field = 'desc';
		}
		else if ($criteria == 'keyword')
		{
			$table = 'keywords';
			$field = 'name';
		}
		else
		{
			return NULL;
		}
		
		$q = $this->_db->query("SELECT DISTINCT `$field` FROM `$table` ORDER BY `$field`");
		
		$donnees = $q->fetchAll(PDO::FETCH_NUM);

		$list = array();

		foreach ($donnees as $ligne)
		{
			$list[] = $ligne[0];
		}

		return $list;
	}

	/* Renvoie la liste des pathologies répondant aux critères définis
	   @throws PDOException
 	   @param $criteriaMap : Map<String,String> (ou Map<String,List<String>)
		  Liste de critères de recherche sous forme de paire clé/valeur
		  - clé : 'meridien' (nom du méridien), 'type' (type de pathologie), 'desc' (description de la pathologie), 'keyword' (mot-clé associé à un symptôme de la pathologie)
		  - valeur : Valeur recherchée, utilisable avec la syntaxe de l'opérateur 'LIKE' en SQL (ex: $criteriaMap['desc'] = '%luo%' renverra toutes les pathologies contenant le mot 'luo' dans leur description)
		  Les différents critères se combinent avec l'opérateur logique ET.
		  Il est possible d'affecter un tableau de valeurs à un des critères. Dans ce cas, les valeurs définies dans ce tableau se combinent avec l'opérateur logique OU et sont prioritaires sur le ET.
		 Ex: $criteriaMap['meridien'] = array('poumon','ren mai');
		     $criteriaMap['desc'] = '%luo%';
		     Renvoie les pathologies dont le méridien est 'poumon' OU 'ren mai' ET qui contiennent le mot 'luo' dans leur description
		 Si $criteriaMap est vide, getList() sera appelée
	   @return List<acu.Pathologie>  	  
	*/
	public function find($criteriaMap)
	{
		$whereClause = 'WHERE ';

		$mapping['meridien'] = 'meridien.nom';
		$mapping['type'] = 'patho.type';
		$mapping['desc'] = 'patho.desc';
		$mapping['keyword'] = 'keywords.name';

		$list = array();

		$i = 0;

		foreach ($criteriaMap as $key => $value)
		{
			$whereClause.= $this->_getSQLFromCriteria($mapping[$key],$value);
			if ($i<count($criteriaMap)-1)
			{
				$whereClause.= ' AND ';
			}
			$i++;
		}

		if ($i != 0)
		{
			if (isset ($criteriaMap['keyword']))
			{
				$query = $this->_baseSelectQuery.' WHERE patho.idP IN ('.$this->_subQuery.' '.$whereClause.') '.$this->_orderByClause;	
			}
			else
			{
				$query = $this->_baseSelectQuery.' '.$whereClause.' '.$this->_orderByClause;
			}

			$q = $this->_db->query($query);

			$donnees = $q->fetchAll(PDO::FETCH_ASSOC);

			foreach ($donnees as $ligne)
			{
				$list[] = $this->_getPathoFromLine($ligne);
			}
		}
		else
		{
			$list = $this->getList();
		}

		return $list;
	}

	private function _getPathoFromLine($ligne)
	{
		$type = $ligne['type'];
		$desc = $ligne['desc'];

		$idP = $ligne['idP'];

		$meridiensManager = new MeridiensManager($this->_db);
		$symptomesManager = new SymptomesManager($this->_db);

		$meridien = $meridiensManager->getByPatho($idP);
		$symptomes = $symptomesManager->getListByPatho($idP);
		
		$hydrateMap = array('Meridien'=>$meridien,'Type'=>$type,'Description'=>$desc,'Symptomes'=>$symptomes);

		return new Pathologie($hydrateMap);
	}

	private function _getSQLFromCriteria($sqlKey,$value)
	{
		$str = '(';
		if (is_array($value))
		{
			$i = 0;
			foreach ($value as $item)
			{
				$str.= "$sqlKey like '$item'";
				if ($i<count($value)-1)
				{
					$str.= ' OR ';
				}
				$i++;
			}
		}
		else 
		{
			$str .= "$sqlKey like '$value'";
		}	

		return $str.')';
	}
}

	
