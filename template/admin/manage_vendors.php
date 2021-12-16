<?php

global $wpdb, $table_prefix;
global $product;
$user_ID = get_current_user_id();
//$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_vendors where trek_vendor_status=2 or trek_vendor_status=1 order by id desc');
$data = $wpdb->get_results('SELECT `wp_trektable_addtrekdetails`.`id`,
    `wp_trektable_addtrekdetails`.`trek_name`,
    wp_trektable_vendors.trek_vendor_status,
    wp_trektable_vendors.vendor_name,
    wp_trektable_vendors.id as ven_id,
    wp_trektable_vendors.vendor_id as vend_id,
    wp_trektable_vendors.trek_vendor_status,
    `wp_trektable_addtrekdetails`.`trek_vendor_assign_status`
FROM `wp_trektable_addtrekdetails` left join wp_trektable_vendors 
on wp_trektable_addtrekdetails.id=wp_trektable_vendors.trek_id and wp_trektable_vendors.trek_vendor_status!=1
where wp_trektable_addtrekdetails.trek_adddetails_status!=1 order by wp_trektable_addtrekdetails.id desc;');

$data_treks = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0  order by id desc');
//print_r($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--    <title>Example of Employee Table with twitter bootstrap</title>-->
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
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
</head>

<body style="margin:20px auto">

<div class="loader" id="loader">

</div>


<!-- <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new vendor</button> -->
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Manage Vendors</h3>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Trek name</th>
                    <th class="text-center">Store Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>

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
                        <td class="text-center">
                            <?php echo $data[$i]->trek_name; ?>

                        </td>

                        <td class="text-center">
                            <?php
                            $temp = $data[$i]->vendor_name;
                            if (empty($temp)) {
                                echo '<a class="btn btn-info" onclick="vendorEdit(this.id)"
                                                   id="' . $data[$i]->id . '-' . $data[$i]->trek_name . '" role="button"
                                                   data-toggle="modal"
                                                   data-target="#trekmodal">Add vendor</a>';
                            } else {
                                $uid=$data[$i]->vend_id;
                                $store_info = dokan_get_store_info($uid);
                                echo $store_info['store_name'];
                            }


                            ?>

                        </td>
                        <td class="text-center">
                            <?php
                            $status = $data[$i]->trek_vendor_status;
                            if ($status == "0") {
                                ?>
                                <a class="btn btn-success" onclick="ChangeVendorStatus(this.id)"
                                   id="<?php echo $data[$i]->trek_vendor_status . "-" . $data[$i]->ven_id; ?>"
                                   role="button">Active</a>
                                <?php
                            } else if ($status == "2") {
                                ?>
                                <a class="btn btn-warning" onclick="ChangeVendorStatus(this.id)"
                                   id="<?php echo $data[$i]->trek_vendor_status . "-" . $data[$i]->ven_id; ?>"
                                   role="button">Inactive</a>
                                <?php
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <!--                            <a class="btn btn-info" onclick="vendor_Edit(this.id)"-->
                            <!--                                                   id="-->
                            <?php //echo $data[$i]->ven_id; ?><!--" role="button"-->
                            <!--                                                   data-toggle="modal"-->
                            <!--                                                   data-target="#editModal">Edit</a>-->
                            <a class="btn btn-danger" onclick="VendorDelete(this.id)"
                               id="<?php echo $data[$i]->ven_id; ?>" role="button">Clear</a>

                        </td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<div class="modal fade" id="trekmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manage Vendors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="margin: 15px">
                <label for="treks">Choose a vendor:</label>
                <select name="treks" id="treks" style="width: 255px;height: 5px;">
                    <option id="null">select a vendor.</option>
                    <?php

                    $args = array(
                        'role' => 'seller',
                        'orderby' => 'user_nicename',
                        'order' => 'ASC'
                    );
                    $users = get_users($args);
                    foreach ($users as $user) {
                        $selling = get_user_meta($user->id, 'dokan_enable_selling', true);
                        if ($selling == 'yes') {
                            $uid=$user->id;
                            $store_info = dokan_get_store_info($uid);
                            //echo "<script>console.log('".json_encode($store_info)."');</script>";
                            //echo "<script>console.log('".$store_info->store_name."');</script>";
                            ?>

                            <option id="<?php echo $user->id ?>"><?php echo $store_info['store_name']; ?></option>

                            <?php
                        }
                    }
                    ?>


                </select>
            </div>
            <div class="form-group" hidden>
                <label for="recipient-name" class="col-form-label"></label>
                <input type="text" class="form-control" id="vendor-name-id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addVendor()" class="btn btn-primary">save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manage Vendors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="margin: 15px">
                <label for="treks">Choose a trek:</label>
                <select name="treks" id="treks" style="width: 255px;height: 5px;">
                    <option id="null">select a trek.</option>
                    <?php

                    $args = array(
                        'role' => 'seller',
                        'orderby' => 'user_nicename',
                        'order' => 'ASC'
                    );
                    $users = get_users($args);
                    foreach ($users as $user) {

                        $selling = get_user_meta($user->id, 'dokan_enable_selling', true);
                        if ($selling == 'yes') {
                            $uid=$user->id;
                            $store_info = dokan_get_store_info($uid);
                            //echo "<script>console.log('".json_encode($store_info)."');</script>";
                            //echo "<script>console.log('".$store_info->store_name."');</script>";
                            ?>

                            <option id="<?php echo $user->id ?>"><?php echo $store_info['store_name']; ?></option>

                            <?php
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="form-group" hidden>
                <label for="recipient-name" class="col-form-label"></label>
                <input type="text" class="form-control" id="vendor-name-id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addVendor()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    $(document).ready(function () {
        $('#myTable').dataTable();

    });
</script>

</html>