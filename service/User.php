<?php

require("libs/Smarty.class.php");

class User
{
	private $smarty;

	public function __construct()
	{
		$this->smarty = new Smarty();
	}

	public function index()
	{
		return 'OK';
	}
}
?>
