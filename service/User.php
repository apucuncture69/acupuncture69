<?php

require("libs/Smarty.class.php");

class User
{
	private $smarty;

	public function __construct() {
		$this->smarty = new Smarty();
	}

	public function index() {
		$r = false;
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$r = $this->post();
		} else if($_SERVER['REQUEST_METHOD']=='GET'){
			$r = $this->get();
		} else if($_SERVER['REQUEST_METHOD']=='PUT'){
			$r = $this->put();
		} else if($_SERVER['REQUEST_METHOD']=='DELETE'){
			$r = $this->delete();
		}
		return $r;
	}

	// Connexion utilisateur
	private function post() {
		$_SESSION['acu_tck_login']='OK';
		return true;
	}

	// Infos utilisateur
	private function get() {
		return null;
	}

	// Modif utilisateur
	private function put() {
		return null;
	}

	// Deconnexion utilisateur
	private function delete() {
		session_destroy();
		return true;
	}
}
?>
