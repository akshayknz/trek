<?php
defined('ABSPATH') or die('Hei, Access restricted!');
if (isset($_GET['num'])) {
    $ppc = $_GET['num'];
    if ($ppc == '') {
        die('Access restricted!');
    }
} else {
    die('Access restricted!');
}
global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
// $data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_userdetails where trek_user_status=0 order by id desc');
$query11 = "SELECT trek_name,id FROM wp_trektable_addtrekdetails where id=" . $ppc . " and trek_adddetails_status=0 limit 1";
$results11 = $wpdb->get_results($query11);
$trek_name = $results11[0]->trek_name;
if (empty($results11)) {
    die("No trek Exists!");
}

$query1 = "SELECT * FROM wp_trektable_trek_departure where trek_selected_trek=" . $ppc . " and trek_departure_status=0 order by trek_start_date asc";
$results1 = $wpdb->get_results($query1);
$alldeparturecount = count($results1);

$query12 = "select count(id) as tcount FROM wp_trektable_bookings where trek_selected_trek_id=" . $ppc . " and trek_booking_status=0 and book_activity_status='2'";
$results12 = $wpdb->get_results($query12);
$cancellationCount = $results12[0]->tcount;


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

    @media (min-width: 900px) {
        .modal-xlg {
            width: 90% !important;
        }
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
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
   
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">  
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
            <h3>Manage bookings&nbsp;<?php if (isset($trek_name)) {
    echo '- ' . $trek_name;
}?></h3>
        </div>
        <br>

        <div>
            <div>
                <button type="button" class="btn primary getUpcoming"
                    onclick="getModalDeparture('<?php echo $ppc; ?>-getDeparture','getReleventTrekUpcoming')">Upcoming
                    departure</button>&nbsp;&nbsp;
                <button type="button" class="btn primary getPrevious"
                    onclick="getModalDeparture('<?php echo $ppc; ?>-getDeparture','getReleventTrekPrevious')">Previous
                    departure</button>&nbsp;&nbsp;
                <button type="button" class="btn primary getAll"
                    onclick="getModalDeparture('<?php echo $ppc; ?>-getDeparture','getAllTrek')">Show All
                    departure</button>
                <?php
if ($cancellationCount > 0) {
    ?>
                <button type="button" class="btn btn-danger needAction"
                    onclick="cancellationActionButton('<?php echo $ppc; ?>-getCancelInfo')"
                    style="float: right;">Cancellation</button>
                <?php
} else {

    ?>
                <button type="button" class="btn btn-success" onclick="cancellationActionButton1()"
                    style="float: right;">Cancellation</button>
                <?php
}
?>


            </div>
            <br>
            <div class="booking-body" id="departureDetailsBooking">


            </div>
        </div>




    </div>
    <div class="modal fade" id="Modal_trekkers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trek Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Dob</th>
                                    <th class="text-center">Height</th>
                                    <th class="text-center">Weight</th>

                                </thead>
                                <tbody id="trekkersDetailsBooking">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal_owner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Owner details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="ownerDetailsBooking">


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
    // $('#myTable').dataTable();
    getModalDeparture("<?php echo $ppc; ?>-getDeparture", "getReleventTrekUpcoming");
    jQuery("#trek_choose_dep").empty();
    jQuery("#trek_choose_dep").append('<?php echo $alltrekdate; ?>');

   
});


</script>

</html>