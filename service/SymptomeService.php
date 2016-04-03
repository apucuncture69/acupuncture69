<?php 
header('Content-Type: text/xml; charset=UTF-8');
require_once("/config/WebServiceDefine.php");
require_once(ManagerFolderPath."SymptomesManager.php");
require_once(ConnexionFolderPath."Connexion.php");
require_once(ModelFolderPath."Symptome.php");
require_once(ModelFolderPath."Pathologie.php");
require_once(ModelFolderPath."Meridien.php");
// intégrer fichier model avec require once et en modifiant le fichier WebDefine

class SymptomeService {
    
private $SymptomeManager;

public  function __construct() {
    
    
}

public function index()
{

    //test à envler
    $id=1;
    //
    
		$result = false;
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$result = $this->post();
		} else if($_SERVER['REQUEST_METHOD']=='GET'){
			$result = $this->get($id);
		} else if($_SERVER['REQUEST_METHOD']=='PUT'){
			$result = $this->put();
		} else if($_SERVER['REQUEST_METHOD']=='DELETE'){
			$result = $this->delete();
		}
		return $result;
     //echo "<response><value>2</value></response>"; 
     
}    
    
    
    

      
      	// Connexion utilisateur
	private function post() {
	
		return null;
	}

	// récupération de tous les symptomes
	private function get($id) {
    $result =   null;
/* a continuer après
         $SymptomeManager= new SymptomesManager(Connexion::getConnexion());
    
     
         $result =   $SymptomeManager->getListByPatho($id);
         $result =   

*/

$symptome =new Symptome();
$symptome-> setDescription("bonjour");
$my_array = array("Dog","Cat","Horse");
$symptome-> setMotsCles($my_array);
$symptome-> setAggr(true);

$symptome2 =new Symptome();
$symptome2-> setDescription("bonjour");
$my_array2 = array("Dog","Cat","Horse");
$symptome2-> setMotsCles($my_array);
$symptome2-> setAggr(true);

$myarray_3= array($symptome,$symptome2);

$meridien= new Meridien();
$meridien->setNom("meridieN");
$meridien->setElement("zarzzzzzzzuaohr");
$meridien->setYin(true);

$pathologie= new Pathologie();
$pathologie->setMeridien($meridien);
$pathologie->setType("grave");
$pathologie->setDescription("manger des pommes");
$pathologie->setSymptomes($myarray_3);







$result =xmlrpc_encode($pathologie); 
   

		return $result;
	}

	// Modif symptome
	private function put() {
		return null;
	}

	// suppression symptome
	private function delete() {
		
		return null;
	}
}
      
     //mettre en forme selon le model de symptome 
     //créer un xsd et dtd
     //ajouter route au fichier 
    
    
 



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
?>