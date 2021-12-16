<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'tth_volunteer_program order by id ASC');
$data_web = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'wp_trek_volunteer_web order by id ASC');



// print_r(json_encode($data));
// die;
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    text
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

<!-- <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Gallery
</button>
<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Location
</button>
<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Second section
</button>
<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Header
</button> -->
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>TTH Volunteer program</h3>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Preferred date</th>
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
                        <td style="text-align: center;"><?php echo $data[$i]->first_name . " " . $data[$i]->last_name; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->mail; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->pref_date; ?></td>

                        <td style="text-align: center;"><a class="btn btn-info" onclick="getVoluneeterData(this.id)"
                                                           id="<?php echo $data[$i]->id; ?>-volView" role="button"
                            >View details</a>
                            <a target="_blank" class="btn btn-danger"
                               href="<?php echo site_url() . "/wp-content/plugins/trek/template/user" . $data[$i]->resume; ?>"
                               role="button">Resume</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Volunteer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="fname">Full name</label>
                        <p id="fname"></p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <p id="email"></p>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <p id="phone"></p>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <p id="gender"></p>
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <p id="age"></p>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <p id="country"></p>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <p id="address"></p>
                    </div>
                    <div class="form-group">
                        <label for="pref-date">Proffered date</label>
                        <p id="pref-date"></p>
                    </div>
                    <div class="form-group">
                        <label for="trek_dur">Trek duration</label>
                        <p id="trek_dur"></p>
                    </div>
                    <div class="form-group">
                        <label for="social">Social medias</label>
                        <p id="social"></p>
                    </div>
                    <div class="form-group">
                        <label for="hear">How did they hear about us?</label>
                        <p id="hear"></p>
                    </div>
                    <div class="form-group">
                        <label for="objective">Objective for joining</label>
                        <p id="objective"></p>
                    </div>
                    <div class="form-group">
                        <label for="concerns">Concerns</label>
                        <p id="concerns"></p>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Volunteer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="fname">Full name</label>
                        <p id="fname"></p>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal_second" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Volunteer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="fname">Full name</label>
                        <p id="fname"></p>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal_location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Volunteer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="fname">Full name</label>
                        <p id="fname"></p>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal_gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Volunteer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="fname">Full name</label>
                        <p id="fname"></p>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

    function getVoluneeterData(id) {
        let vol_id = id.substring(0, id.indexOf('-'));
        var data = new FormData();

        data.append('action', 'getVolData');
        data.append('volu_id', vol_id);
        jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_objs.ajax_url_pages,
            data: data,
            success: function (msg) {
                json = JSON.parse(msg);
                $('#fname').text(json.message[0].first_name + " " + json.message[0].last_name);
                $('#email').text(json.message[0].mail);
                $('#phone').text(json.message[0].phone);

                var dob = new Date(json.message[0].dob);
                var month_diff = Date.now() - dob.getTime();
                var age_dt = new Date(month_diff);
                var year = age_dt.getUTCFullYear();
                var age = Math.abs(year - 1970);

                $('#gender').text(json.message[0].gender);
                $('#age').text(age);
                $('#country').text(json.message[0].country);
                $('#address').text(json.message[0].address);
                $('#pref-date').text(json.message[0].pref_date);
                $('#trek_dur').text(json.message[0].trek_duration);
                $('#social').text(json.message[0].social);
                $('#hear').text(json.message[0].how_did_hear_us);
                $('#objective').text(json.message[0].object_for_join);
                $('#concerns').text(json.message[0].concerns);
                jQuery("#exampleModal").modal('show');
            }
        });

    }
</script>

</html>