
<form  role="form" method="POST" name="sendmail" action="<?php echo base_url("contact/send_mail"); ?>" enctype="multipart/form-data">

<div class="modal-body">
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" required name="name" class="form-control" id="name" placeholder="Name">
	</div>

	<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" required name="email" class="form-control" id="email" placeholder="Email">
	</div>


	<div class="form-group">
		<label for="phone">Phone:</label>
		<input type="tel" required name="tel" class="form-control" id="phone" placeholder="Phone Number">
	</div>

	<div class="form-group">
		<label for="location">Location:</label>
		<input type="text" required name="location" value="<?php echo $location->location_name; ?>" class="form-control" id="location" >
	</div>

	<div class="form-group">
		<label for="comment">Message:</label>
		<textarea class="form-control" placeholder="Message Here" required name="msg" rows="5" id="comment"></textarea>
	</div>

</div>
<div class="modal-footer">
	<button type="submit" class="btn btn-success">Submit</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</form>