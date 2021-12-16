<?php
/**
 *@package TrekPlugin
 */
defined('ABSPATH') or die('Hei, Access restricted!');
wp_enqueue_media();
if (isset($_GET['num'])) {
    $ppc = $_GET['num'];
    if ($ppc == '') {
        die('Access restricted!');
    }
    global $wpdb, $table_prefix;
    $user_ID = get_current_user_id();
    $data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0 and id=' . $ppc . '');
    if (empty($data)) {
        die("<h2>No Such User Exist!</h2>");
    }
    $dataFlags = $wpdb->get_results('SELECT trek_flag_name FROM ' . $table_prefix . 'trektable_flags where trek_flag_status=0');
    $dataCancelPolicy = $wpdb->get_results('SELECT trek_policy_name FROM ' . $table_prefix . 'trektable_policy where trek_policy_status=0');

} else {
    $ppc = '000';
}
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

    body {
        font-family: "Lato", sans-serif;
    }

    .contentbox {
        background-color: #3c87ab;
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
        height: auto;
        border-style: solid;
        border-color: #385178;
        border-radius: 10px;
        box-shadow: 10px 10px grey;
    }

    /*.gallaryboximg{
            margin-top: 10px;
            height: 60px;
            width: 60px;
         } */
    </style>
</head>

<body>
    <div class="loader" id="loader">

    </div>
    <!-- <div class="sidenav">
         <a href="#">All Treks</a>
         <a href="#">Add Trek</a>
         <a href="#">Trek Flags</a>
         <a href="#">Cancellation Policies</a>
         </div> -->
    <?php
if ($ppc != '000') {

    ?>
    <div class="main">
        <span class="pull-right" style="margin-top: 20px; margin-right: 10px;" onclick="editTrekDetails(this.id)"
            id="<?php echo $data[0]->id; ?>-submitbut5">
            <div class="btn btn-primary">Update Trek</div>
        </span>
        <div class="container" id="tabs">
            <h2>Edit Trek</h2>

            <p>Add every deatails to complete the form. Fields with astrek is mandatroy.</p>
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
                                                placeholder="Trek Name *" value="<?php echo $data[0]->trek_name ?>"
                                                required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="trek_cost">Trek Cost
                                            </label> <input id="trek_cost" class="form-control" type="number"
                                                value="<?php echo $data[0]->trek_cost ?>" placeholder="Trek Cost">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="trek_tax">Trek Service Tax
                                            </label> <input id="trek_tax" type="text" class="form-control"
                                                value="<?php echo $data[0]->trek_service_tax ?>"
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
                                                value="<?php echo $data[0]->trek_days ?>" required="required"
                                                data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Altitude *</label>
                                            <input id="trek_altitude" type="number" class="form-control"
                                                value="<?php echo $data[0]->trek_altitude ?>" placeholder="Altitude *"
                                                required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Distance
                                                *</label> <input id="trek_distance" type="text" class="form-control"
                                                placeholder="Distance *" value="<?php echo $data[0]->trek_distance ?>"
                                                required="required" data-error="required.">
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
                                            <textarea class="form-control" id="trek_trail_type"
                                                rows="3"><?php echo $data[0]->trek_trail_type; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row col-md-12" style="margin-top: 10px;">
                                <div class="nexbut pull-right">
                                    <a class="btn btn-primary next-tab" style="width: 100px;" role="button">Next</a>
                                </div>
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
                                                    <?php
$countf = count($dataFlags);
    for ($i = 0; $i < $countf; $i++) {
        ?>
                                                    <option><?php echo $dataFlags[$i]->trek_flag_name; ?></option>
                                                    <?php
}
    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label for="trek_Transportation">Transportation
                                                    *</label>
                                                <input id="trek_transportation" type="number" class="form-control"
                                                    placeholder="Days *"
                                                    value="<?php echo $data[0]->trek_transportation ?>"
                                                    required="required" data-error="required.">
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
                                                <div class="form-group"><label for="trek_Transportation">Trek Profile
                                                        Image *</label>
                                                    <input type="button" value="Choose File" onclick="upload1Edit()"
                                                        class="form-control-file file1" id="trek_upload1"
                                                        name="trek_upload1[]">
                                                </div>
                                                <hr>
                                                <textarea id="allprofileimg"
                                                    hidden><?php echo $data[0]->trek_profile_image; ?></textarea>
                                                <img src="<?php echo $data[0]->trek_profile_image; ?>"
                                                    id="galleryimg-<?php echo $i; ?>"
                                                    style="height: 100px;width: 100px;padding: 5px" />
                                            </div>
                                            <div class="row col-md-1"></div>
                                            <div class="col-md-3 card gallarybox">
                                                <div class="form-group"><label for="trek_Transportation">Gallery Images
                                                        *</label>
                                                    <input type="button" value="Choose File" onclick="upload2Edit()"
                                                        class="form-control-file file2" name="trek_upload2[]"
                                                        id="trek_upload2" multiple>
                                                </div>

                                                <hr>

                                                <textarea id="allgalleryimg"
                                                    hidden><?php echo $data[0]->trek_gallary_image; ?></textarea>
                                                <div id="trek_upload_img2" name="trek_upload_img2"
                                                    style="display: flex;flex-wrap: wrap;">
                                                    <?php
$resultGallery = explode(",", $data[0]->trek_gallary_image);
    $galleryCount = count($resultGallery);
    for ($i = 0; $i < $galleryCount; $i++) {
        ?>
                                                    <img src="<?php echo $resultGallery[$i]; ?>"
                                                        id="galleryimg-<?php echo $i; ?>"
                                                        style="height: 60px;width: 60px;padding: 5px" /><span>
                                                        <div style="color: red;cursor: pointer;"
                                                            id="galleryclose-<?php echo $i; ?>"
                                                            onclick="gallery_img_edit(this.id)"><b>X</b></div>
                                                    </span>




                                                    <?php
}
    ?>
                                                </div>
                                            </div>

                                            <div class="row col-md-1"></div>
                                            <div class="col-md-3 card gallarybox">
                                                <div class="form-group"><label for="trek_Transportation">Slider Images
                                                        *</label>
                                                    <input type="button" value="Choose File" onclick="upload3Edit()"
                                                        class="form-control-file file3" name="trek_upload3[]"
                                                        id="trek_upload3" multiple>
                                                </div>
                                                <!-- <i>Choose multiple images</i><br> -->
                                                <hr>
                                                <textarea id="allsliderimg"
                                                    hidden><?php echo $data[0]->trek_slider_image; ?></textarea>
                                                <div id="trek_upload_img3" name="trek_upload_img3"
                                                    style="display: flex;flex-wrap: wrap;">

                                                    <?php
$resultSlider = explode(",", $data[0]->trek_slider_image);
    $silderCount = count($resultSlider);
    for ($i = 0; $i < $silderCount; $i++) {
        ?>
                                                    <img src="<?php echo $resultSlider[$i]; ?>"
                                                        id="sliderimg-<?php echo $i; ?>"
                                                        style="height: 60px;width: 60px;padding: 5px" /><span>
                                                        <div style="color: red;cursor: pointer;"
                                                            id="sliderclose-<?php echo $i; ?>"
                                                            onclick="slider_img_edit(this.id)"><b>X</b></div>
                                                    </span>




                                                    <?php
}
    ?>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="row col-md-12" style="margin-top: 10px;">
                                    <div class="nexbut pull-right">
                                        <a class="btn btn-primary next-tab" style="width: 100px;" role="button">Next</a>
                                    </div>
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
                                                    <?php
$countf = count($dataCancelPolicy);
    for ($i = 0; $i < $countf; $i++) {
        ?>
                                                    <option><?php echo $dataCancelPolicy[$i]->trek_policy_name; ?>
                                                    </option>
                                                    <?php
}
    ?>
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
                                                <textarea class="form-control" id="trek_overview"
                                                    rows="3"><?php echo $data[0]->trek_overview; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_about">About the Trek *</label>
                                                <textarea class="form-control" id="trek_about"
                                                    rows="3"><?php echo $data[0]->trek_about_trek; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_brief">Brief Itinerary *</label>
                                                <textarea class="form-control" id="trek_brief"
                                                    rows="3"><?php echo $data[0]->trek_brief_itinerary; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_itinerary">Detailed Itinerary *</label>
                                                <textarea class="form-control" id="trek_itinerary"
                                                    rows="3"><?php echo $data[0]->trek_detailed_itinerary; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_cost_terms">Cost Terms *</label>
                                                <textarea class="form-control" id="trek_cost_terms"
                                                    rows="3"><?php echo $data[0]->trek_cost_terms; ?></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row col-md-12" style="margin-top: 10px;">
                                    <div class="nexbut pull-right">
                                        <a class="btn btn-primary next-tab" style="width: 100px;" role="button">Next</a>
                                    </div>
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
                                                    value="<?php echo $data[0]->trek_fitness ?>" placeholder="Fitness *"
                                                    required="required" data-error="required.">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"><label for="trek_MAP">MAP
                                                </label> <input id="trek_map" class="form-control"
                                                    value="<?php echo $data[0]->trek_map ?>" type="number"
                                                    placeholder="MAP">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"><label for="trek_FAQ">FAQ
                                                </label> <input id="trek_faq" type="text" class="form-control"
                                                    value="<?php echo $data[0]->trek_faq ?>" placeholder="FAQ">
                                            </div>
                                        </div>
                                    </div>
                                    <!--                            //row 2-->
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_RR">Risk & Respond *</label>
                                                <textarea class="form-control" id="trek_rr"
                                                    rows="3"><?php echo $data[0]->trek_risk_respond; ?></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="nexbut pull-right">
                                    <a class="btn btn-success next-tab" onclick="editTrekDetails(this.id)"
                                        id="<?php echo $data[0]->id; ?>-submitbut4" style="width: 100px;"
                                        role="button">Submit</a>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <script>
    $("#trek_country").val("<?php echo $data[0]->trek_region_country; ?>");
    $("#trek_state").val("<?php echo $data[0]->trek_region_state; ?>");
    $("#trek_city").val("<?php echo $data[0]->trek_region_city; ?>");
    $("#trek_grade").val("<?php echo $data[0]->trek_grade; ?>");
    $("#trek_season").val("<?php echo $data[0]->trek_best_months; ?>");
    $("#trek_pup1").val("<?php echo $data[0]->trek_pickup_place; ?>");
    $("#trek_drop").val("<?php echo $data[0]->trek_drop_place; ?>");
    $("#trek_flag").val("<?php echo $data[0]->trek_selected_flags; ?>");
    $("#trek_cancel_policy").val("<?php echo $data[0]->trek_cancellation_policies; ?>");
    $("#trek_essential").val("<?php echo $data[0]->trek_essential; ?>");
    $("#trek_reach").val("<?php echo $data[0]->trek_how_reach; ?>");
    </script>
    <?php
} else {
    ?>
    <div class="main">


        <span class="pull-right" style="margin-top: 20px;margin-right: 10px;" id="d"><a
                href="admin.php?page=treks_plugin" class="btn btn-primary">Go Back</a></span>
        <h2>Page Not Found</h2>
        <hr style="margin-top: 29px;">
    </div>



    <?php
}

?>
</body>
<script>


</script>

</html>