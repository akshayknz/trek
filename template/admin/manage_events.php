<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_trek_essential where trek_essential_status=0 order by id desc');
$dataTreks = $wpdb->get_results('SELECT id,trek_name FROM wp_trektable_addtrekdetails where trek_adddetails_status=0 and trek_publish_status=0');
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
    
  

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
   <!--  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
</head>

<body style="margin:20px auto">

    <div class="loader" id="loader">

    </div>
    <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Event
    </button>
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>TTH - Events</h3>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Event</th>
                            <th class="text-center">Updated Time</th>
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
                            <td style="text-align: center;"><?php echo $data[$i]->trek_essential_name; ?></td>
                            <td class="text-center"><?php echo $data[$i]->trek_essential_updated_time; ?></td>
                            <td class="text-center"><a class="btn btn-info" onclick="EventEdit(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-FitEdit" role="button" data-toggle="modal"
                                    data-target="#editModal">Edit</a>
                                <a class="btn btn-danger" onclick="EssDelete(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-FitDelete" role="button">Delete</a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New TTH - Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Event Name:</label>
                            <input type="text" class="form-control" id="event-name">
                        </div>
                        <div class="form-group">
                        <label for="generate-event-code" class="col-form-label">Event Code * : &nbsp;&nbsp;<button
                                id="generate-event-code" onclick="generateCouponCodeEvent()"
                                style="margin-bottom: 2px;">Generate code</button></label>
                        <input type="text" class="form-control" placeholder="Event Code" id="event_code"
                            >
                    </div>
                                                        
                                            <div class="form-group">
                                                <label for="trek_event_details">Assigned Treks:</label>


                                                <select id="trek_event_details"
                                                    class="form-control js-example-basic-multiple js-example-responsive mselect select2-selection--multiple"
                                                    required="required" data-error="Please specify your Grade."
                                                    data-placeholder="Select trek" multiple="multiple">

                                                    <?php

                                                    $totalTreks = count($dataTreks);

                                                    for($k=0;$k<$totalTreks;$k++){
                                                        ?>
                                                            <option value="<?= $dataTreks[$k]->id ?>"><?= $dataTreks[$k]->trek_name ?></option>


                                                        <?php
                                                    }

                                                    ?>
                                                    
                                                </select>
                                            </div>
                                      
                              
                        <div class="row col-md-12" style="margin-top: 10px;">

                            <div class="form-group">

                                <textarea class="form-control" id="trek_event_add" name="content"
                                    class="get_question_text">
                              </textarea>

                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addEvent()" class="btn btn-primary">Add Event</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit TTH Events</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Trek Essential:</label>
                            <input type="text" class="form-control" id="event-name-edit">
                        </div>
                         <div class="form-group">
                        <label for="generate-event-code-edit" class="col-form-label">Event Code * : &nbsp;&nbsp;<button
                                id="generate-event-code-edit" onclick="generateCouponCodeEvent()"
                                style="margin-bottom: 2px;">Generate code</button></label>
                        <input type="text" class="form-control" placeholder="Event Code" id="event_code_edit"
                            >
                    </div>
                                                        
                                            <div class="form-group">
                                                <label for="trek_event_details-edit">Assigned Treks:</label>


                                                <select id="trek_event_details-edit"
                                                    class="form-control js-example-basic-multiple js-example-responsive mselect select2-selection--multiple"
                                                    required="required" data-error="Please specify your Grade."
                                                    data-placeholder="Select trek" multiple="multiple">

                                                    
                                                    <option value="1">hello</option>
                                                    <option value="12">hello2</option>
                                                    <option value="13">hello3</option>
                                                    <option value="14">hello4</option>
                                                </select>
                                            </div>
                                      

                        <div class="row col-md-12" style="margin-top: 10px;">

                            <div class="form-group">

                                <textarea class="form-control" id="trek_event_edit" name="content"
                                    class="get_question_text">
                              </textarea>

                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label for="recipient-name" class="col-form-label"></label>
                            <input type="text" class="form-control" id="flag-name-id">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="updateEvent()" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
var editor18 = CKEDITOR.replace('trek_event_edit');
CKFinder.setupCKEditor(editor18);
var editor19 = CKEDITOR.replace('trek_event_add');
CKFinder.setupCKEditor(editor19);
</script>
<script>
$(document).ready(function() {
    $('#myTable').dataTable();

});
</script>

</html>