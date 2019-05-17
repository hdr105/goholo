
  <div class='location_info'>
    <div class='row'>
      <div class='col-md-12'>
        <div class='col-md-6'>
          <div class="row">
            <?php
          if ($location_image != "") {
            echo "<img src='".base_url().LOCATION_IMAGE_UPLOAD_PATH.$location_image."' >";
          }

          ?>
          </div>
          <div class="row text-center mt10">
            <?php
          if ($location_video != "") {
            ?>
            <a  href="<?php echo base_url().LOCATION_VIDEO_UPLOAD_PATH.$location_video; ?>" data-width="1000" data-height="800" class="html5lightbox" >View Location Video</a>
            <?php
          }

          ?>
          </div>
          
        </div>
        <div class='col-md-6 text-center'>
          <div class='row'>
            <h3><?=$location_name?></h3>
          </div>
          <?php
          if ($monthly_views != "") {
            ?>
            <div class='row margin-bottom-10'>
              Monthly Views:
              <b><?=$monthly_views?></b>
            </div>
            <?php   
          }
          ?>
       
            <?php
          if ($main_demographic != "") {
            ?>
            <div class='row margin-bottom-10'>
              Main demographic :
              <b><?=$main_demographic?></b>
            </div>
            <?php   
          }
          ?>
             <?php
          if ($age_group != "") {
            ?>
            <div class='row margin-bottom-10'>
              Age Group :
              <b><?=$age_group?></b>
            </div>
            <?php   
          }
          ?>
              <?php
          if ($industry != "") {
            ?>
            <div class='row margin-bottom-10'>
              Industry :
              <b><?=$industry?></b>
            </div>
            <?php   
          }
          ?>
             <?php
          if ($location_description != "") {
            ?>
            <div class='row margin-bottom-10'>
              What can be advertised :
              <b>
                <?php 

              $location_description = str_replace(array("\\r\n", "\\r"),"<br>",$location_description);
              $location_description = str_replace(array("\\r\n", "\\n"),"",$location_description);
              echo $location_description; ?>
                

              </b>
            </div>
            <?php   
          }
          ?>
          <?php
          if ($other_notes != "") {
            ?>
            <div class='row margin-bottom-10'>
              Other Notes :
              <b>
                <?php 

              $other_notes = str_replace(array("\\r\n", "\\r"),"<br>",$other_notes);
              $other_notes = str_replace(array("\\r\n", "\\n"),"",$other_notes);
              echo $other_notes; ?>
              </b>
            </div>
            <?php   
          }
          ?>
             <?php
          if ($monthly_cost != "") {
            ?>
            <div class='row margin-bottom-20'>
              Cost Per Month:
              <b>$<?=$monthly_cost?></b>
            </div>
            <?php   
          }
          ?>

          <?php if(!empty($this->session->userdata("user_session"))) {?>
          <div class="row">
            <a href="<?=base_url()?>advertisers/manage_advertisement/<?=$location_id?>" class="btn btn-primary">Advertise Here</a>
          </div>
          <br>
            <div class="row">
            <a href="<?=base_url()?>analytics/dashboard/<?=$location_id?>" target="_blank" class="btn btn-primary">Get Analytics</a>
          </div>
        <?php } else{ ?>
         <div class="row">
          <a  class="btn btn-info" onClick="advertiseaa(<?=$location_id?>)"  data-id="<?=$location_id?>">Advertise Here </a>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</div>

