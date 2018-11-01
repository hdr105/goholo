<style type="text/css">
	.page-content-col {
    padding-top: 10px !important;
}
</style>
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
	<!-- BEGIN PAGE BASE CONTENT -->

	<div class="row">
		<div class="col-md-offset-3 col-md-6 margin-bottom-10">
			<input type="text" placeholder="Search Location" class="form-control" id="search_autocomplete">
		</div>
		<div class="col-md-1"><button class="btn btn-success filter_btn">Add Filter</button></div>
	</div>

	<div class="row filter_div">
		<div class="col-md-offset-3 col-md-6 margin-bottom-10">
			<select class="form-control filter_select" multiple="">
				<?php
				foreach ($filters as $key => $value) {
					echo "<option value='".$value."'>".$value."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-md-1"><button class="btn btn-success search_filter">Search</button></div>
	</div>

	<div id="map" style="height: 600px; width:100%;"></div>
	
	<!-- END PAGE BASE CONTENT -->
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".filter_div").hide();

		$(".filter_btn").click(function(){
			$(".filter_div").slideToggle();
		})

		$(".search_filter").click(function(){
			add_markers();
		})
	})
</script>
