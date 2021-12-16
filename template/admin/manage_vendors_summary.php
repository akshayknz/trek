<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_flags where trek_flag_status=0 order by id desc');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example of Employee Table with twitter bootstrap</title>
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

    .cds {
        min-width: 85% !important;
        min-height: 40px !important;
        white-space: nowrap !important;
        margin-left: 10px;
        background-color: white;
        border-radius: 3px;
        box-shadow: 8px 6px;

    }

    .cds1 {
        min-width: 85% !important;
        min-height: 40px !important;
        white-space: nowrap !important;
        margin-left: 10px;
        background-color: #F3C08A !important;
        border-radius: 3px;
        box-shadow: 8px 6px;

    }

    .editors-dep {
        float: right;
    }


    .cds:hover {
        transform: scale(1.05);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
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
    <!--   <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new flags</button> -->
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Rent Summary</h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6" style="min-height: 450px;background-color: #C0C7D3;">
                <center>
                    <div class="row header"
                        style="text-align:center;color:black;margin-left: 20px;margin-top: 10px;padding: 5px;">
                        <h3>Completed Treks</h3>
                    </div>
                </center>
                <hr>
                <div class="row col-md-12 col-lg-12 col-xl-12">
                    <div class="card cds">

                        <div style="margin-top: 10px;text-align: center;">RishiKesh RishiKesh - 12-05-2021<span
                                class="editors-dep"><i class="far fa-check-circle"
                                    style="color: green;cursor: pointer;">&nbsp;Completed</i></span></div>
                    </div><br><br>
                    <div class="card cds">

                        <div style="margin-top: 10px;text-align: center;">RishiKesh RishiKesh - 12-05-2021<span
                                class="editors-dep"><i class="far fa-check-circle"
                                    style="color: green;cursor: pointer;">&nbsp;Completed</i></span></div>
                    </div><br><br>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5" style="min-height: 450px;background-color: #A5B3CB;">
                <center>
                    <div class="row header"
                        style="text-align:center;color:black;margin-left: 20px;margin-top: 10px;padding: 5px;">
                        <h3>Maintenance Block</h3>
                    </div>
                </center>
                <hr>
                <div class="row">
                    <div class="card cds1">

                        <div style="margin-top: 10px;text-align: center;">RishiKesh RishiKesh - 12-05-2021<span
                                class="editors-dep"><a href="admin.php?page=manage_maintenanceblock&num=departure_id"><i
                                        class="fas fa-redo-alt"
                                        style="color: red;cursor: pointer;">&nbsp;&nbsp;Restore</i></a></span></div>
                    </div><br><br>

                </div>
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