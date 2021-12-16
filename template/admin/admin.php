<?php
/**
 * @package TrekPlugin
 */
defined('ABSPATH') or die('Hei, Access restricted!');
wp_enqueue_media();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <style>
    body {
        font-family: "Lato", sans-serif;
    }

    .contentbox {
        background-color: #e0c3ab;
        min-height: 330px;
        margin-right: 20px;
        width: auto;
        border-radius: 10px;

    }

    .myformbox {
        margin-top: 19px;
        min-height: 345px;
    }

    .nexbut {
        margin-bottom: 20px;
    }

    .gallarybox {
        height: 210px;
        border-style: solid;
        border-color: #385178;
        border-radius: 10px;
        box-shadow: 10px 10px grey;
    }
    </style>
</head>

<body>
    <!-- <div class="sidenav">
   <a href="#">All Treks</a>
   <a href="#">Add Trek</a>
   <a href="#">Trek Flags</a>
   <a href="#">Cancellation Policies</a>
   </div> -->
    <div class="main">
        <span class="pull-right" style="margin-top: 20px; margin-right: 10px;" id="submitbut2">
            <div class="btn btn-primary">Add Trek</div>
        </span>
        <div class="container" id="tabs">
            <h2>Trek</h2>

            <p>Add every deatils to complete the form. Fields with astrek is mandatroy.</p>
            <ul class="nav nav-tabs">
                <li class="active"><a id="menu_home" data-toggle="tab" href="#home">Trek details</a></li>
                <li><a id="menu_one" data-toggle="tab" href="#menu1">Transportation</a></li>
                <li><a id="menu_two" data-toggle="tab" href="#menu2">Description </a></li>
                <li><a id="menu_three" data-toggle="tab" href="#menu3">others </a></li>
            </ul>
            <!--menu 1-->
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    .
                    <div class="container contentbox">

                        <form id="contact-form" role="form">
                            <div class="myformbox">

                                <!--                        //row 1-->
                                <div class="row col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="trek_name">Trek Name *</label>
                                            <input id="trek_name" type="text" class="form-control"
                                                placeholder="Trek Name *" required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="trek_cost">Trek Cost
                                            </label> <input id="trek_cost" class="form-control" type="number"
                                                placeholder="Trek Cost">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="trek_tax">Trek Service Tax
                                            </label> <input id="trek_tax" type="text" class="form-control"
                                                placeholder="Trek Service Tax">
                                        </div>
                                    </div>
                                </div>
                                <!--                            //row 2-->
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_country">Please specify your
                                                region *</label>
                                            <select id="trek_country" class="form-control" required="required"
                                                data-error="Please specify your region.">
                                                <option value="" selected>--Select Your country--
                                                </option>
                                                <option>USA</option>
                                                <option>Australia</option>
                                                <option>Japan</option>
                                                <option>China</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_state">&nbsp;</label>
                                            <select id="trek_state" class="form-control" required="required"
                                                data-error="Please specify your region.">
                                                <option value="" selected>--Select Your state--
                                                </option>
                                                <option>New york</option>
                                                <option>Hawaii</option>
                                                <option>Tokyo</option>
                                                <option>Sydney</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_city">&nbsp;</label>
                                            <select id="trek_city" class="form-control" required="required"
                                                data-error="Please specify your region.">
                                                <option value="" selected>--Select Your city--
                                                </option>
                                                <option>Hilo</option>
                                                <option>Kyoto</option>
                                                <option>Toyama</option>
                                                <option>Hobart</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_grade">Please specify your
                                                Grade *</label>
                                            <select id="trek_grade" class="form-control" required="required"
                                                data-error="Please specify your Grade.">
                                                <option value="" selected>--Select Your Grade--
                                                </option>
                                                <option>Easy</option>
                                                <option>Easy to Moderate</option>
                                                <option>Moderate</option>
                                                <option>Moderate to Difficult</option>
                                                <option>Difficult</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!--                            //row 3-->
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group"><label for="trek_day">Days *</label>
                                            <input id="trek_day" type="number" class="form-control" placeholder="Days *"
                                                required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Altitude *</label>
                                            <input id="trek_altitude" type="number" class="form-control"
                                                placeholder="Altitude *" required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Distance
                                                *</label> <input id="trek_distance" type="text" class="form-control"
                                                placeholder="Distance *" required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_season">Please specify your
                                                season *</label>
                                            <select id="trek_season" class="form-control" required="required"
                                                data-error="Please specify your Grade.">
                                                <option value="" selected>--Select Your season--
                                                </option>
                                                <option>January</option>
                                                <option>February</option>
                                                <option>March</option>
                                                <option>April</option>
                                                <option>May</option>
                                                <option>June</option>
                                                <option>July</option>
                                                <option>August</option>
                                                <option>September</option>
                                                <option>October</option>
                                                <option>November</option>
                                                <option>December</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!--                            //row 4-->
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="trek_Trail_type">Trail Type *</label>
                                            <textarea class="form-control" id="trek_trail_type" rows="3"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="nexbut pull-right">
                                <a class="btn btn-primary next-tab" style="width: 100px;" role="button">Next</a>
                            </div>

                            <!--                        <button  type="button" class="btn btn-primary">Next</button>-->
                        </form>
                    </div>
                </div>
                <!--menu 2-->
                <div id="menu1" class="tab-pane fade">
                    <div id="home" class="tab-pane fade in active">
                        .
                        <div class="container contentbox">
                            <form id="contact-form myformbox" class="myformbox" role="form"
                                enctype="multipart/form-data">
                                <div class="myformbox">

                                    <!--                            //row 1-->
                                    <div class="row col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="trek_pup1">Pick-up and Drop *</label>
                                                <select id="trek_pup1" class="form-control" required="required"
                                                    data-error="Please specify your pickup place 1.">
                                                    <option value="" selected>--Pickup place 1--
                                                    </option>
                                                    <option>USA</option>
                                                    <option>Australia</option>
                                                    <option>Japan</option>
                                                    <option>China</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="trek_drop">&nbsp;</label>
                                                <select id="trek_drop" class="form-control" required="required"
                                                    data-error="Drop place.">
                                                    <option value="" selected>--Please specify your drop place--
                                                    </option>
                                                    <option>Hilo</option>
                                                    <option>Kyoto</option>
                                                    <option>Toyama</option>
                                                    <option>Hobart</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="trek_flag">Trek Flags</label>
                                                <select id="trek_flag" class="form-control" required="required"
                                                    data-error="Please specify your Grade.">
                                                    <option value="" selected>--Select Your Trek Flags--
                                                    </option>
                                                    <option> Summer Treks</option>
                                                    <option>Monsoon Treks</option>
                                                    <option>Autumn Treks</option>
                                                    <option>Winter Treks</option>
                                                    <option>Weekend Treks</option>
                                                    <option>Cycling Trips</option>
                                                    <option>TTH Treks</option>
                                                    <option>Pilgrimage Tours</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label for="trek_Transportation">Transportation
                                                    *</label>
                                                <input id="trek_transportation" type="number" class="form-control"
                                                    placeholder="Days *" required="required" data-error="required.">
                                            </div>
                                        </div>
                                    </div>

                                    <!--                            //row 3-->
                                    <!--    <div class="row col-md-12">
                                      <div class="col-md-3">
                                         <div class="form-group"><label for="trek_Transportation">Transportation *</label>
                                            <input id="trek_Transportation" type="number"
                                               class="form-control"
                                               placeholder="Days *"
                                               required="required" data-error="required.">
                                         </div>
                                      </div>

                                   </div>
            -->
                                    <div class="row col-md-12" style="margin-top: 40px;">
                                        <center>
                                            <div class="row col-md-1"></div>
                                            <div class="col-md-3 card gallarybox">
                                                <div class="form-group"><label for="trek_Transportation">Upload Trek
                                                        Image
                                                        *</label>
                                                    <input type="button" value="Choose File" onclick=""
                                                        class="form-control-file file1" id="trek_upload1"
                                                        name="trek_upload1[]">

                                                </div>
                                                <i>Choose profile image</i><br>
                                                <div id="trek_upload_img1" style="height: 100%;width: 100%"
                                                    name="trek_upload_img1"></div>
                                            </div>
                                            <div class="row col-md-1"></div>
                                            <div class="col-md-3 card gallarybox">
                                                <div class="form-group"><label for="trek_Transportation">Gallery Images
                                                        *</label>
                                                    <input type="button" value="Choose File"
                                                        class="form-control-file file2" id="trek_upload2"
                                                        name="trek_upload2" id="trek_upload2" multiple>
                                                </div>
                                                <i>Choose multiple images</i><br>
                                                <div id="trek_upload_img2" name="trek_upload_img2"></div>
                                            </div>
                                            <div class="row col-md-1"></div>
                                            <div class="col-md-3 card gallarybox">
                                                <div class="form-group"><label for="trek_Transportation">Slider Images
                                                        *</label>
                                                    <input type="button" value="Choose File"
                                                        class="form-control-file file3" name="trek_upload3[]"
                                                        id="trek_upload3" multiple>
                                                </div>
                                                <i>Choose multiple images</i><br>
                                                <div id="trek_upload_img3" name="trek_upload_img3"></div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="nexbut pull-right">
                                    <a class="btn btn-primary next-tab" style="width: 100px;" role="button">Next</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="menu2" class="tab-pane fade">
                    <div id="home" class="tab-pane fade in active">
                        .
                        <div class="container contentbox">
                            <form id="contact-form myformbox" class="myformbox" role="form">
                                <div class="myformbox">


                                    <!--                        //row 1-->
                                    <div class="row col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_CPolicy1">Cancellation Policies *</label>
                                                <select id="trek_cancel_policy" class="form-control" required="required"
                                                    data-error="Please specify your Grade.">
                                                    <option value="" selected>--Select cancellation policy
                                                    </option>
                                                    <option>cancellation policy 1</option>
                                                    <option>cancellation policy 2</option>
                                                    <option>cancellation policy 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_Essential">Trek Essential</label>
                                                <select id="trek_essential" class="form-control" required="required"
                                                    data-error="Please specify your Grade.">
                                                    <option value="" selected>--Trek Essential--
                                                    </option>
                                                    <option>Trek Essential for short trek</option>
                                                    <option>Trek Essential for winter trek</option>
                                                    <option>Trek Essential for expedition trek</option>
                                                    < </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label for="trek_reach">How to Reach *</label>
                                                <select id="trek_reach" class="form-control" required="required"
                                                    data-error="Please specify your Grade.">
                                                    <option value="" selected>--How to Reach--
                                                    </option>
                                                    <option>Train</option>
                                                    <option>Bus</option>
                                                    <option>Air</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <!--                            //row 2-->

                                    <div class="row col-md-12">


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_overview">Overview *</label>
                                                <textarea class="form-control" id="trek_overview" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_about">About the Trek *</label>
                                                <textarea class="form-control" id="trek_about" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_brief">Brief Itinerary *</label>
                                                <textarea class="form-control" id="trek_brief" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_itinerary">Detailed Itinerary *</label>
                                                <textarea class="form-control" id="trek_itinerary" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_cost_terms">Cost Terms *</label>
                                                <textarea class="form-control" id="trek_cost_terms" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="nexbut pull-right">
                                    <a class="btn btn-primary next-tab" style="width: 100px;" role="button">Next</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--            menu 5-->
                <div id="menu3" class="tab-pane fade">
                    <div id="home" class="tab-pane fade in active">
                        .
                        <div class="container contentbox">
                            <form id="contact-form myformbox" class="myformbox" role="form">
                                <div class="myformbox">


                                    <!--                        //row 1-->
                                    <div class="row col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group"><label for="trek_Fitness">Fitness *</label>
                                                <input id="trek_fitness" type="text" class="form-control"
                                                    placeholder="Fitness *" required="required" data-error="required.">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"><label for="trek_MAP">MAP
                                                </label> <input id="trek_map" class="form-control" type="number"
                                                    placeholder="MAP">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"><label for="trek_FAQ">FAQ
                                                </label> <input id="trek_faq" type="text" class="form-control"
                                                    placeholder="FAQ">
                                            </div>
                                        </div>
                                    </div>
                                    <!--                            //row 2-->
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_RR">Risk & Respond *</label>
                                                <textarea class="form-control" id="trek_rr" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="nexbut pull-right">
                                    <a class="btn btn-success next-tab" id="submitbut1" style="width: 100px;"
                                        role="button">Submit</a>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>
<script>
jQuery("#trek_upload1").on("click", function() {
    var images = wp.media({
        title: "Upload Images",
        multiple: false,
    }).open().on("select", function(e) {
        var uploadedImages = images.state().get("selection").first();

        var selectimg = uploadedImages.toJSON();
        // console.log(selectimg.url);
        $('#trek_upload_img1').html('<div style="" id="profile' + selectimg.id + '"><button name="' +
            selectimg.id + '" style="right: 55px;position:absolute;" id="close1' + selectimg.id +
            '"  class="close">x</button><img src="' + selectimg.url +
            '" style="height: 40%;width: 40%;" /></div>');

        $('#close1' + selectimg.id + '').click(function() {

            $('#profile' + selectimg.id + '').hide();

        })
    })
})

jQuery("#trek_upload2").on("click", function() {

    $('#trek_upload_img2').html('');
    var images = wp.media({
        title: "Upload Images",
        multiple: true,
    }).open().on("select", function(e) {
        var uploadedImages = images.state().get("selection");
        var selectimg = uploadedImages;

        selectimg.map(function(image) {
            var itemdetails = image.toJSON();

            $('#trek_upload_img2').append('<div style="position: relative;" id="profile1' +
                itemdetails.id +
                '"><button style="right: 55px;position:absolute;" id="close' + itemdetails
                .id + '"  class="close">x</button><img  src="' + itemdetails.url +
                '" style="height: 30%;width: 30%;padding: 5px"/></div>');

            $('#close' + itemdetails.id + '').click(function() {
                $('#profile1' + itemdetails.id + '').hide();
            })
        })
    })
})


jQuery("#trek_upload3").on("click", function() {

    $('#trek_upload_img3').html('');

    var images = wp.media({
        title: "Upload Images",
        multiple: true,
    }).open().on("select", function(e) {
        var uploadedImages = images.state().get("selection");
        var selectimg = uploadedImages;

        selectimg.map(function(image) {
            var itemdetails = image.toJSON();

            $('#trek_upload_img3').append('<div style="position: relative;" id="profile3' +
                itemdetails.id +
                '"><button style="right: 55px;position:absolute;" id="close2' + itemdetails
                .id + '"  class="close">x</button><img  src="' + itemdetails.url +
                '" style="height: 30%;width: 30%;padding: 5px"/></div>');

            $('#close2' + itemdetails.id + '').click(function() {
                $('#profile3' + itemdetails.id + '').hide();
            })
        })
    })
})
</script>

</html>
