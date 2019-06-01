<!DOCTYPE html><html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
      <style type="text/css">
      	    @font-face {
  font-family: 'Open Sans';
  src: url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
}
      	body {
      background: white; 


    font-family: 'Roboto', sans-serif;

     margin:0; }
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
	diplay:inline;
	font-size:12px; 
	margin-left:8px;
	margin-right:0px;
	padding-left:20px;
	padding-right:20px;
	padding-top:12px;
	padding-bottom:12px;
	background-color:#67a7d9;
	border-radius:5px;
	color:white;
	font-weight: bold;
	}
	.dataresponse{
font-size:20px; 
}
.positive{
	font-size:20px; 
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

</style></head>
<body>
	   	       <div class="topbar" style="margin-left:5%;">
				<?php
					$path =  base_url().'/assets/images/report/logo.png';
				    $type = pathinfo($path, PATHINFO_EXTENSION);
				    $data = file_get_contents($path);
				    $base64_logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
				?>
	  	          <img src="<?=$base64_logo?>" style="width: 70%" >
				  <div style="margin-left:75%; margin-top:-7%; width: 40%">
					<div class="logo-tag"> Ad Report Card</div>
				   </div>
	           </div>
					   <table style="margin-top: -5% ">
			<td  ><div  class="nav-name"><?=$analytics['add']->location_name?></div></td>
			<td ><div  class="nav-name"><?=$analytics['add']->start_date?>-<?=$analytics['add']->end_date?></div></td>
			<td ><div style="width: 90px"  class="nav-name"><?=$analytics['total_visitors']?> Total Views</div></td>
			<td ><div  class="nav-name">Avg.Age <?=$analytics['avg_age']?></div></td>
			</table>
<table style="margin-top: 5% ">
<tr>
<td width="10">&nbsp;</td>
<td width="160" ><div class="dataresponse">Ad Response:</div></td>
<!-- <td width="220"><div class="dataresponse">View Time:</div></td>
 --><td width="220"><div class="dataresponse">&nbsp;</div></td>
<td width="200"><div class="dataresponse">Male vs Female:</div></td>
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
<!-- <td>
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
</td> -->
<td>
		<table>
		<tr>
			<td width="30">
					 <div class="">
						&nbsp;
					 </div>
			</td>
			<td width="30">
					 <div class="">
						 &nbsp; 
					 </div>
			</td>
			<td width="30">
					 <div class="">
						&nbsp;
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



<?php

if (!empty($analytics['age_group'])) {
?>

<br><br><br>		

<table>
<tr>
<td width="200"><div class="dataresponse">Age Group:</div></td>
</tr>

<tr>
	
	<td>
		<table >
			
				<tr >
					<td style="border-bottom:1px solid gray;" width="50">&nbsp;</td>
					<th style="padding:10px 60px; border-bottom:1px solid gray;" width="100">Age</th>
					<th style="padding:10px 60px; border-bottom:1px solid gray;" width="100">Total</th>
				</tr>

				       <?php

                              foreach ($analytics['age_group'] as $key => $value) {
                                 
                                 if ($value != 0) {
                                    

                                 echo "<tr>

                                 <td style='border-bottom:1px solid gray;' width='50'>&nbsp;</td>
                                 <td style='padding:10px 60px; border-bottom:1px solid gray;' width='100'>".$key."</td>
                                 <td style='padding:10px 60px; border-bottom:1px solid gray;' width='100'>".($value/$analytics['total_visitors']*100)."%</td>
                                 </tr>";
                                 }
                              }

                              ?>

				
		</table>
		</td>
		

</tr>


</table>

<?php
}
if (!empty($analytics['unique_visitors'])) {

?>

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

<?php
}
?>
</body>
</html>