<?php

/* Représente un utilisateur de l'application
   Auteur : Robin */

class User
{
	private $_email;	
	private $_hashPwd;	//hash du mot de passe
	private $_firstName;
	private $_lastName;

	private $_keys;		//Map<String,String> : Liste de clés pour les cookies (maintien de la connexion...)

	/* Constructeur */
	public function __construct(array $data = NULL)
	{
		if ($data)
		{
			$this->hydrate($data);
		}
		$this->_keys = array();
	}
	
	/* Getters */	

	public function getEmail()
	{
		return $this->_email;
	}

	public function getHashPwd()
	{
		return $this->_hashPwd;
	}

	public function getFirstName()
	{
		return $this->_firstName;
	}

	public function getLastName()
	{
		return $this->_lastName;
	}

	public function getKey($name)
	{
		return $this->_keys[$name];
	}

	public function getKeys()
	{
		return $this->_keys;
	}

	/* Setters */

	public function setEmail($email)
	{
		$this->_email = $email;
	}

	public function setHashPwd($hashPwd)
	{
		$this->_hashPwd = $hashPwd;
	}

	public function setFirstName($firstname)
	{
		$this->_firstName = $firstname;
	}

	public function setLastName($lastname)
	{
		$this->_lastName = $lastname;
	}

	public function setKey($name,$value)
	{
		$this->_keys[$name] = $value;
	}

	/* Suppression de clés */	

	public function deleteKey($name)
	{
		unset($this->_keys[$name]);
	}

	public function deleteKeys()
	{
		$this->_keys = array();
	}

	/* Hydratation */

	public function hydrate(array $data)
	{
		foreach ($data as $key=>$value)
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
}
	
