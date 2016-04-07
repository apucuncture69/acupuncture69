<?php 
header('Content-Type: text/xml; charset=UTF-8');
require_once("config/WebServiceDefine.php");
require_once(ManagerFolderPath."PathologiesManager.php");
require_once(ConnexionFolderPath."Connexion.php");
require_once(ModelFolderPath."Symptome.php");

class SymptomeService {
    
private $_PathologieManager;


public function index()
{
    $connexion=new Connexion();
    self::$_PathologieManager= new  PathologieManager($connexion->getConnexion());
   
    
		if($_SERVER['REQUEST_METHOD']=='GET'){
			 $result =self::getAllSymptome()
		}
		return $result;
     
}    
    
    
    

      
      	

	private static function getAllSymptome() {
    $result =   null;
    
    $symptomes  =self::$_PathologieManager->getList();
    $result     =self::ConvertXml($symptomes);
        
    return $result;

    }



}
    
 




?>