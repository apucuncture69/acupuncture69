<?php 
require_once("/config/WebserviceDefine.php");
require_once(ManagerFolderPath."PathologiesManager.php");
require_once(ConnexionFolderPath."Connexion.php");
require_once(ModelFolderPath."Pathologie.php");
require_once(ModelFolderPath."Meridien.php");
require_once(ModelFolderPath."Symptome.php");



class PathologieService{
    
private static $_PathologieManager;

public static  function index()
{
    $connexion=new Connexion();
    self::$_PathologieManager= new  PathologiesManager($connexion->getConnexion());
    
		    
		if($_SERVER['REQUEST_METHOD']=='GET'){
            $result = self::GetPathologies();
		} 
    		return $result;

}    




//voir pour le routage avec le map
public static function find($criteriaMap){

    
}

private static function GetPathologies()
{   
    
    $pathos = self::$_PathologieManager->getList();
    $result=self::ConvertXml($pathos);
    return $result;
}

private static function ConvertXml($pathos){
    
    $writer =  new xmlwriter();
    $writer->openMemory();
    $writer->startDocument('1.0','UTF-8');
    //$writer->startDocument('1.0');
     
    $writer->setIndent(true);
    $writer->startElement('pathologies');//début pathologies 1
     
     
    foreach ($pathos as $patho) {
        $writer->startElement('pathologie');//début pathologie 2
            $writer->startElement('meridien');//début méridien 3
                $writer->writeElement('nom',$patho->getMeridien()->getNom());
                $writer->writeElement('element',$patho->getMeridien()->getElement());
                $writer->writeElement('yin',$patho->getMeridien()->	isYin());
            $writer->endElement();//fin méridien 3/
            $writer->writeElement('type',$patho->getType());
            $writer->writeElement('description',$patho->getDescription());
            $writer->startElement('symptomes'); //début de symptomes 4
                foreach ($patho->getSymptomes() as $symptome) {
                    $writer->startElement('symptome'); //début de symptome 5
                    $writer->writeElement('description',$symptome->getDescription());
                    $writer->startElement('motcles'); // début de mot clés 6
                    foreach ($symptome->getMotsCles() as $motcle) {
                        $writer->writeElement('motcle',$motcle);
                    }
                    $writer->endElement();//fin mot clé 6/
                    $writer->writeElement('aggr',$symptome->isAggr());
                    $writer->endElement();//fin mot clé 5/
                }
            $writer->endElement();//fin symptomes 4/
        $writer->endElement();//fin pathologie 2/
        }
    $writer->endElement(); //fin pathologies 1/
    $writer->endDocument(); // fin du document  
    
 
    
    
    $result=$writer->outputMemory(true);
    $writer->flush();
    
   
    
        
   
    return $result;
}









}
?>