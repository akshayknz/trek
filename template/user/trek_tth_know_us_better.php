<?php
global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'tth_why where tth_why_status=0 and id =1');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Know us better</title>
    <meta name="description" content="">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
    <style>
        .set-padding {
            padding: 25px;
        }
    </style>
</head>

<body style="margin:20px auto">

<div class="loader" id="loader">

</div>

<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Know Us Better</h3>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-10" style="min-height: 450px;background-color: #C0C7D3;">
            <div style="text-align: center;">
                <div class="row header"
                     style="text-align:center;color:black;margin-left: 20px;margin-top: 10px;padding: 5px;">
                    <h3>Edit</h3>
                </div>
            </div>
            <hr>
              <div class="col-md-8 set-padding">
                <label for="tth_why_caption"><b>Section Title</b></label><input id="tth_why_caption" placeholder="caption" style="width: 100%"
                                                               value="<?php echo stripslashes($data[0]->tth_why_caption); ?>" >
              
            </div>

            <div class="col-md-8 set-padding">
                <label for="tth_why_short_desc"><b>Short description</b></label><br>
               
                <textarea id="tth_why_short_desc" placeholder="short description" rows="4" style="width:100%;"><?php echo stripslashes($data[0]->tth_why_short_desc); ?></textarea>
            </div>

            <div class="col-md-3 card gallarybox2 set-padding" style="margin-left: 26px;">
                <div class="form-group"><label for="trek_Transportation"> Images (144x156)*
                        </label>
                    <input type="button" value="Choose File" onclick="upload2Edit()"
                           class="form-control-file file2" name="trek_upload2[]"
                           id="trek_upload2" multiple>
                </div>
                <hr>
                <div id="ge2" style="display: flex;flex-wrap: wrap;"></div>
                <br>
                <textarea id="allgalleryimg"
                          hidden><?php echo $data[0]->tth_why_imgs; ?></textarea>
                <div id="trek_upload_img2" name="trek_upload_img2"
                     style="display: flex;flex-wrap: wrap;">
                    <?php
                    $resultGallery = explode(",", $data[0]->tth_why_imgs);
                    $galleryCount = count($resultGallery);
                    for ($i = 0; $i < $galleryCount; $i++) {
                        ?>
                        <img src="<?php echo $resultGallery[$i]; ?>"
                             id="galleryimg-<?php echo $i; ?>"
                             style="height: 60px;width: 60px;padding: 5px"/><span>
                                                         <div style="color: red;cursor: pointer;"
                                                              id="galleryclose-<?php echo $i; ?>"
                                                              onclick="gallery_img_edit(this.id)"><b>X</b></div>
                                                     </span>
                        <?php
                    }
                    ?>
                </div>
               
            </div><br><br>
               <button type="button" id="<?php echo $data[0]->id; ?>" class="btn btn-primary" onclick="savethedata(this.id)" style="float: right;">Save Details</button><br><br>
          


        </div>

    </div>


</div>
</body>

<script>
    function savethedata(id)
    {
        let gallery = $("#allgalleryimg").val();
        let caption=$("#tth_why_caption").val();
        let short_desc=$("#tth_why_short_desc").val();
        if(gallery==""||caption==""||short_desc=="")
        {
            toastr.warning('All fileds are required');
        }
        else
        {
            var data = new FormData();
            data.append('imgs', gallery);
            data.append('caption', caption);
            data.append('short_desc', short_desc);
            data.append('id', id);
            data.append('action', 'know_us_better');
            jQuery.ajax({
                type: "post",
                cache: false,
                contentType: false,
                processData: false,
                url: my_obj.ajax_url,
                data: data,
                success: function (msg) {
                    json = JSON.parse(msg);
                    if(json.statusCode==200)
                    {
                        toastr.success('Saved');
                        setTimeout(function(){ location.reload() }, 3000)
                    }
                    else
                    {
                        toastr.warning(json.info);
                    }
                }
            });

        }

    }

</script>

</html>