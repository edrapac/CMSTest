<?php
	function public_url_for($script_path) {
	  // add the leading '/' if not present
	  if($script_path[0] != '/') {
	    $script_path = "/" . $script_path;
	  }
	  return PUBLIC_PATH . $script_path;
	}
	function u($url){
		return urlencode($url);
	}
	function ru($url){
		return rawurlencode($url);
	}
	function he($id){ //without the use of this you leave the site vulnerable to XSS
		return htmlspecialchars($id);
	}
	function error_404(){
		header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found my dude");
		exit();
	}
	function error_500(){
		header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error my guy");
		exit();
	}
	function redir($location){
		header("Location: " . $location);
	}
	function echo_if_set($var){
		$vars = $var;
		if(isset($vars)){
			return $vars;
		}
		else{
			return '';
		}
	}

?>
