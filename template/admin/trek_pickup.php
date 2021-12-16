<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_pickup_reach where trek_pickup_status=0 order by id desc');

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
    <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new
        Pickup/Drop</button>
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Trek</h3>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Pickup/Drop Place</th>
                            
                            <th class="text-center">State</th>
                            <th class="text-center">Updated on</th>
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
                            <td class="text-center"><?php echo $data[$i]->trek_pickup_place; ?></td>
                           
                            <td class="text-center"><?php echo $data[$i]->trek_pick_up_state; ?></td>
                             <td class="text-center"><?php echo $data[$i]->trek_pickup_updated_time; ?></td>

                            <td class="text-center"><a class="btn btn-info" onclick="pickEdit(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-pickEdit" role="button" data-toggle="modal"
                                    data-target="#editModal">Edit</a>
                                <a class="btn btn-danger" onclick="pickDelete(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-pickDelete" role="button">Delete</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add pick-up place</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Add Pickup Place</label>
                            <input type="text" class="form-control" id="pickup_name" required>
                        </div>
                        <div class="form-group">
                            <label for="pickup_state">State *</label>
                            <select id="pickup_state" class="form-control" required="required"
                                data-error="Please specify your region.">
                                <option value="" selected>--Select Your state--
                                </option>
                                <option>Andhra Pradesh</option>
                                <option>Arunachal Pradesh</option>
                                <option>Assam</option>
                                <option>Bihar</option>
                                <option>Chhattisgarh</option>
                                <option>Goa</option>
                                <option>Gujarat</option>
                                <option>Hariyana</option>
                                <option>Himachal Pradesh</option>
                                <option>Jharkhand</option>
                                <option>Karnataka</option>
                                <option>Kerala</option>
                                <option>Madhya Pradesh</option>
                                <option>Maharashtra</option>
                                <option>Manipur</option>
                                <option>Meghalaya</option>
                                <option>Mizoram</option>
                                <option>Nagaland</option>
                                <option>Odisha</option>
                                <option>Punjab</option>
                                <option>Rajasthan</option>
                                <option>Sikkim</option>
                                <option>Tamil Nadu</option>
                                <option>Telangana</option>
                                <option>Tripura</option>
                                <option>Uttar Pradesh</option>
                                <option>Uttarakhand</option>
                                <option>West Bengal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pickup-reach" class="col-form-label">How to reach - Content</label>
                            <input type="text" class="form-control" id="pickup_reach_air" required>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="pickup-reach" class="col-form-label">How to reach - Bus</label>
                            <input type="text" class="form-control" id="pickup_reach_bus" required>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="pickup-reach" class="col-form-label">How to reach - Train</label>
                            <input type="text" class="form-control" id="pickup_reach_train" required>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addPickup()" class="btn btn-primary">Add Pickup/Drop</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pickup/Drop Place</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Place</label>
                            <input type="text" class="form-control" id="pickup_name1" required>
                        </div>
                        <div class="form-group">
                            <label for="pickup_state">State *</label>
                            <select id="pickup_state1" class="form-control" required="required"
                                data-error="Please specify your region.">
                                <option value="" selected>--Select Your state--
                                </option>
                                <option>Andhra Pradesh</option>
                                <option>Arunachal Pradesh</option>
                                <option>Assam</option>
                                <option>Bihar</option>
                                <option>Chhattisgarh</option>
                                <option>Goa</option>
                                <option>Gujarat</option>
                                <option>Hariyana</option>
                                <option>Himachal Pradesh</option>
                                <option>Jharkhand</option>
                                <option>Karnataka</option>
                                <option>Kerala</option>
                                <option>Madhya Pradesh</option>
                                <option>Maharashtra</option>
                                <option>Manipur</option>
                                <option>Meghalaya</option>
                                <option>Mizoram</option>
                                <option>Nagaland</option>
                                <option>Odisha</option>
                                <option>Punjab</option>
                                <option>Rajasthan</option>
                                <option>Sikkim</option>
                                <option>Tamil Nadu</option>
                                <option>Telangana</option>
                                <option>Tripura</option>
                                <option>Uttar Pradesh</option>
                                <option>Uttarakhand</option>
                                <option>West Bengal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pickup-reach" class="col-form-label">How to reach - Content</label>
                            <input type="text" class="form-control" id="pickup_reach_air1" required>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="pickup-reach" class="col-form-label">How to reach - Bus</label>
                            <input type="text" class="form-control" id="pickup_reach_bus1" required>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="pickup-reach" class="col-form-label">How to reach - Train</label>
                            <input type="text" class="form-control" id="pickup_reach_train1" required>
                        </div>

                        <div class="form-group" hidden>
                            <label for="recipient-name" class="col-form-label"></label>
                            <input type="text" class="form-control" id="flag-name-id">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="updatePickup()" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
var editor15 = CKEDITOR.replace('pickup_reach_air');
CKFinder.setupCKEditor(editor15);
var editor16 = CKEDITOR.replace('pickup_reach_air1');
CKFinder.setupCKEditor(editor16);
var editor17 = CKEDITOR.replace('pickup_reach_bus');
CKFinder.setupCKEditor(editor17);
var editor18 = CKEDITOR.replace('pickup_reach_bus1');
CKFinder.setupCKEditor(editor18);

var editor19 = CKEDITOR.replace('pickup_reach_train');
CKFinder.setupCKEditor(editor19);
var editor20 = CKEDITOR.replace('pickup_reach_train1');
CKFinder.setupCKEditor(editor20);

</script>
<script>
$(document).ready(function() {
    $('#myTable').dataTable();

});
</script>

</html>