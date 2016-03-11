<?php

class Pathologie
{
	private $_meridien;		// acu.Meridien
	private $_type;			// String
	private $_description;		// String
	private $_symptomes;		// List<acu.Symptome> : liste des symptômes associés à la pathologie
	
	public function __construct($data = NULL)
	{
		if ($data)
		{
			$this->hydrate($data);
		}
	}

	public function getMeridien()
	{
