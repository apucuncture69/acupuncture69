<?php 
header('Content-Type: text/xml; charset=UTF-8');
require_once("/config/WebserviceDefine.php");
require_once(ManagerFolderPath."PathologiesManager.php");
require_once(ConnexionFolderPath."Connexion.php");
require_once(ModelFolderPath."Pathologie.php");


class PathologieService{
    
private static $_PathologieManager;

public function index()
{
    $connexion=new Connexion();
    self::$_PathologieManager= new  PathologiesManager($connexion->getConnexion());
   
    $id='';

    
		$result = null;
		if($_SERVER['REQUEST_METHOD']=='GET'){
            if ($id!=''){
                $result = $this->GetPathologie($id);
            }
            else
            {
                $result= $this->GetPathologies();
            }
		} 
		return $result;

     
}    



private static function GetPathologie($id)
{

   

   
   $patho = self::$_PathologieManager->get($id);
   $writer =  new xmlwriter();
   
   return $patho->getType();
      
     
      
    
} 



//voir pour le routage avec le map
public static function find($criteriaMap){

$result=null;
    
}


private static function GetPathologies()
{   
    
    $pathos = self::$_PathologieManager->getList();
    self::ConvertXml($pathos);
 
     
    return $result;
}

private static function ConvertXml($pathos){
    $writer =  new xmlwriter();
    $writer->openMemory();
    $writer->startDocument('1.0');
    $writer->setIndent(true);
    
    foreach ($pathos as $patho) {
        
        
        }
     
         
         
       
    return $result;
}









}
?>