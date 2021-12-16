<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0 order by id desc');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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

    .expand-collapse {
        max-width: 960px;
        margin: 0 auto;
    }

    .expand-collapse p {
        background-color: #E5E0C5;
        padding: 20px;
        margin: 0;
    }

    .expand-collapse div {
        padding: 0;
        margin: -2px 0 0 0;
    }

    .expand-collapse h5 {
        background-color: #BCB5B5;
        cursor: pointer;
        color: black;
        border-radius: 5px;
        padding: 20px;
        margin: 0 0 2px;
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
    <!--<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new flags</button>-->
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Manage bookings</h3>
        </div>
        <br><br>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Trek Name</th>
                            <th class="text-center">State</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Days</th>
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
                            <td><?php echo $data[$i]->trek_name; ?></td>
                            <td class="text-center"><?php echo $data[$i]->trek_region_state; ?></td>
                            <td class="text-center"><?php echo $data[$i]->trek_region_city; ?></td>
                            <td class="text-center"><?php echo $data[$i]->trek_days; ?> days</td>
                            <td class="text-center">
                                <button id="<?php echo $data[$i]->id; ?>-getDeparture"
                                    onclick="getModalDeparture(this.id)" class="btn btn-info" data-toggle="modal"
                                    data-target="#exampleModalDeparture"><i
                                        class="far fa-clock"></i></button>&nbsp;&nbsp;
                                <a class="btn btn-info" id="<?php echo $data[$i]->id; ?>-flag"
                                    href="admin.php?page=manage_booking_details&num=<?php echo $data[$i]->id; ?>"
                                    role="button"><i class="fas fa-hammer"></i> Manage</a>

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
    <div class="modal fade" id="exampleModalDeparture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trek Departure Deatils</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="departureDetailsBooking">


                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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