<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT id,trek_tth_fname,trek_tth_email,trek_tth_package,trek_tth_phone,trek_tth_status,trek_updated_time,trek_info_read_status FROM ' . $table_prefix . 'trek_user_customization where trek_tth_status!=1 order by id DESC');

// print_r(json_encode($data));
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>Example of Employee Table with twitter bootstrap</title> -->
    <meta name="description" content="">
    <style>
    @media only screen and (max-width: 600px) {
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            opacity: 0.9;
            background: url('<?php echo plugins_url('trek/assets/admin/uploads/dual1.gif') ?>') 50% 50% no-repeat rgb(249, 249, 249);
            display: none;
        }
    }

    @media only screen and (min-width: 600px) {
        .loader {
            position: fixed;
            left: 160px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            opacity: 0.9;
            background: url('<?php echo plugins_url('trek/assets/admin/uploads/dual1.gif') ?>') 42% 50% no-repeat rgb(249, 249, 249);
            display: none;
        }
    }

    .myButton {
        padding: 30px;
        display: block;
        float: right;
        background-color: green;
        color: white;
        text-align: center;
        margin-bottom: 25px;
        margin-right: 25px;
    }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
</head>

<body style="margin:20px auto">

    <div class="loader" id="loader">

    </div>

    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Customize Trek - User Response</h3>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">Package</th>
                            <th class="text-center">Enquiry Date</th>
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
                        <tr class="status-color" data-status=<?= $data[$i]->trek_tth_status ?>>
                            <td class="text-center"><?php echo $j; ?></td>
                            <td style="text-align: center;"><?php echo $data[$i]->trek_tth_fname; ?></td>
                            <td style="text-align: center;"><?php echo $data[$i]->trek_tth_email; ?></td>

                            <td style="text-align: center;"><?php echo $data[$i]->trek_tth_phone; ?></td>
                            <td style="text-align: center;"><?php echo $data[$i]->trek_tth_package; ?></td>
                            <?php
                            if($data[$i]->trek_info_read_status==1){
                                ?>
                                <td class="text-center"><?php echo $data[$i]->trek_updated_time; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-envelope" style="color:green;"></i></td>

                                <?php
                            }else{
                                ?>
                                <td class="text-center"><?php echo $data[$i]->trek_updated_time; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-envelope-open"></i></td>
                                <?php
                            }
                            ?>
                            
                            <td style="text-align: center;"  data-order="<?= $data[$i]->trek_tth_status ?>">
                                <select 
                                    data-id="<?= $data[$i]->id ?>" 
                                    onChange = "updateStatus(event);"
                                    name="status" 
                                    id="status">
                                    <option value="0" <?= ($data[$i]->trek_tth_status == 0)? "selected":null ?>>Pending</option>
                                    <option value="2" <?= ($data[$i]->trek_tth_status == 2)? "selected":null ?>>Converted</option>
                                    <option value="3" <?= ($data[$i]->trek_tth_status == 3)? "selected":null ?>>Cancelled</option>
                                </select>
                            </td>
                            
                            <td class="text-center">
                                <a class="btn btn-info" role="button" href="admin.php?page=view_customize_trek_details&num=<?php echo $data[$i]->id; ?>">View</a>
                               
                            </td>
                        </tr>
                        <?php
}
?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Notes</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Enter notes:</p>
          <div >
              <textarea class="form-control" name="" id="statusNote" cols="30" rows="10"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="submitStatus()">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
</body>
<style>
.status-color[data-status="2"]{
    background-color: #00ff064d !important;
}
.status-color[data-status="3"]{
    background-color: #ff000040 !important;
}
</style>
<script>
$(document).ready(function() {
    $('#myTable').dataTable();
});

var data = new FormData()
const updateStatus = (e) => {
    data = new FormData()
    $('#myModal').modal('show');
    e.currentTarget.closest('tr').dataset.status = e.currentTarget.value
    data.append('action', 'updateStatusCustomizeTrek')
    data.append('id', e.currentTarget.dataset.id)
    data.append('status', e.currentTarget.value)
    data.append('statusText', e.currentTarget.options[e.currentTarget.selectedIndex].text)
    currentItem = e.currentTarget.dataset.id
}
$('#myModal').on('hidden.bs.modal', function (e) {
    if(!data.has('note')){
        data.append('note', '')
    }
    sendUpdateStatusRequest(data);
    $(this).off('hidden.bs.modal');
})
const submitStatus = () => {
    data.append('note', document.querySelector('#statusNote').value)

}
const sendUpdateStatusRequest = (data) => {
    jQuery("#loader").css("display", "block")
    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_objs.ajax_url_pages,
      data: data,
      success: function(msg) {
        jQuery("#loader").css("display", "none")
      }
   });
   location.reload();
}
</script>

</html>