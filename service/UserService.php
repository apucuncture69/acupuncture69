<?php
require_once("config/WebServiceDefine.php");
require_once(ManagerFolderPath."UsersManager.php");
require_once(ConnexionFolderPath."Connexion.php");
require_once(UserFolderPath."User.php");

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
		$b = false;
                parse_str(file_get_contents("php://input"),$post_vars);
                if ($post_vars['password'] != '' && $post_vars['password'] == $post_vars['password_again'] && $post_vars['email'] != '' && $post_vars['firstname'] != '' && $post_vars['lastname'] != '') {
                        $user = new User();
                        $user->setEmail($post_vars['email']);
                        $user->setFirstName($post_vars['firstname']);
                        $user->setHashPwd($post_vars['password']);
                        $user->setLastName($post_vars['lastname']);
                        
                        $_SESSION['acu_tck_login']='OK';
			$_SESSION['user_email']=$user->getEmail();
			$_SESSION['user_display_name']=$user->getFirstName().' '.$user->getLastName();
                        
                        $b = self::$_UserManager->add($user);
		}
                else
                {
                    $b = false;
                }
		return $b;
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
