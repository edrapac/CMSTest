<?php
	ob_start();
	define("PRIVATE_PATH",dirname(__FILE__)); // one up, the private/ dir
	define("ROOT",dirname(PRIVATE_PATH)); //rootdir CMSTest
	define("PUBLIC_PATH",ROOT."/public"); //public dir /CMSTest/public
	define('SHARED', PRIVATE_PATH."/shared");

	$public_end = strpos($_SERVER['SCRIPT_NAME'],'/public') +5;
	$doc_root = substr($_SERVER['SCRIPT_NAME'],0, $public_end);
	define('WWW_ROOT',$doc_root);

	require_once("functions.php");
	require_once("db_functions.php");

	$db = db_connect(); // every page that includes initialize will have a db connection
	if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>
