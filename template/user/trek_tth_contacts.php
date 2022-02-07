<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT id, contact_name,contact_num1,contact_num2,contact_email FROM ' . $table_prefix . 'trektable_contacts');

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
</head>

<body style="margin:20px auto">

<div class="loader" id="loader">

</div>
<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Contact
</button>
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Contacts</h3>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Mail</th>
                    <th class="text-center">Phone 1</th>
                    <th class="text-center">Phone 2</th>
                    <!-- <th class="text-center">Actions</th> -->
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

                        <td style="text-align: center;"><?php echo $data[$i]->contact_name; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->contact_email; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->contact_num1; ?></td>
                        <td class="text-center"><?php echo $data[$i]->contact_num2; ?></td>
                        <td class="text-center"><a class="btn btn-info" onclick="updateContactFetch(<?php echo $data[$i]->id; ?>)"
                                                   id="<?php echo $data[$i]->id; ?>-NewsEdit" role="button"
                                                   data-toggle="modal"
                                                   data-target="#editModal">Edit</a>
                            <a class="btn btn-danger" onclick="deleteContact(<?php echo $data[$i]->id; ?>)"
                               id="<?php echo $data[$i]->id; ?>-NewsDelete" role="button">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Create New contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tth-news-category">Select user:</label>

                         <input type="text" class="form-control" id="tth_user">

                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="tth_user_mail">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone 1:</label>
                        <input type="text" class="form-control" id="tth_user_phone1">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone 2:</label>
                        <input type="text" class="form-control" id="tth_user_phone2">
                    </div>
                    <span style="color: red;" id="usererr"></span>
                    <span style="color: green;" id="usersuccess"></span>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="createNewContact()" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tth-news-category">Select user:</label>

                         <input type="text" class="form-control" id="edit_tth_user">

                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="edit_tth_user_mail">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone 1:</label>
                        <input type="text" class="form-control" id="edit_tth_user_phone1">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone 2:</label>
                        <input type="text" class="form-control" id="edit_tth_user_phone2">
                    </div>
                    <span style="color: red;" id="usererr"></span>
                    <span style="color: green;" id="usersuccess"></span>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="upadteContactButton" data-id="0" onclick="updateContact(event)" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

</body>
<!--<script>-->
<!--    var editor21 = CKEDITOR.replace('news_content');-->
<!--    CKFinder.setupCKEditor(editor21);-->
<!--    var editor22 = CKEDITOR.replace('news_content_edit');-->
<!--    CKFinder.setupCKEditor(editor22);-->
<!--</script>-->
<script>
    $(document).ready(function () {
        $('#myTable').dataTable();

    });
</script>

</html>