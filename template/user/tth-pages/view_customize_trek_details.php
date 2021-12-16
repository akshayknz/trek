







<?php
if (isset($_GET['num'])) {
    $ppc = $_GET['num'];
    if ($ppc == '') {
        die('Access restricted!');
    }
    global $wpdb, $table_prefix;
    $user_ID = get_current_user_id();
    $data = $wpdb->get_results('SELECT * FROM ' . $table_prefix .'trek_user_customization where trek_tth_status=0 and id=' . $ppc . ' limit 1');
    $wpdb->update('' . $table_prefix . 'trek_user_customization', array('trek_info_read_status' => 0
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
 <a href="admin.php?page=tth_customize_trek_page"><button class="myButton btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i>&nbsp;&nbsp;Back</button></a>
    <div class="container">
        <div class="row header" style="text-align:center;color:red">
            <h3>Customize Trek - User Response</h3>
        </div>
        <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" value="<?= $data[0]->trek_tth_fname ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" value="<?= $data[0]->trek_tth_lname ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" value="<?= $data[0]->trek_tth_email ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" value="<?= $data[0]->trek_tth_phone ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="trek_participants">Participants</label>
                    <input type="text" value="<?= $data[0]->trek_tth_participants ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="trek_duration">Duration</label>
                    <input type="text" value="<?= $data[0]->trek_tth_duration ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="Budget">Budget</label>
                    <input type="text" value="<?= $data[0]->trek_tth_budget ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" value="<?= $data[0]->trek_tth_age ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="city">City from</label>
                    <input type="text"  value="<?= $data[0]->trek_tth_city_travelling ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="trek_name">Location/Trek Name</label>
                    <input type="text" value="<?= $data[0]->trek_tth_location ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="package">Package</label>
                    <input type="text"  value="<?= $data[0]->trek_tth_package ?>" class="form-control" name="phon2"readonly>
                    
                </div>
                
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="details">Extra Details</label>
                   <textarea name="details" rows="4" class="form-control"readonly><?= $data[0]->trek_tth_extra_details ?></textarea>
                    
                </div>
                
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-danger" onclick="deleteCustomizeTrekRequest(this.id)">Delete response</button>&nbsp;
            
                <a href="mailto:<?= $data[0]->trek_tth_email ?>"><button type="button" class="btn btn-info">Contact User</button></a>
            </div>
           
           
            
        </div>
        </div>

    </div>

</body>

<script>
$(document).ready(function() {
    $('#myTable').dataTable();

});
</script>

</html>