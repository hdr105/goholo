<div class="card">
      <div class="card-body">
<div class="row">

            <div class="offset-md-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
               <div class="card">
                  <div class="card-header">
                     <h5 class="header-title pb-3 mt-0 title title-sm">Log</h5>
                     
                  </div>
                  <div class="">
                     <div class="table-responsive text-center">
                        <table class="table table-hover mb-0">
                           <thead>
                              <tr class="align-self-center">
                                <th>Sr.</th>
                                 <th>Age</th>
                                 <th>Nationality</th>
                                 <th>Gender</th>
   
                                 
                                
                              </tr>
                           </thead>
                              <tbody>
                              <?php
                              $i = 1;
                              
                              foreach ($analytics['unique_visitors'] as $key => $value) {
                                 
                                 echo "<tr>
                                 <td>".$i."</td>
                                 <td>".$value->age."</td>
                                 <td>".$value->nationality."</td>
                                 <td>".($value->gender == 'M' ? 'Male': 'Female')."</td>
                                 </tr>";

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
