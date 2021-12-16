<?php

global $wpdb, $table_prefix;
$user_ID = get_current_user_id();
$data = $wpdb->get_results('SELECT id,trek_policy_name,trek_policy_description FROM ' . $table_prefix . 'trektable_policy where trek_policy_status=0 order by id desc');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
     integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script> -->
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->

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

.wrap {
    display: flex;
}

.box1 {
    height: 80vh;
    /*  width: 50vw;*/
    background-color: #699bb5;
    overflow: scroll;
    border-style: solid;
    border-color: black;

}

li {
    color: black;

}

.box2 {
    height: 80vh;
    /*margin-left: 15px;*/
    /*  width: 50vw;*/
    background-color: #3c87ab;
    overflow: scroll;
}

.ulist {
    margin-top: 28px;
    list-style-type: circle;
    /*margin-left: 20px;*/


}

.card1 {

    position: relative;

    display: flex;

    flex-direction: column;
    min-width: 0;

    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(255, 0, 0, 0.8);
    border-radius: .25rem;


}

.litext {

    margin-left: 10px;
    margin-top: 5px;
    min-height: 38px;
}

.butnli {
    margin-left: 10px;
    margin-bottom: 5px;
}

span {
    display: flex;
}
</style>

<body>
    <!-- partial:index.partial.html -->
    <!-- Main -->
    <div class="loader" id="loader">

    </div>
    <div class="main">
        <div class="row col-md-12">
            <!--  <span class="pull-right" style="margin-top: 20px; margin-right: 10px;" id="submitbut2"><div class="btn btn-primary">Add Policy</div></span> -->
            <h3>Cancellation Policy</h3>
            <hr>

            <!-- <p>Create treks</p> -->
        </div>
        <div class="container">
            <div class="row col-md-12 wrap">
                <!-- <div class="d-md-flex h-md-100 box"> -->
                <div class="col-md-4 col-xm-12 box1" id="box1id" style="display: none;">

                    <center>
                        <h5 class="ulist">Cancellation Policies</h5>
                    </center>
                    <hr>
                    <ul class="ulist">
                        <?php
$count = count($data);
if ($count > 0) {
    for ($i = 0; $i < $count; $i++) {
        ?>
                        <li class="card1 allcards allcardunique-<?php echo $data[$i]->id; ?>"
                            id="<?php echo $data[$i]->id; ?>-policySelected">
                            <div class="litext"><?php echo $data[$i]->trek_policy_name; ?></div><br>
                            <div class="butnli"><button class="btn btn-danger cancelbut" style="display:none;"
                                    onclick="policycancelBut(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-policyCancelBut">Cancel</button>&nbsp;<button
                                    class="btn btn-primary editbut" style="display:'';" onclick="policyEdit(this.id)"
                                    id="<?php echo $data[$i]->id; ?>-policyEdit">Edit</button>&nbsp;<button
                                    class="btn btn-primary" id="<?php echo $data[$i]->id; ?>-policyDelete"
                                    onclick="policyDelete(this.id)">Delete</button></div>
                        </li>
                        <?php
}
} else {
    ?>
                        <li class="card1">
                            <div class="litext">No Records Available!</div>
                        </li>
                        <?php

}
?>

                    </ul>



                </div>

                <div class="col-md-12 box2" id="box2id">
                    <h3 class="text-center" id="createpolicy" style="display:block; margin-top: 10px;">Create Policy
                    </h3>
                    <h3 class="text-center" onclick="updatePolicy()" id="updateepolicy" style="display:none;">Update
                        Policy</h3>

                    <span style="margin-top: 30px;"><button class="btn btn-primary" onclick="editCancelPolicyClass()"
                            id="viewCancelPolicy">View</button>&nbsp;&nbsp;<button class="btn btn-success pull-right"
                            onclick="addCancelPolicy()" style="display: block;" id="addCancelPolicy">Add
                            Policy</button><button class="btn btn-success pull-right" onclick="updateCancelPolicy()"
                            style="display: none;" id="updateCancelPolicy">Update Policy</button></span>
                    <form style="margin-top: 20px;">

                        <div class="col-md-6">
                            <div class="form-group"><label for="trek_name">Cancellation Policy Name *</label>
                                <input id="trek_cancel_policy_name" type="text" class="form-control"
                                    placeholder="Policy Name *" required="required" data-error="required.">

                            </div>
                            <div class="form-group" hidden><label for="trek_name">Cancellation Policy Name *</label>
                                <input id="trek_cancel_policy_id" type="text" class="form-control"
                                    placeholder="Policy Name *" required="required" data-error="required.">

                            </div>
                        </div>
                        <hr>

                        <div class="row col-md-12" style="margin-top: 10px;">

                            <div class="form-group">

                                <textarea class="form-control" id="ckeditor" name="content" class="get_question_text">
                              </textarea>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Main -->
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/popper.min.js'></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script>
    CKEDITOR.replace('content');
    </script>
</body>

</html>