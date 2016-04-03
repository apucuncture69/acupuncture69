<?php

/* Classe récupérant les symptômes depuis la base de données
   Auteur : Robin */

require_once ('model/acu/Symptome.php');
require_once ('model/manager/KeywordsManager.php');

class SymptomesManager
{
	private $_db;		// PDO Object
	private $_baseSelectQuery;
	
	/* Constructeur */
	public function __construct($_db)
	{
		$this->_db = $_db;
		$this->_baseSelectQuery = "SELECT symptome.idS as 'idS', symptome.desc as 'desc', symptPatho.aggr as 'aggr'
					   FROM patho
					   LEFT JOIN symptPatho ON symptPatho.idP = patho.idP
					   LEFT JOIN symptome ON symptome.idS = symptPatho.idS
				   	  ";

		$this->_orderByClause = 'order by symptPatho.aggr, symptome.desc';
	}

	/* Récupération d'objets de type acu.Symptome */

	/* Renvoie la liste des symptômes associé à la pathologie d'ID $idP
	   @throws PDOException
	   @param $idP : String
	   @return List<acu.Symptome>			*/
	public function getListByPatho($idP)
	{
		$q = $this->_db->query($this->_baseSelectQuery.' WHERE patho.idP = '.$idP.' '.$this->_orderByClause);

		$donnees = $q->fetchAll(PDO::FETCH_ASSOC);

		foreach ($donnees as $ligne)
		{
			$list[] = $this->_getSymptomeFromLine($ligne);
		}

		return $list;
	}

	private function _getSymptomeFromLine($ligne)
	{	
		$idS = $ligne['idS'];
		$desc = $ligne['desc'];
		$aggr = $ligne['aggr'];

		$keywordsManager = new KeywordsManager($this->_db);
		
		$keywords = $keywordsManager->getListBySymptome($idS);

		$hydrateMap = array('Description'=>$desc,'MotsCles'=>$keywords,'Aggr'=>$aggr);

		return new Symptome($hydrateMap);
	}
}

	
