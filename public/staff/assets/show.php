<?php
require_once("../../../private/initialize.php");
$id = $_GET['id'] ?? '1';
$query = mysqli_query($db,show_subj($id));

?>

<div id=content>
	<a class="back-link" href="<?php echo WWW_ROOT.'staff/assets/index.php';?>">&laquo; Back</a>

	<div class="page show">
		Page ID: <?php echo he($id); ?>
	</div>
	<div class="subject table">
		<table class="list">
  	  <tr>
        <th>Subject ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
        <th>Content</th>
	</div>
</div>