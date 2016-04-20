<?php

require("libs/Smarty.class.php");

class Templating
{
	private $smarty;

	public function __construct() {
		$this->smarty = new Smarty();
	}

	public function draw() {

		try {
			$opts = array(
				'http'=>array(
					'method'=>$_POST['method'],
					'header'=>'Content-type: application/x-www-form-urlencoded',
				)
			);
			$context = stream_context_create($opts);
			 
			if(isset($_POST['filters'])){
				$response = file_get_contents(
				               'http://'.$_SERVER['SERVER_NAME'].'/'.explode("templating",$_SERVER['REQUEST_URI'])[0].'/'.$_POST['url'].$_POST['filters'], 
				               false, 
				               $context);
			} else {
				$response = file_get_contents(
				               'http://'.$_SERVER['SERVER_NAME'].'/'.explode("templating",$_SERVER['REQUEST_URI'])[0].'/'.$_POST['url'], 
				               false, 
				               $context);
			}

			$response = preg_replace('/<\?xml.*\?>/i','',$response);

			$xml = simplexml_load_string($response);

			
			$tpl = 'view/'.$_POST['tpl'].'.tpl';
			$this->smarty->assign('smarty_xml', $xml);
			$this->smarty->display($tpl);

		} catch(Exception $e) {
			return null;
		}
		
	}
}

?>
