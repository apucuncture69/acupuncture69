<?php

require("libs/Smarty.class.php");

class Home
{
	private $smarty;

	public function __construct() {
		$this->smarty = new Smarty();
	}

	public function home() {
		$this->initSessionVariables();
		$this->smarty->assign("module_name", "acu_home");
		$this->smarty->display("view/acu_main.tpl");
	}

	public function login($param) {
		if($this->isConnected()){
			header('Location: home');
		} else {
			$this->initSessionVariables();
			if(isset($param['redirect_page'])){
				$this->smarty->assign('redirect_page', $param['redirect_page']);
			} else {
				$this->smarty->assign('redirect_page', 'home');
			}
			$this->smarty->assign("module_name", "acu_login");
			$this->smarty->display("view/acu_main.tpl");
		}
	}

	public function pathologies() {
		if($this->isConnected()){
			$this->initSessionVariables();
			$this->smarty->assign("module_name", "acu_pathologies");
			$this->smarty->display("view/acu_main.tpl");
		} else {
			header('Location: login-pathologies');
		}
	}

	public function infos() {
		$this->initSessionVariables();
		$this->smarty->assign("module_name", "acu_infos");
		$this->smarty->display("view/acu_main.tpl");
	}

	public function initSessionVariables() {

		$email = $display_name = null;
		$isConnected = false;

		if($this->isConnected()){
			$isConnected = true;
			$email = $_SESSION['user_email'];
			$display_name = $_SESSION['user_display_name'];
		}

		$userData = array('isConnected' => $isConnected, 'email' => $email, 'display_name' => $display_name);
		$this->smarty->assign('user', $userData);
	}

	private function isConnected(){
		return isset($_SESSION['acu_tck_login']);
	}
}
?>
