<style type="text/css">
   .daterange{
      text-align: center;
   }
</style>

      <div class=" col-md-9 col-lg-10 col-xl-10 col-sm-12 col-xs-12 pr30 pl30sm "> 
   <?php
   include 'first_div.php';

   include 'second_div.php';
 
   include 'third_div.php';
 
   include 'fourth_div.php';
   ?> 
      </div> 





<script type="text/javascript">

$(document).ready(function(){


    $('input[name="dates"]').daterangepicker({
        "autoApply": true,
         // "startDate": "03/26/2019",
         // "endDate": "04/01/2019",
         "opens": "center"
}, function(start, end, label) {

   window.location.href = "<?=base_url()?>/analytics/dashboard/<?=$locationID?>?daterange="+start.format('YYYY-MM-DD')+'/'+ end.format('YYYY-MM-DD');

  });

    $('input[name="dates"]').val('Date Filter');

    <?php
      if (isset($start_date) && isset($end_date)) {
         ?>

         $('input[name="dates"]').data('daterangepicker').setStartDate('<?=$start_date?>');
         $('input[name="dates"]').data('daterangepicker').setEndDate('<?=$end_date?>');
           

      <?php
      }
    ?>


 $(".change_emotions").click(function(){

  var filter = $(this).data("filter");

  $(".emotion_filter").html(filter);

  $.ajax({
    url: "<?=base_url("videos/change_emotions")?>",
    data:{
      filter: filter,
      daterange: "<?php echo $this->input->get('daterange') ?>"
    },
    type: "POST",
    datatype: "json",
    success:function(res){
      res = JSON.parse(res);
      if (filter == "Percentage") {
        
        $(".happy_text").html(res.happy_cent+"%");
        $(".normal_text").html(res.normal_cent+"%");
        $(".sad_text").html(res.sad_cent+"%");

        $(".male_text").html(res.male_cent+"%")
        $(".female_text").html(res.female_cent+"%")

        trs = '';
        $.each(res.age_group,function(k,v){

          if (v != 0) {
            trs += `
              <tr>
              <td>`+k+`</td>
              <td>`+(v/res.total_visitors*100)+`%</td>
              </tr>
            `; 
          }          

        })

        $(".age_groups").html(trs);


      }else{
            $(".happy_text").html(res.happy_cent);
          $(".normal_text").html(res.normal_cent);
          $(".sad_text").html(res.sad_cent);

           $(".male_text").html(res.male_cent)
          $(".female_text").html(res.female_cent)


        trs = '';
        $.each(res.age_group,function(k,v){

          if (v != 0) {
            trs += `
              <tr>
              <td>`+k+`</td>
              <td>`+v+`</td>
              </tr>
            `; 
          }          

        })

        $(".age_groups").html(trs);

      }
    }

  })

  return false;

 });   

    



    
  
})




</script>

