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
				<th>Advertiser's Email</th>
				<th>Advertiser's Phone</th>
				<th>Status</th>

				<?php
				if ($user_role == 1) {
					?>
					<th width="120px">Action</th>
					<?php
				}
				?>
				
				
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($advertisers as $key => $value) {
				echo "<tr>
				<td>".$i."</td>
				<td>".$value->first_name.' '.$value->last_name."</td>
				<td>".$value->email."</td>
				<td>".$value->phone_number."</td>";

				if ($user_role == 1) {

					echo "<td>  <input type='checkbox' ". ($value->status != 0 ? 'checked' : '') ."  data-record_id='{$value->user_id}' data-table='users' data-where='user_id' class='make-switch change_record_status' data-on-text='Active' data-off-text='Deactive'> </td>";
				}else{

					echo "<td>".get_status($value->status)."</td>";
				}

				if ($user_role == 1) {

					echo "<td> <a class='btn btn-primary round-btn' href='".base_url()."advertisers/manage_advertisers/".$value->user_id."'>Edit</a> &nbsp; <a href='".base_url()."advertisers/delete_advertiser/".$value->user_id."' class='btn btn-danger round-btn delete-btn'>Delete</a></td>
				</tr>";

				}
				
				

				$i++;
			}

			?>
		</tbody>
	</table>

</div>

