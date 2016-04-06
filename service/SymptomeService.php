<?php 
header('Content-Type: text/xml; charset=UTF-8');
require_once("/config/WebServiceDefine.php");
require_once(ManagerFolderPath."SymptomesManager.php");
require_once(ConnexionFolderPath."Connexion.php");
require_once(ModelFolderPath."Symptome.php");

class SymptomeService {
    
private $_SymptomeManager;


public function index()
{
    $connexion=new Connexion();
    self::$_SymptomeManager= new  SymptomesManager($connexion->getConnexion());
   
    //test à envler
    $id=1;
    
        //voir routage avec nico si on fait deux routes ou si on fait comme ca
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$result="aze";
		}
		return $result;
     
}    
    
    
    

      
      	

	// récupération de tous les symptomes voir avec robin pour les managers
	private function get($id) {
    $result =   null;



    }



}
    
 




?>