<?php
if (has_permission("advertiser_sidebar")) {
	?>
 <li class="">
   <a href="#">
    My Advertiser
  </a>
</li>
<li>
 <a href="<?php echo base_url() ?>advertisers/manage_advertisers">
   Add New Advertiser
 </a>
</li>
<li>
 <a href="<?php echo base_url() ?>advertisers/view_advertisers">
  All Advertisers
</a>
</li>
<?php

}
?>



<li>
 <a href="<?php echo base_url() ?>advertisers/view_advertisements">
  View Advertisements
</a>
</li>
