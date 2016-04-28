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
		if($this->isConnected()){
			$modules = array('acu_home');
		} else {
			$modules = array('acu_login','acu_home');
			$this->smarty->assign('redirect_page', 'home');
		}
		$this->smarty->assign("module_name", $modules);
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
			$modules = array('acu_login');
			$this->smarty->assign("module_name", $modules);
			$this->smarty->display("view/acu_main.tpl");
		}
	}
	
	public function signup($param) {
		$this->initSessionVariables();
                if(isset($param['redirect_page'])){
                        $this->smarty->assign('redirect_page', $param['redirect_page']);
                } else {
                        $this->smarty->assign('redirect_page', 'home');
                }
		$this->smarty->assign("module_name", "acu_signup");
		$this->smarty->display("view/acu_main.tpl");
	}

	public function pathologies() {
		$this->initSessionVariables();
		$modules = array('acu_pathologies');
		$this->smarty->assign("module_name", $modules);
		$this->smarty->display("view/acu_main.tpl");
	}

	public function infos() {
		$this->initSessionVariables();
		$modules = array('acu_infos');
		$this->smarty->assign("module_name", $modules);
		$this->smarty->display("view/acu_main.tpl");
	}

	public function profil($param) {
		$this->initSessionVariables();
		$modules = array('acu_profil');
		$this->smarty->assign("module_name", $modules);
		$this->smarty->assign("profil_first", $_SESSION['user_first']);
		$this->smarty->assign("profil_last", $_SESSION['user_last']);
		$this->smarty->assign("profil_email", $_SESSION['user_email']);
		if($param['saved']==''){
			$this->smarty->assign("profil_saved", '0');
		} else {
			$this->smarty->assign("profil_saved", '1');
		}
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
