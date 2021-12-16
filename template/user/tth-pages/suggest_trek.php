<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT id,preferred_time,looking_for,full_name,email,service_required,trek_updated_time,trek_info_read_status FROM ' . $table_prefix . 'trek_user_sugget_trek where trek_tth_status="0" order by id DESC');

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

    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Suggest Trek - User Response</h3>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Looking_for</th>
                            <th class="text-center">Service</th>
                            <th class="text-center">Enquiry Date</th>
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
                            <td style="text-align: center;"><?php echo $data[$i]->full_name; ?></td>
                            <td style="text-align: center;"><?php echo $data[$i]->email; ?></td>
                            <td style="text-align: center;"><?php echo $data[$i]->looking_for; ?></td>
                            <td style="text-align: center;"><?php echo $data[$i]->service_required; ?></td>
                            <?php
                            if($data[$i]->trek_info_read_status==1){
                                ?>
                                <td class="text-center"><?php echo $data[$i]->trek_updated_time; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-envelope" style="color:green;"></i></td>

                                <?php
                            }else{
                                ?>
                                <td class="text-center"><?php echo $data[$i]->trek_updated_time; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-envelope-open"></i></td>
                                <?php
                            }
                            ?>

                            
                            <td class="text-center">
                                <a class="btn btn-info" role="button" href="admin.php?page=view_suggest_trek_details&num=<?php echo $data[$i]->id; ?>"
                                   >View</a>
                               
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
                    <h5 class="modal-title" id="exampleModalLabel">Create New NewsLetter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="tth-news-category">Select Category:</label>
                            <select class="form-control" name="tth-news-category" id="tth-news-category">
                                <option value="news">TTH News</option>
                                <option value="info">TTH Info</option>


                            </select>

                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="news-title">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Sub Title:</label>
                            <input type="text" class="form-control" id="news-sub-title">
                        </div>


                        <div class="form-group">
                            <label for="tth-award-priority">Select Priority:</label>
                            <select class="form-control" name="tth-award-priority" id="news-priority">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>

                            </select>

                        </div>
                        <div class="row col-md-12" style="margin-top: 10px;">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Content:</label>
                                <textarea class="form-control" id="news_content" name="content"
                                    class="get_question_text">
                              </textarea>

                            </div>
                        </div>

                    </form>

                    <label for="recipient-name" class="col-form-label">Cover Photo:</label>
                    <input type="button" value="Choose File" onclick="uploadNewsImage()" class="form-control-file"
                        id="trek_upload1" name="trek_upload1">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="createNewsLetter()" class="btn btn-primary">Add News</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit NewsLetter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="tth-news-category">Select Category:</label>
                            <select class="form-control" name="tth-news-category-edit" id="tth-news-category-edit">
                                <option value="news">TTH News</option>
                                <option value="info">TTH Info</option>


                            </select>

                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="news-title-edit">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Sub Title:</label>
                            <input type="text" class="form-control" id="news-sub-title-edit">
                        </div>
                        <div class="form-group">
                            <label for="tth-award-priority">Select Priority:</label>
                            <select class="form-control" name="news-priority-edit" id="news-priority-edit">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>

                            </select>

                        </div>

                        <div class="row col-md-12" style="margin-top: 10px;">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Content:</label>
                                <textarea class="form-control" id="news_content_edit" name="content"
                                    class="get_question_text">
                              </textarea>

                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label for="recipient-name" class="col-form-label"></label>
                            <input type="text" class="form-control" id="news-id-edit">
                        </div>

                    </form>
                    <img src="" id="news_tth_cover_edit" style="max-height: 200px;max-width: 200px;"><br>
                    <label for="recipient-name" class="col-form-label">Change Photo:</label>
                    <input type="button" value="Choose File" onclick="uploadNewsImage()" class="form-control-file"
                        id="trek_upload1" name="trek_upload1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="updateNewsLetter()" class="btn btn-primary">Save Changes</button>
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