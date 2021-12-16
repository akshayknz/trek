<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT id,trek_name,trek_region_state FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0 order by id desc');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>trek Himalaya</title>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
</head>

<body style="margin:20px auto">

<div class="loader" id="loader">

</div>

<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Trek Graphs.</h3>
    </div>

    <div class="col-md-12">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Trek Name</th>

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
                        <td style="text-align: center;"><?php echo $data[$i]->trek_name; ?></td>

                        <td class="text-center">&nbsp;&nbsp;<button class="btn btn-info"
                                                                    id="<?php echo $data[$i]->id; ?>-alledit"
                                                                    onclick='checkGraph(this.id)'
                                                                    data-toggle="modal" data-target="#exampleModal">
                                View/Create
                            </button>&nbsp;

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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-6 card gallarybox2 set-padding" style="margin-left: 26px;">

                </div>
                <img src="" id="tth-award-img" style="max-height: 200px;max-width: 200px;"><br>
                <label for="recipient-name" class="col-form-label">Add Photo:</label>
                <input type="button" value="Choose File" onclick="uploadNewsImage_graph()"
                       class="form-control-file" id="tth-award-img1" name="tth-award-img1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveGraph()">Save changes</button>
                <input type="hidden" id="trek_graph_id">
                <input type="hidden" id="trek_graph_trekid">
            </div>
        </div>
    </div>
</div>
</body>

<script>
    $(document).ready(function () {
        $('#myTable').dataTable();

    });

    function checkGraph(id) {
        $(".gallarybox2").html("");
        $("#trek_graph_id").val('');
        $("#trek_graph_trekid").val('');
        // if (newsImage === '') {
        //     alert("Image required");
        //     return;
        // }
        // else {
        jQuery("#loader").css("display", "block");
        var data = new FormData();
        data.append('id', id);
        data.append('img', newsImage);
        data.append('action', "getGraph");
        jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_objs.ajax_url_pages,
            data: data,
            success: function (msg) {

                json = JSON.parse(msg);
                jQuery("#loader").css("display", "none");
                if (json.statusCode == 200) {
                    $(".gallarybox2").html("<img id='img_graph' src=" + json.data[0].trek_selected_flags + ">");
                    $("#trek_graph_id").val(json.data[0].id);
                    $("#trek_graph_trekid").val(id);
                } else {
                    $(".gallarybox2").html("No images added.");
                    $("#trek_graph_trekid").val(id);
                }
            }
        });

    }

    function saveGraph() {
        var id = $("#trek_graph_id").val();
        var trek_id = $("#trek_graph_trekid").val();

        if (id == ''||id == null || id == undefined) {
            if (newsImage === ''||newsImage === undefined ||newsImage == null) {
                alert("image required.");
                return;
            } else {
                jQuery("#loader").css("display", "block");
                var data = new FormData();
                data.append('trek_id', trek_id);
                data.append('img', newsImage);
                data.append('action', "addGraph");
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
                            alert("Added");
                            location.reload();
                        } else {
                            alert("some errors occured.");
                        }
                    }
                });
            }
        }
        else {
            let imgsrc = document.getElementById("img_graph");
            // alert(imgsrc);
            // return;
            if(imgsrc)
            {
                alert("Please select another image to update.");
                return;
            }
            jQuery("#loader").css("display", "block");
            var data = new FormData();
            data.append('id', id);
            data.append('img', newsImage);
            data.append('action', "updateGraph");
            jQuery.ajax({
                type: "post",
                cache: false,
                contentType: false,
                processData: false,
                url: my_objs.ajax_url_pages,
                data: data,
                success: function (msg) {

                    json = JSON.parse(msg);

                    jQuery("#loader").css("display", "none");
                    if (json.statusCode == 200) {
                        alert("Updated.");
                        location.reload();
                    } else {
                        alert("Some errors occurred.")
                    }
                }
            });

        }

    }

    function uploadNewsImage_graph() {
        $(".gallarybox2").html("");
        newsImage = [];
        var images = wp.media({
            title: "Upload Images",
            multiple: false,
            library: {
                type: 'image'
            },
        }).open().on("select", function (e) {

            var uploadedImages = images.state().get("selection");

            // selectimg=uploadedImages.toJSON();
            // ;
            count = uploadedImages.toJSON().length;
            selectimage = uploadedImages.toJSON();
            if (count == 1) {
                result = selectimage[0].url;
            }
            newsImage.push(result);

            $(".gallarybox2").html("<img src=" + newsImage + ">");

        })

    }

</script>

</html>