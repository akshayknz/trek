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

$query = "SELECT
  COUNT(tl.id) AS Total,
  tb.trek_booking_status,
  tb.trek_booking_id,
  tb.trek_booking_owner_id,

  tb.book_activity_status,
  td.trek_start_date,
  td.trek_end_date,
  td.trek_section
FROM
  wp_trektable_bookings tb
LEFT JOIN wp_trektable_trekkers_list tl ON tb.trek_booking_id = tl.trek_tbooking_id
LEFT JOIN wp_trektable_trek_departure td ON tb.trek_selected_departure_id = td.id
where tb.trek_booking_status!=1
and (tl.trek_trekker_status !=1 or tl.trek_trekker_status is null) and tb.trek_selected_trek_id='" . $ppc . "'
and tb.book_activity_status ='2'
GROUP BY tb.id order by
td.trek_start_date Asc";
$results = $wpdb->get_results($query);
// print_r(json_encode($results));
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>Example of Employee Table with twitter bootstrap</title> -->
    <meta name="description" content="">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
</head>
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
            <h3>Cancellation Requests- <?php echo $trek_name; ?> </h3>
        </div>
        <div style="width: auto;margin-top: 50px;">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th class="text-center">Trek Departure</th>
                            <th class="text-center">Trekkers</th>
                            <th class="text-center">Details</th>

                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$j = 0;
$count = count($results);

for ($i = 0; $i < $count; $i++) {
    $j++;
    $k1 = strtotime($results[$i]->trek_start_date);
    $l1 = strtotime($results[$i]->trek_end_date);
    $k2 = date('j M ', $k1);
    $l2 = date('j M Y', $l1);
    $m2 = $results[$i]->trek_section;
    ?>
                        <tr>
                            <td class="text-center"><?php echo $j; ?></td>
                            <td class="text-center"><?php echo $k2 . ' - ' . $l2 . ' :' . $m2; ?></td>
                            <td class="text-center"><?php echo $results[$i]->Total; ?></td>

                            <td class="text-center"><button type="button" class="btn btn-secondary"
                                    id="<?php echo $results[$i]->trek_booking_owner_id ?>"
                                    onclick="ownerDetails(this.id)" data-toggle="modal"
                                    data-target="#Modal_owner">Owner</button>&nbsp;&nbsp;<button type="button"
                                    class="btn btn-secondary" id="<?php echo $results[$i]->trek_booking_id ?>"
                                    onclick="trekkersrDetails(this.id)" data-toggle="modal"
                                    data-target="#Modal_trekkers">Trekkers</button></td>
                            <td class="text-center"><button type="button" class="btn btn-danger"
                                    id="<?php echo $results[$i]->trek_booking_id ?>"
                                    onclick="approveCancellation(this.id)">Cancel</button></td>

                        </tr>

                        <?php
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
    $('#myTable').dataTable();
});
</script>

</html>