<?php
	include('../../../private/initialize.php');
	$name = $_POST['menu_name'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';

	

?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	echo "Form Params<br />";
	echo $name.'<br /'.'<br /';
	echo $position.'<br /';
	echo $visible.'<br /';
}
else{
	$homedir = WWW_ROOT . 'index.php';
	redir($homedir);
}
?>