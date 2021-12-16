




<?php
if (isset($_GET['num'])) {
    $ppc = $_GET['num'];
    if ($ppc == '') {
        die('Access restricted!');
    }
    global $wpdb, $table_prefix;
    $user_ID = get_current_user_id();
    $data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_user_sugget_trek where trek_tth_status=0 and id=' . $ppc . ' limit 1');
    $wpdb->update('' . $table_prefix . 'trek_user_sugget_trek', array('trek_info_read_status' => 0
            ), array('id' => $ppc));

    if (empty($data)) {
        die("<h2>No Such Data Exist!</h2>");
    }

} else {
     die("<h2>No data found!</h2>");
}
global $wpdb, $table_prefix;


// print_r(json_encode($data));
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>Example of Employee Table with twitter bootstrap</title> -->
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
    </style>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
</head>

<body style="margin:20px auto">

    <div class="loader" id="loader">

    </div>
   <a href="admin.php?page=tth_suggest_trek_page"><button class="myButton btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i>&nbsp;&nbsp;Back</button></a>
    <div class="container">
        <div class="row header" style="text-align:center;color:red">
            <h3>Suggest Trek - User Response</h3>
        </div>
        <div class="col-md-12">
             <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">Full Name</label>
                    <input type="text" value="<?= $data[0]->full_name ?>" class="form-control" name="first_name" readonly>
                    
                </div>
                
            </div>
           <!--  <div class="col-md-4">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name">
                    
                </div>
                
            </div> -->

            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" value="<?= $data[0]->email ?>" class="form-control" name="email" readonly>
                    
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" value="<?= $data[0]->phone_number ?>" class="form-control" name="phone"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="trek_participants">Participants</label>
                    <input type="text" value="<?= $data[0]->participants ?>" class="form-control" name="phon1"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="trek_duration">Duration</label>
                    <input type="text" value="<?= $data[0]->trip_duration ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="Budget">Budget</label>
                    <input type="text" value="<?= $data[0]->budget ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" value="<?= $data[0]->participants_age ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="city">City from</label>
                    <input type="text"  value="<?= $data[0]->city_traveling ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="trek_name">Location/Trek Name</label>
                    <input type="text" value="<?= $data[0]->location ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="package">Package</label>
                    <input type="text" value="<?= $data[0]->service_required ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="details">Extra Details</label>
                   <textarea name="details" rows="4" class="form-control"readonly><?= $data[0]->extra ?></textarea>
                    
                </div>
                
            </div>
           
           
            
        </div>

<hr>
<h4 style="color: green;">User survey</h4>

             <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="first_name">I have been on treks before</label>
                    <input type="text" value="<?= $data[0]->step_radio ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="last_name">What's the highest altitude you have trekked to?</label>
                    <input type="text" value="<?= $data[0]->highest_altitude ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">What was the duration of your longest trek?</label>
                    <input type="text" value="<?= $data[0]->duration ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone">Have you ever walked on snow in a trek?</label>
                    <input type="text" value="<?= $data[0]->walked_on_snow ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-12">
                <div class="form-group">
                    <label for="trek_participants">Which region are you most interested in?</label>
                    <input type="text" value="<?= $data[0]->interested_in ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-12">
                <div class="form-group">
                    <label for="trek_duration">How many trekkers are in your team?</label>
                    <input type="text" value="<?= $data[0]->trekkers ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-12">
                <div class="form-group">
                    <label for="Budget">What's your preferred time for the trek? (Pick any two)</label>
                    <input type="text" value="<?= $data[0]->preferred_time ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-12">
                <div class="form-group">
                    <label for="age">What're the must-have points of a trek for you? (2 ticks)</label>
                    <input type="text" value="<?= $data[0]->must_have_points ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-12">
                <div class="form-group">
                    <label for="city">What is your fitness level?</label>
                    <input type="text" value="<?= $data[0]->fitness_level ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="trek_name">What kind of services are you looking for?</label>
                    <input type="text" value="<?= $data[0]->looking_for ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
         
            <div class="col-md-6">
              <button type="button" class="btn btn-danger" onclick="deleteCustomizeTrekRequest(this.id)">Delete response</button>&nbsp;
           <a href="mailto:<?= $data[0]->email ?>"><button type="button" class="btn btn-info">Contact User</button></a>
                
            </div>
           
           
            
        </div>





        </div>

    </div>
 
</body>
<script>
var editor21 = CKEDITOR.replace('news_content');
CKFinder.setupCKEditor(editor21);
var editor22 = CKEDITOR.replace('news_content_edit');
CKFinder.setupCKEditor(editor22);
</script>
<script>
$(document).ready(function() {
    $('#myTable').dataTable();

});
</script>

</html>