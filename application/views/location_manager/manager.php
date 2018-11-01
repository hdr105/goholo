
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
	<!-- BEGIN PAGE BASE CONTENT -->


	<div class="col-sm-12 filterbox">

		<div class="filterdiv">

			<form action="">

				<div class="col-sm-12 col-xs-12 ">

					<div class="col-sm-10">

						<div class="form-group ">

							<label class="col-sm-1 col-xs-1 control-label">Filter:</label>

							<div class="col-sm-11 col-xs-11">

								<div class="col-md-6 ">

									<input type="text" placeholder="Select Month" class="form-control MonthPicker" name="month" value="<?=$month?>">	

								</div>

								<div class="col-md-6 ">

									<select class="form-control" name="type">
										<option value="">Select Type</option>
										<option <?php
										if ($type == 'add_advert') {
											echo 'selected';
										}
										?>
										value="add_advert">Add Advertisement</option>    
										<option
										<?php
										if ($type == 'remove_advert') {
											echo 'selected';
										}
										?>
										 value="remove_advert">Remove Advertisement</option>  

									</select>	

								</div>

							</div>

						</div>

					</div>		



					<div class="col-sm-2 col-xs-2">

						<div class="form-group">

							<input class="btn btn-danger" value="Filter Advertisements" type="submit">

							<!--  <a href="javascript:void(0)" class="cleanSearchFilter">Clean the filter</a>-->

						</div>

					</div>

				</div>

			</form>

		</div>

	</div>


	<table class="table table-bordered table-stripped datatable">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Location Name</th>
				<th>Location Number</th>
				<th>Advertise Number</th>
				<th>Type</th>
				<th>Date</th>
				<th>Action</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($tasks as $key => $value) {
				echo "<tr>
				<td>".$i."</td>
				<td>".$value->location_name."</td>
				<td>".$value->location_number."</td>
				<td>".$value->advert_number."</td>";

				if ($value->task_type == "add_advert") {
					
					$type = "Add Advertisement";

				}elseif ($value->task_type == "remove_advert") {

					$type = "Remove Advertisement";
				}

				echo "<td>".$type."</td><td>".$value->date."</td>";

				echo "<td> <a class='btn btn-primary round-btn' href='".base_url()."location_manager/tasks_assigned/".$value->task_id."'>View Details</a>";

				if ($status == 0) {
					echo "&nbsp; <a href='".base_url()."location_manager/deliver_task/".$value->task_id."' class='btn btn-success round-btn'>Deliver</a>";
				}
				

				echo "</td></tr>";

				
				
				

				$i++;
			}

			?>
		</tbody>
	</table>

	<!-- END PAGE BASE CONTENT -->
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.MonthPicker').MonthPicker({ MinMonth: 1,Button: false });
	});

</script>