<?php

/* Classe de représentation d'un méridien associé à une pathologie
   Auteur : Robin */

class Meridien
{
	private $_nom;			// String
	private $_element;		// String
	private $_yin;			// boolean	

	/* Constructeur */		
	public function __construct(array $data = NULL)
	{
		if ($data)
		{
			$this->hydrate($data);
		}
	}

	/* Getters */

	public function getNom()
	{
		return $this->_nom;
	}

	public function getElement()
	{
		return $this->_element;
	}

	public function isYin()
	{
		return $this->_yin;
	}

	/* Setters */

	public function setNom($nom)
	{
		$this->_nom = $nom;
	}

	public function setElement($element)
	{
		$this->_element = $element;
	}

	public function setYin($yin)
	{
		$this->_yin = $yin;
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
