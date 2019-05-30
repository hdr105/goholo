<!DOCTYPE html><html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <style type="text/css">
.topbar{
	width: 500px;
	height:150px;
	margin-left: auto;	
}
.logo-tag{
	font-size:20px;
	font-weight:bold;
}
.nav-name{
	font-family: Arial;
	diplay:inline;
	font-size:15px; 
	margin-left:20px;
	margin-right:0px;
	padding-left:25px;
	padding-right:25px;
	padding-top:12px;
	padding-bottom:12px;
	background-color:#67a7d9;
	border-radius:5px;
	color:white;
	}
	.dataresponse{
font-size:20px; 
   font-family: Arial;
}
.positive{
	font-size:20px; 
   font-family: Arial;
}
.circle{
	width: 60px;
	border: 1px solid black;
	border-radius:200%;
	height: 60px;
	text-align: center; 
}
.circlebig{
	width: 80px;
	border: 1px solid black;
	border-radius:250%;
	height: 80px;
	text-align: center; 
}
.persentage{
	margin-left:10px;
}

@media (max-width: 998px){
   .logo{
	width: 300px;
	height:120px;
	margin-left: auto;	
  }
  .nav-name{
		font-family: Arial;
		diplay:inline;
		font-size:15px; 
		margin-left:20px;
		margin-right:0px;
		padding-left:20px;
		padding-right:20px;
		padding-top:12px;
		padding-bottom:12px;
		background-color:#67a7d9;
		border-radius:5px;
		color:white;
	}
	.positive{
		font-size:15px; 
	   font-family: Arial;
	}
}
</style></head>
<body>
	   	       <div class="topbar" style="margin-left:20%;">
				<?php
					$path =  base_url().'/assets/images/report/logo.png';
				    $type = pathinfo($path, PATHINFO_EXTENSION);
				    $data = file_get_contents($path);
				    $base64_logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
				?>
	  	          <img src="<?=$base64_logo?>" class="logo">
				  <div style="margin-left:65%; margin-top:7%;">
					<div class="logo-tag"> Ad Report Card</div>
				   </div>
	           </div>
					   <table>
			
			<td  ><div style="font-size: 12px;" class="nav-name"><?=$analytics['add']->location_name?></div></td>
			<td ><div style="font-size: 12px;" class="nav-name"><?=$analytics['add']->start_date?>-<?=$analytics['add']->end_date?></div></td>
			<td ><div style="font-size: 12px;" class="nav-name"><?=$analytics['total_visitors']?> Total Views</div></td>
			<td ><div style="font-size: 13px;" class="nav-name">Avg.Age <?=$analytics['avg_age']?></div></td>
			</table>
			
			
			<br><br><br>
<table>
<tr>
<td width="10">&nbsp;</td>
<td width="160"><div class="dataresponse">Ad Response:</div></td>
<td width="220"><div class="dataresponse">View Time:</div></td>
<td width="140"><div class="dataresponse">Male vs Female:</div></td>
</tr>
<tr>
<td>&nbsp;</td >
</tr>

<td></td >
<td>
		<table>
		<tr>
		<td><img src="<?=@getBase64Image('images/report/positive.png')?>" class="emogi"></td>
		<td><div class="positive">Positive <?=$analytics['happy_cent']?>%</div></td>
		</tr>
		</table>
		<br>
		<table>
		<tr>
		<td><img src="<?=@getBase64Image('images/report/negative.png')?>" class="emogi"></td>
		<td><div class="positive">Negative <?=$analytics['sad_cent']?>%</div></td>
		</tr>
		</table>
		<br>
		<table>
		<tr>
		<td><img src="<?=@getBase64Image('images/report/neutral.png')?>" class="emogi"></td>
		<td><div class="positive">Neutral <?=$analytics['normal_cent']?>%</div></td>
		</tr>
		</table>
</td>
<td>
		<table>
		<tr>
			<td width="30">
					 <div class="circle">
						 <div style="font-size: 13px; margin-top:20px;">30 sec
						 </div><br><br><br>
						 <div>Shortest</div> 
					 </div>
			</td>
			<td width="30">
					 <div class="circlebig">
						 <div style="font-size: 13px; margin-top:30px;">30 sec
						 </div><br><br><br>
						 <div>Average</div> 
					 </div>
			</td>
			<td width="30">
					 <div class="circle">
						 <div style="font-size: 13px; margin-top:20px;">30 sec
						 </div><br><br><br>
						 <div>Longest</div> 
					 </div>
			</td>
</tr>			
		</table>
</td>
<td>
	<table>
		<tr>
			<td>
				<img width="70" src="<?=@getBase64Image('images/report/man.png')?>" class="emogi-img">
			</td>				
	   	    <td>
				<img width="70" src="<?=@getBase64Image('images/report/women.png')?>" class="emogi-img">
	   	    </td>
		</tr>
			<tr>
				<td style="text-align: center;"><?=$analytics['male_cent']?>%</td>			
	   	    	<td style="text-align: center;"><?=$analytics['female_cent']?>%</td>
		</tr>		
	</table>
</td>

</table>

<br><br><br>		

<table>
<tr>
<td width="300"><div class="dataresponse">Phone Type:</div></td>
<td width="200"><div class="dataresponse">Age Group:</div></td>
</tr>

<tr>
		<td >
		<table>
		
		 <tr>
			<td><img src="<?=@getBase64Image('images/report/apple.jpg')?>" width="70" class="emogi-img"></td>
			<td><img src="<?=@getBase64Image('images/report/p1.png')?>" width="70" class="emogi-img"></td>
			<td><img src="<?=@getBase64Image('images/report/huawei.png')?>" width="70" class="emogi-img"></td>
			<td><img src="<?=@getBase64Image('images/report/sumsung.png')?>" width="70" class="emogi-img"></td>
			<td><img src="<?=@getBase64Image('images/report/htc.png')?>" width="70" class="emogi-img"></td>
		 </tr>
		 <tr>
			<td style="text-align: center;">10%</td>
			<td style="text-align: center;">30%</td>
			<td style="text-align: center;">40%</td>
			<td style="text-align: center;">50%</td>
			<td style="text-align: center;">80%</td>
		 </tr>
		 
		</table>
		</td>
		<td>
		<table >
			
				<tr >
					<td style="border-bottom:1px solid gray;" width="50">&nbsp;</td>
					<th style="padding:10px; border-bottom:1px solid gray;" width="100">Age</th>
					<th style="padding:10px; border-bottom:1px solid gray;" width="100">Total</th>
				</tr>

				       <?php

                              foreach ($analytics['age_group'] as $key => $value) {
                                 
                                 if ($value != 0) {
                                    

                                 echo "<tr>

                                 <td style='border-bottom:1px solid gray;' width='50'>&nbsp;</td>
                                 <td style='padding:10px; border-bottom:1px solid gray;' width='100'>".$key."</td>
                                 <td style='padding:10px; border-bottom:1px solid gray;' width='100'>".($value/$analytics['total_visitors']*100)."%</td>
                                 </tr>";
                                 }
                              }

                              ?>

				
		</table>
		</td>
		

</tr>


</table>

<table >
<tr style="padding-top: 30%;">
<td width="220"><div class="dataresponse">Log:</div></td>
</tr>

<tr>
		<td>
		<table>
			
				<tr >
					<th width="120" style="padding:10px; border-bottom:1px solid gray;" width="100">Sr.</th>
					<th width="120" style="padding:10px; border-bottom:1px solid gray;" width="100">Age</th>
					<th width="120" style="padding:10px; border-bottom:1px solid gray;" width="100">Nationality</th>
					<th width="120" style="padding:10px; border-bottom:1px solid gray;" width="100">Gender</th>
				</tr>
			<!-- 	<tr>
					<td style="border-bottom:1px solid gray;" width="100">1</td>
					<td style="padding:10px; border-bottom:1px solid gray;" width="100">21</td>
					<td style="padding:10px;  border-bottom:1px solid gray;" width="100">Asian</td>
					<td style="padding:10px;  border-bottom:1px solid gray;" width="100">Male</td>
				</tr>
				<tr>
					<td style="border-bottom:1px solid gray;" width="100">1</td>
					<td style="padding:10px; border-bottom:1px solid gray;" width="100">21</td>
					<td style="padding:10px;  border-bottom:1px solid gray;" width="100">Asian</td>
					<td style="padding:10px;  border-bottom:1px solid gray;" width="100">Male</td>
				</tr>
				<tr>
					<td style="border-bottom:1px solid gray;" width="100">1</td>
					<td style="padding:10px; border-bottom:1px solid gray;" width="100">21</td>
					<td style="padding:10px;  border-bottom:1px solid gray;" width="100">Asian</td>
					<td style="padding:10px;  border-bottom:1px solid gray;" width="100">Male</td>
				</tr> -->

				       <?php
                              $i = 1;
                              
                              foreach ($analytics['unique_visitors'] as $key => $value) {
                                 
                                 echo "<tr>
                                 <td style='border-bottom:1px solid gray;' width='100' >".$i."</td>
                                 <td style='padding:10px; border-bottom:1px solid gray;' width='100'>".$value->age."</td>
                                 <td style='padding:10px; border-bottom:1px solid gray;' width='100'>".$value->nationality."</td>
                                 <td style='padding:10px; border-bottom:1px solid gray;' width='100'>".($value->gender == 'M' ? 'Male': 'Female')."</td>
                                 </tr>";

                                 $i++;
                              }

                              ?>
				
		</table>
		</td>
		

</tr>
</table>

		
<!--
	   <section>
<div class="" style="text-align: center; padding-top: 5%">
	           	   <div style="width: 20%; float: left; padding-left: 5%; padding-right: 2.5%">
	           	   	  <p class=" nav-name">Campaign Name</p>
	           	   </div>
	           	   <div style="width: 20%; float: left; padding-right: 2.5%">
	           	   	  <p class=" nav-name">05/01/19-05/14/19</p>
	           	   </div>
	           	   <div style="width: 20%; float: left; padding-right: 2.5%">
	           	   	  <p class=" nav-name">399 Total Views</p>
	           	   </div>
	           	   <div style="width: 20%; float: left;">
	           	   	  <p class=" nav-name">Avg.Age 25</p>
	           	   </div>
	           </div>
</section>

	   <section style="margin-top:5%;">
	   	      		 <div style="margin-left:10%; position: absolute;">
	   	   
	   	       	     	   <h4 style="font-weight: 600; ">Ad Response:</h4>
	   	       	     	   <ul style="list-style: none;">
	   	       	     	   	 <li style="margin-bottom: 10px">
	   	       	     	   	 	<img src="<?=@getBase64Image('images/report/positive.png')?>" class="emogi" style="margin-top: 10px">
	   	       	     	   	 	<span class="emogi-tag">Positive -45%</span>
	   	       	     	   	 </li>
	   	       	     	   	 <br>
	   	       	     	   	  <li style="margin-bottom: 10px">
	   	       	     	   	  	<img src="<?=@getBase64Image('images/report/negative.png')?>" class="emogi" style="margin-top:10px">
	   	       	     	   	  	<span class="emogi-tag">Negative -35%</span>
	   	       	     	   	 	
	   	       	     	   	 </li>
	   	       	     	   	 <br>
	   	       	     	   	  <li style="margin-bottom: 10px">
	   	       	     	   	  	<img src="<?=@getBase64Image('images/report/neutral.png')?>" class="emogi" style="margin-top:10px">
	   	       	     	   	  	<span class="emogi-tag">Neutral -20%</span>
	   	       	     	   	 	
	   	       	     	   	 </li>
	   	       	     	   </ul>
					</div>
					<div style="float:right;">
	   	       	     	      <h4 style="font-weight: 600; ">Male vs Female:</h4><br>
	   	       	     	<!--        <div class="d-flex mx-auto" >
	   	       	     	     	<div class="mr-auto box" >
	   	       	     	     		 <div class="pic ">
	   	       	     	     	      <img src="images/women.png" class="emogi-img">
			   	       	     	     </div><div>40%</div> 
	   	       	     	     	</div>
	   	       	     	     	
	   	       	     	     	 <div  class="mr-auto box"  >
	   	       	     	     	 	<div class="pic mr-auto">
			   	       	     	     	<img src="images/man.png" class="emogi-img">
			   	       	     	     </div><div>55%</div> 
	   	       	     	     	 </div>
			   	       	     	     
			   	       	     	     
	   	       	     	     </div> 
	   	       	    
	   	       	   
	   	       		</div>
	   </section><br>
	   <section class="container" style="margin-top:50px;">
	   	        <div class="row mx-auto">
	   	       	     
	   	       	       <div class="col-lg-6 mx-auto">
	   	       	     	      <h4 style="font-weight: 600; ">Phone Type:</h4><br>
	   	       	     	   <div class="d-flex mx-auto pic-responsive" >
	   	       	     	     	<div class="mr-auto box" >
	   	       	     	     		 <div class="pic ">
	   	       	     	     	      <img src="images/apple.jpg" class="mobile-img">
			   	       	     	     </div><div>40%</div> 
	   	       	     	     	</div>
	   	       	     	     	
	   	       	     	     	 <div  class="mr-auto box"  >
	   	       	     	     	 	<div class="pic mr-auto">
			   	       	     	     	<img src="images/p1.png" class="mobile-img">
			   	       	     	     </div><div>55%</div> 
	   	       	     	     	 </div>
	   	       	     	     	  
			   	       	     	     	<div class="mr-auto box" >
			   	       	     	     		 <div class="pic ">
			   	       	     	     	      <img src="images/huawei.png" class="mobile-img">
					   	       	     	     </div><div>40%</div> 
			   	       	     	     	</div>
			   	       	     	     	
			   	       	     	     	 <div  class="mr-auto box"  >
			   	       	     	     	 	<div class="pic mr-auto">
					   	       	     	     	<img src="images/sumsung.png" class="mobile-img">
					   	       	     	     </div><div>55%</div> 
			   	       	     	     	 </div>
			   	       	     	     	  <div  class="mr-auto box"  >
			   	       	     	     	 	<div class="pic mr-auto">
					   	       	     	     	<img src="images/htc.png" class="mobile-img">
					   	       	     	     </div><div>55%</div> 
			   	       	     	     	 </div>
			   	       	     	     
			   	       	     	     
	   	       	        </div>
	   	        </div>
	   	        <div class="col-lg-6 mx-auto">
	   	        	<h4 style="font-weight: 600; ">Age Group:</h4><br>

	   	        	<table class="table"  style="text-align: center">
	   	        		<tr>
	   	        			<td class="mx-auto">
	   	        				<th>Age</th>
	   	        			</td>
	   	        			<td>
	   	        				<th class="mx-auto">Total</th>
	   	        			</td>
	   	        		</tr>
	   	        		<tr>
	   	        			<td >
	   	        				<th class="mx-auto t-data">21-25</th>
	   	        			</td>
	   	        			<td>
	   	        				<th class="mx-auto t-data">25%</th>
	   	        			</td>
	   	        		</tr>
	   	        		<tr>
	   	        			<td >
	   	        				<th class="mx-auto t-data">26-30</th>
	   	        			</td>
	   	        			<td>
	   	        				<th class="mx-auto t-data">50%</th>
	   	        			</td>
	   	        		</tr>
	   	        		<tr>
	   	        			<td >
	   	        				<th class="mx-auto t-data">31-35</th>
	   	        			</td>
	   	        			<td>
	   	        				<th class="mx-auto t-data">25</th>
	   	        			</td>
	   	        		</tr>
	   	        
	   	        	</table>
	   	        </div>
	   	   </div>
	   </section>

	   <section class="container" style="margin-top:50px;">
	   	<h4 style="font-weight: 600; ">Log:</h4><br>
	   	         <table class="table last-table" >
	   	         	  <tr>
	   	         	  	<th class="mx-auto">Sr.</th>
	   	         	  	<th class="mx-auto">Age</th>
	   	         	  	<th class="mx-auto">Nationality</th>
	   	         	  	<th class="mx-auto">Gender</th>
	   	         	  </tr>
	   	         	   <tr>
	   	         	  	<td class="mx-auto">2</td>
	   	         	  	<td class="mx-auto">26</td>
	   	         	  	<td class="mx-auto">Asian</td>
	   	         	  	<td class="mx-auto">Male</td>
	   	         	  </tr>
	   	         	  <tr>
	   	         	  	<td class="mx-auto">3</td>
	   	         	  	<td class="mx-auto">21</td>
	   	         	  	<td class="mx-auto">Asian</td>
	   	         	  	<td class="mx-auto">Male</td>
	   	         	  </tr>
	   	         	  <tr>
	   	         	  	<td class="mx-auto">4</td>
	   	         	  	<td class="mx-auto">31</td>
	   	         	  	<td class="mx-auto">Asian</td>
	   	         	  	<td class="mx-auto">Male</td>
	   	         	  </tr>
	   	         	  <tr>
	   	         	  	<td class="mx-auto">5</td>
	   	         	  	<td class="mx-auto">28</td>
	   	         	  	<td class="mx-auto">Asian</td>
	   	         	  	<td class="mx-auto">Male</td>
	   	         	  </tr>
	   	         	  <tr>
	   	         	  	<td class="mx-auto">6</td>
	   	         	  	<td class="mx-auto">26</td>
	   	         	  	<td class="mx-auto">Asian</td>
	   	         	  	<td class="mx-auto">Male</td>
	   	         	  </tr>
	   	         	    <tr>
	   	         	  	<td class="mx-auto">7</td>
	   	         	  	<td class="mx-auto">28</td>
	   	         	  	<td class="mx-auto">Asian</td>
	   	         	  	<td class="mx-auto">Male</td>
	   	         	  </tr>
	   	         	  <tr>
	   	         	  	<td class="mx-auto">8</td>
	   	         	  	<td class="mx-auto">21</td>
	   	         	  	<td class="mx-auto">Asian</td>
	   	         	  	<td class="mx-auto">Male</td>
	   	         	  </tr>
	   	         </table>
	   </section><br><br> -->
	 


</body>
</html>