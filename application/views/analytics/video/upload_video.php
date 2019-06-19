
   <div class="col-md-9 col-lg-10 col-xl-10 col-sm-12 col-xs-12 pr30 pl30sm ">
         <div class="content-body">
            <!-- Hospital Info cards -->
            <!-- plr0 -->
            <div class="row mr0">
               <div class="col-md-12 col-lg-2 col-xl-2 col-sm-12 col-xs-12" id="hider">
                  <!-- <img src="images/Calender Icon.png">
                     <button class="btn-outline-secondary round btn-custom-hvr"><i class="fas fa-caret-left" ></i> HIDE</button> -->
               </div>
               <div class="add-col12 col-md-12 col-sm-12 col-xs-12 ">
                  <div class="card border_video">
                     <div class="card-header">
                        <h2>Upload New Media</h2>
                     </div>
                     <div class="card-body">
                           <!-- <form action="#" id="video_upload" method="post" enctype="multipart/form-data">
 -->                      

                     <form  method="post" enctype="multipart/form-data">
                           <div class="row text-center">
                              <div class="col-12">
                                 <input type="file" name="video">
                              </div>
                           </div>
                           <div class="row text-right">
                              <div class="col-12">
                                 <input type="submit" name="submit" class="btn btn-info" value="Submit" name="">
                                 <input type="hidden" name="locationID" value="<?=$locationID?>">
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>

                  <?php
                  if ($this->session->flashdata("msg") != "") {
                     ?>
                     <div class="alert alert-info" role="alert">
                    <?=$this->session->flashdata("msg")?>
                  </div>

                     <?php
                  }
                  ?>

                   <?php
                  if ($this->session->flashdata("error_msg") != "") {
                     ?>
                     <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata("error_msg");
                    ?>
                  </div>

                     <?php
                  }
                  ?>
                
                     <div class="card  col-12">
                      <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                           <tr>
                           <thead>
                              <th>Sr.#</th>
                              <th>Video Id</th>
                              <th>Collection Id</th>
                              <th>Action</th>
                           </thead>
                           </tr>
                           <tbody>
                                <?php
                              $i = 1;
                                 foreach ($videos as $key => $value) {
                                    ?>

                                       <tr>
                                          <td><?=$i?></td>
                                          <td><?=$value->videoID?></td>
                                          <td><?=$value->galleryID?></td>
                                          <td><a href="<?=base_url()?>analytics/videos/deleteVideo/<?=$value->galleryID?>/<?=$value->videoID?>" title="Delete Video" onclick="return confirm('Are you sure you wanted to delete this video?')"><i class="far fa-trash-alt"></i></a>
                                             <?php
                                             if ($value->emotionStatus != "Completed") {
                                                ?>
                                                &nbsp;
                                                <a href="<?=base_url()?>analytics/videos/recordAnalytics/<?=$value->emotionID?>/<?=$value->videoID?>" title="Record Analytics"><i class="fas fa-eye"></i></a>
                                             <?php
                                             }
                                             ?>

                                          </td>
                                       </tr>

                                    <?php
                                    $i++;
                                 }

                              ?>
                           </tbody>
                        </table>
                      </div>
                     </div>
               
               </div>
            </div>
         </div>
   </div>
   </div>
   <script type="text/javascript">
     $(document).ready(function() {
    //$('#example').DataTable();

    $("#video_upload").submit(function(e){
      e.preventDefault();
          $(".loading").show();

               setTimeout(function(){
                  $(".loading").find("span").html("Analyzing");
               }, 10000);

               $(".main_div").css("opacity","0.7");

            $.ajax({
            type:'post',
            url:"<?=base_url()?>Videos/startAnalysis",
            data:new FormData(this),
            dataType:'json',
            contentType: false,       
            cache: false,             
            processData:false,
          
            success:function(res)
            {
              
            },
            complete: function(){
               $(".loading").find("span").html("Complete");

               setTimeout(function(){
                  window.location.reload();
               }, 1000);
            },
            



    });
            return false;
    })

} );
   </script>
