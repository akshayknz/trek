<?php
/**
 * @package TrekPlugin
 */
defined('ABSPATH') or die('Hei, Access restricted!');
global $wpdb, $table_prefix;

if (isset($_GET['num'])) {
    $ppc = $_GET['num'];
    if ($ppc == '') {
        die('Access restricted!');
    }
    global $wpdb, $table_prefix;
    $user_ID = get_current_user_id();

    $dataFlags = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_coupons_new where id="' . $ppc . '"');
    $dataGetRegions = $wpdb->get_results('SELECT distinct(trek_region_country) as region FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0');
    if (empty($dataFlags)) {
        die("<h2>No Such Coupon Exist!</h2>");
    }
//    if ($dataFlags[0]->coupon_conf_selected_trek != null) {
//        $dataDeparture = $wpdb->get_results('SELECT id,trek_start_date,trek_end_date FROM ' . $table_prefix . 'trektable_trek_departure where trek_departure_status=0 and trek_selected_trek="' . $dataFlags[0]->coupon_conf_selected_trek . '"');
//
//    }
    $dataGetTreks = $wpdb->get_results('SELECT id,trek_name FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0');
} else {
    die('Access restricted!');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>

        .error {
            color: red;
        }


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

        .gallarybox1 {
            height: auto;
            border-style: solid;
            border-color: #385178;
            border-radius: 10px;
            box-shadow: 10px 10px grey;
        }

        .gallarybox2 {
            height: auto;
            border-style: solid;
            border-color: #385178;
            border-radius: 10px;
            box-shadow: 10px 10px grey;
        }

        .gallarybox3 {
            height: auto;
            border-style: solid;
            border-color: #385178;
            border-radius: 10px;
            box-shadow: 10px 10px grey;
        }
    </style>
</head>

<body>
<div class="loader" id="loader">
</div>
<form id="coupon_form" name="coupon_form">
    <div class="main">
        <!-- <div class="row col-md-12"> -->
        <!--  <span class="pull-right" style="margin-top: 20px;margin-right: 10px;" id="submitbut2">
            <div class="btn btn-primary">Add Trek</div>
         </span> -->
        <h2>Coupons</h2>
        <hr style="margin-top: 29px;">
        <div class="container" id="coupon-tabs">
            <div style="margin: auto;">
                <h4>Basic Details</h4>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="coupon_name" class="col-form-label" style="margin-bottom: 14px;">Coupon Name *
                            :</label>
                        <input type="text" class="form-control" placeholder="Enter Coupon Name" id="coupon_name"
                               name="coupon_name" value="<?php echo $dataFlags[0]->coupon_name; ?>">
                        <span class="err_coup" style="color: red;"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="trek_create_pickup" class="col-form-label">Coupon Code * : &nbsp;&nbsp;<button
                                    type="button"
                                    id="generate-coupon-code" onclick="generateCouponCode()"
                                    style="margin-bottom: 2px;">Generate code
                            </button>
                        </label>
                        <input type="text" class="form-control" placeholder="Coupon Code" id="coupon_code"
                               name="coupon_code" value="<?php echo $dataFlags[0]->coupon_code; ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="coupon_type" class="col-form-label" style="margin-bottom: 14px;">Coupon
                            type * : &nbsp;&nbsp;</label>
                        <select id="trk_coupon_type" name="trk_coupon_type">
                            <option value="">--Select--</option>
                            <option value="percentage" <?php if ($dataFlags[0]->coupon_type == 'percentage') echo ' selected="selected"'; ?>>
                                Percentage
                            </option>
                            <option value="amount" <?php if ($dataFlags[0]->coupon_type == 'amount') echo ' selected="selected"'; ?>>
                                Amount
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="generate_coupon_amount" class="col-form-label" style="margin-bottom: 14px;">Coupon
                            Amount * : &nbsp;&nbsp;</label>
                        <input type="number" min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control" placeholder="Coupon Amount"
                               id="generate_coupon_amount" name="generate_coupon_amount"
                               value="<?php echo $dataFlags[0]->coupon_amount; ?>">
                    </div>
                </div>

                <!-- <div class="col-md-4">
                <div class="form-group">
                    <label for="coupon_type" class="col-form-label"></label>
                    <select id="coupon_type">
                        <option>Welcome coupon</option>
                        <option>Generic coupon</option>
                        <option>Specific coupon</option>
                    </select>
                </div>
            </div> -->

            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="coupon_trek_count" class="col-form-label couponImg" style="margin-bottom: 14px;">Coupon
                            Cover Photo:</label>
                        <input type="button" class="form-control couponImg1" id="coupon_cover_photo"
                               name="coupon_cover_photo"
                               value="Select Photo" onclick="upload15()">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon_description" class="col-form-label">Coupon Description: (Should be less than
                            30 words)</label>
                        <textarea class="col-md-12" rows="4" id="coupon_description"
                                  name="coupon_description"><?php echo str_replace("\\","",$dataFlags[0]->coupon_description); ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon_trems_cond" class="col-form-label">Terms and Conditions:</label>
                        <textarea class="col-md-12" rows="4" id="coupon_trems_cond"
                                  name="coupon_trems_cond"><?php echo str_replace("\\","",$dataFlags[0]->coupon_terms); ?></textarea>
                    </div>
                </div>

            </div>
            <!-- <hr style="border-top: 1px dashed black;"> -->

        </div>

        <div class="container" style="margin-top: 25px;">
            <div style="margin: auto;">
                <h4>Usage restrictions</h4>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="coupon_type" style="margin-bottom: 13px;">&nbsp;Merge Configuration</label>
                        <select id="coupon_merge_type" name="coupon_merge_type" class="form-control"
                                data-error="Please specify your region.">
                            <option value="">--Merge with other Coupon--
                            </option>
                            <option value="yes" <?php if ($dataFlags[0]->coupon_merge == 'yes') echo ' selected="selected"'; ?>>
                                Yes
                            </option>
                            <option value="no" <?php if ($dataFlags[0]->coupon_merge == 'no') echo ' selected="selected"'; ?>>
                                No
                            </option>


                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trek_create_pickup" class="col-form-label" style="margin-bottom: 14px;">Coupon
                            Expiry Date:</label>
                        <input type="date" class="form-control" id="coupon_expire" name="coupon_expire"
                               value="<?php echo $dataFlags[0]->coupon_expiry; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="coupon_region_inc_type" style="margin-bottom: 13px;">&nbsp; Region Type</label>
                        <select id="coupon_region_inc_type" name="coupon_region_inc_type" class="form-control"
                                data-error="Please specify your region.">
                            <option value="" selected>--Region Type--
                            </option>
                            <option value="all-region" <?php if ($dataFlags[0]->coupon_region_type == 'all-region') echo ' selected="selected"'; ?>>
                                All
                            </option>
                            <option value="custom-region"<?php if ($dataFlags[0]->coupon_region_type == 'custom-region') echo ' selected="selected"'; ?>>
                                Customize
                            </option>


                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="coupon_trek_inc_type" style="margin-bottom: 13px;">&nbsp; Treks Type</label>
                        <select id="coupon_trek_inc_type" name="coupon_trek_inc_type" class="form-control"
                                data-error="Please specify your region.">
                            <option value="" selected>--Trek Type--
                            </option>
                            <option value="all-trek" <?php if ($dataFlags[0]->coupon_trek_type == 'all-trek') echo ' selected="selected"'; ?> >
                                All
                            </option>
                            <option value="custom-trek" <?php if ($dataFlags[0]->coupon_trek_type == 'custom-trek') echo ' selected="selected"'; ?> >
                                Custom
                            </option>


                        </select>
                    </div>
                </div>


            </div>
            <div class="row" id="non-specific-trek">


                <?php
                if ($dataFlags[0]->coupon_trek_type == 'custom-trek')
                {
                ?>
                <div class="col-md-6" id="inc-trek">
                    <?php
                    }
                    else{
                    ?>
                    <div class="col-md-6" id="inc-trek" style="display: none;">
                        <?php
                        }
                        ?>


                        <div class="form-group">
                            <label for="coupon_included_treks" style="margin-bottom: 13px;">Included Treks</label>
                            <select id="coupon_included_treks" name="coupon_included_treks"
                                    style="width: 100%;white-space: nowrap;"
                                    class="form-control js-example-basic-multiple js-example-responsive mselect select2-selection--multiple"
                                    data-error="Please specify your Grade."
                                    data-placeholder="Select Included Treks" multiple="multiple">
                                <?php
                                $a = array();
                                array_push($a, $dataFlags[0]->coupon_inc_trek);
                                $count = count($dataGetTreks);
                                for ($i = 0; $i < $count; $i++) {
                                    ?>
                                     
                                        <option value="<?php echo $dataGetTreks[$i]->id; ?>">
                                            <?php echo $dataGetTreks[$i]->trek_name; ?></option>
                                       

                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>


                    <?php
                    if ($dataFlags[0]->coupon_region_type == 'custom-region')
                    {
                    ?>
                    <div class="col-md-6" id="inc-region">
                        <?php
                        }
                        else{
                        ?>
                        <div class="col-md-6" id="inc-region" style="display: none;">
                            <?php
                            }
                            ?>


                            <div class="form-group">
                                        <label for="coupon_included_region" style="margin-bottom: 13px;">Included Region</label>
                                        <select id="coupon_included_region" name="coupon_included_region" style="width: 100%;white-space: nowrap;" class="form-control js-example-basic-multiple js-example-responsive mselect select2-selection--multiple" data-error="Please specify your Grade." data-placeholder="Select Excluded Treks" multiple="multiple">
                                            <?php
                                            $count = count($dataGetRegions);
                                            for ($i = 0; $i < $count; $i++) {
                                                if ($dataGetRegions[$i]->region == $dataFlags[0]->coupon_inc_region) {
                                            ?>
                                                    <option value="<?php echo $dataGetRegions[$i]->region; ?>" selected="selected">
                                                        <?php echo $dataGetRegions[$i]->region; ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo $dataGetRegions[$i]->region; ?>">
                                                        <?php echo $dataGetRegions[$i]->region; ?></option>
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

                    <!-- <hr style="border-top: 1px dashed black;"> -->
                </div>
                <div class="container" style="margin-top: 25px;">
                    <div style="margin: auto;">
                        <h4>Type of Coupon</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="coupon_display_type" style="margin-bottom: 13px;">&nbsp; Coupon
                                    Category</label>
                                <select id="coupon_display_type" name="coupon_display_type" class="form-control"
                                        data-error="Please specify your region.">
                                    <option value="" >--Coupon Type--
                                    </option>
                                    <option value="website" <?php if ($dataFlags[0]->coupon_display_category == 'website') echo ' selected="selected"'; ?> >
                                        Website
                                    </option>
                                    <option value="individual" <?php if ($dataFlags[0]->coupon_display_category == 'individual') echo ' selected="selected"'; ?> >
                                        Individual
                                    </option>


                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" style="display:none;">
                            <div class="form-group">
                                <label for="coupon_display_tran" style="margin-bottom: 13px;">&nbsp; Transfer type *</label>
                                <select id="coupon_display_tran" name="coupon_display_tran" class="form-control"
                                        data-error="Please specify your type.">
                                    <option value="" >--Coupon is--
                                    </option>
                                    <option selected value="Transferable" <?php if ($dataFlags[0]->coupon_transfer_type == 'Transferable') echo ' selected="selected"'; ?>>Transferable</option>
                                    <option value="Not_transferable" <?php if ($dataFlags[0]->coupon_transfer_type == 'Not_transferable') echo ' selected="selected"'; ?>>Not transferable</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <?php
                    if ($dataFlags[0]->coupon_display_category == 'website')
                    {
                    ?>
                    <div class="website-section row">
                        <?php
                        }
                        else{
                        ?>
                        <div class="website-section row" style="display: none;">
                            <?php
                            }
                            ?>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coupon_website_limit_batch" style="margin-bottom: 13px;">&nbsp; Website
                                        - Limit
                                        per
                                        coupon per batch</label>
                                    <select id="coupon_website_limit_batch" name="coupon_website_limit_batch"
                                            class="form-control"
                                            data-error="Please specify your region.">
                                        <option value="" selected>--Limit per Coupon per batch--
                                        </option>
                                        <option value="1" <?php if ($dataFlags[0]->coupon_web_usage == '1') echo ' selected="selected"'; ?>>
                                            1
                                        </option>
                                        <option value="2" <?php if ($dataFlags[0]->coupon_web_usage == '2') echo ' selected="selected"'; ?>>
                                            2
                                        </option>
                                        <option value="3" <?php if ($dataFlags[0]->coupon_web_usage == '3') echo ' selected="selected"'; ?>>
                                            3
                                        </option>
                                        <option value="4" <?php if ($dataFlags[0]->coupon_web_usage == '4') echo ' selected="selected"'; ?>>
                                            4
                                        </option>
                                        <option value="5" <?php if ($dataFlags[0]->coupon_web_usage == '5') echo ' selected="selected"'; ?>>
                                            5
                                        </option>
                                        <option value="6" <?php if ($dataFlags[0]->coupon_web_usage == '6') echo ' selected="selected"'; ?>>
                                            6
                                        </option>
                                        <option value="7" <?php if ($dataFlags[0]->coupon_web_usage == '7') echo ' selected="selected"'; ?>>
                                            7
                                        </option>
                                        <option value="8" <?php if ($dataFlags[0]->coupon_web_usage == '8') echo ' selected="selected"'; ?>>
                                            8
                                        </option>
                                        <option value="9" <?php if ($dataFlags[0]->coupon_web_usage == '9') echo ' selected="selected"'; ?>>
                                            9
                                        </option>
                                        <option value="10" <?php if ($dataFlags[0]->coupon_web_usage == '10') echo ' selected="selected"'; ?>>
                                            10
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <?php
                        if ($dataFlags[0]->coupon_display_category == 'individual')
                        {
                        ?>
                        <div class="individual-section row">
                            <?php
                            }
                            else{
                            ?>
                            <div class="individual-section row" style="display: none;">
                                <?php
                                }
                                ?>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="coupon_individual_user" class="col-form-label couponImg"
                                               style="margin-bottom: 14px;">User Email:</label>
                                        <input type="text" class="form-control" id="coupon_individual_user"
                                               name="coupon_individual_user" placeholder="User email"
                                               value="<?php echo $dataFlags[0]->coupon_ind_email; ?>">
                                    </div>
                                </div>
                                <input type="text" id="upid" value="<?php echo $ppc; ?>" hidden>
                                <input type="text" id="up_img" value="<?php echo $dataFlags[0]->coupon_image; ?>"
                                       hidden>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="coupon_individual_limit_batch" style="margin-bottom: 13px;">&nbsp;Usage
                                            Limit</label>
                                        <select id="coupon_individual_limit_batch" name="coupon_individual_limit_batch"
                                                class="form-control"
                                                data-error="Please specify your region.">
                                            <option value="" selected>--Limit Coupon Uses--
                                            </option>
                                            <option value="1" <?php if ($dataFlags[0]->coupon_ind_usage == '1') echo ' selected="selected"'; ?>>
                                                1
                                            </option>
                                            <option value="2" <?php if ($dataFlags[0]->coupon_ind_usage == '2') echo ' selected="selected"'; ?>>
                                                2
                                            </option>
                                            <option value="3" <?php if ($dataFlags[0]->coupon_ind_usage == '3') echo ' selected="selected"'; ?>>
                                                3
                                            </option>
                                            <option value="4" <?php if ($dataFlags[0]->coupon_ind_usage == '4') echo ' selected="selected"'; ?>>
                                                4
                                            </option>
                                            <option value="5" <?php if ($dataFlags[0]->coupon_ind_usage == '5') echo ' selected="selected"'; ?>>
                                                5
                                            </option>
                                            <option value="6" <?php if ($dataFlags[0]->coupon_ind_usage == '6') echo ' selected="selected"'; ?>>
                                                6
                                            </option>
                                            <option value="7" <?php if ($dataFlags[0]->coupon_ind_usage == '7') echo ' selected="selected"'; ?>>
                                                7
                                            </option>
                                            <option value="8" <?php if ($dataFlags[0]->coupon_ind_usage == '8') echo ' selected="selected"'; ?>>
                                                8
                                            </option>
                                            <option value="9" <?php if ($dataFlags[0]->coupon_ind_usage == '9') echo ' selected="selected"'; ?>>
                                                9
                                            </option>
                                            <option value="10" <?php if ($dataFlags[0]->coupon_ind_usage == '10') echo ' selected="selected"'; ?>>
                                                10
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:30px; ">
                            <center>
                                <button type="button" class="btn btn-primary" onclick="createCoupon('update')">Update
                                    Coupon
                                </button>
                            </center>
                        </div>
                    </div>
</form>


</body>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(".js-example-basic-multiple").select2();
    $('.mselect').select2({
        placeholder: 'This is my placeholder',
        allowClear: true
    });
    $('#coupon_included_treks').val([<?php echo implode(',', $a); ?>]).change();
    
</script>

<script>
    $(document).ready(function () {

        //up_img
        couponImage[0] = jQuery("#up_img").val();


        $('#coupon_display_type').on('change', function () {
            if (this.value == 'website') {
                $(".individual-section").css("display", "none");
                $(".website-section").css("display", "block");
            } else if (this.value == 'individual') {
                $(".individual-section").css("display", "block");
                $(".website-section").css("display", "none");
            } else {
                $(".individual-section").css("display", "none");
                $(".website-section").css("display", "none");
            }
        });


        $('#coupon_region_inc_type').on('change', function () {
            if (this.value == 'all-region') {
                $("#inc-region").css("display", "none");
            } else if (this.value == 'custom-region') {
                $("#inc-region").css("display", "block");
            } else {
                $("#inc-region").css("display", "none");
            }
        });


        $('#coupon_trek_inc_type').on('change', function () {
            if (this.value == 'all-trek') {
                $("#inc-trek").css("display", "none");
            } else if (this.value == 'custom-trek') {
                $("#inc-trek").css("display", "block");
            } else {
                $("#inc-trek").css("display", "none");
            }
        });


    });


</script>

</html>