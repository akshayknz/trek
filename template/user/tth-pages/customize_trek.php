<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT id,trek_tth_fname,trek_tth_email,trek_tth_package,trek_tth_phone,trek_updated_time,trek_info_read_status FROM ' . $table_prefix . 'trek_user_customization where trek_tth_status="0" order by id DESC');

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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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

</body>

<script>
$(document).ready(function() {
    $('#myTable').dataTable();

});
</script>

</html>