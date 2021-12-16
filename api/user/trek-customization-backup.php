<?php
/**
 *@package TrekPlugin
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
            'message' => $msg
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
         $departures = $wpdb->get_results('SELECT id,trek_start_date,trek_end_date FROM wp_trektable_trek_departure where trek_selected_trek="'.$trek.'" and trek_departure_status=0 and trek_start_date>CURDATE() order by trek_start_date asc');
            $result = new stdClass();
            $result->statusCode = 200;
            $result->data = $departures;

            echo json_encode($result);
    }

     if ($_POST['data'] == 'getDtesFiltering') {
        $month = $_POST['month'];
        $target = '';
        if(!empty($month)){
            $month = explode(",", $month);
            $month = "'" . implode ( "', '", $month ) . "'";
        $output = $wpdb->get_results("SELECT distinct(trek_start_date) as trek_start_date FROM `wp_trektable_trek_departure` WHERE MONTH(trek_start_date) in (".$month.") and trek_start_date>= curdate()");
         if(!empty($output)){
            $cout = count($output);
            for($k=0;$k<$cout;$k++){
                $target .= ' <p><input type="checkbox" value="'. $output[$k]->trek_start_date .'" class="trek_basic_filtering filter-dates" id="dates'.$k.'"><label for="dates'.$k.'">'.$output[$k]->trek_start_date.'</label></p>';
            }
         }else{
             $target .= 'No Treks';
         }
        }else{
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
        if(!empty($region)){
            $region = explode(",", $region);
            $region = "'" . implode ( "', '", $region ) . "'";
            $region =' and trek_region_state in('.$region.')';
        }else{
            $region = ' ';
        }
        if(!empty($season)){
            $season = explode(",", $season);
            $season = "'" . implode ( "', '", $season ) . "'";
            $season =' and trek_season in('.$season.')';
        }else{
            $season = ' ';
        }
        if(!empty($theme)){
            $theme = explode(",", $theme);
             $theme = "'" . implode ( "', '", $theme ) . "'";
            $theme =' and trek_filter_theme in('.$theme.')';
        }else{
            $theme = ' ';
        }
        if(!empty($interest)){
            $interest = explode(",", $interest);
             $interest = "'" . implode ( "', '", $interest ) . "'";
            $interest =' and trek_filter_interests in('.$interest.')';
        }else{
            $interest = ' ';
        }
        if(!empty($difficulty)){
            $difficulty = explode(",", $difficulty);
             $difficulty = "'" . implode ( "', '", $difficulty ) . "'";
            $difficulty =' and trek_grade in('.$difficulty.')';
        }else{
            $difficulty = ' ';
        }
        if(!empty($month)){
               $month = explode(",", $month);
               $month = "'" . implode ( "', '", $month ) . "'";
             if(!empty($date)){
                $date = explode(",", $date);
                $date = "'" . implode ( "', '", $date ) . "'";
                $month =' and id in (SELECT distinct(trek_selected_trek) as trek_selected_trek FROM `wp_trektable_trek_departure` WHERE MONTH(trek_start_date) in ('.$month.') and trek_start_date>= curdate() and trek_start_date in('.$date.')) ';
             }else{
                  $month =' and id in (SELECT distinct(trek_selected_trek) as trek_selected_trek FROM `wp_trektable_trek_departure` WHERE MONTH(trek_start_date) in ('.$month.') and trek_start_date>= curdate()) ';
             }
        }else{
            $month = ' ';
        }
      

        $filterSql = $filterQuery.$region.$season.$theme.$interest.$difficulty.$month;

        //print_r($filterSql);
        //die;

         $output = $wpdb->get_results("".$filterSql."");
         if(!empty($output)){
             $fcount = count($output);
         if($fcount==0){
          $target ='<h4>No treks found!</h4>';
         }else{
          $target ='';
         for($i=0;$i<$fcount;$i++){
          $target .='<div id="slider-two-item" class="item"> <div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url('.$output[$i]->trek_profile_image.'); "> <img src="'.get_template_directory_uri().'/assets/illustration/mountain1.svg" alt=""> <h4>'.$output[$i]->trek_name.'</h4> <p>'.$output[$i]->trek_region_state.'</p></div><div class="bottom"> <div class="content"> <div class="left"> <div> <div class="icon"> <div><img src="'.get_template_directory_uri().'/assets/icons/altitude.svg" alt=""></div><div class="info"> <p>Altitude</p><p class="bold">'.$output[$i]->trek_altitude.'  Ft.</p></div></div></div></div><div class="right"> <div> <div class="icon"> <div><img src="'.get_template_directory_uri().'/assets/icons/approx.svg" alt=""></div><div class="info"> <p>Approx</p><p class="bold">'.$output[$i]->trek_distance.'   Km.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $output[$i]->id . '" target="_blank"><div class="button"> View Details <img src="'.get_template_directory_uri().'/assets/icons/darrow.svg" alt=""> </div></a></div></div>';
         }
         }
         }else{
             $target ='<h4>No treks found!</h4>';
         }
         $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'filter';
            $result->output = $target;
            echo json_encode($result);

    }

function sendmail($email, $subject, $name, $body)
    {
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

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
        } else {
            $status = "failed";
            $response = "Something went wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));

    }
if ($_POST['data'] == 'sendMail') {
        if ($_POST['topic'] == 'contact_us') {
            if (isset($_POST['name']) && isset($_POST['email'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = "We have got your request.";
//                $body = "Dear " . $name . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Thank you for your mail.";
                $body = '<!DOCTYPE html><meta content="width=device-width"name=viewport><meta content="text/html; charset=UTF-8"http-equiv=Content-Type><title>Simple Transactional Email</title><style>img{border:none;-ms-interpolation-mode:bicubic;max-width:100%}body{background-color:#f6f6f6;font-family:sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}table{border-collapse:separate;mso-table-lspace:0;mso-table-rspace:0;width:100%}table td{font-family:sans-serif;font-size:14px;vertical-align:top}.body{background-color:#f6f6f6;width:100%}.container{display:block;margin:0 auto!important;max-width:580px;padding:10px;width:580px}.content{box-sizing:border-box;display:block;margin:0 auto;max-width:580px;padding:10px}.main{background:#fff;border-radius:3px;width:100%}.wrapper{box-sizing:border-box;padding:20px}.content-block{padding-bottom:10px;padding-top:10px}.footer{clear:both;margin-top:10px;text-align:center;width:100%}.footer a,.footer p,.footer span,.footer td{color:#999;font-size:12px;text-align:center}h1,h2,h3,h4{color:#000;font-family:sans-serif;font-weight:400;line-height:1.4;margin:0;margin-bottom:30px}h1{font-size:35px;font-weight:300;text-align:center;text-transform:capitalize}ol,p,ul{font-family:sans-serif;font-size:14px;font-weight:400;margin:0;margin-bottom:15px}ol li,p li,ul li{list-style-position:inside;margin-left:5px}a{color:#3498db;text-decoration:underline}.btn{box-sizing:border-box;width:100%}.btn>tbody>tr>td{padding-bottom:15px}.btn table{width:auto}.btn table td{background-color:#fff;border-radius:5px;text-align:center}.btn a{background-color:#fff;border:solid 1px #3498db;border-radius:5px;box-sizing:border-box;color:#3498db;cursor:pointer;display:inline-block;font-size:14px;font-weight:700;margin:0;padding:12px 25px;text-decoration:none;text-transform:capitalize}.btn-primary table td{background-color:#3498db}.btn-primary a{background-color:#3498db;border-color:#3498db;color:#fff}.last{margin-bottom:0}.first{margin-top:0}.align-center{text-align:center}.align-right{text-align:right}.align-left{text-align:left}.clear{clear:both}.mt0{margin-top:0}.mb0{margin-bottom:0}.preheader{color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0}.powered-by a{text-decoration:none}hr{border:0;border-bottom:1px solid #f6f6f6;margin:20px 0}@media only screen and (max-width:620px){table[class=body] h1{font-size:28px!important;margin-bottom:10px!important}table[class=body] a,table[class=body] ol,table[class=body] p,table[class=body] span,table[class=body] td,table[class=body] ul{font-size:16px!important}table[class=body] .article,table[class=body] .wrapper{padding:10px!important}table[class=body] .content{padding:0!important}table[class=body] .container{padding:0!important;width:100%!important}table[class=body] .main{border-left-width:0!important;border-radius:0!important;border-right-width:0!important}table[class=body] .btn table{width:100%!important}table[class=body] .btn a{width:100%!important}table[class=body] .img-responsive{height:auto!important;max-width:100%!important;width:auto!important}}@media all{.ExternalClass{width:100%}.ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td{line-height:100%}.apple-link a{color:inherit!important;font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;text-decoration:none!important}#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}.btn-primary table td:hover{background-color:#34495e!important}.btn-primary a:hover{background-color:#34495e!important;border-color:#34495e!important}}</style><span class=preheader>This is preheader text. Some clients will show this text as a preview.</span><table role=presentation border=0 cellpadding=0 cellspacing=0 class=body><tr><td><td class=container><div class=content><table role=presentation class=main><tr><td class=wrapper><table role=presentation border=0 cellpadding=0 cellspacing=0><tr><td><p>Hi there,<p>Sometimes you just want to send a simple HTML email with a simple design and clear call to action. This is it.<p>This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.<p>Good luck! Hope it works.</table></table><div class=footer><table role=presentation border=0 cellpadding=0 cellspacing=0><tr><td class=content-block><span class=apple-link>Company Inc, 3 Abbey Road, San Francisco CA 94102</span><br>Don not like these emails? <a href=http://i.imgur.com/CScmqnj.gif>Unsubscribe</a>.<tr><td class="content-block powered-by">Powered by <a href=http://claruz.com>Claruz</a>.</table></div></div><td></table>';

                sendmail($email, $subject, $name, $body);


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

            ) ;
        $result_check = $wpdb->insert('' . $ptbd_table_name . '', $data);
        if ($result_check) {

            if($number_of_participants>1){
                for($i=0;$i<$number_of_participants;$i++){
                    if($i==0){
                         $result_check = $wpdb->insert('' . $ptbd_table_name1 . '',array(
                        "trek_tbooking_id"=>$bookingid,
                        "trek_tname"=>$fname.' '.$lname,
                        "trek_selected_trek"=>$trek_id,
                        "trek_selected_date"=>$datePicker,
                        "trek_tcontact_number"=>$phone_number,
                        "trek_tgender"=>$user_gender,
                        "trek_dob"=>$date_of_birth,
                        "trek_tweight"=>$weight,
                        "trek_theight"=>$height,
                        "trek_trole"=>'owner',
                    ));
                     }else{
                          $result_check = $wpdb->insert('' . $ptbd_table_name1 . '',array(
                        "trek_tbooking_id"=>$bookingid,
                        "trek_tname"=>'nil',
                        "trek_selected_trek"=>$trek_id,
                        "trek_selected_date"=>$datePicker,
                        "trek_tcontact_number"=>'000',
                        "trek_tgender"=>'nil',
                        "trek_dob"=>'nil',
                        "trek_tweight"=>'nil',
                        "trek_theight"=>'nil',
                        "trek_trole"=>'accompany',
                    ));
                     }
                   
                }
            }else{

                  $result_check = $wpdb->insert('' . $ptbd_table_name1 . '',array(
                        "trek_tbooking_id"=>$bookingid,
                        "trek_tname"=>$fname.' '.$lname,
                        "trek_selected_trek"=>$trek_id,
                        "trek_selected_date"=>$datePicker,
                        "trek_tcontact_number"=>$phone_number,
                        "trek_tgender"=>$user_gender,
                        "trek_dob"=>$date_of_birth,
                        "trek_tweight"=>$weight,
                        "trek_theight"=>$height,
                        "trek_trole"=>'owner',
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

?>