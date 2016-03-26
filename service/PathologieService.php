<?php 
header('Content-Type: text/xml; charset=UTF-8');
require_once("../config/WebserviceDefine.php");
require_once($ManagerFolderPath."PathologiesManager.php");
require_once($ConnexionFolderPath."Connexion.php");
// intégrer fichier model avec require once et en modifiant le fichier WebDefine

class PathologieService{
    

 




private static function GetPathologie($id)
{
    if ($_GET['function']!=''){
        
   $value = @call_user_func($_GET['function'], $_GET['arg']); 
   

      $PathoManager= new  PathologiesManager(Connexion.getConnexion());
      $patho = $PathoManager->get($id);
      return  "<response><value>".$patho."</value></response>";
     //mettre en forme selon le model de patho 
     //créer un xsd et dtd
     //ajouter route au fichier 
    }
} 



/*            
if($_GET['arg']!='')
{  
   $value = @call_user_func($_GET['function'], $_GET['arg']); 
   echo "<response><value>".$value."</value></response>"; 
}
else
{
   echo "<response>
            <error>".utf8_encode("Requête Invalide")."</error>
            <function>".$_GET['function']."</function>
            <argument>".$_GET['arg']."</argument>
         </response>";
}*/
}
?>