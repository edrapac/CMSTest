<?php

require_once('../../../private/initialize.php'); 

if($_SERVER['REQUEST_METHOD']=='POST'){ // if this page is loaded as a result of a post, display params otherwise display the form
	$name = $_POST['menu_name'] ?? '';
	$visible = $_POST['visible'] ?? '';
	$position = $_POST['position'] ?? '';
	echo "Form Params<br />";
	echo $name.'<br />';
	echo $position.'<br />';
	echo $visible.'<br />';
}
?>

<?php $page_title = 'New Asset'; ?>
<?php include(SHARED.'/staff_header.php'); ?>
<a class="back-link" href="<?php echo WWW_ROOT.'staff/assets/index.php';?>">&laquo; Back</a>

<div class="new Asset">
	<h1>Create New Asset</h1>

	<form action="<?php echo 'new.php';?>" method="post">
		<dl>
			<dt>Asset Name</dt>
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
		<dl>Create New Subject</dl>
		<input type="submit" value="Create New Asset">
		
	</form>


</div>
<?php include(SHARED.'/staff_footer.php'); ?>