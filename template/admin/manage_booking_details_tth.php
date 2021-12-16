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
if (isset($_GET['dep'])) {
    $ppc1 = $_GET['dep'];
    if ($ppc1 == '') {
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
$query12 = "SELECT trek_start_date,trek_end_date,trek_section FROM wp_trektable_trek_departure where id=" . $ppc1 . " and trek_departure_status=0 limit 1";
$results12 = $wpdb->get_results($query12);
$k1 = strtotime($results12[0]->trek_start_date);
$l1 = strtotime($results12[0]->trek_end_date);
$k2 = date('j M ', $k1);
$l2 = date('j M Y', $l1);
$m2 = $results12[0]->trek_section;
if (empty($results12)) {
    die("No trek Exists!");
}

$query1 = "SELECT tb.fname as trek_user_first_name,tb.lname as trek_user_last_name,tb.trek_booking_owner_id as trek_user_id,tb.email as trek_user_email,tb.trek_booking_id, COUNT(tl.id) AS Total, tb.trek_booking_status, tb.trek_booking_id, tb.book_activity_status FROM 
wp_trektable_bookings tb 
LEFT JOIN 
wp_trektable_trekkers_list tl ON tb.trek_booking_id = tl.trek_tbooking_id where tb.trek_booking_status!=1 and 
(tl.trek_trekker_status !=1 or tl.trek_trekker_status is null) and tb.trek_selected_trek_id='".$ppc."'
 and trek_selected_departure_id ='".$ppc1."' GROUP BY tb.id order by tb.id desc";
$result = $wpdb->get_results($query1);

$count = count($result);
$target = '';
for ($k = 0; $k < $count; $k++) {
    $target .= '<tr><td class="text-center">';
    $target .= $k + 1;
    $target .= '</td><td>';
    $target .= $result[$k]->trek_user_first_name ;
    $target .= '</td><td class="text-center">';
    $target .= $result[$k]->trek_user_email;
    $target .= '</td><td class="text-center">';
    $target .= $result[$k]->Total;
    if ($result[$k]->book_activity_status == 2) {
        $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="btn btn-warning" id="' . $result[$k]->trek_booking_id . '" onclick="approveCancellation(this.id)">Cancel</a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
    } else if ($result[$k]->book_activity_status == 5) {
        $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="btn btn-danger" id="' . $result[$k]->trek_booking_id . '">Cancelled</a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
    } else if ($result[$k]->trek_booking_status == 0) {
        $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="dot1"></a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
    } else if ($result[$k]->trek_booking_status == 2) {
        $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="dot1"></a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
    }
    $target .= 'id="';
    $target .= $result[$k]->trek_user_id;
    $target .= '"role="button" onclick="ownerDetails(this.id)">Owner</a> <a class="btn btn-info" data-toggle="modal" data-target="#Modal_trekkers" id="';
    $target .= $result[$k]->trek_booking_id;
    $target .= '" role="button" onclick="trekkersrDetails(this.id)">Trekkers</a>';
    $target .= '&nbsp;&nbsp;<a class="btn btn-warning" data-toggle="modal" data-target="#Modal_trekNoteBySales" id="';
    $target .= $result[$k]->trek_booking_id;
    $target .= '-note" role="button" onclick="trekkersrNoteNySales(this.id)">Note</a>';
    $target .= '</td></tr>';

}
// print_r($results1);
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
            <h3>Manage bookings2&nbsp;<?php if (isset($trek_name)) {
    echo '- ' . $trek_name;
}?></h3>
        </div>
        <br>
        <div class="row header" style="text-align:center;color:green">
            <h6>Departure&nbsp;<?php if (isset($m2)) {
    echo ' ' . $k2 . '-' . $l2 . ':' . $m2;
}?></h6>
        </div>
        <br>

        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>

                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Trekkers</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>

                    </thead>
                    <tbody id="trek_user_details">

                        <?php
if (!empty($result)) {
    echo $target;

} else {
    $target = '';
    $target .= '<tr><td valign="top" colspan="6" class="dataTables_empty text-center">No Data available for this date</td></tr>';

    echo $target;

}

?>


                    </tbody>
                </table>
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
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Emergency Phone</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Dob</th>
                                    <th class="text-center">Age</th>
                                    <th class="text-center">Height</th>
                                    <th class="text-center">Weight</th>
                                    <th class="text-center">BMI</th>

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


        <div class="modal fade" id="Modal_trekNoteBySales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trek Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea  id="trekNoteBySales" rows="5" cols="50">
                        
                    </textarea>

                </div>


                <div class="modal-footer">
                    <input type="hidden" id="trekNoteBySalesBooking" value="">
                    <button type="button" class="btn btn-secondary" onclick="trekkersSaverNoteNySales()"  data-dismiss="modal">Save</button>

                </div>
            </div>
        </div>
    </div>
</body>

<script>
$(document).ready(function() {
    // $('#myTable').dataTable();
    jQuery("#trek_choose_dep").empty();
    jQuery("#trek_choose_dep").append('<?php echo $alltrekdate; ?>');
});
</script>

</html>