<?php 
require_once("config/WebServiceDefine.php");
require_once(ManagerFolderPath."PathologiesManager.php");
require_once(ConnexionFolderPath."Connexion.php");
require_once(ModelFolderPath."Pathologie.php");
require_once(ModelFolderPath."Meridien.php");


class MeridienService{
    
private static $_PathologiesManager;

public function index()
{
    $result = null;
    
    $connexion=new Connexion();
    self::$_PathologiesManager= new  PathologiesManager($connexion->getConnexion());

    
	if($_SERVER['REQUEST_METHOD']=='GET'){
                $result = $this->GetAllMeridiens();
		}
        
        
        
	return $result;

     
}    



private static function GetAllMeridiens()
{   
    $result=null;
    $result = self::$_PathologiesManager->getValuesOfCriteria('meridien');
    return $result;
}



private static function ConvertXml($meridiens){
/*    $result=null;
    $writer =  new xmlwriter();
    $writer->openMemory();
    $writer->startDocument('1.0','UTF-8');
     
    $writer->setIndent(true);
    $writer->startElement('meridiens'); //début méridiens
    
    foreach ($meridiens as $meridien) {
    
    $meridien =(meridien) $meridien;
    
        $writer->startElement('meridien');//début méridien 
                $writer->writeElement('nom',$meridien->getNom());
                $writer->writeElement('element',$meridien->getElement());
                $writer->writeElement('yin',$meridien->isYin());
            $writer->endElement();//fin méridien
    }
    
    $writer->endElement(); //fin méridiens
    $writer->endDocument(); // fin du document  
    
    $xmlObject = new SimpleXMLElement(utf8_encode($writer->outputMemory(true)));
    $result =$xmlObject->asXml();
    return $result;
    */
}










}
?>