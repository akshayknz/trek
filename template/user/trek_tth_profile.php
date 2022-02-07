<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT trek_tth_mail,trek_tth_c1,trek_tth_c2,working_hours,b_to_b_text FROM ' . $table_prefix . 'trek_pages_tth_contacts order by id desc limit 1');
// print_r(json_encode($data));
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TTH Profile</title>
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

        .cds {
            min-width: 100% !important;
            min-height: 40px !important;
            white-space: nowrap !important;
            margin-left: 10px;
            background-color: white;
            border-radius: 3px;
            box-shadow: 8px 6px;

        }

        .cds1 {
            min-width: 85% !important;
            min-height: 40px !important;
            white-space: nowrap !important;
            margin-left: 10px;
            background-color: #F3C08A !important;
            border-radius: 3px;
            box-shadow: 8px 6px;

        }

        .editors-dep {
            float: right;
        }


        .cds:hover {
            transform: scale(1.05);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
        .profile_card{
            display: flex;
            position: relative;
        }
        .profile_white_space
        {
            white-space: normal;
            text-align: left;
        }
        .profile_edit_ico{
            position: absolute;
            right: 0;
            bottom: 0;
        }
    </style>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
<!--   <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new flags</button> -->
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>TTH Profile</h3>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12" style="min-height: 450px;background-color: #C0C7D3;">
            <center>
                <div class="row header"
                     style="text-align:center;color:black;margin-left: 20px;margin-top: 10px;padding: 5px;">
                    <h3>Contact us Details</h3>
                </div>
            </center>
            <hr>
            <?php
            if (!empty($data)) {
                ?>
                <div class="row col-md-12 col-lg-12 col-xl-12">
                    <div class="card cds">

                        <div class="profile_card" style="margin-top: 10px;text-align: center;"><span style="float: left;"><i
                                        class="fas fa-envelope-open"
                                        style="color: black;cursor: pointer;">&nbsp;Mail-Id</i>&nbsp;&nbsp;&nbsp;
                                    </span>
                            <div id="tth_pages_mail" class="profile_white_space"><?= $data[0]->trek_tth_mail ?></div>
                            <div><span data-toggle="modal" data-target="#exampleModal_edit_mail" onclick="edit_this_mail()"
                                       class="editors-dep profile_edit_ico"><i class="fas fa-edit" style="color: black;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;</i></span></div>
                        </div>
                    </div>
                    <br><br>

                    <div class="card cds">

                        <div style="margin-top: 10px;text-align: center;" class="profile_card"><span style="float: left;"><i
                                        class="fas fa-phone-alt"
                                        style="color: black;cursor: pointer;">&nbsp;Phone - 1</i>&nbsp;&nbsp;&nbsp;
                                    </span>
                            <div id="tth_pages_c1" class="profile_white_space"><?= $data[0]->trek_tth_c1 ?></div>
                            <span data-toggle="modal" data-target="#exampleModal_edit_phone1" onclick="edit_this_c1()"
                                  class="editors-dep profile_edit_ico"><i class="fas fa-edit" style="color: black;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                        </div>
                    </div>
                    <br><br>


                    <div class="card cds" style="background-color: #e8d49e;">

                        <div style="margin-top: 10px;text-align: center;" class="profile_card"><span style="float: left;"><i
                                        class="fas fa-phone-alt" style="color: black;cursor: pointer;">&nbsp;Working Hours</i>&nbsp;&nbsp;&nbsp;
                                    </span>
                            <div id="tth_pages_w1" class="profile_white_space"><?= $data[0]->working_hours ?></div>
                            <span data-toggle="modal" data-target="#exampleModal_edit_working_hours"
                                  onclick="edit_this_w1()"
                                  class="editors-dep profile_edit_ico"><i class="fas fa-edit" style="color: black;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                        </div>
                    </div>
                    <br><br>

                    <div class="card cds" style="background-color: #998f73;">

                        <div style="margin-top: 10px;text-align: center;" class="profile_card"><span style="float: left;"><i
                                        class="fas fa-phone-alt"
                                        style="color: black;cursor: pointer;">&nbsp;Business</i>&nbsp;&nbsp;&nbsp;
                                    </span>
                            <div id="tth_pages_b1"><?= $data[0]->b_to_b_text ?></div>
                            <span data-toggle="modal" data-target="#exampleModal_edit_business" onclick="edit_this_b1()"
                                  class="editors-dep profile_edit_ico"><i class="fas fa-edit" style="color: black;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                        </div>
                    </div>
                    <br><br>


                </div>

                <?php
            } else {
                die("<h3>No data available</h3>");
            }
            ?>

        </div>

    </div>


</div>
<div class="modal fade" id="exampleModal_edit_mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit mail-Id</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mail:<span>(Add multiple mail ids with ',' between them)</span></label><br>
                        <textarea id="tth-pages-mail" rows="4" cols="50"></textarea>
                        <!-- <input type="text" class="form-control" id="tth-pages-mail"> -->
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="updateContactMail()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal_edit_phone1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Phone </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone :<span>(Add multiple mail ids with ',' between them)</span></label><br>
                        <!-- <input type="text" class="form-control"  id="tth-pages-c1"> -->
                        <textarea id="tth-pages-c1" rows="4" cols="50"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="updateContactC1()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal_edit_working_hours" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Working Hours</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Working Hours:</label><br>
                        <textarea id="tth-pages-working-hours" rows="4" cols="50"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="updateWorkingHours()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal_edit_business" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Business Contact details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Business Contact Info:</label><br>
                        <textarea id="tth-pages-business" rows="4" cols="50"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="updateBusiness()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    $(document).ready(function () {
        $('#myTable').dataTable();

    });
</script>

</html>