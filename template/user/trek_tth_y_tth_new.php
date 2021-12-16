<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$why_data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'tth_trek_why_tth_new where typeData="why"');
/*print_r($why_data);
die;*/
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
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word !important;
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
        <h3>Why TTH</h3>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 award-images-container">

            <div class="row header"
                 style="text-align:center;color:black;margin-left: 20px;margin-top: 10px;padding: 5px;">
                <h3>Why tth</h3><span class="award-images-add-new">  <button class="myButton btn btn-primary"
                                                                             data-toggle="modal"
                                                                             data-target="#exampleModal">Add</button></span>
            </div>

            <hr>
            <div class="row col-md-12 col-lg-12 col-xl-12">

                <?php

                $count = count($why_data);
                //                if ($count > 1) {
                for ($i = 0; $i < $count; $i++) {


                    ?>
                    <div class="card cds">

                        <h4><?= $why_data[$i]->textData ?></h4>
                        <div style="margin-top: 10px;text-align: center;">
                            <?php

                            $string = $why_data[$i]->imgs;
                            $array = explode(',', $string);
                            foreach ($array as $value) {
                                ?>

                                <span style="float: left;"><img
                                            src="<?= $value ?>"
                                            style="max-width: 200px;max-height: 100px;">&nbsp;&nbsp;&nbsp;
                                    </span>

                                <?php
                            }

                            ?>

                            <span class="editors-dep"><i class="fas fa-edit" onclick="getWhy(this.id)"
                                                         id="<?php echo $why_data[$i]->id; ?>"
                                                         style="cursor: pointer;" data-toggle="modal"
                                                         data-target="#exampleModal_why_tth">&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                            <span class="editors-dep"><i class="fas fa-trash" onclick="deletewhy(this.id)"
                                                         id="<?php echo $why_data[$i]->id; ?>"
                                                         style="color: red;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                        </div>
                        <h6><?= $why_data[$i]->desc ?></h6>
                    </div>
                    <br><br>

                <?php }
                //                } else {
                ?>
                <!--                    <h6>No data available.</h6>-->
                <?php
                //                }
                ?>


            </div>
        </div>


    </div>


</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tth_why_head" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="tth_why_head"><br>

                        <label for="tth_why_desc">Sub title(description):</label><br>
                        <textarea rows="6" cols="50" id="tth_why_desc">
                      </textarea>
                    </div>

                </form>
                <img src="" id="tth-award-img" style="max-height: 200px;max-width: 200px;"><br>
                <label for="recipient-name" class="col-form-label">Add Photo (max 3):</label>
                <input type="button" value="Choose File" onclick="uploadNewsImages()"
                       class="form-control-file" id="tth-award-img1" name="tth-award-img1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="createwhytth()" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal_why_tth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tth_why_head" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="tth_why_head_edit"><br>

                        <label for="tth_why_desc">Sub title(description):</label><br>
                        <textarea rows="6" cols="50" id="tth_why_desc_edit">
                      </textarea>
                    </div>

                </form>
                <div id="why_tth_imgs">
                    <img src="" id="tth-award-img" style="max-height: 200px;max-width: 200px;">
                </div>


                <br>
                <label for="recipient-name" class="col-form-label">Add Photo (max 3 Dimension 410x344):</label>
                <input type="button" value="Choose File" onclick="uploadNewsImages()"
                       class="form-control-file" id="tth-award-img1" name="tth-award-img1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="updatewhytth()" class="btn btn-primary">Add</button>
                <input type="hidden" id="whytth_id">
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

    function uploadNewsImages() {
        newsImage = [];
        var images = wp.media({
            title: "Upload Images",
            multiple: true,
            library: {
                type: 'image'
            },
        }).open().on("select", function (e) {

            var uploadedImages = images.state().get("selection");

            selectimg = uploadedImages.toJSON();
            selectimage = uploadedImages.toJSON();
            // if (count == 1) {
            result = selectimage[0].url;
            $.each(selectimage, function (key, value) {
                newsImage.push(value.url);
            });

            jQuery("#review-note").html("<h6 style='color:green;'font-style:italic;>Cover photo added</h6>");
            jQuery("#news-note").html("<h6 style='color:green;'font-style:italic;>Cover photo added</h6>");

        })

    }


    $(document).ready(function () {
        $('#myTable').dataTable();

    });

    function deletewhy(id) {

        if (confirm('Are you sure to want to delete?')) {
            var data = new FormData();
            data.append('id', id);
            data.append('action', 'removeTthWhy');
            jQuery("#loader").css("display", "block");
            jQuery.ajax({
                type: "post",
                cache: false,
                contentType: false,
                processData: false,
                url: my_objs.ajax_url_pages,
                data: data,
                success: function (msg) {

                    json = JSON.parse(msg);
                    console.log(json);
                    jQuery("#loader").css("display", "none");
                    if (json.statusCode == 200) {
                        alert("Deleted");
                        location.reload();

                    } else {
                        alert("Some error occured!");
                    }
                }
            });
        }

    }

    function getWhy(id) {

        jQuery("#loader").css("display", "block");
        var data = new FormData();
        data.append('id', id);
        data.append('action', 'getTthWhy');
        jQuery("#loader").css("display", "block");
        jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_objs.ajax_url_pages,
            data: data,
            success: function (msg) {

                json = JSON.parse(msg);
                console.log(json);
                jQuery("#loader").css("display", "none");

                if (json.statusCode == 200) {
                    newsImage = [];
                    $("#tth_why_head_edit").val(json.data[0].textData);
                    $("#tth_why_desc_edit").val(json.data[0].descData);
                    $("#whytth_id").val(json.data[0].id);

                    newsImage = json.data[0].imgs.split(',');
                    $("#why_tth_imgs").html('');
                    $.each(newsImage, function (key, value) {
                        $("#why_tth_imgs").append('<img src="' + value + '" id="tth-award-img" style="max-height: 100px;max-width: 100px;">&nbsp;');
                        /*<div style="color: red;cursor: pointer;" id=' + value + ' onclick="gallery_img_rmv(this.id)"><b>X</b></div>*/
                    });
                    console.log(newsImage);
                } else {
                    alert("Some error occurred!");
                }
            }
        });
    }

    function updatewhytth() {

        if (newsImage.length > 3) {
            alert("Only 3 images allowed.");
            return;
        }
        if ((newsImage === 'undefined') || (newsImage !== '')) {
            var award_image = newsImage;
            console.log(newsImage);
            $("#tth-award-img").attr("src", award_image);

        } else {
            alert("You should select an image");
            return;
        }
        var edit_id = $("#whytth_id").val();
        var edit_head = $("#tth_why_head_edit").val();
        var edit_desc = $("#tth_why_desc_edit").val();
        if (edit_head === "" || edit_desc === "") {
            alert("all fields required.");
            return;
        }

        var data = new FormData();
        data.append('id', edit_id);
        data.append('text', edit_head);
        data.append('desc', edit_desc);
        data.append('why_img', award_image);
        data.append('action', 'editTTHWhy');

        jQuery("#loader").css("display", "block");

        jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_objs.ajax_url_pages,
            data: data,
            success: function (msg) {

                json = JSON.parse(msg);
                console.log(json);
                jQuery("#loader").css("display", "none");
                if (json.statusCode == 200) {

                    location.reload();
                } else {
                    alert("Some error occured!");
                }
            }
        });

    }

    function createwhytth() {

        var why_title = $("#tth_why_head").val();
        var why_desc = $("#tth_why_desc").val();

        if (newsImage.length > 3) {
            alert("Only 3 images allowed.");
            return;
        }
        if ((newsImage === 'undefined') || (newsImage !== '')) {
            var award_image = newsImage;
            console.log(newsImage);
            $("#tth-award-img").attr("src", award_image);

        } else {
            alert("You should select an image");
            return;
        }


        if ((why_title == '') || (why_desc == '')) {
            alert("All fields required!");
            return;
        } else {
            var data = new FormData();
            data.append('text', why_title);
            data.append('desc', why_desc);
            data.append('why_img', award_image);
            data.append('action', 'add_tth_why');

            jQuery("#loader").css("display", "block");

            jQuery.ajax({
                type: "post",
                cache: false,
                contentType: false,
                processData: false,
                url: my_objs.ajax_url_pages,
                data: data,
                success: function (msg) {

                    json = JSON.parse(msg);
                    console.log(json);
                    jQuery("#loader").css("display", "none");
                    if (json.statusCode == 200) {

                        if (json.result == 'inserted') {
                            location.reload();
                        }
                    } else {
                        alert("Some error occured!");
                    }
                }
            });
        }

    }

    // function gallery_img_rmv(id) {
    //     if (confirm("Are you sure to want to remove?")) {
    //         newsImage.splice(id, 1);
    //         $("#" + id).remove();
    //     }
    //
    // }

</script>

</html>