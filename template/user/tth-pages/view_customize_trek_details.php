







<?php
if (isset($_GET['num'])) {
    $ppc = $_GET['num'];
    if ($ppc == '') {
        die('Access restricted!');
    }
    global $wpdb, $table_prefix;
    $user_ID = get_current_user_id();
    $data = $wpdb->get_results('SELECT * FROM ' . $table_prefix .'trek_user_customization where trek_tth_status!="1" and id=' . $ppc . ' limit 1');
    
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
        <div class="col-md-6 pb-3 pt-3">
              <button type="button" class="btn btn-danger" id="<?= $data[0]->id ?>" onclick="deleteCustomizeTrekRequest(this.id)">Delete response</button>&nbsp;
            
                <a href="mailto:<?= $data[0]->trek_tth_email ?>"><button type="button" class="btn btn-info">Contact User</button></a>
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
            <div class="col-md-12">
                <div class="form-group">
                    <label for="details">Notes</label>
                    <div class="form-group">
                        <textarea name="note" data-id=<?= $ppc ?> cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" onclick="saveNote();">Save</button>
                    </div>
                    <div class="form-group">
                    <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $args = array(  
                        'post_type' => 'notes',
                        'post_status' => 'publish',
                        'posts_per_page' => -1, 
                        'orderby' => 'title', 
                        'order' => 'DESC', 
                        'orderby' => 'date',
                        'meta_query'     => array(
                            array(
                              'key'     => 'entry_id',
                              'value'   => $ppc,
                              'compare' => '='))
                    );
                    $loop = new WP_Query( $args );
                    echo '<div class="list-group">'; 
                    while ( $loop->have_posts() ) : $loop->the_post(); 
                    ?>
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php echo(get_post_meta( get_the_id(), 'status', false )[0]); ?></h5>
                            <small><?= get_the_date(); ?></small>
                            </div>
                            <p class="mb-1"><?= the_content(); ?></p>
                        </div>
                    <?php 
                    endwhile;
                    echo '</div>';
                    wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>

        </div>
        </div>

    </div>

</body>

<script>
const saveNote = () => {
                    let note = document.querySelector('[name="note"]')
                    jQuery("#loader").css("display", "block")
                    var data = new FormData()
                    data.append('action', 'addNewNoteCustomizeTrek')
                    data.append('note', note.value)
                    data.append('statusText', '')
                    data.append('id', note.dataset.id)
                    console.log(...data);
                    jQuery.ajax({
                        type: "post",
                        cache: false,
                        contentType: false,
                        processData: false,
                        url: my_objs.ajax_url_pages,
                        data: data,
                        success: function(msg) {
                            jQuery("#loader").css("display", "none")
                        }
                    });
                    location.reload();
                }
    function deleteCustomizeTrekRequest(id)
    {
        if (confirm('Are you sure you want to delete?')) {

            var data = new FormData();
            data.append('id', id);
            data.append('action', 'removeCustomizeTrekMsg');
            jQuery.ajax({
                type: "post",
                cache: false,
                contentType: false,
                processData: false,
                url: my_objs.ajax_url_pages,
                data: data,
                success: function (msg) {
                    json = JSON.parse(msg);
                    console.log(json);
                    if(json.statusCode==200)
                    {
                        toastr.success('Deleted.');
                        setTimeout(function(){ window.location=document.referrer; }, 3000)
                    }
                    else
                    {
                        toastr.warning(json.info);
                    }
                }
            });
        }
    }





$(document).ready(function() {
    $('#myTable').dataTable();

});
</script>

</html>