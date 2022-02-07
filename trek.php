<?php

/**
 *@package TrekPlugin
 */
/*
 *Plugin Name: Treks
 *Description: Manage TTH functionalities
 *Author: Claruz
version: 1.0.0
 */
defined('ABSPATH') or die('Hei, Access restricted!');

$user_ID = get_current_user_id();
require_once plugin_dir_path(__FILE__) . 'api/settings.php';
class trekPlugin
{

    public $pluginInfo;
    public $settings;
    public function __construct()
    {

        $this->pluginInfo = plugin_basename(__FILE__);
        $this->settings = new settingsApi();
    }
    public function activate()
    {
        global $wpdb, $table_prefix;
        $ptbd_table_name = $wpdb->prefix . 'trektable_addtrekdetails';
        $ptbd_table_name1 = $wpdb->prefix . 'trektable_flags';
        $ptbd_table_name2 = $wpdb->prefix . 'trektable_policy';
        $ptbd_table_name3 = $wpdb->prefix . 'trektable_grade';
        $ptbd_table_name4 = $wpdb->prefix . 'trektable_bookings';
        $ptbd_table_name5 = $wpdb->prefix . 'trektable_userdetails';
        $ptbd_table_name6 = $wpdb->prefix . 'trektable_trekkers_list';
        $ptbd_table_name7 = $wpdb->prefix . 'trektable_trek_departure';
        $ptbd_table_name8 = $wpdb->prefix . 'trektable_trek_riskandrespond';
        $ptbd_table_name9 = $wpdb->prefix . 'trektable_pickup_reach';
        $ptbd_table_name10 = $wpdb->prefix . 'trektable_itinerary';
        $ptbd_table_name11 = $wpdb->prefix . 'trektable_participation_policy';
        $ptbd_table_name12 = $wpdb->prefix . 'trektable_fitness_policy';
        $ptbd_table_name13 = $wpdb->prefix . 'trektable_coupons_new';
        $ptbd_table_name14 = $wpdb->prefix . 'trektable_trek_essential';
        $ptbd_table_name15 = $wpdb->prefix . 'trektable_events';
        $ptbd_table_name16 = $wpdb->prefix . 'trektable_vendors';
        $ptbd_table_name17 = $wpdb->prefix . 'trektable_maintainance_block';
        $ptbd_table_name18 = $wpdb->prefix . 'trek_pages_tth_contacts';
        $ptbd_table_name19 = $wpdb->prefix . 'trek_pages_tth_team';
        $ptbd_table_name20 = $wpdb->prefix . 'trek_pages_tth_video_review';
        $ptbd_table_name21 = $wpdb->prefix . 'trek_pages_tth_gallery';
        $ptbd_table_name22 = $wpdb->prefix . 'trek_pages_tth_news';
        $ptbd_table_name23 = $wpdb->prefix . 'trek_pages_tth_awards';
        $ptbd_table_name24 = $wpdb->prefix . 'trek_user_customization';
        $ptbd_table_name25 = $wpdb->prefix . 'trek_user_sugget_trek';
        $ptbd_table_name26 = $wpdb->prefix . 'trektable_season';
        $ptbd_table_name27 = $wpdb->prefix . 'trektable_contacts';
        $ptbd_table_name28 = $wpdb->prefix . 'trektable_important_links';
        $ptbd_table_name29 = $wpdb->prefix . 'trektable_top_picks';
        $ptbd_table_name30 = $wpdb->prefix . 'trek_contact_us';
        $ptbd_table_name31 = $wpdb->prefix . 'trek_filter_interests';
        $ptbd_table_name32 = $wpdb->prefix . 'trektable_trek_brochure';
        $ptbd_table_name33 = $wpdb->prefix . 'trektable_coupon_usage';
        $ptbd_table_name34 = $wpdb->prefix . 'trektable_context';
        $ptbd_table_name35 = $wpdb->prefix . 'tth_why';
        $ptbd_table_name36 = $wpdb->prefix . 'tth_volunteer_program';
        $ptbd_table_name37 = $wpdb->prefix . 'tth_trek_faq';
        $ptbd_table_name38 = $wpdb->prefix . 'tth_trek_why_tth_new';
        $ptbd_table_name39 = $wpdb->prefix . 'trektable_theme';
        $ptbd_table_name40 = $wpdb->prefix . 'trek_tth_graph';
        $ptbd_table_name41 = $wpdb->prefix . 'trektable_cooks';
        $ptbd_table_name42 = $wpdb->prefix . 'trektable_leaders';
        $ptbd_table_name43 = $wpdb->prefix . 'trektable_trekkers_remarks';
        $ptbd_table_name44 = $wpdb->prefix . 'trektable_trekker_status_log';
        $ptbd_table_name45 = $wpdb->prefix . 'trektable_cookrating';
        $ptbd_table_name46 = $wpdb->prefix . 'trektable_leaderrating';
        
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_name text NOT NULL,
				    trek_cost text,
				    trek_service_tax text,
				    trek_region_country varchar(255),
				    trek_region_state varchar(255),
				    trek_assigned_to varchar(255),
                    trek_cook int,
				    trek_leader int,
				    trek_season json not null,
				    trek_days varchar(255),
				    trek_grade varchar(255),
				    trek_altitude varchar(255),
				    trek_distance varchar(255),
				    trek_trail_type text,
				    trek_best_months text,
				    trek_pickup_place1 text,
				    trek_ins_policy_status text,
				    trek_participation_policy text,
				    trek_fitness_policy text,
				    trek_drop_place text,
				    trek_transportation text,
				    trek_selected_flags text,
				    trek_profile_image text,
				    trek_gallary_image text,
				    trek_slider_image text,
				    video_gallery_urls text,
				    trek_map_tmp_image text,
				    trek_rail_head text,
				    trek_airport text,
				    trek_base_camp text,
				    trek_snow text,
				    trek_stay text,
				    trek_service_from text,
				    trek_food text,
				    trek_overview text,
				    trek_about_trek text,
				    trek_brief_itinerary text,
				    trek_detailed_itinerary text,
				    trek_how_reach_pp text,
				    trek_how_reach_note text,
				    trek_how_reach_dp text,
				    trek_cost_terms_inclusion text,
				    trek_cost_terms_exclusion text,
				    trek_cost_terms_note text,
				    trek_cost_terms_tour_fee text,
				    trek_cost_terms_cancellation text,
				    trek_cancellation_policies text,
				    trek_discount_percentage varchar(255),
				    trek_discount_end_date text,
				    trek_essential text,
				    trek_map text,
				    trek_suitable text,
				    trek_experience text,
				    trek_fitness text,
				    trek_video_about_url text,
				    trek_faq text,
                    trek_itinerary_start text,
                    trek_itinerary_end text,
				    trek_risk_respond text,
				    trek_start_date date,
				    trek_end_date date,
				    top_pick int default 1,
				    trek_total_seats varchar(255),
				    trek_filter_location varchar(255),
				    trek_filter_season varchar(255),
				    trek_filter_theme json,
				    trek_filter_interests text,
				    trek_filter_from text,
				    trek_filter_to text,
				    trek_publish_status INT DEFAULT 1,
                    trek_vendor_assign_status INT DEFAULT 1,
				    trek_adddetails_status INT DEFAULT 0,
				    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name1 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_flag_name text NOT NULL,
				    trek_flag_status INT DEFAULT 0,
				    trek_flag_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name2 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_policy_name text NOT NULL,
				    trek_policy_description text,
				    trek_policy_status INT DEFAULT 0,
				    trek_policy_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name3 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_grade text NOT NULL,
				    trek_grade_status INT DEFAULT 0,
				    trek_grade_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name4 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_selected_trek_id varchar(255) NOT NULL,
				    trek_selected_departure_id varchar(255),
				    trek_booking_id varchar(255) NOT NULL,
				    trek_booking_owner_id varchar(255) NOT NULL,
				    trek_trems_condition varchar(255),
				    trek_insurance varchar(255),
				    fname varchar(255),
				    lname varchar(255),
				    phone_number varchar(255),
				    email varchar(255),
				    emergency_phone_number varchar(255),
				    date_of_birth varchar(255),
				    height varchar(255),
				    weight varchar(255),
				    user_gender varchar(255),
				    user_contry varchar(255),
				    user_state varchar(255),
				    user_city varchar(255),
				    number_of_participants int,
				    token_amount varchar(255),
				    trek_category varchar(255),
				    trek_note text,
				    booking_note text,
				    trek_booking_status INT DEFAULT 0,
				    book_activity_status INT DEFAULT 0,
				    trek_booking_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name5 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_user_first_name text NOT NULL,
				    trek_user_last_name text,
				    trek_user_contact_number varchar(255),
				    trek_user_email text,
				    trek_user_gender varchar(255),
				    trek_user_emergency_number varchar(255),
				    trek_user_dob varchar(255),
				    trek_user_id varchar(255),
				    trek_user_weight varchar(255),
				    trek_user_height varchar(255),
				    trek_user_country text,
				    trek_user_state text,
				    trek_user_city text,
				    referenceId text,
				    trek_user_how_find varchar(255),
				    trek_user_trekked_with_us varchar(255),
				    trek_user_status INT DEFAULT 0,
				    trek_otp varchar(45),
				    last_password_changed timestamp,
				    trek_user_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name6 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_tbooking_id text NOT NULL,
				    trekker_token varchar(45),
				    trek_uid varchar(45),
				    trek_tfname text,
				    trek_tlname text,
				    trek_selected_trek INT,
				    trek_selected_date INT,
				    owner_reference varchar(45) NOT NULL,
				    trek_tcity text,
				    trek_tstate text,
				    trek_tcountry text,
				    trek_identity text,
				    trek_tcontact_number varchar(45),
				    trek_tcontact_emg_number varchar(45),
				    trek_tgender varchar(255),
				    trek_dob varchar(255),
				    trek_tweight varchar(255),
				    trek_theight varchar(255),
				    trek_trole varchar(255),
				    payment_status varchar(45) DEFAULT 'unpaid',
				    payment_id varchar(255),
				    order_id varchar(255),
				    trek_trekker_status INT DEFAULT 0,
				    trek_trekker_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name7 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_selected_trek varchar(255) NOT NULL,
				    trek_start_date DATE,
				    trek_end_date DATE,
				    trek_seats varchar(255),
				    trek_section varchar(255),
                    dep_event varchar(255),
                    dep_event_name text,
				    trek_departure_status INT DEFAULT 0,
				    trek_departure_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name8 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_risk_name text,
				    trek_risk_content text NOT NULL, trek_risk_status INT DEFAULT 0,
				    trek_risk_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name9 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_pickup_place text NOT NULL,
				    trek_pickup_how_reach_air text,
				    trek_pickup_how_reach_train text,
				    trek_pickup_how_reach_bus text,
				    trek_pick_up_state varchar(255),
				    trek_pickup_status INT DEFAULT 0,
				    trek_pickup_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name10 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_id INT NOT NULL,
				    itinerary_day INT,
				    itinerary_head text,
				    brief text,
				    detailed text,
				    trek_itinerary_status INT DEFAULT 0,
				    updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name11 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_participation_policy_name text NOT NULL,
				    trek_participation_policy_description text,
				    trek_participation_policy_status INT DEFAULT 0,
				    trek_participation_policy_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name12 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_fitness_policy_name text NOT NULL,
				    trek_fitness_policy_description text,
				    trek_fitness_policy_status INT DEFAULT 0,
				    trek_fitness_policy_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name13 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    coupon_name text NOT NULL,
				    coupon_code text NOT NULL,
				    coupon_amount varchar(45) NOT NULL,
				    coupon_image TEXT NULL,
				    coupon_type varchar(45),
				    coupon_description TEXT NULL,
				    coupon_terms TEXT NULL,
				    coupon_merge VARCHAR(45) NULL,
				    coupon_expiry DATE NOT NULL,
				    coupon_region_type VARCHAR(45) NULL,
				    coupon_trek_type VARCHAR(45) NULL,
				    coupon_inc_region TEXT NULL,
				    coupon_inc_trek TEXT NULL,
				    coupon_transfer_type varchar(45),
				    coupon_display_category VARCHAR(45) NULL,
				    coupon_web_usage VARCHAR(45) NULL,
				    coupon_ind_usage VARCHAR(45) NULL,
				    coupon_ind_email VARCHAR(45) NULL,
				    coupon_updated_time TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name14 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_essential_name text NOT NULL,
                    trek_essential_bg text,
                    trek_essential_cloth text,
                    trek_essential_pu text,
                    trek_essential_hg text,
                    trek_essential_fg text,
                    trek_essential_status INT DEFAULT 0,
                    trek_essential_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name15 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_event text NOT NULL,
                    trek_event_status INT DEFAULT 0,
                    trek_event_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name16 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_id varchar(255) NOT NULL,
                    vendor_id varchar(255) NOT NULL,
                    vendor_name TEXT,
                    trek_name TEXT,
                    trek_vendor_status INT DEFAULT 2,
                    trek_vendor_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name17 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_id varchar(255) NOT NULL,
                    trek_departure_id varchar(255) NOT NULL,
                    trek_started_on DATE,
                    trek_ended_on DATE,
                    trek_duration int,
                    total_allotted int,
                    product_id varchar(255) NOT NULL,
                    verified_count int,
                    verified_status int default 1,
                    recieved_status int default 1,
                    reverted_back int default 1,
                    active_status int default 1,
                    trek_maintainance_status INT DEFAULT 0,
                    trek_maintainance_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        //default status 1 indicate value set as false & 0 indicates value set as true
        $result = $wpdb->get_results($query);

        //admin pages


        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name18 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_tth_mail varchar(255) NOT NULL,
                    trek_tth_c1 varchar(255) NOT NULL,
                    trek_tth_c2 varchar(255) NOT NULL,
                    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        //default status 1 indicate value set as false & 0 indicates value set as true
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name19 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_tth_name varchar(255) NOT NULL,
                    trek_tth_short_description TEXT,
                    trek_tth_long_description TEXT,
                    trek_tth_images TEXT NOT NULL,
                    trek_tth_role TEXT NOT NULL,
                    trek_tth_advisor_category TEXT,
                    trek_tth_role_priority int NOT NULL,
                    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        //default status 1 indicate value set as false & 0 indicates value set as true
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name20 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_tth_name varchar(255) NOT NULL,
                    trek_tth_title varchar(255),
                    trek_tth_year varchar(255) NOT NULL,
                    trek_tth_video_poster text NOT NULL,
                    trek_tth_video_url text NOT NULL,
                    assigned_trek varchar(45) NOT NULL,
                    trek_tth_video_priority int NOT NULL,                   
                    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        //default status 1 indicate value set as false & 0 indicates value set as true
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name21 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_tth_title varchar(255),
                    trek_tth_trek varchar(255) NOT NULL,
                    trek_tth_image text NOT NULL,
                    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        //default status 1 indicate value set as false & 0 indicates value set as true
        $result = $wpdb->get_results($query);

        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name22 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_tth_title varchar(255),
                    trek_tth_sub text NOT NULL,
                    trek_tth_category varchar(255) NOT NULL,
                    trek_tth_content text NOT NULL,
                    trek_tth_news_poster text NOT NULL,
                    trek_tth_news_priority int NOT NULL,
                    tth_know_more text not null,                   
                    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        //default status 1 indicate value set as false & 0 indicates value set as true
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name23 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_tth_title varchar(255),
                    trek_tth_brief text,
                    trek_tth_award_image text NOT NULL,
                    trek_tth_award_priority int NOT NULL,
                    trek_tth_role varchar(255) NOT NULL,                      
                    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        //default status 1 indicate value set as false & 0 indicates value set as true
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name24 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_tth_fname varchar(255) NOT NULL,
                    trek_tth_lname varchar(255) NOT NULL,
                    trek_tth_phone varchar(255) NOT NULL,
                    trek_tth_email varchar(255) NOT NULL,
                    trek_tth_location text NOT NULL,
                    trek_tth_city_travelling text NOT NULL,
                    trek_tth_participants varchar(255) NOT NULL,
                    trek_tth_duration varchar(255) NOT NULL,
                    trek_tth_budget varchar(255) NOT NULL,
                    trek_tth_age varchar(255) NOT NULL,
                    trek_tth_package varchar(255) NOT NULL,
                    trek_tth_extra_details text NOT NULL,
                    trek_tth_status int NOT NULL default 0,
                    trek_info_read_status INT default 1,     
                    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        //default status 1 indicate value set as false & 0 indicates value set as true
        $result = $wpdb->get_results($query);


        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name25 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    step_radio varchar(255) NOT NULL,
                    highest_altitude text NOT NULL,
                    walked_on_snow text NOT NULL,
                    interested_in text NOT NULL,
                    trekkers text ,
                    preferred_time text NOT NULL,
                    must_have_points text NOT NULL,
                    fitness_level text NOT NULL,
                    looking_for text NOT NULL,
                    duration varchar(255) NOT NULL,
                    extra text NOT NULL,
                    full_name varchar(255) NOT NULL,
                    email varchar(255) NOT NULL,
                    location text NOT NULL,     
                    participants text NOT NULL,
                    service_required text NOT NULL,
                    phone_number varchar(255) NOT NULL,
                    city_traveling text NOT NULL,
                    trip_duration varchar(255) NOT NULL,
                    budget varchar(255) NOT NULL ,
                    participants_age varchar(255) NOT NULL,
                    trek_tth_status int NOT NULL default 0,
                    trek_info_read_status INT default 1,  
                    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";


        //default status 1 indicate value set as false & 0 indicates value set as true
        $result = $wpdb->get_results($query);
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name26 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    trek_season text NOT NULL,
				    trek_season_status INT DEFAULT 0,
				    trek_season_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $result = $wpdb->get_results($query);
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name27 . " (
				    id INT AUTO_INCREMENT PRIMARY KEY,
				    contact_name text NOT NULL,
				    contact_role varchar(255),
				    contact_num1 varchar(255),
				    contact_num2 varchar(255),
				    contact_email varchar(255),
				    contact_treks text,
				    trek_season_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
				)ENGINE=INNODB";
        $result = $wpdb->get_results($query);
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name41 . " (
            id INT AUTO_INCREMENT PRIMARY KEY,
            cook_name text NOT NULL,
            cook_role varchar(255),
            cook_num1 varchar(255),
            cook_num2 varchar(255),
            cook_email varchar(255),
            cook_treks text,
            trek_season_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB";
         $result = $wpdb->get_results($query);
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name42 . " (
            id INT AUTO_INCREMENT PRIMARY KEY,
            leader_name text NOT NULL,
            leader_role varchar(255),
            leader_num1 varchar(255),
            leader_num2 varchar(255),
            leader_email varchar(255),
            leader_treks text,
            trek_season_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB";
         $result = $wpdb->get_results($query);
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name28 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    trek varchar(255) NOT NULL,
		    link_text text,
		    link text,
		    link_category varchar(255),
		    trek_link_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name29 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    trek_id varchar(45) NOT NULL,
		    top_status int default 0,
		    trek_link_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name30 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    username varchar(45) NOT NULL,
		    user_mail varchar(255) NOT NULL,
		    subject text NOT NULL,
		    message text NOT NULL,
		    status varchar(45) NOT NULL default 0,
		    updated_on timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);



        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name31 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    interest varchar(255) NOT NULL,
		    updated_on timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);


        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name32 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    trek_brochure_name text,
		    trek_brochure_content text NOT NULL,
		    is_activated INT NOT NULL default 0,
		    trek_brochure_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name33 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    trek_coupon_code text,
		    trek_coupon_user text NOT NULL,
		    trek_coupon_trek text NOT NULL,
		    trek_coupon_deducted_amount varchar(45) default 0,
		    trek_coupon_booking_id text NOT NULL,
		    trek_coupon_type varchar(45),
		    trek_coupon_trasfered_type varchar(45),
		    trek_coupon_merge_type varchar(45),
		    trek_coupon_redeem_status INT NOT NULL default 1,
		    trek_coupon_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name34 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    trek_author int,
		    trek_content text,
		    trek_context text,
		    trek_context_status int default 0,
		    trek_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);
        // used for storing dynamic data of know us better & home page slider sections
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name35 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    tth_why_short_desc text,
		    tth_why_caption text,
		    tth_why_imgs text,
		    tth_why_status int default 0,
		    tth_front_page_action varchar(45) NOT NULL,
		    last_update timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name36 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    first_name  varchar(55) NOT NULL,
		    last_name  varchar(55) NOT NULL,
		    mail  varchar(255) NOT NULL,
		    phone  varchar(255) NOT NULL,
		    address text,
		    dob  varchar(255) NOT NULL,
		    country text,
		    gender  varchar(255) NOT NULL,
		    pref_date  varchar(255) NOT NULL,
		    trek_duration  varchar(255) NOT NULL,
		    social text,
		    how_did_hear_us text,
		    object_for_join text,
		    concerns text,
		    resume text,
		    status int default 0,
		    last_update timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);


        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name37 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    trek varchar(255) NOT NULL,
		    question text,
		    content text,
		    trek_link_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";
        $result = $wpdb->get_results($query);


        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name38 . " (
		    id INT AUTO_INCREMENT PRIMARY KEY,
		    descData text NOT NULL,
		    textData text NOT NULL,
		    imgs text NOT NULL,
		    typeData varchar(45) NOT NULL,
		    lastupdate timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";

        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name39 . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    trek_theme text NOT NULL,
                    trek_theme_status INT DEFAULT 0,
                    trek_theme_updated_time timestamp DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB";
        $result = $wpdb->get_results($query);


        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name40 . " (
		    id INT  AUTO_INCREMENT PRIMARY KEY,
            trek_id text NOT NULL,
            img_src_url text NOT NULL,
            lastupdate timestamp DEFAULT CURRENT_TIMESTAMP
		)ENGINE=INNODB";

        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name43 . " (
		    ID bigint(20) AUTO_INCREMENT PRIMARY KEY,
            Trekker_ID varchar(50) NOT NULL,
            OffLoad tinyint(1) DEFAULT 0,
            Transport tinyint(1) DEFAULT 0,
            Comments text NOT NULL,
            Added_Date timestamp DEFAULT CURRENT_TIMESTAMP,
            Added_By int(11) NOT NULL,
            Status 	tinyint(4) DEFAULT 0
		)ENGINE=INNODB";

        $result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name44 . " (
		    ID bigint(20) AUTO_INCREMENT PRIMARY KEY,
            Trekker_ID varchar(50) NOT NULL,
            Status tinyint(4) NOT NULL,
            AddedDate timestamp DEFAULT CURRENT_TIMESTAMP,
            Added_By bigint(20)	 NOT NULL
		)ENGINE=INNODB";

		$result = $wpdb->get_results($query);
        
        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name45 . " (
		    ID bigint(20) AUTO_INCREMENT PRIMARY KEY,
            TrekID INT NOT NULL,
            DepartureID bigint(20) NOT NULL,
            Value INT NOT NULL,
            AddedDate timestamp DEFAULT CURRENT_TIMESTAMP,
            AddedBy bigint(20)	 NOT NULL
		)ENGINE=INNODB";

		$result = $wpdb->get_results($query);

        $query = "CREATE TABLE IF NOT EXISTS " . $ptbd_table_name46 . " (
		    ID bigint(20) AUTO_INCREMENT PRIMARY KEY,
            TrekID INT NOT NULL,
            DepartureID bigint(20) NOT NULL,
            Value INT NOT NULL,
            AddedDate timestamp DEFAULT CURRENT_TIMESTAMP,
            AddedBy bigint(20)	 NOT NULL
		)ENGINE=INNODB";

		$result = $wpdb->get_results($query);

        $queryIns = "INSERT INTO `wp_trek_filter_interests` VALUES (1,'mountaineering','2021-09-30 05:12:14'),(2,'trekking','2021-09-30 05:12:14'),(3,'rafting','2021-09-30 05:12:14'),(4,'multi-sport','2021-09-30 05:12:14'),(5,'cycling','2021-09-30 05:12:14'),(6,'pilgrimage','2021-09-30 05:12:14')";
        $result = $wpdb->get_results($queryIns);

        $queryIns1 = "INSERT INTO `wp_trektable_context` VALUES (1,'1','New route to Chandrashila Trek','trek-news-heading','0','2021-09-30 05:12:14'),
(2,'1','New route to Chandrashila Trek','trek-info-heading','0','2021-09-30 05:12:14')";
        $result = $wpdb->get_results($queryIns1);
    }



    public function deactivate()
    {
    }
    public function uninstall()
    {
    }
    public function startup()
    {
    	global $wpdb, $table_prefix;
        $messageCount = $wpdb->get_results('SELECT count(status) AS res  FROM ' . $table_prefix . 'trek_contact_us WHERE status=0')[0];
        if(!empty($messageCount)) $messageCount = $messageCount->res;
        $suggestCount = $wpdb->get_results('SELECT count(trek_info_read_status) AS res  FROM ' . $table_prefix . 'trek_user_sugget_trek where trek_tth_status="1" AND trek_info_read_status=0')[0];
        if(!empty($suggestCount)) $suggestCount = $suggestCount->res;
        $customizeCount = $wpdb->get_results('SELECT count(trek_info_read_status) AS res  FROM ' . $table_prefix . 'trek_user_customization where trek_tth_status="1" AND trek_info_read_status=0')[0];
        if(!empty($customizeCount)) $customizeCount = $customizeCount->res;
        $pages = array(

            array(
                'page_title' => 'Treks',
                'menu_title' => 'Treks',
                'capability' => 'tth_treks',
                'menu_slug' => 'treks_plugin',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/all_treks.php';
                },
                'icon_url' => 'dashicons-location-alt',
                'position' => 9,
            ),
            array(
                'page_title' => 'Booking',
                'menu_title' => 'Booking',
                'capability' => 'tth_booking',
                'menu_slug' => 'trek_booking',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_departure.php';
                },
                'icon_url' => 'dashicons-tag',
                'position' => 9,
            ),

            array(
                'page_title' => 'Coupons',
                'menu_title' => 'Coupons',
                'capability' => 'tth_coupons',
                'menu_slug' => 'trek_coupon',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_coupon.php';
                },
                'icon_url' => 'dashicons-awards',
                'position' => 9,
            ),
            array(
                'page_title' => 'TTH - Shop',
                'menu_title' => 'TTH - Shop',
                'capability' => 'tth_shop',
                'menu_slug' => 'tth_shop_summary',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/manage_vendors_summary.php';
                },
                'icon_url' => 'dashicons-cart',
                'position' => 9,
            ),
            array(
                'page_title' => 'Home',
                'menu_title' => 'Home',
                'capability' => 'tth_home',
                'menu_slug' => 'treks_home',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_home.php';
                },
                'icon_url' => 'dashicons-admin-home',
                'position' => 7,
            ),
            array(
                'page_title' => 'TTH-Pages',
                'menu_title' => 'TTH-Pages',
                'capability' => 'tth_pages',
                'menu_slug' => 'treks_tth_pages',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/tth-pages/tth_pages_home.php';
                },
                'icon_url' => 'dashicons-admin-page',
                'position' => 8,
            ),
        );
        $this->subpages = array(
            array(
                'parent_slug' => 'tth_shop_summary',
                'page_title' => 'Manage Vendors',
                'menu_title' => 'Manage Vendors',
                'capability' => 'tth_manage_vendors',
                'menu_slug' => 'manage_vendors',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/manage_vendors.php';
                },

            ),
            array(
                'parent_slug' => 'tth_shop_summary',
                'page_title' => 'Maintenance Block',
                'menu_title' => 'Maintenance Block',
                'capability' => 'tth_maintenance_block',
                'menu_slug' => 'maintenanceblock',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/maintainanceblock.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'manage maintenanceblock',
                'menu_title' => 'manage maintenanceblock',
                'capability' => 'manage_options',
                'menu_slug' => 'manage_maintenanceblock',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/manage_maintenanceblock.php';
                },

            ),
            array(
                'parent_slug' => 'treks_plugin',
                'page_title' => 'Add Trek',
                'menu_title' => 'Add Trek',
                'capability' => 'tth_trek_add',
                'menu_slug' => 'add_treks_plugin',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/add_trek.php';
                },

            ),
            array(
                'parent_slug' => 'trek_coupon',
                'page_title' => 'Edit Coupon',
                'menu_title' => 'Manage Coupon',
                'capability' => 'tth_edit_coupon',
                'menu_slug' => 'edit_treks_coupon',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/edit_trek_coupon.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'edit Trek',
                'menu_title' => 'edit Trek',
                'capability' => 'tth_edit_treks',
                'menu_slug' => 'edit_treks_plugin',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/edit_trek.php';
                },

            ),

            // array(
            //     'parent_slug' => 'treks_plugin',
            //     'page_title' => 'Trek Flags',
            //     'menu_title' => 'Trek Flags',
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'treks_flags_plugin',
            //     'callback' => function () {require_once plugin_dir_path(__FILE__) . 'template/admin/trek_flag.php';},

            // ),
            array(
                'parent_slug' => 'treks_plugin',
                'page_title' => 'Pickup/Drop Place',
                'menu_title' => 'Pickup/Drop Place',
                'capability' => 'tth_pickup_drop_place',
                'menu_slug' => 'trek_pickup_drop',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_pickup.php';
                },

            ),
            array(
                'parent_slug' => 'treks_plugin',
                'page_title' => 'Trek Itinerary ',
                'menu_title' => 'Trek Itinerary ',
                'capability' => 'tth_trek_itinerary',
                'menu_slug' => 'trek_itinerary',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_itinerary.php';
                },

            ),
            array(
                'parent_slug' => 'treks_plugin',
                'page_title' => 'Risk & Respond',
                'menu_title' => 'Risk & Respond',
                'capability' => 'tth_risk_respond',
                'menu_slug' => 'trek_risk_respond',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_risk_respond.php';
                },

            ),
            array(
                'parent_slug' => 'treks_plugin',
                'page_title' => 'Trek graph',
                'menu_title' => 'Trek graph',
                'capability' => 'tth_trek_graph',
                'menu_slug' => 'trek_manage_graph',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_graph.php';
                },

            ),
            array(
                'parent_slug' => 'treks_plugin',
                'page_title' => 'Trek Essentials',
                'menu_title' => 'Trek Essentials',
                'capability' => 'tth_trek_essentials',
                'menu_slug' => 'trek_essentials_templates',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_essential.php';
                },

            ),
            array(
                'parent_slug' => 'treks_plugin',
                'page_title' => 'Participation Policy',
                'menu_title' => 'Participation Policy',
                'capability' => 'tth_participation_policy',
                'menu_slug' => 'trek_participation',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_participation.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Top Picks',
                'menu_title' => 'Top Picks',
                'capability' => 'tth_top_picks',
                'menu_slug' => 'trek_tth_top_picks',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/top_picks.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Messages',
                'menu_title' => 'Messages'.(($messageCount>0)? '<span class="awaiting-mod">'.$messageCount.'</span>' : null),
                'capability' => 'tth_messages',
                'menu_slug' => 'trek_tth_messages',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/message.php';
                },

            ),


            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Profile',
                'menu_title' => 'Profile',
                'capability' => 'tth_profile',
                'menu_slug' => 'trek_tth_profile',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_profile.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'News',
                'menu_title' => 'News',
                'capability' => 'tth_news',
                'menu_slug' => 'trek_tth_news',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_news.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'People',
                'menu_title' => 'People',
                'capability' => 'tth_people',
                'menu_slug' => 'trek_tth_people',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_people.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Video Reviews',
                'menu_title' => 'Video Reviews',
                'capability' => 'tth_video_reviews',
                'menu_slug' => 'trek_tth_video_reviews',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_video_reviews.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Know Us Better',
                'menu_title' => 'Know Us Better',
                'capability' => 'tth_know_us_better',
                'menu_slug' => 'trek_tth_know_us_better',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_know_us_better.php';
                },

            ),

            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Home Slider',
                'menu_title' => 'Home Slider',
                'capability' => 'tth_home_slider',
                'menu_slug' => 'trek_tth_home_slider',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/tth_home_page_slider.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Why TTH',
                'menu_title' => 'Why TTH',
                'capability' => 'tth_why_tth',
                'menu_slug' => 'trek_tth_why_tth_new',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_y_tth_new.php';
                },

            ),

            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Important Links',
                'menu_title' => 'Important Links',
                'capability' => 'tth_important_links',
                'menu_slug' => 'trek_tth_important_links',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/imp_links_home.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'Important Links Details',
                'menu_title' => 'Important Links Details',
                'capability' => 'manage_options',
                'menu_slug' => 'manage_important_links',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/imp_links_inner.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Brochure',
                'menu_title' => 'Brochure',
                'capability' => 'tth_brochure',
                'menu_slug' => 'trek_tth_brochure',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/brochure.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Contacts',
                'menu_title' => 'Contacts',
                'capability' => 'tth_contacts',
                'menu_slug' => 'trek_tth_our_contacts',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_contacts.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Trek Cooks',
                'menu_title' => 'Trek Cooks',
                'capability' => 'tth_trek_cooks',
                'menu_slug' => 'trek_tth_trek_cooks',
                'callback' => function () {require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_cooks.php';},

            ),
             array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Trek Cooks Rating',
                'menu_title' => 'Trek Cooks Rating',
                'capability' => 'tth_cooks_rating',
                'menu_slug' => 'trek_cooks_rating',
                'callback' => function () {require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_cooks_rating.php';},

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Trek Leaders',
                'menu_title' => 'Trek Leaders',
                'capability' => 'tth_trek_leaders',
                'menu_slug' => 'trek_tth_trek_leaders',
                'callback' => function () {require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_leaders.php';},

            ),
             array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Trek Leaders Rating',
                'menu_title' => 'Trek Leaders Rating',
                'capability' => 'tth_leaders_rating',
                'menu_slug' => 'trek_leaders_rating',
                'callback' => function () {require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_leaders_rating.php';},

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'FAQ',
                'menu_title' => 'FAQ',
                'capability' => 'tth_faq',
                'menu_slug' => 'trek_tth_faq',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_faq.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'FAQ',
                'menu_title' => 'FAQ',
                'capability' => 'manage_options',
                'menu_slug' => 'trek_tth_faq_inner',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_inner.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Volunteer Program',
                'menu_title' => 'Volunteer Program',
                'capability' => 'tth_volunteer_program',
                'menu_slug' => 'trek_tth_volunteer_program',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_volunteer_program.php';
                },

            ),
            array(
                'parent_slug' => 'treks_home',
                'page_title' => 'Awards',
                'menu_title' => 'Awards',
                'capability' => 'tth_awards',
                'menu_slug' => 'trek_tth_awards',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/trek_tth_awards.php';
                },

            ),
            array(
                'parent_slug' => 'treks_plugin',
                'page_title' => 'Fitness Policy',
                'menu_title' => 'Fitness Policy',
                'capability' => 'tth_fitness',
                'menu_slug' => 'trek_fitness',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_fitness.php';
                },

            ),

            array(
                'parent_slug' => 'treks_plugin',
                'page_title' => 'Cancellation Policies',
                'menu_title' => 'Cancellation Policies',
                'capability' => 'tth_cancellation_Policies',
                'menu_slug' => 'trek_cancellation_Policies',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/cancellation.php';
                },

            ),
            array(
                'parent_slug' => 'trek_booking',
                'page_title' => 'Booking Section',
                'menu_title' => 'Trek Departure',
                'capability' => 'trek_bookings',
                'menu_slug' => 'trek_bookings',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/trek_departure.php';
                },

            ),
            array(
                'parent_slug' => 'trek_booking',
                'page_title' => 'Manage Booking',
                'menu_title' => 'Manage Booking',
                'capability' => 'tth_manage_booking',
                'menu_slug' => 'trek_manage_booking',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/manage_booking.php';
                },

            ),
            // array(
            //     'parent_slug' => 'trek_booking',
            //     'page_title' => 'Manage events',
            //     'menu_title' => 'Manage events',
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'trek_manage_events',
            //     'callback' => function () {require_once plugin_dir_path(__FILE__) . 'template/admin/manage_events.php';},

            // ),
            array(
                'parent_slug' => 'treks_tth_pages',
                'page_title' => 'Suggest Trek',
                'menu_title' => 'Suggest Trek'.(($suggestCount>0)? '<span class="awaiting-mod">'.$suggestCount.'</span>' : null),
                'capability' => 'tth_suggest_trek',
                'menu_slug' => 'tth_suggest_trek_page',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/tth-pages/suggest_trek.php';
                },

            ),
            array(
                'parent_slug' => 'treks_tth_pages',
                'page_title' => 'Customize Trek',
                'menu_title' => 'Customize Trek'.(($customizeCount>0)? '<span class="awaiting-mod">'.$customizeCount.'</span>' : null),
                'capability' => 'tth_customize_trek',
                'menu_slug' => 'tth_customize_trek_page',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/tth-pages/customize_trek.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'View Suggest trek details',
                'menu_title' => 'View Suggest trek details',
                'capability' => 'manage_options',
                'menu_slug' => 'view_suggest_trek_details',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/tth-pages/view_suggest_trek_details.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'View Customize trek details',
                'menu_title' => 'View Customize trek details',
                'capability' => 'manage_options',
                'menu_slug' => 'view_customize_trek_details',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/user/tth-pages/view_customize_trek_details.php';
                },

            ),
            //   array(
            //     'parent_slug' => 'treks_tth_pages',
            //     'page_title' => 'Gallery',
            //     'menu_title' => 'Gallery',
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'tth_gallery_page',
            //     'callback' => function () {require_once plugin_dir_path(__FILE__) . 'template/user/tth-pages/gallery.php';},

            // ),
            //    array(
            //     'parent_slug' => 'treks_tth_pages',
            //     'page_title' => 'Discount',
            //     'menu_title' => 'Discount',
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'tth_discount_page',
            //     'callback' => function () {require_once plugin_dir_path(__FILE__) . 'template/user/tth-pages/discount.php';},

            // ),





            array(
                'parent_slug' => null,
                'page_title' => 'Manage Booking details',
                'menu_title' => 'Manage Booking details',
                'capability' => 'manage_options',
                'menu_slug' => 'manage_booking_details',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/manage_booking_details.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'Manage departure',
                'menu_title' => 'Manage departure',
                'capability' => 'manage_options',
                'menu_slug' => 'manage_departure',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/manage_departure.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'Manage coupon',
                'menu_title' => 'Manage coupon',
                'capability' => 'manage_options',
                'menu_slug' => 'manage_coupon',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/manage_coupon.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'Manage cancellation',
                'menu_title' => 'Manage cancellation',
                'capability' => 'manage_options',
                'menu_slug' => 'manage_cancellation',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/cancellation_page.php';
                },

            ),
            array(
                'parent_slug' => null,
                'page_title' => 'Manage trek users',
                'menu_title' => 'Manage trek users',
                'capability' => 'manage_options',
                'menu_slug' => 'manage_trek_users',
                'callback' => function () {
                    require_once plugin_dir_path(__FILE__) . 'template/admin/manage_booking_details_tth.php';
                },

            ),

        );

        $this->settings->addPages($pages)->withSubpage('All Treks')->addSubPages($this->subpages)->register();
        add_filter("plugin_action_links_$this->pluginInfo", array($this, 'settings_link'));
    }
    public function createDefaultTables()
    {
    }

    public function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=treks_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    public function load_admin_assets()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin'));
    }
    public function load_user_assets()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_user'));
    }
    public function enqueue_user()
    {
        wp_enqueue_style('load_admin_assets', plugins_url('/assets/user/css/style.css', __FILE__));
        wp_enqueue_script('my_plugin_script', plugins_url('/assets/user/js/my_plugin.js', __FILE__), array('jquery'));
        wp_enqueue_script('my_plugin_script121', plugins_url('/assets/user/js/plugin-product.js', __FILE__), array('jquery'));
        wp_enqueue_script('my_plugin_script22', plugins_url('/assets/common/sweet.min.js', __FILE__), array('jquery'));
        wp_enqueue_script('my_plugin_script11', plugins_url('/assets/common/toaster.min.js', __FILE__), array('jquery'));
        wp_localize_script('my_plugin_script', 'my_obj', array('ajax_url' => plugins_url('trek/api/user/trek-api-user.php')));

        wp_localize_script('my_plugin_script', 'myobjs', array('ajax_custom_url_pages' => plugins_url('trek/api/user/trek-customization.php')));
        wp_enqueue_style('load_admin_assets1', plugins_url('/assets/common/toaster.min.css', __FILE__));
        // wp_enqueue_style('load_admin_assets121', plugins_url('/assets/common/sweetalert/sweetalert.css', __FILE__));

        wp_localize_script('my_plugin_script', 'my_obj_upl', array('ajax_upload' => plugins_url('trek/template/user/upload.php')));
    }

    public function enqueue_admin()
    {
        wp_enqueue_script('my_plugin_script22', plugins_url('/assets/common/sweet.min.js', __FILE__), array('jquery'));
        wp_enqueue_script('my_plugin_script', plugins_url('/assets/admin/js/admin.js', __FILE__), array('jquery'));
        wp_enqueue_script('my_plugin_script_admin_pages', plugins_url('/assets/admin/js/admin_pages.js', __FILE__), array('jquery'));

        wp_enqueue_script('my_plugin_script11', plugins_url('/assets/common/toaster.min.js', __FILE__), array('jquery'));
        wp_enqueue_script('my_plugin_script12', plugins_url('/assets/admin/js/select2.full.js', __FILE__));
        wp_enqueue_style('load_admin_assets13', plugins_url('/assets/admin/css/select2.min.css', __FILE__));
        wp_enqueue_style('admin_user_page_menus', plugins_url('/assets/admin/css/admin-userpages.css', __FILE__));
        wp_enqueue_script('my_plugin_script1', plugins_url('/assets/admin/ckeditor/ckeditor.js', __FILE__));
        wp_enqueue_script('my_plugin_script2', plugins_url('/assets/admin/ckfinder/ckfinder.js', __FILE__));
        wp_localize_script('my_plugin_script', 'my_obj', array('ajax_url' => plugins_url('trek/api/admin/trek-api-admin.php')));
        wp_localize_script('my_plugin_script', 'my_objs', array('ajax_url_pages' => plugins_url('trek/api/admin/trek-api-pages.php')));
        wp_localize_script('my_plugin_script', 'my_obj_up', array('ajax_upload' => plugins_url('trek/template/admin/upload.php')));
        wp_enqueue_style('load_admin_assets', plugins_url('/assets/admin/css/admin-style.css', __FILE__));
        wp_enqueue_style('load_admin_assets1', plugins_url('/assets/admin/fontawesome/css/all.css', __FILE__));
        wp_enqueue_style('load_admin_assets2', plugins_url('/assets/common/toaster.min.css', __FILE__));
        // wp_enqueue_style( 'load_admin_assets121', plugins_url('/assets/common/sweetalert/sweetalert.css', __FILE__));
        wp_enqueue_script('my_plugin_script_country1', plugins_url('/assets/admin/js/country-states.js', __FILE__), array('jquery'));
    }

    // services amal-form-plugin

    public function contact_form_template()
    {
        global $wpdb, $table_prefix;
        if (isset($_GET['trek'])) {
            $ppc = $_GET['trek'];
            // print_r($ppc);
            $query = "SELECT * FROM wp_trektable_addtrekdetails where id='" . $ppc . "' and trek_adddetails_status=0";
            $results = $wpdb->get_results($query);

            $result = $results[0];
            $query11 = "select id,trek_selected_trek,count(id) as batches,trek_start_date,trek_end_date,dep_event_name from wp_trektable_trek_departure
where trek_departure_status=0 and trek_selected_trek='" . $ppc . "' group by trek_start_date;";
            $results11 = $wpdb->get_results($query11);

            $alldeparturecount = count($results11);

            $flag = $result->trek_selected_flags;
            $query1 = "SELECT trek_flag_name FROM wp_trektable_flags where trek_flag_status=0 and id in (" . $flag . ")";
            $results1 = $wpdb->get_results($query1);
            $count = count($results1);
            $target = '';

            for ($i = 0; $i < $count; $i++) {
                $target .= '<li>' . $results1[$i]->trek_flag_name . '</li>';
            }

            $trek_about = str_replace('&&', '"', '' . $result->trek_about_trek . '');
            $trek_overview = str_replace('&&', '"', $result->trek_overview);
            $trek_brief = str_replace('&&', '"', '' . $result->trek_brief_itinerary . '');
            $trek_how_reach = str_replace('&&', '"', '' . $result->trek_how_reach . '');
            $cancelpolicy = $result->trek_cancellation_policies;
            $str = "policy 1&#&#&1";
            $policy = explode("&#&#&", $cancelpolicy);
            if ($policy[1] != '') {
                $query1 = "SELECT * FROM wp_trektable_policy where id='" . $policy[1] . "' and trek_policy_status=0";
                $resultPolicies = $wpdb->get_results($query1);
                if (empty($resultPolicies)) {
                    $policyinfo = 'failed';
                } else {
                    $resultPolicyName = $resultPolicies[0]->trek_policy_name;
                    $resultPolicyContent = $resultPolicies[0]->trek_policy_description;
                    // print_r($query1);
                }
            } else {
                $policyinfo = 'failed';
            }
            // print_r("heiii ".$trek_overview);
            if ($ppc == '') {
                die('Access restricted!');
            }
        }
        $content = '';
        $content .= '<head><link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/><link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet"/><style>body{background-color:#f9f9fa}.padding{padding:18px}.user-card-full{overflow:auto;width:100%}.card{border-radius:5px;-webkit-box-shadow:0 1px 20px 0 rgba(69, 90, 100, 0.08);box-shadow:0 1px 20px 0 rgba(69,90,100,0.08);border:none;margin-bottom:30px}.m-r-0{margin-right:0px}.m-l-0{margin-left:0px}.user-card-full .user-profile{border-radius:5px 0 0 5px}.bg-c-lite-green{background:-webkit-gradient(linear, left top, right top, from(#F29263), to(#EE5A6F));background:linear-gradient(to right,#EE5A6F,#F29263)}.user-profile{padding:20px 0}.card-block{padding:1.25rem}.m-b-25{margin-bottom:25px}.img-radius{border-radius:5px}h6{font-size:14px}.card .card-block p{line-height:25px}@media only screen and (min-width: 1400px){p{font-size:14px}}.tx{min-height:200px;max-height:200px;overflow:auto}.card-block{padding:1.25rem}.b-b-default{border-bottom:1px solid #E0E0E0}.m-b-20{margin-bottom:20px}.p-b-5{padding-bottom:5px !important}.card .card-block p{line-height:25px}.m-b-10{margin-bottom:10px}.text-muted{color:#000 !important}.b-b-default{border-bottom:1px solid #E0E0E0}.f-w-600{font-weight:700;font-size:16px}.m-b-20{margin-bottom:20px}.m-t-40{margin-top:20px}.p-b-5{padding-bottom:5px !important}.m-b-10{margin-bottom:10px}.m-t-40{margin-top:20px}.user-card-full .social-link li{display:inline-block}.user-card-full .social-link li a{font-size:20px;margin:0 10px 0 0;-webkit-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}.t{color:tomato}a:hover,a:visited,a:link,a:active{text-decoration:none;color:black;font-weight:bold}.Closing{color:#F29263}.Open{color:#89f263}</style> <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script> <script type="text/javascript"></script> </head><body class="snippet-body"><div class="row">';
        $content .= '<div class="col-sm-4" style="background-color:lavender;padding: 15px; max-height: 90vh;min-height: 90vh;overflow: auto;"><div style="background: darkred;text-align: center; color: white;padding: 5px; margin-bottom: 15px;margin-top: 15px;"><b>Fixed Departure</b></div><div style="padding: 5px;"><div>';
        $departureDate = '';
        if ($alldeparturecount == 0) {
            $departureDate = '<center><div>No departure available!</div></center>';
        }
        for ($k = 0; $k < $alldeparturecount; $k++) {
            $trekSeats = '';
            $trekSeatsOccupied = '';
            $trekRemainingSeats = '';
            $trekSeatsPercentage = '';

            $k1 = strtotime($results11[$k]->trek_start_date);
            $l1 = strtotime($results11[$k]->trek_end_date);
            $k2 = date('j M ', $k1);
            $l2 = date('j M Y', $l1);
            // $m2 = $results11[$k]->trek_section;
            $departureDate .= '<li id="' . $results11[$k]->id . '-dep"><a target="_blank"  style="font-size:14px; "href="/trek/index.php/booking-page?trek=' . $result->id . '&departure=' . $results11[$k]->id . '">' . $k2 . ' - ' . $l2 . ' (' . $results11[$k]->dep_event_name . ')';

            $departureDate .= '</a>&nbsp;&nbsp;<span style="margin-right:2px !important;">&nbsp; <a data-toggle="modal" data-target="#myModal2" style="color:blue;"><i class="fas fa-info-circle"  id="' . $results11[$k]->trek_selected_trek . '" style="cursor:pointer;float:right;" data-start="' . $results11[$k]->trek_start_date . '" onclick="changeVisibilitySeatsDeatails(this.id,this)"></i></a></span></li><div class="dep-exp" id="' . $results11[$k]->id . '-dep-exp"><br>Remaining Seats: ' . $trekRemainingSeats . '</div><hr>';
        }
        $departureDate .= '<div class="modal" id="myModal2"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h4 class="modal-title">Batch Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"id="batch-details"></div><div class="modal-footer"> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></div></div></div></div>';
        $content .= $departureDate;
        $content .= '<hr style="background:black;"></div></div></div>';

        if ($result->trek_cost == null) {

            $content .= '<div class="col-sm-8" style="background-color:lavenderblush;max-height: 100vh;min-height: 100vh;overflow: auto;"><div class="page-content page-container" id="page-content"><div class="padding"><div class=""><div class="col-xl-12 col-md-12 container" ><div class="card user-card-full" style="border-style: solid;"><div class="row m-l-0 m-r-0"><div class="col-sm-12"><div class="card-block"><div style="text-align: center;"><h1 class="">' . $result->trek_name . '</h1><hr></div><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Trek Cost</p><h6 class="text-muted f-w-400">For cost mail us at <a href="mailto:query@trekthehimalayas.com">query@trekthehimalayas.com</a></h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Service tax</p><h6 class="text-muted f-w-400">INR &nbsp;' . $result->trek_service_tax . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Days</p><h6 class="text-muted f-w-400">' . $result->trek_days . '</h6></div></div><hr><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Country</p><h6 class="text-muted f-w-400">' . $result->trek_region_country . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">State</p><h6 class="text-muted f-w-400">' . $result->trek_region_state . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">City</p><h6 class="text-muted f-w-400">' . $result->trek_region_city . '</h6></div></div><hr><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Grade</p><h6 class="text-muted f-w-400">' . $result->trek_grade . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Altitude</p><h6 class="text-muted f-w-400">' . $result->trek_altitude . ' FT</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Distance</p><h6 class="text-muted f-w-400">' . $result->trek_distance . ' Km</h6></div></div><hr><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Trek Flags</p><h6 class="text-muted f-w-400">' . $target . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Best Season</p><h6 class="text-muted f-w-400">' . $result->trek_best_months . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Trek Essential</p><h6 class="text-muted f-w-400">' . $result->trek_essential . '</h6></div></div><hr><div class="row"><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Transportation</p><h6 class="text-muted f-w-400">' . $result->trek_transportation . '</h6></div><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Trail Type</p><h6 class="text-muted f-w-400">' . $result->trek_trail_type . '</h6></div><div class="col-sm-4 tx "><p class="m-b-10 f-w-600 t">About the Trek</p><h6 class="text-muted f-w-400">' . $trek_about . '</h6></div></div><hr><div class="row"><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Overview</p><h6 class="text-muted f-w-400">' . $trek_overview . '</h6></div><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Cost Terms</p><h6 class="text-muted f-w-400">' . $result->trek_cost_terms . '</h6></div><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">How to reach</p><h6 class="text-muted f-w-400">' . $trek_how_reach . '</h6></div><hr><div class="col-sm-4 tx pull-right" style="margin-top:10px;"><p class="m-b-10 f-w-600 t">Cancellation Policy</p><h6 class="text-muted f-w-400"><a data-toggle="modal" data-target="#myModal" style="color:blue;">Cancellation Policy</a></h6></div></div><hr></div></div></div></div></div></div></div></div></div></div></div><div class="modal" id="myModal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title">' . $resultPolicyName . '</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><p>' . $resultPolicyContent . '</p></div><div class="modal-footer"> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></div></div></div></body>';
        } else {
            $content .= '<div class="col-sm-8" style="background-color:lavenderblush;max-height: 100vh;min-height: 100vh;overflow: auto;"><div class="page-content page-container" id="page-content"><div class="padding"><div class=""><div class="col-xl-12 col-md-12 container" ><div class="card user-card-full" style="border-style: solid;"><div class="row m-l-0 m-r-0"><div class="col-sm-12"><div class="card-block"><div style="text-align: center;"><h1 class="">' . $result->trek_name . '</h1><hr></div><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Trek Cost</p><h6 class="text-muted f-w-400">INR &nbsp;' . $result->trek_cost . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Service tax</p><h6 class="text-muted f-w-400">INR &nbsp;' . $result->trek_service_tax . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Days</p><h6 class="text-muted f-w-400">' . $result->trek_days . '</h6></div></div><hr><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Country</p><h6 class="text-muted f-w-400">' . $result->trek_region_country . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">State</p><h6 class="text-muted f-w-400">' . $result->trek_region_state . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">City</p><h6 class="text-muted f-w-400">' . $result->trek_region_city . '</h6></div></div><hr><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Grade</p><h6 class="text-muted f-w-400">' . $result->trek_grade . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Altitude</p><h6 class="text-muted f-w-400">' . $result->trek_altitude . ' FT</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Distance</p><h6 class="text-muted f-w-400">' . $result->trek_distance . ' Km</h6></div></div><hr><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Trek Flags</p><h6 class="text-muted f-w-400">' . $target . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Best Season</p><h6 class="text-muted f-w-400">' . $result->trek_best_months . '</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Trek Essential</p><h6 class="text-muted f-w-400">' . $result->trek_essential . '</h6></div></div><hr><div class="row"><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Transportation</p><h6 class="text-muted f-w-400">' . $result->trek_transportation . '</h6></div><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Trail Type</p><h6 class="text-muted f-w-400">' . $result->trek_trail_type . '</h6></div><div class="col-sm-4 tx "><p class="m-b-10 f-w-600 t">About the Trek</p><h6 class="text-muted f-w-400">' . $trek_about . '</h6></div></div><hr><div class="row"><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Overview</p><h6 class="text-muted f-w-400">' . $trek_overview . '</h6></div><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Cost Terms</p><h6 class="text-muted f-w-400">' . $result->trek_cost_terms . '</h6></div><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">How to reach</p><h6 class="text-muted f-w-400">' . $trek_how_reach . '</h6></div><hr><div class="col-sm-4 tx pull-right" style="margin-top:10px;"><p class="m-b-10 f-w-600 t">Cancellation Policy</p><h6 class="text-muted f-w-400"><a data-toggle="modal" data-target="#myModal" style="color:blue;">Cancellation Policy</a></h6></div></div><hr></div></div></div></div></div></div></div></div></div></div></div><div class="modal" id="myModal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title">' . $resultPolicyName . '</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><p>' . $resultPolicyContent . '</p></div><div class="modal-footer"> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></div></div></div></body>';
        }

        $content .= '<br>';
        return $content;
    }

    public function all_treks_shortcode()
    {

        global $wpdb, $table_prefix;
        // $query = "SELECT * FROM wp_trektable_addtrekdetails where trek_adddetails_status='0' and trek_publish_status='0'";
        $query = "SELECT
                  wp_trektable_addtrekdetails.*,
                  wp_trektable_addtrekdetails.trek_adddetails_status,
                  COUNT(wp_trektable_trek_departure.id) AS totalDeparture
                FROM
                  wp_trektable_addtrekdetails
                LEFT JOIN wp_trektable_trek_departure ON wp_trektable_addtrekdetails.id = wp_trektable_trek_departure.trek_selected_trek
                and wp_trektable_trek_departure.trek_departure_status !=1
                where wp_trektable_addtrekdetails.trek_adddetails_status=0 and wp_trektable_addtrekdetails.trek_publish_status=0
                GROUP BY wp_trektable_addtrekdetails.id order by
                wp_trektable_addtrekdetails.id asc";
        $result = $wpdb->get_results($query);

        $content = '';
        $content .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"><link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><link rel="stylesheet" href="./style.css"></head><style>img{height:150px;width:100%}.item{padding-left:5px;padding-right:5px}.item-card{transition:0.5s;cursor:pointer}.item-card-title{font-size:15px;transition:1s;cursor:pointer}.item-card-title i{font-size:15px;transition:1s;cursor:pointer;color:#ffa710}.card-title i:hover{transform:scale(1.25) rotate(100deg);color:#18d4ca}.card:hover{transform:scale(1.05);box-shadow:10px 10px 15px rgba(0,0,0,0.3)}.card-text{height:80px}.card::before,.card::after{position:absolute;top:0;right:0;bottom:0;left:0;transform:scale3d(0, 0, 1);transition:transform .3s ease-out 0s;background:rgba(255,255,255,0.1);content:"";pointer-events:none}.card::before{transform-origin:left top}.card::after{transform-origin:right bottom}.card:hover::before,.card:hover::after,.card:focus::before,.card:focus::after{transform:scale3d(1, 1, 1)}</style><body><div class="container mt-2"><div class="row">';
        if (!empty($result)) {
            $fcount = count($result);
            if ($fcount > 4) {
                $fcount = 4;
            }
            for ($i = 0; $i < $fcount; $i++) {
                if (($result[$i]->trek_cost == null) || ($result[$i]->totalDeparture == 0)) {
                    $content .= '<div class="col-md-3 col-sm-6 item"><div class="card item-card card-block"><h4 class="card-title text-right"><a class="btn btn-warning" href="mailto:query@trekthehimalayas.com">contact Us</a></h4> <img src="' . $result[$i]->trek_profile_image . '" alt="Photo of sunset"style="height:120px; width:250px;"><h5 class="item-card-title mt-3 mb-3">' . $result[$i]->trek_name . '</h5><div class="card-text"><tr><td>Distance:</td><td>' . $result[$i]->trek_distance . '</td></tr><br><tr><td>Grade:</td><td>' . $result[$i]->trek_grade . '</td><tr><br><tr><td>Altitude:</td><td>' . $result[$i]->trek_altitude . 'FT</td></tr><br><a href="/trek/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank">View Details</a></div></div></div>';
                } else {
                    $content .= '<div class="col-md-3 col-sm-6 item"><div class="card item-card card-block"><h4 class="card-title text-right"><a class="btn btn-primary" href="/trek/index.php/booking-page?trek=' . $result[$i]->id . '&departure=nan">Book Now</a></h4> <img src="' . $result[$i]->trek_profile_image . '" alt="Photo of sunset"style="height:120px; width:250px;"><h5 class="item-card-title mt-3 mb-3">' . $result[$i]->trek_name . '</h5><div class="card-text"><tr><td>Distance:</td><td>' . $result[$i]->trek_distance . '</td></tr><br><tr><td>Grade:</td><td>' . $result[$i]->trek_grade . '</td><tr><br><tr><td>Altitude:</td><td>' . $result[$i]->trek_altitude . 'FT</td></tr><br><a href="/trek/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank">View Details</a></div></div></div>';
                }
            }
        } else {
            $content .= '<h4>No treks available!</h4>';
        }

        $content .= '</div></div> <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script> </body>';
        $content .= '<br>';
        return $content;
    }
    public function all_treks_shortcode_new_template()
    {
        global $wpdb, $table_prefix;

        $query = "SELECT
  wp_trektable_addtrekdetails.*,
  wp_trektable_addtrekdetails.trek_adddetails_status,
  COUNT(wp_trektable_trek_departure.id) AS totalDeparture
FROM
  wp_trektable_addtrekdetails
LEFT JOIN wp_trektable_trek_departure ON wp_trektable_addtrekdetails.id = wp_trektable_trek_departure.trek_selected_trek
and wp_trektable_trek_departure.trek_departure_status !=1
where wp_trektable_addtrekdetails.trek_adddetails_status=0 and wp_trektable_addtrekdetails.trek_publish_status=0
GROUP BY wp_trektable_addtrekdetails.id order by
wp_trektable_addtrekdetails.id asc";
        $result = $wpdb->get_results($query);
        // print_r(json_encode($result));
        // die;

        $content = '';

        if (!empty($result)) {
            $fcount = count($result);

            for ($i = 0; $i < $fcount; $i++) {
                if (($result[$i]->trek_cost == null) || ($result[$i]->totalDeparture != 0)) {
                    if ($i == 0) {
                        $content .= '<div id="slider-one-item" class="item"><div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . get_template_directory_uri() . '/assets/illustration/mountain1.svg" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank"><div class="button"> View Details <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></div></a></div></div>';
                    } else {
                        $content .= '<div class="item"><div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . get_template_directory_uri() . '/assets/illustration/mountain1.svg" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank"><div class="button"> View Details <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></div></a></div></div>';
                    }
                } else {
                    if ($i = 0) {
                        $content .= '<div id="slider-one-item" class="item"><div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . get_template_directory_uri() . '/assets/illustration/mountain1.svg" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank"><div class="button"> Contact Us <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></div></a></div></div>';
                    } else {
                        $content .= '<div class="item"><div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . get_template_directory_uri() . '/assets/illustration/mountain1.svg" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/trek-details/?trek=' . $result[$i]->id . '" target="_blank"><div class="button"> Contact Us <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></div></a></div></div>';
                    }
                }
            }
        } else {
            $content .= '<h4>No treks available!</h4>';
        }


        return $content;
    }

    public function similar_treks($atts)
    {
        $id = $atts['id'];
        $type = $atts['type'];
        global $wpdb, $table_prefix;
        if ($type == 'user') {
            $query = "SELECT
  wp_trektable_addtrekdetails.*,
  wp_trektable_addtrekdetails.trek_adddetails_status,
  COUNT(wp_trektable_trek_departure.id) AS totalDeparture
FROM
  wp_trektable_addtrekdetails
LEFT JOIN wp_trektable_trek_departure ON wp_trektable_addtrekdetails.id = wp_trektable_trek_departure.trek_selected_trek
and wp_trektable_trek_departure.trek_departure_status !=1
where wp_trektable_addtrekdetails.trek_adddetails_status=0 and wp_trektable_addtrekdetails.id!='" . $id . "' and wp_trektable_addtrekdetails.trek_publish_status=0
GROUP BY wp_trektable_addtrekdetails.id order by
wp_trektable_addtrekdetails.id asc";
        } else if ($type == 'preview') {
            $query = "SELECT
  wp_trektable_addtrekdetails.*,
  wp_trektable_addtrekdetails.trek_adddetails_status,
  COUNT(wp_trektable_trek_departure.id) AS totalDeparture
FROM
  wp_trektable_addtrekdetails
LEFT JOIN wp_trektable_trek_departure ON wp_trektable_addtrekdetails.id = wp_trektable_trek_departure.trek_selected_trek
and wp_trektable_trek_departure.trek_departure_status !=1
where wp_trektable_addtrekdetails.trek_adddetails_status=0 and wp_trektable_addtrekdetails.id!='" . $id . "'
GROUP BY wp_trektable_addtrekdetails.id order by
wp_trektable_addtrekdetails.id asc";
        } else if ($type == 'grade') {
            $grade = $atts['gradevalue'];
            $query = "SELECT
  wp_trektable_addtrekdetails.*,
  wp_trektable_addtrekdetails.trek_adddetails_status,
  COUNT(wp_trektable_trek_departure.id) AS totalDeparture
FROM
  wp_trektable_addtrekdetails
LEFT JOIN wp_trektable_trek_departure ON wp_trektable_addtrekdetails.id = wp_trektable_trek_departure.trek_selected_trek
and wp_trektable_trek_departure.trek_departure_status !=1
where wp_trektable_addtrekdetails.trek_adddetails_status=0 and wp_trektable_addtrekdetails.trek_grade='" . $grade . "' and wp_trektable_addtrekdetails.id!='" . $id . "'  GROUP BY wp_trektable_addtrekdetails.id order by
wp_trektable_addtrekdetails.id asc";
        }

        $result = $wpdb->get_results($query);
        // print_r(json_encode($result));
        // die;

        $content = '';

        if (!empty($result)) {
            $fcount = count($result);

            for ($i = 0; $i < $fcount; $i++) {

                if (isset($result[$i]->trek_selected_flags)) {
                    if ($result[$i]->trek_selected_flags != 'nil') {
                        $trek_graph_img = $result[$i]->trek_selected_flags;
                    } else {
                        $trek_graph_img = get_template_directory_uri() . '/assets/illustration/mountain1.svg';
                    }
                } else {
                    $trek_graph_img = get_template_directory_uri() . '/assets/illustration/mountain1.svg';
                }

                if (($result[$i]->trek_cost == null) || ($result[$i]->totalDeparture != 0)) {
                    if ($i == 0) {
                        $content .= '<div id="slider-two-item" class="item"><div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . $trek_graph_img . '" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank" class="button"> View Details <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></a></div></div>';
                    } else {
                        $content .= '<div class="item"><div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . $trek_graph_img . '" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank" class="button"> View Details <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></a></div></div>';
                    }
                } else {
                    if ($i == 0) {
                        $content .= '<div id="slider-two-item" class="item"><div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . $trek_graph_img . '" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank" class="button"> Contact Us <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></a></div></div>';
                    } else {
                        $content .= '<div class="item"><div class="image" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . $trek_graph_img . '" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/trek-details/?trek=' . $result[$i]->id . '" target="_blank" class="button"> Contact Us <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></a></div></div>';
                    }
                }
            }
        } else {
            $content .= '<h4>No similar treks available!</h4>';
        }


        return $content;
    }



    public function view_all_treks_shortcode()
    {
        global $wpdb, $table_prefix;
        $query = "SELECT
  wp_trektable_addtrekdetails.*,
  wp_trektable_addtrekdetails.trek_adddetails_status,
  COUNT(wp_trektable_trek_departure.id) AS totalDeparture
FROM
  wp_trektable_addtrekdetails
LEFT JOIN wp_trektable_trek_departure ON wp_trektable_addtrekdetails.id = wp_trektable_trek_departure.trek_selected_trek
and wp_trektable_trek_departure.trek_departure_status !=1
where wp_trektable_addtrekdetails.trek_adddetails_status=0 and wp_trektable_addtrekdetails.trek_publish_status=0
GROUP BY wp_trektable_addtrekdetails.id order by
wp_trektable_addtrekdetails.id asc";
        $result = $wpdb->get_results($query);

        $content = '';
        $content .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"><link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><link rel="stylesheet" href="./style.css"></head><style>img{height:150px;width:100%}.item{padding-left:5px;padding-right:5px}.item-card{transition:0.5s;cursor:pointer}.item-card-title{font-size:15px;transition:1s;cursor:pointer}.item-card-title i{font-size:15px;transition:1s;cursor:pointer;color:#ffa710}.card-title i:hover{transform:scale(1.25) rotate(100deg);color:#18d4ca}.card:hover{transform:scale(1.05);box-shadow:10px 10px 15px rgba(0,0,0,0.3)}.card-text{height:80px}.card::before,.card::after{position:absolute;top:0;right:0;bottom:0;left:0;transform:scale3d(0, 0, 1);transition:transform .3s ease-out 0s;background:rgba(255,255,255,0.1);content:"";pointer-events:none}.card::before{transform-origin:left top}.card::after{transform-origin:right bottom}.card:hover::before,.card:hover::after,.card:focus::before,.card:focus::after{transform:scale3d(1, 1, 1)}</style><body><div class="container mt-2"><div class="row">';
        if (!empty($result)) {
            $fcount = count($result);
            for ($i = 0; $i < $fcount; $i++) {
                if (($result[$i]->trek_cost == null) || ($result[$i]->totalDeparture == 0)) {
                    $content .= '<div class="col-md-3 col-sm-6 item"><div class="card item-card card-block"><h4 class="card-title text-right"><a class="btn btn-warning" href="mailto:query@trekthehimalayas.com">contact Us</a></h4> <img src="' . $result[$i]->trek_profile_image . '" alt="Photo of sunset"style="height:120px; width:250px;"><h5 class="item-card-title mt-3 mb-3">' . $result[$i]->trek_name . '</h5><div class="card-text"><tr><td>Distance:</td><td>' . $result[$i]->trek_distance . '</td></tr><br><tr><td>Grade:</td><td>' . $result[$i]->trek_grade . '</td><tr><br><tr><td>Altitude:</td><td>' . $result[$i]->trek_altitude . 'FT</td></tr><br><a href="/trek/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank">View Details</a></div></div></div>';
                } else {
                    $content .= '<div class="col-md-3 col-sm-6 item"><div class="card item-card card-block"><h4 class="card-title text-right"><a class="btn btn-primary" href="/trek/index.php/booking-page?trek=' . $result[$i]->id . '&departure=nan">Book Now</a></h4> <img src="' . $result[$i]->trek_profile_image . '" alt="Photo of sunset"style="height:120px; width:250px;"><h5 class="item-card-title mt-3 mb-3">' . $result[$i]->trek_name . '</h5><div class="card-text"><tr><td>Distance:</td><td>' . $result[$i]->trek_distance . '</td></tr><br><tr><td>Grade:</td><td>' . $result[$i]->trek_grade . '</td><tr><br><tr><td>Altitude:</td><td>' . $result[$i]->trek_altitude . 'FT</td></tr><br><a href="/trek/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank">View Details</a></div></div></div>';
                }
            }
        } else {
            $content .= '<h4>No treks available!</h4>';
        }

        $content .= '</div></div> <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script> </body>';
        $content .= '<br>';
        return $content;
    }
    public function booking()
    {
        $user = wp_get_current_user();
        if (isset($user->data->user_email)) {
            $user_email = $user->data->user_email;
        }
        $content = '';
        if (!is_user_logged_in()) {
            $content = '<html><head></head><style>.center{display:flex;justify-content:center;align-items:center;height:100%}</style> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"><body><div class="center"> <img style="width: 10%;height: 20%;" src="https://i.ibb.co/GTsqcH0/unnamed.png"><h4 >Sorry, Only regsitred users can book trek.</h4> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-secondary" onclick="toLogin()">Login</button></div></body></html>';

            return $content;
            die;
        }

        global $wpdb, $table_prefix;
        $hello_user = wp_get_current_user();
        if ($hello_user->data->user_email != null) {
            $query11 = "SELECT * FROM wp_trektable_userdetails where trek_user_email='" . $hello_user->data->user_email . "' and trek_user_status=0 limit 1";
            $results11 = $wpdb->get_results($query11);
        }

        if (isset($_GET['trek'])) {
            $ppc = $_GET['trek'];

            $query = "SELECT * FROM wp_trektable_addtrekdetails where trek_adddetails_status=0";
            $results = $wpdb->get_results($query);
            $alltrekcount = count($results);

            $query1 = "SELECT * FROM wp_trektable_trek_departure where trek_selected_trek=" . $ppc . " and trek_departure_status=0 order by trek_start_date asc";
            $results1 = $wpdb->get_results($query1);
            $alldeparturecount = count($results1);

            if ($ppc == '') {
                die('Access restricted!');
            }
        }


        $content .= '<!DOCTYPE html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> </head><style>.trek-name-section{background-color:red}input{background-color:white !important;}.loggedinuser{background-color:yellow;}</style><body><div class="container" style="background-color: #ffb3b3;"><div class="trek-name-section"><div class="row col-md-12 form-group"><div class="col-md-12 form-group" style="text-align: center;"><h2>Trek name</h2></div></div><div class="row col-md-12 form-group"><div class="col-md-6"> <label for="select-trek" class="form-label">Trek name</label>';
        // Fetch all treks from the db
        $content .= '<select id="select-trek" class="form-control" placeholder="Pick a trek..." required="required"><option value="">Select Trek</option>';
        $trekall = '';
        for ($k = 0; $k < $alltrekcount; $k++) {
            if ($results[$k]->id == $ppc) {
                $trekall .= '<option value="' . $results[$k]->id . '" selected="selected">' . $results[$k]->trek_name . '</option>';
            } else {
                $trekall .= '<option value="' . $results[$k]->id . '">' . $results[$k]->trek_name . '</option>';
            }
        }
        $content .= $trekall;
        $content .= '</select>';

        $content .= '<span id="select-trek_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-6"> <label for="select-date" class="form-label">Date</label>';

        //Fetch all departure from the db

        $content .= '<select id="select-date" class="form-control" placeholder="Pick a date..." required="required"><option value="">Select Trek Date</option>';
        $alltrekdate = '';
        if (isset($_GET['departure'])) {
            $dep = $_GET['departure'];
        }
        for ($k = 0; $k < $alldeparturecount; $k++) {
            $k1 = strtotime($results1[$k]->trek_start_date);
            $l1 = strtotime($results1[$k]->trek_end_date);
            $k2 = date('j M ', $k1);
            $l2 = date('j M Y', $l1);
            $m2 = $results1[$k]->trek_section;
            if ($results1[$k]->id == $dep) {
                $alltrekdate .= '<option value="' . $results1[$k]->id . '"selected="selected">' . $k2 . ' - ' . $l2 . ' : ' . $m2 . '</option>';
            } else {
                $alltrekdate .= '<option value="' . $results1[$k]->id . '">' . $k2 . ' - ' . $l2 . ' : ' . $m2 . '</option>';
            }
        }
        $content .= $alltrekdate;
        $content .= '</select>';

        $content .= '<span id="select-date_error" style="color:red;display:block;font-style:italic;"></span></div></div></div>'; //End First section

        //Personal details section

        if (empty($results11)) {
            // print_r("empty");
            $content .= '<div class="trek-personal-section" style="padding:5px;"><div class="row col-md-12 form-group" style="padding: 30px;"><div class="col-md-12" style="text-align: center;"><h3>Personal details.</h3></div></div><div class="row col-md-12 form-group"><div class="col-md-3"> <label for="firstname" class="form-label">First name</label> <input type="text" class="form-control" id="firstname" required="required"><span id="firstname_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-3"> <label for="lastname" class="form-label">Last name</label> <input type="text" class="form-control" id="lastname" required="required"><span id="lastname_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-3"> <label for="Phone" class="form-label">Contact number</label> <input type="number" class="form-control" id="Phone" onchange="checknumber1(this.value)" required="required"><span id="Phone_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-3">';
            if (isset($user_email)) {
                $content .= '<label for="mail" class="form-label">Email</label> <input type="email" onchange="ValidateEmail(this.value)" class="form-control" id="mail" value="' . $user_email . '" required="required" disabled="disabled" readonly="readonly"><span id="mail_error" style="color:red;display:block;font-style:italic;"></span>';
            } else {
                $content .= '<label for="mail" class="form-label">Email</label> <input type="email" onchange="ValidateEmail(this.value)" class="form-control" id="mail" required="required"><span id="mail_error" style="color:red;display:block;font-style:italic;"></span>';
            }


            $content .= '</div></div> <br><div class="row col-md-12 form-group"><div class="col-md-4"> <label for="select-gender" class="form-label">Gender</label> <select id="select-gender" class="form-control" placeholder="Pick a Gender..." required="required"><option value="Male">Male</option><option value="Female">Female</option><option value="Unspecified">Unspecified</option> </select><span id="select-gender_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="emergency" class="form-label">Emergency contact number</label> <input type="number" class="form-control" id="emergency" onchange="checknumber2(this.value)" required="required"><span id="emergency_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="dob" class="form-label">Date of birth</label><input type="date" max="2100-12-31" class="form-control" id="dob" required="required"><span id="dob_error" style="color:red;display:block;font-style:italic;"></span></div><bR><div class="col-md-4"> <label for="dob" class="form-label">Weight</label><input type="number" class="form-control" id="weight" required="required"><span id="weight_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="height" class="form-label">Height</label><input type="number" class="form-control" id="height" required="required"><span id="height_error" style="color:red;display:block;font-style:italic;"></span></div> <br></div>';

            //Address details section
            $content .= '<div class="trek-address-section"><div class="row col-md-12 form-group"><h3 style="text-align: center;">Address Details</h3></div> <br><div class="row col-md-12 form-group"><div class="col-md-4"> <label for="select-country" class="form-label">Country</label> <select id="select-country" class="form-control" placeholder="Country" required="required"><option value="">Select Country</option><option value="india">India</option><option value="usa">USA</option><option value="australia">Australia</option><option value="japan">Japan</option><option value="china">China</option> </select><span id="select-country_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="State" class="form-label">State</label> <input type="text" class="form-control" id="State" required="required"><span id="State_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="City" class="form-label">City</label> <input type="text" class="form-control" id="City" required="required"><span id="City_error" style="color:red;display:block;font-style:italic;"></span></div></div> <br></div>';
        } else {
            $results11 = $results11[0];
            $content .= '<div class="trek-personal-section" style="padding:5px;"><div class="row col-md-12 form-group" style="padding: 30px;"><div class="col-md-12" style="text-align: center;"><h3>Personal details.</h3></div></div><div class="row col-md-12 form-group"><div class="col-md-3"> <label for="firstname" class="form-label">First name</label> <input type="text" class="form-control loggedinuser" id="firstname" required="required" value="' . $results11->trek_user_first_name . '" readonly="readonly"> <span id="firstname_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-3"> <label for="lastname" class="form-label">Last name</label> <input type="text" class="form-control loggedinuser" id="lastname" required="required"value="' . $results11->trek_user_last_name . '" readonly="readonly"><span id="lastname_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-3"> <label for="Phone" class="form-label">Contact number</label> <input type="number" class="form-control loggedinuser" id="Phone" onchange="checknumber1(this.value)" required="required" value="' . $results11->trek_user_contact_number . '" readonly="readonly"><span id="Phone_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-3"> <label for="mail" class="form-label">Email</label> <input type="email" onchange="ValidateEmail(this.value)" class="form-control loggedinuser" id="mail" required="required"value="' . $results11->trek_user_email . '" readonly="readonly"><span id="mail_error" style="color:red;display:block;font-style:italic;"></span></div></div> <br><div class="row col-md-12 form-group"><div class="col-md-4"> <label for="select-gender" class="form-label">Gender</label> <input id="select-gender" class="form-control loggedinuser" placeholder="Pick a Gender..." required="required" value="' . $results11->trek_user_gender . '" readonly="readonly"><span id="select-gender_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="emergency" class="form-label">Emergency contact number</label> <input type="number" class="form-control loggedinuser" id="emergency" onchange="checknumber2(this.value)" required="required"value="' . $results11->trek_user_emergency_number . '" readonly="readonly"><span id="emergency_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="dob" class="form-label">Date of birth</label><input type="date" max="2100-12-31" class="form-control loggedinuser" id="dob" required="required" value="' . $results11->trek_user_dob . '" readonly="readonly"><span id="dob_error" style="color:red;display:block;font-style:italic;"></span></div><bR><div class="col-md-4"> <label for="dob" class="form-label">Weight</label><input type="number" class="form-control loggedinuser" id="weight" required="required"value="' . $results11->trek_user_weight . '" readonly="readonly"><span id="weight_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="height" class="form-label">Height</label><input type="number" class="form-control loggedinuser" id="height" required="required"value="' . $results11->trek_user_height . '" readonly="readonly"><span id="height_error" style="color:red;display:block;font-style:italic;"></span></div> <br></div>';

            //Address details section
            $content .= '<div class="trek-address-section"><div class="row col-md-12 form-group"><h3 style="text-align: center;">Address Details</h3></div> <br><div class="row col-md-12 form-group"><div class="col-md-4"> <label for="select-country" class="form-label">Country</label> <input id="select-country" class="form-control loggedinuser" placeholder="Country" required="required" value="' . $results11->trek_user_country . '" readonly="readonly"><span id="select-country_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="State" class="form-label">State</label> <input type="text" class="form-control loggedinuser" id="State" required="required" value="' . $results11->trek_user_state . '" readonly="readonly"><span id="State_error" style="color:red;display:block;font-style:italic;"></span></div><div class="col-md-4"> <label for="City" class="form-label">City</label> <input type="text" class="form-control loggedinuser" id="City" required="required" value="' . $results11->trek_user_city . '" readonly="readonly"><span id="City_error" style="color:red;display:block;font-style:italic;"></span></div></div> <br></div>';
        }

        //Trekkers list  section

        $content .= '<div class="trek-trekkers-section"><div class="row col-md-12 form-group"><h3 style="text-align: center;">Trekkers List</h3></div> <br><div class="row col-md-12 form-group"><div class="col-md-12 boxpadding"><div class="imgbox margin_top"><div class="boxmargintop clearfix exped_bg"><div style="padding: 10px;"><div class="col-md-12"><div class="col-md-12"><div class="form-group"> <select name="drpNoOfTrekker" class="form-control" id="drpNoOfTrekker" required="required" data-live-search="true" onchange="createNodes(this.value);" class="form-control input-sm selectpicker show-tick"><option value="">Select Number Of Trekkers</option><option value="Me Only">Me Only</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option> </select><span id="drpNoOfTrekker_error" style="color:red;display:block;font-style:italic;"></span></div></div></div> <br><div><span class="margin_top"></span><span id="data" style="padding:5px;"></span></div></div></div></div></div></div> <br></div>';

        //Final section

        $content .= '<div class="trek-other-section"><div class="row col-md-12 form-group"><h3 style="text-align: center;">Other details</h3></div> <br><div class="row col-md-12 form-group"><div class="col-md-4"> <label for="select-category-trek" class="form-label">Select Category</label> <select id="select-category-trek" class="form-control" placeholder="Select category"><option value="">Select Category</option><option value="Family">Family</option><option value="Ladies">Ladies</option><option value="Gents">Gents</option><option value="Kids">Kids</option><option value="Extra Care">Extra Care</option><option value="Other">Other</option> </select></div><div class="col-md-4"> <label for="select-how" class="form-label">How did you find us?</label> <select id="select-how" class="form-control" placeholder="Select (Not Mandatory)"><option value="">Select (Not Mandatory)</option><option value="Search Engine">Search Engine</option><option value="Friend">Friend</option><option value="Fourms">Fourms</option><option value="Social Media">Social Media</option><option value="Travel Magazines">Travel Magazines</option><option value="Through TTH Email">Through TTH Email</option><option value="Other">Other</option> </select></div><div class="col-md-4"> <label for="select-before" class="form-label">Have you trekked with us?</label> <select id="select-before" class="form-control" placeholder="Select (Not Mandatory)"><option value="">Select (Not Mandatory)</option><option value="Yes">Yes</option><option value="No">No</option> </select></div></div> <br><div class="row col-md-12 form-group"><div class="column col-md-6"><div class="col-md-6 checkbox"> <input type="checkbox" required="required" name="terms" id="terms" value="terms"/> <label for="terms">I agree all </label> <a style="cursor: pointer !important;" onclick="">Terms and Condition</a></div><div class="col-md-6 checkbox"> <input type="checkbox" name="insurance" id="insurance" value="insurance"/><span id="terms_error" style="color:red;display:block;font-style:italic;"></span> <label for="insurance">I opt for Insurance</label><span id="insurance_error" style="color:red;display:block;font-style:italic;"></span></div></div><div class="col-md-6"><div class="form-group"> <label class="control-label" for="txtnote">Note</label><textarea name="txtnote" rows="2" cols="20" id="txtnote" class="form-control"> </textarea></div></div></div> <br></div><div class="trek-submit-section"><div class="row col-md-12 form-group"><div style="text-align: center;"> <button id="submitburtrek" class="btn btn-primary">Submit</button></div></div></div></div></body>';

        $content .= '<br>';
        return $content;
    }


    public function testing($atts)
    {
        $id = $atts['id'];
        $type = $atts['type'];
        global $wpdb, $table_prefix;
        if ($type == 'user') {
            $query = "SELECT
  wp_trektable_addtrekdetails.*,
  wp_trektable_addtrekdetails.trek_adddetails_status,
  COUNT(wp_trektable_trek_departure.id) AS totalDeparture
FROM
  wp_trektable_addtrekdetails
LEFT JOIN wp_trektable_trek_departure ON wp_trektable_addtrekdetails.id = wp_trektable_trek_departure.trek_selected_trek
and wp_trektable_trek_departure.trek_departure_status !=1
where wp_trektable_addtrekdetails.trek_adddetails_status=0 and wp_trektable_addtrekdetails.trek_publish_status=0 and wp_trektable_addtrekdetails.id='" . $id . "'
GROUP BY wp_trektable_addtrekdetails.id order by
wp_trektable_addtrekdetails.id asc";
        } else if ($type == 'preview') {
            $query = "SELECT
  wp_trektable_addtrekdetails.*,
  wp_trektable_addtrekdetails.trek_adddetails_status,
  COUNT(wp_trektable_trek_departure.id) AS totalDeparture
FROM
  wp_trektable_addtrekdetails
LEFT JOIN wp_trektable_trek_departure ON wp_trektable_addtrekdetails.id = wp_trektable_trek_departure.trek_selected_trek
and wp_trektable_trek_departure.trek_departure_status !=1
where wp_trektable_addtrekdetails.trek_adddetails_status=0 and wp_trektable_addtrekdetails.id='" . $id . "'
GROUP BY wp_trektable_addtrekdetails.id order by
wp_trektable_addtrekdetails.id asc";
        }

        $result = $wpdb->get_results($query);
        // print_r(json_encode($result));
        // die;
        $trek_details_hero = '';
        $nan = 'This field is not provided';
        $trail_type = isset($result[0]->trek_trail_type) ? $result[0]->trek_trail_type : $nan;
        $rail_head = isset($result[0]->trek_rail_head) ? $result[0]->trek_rail_head : $nan;
        $base_camp = isset($result[0]->trek_base_camp) ? $result[0]->trek_base_camp : $nan;
        $airport = isset($result[0]->trek_airport) ? $result[0]->trek_airport : $nan;
        $season_trek = isset($result[0]->trek_best_months) ? $result[0]->trek_best_months : $nan;
        $trek_season = isset($result[0]->trek_season) ? $result[0]->trek_season : $nan;
        $snow = isset($result[0]->trek_snow) ? $result[0]->trek_snow : $nan;
        $services_from = isset($result[0]->trek_service_from) ? $result[0]->trek_service_from : $nan;
        $meals = isset($result[0]->trek_food) ? $result[0]->trek_food : $nan;
        $stay = isset($result[0]->trek_stay) ? $result[0]->trek_stay : $nan;

        // print_r($season_trek);
        // die;
        $text = $result[0]->trek_about_trek;
        $text = str_replace("&&", ' " ', $text);

        $text = str_replace(["nbsp", "&", ";"], ' ', $text);
        // $text = str_replace("&",' ',$text); 
        // $text = str_replace(",",' ',$text); 
        // $text = strip_tags($text,"<p>");

        $len = strlen($text);
        $space = strrpos($text, " ", -$len / 3);
        $col1 = substr($text, 0, $space);
        $col2 = substr($text, $space);

        // print_r($col1);
        // print_r("<br>AMAL");
        // print_r($col2);
        // die;

        $col1 = trim($col1);
        $col2 = trim($col2);


        $contact = $result[0]->trek_assigned_to;
        $assigned_contact_details = $wpdb->get_results('SELECT contact_email as cmail,contact_num1 as cnum1,contact_num2 as cnum2 FROM wp_trektable_contacts where id = ' . $contact . ' limit 1');
        if (empty($assigned_contact_details)) {
            $assigned_contact_details = $wpdb->get_results('SELECT trek_tth_mail as cmail,trek_tth_c1 as cnum1,trek_tth_c2 as cnum2 FROM wp_trek_pages_tth_contacts where id ="1" ');
        }


        if (!empty($result)) {
            $now = date('Y-m-d');
            if ($result[0]->trek_cost) {
                if (($result[0]->trek_discount_percentage > 0) && ($result[0]->trek_discount_end_date >= $now)) {
                    $trekoff = $result[0]->trek_discount_percentage;
                    $trekCost = $result[0]->trek_cost;
                    $off = ($trekoff * $trekCost) / 100;
                    $val = $trekCost - $off;
                    $trk_price = '<h3 class="price"><i class="fa fa-rupee-sign"></i>' . number_format($val) . '<span style="color:red;"> /Person </span></h3><span><ul class="dotted_list"><li class="setRedColor"><del class="setRedColor"><i class="fa fa-rupee-sign setRedColor"></i> ' . number_format($trekCost) . '</del> /Person</li></ul></span>';
                } else {
                    $trk_price = '<h3 class="price"><i class="fa fa-rupee-sign"></i>' . number_format($result[0]->trek_cost) . '<span style="color:red;"> /Person </span></h3>';
                }
            } else {
                $trk_price = '<h6 class="price" style="font-size:17px;">Price not disclosed </h6>';
            }


            $trek_details_hero = '<section class="detail_banner"> <div class="banner_wrappper"> <div class="banner_slide owl-carousel"> ';


            $imgSlideTreks = explode(",", $result[0]->trek_slider_image);
            $innerLoopCount = count($imgSlideTreks);
            for ($j = 0; $j < $innerLoopCount; $j++) {
                $trek_details_hero .= '<img src="' . $imgSlideTreks[$j] . '"/>';
            }
            $trek_details_hero .= '</div><div class="content"> <h1 class="page_title">' . $result[0]->trek_name . '</h1> <ul class="meta"> <li><img src="' . get_template_directory_uri() . '/assets/icons/map_marker.png" alt=""> ' . $result[0]->trek_region_state . '</li><li><img src="' . get_template_directory_uri() . '/assets/icons/calendar.png" alt="">' . $result[0]->trek_days . ' Days</li></ul> </div></div></section> <section class="trek_details_wrapper"><div class="container-fluid"><div class="row"><div class="column1"><div class="row"><div class="col-md-6 features_style1"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt=""></div><div class="info"><p>Max Altitude</p><p class="bold">' . number_format($result[0]->trek_altitude) . ' FT</p></div></div><div class="col-md-6 features_style1"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt=""></div><div class="info"><p>Grade</p><p class="bold trk-grade" style="float:right;font-size:15px;">' . $result[0]->trek_grade . '</p></div></div><div class="col-md-6 features_style1"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt=""></div><div class="info"><p>Duration</p><p class="bold">' . $result[0]->trek_days . ' Days</p></div></div><div class="col-md-6 features_style1"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt=""></div><div class="info"><p>Trekking KM.</p><p class="bold">' . $result[0]->trek_distance . ' KM</p></div></div></div></div><div class="column2"><table class="table"><tr><td>Suitable for:</td><td>' . $result[0]->trek_suitable . '</td></tr><tr><td>Experience:</td><td>' . $result[0]->trek_experience . '</td></tr><tr><td>Fitness:</td><td>' . $result[0]->trek_fitness . '</td></tr></table></div><div class="column3">' . $trk_price . '<ul class="dotted_list"><li>' . $result[0]->trek_service_tax . '</li><li>' . ucfirst(strtolower($result[0]->trek_filter_from)) . ' to ' . ucfirst(strtolower($result[0]->trek_filter_to)) . '</li><li>' . $result[0]->trek_ins_policy_status . '</li></ul></div><div class="column4 support"><h3>Help & Support</h3><ul class="contact_list"><li><i class="fa fa-phone"></i>' . $assigned_contact_details[0]->cnum1 . '</li><li><i class="fa fa-phone"></i>' . $assigned_contact_details[0]->cnum2 . '</li><li><i class="fa fa-envelope"></i>' . $assigned_contact_details[0]->cmail . '</li></ul><ul class="dotted_list" style="width:44%;"><li><u><a href="' . site_url() . '/customize_trip"> <p>Customise Trek</p></a></u></li><li id="cscancel"><a href="#tab4-content"><u style="white-space: nowrap;">Cost & Cancellation Terms</u></a></li><li style="display:none;"><u>Risk & Respond </u></li></ul></div></div></div> </section><section class="trek_detail_tabs"><div class="tabs_nav"><div class="container"><ul><li class="active"><a href="#tab1-content"><img src="' . get_template_directory_uri() . '/assets/icons/overview.png" alt="">Overview</a></li><li class=""><a href="#tab2-content"><img src="' . get_template_directory_uri() . '/assets/icons/itenary.png" alt="">Itinerary</a></li><li class=""><a href="#tab3-content"><img src="' . get_template_directory_uri() . '/assets/icons/how-to-reach.png" alt="">How To Reach</a></li><li class=""><a href="#tab4-content"><img src="' . get_template_directory_uri() . '/assets/icons/cost.png" alt="">Cost Terms</a></li><li class=""><a href="#tab5-content"><img src="' . get_template_directory_uri() . '/assets/icons/trek.png" alt="">Trek Essential</a></li><li class=""><a href="#tab6-content"><img src="' . get_template_directory_uri() . '/assets/icons/links.png" alt="">Important Links</a></li><li class=""><a href="#tab7-content"><img src="' . get_template_directory_uri() . '/assets/icons/fitness.png" alt="">Fitness</a></li><li class=""><a href="#tab8-content"><img src="' . get_template_directory_uri() . '/assets/icons/map.png" alt="">Map</a></li><li class="" id="review-banner"><a href="#tab9-content"><img src="' . get_template_directory_uri() . '/assets/icons/reviews.png" alt="">Reviews</a></li><li class=""><a href="#tab10-content"><img src="' . get_template_directory_uri() . '/assets/icons/gallery.png" alt="">Gallery</a></li></ul></div></div><div class="container"><div class="trek_details_outer"><div class="all_tabs"><div class="tabs"><div id="tab1-content"><h3 class="fancy_head">Overview</h3><p class="font_18"><b>Trek Info</b></p> <br /><ul class="dotted_list colum_count_2"><li><span style="display: flex;">Trail Type</span>' . $trail_type . '</li><li><span style="display: flex;">Rail Head</span>' . $rail_head . '</li><li><span style="display: flex;">Airport</span>' . $airport . '</li><li><span style="display: flex;">Base Camp</span>' . $base_camp . '</li><li><span style="display: flex;">Best Season</span>' . ('<ul class="best-season">'.implode(" ",array_map(function ($item){return '<li>'.$item.'</li>';}, json_decode($trek_season))).'</ul>'). '</li><li><span style="display: flex;">Snow</span>' . $snow . '</li><li><span style="display: flex;">Services from</span>' . $services_from . '</li><li><span style="display: flex;">Meals</span>' . $meals . '</li><li><span style="display: flex;">Stay</span>' . $stay . '</li></ul> <br /><br /><ul class="dotted_list"><li>Region - <b>' . $result[0]->trek_region_state . '</b></li><li>Duration - <b>' . $result[0]->trek_days . ' Days</b></li><li>Grade - <b>' . $result[0]->trek_grade . '</b></li><li>Max Altitude - <b>' . $result[0]->trek_altitude . ' Ft.</b></li><li>Approx Trekking Km - <b>' . $result[0]->trek_distance . ' Kms.</b></li></ul>';

            if (isset($result[0]->trek_video_about_url)) {
                $trek_details_hero .= '<div class="video"><iframe width="100%" height="540" src="' . $result[0]->trek_video_about_url . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
            }


            $trek_details_hero .= '<div class="marbt-0 pt-par aboutTrek-container">' . $col1 . ' ...</div><div class="accordion_wrapper"><div class="accordion_panel"><div class="accordion_slide"><div class="marbt-0 aboutTrek-container">' . $col2 . '</div></div> <a href="#" class="button continue_read accordion_toggle">Continue Reading</a><img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></div></div>';


            echo $trek_details_hero;
        } else {
            $trek_details_hero = '<div>Sorry! We are not able to get the trek details</div>';
        }
    }

    function limit_text($text, $limit)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }


    public function amount_contact_departure($atts)
    {

        $id = $atts['id'];
        $type = $atts['type'];
        $trekDepText = 'Trek Dates';
        global $wpdb, $table_prefix;
        if ($type == 'user') {
            $query1 = "SELECT trek_cost,trek_service_tax,trek_filter_from,trek_filter_to,trek_assigned_to,trek_ins_policy_status,trek_discount_percentage,trek_discount_end_date,trek_filter_interests FROM wp_trektable_addtrekdetails where trek_adddetails_status=0 and trek_publish_status=0 and id='" . $id . "'";
        } else if ($type == 'preview') {
            $query1 = "SELECT trek_cost,trek_service_tax,trek_filter_from,trek_filter_to,trek_assigned_to,trek_ins_policy_status,trek_discount_percentage,trek_discount_end_date,trek_filter_interests FROM wp_trektable_addtrekdetails where trek_adddetails_status=0 and id='" . $id . "'";
        }

        $result1 = $wpdb->get_results($query1);
        //Trek dates - show text dynamically for cycling
        if (isset($result1[0]->trek_filter_interests)) {
            if ($result1[0]->trek_filter_interests == 'cycling') {
                $trekDepText = 'Tour Dates';
            }
        }

        $query = "SELECT * FROM wp_trektable_trek_departure where trek_departure_status='0' and trek_selected_trek='" . $id . "'";
        $result = $wpdb->get_results($query);

        $trek_amount = "";
        $trek_help = "";
        $contact = $result1[0]->trek_assigned_to;
        $assigned_contact_details = $wpdb->get_results('SELECT contact_email as cmail,contact_num1 as cnum1,contact_num2 as cnum2 FROM wp_trektable_contacts where id = ' . $contact . ' limit 1');
        if (empty($assigned_contact_details)) {
            $assigned_contact_details = $wpdb->get_results('SELECT trek_tth_mail as cmail,trek_tth_c1 as cnum1,trek_tth_c2 as cnum2 FROM wp_trek_pages_tth_contacts where id ="1" ');
        }
        if ($result1[0]->trek_cost != '') {

            $now = date('Y-m-d');
            if ($result1[0]->trek_cost) {
                if (($result1[0]->trek_discount_percentage > 0) && ($result1[0]->trek_discount_end_date >= $now)) {
                    $trekoff = $result1[0]->trek_discount_percentage;
                    $trekCost = $result1[0]->trek_cost;
                    $off = ($trekoff * $trekCost) / 100;
                    $val = $trekCost - $off;
                    $trk_price = '<h3 class="price"><i class="fa fa-rupee-sign"></i>' . number_format($val) . '<span> /Person</span></h3><ul class="dotted_list"><li class="setRedColor"><del class="setRedColor"><i class="fa fa-rupee-sign setRedColor"></i> ' . number_format($trekCost) . '</del> /Person</li></ul>';
                    $trk_book_btn = '<div class="buttons"> <a href="' . site_url() . '/booking?trek=' . $id . '"><div class="button"> Book Now <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></div></a><a href="#tth_help_supp"><div class="button" id="trek-dates-pull-down"> ' . $trekDepText . ' <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></div></a></div>';
                } else {
                    $trk_price = '<h3 class="price"><i class="fa fa-rupee-sign"></i>' . number_format($result1[0]->trek_cost) . '<span> /Person</span></h3>';
                    $trk_book_btn = '<div class="buttons"> <a href="' . site_url() . '/booking?trek=' . $id . '"><div class="button"> Book Now <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></div></a><a href="#tth_help_supp"><div class="button" id="trek-dates-pull-down">' . $trekDepText . '  <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></div></a></div>';
                }
            } else {
                $trk_price = '<h6 class="price" style="font-size:17px;">Price not disclosed </h6>';
            }
        } else {
            $trk_price = '<h6 class="price" style="font-size:17px;"></h6>';
            $trk_book_btn = '<div class="buttons"> <a href="' . site_url() . '/contactus"><div class="button"> Contact Us <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></div></a><div class="button" id="trek-dates-pull-down">' . $trekDepText . ' <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></div></div>';
        }


        if (!empty($result)) {
            $trek_amount = '<div class="sidebar"><div class="overflow_auto" id="textBody">' . $trk_price . '<ul class="dotted_list"><li>' . $result1[0]->trek_service_tax . '</li><li>' . ucfirst(strtolower($result1[0]->trek_filter_from)) . ' to ' . ucfirst(strtolower($result1[0]->trek_filter_to)) . '</li><li>' . $result1[0]->trek_ins_policy_status . '</li></ul>' . $trk_book_btn . '';
        } else {
            $trek_amount = '<div class="sidebar"><div class="overflow_auto">' . $trk_price . '<ul class="dotted_list"><li></li><li></li><li></li></ul>' . $trk_book_btn . '';
        }


        if (!empty($result)) {
            $trek_help .= '<div class="widget"><h3 class="fancy_head" id="tth_help_supp">Help & Support</h3><ul class="contact_list" style="width:55%;"><li><i class="fa fa-phone"></i>' . $assigned_contact_details[0]->cnum1 . '</li><li><i class="fa fa-phone"></i>' . $assigned_contact_details[0]->cnum2 . '</li><li><i class="fa fa-envelope"></i>' . $assigned_contact_details[0]->cmail . '</li></ul><ul class="dotted_list" style="width:44%;"><li><u><a href="' . site_url() . '/customize_trip"> <p>Customise Trek</p></a></u></li><li id="cscancel"><a href="#tab4-content"><u>Cost & Cancellation Terms</u></a></li><li style="display:none;"><u>Risk & Respond </u></div>';
        } else {
            $trek_help .= '<div class="widget"><h3 class="fancy_head" id="tth_help_supp">Help & Support</h3><ul class="contact_list" style="width:55%;"><li><i class="fa fa-phone"></i>' . $assigned_contact_details[0]->cnum1 . '</li><li><i class="fa fa-phone"></i>' . $assigned_contact_details[0]->cnum2 . '</li><li><i class="fa fa-envelope"></i>' . $assigned_contact_details[0]->cmail . '</li></ul><ul class="dotted_list"><li><u>Customize the Trip</u></li><li><u>Cost &amp; Cancellation Terms</u></li><li><u>Risk &amp; Respond</u></li></ul></div>';
        }
        echo $trek_amount;

        echo $trek_help;
        $this->amount_contact_departure_fixture($id);
    }

    public function amount_contact_departure_fixture($atts)
    {

        $id = $atts;
        global $wpdb, $table_prefix;


        $query = "SELECT
  wp_trektable_trek_departure.*,
  COUNT(wp_trektable_trekkers_list.id) AS Total
FROM
  wp_trektable_trek_departure
LEFT JOIN wp_trektable_trekkers_list ON wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date
and (wp_trektable_trekkers_list.trek_trekker_status !=1 or wp_trektable_trekkers_list.trek_trekker_status is null)
where wp_trektable_trek_departure.trek_selected_trek = '" . $id . "' and wp_trektable_trek_departure.trek_departure_status=0 and wp_trektable_trek_departure.trek_start_date>CURRENT_DATE()
GROUP BY wp_trektable_trek_departure.id,wp_trektable_trek_departure.trek_selected_trek order by
wp_trektable_trek_departure.trek_start_date asc;";
        $result = $wpdb->get_results($query);


        $trek_fixture = "";

        if (!empty($result)) {

            $alldeparturecount = count($result);
            $trek_fixture = '<div class="widget shockwave"><h3 class="fancy_head" id="radio_group_fixd">Fixed Departure</h3><div class="radio_group" id="radio_group"><div class="radio"> <input type="radio" class="form_radio" name="view" id="list_view" checked /> <label for="list_view">List View</label></div><div class="radio" > <input type="radio" class="form_radio" name="view" id="month_view" /> <label for="month_view">Month View</label></div></div><div class="vertical_scroll"><table class="schedule_table"><thead><tr><th>Date</th><th>Status</th></tr></thead><tbody>';



            for ($k = 0; $k < $alldeparturecount; $k++) {
                $totalSeats = $result[$k]->trek_seats;
                $totalReserverd = $result[$k]->Total;
                $percentage = ($totalReserverd / $totalSeats) * 100;
                $k1 = strtotime($result[$k]->trek_start_date);
                $l1 = strtotime($result[$k]->trek_end_date);
                $k2 = date('j M ', $k1);
                $l2 = date('j M Y', $l1);
                if ($percentage <= 50) {
                    $trek_fixture .= '<tr><td>' . $k2 . ' - ' . $l2 . '<span class="event_dep"> &nbsp;' . $result[$k]->dep_event_name . '</span></td><td><span class="open">Open </span></td></tr>';
                } else if ($percentage >= 100) {
                    $trek_fixture .= '<tr><td>' . $k2 . ' - ' . $l2 . '<span class="event_dep"> &nbsp;' . $result[$k]->dep_event_name . '</span></td><td><span class="close" style="color:red;">Full </span></td></tr>';
                } else {
                    $trek_fixture .= '<tr><td>' . $k2 . ' - ' . $l2 . '<span class="event_dep"> &nbsp;' . $result[$k]->dep_event_name . '</span></td><td><span class="close">Closing </span></td></tr>';
                }
            }
            $trek_fixture .= '</tbody></table></div><div class="calendar_wrapper"><div id="calendar"></div></div></div>';
        } else {
            echo 'No departure found.<a href="' . site_url() . '/contactus"><span style="margin-left:10px;"> <u>Contact Us</u> <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></span></a>';
        }
        echo $trek_fixture;

        if (!empty($result)) {

            $alldeparturecount = count($result);
            $trek_fixture1 = '<div class="widget shockwave-mob"><h3 class="fancy_head" id="radio_group_fixd">Fixed Departure</h3><div class="radio_group" id="radio_group"><div class="radio"> <input type="radio" class="form_radio" name="view" id="list_view" checked /> <label for="list_view">List View</label></div><div class="radio" > <input type="radio" class="form_radio" name="view" id="month_view" /> <label for="month_view">Month View</label></div></div><div class="vertical_scroll"><table class="schedule_table"><thead><tr><th>Date</th><th>Status</th></tr></thead><tbody>';



            for ($k = 0; $k < $alldeparturecount; $k++) {
                $totalSeats = $result[$k]->trek_seats;
                $totalReserverd = $result[$k]->Total;
                $percentage = ($totalReserverd / $totalSeats) * 100;
                $k1 = strtotime($result[$k]->trek_start_date);
                $l1 = strtotime($result[$k]->trek_end_date);
                $k2 = date('j M ', $k1);
                $l2 = date('j M Y', $l1);
                if ($percentage <= 50) {
                    $trek_fixture1 .= '<tr><td>' . $k2 . ' - ' . $l2 . '<span class="event_dep"> &nbsp;' . $result[$k]->dep_event_name . '</span></td><td><span class="open">Open </span></td></tr>';
                } else if ($percentage >= 100) {
                    $trek_fixture1 .= '<tr><td>' . $k2 . ' - ' . $l2 . '<span class="event_dep"> &nbsp;' . $result[$k]->dep_event_name . '</span></td><td><span class="close" style="color:red;">Full </span></td></tr>';
                } else {
                    $trek_fixture1 .= '<tr><td>' . $k2 . ' - ' . $l2 . '<span class="event_dep"> &nbsp;' . $result[$k]->dep_event_name . '</span></td><td><span class="close">Closing </span></td></tr>';
                }
            }
            $trek_fixture1 .= '</tbody></table></div><div class="calendar_wrapper"><div id="calendar"></div></div></div>';
        } else {
            echo 'No departure found.<a href="' . site_url() . '/contactus"><span style="margin-left:10px;"> <u>Contact Us</u> <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></span></a>';
        }
        echo $trek_fixture1;
    }





    public function trigger_action()
    {
        add_shortcode('view_details', array($this, 'contact_form_template'));
        add_shortcode('all_treks', array($this, 'all_treks_shortcode'));
        add_shortcode('all_treks_new_template', array($this, 'all_treks_shortcode_new_template'));
        add_shortcode('view_all_treks', array($this, 'view_all_treks_shortcode'));
        add_shortcode('booking', array($this, 'booking'));
        add_shortcode('test', array($this, 'testing'));
        add_shortcode('amount_contact_departure', array($this, 'amount_contact_departure'));
        add_shortcode('amount_contact_departure_fixture', array($this, 'amount_contact_departure_fixture'));
        add_shortcode('similar_treks', array($this, 'similar_treks'));
    }
}

if (class_exists('trekPlugin')) {
    $afp = new trekPlugin();
    $afp->load_user_assets();
    $afp->load_admin_assets();
    $afp->startup();
    $afp->trigger_action();
}
register_activation_hook(__FILE__, array($afp, 'activate'));
register_deactivation_hook(__FILE__, array($afp, 'deactivate'));


function create_posttype() {
 
    register_post_type( 'notes',
        array(
            'labels' => array(
                'name' => __( 'Notes' ),
                'singular_name' => __( 'Note' )
            ),
            'public' => false,
            'has_archive' => false,
            'rewrite' => array('slug' => 'notes'),
            'show_in_rest' => false,
 
        )
    );
}
add_action( 'init', 'create_posttype' );
function add_notes_metaboxes() {
	add_meta_box(
		'entry_notes',
		'Note',
		'render_meta_box_content',
		'notes',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'add_notes_metaboxes' );
add_action( 'save_post', 'save' );
function render_meta_box_content( $post ) {
    wp_nonce_field( 'notes_box', 'notes_box_nonce' );

    $value = get_post_meta( $post->ID, 'entry_id', true );
    ?>
    <label for="entry_id">Description for this field</label>
    <input type="text" id="entry_id" name="entry_id" value="<?php echo esc_attr( $value ); ?>" size="25" />
    <?php
    $value = get_post_meta( $post->ID, 'status', true );
    ?>
    <br>
    <label for="status">Description for this field</label>
    <input type="text" id="status" name="status" value="<?php echo esc_attr( $value ); ?>" size="25" />
    <?php
}

function save( $post_id ) {
    if ( ! isset( $_POST['notes_box_nonce'] ) ) {
        return $post_id;
    }
    $nonce = $_POST['notes_box_nonce'];
    if ( ! wp_verify_nonce( $nonce, 'notes_box' ) ) {
        return $post_id;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    }
    
    $mydata = sanitize_text_field( $_POST['entry_id'] );
    update_post_meta( $post_id, 'entry_id', $mydata );
    $mydata = sanitize_text_field( $_POST['status'] );
    update_post_meta( $post_id, 'status', $mydata );
}











function create_posttype_growth() {
 
    register_post_type( 'growth',
        array(
            'labels' => array(
                'name' => __( 'Growth and Development' ),
                'singular_name' => __( 'Note' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'growth'),
            'show_in_rest' => true,
            'show_in_menu' => 'treks_home',
            'menu_position' => -1
        )
    );
}
add_action( 'init', 'create_posttype_growth');

function add_growth_metaboxes() {
	add_meta_box(
		'entry_growth',
		'Date',
		'render_meta_box_content_growth',
		'growth',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'add_growth_metaboxes' );
add_action( 'save_post', 'save_growth' );
function render_meta_box_content_growth( $post ) {
    wp_nonce_field( 'growth_box', 'growth_box_nonce' );

    $value = get_post_meta( $post->ID, 'date', true );
    ?>
    <label for="date">Description for this field :</label>
    <input type="hidden" name="date_val" value="<?php echo esc_attr( $value ); ?>" />
    <select name="date" id="yearpicker"></select>
    <?php
    $value = get_post_meta( $post->ID, 'status', true );
    ?>
    <script>
        for (i = new Date().getFullYear(); i > 1900; i--)
{
    jQuery('#yearpicker').append(jQuery('<option />').val(i).html(i));
}
document.querySelector("#yearpicker").value = document.querySelector("[name='date_val']").value;
    </script>
    <?php
}

function save_growth( $post_id ) {
    if ( ! isset( $_POST['growth_box_nonce'] ) ) {
        return $post_id;
    }
    $nonce = $_POST['growth_box_nonce'];
    if ( ! wp_verify_nonce( $nonce, 'growth_box' ) ) {
        return $post_id;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    }
    
    $mydata = sanitize_text_field( $_POST['date'] );
    update_post_meta( $post_id, 'date', $mydata );
    $mydata = sanitize_text_field( $_POST['status'] );
    update_post_meta( $post_id, 'status', $mydata );
}

add_filter( 'manage_growth_posts_columns', 'set_custom_edit_growth_columns' );
function set_custom_edit_growth_columns($columns) {
    unset( $columns['author'], $columns['date'] );
    $columns['year'] = 'Year';
    return $columns;
}

add_action( 'manage_growth_posts_custom_column' , 'custom_growth_column', 10, 2 );
function custom_growth_column( $column, $post_id ) {
    switch ( $column ) {
        case 'year' :
            $terms = get_post_meta( $post_id );
            echo($terms['date'][0]);
            break;
    }
}

add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'growth') return false;
    return $current_status;
}

function your_theme_new_customizer_settings($wp_customize) {
    //<img src='<?php echo get_theme_mod('footer_logo');' />
    $wp_customize->add_setting( 'footer_logo', array(
        // 'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_control', array(
        'label' => 'Upload Logo',
        'priority' => 90,
        'section' => 'title_tagline',
        'settings' => 'footer_logo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                    )
    )));
}
add_action('customize_register', 'your_theme_new_customizer_settings');