<?php
   include 'includes/header.php';
   ?>
<body class="vertical-layout 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
   <?php
      include 'includes/navbar.php';
      ?>
   <div class="app-content content">
      <div class="">
         <div class="content-body">
            <!-- Hospital Info cards -->
            <!-- plr0 -->
            <div class="row ml100 pt-5 mr0">
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
                        <form>
                           <div class="row text-center">
                              <div class="col-12">
                                 <input type="file" name="">
                              </div>
                           </div>
                           <div class="row text-right">
                              <div class="col-12">
                                 <input type="submit" class="btn btn-info" value="Submit" name="">
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                
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
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td><a href=""><i class="far fa-trash-alt"></i></a></td>
                              </tr>
                           </tbody>
                        </table>
                      </div>
                     </div>
               
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <script type="text/javascript">
     $(document).ready(function() {
    $('#example').DataTable();
} );
   </script>
   <?php
      include 'includes/footer.php';
      ?>