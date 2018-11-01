
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
	<!-- BEGIN PAGE BASE CONTENT -->
		<div class="row">
		<?php
		if ($this->session->flashdata("error_msg") != "") {
			?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata("error_msg"); ?>
			</div>

			<?php
		}else if ($this->session->flashdata("success_msg") != ""){
			?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata("success_msg"); ?>
			</div>

			<?php } ?>
		</div>
	<?php if ($user_role == 1) { ?>
	<div class="col-sm-12 filterbox">

		<div class="filterdiv">

			<form action="" method="post">

				<div class="col-sm-12 col-xs-12 ">

					<div class="col-sm-10">

						<div class="form-group ">

							<label class="col-sm-1 col-xs-1 control-label">Filter:</label>

							<div class="col-sm-11 col-xs-11">

								<div class="col-md-6 ">

									<select class="form-control" name="user">
										<option value="">Select User</option>

										<?php
										foreach ($users as $key => $value) {
											echo '<option '.($user_id == $value->user_id ? "selected":"").' value="'.$value->user_id.'">'.$value->first_name.' '.$value->last_name.'</option>';
										}
										?>
									</select>	

								</div>

							</div>

						</div>

					</div>		



					<div class="col-sm-2 col-xs-2">

						<div class="form-group">

							<input class="btn btn-danger" value="Filter User" type="submit">

							<!--  <a href="javascript:void(0)" class="cleanSearchFilter">Clean the filter</a>-->

						</div>

					</div>

				</div>

			</form>

		</div>

	</div>

	<?php } 	
	if (!empty($locations)) {
		?>

		<div class="row">
			<div class="col-md-12">
				<div class="db-stats-standard cf js-db-stats ">
					<span><small>Net Royalty</small>$<?=$net_royalty?></span>
					<span><small>Total Paid</small>$<?=$total_paid?></span>
					<span><small>Remaining</small>$<?=$remaining?></span>
				</div>
			</div>
		</div>

		<?php } ?>



		<table class="table table-bordered table-stripped datatable">
			<thead>
				<tr>
					<th>Sr.</th>
					<th>Location Name</th>
					<th>Location Number</th>
					<th>Royalty</th>
					<?php
					if ($user_role == 1) {
						echo "<th>Action</th>";
					}
					?>			
				</tr>
			</thead>
			<tbody>
				<?php
				if (isset($locations)) {
					$i = 1;
					foreach ($locations as $key => $value) {
						echo "<tr>
						<td>".$i."</td>
						<td>".$value->location_name."</td>
						<td>".$value->location_number."</td>
						<td>".$value->user_royalty."</td>";

						if ($user_role == 1) {
							if ($member_role == 2) {
								if ($value->owner_royalty_status == 0) {

									echo "<td> <a href='".base_url()."payouts/royalty_status/".$value->location_id."/owner_royalty_status/1' class='btn btn-success' >Mark as Paid</a> </td>";
								}else{
										echo "<td> <a href='".base_url()."payouts/royalty_status/".$value->location_id."/owner_royalty_status/0' class='btn btn-danger' >Mark as Unpaid</a> </td>";
								}
							}elseif ($member_role == 1 || $member_role == 3) {
								if ($value->advert_royalty_status == 0) {

									echo "<td> <a href='".base_url()."payouts/royalty_status/".$value->location_id."/advert_royalty_status/1' class='btn btn-success' >Mark as Paid</a> </td>";
								}else{
										echo "<td> <a href='".base_url()."payouts/royalty_status/".$value->location_id."/advert_royalty_status/0' class='btn btn-danger' >Mark as Unpaid</a> </td>";
								}
							}

						}

						echo "</tr>";

						$i++;
					}
				}

				?>
			</tbody>
		</table>

		<!-- END PAGE BASE CONTENT -->
	</div>