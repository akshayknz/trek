<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT id,coupon_name,status,coupon_code,coupon_amount,coupon_inc_trek,coupon_display_category FROM ' . $table_prefix . 'trektable_coupons_new order by id desc');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
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
</style>

<body style="margin:20px auto">
<div class="loader" id="loader">

</div>
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Edit Couponsss</h3>
    </div>
    <div style="width: auto;margin-top: 50px;">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th class="text-center">Coupon Name</th>
                    <th class="text-center">Code</th>

                    <th class="text-center">Coupon Amount</th>
                    <th class="text-center">Type</th>
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
                        <td class="text-center"><?php echo $data[$i]->coupon_name; ?></td>
                        <td class="text-center"><?php echo $data[$i]->coupon_code; ?></td>
                        <td class="text-center"><?php echo $data[$i]->coupon_amount; ?></td>


                        <td class="text-center"><?php echo $data[$i]->coupon_display_category; ?></td>

                        <td class="text-center">
                            <a class="btn btn-info <?= ($data[$i]->status)? "active-coupon":null ; ?>"
                                id="<?php echo $data[$i]->id; ?>-activate"
                                data-toggle="modal"
                                data-target="#exampleModal"
                                data-id="<?php echo $data[$i]->id; ?>"
                                data-currently="<?php echo $data[$i]->status; ?>"
                                onclick='showPasswordDialog(event)'
                                role="button"><?= ($data[$i]->status)? "Active":"Activate" ; ?></a>&nbsp;&nbsp;
                            <a class="btn btn-info"
                                href="admin.php?page=manage_coupon&num=<?php echo $data[$i]->id; ?>"
                                id="<?php echo $data[$i]->id; ?>-alledit"
                                data-toggle="modal"
                                data-target="#exampleModal"
                                onclick='editCoupon(this.id)'
                                role="button">Edit</a>&nbsp;&nbsp;
                            <a class="btn btn-danger"
                                id="<?php echo $data[$i]->id; ?>-Coupondelete"
                                onclick='deleteCoupon(this.id)'
                                role="button">Delete</a> &nbsp;
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
<div id="password-confirm">
<form onsubmit="activateCoupon(event)">
    <h4>Activate coupon</h4>
    <input type="hidden" name="coupon-id">
    <input type="hidden" name="currently">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button onclick="event.preventDefault();document.querySelector('#password-confirm').style.display='none';" class="btn btn-outline-primary">Cancel</button>
</form>
</div>
</body>
<style>
    div#password-confirm {
    position: fixed;
    /* height: 100px; */
    /* width: 100px; */
    z-index: 100;
    top: 0;
    left: 0;
    display: none;
    align-items: center;
    justify-content: center;
    height: 105vh;
    width: 100vw;
    background: #00000026;
}

div#password-confirm form {
    /* height: 160px; */
    width: 320px;
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 13px 0 #00000038;
}
.active-coupon {
    background: var(--green);
}
</style>
<script>
    function activateCoupon(e) {
        e.preventDefault();
        console.log(e);
        data = new FormData(document.querySelector('#password-confirm form'));
        console.log(data);
        console.log(...data);
        data.append("action", 'activateCoupon');
        jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
                json = JSON.parse(msg);
                if(json.message == 'success'){
                    swal(
                        'Coupon status changed',
                        '',
                        'success'
                    ).then(()=>{
                        document.querySelector('#password-confirm').style.display='none';
                        location.reload();
                    })
                }else{
                    swal(
                        'Incorrect credentials',
                        '',
                        'error'
                    ).then(()=>{
                        document.querySelector('#password-confirm').style.display='none';
                    })
                }
            }
        });
    }
    function showPasswordDialog(e){
        console.log(e.currentTarget.dataset.id);
        document.querySelector('#password-confirm [name="coupon-id"]').value = e.currentTarget.dataset.id;
        document.querySelector('#password-confirm [name="currently"]').value = e.currentTarget.dataset.currently;
        document.querySelector('#password-confirm').style.display='flex';
    }
    $(document).ready(function () {
        $('#myTable').dataTable();
    });
</script>

</html>