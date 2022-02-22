<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_pages_tth_video_review order by trek_tth_video_priority ASC');
$data1 = $wpdb->get_results('SELECT trek_name,id FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status="0" order by trek_name ASC');
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

    .video-rev-action {
        float: right;
    }
    .note{
        font-style: italic;
        color: #b0a68b;
        margin-left: 5px;
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
    <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Video Review
    </button>
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Video Reviews</h3>
        </div>
        <div class="row col-md-12">

             <?php
                            $j = 0;
                            $count = count($data);
                            for ($i = 0; $i < $count; $i++) {
                                $j++;

                        ?>
            <!-- //contents -->
            <div class="card cds col-md-6">

                <div style="margin-top: 10px;text-align: center;float: left;">
                    <iframe width="500" height="315" src="<?php echo $data[$i]->trek_tth_video_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php
                    $vidID = substr($data[$i]->trek_tth_video_url, strrpos($data[$i]->trek_tth_video_url, '/') + 1);
                    ?>



                <span><?php echo explode(' - YouTube',explode('</title>',explode('<title>',file_get_contents("https://www.youtube.com/watch?v=$vidID"))[1])[0])[0]; ?></span>
                </div>
                <span class="editors-dep video-rev-action"><i class="fas fa-edit" style="color: black;cursor: pointer;"
                        data-toggle="modal" data-target="#exampleModal_edit_video" id="<?php echo $data[$i]->id; ?>" onclick="updateVideoReviewFetch(this.id)"></i>&nbsp;&nbsp;<i
                        class="fas fa-trash" style="color: red;cursor: pointer;" id="<?php echo $data[$i]->id; ?>" onclick="deleteVideoReview(this.id)">&nbsp;&nbsp;</i></span>


            </div>

        <?php } ?>





        </div>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Video Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="video-name">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="video-title">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Year:</label>
                            <input type="number" class="form-control" id="video-year">
                        </div>

                         <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Video URL :</label>
                            <input type="text" class="form-control" id="video-url">
                        </div>


                      <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Trek :<span class="note">(For home page select general)</span></label>
                           <select class="form-control" name="tth-video-trek"  id="video-trek">
                            <option value="general" selected>General</option>
                            <?php
                                $count = count($data1);
                                for($i=0;$i<$count;$i++){
                                    ?>
                                    <option value="<?= $data1[$i]->id ?>"><?= $data1[$i]->trek_name ?></option>

                                    <?php
                                }
                            ?>



                            </select>
                        </div>

                        <div class="form-group">
                              <label for="tth-award-priority">Select Priority:</label>
                            <select class="form-control" name="tth-award-priority"  id="video-priority">
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
<!--                     <img src="" id="video-image" style="max-height: 200px;max-width: 200px;"><br>-->
<!--                     <label for="recipient-name" class="col-form-label">Add Photo: <span class="note" id="review-note"></span></label>-->
<!--                             <input type="button" value="Choose File" onclick="uploadNewsImage()"-->
<!--                                                        class="form-control-file" id="trek_upload1" name="trek_upload1">-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="createVideoReview()" class="btn btn-primary">Add Review</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal_edit_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit New Video Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="video-name-edit">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="video-title-edit">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Year:</label>
                            <input type="number" class="form-control" id="video-year-edit">
                        </div>
                        <div class="form-group" hidden>
                            <input type="text" id="video-id-edit">
                        </div>
                         <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Trek :<span class="note">(For home page select general)</span></label>
                           <select class="form-control" multiple name="tth-video-trek"  id="video-trek-edit">
                            <option value="general" selected>General</option>
                            <?php
                                $count = count($data1);
                                $flag =0;
                                for($i=0;$i<$count;$i++){

                                       ?>

                                        <option value="<?= $data1[$i]->id ?>"><?= $data1[$i]->trek_name ?></option>

                                  <?php
                                }
                            ?>
                            </select>
                        </div>
                    <div class="form-group">
                              <label for="tth-award-priority">Select Priority:</label>
                            <select class="form-control" name="tth-video-review-trek"  id="video-priority-edit">
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

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Video URL :</label>
                            <input type="text" class="form-control" id="video-url-edit">
                        </div>


                    </form>
<!--                     <div id="image-container">-->
<!---->
<!--                     </div>-->
<!--                     <label for="recipient-name" class="col-form-label">Add Photo: <span class="note" id="review-note"></span></label>-->
<!--                             <input type="button" value="Choose File" onclick="uploadNewsImage()"-->
<!--                                                        class="form-control-file" id="trek_upload1" name="trek_upload1">-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="updateVideoReview()" class="btn btn-primary">Add Review</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>