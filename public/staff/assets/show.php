<?php
require_once("../../../private/initialize.php");
$id = $_GET['id'] ?? '1';



?>

<div id=content>
	<a class="back-link" href="<?php echo WWW_ROOT.'staff/assets/index.php';?>">&laquo; Back</a>

	<div class="page show">
		Page ID: <?php echo he($id); ?>
	</div>
</div>