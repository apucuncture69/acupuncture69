<?php 
header('Content-Type: text/xml; charset=UTF-8');
$ManagerPath="../model/manager";
include_once($ManagerPath."PathologiesManager.php");
function GetPathologie($id)
{
      $PathoManager= new  PathologiesManager();
      
   return 
} 




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
}

?>