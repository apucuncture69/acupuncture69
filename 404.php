<?php
  require("libs/Smarty.class.php");

  $smarty = new Smarty();
	$smarty->assign("module_name", "acu_404");
	$smarty->display("view/acu_main.tpl");
?>
