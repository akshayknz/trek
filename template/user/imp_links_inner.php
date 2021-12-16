<?php
defined('ABSPATH') or die('Hai, Access restricted!');
if (isset($_GET['num'])) {
    $ppc = $_GET['num'];
    if ($ppc == '') {
        die('Access restricted!');
    }

    global $wpdb, $table_prefix;
    $user_ID = get_current_user_id();

    $data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_important_links where  trek=' . $ppc . ' order by id asc');

    $data1 = $wpdb->get_results('SELECT trek_days,id,trek_name FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0 and id=' . $ppc . '');




} else {
    die("Access denied!");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>trek Himalaya</title>
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

        .card1 {
            position: relative;

            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 100%;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
            /*display: wrap;*/
            flex-wrap: wrap;
        }

        .cds {
            min-width: 45% !important;
            white-space: nowrap !important;

        }

        .editors-dep {
            float: right;
        }

        .dep-edit {
            margin-right: 30px;
            cursor: pointer;
        }

        .dep-delete {
            margin-right: 20px;
            cursor: pointer;
        }

        .cds:hover {
            transform: scale(1.05);

        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">

</head>

<body style="margin:20px auto">

<div class="loader" id="loader">

</div>
<button class="myButton btn btn-primary" data-toggle="modal" onclick="clearAddDeparture()"
        data-target="#exampleModal">Add Links
</button>

<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Manage links for <?php echo $data1[0]->trek_name; ?></h3>
    </div>
</div>

<div class="row col-md-12 col-lg-12 col-xl-12">
    <div class="card" style="min-width: 100%;min-height: 200px;background-color: #3C87AB;">
        <div class="card-title">
            <h5>Links</h5>
        </div>
        <div style="display: flex; padding: 4px;flex-wrap: wrap; column-gap: 40px;">
            <?php
            $count = count($data);
            if ($count == 0) {
            ?>
            <center>
                <h5>No data available!</h5>
            </center>
        </div>
        <?php }
        for ($k = 0; $k < $count; $k++) {

            ?>
            <div class="card cds" id="<?php echo $data[$k]->id ?>-cardTrek">

                <div><?php echo $data[$k]->link_text; ?>
                        <div class="badge badge-success"
                             style="margin-left: 20px;background-color: green;display:none;"><?php  $data[$k]->link_category ?></div>

                    <span class="editors-dep"><i class="fas fa-edit dep-edit"
                                                 id="<?php echo $data[$k]->id ?>-edit" onclick="editLink(this.id)"
                                                 data-toggle="modal"
                                                 data-target="#exampleModalEdit"></i><i
                                class="fas fa-trash-alt dep-delete"
                                id="<?php echo $data[$k]->id ?>-delete" onclick="deleteLink(this.id)"></i></span>
                </div>
            </div>
            <?php
        }
        ?>
    </div>


</div>
</div>

<!-- Modal start -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <form enctype="multipart/form-data">

                    <br>

                    <div class="form-group">
                        <label for="departure-start-date-edit" class="col-form-label">Link name</label>
                        <input type="text" class="form-control"
                               id="trek_link_name">
                    </div>

                    <div class="form-group" hidden>
                        <label for="departure-start-date-edit" class="col-form-label">Category</label>
                        <input type="text" class="form-control"
                               id="trek_link_categ" value="general">
                    </div>

                    <div class="form-group" hidden>
                        <label for="departure-start-date-edit" class="col-form-label">Link name</label>
                        <input type="text" class="form-control"
                               id="trek_link" value="<?php echo $ppc; ?>">
                    </div>
                    <div class="form-group">
                        <label for="departure-start-date-edit" class="col-form-label">Link</label>
                        <input type="text" class="form-control"
                               id="tbl_posts" >
                    </div>


                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="savelinks()"  class="btn btn-primary">Save</button>
            </div>
            <span id="errlinks" style="color: red;"></span>
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal edit start -->
<div class="modal fade" id="exampleModal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <form enctype="multipart/form-data">

                    <br>

                    <div class="form-group">
                        <label for="departure-start-date-edit" class="col-form-label">Link name</label>
                        <input type="text" class="form-control"
                               id="trek_link_name_edit">
                    </div>

                    <div class="form-group" hidden>
                        <label for="departure-start-date-edit" class="col-form-label">Category</label>
                        <input type="text" class="form-control"
                               id="trek_link_categ_edit">
                    </div>

                    <div class="form-group" hidden>
                        <label for="departure-start-date-edit" class="col-form-label">Link name</label>
                        <input type="text" class="form-control"
                               id="trek_link_edit" value="">
                    </div>

                    <div class="form-group">
                        <label for="departure-start-date-edit" class="col-form-label">Link</label>
                        <input type="text" class="form-control"
                               id="tbl_posts_edit" >
                    </div>

                </form>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="updatelinks()"  class="btn btn-primary">Save</button>
            </div>
            <span id="errlinks" style="color: red;"></span>
        </div>
    </div>
</div>
<!-- Modal edit end -->
<!-- Modal 3 start -->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
</body>

<script>
    $(document).ready(function () {

        $('#myTable').dataTable();
        st = window.location.href;
        var url = new URL(st);
        var c = url.searchParams.get("dep");
        if (c != '') {
            jQuery("#" + c + "-cardTrek").css("background", "#fc7988");
        }

        jQuery(document).delegate('a.add-record', 'click', function (e) {
            e.preventDefault();
            var content = jQuery('#sample_table tr'),
                size = jQuery('#tbl_posts >tbody >tr').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'rec-' + size);
            element.find('.delete-recordz').attr('data-id', size);
            element.find('.link').attr('id', 'link-' + size);
            element.appendTo('#tbl_posts_body');
            element.find('.sn').html(size);
        });
        jQuery(document).delegate('a.delete-recordz', 'click', function (e) {
            e.preventDefault();
            var didConfirm = confirm("Are you sure You want to delete");
            if (didConfirm == true) {
                var id = jQuery(this).attr('data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#rec-' + id).remove();

                //regnerate index number on table
                $('#tbl_posts_body tr').each(function (index) {
                    var nb = index + 1;
                    $(this).find('span.sn').html(nb);
                    $(this).find('.link').attr('id', 'link-' + nb);
                });
                return true;
            } else {
                return false;
            }
        });

    });
</script>

</html>