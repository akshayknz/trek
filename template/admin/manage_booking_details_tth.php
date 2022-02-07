<?php
defined('ABSPATH') or die('Hei, Access restricted!');
if (isset($_GET['num'])) {
    $ppc = $_GET['num'];
    if ($ppc == '') {
        die('Access restricted!');
    }
} else {
    die('Access restricted!');
}
if (isset($_GET['dep'])) {
    $ppc1 = $_GET['dep'];
    if ($ppc1 == '') {
        die('Access restricted!');
    }
} else {
    die('Access restricted!');
}
global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
// $data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_userdetails where trek_user_status=0 order by id desc');
$query11 = "SELECT trek_name,id FROM wp_trektable_addtrekdetails where id=" . $ppc . " and trek_adddetails_status=0 limit 1";
$results11 = $wpdb->get_results($query11);
$trek_name = $results11[0]->trek_name;
if (empty($results11)) {
    die("No trek Exists!");
}
$query12 = "SELECT trek_start_date,trek_end_date,trek_section FROM wp_trektable_trek_departure where id=" . $ppc1 . " and trek_departure_status=0 limit 1";
$results12 = $wpdb->get_results($query12);
$k1 = strtotime($results12[0]->trek_start_date);
$l1 = strtotime($results12[0]->trek_end_date);
$k2 = date('j M ', $k1);
$l2 = date('j M Y', $l1);
$m2 = $results12[0]->trek_section;
if (empty($results12)) {
    die("No trek Exists!");
}

// $query1 = "SELECT tb.fname as trek_user_first_name,tb.lname as trek_user_last_name,tb.trek_booking_owner_id as trek_user_id,tb.email as trek_user_email,tb.trek_booking_id, COUNT(tl.id) AS Total, tb.trek_booking_status, tb.trek_booking_id, tb.book_activity_status FROM 
// wp_trektable_bookings tb 
// LEFT JOIN 
// wp_trektable_trekkers_list tl ON tb.trek_booking_id = tl.trek_tbooking_id where tb.trek_booking_status!=1 and 
// (tl.trek_trekker_status !=1 or tl.trek_trekker_status is null) and tb.trek_selected_trek_id='".$ppc."'
//  and trek_selected_departure_id ='".$ppc1."' GROUP BY tb.id order by tb.id desc";
// $result = $wpdb->get_results($query1);

// $count = count($result);
// $target = '';
// for ($k = 0; $k < $count; $k++) {
//     $target .= '<tr><td class="text-center">';
//     $target .= $k + 1;
//     $target .= '</td><td>';
//     $target .= $result[$k]->trek_user_first_name ;
//     $target .= '</td><td class="text-center">';
//     $target .= $result[$k]->trek_user_email;
//     $target .= '</td><td class="text-center">';
//     $target .= $result[$k]->Total;
//     if ($result[$k]->book_activity_status == 2) {
//         $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="btn btn-warning" id="' . $result[$k]->trek_booking_id . '" onclick="approveCancellation(this.id)">Cancel</a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
//     } else if ($result[$k]->book_activity_status == 5) {
//         $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="btn btn-danger" id="' . $result[$k]->trek_booking_id . '">Cancelled</a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
//     } else if ($result[$k]->trek_booking_status == 0) {
//         $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="dot1"></a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
//     } else if ($result[$k]->trek_booking_status == 2) {
//         $target .= '</td><td class="text-center" id="bookingStat-' . $result[$k]->trek_booking_id . '"><a class="dot1"></a></td><td class="text-center"> <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_owner"';
//     }
//     $target .= 'id="';
//     $target .= $result[$k]->trek_user_id;
//     $target .= '"role="button" onclick="ownerDetails(this.id)">Owner</a> <a class="btn btn-info" data-toggle="modal" data-target="#Modal_trekkers" id="';
//     $target .= $result[$k]->trek_booking_id;
//     $target .= '" role="button" onclick="trekkersrDetails(this.id)">Trekkers</a>';
//     $target .= '&nbsp;&nbsp;<a class="btn btn-warning" data-toggle="modal" data-target="#Modal_trekNoteBySales" id="';
//     $target .= $result[$k]->trek_booking_id;
//     $target .= '-note" role="button" onclick="trekkersrNoteNySales(this.id)">Note</a>';
//     $target .= '</td></tr>';

// }

// print_r($results1);

//Grid data
$query3 = "SELECT trek_tfname as trek_user_first_name,trek_tlname as trek_user_last_name,tb.trek_booking_owner_id as trek_user_id,tb.email as trek_user_email,tb.trek_booking_id, tb.trek_booking_status, tb.trek_booking_id, tb.book_activity_status,trek_tgender,trek_dob,
trek_tcontact_number,trek_tweight,trek_theight,trek_tcity,trek_tstate,trek_tcountry,trek_tcontact_emg_number,trek_selected_trek_id,trekker_token,trek_booking_status,book_activity_status,trek_coupon_code,payment_status,
trek_identity,tl.Amount,Comments,Transport,OffLoad,wp_trektable_trekkers_remarks.ID AS remarksID,trek_trekker_status,trek_selected_date
FROM 
wp_trektable_bookings tb 
INNER JOIN wp_trektable_trekkers_list tl ON tb.trek_booking_id = tl.trek_tbooking_id 
LEFT JOIN wp_trektable_coupon_usage ON wp_trektable_coupon_usage.trek_coupon_user=tl.trekker_token
LEFT JOIN wp_trektable_trekkers_remarks ON wp_trektable_trekkers_remarks.Trekker_ID=tl.trekker_token
INNER JOIN wp_trektable_addtrekdetails ON wp_trektable_addtrekdetails.id = tb.trek_selected_trek_id 

where tb.trek_booking_status!=1 and tb.trek_selected_trek_id='".$ppc."' and trek_selected_departure_id ='".$ppc1."'
 ORDER BY tl.id DESC";
//,cook_name,leader_name,wp_trektable_leaderrating.Value AS leaderRating, wp_trektable_cookrating.Value AS cookRating 
 // LEFT JOIN wp_trektable_cooks ON wp_trektable_cooks.id=wp_trektable_addtrekdetails.trek_cook
// LEFT JOIN wp_trektable_leaders ON wp_trektable_leaders.id=wp_trektable_addtrekdetails.trek_leader
// LEFT JOIN wp_trektable_cookrating ON wp_trektable_cookrating.DepartureID=trek_selected_departure_id AND wp_trektable_cookrating.TrekID=tb.trek_selected_trek_id
// LEFT JOIN wp_trektable_leaderrating ON wp_trektable_leaderrating.DepartureID=trek_selected_departure_id AND wp_trektable_leaderrating.TrekID=tb.trek_selected_trek_id
$result3 = $wpdb->get_results($query3);
//print $query3 ;
//Set Yes or No text
function setBoolean($val){
    if($val==1)
        return "Yes";
    else if($val==0)
        return "No";
}

$count = count($result3);
$target3 = '';

for ($k = 0; $k < $count; $k++) {
    $target3 .= '<tr><td class="text-center">';
    $target3 .= $k + 1;
    $target3 .= '</td>';
	$target3 .= '<td class="trek-id">'.$result3[$k]->trek_selected_trek_id.'</td>';
	$target3 .= '<td class="treker-id">'.$result3[$k]->trekker_token.'</td>';
	
	if ($result3[$k]->book_activity_status == 2) {
        $target3 .= '<td class="text-center status" id="bookingStat-' . $result3[$k]->trek_booking_id . '"><a class="btn btn-warning" id="' . $result3[$k]->trek_booking_id . '" onclick="approveCancellation(this.id)">Cancel</a></td>';
    } else if ($result3[$k]->book_activity_status == 5) {
        $target3 .= '<td class="text-center status" id="bookingStat-' . $result3[$k]->trek_booking_id . '"><a class="btn btn-danger" id="' . $result3[$k]->trek_booking_id . '">Cancelled</a></td>';
    } else if ($result3[$k]->trek_booking_status == 0) {
        $target3 .= '</td><td class="text-center status" id="bookingStat-' . $result3[$k]->trek_booking_id . '"><a class="dot1"></a></td>';
    } else if ($result3[$k]->trek_booking_status == 2) {
        $target3 .= '<td class="text-center status" id="bookingStat-' . $result3[$k]->trek_booking_id . '"><a class="dot1"></a></td>';
    }	
	else{$target3 .= '<td class="status"></td>';}
    $target3 .= '<td class="first-name">'.$result3[$k]->trek_user_first_name.'</td>';
	$target3 .= '<td class="last-name">'.$result3[$k]->trek_user_last_name.'</td>';
	$target3 .= '<td class="gender">'.$result3[$k]->trek_tgender.'</td>';
	$target3 .= '<td class="dob">'.$result3[$k]->trek_dob.'</td>';
	$target3 .= '<td class="remark">';
    
    if($result3[$k]->Comments!="")
    {
        $target3 .= '<b>Off Load: </b>'.setBoolean($result3[$k]->OffLoad).'<br/><b>Transport: </b>'.setBoolean($result3[$k]->Transport).'<br/><b>Comment: </b><span class="cmt-'.$result3[$k]->remarksID.'">'.$result3[$k]->Comments.'</span>';
        $target3 .= '<a data-toggle="modal" style="font-size:12px; padding:2px 5px;"  data-backdrop="static" data-keyboard="false" data-transport="'.$result3[$k]->Transport.'" data-offload="'.$result3[$k]->OffLoad.'" data-remarksid="'.$result3[$k]->remarksID.'" class="editRemarks btn btn-warning" data-target="#Modal_editremarks">Edit</a>';
    }
    else{
    $target3 .= '<a data-toggle="modal" data-backdrop="static" data-keyboard="false" data-trkerid="'.$result3[$k]->trekker_token.'" class="ancRemarks btn btn-warning" data-target="#Modal_remarks">Add</a>';
    }
    $target3 .= '</td>';
	$target3 .= '<td class="renting"></td>';
	$target3 .= '<td class="phone-no">'.$result3[$k]->trek_tcontact_number.'</td>';
	$target3 .= '<td class="weight">'.$result3[$k]->trek_tweight.'</td>';
	$target3 .= '<td class="height">'.$result3[$k]->trek_theight.'</td>';
	$bmi = '';
	 //BMI Calculation
	if (isset($result3[$k]->trek_tweight)) {
                if (isset($result3[$k]->trek_theight)) {                   
                    $height_in_meter = $result3[$k]->trek_theight / 100;
                    $height_in_meter_sqr = $height_in_meter * $height_in_meter;
                    $bmi = ($result3[$k]->trek_tweight / $height_in_meter_sqr);
                    $bmi = number_format((float)$bmi, 2, '.', '');                   
                } else {                 
                     $bmi = '-'; //bmi                   
                }
            } else {                
                $bmi = '-'; //bmi               
            }
	$target3 .= '<td class="bmi">'. $bmi .'</td>';
	$target3 .= '<td class="city">'.$result3[$k]->trek_tcity.'</td>';
	$target3 .= '<td class="state">'.$result3[$k]->trek_tstate.'</td>';
	$target3 .= '<td class="country">'.$result3[$k]->trek_tcountry.'</td>';
	$target3 .= '<td class="emergency-no">'.$result3[$k]->trek_tcontact_emg_number.'</td>';
	$target3 .= '<td class="email">'.$result3[$k]->trek_user_email.'</td>';
	$target3 .= '<td class="photo">';
    if($result3[$k]->trek_identity!="")    
    {
        $path='trek/template/user'.$result3[$k]->trek_identity;
        $target3 .= '<a href="'.plugins_url($path).'" target="blank">View</a>';}
    $target3 .= '</td>';
	$target3 .= '<td class="amount">'.$result3[$k]->Amount.'</td>';
	$target3 .= '<td class="vouchers">'.$result3[$k]->trek_coupon_code.'</td>';	
    $trekkerid="'".$result3[$k]->trekker_token."'";
    $trekerstatus = $result3[$k]->trek_trekker_status;
    $trekerselecteddate=$result3[$k]->trek_selected_date;
    $pending=$incompleted=$completed=$cancelled="";
    if($trekerstatus==0)
        $pending="selected";
    else if($trekerstatus==1)
        $completed="selected";
    else if($trekerstatus==2)
        $cancelled="selected";
    else if($trekerstatus==4)
        $incompleted="selected";
    $target3 .= '<td class="trekker-status"><select class="selStatus" data-trekkerid="'.$result3[$k]->trekker_token.'" name="selStatus" onChange="changeStatus(this.selectedIndex,'.$trekkerid.','.$trekerselecteddate.','.$result3[$k]->trek_selected_trek_id.');"><option value="0" '.$pending.'>Pending</option><option value="1" '.$completed.'>Completed</option><option value="2" '.$cancelled.'>Cancelled</option><option value="3">Transfer</option><option value="4" '.$incompleted.'>Incomplete</option></select></td>';
    
    $target3 .= '</tr>';

}

$dataLeader = $wpdb->get_results('SELECT id,leader_name FROM ' . $table_prefix . 'trektable_leaders');
$dataCook = $wpdb->get_results('SELECT id,cook_name FROM ' . $table_prefix . 'trektable_cooks');
$dataLeaderRating = $wpdb->get_results('SELECT rating.ID,leader_name, LeaderID,NoOfBatch,NoOfDays,Value,AddedDate FROM ' . $table_prefix . 'trektable_leaderrating AS rating INNER JOIN ' . $table_prefix . 'trektable_leaders AS leader ON leader.id=rating.LeaderID WHERE Status=0 AND DepartureID='.$ppc1.' ORDER BY rating.ID DESC');
$dataCookRating = $wpdb->get_results('SELECT rating.ID,cook_name, CookID,NoOfBatch,NoOfDays,Value,AddedDate FROM ' . $table_prefix . 'trektable_cookrating AS rating INNER JOIN ' . $table_prefix . 'trektable_cooks AS cook ON cook.id=rating.CookID WHERE Status=0 AND DepartureID='.$ppc1.' ORDER BY rating.ID DESC');
$AllTreks = $wpdb->get_results('SELECT id,trek_name FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0 and trek_publish_status=0  order by id desc');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">

  
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

    .myButton {
        padding: 30px;
        display: block;
        float: right;
        background-color: green;
        color: white;
        text-align: center;
        margin-bottom: 25px;
        margin-right: 25px;
    }

    .dot1 {
        height: 20px;
        width: 20px;
        background-color: #00cc44;
        border-radius: 50%;
        display: inline-block;
        margin-top: 8px;

    }

    .dot2 {
        height: 20px;
        width: 20px;
        background-color: #ff6666;
        border-radius: 50%;
        display: inline-block;
        margin-top: 8px;

    }

    @media (min-width: 900px) {
        .modal-xlg {
            width: 90% !important;
        }
    }
		  #myTable1 td, #myTable1 th{padding:0.25rem;}
    .ancRemarks {font-size: 12px !important; padding: 5px 10px !important;}
    </style>
 
   	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="<?php echo plugins_url('/trek/assets/admin/css/rating.css'); ?>" >
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
</head>

<body style="margin:20px auto">

    <div class="loader" id="loader">

    </div>
    <!--<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new flags</button>-->
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Manage bookings2&nbsp;<?php if (isset($trek_name)) {
    echo '- ' . $trek_name;
}?></h3>
        </div>
        <br>
        <div class="row header" style="text-align:center;color:green">
            <h6>Departure&nbsp;<?php if (isset($m2)) {
    echo ' ' . $k2 . '-' . $l2 . ':' . $m2;
}?></h6>
        </div>
        <br>

        <!-- <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>

                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Trekkers</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>

                    </thead>
                    <tbody id="trek_user_details">

                        <?php
//if (!empty($result)) {
   // echo $target;

//} else {
    //$target = '';
    //$target .= '<tr><td valign="top" colspan="6" class="dataTables_empty text-center">No Data available for this date</td></tr>';

    //echo $target;

//}

?>


                    </tbody>
                </table> 
            </div>
        </div>-->

		
		<!-- Grid -->
 <div class="col-md-12">

            <div >           
            <?php if (!empty($result3)) {  ?>
                <div class="row">
                <div class="col-md-6">
                <label for="trek_leader">Choose a cook </label>
                                            <select id="trek_cook" 
                                                style="max-width: 100%;"
                                                class="form-control" required="required"
                                                data-error="Please specify your Grade.">
                                                <option value="" selected>--Select Cook---
                                                </option>
                                               
                                                <?php
                                                $countf1 = count($dataCook);
                                                for ($i = 0; $i < $countf1; $i++) {
                                                    ?>
                                                <option value="<?= $dataCook[$i]->id ?>"><?php echo $dataCook[$i]->cook_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <table id="cookTable" class="table table-striped">
                <thead>
                <tr>
                    
                    <th class="text-center">Cook Name</th>
                    <th class="text-center">Added Date</th>                  
                    <th class="text-center">Rating</th>
                    <th class="text-center">Actions</th> 
                </tr>
                </thead>
                <tbody>
                <?php
                $j = 0;
                $count = count($dataCookRating);
                for ($i = 0; $i < $count; $i++) {
                    $j++;
                    ?>
                    <tr>                      
                        <td style="text-align: center;"><?php echo $dataCookRating[$i]->cook_name; ?></td>
                        <td style="text-align: center;"><?php echo $dataCookRating[$i]->AddedDate; ?></td>                        
                        <td class="text-center"><?php echo $dataCookRating[$i]->Value; ?></td>
                        <td class="text-center">                         
                            <a class="btn btn-danger" onclick="deleteCookRating(<?php echo $dataCookRating[$i]->ID ?>)"
                               id="<?php echo $dataCookRating[$i]->ID; ?>-NewsDelete" role="button">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
    <!-- <?php echo "<b>Cook Name : </b>";
    //if(!empty($result3[0]->cook_name))
    //{echo $result3[0]->cook_name; ?>
     <label for="input-2" class="control-label"></label>
    <input id="input-2" name="input-2" class="rating rating-loading" value="<?php //echo $result3[0]->cookRating; ?>" data-min="0" data-max="5" data-size="xs" data-step="1">
    <?php
    //} ?> -->
    <br/>
</div>
<div class="col-md-6">
<label for="trek_leader">Choose a leader </label>
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
                                                <option value="<?= $dataLeader[$i]->id ?>"><?php echo $dataLeader[$i]->leader_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <table id="leaderTable" class="table table-striped">
                <thead>
                <tr>
                    
                    <th class="text-center">Leader Name</th>
                    <th class="text-center">Added Date</th>                  
                    <th class="text-center">Rating</th>
                    <th class="text-center">Actions</th> 
                </tr>
                </thead>
                <tbody>
                <?php
                $j = 0;
                $count = count($dataLeaderRating);
                for ($i = 0; $i < $count; $i++) {
                    $j++;
                    ?>
                    <tr>                      
                        <td style="text-align: center;"><?php echo $dataLeaderRating[$i]->leader_name; ?></td>
                        <td style="text-align: center;"><?php echo $dataLeaderRating[$i]->AddedDate; ?></td>                        
                        <td class="text-center"><?php echo $dataLeaderRating[$i]->Value; ?></td>
                        <td class="text-center">                         
                            <a class="btn btn-danger" onclick="deleteLeaderRating(<?php echo $dataLeaderRating[$i]->ID ?>)"
                               id="<?php echo $dataLeaderRating[$i]->ID; ?>-NewsDelete" role="button">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
    <!-- <?php //echo "<b>Leader Name : </b>";
   // if(!empty($result3[0]->leader_name))
    //{
       // echo $result3[0]->leader_name; ?>
         <label for="input-3" class="control-label"></label>
<input id="input-3" name="input-3" value="<?php //echo $result3[0]->leaderRating; ?>" class="rating rating-loading" data-min="0" data-max="5" data-size="xs" data-step="1">
        <?php
   // }
    ?>-->

<?php } ?> 
<br/></div>
</div>
                          <table id="myTable1" class="table table-striped table-responsive" style="height:300px; font-size:12px;">
                    <thead>

                        <th class="text-center">#</th>
						<th class="text-center">Trek Id</th>
						<th class="text-center">Trekker Id</th>
						<th class="text-center">Status</th>
                        <th class="text-center">First Name</th>
						  <th class="text-center">Last Name</th>
						  <th class="text-center">Gender</th>
						  <th class="text-center">Date of Birth</th>
						  <th class="text-center">Remark</th>
						   <th class="text-center">Renting Equipment</th>
						   <th class="text-center">Phone Number</th>
						   <th class="text-center">Weight</th>
						   <th class="text-center">Height</th>
						   <th class="text-center">BMI</th>
						   <th class="text-center">City</th>
						   <th class="text-center">State</th>
						   <th class="text-center">Country</th>
                            <th class="text-center">Emergency Number</th>
                            <th class="text-center">E-mail Id</th>
                            <th class="text-center">Photo ID</th>
                            <th class="text-center">Amount Paid</th>
                            <th class="text-center">Vouchers</th>
                        <th class="text-center">Trekker Status</th>                       
                    </thead>
                    <tbody id="trek_user_details">

                        <?php
if (!empty($result3)) {
    echo $target3;

} else {
    $target3 = '';
    $target3 .= '<tr><td valign="top" colspan="12" class="dataTables_empty text-center">No Data available for this date</td></tr>';

    echo $target3;

}

?>


                    </tbody>
                </table>
                        </div>
        </div>
<!-- Grid End --->
		
    </div>
    <div class="modal fade" id="Modal_trekkers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trek Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Emergency Phone</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Dob</th>
                                    <th class="text-center">Age</th>
                                    <th class="text-center">Height</th>
                                    <th class="text-center">Weight</th>
                                    <th class="text-center">BMI</th>

                                </thead>
                                <tbody id="trekkersDetailsBooking">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal_owner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Owner details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="ownerDetailsBooking">


                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


        <div class="modal fade" id="Modal_trekNoteBySales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trek Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea  id="trekNoteBySales" rows="5" cols="50">
                        
                    </textarea>

                </div>


                <div class="modal-footer">
                    <input type="hidden" id="trekNoteBySalesBooking" value="">
                    <button type="button" class="btn btn-secondary" onclick="trekkersSaverNoteNySales()"  data-dismiss="modal">Save</button>

                </div>
            </div>
        </div>
    </div>
	
	<!-- Add remarks -->
	  <div class="modal fade" id="Modal_remarks" tabindex="-1" role="dialog" aria-labelledby="remarksModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remarksModal">Add Remarks</h5>
                    <input type="hidden" id="hdnUserID" value="<?php echo get_current_user_id();?>">
                    <input type="hidden" id="hdntrekkerid" value="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="remarkssection">
<table class="table table-responsive">
<tr><td>Off Load</td><td><input type="radio"  name="radOffLoad" value="1"  required>Yes</input>
<input type="radio"  name="radOffLoad" value="0" required>No</input></td></tr>
<tr><td>Transport</td><td><input type="radio"  name="radTransport" value="1" required>Yes</input>
<input type="radio"  name="radTransport" value="0" required>No</input></td></tr>
<tr><td>Comment</td><td> 
<textarea id="txtComments" name="txtComments" rows="4" cols="40" required></textarea>
</td></tr>
</table>

                </div>


                <div class="modal-footer">
				 <button type="button" class="btn btn-Primary" onclick="addRemarks()"  data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Edit remarks -->
	  <div class="modal fade" id="Modal_editremarks" tabindex="-1" role="dialog" aria-labelledby="editremarksModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editremarksModal">Edit Remarks</h5>
                  <input type="hidden" id="hdnremarksID" name="hdnremarksID" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="editremarkssection">
<table class="table table-responsive">
<tr><td>Off Load</td><td><input type="radio" name="radeditOffLoad" value="1"  required>Yes</input>
<input type="radio"  name="radeditOffLoad" value="0" required>No</input></td></tr>
<tr><td>Transport</td><td><input type="radio"  name="radeditTransport" value="1" required>Yes</input>
<input type="radio"  name="radeditTransport" value="0" required>No</input></td></tr>
<tr><td>Comment</td><td> 
<textarea id="txteditComments" name="txteditComments" rows="4" cols="40" required></textarea>
</td></tr>
</table>

                </div>


                <div class="modal-footer">
				 <button type="button" class="btn btn-Primary" onclick="updatedRemarks()"  data-dismiss="modal">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

<!-- Choose Departure -->
<div class="modal fade" id="Modal_departure" tabindex="-1" role="dialog" aria-labelledby="departureModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="departureModal">Transfer Trek</h5>
                    <input type="hidden" id="hdnUserID" value="<?php echo get_current_user_id();?>">
                    <input type="hidden" id="hdntrekkerid1" value="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="departuresection">
<table class="table table-responsive">
<tr><td>Choose Trek</td><td> <select id="select-trek" class="form-control" placeholder="Pick a trek..." required="required">
                        <option value="">Select Trek</option>
                        <?php
                                        $count = count($AllTreks);
                                        for ($i = 0; $i < $count; $i++) {                                           
                                                ?>                                               

                                                <option value="<?= $AllTreks[$i]->id ?>"><?= $AllTreks[$i]->trek_name ?></option>

                                                <?php                                         
                                        }
?>
                    </select></td></tr>
<tr><td>Tranfer Departure Date</td><td> <select id="select-date" class="form-control" placeholder="Pick a date..." required="required">
                        <option value="">Select Trek Date</option></select></td></tr>
</table>

                </div>


                <div class="modal-footer">
				 <button type="button" class="btn btn-primary" onclick="updateDepartureDate()"  data-dismiss="modal">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Choose Cook Rating -->
<div class="modal fade" id="Modal_cookrating" tabindex="-1" role="dialog" aria-labelledby="ratingCookModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingCookModal">Choose Rating</h5>
                   
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="ratingcooksection">
                <b>Cook Name : </b>
                <input type="hidden" name="hdncookid" id="hdncookid" />
   <span class="cookname"></span>
     <label for="input-2" class="control-label"></label>
    <input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-size="xs" data-step="1">

                </div>
                <div class="modal-footer">				
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
     <!-- Choose Leader Rating -->
<div class="modal fade" id="Modal_leaderrating" tabindex="-1" role="dialog" aria-labelledby="ratingLeaderModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingLeaderModal">Choose Rating</h5>
                   
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="ratingleadersection">
                <b>Cook Name : </b>
                <input type="hidden" name="hdnleaderid" id="hdnleaderid" />
   <span class="leadername"></span>
     <label for="input-3" class="control-label"></label>
    <input id="input-3" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-size="xs" data-step="1">

                </div>
                <div class="modal-footer">				
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" id="hdnTrekID" value="<?php echo $ppc; ?>" />
    <input type="hidden" id="hdnDepartureID" value="<?php echo $ppc1; ?>" />
</body>
 
   	
<script>
$(document).ready(function() {
	getModalDeparture("<?php echo $ppc; ?>-getDeparture", "getReleventTrekUpcoming");
    // $('#myTable').dataTable();
    jQuery("#trek_choose_dep").empty();
    jQuery("#trek_choose_dep").append('<?php echo $alltrekdate; ?>');
	
	  //Set Selected trekker id value on modal    
      $(".ancRemarks").click(function(){ // Click to only happen on announce links
     $("#hdntrekkerid").val($(this).attr('data-trkerid'));  
     //alert($(this).attr('data-trkerid')) ;
   });

    //Set Selected trekker id value on modal    
    $(".editRemarks").click(function(){ // Click to only happen on announce links
     $("#hdnremarksID").val($(this).attr('data-remarksid'));  
     $("#txteditComments").val($(".cmt-"+$(this).attr('data-remarksid')+"").html());    
     $("input[name=radeditTransport][value=" + $(this).attr('data-transport') + "]").prop('checked', true);
     $("input[name=radeditOffLoad][value=" + $(this).attr('data-offload') + "]").prop('checked', true);    
     //alert($(this).attr('data-trkerid')) ;
   });

   $("#select-trek").change(function(){
    getTrekDepartureData($(this).val());
   })

   //Set departure date
 var trekid = <?php echo $ppc; ?>;
 getTrekDepartureData(trekid);
});
	
	function trekkersrDetails(id) {
  if (id == "") {
    jQuery("#trekkersDetailsBooking").empty();
    jQuery("#trekkersDetailsBooking").append(
        '<tr><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>'
    );
    // alert("Something went wrong!");
    toastr.error("Something went wrong!", "Oh no!");
    return;
  }
  jQuery("#loader").css("display", "block");
  jQuery.ajax({
    url: my_obj.ajax_url,
    type: "POST",
    data: {
      action: "getTrekkersDetailsBooking",
      bookingId: id,
    },
    cache: false,
    success: function (data) {
      json = JSON.parse(data);
      if (json.statusCode == 200) {
        if (json.result == "Fetch") {
          jQuery("#trekkersDetailsBooking").empty();
          jQuery("#trekkersDetailsBooking").append(json.data);
          jQuery("#loader").css("display", "none");
        } else if (json.result == "not exist") {
          jQuery("#trekkersDetailsBooking").empty();
          jQuery("#trekkersDetailsBooking").append(json.data);
          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Something wrong", "Oh no!");
      }
    },
  });
}
</script>
<script src=<?php echo plugins_url('/trek/assets/admin/js/rating.js') ?> ></script>
<script>
$(document).ready(function(){
    $('#input-2').rating({displayOnly: true, step: 0.5});
});
//AddCook rating
$('#input-2').on('rating:change',function(event, value, caption) {
    let Added_By = $("#hdnUserID").val();
    var trekid=$("#hdnTrekID").val();
    var DepartureID=$("#hdnDepartureID").val();
    var CookID=$("#hdncookid").val();
   // if (confirm("Are you sure want to change status")) {
data = new FormData();
    data.append("TrekID", trekid);
    data.append("Rating", value); 
    data.append("Added_By", Added_By);
    data.append("DepartureID", DepartureID); 
    data.append("CookID", CookID);   
    data.append("action", "addcookrating");
    
    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          toastr.success("Rated successfully", "Success!");
          setTimeout(function () {
            location.reload();
          }, 3000);
        } else if (json.statusCode == 400) {
          toastr.error("Request Failed", "Oh no!");
        }
      },
     
    });
  //}

});

//Add Leader rating
$('#input-3').on('rating:change',function(event, value, caption) {
    let Added_By = $("#hdnUserID").val();
    var trekid=$("#hdnTrekID").val();
    var DepartureID=$("#hdnDepartureID").val();
    var LeaderID=$("#hdnleaderid").val();  
data = new FormData();
    data.append("TrekID", trekid);
    data.append("Rating", value); 
    data.append("Added_By", Added_By);
    data.append("DepartureID", DepartureID); 
    data.append("LeaderID", LeaderID);      
    data.append("action", "addleaderrating");
    
    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          toastr.success("Rated successfully", "Success!");
          setTimeout(function () {
            location.reload();
          }, 3000);
        } else if (json.statusCode == 400) {
          toastr.error("Request Failed", "Oh no!");
        }
      },
     
    });

});

//Change cook name
$("#trek_cook").change(function(){
    var cookid=$(this).val();
    if(cookid>0)
    {
    jQuery("#Modal_cookrating").modal("show");  
   
    var cookname=$(this).find("option:selected").text();
    $("#hdncookid").val(cookid);
    $(".cookname").html(cookname);
    }
});

//Change leader name
$("#trek_leader").change(function(){
    var leaderid=$(this).val();
    if(leaderid>0)
    {
    jQuery("#Modal_leaderrating").modal("show");  
   
    var leadername=$(this).find("option:selected").text();
    $("#hdnleaderid").val(leaderid);
    $(".leadername").html(leadername);
    }
});

</script>
</html>