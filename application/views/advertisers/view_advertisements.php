<div class="page-content-col">
	<div class="row">
		<?php

		if ($this->session->flashdata("success_msg") != "") {
			?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata("success_msg"); ?>
			</div>

			<?php
		}

		?>

	</div>	


	<table class="table table-bordered table-stripped datatable">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Advertiser's Name</th>
				<th>Advertise Number</th>
				<th>Start Date</th>
				<th>Location Name</th>
				<th>Location Number</th>
				<th>Status</th>

				<?php
				if ($user_role == 1 || $user_role == 6) {
					?>
					<th width="300px">Action</th>
					<?php
				}
				?>
				
				
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($adverts as $key => $value) {
				echo "<tr>
				<td>".$i."</td>
				<td>".$value->first_name.' '.$value->last_name."</td>
				<td>".$value->advert_number."</td>
				<td>".$value->start_date."</td>
				<td>".$value->location_name."</td>
				<td>".$value->location_number."</td>";

				if ($user_role == 1) {

					if ($value->advert_status == 0 || $value->advert_status == 1) {
						
					echo "<td>  <input type='checkbox' ". ($value->advert_status != 0 ? 'checked' : '') ."  data-record_id='{$value->advert_id}' data-table='advertisements' data-where='advert_id' class='make-switch change_record_status' data-on-text='Active' data-off-text='Deactive'> </td>";
					}else{

						echo "<td>  Completed </td>";
					}

				}else{

					echo "<td>".get_status($value->advert_status)."</td>";
				}

				if ($user_role == 1 ) {

				

					echo "<td> <a class='btn btn-info round-btn' href='".base_url()."advertisers/advertisement_info/".$value->location_id."/".$value->advert_id."'>View</a> &nbsp; <a class='btn btn-primary round-btn' href='".base_url()."advertisers/manage_advertisement/".$value->location_id."/".$value->advert_id."'>Edit</a> &nbsp; <a href='".base_url()."advertisers/delete_advertisement/".$value->advert_id."' class='btn btn-danger round-btn delete-btn'>Delete</a>";

					if ($value->advert_status == 2) {
						
						echo "&nbsp; <a href='".base_url()."advertisers/advertisementReport/".$value->advert_id."' class='btn btn-success round-btn'>Report</a>";
					}

					echo"</td></tr>";



				}elseif ($user_role == 6) {
					echo "<td> <a class='btn btn-info round-btn' href='".base_url()."advertisers/advertisement_info/".$value->location_id."/".$value->advert_id."'>View</a></td>
				</tr>";
				}
				
				

				$i++;
			}

			?>
		</tbody>
	</table>

</div>

