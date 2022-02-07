<?php
/**
 * @package TrekPlugin
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
        die("<h2>No Such Data Exist!</h2>");
    }

    $dataFlags = $wpdb->get_results('SELECT trek_flag_name,id FROM ' . $table_prefix . 'trektable_flags where trek_flag_status=0');
    $dataGrades = $wpdb->get_results('SELECT trek_grade,id FROM ' . $table_prefix . 'trektable_grade where trek_grade_status=0');
    $dataSeasons = $wpdb->get_results('SELECT trek_season,id FROM ' . $table_prefix . 'trektable_season where trek_season_status=0');
    $dataThemes = $wpdb->get_results('SELECT trek_theme,id FROM ' . $table_prefix . 'trektable_theme where trek_theme_status=0');
    $selectedState = $data[0]->trek_region_state;
    $dataPickup = $wpdb->get_results('SELECT trek_pickup_place,id FROM ' . $table_prefix . 'trektable_pickup_reach where trek_pickup_status=0');

    $dataPart = $wpdb->get_results('SELECT trek_participation_policy_name,id FROM ' . $table_prefix . 'trektable_participation_policy where trek_participation_policy_status=0');
    $dataEss = $wpdb->get_results('SELECT trek_essential_name,id FROM ' . $table_prefix . 'trektable_trek_essential where trek_essential_status=0');

    $dataFit = $wpdb->get_results('SELECT trek_fitness_policy_name,id FROM ' . $table_prefix . 'trektable_fitness_policy where trek_fitness_policy_status=0');
    $dataCancelPolicy = $wpdb->get_results('SELECT trek_policy_name,id FROM ' . $table_prefix . 'trektable_policy where trek_policy_status=0');
    $dataRiskAndRespond = $wpdb->get_results('SELECT trek_risk_content,trek_risk_name,id FROM ' . $table_prefix . 'trektable_trek_riskandrespond where trek_risk_status=0');
    $dataTeam = $wpdb->get_results('SELECT id,contact_name FROM ' . $table_prefix . 'trektable_contacts');
$dataLeader = $wpdb->get_results('SELECT id,leader_name FROM ' . $table_prefix . 'trektable_leaders');
$dataCook = $wpdb->get_results('SELECT id,cook_name FROM ' . $table_prefix . 'trektable_cooks');

    $intrests = $wpdb->get_results('SELECT id,interest FROM ' . $table_prefix . 'trek_filter_interests');

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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
     <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

        @media only screen and (max-width: 600px) {
            .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('<?php echo plugins_url('trek/assets/admin/uploads/dual1.gif') ?>') 50% 50% no-repeat rgb(249, 249, 249);
                display: none;
            }
        }

        body {
            font-family: "Lato", sans-serif;
        }

        .select2-selection--multiple {
            overflow: hidden !important;
            height: auto !important;
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

        .gallarybox1, .gallarybox2, .gallarybox3, .gallarybox4 {
            height: auto;
            border-style: solid;
            border-color: #385178;
            border-radius: 10px;
            box-shadow: 10px 10px grey;
        }

        .gallery-container {
            margin-top: 70px;
            display: flex;
            flex-wrap: wrap;
        }

    </style>
</head>

<body>

<div class="loader" id="loader">

</div>
<?php
if ($ppc != '000') {

    ?>

    <div class="main">
        <!-- <div class="row col-md-12"> -->
        <!--  <span class="pull-right" style="margin-top: 20px; margin-right: 10px;" onclick="editTrekDetails(this.id)" id="<?php echo $data[0]->id; ?>-submitbut6"><div class="btn btn-success">Preview</div></span> -->
        <!--  <span class="pull-right" style="margin-top: 20px; margin-right: 10px;"> <a class="btn btn-success" id="view_trek_preview"
                          href="http://www.claruz.com/trek/details/?trek=<?php echo $data[0]->id; ?>" target="_blank" role="button">Preview</a></span> -->

        <span class="pull-right" style="margin-top: 20px; margin-right: 10px;"> <a class="btn btn-success"
                                                                                   id="view_trek"
                                                                                   href="<?= get_site_url() ?>/index.php/trek_details_preview?trek=<?= $data[0]->id ?>"
                                                                                   target="_blank"
                                                                                   role="button">Preview</a></span>
        <span class="pull-right" style="margin-top: 20px; margin-right: 10px;" onclick="editTrekDetails(this.id)"
              id="<?php echo $data[0]->id; ?>-submitbut5">
             <div class="btn btn-primary">Update Trek</div>
         </span>
        <h2>Trek</h2>
        <hr style="margin-top: 29px;">

        <!-- <p>Create treks</p> -->
        <!-- </div> -->
        <div class="container" id="tabs">

            <ul class="nav nav-tabs">
                <li class="active"><a id="menu_home" data-toggle="tab" href="#home"><b>Trek details</b></a></li>
                <li><a id="menu_one" data-toggle="tab" href="#menu1"><b>Images</b></a></li>
                <li><a id="menu_two" data-toggle="tab" href="#menu2"><b>Description</b> </a></li>
                <li><a id="menu_three" data-toggle="tab" href="#menu3"><b>Editor</b> </a></li>
                <li><a id="menu_four" data-toggle="tab" href="#menu4"><b>Transportation </b> </a></li>
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
                                    <div class="col-md-3">
                                        <div class="form-group"><label for="trek_name">Trek Name *</label>
                                            <input id="trek_name" type="text" class="form-control"
                                                   value="<?php echo $data[0]->trek_name ?>" placeholder="Trek Name *"
                                                   required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label for="trek_cost">Trek Cost
                                            </label> <input id="trek_cost" class="form-control" type="number"
                                                            value="<?php echo $data[0]->trek_cost ?>"
                                                            placeholder="Trek Cost">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label for="trek_tax">Trek Service Tax *
                                            </label> <input id="trek_tax" type="text" class="form-control"
                                                            value="<?php echo $data[0]->trek_service_tax ?>"
                                                            placeholder="Trek Service Tax *">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group"><label for="trek_tax">Transportation & insurance *
                                            </label> <input id="trek_trans_ins" type="text" class="form-control"
                                                            value="<?php echo $data[0]->trek_ins_policy_status ?>"
                                                            placeholder="Transportation & Ins. Included *">
                                        </div>
                                    </div>
                                </div>
                                <!--                            //row 2-->
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_country">Country *</label>
                                            <select id="trek_country" onchange="autoGenerateOverview()"
                                                    class="form-control" required="required"
                                                    data-error="Please specify your region.">
                                                <!--  <option selected>India
                                                 </option>
                                                 <option>USA</option>
                                                 <option>Australia</option>
                                                 <option>Japan</option>
                                                 <option>China</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_state">State *</label>
                                            <select id="trek_state" class="form-control" required="required"
                                                    data-error="Please specify your region.">
                                                <!-- <option value="" selected>--Select Your state--
                                                </option> -->
                                                <!--  <option>Andhra Pradesh</option>
                                                 <option>Arunachal Pradesh</option>
                                                 <option>Assam</option>
                                                 <option>Bihar</option>
                                                 <option>Chhattisgarh</option>
                                                 <option>Goa</option>
                                                 <option>Gujarat</option>
                                                 <option>Hariyana</option>
                                                 <option>Himachal Pradesh</option>
                                                 <option>Jharkhand</option>
                                                 <option>Karnataka</option>
                                                 <option>Kerala</option>
                                                 <option>Madhya Pradesh</option>
                                                 <option>Maharashtra</option>
                                                 <option>Manipur</option>
                                                 <option>Meghalaya</option>
                                                 <option>Mizoram</option>
                                                 <option>Nagaland</option>
                                                 <option>Odisha</option>
                                                 <option>Punjab</option>
                                                 <option>Rajasthan</option>
                                                 <option>Sikkim</option>
                                                 <option>Tamil Nadu</option>
                                                 <option>Telangana</option>
                                                 <option>Tripura</option>
                                                 <option>Uttar Pradesh</option>
                                                 <option>Uttarakhand</option>
                                                 <option>West Bengal</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="trek_city">City *</label>
                                            <input type="text" id="trek_city" name="trek_city" class="form-control"
                                                placeholder="Specify City Name*">

                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_Trail_type">Trail Type *</label>

                                            <input id="trek_trail_type" type="text"
                                                   value="<?php echo $data[0]->trek_trail_type; ?>"
                                                   class="form-control"
                                                   placeholder="Trail Type *" required="required"
                                                   data-error="required.">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_season">Select Season * </label>
                                            <select multiple id="trek_season"
                                                    class="form-control" required="required"
                                                    data-error="Please specify your Season.">
                                                <option value="" selected>--Select Your Season--
                                                </option>

                                                <?php
                                                foreach ($dataSeasons as $key => $value) {
                                                    $check = false;
                                                    foreach (json_decode($data[0]->trek_season) as $keyi => $valuei) {
                                                        if ($valuei == $value->trek_season) {
                                                            $check = true;
                                                        }
                                                    }
                                                    ?>
                                                    <option <?php echo ($check) ? 'selected' : null; ?>><?php echo $value->trek_season; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <!-- //row 3-->
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group"><label for="trek_day">Days *</label>
                                            <input id="trek_day" type="number" class="form-control"
                                                   onchange="autoGenerateOverview()"
                                                   value="<?php echo $data[0]->trek_days ?>" placeholder="Days *"
                                                   required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Altitude *</label>
                                            <input id="trek_altitude" type="number" class="form-control"
                                                   onchange="autoGenerateOverview()"
                                                   value="<?php echo $data[0]->trek_altitude ?>"
                                                   placeholder="Altitude *"
                                                   required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Distance
                                                *</label> <input id="trek_distance" type="number" class="form-control"
                                                                 onchange="autoGenerateOverview()"
                                                                 value="<?php echo $data[0]->trek_distance ?>"
                                                                 placeholder="Distance *"
                                                                 required="required" data-error="required.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_grade">Please specify your
                                                Grade *</label>
                                            <select id="trek_grade" onchange="autoGenerateOverview()"
                                                    class="form-control" required="required"
                                                    data-error="Please specify your Grade.">
                                                <option value="" selected>--Select Your Grade--
                                                </option>
                                                <?php
                                                $countf1 = count($dataGrades);
                                                for ($i = 0; $i < $countf1; $i++) {
                                                    ?>
                                                    <option><?php echo $dataGrades[$i]->trek_grade; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <!--                            //row 4-->
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Fitness Required
                                                *</label> <input id="trek_fitness_required" type="text"
                                                                 class="form-control"
                                                                 value="<?= $data[0]->trek_fitness ?>"
                                                                 placeholder="Fitness required *" required="required"
                                                                 data-error="required.">
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group"><label>Video url(Youtube)
                                                *</label> <input id="trek_about_video" type="text"
                                                                 value="<?= $data[0]->trek_video_about_url ?>"
                                                                 class="form-control"
                                                                 placeholder="Youtube video url *" required="required"
                                                                 data-error="required.">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="trek_team_member">Assign This trek to </label>
                                            <select id="trek_team_member" onchange="autoGenerateOverview()"
                                                    class="form-control" required="required"
                                                    data-error="Please specify your Grade.">
                                                <option value="" selected>--Select Team Member--
                                                </option>
                                                <?php
                                                $countf1 = count($dataTeam);
                                                for ($i = 0; $i < $countf1; $i++) {
                                                    ?>
                                                    <option value="<?= $dataTeam[$i]->id ?>"><?php echo $dataTeam[$i]->contact_name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="trek_leader">Assign a leader </label>
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
                                                <option value="<?= $dataLeader[$i]->id ?>" <?= ($data[0]->trek_leader == $dataLeader[$i]->id)? "selected":"" ?>><?php echo $dataLeader[$i]->leader_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="trek_cook">Assign a cook </label>
                                            <select id="trek_cook" 
                                                style="max-width: 100%;"
                                                class="form-control" required="required"
                                                data-error="Please specify your Grade.">
                                                <option value="" selected>--Select Trek Cook--
                                                </option>
                                               
                                                <?php
                                                $countf1 = count($dataCook);
                                                for ($i = 0; $i < $countf1; $i++) {
                                                    ?>
                                                <option value="<?= $dataCook[$i]->id ?>" <?= ($data[0]->trek_cook == $dataCook[$i]->id)? "selected":"" ?>><?php echo $dataCook[$i]->cook_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>



                                </div>


                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Suitable For
                                                *</label> <input id="trek_suitable_for" type="text"
                                                                 value="<?= $data[0]->trek_suitable ?>"
                                                                 class="form-control"
                                                                 placeholder="Suitable for *" required="required"
                                                                 data-error="required.">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group"><label>Experience
                                                *</label> <input id="trek_experience" type="text"
                                                                 value="<?= $data[0]->trek_experience ?>"
                                                                 class="form-control"
                                                                 placeholder="Experience *" required="required"
                                                                 data-error="required.">
                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="row col-md-12">
                                <div class="nexbut pull-right">
                                    <a class="btn btn-success next-tab" id="next1" style="width: 100px;"
                                       role="button">Next</a>
                                </div>
                            </div>

                            <!--                        <button  type="button" class="btn btn-primary">Next</button>-->
                        </form>
                    </div>
                </div>
                <!--menu 2-->
                <div id="menu1" class="tab-pane fade">
                    <div id="menu_one" class="tab-pane fade in active">
                        .
                        <div class="container contentbox">
                            <form id="contact-form myformbox1" class="myformbox" role="form"
                                  enctype="multipart/form-data">
                                <div class="myformbox">

                                    <!--                            //row 1-->


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
--><label>Upload Images (All Field Required) *</label>
                                    <div class="row col-md-12 gallery-container">


                                        <div class="col-md-3 card gallarybox1">
                                            <div class="form-group"><label for="trek_Transportation">Upload Trek
                                                    Image (516x486)*</label>
                                                <input type="button" value="Choose File" onclick="upload1Edit()"
                                                       class="form-control-file file1" id="trek_upload1"
                                                       name="trek_upload1[]">
                                            </div>
                                            <hr>
                                            <div id="pe2" style="align-items: center;"></div>
                                            <br>
                                            <textarea id="allprofileimg"
                                                      hidden><?php echo $data[0]->trek_profile_image; ?></textarea>
                                            <img src="<?php echo $data[0]->trek_profile_image; ?>"
                                                 id="galleryimg-<?php echo $i; ?>"
                                                 style="height: 100px;width: 100px;padding: 5px"/>
                                        </div>

                                        <div class="col-md-3 card gallarybox2">
                                            <div class="form-group"><label for="trek_Transportation">Gallery Images
                                                    (176x182)*</label>
                                                <input type="button" value="Choose File" onclick="upload2Edit()"
                                                       class="form-control-file file2" name="trek_upload2[]"
                                                       id="trek_upload2" multiple>
                                            </div>
                                            <hr>
                                            <div id="ge2" style="display: flex;flex-wrap: wrap;"></div>
                                            <br>
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
                                                         style="height: 60px;width: 60px;padding: 5px"/><span>
                                                         <div style="color: red;cursor: pointer;"
                                                              id="galleryclose-<?php echo $i; ?>"
                                                              onclick="gallery_img_edit(this.id)"><b>X</b></div>
                                                     </span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-3 card gallarybox3">
                                            <div class="form-group"><label for="trek_Transportation">Slider Images
                                                    (1536x650)*</label>
                                                <input type="button" value="Choose File" onclick="upload3Edit()"
                                                       class="form-control-file file3" name="trek_upload3[]"
                                                       id="trek_upload3" multiple>
                                            </div>
                                            <!-- <i>Choose multiple images</i><br> -->
                                            <hr>
                                            <div id="se2" style="display: flex;flex-wrap: wrap;"></div>
                                            <br>
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
                                                         style="height: 60px;width: 60px;padding: 5px"/><span>
                                                         <div style="color: red;cursor: pointer;"
                                                              id="sliderclose-<?php echo $i; ?>"
                                                              onclick="slider_img_edit(this.id)"><b>X</b></div>
                                                     </span>


                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>


                                        <div class="col-md-3 card gallarybox4">
                                            <div class="form-group"><label for="trek_Transportation">Map Images
                                                    (176x182)*</label>
                                                <input type="button" value="Choose File" onclick="upload4Edit()"
                                                       class="form-control-file file4" name="trek_upload4[]"
                                                       id="trek_upload4" multiple>
                                            </div>
                                            <!-- <i>Choose multiple images</i><br> -->
                                            <hr>
                                            <div id="le2" style="display: flex;flex-wrap: wrap;"></div>
                                            <br>
                                            <textarea id="allmaptmpimg"
                                                      hidden><?php echo $data[0]->trek_map_tmp_image; ?></textarea>
                                            <div id="trek_upload_img4" name="trek_upload_img4"
                                                 style="display: flex;flex-wrap: wrap;">

                                                <?php
                                                $resultMapTmp = explode(",", $data[0]->trek_map_tmp_image);
                                                $silderCount = count($resultMapTmp);
                                                for ($i = 0; $i < $silderCount; $i++) {
                                                    ?>
                                                    <img src="<?php echo $resultMapTmp[$i]; ?>"
                                                         id="maptmpimg-<?php echo $i; ?>"
                                                         style="height: 60px;width: 60px;padding: 5px"/><span>
                                                         <div style="color: red;cursor: pointer;"
                                                              id="maptmpclose-<?php echo $i; ?>"
                                                              onclick="map_img_edit(this.id)"><b>X</b></div>
                                                     </span>


                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row col-md-12" style="margin-top: 25px;">
                                    <div class="nexbut pull-right">
                                        <a class="btn btn-success next-tab" id="next2edit" style="width: 100px;"
                                           role="button">Next</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="menu2" class="tab-pane fade">
                    <div id="menu_two" class="tab-pane fade in active">
                        .
                        <div class="container contentbox">
                            <form id="contact-form myformbox2" class="myformbox" role="form">
                                <div class="myformbox">
                                    <div class="row col-md-12">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_pp">Pickup Place *</label>
                                                <select id="trek_pp" class="form-control" required="required"
                                                        data-error="Please specify your Grade.">
                                                    <option value="" selected>--Select Pickup Place--
                                                    </option>


                                                    <?php
                                                    $countf2 = count($dataPickup);
                                                    // print_r($dataPickup);
                                                    // print_r($data);
                                                    for ($i = 0; $i < $countf2; $i++) {
                                                        if ($dataPickup[$i]->id == $data[0]->trek_pickup_place1) {
                                                            ?>
                                                            <option value="<?php echo $dataPickup[$i]->id; ?>" selected>
                                                                <?php echo $dataPickup[$i]->trek_pickup_place; ?></option>
                                                            <?php

                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $dataPickup[$i]->id; ?>">
                                                                <?php echo $dataPickup[$i]->trek_pickup_place; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_drop"> Drop Place* </label>
                                                <select id="trek_drop" class="form-control" required="required"
                                                        data-error="Please specify your Grade.">
                                                    <option value="" selected>--Select Drop Place--
                                                    </option>

                                                    <?php
                                                    $countf2 = count($dataPickup);
                                                    // print_r($dataPickup);
                                                    // print_r($data);
                                                    for ($i = 0; $i < $countf2; $i++) {
                                                        if ($dataPickup[$i]->id == $data[0]->trek_drop_place) {
                                                            ?>
                                                            <option value="<?php echo $dataPickup[$i]->id; ?>" selected>
                                                                <?php echo $dataPickup[$i]->trek_pickup_place; ?></option>
                                                            <?php

                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $dataPickup[$i]->id; ?>">
                                                                <?php echo $dataPickup[$i]->trek_pickup_place; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4" hidden>
                                            <div class="form-group">
                                                <label for="trek_flag">Trek Flags *</label>
                                                <select id="trek_flag" style="width: 100%;white-space: nowrap;"
                                                        class="form-control js-example-basic-multiple js-example-responsive mselect select2-selection--multiple trek_flag"
                                                        required="required" data-error="Please specify your Grade."
                                                        data-placeholder="Select flags" multiple="multiple">


                                                    <?php
                                                    $resFlag = explode(",", $data[0]->trek_selected_flags);
                                                    $c = count($resFlag);
                                                    $selFlag = array();
                                                    for ($k = 0; $k < $c; $k++) {
                                                        array_push($selFlag, $resFlag[$k]);
                                                    }
                                                    $selFlag = json_encode($selFlag);
                                                    $countf = count($dataFlags);
                                                    for ($i = 0; $i < $countf; $i++) {
                                                        ?>
                                                        <option value="<?php echo $dataFlags[$i]->id; ?>">
                                                            <?php echo $dataFlags[$i]->trek_flag_name; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_CPolicy1">Cancellation Policies *&nbsp;&nbsp;<i
                                                            class="fas fa-question" onclick="viewCancelPolicyModal()"
                                                            id="cancel_icon" disabled=""></i></label>
                                                <input type="text" id="cancel_id_modal" name="" hidden>
                                                <select id="trek_cancel_policy" class="form-control"
                                                        required="required" data-error="Please specify your Grade.">
                                                    <option value="" id="00-policyid" selected>--Cancellation policy--
                                                    </option>
                                                    <?php
                                                    $countf = count($dataCancelPolicy);
                                                    for ($i = 0; $i < $countf; $i++) {
                                                        ?>
                                                        <option id="<?php echo $dataCancelPolicy[$i]->id; ?>-policyid">
                                                            <?php echo $dataCancelPolicy[$i]->trek_policy_name; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_Essential">Trek Essential</label>
                                                <select id="trek_essential" class="form-control" required="required"
                                                        data-error="Please specify your Grade.">
                                                    <option value="" selected>--Trek Essential--
                                                    </option>
                                                    <?php
                                                    $countpart = count($dataEss);
                                                    for ($i = 0; $i < $countpart; $i++) {
                                                        if ($data[0]->trek_essential == $dataEss[$i]->id) {
                                                            ?>
                                                            <option selected value="<?php echo $dataEss[$i]->id; ?>">
                                                                <?php echo $dataEss[$i]->trek_essential_name; ?>
                                                            </option>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $dataEss[$i]->id; ?>">
                                                                <?php echo $dataEss[$i]->trek_essential_name; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_participation_policy">Participation policy</label>
                                                <select id="trek_participation_policy" class="form-control"
                                                        required="required" data-error="Please specify your Grade.">
                                                    <option value="">--Participation policy--
                                                    </option>
                                                    <?php
                                                    $countpart = count($dataPart);
                                                    for ($i = 0; $i < $countpart; $i++) {
                                                        if ($data[0]->trek_participation_policy == $dataPart[$i]->id) {
                                                            ?>

                                                            <option selected value="<?php echo $dataPart[$i]->id; ?>">
                                                                <?php echo $dataPart[$i]->trek_participation_policy_name; ?>
                                                            </option>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $dataPart[$i]->id; ?>">
                                                                <?php echo $dataPart[$i]->trek_participation_policy_name; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="trek_fitness_policy">Fitness policy</label>
                                                <select id="trek_fitness_policy" class="form-control"
                                                        required="required" data-error="Please specify your Grade.">
                                                    <option value="" selected>--Fitness policy--
                                                    </option>
                                                    <?php
                                                    $countfit = count($dataFit);
                                                    for ($i = 0; $i < $countfit; $i++) {

                                                        if ($data[0]->trek_fitness_policy == $$dataFit[$i]->id) {
                                                            ?>
                                                            <option selected value="<?php echo $dataFit[$i]->id; ?>">
                                                                <?php echo $dataFit[$i]->trek_fitness_policy_name; ?></option>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $dataFit[$i]->id; ?>">
                                                                <?php echo $dataFit[$i]->trek_fitness_policy_name; ?></option>
                                                            <?php
                                                        }

                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <!--                        //row 1-->

                                    <!--                            //row 2-->

                                    <div class="row col-md-12">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_overview">Overview *&nbsp;&nbsp;<i class="fas fa-edit"
                                                                                                    onclick="enableOverview()"></i></label>
                                                <span id="trek_overview_error" style="display: none;color: red;">This
                                                     Field is Required *</span>
                                                <textarea class="form-control" id="trek_overview" rows="3">
                                      <?php
                                      echo str_replace('&&', '"', '' . $data[0]->trek_overview . '');
                                      ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_about">About the Trek *</label>
                                                <span id="trek_about_error" style="display: none;color: red;">This
                                                     Field is Required *</span>
                                                <textarea class="form-control" id="trek_about" rows="3"><?php
                                                    echo str_replace('&&', '"', '' . $data[0]->trek_about_trek . '');
                                                    ?></textarea>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <div class="row col-md-12">
                                    <div class="nexbut pull-right">
                                        <a class="btn btn-success next-tab" id="next3edit" style="width: 100px;"
                                           role="button">Next</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--            menu 5-->
                <div id="menu3" class="tab-pane fade">
                    <div id="menu_three" class="tab-pane fade in active">
                        .
                        <div class="container contentbox">
                            <form id="contact-form myformbox3" class="myformbox" role="form">
                                <div class="myformbox">


                                    <div class="row col-md-12">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_cost_terms">Cost Terms - Inclusions*</label>
                                                <span id="trek_cost_terms_error" style="display: none;color: red;">This
                                                    Field is Required *</span>
                                                <textarea class="form-control" id="trek_cost_terms_inclusion" rows="3">
                                                      <?php
                                                      echo str_replace('&&', '"', '' . $data[0]->trek_cost_terms_inclusion . '');
                                                      ?>

                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_cost_terms">Cost Terms - Exclusions*</label>
                                                <span id="trek_cost_terms_error" style="display: none;color: red;">This
                                                    Field is Required *</span>
                                                <textarea class="form-control" id="trek_cost_terms_exclusion" rows="3">
                                                      <?php
                                                      echo str_replace('&&', '"', '' . $data[0]->trek_cost_terms_exclusion . '');
                                                      ?>

                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_cost_terms">Cost Terms - Note*</label>
                                                <span id="trek_cost_terms_error" style="display: none;color: red;">This
                                                    Field is Required *</span>
                                                <textarea class="form-control" id="trek_cost_terms_note" rows="3">
                                                      <?php
                                                      echo str_replace('&&', '"', '' . $data[0]->trek_cost_terms_note . '');
                                                      ?>

                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_cost_terms">Cost Terms - Tour Fee*</label>
                                                <span id="trek_cost_terms_error" style="display: none;color: red;">This
                                                    Field is Required *</span>
                                                <textarea class="form-control" id="trek_cost_terms_tour_fee" rows="3">
                                                      <?php
                                                      echo str_replace('&&', '"', '' . $data[0]->trek_cost_terms_tour_fee . '');
                                                      ?>

                                                </textarea>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="row col-md-12">
                                    <div class="nexbut pull-right">
                                        <a class="btn btn-success next-tab" id="next4" style="width: 100px;"
                                           role="button">Next</a>
                                        <!-- <a class="btn btn-success next-tab" id="submitbut1" style="width: 100px;"  role="button">Submit</a> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>


                <div id="menu4" class="tab-pane fade">
                    <div id="menu_four" class="tab-pane fade in active">
                        .
                        <div class="container contentbox">
                            <form id="contact-form myformbox4" class="myformbox" role="form">
                                <div class="myformbox">
                                    <div class="row col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group"><label>Rail Head</label>
                                                <input id="trek_rail_head" type="text" class="form-control"
                                                       value="<?php echo $data[0]->trek_rail_head ?>"
                                                       placeholder="Enter rail head" required="required"
                                                       data-error="required.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label>Airport</label>
                                                <input id="trek_airport" type="text" class="form-control"
                                                       value="<?php echo $data[0]->trek_airport ?>"
                                                       placeholder="Enter Airport details" required="required"
                                                       data-error="required.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label>Base Camp</label>
                                                <input id="trek_base_camp" type="text" class="form-control"
                                                       value="<?php echo $data[0]->trek_base_camp ?>"
                                                       placeholder="Base camp" required="required"
                                                       data-error="required.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="trek_RR">Risk & Respond *</label>
                                                <select id="trek_rr" class="form-control" required="required"
                                                        data-error="Please specify your region.">
                                                    <option value=''>--select Risk and Respond--
                                                    </option>
                                                    <?php
                                                    $countf6 = count($dataRiskAndRespond);
                                                    for ($i = 0; $i < $countf6; $i++) {
                                                        if ($data[0]->trek_risk_respond == $dataRiskAndRespond[$i]->id) {
                                                            ?>
                                                            <option value="<?php echo $dataRiskAndRespond[$i]->id; ?>"
                                                                    selected><?php echo $dataRiskAndRespond[$i]->trek_risk_name; ?>
                                                            </option>
                                                            <?php

                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $dataRiskAndRespond[$i]->id; ?>">
                                                                <?php echo $dataRiskAndRespond[$i]->trek_risk_name; ?></option>
                                                            <?php
                                                        }
                                                        ?>


                                                        <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <!--                        //row 1-->
                                    <div class="row col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group"><label>Snow</label>
                                                <input id="trek_snow" type="text" class="form-control"
                                                       value="<?php echo $data[0]->trek_snow ?>"
                                                       placeholder="Snow details" required="required"
                                                       data-error="required.">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group"><label>Stay</label>
                                                <input id="trek_stay" type="text" class="form-control"
                                                       value="<?php echo $data[0]->trek_stay ?>" placeholder="Trek stay"
                                                       required="required" data-error="required.">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"><label>Service From</label>
                                                <input id="trek_service_from" type="text" class="form-control"
                                                       value="<?php echo $data[0]->trek_service_from ?>"
                                                       placeholder="Service from" required="required"
                                                       data-error="required.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label>Food</label>
                                                <input id="trek_food" type="text" class="form-control"
                                                       value="<?php echo $data[0]->trek_food ?>"
                                                       placeholder="Enter Food"
                                                       required="required" data-error="required.">
                                            </div>
                                        </div>
                                        <!--  <div class="col-md-3">
                                            <div class="form-group"><label>Itinerary- Start Destination</label>
                                                <input id="itinerary_start_destination" type="text" class="form-control" value="<?php echo $data[0]->trek_itinerary_start ?>" 
                                                    placeholder="Enter Itinerary- Start Destination" required="required"
                                                    data-error="required.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label>Itinerary- End Destination</label>
                                                <input id="itinerary_end_destination" type="text" class="form-control" value="<?php echo $data[0]->trek_itinerary_end ?>" 
                                                    placeholder="Enter Itinerary- End Destination" required="required" data-error="required.">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"><label>Filter -Location</label>
                                                <input id="trek_filter_location" type="text" class="form-control" value="<?php echo $data[0]->trek_filter_location ?>" 
                                                    placeholder="Enter Itinerary- End Destination" required="required" data-error="required.">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"><label>Filter - Season</label>
                                               <select id="trek_filter_season" class="form-control"
                                                    required="required" data-error="Please specify your Grade.">
                                                     <option value="" selected>--Select Season--</option>
                                                    <option value="1">Jan, Feb & Mar</option>
                                                    <option value="2">Mar, Apr & May</option>
                                                    <option value="3">Jun, Jul & Aug</option>
                                                    <option value="4">Sep, Oct & Nov</option>
                                                    <option value="5">Nov, Dec & Jan</option>

                                                </select>
                                            </div>
                                        </div> -->

                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="trek_theme">Select Theme * </label>
                                                <select multiple id="trek_theme"
                                                        class="form-control" required="required"
                                                        data-error="Please specify your Theme.">
                                                    <option value="">--Select Your Theme--
                                                    </option>
                                                    <?php
                                                    foreach ($dataThemes as $key => $value) {
                                                        $check = false;
                                                        foreach (json_decode($data[0]->trek_filter_theme) as $keyi => $valuei) {
                                                            if($valuei==$value->trek_theme){ $check = true; }
                                                        }
                                                        ?>
                                                        <option <?php echo ($check)? 'selected':null; ?>><?php echo $value->trek_theme; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label>Interests *</label>


                                                <select id="trek_filter_interests" class="form-control"
                                                        required="required"
                                                        data-error="Please specify your region.">
                                                    <option value=''>--select Interest--
                                                    </option>
                                                    <?php
                                                    $countf7 = count($intrests);
                                                    for ($i = 0; $i < $countf7; $i++) {
                                                        ?>
                                                        <option value="<?php echo $intrests[$i]->interest; ?>">
                                                            <?php echo $intrests[$i]->interest; ?></option>
                                                        <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"><label>Trek From *</label>
                                                <input id="trek_filter_from" type="text" class="form-control"
                                                       placeholder="Trek starts from"
                                                       value="<?= $data[0]->trek_filter_from ?>" required="required"
                                                       data-error="required.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label>Trek To *</label>
                                                <input id="trek_filter_to" type="text" class="form-control"
                                                       placeholder="Trek to" value="<?= $data[0]->trek_filter_to ?>"
                                                       required="required" data-error="required.">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"><label>Discount Percentage</label>
                                                <input id="trek_discount_percentage" type="number" class="form-control"
                                                       placeholder="Example: 30 , (Must be less than 100)"
                                                       value="<?= $data[0]->trek_discount_percentage ?>"
                                                       required="required" data-error="required.">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"><label>Discount Upto</label>
                                                <input id="trek_discount_end_date" type="date" class="form-control"
                                                       placeholder="Example : 30th June" required="required"
                                                       value="<?= $data[0]->trek_discount_end_date ?>"
                                                       data-error="required.">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"><label>Map Url (Youtube)*</label>
                                                <input data-toggle="modal" data-target=".bd-example-modal-lg1"
                                                       id="trek_map_youtube_url" type="button" value="Open"
                                                       class="form-control"
                                                       placeholder="Paste Map src here" required="required"
                                                       data-error="required.">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"><label>Youtube links - Gallery</label>
                                                <input data-toggle="modal" data-target=".bd-example-modal-lg"
                                                       id="trek_map_youtube_url" type="button" value="Open"
                                                       class="form-control"
                                                       placeholder="Paste Youtube src here" required="required"
                                                       data-error="required.">
                                            </div>
                                        </div>


                                    </div>


                                    <!--                        //row 1-->
                                    <div class="row col-md-12">

                                        <!-- <div class="row col-md-12"> -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_cost_terms">Cancellation Policy *</label>
                                                <span id="trek_cost_terms_error" style="display: none;color: red;">This
                                                    Field is Required *</span>
                                                <textarea class="form-control" id="trek_cost_terms_cancellation"
                                                          rows="3">
                                                      <?php
                                                      echo str_replace('&&', '"', '' . $data[0]->trek_cost_terms_cancellation . '');
                                                      ?>

                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_reach">How to Reach : Pick-up place *</label>
                                                <span id="trek_how_reach_error" style="display: none;color: red;">This
                                                     Field is Required *</span>
                                                <textarea class="form-control" id="trek_reach_air" rows="3">
                                   <?php
                                   echo str_replace('&&', '"', '' . $data[0]->trek_how_reach_pp . '');
                                   ?>
                                 </textarea>


                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_reach">How to Reach : Drop place *</label>
                                                <span id="trek_how_reach_error" style="display: none;color: red;">This
                                                     Field is Required *</span>
                                                <textarea class="form-control" id="trek_reach_bus" rows="3">
                                   <?php
                                   echo str_replace('&&', '"', '' . $data[0]->trek_how_reach_dp . '');
                                   ?>
                                 </textarea>


                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="trek_reach">How to Reach : Notes *</label>
                                                <span id="trek_how_reach_error" style="display: none;color: red;">This
                                                     Field is Required *</span>
                                                <textarea class="form-control" id="trek_reach_train" rows="3">
                                   <?php
                                   echo str_replace('&&', '"', '' . $data[0]->trek_how_reach_note . '');
                                   ?>
                                 </textarea>


                                            </div>
                                        </div>


                                        <!-- </div> -->


                                        <!--                            //row 2-->


                                    </div>
                                    <div class="row col-md-12">
                                        <div class="nexbut pull-right">
                                            <a class="btn btn-success next-tab" onclick="editTrekDetails(this.id)"
                                               id="<?php echo $data[0]->id; ?>-submitbut4" style="width: 100px;"
                                               role="button">Save</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalPolicy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalPolicyLabel">Selected Policy</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="exampleModalPolicyContent">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- modal for youtube-->
    <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <form enctype="multipart/form-data">
                        <div class="well clearfix">
                            <a class="btn btn-primary pull-right add-record float-right" data-added="0"><i
                                        class="fa fa-plus"
                                        aria-hidden="true"></i>&nbsp;Add
                                Row</a>
                        </div>
                        <br>

                        <table class="table table-bordered" id="tbl_posts">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="tbl_posts_body">

                            <?php
                            $text = $data[0]->video_gallery_urls;
                            $count = 1;
                            $array = explode(',', $text);
                            foreach ($array as $value) {
                                //  echo $value ;
                                echo ' <tr id="rec-' . $count . '"> <td><span class="sn">' . $count . '</span>.</td><td><input type="text" class="form-data link" value="' . $value . '" id="link-' . $count . '" style="width: 100%;" /></td><td><a class="btn btn-xs delete-recordz" data-id="' . $count . '"><i class="fa fa-trash" aria-hidden="true"></i></i></a></td></tr>';
                                $count++;
                            }
                            ?>

                            </tbody>
                        </table>

                    </form>

                    <div style="display:none;">
                        <table id="sample_table">
                            <tr id="">
                                <td><span class="sn"></span>.</td>

                                <td><input type="text" class="form-data link" style="width: 100%;" id=""/></td>
                                <td><a class="btn btn-xs delete-recordz" data-id="0"><i class="fa fa-trash"
                                                                                        aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" data-dismiss="modal" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal for youtube end-->
    <!-- modal for map-->
    <div class="modal fade bd-example-modal-lg1" id="exampleModal1" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <form enctype="multipart/form-data">
                        <div class="well clearfix">
                            <a class="btn btn-primary pull-right add-record-map float-right" data-added="0"><i
                                        class="fa fa-plus"
                                        aria-hidden="true"></i>&nbsp;Add
                                Row</a>
                        </div>
                        <br>

                        <table class="table table-bordered" id="tbl_posts-map">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="tbl_posts_body-map">
                            <!--                            <tr id="rec-map-1">-->
                            <!--                                <td><span class="sn-map">1</span>.</td>-->
                            <!--                                <td><input type="text" class="form-data link1" style="width: 100%;" id="link-map-1"/></td>-->
                            <!--                                <td><a class="btn btn-xs delete-recordz-map" data-id="1"><i class="fa fa-trash"-->
                            <!--                                                                                            aria-hidden="true"></i></i></a></td>-->
                            <!--                            </tr>-->

                            <?php
                            $text = $data[0]->trek_map;
                            $count = 1;
                            $array = explode(',', $text);
                            foreach ($array as $value) {
                                //  echo $value ;
                                echo ' <tr id="rec-map-' . $count . '"> <td><span class="sn-map">' . $count . '</span>.</td><td><input type="text" class="form-data link-map" value="' . $value . '" id="link-map-' . $count . '" style="width: 100%;" /></td><td><a class="btn btn-xs delete-recordz-map" data-id="' . $count . '"><i class="fa fa-trash" aria-hidden="true"></i></i></a></td></tr>';
                                $count++;
                            }
                            ?>


                            </tbody>
                        </table>

                    </form>

                    <div style="display:none;">
                        <table id="sample_table-map">
                            <tr id="">
                                <td><span class="sn-map"></span>.</td>

                                <td><input type="text" class="form-data link-map" id="" style="width: 100%;"/></td>
                                <td><a class="btn btn-xs delete-recordz-map" data-id="0"><i class="fa fa-trash"
                                                                                            aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" data-dismiss="modal" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal for map end-->
    <script>

        // user country code for selected option
        let user_country_code = "IN";

        (function () {

            // Get the country name and state name from the imported script.
            let country_list = country_and_states['country'];
            let states_list = country_and_states['states'];

            // creating country name drop-down
            let option = '';
            option += '<option>select country</option>';
            for (let country_code in country_list) {
                // set selected option user country
                let selected = (country_code == user_country_code) ? ' selected' : '';
                option += '<option value="' + country_code + '"' + selected + '>' + country_list[country_code] + '</option>';
            }
            document.getElementById('trek_country').innerHTML = option;

            // creating states name drop-down
            let text_box = '<input type="text" class="input-text" id="state">';
            let state_code_id = document.getElementById("trek_state");

            function create_states_dropdown() {
                // get selected country code
                let country_code = document.getElementById("trek_country").value;
                let states = states_list[country_code];
                // invalid country code or no states add textbox
                if (!states) {
                    state_code_id.innerHTML = text_box;
                    return;
                }
                let option = '';
                if (states.length > 0) {
                    option = '<select id="state">\n';
                    for (let i = 0; i < states.length; i++) {
                        option += '<option value="' + states[i].code + '">' + states[i].name + '</option>';
                    }
                    option += '</select>';
                } else {
                    // create input textbox if no states
                    option = text_box
                }
                state_code_id.innerHTML = option;
            }

            // country select change event
            const country_select = document.getElementById("trek_country");
            country_select.addEventListener('change', create_states_dropdown);

            create_states_dropdown();
        })();

    </script>

    <script>
        $(document).ready(function () {
            jQuery(document).delegate('a.add-record', 'click', function (e) {
                e.preventDefault();
                var content = jQuery('#sample_table tr'),
                    size = jQuery('#tbl_posts >tbody >tr').length + 1,
                    element = null,
                    element = content.clone();
                element.attr('id', 'rec-' + size);
                element.find('.delete-recordz').attr('data-id', size);
                element.find('.link').attr('id', 'link-' + size);
                element.appendTo('#tbl_posts_body');
                element.find('.sn').html(size);
            });
            jQuery(document).delegate('a.delete-recordz', 'click', function (e) {
                e.preventDefault();
                var didConfirm = confirm("Are you sure You want to delete");
                if (didConfirm == true) {
                    var id = jQuery(this).attr('data-id');
                    var targetDiv = jQuery(this).attr('targetDiv');
                    jQuery('#rec-' + id).remove();

                    //regnerate index number on table
                    $('#tbl_posts_body tr').each(function (index) {
                        var nb = index + 1;
                        $(this).find('span.sn').html(nb);
                        $(this).find('.link').attr('id', 'link-' + nb);
                    });
                    return true;
                } else {
                    return false;
                }
            });
        });

        var editor4 = CKEDITOR.replace('trek_overview');
        CKFinder.setupCKEditor(editor4);
        var editor5 = CKEDITOR.replace('trek_about');
        CKFinder.setupCKEditor(editor5);


        var editor31 = CKEDITOR.replace('trek_cost_terms_inclusion');
        CKFinder.setupCKEditor(editor31);
        var editor32 = CKEDITOR.replace('trek_cost_terms_exclusion');
        CKFinder.setupCKEditor(editor32);
        var editor33 = CKEDITOR.replace('trek_cost_terms_note');
        CKFinder.setupCKEditor(editor33);
        var editor34 = CKEDITOR.replace('trek_cost_terms_tour_fee');
        CKFinder.setupCKEditor(editor34);
        var editor35 = CKEDITOR.replace('trek_cost_terms_cancellation');
        CKFinder.setupCKEditor(editor35);


        var editor10 = CKEDITOR.replace('trek_reach_air');
        CKFinder.setupCKEditor(editor10);
        var editor100 = CKEDITOR.replace('trek_reach_train');
        CKFinder.setupCKEditor(editor100);
        var editor1000 = CKEDITOR.replace('trek_reach_bus');
        CKFinder.setupCKEditor(editor1000);
        // var editor9 = CKEDITOR.replace('trek_rr');
        // CKFinder.setupCKEditor( editor9 );
    </script>
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
        $('.mselect').select2({
            placeholder: 'This is my placeholder',
            allowClear: true
        });
    </script>
    <script>
        function create_states_dropdown() {
            let states_list = country_and_states['states'];
            let state_code_id = document.getElementById("trek_state");
            let text_box = '<input type="text" class="input-text" id="state">';
            // get selected country code
            let country_code = document.getElementById("trek_country").value;
            let states = states_list[country_code];
            // invalid country code or no states add textbox
            if (!states) {
                state_code_id.innerHTML = text_box;
                return;
            }
            let option = '';
            if (states.length > 0) {
                option = '<select id="state">\n';
                for (let i = 0; i < states.length; i++) {
                    option += '<option value="' + states[i].code + '">' + states[i].name + '</option>';
                }
                option += '</select>';
            } else {
                // create input textbox if no states
                option = text_box
            }
            state_code_id.innerHTML = option;
        }

        $("#cancel_id_modal").val('');
        cancelPolIcyDb = "<?php echo $data[0]->trek_cancellation_policies; ?>";
        var res = cancelPolIcyDb.split("&#&#&");
        cancel_policy_names = res[0];
        cancel_policy_ids = res[1];
        $("#trek_filter_season").val("<?php echo $data[0]->trek_filter_season; ?>");
        // $("#trek_country").val("<?php echo $data[0]->trek_region_country; ?>");
        // $("#trek_state").val("<?php echo $data[0]->trek_region_state; ?>");
        $("#trek_country option").each(function () {
            if ($(this).text() == "<?php echo $data[0]->trek_region_country; ?>") {
                $(this).attr("selected", "selected");
                create_states_dropdown();
            }
        });
        $("#trek_state option").each(function () {
            if ($(this).text() == "<?php echo $data[0]->trek_region_state; ?>") {
                $(this).attr("selected", "selected");
            }
        });
        $("#trek_city").val("<?php echo $data[0]->trek_region_city; ?>");
        $("#trek_grade").val("<?php echo $data[0]->trek_grade; ?>");

        //$("#trek_grade").val("<?php //echo $data[0]->trek_season; ?>//");
        $("#trek_pp").val("<?php echo $data[0]->trek_pickup_place1; ?>");
        $("#trek_drop").val("<?php echo $data[0]->trek_drop_place; ?>");
        $("#trek_participation_policy").val("<?php echo $data[0]->trek_participation_policy; ?>");
        $("#trek_fitness_policy").val("<?php echo $data[0]->trek_fitness_policy; ?>");

        $("#trek_team_member").val("<?php echo $data[0]->trek_assigned_to; ?>");
        $("#trek_cancel_policy").val(cancel_policy_names);
        $("#cancel_id_modal").val(cancel_policy_ids);
        $("#trek_essential").val("<?php echo $data[0]->trek_essential; ?>");
        $("#trek_filter_interests").val("<?php echo $data[0]->trek_filter_interests; ?>");
        // selectedValues = ["2","3","4"];

        $('#trek_flag').val(<?php echo $selFlag; ?>).change();
        // $(".trek_flag").select2("val", );
    </script>
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
        $('.mselect').select2({
            placeholder: 'This is my placeholder',
            allowClear: true
        });

        jQuery(document).delegate('a.add-record-map', 'click', function (e) {
            e.preventDefault();
            var content_map = jQuery('#sample_table-map tr'),
                size = jQuery('#tbl_posts-map >tbody >tr').length + 1,
                element = null,
                element = content_map.clone();
            element.attr('id', 'rec-map-' + size);
            element.find('.delete-recordz-map').attr('data-id', size);
            element.find('.link-map').attr('id', 'link-map-' + size);
            element.appendTo('#tbl_posts_body-map');
            element.find('.sn-map').html(size);
        });

        jQuery(document).delegate('a.delete-recordz-map', 'click', function (e) {
            e.preventDefault();
            var didConfirm = confirm("Are you sure You want to delete");
            if (didConfirm == true) {
                var id = jQuery(this).attr('data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#rec-map-' + id).remove();

                //regnerate index number on table
                $('#tbl_posts_body-map tr').each(function (index) {
                    var nb = index + 1;
                    $(this).find('span.sn-map').html(nb);
                    $(this).find('.link-map').attr('id', 'link-map-' + nb);
                });
                return true;
            } else {
                return false;
            }
        });


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


</html>