<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT trek_days,id,trek_name,trek_updated_time,trek_brief_itinerary FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0 order by id desc');
// ;
// $data = $wpdb->get_results('SELECT TA.trek_days,TA.id,TA.trek_name,TA.trek_updated_time,count(TI.trek_id) FROM  wp_trektable_addtrekdetails TA
// INNER JOIN wp_trektable_itinerary TI ON TI.trek_id = TA.id where TI.trek_itinerary_status=0 and TA.trek_adddetails_status=0;');
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

    .card {
        background-color: #cad0db !important;
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
    <!-- <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new flags</button> -->
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Trek Itinerary</h3>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Trek Name</th>
                            <th class="text-center">Days</th>
                            <th class="text-center">status</th>
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
                            <td><?php echo $data[$i]->trek_days; ?></td>
                            <td class="text-center"><?php if ($data[$i]->trek_brief_itinerary == 'completed') {
        ?>
                                <button class="btn btn-success">Complete</button>
                                <?php
} else {
        ?>
                                <button class="btn btn-warning">Pending</button>
                                <?php
}?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info" onclick="itineraryPreview(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-preview" role="button" data-toggle="modal"
                                    data-target="#editModalPreview">Preview</a>
                                <a class="btn btn-primary" onclick="itineraryEdit(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-days-<?php echo $data[$i]->trek_days; ?>"
                                    role="button" data-toggle="modal" data-target="#editModal">Itinerary</a>
                                <a class="btn btn-danger" onclick="itineraryDelete(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-itineraryDelete" role="button">Clear</a>
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
    <!--   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add new flag</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Flag name:</label>
                        <input type="text" class="form-control" id="flag-name">
                     </div>

                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" onclick="addFlag()" class="btn btn-primary">Add Flag</button>
               </div>
            </div>
         </div>
      </div> -->
    <div class="modal fade" id="editModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width: 600px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="trek_itinerary_name_modal">Preview</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="itinerarybody">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" style="float: left;"
                        data-dismiss="modal">Close</button>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document" style="width: 600px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="trek_itinerary_name_modal">Add Itinerary</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="row col-md-12">
                            <div class="form-group">
                                <input type="text" id="trek_itinerary_tr_id" hidden>
                            </div>
                            <div class="form-group">
                                <input type="text" id="trek_itinerary_totaldays" hidden>
                            </div>
                            <div class="form-group col-md-6">
                                <select id="trek_itinerary_modal" onchange="loadSection2()" class="form-control"
                                    required="required" data-error="Please specify your region.">
                                    <option selected>--Select Day--
                                    </option>

                                </select>

                            </div>
                            <div class="row col-md-6">
                                <!-- <button type="button" onclick="additinerary()" id="trek_itinerary_addbut" class="btn btn-primary pull-right">Add</button> -->


                            </div>
                        </div>
                        <div class="row col-md-12" id="trek_itinerary_section2" style="display: none;">
                            <div class="form-group col-md-12">
                                <label for="recipient-name" class="col-form-label">Itinerary Head</label>
                             
                                <input type="text" class="form-control" id="trek_itinerary_head" placeholder="itinerary Header" name="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="recipient-name" class="col-form-label">Brief Description</label>
                                <textarea class="form-control" id="trek_itinerary_brief" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="recipient-name" class="col-form-label">Detailed Description</label>
                                <textarea class="form-control" id="trek_itinerary_detailed" rows="3"></textarea>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" style="float: left;"
                        data-dismiss="modal">Close</button>
                    <button type="button" onclick="updateitinerary()" id="trek_itinerary_updatebut"
                        class="btn btn-primary" style="float:right;display: none;">Save Changes</button>&nbsp;&nbsp;
                    <button type="button" onclick="additinerary()" id="trek_itinerary_addbut" class="btn btn-primary"
                        style="float:right;display: none;">Add Day</button>&nbsp;&nbsp;

                </div>
            </div>
        </div>
    </div>
</body>

<script>
$(document).ready(function() {
    $('#myTable').dataTable();

});
var editor11 = CKEDITOR.replace('trek_itinerary_brief');
CKFinder.setupCKEditor(editor11);
var editor12 = CKEDITOR.replace('trek_itinerary_detailed');
CKFinder.setupCKEditor(editor12);
</script>

</html>