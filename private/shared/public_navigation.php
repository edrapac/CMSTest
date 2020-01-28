<nav>
	<?php $assoc = return_assoc_SELECT_ALL($db) ?>
	<ul class="subjects">
		<?php while($subjects = $assoc){ ?>
			<li>
				<?php echo he($subjects['menu_name']);?>
			</li>

			<?php } ?>
	</ul>
</nav>