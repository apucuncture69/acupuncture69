<?php
   ini_set('display_errors', 1);
require_once("config/WebServiceDefine.php");
require_once(ManagerFolderPath."UsersManager.php");
require_once(ConnexionFolderPath."Connexion.php");

require("libs/Smarty.class.php");

class UserService
{
	private $smarty;
	private static $_UserManager;

	public function __construct() {
		$this->smarty = new Smarty();
		$connexion=new Connexion();
    	self::$_UserManager= new  UsersManager($connexion->getConnexion());
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
		$r = self::$_UserManager->get($_POST['email']);
		$b = false;
		if($r->getHashPwd() == $_POST['password']){
			$_SESSION['acu_tck_login']='OK';
			$_SESSION['user_email']=$r->getEmail();
			$_SESSION['user_display_name']=$r->getFirstName().' '.$r->getLastName();
			$b=true;
		}
		return $b;
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
		$b=false;
		if(session_destroy()){
			$b=true;
		}
		return $b;
	}
}
?>
