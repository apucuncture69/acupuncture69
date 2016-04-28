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
	// Inscription utilisateur
	private function post() {
		$b = false;
				
				if (isset($_POST['lastname'])) { 
                 $nom = htmlentities($_POST['lastname'],ENT_QUOTES);}
				if (isset($_POST['firstname'])) { 
                 $prenom = htmlentities($_POST['firstname'],ENT_QUOTES);}
				if (isset($_POST['password_again'])) { 
                 $password_again = htmlentities($_POST['password_again'],ENT_QUOTES);}
				if (isset($_POST['password'])) { 
                 $password = htmlentities($_POST['password'],ENT_QUOTES);}
				 if (isset($_POST['email'])) { 
                 $email = htmlentities($_POST['email'],ENT_QUOTES);}
				
                if ($password != '' && $password == $password_again && $email != '' && $prenom != '' && $nom != '') {
                    $user = new User();
                        $user->setEmail($email);
                        $user->setFirstName($prenom);
                        $user->setHashPwd($password);
                        $user->setLastName($nom);
                    
                    $b = self::$_UserManager->add($user);
                    if ($b)
                    {
                        $_SESSION['acu_tck_login']='OK';
                        $_SESSION['user_email']=$user->getEmail();
			$_SESSION['user_first']=$user->getFirstName();
			$_SESSION['user_last']=$user->getLastName();
                        $_SESSION['user_display_name']=$user->getFirstName().' '.$user->getLastName();
                    }
		}
                else
                {
                    $b = false;
                }
		return $b;
	}
	// Connexion utilisateur
	private function get() {
		if (isset($_GET['email'])) { 
                 $email = htmlentities($_GET['email'],ENT_QUOTES);}
		if (isset($_GET['password'])) { 
                 $password = htmlentities($_GET['password'],ENT_QUOTES);}
				 	 
		$r = self::$_UserManager->get($email);
		$b = false;
		if($r->getHashPwd() == $password){
			$_SESSION['acu_tck_login']='OK';
			$_SESSION['user_email']=$r->getEmail();
			$_SESSION['user_first']=$r->getFirstName();
			$_SESSION['user_last']=$r->getLastName();
			$_SESSION['user_display_name']=$r->getFirstName().' '.$r->getLastName();
			$b=true;
		}
		return $b;
	}
	// Modif utilisateur
	private function put() {
		$r = self::$_UserManager->get($_SESSION['user_email']);
		$b = false;
        parse_str(file_get_contents("php://input"),$post_vars);
		if (isset($post_vars['nom'])) { 
                 $nom = htmlentities($post_vars['nom'],ENT_QUOTES);}
		if (isset($post_vars['prenom'])) { 
                 $prenom = htmlentities($post_vars['prenom'],ENT_QUOTES);}
		if (isset($post_vars['newpassword'])) { 
                 $newpassword = htmlentities($post_vars['newpassword'],ENT_QUOTES);}
		if (isset($post_vars['password'])) { 
                 $password = htmlentities($post_vars['password'],ENT_QUOTES);}
				 	 		 	 
		if('' == $newpassword){
			$r->setFirstName($prenom);
			$r->setLastName($nom);
			$b=true;
		} else if('' != $newpassword && $r->getHashPwd() == $password){
			$r->setFirstName($prenom);
			$r->setLastName($nom);
			$r->setHashPwd($newpassword);
			$b=true;
		}
		if($b){
			self::$_UserManager->update($r);
			$_SESSION['user_first']=$r->getFirstName();
			$_SESSION['user_last']=$r->getLastName();
			$_SESSION['user_display_name']=$r->getFirstName().' '.$r->getLastName();
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
