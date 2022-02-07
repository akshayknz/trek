<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_trek_riskandrespond order by id desc');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
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
<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Risk and response
</button>
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Trek Risk and respond</h3>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">R&R Name</th>
                    <th class="text-center">File</th>
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
                        <td style="text-align: center;"><?php echo $data[$i]->trek_risk_name; ?></td>
                        <td class="text-center"><a class="btn btn-primary"
                                                   href="<?= get_site_url() ?>/wp-content/plugins/trek/template/admin<?php echo $data[$i]->trek_risk_content; ?>"
                                                   target="_blank" role="button">Preview</a></td>
                        <td class="text-center">
                            <a class="btn btn-danger" onclick="menuRiskDelete(this.id)"
                               id="<?php echo $data[$i]->id; ?>-RRDelete" role="button">Delete</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new R&R policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">R&R policy name:</label>
                        <input type="text" class="form-control" id="rr-name">
                    </div>
                    <div class="row col-md-12" style="margin-top: 10px;">
                        <div class="form-group">
                            <input type="file" name="trek_fitness_file" id="trek_fitness_file"
                                   onchange="upload(trek_fitness_file)" accept="application/pdf">
                        </div>
                    </div>
                    <button type="button" name="submit" onclick="addmenuRR()" class="btn btn-primary">Add
                    </button>
                    <input type="text" id="uploadurl" hidden>
                    <span id="uploaderr" style="color: red;"></span>
                    <span id="uploadSucess" style="color: green"></span>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


</body>
<script>
    // var editor18 = CKEDITOR.replace('trek_fit_edit');
    // CKFinder.setupCKEditor(editor18);
    // var editor19 = CKEDITOR.replace('trek_fit_add');
    // CKFinder.setupCKEditor(editor19);
</script>
<script>
    $(document).ready(function () {
        $('#myTable').dataTable();

    });
</script>

</html>