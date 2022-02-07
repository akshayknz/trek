<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$certification = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_pages_tth_awards where trek_tth_role="certification" order by trek_tth_award_priority ASC');
$recoginition = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_pages_tth_awards where trek_tth_role="recoginition" order by trek_tth_award_priority ASC');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TTH Awards</title>
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
            min-width: 85% !important;
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

        .award-edit {
            cursor: pointer;
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

<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>TTH Awards</h3>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 award-images-container">

            <div class="row header"
                 style="text-align:center;color:black;margin-left: 20px;margin-top: 10px;padding: 5px;">
                <h3>Uploaded Awards</h3><span class="award-images-add-new">  <button class="myButton btn btn-primary"
                                                                                     data-toggle="modal"
                                                                                     data-target="#exampleModal">Add new Certification</button></span>
            </div>

            <hr>
            <div class="row col-md-12 col-lg-12 col-xl-12">

                <?php

                $count = count($certification);
                for ($i = 0; $i < $count; $i++) {


                    ?>
                    <div class="card cds">

                        <div style="margin-top: 10px;text-align: center;"><span style="float: left;"><img
                                        src="<?php echo $certification[$i]->trek_tth_award_image; ?>"
                                        style="max-width: 200px;max-height: 100px;">&nbsp;&nbsp;&nbsp;
                                    </span><span
                                    class="editors-dep"><i class="fas fa-trash" onclick="deleteAward(this.id)"
                                                           id="<?php echo $certification[$i]->id; ?>"
                                                           style="color: red;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                        </div>
                    </div><br><br>

                <?php } ?>


            </div>
        </div>

        <div class="col-md-6 award-recoginition-container">

            <div class="row header"
                 style="text-align:center;color:black;margin-left: 20px;margin-top: 10px;padding: 5px;">
                <h3>Recoginition</h3><span class="award-images-add-new">  <button class="myButton btn btn-primary"
                                                                                  data-toggle="modal"
                                                                                  data-target="#exampleModalrecognition">Add new Recoginition</button></span>
            </div>

            <hr>
            <div class="row col-md-12 col-lg-12 col-xl-12">
                <?php

                $count = count($recoginition);
                for ($i = 0; $i < $count; $i++) {


                    ?>
                    <div class="card cds">

                        <div style="margin-top: 10px;text-align: center;"><span style="float: left;"><img
                                        src="<?php echo $recoginition[$i]->trek_tth_award_image; ?>"
                                        style="max-width: 200px;max-height: 100px;"
                                        id="recoginition_image_<?php echo $recoginition[$i]->id; ?>">&nbsp;&nbsp;&nbsp;
                                    </span>


                            <span
                                    class="editors-dep"><i class="fas fa-edit award-edit" data-toggle="modal"
                                                           data-target="#exampleModalrecognitionEdit"
                                                           id="<?php echo $recoginition[$i]->id; ?>"
                                                           onclick="EditAwardFetch(this.id)"></i>&nbsp;&nbsp;<i
                                        class="fas fa-trash" onclick="deleteAward(this.id)"
                                        style="color: red;cursor: pointer;" id="<?php echo $recoginition[$i]->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                        </div>
                        <textarea id="recoginition_breif_<?php echo $recoginition[$i]->id; ?>"
                                  hidden><?php echo $recoginition[$i]->trek_tth_brief; ?></textarea>
                        <input type="text" id="recoginition_priority_<?php echo $recoginition[$i]->id; ?>"
                               value="<?php echo $recoginition[$i]->trek_tth_award_priority; ?>" style="display: none;">

                    </div><br><br>
                <?php } ?>


            </div>
        </div>

    </div>


</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Certification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="tth-award-name"><br>

                        <label for="tth-award-priority">Select Priority:</label>
                        <select class="form-control" name="tth-award-priority" id="tth-award-priority">
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
                <img src="" id="tth-award-img" style="max-height: 200px;max-width: 200px;"><br>
                <label for="recipient-name" class="col-form-label">Add Photo(183x110):</label>
                <input type="button" value="Choose File" onclick="uploadNewsImage()"
                       class="form-control-file" id="tth-award-img1" name="tth-award-img1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="createCertification()" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalrecognition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Recognitions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">


                        <label for="recipient-name" class="col-form-label">Brief Description:</label>
                        <textarea class="form-control" id="tth-award-brief"></textarea><br><br>

                        <label for="tth-award-priority">Select Priority:</label>

                        <select class="form-control" name="tth-award-priority-rec" id="tth-award-priority-rec">
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
                <img src="" id="tth-award-img-rec-edit" style="max-height: 200px;max-width: 200px;"><br>
                <label for="recipient-name" class="col-form-label">Add Photo(192x192) :</label>
                <input type="button" value="Choose File" onclick="uploadNewsImage()"
                       class="form-control-file" id="trek_upload1" name="trek_upload1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="createRecoginition()" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalrecognitionEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Recognition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">

                        <div hidden>
                            <input type="text" id="award_edit_id">
                        </div>

                        <label for="recipient-name" class="col-form-label">Brief Description:</label>
                        <textarea class="form-control" id="tth-award-berif-rec-edit"></textarea><br><br>

                        <label for="tth-award-priority">Select Priority:</label>

                        <select class="form-control" name="tth-award-priority-rec-edit"
                                id="tth-award-priority-rec-edit">
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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="EditAwards()" class="btn btn-primary">Update</button>
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