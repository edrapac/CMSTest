<?php

require_once('../../../private/initialize.php'); 

?>
<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED.'/staff_header.php'); ?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST["menu_name"])){
		//echo 'true';
		$name = $_POST["menu_name"];
		$position = $_POST["position"];
		$visible = $_POST["visible"];
		$content = $_POST["content"] ?? NULL;
		$assetid = $_POST["asset_id"] ?? NULL;
		//echo new_subject($name,$position,$visible,$content,$assetid);
		$result = mysqli_query($db,new_subject($name,$position,$visible,$content,$assetid));
		if(mysqli_connect_errno()){ //tests for error else returns connection
			$msg = "Database connection failed: ";
			$msg .= mysqli_connect_error();
			$msg .= " Error code: ";
			$msg .= mysqli_connect_errno();
			exit($msg);

		}

	}	
?>
<a class="back-link" href="<?php echo WWW_ROOT.'staff/subjects/index.php';?>">&laquo; Back</a>

<div class="new Subject">
	<h1>Create New Subject</h1>

	<form action="<?php echo 'new.php';?>" method="post">
		<dl>
			<dt>Subject Name</dt>
			<input type="text" name="menu_name">
		</dl>
		<dl>
			<dt>Position</dt>
			<select name="position">
				<option value="1">1</option>
			</select>
		</dl>
		<dl>
			<dt>Visible?</dt>
			<input type="hidden" name="visible" value="0">
			<input type="checkbox" name="visible" value="1">
		</dl>
		<dl>
			<dt>Content</dt>
			<textarea name="content" rows="10" cols="30"></textarea>
		</dl>
		<dl>
			<dt>Related Assets?</dt>
			<input type="text" name="asset_id">
		</dl>
		<dl>Create New Subject</dl>
		<input type="submit" value="Create New Subject">
		
	</form>


</div>
<?php include(SHARED.'/staff_footer.php'); ?>