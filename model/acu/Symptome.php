<?php

/* Classe de représentation d'un symptôme associé à une pathologie
   Auteur : Robin */

class Symptome
{
	private $_description;		// String
	private $_motsCles;		// List<String>	
	private $_aggr;			// boolean

	/* Constructeur */		
	public function __construct(array $data = NULL)
	{
		if ($data)
		{
			$this->hydrate($data);
		}
	}

	/* Getters */

	public function getDescription()
	{
		return $this->_description;
	}

	public function getMotsCles()
	{
		return $this->_motsCles;
	}

	public function isAggr()
	{
		return $this->_aggr;
	}

	/* Setters */

	public function setDescription($description)
	{
		$this->_description = $description;
	}

	public function setMotsCles($motsCles)
	{
		$this->_motsCles = $motsCles;
	}

	public function setAggr($aggr)
	{
		$this->_aggr = $aggr;

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
