<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_trek_essential where trek_essential_status=0 order by id desc');

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

    .sel-gallery {
        margin-top: 20px;
        margin-bottom: 10px;
        width: 100%;
    }

    .gallery-rev-action {
        margin-top: 10px;
        margin-bottom: 5px;
    }

    .card:hover {
        border: 2px solid black;
        zoom: 1.1;
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
    <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Image
    </button>
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>TTH Gallery</h3>
        </div>

        <div class="row">
            <div class=" col-md-6">
                <select class="sel-gallery" id="select-gallery">
                    <option>TTH1</option>
                    <option>TTH2</option>
                    <option>TTH3</option>
                    <option>TTH4</option>
                </select>
            </div>


        </div>
        <div class="row col-md-12">
            <!-- //contents -->
            <div class="card cds col-md-3">
                <img src="<?= plugin_dir_url(__FILE__) ?>sample/approved1.png">
                <span class="editors-dep gallery-rev-action"><i class="fas fa-edit"
                        style="color: black;cursor: pointer;" data-toggle="modal"
                        data-target="#exampleModal_edit_gallery"></i>&nbsp;&nbsp;<i class="fas fa-trash"
                        style="color: red;cursor: pointer;">&nbsp;&nbsp;</i></span>
            </div>

            <div class="card cds col-md-3">
                <img src="<?= plugin_dir_url(__FILE__) ?>sample/approved1.png">
                <span class="editors-dep gallery-rev-action"><i class="fas fa-edit"
                        style="color: black;cursor: pointer;" data-toggle="modal"
                        data-target="#exampleModal_edit_gallery"></i>&nbsp;&nbsp;<i class="fas fa-trash"
                        style="color: red;cursor: pointer;">&nbsp;&nbsp;</i></span>
            </div>


            <div class="card cds col-md-3">
                <img src="<?= plugin_dir_url(__FILE__) ?>sample/approved1.png">
                <span class="editors-dep gallery-rev-action"><i class="fas fa-edit"
                        style="color: black;cursor: pointer;" data-toggle="modal"
                        data-target="#exampleModal_edit_gallery"></i>&nbsp;&nbsp;<i class="fas fa-trash"
                        style="color: red;cursor: pointer;">&nbsp;&nbsp;</i></span>
            </div>


            <div class="card cds col-md-3">
                <img src="<?= plugin_dir_url(__FILE__) ?>sample/approved1.png">
                <span class="editors-dep gallery-rev-action"><i class="fas fa-edit"
                        style="color: black;cursor: pointer;" data-toggle="modal"
                        data-target="#exampleModal_edit_gallery"></i>&nbsp;&nbsp;<i class="fas fa-trash"
                        style="color: red;cursor: pointer;">&nbsp;&nbsp;</i></span>
            </div>


            <div class="card cds col-md-3">
                <img src="<?= plugin_dir_url(__FILE__) ?>sample/approved1.png">
                <span class="editors-dep gallery-rev-action"><i class="fas fa-edit"
                        style="color: black;cursor: pointer;" data-toggle="modal"
                        data-target="#exampleModal_edit_gallery"></i>&nbsp;&nbsp;<i class="fas fa-trash"
                        style="color: red;cursor: pointer;">&nbsp;&nbsp;</i></span>
            </div>


            <div class="card cds col-md-3">
                <img src="<?= plugin_dir_url(__FILE__) ?>sample/approved1.png">
                <span class="editors-dep gallery-rev-action"><i class="fas fa-edit"
                        style="color: black;cursor: pointer;" data-toggle="modal"
                        data-target="#exampleModal_edit_gallery"></i>&nbsp;&nbsp;<i class="fas fa-trash"
                        style="color: red;cursor: pointer;">&nbsp;&nbsp;</i></span>
            </div>


            <div class="card cds col-md-3">
                <img src="<?= plugin_dir_url(__FILE__) ?>sample/approved1.png">
                <span class="editors-dep gallery-rev-action"><i class="fas fa-edit"
                        style="color: black;cursor: pointer;" data-toggle="modal"
                        data-target="#exampleModal_edit_gallery"></i>&nbsp;&nbsp;<i class="fas fa-trash"
                        style="color: red;cursor: pointer;">&nbsp;&nbsp;</i></span>
            </div>


        </div>

    </div>
    <div class="modal fade" id="exampleModal_edit_gallery" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="ess-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Select Trek :</label>
                            <select class="sel-gallery" id="select-gallery">
                                <option>TTH1</option>
                                <option>TTH2</option>
                                <option>TTH3</option>
                                <option>TTH4</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Priority :</label>
                            <input type="text" class="form-control" id="ess-name">
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="createNewsLetter()" class="btn btn-primary">Update Image</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="ess-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Select Trek :</label>
                            <select class="sel-gallery" id="select-gallery">
                                <option>TTH1</option>
                                <option>TTH2</option>
                                <option>TTH3</option>
                                <option>TTH4</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Priority :</label>
                            <input type="text" class="form-control" id="ess-name">
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="createNewsLetter()" class="btn btn-primary">Add Image</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
var editor18 = CKEDITOR.replace('trek_ess_edit');
CKFinder.setupCKEditor(editor18);
var editor19 = CKEDITOR.replace('trek_ess_add');
CKFinder.setupCKEditor(editor19);
</script>
<script>
$(document).ready(function() {
    $('#myTable').dataTable();

});
</script>

</html>