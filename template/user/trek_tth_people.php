<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$team = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_pages_tth_team where trek_tth_role="team" order by trek_tth_role_priority ASC');
$advisor = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_pages_tth_team where trek_tth_role="advisor" order by trek_tth_role_priority ASC');
$founder = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_pages_tth_team where trek_tth_role="founder" order by trek_tth_role_priority ASC');
$management = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_pages_tth_team where trek_tth_role="management" order by trek_tth_role_priority ASC');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TTH People</title>
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
            box-shadow: 0 4px 8px 0 #a5acb5;
            transition: 0.3s;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-evenly;
            width: 40%;
            margin-bottom: 20px;

        }

        .clsd {
            box-shadow: 5px 10px 8px #888888;

        }

        .clsd:hover {
            background-color: #b5b5b5;
            border: 2px solid;

        }

        .advisors-row {
            overflow-y: scroll;
            height: 600px;
        }

        .team-row {
            overflow-y: scroll;
            height: 600px;
        }

        .card {
            padding: 20px !important;
            max-width: 230px !important;
        }

        .team-img {
            height: 100px;
            width: 100px;
            border-radius: 50%;
            margin: 0 auto;
        }

        .mh {
            min-height: 100px;
        }

        .alc {
            text-align: center;

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
<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal_create_team">Add Member</button>&nbsp;
<!--   <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal_create_advisor">Add Advisor</button> -->
<br>
<div class="row header" style="text-align:center;color:green">
    <h3>TTH Founders</h3>
</div>


<div style="margin: 20px;padding: 20px;">
    <div class="row">

        <?php

        $count = count($founder);
        for ($i = 0; $i < $count; $i++) {
            ?>
            <div class="cds col-md-5 mh">

                <div><b><?php echo $founder[$i]->trek_tth_name; ?></b></div>

                <span class="editors-dep video-rev-action"><i class="fas fa-edit" style="color: black;cursor: pointer;"
                                                              data-toggle="modal"
                                                              data-target="#exampleModal_edit_advisor"
                                                              id="<?php echo $founder[$i]->id; ?>"
                                                              onclick="EditTeamMemberFetch(this.id)"></i>&nbsp;&nbsp;<i
                            class="fas fa-trash" style="color: red;cursor: pointer;"
                            id="<?php echo $founder[$i]->id; ?>" onclick="deletePeople(this.id)">&nbsp;&nbsp;</i></span>
            </div>&nbsp;&nbsp;

            <?php
        }
        ?>
    </div>

</div>

<div class="row">

    <div class="col-md-6" style="min-height: 280px; background-color: #D0D9EA; ">
        <div style="color:green">
            <h3>Our Team</h3>
        </div>
        <div class="row advisors-row alc">
            <div class="col-md-12">

                <?php

                $count = count($team);
                for ($i = 0; $i < $count; $i++) {


                    ?>
                    <div class="card clsd">
                        <img class="team-img" src="<?php echo $team[$i]->trek_tth_images; ?>">
                        <div class="container" style="padding: 2px 16px;">
                            <h4><b><?php echo $team[$i]->trek_tth_name; ?></b></h4>
                            <p><?php echo $team[$i]->trek_tth_short_description; ?></p>
                        </div>
                        <span class="editors-dep video-rev-action"><i class="fas fa-edit"
                                                                      style="color: black;cursor: pointer;"
                                                                      data-toggle="modal"
                                                                      data-target="#exampleModal_edit_advisor"
                                                                      id="<?php echo $team[$i]->id; ?>"
                                                                      onclick="EditTeamMemberFetch(this.id)"></i>&nbsp;&nbsp;<i
                                    class="fas fa-trash" style="color: red;cursor: pointer;"
                                    id="<?php echo $team[$i]->id; ?>"
                                    onclick="deletePeople(this.id)">&nbsp;&nbsp;</i></span>
                    </div>
                    <?php
                }
                ?>


            </div>

        </div>

    </div>
    <div class="col-md-6" style=" background-color: #A2BDEF;">
        <div style="text-align:center;color:green">
            <h3>Our Advisors</h3>
        </div>
        <div class="row team-row alc">

            <div class="col-md-12">
                <?php

                $count = count($advisor);
                for ($i = 0; $i < $count; $i++) {


                    ?>

                    <div class="card clsd">
                        <img class="team-img" src="<?php echo $advisor[$i]->trek_tth_images; ?>">
                        <div class="container" style="padding: 2px 16px;">
                            <h4><b><?php echo $advisor[$i]->trek_tth_name; ?></b></h4>
                            <p><?php echo $advisor[$i]->trek_tth_short_description; ?></p>
                        </div>
                        <span class="editors-dep video-rev-action"><i class="fas fa-edit"
                                                                      style="color: black;cursor: pointer;"
                                                                      data-toggle="modal"
                                                                      data-target="#exampleModal_edit_advisor"
                                                                      id="<?php echo $advisor[$i]->id; ?>"
                                                                      onclick="EditTeamMemberFetch(this.id)"></i>&nbsp;&nbsp;<i
                                    class="fas fa-trash" style="color: red;cursor: pointer;"
                                    id="<?php echo $advisor[$i]->id; ?>"
                                    onclick="deletePeople(this.id)">&nbsp;&nbsp;</i></span>
                    </div>

                    <?php
                }
                ?>


            </div>


        </div>
    </div>
    <div class="col-md-6" style=" background-color: #A2BDEF;">
        <div style="text-align:center;color:green">
            <h3>Management</h3>
        </div>
        <div class="row team-row alc">

            <div class="col-md-12">
                <?php

                $count = count($management);
                for ($i = 0; $i < $count; $i++) {


                    ?>

                    <div class="card clsd">
                        <img class="team-img" src="<?php echo $management[$i]->trek_tth_images; ?>">
                        <div class="container" style="padding: 2px 16px;">
                            <h4><b><?php echo $management[$i]->trek_tth_name; ?></b></h4>
                            <p><?php echo $management[$i]->trek_tth_short_description; ?></p>
                        </div>
                        <span class="editors-dep video-rev-action"><i class="fas fa-edit"
                                                                      style="color: black;cursor: pointer;"
                                                                      data-toggle="modal"
                                                                      data-target="#exampleModal_edit_advisor"
                                                                      id="<?php echo $management[$i]->id; ?>"
                                                                      onclick="EditTeamMemberFetch(this.id)"></i>&nbsp;&nbsp;<i
                                    class="fas fa-trash" style="color: red;cursor: pointer;"
                                    id="<?php echo $management[$i]->id; ?>"
                                    onclick="deletePeople(this.id)">&nbsp;&nbsp;</i></span>
                    </div>

                    <?php
                }
                ?>


            </div>


        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal_edit_advisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Team Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="people-name-edit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Short Description:</label>
                        <input type="text" class="form-control" id="people-description-edit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Long Description :</label>
                        <textarea class="form-control" id="people-description-long-edit"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tth-team-priority">Select Role:</label>
                        <select class="form-control" name="people-role" id="people-role-edit">
                            <option value="team">Team</option>
                            <option value="advisor">Advisor</option>
                            <option value="founder">Founder</option>
                            <option value="management">Management</option>
                        </select>

                    </div>
                    <div class="form-group" id="category_advisor_edit" style="display: none">
                        <label for="tth-team-priority">Select category:</label>
                        <select class="form-control" name="advisory-cat-edit" id="advisory-cat-edit">
                            <option value="">Select</option>
                            <option value="Management">Management</option>
                            <option value="advisory_board">Advisory Board</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tth-team-priority">Select Priority:</label>
                        <select class="form-control" name="people-priority" id="people-priority-edit">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>

                        </select>

                    </div>
                    <div class="form-group" hidden>
                        <label for="recipient-name" class="col-form-label"></label>
                        <input type="text" class="form-control" id="people-id-edit">
                    </div>
                </form>
                <img src="" id="people-image-edit" style="max-height: 200px;max-width: 200px;"><br>
                <label for="recipient-name" class="col-form-label">Add Photo(150x150):</label>
                <input type="button" value="Choose File" onclick="uploadNewsImage()"
                       class="form-control-file" id="trek_upload1" name="trek_upload1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="EditTeamMember()" class="btn btn-primary">Edit Team Member</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal_create_team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Team Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="people-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Short Description :</label>
                        <input type="text" class="form-control" id="people-description">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Long Description :</label>
                        <textarea class="form-control" id="people-description-long"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tth-team-priority">Select Role:</label>
                        <select class="form-control" name="people-role" id="people-role">
                            <option value="team">Team</option>
                            <option value="advisor">Advisor</option>
                            <option value="founder">Founder</option>
                            <option value="management">Management</option>
                        </select>
                    </div>

                    <div class="form-group" id="category_advisor_add" style="display: none">
                        <label for="tth-team-priority">Select category:</label>
                        <select class="form-control" name="advisory-cat-create" id="advisory-cat-create">
                            <option value="">Select</option>
                            <option value="Management">Management</option>
                            <option value="advisory_board">Advisory Board</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tth-team-priority">Select Priority:</label>
                        <select class="form-control" name="people-priority" id="people-priority">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>

                        </select>

                    </div>

                </form>
                <img src="" id="people-image" style="max-height: 200px;max-width: 200px;"><br>
                <label for="recipient-name" class="col-form-label">Add Photo(150x150):</label>
                <input type="button" value="Choose File" onclick="uploadNewsImage()"
                       class="form-control-file" id="trek_upload1" name="trek_upload1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="createTeamMember()" class="btn btn-primary">Create Team Member</button>
            </div>
        </div>
    </div>
</div>


</body>

<script>
    $(document).ready(function () {
        $('#myTable').dataTable();

    });

    $('#people-role').on('change', function () {
        if (this.value == 'advisor') {
            $('#category_advisor_add').css('display', 'block')
        }
        else{
            $('#category_advisor_add').css('display', 'none')
        }
    });

    $('#people-role-edit').on('change', function () {
        if (this.value == 'advisor') {
            $('#category_advisor_edit').css('display', 'block')
        }
        else
        {
            $('#category_advisor_edit').css('display', 'none')
        }
    });
</script>

</html>