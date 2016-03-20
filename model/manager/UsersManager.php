<?php

/* Classe récupérant, créant, modifiant ou supprimant des utilisateurs dans la base de données
   Auteur : Robin */

class UsersManager
{
	private $_db;		// PDO Object
	private $_baseSelectQuery;
	private $_orderByClause;
	
	/* Constructeur */
	public function __construct($_db)
	{
		$this->_db = $_db;
		$this->baseSelectQuery = 'SELECT email, hashpwd, firstname, lastname
				          FROM users
				   	 ';
		$this->orderByClause = 'order by users.lastname';
	}

	/* Récupération d'objets de type user.User depuis la base de données */
	
	/* Renvoie l'utilisateur ayant pour e-mail $email
	   @param $email : String
	   @return user.User		*/
	public function get($email)
	{
		$q = $this->_db->query($this->_baseSelectQuery.' WHERE email = '.$email);

		$ligne = $q->fetch(PDO::FETCH_ASSOC);

		return $this->_getUserFromLine($ligne);
	}

	/* Renvoie la liste de tous les utilisateurs
	   @return List<user.User>			*/
	public function getList()
	{
		$q = $this->_db->query($this->_baseSelectQuery.''.$this->_orderByClause);

		$donnees = $q->fetchAll(PDO::FETCH_ASSOC);

		$list = array();		

		foreach ($donnees as $ligne)
		{
			$list[] = $this->_getUserFromLine($ligne);
		}

		return $list;
	}

	/* Mise à jour des utilisateurs */
	
	/* @param $user : user.User */
	public function update($user)
	{
		$q = $this->_db->prepare('UPDATE users SET hashpwd = :hashpwd, firstname = :firstname, lastname = :lastname WHERE email = :email');

		$q->bindValue(':hashpwd', $user->getHashPwd(), PDO::PARAM_STR);
		$q->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
		$q->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);
	    	
		$q->execute();
	
		$userKeysManager = new UserKeysManager($this->_db);
		$userKeysManager->addOrUpdateorDeleteKeys($user);
	}

	/* Suppression des utilisateurs */

	/* @param $user : user.User */
	public function delete($user)
	{
		$this->_db->exec('DELETE FROM users WHERE email = '.$user->getEmail());

		$userKeysManager = new UserKeysManager($this->_db);
		$userKeysManager->deleteUserKeys($user);
	}

	/* Ajout d'un utilisateur */

	/* @param $user : user.User */
	public function add($user)
	{
		$q_ins = $this->_db->prepare("INSERT INTO users VALUES(:email,:hashpwd,:firstname,:lastname)");
			
		$q_ins->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);
		$q_ins->bindValue(':hashpwd', $user->getHashPwd(), PDO::PARAM_STR);
		$q_ins->bindValue(':firstname',$user->getFirstname(), PDO::PARAM_STR);
		$q_ins->bindValue(':lastname',$user->getLastname(),PDO::PARAM_STR);
	
		$q_ins->execute();	
		
		$userKeysManager = new UserKeysManager($this->_db);
		$userKeysManager->addOrUpdateorDeleteKeys($user);
	}

	private function _getUserFromLine($ligne)
	{
		$email = $ligne['email'];
		$hashpwd = $ligne['hashpwd'];
		$firstname = $ligne['firstname'];
		$lastname = $ligne['lastname'];
		
		$hydrateMap = array('Email'=>$email,'HashPwd'=>$type,'Firstname'=>$firstname,'Lastname'=>$lastname);

		$user = new User($hydrateMap);

		$userKeysManager = new UserKeysManager($this->_db);

		$keysList = $userKeysManager->getMapByUser($email);

		foreach ($keysList as $key=>$value)
		{
			$user->setKey($key,$value);
		}

		return $user;
	}
