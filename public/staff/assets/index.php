<?php require_once('../../../private/initialize.php'); ?>

<?php
  $sql = "SELECT * FROM assets ";
  $sql .= "ORDER BY position ASC";
  $asset_set = mysqli_query($db,$sql);
  
  $joined = mysqli_query($db,join_tables());
?>

<?php $page_title = 'Assets'; ?>
<?php include(SHARED . '/staff_header.php'); ?>

<div id="content">
  <div class="assets listing">
    <h1>Assets</h1>

    <div class="actions">
      <a class="action" href="<?php echo 'new.php';?>">Create New Asset</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Asset ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>Associated Subjects</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr> 
      <?php while($asset= mysqli_fetch_assoc($asset_set)) { ?>
        <tr>
          <td><?php echo $asset['asset_id']; ?></td>
          <td><?php echo $asset['position']; ?></td>
          <td><?php echo $asset['visible'] == 1 ? 'true' : 'false'; ?></td>
    	  <td><?php echo $asset['menu_name']; ?></td>
      <?php } ?>

		  <td>
		  	<ul>
		  	<?php 
		  		$joined = pop_array(mysqli_query($db,join_tables()));
		  		foreach ($joined as $item) {
		  			echo '<li>';
		  			echo $item;
		  			echo '</li>';
		  		}
		  	?>
		  	</ul>
		  </td>
	 
	 <?php
	  	 $asset_set = mysqli_query($db,$sql);
	  	 while($asset= mysqli_fetch_assoc($asset_set)) { ?>
          <td><a class="action" href="<?php echo WWW_ROOT . 'staff/assets/show.php?id='.$asset['asset_id']; ?>">View</a></td>
          <td><a class="action" href="<?php echo 'edit.php?id=' . he(u($asset['asset_id'])).'&menu_name=' . he(u($asset['menu_name']));?>">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED . '/staff_footer.php'); ?>