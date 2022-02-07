<?php
/**
 * @package TrekPlugin
 */
$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once $path . '/wp-load.php';
global $wpdb;
$ptbd_table_name = '';
if (isset($_POST['action'])) {
    // Create new trek
    if ($_POST['action'] == 'addTrekDetails') {

//post values
        $trek_reach_air = $_POST['trek_reach_air'];
        $trek_reach_bus = $_POST['trek_reach_bus'];
        $trek_reach_train = $_POST['trek_reach_train'];
        $trek_cost_terms_cancellation = $_POST['trek_cost_terms_cancellation'];
        $trek_cost_terms_tour_fee = $_POST['trek_cost_terms_tour_fee'];
        $trek_cost_terms_note = $_POST['trek_cost_terms_note'];
        $trek_cost_terms_exclusion = $_POST['trek_cost_terms_exclusion'];
        $trek_cost_terms_inclusion = $_POST['trek_cost_terms_inclusion'];
        $trek_discount_percentage = $_POST['trek_discount_percentage'];
        $trek_discount_end_date = $_POST['trek_discount_end_date'];
        $trek_map_url = $_POST['trek_map_url'];
        $trek_youtube_videos = $_POST['trek_youtube_videos'];
        $trek_name = $_POST['trek_name'];
        $trek_cost = $_POST['trek_cost'];
        $trek_service_tax = $_POST['trek_service_tax'];
        $trek_region_country = $_POST['trek_region_country'];
        $trek_region_state = $_POST['trek_region_state'];
        $trek_season = json_decode(stripslashes($_POST['trek_season']));
        $trek_days = $_POST['trek_days'];
        $trek_grade = $_POST['trek_grade'];
        $trek_altitude = $_POST['trek_altitude'];
        $trek_distance = $_POST['trek_distance'];
        $trek_trail_type = $_POST['trek_trail_type'];
        $trek_best_months = $_POST['trek_best_months'];
        $trek_pickup_place1 = $_POST['trek_pickup_place1'];
        $trek_drop_place = $_POST['trek_drop_place'];
        $trek_selected_flags = $_POST['trek_selected_flags'];
        $trek_overview = $_POST['trek_overview'];
        $trek_about_trek = $_POST['trek_about_trek'];
        $trek_participation_policy = $_POST['trek_participation_policy'];
        $trek_fitness_policy = $_POST['trek_fitness_policy'];
        $trek_transportation_insurace = $_POST['trek_transportation_insurace'];
        $trek_team_member = $_POST['trek_team_member'];
        $trek_cook = $_POST['trek_cook'];
        $trek_leader = $_POST['trek_leader'];
        $trek_cancellation_policies = $_POST['trek_cancellation_policies'];
        $trek_essential = $_POST['trek_essential'];
        $trek_filter_theme = json_decode(stripslashes($_POST['trek_filter_theme']));
        $trek_filter_interests = $_POST['trek_filter_interests'];
        $trek_filter_from = $_POST['trek_filter_from'];
        $trek_filter_to = $_POST['trek_filter_to'];
        $trek_suitable_for = $_POST['trek_suitable_for'];
        $trek_experience = $_POST['trek_experience'];
        $trek_fitness_required = $_POST['trek_fitness_required'];
        $trek_about_video = $_POST['trek_about_video'];
        $trek_rail_head = $_POST['trek_rail_head'];
        $trek_airport = $_POST['trek_airport'];
        $trek_base_camp = $_POST['trek_base_camp'];
        $trek_snow = $_POST['trek_snow'];
        $trek_stay = $_POST['trek_stay'];
        $trek_service_from = $_POST['trek_service_from'];
        $trek_food = $_POST['trek_food'];
        $trek_risk_respond = $_POST['trek_risk_respond'];
        $trek_profile_image = $_POST['trek_upload1'];
        $trek_gallary_image = $_POST['trek_upload2'];
        $trek_slider_image = $_POST['trek_upload3'];
        $trek_map_tmp_image = $_POST['trek_upload4'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_addtrekdetails';
        $ptbd_table_name1 = $wpdb->prefix . 'trektable_trek_riskandrespond';
        $result_check = $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_name' => $trek_name,
            'trek_cost' => $trek_cost,
            'trek_service_tax' => $trek_service_tax,
            'trek_region_country' => $trek_region_country,
            'trek_region_state' => $trek_region_state,
            'trek_season' => json_encode($trek_season),
            'trek_days' => $trek_days,
            'trek_grade' => $trek_grade,
            'trek_altitude' => $trek_altitude,
            'trek_distance' => $trek_distance,
            'trek_trail_type' => $trek_trail_type,
            'trek_best_months' => $trek_best_months,
            'trek_participation_policy' => $trek_participation_policy,
            'trek_fitness_policy' => $trek_fitness_policy,
            'trek_filter_theme' => json_encode($trek_filter_theme),
            'trek_filter_interests' => $trek_filter_interests,
            'trek_rail_head' => $trek_rail_head,
            'trek_airport' => $trek_airport,
            'trek_base_camp' => $trek_base_camp,
            'trek_snow' => $trek_snow,
            'trek_stay' => $trek_stay,
            'trek_service_from' => $trek_service_from,
            'trek_food' => $trek_food,
            'trek_profile_image' => $trek_profile_image,
            'trek_gallary_image' => $trek_gallary_image,
            'trek_slider_image' => $trek_slider_image,
            'trek_map_tmp_image' => $trek_map_tmp_image,
            'trek_selected_flags' => $trek_selected_flags,
            'trek_ins_policy_status' => $trek_transportation_insurace,
            'trek_overview' => $trek_overview,
            'trek_about_trek' => $trek_about_trek,
            'trek_filter_from' => $trek_filter_from,
            'trek_filter_to' => $trek_filter_to,
            'trek_assigned_to' => $trek_team_member,
            'trek_suitable' => $trek_suitable_for,
            'trek_experience' => $trek_experience,
            'trek_fitness' => $trek_fitness_required,
            'trek_video_about_url' => $trek_about_video,
            'video_gallery_urls' => $trek_youtube_videos,
            'trek_pickup_place1' => $trek_pickup_place1,
            'trek_drop_place' => $trek_drop_place,
            'trek_cancellation_policies' => $trek_cancellation_policies,
            'trek_essential' => $trek_essential,
            'trek_risk_respond' => $trek_risk_respond,
            'trek_map' => $trek_map_url,
            'trek_how_reach_pp' => $trek_reach_air, //pick up place
            'trek_how_reach_dp' => $trek_reach_bus, // drop place
            'trek_how_reach_note' => $trek_reach_train, // how to reach note
            'trek_cost_terms_cancellation' => $trek_cost_terms_cancellation,
            'trek_cost_terms_tour_fee' => $trek_cost_terms_tour_fee,
            'trek_cost_terms_note' => $trek_cost_terms_note,
            'trek_cost_terms_exclusion' => $trek_cost_terms_exclusion,
            'trek_cost_terms_inclusion' => $trek_cost_terms_inclusion,
            'trek_discount_percentage' => $trek_discount_percentage,
            'trek_discount_end_date' => $trek_discount_end_date,
			'trek_cook' => $trek_cook,
            'trek_leader' => $trek_leader,
        ));

        if ($result_check) {
            //successfully inserted.
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Add action success';

            echo json_encode($result);
            exit;
        } else {
            //something gone wrong
            $result = new stdClass();
            $result->statusCode = 201;
            $result->message = 'some error occured';
            $result->result = 'reloads';
            $result->info = 'Add action failed';

            echo json_encode($result);
            exit;
        }

    }
    // Edit Trek details
    if ($_POST['action'] == 'editTrekDetails') {
        $trek_reach_air = $_POST['trek_reach_air'];
        $trek_reach_bus = $_POST['trek_reach_bus'];
        $trek_reach_train = $_POST['trek_reach_train'];
        $trek_cost_terms_cancellation = $_POST['trek_cost_terms_cancellation'];
        $trek_cost_terms_tour_fee = $_POST['trek_cost_terms_tour_fee'];
        $trek_cost_terms_note = $_POST['trek_cost_terms_note'];
        $trek_cost_terms_exclusion = $_POST['trek_cost_terms_exclusion'];
        $trek_cost_terms_inclusion = $_POST['trek_cost_terms_inclusion'];
        $trek_discount_percentage = $_POST['trek_discount_percentage'];
        $trek_discount_end_date = $_POST['trek_discount_end_date'];
        $trek_youtube_videos = $_POST['trek_youtube_videos'];
        $trek_map_url = $_POST['trek_map_url'];
        $trek_id = $_POST['trek_id'];
        $trek_name = $_POST['trek_name'];
        $trek_cost = $_POST['trek_cost'];
        $trek_service_tax = $_POST['trek_service_tax'];
        $trek_region_country = $_POST['trek_region_country'];
        $trek_region_state = $_POST['trek_region_state'];
        $trek_season = json_decode(stripslashes($_POST['trek_season']));
        $trek_filter_theme = json_decode(stripslashes($_POST['trek_filter_theme']));
        $trek_days = $_POST['trek_days'];
        $trek_grade = $_POST['trek_grade'];
        $trek_altitude = $_POST['trek_altitude'];
        $trek_distance = $_POST['trek_distance'];
        $trek_trail_type = $_POST['trek_trail_type'];
        $trek_best_months = $_POST['trek_best_months'];
        $trek_pickup_place1 = $_POST['trek_pickup_place1'];
        $trek_transportation_insurace = $_POST['trek_transportation_insurace'];
        $trek_drop_place = $_POST['trek_drop_place'];
        $trek_selected_flags = $_POST['trek_selected_flags'];
        $trek_overview = $_POST['trek_overview'];
        $trek_about_trek = $_POST['trek_about_trek'];
        $trek_participation_policy = $_POST['trek_participation_policy'];
        $trek_fitness_policy = $_POST['trek_fitness_policy'];
        $trek_team_member = $_POST['trek_team_member'];
        $trek_cook = $_POST['trek_cook'];
        $trek_leader = $_POST['trek_leader'];
        // $trek_cost_terms = $_POST['trek_cost_terms'];
        $trek_cancellation_policies = $_POST['trek_cancellation_policies'];
        $trek_essential = $_POST['trek_essential'];
        $trek_filter_interests = $_POST['trek_filter_interests'];
        $trek_rail_head = $_POST['trek_rail_head'];
        $trek_filter_from = $_POST['trek_filter_from'];
        $trek_filter_to = $_POST['trek_filter_to'];
        $trek_airport = $_POST['trek_airport'];
        $trek_base_camp = $_POST['trek_base_camp'];
        $trek_snow = $_POST['trek_snow'];
        $trek_stay = $_POST['trek_stay'];
        $trek_service_from = $_POST['trek_service_from'];
        $trek_food = $_POST['trek_food'];
        $trek_suitable_for = $_POST['trek_suitable_for'];
        $trek_experience = $_POST['trek_experience'];
        $trek_fitness_required = $_POST['trek_fitness_required'];
        $trek_about_video = $_POST['trek_about_video'];
        // $trek_map = $_POST['trek_upload4'];
        $trek_risk_respond = $_POST['trek_risk_respond'];
        $trek_profile_image = $_POST['trek_upload1'];
        $trek_gallary_image = $_POST['trek_upload2'];
        $trek_slider_image = $_POST['trek_upload3'];
        $trek_map_tmp_image = $_POST['trek_upload4'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_addtrekdetails';
        $ptbd_table_name = $wpdb->prefix . 'trektable_addtrekdetails';
        $ptbd_table_name1 = $wpdb->prefix . 'trektable_trek_riskandrespond';
        $query = "select count(trek_name) as tk_name from " . $ptbd_table_name . " where trek_adddetails_status=0 and id=" . $trek_id . "";
        $results = $wpdb->get_results($query);

        $rr = array(

            'trek_how_reach_pp' => $trek_reach_air, //pickup place
            'trek_how_reach_dp' => $trek_reach_bus, // drop place
            'trek_how_reach_note' => $trek_reach_train, // how to reach note

        );

        if ($results[0]->tk_name == 1) {

            if ($wpdb->update('' . $ptbd_table_name . '', array(
                'trek_name' => $trek_name,
                'trek_cost' => $trek_cost,
                'trek_service_tax' => $trek_service_tax,
                'trek_region_country' => $trek_region_country,
                'trek_region_state' => $trek_region_state,
                'trek_season' => json_encode($trek_season),
                'trek_days' => $trek_days,
                'trek_grade' => $trek_grade,
                'trek_altitude' => $trek_altitude,
                'trek_distance' => $trek_distance,
                'trek_participation_policy' => $trek_participation_policy,
                'trek_fitness_policy' => $trek_fitness_policy,
                'trek_trail_type' => $trek_trail_type,
                'trek_best_months' => $trek_best_months,
                'trek_pickup_place1' => $trek_pickup_place1,
                'trek_ins_policy_status' => $trek_transportation_insurace,
                'trek_drop_place' => $trek_drop_place,
                'trek_profile_image' => $trek_profile_image,
                'trek_gallary_image' => $trek_gallary_image,
                'trek_slider_image' => $trek_slider_image,
                'trek_map_tmp_image' => $trek_map_tmp_image,
                'trek_selected_flags' => $trek_selected_flags,
                'trek_overview' => $trek_overview,
                'trek_about_trek' => $trek_about_trek,
                'trek_risk_respond' => $trek_risk_respond,
                'trek_assigned_to' => $trek_team_member,
                'trek_cook' => $trek_cook,
                'trek_leader' => $trek_leader,
                'trek_filter_theme' => json_encode($trek_filter_theme),
                'trek_filter_interests' => $trek_filter_interests,
                'trek_filter_from' => $trek_filter_from,
                'trek_filter_to' => $trek_filter_to,
                'video_gallery_urls' => $trek_youtube_videos,
                'trek_cancellation_policies' => $trek_cancellation_policies,
                'trek_essential' => $trek_essential,
                'trek_suitable' => $trek_suitable_for,
                'trek_experience' => $trek_experience,
                'trek_fitness' => $trek_fitness_required,
                'trek_video_about_url' => $trek_about_video,
                'trek_rail_head' => $trek_rail_head,
                'trek_airport' => $trek_airport,
                'trek_base_camp' => $trek_base_camp,
                'trek_snow' => $trek_snow,
                'trek_stay' => $trek_stay,
                'trek_service_from' => $trek_service_from,
                'trek_food' => $trek_food,
                'trek_map' => $trek_map_url,
                'trek_how_reach_pp' => $trek_reach_air, //pickup place
                'trek_how_reach_dp' => $trek_reach_bus, // drop place
                'trek_how_reach_note' => $trek_reach_train, // how to reach note
                'trek_cost_terms_cancellation' => $trek_cost_terms_cancellation,
                'trek_cost_terms_tour_fee' => $trek_cost_terms_tour_fee,
                'trek_cost_terms_note' => $trek_cost_terms_note,
                'trek_cost_terms_exclusion' => $trek_cost_terms_exclusion,
                'trek_cost_terms_inclusion' => $trek_cost_terms_inclusion,
                'trek_discount_percentage' => $trek_discount_percentage,
                'trek_discount_end_date' => $trek_discount_end_date,
            ), array('trek_adddetails_status' => 0, 'id' => $trek_id))) {
                $dataRiskAndRespond = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name1 . ' where trek_risk_status="0"');
                if (empty($dataRiskAndRespond)) {
                    $wpdb->insert('' . $ptbd_table_name1 . '', array(
                        'trek_risk_content' => $trek_risk_respond,
                    ));

                } else {

                    $wpdb->update('' . $ptbd_table_name1 . '', array(
                        'trek_risk_content' => $trek_risk_respond,
                    ), array('id' => '1', 'trek_risk_status' => 0));
                }

                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'reload';
                $result->info = 'Edit action success';

                echo json_encode($result);
                exit;
            } else {
                // $res = $wpdb->print_error();
                // print_r($res);
                // die;

                $result = new stdClass();
                $result->statusCode = 400;
                $result->message = 'failed';
                $result->result = 'fail';
                $result->dta = $rr;
                $result->info = 'unknown error';
                echo json_encode($result);
                exit;
            }

        } else {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

  if ($_POST['action'] == 'deleteBrochure') {
        $broch_id = $_POST['id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_brochure';
        $result = $wpdb->delete($ptbd_table_name, array('id' => $broch_id));

        $result = new stdClass();
        if ($result) {
            $result->statusCode = 200;
            $result->message = 'Deleted';
        } else {
            $result->statusCode = 400;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
        }
        echo json_encode($result);
        exit;

    }

    if ($_POST['action'] == 'deleteTrek') {
        $trek_id = $_POST['trek_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_addtrekdetails';
        $ptbd_table_name1 = $wpdb->prefix . 'trektable_trek_departure';
        $query = "select count(trek_name) from " . $ptbd_table_name . " where trek_adddetails_status=0 and id=" . $trek_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_adddetails_status' => 1,
            ), array('trek_adddetails_status' => 0, 'id' => $trek_id));
            $wpdb->update('' . $ptbd_table_name1 . '', array(
                'trek_departure_status' => 1,
            ), array('trek_selected_trek' => $trek_id));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Delete action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'updateArticleTitle') {
        $trek_content = $_POST['content'];
        $trek_context = $_POST['context'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_context';

        if (isset($trek_content) && isset($trek_context)) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_content' => $trek_content,
            ), array('trek_context' => $trek_context));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'update';
            $result->info = 'Title updated';


            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }
    if ($_POST['action'] == 'deleteUserResponse') {
        $trek_id = $_POST['trek_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_addtrekdetails';
        $ptbd_table_name1 = $wpdb->prefix . 'trektable_trek_departure';
        $query = "select count(trek_name) from " . $ptbd_table_name . " where trek_adddetails_status=0 and id=" . $trek_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_adddetails_status' => 1,
            ), array('trek_adddetails_status' => 0, 'id' => $trek_id));
            $wpdb->update('' . $ptbd_table_name1 . '', array(
                'trek_departure_status' => 1,
            ), array('trek_selected_trek' => $trek_id));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Delete action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }
    if ($_POST['action'] == 'deleteDeparture') {
        $departureId = $_POST['departureId'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_departure';
        $query = "select * from " . $ptbd_table_name . " where trek_departure_status=0 and id=" . $departureId . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_departure_status' => 1,
            ), array('trek_departure_status' => 0, 'id' => $departureId));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Delete action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'deleteGrade') {
        $grade_id = $_POST['grade_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_grade';

        $wpdb->update('' . $ptbd_table_name . '', array(
            'trek_grade_status' => 1,
        ), array('trek_grade_status' => 0, 'id' => $grade_id));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Delete action success';

        echo json_encode($result);
        exit;

    }
    if ($_POST['action'] == 'deleteSeason') {
        $season_id = $_POST['season_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_season';

        $wpdb->update('' . $ptbd_table_name . '', array(
            'trek_season_status' => 1,
        ), array('trek_season_status' => 0, 'id' => $season_id));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Delete action success';

        echo json_encode($result);
        exit;

    }
    if ($_POST['action'] == 'deleteTheme') {
        $theme_id = $_POST['theme_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_theme';

        $wpdb->update('' . $ptbd_table_name . '', array(
            'trek_theme_status' => 1,
        ), array('trek_theme_status' => 0, 'id' => $theme_id));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Delete action success';

        echo json_encode($result);
        exit;

    }
    if ($_POST['action'] == 'deleteEvent') {
        $event_id = $_POST['event_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_events';

        $wpdb->update('' . $ptbd_table_name . '', array(
            'trek_event_status' => 1,
        ), array('id' => $event_id));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Delete action success';

        echo json_encode($result);
        exit;

    }
    if ($_POST['action'] == 'deletePickup') {
        $pickup_id = $_POST['pickup_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_pickup_reach';

        $wpdb->update('' . $ptbd_table_name . '', array(
            'trek_pickup_status' => 1,
        ), array('trek_pickup_status' => 0, 'id' => $pickup_id));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Delete action success';

        echo json_encode($result);
        exit;

    }

    if ($_POST['action'] == 'addNewFlag') {
        $trek_flag_name = $_POST['trek_flag_name'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_flags';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_flag_name' => $trek_flag_name));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';

        echo json_encode($result);
    }
    if ($_POST['action'] == 'addNewRrTemplate') {
        $trek_rr_name = $_POST['trek_rr_name'];
        $trek_rr_content = $_POST['trek_rr_content'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_riskandrespond';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_risk_name' => $trek_rr_name,
            'trek_risk_content' => $trek_rr_content,
        ));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';

        echo json_encode($result);
    }
    if ($_POST['action'] == 'addNewBrTemplate') {
        $trek_br_name = $_POST['trek_br_name'];
        $trek_br_content = $_POST['trek_br_content'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_brochure';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_brochure_name' => $trek_br_name,
            'trek_brochure_content' => $trek_br_content,
        ));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New Brochure added';

        echo json_encode($result);
    }

    if ($_POST['action'] == 'addNewGrade') {
        $trek_grade_name = $_POST['trek_grade_name'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_grade';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_grade' => $trek_grade_name));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'data';
        $result->data = $trek_grade_name;
        $result->info = 'New grade added';

        echo json_encode($result);
    }
    if ($_POST['action'] == 'addNewSeason') {
        $trek_season_name = $_POST['trek_season_name'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_season';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_season' => $trek_season_name));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'data';
        $result->data = $trek_season_name;
        $result->info = 'New season added';

        echo json_encode($result);
    }
    if ($_POST['action'] == 'addNewTheme') {
        $trek_theme_name = $_POST['trek_theme_name'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_theme';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_theme' => $trek_theme_name));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'data';
        $result->data = $trek_theme_name;
        $result->info = 'New theme added';

        echo json_encode($result);
    }
    if ($_POST['action'] == 'addNewEvent') {
        $trek_event_name = $_POST['trek_grade_name'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_events';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_event' => $trek_event_name));
        $lastid = $wpdb->insert_id;
        if (isset($lastid)) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'data';
            $result->id = $lastid;
            $result->data = $trek_event_name;
            $result->info = 'New flag added';

            echo json_encode($result);
            exit;
        }
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 201;
        $result->message = 'success';
        $result->result = 'data';
        $result->data = $trek_grade_name;
        $result->info = 'New flag added';

        echo json_encode($result);
    }
    if ($_POST['action'] == 'addNewPickupPlace') {
        $trek_pickup_name = $_POST['trek_create_pickup'];
        $trek_pickup_how = $_POST['trek_create_howtoreach'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_pickup_reach';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_pickup_place' => $trek_pickup_name,
            'trek_pickup_how_reach' => $trek_pickup_how,
        ));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $lastid = $wpdb->insert_id;
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'data';
        $result->data = $trek_pickup_name;
        $result->id = $lastid;
        $result->info = 'New flag added';

        echo json_encode($result);
    }

    if ($_POST['action'] == 'getFlag') {
        $trek_flag_id = $_POST['trek_flag_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_flags';
        $data = $wpdb->get_results('SELECT trek_flag_name,id FROM ' . $ptbd_table_name . ' where trek_flag_status=0 and id=' . $trek_flag_id . '');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';
        $result->output = $data[0]->trek_flag_name;
        $result->outputId = $data[0]->id;

        echo json_encode($result);
        exit;
    }
    if ($_POST['action'] == 'getRRContent') {
        $trek_rr_id = $_POST['trek_rr_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_riskandrespond';
        $data = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name . ' where trek_risk_status=0 and id=' . $trek_rr_id . '');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';
        $result->name = $data[0]->trek_risk_name;
        $result->id = $data[0]->id;
        $result->content = $data[0]->trek_risk_content;

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'updateRRTemplate') {
        $trek_rr_name = $_POST['trek_rr_name'];
        $trek_rr_id = $_POST['trek_rr_id'];
        $trek_rr_content = $_POST['trek_rr_content'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_riskandrespond';
        $query = "select * from " . $ptbd_table_name . " where trek_risk_status=0 and id=" . $trek_rr_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_risk_name' => $trek_rr_name,
                'trek_risk_content' => $trek_rr_content,

            ), array('trek_risk_status' => 0, 'id' => $trek_rr_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }
    if ($_POST['action'] == 'updateFlag') {
        $trek_flag_name = $_POST['trek_flag_name'];
        $trek_flag_id = $_POST['trek_flag_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_flags';
        $query = "select count(trek_flag_name) from " . $ptbd_table_name . " where trek_flag_status=0 and id=" . $trek_flag_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_flag_name' => $trek_flag_name), array('trek_flag_status' => 0, 'id' => $trek_flag_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }
    if ($_POST['action'] == 'deleteRRTemplate') {
        $trek_rr_id = $_POST['trek_rr_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_riskandrespond';
        $query = "select * from " . $ptbd_table_name . " where id=" . $trek_rr_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->delete('' . $ptbd_table_name . '', array('id' => $trek_rr_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'activateBRTemplate') {
        $trek_br_id = $_POST['trek_br_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_brochure';
        $query = "select * from " . $ptbd_table_name . " where id=" . $trek_br_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'is_activated' => 1), array('is_activated' => 0));
            $wpdb->update('' . $ptbd_table_name . '', array(
                'is_activated' => 0), array('id' => $trek_br_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'deleteBRTemplate') {
        $trek_br_id = $_POST['trek_br_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_brochure';
        $query = "select * from " . $ptbd_table_name . " where id=" . $trek_br_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->delete('' . $ptbd_table_name . '', array('id' => $trek_br_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'itineraryDelete') {
        $trek_itinerary_trek_id = $_POST['trek_itinerary_trek_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_itinerary';
        $ptbd_table_name1 = $wpdb->prefix . 'trektable_addtrekdetails';
        // $query = "select * from ".$ptbd_table_name." where trek_itinerary_status=0 and trek_id=".$trek_itinerary_trek_id."";
        // $result = $wpdb->get_results($query);
        // if(count($result)==1){
        $wpdb->update('' . $ptbd_table_name . '', array(
            'trek_itinerary_status' => 1), array('trek_id' => $trek_itinerary_trek_id));
        $wpdb->update('' . $ptbd_table_name1 . '', array(
            'trek_brief_itinerary' => 'non',

        ), array('trek_adddetails_status' => 0, 'id' => $trek_itinerary_trek_id));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'update action success';

        echo json_encode($result);
        exit;
    }
    if ($_POST['action'] == 'deleteFlag') {
        $trek_flag_id = $_POST['trek_flag_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_flags';
        $query = "select count(trek_flag_name) from " . $ptbd_table_name . " where trek_flag_status=0 and id=" . $trek_flag_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_flag_status' => 1), array('id' => $trek_flag_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'deleteCoupon') {
        $coupon_id = $_POST['coupon_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_coupons_new';
        $query = "select count(id) from " . $ptbd_table_name . " where id=" . $coupon_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->delete('' . $ptbd_table_name . '', array('id' => $coupon_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }
    if ($_POST['action'] == 'deleteAllDeparture') {
        $trek_id = $_POST['trek_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_departure';
        $query = "select count(id) from " . $ptbd_table_name . " where trek_departure_status=0 and trek_selected_trek=" . $trek_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) > 0) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_departure_status' => 1), array('trek_selected_trek' => $trek_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getModalDepartureCancellation') {
        $trek_id = $_POST['trek_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_bookings';
        $query = "select count(id) as countdata FROM " . $ptbd_table_name . " where trek_selected_trek_id='" . $trek_id . "' and trek_booking_status='0' and book_activity_status='2'";
        $results = $wpdb->get_results($query);
        if (count($results) > 0) {

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'cancel';
            $result->data = $results[0]->countdata;
            $result->info = 'action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'non';
            $result->info = 'action success';
            $result->data = 0;
            echo json_encode($result);
            exit;
        }
    }

   if ($_POST['action'] == 'getModalDeparture') {
        $flag = 0;
        $trek_id = $_POST['trek_id'];
        $spin = $_POST['spin'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_departure';
        $style="";
        if ($spin == "getAllTrek") {
            $flag = 1;
            $query = "SELECT
  wp_trektable_trek_departure.*,
  COUNT(wp_trektable_trekkers_list.id) AS Total,trek_trekker_status, (select count(wp_trektable_trekkers_list.id) from
  wp_trektable_trekkers_list where wp_trektable_trekkers_list.payment_status='paid' and
  wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date ) as paid
FROM
  wp_trektable_trek_departure
LEFT JOIN wp_trektable_trekkers_list ON wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date
where wp_trektable_trek_departure.trek_selected_trek = '" . $trek_id . "' and wp_trektable_trek_departure.trek_departure_status!=1
GROUP BY wp_trektable_trek_departure.id,wp_trektable_trek_departure.trek_selected_trek order by
wp_trektable_trek_departure.trek_start_date asc";
        } else if ($spin == "getReleventTrekUpcoming") {
            $flag = 2;
            $query = "SELECT
  wp_trektable_trek_departure.*,
  COUNT(wp_trektable_trekkers_list.id) AS Total,trek_trekker_status, (select count(wp_trektable_trekkers_list.id) from
  wp_trektable_trekkers_list where wp_trektable_trekkers_list.payment_status='paid' and
  wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date ) as paid
FROM
  wp_trektable_trek_departure
LEFT JOIN wp_trektable_trekkers_list ON wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date
where wp_trektable_trek_departure.trek_selected_trek = '" . $trek_id . "' and wp_trektable_trek_departure.trek_departure_status!=1 and wp_trektable_trek_departure.trek_end_date >= CURDATE()
GROUP BY wp_trektable_trek_departure.id,wp_trektable_trek_departure.trek_selected_trek order by
wp_trektable_trek_departure.trek_start_date asc";
        } else if ($spin == "getReleventTrekPrevious") {
            $flag = 3;
            $query = "SELECT
  wp_trektable_trek_departure.*,
  COUNT(wp_trektable_trekkers_list.id) AS Total,trek_trekker_status, (select count(wp_trektable_trekkers_list.id) from
  wp_trektable_trekkers_list where wp_trektable_trekkers_list.payment_status='paid' and
    wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date ) as paid
FROM
  wp_trektable_trek_departure
LEFT JOIN wp_trektable_trekkers_list ON wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date
where wp_trektable_trek_departure.trek_selected_trek = '" . $trek_id . "' and wp_trektable_trek_departure.trek_departure_status!=1 and wp_trektable_trek_departure.trek_end_date < CURDATE()
GROUP BY wp_trektable_trek_departure.id,wp_trektable_trek_departure.trek_selected_trek order by
wp_trektable_trek_departure.trek_start_date asc";
        }
        if (isset($query)) {
            $result = $wpdb->get_results($query);
        }

        if (!empty($result)) {
            $alldeparturecount = count($result);

            $departureDate = '';

            for ($k = 0; $k < $alldeparturecount; $k++) {
                $trekSeats = '';
                $trekSeatsOccupied = '';
                $trekRemainingSeats = '';
                $trekSeatsPercentage = '';
                $confirmedSeats = '';
                $trekSeats = $result[$k]->trek_seats;
                $trekSeatsOccupied = $result[$k]->Total;
                $confirmedSeats = $result[$k]->paid;
                $trekRemainingSeats = $trekSeats - $confirmedSeats;

                $totalRegistrations = $trekSeatsOccupied;

                $trekSeatsPercentage = ($trekRemainingSeats / $trekSeats) * 100;
                $k1 = strtotime($result[$k]->trek_start_date);
                $l1 = strtotime($result[$k]->trek_end_date);
                $k2 = date('j M ', $k1);
                $l2 = date('j M Y', $l1);
                $m2 = $result[$k]->trek_section;
                if($result[$k]->trek_trekker_status==1)//Completed
                    $style="style='background-color:#d4edda;'";
                else if($result[$k]->trek_trekker_status==2)//Cancelled
                    $style="style='background-color:#f8d7da;'";

                $departureDate .= '<div class="expand-collapse" '.$style.'><h5 '.$style.'>';
                $departureDate .= $k2;
                $departureDate .= ' - ';
                $departureDate .= $l2;
                $departureDate .= ' : ';
                $departureDate .= $m2;
               

                if ($trekRemainingSeats < 0) {
                    $departureDate .= '<span style="font-size: 12px;float: right;color:red;">Action Required!</span>';
                } else if ($trekRemainingSeats == 0) {
                    $departureDate .= '<span style="font-size: 12px;float: right;color:green;">Completed!</span>';
                } else {
                    $departureDate .= '<span style="font-size: 12px;float: right;">';
                    $departureDate .= $trekSeatsOccupied;
                    $departureDate .= ' Reserved!</span>';
                }

                $departureDate .= '</h5><div class="detailsdep"><p>';
                $departureDate .= '<span style="font-size: 16px;">Total Seats : ';
                $departureDate .= $trekSeats;
                $departureDate .= '</span>&nbsp;&nbsp;';

                $departureDate .= '<span style="font-size: 16px;">Total Registrations : ';
                $departureDate .= $totalRegistrations;
                $departureDate .= '</span>&nbsp;&nbsp;';

                $departureDate .= '<span style="font-size: 16px; color:green;">Confirmed Seats : ';
                $departureDate .= $confirmedSeats;
                $departureDate .= '</span>&nbsp;&nbsp;';

                if ($trekRemainingSeats < 0) {
                    $departureDate .= '<span style="color:red;font-size: 16px;"> Remaining Seats : ';
                    $departureDate .= $trekRemainingSeats;
                    $departureDate .= '&nbsp;&nbsp;<a style="color:black;" id="edit_departure_link" href="admin.php?page=manage_departure&num=' . $result[$k]->trek_selected_trek . '&dep=' . $result[$k]->id . '"><i class="fas fa-edit" ></i></a></span>';

                } else {
                    $departureDate .= '<span style="font-size: 16px;"> Remaining Seats : ';
                    $departureDate .= $trekRemainingSeats;
                    $departureDate .= '</span>';
                }
                if($result[$k]->dep_event_name)
                {
                    $departureDate.='<label class="badge badge-success" style="margin-left: 15px;">'.$result[$k]->dep_event_name.'</label>';
                }

                $departureDate .= '<a class="btn btn-secondary" style="float:right;margin-top:-7px;height:37px;" href="admin.php?page=manage_trek_users&num=' . $result[$k]->trek_selected_trek . '&dep=' . $result[$k]->id . '">Details ';
                $departureDate .= '</a>';
                $departureDate .= '</p></div></div>';

            }

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'Fetch';
            $result->flag = $flag;
            $result->info = $departureDate;

            echo json_encode($result);
            exit;
        } else {
            $departureDate .= '';
            if (isset($flag)) {
                if ($flag == 1) {
                    $departureDate = '<div class="expand-collapse"><h5>No departure dates created yet!</h5></div>';
                } else if ($flag == 2) {
                    $departureDate = '<div class="expand-collapse"><h5>No upcoming departure available!</h5></div>';
                } else if ($flag == 3) {
                    $departureDate = '<div class="expand-collapse"><h5>No departure for this trek completed yet!</h5></div>';
                } else {
                    $departureDate = '<div class="expand-collapse"><h5>No departure dates created yet!</h5></div>';
                }
            }

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'Fetch';
            $result->info = $departureDate;
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'addPolicyAction') {
        $trek_policy_name = $_POST['trek_cancel_policy_name'];
        $trek_policy_content = $_POST['trek_cancel_content'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_policy';

        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_policy_name' => $trek_policy_name, 'trek_policy_description' => $trek_policy_content));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'update action success';

        echo json_encode($result);
        exit;

    }

    if ($_POST['action'] == 'addlinks') {
        $links = $_POST['links'];
        $link_name = $_POST['link_name'];
        $link_category = $_POST['link_cat'];
        $trek_id = $_POST['trek_id'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_important_links';

        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek' => $trek_id, 'link_text' => $link_name,
            'link' => $links, 'link_category' => $link_category));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Add link success';
        echo json_encode($result);
        exit;

    }

    if ($_POST['action'] == 'deleteLink') {

        $linkId = $_POST['linkId'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_important_links';
        $query = "select * from " . $ptbd_table_name . " where id=" . $linkId . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->delete('' . $ptbd_table_name . '', array('id' => $linkId));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Delete action success';
            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->qry = $query;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getlinkContent') {
        $linkId = $_POST['linkId'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_important_links';
        $query = "select count(id) from " . $ptbd_table_name . " where id=" . $linkId . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $data = $wpdb->get_results('SELECT id,trek,link_text,link,link_category FROM ' . $ptbd_table_name . ' where id=' . $linkId . '');
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'fetch';
            $result->val = $data[0]->id;
            $result->trek = $data[0]->trek;
            $result->name = $data[0]->link_text;
            $result->links = $data[0]->link;
            $result->category = $data[0]->link_category;
            // $result->eventText = $data[0]->dep_event_name;
            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';

            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'updateLinks') {
        $links = $_POST['links'];
        $link_name = $_POST['link_name'];
        $link_category = $_POST['link_cat'];
        $id = $_POST['id'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_important_links';

        $wpdb->update('' . $ptbd_table_name . '', array('link_text' => $link_name,
            'link' => $links, 'link_category' => $link_category), array('id' => $id));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->id = $id;
        $result->name = $link_name;
        $result->catg = $link_category;
        $result->links = $links;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New policy updated';

        echo json_encode($result);

    }

    if ($_POST['action'] == 'getPolicy') {
        $trek_policy_id = $_POST['trek_policy_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_policy';

        $data = $wpdb->get_results('SELECT trek_policy_name,id,trek_policy_description FROM ' . $ptbd_table_name . ' where trek_policy_status=0 and id=' . $trek_policy_id . '');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';
        $result->outputName = $data[0]->trek_policy_name;
        $result->outputId = $data[0]->id;
        $result->outputContent = $data[0]->trek_policy_description;

        echo json_encode($result);

    }
    if ($_POST['action'] == 'updatePolicy') {
        $trek_policy_name = $_POST['trek_policy_name'];
        $trek_policy_id = $_POST['trek_policy_id'];
        $trek_policy_content = $_POST['trek_policy_content'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_policy';

        $wpdb->update('' . $ptbd_table_name . '', array(
            'trek_policy_name' => $trek_policy_name, 'trek_policy_description' => $trek_policy_content), array('id' => $trek_policy_id, 'trek_policy_status' => 0));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New policy updated';

        echo json_encode($result);

    }
    if ($_POST['action'] == 'deletePolicy') {
        $policy_id = $_POST['policy_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_policy';
        $query = "select count(trek_policy_name) from " . $ptbd_table_name . " where trek_policy_status=0 and id=" . $policy_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_policy_status' => 1,
            ), array('trek_policy_status' => 0, 'id' => $policy_id));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Delete action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'publishThisTrek') {
        $trek_id = $_POST['trek_id'];
        $method = $_POST['accomp'];
        if ($method == 'publish') {
            $data = array(
                'trek_publish_status' => 0,
            );
        } else if ($method == 'toppick') {
            $data = array(
                'top_pick' => 0,
            );
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            echo json_encode($result);
            exit;
        }

        $ptbd_table_name = $wpdb->prefix . 'trektable_addtrekdetails';
        // $ptbd_table_name1 = $wpdb->prefix . 'trektable_itinerary';
        $query = "select count(trek_name),trek_days from " . $ptbd_table_name . " where trek_adddetails_status=0 and id=" . $trek_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {

            // if(($result[0]->trek_days==$result1[0]->count)||($result[0]->trek_days<$result1[0]->count)){
            $wpdb->update('' . $ptbd_table_name . '', $data, array('trek_adddetails_status' => 0, 'id' => $trek_id));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload1';
            $result->info = 'Publish action success';

            echo json_encode($result);
            exit;

        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'unpublishThisTrek') {
        $trek_id = $_POST['trek_id'];
        $method = $_POST['accomp'];
        if ($method == 'publish') {
            $data = array(
                'trek_publish_status' => 1,
            );
        } else if ($method == 'toppick') {
            $data = array(
                'top_pick' => 1,
            );
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            echo json_encode($result);
            exit;
        }
        $ptbd_table_name = $wpdb->prefix . 'trektable_addtrekdetails';
        $query = "select count(trek_name) from " . $ptbd_table_name . " where trek_adddetails_status=0 and id=" . $trek_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', $data, array('trek_adddetails_status' => 0, 'id' => $trek_id));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Publish action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';

            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getPolicyContent') {
        $policy_id = $_POST['policy_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_policy';
        $query = "select count(trek_policy_name) from " . $ptbd_table_name . " where trek_policy_status=0 and id=" . $policy_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $data = $wpdb->get_results('SELECT id,trek_policy_name,trek_policy_description FROM ' . $ptbd_table_name . ' where trek_policy_status=0 and id=' . $policy_id . '');
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'fetch';
            $result->id = $data[0]->id;
            $result->name = $data[0]->trek_policy_name;
            $result->content = $data[0]->trek_policy_description;

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';

            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getDepartureContent') {
        $departureId = $_POST['departureId'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_departure';
        $query = "select count(id) from " . $ptbd_table_name . " where id=" . $departureId . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $data = $wpdb->get_results('SELECT id,trek_departure_status,trek_start_date,trek_end_date,trek_seats,trek_section,dep_event FROM ' . $ptbd_table_name . ' where id=' . $departureId . '');
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'fetch';
            $result->val = $data[0]->id;
            $result->start = $data[0]->trek_start_date;
            $result->end = $data[0]->trek_end_date;
            $result->seats = $data[0]->trek_seats;
            $result->section = $data[0]->trek_section;
            $result->eventId = $data[0]->dep_event;
            $result->show = $data[0]->trek_departure_status;
            // $result->eventText = $data[0]->dep_event_name;

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';

            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getTrekItinerary') {
        $trek_id = $_POST['trek_id'];
        $itinerary_day = $_POST['itinerary_day'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_itinerary';
        $query = "select * from " . $ptbd_table_name . " where trek_itinerary_status=0 and trek_id=" . $trek_id . " and itinerary_day=" . $itinerary_day . "";
        $result = $wpdb->get_results($query);
        if (empty($result)) {

            //no data available

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'empty';
            $result->info = 'get';
            $result->trek_id = $trek_id;
            $result->itinerary_day = $itinerary_day;
            echo json_encode($result);
            exit;

        } else if (count($result) == 1) {
            //get data and display
            $data = $wpdb->get_results('SELECT id,itinerary_head,trek_id,brief,detailed,itinerary_day FROM ' . $ptbd_table_name . ' where trek_itinerary_status=0 and trek_id=' . $trek_id . ' and itinerary_day=' . $itinerary_day . '');
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'fetchh';
            $result->id = $data[0]->id;
            $result->trek_id = $data[0]->trek_id;
            $result->brief = $data[0]->brief;
            $result->detailed = $data[0]->detailed;
            $result->day = $data[0]->itinerary_day;
            $result->head = $data[0]->itinerary_head;
            echo json_encode($result);
            exit;

        } else {
            //get data and display
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'More entry exist';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getAllTrekItineraryPreview') {
        $trek_id = $_POST['trek_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_itinerary';
        $query = "select * from " . $ptbd_table_name . " where trek_itinerary_status=0 and trek_id=" . $trek_id . "";
        $result = $wpdb->get_results($query);
        if (empty($result)) {

            //no data available

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'empty';
            $result->info = 'get';

            echo json_encode($result);
            exit;

        } else {
            //get data and display
            $data = $wpdb->get_results('SELECT id,trek_id,brief,detailed,itinerary_day,itinerary_head FROM ' . $ptbd_table_name . ' where trek_itinerary_status=0 and trek_id=' . $trek_id . ' order by itinerary_day asc');
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'fetchh';
            $result->data = $data;
            echo json_encode($result);
            exit;

        }
    }

    //addFitness
    if ($_POST['action'] == 'addFitness') {
        $url = $_POST['fit_upload_url'];
        $name = $_POST['fit_name'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_fitness_policy';

        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_fitness_policy_name' => $name, 'trek_fitness_policy_description' => $url));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New policy added';

        echo json_encode($result);
    }

    if ($_POST['action'] == 'addTrekItineraryDay') {
        $trek_id = $_POST['trek_id'];
        $total_days = $_POST['total_days'];
        $itinerary_day = $_POST['itinerary_day'];
        $itinerary_head = $_POST['itinerary_head'];
        $trek_itinerary_brief = $_POST['trek_itinerary_brief'];
        $trek_itinerary_detailed = $_POST['trek_itinerary_detailed'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_itinerary';
        $ptbd_table_name1 = $wpdb->prefix . 'trektable_addtrekdetails';

        $query = "select * from " . $ptbd_table_name . " where trek_itinerary_status=0 and trek_id=" . $trek_id . " and itinerary_day=" . $itinerary_day . "";
        $result = $wpdb->get_results($query);

        if (empty($result)) {
            $wpdb->insert('' . $ptbd_table_name . '', array(
                'trek_id' => $trek_id,
                'itinerary_day' => $itinerary_day,
                'itinerary_head' => $itinerary_head,
                'brief' => $trek_itinerary_brief,
                'detailed' => $trek_itinerary_detailed,
            ));
            $query1 = "select count(trek_id) as count from " . $ptbd_table_name . " where trek_itinerary_status=0 and trek_id=" . $trek_id . "";
            $result1 = $wpdb->get_results($query1);
            if (isset($result1)) {
                $count = $result1[0]->count;
            } else {
                $count = 0;
            }
            if (($count == $total_days) || ($count >= $total_days)) {
                $wpdb->update('' . $ptbd_table_name1 . '', array(
                    'trek_brief_itinerary' => 'completed',

                ), array('trek_adddetails_status' => 0, 'id' => $trek_id));
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'Success';
                $result->result = 'completed';
                $result->info = 'added successfully';
                $result->addedCount = $count;
                echo json_encode($result);
                exit;
            } else {
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'Success';
                $result->result = 'inserted';
                $result->info = 'added successfully';
                $result->addedCount = $count;
                echo json_encode($result);
                exit;
            }

        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'already exist';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'updateTrekItineraryDay') {
        $trek_id = $_POST['trek_id'];
        $itinerary_day = $_POST['itinerary_day'];
        $trek_itinerary_brief = $_POST['trek_itinerary_brief'];
        $trek_itinerary_detailed = $_POST['trek_itinerary_detailed'];
        $trek_itinerary_head = $_POST['trek_itinerary_head'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_itinerary';

        $query = "select * from " . $ptbd_table_name . " where trek_itinerary_status=0 and trek_id=" . $trek_id . " and itinerary_day=" . $itinerary_day . "";
        $result = $wpdb->get_results($query);

        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_id' => $trek_id,
                'itinerary_day' => $itinerary_day,
                'brief' => $trek_itinerary_brief,
                'itinerary_head' => $trek_itinerary_head,
                'detailed' => $trek_itinerary_detailed,
            ), array('trek_id' => $trek_id, 'itinerary_day' => $itinerary_day, 'trek_itinerary_status' => 0));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'Success';
            $result->result = 'updated';
            $result->info = 'updated successfully';
            echo json_encode($result);
            exit;

        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id failed';
            echo json_encode($result);
            exit;
        }
    }
    if ($_POST['action'] == 'get_trekData') {

        $Id = $_POST['trek_id'];
        $query1 = "SELECT * FROM wp_trektable_trek_departure where trek_selected_trek=" . $Id . " and trek_departure_status=0 order by trek_start_date asc";
        $results1 = $wpdb->get_results($query1);
        $alldeparturecount = count($results1);
        $result = new stdClass();
        $resul = '';
        for ($k = 0; $k < $alldeparturecount; $k++) {
            $k1 = strtotime($results1[$k]->trek_start_date);
            $l1 = strtotime($results1[$k]->trek_end_date);
            $k2 = date('j M ', $k1);
            $l2 = date('j M Y', $l1);
            $result->date[$k] = $k2 . "- " . $l2;
            $result->id[$k] = $results1[$k]->id;

        }

        echo json_encode($result);
    }

    if ($_POST['action'] == 'updateDepartureContent') {
        $departureId = $_POST['departureId'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $seats = $_POST['seats'];
        $section = $_POST['section'];
        $eventId = $_POST['eventId'];
        $show = $_POST['show'];
        if ($eventId == '') {
            $eventId = null;
            $eventText = null;
        } else {
            $eventText = $_POST['eventText'];
        }

        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_departure';

        $query = "select trek_selected_trek from " . $ptbd_table_name . " where id=" . $departureId . "";
        $result = $wpdb->get_results($query);

        if (count($result) == 1) {

            $query1 = "select count(id) as cout from " . $ptbd_table_name . " where trek_selected_trek=" . $result[0]->trek_selected_trek . " and trek_section='" . $section . "' and trek_start_date ='" . $sdate . "' and id !='" . $departureId . "'";


            $result1 = $wpdb->get_results($query1);
            $c = $result1[0]->cout;
            if ($c == 0) {
                $wpdb->update('' . $ptbd_table_name . '', array(
                    'trek_start_date' => $sdate,
                    'trek_end_date' => $edate,
                    'trek_seats' => $seats,
                    'trek_section' => $section,
                    'dep_event' => $eventId,
                    'dep_event_name' => $eventText,
                    'trek_departure_status' => ($show=='true')? 2:0
                ), array('id' => $departureId));
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'Success';
                $result->result = 'updated';
                $result->info = 'updated successfully';
                echo json_encode($result);
                exit;
            } else if ($c > 0) {
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'failed';
                $result->result = 'batch_exist';
                $result->in = $c;
                echo json_encode($result);
                exit;
            } else {
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'failed';
                $result->result = 'failed';
                $result->in = $c;
                echo json_encode($result);
                exit;
            }

        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id failed';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getHowReachContent') {
        $pickupId = $_POST['placeId'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_pickup_reach';
        $query = "select count(trek_pickup_how_reach) from " . $ptbd_table_name . " where trek_pickup_status=0 and id=" . $pickupId . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $data = $wpdb->get_results('select trek_pickup_how_reach from ' . $ptbd_table_name . ' where trek_pickup_status=0 and id="' . $pickupId . '"');
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'fetch';
            $result->content = $data[0]->trek_pickup_how_reach;

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'know_us_better') {

        $imgs = $_POST['imgs'];
        $cap = $_POST['caption'];
        $id = $_POST['id'];
        $shrt_desc = $_POST['short_desc'];


        $result_check = $wpdb->update('wp_tth_why', array(
            'tth_why_short_desc' => $shrt_desc,
            'tth_why_caption' => $cap,
            'tth_why_imgs' => $imgs
        ), array('id' => $id));

        $result = new stdClass();
        if ($result_check) {
            $result->statusCode = 200;
            $result->message = 'Success';
            $result->info = 'Updated';
        } else {
            $result->statusCode = 400;
            $result->message = 'Failed';
            $result->info = 'Internal server error.';
        }
        echo json_encode($result);
        exit;


    }

    if ($_POST['action'] == 'home_page_slider') {

        $imgs = $_POST['imgs'];
        $cap = $_POST['caption'];
        $id = $_POST['id'];
        $shrt_desc = $_POST['short_desc'];


        $result_check = $wpdb->update('wp_tth_why', array(
            'tth_why_short_desc' => $shrt_desc,
            'tth_why_caption' => $cap,
            'tth_why_imgs' => $imgs
        ), array('id' => $id));

        $result = new stdClass();
        if ($result_check) {
            $result->statusCode = 200;
            $result->message = 'Success';
            $result->info = 'Updated';
        } else {
            $result->statusCode = 400;
            $result->message = 'Failed';
            $result->info = 'Internal server error.';
        }
        echo json_encode($result);
        exit;


    }

    if ($_POST['action'] == 'addNewPickup') {
        $trek_pickup_name = $_POST['trek_pickup_name'];
        $trek_pickup_state = $_POST['trek_pickup_state'];
        $trek_pickup_reach_air = $_POST['trek_pickup_reach_air'];
        $trek_pickup_reach_bus = $_POST['trek_pickup_reach_bus'];
        $trek_pickup_reach_train = $_POST['trek_pickup_reach_train'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_pickup_reach';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_pickup_place' => $trek_pickup_name,
            'trek_pickup_how_reach_air' => $trek_pickup_reach_air,
            'trek_pickup_how_reach_bus' => $trek_pickup_reach_bus,
            'trek_pickup_how_reach_train' => $trek_pickup_reach_train,
            'trek_pick_up_state' => $trek_pickup_state,
            'trek_pickup_status' => '0',
        ));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New pickup added';

        echo json_encode($result);
    }
    if ($_POST['action'] == 'createNewCoupon') {
        $coupon_transfer = $_POST['coupon_transfer'];
        $coupon_name = $_POST['coupon_name'];
        $coupon_type = $_POST['coupon_type'];
        $coupon_code = $_POST['coupon_code'];
        $coupon_amount = $_POST['coupon_amount'];
        $coupon_description = $_POST['coupon_description'];
        $coupon_terms = $_POST['coupon_terms'];

        $coupon_merge = $_POST['coupon_merge'];
        $coupon_expiry = $_POST['coupon_expiry'];
        $coupon_region_type = $_POST['coupon_region_type'];
        $coupon_trek_type = $_POST['coupon_trek_type'];
        $coupon_inc_region = $_POST['coupon_inc_region'];
        $coupon_inc_trek = $_POST['coupon_inc_trek'];
        $coupon_display_category = $_POST['coupon_display_category'];
        $coupon_web_usage = $_POST['coupon_web_usage'];
        $coupon_ind_usage = $_POST['coupon_ind_usage'];
        $coupon_ind_email = $_POST['coupon_ind_email'];
        $coupon_cover_photo = $_POST['coupon_cover_photo'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_coupons_new';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'coupon_name' => $coupon_name,
            'coupon_code' => $coupon_code,
            'coupon_type' => $coupon_type,
            'coupon_transfer_type' => $coupon_transfer,
            'coupon_amount' => $coupon_amount,
            'coupon_description' => $coupon_description,
            'coupon_terms' => $coupon_terms,
            'coupon_merge' => $coupon_merge,
            'coupon_expiry' => $coupon_expiry,
            'coupon_region_type' => $coupon_region_type,
            'coupon_trek_type' => $coupon_trek_type,
            'coupon_inc_region' => $coupon_inc_region,
            'coupon_inc_trek' => $coupon_inc_trek,
            'coupon_display_category' => $coupon_display_category,
            'coupon_web_usage' => $coupon_web_usage,
            'coupon_ind_usage' => $coupon_ind_usage,
            'coupon_ind_email' => $coupon_ind_email,
            'coupon_image' => $coupon_cover_photo,
        ));

        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New coupon added';

        echo json_encode($result);
    }
    if ($_POST['action'] == 'updateNewCoupon') {
        $id = $_POST['updateId'];
        $coupon_transfer = $_POST['coupon_transfer'];
        $coupon_name = $_POST['coupon_name'];
        $coupon_code = $_POST['coupon_code'];
        $coupon_type = $_POST['coupon_type'];
        $coupon_amount = $_POST['coupon_amount'];
        $coupon_description = $_POST['coupon_description'];
        $coupon_terms = $_POST['coupon_terms'];
        $coupon_merge = $_POST['coupon_merge'];
        $coupon_expiry = $_POST['coupon_expiry'];
        $coupon_region_type = $_POST['coupon_region_type'];
        $coupon_trek_type = $_POST['coupon_trek_type'];
        $coupon_inc_region = $_POST['coupon_inc_region'];
        $coupon_inc_trek = $_POST['coupon_inc_trek'];
        $coupon_display_category = $_POST['coupon_display_category'];
        $coupon_web_usage = $_POST['coupon_web_usage'];
        $coupon_ind_usage = $_POST['coupon_ind_usage'];
        $coupon_ind_email = $_POST['coupon_ind_email'];
        $coupon_cover_photo = $_POST['coupon_cover_photo'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_coupons_new';
        $wpdb->update('' . $ptbd_table_name . '', array(
            'coupon_name' => $coupon_name,
            'coupon_code' => $coupon_code,
            'coupon_amount' => $coupon_amount,
            'coupon_transfer_type' => $coupon_transfer,
            'coupon_type' => $coupon_type,
            'coupon_description' => $coupon_description,
            'coupon_terms' => $coupon_terms,
            'coupon_merge' => $coupon_merge,
            'coupon_expiry' => $coupon_expiry,
            'coupon_trek_type' => $coupon_trek_type,
            'coupon_region_type' => $coupon_region_type,
            'coupon_inc_region' => $coupon_inc_region,
            'coupon_inc_trek' => $coupon_inc_trek,
            'coupon_display_category' => $coupon_display_category,
            'coupon_web_usage' => $coupon_web_usage,
            'coupon_ind_usage' => $coupon_ind_usage,
            'coupon_ind_email' => $coupon_ind_email,
        ), array('id' => $id));

        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload1';
        $result->info = 'New coupon added';

        echo json_encode($result);
    }

    //delete pickup start
    if ($_POST['action'] == 'pickDelete') {
        $trek_pick_id = $_POST['trek_pick_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_pickup_reach';
        $query = "select count(trek_pickup_place) from " . $ptbd_table_name . " where trek_pickup_status=0 and id=" . $trek_pick_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_pickup_status' => 1), array('id' => $trek_pick_id));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 300;
            $result->message = 'failed';
            $result->result = 'fail';
            echo json_encode($result);
            exit;
        }
    }

    //delete pickup end

    //getting trek pickup place start
    if ($_POST['action'] == 'getTrek') {
        $trek_pick_id = $_POST['trek_pick_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_pickup_reach';
        $data = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name . ' where trek_pickup_status=0 and id=' . $trek_pick_id . '');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';
        $result->outputPlace = $data[0]->trek_pickup_place;
        $result->outputId = $data[0]->id;
        $result->outputHowAir = $data[0]->trek_pickup_how_reach_air;
        $result->outputHowBus = $data[0]->trek_pickup_how_reach_bus;
        $result->outputHowTrain = $data[0]->trek_pickup_how_reach_train;
        $result->outputState = $data[0]->trek_pick_up_state;

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'addDepartureDate') {
        $trek_id = $_POST['trek_id'];
        $start_date = $_POST['start_date'];
        $eventId = $_POST['eventId'];

        if ($eventId == '') {
            $eventId = null;
            $eventText = null;
        } else {
            $eventText = $_POST['eventText'];
        }

        $end_date = $_POST['end_date'];
        $seats = $_POST['seats'];
        $sections = $_POST['sections'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_departure';

        $query = "select count(id) as cout from " . $ptbd_table_name . " where trek_departure_status=0 and trek_selected_trek=" . $trek_id . " and trek_section='" . $sections . "' and trek_start_date ='" . $start_date . "'";

        $result = $wpdb->get_results($query);
        $c = $result[0]->cout;
        if ($c == 0) {
            $data = $wpdb->insert('' . $ptbd_table_name . '', array("trek_selected_trek" => $trek_id, "trek_start_date" => $start_date, "trek_end_date" => $end_date, "trek_seats" => $seats, "trek_section" => $sections, 'dep_event' => $eventId, 'dep_event_name' => $eventText));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'inserted';
            $result->in = $c;
            echo json_encode($result);
            exit;
        } else if ($c > 0) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'batch_exist';
            $result->in = $c;
            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'failed';
            $result->in = $c;
            echo json_encode($result);
            exit;
        }
    }
    ///getting the same place with states

    if ($_POST['action'] == 'getPlace') {
        $trek_pick_state = $_POST['trek_pick_state'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_pickup_reach';
        $data = $wpdb->get_results('SELECT trek_pickup_place,id FROM ' . $ptbd_table_name . ' where trek_pickup_status=0 and trek_pick_up_state="' . $trek_pick_state . '"');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';
        $result->data = $data;
        $result->state = $trek_pick_state;

        echo json_encode($data);
        exit;
    }

    if ($_POST['action'] == 'updatePick') {
//        $trek_flag_name = $_POST['trek_flag_name'];
        //        $trek_flag_id = $_POST['trek_flag_id'];

        $pickplace = $_POST['trek_pick_place'];
        $pickId = $_POST['trek_pick_id'];
        $pickstate = $_POST['trek_pick_state'];
        $pickReach_air = $_POST['trek_pick_reach_air'];
        $pickReach_bus = $_POST['trek_pick_reach_bus'];
        $pickReach_train = $_POST['trek_pick_reach_train'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_pickup_reach';
        $query = "select count(trek_pickup_place) from " . $ptbd_table_name . " where trek_pickup_status=0 and id=" . $pickId . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_pickup_place' => $pickplace, 'trek_pickup_how_reach_air' => $pickReach_air, 'trek_pickup_how_reach_bus' => $pickReach_bus, 'trek_pickup_how_reach_train' => $pickReach_train, 'trek_pick_up_state' => $pickstate), array('trek_pickup_status' => 0, 'id' => $pickId));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 300;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getTrekkersDeparture') {

        $trekId = $_POST['trekId'];
        $dateId = $_POST['dateId'];

        $query = "SELECT
  tu.*,
  COUNT(tl.id) AS Total,
  tb.trek_booking_status,
  tb.trek_booking_id,
  tb.book_activity_status
FROM
  wp_trektable_userdetails tu
LEFT JOIN wp_trektable_bookings tb  ON tb.trek_booking_owner_id = tu.trek_user_id
LEFT JOIN wp_trektable_trekkers_list tl ON tb.trek_booking_id = tl.trek_tbooking_id
where tb.trek_booking_status!=1
and (tl.trek_trekker_status !=1 or tl.trek_trekker_status is null) and  tu.trek_user_status!=1 and tb.trek_selected_trek_id='" . $trekId . "'
and trek_selected_departure_id ='" . $dateId . "'
GROUP BY tb.id order by
tb.id desc";
        $result = $wpdb->get_results($query);
        $count = count($result);
        $target = '';
        for ($k = 0; $k < $count; $k++) {
            $target .= '<tr><td class="text-center">';
            $target .= $k + 1;
            $target .= '</td><td>';
            $target .= $result[$k]->trek_user_first_name . ' ' . $result[$k]->trek_user_last_name;
            $target .= '</td><td class="text-center">';
            $target .= $result[$k]->trek_user_email;
            $target .= '</td><td class="text-center">';
            $target .= $result[$k]->Total;
            if ($result[$k]->book_activity_status == 2) {
                $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="btn btn-warning" id="' . $result[$k]->trek_booking_id . '" onclick="approveCancellation(this.id)">Cancel</a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
            } else if ($result[$k]->book_activity_status == 5) {
                $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="btn btn-danger" id="' . $result[$k]->trek_booking_id . '">Cancelled</a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
            } else if ($result[$k]->trek_booking_status == 0) {
                $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="dot1"></a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
            } else if ($result[$k]->trek_booking_status == 2) {
                $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="dot1"></a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
            }
            $target .= 'id="';
            $target .= $result[$k]->trek_user_id;
            $target .= '"role="button" onclick="ownerDetails(this.id)">Owner</a> <a class="btn btn-info" data-toggle="modal" data-target="#Modal_trekkers" id="';
            $target .= $result[$k]->trek_booking_id;
            $target .= '" role="button" onclick="trekkersrDetails(this.id)">Trekkers</a></td></tr>';

        }

        if (!empty($result)) {

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'Fetch';
            $result->data = $target;
            echo json_encode($result);
            exit;

        } else {
            $target .= '<tr><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>';
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'not exist';
            $result->data = $target;
            echo json_encode($result);
            exit;
        }

    }
    if ($_POST['action'] == 'requestTrekCancellationAdmin') {
        $bookingId = $_POST['booking_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_bookings';
        $query = "select count(id) from " . $ptbd_table_name . " where trek_booking_status=0 and trek_booking_id='" . $bookingId . "'";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'book_activity_status' => 5,
            ), array('trek_booking_id' => $bookingId));

            $querydata = "UPDATE wp_trektable_trekkers_list
SET trek_trekker_status = 1
WHERE trek_tbooking_id='" . $bookingId . "'";
            $result = $wpdb->get_results($querydata);

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'cancellation action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getOwnerDetailsBooking') {

        $ownerId = $_POST['ownerId'];

        $query = "select trek_user_first_name as fname,trek_user_last_name as lname,trek_user_contact_number as phone_number,trek_user_gender as user_gender,trek_user_weight as weight,trek_user_height as height,trek_user_id,trek_user_dob,trek_user_emergency_number from wp_trektable_userdetails  where  referenceId='" . $ownerId . "' Limit 1";
        $result = $wpdb->get_results($query);
        // print_r($query);
        // print_r($result);
        $count = count($result);
        $target = '';
        for ($k = 0; $k < $count; $k++) {
            $target .= '<div class="row col-md-12"><div class="form-group col-md-4">User Name&nbsp;:</div><div class="col-md-8">';
            $target .= $result[$k]->fname . ' ' . $result[$k]->lname;
            $target .= '</div></div>';

            $target .= '<div class="row col-md-12"><div class="form-group col-md-4">Contact&nbsp;:</div><div class="col-md-8">';
            $target .= $result[$k]->phone_number;
            $target .= '</div></div>';
            $target .= '<div class="row col-md-12"><div class="form-group col-md-4">Emergency Contact&nbsp;:</div><div class="col-md-8">';
            $target .= $result[$k]->trek_user_emergency_number;
            $target .= '</div></div>';
            $target .= '<div class="row col-md-12"><div class="form-group col-md-4">User DOB&nbsp;:</div><div class="col-md-8">';
            $target .= $result[$k]->trek_user_dob;
            $target .= '</div></div>';

            $target .= '<div class="row col-md-12"><div class="form-group col-md-4">UserId&nbsp;:</div><div class="col-md-8">';
            $target .= $result[$k]->trek_user_id;
            $target .= '</div></div>';
            $target .= '<div class="row col-md-12"><div class="form-group col-md-4">Gender&nbsp;:</div><div class="col-md-8">';
            $target .= $result[$k]->user_gender;
            $target .= '</div></div>';

            $target .= '<div class="row col-md-12"><div class="form-group col-md-4">Weight&nbsp;:</div><div class="col-md-8">';
            $target .= $result[$k]->weight;
            $target .= '</div></div><div class="row col-md-12"><div class="form-group col-md-4">Height&nbsp;:</div><div class="col-md-8"> ';
            $target .= $result[$k]->height;
            $target .= '</div></div>';

        }

        if (!empty($result)) {

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'Fetch';
            $result->data = $target;
            echo json_encode($result);
            exit;

        } else {
            $target .= '<center>No data available </center>';
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'not exist';
            $result->data = $target;
            echo json_encode($result);
            exit;
        }

    }

    if ($_POST['action'] == 'getBookingNote') {

        $trek_booking_id = $_POST['trek_booking_id'];

        $query = "select booking_note from wp_trektable_bookings  where  trek_booking_id='" . $trek_booking_id . "' Limit 1";
        $results = $wpdb->get_results($query);

        if (!empty($results)) {

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'Fetch';
            $result->data = trim($results[0]->booking_note);
            $result->bookingId = $trek_booking_id;
            echo json_encode($result);
            exit;

        } else {

            $result = new stdClass();
            $result->statusCode = 400;
            $result->message = 'failed';
            $result->result = 'not exist';
            $result->bookingId = $trek_booking_id;
            echo json_encode($result);
            exit;
        }

    }

    if ($_POST['action'] == 'getBookingNoteSaveRequest') {

        $trek_booking_id = $_POST['trek_booking_id'];
        $trek_booking_note = $_POST['trek_booking_note'];

        if ($wpdb->update('wp_trektable_bookings', array(
            'booking_note' => $trek_booking_note), array('trek_booking_id' => $trek_booking_id))) {

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'Fetch';
            echo json_encode($result);
            exit;

        } else {

            $result = new stdClass();
            $result->statusCode = 400;
            $result->message = 'failed';
            echo json_encode($result);
            exit;
        }

    }

    if ($_POST['action'] == 'getTrekkersDetailsBooking') {

        $bookingId = $_POST['bookingId'];

        $query = "select * from wp_trektable_trekkers_list where trek_trekker_status=0 and  trek_tbooking_id='" . $bookingId . "'";
        $result = $wpdb->get_results($query);

        // print_r($result);
        $count = count($result);
        $target = '';
        for ($k = 0; $k < $count; $k++) {
            $target .= '<tr><td class="text-center">';
            $target .= $k + 1;
            $target .= '</td><td>';

            $target .= $result[$k]->trek_tfname . ' ' . $result[$k]->trek_tlname;
            $target .= '</td>';

            $target .= '<td class="text-center">';
            $target .= $result[$k]->trekker_token; //id
            $target .= '</td>';

            $target .= '<td class="text-center">';
            $target .= $result[$k]->trek_tcontact_number;
            $target .= '</td>';

            $target .= '<td class="text-center">';

            $target .= $result[$k]->trek_tcontact_emg_number;
            $target .= '</td>';

            $target .= '<td class="text-center">';

            // $target .='</td><td class="text-center">';

            $target .= $result[$k]->trek_tgender;
            $target .= '</td><td class="text-center">';
            // $target .='</td><td class="text-center">';

            $target .= $result[$k]->trek_dob;
            $target .= '</td>';

            $target .= '<td class="text-center">';
            $target .= date_diff(date_create($result[$k]->trek_dob), date_create("today"))->y; //age
            $target .= '</td>';

            $target .= '<td class="text-center">';
            // $target .='</td><td class="text-center">';

            $target .= $result[$k]->trek_tweight;
            $target .= '</td><td class="text-center">';
            // $target .='</td><td class="text-center">';

            $target .= $result[$k]->trek_theight;
            $target .= '</td>';
            if (isset($result[$k]->trek_tweight)) {
                if (isset($result[$k]->trek_theight)) {
                    $bmi = '';
                    $height_in_meter = $result[$k]->trek_theight / 100;
                    $height_in_meter_sqr = $height_in_meter * $height_in_meter;
                    $bmi = ($result[$k]->trek_tweight / $height_in_meter_sqr);
                    $target .= '<td class="text-center">';
                    // $target .= $bmi;//bmi
                    $target .= number_format((float)$bmi, 2, '.', '');
                    $target .= '</td>';
                } else {
                    $target .= '<td class="text-center">';
                    $target .= '-'; //bmi
                    $target .= '</td>';
                }
            } else {
                $target .= '<td class="text-center">';
                $target .= '-'; //bmi
                $target .= '</td>';
            }

            $target .= '<tr>';

        }

        if (!empty($result)) {

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'Fetch';
            $result->data = $target;
            echo json_encode($result);
            exit;

        } else {
            $target .= '<tr><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>';
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'not exist';
            $result->data = $target;
            echo json_encode($result);
            exit;
        }

    }
    if ($_POST['action'] == 'deletePart') {
        $trek_part_id = $_POST['trek_part_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_participation_policy';
        $query = "select count(trek_participation_policy_name) from " . $ptbd_table_name . " where trek_participation_policy_status=0 and id=" . $trek_part_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_participation_policy_status' => 1), array('id' => $trek_part_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'deleteFit') {
        $trek_part_id = $_POST['trek_part_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_fitness_policy';
        $query = "select count(trek_fitness_policy_name) from " . $ptbd_table_name . " where trek_fitness_policy_status=0 and id=" . $trek_part_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_fitness_policy_status' => 1), array('id' => $trek_part_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'deleteEss') {
        $trek_part_id = $_POST['trek_part_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_essential';
        $query = "select count(trek_essential_name) from " . $ptbd_table_name . " where trek_essential_status=0 and id=" . $trek_part_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_essential_status' => 1), array('id' => $trek_part_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'updatePartData') {
        $trek_part_name = $_POST['trek_part_name'];
        $trek_part_data = $_POST['trek_part_data'];
        $trek_part_id = $_POST['trek_part_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_participation_policy';
        $query = "select count(trek_participation_policy_name) from " . $ptbd_table_name . " where trek_participation_policy_status=0 and id=" . $trek_part_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_participation_policy_name' => $trek_part_name, 'trek_participation_policy_description' => $trek_part_data), array('trek_participation_policy_status' => 0, 'id' => $trek_part_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'updatefitData') {
        $trek_fit_name = $_POST['trek_fit_name'];
        $trek_fit_data = $_POST['trek_fit_data'];
        $trek_fit_id = $_POST['trek_fit_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_fitness_policy';
        $query = "select count(trek_fitness_policy_name) from " . $ptbd_table_name . " where trek_fitness_policy_status=0 and id=" . $trek_fit_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_fitness_policy_name' => $trek_fit_name, 'trek_fitness_policy_description' => $trek_fit_data), array('trek_fitness_policy_status' => 0, 'id' => $trek_fit_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }
    if ($_POST['action'] == 'updateEssData') {
        $trek_ess_name = $_POST['trek_ess_name'];
        $trek_ess_data = $_POST['trek_ess_data'];
        $trek_ess_id = $_POST['trek_ess_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_essential';
        $query = "select count(trek_essential_name) from " . $ptbd_table_name . " where trek_essential_status=0 and id=" . $trek_ess_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_essential_name' => $trek_ess_name, 'trek_essential_description' => $trek_ess_data), array('trek_essential_status' => 0, 'id' => $trek_ess_id));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'addNewPart') {
        $trek_part_name = $_POST['trek_part_name'];
        $trek_part_data = $_POST['trek_part_data'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_participation_policy';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_participation_policy_name' => $trek_part_name, 'trek_participation_policy_description' => $trek_part_data));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';

        echo json_encode($result);
    }

    if ($_POST['action'] == 'addnewFit') {
        $trek_part_name = $_POST['trek_fit_name'];
        $trek_part_data = $_POST['trek_fit_data'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_fitness_policy';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_fitness_policy_name' => $trek_part_name, 'trek_fitness_policy_description' => $trek_part_data));
        // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';

        echo json_encode($result);
    }
    if ($_POST['action'] == 'addnewEss') {
        $requestType = $_POST['actionData'];
        $trek_essential_data = $_POST['trek_ess_data'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_essential';
        if ($requestType == 'default') {

            $wpdb->insert('' . $ptbd_table_name . '', array(
                'trek_essential_name' => $trek_essential_data));
            // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'New essential added';

            echo json_encode($result);
            die;
        } else {
            $col = '';
            $trek_essentialId = $_POST['trek_ess_id'];
            if ($requestType == 'foot') {
                $col = 'trek_essential_fg';
            } else if ($requestType == 'head') {
                $col = 'trek_essential_hg';
            } else if ($requestType == 'util') {
                $col = 'trek_essential_pu';
            } else if ($requestType == 'cloths') {
                $col = 'trek_essential_cloth';
            } else if ($requestType == 'bgear') {
                $col = 'trek_essential_bg';
            }
            if ($col != '') {
                $wpdb->update('' . $ptbd_table_name . '', array(
                    $col => $trek_essential_data), array('id' => $trek_essentialId));
                // $wpdb->insert(''.$ptbd_table_name.'',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message));
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'reload';
                $result->info = 'New essential data updated';

                echo json_encode($result);
                die;
            } else {
                $result = new stdClass();
                $result->statusCode = 400;
                $result->message = 'failed';
                $result->result = 'error';
                $result->info = 'Failed';

                echo json_encode($result);
                die;
            }
        }

    }

    if ($_POST['action'] == 'getFitness') {
        $trek_fit_id = $_POST['elementid'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_fitness_policy';
        $data = $wpdb->get_results('SELECT trek_fitness_policy_name,id,trek_fitness_policy_description FROM ' . $ptbd_table_name . ' where trek_fitness_policy_status=0 and id=' . $trek_fit_id . '');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New Participation added';
        $result->name = $data[0]->trek_fitness_policy_name;
        $result->data_desc = $data[0]->trek_fitness_policy_description;
        $result->outputId = $data[0]->id;

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'InsertAllTopPicks') {
        $topPicks = $_POST['topPicks'];
        $topPicks = explode(",", $topPicks);

        $wpdb->query('TRUNCATE TABLE wp_trektable_top_picks');
        $ptbd_table_name = $wpdb->prefix . 'trektable_top_picks';
        $count = count($topPicks);

        for ($i = 0; $i < $count; $i++) {
            $wpdb->insert('' . $ptbd_table_name . '', array(
                'trek_id' => $topPicks[$i]));
        }
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'inserted';
        $result->info = 'New Collection added';

        echo json_encode($result);
    }

    if ($_POST['action'] == 'getEssetials') {
        $column = '';
        $id = $_POST['elementId'];
        $column = $_POST['requested'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_essential';
        if ($column == 'foot') {
            $col = 'trek_essential_fg';
        } else if ($column == 'head') {
            $col = 'trek_essential_hg';
        } else if ($column == 'util') {
            $col = 'trek_essential_pu';
        } else if ($column == 'cloths') {
            $col = 'trek_essential_cloth';
        } else if ($column == 'bgear') {
            $col = 'trek_essential_bg';
        }
        $data = $wpdb->get_results('SELECT ' . $col . ' FROM ' . $ptbd_table_name . ' where trek_essential_status=0 and id=' . $id . '');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New Participation added';
        $result->type = $column;
        $result->output = $id;
        $result->target = $data[0]->$col;

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'deleteVendor') {
        $trek_vendor_id = $_POST['trek_vendor_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_vendors';
        $query = "select count(vendor_name) from " . $ptbd_table_name . " where  id=" . $trek_vendor_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'trek_vendor_status' => 1), array('id' => $trek_vendor_id));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'update action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'ChangeVendorStatus') {
        $trek_vendor_id = $_POST['trek_vendor_id'];
        $vendor_status = $_POST['vendor_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_vendors';
        $query = "select count(vendor_name) from " . $ptbd_table_name . " where  id=" . $trek_vendor_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            if ($vendor_status == 2) {
                $wpdb->update('' . $ptbd_table_name . '', array(
                    'trek_vendor_status' => 0), array('id' => $trek_vendor_id));

                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'reload';
                $result->info = 'update action success';
                echo json_encode($result);
                exit;
            } else if ($vendor_status == 0) {
                $wpdb->update('' . $ptbd_table_name . '', array(
                    'trek_vendor_status' => 2), array('id' => $trek_vendor_id));

                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'reload';
                $result->info = 'update action success';
                echo json_encode($result);
                exit;
            }

        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'addVendor_main') {
        $trek_name = $_POST['trek_name'];
        $trek_id = $_POST['trek_id'];
        $vendor_name = $_POST['vendor_name'];
        $vendor_id = $_POST['vendor_id'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_vendors';
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek_id' => $trek_id,
            'vendor_id' => $vendor_id,
            'vendor_name' => $vendor_name,
            'trek_name' => $trek_name));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->result = 'reload';
        $result->message = 'success';
        $result->info = 'New vendor added';
        echo json_encode($result);

    }

    if ($_POST['action'] == 'getVendor_edit') {
        $vendor_id = $_POST['vendor_pick_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_vendors';
        $data = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name . ' where id=' . $vendor_id . '');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Vendor updated';
        $result->outputPlaceID = $data[0]->trek_id;
        $result->outputPlace = $data[0]->trek_id;
        echo json_encode($result);
        exit;

    }

    if ($_POST['action'] == 'getMessage') {
        $trek_message_id = $_POST['id'];
        $ptbd_table_name = $wpdb->prefix . 'trek_contact_us';
        $data = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name . ' where id=' . $trek_message_id . '');
        $result = new stdClass();
        if ($data[0]->status == "0") {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'status' => "1"), array('id' => $data[0]->id));
        }
        $result->statusCode = 200;
        $result->message = 'success';
        $result->status = $data[0]->status;
        $result->name = $data[0]->username;
        $result->mail = $data[0]->user_mail;
        $result->subject = $data[0]->subject;
        $result->message = $data[0]->message;
        $result->date = $data[0]->updated_on;

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'addContact') {

        $trk_mail = $_POST['mail'];
        $trk_ph1 = $_POST['phone1'];
        $trk_ph2 = $_POST['phone2'];
        $trk_usr_id = $_POST['user_id'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_contacts';
        $query = "select * from " . $ptbd_table_name . " where contact_email='" . $trk_mail . "'";
        try {
            $result = $wpdb->get_results($query);
        } catch (\Throwable $th) {
            $res = [1,2];
        }
        if (count($result) == 1) {

            $result = new stdClass();
            $result->statusCode = 201;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'User already assigned.';
            echo json_encode($result);
            exit;

        } else {

            $wpdb->insert('' . $ptbd_table_name . '', array(
                'contact_name' => $trk_usr_id,
                'contact_email' => $trk_mail,
                'contact_num1' => $trk_ph1,
                'contact_num2' => $trk_ph2,
            ));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'create action success';

            echo json_encode($result);
            exit;

        }
    }

    if ($_POST['action'] == 'deleteContact') {
        $con_id = $_POST['con_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_contacts';
        $query = "select count(id) from " . $ptbd_table_name . " where id=" . $con_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->delete('' . $ptbd_table_name . '', array(
                'id' => $con_id), $where_format = null );

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getContact') {
        $id = $_POST['id'];
        $table_name = $wpdb->prefix . 'trektable_contacts';
        $data = $wpdb->get_results('SELECT * FROM '.$table_name.' 
        WHERE id='.$id.'');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'fetched';
        $result->info = 'Success';
        $result->name = $data[0]->contact_name;
        $result->email = $data[0]->contact_email;
        $result->contact_num1 = $data[0]->contact_num1;
        $result->contact_num2 = $data[0]->contact_num2;
        $result->id = $data[0]->id;

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'updateContact') {
        $trek_message_id = $_POST['id'];
        $table_name = $wpdb->prefix . 'trektable_contacts';
        $wpdb->update('' . $table_name . '', 
            array(
                'contact_name' => $_POST['contact_name'],
                'contact_email' => $_POST['contact_email'],
                'contact_num1' => $_POST['contact_num1'],
                'contact_num2' => $_POST['contact_num2'],
            ), 
            array('id' => $_POST['id'])
        );
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';

        echo json_encode($result);
        exit;
    }


    //Cooks


    if ($_POST['action'] == 'addCook') {

        $trk_mail = $_POST['mail'];
        $trk_ph1 = $_POST['phone1'];
        $trk_ph2 = $_POST['phone2'];
        $trk_usr_id = $_POST['user_id'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_cooks';
        $query = "select * from " . $ptbd_table_name . " where cook_email='" . $trk_mail . "'";
        try {
            $result = $wpdb->get_results($query);
        } catch (\Throwable $th) {
            $res = [1,2];
        }
        if (count($result) == 1) {

            $result = new stdClass();
            $result->statusCode = 201;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'User already assigned.';
            echo json_encode($result);
            exit;

        } else {

            $wpdb->insert('' . $ptbd_table_name . '', array(
                'cook_name' => $trk_usr_id,
                'cook_email' => $trk_mail,
                'cook_num1' => $trk_ph1,
                'cook_num2' => $trk_ph2,
            ));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'create action success';

            echo json_encode($result);
            exit;

        }
    }

    if ($_POST['action'] == 'deleteCook') {
        $con_id = $_POST['con_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_cooks';
        $query = "select count(id) from " . $ptbd_table_name . " where id=" . $con_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->delete('' . $ptbd_table_name . '', array(
                'id' => $con_id), $where_format = null );

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getCook') {
        $id = $_POST['id'];
        $table_name = $wpdb->prefix . 'trektable_cooks';
        $data = $wpdb->get_results('SELECT * FROM '.$table_name.' 
        WHERE id='.$id.'');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'fetched';
        $result->info = 'Success';
        $result->name = $data[0]->cook_name;
        $result->email = $data[0]->cook_email;
        $result->cook_num1 = $data[0]->cook_num1;
        $result->cook_num2 = $data[0]->cook_num2;
        $result->id = $data[0]->id;

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'updateCook') {
        $trek_message_id = $_POST['id'];
        $table_name = $wpdb->prefix . 'trektable_cooks';
        $wpdb->update('' . $table_name . '', 
            array(
                'cook_name' => $_POST['cook_name'],
                'cook_email' => $_POST['cook_email'],
                'cook_num1' => $_POST['cook_num1'],
                'cook_num2' => $_POST['cook_num2'],
            ), 
            array('id' => $_POST['id'])
        );
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';

        echo json_encode($result);
        exit;
    }

    //Leaders


    if ($_POST['action'] == 'addLeader') {

        $trk_mail = $_POST['mail'];
        $trk_ph1 = $_POST['phone1'];
        $trk_ph2 = $_POST['phone2'];
        $trk_usr_id = $_POST['user_id'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_leaders';
        $query = "select * from " . $ptbd_table_name . " where leader_email='" . $trk_mail . "'";
        try {
            $result = $wpdb->get_results($query);
        } catch (\Throwable $th) {
            $res = [1,2];
        }
        if (count($result) == 1) {

            $result = new stdClass();
            $result->statusCode = 201;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'User already assigned.';
            echo json_encode($result);
            exit;

        } else {

            $wpdb->insert('' . $ptbd_table_name . '', array(
                'leader_name' => $trk_usr_id,
                'leader_email' => $trk_mail,
                'leader_num1' => $trk_ph1,
                'leader_num2' => $trk_ph2,
            ));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'create action success';

            echo json_encode($result);
            exit;

        }
    }

    if ($_POST['action'] == 'deleteLeader') {
        $con_id = $_POST['con_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_leaders';
        $query = "select count(id) from " . $ptbd_table_name . " where id=" . $con_id . "";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->delete('' . $ptbd_table_name . '', array(
                'id' => $con_id), $where_format = null );

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Action success';

            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'fail';
            $result->info = 'id not acceptable';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getLeader') {
        $id = $_POST['id'];
        $table_name = $wpdb->prefix . 'trektable_leaders';
        $data = $wpdb->get_results('SELECT * FROM '.$table_name.' 
        WHERE id='.$id.'');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'fetched';
        $result->info = 'Success';
        $result->name = $data[0]->leader_name;
        $result->email = $data[0]->leader_email;
        $result->leader_num1 = $data[0]->leader_num1;
        $result->leader_num2 = $data[0]->leader_num2;
        $result->id = $data[0]->id;

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'updateLeader') {
        $trek_message_id = $_POST['id'];
        $table_name = $wpdb->prefix . 'trektable_leaders';
        $wpdb->update('' . $table_name . '', 
            array(
                'leader_name' => $_POST['leader_name'],
                'leader_email' => $_POST['leader_email'],
                'leader_num1' => $_POST['leader_num1'],
                'leader_num2' => $_POST['leader_num2'],
            ), 
            array('id' => $_POST['id'])
        );
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'getPart') {
        $trek_part_id = $_POST['elementid'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_participation_policy';
        $data = $wpdb->get_results('SELECT trek_participation_policy_name,id,trek_participation_policy_description FROM ' . $ptbd_table_name . ' where trek_participation_policy_status=0 and id=' . $trek_part_id . '');
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New Participation added';
        $result->name = $data[0]->trek_participation_policy_name;
        $result->data_desc = $data[0]->trek_participation_policy_description;
        $result->outputId = $data[0]->id;

        echo json_encode($result);
        exit;
    }
    //Add Remarks
    if ($_POST['action'] == 'addremarks') {
        $ptbd_table_name = $wpdb->prefix . 'trektable_trekkers_remarks';
        $Trekker_ID = $_POST['Trekker_ID'];
        $OffLoad = $_POST['OffLoad'];
        $Transport = $_POST['Transport'];
        $Comments = $_POST['Comments'];
        $Added_By = $_POST['Added_By'];
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'Trekker_ID' => $Trekker_ID,
            'OffLoad' => $OffLoad,
            'Transport' => $Transport,
            'Comments' => $Comments,
            'Added_By' => $Added_By,
        ));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';
        echo json_encode($result);
        exit;      

    }
    
    //Update Remarks
     if ($_POST['action'] == 'updateremarks') {
        $ptbd_table_name = $wpdb->prefix . 'trektable_trekkers_remarks';
        $remarksID = $_POST['RemarksID'];
        $OffLoad = $_POST['OffLoad'];
        $Transport = $_POST['Transport'];
        $Comments = $_POST['Comments'];
        $Added_By = $_POST['Added_By'];
       
        $result1 = $wpdb->update('' . $ptbd_table_name . '', 
        array(         
            'OffLoad' => $OffLoad,
            'Transport' => $Transport,
            'Comments' => $Comments,
            'Added_By' => $Added_By,
        ), 
        array('ID' => $remarksID)
        );

        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';
        echo json_encode($result);
        exit;  
    }

    //update trekker status
    if ($_POST['action'] == 'updatetrekkerstatus') {
        $ptbd_table_name = $wpdb->prefix . 'trektable_trekkers_list';
        $log_table_name = $wpdb->prefix . 'trektable_trekker_status_log';
        $Trekker_ID = $_POST['Trekker_ID'];
        $Status = $_POST['Status'];    
        $Added_By = $_POST['Added_By'];
        //Update trekker table
        $wpdb->update('' . $ptbd_table_name . '', array(
            'trek_trekker_status' => $Status, 
        ), array('trekker_token' => $Trekker_ID));
        //Insert status log
        $wpdb->insert('' . $log_table_name . '', array(
            'Trekker_ID' => $Trekker_ID,
            'Status' => $Status,            
            'Added_By' => $Added_By,
        ));
        
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'New flag added';
		
		//Send Mail
        $curl = curl_init();
$name ="Anu"; 
$email = "anu.v@ecesistech.com"; 
$subject = "test"; 
$message = "test";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n \"personalizations\": [\n {\n\"to\": [\n {\n \"email\": \"anu.v@ecesistech.com\"\n }\n],\n\"subject\": \"Test\"\n }\n  ],\n  \"from\": {\n \"email\": \"tthdevelopers@gmail.com\"\n  },\n  \"content\": [\n    {\n      \"type\": \"text/html\",\n      \"value\": \"$name<br>$email<br>$subject<br>$message\"\n    }\n  ]\n}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer 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",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
		
        echo json_encode($result);
        exit;      

    }
	//update trekker departure date
    if ($_POST['action'] == 'updatetrekkerdeparturedate') {
        $ptbd_table_name = $wpdb->prefix . 'trektable_trekkers_list';
        $ptbd_booking_name = $wpdb->prefix . 'trektable_bookings';
        $Trekker_ID = $_POST['Trekker_ID'];
        $DepartureDate = $_POST['Departure_Date'];  
        $Added_By = $_POST['Added_By'];
        $Trekid = $_POST['TrekID'];   
        
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 5; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        $bookingid = rand(11111, 99999) . $randomString . rand(11111, 99999);

        $querytrekkers = "SELECT trek_tbooking_id,Amount,PaymentID FROM " . $ptbd_table_name . " WHERE trekker_token='" . $Trekker_ID. "'";
        $datatrekkers = $wpdb->get_results($querytrekkers);
        $databookings ="";
        $trekbookid="";
        $Amot=0;
        $paymentID="";
        foreach ($datatrekkers as $results)
        {         
            $trekbookid=  $results->trek_tbooking_id; 
            $Amot=  $results->Amount;
            $paymentID=$results->PaymentID;
        }
        $querybookings = "SELECT trek_booking_owner_id,trek_trems_condition,trek_insurance,fname,lname,phone_number,email,emergency_phone_number,date_of_birth,height,weight,user_gender,user_contry,user_state,user_city,token_amount FROM " . $ptbd_booking_name . " WHERE trek_booking_id='".$trekbookid."'";
        $databookings = $wpdb->get_results($querybookings);   
        $trek_booking_owner_id=0;
        $trek_trems_condition="";
        $trek_insurance="";
        $fname=$lname=$email="";
        foreach ($databookings as $results)
        { 
            $trek_booking_owner_id= $results->trek_booking_owner_id;
            $trek_trems_condition=$results->trek_trems_condition;
            $trek_insurance=$results->trek_insurance;
            $fname=$results->fname;
            $lname= $results->lname;
            $email=$results->email;
        }
           
        $data = array(
            'trek_selected_trek_id' => $Trekid,
            'trek_selected_departure_id' => $DepartureDate,
            'trek_booking_id' => $bookingid,
            'trek_booking_owner_id' => $trek_booking_owner_id,
            'trek_trems_condition' => $trek_trems_condition,
            'trek_insurance' => $trek_insurance,
            'fname' => $fname,
            'lname' => $lname,
            //'phone_number' => $results->phone_number,
            'email' => $email,
            //'emergency_phone_number' => $results->emergency_phone_number,
           // 'date_of_birth' => $results->date_of_birth,
            //'height' => $results->height,
            //'weight' => $results->weight,
            //'user_gender' => $results->user_gender,
            //'user_contry' => $results->user_contry,
            //'user_state' => $results->user_state,
           // 'user_city' => $results->user_city,
            'number_of_participants' => 1,
            'Amount' => $Amot,
            'PaymentID' => $paymentID
            //'token_amount' => $results->token_amount
        );
      
        $result_check = $wpdb->insert('' . $ptbd_booking_name . '', $data);   
        //echo $result_check;
       
        if ($result_check) {
        //Update trekker table
        $result1 = $wpdb->update('' . $ptbd_table_name . '', array(
            'trek_selected_date' => $DepartureDate, 
            'trek_selected_trek' => $Trekid,
            'trek_tbooking_id' => $bookingid
        ), array('trekker_token' => $Trekker_ID));
              
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Tranfer Success';
        echo json_encode($result);
        exit;      
    }   

    }
    
    //Add cook rating
    if ($_POST['action'] == 'addcookrating') {
        $trekid = $_POST['TrekID'];
        $departureid = $_POST['DepartureID'];
        $addedby = $_POST['Added_By'];
        $value = $_POST['Rating'];
        $cookid = $_POST['CookID'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_cookrating';
        $query = "select count(ID) AS count from " . $ptbd_table_name . " where 	TrekID=" . $trekid . " AND DepartureID=".$departureid." AND CookID=".$cookid."";
        $data = $wpdb->get_results($query);
        //echo $data[0]->count;        
        if ($data[0]->count >0) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'Value' => $value, 'AddedBy' => $addedby,'Status'=>0), array('TrekID' => $trekid, 'DepartureID' => $departureid, 'CookID' =>$cookid));

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Action success';

            echo json_encode($result);
            exit;
        } else {
            $wpdb->insert('' . $ptbd_table_name . '', array(
                'TrekID' => $trekid,
                'DepartureID' => $departureid,            
                'AddedBy' => $addedby,
                'Value' => $value, 
                'CookID' => $cookid              
            ));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'Action success';
            echo json_encode($result);
            exit;
        }
    }
//Add leader rating
if ($_POST['action'] == 'addleaderrating') {
    $trekid = $_POST['TrekID'];
    $departureid = $_POST['DepartureID'];
    $addedby = $_POST['Added_By'];
    $value = $_POST['Rating'];
    $leaderid = $_POST['LeaderID'];
    $ptbd_table_name = $wpdb->prefix . 'trektable_leaderrating';
    $query = "select count(ID) AS count from " . $ptbd_table_name . " where 	TrekID=" . $trekid . " AND DepartureID=".$departureid." AND LeaderID=".$leaderid."";
    $data = $wpdb->get_results($query);
    $data = $wpdb->get_results($query);
    //echo $data[0]->count;        
    if ($data[0]->count >0) {
        $wpdb->update('' . $ptbd_table_name . '', array(
            'Value' => $value, 'AddedBy' => $addedby,'Status'=>0), array('TrekID' => $trekid, 'DepartureID' => $departureid, 'LeaderID' =>$leaderid));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Action success';

        echo json_encode($result);
        exit;
    } else {
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'TrekID' => $trekid,
            'DepartureID' => $departureid,            
            'AddedBy' => $addedby,
            'Value' => $value,   
            'LeaderID' => $leaderid             
        ));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Action success';
        echo json_encode($result);
        exit;
    }
}
    //Add leader rating
if ($_POST['action'] == 'addTrekLeaderRating') {
    $leaderid = $_POST['leaderid'];
    $noofbatch = $_POST['noofbatch'];
    $noofdays = $_POST['noofdays'];
    $rating = $_POST['rating'];
    $Added_By = $_POST['Added_By'];
    $ptbd_table_name = $wpdb->prefix . 'trektable_leaderrating';
    
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'LeaderID' => $leaderid,
            'NoOfBatch' => $noofbatch,            
            'NoOfDays' => $noofdays,
            'Value' => $rating,   
            'AddedBy' => $Added_By,            
        ));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Action success';
        echo json_encode($result);
        exit;   
}

//Add cook rating
if ($_POST['action'] == 'addTrekCookRating') {
    $cookid = $_POST['cookid'];
    $noofbatch = $_POST['noofbatch'];
    $noofdays = $_POST['noofdays'];
    $rating = $_POST['rating'];
    $Added_By = $_POST['Added_By'];
    $ptbd_table_name = $wpdb->prefix . 'trektable_cookrating';
    
        $wpdb->insert('' . $ptbd_table_name . '', array(
            'cookid' => $cookid,
            'NoOfBatch' => $noofbatch,            
            'NoOfDays' => $noofdays,
            'Value' => $rating,   
            'AddedBy' => $Added_By,            
        ));
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Action success';
        echo json_encode($result);
        exit;   
}
//Delete Leader rating
if ($_POST['action'] == 'deleteLeaderRating') {
    $con_id = $_POST['con_id'];
    $ptbd_table_name = $wpdb->prefix . 'trektable_leaderrating';
    $query = "select count(id) from " . $ptbd_table_name . " where ID=" . $con_id . "";
    $result = $wpdb->get_results($query);
    if (count($result) == 1) {     
            $wpdb->update('' . $ptbd_table_name . '', array(
                'Status' => 1), array('ID' => $con_id));
    
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Action success';

        echo json_encode($result);
        exit;
    } else {
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'failed';
        $result->result = 'fail';
        $result->info = 'id not acceptable';
        echo json_encode($result);
        exit;
    }
}

//Delete Cook rating
if ($_POST['action'] == 'deleteCookRating') {
    $con_id = $_POST['con_id'];
    $ptbd_table_name = $wpdb->prefix . 'trektable_cookrating';
    $query = "select count(id) from " . $ptbd_table_name . " where ID=" . $con_id . "";
    $result = $wpdb->get_results($query);
    if (count($result) == 1) {
        $wpdb->update('' . $ptbd_table_name . '', array(
            'Status' => 1), array('ID' => $con_id));

        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->result = 'reload';
        $result->info = 'Action success';

        echo json_encode($result);
        exit;
    } else {
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'failed';
        $result->result = 'fail';
        $result->info = 'id not acceptable';
        echo json_encode($result);
        exit;
    }
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