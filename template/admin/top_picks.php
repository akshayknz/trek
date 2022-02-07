<?php
error_reporting(0);
global $wpdb, $table_prefix;
$user_ID = get_current_user_id();













if (isset($_GET['season'])||isset($_GET['grade'])) {
    $season = $_GET['season'];
    $grade = $_GET['grade'];
    $queryBuild = '';
    if($grade!=''){
        $queryBuild .= 'and trek_grade = "'.$grade.'"';
    }else{
        $queryBuild .= '';
    }

    if($season!=''){
        // $queryBuild .= 'and trek_season = "'.$season.'"';
        $queryBuild .= " AND JSON_CONTAINS(trek_season, '\"" . $season . "\"', '$') ";
    }else{
        $queryBuild .= '';
    }


    $data = $wpdb->get_results('SELECT id,trek_name FROM wp_trektable_addtrekdetails where  trek_adddetails_status=0 and trek_publish_status=0 '.$queryBuild.'');
    
    
} else {
    $data = $wpdb->get_results('SELECT id,trek_name FROM ' . $table_prefix . 'trektable_addtrekdetails where id in (select trek_id from wp_trektable_top_picks where top_status=0) and trek_adddetails_status=0 and trek_publish_status=0');
}



$dataFilterGrade = $wpdb->get_results('SELECT distinct(trek_grade) as grades FROM ' . $table_prefix . 'trektable_addtrekdetails where trek_adddetails_status=0 order by top_pick ASC');
$dataFilterSeason = $wpdb->get_results('SELECT trek_season as seasons,id FROM ' . $table_prefix . 'trektable_season where trek_season_status=0');


//print_r( site_url()."/wp-admin/admin.php?page=trek_tth_top_picks");
//die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TTH - Home options</title>
    <meta name="description" content="">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

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
        background-color: #00CC44;
        border-radius: 50%;
        display: inline-block;
        margin-top: 8px;
    }

    .dot2 {
        height: 20px;
        width: 20px;
        background-color: #FF6666;
        border-radius: 50%;
        display: inline-block;
        margin-top: 8px;
    }

    /* (A) LIST STYLES */
    .slist {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .slist li {
        margin: 5px;
        padding: 10px;
        border: 1px solid #333;
        background: #EAEAEA;
        cursor: all-scroll;
    }

    .slist li:hover {
        background: #2271B1;
    }

    /* (B) DRAG-AND-DROP HINT */
    .slist li.hint {
        background: #fea;
    }

    .slist li.active {
        background: #FFD4D4;
    }

    #sortlist {
        width: 100%;
    }

    .top-trek-action {
        float: right;
        color: red;
        cursor: pointer;
    }

    #top-trek-name {
        float: left;
    }
</style>
<script>
    jQuery("#loader").css("display", "block");
</script>
<body style="margin:20px auto">
<div class="loader" id="loader">
</div>
<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Our Top Picks</h3>
    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            <select class="form-control top-select" name="tth-top-season" id="tth-top-season">
                <option value="">Select Season</option>
                <?php
                $SeasonCount = count($dataFilterSeason);
                for ($i = 0; $i < $SeasonCount; $i++) {
                    if ($dataFilterSeason[$i]->seasons == '') {
                        continue;
                    }
                    ?>
                    <option value="<?= $dataFilterSeason[$i]->seasons ?>"><?= $dataFilterSeason[$i]->seasons ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control top-select" name="tth-top-grade" id="tth-top-grade">
                <option value="">Select Grade</option>
                <?php
                $GradeCount = count($dataFilterGrade);
                for ($i = 0; $i < $GradeCount; $i++) {
                    if ($dataFilterGrade[$i]->grades == '') {
                        continue;
                    }
                    ?>
                    <option value="<?= $dataFilterGrade[$i]->grades ?>"><?= $dataFilterGrade[$i]->grades ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-info top-save"><i class="fas fa-save"></i>&nbsp;Save Changes</button>
        </div>
        <div class="col-md-2">
            <button class="btn btn-info top-refresh"><i class="fas fa-sync-alt"></i>&nbsp;Refresh</button>
        </div>
    </div>
    <div class="row mt-4">
        <ul id="sortlist">
            <?php
            $j = 0;
            $count = count($data);
            if($count>0){
                for ($i = 0; $i < $count; $i++) {
                $j++;
                ?>
                <li id="<?php echo $data[$i]->id; ?>"><span
                            id="top-trek-name"><?php echo $data[$i]->trek_name; ?></span><span id="top-trek-region">&nbsp;</span><span
                            class="top-trek-action"><i class="far fa-trash-alt"></i></span></li>
                <?php
            }
            }else{
                ?>
                <h4>No Treks Available for this combination!</h4>

                <?php
            }
            
            ?>
        </ul>
    </div>
    <hr>
</div>
<script>
    jQuery("#loader").css("display", "none");
</script>
</body>
<script>
    window.addEventListener("DOMContentLoaded", function () {
        slist("sortlist");
    });
</script>
<script>
    $(document).ready(function () {
        $("#tth-top-season").val('<?= $_GET['season']?$_GET['season']:"" ?>');
        $("#tth-top-grade").val('<?= $_GET['grade']?$_GET['grade']:"" ?>');
    });
</script>
<script>
    function slist(target) {
        // (A) GET LIST + ATTACH CSS CLASS
        target = document.getElementById(target);
        target.classList.add("slist");
        // (B) MAKE ITEMS DRAGGABLE + SORTABLE
        var items = target.getElementsByTagName("li"), current = null;
        for (let i of items) {
            // (B1) ATTACH DRAGGABLE
            i.draggable = true;
            // (B2) DRAG START - YELLOW HIGHLIGHT DROPZONES
            i.addEventListener("dragstart", function (ev) {
                current = this;
                for (let it of items) {
                    if (it != current) {
                        it.classList.add("hint");
                    }
                }
            });
            // (B3) DRAG ENTER - RED HIGHLIGHT DROPZONE
            i.addEventListener("dragenter", function (ev) {
                if (this != current) {
                    this.classList.add("active");
                }
            });
            // (B4) DRAG LEAVE - REMOVE RED HIGHLIGHT
            i.addEventListener("dragleave", function () {
                this.classList.remove("active");
            });
            // (B5) DRAG END - REMOVE ALL HIGHLIGHTS
            i.addEventListener("dragend", function () {
                for (let it of items) {
                    it.classList.remove("hint");
                    it.classList.remove("active");
                }
            });
            // (B6) DRAG OVER - PREVENT THE DEFAULT "DROP", SO WE CAN DO OUR OWN
            i.addEventListener("dragover", function (evt) {
                evt.preventDefault();
            });
            // (B7) ON DROP - DO SOMETHING
            i.addEventListener("drop", function (evt) {
                evt.preventDefault();
                if (this != current) {
                    let currentpos = 0, droppedpos = 0;
                    for (let it = 0; it < items.length; it++) {
                        if (current == items[it]) {
                            currentpos = it;
                        }
                        if (this == items[it]) {
                            droppedpos = it;
                        }
                    }
                    if (currentpos < droppedpos) {
                        this.parentNode.insertBefore(current, this.nextSibling);
                        // getData();
                    } else {
                        this.parentNode.insertBefore(current, this);
                        // getData();
                    }
                }
            });
        }
    }

    function getData() {
        var top_picks = [];
        $("#sortlist li").each(function (n) {
            top_picks.push(this.id);
        });

        // console.log(top_picks);
        return top_picks;
    }

    $(".top-trek-action").click(function () {
        var li = $(this).closest("li").attr("id");
        $("#" + li).remove();
        console.log(li);
    });


    $(".top-select").change(function () {
        // alert( $('option:selected', this).text() );
        var top_oder = getData();
        // console.log("changes: "+top_oder);
        var season = $("#tth-top-season").val();
        var grade = $("#tth-top-grade").val();
        if((season=='')&&(grade=='')){
            var url='<?= site_url()."/wp-admin/admin.php?page=trek_tth_top_picks" ?>';
            window.location.href =url;
            return;
        }else{
             var url='<?= site_url()."/wp-admin/admin.php?page=trek_tth_top_picks" ?>&season='+season+'&grade='+grade+'';
            window.location.href =url;
        }
       

    });
    $(".top-save").click(function () {
        // alert( $('option:selected', this).text() );
        var top_oder = getData();
        if(top_oder.length==0){
             console.log("Failed");
        }else{
             console.log("save: " + top_oder);
        var data = new FormData();
        data.append('topPicks', top_oder);
        data.append('action', 'InsertAllTopPicks');

        jQuery("#loader").css("display", "block");
        jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
        
                json = JSON.parse(msg);
                 jQuery("#loader").css("display", "none");
                if (json.statusCode == 200) {
        
                    if (json.result == 'inserted') {                       
                         var url='<?= site_url()."/wp-admin/admin.php?page=trek_tth_top_picks" ?>';
                        window.location.href =url;
                    }
                } else {
                    swal("Warning", "Some error occurred!");
                }
            }
        });
        }
       

    });
    $(".top-refresh").click(function () {
        var url='<?= site_url()."/wp-admin/admin.php?page=trek_tth_top_picks" ?>';
        window.location.href =url;
    });
</script>
</html>