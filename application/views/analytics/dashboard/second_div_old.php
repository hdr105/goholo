
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">

        <div class="row ">
          <div class="col-md-12 col-lg-5 col-sm-12 col-xs-12">
           <div class="card">
            <div class="card-header">

              <h4 class="card-title title title-sm" id="heading-dropdown ">ANALYSIS <!-- <span class="badge pink_bdg">9</span> --></h4>
              <div class="heading-elements btn_sm">

               <button type="button" class="btn btn-outline-secondary round  btn-custom-hvr" data-toggle="dropdown" aria-haspopup="true"><i class="pr-1 fas fa-sort-down"></i> Last Week <i class="pl-1 fas fa-ellipsis-v"></i></button>
               <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
              </div>

            </div>
          </div>
          <div class="card-body">



            <div class="row pt-6">
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                <img src="<?php echo base_url() ?>frontend/images/first_face.png" class="img-ico">
                <h1 class="mt-1 percent_nmbr"><?=$analytics['happy_cent']?>%</h1>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
               <img src="<?php echo base_url() ?>frontend/images/second_face.png" class="img-ico">
               <h1 class="mt-1 percent_nmbr"><?=$analytics['normal_cent']?>%</h1>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
               <img src="<?php echo base_url() ?>frontend/images/third_face.png" class="img-ico">
               <h1 class="mt-1 percent_nmbr"><?=$analytics['sad_cent']?>%</h1>
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
        <div class="card-header">
          <h5 class="header-title pb-3 mt-0 title">STATISTICS</h5>

        </div>


        
        <div class="col-sm-12  col-xs-12">

          <!-- <canvas id="line-stacked-area" height="363px"></canvas> -->

          <canvas id="myChart" height="363px"></canvas>
          <script>
            function linechart(){
              var o=$("#myChart");
              new Chart(o, {
                type:"line", options: {
                  responsive:!0, maintainAspectRatio:!1, legend: {
                    display: false
                  }
                  , hover: {
                    mode: "label"
                  }
                  , scales: {
                    xAxes:[ {
                      display:!0, gridLines: {
                        color: "#4C8FC4"
                      }
                    }
                    ], yAxes:[ {
                      display:!0, gridLines: {
                        color: "#4C8FC4"
                      }
                    }
                    ]
                  }
                  , title: {
                    display: !0, text: ""
                  }
                }
                , data: {
                  labels:["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"], 

                  datasets:[ 
                  {
                    label: "Visitors", data: [<?=intval($analytics['total_visitors'])?>,0,0,0,0,0,0], backgroundColor: "#ec0bad", borderColor: "transparent", pointBorderColor: "#ec0bad", pointBackgroundColor: "#FFF", pointBorderWidth: 2, pointHoverBorderWidth: 2, pointRadius: 4
                  }
                  , 
                  {
                    label: "AVG. Age", data: [<?=intval($analytics['avg_age'])?>,0,0,0,0,0,0], backgroundColor: "#4f97cf", borderColor: "transparent", pointBorderColor: "#5175E0", pointBackgroundColor: "#FFF", pointBorderWidth: 2, pointHoverBorderWidth: 2, pointRadius: 4
                  }
                  ]
                },

              }

              )
            }

            $(window).on("load",function()
            {

              linechart();

              $("#2").click(function() {

                var o=$("#myChart");

                new Chart(o, {
       type:"line", options: {
           responsive:!0, maintainAspectRatio:!1, legend: {
               display: false
           }
           , hover: {
               mode: "label"
           }
           , scales: {
                    xAxes:[ {
                      display:!0, gridLines: {
                        color: "#4C8FC4"
                      }
                    }
                    ], yAxes:[ {
                      display:!0, gridLines: {
                        color: "#4C8FC4"
                      }
                    }
                    ]
                  }
           , title: {
               display: !0, text: ""
           }
       }
       , data: {
           labels:["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"], datasets:[ {
               label: "AVG. Age", data: [<?=intval($analytics['avg_age'])?>, 0, 0, 0, 0, 0, 0], backgroundColor: "#4f97cf", borderColor: "transparent", pointBorderColor: "#5175E0", pointBackgroundColor: "#FFF", pointBorderWidth: 2, pointHoverBorderWidth: 2, pointRadius: 4
           }
           ]
       }
   }
   
   )

              })

              $("#1").click(function() {

                var o=$("#myChart");

                new Chart(o, {
     type:"line", options: {
         responsive:!0, maintainAspectRatio:!1, legend: {
             display: false
         }
         , hover: {
             mode: "label"
         }
         , scales: {
                    xAxes:[ {
                      display:!0, gridLines: {
                        color: "#4C8FC4"
                      }
                    }
                    ], yAxes:[ {
                      display:!0, gridLines: {
                        color: "#4C8FC4"
                      }
                    }
                    ]
                  }
         , title: {
             display: !0, text: ""
         }
     }
     , data: {
         labels:["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"], datasets:[ {
             label: "Visitors", data: [<?=intval($analytics['total_visitors'])?>, 0, 0, 0, 0, 0, 0], backgroundColor: "#ec0bad", borderColor: "transparent", pointBorderColor: "#ec0bad", pointBackgroundColor: "#FFF", pointBorderWidth: 2, pointHoverBorderWidth: 2, pointRadius: 4
         }
         ]
     }
 }
 
 )

              })



            })


          </script>



        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-2 col-md-12 col-xs-12 col-sm-12 plr0">
 <div class="card">
   <div class="card-header">

    <div class="heading-elements">

     <button type="button" class="btn btn-outline-secondary round btn-min-width-cs mr-1 btn-custom-hvr mb-1 btn-block" data-toggle="dropdown" aria-haspopup="true"><i class="pr-1 fas fa-sort-down"></i> Last Year <i class="pl-1 fas fa-ellipsis-v"></i></button>
     <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>

  </div>
</div>
<div class="">
  <h5 class="header-title pb-3 mt-0 "></h5>
  <div class="row justify-content-center">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 plr0 text-center">
      <button onclick="linechart()" id="0" type="button" class="btn btn-outline-secondary round btn-min-width  mb-1  btn-custom-hvr">All</button>
      <button id="1" type="button" class="btn btn-outline-secondary round btn-min-width  mb-1 btn-custom-hvr">Amount of visitors</button>
      <!--  <button id="1" type="button" class="btn btn-outline-secondary round btn-min-width  mb-1  btn-custom-hvr">male vs female</button> -->
      <button id="2" type="button" class="btn btn-outline-secondary round btn-min-width  mb-1  btn-custom-hvr">AVG. Age</button>

      <!--  <button id="3" type="button" class="btn btn-outline-secondary round btn-min-width  mb-1  btn-custom-hvr">avg. time</button> -->
    </div>
  </div>



</div>
</div>
</div>
</div>
</div>
</div>
