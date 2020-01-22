<?php
require_once('../../../private/initialize.php');
$id = $_GET['id'] ?? '1'; //Ternary, if GET[id] is set use its value else use 1 for id

echo $id;
?>
<a href="show.php?company=<?php echo urlencode('Joh Doe'); ?>">ID</a>
