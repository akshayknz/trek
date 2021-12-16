<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_contact_us order by status,updated_on DESC');
$count = count($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>TTH Profile</title>
    <meta name="description" content="">
    <style>
        body {
            margin-top: 20px;
            background: #FDFDFF
        }

        .badge {
            border-radius: 8px;
            padding: 4px 8px;
            text-transform: uppercase;
            font-size: .7142em;
            line-height: 12px;
            background-color: transparent;
            border: 1px solid;
            margin-bottom: 5px;
            border-radius: .875rem;
        }

        .bg-green {
            background-color: #50d38a !important;
            color: #fff;
        }

        .bg-blush {
            background-color: #ff758e !important;
            color: #fff;
        }

        .bg-amber {
            background-color: #FFC107 !important;
            color: #fff;
        }

        .bg-red {
            background-color: #ec3b57 !important;
            color: #fff;
        }

        .bg-blue {
            background-color: #60bafd !important;
            color: #fff;
        }

        .card {
            background: #fff;
            margin-bottom: 30px;
            transition: .5s;
            border: 0;
            border-radius: .1875rem;
            display: inline-block;
            position: relative;
            width: 100%;
            box-shadow: none;
        }

        .inbox .action_bar .delete_all {
            margin-bottom: 0;
            margin-top: 8px
        }

        .inbox .action_bar .btn,
        .inbox .action_bar .search {
            margin: 0
        }

        .inbox .mail_list .list-group-item {
            border: 0;
            padding: 15px;
            margin-bottom: 1px
        }

        .inbox .mail_list .list-group-item:hover {
            background: #eceeef
        }

        .inbox .mail_list .list-group-item .media {
            margin: 0;
            width: 100%
        }

        .inbox .mail_list .list-group-item .controls {
            display: inline-block;
            margin-right: 10px;
            vertical-align: top;
            text-align: center;
            margin-top: 11px
        }

        .inbox .mail_list .list-group-item .controls .checkbox {
            display: inline-block
        }

        .inbox .mail_list .list-group-item .controls .checkbox label {
            margin: 0;
            padding: 10px
        }

        .inbox .mail_list .list-group-item .controls .favourite {
            margin-left: 10px
        }

        .inbox .mail_list .list-group-item .thumb {
            display: inline-block
        }

        .inbox .mail_list .list-group-item .thumb img {
            width: 40px
        }

        .inbox .mail_list .list-group-item .media-heading a {
            color: #555;
            font-weight: normal
        }

        .inbox .mail_list .list-group-item .media-heading a:hover,
        .inbox .mail_list .list-group-item .media-heading a:focus {
            text-decoration: none
        }

        .inbox .mail_list .list-group-item .media-heading time {
            font-size: 13px;
            margin-right: 10px
        }

        .inbox .mail_list .list-group-item .media-heading .badge {
            margin-bottom: 0;
            border-radius: 50px;
            font-weight: normal
        }

        .inbox .mail_list .list-group-item .msg {
            margin-bottom: 0px
        }

        .inbox .mail_list .unread {
            border-left: 2px solid
        }

        .inbox .mail_list .unread .media-heading a {
            color: #333;
            font-weight: 700
        }

        .inbox .btn-group {
            box-shadow: none
        }

        .inbox .bg-gray {
            background: #e6e6e6
        }

        @media only screen and (max-width: 767px) {
            .inbox .mail_list .list-group-item .controls {
                margin-top: 3px
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
</head>


<body style="margin:20px auto">

<div class="loader" id="loader">

</div>
<!--   <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new flags</button> -->
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Messages</h3>
    </div>
    <hr>
    <!--start-->

    <div class="col-md-12">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Mail</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Message</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $j = 0;
                $count = count($data);
                for ($i = 0; $i < $count; $i++) {
                if ($data[$i]->status == 0) { //message is not read.

                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->username; ?><span class="badge bg-green">New</span></td>
                        <td style="text-align: center;"><?php echo $data[$i]->user_mail; ?></td>
                        <td style="text-align: center;"><?php echo substr($data[$i]->subject, 0, 20) . "..."; ?></td>
                        <td class="text-center"><?php echo substr($data[$i]->message, 0, 50) . "..."; ?></td>
                        <td class="text-center"><a class="btn btn-info" onclick="viewmessage(this.id)"
                                                   id="<?php echo $data[$i]->id; ?>" role="button">View</a>
                        </td>
                    </tr>
                    <?php
                }
                else{
                    ?>

                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->username; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->user_mail; ?></td>
                        <td ><?php echo substr($data[$i]->subject, 0, 20) . "..."; ?></td>
                        <td ><?php echo substr($data[$i]->message, 0, 50) . "..."; ?></td>
                        <td class="text-center"><a class="btn btn-info" onclick="viewmessage(this.id)"
                                                   id="<?php echo $data[$i]->id; ?>" role="button">View</a>
                        </td>
                    </tr>

                <?php
                }
                }

                ?>

                </tbody>
            </table>
        </div>
    </div>

    <!--end-->


</div>
<div class="modal fade show bd-example-modal-lg" id="noticeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-notice modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subject_modal">How Do You Become an Affiliate?</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-8">
                            <strong id="Username_modal">Register</strong>
                            <p id="mail_modal"></p>
                            <p id="message_modal">T</p>
                            <b><p id="message_time_modal">T</p></b>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-info btn-round" onclick="location.reload()" data-dismiss="modal">
                    Close
                </button>
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