<?php require_once('../../../private/initialize.php'); ?>

<?php

  $sql = "SELECT * FROM subjects ";
  $sql .= "ORDER BY position ASC";
  $subject_set = mysqli_query($db,$sql);
?>

<?php $page_title = 'Subjects'; ?>
<?php include(SHARED . '/staff_header.php'); ?>

<div id="content">
  <div class="subjects listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="<?php echo WWW_ROOT .'staff/subjects/new.php';?>">Create New Subject</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Subject ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
        <th>Content</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($subject= mysqli_fetch_assoc($subject_set)) { ?>
        <tr>
          <td><?php echo $subject['subject_id']; ?></td>
          <td><?php echo $subject['position']; ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo $subject['menu_name']; ?></td>
          <td><?php echo $subject['content']; ?></td>
          <td><a class="action" href="<?php echo WWW_ROOT . 'staff/subjects/show.php?id='.$subject['subject_id']; ?>">View</a></td>
          <td><a class="action" href="<?php echo 'edit.php?id=' . he(u($subject['subject_id']));?>">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
    <?php
      mysqli_free_result($subject_set);
    ?>
  </div>

</div>

<?php include(SHARED . '/staff_footer.php'); ?>
