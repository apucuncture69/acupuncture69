<?php

/* Classe récupérant les méridiens depuis la base de données
   Auteur : Robin */

class MeridiensManager
{
	private $_db;		// PDO Object
	private $_baseSelectQuery;
	
	/* Constructeur */
	public function __construct($_db)
	{
		$this->_db = $_db;
		$this->_baseSelectQuery = "SELECT meridien.nom as 'nom', meridien.element as 'element', meridien.yin as 'yin'
					   FROM patho
					   INNER JOIN meridien ON patho.mer = meridien.code 
				   	  ";
	}

	/* Récupération d'objets de type acu.Meridien */

	/* Renvoie le méridien associé à la pathologie d'ID $idP
	   @param $idP : String
	   @return acu.Meridien			*/
	public function getByPatho($idP)
	{
		$q = $this->_db->query($this->_baseSelectQuery.' WHERE patho.idP = '.$idP);

		$ligne = $q->fetch(PDO::FETCH_ASSOC);

		return $this->_getMeridienFromLine($ligne);
	}

	private function _getMeridienFromLine($ligne)
	{	
		$nom = $ligne['nom'];
		$element = $ligne ['element'];
		$yin = $ligne['yin'];

		$hydrateMap = array('Nom'=>$nom,'Element'=>$element,'Yin'=>$yin);

		return new Meridien($hydrateMap);
	}
}

	
