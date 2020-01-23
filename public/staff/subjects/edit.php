<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){ // if you click edit but don't specify an ID
	redir('index.php');
}
$id= $_GET['id'];
$subject = return_assoc_SELECT($id,$db); //default settings

//allows us to update the subjects
if($_SERVER['REQUEST_METHOD']=='POST'){ 
	$name = $_POST['menu_name'] ?? $subject["menu_name"];
	$position = $_POST['position'] ?? $subject["position"];
	$visible = $_POST['visible'] ?? $subject["visible"];
	$content = $_POST['content'] ?? $subject["content"];
	$result = update_subj($db,$name,$position,$visible,$content,$id);

	if(mysqli_connect_errno()){ //tests for error else returns connection
				$msg = "Database connection failed: ";
				$msg .= mysqli_connect_error();
				$msg .= " Error code: ";
				$msg .= mysqli_connect_errno();
				exit($msg);

			}
	else{
		
	}
}



//allows us to populate the page with subject details for GET requests
else{
	$subject = return_assoc_SELECT($id,$db);
}
?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED.'/staff_header.php'); ?>
<a class="back-link" href="<?php echo WWW_ROOT.'staff/assets/index.php';?>">&laquo; Back</a>

<div class="Edit Subject">
	<h1> Edit Subject: <?php echo $subject["menu_name"];?> </h1>

	<form action="<?php echo WWW_ROOT . 'staff/subjects/edit.php?id=' . he(u($id)); ?>" method="post">
		<dl>
			<dt>Subject Name:</dt>
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
		<dl>Edit Subject</dl>
		<input type="submit" value="Edit Subject">
		
	</form>


</div>
<?php include(SHARED.'/staff_footer.php'); ?>