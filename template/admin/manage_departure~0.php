                <?php
defined('ABSPATH') or die('Hei, Access restricted!');
if (isset($_GET['num'])) {
    $ppc = $_GET['num'];
    if ($ppc == '') {
        die('Access restricted!');
    }

    global $wpdb, $table_prefix;
    $user_ID = get_current_user_id();
    $data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_trek_departure where trek_departure_status=0 and trek_selected_trek=' . $ppc . ' order by trek_start_date asc');
    $data1 = $wpdb->get_results('SELECT trek_days,id,trek_name FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0 and id=' . $ppc . '');
    $dataEvents = $wpdb->get_results('SELECT trek_event,id FROM ' . $table_prefix . 'trektable_events where trek_event_status=0');
// if(empty($data)){
    //    die("<h2>No Such Data Exist!</h2>");
    // }


} else {
    die("Access denied!");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>trek Himalaya</title>
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

    .card1 {
        position: relative;

        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 100%;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
        /*display: wrap;*/
        flex-wrap: wrap;
    }

    .cds {
        min-width: 45% !important;
        white-space: nowrap !important;

    }

    .editors-dep {
        float: right;
    }

    .dep-edit {
        margin-right: 30px;
        cursor: pointer;
    }

    .dep-delete {
        margin-right: 20px;
        cursor: pointer;
    }

    .cds:hover {
        transform: scale(1.05);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
    </style>
   
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
 -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->

   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style> -->
</head>

<body style="margin:20px auto">

    <div class="loader" id="loader">

    </div>
    <button class="myButton btn btn-primary" data-toggle="modal" onclick="clearAddDeparture()"
        data-target="#exampleModal">Add New Departure</button>

    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Manage Departure - <?php echo $data1[0]->trek_name; ?></h3>
        </div>
    </div>

    <div class="row col-md-12 col-lg-12 col-xl-12">
        <div class="card" style="min-width: 100%;min-height: 200px;background-color: #3C87AB;">
            <div class="card-title">
                <h5>Departure dates</h5>
            </div>
            <div style="display: flex; padding: 4px;flex-wrap: wrap; column-gap: 40px;">
                <?php
$count = count($data);
if ($count == 0) {
    ?>
                <center>
                    <h5>No data available!</h5>
                </center>
            </div>
            <?php }
for ($k = 0; $k < $count; $k++) {
    $k1 = strtotime($data[$k]->trek_start_date);
    $l1 = strtotime($data[$k]->trek_end_date);
    $k2 = date('j M ', $k1);
    $l2 = date('j M Y', $l1);
    $m2 = $data[$k]->trek_section;
    ?>
            <div class="card cds" id="<?php echo $data[$k]->id ?>-cardTrek">

                <div><?php echo $k2 . ' - ' . $l2 . ':' . $m2; ?><?php if(isset($data[$k]->dep_event_name)){ ?><div class="badge badge-success" style="margin-left: 20px;background-color: green;"><?= $data[$k]->dep_event_name ?></div><?php }?><span class="editors-dep"><i class="fas fa-edit dep-edit"
                            id="<?php echo $data[$k]->id ?>-edit" onclick="editDeparture(this.id)" data-toggle="modal"
                            data-target="#exampleModalEdit"></i><i class="fas fa-trash-alt dep-delete"
                            id="<?php echo $data[$k]->id ?>-delete" onclick="deleteDeparture(this.id)"></i></span></div>
            </div>
            <?php
}
?>
        </div>



    </div>
    </div>




    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Add Departure</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group" hidden>
                            <!-- <label for="departure-duration" class="col-form-label">Start Date:</label> -->
                            <input type="text" class="form-control" id="departure-duration"
                                value="<?php echo $data1[0]->trek_days; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="departure-start-date" class="col-form-label">Start Date:</label>
                            <input type="date" onchange="calculateEndDate('add')" class="form-control"
                                id="departure-start-date">
                        </div>
                        <div class="form-group">
                            <label for="departure-end-date" class="col-form-label">End Date:</label>
                            <input type="date" class="form-control" id="departure-end-date">
                        </div>
                        <div class="form-group">
                            <label for="departure-start-date" class="col-form-label">Seats:</label>
                            <input type="text" class="form-control" id="departure-Total-seats">
                        </div>

                        <!-- <div class="col-md-12"> -->
                                        <div class="form-group">
                                            <label for="trek_grade">Choose Event * &nbsp;&nbsp;<i class="far fa-trash-alt"
                                                    onclick="deleteGradeModal()"></i> </label>
                                            <select id="trek_event"
                                                class="form-control" required="required"
                                                data-error="Please specify your Grade.">
                                                <option value="" selected>--Select Event--
                                                </option>
                                                <option style="color: green;font-weight: 700;align-items: center;"
                                                    id="createEvent" value="createEvent">+&nbsp;&nbsp;Create Event
                                                </option>
                                                <?php
                                                $countf1 = count($dataEvents);
                                                for ($i = 0; $i < $countf1; $i++) {
                                                    ?>
                                                <option value="<?php echo $dataEvents[$i]->id; ?>"><?php echo $dataEvents[$i]->trek_event; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <!-- </div> -->

                        <div class="form-group">
                            <label for="departure-select-section">Section *</label>
                            <select id="departure-select-section" class="form-control" required="required"
                                data-error="Please specify your region.">
                                <option  value="B1" selected>Batch 1</option>
                                <option value="B2">Batch 2</option>
                                <option value="B3">Batch 3</option>
                                <option value="B4">Batch 4</option>
                                <option value="B5">Batch 5</option>
                                <option value="B6">Batch 6</option>
                                <option value="B7">Batch 7</option>
                            </select>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="<?php echo $data1[0]->id; ?>" onclick="addBookingDeparture(this.id)"
                        class="btn btn-primary">Add Departure</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="event-name" class="col-form-label">Event Name:</label>
                            <input type="text" class="form-control" id="event-name">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addGrade()" class="btn btn-primary">Add Event</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <select id="trek_event_delete" class="form-control" required="required"
                                data-error="Please specify your Grade.">
                                <option value="" selected>--Select Event--
                                </option>

                                <?php
                                    $countf1 = count($dataEvents);
                                    for ($i = 0; $i < $countf1; $i++) {
                                        ?>
                                <option value="<?php echo $dataEvents[$i]->id; ?>">
                                    <?php echo $dataEvents[$i]->trek_event; ?></option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="deleteEvent()" class="btn btn-danger">Delete Event</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Departure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group" hidden>
                            <!-- <label for="departure-duration" class="col-form-label">Start Date:</label> -->
                            <input type="text" class="form-control" id="departure-duration-edit"
                                value="<?php echo $data1[0]->trek_days; ?>" hidden>
                            <input type="text" class="form-control" id="departure-ids-edit" hidden>
                        </div>
                        <div class="form-group">
                            <label for="departure-start-date-edit" class="col-form-label">Start Date:</label>
                            <input type="date" onchange="calculateEndDate('edit')" class="form-control"
                                id="departure-start-date-edit">
                        </div>
                        <div class="form-group">
                            <label for="departure-end-date-edit" class="col-form-label">End Date:</label>
                            <input type="date" class="form-control" id="departure-end-date-edit">
                        </div>
                        <div class="form-group">
                            <label for="departure-Total-seats-edit" class="col-form-label">Seats:</label>
                            <input type="text" class="form-control" id="departure-Total-seats-edit">
                        </div>



                        <div class="form-group">
                                            <label for="trek_grade">Choose Event * &nbsp;&nbsp;<i class="far fa-trash-alt"
                                                    onclick="deleteGradeModal()"></i> </label>
                                            <select id="trek_event_edit"
                                                class="form-control" required="required"
                                                data-error="Please specify your Grade.">
                                                <option value="" selected>--Select Event--
                                                </option>
                                              <!--   <option style="color: green;font-weight: 700;align-items: center;"
                                                    id="createEvent" value="createEvent">+&nbsp;&nbsp;Create Event
                                                </option> -->
                                                <?php
                                                $countf1 = count($dataEvents);
                                                for ($i = 0; $i < $countf1; $i++) {
                                                    ?>
                                                <option value="<?php echo $dataEvents[$i]->id; ?>"><?php echo $dataEvents[$i]->trek_event; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>



                        <div class="form-group">
                            <label for="departure-select-section-edit">Section *</label>
                            <select id="departure-select-section-edit" class="form-control" required="required"
                                data-error="Please specify your region.">
                                <option selected value="B1">Batch 1</option>
                                <option value="B2">Batch 2</option>
                                <option value="B3">Batch 3</option>
                                <option value="B4">Batch 4</option>
                                <option value="B5">Batch 5</option>
                                <option value="B6">Batch 6</option>
                                <option value="B7">Batch 7</option>
                            </select>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="updateBookingDeparture()" class="btn btn-primary">Save
                        Departure</button>
                </div>
            </div>
        </div>
    </div>
 
   <!--   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
</body>

<script>
$(document).ready(function() {
     
    $('#myTable').dataTable();
    st = window.location.href;
    var url = new URL(st);
    var c = url.searchParams.get("dep");
    if (c != '') {
        jQuery("#" + c + "-cardTrek").css("background", "#fc7988");
    }

});
</script>

</html>