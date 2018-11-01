
<?php
if (has_permission("add_location")) {
	?>
	<li class="">
		<a href="<?php echo base_url()?>locations/manage_location_view">
			Add New Location
		</a>
	</li>
	<?php
}
?>

<li>
	<a href="<?php echo base_url()?>resource_center/4">
		Location Criteria
	</a>
</li>
<li>
	<a href="<?php echo base_url()?>locations/view_locations">
		All Locations
	</a>
</li>
<li>
	<a href="#">
		Location Dashboard 
	</a>
</li>





