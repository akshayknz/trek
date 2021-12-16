<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_fitness_policy where trek_fitness_policy_status=0 order by id desc');

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
    <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Fitness Policy
    </button>
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Trek Fitness</h3>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Fitness policy Name</th>
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
                            <td style="text-align: center;"><?php echo $data[$i]->trek_fitness_policy_name; ?></td>
                            <td class="text-center"><?php echo $data[$i]->trek_fitness_policy_updated_time; ?></td>
                            <td class="text-center"><a class="btn btn-info" onclick="FitEdit(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-FitEdit" role="button" data-toggle="modal"
                                    data-target="#editModal">Edit</a>
                                <a class="btn btn-danger" onclick="FitDelete(this.id)"
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
                    <h5 class="modal-title" id="exampleModalLabel">Add new Fitness policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Fitness policy:</label>
                            <input type="text" class="form-control" id="fit-name">
                        </div>
                        <div class="row col-md-12" style="margin-top: 10px;">

                            <div class="form-group">

                                <textarea class="form-control" id="trek_fit_add" name="content"
                                    class="get_question_text">
                              </textarea>

                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addFit()" class="btn btn-primary">Add Fitness</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Fitness policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Fitness policy name:</label>
                            <input type="text" class="form-control" id="fit-name-edit">
                        </div>
                        <div class="row col-md-12" style="margin-top: 10px;">

                            <div class="form-group">

                                <textarea class="form-control" id="trek_fit_edit" name="content"
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
                    <button type="button" onclick="updatefit()" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
var editor18 = CKEDITOR.replace('trek_fit_edit');
CKFinder.setupCKEditor(editor18);
var editor19 = CKEDITOR.replace('trek_fit_add');
CKFinder.setupCKEditor(editor19);
</script>
<script>
$(document).ready(function() {
    $('#myTable').dataTable();

});
</script>

</html>