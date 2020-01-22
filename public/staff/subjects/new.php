<?php

require_once('../../../private/initialize.php'); 

?>
<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED.'/staff_header.php'); ?>
<a class="back-link" href="<?php echo WWW_ROOT.'staff/assets/index.php';?>">&laquo; Back</a>

<div class="new Subject">
	<h1>Create New Subject</h1>

	<form action="<?php echo 'create.php';?>" method="post">
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
		<dl>Create New Subject</dl>
		<input type="submit" value="Create New Subject">
		
	</form>


</div>
<?php include(SHARED.'/staff_footer.php'); ?>