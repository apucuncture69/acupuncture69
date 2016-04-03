<?php

/* Classe récupérant les clés des utilisateurs depuis la base de données
   Auteur : Robin */

class UserKeysManager
{
	private $_db;		// PDO Object
	private $_baseSelectQuery;
	
	/* Constructeur */
	public function __construct($_db)
	{
		$this->_db = $_db;
		$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->_baseSelectQuery = "SELECT userKeys.name as 'key', userKeys.value as 'value'
					   FROM userKeys
				   	  ";

		$this->_orderByClause = 'order by userKeys.name';
	}

	/* Récupération de paires clé/valeur */

	/* Renvoie la liste des clés associées à l'utilisateur ayant pour email $email
	   @param $email : String
	   @return Map<String,String>	
		   Tableau associant le nom d'une clé à sa valeur			*/
	public function getMapByUser($email)
	{
		$q = $this->_db->query($this->_baseSelectQuery." WHERE userKeys.user_email = '".$email."' ".$this->_orderByClause);

		$donnees = $q->fetchAll(PDO::FETCH_ASSOC);

		$list = array();

		foreach ($donnees as $ligne)
		{
			$key = $ligne['key'];
			$value = $ligne['value'];
			
			$list[$key] = $value;
		}

		return $list;
	}
	
	/* Insère ou met à jour les clés avec les nouvelles valeurs pour l'utilisateur $user et supprime éventuellement les clés retirées de la map 
	   @throws PDOException
	   @param $user : user.User															*/
	public function addOrUpdateOrDeleteKeys($user)
	{
		$q_sel = $this->_db->query("SELECT name,value
				    	    FROM userKeys
				    	    WHERE user_email = '".$user->getEmail()."'");
		
		$donnees = $q_sel->fetchAll(PDO::FETCH_ASSOC);

		$keys = $user->getKeys();

		$key_db = array();

		foreach ($donnees as $ligne)
		{
			$name = $ligne['name'];
			$value = $ligne['value'];			
			
			if (isset($keys[$name]))
			{
				$key_db[$name] = TRUE;
				if ($value !== $keys[$name])
				{
					$q_upd = $this->_db->prepare("UPDATE userKeys SET value = :value WHERE name = :name AND user_email = :user_email");

					$q_upd->bindValue(':name', $name, PDO::PARAM_STR);
					$q_upd->bindValue(':value',$keys[$name], PDO::PARAM_STR);
					$q_upd->bindValue(':user_email',$user->getEmail(),PDO::PARAM_STR);
		
					$q_upd->execute();
				}
			}
			else 
			{
				$this->_db->exec("DELETE FROM userKeys WHERE user_email = '".$user->getEmail()."' AND name = '".$name."'");
			}
		}
		
		foreach ($keys as $name=>$value)
		{
			if (!isset($key_db[$name]))
			{
				$q_ins = $this->_db->prepare("INSERT INTO userKeys VALUES(NULL,:name,:value,:user_email)");
			
				$q_ins->bindValue(':name', $name, PDO::PARAM_STR);
				$q_ins->bindValue(':value',$value, PDO::PARAM_STR);
				$q_ins->bindValue(':user_email',$user->getEmail(),PDO::PARAM_STR);
			
				$q_ins->execute();
			}
		}
	}

	/* Supprime toutes les clés associées à un utilisateur 
	   @throws PDOException
	   @param $user : user.User						*/
	public function deleteUserKeys($user)
	{
		$this->_db->exec("DELETE FROM userKeys WHERE user_email = '".$user->getEmail()."'");
	}
}

	
