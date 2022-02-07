<?php
require_once ('../../../wp-config.php');
        global $wpdb;
$query = "alter table `wp_trektable_addtrekdetails` add column trek_leader int after trek_assigned_to;
";
$re = $wpdb->get_results('select * from wp_trektable_contacts');
var_dump($re);