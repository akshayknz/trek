<?php

/**
 * @package TrekPlugin
 */
$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once $path . '/wp-load.php';
global $wpdb;
$ptbd_table_name = '';
if (isset($_POST['action'])) {

    if ($_POST['action'] == 'registerNewUser') {
        $user_first_name = $_POST['user_first_name'];
        $user_last_name = $_POST['user_last_name'];
        $user_phone_number = $_POST['user_phone_number'];
        $user_gender = $_POST['user_gender'];
        $user_email = $_POST['user_email'];
        $user_weight_kg = $_POST['user_weight_kg'];
        $user_height_cm = $_POST['user_height_cm'];
        $user_pass = $_POST['user_pass'];
        $reg_phone_number1 = $_POST['reg_phone_number1'];
        $reg_trekkers_dob = $_POST['reg_trekkers_dob'];
        $reg_trekkers_city = $_POST['reg_trekkers_city'];
        $reg_trekkers_state = $_POST['reg_trekkers_state'];
        $reg_trekkers_country = $_POST['reg_trekkers_country'];
        $user_enc_pass = md5($user_pass);
        $ptbd_table_name = $wpdb->prefix . 'trektable_userdetails';
        // $ptbd_table_name1 = $wpdb->prefix . 'trektable_bookings';
        $ptbd_table_name2 = $wpdb->prefix . 'users';
        $ptbd_table_name3 = $wpdb->prefix . 'usermeta';
        $userid = '';

        // create a column in userdetails table with name as referenceId

        $data1 = $wpdb->get_results('SELECT id FROM ' . $ptbd_table_name2 . ' where  user_email ="' . $user_email . '" limit 1');
        $data = $wpdb->get_results('SELECT id,trek_user_id,trek_user_email FROM ' . $ptbd_table_name . ' where trek_user_status=0 and trek_user_email ="' . $user_email . '" limit 1');
        //check whether that user exist on users table

        $timestamp = time();
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 5; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $userid = 'US' . $timestamp . $randomString;

        if (empty($data1)) {
            //insert into wordpress user table
            //1. insert into user table
            //create user nice name

            $new_str1 = str_replace(' ', '', $user_first_name);
            $new_str2 = str_replace(' ', '', $user_last_name);
            $res = $new_str1 . $new_str2;
            $username = strtolower($res);
            $displayName = $user_first_name . ' ' . $user_last_name;

            $wpdb->insert('' . $ptbd_table_name2 . '', array(
                'user_login' => $userid, //ownerid
                'user_pass' => $user_enc_pass, //md5 password
                'user_nicename' => $username, // Booking details name without space and uppercase
                'user_email' => $user_email, //booking details
                'user_status' => 0, //default 0
                'display_name' => $displayName, //booking details

            ));
            //2. Insert into user_meta table (category)
            //Get last inserted id as $lsid
            $lsid = $wpdb->insert_id;
            $wpdb->insert('' . $ptbd_table_name3 . '', array(

                'user_id' => $lsid, //lsId
                'meta_key' => 'wp_capabilities',
                'meta_value' => 'a:1:{s:8:"customer";b:1;}',

            ));
            //3. insert into user_meta table (user level)

            $query = "INSERT INTO wp_usermeta
            (user_id, meta_key, meta_value)
            VALUES
            (" . $lsid . ", 'nickname', '" . $username . "'),
            (" . $lsid . ", 'first_name', '" . $user_first_name . "'),
            (" . $lsid . ", 'last_name', '" . $user_last_name . "'),
            (" . $lsid . ", 'description', ''),
            (" . $lsid . ", 'rich_editing', 'true'),
            (" . $lsid . ", 'syntax_highlighting', 'true'),
            (" . $lsid . ", 'comment_shortcuts', 'false'),
            (" . $lsid . ", 'admin_color', 'fresh'),
            (" . $lsid . ", 'use_ssl', '0'),
            (" . $lsid . ", 'show_admin_bar_front', 'true'),
            (" . $lsid . ", 'locale', ''),
            (" . $lsid . ", 'wp_user_level', '0'),
            (" . $lsid . ", 'dismissed_wp_pointers', '')";

            // print_r($query);
            $result = $wpdb->get_results($query);

            // mailing function to send temp password $password

        }
        //check whether that user exist on userdetails table
        if (empty($data)) {
            //insert booking user personal details inside userdetails table

            if (isset($lsid)) {
                $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_user_first_name' => $user_first_name,
                    'trek_user_last_name' => $user_last_name,
                    'trek_user_contact_number' => $user_phone_number,
                    'trek_user_email' => $user_email,
                    'trek_user_gender' => $user_gender,
                    'trek_user_emergency_number' => $reg_phone_number1,
                    'trek_user_dob' => $reg_trekkers_dob,
                    'trek_user_weight' => $user_weight_kg,
                    'trek_user_height' => $user_height_cm,
                    'trek_user_country' => $reg_trekkers_country,
                    'trek_user_state' => $reg_trekkers_state,
                    'trek_user_city' => $reg_trekkers_city,
                    // 'trek_user_how_find' => $select_how,
                    'referenceId' => $lsid, //
                    // 'trek_user_trekked_with_us' => $select_before,
                    'trek_user_id' => $userid,

                ));
                wp_clear_auth_cookie();
                wp_set_current_user($lsid);
                wp_set_auth_cookie($lsid);
            } else if (!empty($data1)) {
                $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_user_first_name' => $user_first_name,
                    'trek_user_last_name' => $user_last_name,
                    'trek_user_contact_number' => $user_phone_number,
                    'trek_user_email' => $user_email,
                    'trek_user_gender' => $user_gender,
                    'trek_user_emergency_number' => $reg_phone_number1,
                    'trek_user_dob' => $reg_trekkers_dob,
                    'trek_user_weight' => $user_weight_kg,
                    'trek_user_height' => $user_height_cm,
                    'trek_user_country' => $reg_trekkers_country,
                    'trek_user_state' => $reg_trekkers_state,
                    'trek_user_city' => $reg_trekkers_city,
                    // 'trek_user_how_find' => $select_how,
                    'referenceId' => $data1[0]->id, //
                    // 'trek_user_trekked_with_us' => $select_before,
                    'trek_user_id' => $userid,
                ));
                wp_clear_auth_cookie();
                wp_set_current_user($data1[0]->id);
                wp_set_auth_cookie($data1[0]->id);
            }

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->info = 'new user registered';
            echo json_encode($result);
            exit;
        } else {

            //Update column referenceId with user table primary key $data[0]->id
            if (isset($lsid)) {
                $wpdb->update('' . $ptbd_table_name2 . '', array(
                    'referenceId' => $lsid,
                ), array('trek_user_email' => $user_email));
                wp_clear_auth_cookie();
                wp_set_current_user($lsid);
                wp_set_auth_cookie($lsid);
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'reload';
                $result->info = 'user  registered';
                echo json_encode($result);
                exit;
            } else {
                $result = new stdClass();
                $result->statusCode = 400;
                $result->message = 'failed';
                $result->result = 'reload';
                $result->info = 'user already registered';
                echo json_encode($result);
                exit;
            }
        }
    }

    function registerTrekker($fname, $lname, $pnum, $pemnum, $gender, $mail, $weight, $height, $dob, $city, $country, $state)
    {
        global $wpdb;
        $user_first_name = $fname;
        $user_last_name = $lname;
        $user_phone_number = $pnum;
        $reg_phone_number1 = $pemnum;
        $user_gender = $gender;
        $user_email = $mail;
        $user_weight_kg = $weight;
        $user_height_cm = $height;

        $reg_trekkers_dob = $dob;
        $reg_trekkers_city = $city;
        $reg_trekkers_country = $country;
        $reg_trekkers_state = $state;

        $timestamp = time();
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $user_pass = $randomString;

        // $user_enc_pass = md5($user_pass);

        $ptbd_table_name = $wpdb->prefix . 'trektable_userdetails';
        // $ptbd_table_name1 = $wpdb->prefix . 'trektable_bookings';
        $ptbd_table_name2 = $wpdb->prefix . 'users';
        $ptbd_table_name3 = $wpdb->prefix . 'usermeta';

        $userid = '';

        // create a column in userdetails table with name as referenceId

        $data1 = $wpdb->get_results('SELECT id FROM ' . $ptbd_table_name2 . ' where  user_email ="' . $user_email . '" limit 1');

        $data = $wpdb->get_results('SELECT id,trek_user_id,trek_user_email FROM ' . $ptbd_table_name . ' where trek_user_status=0 and trek_user_email ="' . $user_email . '" limit 1');
        //check whether that user exist on users table
        if (!empty($data1)) {
            return 'success';
            exit;
        }
        $timestamp = time();
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 5; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $userid = 'US' . $timestamp . $randomString;

        if (empty($data1)) {
            //insert into wordpress user table
            //1. insert into user table
            //create user nice name

            $new_str1 = str_replace(' ', '', $user_first_name);
            $new_str2 = str_replace(' ', '', $user_last_name);
            $res = $new_str1 . $new_str2;
            $username = strtolower($res);
            $displayName = $user_first_name . ' ' . $user_last_name;

            $wpdb->insert('' . $ptbd_table_name2 . '', array(
                'user_login' => $userid, //ownerid
                'user_pass' => $user_pass, //md5 password
                'user_nicename' => $username, // Booking details name without space and uppercase
                'user_email' => $user_email, //booking details
                'user_status' => 0, //default 0
                'display_name' => $displayName, //booking details

            ));
            //2. Insert into user_meta table (category)
            //Get last inserted id as $lsid
            $lsid = $wpdb->insert_id;
            $wpdb->insert('' . $ptbd_table_name3 . '', array(

                'user_id' => $lsid, //lsId
                'meta_key' => 'wp_capabilities',
                'meta_value' => 'a:1:{s:8:"customer";b:1;}',

            ));
            //3. insert into user_meta table (user level)

            $query = "INSERT INTO wp_usermeta
            (user_id, meta_key, meta_value)
            VALUES
            (" . $lsid . ", 'nickname', '" . $username . "'),
            (" . $lsid . ", 'first_name', '" . $user_first_name . "'),
            (" . $lsid . ", 'last_name', '" . $user_last_name . "'),
            (" . $lsid . ", 'description', ''),
            (" . $lsid . ", 'rich_editing', 'true'),
            (" . $lsid . ", 'syntax_highlighting', 'true'),
            (" . $lsid . ", 'comment_shortcuts', 'false'),
            (" . $lsid . ", 'admin_color', 'fresh'),
            (" . $lsid . ", 'use_ssl', '0'),
            (" . $lsid . ", 'show_admin_bar_front', 'true'),
            (" . $lsid . ", 'locale', ''),
            (" . $lsid . ", 'wp_user_level', '0'),
            (" . $lsid . ", 'dismissed_wp_pointers', '')";

            // print_r($query);
            $result = $wpdb->get_results($query);

            // mailing function to send temp password $password

        }
        //check whether that user exist on userdetails table
        if (empty($data)) {
            //insert booking user personal details inside userdetails table

            if (isset($lsid)) {
                $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_user_first_name' => $user_first_name,
                    'trek_user_last_name' => $user_last_name,
                    'trek_user_contact_number' => $user_phone_number,
                    'trek_user_email' => $user_email,
                    'trek_user_gender' => $user_gender,
                    'trek_user_emergency_number' => $reg_phone_number1,
                    'trek_user_dob' => $reg_trekkers_dob,
                    'trek_user_weight' => $user_weight_kg,
                    'trek_user_height' => $user_height_cm,
                    'trek_user_country' => $reg_trekkers_country,
                    'trek_user_state' => $reg_trekkers_state,
                    'trek_user_city' => $reg_trekkers_city,
                    // 'trek_user_how_find' => $select_how,
                    'referenceId' => $lsid, //
                    // 'trek_user_trekked_with_us' => $select_before,
                    'trek_user_id' => $userid,

                ));
            } else if (!empty($data1)) {
                $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_user_first_name' => $user_first_name,
                    'trek_user_last_name' => $user_last_name,
                    'trek_user_contact_number' => $user_phone_number,
                    'trek_user_email' => $user_email,
                    'trek_user_gender' => $user_gender,
                    'trek_user_emergency_number' => $reg_phone_number1,
                    'trek_user_dob' => $reg_trekkers_dob,
                    'trek_user_weight' => $user_weight_kg,
                    'trek_user_height' => $user_height_cm,
                    'trek_user_country' => $reg_trekkers_country,
                    'trek_user_state' => $reg_trekkers_state,
                    'trek_user_city' => $reg_trekkers_city,
                    // 'trek_user_how_find' => $select_how,
                    'referenceId' => $data1[0]->id, //
                    // 'trek_user_trekked_with_us' => $select_before,
                    'trek_user_id' => $userid,
                ));
            }
            return 'success';
            exit;
        } else {

            //Update column referenceId with user table primary key $data[0]->id
            if (isset($lsid)) {
                $wpdb->update('' . $ptbd_table_name2 . '', array(
                    'referenceId' => $lsid,
                ), array('trek_user_email' => $user_email));

                return 'success';
                exit;
            } else {
                return 'success';
                exit;
            }
        }
    }

    if ($_POST['action'] == 'checkExistance') {
        if (is_user_logged_in()) {
            $user_email = $_POST['mail'];

            $ptbd_table_name = $wpdb->prefix . 'trektable_userdetails';
            $ptbd_table_name2 = $wpdb->prefix . 'users';

            $data1 = $wpdb->get_results('SELECT id FROM ' . $ptbd_table_name2 . ' where  user_email ="' . $user_email . '" order by id desc limit 1');
            $data = $wpdb->get_results('SELECT trek_user_first_name as trek_tfname,trek_user_last_name as trek_tlname,trek_user_contact_number,trek_user_email,trek_user_gender,trek_user_emergency_number,trek_user_dob,trek_user_weight,trek_user_height,trek_user_country,trek_user_state,trek_user_city FROM ' . $ptbd_table_name . ' where trek_user_status=0 and trek_user_email ="' . $user_email . '" order by id desc limit 1');

            //check whether that user exist on users table
            if (empty($data1) || empty($data)) {
                $result = new stdClass();
                $result->statusCode = 400;
                $result->message = 'not existed';
                $result->info = 'Need registration';
                echo json_encode($result);
                exit;
            } else {
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->info = 'User Found';
                $result->data = $data[0];
                echo json_encode($result);
                exit;
            }
        } else {
            // not logged in
            $result = new stdClass();
            $result->statusCode = 404;
            $result->message = 'failed';
            $result->info = 'Authentication failed';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'loginUser') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user_enc_pass = md5($password);

        $ptbd_table_name = $wpdb->prefix . 'users';

        // create a column in userdetails table with name as referenceId

        $data = $wpdb->get_results('SELECT ID FROM ' . $ptbd_table_name . ' where  user_email ="' . $email . '" and user_pass="' . $user_enc_pass . '" limit 1');

        if (empty($data)) {

            $result = new stdClass();
            $result->statusCode = 400;
            $result->message = 'failed';
            $result->info = 'Login failed';
            echo json_encode($result);
            exit;
        } else if (($data[0]->ID != '')) {

            wp_clear_auth_cookie();
            wp_set_current_user($data[0]->ID);
            wp_set_auth_cookie($data[0]->ID);

            // $redirect_to = user_admin_url();
            // wp_safe_redirect( $redirect_to );

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->info = 'Successfully authenticated';
            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->message = 'failed';
            $result->info = 'Authentication declined';
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'logout') {
        wp_clear_auth_cookie();
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'success';
        $result->info = 'session expired';
        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'addTrekBookingDetails') {

        $select_trek = $_POST['select_trek'];
        $select_date = $_POST['select_date'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $Phone = $_POST['Phone'];
        $mail = $_POST['mail'];
        $select_gender = $_POST['select_gender'];
        $emergency = $_POST['emergency'];
        $dob = $_POST['dob'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $select_country = $_POST['select_country'];
        $State = $_POST['State'];
        $City = $_POST['City'];
        $drpNoOfTrekker = $_POST['drpNoOfTrekker'];
        $select_how = $_POST['select_how'];
        $select_before = $_POST['select_before'];
        $terms = $_POST['terms'];
        $insurance = $_POST['insurance'];
        $txtnote = $_POST['txtnote'];
        $trek_category = $_POST['trek_category'];

        $ptbd_table_name = $wpdb->prefix . 'trektable_userdetails';
        $ptbd_table_name1 = $wpdb->prefix . 'trektable_bookings';
        $ptbd_table_name2 = $wpdb->prefix . 'users';
        $ptbd_table_name3 = $wpdb->prefix . 'usermeta';

        $userid = '';
        $password = '';
        $bookingid = '';
        //Get user email

        // create a column in userdetails table with name as referenceId

        $data1 = $wpdb->get_results('SELECT id FROM ' . $ptbd_table_name2 . ' where  user_email ="' . $mail . '" limit 1');
        $data = $wpdb->get_results('SELECT id,trek_user_id,trek_user_email FROM ' . $ptbd_table_name . ' where trek_user_status=0 and trek_user_email ="' . $mail . '" limit 1');
        //check whether that user exist on users table

        $timestamp = time();
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 5; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $userid = 'US' . $timestamp . $randomString;
        $password = rand(111, 999) . $randomString . rand(111, 999);

        if (empty($data1)) {
            //insert into wordpress user table
            //1. insert into user table
            //create user nice name

            $new_str1 = str_replace(' ', '', $firstname);
            $new_str2 = str_replace(' ', '', $lastname);
            $res = $new_str1 . $new_str2;
            $username = strtolower($res);
            $displayName = $firstname . ' ' . $lastname;

            $wpdb->insert('' . $ptbd_table_name2 . '', array(
                'user_login' => $userid, //ownerid
                'user_pass' => md5($password), //md5 password
                'user_nicename' => $username, // Booking details name without space and uppercase
                'user_email' => $mail, //booking details
                'user_status' => 0, //default 0
                'display_name' => $displayName, //booking details

            ));
            //2. Insert into user_meta table (category)
            //Get last inserted id as $lsid
            $lsid = $wpdb->insert_id;
            $wpdb->insert('' . $ptbd_table_name3 . '', array(

                'user_id' => $lsid, //lsId
                'meta_key' => 'wp_capabilities',
                'meta_value' => 'a:1:{s:8:"customer";b:1;}',

            ));
            //3. insert into user_meta table (user level)

            $query = "INSERT INTO wp_usermeta
            (user_id, meta_key, meta_value)
            VALUES
            (" . $lsid . ", 'nickname', '" . $username . "'),
            (" . $lsid . ", 'first_name', '" . $firstname . "'),
            (" . $lsid . ", 'last_name', '" . $lastname . "'),
            (" . $lsid . ", 'description', ''),
            (" . $lsid . ", 'rich_editing', 'true'),
            (" . $lsid . ", 'syntax_highlighting', 'true'),
            (" . $lsid . ", 'comment_shortcuts', 'false'),
            (" . $lsid . ", 'admin_color', 'fresh'),
            (" . $lsid . ", 'use_ssl', '0'),
			(" . $lsid . ", 'show_admin_bar_front', 'true'),
            (" . $lsid . ", 'locale', ''),
            (" . $lsid . ", 'wp_user_level', '0'),
            (" . $lsid . ", 'dismissed_wp_pointers', '')";

            // print_r($query);
            $result = $wpdb->get_results($query);

            // mailing function to send temp password $password

        }
        //check whether that user exist on userdetails table
        if (empty($data)) {
            //insert booking user personal details inside userdetails table

            if (isset($lsid)) {
                $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_user_first_name' => $firstname,
                    'trek_user_last_name' => $lastname,
                    'trek_user_contact_number' => $Phone,
                    'trek_user_email' => $mail,
                    'trek_user_gender' => $select_gender,
                    'trek_user_emergency_number' => $emergency,
                    'trek_user_dob' => $dob,
                    'trek_user_weight' => $weight,
                    'trek_user_height' => $height,
                    'trek_user_country' => $select_country,
                    'trek_user_state' => $State,
                    'trek_user_city' => $City,
                    'trek_user_how_find' => $select_how,
                    'referenceId' => $lsid, //
                    'trek_user_trekked_with_us' => $select_before,
                    'trek_user_id' => $userid,

                ));
            } else if (!empty($data1)) {
                $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_user_first_name' => $firstname,
                    'trek_user_last_name' => $lastname,
                    'trek_user_contact_number' => $Phone,
                    'trek_user_email' => $mail,
                    'trek_user_gender' => $select_gender,
                    'trek_user_emergency_number' => $emergency,
                    'trek_user_dob' => $dob,
                    'trek_user_weight' => $weight,
                    'trek_user_height' => $height,
                    'trek_user_country' => $select_country,
                    'trek_user_state' => $State,
                    'trek_user_city' => $City,
                    'trek_user_how_find' => $select_how,
                    'referenceId' => $data1[0]->id, //
                    'trek_user_trekked_with_us' => $select_before,
                    'trek_user_id' => $userid,
                ));
            }

            $ownerid = $userid;
        } else {

            //Update column referenceId with user table primary key $data[0]->id
            if (isset($lsid)) {
                $wpdb->update('' . $ptbd_table_name2 . '', array(
                    'referenceId' => $lsid,
                ), array('trek_user_email' => $mail));
            } else if (!empty($data1)) {
                $wpdb->update('' . $ptbd_table_name2 . '', array(
                    'referenceId' => $data1[0]->id,
                ), array('trek_user_email' => $mail));
            }
        }

        //start session
        if (!empty($data)) {
            $ownerid = $data[0]->trek_user_id;
        }
        //insert new booking row
        for ($i = 0; $i < 8; $i++) {
            $index1 = rand(0, strlen($characters) - 1);
            $randomString1 .= $characters[$index1];
        }

        $bookingid = rand(11111, 99999) . $randomString1 . rand(11111, 99999);

        $data1 = $wpdb->get_results('SELECT id FROM ' . $ptbd_table_name1 . ' where trek_booking_status=0 and trek_booking_owner_id ="' . $ownerid . '" and trek_selected_trek_id="' . $select_trek . '" and trek_selected_departure_id="' . $select_date . '" and book_activity_status!=5');

        if (empty($data1)) {
            $wpdb->insert('' . $ptbd_table_name1 . '', array(
                'trek_selected_trek_id' => $select_trek,
                'trek_selected_departure_id' => $select_date,

                'trek_booking_id' => $bookingid,
                'trek_booking_owner_id' => $ownerid,
                'trek_trems_condition' => $terms,
                'trek_insurance' => $insurance,
                'trek_note' => $txtnote,
                'trek_category' => $trek_category,

            ));
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'reload';
            $result->userid = $ownerid;
            $result->bookingid = $bookingid;
            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'exist';
            echo json_encode($result);
            exit;
        }
    }

    //seat transfer

    if ($_POST['action'] == 'seatTransfer') {
        $flag = 0;
        $trek = $_POST['trek'];
        $dep = $_POST['dep'];
        $bookingId = $_POST['booking'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_departure';
        $query = "SELECT
  wp_trektable_trek_departure.*,
  COUNT(wp_trektable_trekkers_list.id) AS Total
FROM
  wp_trektable_trek_departure
LEFT JOIN wp_trektable_trekkers_list ON wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date
and (wp_trektable_trekkers_list.trek_trekker_status !=1 or wp_trektable_trekkers_list.trek_trekker_status is null)
where wp_trektable_trek_departure.trek_selected_trek = '" . $trek . "' and wp_trektable_trek_departure.id != '" . $dep . "' and wp_trektable_trek_departure.trek_departure_status!=1 and wp_trektable_trek_departure.trek_end_date >= CURDATE()
GROUP BY wp_trektable_trek_departure.id,wp_trektable_trek_departure.trek_selected_trek order by
wp_trektable_trek_departure.trek_start_date asc";
        $result = $wpdb->get_results($query);
        // print_r($query);
        if (!empty($result)) {
            $alldeparturecount = count($result);

            $departureDate = '';

            $departureDate .= '<input type="text" value="' . $bookingId . '" id="transferCurrentBooking" hidden>';
            $departureDate .= '<select id="trekDepartureSelect"><option value="">Select Departure</option>';
            for ($k = 0; $k < $alldeparturecount; $k++) {
                $trekSeats = '';
                $trekSeatsOccupied = '';
                $trekRemainingSeats = '';
                $trekSeatsPercentage = '';
                $trekSeats = $result[$k]->trek_seats;
                $trekSeatsOccupied = $result[$k]->Total;
                $trekRemainingSeats = $trekSeats - $trekSeatsOccupied;
                $trekSeatsPercentage = ($trekRemainingSeats / $trekSeats) * 100;
                $k1 = strtotime($result[$k]->trek_start_date);
                $l1 = strtotime($result[$k]->trek_end_date);
                $k2 = date('j M ', $k1);
                $l2 = date('j M Y', $l1);
                $m2 = $result[$k]->trek_section;

                if ($trekRemainingSeats < 0) {
                    $departureDate .= '<option value="' . $result[$k]->id . '" style="color:red;">';
                    $departureDate .= $k2;
                    $departureDate .= ' - ';
                    $departureDate .= $l2;
                    $departureDate .= ' : ';
                    $departureDate .= $m2;
                    $departureDate .= '</option>';
                } else if ($trekRemainingSeats == 0) {
                    $departureDate .= '<option value="' . $result[$k]->id . '" style="color:orange;">';
                    $departureDate .= $k2;
                    $departureDate .= ' - ';
                    $departureDate .= $l2;
                    $departureDate .= ' : ';
                    $departureDate .= $m2;
                    $departureDate .= '</option>';
                } else {
                    $departureDate .= '<option value="' . $result[$k]->id . '" style="color:green;">';
                    $departureDate .= $k2;
                    $departureDate .= ' - ';
                    $departureDate .= $l2;
                    $departureDate .= ' : ';
                    $departureDate .= $m2;
                    $departureDate .= '</option>';
                }
            }
            $departureDate .= '</select>';
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = 'Fetch';
            $result->info = $departureDate;

            echo json_encode($result);
            exit;
        } else {
            $departureDate .= '';

            $departureDate .= 'Seat Transfer is not possible now!';
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'Fetch';
            $result->info = $departureDate;
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'TransferNow') {
        $book = $_POST['book'];
        $date = $_POST['date'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_bookings';
        $ptbd_table_name1 = $wpdb->prefix . 'trektable_trekkers_list';
        $query = "select book_activity_status from " . $ptbd_table_name . " where trek_booking_status=0  and trek_booking_id='" . $book . "'";
        $result = $wpdb->get_results($query);
        // print_r($query);
        if (count($result) == 1) {
            // print_r("expression");
            $activityStatus = $result[0]->book_activity_status;
            if ($activityStatus == 0) {
                $wpdb->update('' . $ptbd_table_name . '', array(
                    'trek_selected_departure_id' => $date
                ), array('trek_booking_id' => '' . $book . '', 'trek_booking_status' => 0, 'book_activity_status' => 0));
                $wpdb->update('' . $ptbd_table_name1 . '', array(
                    'trek_selected_date' => $date
                ), array('trek_tbooking_id' => '' . $book . '', 'trek_trekker_status' => 0));

                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'update';
                $result->info = 'update action success';
                echo json_encode($result);
                exit;
            } else if ($activityStatus == 2) {
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'update1';
                $result->info = 'update action success';
                echo json_encode($result);
                exit;
            } else if ($activityStatus == 5) {
                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'update2';
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

    if ($_POST['action'] == 'getBatchDataUser') {
        $trek = $_POST['departure_id'];
        $start = $_POST['start_date'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_trek_departure';

        $query = "SELECT
  wp_trektable_trek_departure.*,
  COUNT(wp_trektable_trekkers_list.id) AS Total
FROM
  wp_trektable_trek_departure
LEFT JOIN wp_trektable_trekkers_list ON wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date
and (wp_trektable_trekkers_list.trek_trekker_status !=1 or wp_trektable_trekkers_list.trek_trekker_status is null)
where wp_trektable_trek_departure.trek_selected_trek = '" . $trek . "' and wp_trektable_trek_departure.id != '" . $dep . "' and wp_trektable_trek_departure.trek_departure_status!=1 and wp_trektable_trek_departure.trek_selected_trek='" . $trek . "' and trek_start_date='" . $start . "'
GROUP BY wp_trektable_trek_departure.id,wp_trektable_trek_departure.trek_selected_trek order by
wp_trektable_trek_departure.trek_section asc";
        $result = $wpdb->get_results($query);

        $cout = count($result);
        // print_r($query);
        if ($cout > 0) {
            $contentData = '';
            $contentData .= '<table><th>Batch</th><th>Remaining Seats</th><th>Event Based</th><th>status</th><th>Booking</th>';
            for ($k = 0; $k < $cout; $k++) {
                $trekSeats = '';
                $trekSeatsOccupied = '';
                $trekRemainingSeats = '';
                $trekSeatsPercentage = '';
                $trekSeats = $result[$k]->trek_seats;
                $trekSeatsOccupied = $result[$k]->Total;
                $trekRemainingSeats = $trekSeats - $trekSeatsOccupied;
                $trekSeatsPercentage = ($trekRemainingSeats / $trekSeats) * 100;
                $k1 = strtotime($result[$k]->trek_start_date);
                $l1 = strtotime($result[$k]->trek_end_date);
                $k2 = date('j M ', $k1);
                $l2 = date('j M Y', $l1);
                $m2 = $result[$k]->trek_section;
                $v2 = $result[$k]->id;
                $event = '';
                if (isset($result[$k]->dep_event_name)) {
                    $event = '<div id="';
                    $event .= $result[$k]->dep_event;
                    $event .= '" style="font-style:italic;color:green;cursor:pointer;" onclick="getEventDetails(this.id)">' . $result[$k]->dep_event_name . '</div>';
                } else {
                    $event = '<i>Regular</i>';
                }

                $contentData .= '<tr><td>' . $m2 . '</td>';
                $contentData .= '<td>' . $trekRemainingSeats . '</td>';
                $contentData .= '<td>' . $event . '</td>';
                if ($trekSeatsPercentage > 70) {
                    $contentData .= '<td style="color:green;">Open</td>';
                } else if (($trekSeatsPercentage < 70) && ($trekSeatsPercentage > 0)) {
                    $contentData .= '<td style="color:orange;">Closing</td>';
                } else if ($trekSeatsPercentage <= 0) {
                    $contentData .= '<td style="color:red;">Waiting List</td>';
                }
                $contentData .= '<td><a href="/trek/index.php/booking-page?trek=' . $result[$k]->trek_selected_trek . '&departure=' . $result[$k]->id . '" target="_blank"><button id="' . $v2 . '">Book Now</button></a></td></tr>';
            }
            $contentData .= '</table>';

            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'success';
            $result->result = $contentData;
            $result->info = 'success';
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

    if ($_POST['action'] == 'paymentDetails') {

        if (is_user_logged_in()) {
            $ownerid = $user_id = get_current_user_id();

            $ptbd_table_name = $wpdb->prefix . 'trektable_trekkers_list';
            $ptbd_table_name1 = $wpdb->prefix . 'trektable_bookings';

            $paymentId = $_POST['paymentId'];
            $orderId = $_POST['orderId'];
            $bookingId = $_POST['bookingId'];
            $participants = $_POST['participants'];
            $amount = $_POST['amount'];

            $data1 = $wpdb->get_results('SELECT trek_booking_id,trek_selected_trek_id,trek_selected_departure_id FROM ' . $ptbd_table_name1 . ' where trek_booking_status=0 and trek_booking_owner_id ="' . $ownerid . '" and trek_booking_id="' . $bookingId . '" and book_activity_status!=5');

            if (!empty($data1)) {
$singleamount=($amount/$participants);
                if ($wpdb->update('' . $ptbd_table_name1 . '', array(
                    'book_activity_status' => 7,'Amount' => $amount,'PaymentID' => $paymentId,
                ), array('trek_booking_id' => $bookingId))) {
                    if ($wpdb->update('' . $ptbd_table_name . '', array(
                        'payment_status' => 'paid','Amount' => $singleamount,'PaymentID' => $paymentId,
                    ), array('trek_tbooking_id' => $bookingId, 'trek_trekker_status' => 0))) {
                        $result = new stdClass();
                        $result->statusCode = 200;
                        $result->result = 'success';
                        $result->bookingId = $bookingId;
                        $result->participants = $participants;
                        $result->trek = $data1[0]->trek_selected_trek_id;
                        $result->date = $data1[0]->trek_selected_departure_id;
                        echo json_encode($result);
                        exit;
                    } else {
                        $result = new stdClass();
                        $result->statusCode = 400;
                        $result->result = 'failed-trekker';
                        echo json_encode($result);
                        exit;
                    }
                } else {
                    $result = new stdClass();
                    $result->statusCode = 400;
                    $result->result = 'failed-booking';
                    echo json_encode($result);
                    exit;
                }
            } else {

                $result = new stdClass();
                $result->statusCode = 404;
                $result->result = 'no booking';
                echo json_encode($result);
                exit;
            }
        } else {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->result = 'failed';
            $result->info = "Authentication failed";
            echo json_encode($result);
            exit;
        }
    }

    function getTrekkersDetailsOwnerfun($trek, $date, $mail)
    {
        global $wpdb;
        if (is_user_logged_in()) {
            $ownerid = get_current_user_id();
            $user_id = $ownerid;

            $user_meta = get_userdata($user_id);
            $user_roles = $user_meta->roles;
            $user_data = $user_meta->data;
            $user_role = $user_roles[0];
            $user_email = $user_data->user_email;
            $user_dp = $user_data->display_name;

            $ptbd_table_name3 = $wpdb->prefix . 'trektable_userdetails';

            $timestamp = time();
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < 5; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            $tktoken = 'TTH' . $timestamp . $randomString;

            $data = $wpdb->get_results('SELECT trek_user_first_name,trek_user_last_name,trek_user_contact_number,trek_user_email,trek_user_gender,trek_user_emergency_number,trek_user_dob,trek_user_weight,trek_user_height,trek_user_country,trek_user_state,trek_user_city FROM ' . $ptbd_table_name3 . ' where trek_user_status=0 and trek_user_email ="' . $user_email . '" order by id desc limit 1');

            //check whether that user exist on users table
            if (empty($data)) {
                $result = new stdClass();
                $result->statusCode = 400;
                $result->message = 'not existed';
                $result->info = 'Need registration';
                echo json_encode($result);
                exit;
            }

            $select_trek = $trek;
            $select_date = $date;
            $owner_mail = $mail;

            $ptbd_table_name = $wpdb->prefix . 'trektable_trekkers_list';
            $ptbd_table_name1 = $wpdb->prefix . 'trektable_bookings';
            $Tfname = $data[0]->trek_user_first_name;
            $Tlname = $data[0]->trek_user_last_name;
            $Tgender = $data[0]->trek_user_gender;
            $Tdob = $data[0]->trek_user_dob;
            $Tweight = $data[0]->trek_user_weight;
            $Theight = $data[0]->trek_user_height;
            $Tcity = $data[0]->trek_user_city;
            $Tstate = $data[0]->trek_user_state;
            $Tcountry = $data[0]->trek_user_country;
            // $Tidentity = $data[0]->;
            $Tcontact = $data[0]->trek_user_contact_number;
            $Temail = $data[0]->trek_user_email;
            $Temergency = $data[0]->trek_user_emergency_number;

            $regStatus = registerTrekker($Tfname, $Tlname, $Tcontact, $Temergency, $Tgender, $Temail, $Tweight, $Theight, $Tdob, $Tcity, $Tcountry, $Tstate);

            for ($i = 0; $i < 8; $i++) {
                $index1 = rand(0, strlen($characters) - 1);
                $randomString1 .= $characters[$index1];
            }

            $bookingid = time() . $randomString1 . rand(11111, 99999);

            $data1 = $wpdb->get_results('SELECT trek_booking_id FROM ' . $ptbd_table_name1 . ' where trek_booking_status=0 and trek_booking_owner_id ="' . $ownerid . '" and trek_selected_trek_id="' . $select_trek . '" and trek_selected_departure_id="' . $select_date . '" and book_activity_status!=5');

            if (empty($data1)) {
                $test_res = $wpdb->insert('' . $ptbd_table_name1 . '', array(
                    'trek_selected_trek_id' => $select_trek,
                    'trek_selected_departure_id' => $select_date,
                    'fname' => $user_dp,
                    'lname' => $user_role,
                    'email' => $user_email,
                    'trek_booking_id' => $bookingid,
                    'trek_booking_owner_id' => $ownerid,
                    'trek_trems_condition' => 'nan',
                    'trek_insurance' => 'nan',
                    'trek_note' => 'nan',
                    'trek_category' => 'nan',

                ));

                if (!$test_res) {
                    $result = new stdClass();
                    $result->statusCode = 404;
                    $result->message = 'failed';
                    echo json_encode($result);
                    die;
                }

                $result_check = $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_tfname' => $Tfname, 'trek_tlname' => $Tlname, 'trek_tbooking_id' => $bookingid,
                    'trek_tcontact_number' => $Tcontact,
                    'trek_tgender' => $Tgender,
                    'trek_dob' => $Tdob,
                    'trek_tweight' => $Tweight,
                    'trek_theight' => $Theight,
                    'trek_selected_trek' => $select_trek,
                    'trek_selected_date' => $select_date,
                    'trek_tcity' => $Tcity,
                    'trek_tstate' => $Tstate,
                    'trek_tcountry' => $Tcountry,
                    'trek_identity' => $Tidentity,
                    'owner_reference' => $ownerid,
                    'trek_uid' => $Temail,
                    'trekker_token' => $tktoken,
                    'trek_tcontact_emg_number' => $Temergency,
                ));

                if ($result_check) {
                    $result = new stdClass();
                    $result->statusCode = 200;
                    $result->message = 'success';
                    $result->result = 'inserted';
                    $result->participant = $Tfname;
                    $result->participant1 = $Tlname;
                    $result->trekker = $tktoken;
                    echo json_encode($result);
                    die;
                } else {
                    $result = new stdClass();
                    $result->statusCode = 404;
                    $result->message = 'failed';
                    echo json_encode($result);
                    die;
                }
            } else {

                //check person already added or not

                $bookingid = $data1[0]->trek_booking_id;

                $dataTrekList = $wpdb->get_results('SELECT id FROM ' . $ptbd_table_name . ' where trek_trekker_status=0 and trek_uid ="' . $Temail . '" and trek_tbooking_id="' . $bookingid . '"');

                if (!empty($dataTrekList)) {
                    $result = new stdClass();
                    $result->statusCode = 408;
                    $result->message = 'person already added for this trek';
                    echo json_encode($result);
                    die;
                }

                $result_check = $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_tfname' => $Tfname, 'trek_tlname' => $Tlname, 'trek_tbooking_id' => $bookingid,
                    'trek_tcontact_number' => $Tcontact,
                    'trek_tgender' => $Tgender,
                    'trek_dob' => $Tdob,
                    'trek_tweight' => $Tweight,
                    'trek_theight' => $Theight,
                    'trek_selected_trek' => $select_trek,
                    'trek_selected_date' => $select_date,
                    'trek_tcity' => $Tcity,
                    'trek_tstate' => $Tstate,
                    'trek_tcountry' => $Tcountry,
                    'trek_identity' => $Tidentity,
                    'owner_reference' => $ownerid,
                    'trek_uid' => $Temail,
                    'trekker_token' => $tktoken,
                    'trek_tcontact_emg_number' => $Temergency,
                ));

                if ($result_check) {
                    $result = new stdClass();
                    $result->statusCode = 200;
                    $result->message = 'success';
                    $result->result = 'inserted';
                    $result->participant = $Tfname;
                    $result->participant1 = $Tlname;
                    $result->trekker = $tktoken;
                    echo json_encode($result);
                    die;
                } else {
                    $result = new stdClass();
                    $result->statusCode = 404;
                    $result->message = 'failed';
                    $result->Tid = $Tid;
                    echo json_encode($result);
                    die;
                }
            }
        } else {
            $result = new stdClass();
            $result->statusCode = 405;
            $result->message = 'failed';
            $result->info = "Authentication failed";
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getTrekkersDetails') {

        if (is_user_logged_in()) {
            $ownerid = $user_id = get_current_user_id();
            $ptbd_table_name = $wpdb->prefix . 'trektable_trekkers_list';
            $ptbd_table_name1 = $wpdb->prefix . 'trektable_bookings';

            $select_trek = $_POST['selTrek'];
            $select_date = $_POST['selDate'];
            $owner_mail = $_POST['ownerid'];

            $data1 = $wpdb->get_results('SELECT trek_booking_id FROM ' . $ptbd_table_name1 . ' where trek_booking_status=0 and trek_booking_owner_id ="' . $ownerid . '" and trek_selected_trek_id="' . $select_trek . '" and trek_selected_departure_id="' . $select_date . '" and book_activity_status!=5');

            if (!empty($data1)) {
                $bookingid = $data1[0]->trek_booking_id;

                $data2 = $wpdb->get_results('SELECT trek_tfname,trek_tlname,trekker_token FROM ' . $ptbd_table_name . ' where trek_trekker_status=0 and trek_tbooking_id ="' . $bookingid . '" and trek_selected_trek="' . $select_trek . '" and trek_selected_date="' . $select_date . '" order by id desc');
                $data3 = $wpdb->get_results('SELECT trek_tfname FROM ' . $ptbd_table_name . ' where trek_trekker_status=0 and trek_tbooking_id ="' . $bookingid . '" and trek_selected_trek="' . $select_trek . '" and trek_uid="' . $owner_mail . '" and trek_selected_date="' . $select_date . '" order by id desc');
                $bookStatus = 'false';
                if (empty($data3)) {
                    $bookStatus = 'false';
                } else {
                    $bookStatus = 'true';
                }
                $result = new stdClass();
                $result->statusCode = 200;
                $result->result = 'fetch';
                $result->data = $data2;
                $result->bookingId = $bookingid;
                $result->ownerStatus = $bookStatus;
                echo json_encode($result);
                exit;
            } else {

                $result = new stdClass();
                $result->statusCode = 404;
                $result->result = 'no booking';
                echo json_encode($result);
                exit;
            }
        } else {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->result = 'failed';
            $result->info = "Authentication failed";
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getTrekkersDetailsCoupon') {

        if (is_user_logged_in()) {
            $ownerid = $user_id = get_current_user_id();
            $ptbd_table_name = $wpdb->prefix . 'trektable_trekkers_list';
            $ptbd_table_name1 = $wpdb->prefix . 'trektable_bookings';

            $select_trek = $_POST['selTrek'];
            $select_date = $_POST['selDate'];

            $data1 = $wpdb->get_results('SELECT trek_booking_id FROM ' . $ptbd_table_name1 . ' where trek_booking_status=0 and trek_booking_owner_id ="' . $ownerid . '" and trek_selected_trek_id="' . $select_trek . '" and trek_selected_departure_id="' . $select_date . '" and book_activity_status!=5');

            if (!empty($data1)) {
                $bookingid = $data1[0]->trek_booking_id;

                $data3 = $wpdb->get_results('select trek_tfname,trek_tlname,trekker_token from  wp_trektable_trekkers_list where trek_tbooking_id="' . $bookingid . '" and trek_selected_trek="' . $select_trek . '" and trek_selected_date="' . $select_date . '"');

                //     $data2 = $wpdb->get_results('SELECT
                // wp_trektable_trekkers_list.trekker_token,
                // wp_trektable_coupons_new.coupon_merge,
                // wp_trektable_coupons_new.coupon_name,
                // wp_trektable_coupons_new.coupon_expiry,
                // wp_trektable_coupons_new.coupon_code,
                // wp_trektable_coupons_new.coupon_region_type,
                // wp_trektable_coupons_new.coupon_inc_trek,
                // wp_trektable_coupons_new.coupon_ind_usage,
                // wp_trektable_coupons_new.coupon_merge,
                // wp_trektable_coupons_new.coupon_inc_region
                // FROM
                //   wp_trektable_trekkers_list
                // inner JOIN wp_trektable_coupons_new
                // ON wp_trektable_coupons_new.coupon_ind_email collate utf8_general_ci = wp_trektable_trekkers_list.trek_uid collate utf8_general_ci Where CURDATE() <= wp_trektable_coupons_new.coupon_expiry
                // and wp_trektable_trekkers_list.trek_trekker_status=0 and wp_trektable_trekkers_list.trek_tbooking_id ="' . $bookingid . '" and wp_trektable_trekkers_list.trek_selected_trek="' . $select_trek . '"
                // and wp_trektable_trekkers_list.trek_selected_date="' . $select_date . '" order by wp_trektable_trekkers_list.id desc');

                $data2 = $wpdb->get_results('SELECT
            wp_trektable_trekkers_list.trekker_token,
            wp_trektable_coupons_new.coupon_merge,
            wp_trektable_coupons_new.coupon_name,
            wp_trektable_coupons_new.coupon_expiry,
            wp_trektable_coupons_new.coupon_code,
            wp_trektable_coupons_new.coupon_amount,
            wp_trektable_coupons_new.coupon_expiry,
            wp_trektable_coupons_new.coupon_type,
            wp_trektable_coupons_new.coupon_trek_type,
            wp_trektable_coupons_new.coupon_region_type,
            wp_trektable_coupons_new.coupon_inc_trek,
            wp_trektable_coupons_new.coupon_ind_usage,
            wp_trektable_coupons_new.coupon_terms,
            wp_trektable_coupons_new.coupon_transfer_type,
            wp_trektable_coupons_new.coupon_merge,
            wp_trektable_coupons_new.coupon_description,
            wp_trektable_coupons_new.coupon_inc_region
            FROM
              wp_trektable_trekkers_list
            inner JOIN wp_trektable_coupons_new
            ON wp_trektable_coupons_new.coupon_ind_email collate utf8_general_ci = wp_trektable_trekkers_list.trek_uid collate utf8_general_ci  Where CURDATE() <= wp_trektable_coupons_new.coupon_expiry
            and wp_trektable_trekkers_list.trek_trekker_status=0 and wp_trektable_trekkers_list.trek_tbooking_id ="' . $bookingid . '" and wp_trektable_trekkers_list.trek_selected_trek="' . $select_trek . '"
            and wp_trektable_trekkers_list.trek_selected_date="' . $select_date . '" order by wp_trektable_trekkers_list.id desc');


                $result = new stdClass();
                $result->statusCode = 200;
                $result->result = 'fetch';
                $result->data = $data3;
                $result->participants = $data2;
                $result->bookingId = $bookingid;
                echo json_encode($result);
                exit;
            } else {

                $result = new stdClass();
                $result->statusCode = 404;
                $result->result = 'no booking';
                echo json_encode($result);
                exit;
            }
        } else {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->result = 'failed';
            $result->info = "Authentication failed";
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getTrekkersDetailsOwner') {

        $select_trek = $_POST['selTrek'];
        $select_date = $_POST['selDate'];
        $owner_mail = $_POST['ownerid'];
        getTrekkersDetailsOwnerfun($select_trek, $select_date, $owner_mail);
    }

    if ($_POST['action'] == 'removeTrekker') {
        $trekkr_tokken = $_POST['id'];
        $data4 = $wpdb->get_results('select trek_tbooking_id from  wp_trektable_trekkers_list where trekker_token="' . $trekkr_tokken . '"');
        if (empty($data4)) {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->result = 'failed';
            $result->info = "Some errors occured.";
            echo json_encode($result);
            exit;
        }
        $data3 = $wpdb->get_results('select count(trek_tbooking_id) as totalParticipants from  wp_trektable_trekkers_list where trek_tbooking_id="' . $data4[0]->trekker_token . '"');
        if (($data3[0]->totalParticipants) == 1) {
            $table = 'wp_trektable_bookings';
            $wpdb->delete($table, array('trek_booking_id' => $data3[0]->trek_tbooking_id));
        }
        $table = 'wp_trektable_trekkers_list';
        $result_check = $wpdb->delete($table, array('trekker_token' => $trekkr_tokken));
        $table11 = 'wp_trektable_coupon_usage';
        $result_check1 = $wpdb->delete($table11, array('trek_coupon_user' => $trekkr_tokken, 'trek_coupon_booking_id' => $data3[0]->trek_tbooking_id));
        if ($result_check) {

            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'Success';
            $result->info = "Removed the user.";
            echo json_encode($result);
            exit;
        } else {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->result = 'failed';
            $result->info = "Some errors occured.";
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'getTreksAndDetailsByDate') {

        $date = $_POST['date'];
        $date_exp = explode(" - ", $date);
        $start_date = $date_exp[0];
        $end_date = $date_exp[1];

        $query = "SELECT 
        b.trek_name, 
        b.trek_cost,
        b.trek_days,
        a.trek_start_date as trek_start_date,
        b.id as trek_id,
        a.trek_departure_status,
        a.dep_event_name
        FROM wp_trektable_trek_departure AS a
        LEFT JOIN wp_trektable_addtrekdetails AS b
        ON a.trek_selected_trek = b.id 
        and ADDDATE(a.trek_start_date, 2) between '" . $start_date . "' and '" . $end_date . "' 
        AND a.trek_departure_status=0 group by trek_name order by a.trek_start_date asc";

        $upcoming_treks = $wpdb->get_results($query);

        $result = new stdClass();
        $result->statusCode = 200;
        $result->Results = $upcoming_treks;
        $result->result = 'pass';
        echo json_encode($result);
        exit;

    }

    if ($_POST['action'] == 'purchaseslots') {
        if (is_user_logged_in()) {
            $amount = $_POST['amount'];
            $amount = $amount * 100;

            // pass booking id

            // fetch all trekkers details using booking id

            // calculate amount based on trekkers count

            // process all coupon codes

            //find payable amount

            // compare these 2 amounts

            // if amounts are equal

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n    \"amount\": " . $amount . ",\n    \"currency\": \"INR\",\n    \"receipt\": \"rcptid_11\"\n}");
            curl_setopt($ch, CURLOPT_USERPWD, 'rzp_test_K1gbufT8jkyqww' . ':' . 'ddQXOCKno5eF8glubyEsiXeA');

            $headers = array();
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            echo $result;
            exit;

            //if amounts are not equal, handle error

        } else {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->result = 'failed';
            $result->info = "Access restricted";
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'addVolunteer') {

        $doc_url = $_POST['url'];
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $phone_number = $_POST['phone_number'];
        $dob = $_POST['dob'];
        $country = $_POST['country'];
        $gender = $_POST['gender'];
        $pref_date = $_POST['pref_date'];
        $duration = $_POST['duration'];
        $social = $_POST['social'];
        $find_us = $_POST['find_us'];
        $object_of_join = $_POST['object_of_join'];
        $email = $_POST['email'];
        $concern = $_POST['concern'];
        $address = $_POST['address'];
        $ptbd_table_name = $wpdb->prefix . 'tth_volunteer_program';

        $test_res = $wpdb->insert('' . $ptbd_table_name . '', array(
            'first_name' => $f_name,
            'last_name' => $l_name,
            'mail' => $email,
            'phone' => $phone_number,
            'address' => $address,
            'dob' => $dob,
            'country' => $country,
            'gender' => $gender,
            'pref_date' => $pref_date,
            'trek_duration' => $duration,
            'social' => $social,
            'how_did_hear_us' => $find_us,
            'object_for_join' => $object_of_join,
            'concerns' => $concern,
            'resume' => $doc_url
        ));
        $result = new stdClass();
        if ($test_res) {
            $result->statusCode = 200;
            $result->result = 'Success';
        } else {
            $result->statusCode = 400;
            $result->result = 'Failed';
        }
        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'addTrekBookingDetailsTrekkers') {

        if (is_user_logged_in()) {
            $ownerid = get_current_user_id();
            $user_id = $ownerid;

            $user_meta = get_userdata($user_id);
            $user_roles = $user_meta->roles;
            $user_data = $user_meta->data;
            $user_role = $user_roles[0];
            $user_email = $user_data->user_email;
            $user_dp = $user_data->display_name;

            $timestamp = time();
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < 5; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            $tktoken = 'TTH' . $timestamp . $randomString;

            $ptbd_table_name = $wpdb->prefix . 'trektable_trekkers_list';
            $ptbd_table_name1 = $wpdb->prefix . 'trektable_bookings';
            $Tfname = $_POST['Tfname'];
            $Tlname = $_POST['Tlname'];
            $Tgender = $_POST['Tgender'];
            $Tdob = $_POST['Tdob'];
            $Tweight = $_POST['Tweight'];
            $Theight = $_POST['Theight'];
            $Tcity = $_POST['Tcity'];
            $Tstate = $_POST['Tstate'];
            $Tcountry = $_POST['Tcountry'];
            $Tidentity = $_POST['Tidentity'];
            $Tcontact = $_POST['Tcontact'];
            $Temail = $_POST['Temail'];
            $select_trek = $_POST['selTrek'];
            $select_date = $_POST['selDate'];
            $Temergency = $_POST['Temergency'];

            $regStatus = registerTrekker($Tfname, $Tlname, $Tcontact, $Temergency, $Tgender, $Temail, $Tweight, $Theight, $Tdob, $Tcity, $Tcountry, $Tstate);

            for ($i = 0; $i < 8; $i++) {
                $index1 = rand(0, strlen($characters) - 1);
                $randomString1 .= $characters[$index1];
            }

            $bookingid = time() . $randomString1 . rand(11111, 99999);

            $data1 = $wpdb->get_results('SELECT trek_booking_id FROM ' . $ptbd_table_name1 . ' where trek_booking_status=0 and trek_booking_owner_id ="' . $ownerid . '" and trek_selected_trek_id="' . $select_trek . '" and trek_selected_departure_id="' . $select_date . '" and book_activity_status!=5');

            if (empty($data1)) {
                $test_res = $wpdb->insert('' . $ptbd_table_name1 . '', array(
                    'trek_selected_trek_id' => $select_trek,
                    'trek_selected_departure_id' => $select_date,
                    'fname' => $user_dp,
                    'lname' => $user_role,
                    'email' => $user_email,
                    'trek_booking_id' => $bookingid,
                    'trek_booking_owner_id' => $ownerid,
                    'trek_trems_condition' => 'nan',
                    'trek_insurance' => 'nan',
                    'trek_note' => 'nan',
                    'trek_category' => 'nan',

                ));

                if (!$test_res) {
                    $result = new stdClass();
                    $result->statusCode = 404;
                    $result->message = 'failed';
                    echo json_encode($result);
                    die;
                }

                $result_check = $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_tfname' => $Tfname, 'trek_tlname' => $Tlname, 'trek_tbooking_id' => $bookingid,
                    'trek_tcontact_number' => $Tcontact,
                    'trek_tgender' => $Tgender,
                    'trek_dob' => $Tdob,
                    'trek_tweight' => $Tweight,
                    'trek_theight' => $Theight,
                    'trek_selected_trek' => $select_trek,
                    'trek_selected_date' => $select_date,
                    'trek_tcity' => $Tcity,
                    'trek_tstate' => $Tstate,
                    'trek_tcountry' => $Tcountry,
                    'trek_identity' => $Tidentity,
                    'owner_reference' => $ownerid,
                    'trek_uid' => $Temail,
                    'trekker_token' => $tktoken,
                    'trek_tcontact_emg_number' => $Temergency,
                ));

                if ($result_check) {
                    $result = new stdClass();
                    $result->statusCode = 200;
                    $result->message = 'success';
                    $result->result = 'inserted';
                    $result->token = $tktoken;
                    echo json_encode($result);
                    die;
                } else {
                    $result = new stdClass();
                    $result->statusCode = 404;
                    $result->message = 'failed';
                    echo json_encode($result);
                    die;
                }
            } else {

                //check person already added or not

                $bookingid = $data1[0]->trek_booking_id;

                $dataTrekList = $wpdb->get_results('SELECT id FROM ' . $ptbd_table_name . ' where trek_trekker_status=0 and trek_uid ="' . $Temail . '" and trek_tbooking_id="' . $bookingid . '"');

                if (!empty($dataTrekList)) {
                    $result = new stdClass();
                    $result->statusCode = 408;
                    $result->message = 'person already added for this trek';
                    echo json_encode($result);
                    die;
                }

                $result_check = $wpdb->insert('' . $ptbd_table_name . '', array(
                    'trek_tfname' => $Tfname, 'trek_tlname' => $Tlname, 'trek_tbooking_id' => $bookingid,
                    'trek_tcontact_number' => $Tcontact,
                    'trek_tgender' => $Tgender,
                    'trek_dob' => $Tdob,
                    'trek_tweight' => $Tweight,
                    'trek_theight' => $Theight,
                    'trek_selected_trek' => $select_trek,
                    'trek_selected_date' => $select_date,
                    'trek_tcity' => $Tcity,
                    'trek_tstate' => $Tstate,
                    'trek_tcountry' => $Tcountry,
                    'trek_identity' => $Tidentity,
                    'owner_reference' => $ownerid,
                    'trek_uid' => $Temail,
                    'trekker_token' => $tktoken,
                    'trek_tcontact_emg_number' => $Temergency,
                ));

                if ($result_check) {
                    $result = new stdClass();
                    $result->statusCode = 200;
                    $result->message = 'success';
                    $result->result = 'inserted';
                    $result->token = $tktoken;
                    echo json_encode($result);
                    die;
                } else {
                    $result = new stdClass();
                    $result->statusCode = 404;
                    $result->message = 'failed';
                    $result->Tid = $Tid;
                    echo json_encode($result);
                    die;
                }
            }
        } else {
            $result = new stdClass();
            $result->statusCode = 400;
            $result->message = 'failed';
            $result->info = "Authentication failed";
            echo json_encode($result);
            exit;
        }
    }

    if ($_POST['action'] == 'get-remaining-seat-count') {

        $trek_selected_id = $_POST['trek_selected_id'];
        $dep_selected_id = $_POST['dep_selected_id'];
        $count = $_POST['count'];

        $query = "SELECT
  wp_trektable_trek_departure.*,
  COUNT(wp_trektable_trekkers_list.id) AS Total
FROM
  wp_trektable_trek_departure
LEFT JOIN wp_trektable_trekkers_list ON wp_trektable_trek_departure.id = wp_trektable_trekkers_list.trek_selected_date
and wp_trektable_trek_departure.trek_departure_status!=1
and (wp_trektable_trekkers_list.trek_trekker_status !=1 or wp_trektable_trekkers_list.trek_trekker_status is null)
where wp_trektable_trek_departure.id= '" . $dep_selected_id . "'
GROUP BY wp_trektable_trek_departure.id,wp_trektable_trek_departure.trek_selected_trek order by
wp_trektable_trek_departure.trek_start_date asc";
        $result = $wpdb->get_results($query);
        // print_r($query);
        if (!empty($result)) {
            $trekSeats = '';
            $eligibility = '';
            $trekSeatsOccupied = '';
            $trekRemainingSeats = '';
            $trekSeatsPercentage = '';
            $trekSeats = $result[0]->trek_seats;
            $trekSeatsOccupied = $result[0]->Total;
            $trekRemainingSeats = $trekSeats - $trekSeatsOccupied;
            $remainingSeatsAfterBooking = $trekRemainingSeats - $count;

            if (($remainingSeatsAfterBooking > 0) || ($remainingSeatsAfterBooking == 0)) {
                $eligibility = 0;

                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'exist1';
                $result->data = $trekRemainingSeats;
                echo json_encode($result);
                exit;
            } else {
                $eligibility = 1;

                $result = new stdClass();
                $result->statusCode = 200;
                $result->message = 'success';
                $result->result = 'exist2';
                $result->data = $trekRemainingSeats;
                echo json_encode($result);
                exit;
            }
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->message = 'failed';
            $result->result = 'not exist';

            echo json_encode($result);
            exit;
        }
    }
    if ($_POST['action'] == 'requestTrekCancellation') {
        $bookingId = $_POST['booking_id'];
        $ptbd_table_name = $wpdb->prefix . 'trektable_bookings';
        $query = "select count(id) from " . $ptbd_table_name . " where trek_booking_status=0 and trek_booking_id='" . $bookingId . "'";
        $result = $wpdb->get_results($query);
        if (count($result) == 1) {
            $wpdb->update('' . $ptbd_table_name . '', array(
                'book_activity_status' => 2,
            ), array('trek_booking_id' => $bookingId));

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

    if ($_POST['action'] == 'validateProfileUrl') {

        $trekId = $_POST['trek_id'];
        $vendorId = $_POST['vendor'];
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

    if ($_POST['action'] == 'getVendorTrekMap') {

        $trekId = $_POST['trek_id'];
        $query1 = "SELECT vendor_id FROM wp_trektable_vendors where trek_id=" . $trekId . " and trek_vendor_status=0 order by id asc limit 1";
        $results1 = $wpdb->get_results($query1);
        if (!empty($results1)) {
            $vendor_id = $results1[0]->vendor_id;
        } else {
            $vendor_id = null;
        }

        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'fetch';
        $result->result = 'fetch';
        $result->data = $vendor_id;

        echo json_encode($result);
        exit;
    }

    if ($_POST['action'] == 'more_post_ajax') {
        $offset = $_POST["offset"];
        // echo $offset;
        $args = array(
            'post_type' => 'post',
            'status' => 'publish',
            'posts_per_page' => 4,
            'offset' => $offset
        );
        if (isset($_POST["trek"]) && $_POST['trek'] != "") {
            $args['meta_query'] = [
                array(
                    'key' => 'trek_id',
                    'value' => $_POST['trek'],
                    'compare' => 'EQUAL'
                )
            ];
        }
        $post_query = new WP_Query($args);
        $data = [];
        if ($post_query->have_posts()) {
            while ($post_query->have_posts()) {
                $post_query->the_post();
                $excerpt = substr(get_the_excerpt(), 0, 120);
                $excerpt = substr($excerpt, 0, strrpos($excerpt, ' ')) . '...';
                $data[] = array(
                    'title' => get_the_title(),
                    'thumbnail' => wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail'),
                    'excerpt' => $excerpt,
                    'permalink' => get_permalink(get_the_ID()),
                    'author' => get_the_author_meta('display_name', $author_id),
                    'data' => get_the_date(),
                    'offset' => $offset
                );
            }
        }
        $result = new stdClass();
        $result->statusCode = 200;
        $result->payload = $data;
        echo json_encode($result);
        exit();
    }
} else {
    $result = new stdClass();
    $result->message = 'Access Denied!';
    echo json_encode($result);
}