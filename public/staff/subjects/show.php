<?php
require_once('../../../private/initialize.php');
$id = $_GET['id'] ?? '1'; //Ternary, if GET[id] is set use its value else use 1 for id
$query = mysqli_query($db,show_subj($id));
echo $id;
?>
<?php include(SHARED . '/staff_header.php'); ?>


<div id=content>
  <div class="subjects listing">
	<a class="back-link" href="<?php echo WWW_ROOT.'staff/index.php';?>">&laquo; Back</a>


	
		<table class="list">
  	  <tr>
        <th>Subject ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
        <th>Content</th>
      </tr>
      <tr>
      	<?php $subject = mysqli_fetch_assoc($query);?>
      	<td><?php echo $subject['subject_id']; ?></td>
      	<td><?php echo $subject['position']; ?></td>
      	<td><?php echo $subject['visible']; ?></td>
      	<td><?php echo $subject['menu_name']; ?></td>
      	<td><?php echo $subject['content']; ?></td>
      </tr>
  	</table>
  </div>
</div>

<?php include(SHARED . '/staff_footer.php'); ?>
