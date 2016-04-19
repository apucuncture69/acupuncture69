<?php
require_once("config/WebServiceDefine.php");
require_once(ManagerFolderPath."PathologiesManager.php");
require_once(ConnexionFolderPath."Connexion.php");
require_once(ModelFolderPath."Pathologie.php");
require_once(ModelFolderPath."Meridien.php");
require_once(ModelFolderPath."Symptome.php");



class PathologieService{
    
private static $_PathologieManager;

private static function init(){
    $connexion=new Connexion();
    self::$_PathologieManager= new  PathologiesManager($connexion->getConnexion());
    
}


public static  function index()
{
    self::init();
    $result=null;
		    
		if($_SERVER['REQUEST_METHOD']=='GET'){
            $keywords='%';
            $meridien='%';
            $type='%';
            if (isset($_GET['keywords'])) { $keywords = $_GET['keywords'];}
            if (isset($_GET['meridien'])) { $meridien = $_GET['meridien']; }
            if (isset($_GET['type'])) {     $type     = $_GET['type']; }
            
              if($keywords!='%'){
                    $result= self::FindByKeywords($keywords,$meridien,$type);              
                }
            else{
            if (($meridien!='%') or ( $type!='%')){
                $result = self::FilterByMeridienAndType($meridien,$type);
            }
            else {
                $result = self::GetPathologies();
                }
            }
    		return $result;
        }

}    



/*filtrage à l'aide d'un méridien et du type de pathologie
URL de filtrage avec pour paramètre le filtre de méridien 'P' et le filtre de type sur 'me' api/pathologies?meridien=P&type=me

*/ 
private static function FilterByMeridienAndType($meridien, $type){
    $result=null;
    self::init();
    $filtre['meridien']=$meridien;
    $filtre['type']    =$type;
    $pathos=self::$_PathologieManager->find($filtre);
    $result=self::ConvertPathologiesToXml($pathos);
    return $result; 
}


//recherche par mot clé peut recoitu une chaine de caractère  (mot clé(s))
//qui sera découpée (si il y a des espaces ) en plusieurs mots clés 
private static function FindByKeywords($keywords,$meridien,$type){
    $result=null;
    self::init();
    

    $token = strtok($keywords, " ");
    while ($token !== false)
    {
        $arrayOfKeyword[]=$token;
        $token = strtok(" ");
        
    } 
    $words['keyword']=$arrayOfKeyword;
    $words['meridien']=$meridien;
    $words['type']=$type;
    
    $pathos=self::$_PathologieManager->find($words);
    $result=self::ConvertPathologiesToXml($pathos);
    return $result; 
}

//récupère toutes les pathologies 
private static function GetPathologies()
{       
    $pathos = self::$_PathologieManager->getList();
    $result=self::ConvertPathologiesToXml($pathos);
    return $result;
}




private static function ConvertPathologiesToXml($pathos){
    
    $writer =  new xmlwriter();
    $writer->openMemory();
    $writer->startDocument('1.0','UTF-8');
     
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
    
      
    $xmlObject = new SimpleXMLElement(utf8_encode($writer->outputMemory(true)));
    $result =$xmlObject->asXml();
    return $result;
}

public static function GetFilterData(){
    $result=null;
    self::init();
    
    $listOfMeridien =self::$_PathologieManager->getValuesOfCriteria('meridien');
    $listOfTypePatho =self::$_PathologieManager->getValuesOfCriteria('type');
    $result =self::ConvertFilterToXml($listOfMeridien,$listOfTypePatho);
    
    return $result;  
}

private static function ConvertFilterToXml($meridiens,$pathologieTypes){
    $writer =  new xmlwriter();
    $writer->openMemory();
    $writer->startDocument('1.0','UTF-8');
     
    $writer->setIndent(true);
    $writer->startElement('filtres');//début filtres
    
    $writer->startElement('meridiens'); //début méridiens
    foreach ($meridiens as $meridien) {
         $writer->writeElement('meridien',$meridien);
    }
    $writer->endElement();// fin méridiens
    
    $writer->startElement('types'); // début types
    foreach ($pathologieTypes as $type) {
         $writer->writeElement('type',$type);
    }
    $writer->endElement();//fin types
    
    $writer->endElement();//fin filtres
    $writer->endDocument(); // fin du document  
    
      
    $xmlObject = new SimpleXMLElement(utf8_encode($writer->outputMemory(true)));
    $result =$xmlObject->asXml();
    return $result;
    
} 





}
?>  