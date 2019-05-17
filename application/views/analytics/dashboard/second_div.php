
   <div class="card">
      <div class="card-body">
        <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="row ">
      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 pr-0">
       <div class="card">
        <div class="card-header pl0md">
          
          <h4 class="card-title title title-sm font11sm font12md" id="heading-dropdown ">EMOTIONAL ANALYSIS <!-- <span class="badge pink_bdg">9</span> --></h4>
                <div class="heading-elements btn_sm_per right-0">
            
             <button type="button" class="btn btn-outline-secondary font12md round  btn-custom-hvr" data-toggle="dropdown" aria-haspopup="true"><i class="pr-1 fas fa-sort-down"></i> <span class="emotion_filter">Percentages</span>  <i class="pl-1 fas fa-ellipsis-v"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item change_emotions" data-filter="Decimels" href="#">Numbers</a>
                <a class="dropdown-item change_emotions" data-filter="Percentage" href="#">Percentage</a>
              </div>
            
          </div>
   
        </div>
        <div class="card-body mt-5 text-center-sm">
          <div class="row justify-content-center ">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 vertical_middle">
              <img src="<?php echo base_url() ?>frontend/images/first_face.png " class="img-ico ">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 plr0">
              <h1 class="mt-1 faceheading ">Postive</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pl-0">
              <h1 class="mt-1 faceheading happy_text"><?=$analytics['happy_cent']?>%</h1>
            </div>
          </div>

           <div class="row justify-content-center ">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 vertical_middle">
              <img src="<?php echo base_url() ?>frontend/images/second_face.png" class="img-ico">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 plr0">
              <h1 class="mt-1 faceheading">Neutral</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pl-0">
              <h1 class="mt-1 faceheading normal_text"><?=$analytics['normal_cent']?>%</h1>
            </div>
          </div>

           <div class="row justify-content-center ">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 vertical_middle">
              <img src="<?php echo base_url() ?>frontend/images/third_face.png" class="img-ico">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 plr0">
              <h1 class="mt-1 faceheading">Negative</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pl-0">
              <h1 class="mt-1 faceheading sad_text"><?=$analytics['sad_cent']?>%</h1>
            </div>
          </div>
         
         </div>
       </div>
     </div>
   

 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="card">
                     <div class="card-header">
                        <h5 class="header-title pb-3 mt-0 title">MALE VS FEMALE </h5>
                     
                     </div>
                     <div class="card-body">
                        <div class="row ">
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                              <img src="<?php echo base_url() ?>frontend/images/man.png" class="pull-up">
                              <h1 class="mt-1 percent_nmbr male_text"><?=$analytics['male_cent']?>%</h1>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                              <img src="<?php echo base_url() ?>frontend/images/woman.png" class="pull-up">
                              <h1 class="mt-1 percent_nmbr female_text"><?=$analytics['female_cent']?>%</h1>
                           </div>
                           <div class="brdr_right d-none d-lg-block d-xl-block d-md-block">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
</div>
</div>


</div>
</div>
</div>
