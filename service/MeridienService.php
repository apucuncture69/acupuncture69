<?php 
header('Content-Type: text/xml; charset=UTF-8');
require_once("/config/WebserviceDefine.php");
require_once(ManagerFolderPath."MeridiensManager.php");
require_once(ConnexionFolderPath."Connexion.php");
require_once(ModelFolderPath."Pathologie.php");


class PathologieService{
    
private static $_MeridienManager;

public function index()
{
    $connexion=new Connexion();
    self::$_MeridienManager= new  MeridiensManager($connexion->getConnexion());
   
    $id='';//test à virer
    $result = null;
	
    
    //voir routage avec nico si on fait deux routes ou si on fait comme ca
	 if($_SERVER['REQUEST_METHOD']=='GET'){
            if ($id!=''){
                $result = $this->GetMeridien($id);
            }
            else
            {
                $result= $this->GetMeridiens();
            }
		}
		return $result;

     
}    




//voir ce qu'il y a à renvoyer si xml ou juste liste des meridiens
private static function GetMeridien()
{   
    $pathos = self::$_PathologieManager->getList();
    self::ConvertXml($pathos);
      
    return $result;
}











}
?>