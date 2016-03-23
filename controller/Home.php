<?php

require("libs/Smarty.class.php");

class Home
{
	private $smarty;

	public function __construct()
	{
		$this->smarty = new Smarty();
	}

	public function home()
  {
		$this->smarty->assign("module_name", "acu_home");
	  $this->smarty->display("view/acu_main.tpl");
  }

  public function login()
  {
		$this->smarty->assign("module_name", "acu_login");
		$this->smarty->display("view/acu_main.tpl");
  }

	public function pathologies()
  {
		$this->smarty->assign("module_name", "acu_pathologies");
		$this->smarty->display("view/acu_main.tpl");
  }

	public function infos()
  {
		$this->smarty->assign("module_name", "acu_infos");
		$this->smarty->display("view/acu_main.tpl");
  }
}
?>
