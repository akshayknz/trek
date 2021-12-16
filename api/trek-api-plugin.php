<?php
/**
 *@package TrekPlugin
 */
$path = preg_replace('/wp-content.*$/', '', __DIR__);
//require_once $path.'/wp-load.php';
require_once '/opt/bitnami/wordpress/wp-load.php';
global $wpdb;
$ptbd_table_name = '';
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'contact-form') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        check_email_validity($email);
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $code = $_POST['code'];

//post values

        // $trek_name = $_POST['code'];
        //    $trek_cost = $_POST['code'];
        //    $trek_service_tax = $_POST['code'];
        //    $trek_region_country = $_POST['code'];
        //    $trek_region_state = $_POST['code'];
        //    $trek_region_city = $_POST['code'];
        //    $trek_days = $_POST['code'];
        //    $trek_grade = $_POST['code'];
        //    $trek_altitude = $_POST['code'];
        //    $trek_distance = $_POST['code'];
        //    $trek_trail_type = $_POST['code'];
        //    $trek_best_months = $_POST['code'];
        //    $trek_pickup_place = $_POST['code'];
        //    $trek_drop_place = $_POST['code'];
        //    $trek_transportation = $_POST['code'];
        //    $trek_redirect_url = $_POST['code'];
        // $trek_map_url = $_POST['code'];
        //    $trek_selected_flags = $_POST['code'];
        //    $trek_profile_image = $_POST['code'];
        //    $trek_gallary_image = $_POST['code'];
        //    $trek_slider_image = $_POST['code'];
        //    $trek_overview = $_POST['code'];
        //    $trek_about_trek = $_POST['code'];
        //    $trek_brief_itinerary = $_POST['code'];
        //    $trek_detailed_itinerary = $_POST['code'];
        //    $trek_how_reach = $_POST['code'];
        //    $trek_cost_terms = $_POST['code'];
        //    $trek_cancellation_policies = $_POST['code'];
        //    $trek_essential = $_POST['code'];
        //    $trek_fitness = $_POST['code'];
        //    $trek_map = $_POST['code'];
        //    $trek_faq = $_POST['code'];
        //    $trek_risk_respond = $_POST['code'];

//test code for add trek details

        $ptbd_table_name = $wpdb->prefix . 'trektable_addtrekdetails';
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_name text NOT NULL,
				    trek_cost text,
				    trek_service_tax text,
				    trek_region_country varchar(255),
				    trek_region_state varchar(255),
				    trek_region_city varchar(255),
				    trek_days varchar(255),
				    trek_grade varchar(255),
				    trek_altitude varchar(255),
				    trek_distance varchar(255),
				    trek_trail_type text,
				    trek_best_months text,
				    trek_pickup_place varchar(255),
				    trek_drop_place varchar(255),
				    trek_transportation text,
				    trek_redirect_url text,
					trek_map_url text,
				    trek_selected_flags text,
				    trek_profile_image text,
				    trek_gallary_image text,
				    trek_slider_image text,
				    trek_overview text,
				    trek_about_trek text,
				    trek_brief_itinerary text,
				    trek_detailed_itinerary text,
				    trek_how_reach text,
				    trek_cost_terms text,
				    trek_cancellation_policies text,
				    trek_essential text,
				    trek_fitness text,
				    trek_map text,
				    trek_faq text,
				    trek_risk_respond text,
				    trek_adddetails_status INT DEFAULT 0,
				    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_cost' => $trek_cost,
            'trek_service_tax' => $trek_service_tax,
            'trek_region_country' => $trek_region_country,
            'trek_region_state' => $trek_region_state,
            'trek_region_city' => $trek_region_city,
            'trek_days' => $trek_days,
            'trek_grade' => $trek_grade,
            'trek_altitude' => $trek_altitude,
            'trek_distance' => $trek_distance,
            'trek_trail_type' => $trek_trail_type,
            'trek_best_months' => $trek_best_months,
            'trek_pickup_place' => $trek_pickup_place,
            'trek_drop_place' => $trek_drop_place,
            'trek_transportation' => $trek_transportation,
            'trek_redirect_url' => $trek_redirect_url,
            'trek_map_url' => $trek_map_url,
            'trek_selected_flags' => $trek_selected_flags,
            'trek_profile_image' => $trek_profile_image,
            'trek_gallary_image' => $trek_gallary_image,
            'trek_slider_image' => $trek_slider_image,
            'trek_overview' => $trek_overview,
            'trek_about_trek' => $trek_about_trek,
            'trek_brief_itinerary' => $trek_brief_itinerary,
            'trek_detailed_itinerary' => $trek_detailed_itinerary,
            'trek_how_reach' => $trek_how_reach,
            'trek_cost_terms' => $trek_cost_terms,
            'trek_cancellation_policies' => $trek_cancellation_policies,
            'trek_essential' => $trek_essential,
            'trek_fitness' => $trek_fitness,
            // 'trek_map' => $trek_map,
            'trek_faq' => $trek_faq,
            'trek_risk_respond' => $trek_risk_respond,
        ));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->prefix = $ptbd_table_name;
        echo json_encode($result);
    }

} else {
    $result = new stdClass();
    $result->message = 'Access Denied!';
    echo json_encode($result);
}
function check_email_validity($email)
{
    if (!is_email($email)) {
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'failed';
        $result->result = 'email-failed';
        echo json_encode($result);
        exit;
    }
}