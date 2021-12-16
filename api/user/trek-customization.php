<?php
/**
 * @package TrekPlugin
 */

use PHPMailer\PHPMailer\PHPMailer;
$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once $path . '/wp-load.php';
global $wpdb;
$ptbd_table_name = '';
if (isset($_POST['data'])) {

    if ($_POST['data'] == 'customize') {
        $ptbd_table_name = 'wp_trek_user_customization';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $city_traveling = $_POST['city_traveling'];
        $participants = $_POST['participants'];
        $trip_duration = $_POST['trip_duration'];
        $budget = $_POST['budget'];
        $participants_age = $_POST['participants_age'];
        $package = $_POST['package'];
        $extra_details = $_POST['extra_details'];

        $dataArr = array(
            "trek_tth_fname" => $fname,
            "trek_tth_lname" => $lname,
            "trek_tth_phone" => $phone_number,
            "trek_tth_email" => $email,
            "trek_tth_location" => $location,
            "trek_tth_city_travelling" => $city_traveling,
            "trek_tth_participants" => $participants,
            "trek_tth_duration" => $trip_duration,
            "trek_tth_budget" => $budget,
            "trek_tth_age" => $participants_age,
            "trek_tth_package" => $package,
            "trek_tth_extra_details" => $extra_details,
        );
        $result_check = $wpdb->insert('' . $ptbd_table_name . '', $dataArr);
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'inserted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    function validateCouponCode($userId, $bookingId, $trek, $couponId)
    {
        global $wpdb;
        $booking = $wpdb->get_results('SELECT count(id) FROM wp_trektable_trekkers_list where trek_selected_trek="' . $trek . '" and trek_trekker_status=0 and trekker_token="' . $userId . '" and trek_tbooking_id="' . $bookingId . '"');

        $coupon = $wpdb->get_results('SELECT * FROM wp_trektable_coupons_new where coupon_code="' . $couponId . '" and coupon_expiry>=curdate() order by id desc limit 1');

        // No booking available
        if (empty($booking)) {
            return 100;
            exit;
        }
        // If no coupon present
        if (empty($coupon)) {
            return 101;
            exit;
        }
        if ((!empty($booking)) && (!empty($coupon))) {
            // Get coupon count limit per batch
            $coupon_limit_per_batch = 0;
            $coupon_type = $coupon[0]->coupon_display_category;
            $coupon_merge_type = $coupon[0]->coupon_merge;
            $coupon_amount_type = $coupon[0]->coupon_type;
            $coupon_amount = $coupon[0]->coupon_amount;

            $coupon_region_type = $coupon[0]->coupon_region_type;
            $coupon_trek_type = $coupon[0]->coupon_trek_type;
            if ($coupon_type == 'individual') {
                $coupon_limit_per_batch = $coupon[0]->coupon_ind_usage;
            } else {
                $coupon_limit_per_batch = $coupon[0]->coupon_web_usage;
            }
            //Get total selected coupons
            $couponIssued = $wpdb->get_results('SELECT count(id) as coupon_issued FROM wp_trektable_coupon_usage where trek_coupon_code="' . $couponId . '" and trek_coupon_booking_id="' . $bookingId . '"');

            if (($couponIssued[0]->coupon_issued) > 0) {
                $coupon_used_count = $couponIssued[0]->coupon_issued;

                if (($coupon_used_count) >= ($coupon_limit_per_batch)) {
                    return 104;
                    exit;
                }
            }
            //End coupon usage limit check

            // Check coupon merge eligibility

            if ($coupon_merge_type == 'no') {
                // $couponMergeStatus = $wpdb->get_results('SELECT id as coupon_issued FROM wp_trektable_coupon_usage where trek_coupon_code="' . $couponId . '" and trek_coupon_booking_id="' . $bookingId . '" and trek_coupon_user="'.$userId.'"');
                $couponMergeStatus = $wpdb->get_results('SELECT count(id) as coupon_issued FROM wp_trektable_coupon_usage where  trek_coupon_booking_id="' . $bookingId . '" and trek_coupon_user="' . $userId . '" and trek_coupon_merge_type="no"');
                if ($couponMergeStatus[0]->coupon_issued > 0) {
                    return 103;
                    exit;
                }

            }
            // End coupon merge elibility

            // Check Region eligibility

            if ($coupon_region_type == 'custom-region') {
                $dataGetRegions = $wpdb->get_results('SELECT distinct(trek_region_country) as region FROM wp_trektable_addtrekdetails where trek_adddetails_status=0 and id="' . $trek . '"');
                $coupon_inc_regions = $coupon[0]->coupon_inc_region;
                $explod_res_region = explode(',', $coupon_inc_regions);
                $region_count = count($explod_res_region);
                $requested_region = $dataGetRegions[0]->region;
                if ($region_count > 0) {
                    $flag = 0;
                    for ($i = 0; $i < $region_count; $i++) {
                        if ($explod_res_region[$i] == $requested_region) {
                            $flag = 5;
                        }
                    }
                    if ($flag == 0) {
                        return 105;
                        exit;
                    }
                }

            }
            // End region eligibility

            // Check Trek eligibility

            if ($coupon_trek_type == 'custom-trek') {
                $coupon_inc_treks = $coupon[0]->coupon_inc_trek;
                $explod_res_trek = explode(',', $coupon_inc_treks);
                $trek_count = count($explod_res_trek);
                if ($trek_count > 0) {
                    $flag1 = 0;
                    for ($i = 0; $i < $trek_count; $i++) {
                        if ($explod_res_trek[$i] == $trek) {
                            $flag1 = 5;
                        }
                    }
                    if ($flag1 == 0) {
                        return 106;
                        exit;
                    }
                }

            }
            // End Trek eligibility

            return 107;
            exit;

        } else {
            return 102;
            exit;
        }

    }

    function calculateAmountCoupon($couponId, $trek, $bookingId, $userId)
    {
        global $wpdb;
        $booking = $wpdb->get_results('SELECT count(id) FROM wp_trektable_trekkers_list where trek_selected_trek="' . $trek . '" and trek_trekker_status=0 and trekker_token="' . $userId . '" and trek_tbooking_id="' . $bookingId . '"');
        $amountPerPerson = $wpdb->get_results('SELECT trek_cost FROM wp_trektable_addtrekdetails where id="' . $trek . '" and trek_adddetails_status=0');

        $coupon = $wpdb->get_results('SELECT * FROM wp_trektable_coupons_new where coupon_code="' . $couponId . '" and coupon_expiry>=curdate() order by id desc limit 1');

         $totalDeductedAmt = $wpdb->get_results('SELECT sum(trek_coupon_deducted_amount) as totalDeductedAmt FROM wp_trektable_coupon_usage where  trek_coupon_booking_id="' . $bookingId . '" and trek_coupon_user="'.$userId.'"');
        // No booking available
        if (empty($booking)) {
            return 0;
            exit;
        }
        // If no coupon present
        if (empty($coupon)) {
            return 0;
            exit;
        }
        $coupon_amount_type = $coupon[0]->coupon_type;
        $coupon_amount = $coupon[0]->coupon_amount;
        $perPerson = $amountPerPerson[0]->trek_cost;
        $deductedAmount = 0;
        if ($perPerson > 0) {
            //Calculate amount
            if ($coupon_amount_type == 'percentage') {
                $deductedAmount = ($perPerson * $coupon_amount) / 100;
            } else if ($coupon_amount_type == 'amount') {
                $deductedAmount = $coupon_amount;
            }
            if($perPerson<$deductedAmount){
                // Coupon amount is greater than trek cost
                return 'greater';
                die;
            }
            if(isset($totalDeductedAmt[0]->totalDeductedAmt)){
                $totaldeductedAmt = $totalDeductedAmt[0]->totalDeductedAmt;
                $totaldeductedAmtAfterNewCoupon = $totaldeductedAmt+$deductedAmount;
                if($perPerson<$totaldeductedAmt){
                // if total Coupon amount is greater than trek cost
                return 'total greater';
                die;
                }
                if($perPerson<$totaldeductedAmtAfterNewCoupon){
                 // if total Coupon amount + new coupon amount is greater than trek cost
                return 'new total greater';
                die;
                }
            }
            return $deductedAmount;
        } else {
            return 0;
            exit;
        }
    }

    if ($_POST['data'] == 'couponValidation') {

        $userId = $_POST['userId'];
        $couponId = $_POST['couponId'];
        $couponType = $_POST['couponType'];
        $trek = $_POST['trek'];
        $bookingId = $_POST['bookingId'];
        if (($couponId == '5percent') || ($couponId == '10percent')) {
            $getParticipantsCount = $wpdb->get_results('SELECT count(id) as totalParticipants FROM wp_trektable_trekkers_list where trek_tbooking_id="' . $bookingId . '"');
            if ($couponId == '5percent') {
                if ($getParticipantsCount[0]->totalParticipants < 5) {
                    $info_message = "You are not eligible for 5% group discount, There must be atleast 5 participants for the trek";
                    $result = new stdClass();
                    $result->statusCode = 402;
                    $result->responseStatus = $info_message;
                    $result->responseCode = $info_status;
                    $result->couponId = $couponId;
                    $result->couponType = $couponType;
                    $result->trekker = $userId;
                    $result->result = 'failed to process the request';
                    echo json_encode($result);
                    exit;
                }

            } else if ($couponId == '10percent') {
                if ($getParticipantsCount[0]->totalParticipants < 10) {
                    $info_message = "You are not eligible for 10% group discount, There must be atleast 10 participants for the trek";
                    $result = new stdClass();
                    $result->statusCode = 402;
                    $result->responseStatus = $info_message;
                    $result->responseCode = $info_status;
                    $result->couponId = $couponId;
                    $result->couponType = $couponType;
                    $result->trekker = $userId;
                    $result->result = 'failed to process the request';
                    echo json_encode($result);
                    exit;
                }
            }
        }
        $checkBasicDetails = $wpdb->get_results('SELECT id,coupon_name,coupon_amount,coupon_type,coupon_merge,coupon_description FROM wp_trektable_coupons_new where coupon_code ="'.$couponId.'" limit 1');
        if (empty($checkBasicDetails)) {
            $info_message = "Something Went wrong";
            $result = new stdClass();
            $result->statusCode = 402;
            $result->responseStatus = $info_message;
            $result->responseCode = $info_status;
            $result->couponId = $couponId;
            $result->couponType = $couponType;
            $result->trekker = $userId;
             $result->trekker32 = $checkBasicDetails;
            $result->result = 'failed to process the request1';
            echo json_encode($result);
            exit;
        }
        $merge_type = $checkBasicDetails[0]->coupon_merge;
        if (!isset($merge_type)) {
            $info_message = "Something Went wrong";
            $result = new stdClass();
            $result->statusCode = 402;
            $result->responseStatus = $info_message;
            $result->responseCode = $info_status;
            $result->couponId = $couponId;
            $result->couponType = $couponType;
            $result->trekker = $userId;
            $result->result = 'failed to process the request2';
            echo json_encode($result);
            exit;
        }
        $validationStatus = validateCouponCode($userId, $bookingId, $trek, $couponId);
        $info_message = "";
        $info_status = "";
        if ($validationStatus == 100) {
            $info_message = "No booking found";
            $info_status = "100";
        } else if ($validationStatus == 101) {
            $info_message = "Coupon is not valid";
            $info_status = "101";
        } else if ($validationStatus == 102) {
            $info_message = "Coupon is not valid";
            $info_status = "102";
        } else if ($validationStatus == 103) {
            $info_message = "Cannot Merge this coupon";
            $info_status = "103";
        } else if ($validationStatus == 104) {
            $info_message = "Usage limit exceeded for your batch";
            $info_status = "104";
        } else if ($validationStatus == 105) {
            $info_message = "Your region is not valid for this coupon";
            $info_status = "105";
        } else if ($validationStatus == 106) {
            $info_message = "Coupon not valid for this trek";
            $info_status = "106";
        } else if ($validationStatus == 107) {
            $info_message = "Coupon valid";
            $info_status = "107";
            $deducted = calculateAmountCoupon($couponId, $trek, $bookingId, $userId);
            if($deducted == 'greater'){
                $info_message = "Coupon amount is greater than trek cost";
                $info_status = "111";
            }else if($deducted == 'total greater'){
                $info_message = "Total discount amount purchased exceeds the limit";
                $info_status = "112";
            }else if($deducted == 'new total greater'){
                $info_message = "Total Coupon amount is greater than your trek cost";
                $info_status = "113";
            }else{
                          // Ready to insert value in coupon usage table
                $ptbd_table_name = 'wp_trektable_coupon_usage';
                $checkDuplication = $wpdb->get_results('SELECT id FROM wp_trektable_coupon_usage where trek_coupon_code="' . $couponId . '" and trek_coupon_user="' . $userId . '" and trek_coupon_trek="' . $trek . '" and trek_coupon_booking_id="' . $bookingId . '"');

                if (!empty($checkDuplication)) {
                    $info_message = "You already applied this coupon";
                    $result = new stdClass();
                    $result->statusCode = 402;
                    $result->responseStatus = $info_message;
                    $result->responseCode = $info_status;
                    $result->couponId = $couponId;
                    $result->couponType = $couponType;
                    $result->trekker = $userId;
                    $result->couponDetails = $checkBasicDetails[0];
                    $result->result = 'duplicate';
                    echo json_encode($result);
                    exit;
                }

                $dataArr = array(
                    "trek_coupon_code" => $couponId,
                    "trek_coupon_user" => $userId,
                    "trek_coupon_trek" => $trek,
                    "trek_coupon_booking_id" => $bookingId,
                    "trek_coupon_deducted_amount" => $deducted,
                    "trek_coupon_type" => $couponType,
                    "trek_coupon_merge_type" => $merge_type,
                );
                $result_check = $wpdb->insert('' . $ptbd_table_name . '', $dataArr);

                if ($result_check) {
                    if ($couponType == 'individual') {
                        $result = new stdClass();
                        $result->statusCode = 200;
                        $result->responseStatus = $info_message;
                        $result->responseCode = $info_status;
                        $result->couponType = 'individual';
                        $result->trekker = $userId;
                        $result->couponId = $couponId;
                        $result->deducted = $deducted;
                        $result->couponDetails = $checkBasicDetails[0];
                        $result->result = 'coupon applied';
                        echo json_encode($result);
                        exit;
                    } else if ($couponType == 'website') {
                        $result = new stdClass();
                        $result->statusCode = 200;
                        $result->responseStatus = $info_message;
                        $result->responseCode = $info_status;
                        $result->couponType = 'website';
                        $result->trekker = $userId;
                        $result->couponId = $couponId;
                        $result->deducted = $deducted;
                        $result->couponDetails = $checkBasicDetails[0];
                        $result->result = 'coupon applied';
                        echo json_encode($result);
                        exit;
                    }

                } else {
                    $result = new stdClass();
                    $result->statusCode = 401;
                    $result->couponType = $couponType;
                    $result->trekker = $userId;
                    $result->couponId = $couponId;
                    $result->couponDetails = $checkBasicDetails[0];
                    $result->result = 'failed';
                    echo json_encode($result);
                    exit;
                }
            }
  
        }

        $result = new stdClass();
        $result->statusCode = 400;
        $result->responseStatus = $info_message;
        $result->responseCode = $info_status;
        $result->couponType = $couponType;
        $result->couponId = $couponId;
        $result->couponDetails = $checkBasicDetails[0];
        $result->trekker = $userId;
        $result->result = 'failed';
        echo json_encode($result);
        exit;
    }

    if ($_POST['data'] == 'couponValidationRemove') {

        $userId = $_POST['userId'];
        $couponId = $_POST['couponId'];
        $trek = $_POST['trek'];
        $bookingId = $_POST['bookingId'];
        $couponType = $_POST['couponType'];
        // $validationStatus = validateCouponCode($userId,$bookingId,$trek,$couponId);

        // Ready to Remove value in coupon usage table
        $table = 'wp_trektable_coupon_usage';
        $checkDuplication = $wpdb->get_results('SELECT id FROM wp_trektable_coupon_usage where trek_coupon_code="' . $couponId . '" and trek_coupon_user="' . $userId . '" and trek_coupon_trek="' . $trek . '" and trek_coupon_booking_id="' . $bookingId . '"');
        if (!empty($checkDuplication)) {
            $target_id = $checkDuplication[0]->id;
            $data1 = $wpdb->delete($table, array('id' => $target_id));
            if ($data1) {
                $deducted = calculateAmountCoupon($couponId, $trek, $bookingId, $userId);
                if ($couponType == 'individual') {
                    $result = new stdClass();
                    $result->statusCode = 204;
                    $result->responseStatus = 'Coupon removed';
                    $result->couponType = 'individual';
                    $result->removed = $deducted;
                    echo json_encode($result);
                    exit;
                } else if ($couponType == 'website') {
                    $result = new stdClass();
                    $result->statusCode = 204;
                    $result->responseStatus = 'Coupon removed';
                    $result->couponType = 'website';
                    $result->trekker = $userId;
                    $result->removed = $deducted;
                    echo json_encode($result);
                    exit;
                }

            } else {
                $result = new stdClass();
                $result->statusCode = 401;
                $result->responseStatus = 'Request failed';
                echo json_encode($result);
                exit;
            }

        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['data'] == 'updateDiscountValue') {
        $trek = $_POST['trek'];
        $bookingId = $_POST['bookingId'];
        // $validationStatus = validateCouponCode($userId,$bookingId,$trek,$couponId);
        $data2 = $wpdb->get_results('SELECT count(id) as part FROM wp_trektable_trekkers_list where trek_trekker_status=0 and trek_tbooking_id ="' . $bookingId . '"');
        if (!empty($data2)) {
            $participants = $data2[0]->part;
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';
            $result->totalDeduction = 0;
            echo json_encode($result);
            exit;
        }
        // Ready to Remove value in coupon usage table
        $table = 'wp_trektable_coupon_usage';
        $getSumVal = $wpdb->get_results('SELECT sum(trek_coupon_deducted_amount) as totalDiscount FROM wp_trektable_coupon_usage where trek_coupon_trek="' . $trek . '" and trek_coupon_booking_id="' . $bookingId . '"');
        if (!empty($getSumVal)) {
            $sumDeduct = $getSumVal[0]->totalDiscount;
            if (($sumDeduct > 0) || ($sumDeduct != null)) {
                $result = new stdClass();
                $result->statusCode = 200;
                $result->result = 'Updated amount';
                $result->totalDeduction = $sumDeduct;
                $result->participants = $participants;
                echo json_encode($result);
                exit;
            } else {
                $result = new stdClass();
                $result->statusCode = 200;
                $result->result = 'Updated amounts';
                $result->totalDeduction = 0;
                $result->participants = $participants;
                echo json_encode($result);
                exit;
            }

        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';
            $result->totalDeduction = 0;
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['data'] == 'suggestMe') {
        $ptbd_table_name = 'wp_trek_user_sugget_trek';
        $step_radio = $_POST['step_radio'];
        $highest_altitude = $_POST['highest_altitude'];
        $walked_on_snow = $_POST['walked_on_snow'];
        $interested_in = $_POST['interested_in'];
        // $trekkers = $_POST['trekkers'];
        $preferred_time = $_POST['preferred_time'];
        $must_have_points = $_POST['must_have_points'];
        $fitness_level = $_POST['fitness_level'];
        $looking_for = $_POST['looking_for'];
        $duration = $_POST['duration'];
        $extra = $_POST['extra'];
        $full_name = $_POST['full_name'];
        $service_required = $_POST['service_required'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $city_traveling = $_POST['city_traveling'];
        $participants = $_POST['participants'];
        $trip_duration = $_POST['trip_duration'];
        $budget = $_POST['budget'];
        $participants_age = $_POST['participants_age'];

        $dataArr = array(
            "step_radio" => $step_radio,
            "highest_altitude" => $highest_altitude,
            "walked_on_snow" => $walked_on_snow,
            "interested_in" => $interested_in,
            "preferred_time" => $preferred_time,
            "must_have_points" => $must_have_points,
            "fitness_level" => $fitness_level,
            "looking_for" => $looking_for,
            "duration" => $duration,
            "extra" => $extra,
            "full_name" => $full_name,
            "email" => $email,
            "location" => $location,
            "participants" => $participants,
            "trip_duration" => $trip_duration,
            "budget" => $budget,
            "participants_age" => $participants_age,
            "service_required" => $service_required,
            "phone_number" => $phone_number,
            "city_traveling" => $city_traveling,
        );
        $result_check = $wpdb->insert('' . $ptbd_table_name . '', $dataArr);
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'inserted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    if ($_POST['data'] == 'getSelectedCoupons') {
        $trek = $_POST['trek'];
        $bookingId = $_POST['bookingId'];
        $table = 'wp_trektable_coupon_usage';
        $getParticipationCount = $wpdb->get_results('SELECT count(id) as participants from wp_trektable_trekkers_list where trek_tbooking_id ="' . $bookingId . '" and trek_selected_trek="' . $trek . '" ');
        if (($getParticipationCount[0]->participants) > 0) {
            $CoutParticipants = $getParticipationCount[0]->participants;
            $tname = 'wp_trektable_coupon_usage';
            if ($CoutParticipants < 5) {
                //delete 5% and 10% coupons
                $data1 = $wpdb->delete($tname, array('trek_coupon_booking_id' => $bookingId, 'trek_coupon_trek' => $trek, 'trek_coupon_code' => '5percent'));
                $data1 = $wpdb->delete($tname, array('trek_coupon_booking_id' => $bookingId, 'trek_coupon_trek' => $trek, 'trek_coupon_code' => '10percent'));
            } else if ($CoutParticipants < 10) {
                //delete 10% coupons
                $data1 = $wpdb->delete($tname, array('trek_coupon_booking_id' => $bookingId, 'trek_coupon_trek' => $trek, 'trek_coupon_code' => '10percent'));
            } else {
                //delete 5% coupons
                $data1 = $wpdb->delete($tname, array('trek_coupon_booking_id' => $bookingId, 'trek_coupon_trek' => $trek, 'trek_coupon_code' => '5percent'));

            }
        }
        $table = 'wp_trektable_coupon_usage';
        $getAppliedCoupons = $wpdb->get_results('SELECT
            wp_trektable_coupons_new.coupon_merge,
            wp_trektable_coupons_new.coupon_display_category as trek_coupon_type,
            wp_trektable_coupons_new.coupon_name,
            wp_trektable_coupons_new.coupon_expiry,
            wp_trektable_coupons_new.coupon_code as trek_coupon_code,
            wp_trektable_coupons_new.coupon_region_type,
            wp_trektable_coupons_new.coupon_inc_trek,
            wp_trektable_coupons_new.coupon_description,
            wp_trektable_coupons_new.coupon_ind_usage,
            wp_trektable_coupons_new.coupon_inc_region,
            wp_trektable_coupon_usage.trek_coupon_user,
            wp_trektable_coupon_usage.trek_coupon_booking_id
            FROM
              wp_trektable_coupon_usage
            INNER JOIN wp_trektable_coupons_new
            ON wp_trektable_coupons_new.coupon_code collate utf8_general_ci
              = wp_trektable_coupon_usage.trek_coupon_code collate utf8_general_ci  Where
           wp_trektable_coupon_usage.trek_coupon_booking_id ="' . $bookingId . '"
            and wp_trektable_coupon_usage.trek_coupon_trek="' . $trek . '"
             order by wp_trektable_coupon_usage.id desc');
        if (!empty($getAppliedCoupons)) {

            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'Applied coupons';
            $result->dataCoupons = $getAppliedCoupons;
            echo json_encode($result);
            exit;

        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';
            $result->dataCoupons = array();
            $result->totalDeduction = 0;
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['data'] == 'add_contact_us_data') {

        $name = $_POST['name'];
        $mail = $_POST['email'];
        $subj = $_POST['subject'];
        $msg = $_POST['message'];

        $ptbd_table_name = $wpdb->prefix . 'trek_contact_us';
        $wpdb->insert('' . $ptbd_table_name . '', array(

            'username' => $name,
            'user_mail' => $mail,
            'subject' => $subj,
            'message' => $msg,
        ));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->name = $name;
        $result->message = 'success';
        $result->info = 'Message send.';

        echo json_encode($result);
        exit;

    }

    if ($_POST['data'] == 'getDepartures') {
        $ptbd_table_name = 'wp_trektable_trek_departure';
        $trek = $_POST['trekId'];

        $departures = $wpdb->get_results('SELECT id,trek_start_date,trek_end_date FROM wp_trektable_trek_departure where trek_selected_trek="' . $trek . '" and trek_departure_status=0 and trek_start_date>CURDATE() order by trek_start_date asc');

        $result = new stdClass();
        $result->statusCode = 200;
        $result->data = $departures;

        echo json_encode($result);

    }

    if ($_POST['data'] == 'otp_verify') {

        $userid = $_POST['u_id'];
        $new_pass = $_POST['pass'];
        $otp = $_POST['otp'];
        // echo $new_pass.",".$userid.",".$otp;

        $results = $wpdb->get_results("SELECT * FROM wp_trektable_userdetails where trek_user_id='" . $userid . "' and trek_otp='" . $otp . "';");
        $num = count($results);

        if ($num != 1) {
            $result = new stdClass();
            $result->statusCode = 204;
            $result->Message = 'Something went wrong.';
            echo json_encode($result);
            die;
        } else {

            $time = strtotime($results[0]->last_password_changed);

            $curtime = time();

            // if (($curtime - $time) > 5000) {     //5000 seconds need to recheck [have errors]
            //     $result = new stdClass();
            //     $result->statusCode = 204;
            //     $result->Message = 'Time out.';
            //     echo json_encode($result);
            //     die;
            // } else {

            $ptbd_table_name = 'wp_users';
            $pass = md5($new_pass);
            $result_check = $wpdb->update('' . $ptbd_table_name . '', array(
                'user_pass' => $pass,
            ), array('user_login' => $userid));

            if ($result_check) {

                $wpdb->update('wp_trektable_userdetails', array(
                    'trek_otp' => null,
                ), array('trek_user_id' => $userid));

                $result = new stdClass();
                $result->statusCode = 200;
                $result->Message = 'Success';
                echo json_encode($result);
                die;
            } else {
                $result = new stdClass();
                $result->statusCode = 204;
                $result->Message = 'Some errors occured.';
                echo json_encode($result);
                die;
            }
            // }
        }
    }

    if ($_POST['data'] == 'getDtesFiltering') {
        $month = $_POST['month'];
        $target = '';
        if (!empty($month)) {
            $month = explode(",", $month);
            $month = "'" . implode("', '", $month) . "'";

            $output = $wpdb->get_results("SELECT distinct(trek_start_date) as trek_start_date FROM `wp_trektable_trek_departure` WHERE MONTH(trek_start_date) in (" . $month . ") and trek_start_date>= curdate()");

            if (!empty($output)) {
                $cout = count($output);
                for ($k = 0; $k < $cout; $k++) {
                    $target .= ' <p><input type="checkbox" value="' . $output[$k]->trek_start_date . '" class="trek_basic_filtering filter-dates" id="dates' . $k . '"><label for="dates' . $k . '">' . $output[$k]->trek_start_date . '</label></p>';
                }
            } else {
                $target .= 'No Treks';
            }

        } else {
            $target .= 'No Treks';
        }
        $result = new stdClass();
        $result->statusCode = 200;
        $result->result = 'filter';
        $result->output = $target;

        echo json_encode($result);
        die;

    }

    if ($_POST['data'] == 'filtering') {
        $ptbd_table_name = 'wp_trektable_addtrekdetails';
        $region = $_POST['region'];
        $season = $_POST['season'];
        $theme = $_POST['theme'];
        $interest = $_POST['interest'];
        $difficulty = $_POST['difficulty'];
        $month = $_POST['month'];
        $date = $_POST['date'];

        $filterQuery = 'SELECT id,trek_name,trek_region_state,trek_altitude,trek_distance,trek_profile_image FROM wp_trektable_addtrekdetails where trek_publish_status=0 and trek_adddetails_status=0';
        if (!empty($region)) {
            $region = explode(",", $region);
            $region = "'" . implode("', '", $region) . "'";
            $region = ' and trek_region_state in(' . $region . ')';
        } else {
            $region = ' ';
        }
        if (!empty($season)) {
            $season = explode(",", $season);
            $season = "'" . implode("','", $season) . "'";
            $season = str_replace("'", "", $season);
            $season = str_replace("),", ")','", $season);
            $season = " and trek_season in('" . $season . "')";
        } else {
            $season = ' ';
        }
        if (!empty($theme)) {
            $theme = explode(",", $theme);
            $theme = "'" . implode("', '", $theme) . "'";
            $theme = ' and trek_filter_theme in(' . $theme . ')';
        } else {
            $theme = ' ';
        }
        if (!empty($interest)) {
            $interest = explode(",", $interest);
            $interest = "'" . implode("', '", $interest) . "'";
            $interest = ' and trek_filter_interests in(' . $interest . ')';
        } else {
            $interest = ' ';
        }

        if (!empty($difficulty)) {
            $difficulty = explode(",", $difficulty);
            $difficulty = "'" . implode("', '", $difficulty) . "'";
            $difficulty = ' and trek_grade in(' . $difficulty . ')';
        } else {
            $difficulty = ' ';
        }
        if (!empty($month)) {
            $month = explode(",", $month);
            $month = "'" . implode("', '", $month) . "'";
            if (!empty($date)) {
                $date = explode(",", $date);
                $date = "'" . implode("', '", $date) . "'";
                $month = ' and id in (SELECT distinct(trek_selected_trek) as trek_selected_trek FROM `wp_trektable_trek_departure` WHERE MONTH(trek_start_date) in (' . $month . ') and trek_start_date>= curdate() and trek_start_date in(' . $date . ')) ';
            } else {
                $month = ' and id in (SELECT distinct(trek_selected_trek) as trek_selected_trek FROM `wp_trektable_trek_departure` WHERE MONTH(trek_start_date) in (' . $month . ') and trek_start_date>= curdate()) ';
            }

        } else {
            $month = ' ';
        }

        $filterSql = $filterQuery . $region . $season . $theme . $interest . $difficulty . $month;
       

        $output = $wpdb->get_results("" . $filterSql . "");
        if (!empty($output)) {
            $fcount = count($output);
            if ($fcount == 0) {
                $target = '<h4>No treks found!</h4>';
            } else {
                $target = '';
                for ($i = 0; $i < $fcount; $i++) {
                    $target .= '<div id="slider-two-item" class="item"> <div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $output[$i]->trek_profile_image . '); "> <img src="' . get_template_directory_uri() . '/assets/illustration/mountain1.svg" alt=""> <h4>' . $output[$i]->trek_name . '</h4> <p>' . $output[$i]->trek_region_state . '</p></div><div class="bottom"> <div class="content"> <div class="left"> <div> <div class="icon"> <div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt=""></div><div class="info"> <p>Altitude</p><p class="bold">' . $output[$i]->trek_altitude . '  Ft.</p></div></div></div></div><div class="right"> <div> <div class="icon"> <div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt=""></div><div class="info"> <p>Approx</p><p class="bold">' . $output[$i]->trek_distance . '   Km.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $output[$i]->id . '" target="_blank"><div class="button"> View Details <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""> </div></a></div></div>';
                }
            }
        } else {
            $target = '<h4>No treks found!</h4>';
        }

        $result = new stdClass();
        $result->statusCode = 200;
        $result->result = 'filter';
        $result->output = $target;

        echo json_encode($result);

    }

    function sendmail($email, $subject, $body)
    {
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $name = 'Trek himalayas';
        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "trekhimalayasdesk@gmail.com";
        $mail->Password = '6POQGzN6X>C(';
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email);
        $mail->Subject = ($subject);
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
            $statusCode = 200;
        } else {
            $status = "failed";
            $response = "Something went wrong: <br><br>" . $mail->ErrorInfo;
            $statusCode = 200;
        }

        exit(json_encode(array("status" => $status, "response" => $response, "statusCode" => $statusCode)));

    }

    if ($_POST['data'] == 'sendMail') {

        if ($_POST['topic'] == 'contact_us') {
            if (isset($_POST['name']) && isset($_POST['email'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = "We have got your request.";
//                $body = "Dear " . $name . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Thank you for your mail.";
                $body = '<!DOCTYPE html><meta content="width=device-width"name=viewport><meta content="text/html; charset=UTF-8"http-equiv=Content-Type><title>Simple Transactional Email</title><style>img{border:none;-ms-interpolation-mode:bicubic;max-width:100%}body{background-color:#f6f6f6;font-family:sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}table{border-collapse:separate;mso-table-lspace:0;mso-table-rspace:0;width:100%}table td{font-family:sans-serif;font-size:14px;vertical-align:top}.body{background-color:#f6f6f6;width:100%}.container{display:block;margin:0 auto!important;max-width:580px;padding:10px;width:580px}.content{box-sizing:border-box;display:block;margin:0 auto;max-width:580px;padding:10px}.main{background:#fff;border-radius:3px;width:100%}.wrapper{box-sizing:border-box;padding:20px}.content-block{padding-bottom:10px;padding-top:10px}.footer{clear:both;margin-top:10px;text-align:center;width:100%}.footer a,.footer p,.footer span,.footer td{color:#999;font-size:12px;text-align:center}h1,h2,h3,h4{color:#000;font-family:sans-serif;font-weight:400;line-height:1.4;margin:0;margin-bottom:30px}h1{font-size:35px;font-weight:300;text-align:center;text-transform:capitalize}ol,p,ul{font-family:sans-serif;font-size:14px;font-weight:400;margin:0;margin-bottom:15px}ol li,p li,ul li{list-style-position:inside;margin-left:5px}a{color:#3498db;text-decoration:underline}.btn{box-sizing:border-box;width:100%}.btn>tbody>tr>td{padding-bottom:15px}.btn table{width:auto}.btn table td{background-color:#fff;border-radius:5px;text-align:center}.btn a{background-color:#fff;border:solid 1px #3498db;border-radius:5px;box-sizing:border-box;color:#3498db;cursor:pointer;display:inline-block;font-size:14px;font-weight:700;margin:0;padding:12px 25px;text-decoration:none;text-transform:capitalize}.btn-primary table td{background-color:#3498db}.btn-primary a{background-color:#3498db;border-color:#3498db;color:#fff}.last{margin-bottom:0}.first{margin-top:0}.align-center{text-align:center}.align-right{text-align:right}.align-left{text-align:left}.clear{clear:both}.mt0{margin-top:0}.mb0{margin-bottom:0}.preheader{color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0}.powered-by a{text-decoration:none}hr{border:0;border-bottom:1px solid #f6f6f6;margin:20px 0}@media only screen and (max-width:620px){table[class=body] h1{font-size:28px!important;margin-bottom:10px!important}table[class=body] a,table[class=body] ol,table[class=body] p,table[class=body] span,table[class=body] td,table[class=body] ul{font-size:16px!important}table[class=body] .article,table[class=body] .wrapper{padding:10px!important}table[class=body] .content{padding:0!important}table[class=body] .container{padding:0!important;width:100%!important}table[class=body] .main{border-left-width:0!important;border-radius:0!important;border-right-width:0!important}table[class=body] .btn table{width:100%!important}table[class=body] .btn a{width:100%!important}table[class=body] .img-responsive{height:auto!important;max-width:100%!important;width:auto!important}}@media all{.ExternalClass{width:100%}.ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td{line-height:100%}.apple-link a{color:inherit!important;font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;text-decoration:none!important}#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}.btn-primary table td:hover{background-color:#34495e!important}.btn-primary a:hover{background-color:#34495e!important;border-color:#34495e!important}}</style><span class=preheader>This is preheader text. Some clients will show this text as a preview.</span><table role=presentation border=0 cellpadding=0 cellspacing=0 class=body><tr><td><td class=container><div class=content><table role=presentation class=main><tr><td class=wrapper><table role=presentation border=0 cellpadding=0 cellspacing=0><tr><td><p>Hi there,<p>Sometimes you just want to send a simple HTML email with a simple design and clear call to action. This is it.<p>This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.<p>Good luck! Hope it works.</table></table><div class=footer><table role=presentation border=0 cellpadding=0 cellspacing=0><tr><td class=content-block><span class=apple-link>Company Inc, 3 Abbey Road, San Francisco CA 94102</span><br>Don not like these emails? <a href=http://i.imgur.com/CScmqnj.gif>Unsubscribe</a>.<tr><td class="content-block powered-by">Powered by <a href=http://claruz.com>Claruz</a>.</table></div></div><td></table>';

                // sendmail($email, $subject, $body);

            }
        } else if ($_POST['topic'] == 'otp_verification') {
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                $trk = $_POST['trk'];
                $ptbd_table_name = $wpdb->prefix . 'trektable_userdetails';
                $query = "select * from " . $ptbd_table_name . " where trek_user_email='" . $email . "'";
                $result = $wpdb->get_results($query);
                if (count($result) == 1) {

                    //trek_user_id

                    $generator = "1357902468";
                    $result_otp = "";
                    for ($i = 1; $i <= 6; $i++) {
                        $result_otp .= substr($generator, (rand() % (strlen($generator))), 1);
                    }

                    $subject = "Password reset";
                    $body = '<!DOCTYPE html><html lang="en" ><head> <meta charset="UTF-8"> <title>TTH OTP</title> </head><body><div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2"> <div style="margin:50px auto;width:70%;padding:20px 0"> <div style="border-bottom:1px solid #eee"> <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Trek Himayas</a> </div><p style="font-size:1.1em">Hi,</p><p> Use the following OTP to reset your password.</p><a href="' . get_site_url() . '/password-reset/?val=' . $result_otp . '&p_id=' . $result[0]->trek_user_id . '&tid=' . $trk . '"><h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">Reset password</h2></a><p style="font-size:0.9em;">Regards,<br/>TTH team</p><hr style="border:none;border-top:1px solid #eee"/> <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300"> <p>Trek Himalayas</p></div></div></div></body></html>';

                    $timestamp = date("Y-m-d H:i:s");

                    $wpdb->update('' . $ptbd_table_name . '', array(
                        'trek_otp' => $result_otp,
                        'last_password_changed' => $timestamp,
                    ), array('trek_user_email' => $email));

                    // $wpdb->get_results('UPDATE ' . $ptbd_table_name . ' set trek_otp=' . $result_otp . ',last_password_changed=CURRENT_TIMESTAMP() where trek_user_email=' . $email . '');

                    sendmail($email, $subject, $body);
                } else {
                    $result1 = new stdClass();
                    $result1->statusCode = 201;
                    $result1->statusCode2 = count($result);
                    $result1->message = 'failed';
                    $result1->info = 'User not found.';

                    echo json_encode($result1);
                    exit;
                }
            } else {
                $result1 = new stdClass();
                $result1->statusCode = 201;
                $result1->message = 'failed';
                $result1->info = 'Error,User not found.';

                echo json_encode($result1);
                exit;
            }
        }

    }

    if ($_POST['data'] == 'Bookdata') {

        $ptbd_table_name = 'wp_trektable_bookings';
        $ptbd_table_name1 = 'wp_trektable_trekkers_list';
        $datePicker = $_POST['datePicker'];
        $trek_id = $_POST['trek_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $emergency_phone_number = $_POST['emergency_phone_number'];
        $date_of_birth = $_POST['date_of_birth'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $user_gender = $_POST['user_gender'];
        $user_contry = $_POST['user_contry'];
        $user_state = $_POST['user_state'];
        $user_city = $_POST['user_city'];
        $number_of_participants = $_POST['number_of_participants'];
        $token_amount = $_POST['token_amount'];
        $agree_terms = $_POST['agree_terms'];
        $agree_insurance = $_POST['agree_insurance'];

        $timestamp = time();
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 5; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $ownerid = 'US' . $timestamp . $randomString;
        $bookingid = rand(11111, 99999) . $randomString . rand(11111, 99999);

        $data = array(
            'trek_selected_trek_id' => $trek_id,
            'trek_selected_departure_id' => $datePicker,
            'trek_booking_id' => $bookingid,
            'trek_booking_owner_id' => $ownerid,
            'trek_trems_condition' => $agree_terms,
            'trek_insurance' => $agree_insurance,
            'fname' => $fname,
            'lname' => $lname,
            'phone_number' => $phone_number,
            'email' => $email,
            'emergency_phone_number' => $emergency_phone_number,
            'date_of_birth' => $date_of_birth,
            'height' => $height,
            'weight' => $weight,
            'user_gender' => $user_gender,
            'user_contry' => $user_contry,
            'user_state' => $user_state,
            'user_city' => $user_city,
            'number_of_participants' => $number_of_participants,
            'token_amount' => $token_amount,

        );

        $result_check = $wpdb->insert('' . $ptbd_table_name . '', $data);
        if ($result_check) {

            if ($number_of_participants > 1) {
                for ($i = 0; $i < $number_of_participants; $i++) {
                    if ($i == 0) {
                        $result_check = $wpdb->insert('' . $ptbd_table_name1 . '', array(
                            "trek_tbooking_id" => $bookingid,
                            "trek_tname" => $fname . ' ' . $lname,
                            "trek_selected_trek" => $trek_id,
                            "trek_selected_date" => $datePicker,
                            "trek_tcontact_number" => $phone_number,
                            "trek_tgender" => $user_gender,
                            "trek_dob" => $date_of_birth,
                            "trek_tweight" => $weight,
                            "trek_theight" => $height,
                            "trek_trole" => 'owner',
                        ));
                    } else {
                        $result_check = $wpdb->insert('' . $ptbd_table_name1 . '', array(
                            "trek_tbooking_id" => $bookingid,
                            "trek_tname" => 'nil',
                            "trek_selected_trek" => $trek_id,
                            "trek_selected_date" => $datePicker,
                            "trek_tcontact_number" => '000',
                            "trek_tgender" => 'nil',
                            "trek_dob" => 'nil',
                            "trek_tweight" => 'nil',
                            "trek_theight" => 'nil',
                            "trek_trole" => 'accompany',
                        ));
                    }

                }
            } else {

                $result_check = $wpdb->insert('' . $ptbd_table_name1 . '', array(
                    "trek_tbooking_id" => $bookingid,
                    "trek_tname" => $fname . ' ' . $lname,
                    "trek_selected_trek" => $trek_id,
                    "trek_selected_date" => $datePicker,
                    "trek_tcontact_number" => $phone_number,
                    "trek_tgender" => $user_gender,
                    "trek_dob" => $date_of_birth,
                    "trek_tweight" => $weight,
                    "trek_theight" => $height,
                    "trek_trole" => 'owner',
                ));

            }

            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'inserted';

            echo json_encode($result);
            die;
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';
            $result->data = $dataArr;

            echo json_encode($result);
            die;
        }

    }

} else {
    $result = new stdClass();
    $result->message = 'Access Denied!';
    echo json_encode($result);
}
