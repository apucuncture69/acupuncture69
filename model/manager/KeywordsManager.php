<?php

/* Classe récupérant les mots-clés depuis la base de données
   Auteur : Robin */

class KeywordsManager
{
	private $_db;		// PDO Object
	private $_baseSelectQuery;
	
	/* Constructeur */
	public function __construct($_db)
	{
		$this->_db = $_db;
		$this->_baseSelectQuery = "SELECT keywords.name
					   FROM symptome
					   INNER JOIN keySympt ON keySympt.idS = symptome.idS
					   INNER JOIN keywords ON keywords.idK = keySympt.idK
				   	  ";

		$this->_orderByClause = 'order by keywords.name';
	}

	/* Récupération d'objets de type String */

	/* Renvoie la liste des mots-clés associés au symptôme d'ID $idS
	   @param $idS : String
	   @return List<String>			*/
	public function getListBySymptome($idS)
	{
		$q = $this->_db->query($this->_baseSelectQuery.' WHERE symptome.idS = '.$idS.' '.$this->_orderByClause);

		$donnees = $q->fetchAll(PDO::FETCH_NUM);

		$list = array();

		foreach ($donnees as $ligne)
		{
			$list[] = $ligne[0];
		}

		return $list;
	}
}

	
