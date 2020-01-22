<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){ // if you click edit but don't specify an ID
	redir('index.php');
}
$id= $_GET['id'];

// If post request, process the edit action
if($_SERVER['REQUEST_METHOD']=='POST'){
	$name = $_POST['menu_name'] ?? '';
	$position = $_POST['position'] ?? '44';
	$visible = $_POST['visible'] ?? '';
	echo "Form Params<br />";
	echo $name.'<br />';
	echo $position.'<br />';
	echo $visible.'<br />';
}
?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED.'/staff_header.php'); ?>
<a class="back-link" href="<?php echo WWW_ROOT.'staff/assets/index.php';?>">&laquo; Back</a>

<div class="Edit Subject">
	<h1> Edit Subject</h1>

	<form action="<?php echo WWW_ROOT . 'staff/subjects/edit.php?id=' . he(u($id)); ?>" method="post">
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
			<input type="hidden" name="hidden" value="0">
			<input type="checkbox" name="visible" value="1">
		</dl>
		<dl>Edit Subject</dl>
		<input type="submit" value="Edit Subject">
		
	</form>


</div>
<?php include(SHARED.'/staff_footer.php'); ?>