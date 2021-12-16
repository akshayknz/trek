<?php
/**
 *@package TrekPlugin
 */
defined('ABSPATH') or die('Hei, Access restricted!');
global $wpdb, $table_prefix;

$dataGetTreks = $wpdb->get_results('SELECT id,trek_name FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0');
wp_enqueue_media();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="coupon_name" class="col-form-label" style="margin-bottom: 14px;">Coupon Name *
                            :</label>
                        <input type="text" class="form-control" placeholder="Enter Coupon Name" id="coupon_name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trek_create_pickup" class="col-form-label">Coupon Code * : &nbsp;&nbsp;<button
                                id="generate-coupon-code" onclick="generateCouponCode()"
                                style="margin-bottom: 2px;">Generate code</button></label>
                        <input type="text" class="form-control" placeholder="Coupon Code" id="coupon_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="generate-coupon-amount" class="col-form-label" style="margin-bottom: 14px;">Coupon
                            Amount * : &nbsp;&nbsp;</label>
                        <input type="text" class="form-control" placeholder="Coupon Amount" id="generate-coupon-amount">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="coupon_type" style="margin-bottom: 13px;">&nbsp;</label>
                        <select id="coupon_type" class="form-control" required="required"
                            data-error="Please specify your region.">
                            <option value="" selected>--Select Coupon Type--
                            </option>
                            <option value="wel12">Welcome coupon</option>
                            <option value="gen12">Generic coupon</option>
                            <option value="spec12">Specific coupon</option>


                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="coupon_description" class="col-form-label">Coupon Description:</label>
                        <textarea class="col-md-12" rows="4" id="coupon_description"></textarea>
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
                        <label for="coupon_trek_count" class="col-form-label" style="margin-bottom: 14px;">Trek
                            Count:</label>
                        <input type="text" class="form-control" placeholder="Minimum trek count" id="coupon_trek_count">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trek_create_pickup" class="col-form-label" style="margin-bottom: 14px;">Trekkers
                            Count:</label>
                        <input type="text" class="form-control" placeholder="Minimum Trekkers count"
                            id="coupon_trekkers_count">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trek_create_pickup" class="col-form-label" style="margin-bottom: 14px;">Minimum
                            Amount:</label>
                        <input type="text" class="form-control" placeholder="Minimum purchase amount"
                            id="coupon_minimum_amount">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trek_create_pickup" class="col-form-label" style="margin-bottom: 14px;">Coupon
                            Expiry Date:</label>
                        <input type="date" class="form-control" id="coupon_expire">
                    </div>
                </div>


            </div>
            <div class="row" id="non-specific-trek" style="display: none;">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="coupon_excluded_treks" style="margin-bottom: 13px;">Excluded Treks</label>
                        <select id="coupon_excluded_treks" style="width: 100%;white-space: nowrap;"
                            class="form-control js-example-basic-multiple js-example-responsive mselect select2-selection--multiple"
                            required="required" data-error="Please specify your Grade."
                            data-placeholder="Select Excluded Treks" multiple="multiple">
                            <?php
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

            </div>
            <div class="row" id="specific-trek" style="display: none;">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="coupon_selected_trek" style="margin-bottom: 13px;">Select Trek</label>
                        <select id="coupon_selected_trek" class="form-control" required="required"
                            data-error="Please specify your region.">
                            <option value="" selected>--Select Trek--
                            </option>
                            <?php
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="coupon_selected_departure" style="margin-bottom: 13px;">Select Departure</label>
                        <select id="coupon_selected_departure" style="width: 100%;white-space: nowrap;"
                            class="form-control js-example-basic-multiple js-example-responsive mselect select2-selection--multiple"
                            required="required" data-error="Please specify your Grade."
                            data-placeholder="Select Departure" multiple="multiple">




                        </select>
                    </div>
                </div>

            </div>
            <!-- <hr style="border-top: 1px dashed black;"> -->
        </div>
        <div class="container" style="margin-top: 25px;">
            <div style="margin: auto;">
                <h4>Usage Limitation</h4>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon_limit_per_coupon" class="col-form-label" style="margin-bottom: 14px;">Limit
                            per Coupon:</label>
                        <input type="number" class="form-control" placeholder="Total claim"
                            id="coupon_limit_per_coupon">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon_limit_per_person" class="col-form-label" style="margin-bottom: 14px;">Limit
                            per person:</label>
                        <input type="number" class="form-control" placeholder="Limit per single user"
                            id="coupon_limit_per_person">
                    </div>
                </div>




            </div>




        </div>
        <div class="row" style="margin-top:30px; ">
            <center>
                <div class="btn btn-primary" onclick="createCoupon('create')">Create Coupon</div>
            </center>
        </div>
    </div>


</body>
<script type="text/javascript">
$(".js-example-basic-multiple").select2();
$('.mselect').select2({
    placeholder: 'This is my placeholder',
    allowClear: true
});
</script>

</html>