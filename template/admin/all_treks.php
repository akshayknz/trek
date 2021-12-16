







<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT id,trek_name,trek_region_country,trek_distance,trek_trail_type,trek_best_months,trek_about_trek,trek_updated_time,trek_publish_status,trek_altitude,trek_brief_itinerary FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0 order by id desc');

?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Example of Employee Table with twitter bootstrap</title>
      <meta name="description" content="">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
      <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
      </style>
      <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
      <!-- <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   </head>
   <style>
      @media only screen and (max-width: 600px) {
            .loader{
           position: fixed;
           left: 0px;
           top: 0px;
           width: 100%;
           height: 100%;
           z-index: 9999;
           opacity:0.9;
           background: url('<?php echo plugins_url('trek/assets/admin/uploads/dual1.gif') ?>')
                       50% 50% no-repeat rgb(249,249,249);
                       display: none;
         }
      }
         @media only screen and (min-width: 600px) {
            .loader{
           position: fixed;
           left: 160px;
           top: 0px;
           width: 100%;
           height: 100%;
           z-index: 9999;
           opacity:0.9;
           background: url('<?php echo plugins_url('trek/assets/admin/uploads/dual1.gif') ?>')
                       42% 50% no-repeat rgb(249,249,249);
                       display: none;
         }
         }
         .dot1 {
  height: 20px;
  width: 20px;
  background-color: #00cc44;
  border-radius: 50%;
  display: inline-block;
  margin-top: 8px;

}
.dot2 {
  height: 20px;
  width: 20px;
  background-color: #ff6666;
  border-radius: 50%;
  display: inline-block;
  margin-top: 8px;

}
   </style>

   <body style="margin:20px auto">
      <div class="loader" id="loader">

</div>
      <div class="container">
         <div class="row header" style="text-align:center;color:green">
            <h3>Trek</h3>
         </div>
         <div style="width: auto;margin-top: 50px;">
          <div class="table-responsive">
         <table id="myTable" class="table table-striped" >
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th class="text-center">Trek Name</th>
                  <th class="text-center">Region</th>
                  <th class="text-center">Distance</th>
                  <!-- <th class="text-center">Altitude</th> -->

                  <th class="text-center">Status</th>
                  <th class="text-center">Actions</th>
               </tr>
            </thead>
            <tbody>

                  <?php
$j = 0;
$count = count($data);

for ($i = 0; $i < $count; $i++) {
    $j++;

    ?>
                      <tr>
                     <td class="text-center"><?php echo $j; ?></td>
                     <td class="text-center"><?php echo $data[$i]->trek_name; ?></td>
                     <td class="text-center"><?php echo $data[$i]->trek_region_country; ?></td>
                     <td class="text-center"><?php echo $data[$i]->trek_distance; ?>&nbsp;Km</td>


                     <td class="text-center"><?php if ($data[$i]->trek_publish_status == '1') {?><a class="dot2"></a><?php } else if ($data[$i]->trek_publish_status == '0') {?><a class="dot1"></a><?php }?></td>

                     <td class="text-center"><a class="btn btn-primary" id="view_trek"
                          href="<?= site_url() ?>/trek_details_preview/?trek=<?php echo $data[$i]->id; ?>" target="_blank" role="button">Preview</a>&nbsp;&nbsp;<?php if ($data[$i]->trek_publish_status == '1') {if ($data[$i]->trek_brief_itinerary == 'completed') {
        ?>
                              <a class="btn btn-primary"style="width: 95px;color: white;" id="<?php echo $data[$i]->id; ?>-allunpublish1-<?php echo $data[$i]->trek_name; ?>"  onclick='allpageStatus(this.id,"pub")' role="button">Publish</a>
                            <?php

    } else {
        ?>
                            <a class="btn btn-primary"style="width: 95px;color: white;" id="<?php echo $data[$i]->id; ?>-allunpublish2-<?php echo $data[$i]->trek_name; ?>"  onclick='allpageStatus(this.id,"pub")' role="button">Publish</a>
                            <?php
}?><?php } else if ($data[$i]->trek_publish_status == '0') {?><a class="btn btn-primary" style="width: 95px;color: white;" id="<?php echo $data[$i]->id; ?>-allpublish-<?php echo $data[$i]->trek_name; ?>" onclick='allpageStatus(this.id,"pub")' role="button">Unpublish</a><?php }?>&nbsp;&nbsp;<a class="btn btn-info" href="admin.php?page=edit_treks_plugin&num=<?php echo $data[$i]->id; ?>"  id="<?php echo $data[$i]->id; ?>-alledit" onclick='allpageEdit(this.id)' role="button">Edit</a>&nbsp;<a class="btn btn-danger" id="<?php echo $data[$i]->id; ?>-alldelete" onclick='allpageDelete(this.id)' role="button">Delete</a></td>
                     </tr>

                     <?php
}
?>



            </tbody>
         </table>
       </div>
      </div>
      </div>

   </body>

   <script>
      $(document).ready(function(){
          $('#myTable').dataTable();
      });
   </script>
</html>