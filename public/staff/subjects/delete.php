<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){ // if you click edit but don't specify an ID
	redir('index.php');
}
$id= $_GET['id'];



delete_subj($db,$id);
redir('index.php');

?>


<?php include(SHARED.'/staff_footer.php'); ?>