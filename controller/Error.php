<?php

require("libs/Smarty.class.php");

class Error
{
	private $smarty;

	public function __construct()
	{
		$this->smarty = new Smarty();
	}

	public function error_404()
  	{
	  	$this->$smarty->assign("module_name", "acu_404");
		$this->$smarty->display("view/acu_main.tpl");
  	}
}
?>
