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
		$_SESSION['acu_tck_login'] = 'OK';
		return $_SESSION['acu_tck_login'];
	}
}
?>
