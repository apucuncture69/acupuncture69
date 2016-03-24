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
		$this->initSessionVariables();
		$this->smarty->assign("module_name", "acu_home");
	  $this->smarty->display("view/acu_main.tpl");
  }

  public function login()
  {
		$this->initSessionVariables();
		$this->smarty->assign("module_name", "acu_login");
		$this->smarty->display("view/acu_main.tpl");
  }

	public function pathologies()
  {
		$this->initSessionVariables();
		$this->smarty->assign("module_name", "acu_pathologies");
		$this->smarty->display("view/acu_main.tpl");
  }

	public function infos()
  {
		$this->initSessionVariables();
		$this->smarty->assign("module_name", "acu_infos");
		$this->smarty->display("view/acu_main.tpl");
  }

	public function initSessionVariables() {

		$email = $display_name = '';
		
		if(isset($_SESSION['user_email']))
			$email = $_SESSION['user_email'];

		if(isset($_SESSION['user_display_name']))
			$display_name = $_SESSION['user_display_name'];

		$userData = array('email' => $email, 'display_name' => $display_name);
		$this->smarty->assign('user', $userData);
	}
}
?>
