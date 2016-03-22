<?php

/* Classe de représentation d'une pathologie
   Auteur : Robin */
class Pathologie
{
	private $_meridien;		// acu.Meridien
	private $_type;			// String
	private $_description;		// String
	private $_symptomes;		// List<acu.Symptome> : liste des symptômes associés à la pathologie
	
	/* Constructeur */		
	public function __construct(array $data = NULL)
	{
		if ($data)
		{
			$this->hydrate($data);
		}
	}

	/* Getters */
	public function getMeridien()
	{
		return $this->_meridien;
	}

	public function getType()
	{
		return $this->_type;
	}

	public function getDescription()
	{
		return $this->_description;
	}

	public function getSymptomes()
	{
		return $this->_symptomes;
	}

	/* Setters */

	public function setMeridien($meridien)
	{
		$this->_meridien = $meridien;
	}

	public function setType($type)
	{
		$this->_type = $type;
	}

	public function setDescription($description)
	{
		$this->_description = $description;
	}

	public function setSymptomes($symptomes)
	{
		$this->_symptomes = $symptomes;
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
