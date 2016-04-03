<?php

/* Classe récupérant, créant, modifiant ou supprimant des utilisateurs dans la base de données
   Auteur : Robin */

require_once('model/user/User.php');
require_once('model/manager/UserKeysManager.php');

class UsersManager
{
	private $_db;		// PDO Object
	private $_baseSelectQuery;
	private $_orderByClause;
	
	/* Constructeur */
	public function __construct($_db)
	{
		$this->_db = $_db;
		$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->_baseSelectQuery = 'SELECT Email, Password, FirstName, LastName
				          FROM user
				   	 ';
		$this->_orderByClause = 'order by user.LastName';
	}

	/* Récupération d'objets de type user.User depuis la base de données */
	
	/* Renvoie l'utilisateur ayant pour e-mail $email
	   @throws PDOException
	   @param $email : String
	   @return user.User		*/
	public function get($email)
	{
		$q = $this->_db->query($this->_baseSelectQuery." WHERE Email = '".$email."'");

		$ligne = $q->fetch(PDO::FETCH_ASSOC);

		return $this->_getUserFromLine($ligne);
	}

	/* Renvoie la liste de tous les utilisateurs
	   @throws PDOException
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
	

	/*  @throws PDOException
	    @param $user : user.User */
	public function update($user)
	{
		$q = $this->_db->prepare('UPDATE user SET Password = :hashpwd, FirstName = :firstname, LastName = :lastname WHERE Email = :email');

		$q->bindValue(':hashpwd', $user->getHashPwd(), PDO::PARAM_STR);
		$q->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
		$q->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);
		$q->bindValue(':email',$user->getEmail(), PDO::PARAM_STR);
	    	
		$q->execute();
	
		$userKeysManager = new UserKeysManager($this->_db);
		$userKeysManager->addOrUpdateorDeleteKeys($user);
	}

	/* Suppression des utilisateurs */

	/*   @throws PDOException
	     @param $user : user.User */
	public function delete($user)
	{
		$userKeysManager = new UserKeysManager($this->_db);
		$userKeysManager->deleteUserKeys($user);
		$this->_db->exec("DELETE FROM user WHERE Email = '".$user->getEmail()."'");
	}

	/* Ajout d'un utilisateur */

	/*  @throws PDOException
	    @param $user : user.User */
	public function add($user)
	{
		$q_ins = $this->_db->prepare("INSERT INTO user VALUES(:email,:hashpwd,:firstname,:lastname)");
			
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
		$email = $ligne['Email'];
		$hashpwd = $ligne['Password'];
		$firstname = $ligne['FirstName'];
		$lastname = $ligne['LastName'];
		
		$hydrateMap = array('Email'=>$email,'HashPwd'=>$hashpwd,'FirstName'=>$firstname,'LastName'=>$lastname);

		$user = new User($hydrateMap);

		$userKeysManager = new UserKeysManager($this->_db);

		$keysList = $userKeysManager->getMapByUser($email);

		foreach ($keysList as $key=>$value)
		{
			$user->setKey($key,$value);
		}

		return $user;
	}
}
