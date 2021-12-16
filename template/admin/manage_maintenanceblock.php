<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_flags where trek_flag_status=0 order by id desc');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example of Employee Table with twitter bootstrap</title>
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
    <!-- <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new flags</button> -->
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Manage Maintenance Block - Trek Name / 23 may - 25 may</h3>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">product</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Alloted</th>
                            <th class="text-center">Defective</th>
                            <th class="text-center"><i class="fas fa-certificate"
                                    style="color: green;"></i>&nbsp;&nbsp;Verified</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$j = 0;
$count = count($data);
for ($i = 0; $i < $count; $i++) {
    $j++;

    ?>
                        <tr>
                            <td class="text-center"><?php echo $j; ?></td>
                            <td class="text-center">Trek Shoes</td>
                           
                            <?php  if($i==1){
                                ?>
                                 <td class="text-center">Variable</td>
                                <?php
                            } else{?>
                              <td class="text-center">Simple</td>
                        <?php } ?>
                            <td class="text-center">100</td>
                            <td class="text-center">3</td>
                            <td class="text-center">97</td>
                          

                            <?php  if($i==1){
                                ?>
                                  <td class="text-center"><a class="btn btn-danger"
                                    id="<?php echo $data[$i]->id; ?>-flagEdit" href="post.php?post=738&action=edit"><i class="fas fa-file"></i>&nbsp;&nbsp;Product page</a>

                            </td>
                                <?php
                            } else{?>
                              <td class="text-center"><a class="btn btn-primary" onclick="flagEdit(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-flagEdit" role="button" data-toggle="modal"
                                    data-target="#editModal"><i class="fas fa-recycle"></i>&nbsp;&nbsp;Restore items</a>

                            </td>
                        <?php } ?>



                        </tr>
                        <?php
}
?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Maintainance Block</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Flag name:</label>
                            <input type="text" class="form-control" id="flag-name">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addFlag()" class="btn btn-primary">Add Flag</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <p>Total <b>267</b> items will be restored!</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="updateFlag()" class="btn btn-danger">Confirm</button>
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