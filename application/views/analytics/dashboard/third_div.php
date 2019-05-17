<div class="card">
   <div class="card-body">
      <div class="row">
        
            <div class="offset-md-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
               <div class="card">
                  <div class="card-header">
                     <h5 class="header-title pb-3 mt-0 title title-sm">AGE GROUPS <!-- <span class="badge pink_bdg ">9</span> --></h5>
                     
                  </div>
                  <div class="">
                     <div class="table-responsive text-center">
                        <table class="table table-hover mb-0">
                           <thead>
                              <tr class="align-self-center">
                                 <th>Age</th>
   
                                 <th>Total</th>
                                
                              </tr>
                           </thead>
                           <tbody class="age_groups">
                              <?php

                              foreach ($analytics['age_group'] as $key => $value) {
                                 
                                 if ($value != 0) {
                                    

                                 echo "<tr>

                                 <td>".$key."</td>
                                 <td>".($value/$analytics['total_visitors']*100)."%</td>
                                 </tr>";
                                 }
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
