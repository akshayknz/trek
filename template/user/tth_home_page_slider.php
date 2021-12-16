<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_pages_tth_news where trek_tth_category="slider" order by trek_tth_news_priority ASC');
$dataTitle = $wpdb->get_results('SELECT trek_content,trek_context FROM ' . $table_prefix . 'trektable_context where trek_context in("trek-news-heading","trek-info-heading")  order by id ASC');


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
   
    <button class="myButton btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Slider Content
    </button>
    <div class="container">
        <div class="row header" style="text-align:center;color:green">
            <h3>Home page slider</h3>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Title</th>
              
                            <th class="text-center">Sub Title</th>
                            <th class="text-center">Updated Time</th>
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
                            <td style="text-align: center;"><?php echo $data[$i]->trek_tth_title; ?></td>
           
                             <td style="text-align: center;"><?php echo $data[$i]->trek_tth_sub; ?></td>
                            <td class="text-center"><?php echo $data[$i]->trek_updated_time; ?></td>
                            <td class="text-center"><a class="btn btn-info" onclick="updateNewsLetterFetch(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-NewsEdit" role="button" data-toggle="modal"
                                    data-target="#editModal">Edit</a>
                                <a class="btn btn-danger" onclick="deleteNewsLetter(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-NewsDelete" role="button">Delete</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Create New Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                         <div class="form-group">
                              <label for="tth-news-category">Select Category:</label>
                            <select class="form-control" name="tth-news-category"  id="tth-news-category">
                              <option value="slider" selected>TTH Slider</option>
                            
                              
                            
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
                            <label for="recipient-name" class="col-form-label">Know More (Link):</label>
                            <input type="text" class="form-control" id="news-know-more">
                        </div>
                       

                         <div class="form-group">
                              <label for="tth-award-priority">Select Priority:</label>
                            <select class="form-control" name="tth-award-priority"  id="news-priority">
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

                            <div class="form-group" hidden="hidden">
                                 <label for="recipient-name" class="col-form-label">Content:</label>
                                <textarea class="form-control" id="news_content" name="content"
                                    class="get_question_text">
                              </textarea>

                            </div>

                        </div>

                    </form>
                   
                            <label for="recipient-name" class="col-form-label">Cover Photo:</label>
                             <input type="button" value="Choose File" onclick="uploadNewsImage()"
                                                        class="form-control-file" id="trek_upload1" name="trek_upload1">
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="createNewsLetter()" class="btn btn-primary">Add Slider</button>
                </div>
            </div>
        </div>
    </div>

   

  

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                          <div class="form-group">
                              <label for="tth-news-category">Select Category:</label>
                            <select class="form-control" name="tth-news-category-edit"  id="tth-news-category-edit">
                              <option value="slider" selected>TTH Slider</option>
                             
                              
                            
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
                            <label for="recipient-name" class="col-form-label">Know More (Link):</label>
                            <input type="text" class="form-control" id="news-know-more-edit">
                        </div>
                        <div class="form-group">
                              <label for="tth-award-priority">Select Priority:</label>
                            <select class="form-control" name="news-priority-edit"  id="news-priority-edit">
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

                            <div class="form-group" hidden="hidden">
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
                             <input type="button" value="Choose File" onclick="uploadNewsImage()"
                                                        class="form-control-file" id="trek_upload1" name="trek_upload1">
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

const createTitle = (method)=>{

if((method=='news')||(method=='info')){
      var data = new FormData();
     
      if(method=='news'){
        let titleContent = $("#news-title-var").val();
        data.append("context", "trek-news-heading");
         data.append("content", titleContent);
      }else if(method=='info'){
        let titleContent = $("#info-title-var").val();
        data.append("context", "trek-info-heading");
         data.append("content", titleContent);
      }
      data.append("action", "updateArticleTitle");

      jQuery.ajax({
        type: "post",
        cache: false,
        contentType: false,
        processData: false,
        url: my_obj.ajax_url,
        data: data,
        success: function (msg) {
          json = JSON.parse(msg);

          if (json.statusCode == 200) {
            if (json.result == "update") {
              location.reload();
            }
          } else {
            alert("Some error occured!");
          }
        },
      });
}

}


</script>

</html>