<?php

/* Représente un utilisateur de l'application
   Auteur : Robin */

class User
{
	private $_email;	
	private $_hashPwd;	//hash du mot de passe
	private $_firstname;
	private $_lastname;

	private $_keys;		//Map<String,String> : Liste de clés pour les cookies (maintien de la connexion...)

	/* Constructeur */
	public function __construct(array $data = NULL)
	{
		if ($data)
		{
			$this->hydrate($data);
		}
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

	public function getFirstname()
	{
		return $this->_firstname;
	}

	public function getLastname()
	{
		return $this->_lastname;
	}

	public function getKey($name)
	{
		return $this->_keys['name'];
	}

	public function getKeys()
	{
		return $this->keys;
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

	public function setFirstname($firstname)
	{
		$this->_firstname = $firstname;
	}

	public function setLastname($lastname)
	{
		$this->_lastname = $lastname;
	}

	public function setKey($name,$value)
	{
		$this->_keys['name'] = $value;
	}

	/* Hydratation */

	public function hydrate(array $data)
	{
		foreach ($data as $key=>$value)
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method)
			{
				$this->$method($value);
			}
		}
	}
}
	
