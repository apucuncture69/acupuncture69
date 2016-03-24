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
		$this->initSessionVariables();
	  $this->smarty->assign("module_name", "acu_404");
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
