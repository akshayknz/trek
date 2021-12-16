<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trektable_trek_essential where trek_essential_status=0 order by id desc');

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

        .customeEssentialTable{
            background: #DCC7D9 !important;
            text-align: center;
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
<button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Trek Essential
    </button>
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Trek Essential- Ready to use Templates</h3>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Trek Essential</th>
                    <th class="text-center">Manage Essentials</th>
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
                        <td style="text-align: center;"><?php echo $data[$i]->trek_essential_name; ?></td>
                        <td class="text-center">

                            <?php
                            if($data[$i]->trek_essential_bg==''){
                                ?>
                                 <button class="myButton btn btn-primary" id="<?php echo $data[$i]->id; ?>" onclick="getReadyModal(this.id,'modalData1')" data-toggle="modal" data-target="#exampleModal1">Basic gear
                            </button>

                                <?php
                            }else{
                                ?>
                                 <button class="myButton btn btn-success" id="bgear-<?php echo $data[$i]->id; ?>" onclick="EssEdit(this.id)" data-toggle="modal" data-target="#editModal1">Basic gear
                            </button>

                                <?php
                            }
                            ?>

                            <?php
                            if($data[$i]->trek_essential_cloth==''){
                                ?>
                                 <button class="myButton btn btn-primary" id="<?php echo $data[$i]->id; ?>" onclick="getReadyModal(this.id,'modalData2')" data-toggle="modal" data-target="#exampleModal2">Cloths
                            </button>

                                <?php
                            }else{
                                ?>
                                 <button class="myButton btn btn-success" id="cloths-<?php echo $data[$i]->id; ?>" onclick="EssEdit(this.id)" data-toggle="modal" data-target="#editModal2">Cloths
                            </button>

                                <?php
                            }
                            ?>

                            <?php
                            if($data[$i]->trek_essential_pu==''){
                                ?>
                                  <button class="myButton btn btn-primary" id="<?php echo $data[$i]->id; ?>" onclick="getReadyModal(this.id,'modalData3')" data-toggle="modal" data-target="#exampleModal3">Utility
                            </button>

                                <?php
                            }else{
                                ?>
                                  <button class="myButton btn btn-success" id="util-<?php echo $data[$i]->id; ?>" onclick="EssEdit(this.id)" data-toggle="modal" data-target="#editModal3">Utility
                            </button>

                                <?php
                            }
                            ?>

                            <?php
                            if($data[$i]->trek_essential_hg==''){
                                ?>
                                 <button class="myButton btn btn-primary" id="<?php echo $data[$i]->id; ?>" onclick="getReadyModal(this.id,'modalData4')" data-toggle="modal" data-target="#exampleModal4">Head gears
                            </button>

                                <?php
                            }else{
                                ?>
                                 <button class="myButton btn btn-success" id="head-<?php echo $data[$i]->id; ?>" onclick="EssEdit(this.id)" data-toggle="modal" data-target="#editModal4">Head gears
                            </button>

                                <?php
                            }
                            ?>

                            <?php
                            if($data[$i]->trek_essential_fg==''){
                                ?>
                                 <button class="myButton btn btn-primary" id="<?php echo $data[$i]->id; ?>" onclick="getReadyModal(this.id,'modalData5')" data-toggle="modal"  data-target="#exampleModal5">Foot gears
                            </button>

                                <?php
                            }else{
                                ?>
                                 <button class="myButton btn btn-success" id="foot-<?php echo $data[$i]->id; ?>" onclick="EssEdit(this.id)" data-toggle="modal"  data-target="#editModal5">Foot gears
                            </button>

                                <?php
                            }
                            ?>

                           
                           
                          
                           
                           
                        </td>
                        <td  class="text-center"><a hidden class="btn btn-info" onclick="EssEdit(this.id)"
                                                   id="<?php echo $data[$i]->id; ?>-FitEdit" role="button"
                                                   data-toggle="modal"
                                                   data-target="#editModal">Edit</a>
                            <a class="btn btn-danger" onclick="EssDelete(this.id)"
                               id="<?php echo $data[$i]->id; ?>-FitDelete" role="button">Delete</a>
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

<div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Basic gear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data">
                    <div class="well clearfix">
                        <a class="btn btn-primary pull-right add-record1 float-right" data-added="0"><i class="fa fa-plus"
                                                                                           aria-hidden="true"></i>&nbsp;Add
                            Row</a>
                    </div>
                    <div class="well clearfix" hidden>
                       <input type="text" id="modalData1">
                    </div>
                    <br>

                    <table class="table table-bordered" id="tbl_posts1">
                        <thead>
                        <tr>
                            <th hidden>#</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbl_posts_body1">
                        <tr id="rec-bg-1">
                            <td hidden><span class="sn">1</span>.</td>
                            <td><input type="text" class="form-data" id="name_bg-1" /></td>
                            <td><input type="text" class="form-data" id="val_bg-1" /></td>
                            <td><a class="btn btn-xs delete-record" id="bg" data-id="1" hidden><i class="fa fa-trash"
                                                                                   aria-hidden="true"></i></i></a></td>
                        </tr>
                        </tbody>
                    </table>

                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('bgear')" class="btn btn-primary">Add basic gear</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cloths</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data">
                    <div class="well clearfix">
                        <a class="btn btn-primary pull-right add-record2 float-right" data-added="0"><i class="fa fa-plus"
                                                                                                       aria-hidden="true"></i>&nbsp;Add
                            Row</a>
                    </div>
                     <div class="well clearfix" hidden>
                       <input type="text" id="modalData2">
                    </div>
                    <br>

                    <table class="table table-bordered" id="tbl_posts2">
                        <thead>
                        <tr>
                            <th hidden>#</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbl_posts_body2">
                        <tr id="rec-clth-1">
                            <td hidden><span class="sn">1</span>.</td>
                            <td><input type="text" class="form-data" id="name_clth-1"/></td>
                            <td><input type="text" class="form-data" id="val_clth-1"/></td>
                            <td><a class="btn btn-xs delete-record" id="clth" data-id="1" hidden><i class="fa fa-trash"
                                                                                   aria-hidden="true"></i></i></a></td>
                        </tr>
                        </tbody>
                    </table>

                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('cloths')" class="btn btn-primary">Add Cloths</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="exampleModal3" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Personal utilities</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data">
                    <div class="well clearfix">
                        <a class="btn btn-primary pull-right add-record3 float-right" data-added="0"><i class="fa fa-plus"
                                                                                                       aria-hidden="true"></i>&nbsp;Add
                            Row</a>
                    </div>
                     <div class="well clearfix" hidden>
                       <input type="text" id="modalData3">
                    </div>
                    <br>

                    <table class="table table-bordered" id="tbl_posts3">
                        <thead>
                        <tr>
                            <th hidden>#</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbl_posts_body3">
                        <tr id="rec-pu-1">
                            <td hidden><span class="sn">1</span>.</td>
                            <td><input type="text" class="form-data" id="name_pu-1" /></td>
                            <td><input type="text" class="form-data" id="val_pu-1"/></td>
                            <td><a class="btn btn-xs delete-record" id="pu" data-id="1" hidden><i class="fa fa-trash"
                                                                                   aria-hidden="true"></i></i></a></td>
                        </tr>
                        </tbody>
                    </table>

                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('util')" class="btn btn-primary">Add utility</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal4" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Head gear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data">
                    <div class="well clearfix">
                        <a class="btn btn-primary pull-right add-record4 float-right" data-added="0"><i class="fa fa-plus"
                                                                                                       aria-hidden="true"></i>&nbsp;Add
                            Row</a>
                    </div>
                     <div class="well clearfix" hidden>
                       <input type="text" id="modalData4">
                    </div>
                    <br>

                    <table class="table table-bordered" id="tbl_posts4">
                        <thead>
                        <tr>
                            <th hidden>#</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbl_posts_body4">
                        <tr id="rec-hg-1">
                            <td hidden><span class="sn">1</span>.</td>
                            <td><input type="text" class="form-data" id="name_hg-1"/></td>
                            <td><input type="text" class="form-data" id="val_hg-1"/></td>
                            <td><a class="btn btn-xs delete-record" id="hg" data-id="1" hidden><i class="fa fa-trash"
                                                                                   aria-hidden="true"></i></i></a></td>
                        </tr>
                        </tbody>
                    </table>

                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('head')" class="btn btn-primary">Add head gear</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal5" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foot gear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data">
                    <div class="well clearfix">
                        <a class="btn btn-primary pull-right add-record5 float-right" data-added="0"><i class="fa fa-plus"
                                                                                                       aria-hidden="true"></i>&nbsp;Add
                            Row</a>
                    </div>
                     <div class="well clearfix" hidden>
                       <input type="text" id="modalData5">
                    </div>
                    <br>

                    <table class="table table-bordered" id="tbl_posts5">
                        <thead>
                        <tr>
                            <th hidden>#</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbl_posts_body5">
                        <tr id="rec-fg-1">
                            <td hidden><span class="sn">1</span>.</td>
                            <td><input type="text" class="form-data" id="name_fg-1"/></td>
                            <td><input type="text" class="form-data" id="val_fg-1"/></td>
                            <td><a class="btn btn-xs delete-record" id="fg" data-id="1" hidden><i class="fa fa-trash"
                                                                                   aria-hidden="true"></i></a></td>
                        </tr>
                        </tbody>
                    </table>

                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('foot')" class="btn btn-primary">Add foot gear</button>
            </div>
        </div>
    </div>
</div>

<div style="display:none;">
    <table id="sample_table">
        <tr id="">
            <td hidden><span class="sn"></span>.</td>
            <td><input type="text" class="form-data name" id=""/></td>
            <td><input type="text" class="form-data val" id=""/></td>
            <td><a class="btn btn-xs delete-record" data-id="0" id=""><i class="fa fa-trash"
                                                                   aria-hidden="true"></i></a></td>
        </tr>
    </table>
</div>


<!-- edit modal-->
<div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Basic Gear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Basic gear:</label>
                       <textarea id="edit-basic-gear" class="form-control essTextArea"></textarea>
                    </div>

                    <hr>
                     <table class="table table-bordered customeEssentialTable" id="basic-edit-table">
                        <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Value</th>
                           
                        </tr>
                        </thead>
                        <tbody id="basic-edit-table-body">
                      
                        </tbody>
                    </table>
                
                    <div class="well clearfix" hidden>
                       <input type="text" id="modalDataEdit1">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('basic-edit')" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Head Gear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Head Gear:</label>
                       <textarea id="edit-head-gear" class="form-control essTextArea"></textarea>
                    </div>

                    <hr>
                     <table class="table table-bordered customeEssentialTable" id="head-edit-table">
                        <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Value</th>
                           
                        </tr>
                        </thead>
                        <tbody id="head-edit-table-body">
                      
                        </tbody>
                    </table>
                
                    <div class="well clearfix" hidden>
                       <input type="text" id="modalDataEdit4">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('head-edit')" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Cloth Essentials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Cloth Essentials:</label>
                       <textarea id="edit-cloth-gear" class="form-control essTextArea"></textarea>
                    </div>

                    <hr>
                     <table class="table table-bordered customeEssentialTable" id="cloth-edit-table">
                        <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Value</th>
                           
                        </tr>
                        </thead>
                        <tbody id="cloth-edit-table-body">
                      
                        </tbody>
                    </table>
                
                    <div class="well clearfix" hidden>
                       <input type="text" id="modalDataEdit2">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('cloth-edit')" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Personal Utilities</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Personal Utilities:</label>
                       <textarea id="edit-utility-gear" class="form-control essTextArea"></textarea>
                    </div>
                    <hr>
                     <table class="table table-bordered customeEssentialTable" id="utility-edit-table">
                        <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Value</th>
                           
                        </tr>
                        </thead>
                        <tbody id="utility-edit-table-body">
                      
                        </tbody>
                    </table>

                
                    <div class="well clearfix" hidden>
                       <input type="text" id="modalDataEdit3">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('personal-edit')" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Foot Gear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Foot Gear</label>
                       <textarea id="edit-foot-gear" class="form-control essTextArea"></textarea>
                    </div>
                     <hr>
                     <table class="table table-bordered customeEssentialTable" id="foot-edit-table">
                        <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Value</th>
                           
                        </tr>
                        </thead>
                        <tbody id="foot-edit-table-body">
                      
                        </tbody>
                    </table>

                    <div class="well clearfix" hidden>
                       <input type="text" id="modalDataEdit5">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEss('foot-edit')" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Template for Trek Essential</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Trek Essential:</label>
                            <input type="text" class="form-control" id="ess-name">
                        </div>
                     

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addEss('default')" class="btn btn-primary">Add Essentials</button>
                </div>
            </div>
        </div>
    </div>
</body>
<!--<script>-->
<!--    var editor18 = CKEDITOR.replace('trek_ess_edit');-->
<!--    CKFinder.setupCKEditor(editor18);-->
<!--    var editor19 = CKEDITOR.replace('trek_ess_add');-->
<!--    CKFinder.setupCKEditor(editor19);-->
<!--</script>-->
<script>
    $(document).ready(function () {
        $('#myTable').dataTable();

    });

    function getReadyModal(id,data){
        if((id=='')||(data=='')){
            alert("Something went wrong");
            return;
        }else{
            $("#"+data).val('');
            $("#"+data).val(id);
        }
    }

</script>

</html>