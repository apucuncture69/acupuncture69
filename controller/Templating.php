<?php

require("libs/Smarty.class.php");

class Templating
{
	private $smarty;

	public function __construct() {
		$this->smarty = new Smarty();
	}

	public function draw() {

		$opts = array(
			'http'=>array(
				'method'=>$_POST['method'],
				'header'=>'Content-type: application/x-www-form-urlencoded',
			)
		);
		$context = stream_context_create($opts);
		 
		$response = file_get_contents(
		               'http://'.$_SERVER['SERVER_NAME'].'/'.split("/",$_SERVER['REQUEST_URI'])[1].'/'.$_POST['url'], 
		               false, 
		               $context);

		$response = preg_replace('/<\?xml.*\?>/i','',$response);

		$xml = simplexml_load_string($response);

		
		$tpl = 'view/'.$_POST['tpl'].'.tpl';
		$this->smarty->assign('smarty_xml', $xml);
		$this->smarty->display($tpl);
		
	}
}

?>
