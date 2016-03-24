<?php
	/* Constants */
	define ('DEFAULT_MODULE', 'home');
	define ('DEFAULT_FUNCTION', 'index');

	define ('DIR_CTRL', __DIR__.'/controller/');
	define ('DIR_MODEL', __DIR__.'/model/');
	define ('DIR_VIEW',  __DIR__.'/view/');
	define ('DIR_SERV', __DIR__.'/service/');

	define ('ROUTING', __DIR__.'/config/routing.xml');
	define ('ROUTING_WS', __DIR__.'/config/routing_ws.xml');

	/* Functions */
	function getCurrentUri()
	{
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		$uri = '/' . trim($uri, '/');
		return $uri;
	}

	function patternEncode($route){

		$pattern = trim($route->path);
		preg_match_all('/\{\\w+\}/', $pattern, $matches);
		foreach ($matches[0] as $param) {
			$param_name = preg_replace( '/({|})/', '', $param);
			$pattern = str_replace($param,$route->$param_name,$pattern);
		 }
		$pattern = str_replace('/','\/',$pattern);
		$pattern = '/^'.$pattern.'$/';
		return $pattern;
	}

	function getParametersRoute($route, $uri){
		$path = trim($route->path);
		preg_match_all('/\{\\w+\}/', $path, $matches);
		foreach ($matches[0] as $param) {
			$param_regex = '/'.$param.'/';
			preg_match($param_regex, $path, $result, PREG_OFFSET_CAPTURE);
			$fchar = substr($path,$result[0][1]-1,1);
			$lchar = substr($path,$result[0][1]+strlen($param),1);

			$idlbloc = null;
			$idfbloc = null;

			$fsplit = explode($fchar, $path);
			$idfbloc_tmp=0;
			foreach ($fsplit as $fbloc) {
				if(preg_match($param_regex, $fbloc)){
					$idfbloc = $idfbloc_tmp;
					$lsplit = explode($lchar, $fbloc);
					$idlbloc_tmp=0;
					foreach ($lsplit as $lbloc) {
						if(preg_match($param_regex, $lbloc)){
							$idlbloc = $idlbloc_tmp;
						}
						$idlbloc_tmp = $idlbloc_tmp+1;
					}
				}
				$idfbloc_tmp = $idfbloc_tmp+1;
			}

			if (isset($idlbloc)) {
				$param_value = explode($lchar, explode($fchar, $uri)[$idfbloc])[$idlbloc];
			} else {
				$param_value = explode($fchar, $uri)[$idfbloc];
			}


			$param_name = preg_replace( '/({|})/', '', $param);
			$tab[$param_name]=$param_value;
		}
		return $tab;
	}

	/* Traitements */


	$conf_file = null;
	$action_directory = null;
	if($_GET['mod'] == 'site'){
		$conf_file = ROUTING;
		$action_directory = DIR_CTRL;
	} else if ($_GET['mod'] == 'api') {
		$conf_file = ROUTING_WS;
		$action_directory = DIR_SERV;
	}


	$uri = getCurrentUri();


	$xml=simplexml_load_file($conf_file);
	foreach($xml->children() as $route) {
	    $pattern = patternEncode($route);
	    if(preg_match($pattern, $uri)){
	    	if(!isset($target)){
	    		$target = $route;
	    	}
	    }

	}

	if(isset($target)){
		$controller = trim($target->controller);
		$action = trim($target->action);
		$param = getParametersRoute($target,$uri);

		include $action_directory.$controller.'.php';
		$instance = new $controller();
		echo $instance->$action($param);
	} else {
		if($_GET['mod'] == 'site'){
			include '404.php';
		} else if ($_GET['mod'] == 'api') {
			echo 'error';
		}
	}

	/*
	if(isset($_SESSION['tli_tck_login'])){
		include 'Controller/home.php' ;
	} else {
		include 'Controller/login.php' ;
	}
	*/
?>
