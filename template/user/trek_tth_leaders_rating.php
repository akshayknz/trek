<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT rating.ID,leader_name, LeaderID,NoOfBatch,NoOfDays,Value,AddedDate FROM ' . $table_prefix . 'trektable_leaderrating AS rating INNER JOIN ' . $table_prefix . 'trektable_leaders AS leader ON leader.id=rating.LeaderID WHERE Status=0 ORDER BY rating.ID DESC');
$dataLeader = $wpdb->get_results('SELECT id,leader_name FROM ' . $table_prefix . 'trektable_leaders');
//$dataCook = $wpdb->get_results('SELECT id,cook_name FROM ' . $table_prefix . 'trektable_cooks');
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
   
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
          <link rel="stylesheet" href="<?php echo plugins_url('/trek/assets/admin/css/rating.css'); ?>" >
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
</head>

<body style="margin:20px auto">

<div class="loader" id="loader">

</div>
<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Leader Rating
</button>
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Leaders Rating</h3>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Leader Name</th>
                    <th class="text-center">Added Date</th>
                    <th class="text-center">No Of Days</th>
                    <th class="text-center">No Of Batch</th>
                    <th class="text-center">Rating</th>
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
                        <td class="text-center"><?php echo $data[$i]->ID; ?></td>

                        <td style="text-align: center;"><?php echo $data[$i]->leader_name; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->AddedDate; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->NoOfDays; ?></td>
                        <td style="text-align: center;"><?php echo $data[$i]->NoOfBatch; ?></td>
                        <td class="text-center"><?php echo $data[$i]->Value; ?></td>
                        <td class="text-center">
                            <!-- <a class="btn btn-info" onclick="updateLeaderFetch(<?php echo $data[$i]->ID; ?>)"
                                                   id="<?php echo $data[$i]->ID; ?>-NewsEdit" role="button"
                                                   data-toggle="modal"
                                                   data-target="#editModal">Edit</a> -->
                            <a class="btn btn-danger" onclick="deleteLeaderRating(<?php echo $data[$i]->ID ?>)"
                               id="<?php echo $data[$i]->ID; ?>-NewsDelete" role="button">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Create New Leader Rating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="trek_leader">Choose a leader </label>
                                            <select id="trek_leader" 
                                                style="max-width: 100%;"
                                                class="form-control" required="required"
                                                data-error="Please specify your Grade.">
                                                <option value="" selected>--Select Trek Leader--
                                                </option>
                                               
                                                <?php
                                                $countf1 = count($dataLeader);
                                                for ($i = 0; $i < $countf1; $i++) {
                                                    ?>
                                                <option value="<?= $dataLeader[$i]->id ?>"><?php echo $dataLeader[$i]->leader_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">No. of Batches:</label>
                        <input type="number" class="form-control" id="tth_no_of_batches">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">No. of Days</label>
                        <input type="number" class="form-control" id="tth_no_of_days">
                    </div>
                    <div class="form-group">
                    <label for="input-2" class="control-label">Rating</label>
    <input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-size="xs" data-step="1">
                    </div>
                    <span style="color: red;" id="usererr"></span>
                    <span style="color: green;" id="usersuccess"></span>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="createNewLeaderRating()" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit leader</h5>
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
                <button type="button" id="upadteLeaderButton" data-id="0" onclick="updateLeader(event)" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="hdnUserID" value="<?php echo get_current_user_id();?>">
</body>
<!--<script>-->
<!--    var editor21 = CKEDITOR.replace('news_content');-->
<!--    CKFinder.setupCKEditor(editor21);-->
<!--    var editor22 = CKEDITOR.replace('news_content_edit');-->
<!--    CKFinder.setupCKEditor(editor22);-->
<!--</script>-->
<script>
    $(document).ready(function () {
        //$('#myTable').dataTable();

    });
</script>
<script src=<?php echo plugins_url('/trek/assets/admin/js/rating.js') ?> ></script>
<script>
$(document).ready(function(){
    $('#input-2').rating({displayOnly: true, step: 0.5});
});
</script>
</html>