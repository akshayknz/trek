<?php
/**
 *@package TrekPlugin
 */
$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once $path . '/wp-load.php';
global $wpdb;
$ptbd_table_name = '';
if (isset($_POST['action'])) {

    if ($_POST['action'] == 'contactMail') {
        $ptbd_table_name = 'wp_trek_pages_tth_contacts';
        $data = $_POST['dataVal'];
        $code = $_POST['actionId'];
        if ($code == '6563') {
            $dataArr = array("trek_tth_mail" => $data);
        } else if ($code == '6543') {
            $dataArr = array("trek_tth_c1" => $data);
        } else if ($code == '6277') {
            $dataArr = array("working_hours" => $data);
        }else if ($code == '6288') {
            $dataArr = array("b_to_b_text" => $data);
        }

        if ($wpdb->update('' . $ptbd_table_name . '', $dataArr, array(
            'id' => 1)) === false) {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';
            $result->message = 'failed';
            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'updated';
            $result->message = 'success';
            echo json_encode($result);
        }

    }

// News section

    if ($_POST['action'] == 'addNews') {
        $ptbd_table_name = 'wp_trek_pages_tth_news';
        $news_title = $_POST['news_title'];
        $news_sub_title = $_POST['news_sub_title'];
        $newsImage = $_POST['newsImage'];
        $news_priority = $_POST['news_priority'];
        $news_content = $_POST['news_content'];
        $news_category = $_POST['news_category'];
        $news_know_more = $_POST['news_know_more'];

        $dataArr = array(
            "trek_tth_title" => $news_title,
            "trek_tth_sub" => $news_sub_title,
            "trek_tth_category" => $news_category,
            "trek_tth_news_poster" => $newsImage,
            "trek_tth_news_priority" => $news_priority,
            "trek_tth_content" => $news_content,
            "tth_know_more" => $news_know_more,
        );
        $result_check = $wpdb->insert('' . $ptbd_table_name . '', $dataArr);
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'inserted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'getNews') {
        $ptbd_table_name = 'wp_trek_pages_tth_news';
        $news_id = $_POST['news_id'];
        $result_check = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'trek_pages_tth_news where id="' . $news_id . '"');

        if (!empty($result_check)) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'fetched';
            $result->message = $result_check;
            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'updateNews') {
        $ptbd_table_name = 'wp_trek_pages_tth_news';
        $news_title = $_POST['news_title'];
        $tth_news_category = $_POST['tth_news_category'];
        $news_sub_title = $_POST['news_sub_title'];
        $newsImage = $_POST['newsImage'];
        $news_priority = $_POST['news_priority'];
        $news_know_more = $_POST['news_know_more'];
        $news_content = $_POST['news_content'];
        $news_id = $_POST['news_id'];
        if ($newsImage != '') {
            $dataArr = array(
                "trek_tth_title" => $news_title,
                "trek_tth_sub" => $news_sub_title,
                "trek_tth_category" => $tth_news_category,
                "trek_tth_news_poster" => $newsImage,
                "trek_tth_news_priority" => $news_priority,
                "trek_tth_content" => $news_content,
                "tth_know_more" => $news_know_more,
            );
        } else {
            $dataArr = array(
                "trek_tth_title" => $news_title,
                "trek_tth_sub" => $news_sub_title,
                "trek_tth_category" => $tth_news_category,
                "trek_tth_news_priority" => $news_priority,
                "trek_tth_content" => $news_content,
                "tth_know_more" => $news_know_more,
            );
        }

        if ($wpdb->update('' . $ptbd_table_name . '', $dataArr, array(
            'id' => $news_id)) === false) {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'updated';

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'deleteNews') {
        $ptbd_table_name = 'wp_trek_pages_tth_news';
        $news_id = $_POST['news_id'];

        $result_check = $wpdb->delete($ptbd_table_name, array('id' => $news_id));
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'deleted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    // End News Section



// Team members

    if ($_POST['action'] == 'addMember') {
        $ptbd_table_name = 'wp_trek_pages_tth_team';
        $role = $_POST['role'];
        $people_priority = $_POST['people_priority'];
        $people_name = $_POST['people_name'];
        $people_description = $_POST['people_description'];
        $people_description_long = $_POST['people_description_long'];
        $people_image = $_POST['people_image'];

        $dataArr = array(
            "trek_tth_name" => $people_name,
            "trek_tth_short_description" => $people_description,
            "trek_tth_long_description" => $people_description_long,
            "trek_tth_images" => $people_image,
            "trek_tth_role" => $role,
            "trek_tth_role_priority" => $people_priority,
        );
        $result_check = $wpdb->insert('' . $ptbd_table_name . '', $dataArr);
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'inserted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'getPeople') {
        $ptbd_table_name = 'wp_trek_pages_tth_team';
        $people_id = $_POST['people_id'];
        $result_check = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name . ' where id="' . $people_id . '"');

        if (!empty($result_check)) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'fetched';
            $result->message = $result_check;
            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'updatePeople') {
        $ptbd_table_name = 'wp_trek_pages_tth_team';
        $role = $_POST['role'];
        $people_priority = $_POST['people_priority'];
        $people_name = $_POST['people_name'];
        $people_description = $_POST['people_description'];
        $people_description_long = $_POST['people_description_long'];
        $people_image = $_POST['people_image'];
        $people_id = $_POST['people_id'];
       

        if ($people_image != 'undefined') {
            $dataArr = array(
                "trek_tth_name" => $people_name,
                "trek_tth_short_description" => $people_description,
                "trek_tth_long_description" => $people_description_long,
                "trek_tth_images" => $people_image,
                "trek_tth_role" => $role,
                "trek_tth_role_priority" => $people_priority,
            );
        } else {
            $dataArr = array(
                "trek_tth_name" => $people_name,
                "trek_tth_short_description" => $people_description,
                "trek_tth_long_description" => $people_description_long,
                "trek_tth_role" => $role,
                "trek_tth_role_priority" => $people_priority,
            );
        }

        if ($wpdb->update('' . $ptbd_table_name . '', $dataArr, array(
            'id' => $people_id)) === false) {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';
                        $result->tets = $dataArr;


            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'updated';

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'deletePeople') {
        $ptbd_table_name = 'wp_trek_pages_tth_team';
        $people_id = $_POST['people_id'];

        $result_check = $wpdb->delete($ptbd_table_name, array('id' => $people_id));
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'deleted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    //Volunteer

     if ($_POST['action'] == 'getVolData') {
        $ptbd_table_name = 'wp_tth_volunteer_program';
        $vol_id = $_POST['volu_id'];
        $result_check = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name . ' where id="' . $vol_id . '"');

        $result = new stdClass();
        if (!empty($result_check)) {
            $result->statusCode = 200;
            $result->result = 'fetched';
            $result->message = $result_check;
        } else {
            $result->statusCode = 401;
            $result->result = 'failed';
        }
        echo json_encode($result);
    }



// Award & recoginition

    if ($_POST['action'] == 'addAwards') {
        $ptbd_table_name = 'wp_trek_pages_tth_awards';
        $role = $_POST['role'];
        if ($role == 'certification') {
            $award_title = $_POST['award_title'];
            $award_priority = $_POST['award_priority'];
            $award_image = $_POST['award_image'];
            $dataArr = array(
                "trek_tth_title" => $award_title,
                "trek_tth_award_image" => $award_image,
                "trek_tth_award_priority" => $award_priority,
                "trek_tth_role" => $role,
            );
        } else if ($role == 'recoginition') {
            $tth_award_brief = $_POST['tth_award_brief'];
            $award_priority = $_POST['award_priority'];
            $award_image = $_POST['award_image'];
            $dataArr = array(
                "trek_tth_brief" => $tth_award_brief,
                "trek_tth_award_image" => $award_image,
                "trek_tth_award_priority" => $award_priority,
                "trek_tth_role" => $role,
            );
        }

        $result_check = $wpdb->insert('' . $ptbd_table_name . '', $dataArr);
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'inserted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'EditAwards') {
        $ptbd_table_name = 'wp_trek_pages_tth_awards';
        $breif = $_POST['breif'];
        $award_id = $_POST['award_id'];
        $priority = $_POST['priority'];
        $dataArr = array(
            "trek_tth_brief" => $breif,
            "trek_tth_award_priority" => $priority,
        );

        if ($wpdb->update('' . $ptbd_table_name . '', $dataArr, array(
            'id' => $award_id)) === false) {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'updated';

            echo json_encode($result);
        }

    }


    if ($_POST['action'] == 'deleteAward') {
        $ptbd_table_name = 'wp_trek_pages_tth_awards';
        $award_id = $_POST['award_id'];

        $result_check = $wpdb->delete($ptbd_table_name, array('id' => $award_id));
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'deleted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

// End Award & recoginition

    // Graph

     if ($_POST['action'] == 'getGraph') {

        $id=$_POST['id'];
        $res=explode('-',$id);
        $img=$_POST['img'];
        $ptbd_table_name = 'wp_trektable_addtrekdetails';
        $tth_data = $wpdb->get_results('SELECT trek_selected_flags FROM ' . $ptbd_table_name . ' where id=' . $res[0] . '');
        $result = new stdClass();
        if($tth_data[0]->trek_selected_flags!='nil')
        {
            $result->statusCode = 200;
            $result->result = 'fetched';
            $result->data = $tth_data;
        }
        else
        {
            $result->statusCode = 400;
            $result->result = 'No data avilable';

        }
        echo json_encode($result);

    }
    if ($_POST['action'] == 'addGraph') {
        $img=$_POST['img'];
        $id=$_POST['trek_id'];
        $res=explode('-',$id);
        $result_ret=$wpdb->update('wp_trektable_addtrekdetails', array('trek_selected_flags'=>$img,), array('id'=>$id));
       

        $result = new stdClass();
        if($result_ret){
            $result->statusCode = 200;
            $result->result = 'add Success';
        }
        else{
            $result->statusCode = 400;
            $result->result = 'add failed';
        }
        echo json_encode($result);


    }
    if ($_POST['action'] == 'updateGraph') {
        $img=$_POST['img'];
        $id=$_POST['id'];
        $res=explode('-',$id);

        $result_res=$wpdb->update('wp_trektable_addtrekdetails', array('trek_selected_flags'=>$img,), array('id'=>$id));
        $result = new stdClass();
        if($result_res)
        {
            $result->statusCode = 200;
            $result->result = 'update success';
        }
        else{
            $result->statusCode = 400;
            $result->result = 'update failed';
        }
        echo json_encode($result);


    }


    // end graph

// Why tth

     if ($_POST['action'] == 'add_tth_why') {
        $ptbd_table_name = 'wp_tth_trek_why_tth_new';

        $why_tth_text = $_POST['text'];
        $why_tth_desc = $_POST['desc'];
        $why_img = $_POST['why_img'];
        $dataArr = array(
            "descData" => $why_tth_desc,
            "textData" => $why_tth_text,
            "imgs" => $why_img,
            "typeData" => 'why',

        );

        $result_check = $wpdb->insert('' . $ptbd_table_name . '', $dataArr);
        $result = new stdClass();
        if ($result_check) {
            $result->statusCode = 200;
            $result->result = 'inserted';
        } else {
            $result->statusCode = 401;
            $result->result = 'failed';
        }
        echo json_encode($result);
    }

    if ($_POST['action'] == 'removeTthWhy') {
        $ptbd_table_name = 'wp_tth_trek_why_tth_new';
        $id = $_POST['id'];
        $result_check = $wpdb->delete($ptbd_table_name, array('id' => $id));
        $result = new stdClass();
        if ($result_check) {
            $result->statusCode = 200;
            $result->result = 'deleted';
        } else {
            $result->statusCode = 401;
            $result->result = 'failed';
        }
        echo json_encode($result);
    }
    if ($_POST['action'] == 'getTthWhy') {
        $ptbd_table_name = 'wp_tth_trek_why_tth_new';
        $id = $_POST['id'];
        $why_data = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name . ' where typeData="why" and id=' . $id . '');
        $result = new stdClass();
        if ($why_data) {
            $result->statusCode = 200;
            $result->result = 'fetched';
            $result->data = $why_data;
        } else {
            $result->statusCode = 401;
            $result->result = 'failed';
        }
        echo json_encode($result);
    }

    if ($_POST['action'] == 'editTTHWhy') {
        $ptbd_table_name = 'wp_tth_trek_why_tth_new';
        $id = $_POST['id'];
        $text = $_POST['text'];
        $desc = $_POST['desc'];
        $why_img = $_POST['why_img'];
        $why_data = $wpdb->update($ptbd_table_name, array('descData' => $desc, 'textData' => $text, 'imgs' => $why_img), array('id' => $id));

        $result = new stdClass();
        if ($why_data) {
            $result->statusCode = 200;
            $result->result = 'fetched';
            $result->data = $why_data;
        } else {
            $result->statusCode = 401;
            $result->result = 'failed';
        }
        echo json_encode($result);
    }

// Video Reviews

      if ($_POST['action'] == 'addVideoRev') {
        $ptbd_table_name = 'wp_trek_pages_tth_video_review';
        $video_name = $_POST['video_name'];
        $video_title = $_POST['video_title'];
//        $video_image = $_POST['video_image'];
        $video_year = $_POST['video_year'];
        $video_priority = $_POST['video_priority'];
        $video_url = $_POST['video_url'];
        $video_trek = $_POST['video_trek'];

        $dataArr = array(
            "trek_tth_name" => $video_name,
            "trek_tth_title" => $video_title,
            "trek_tth_year" => $video_year,
            "trek_tth_video_poster" => ".",
            "trek_tth_video_url" => $video_url,
            "trek_tth_video_priority" => $video_priority,
            "assigned_trek" => $video_trek,
        );
        $result_check = $wpdb->insert('' . $ptbd_table_name . '', $dataArr);
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'inserted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';
            $result->data = $dataArr;

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'getVideoRev') {
        $ptbd_table_name = 'wp_trek_pages_tth_video_review';
        $video_id = $_POST['video_id'];
        $result_check = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name . ' where id="' . $video_id . '"');

        if (!empty($result_check)) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'fetched';
            $result->message = $result_check;
            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'updateVideoRev') {
        $ptbd_table_name = 'wp_trek_pages_tth_video_review';
        $video_name = $_POST['video_name'];
        $video_title = $_POST['video_title'];
        $video_image = $_POST['video_image'];
        $video_year = $_POST['video_year'];
        $video_priority = $_POST['video_priority'];
        $video_url = $_POST['video_url'];
        $video_id = $_POST['video_id'];
        $video_trek = $_POST['video_trek'];

        if ($video_image == '') {
            $dataArr = array(
                "trek_tth_name" => $video_name,
                "trek_tth_title" => $video_title,
                "trek_tth_year" => $video_year,
                "trek_tth_video_url" => $video_url,
                "trek_tth_video_priority" => $video_priority,
                "assigned_trek" => $video_trek,
            );
        } else {
            $dataArr = array(
                "trek_tth_name" => $video_name,
                "trek_tth_title" => $video_title,
                "trek_tth_year" => $video_year,
                "trek_tth_video_poster" => $video_image,
                "trek_tth_video_url" => $video_url,
                "trek_tth_video_priority" => $video_priority,
                "assigned_trek" => $video_trek,
            );
        }

        if ($wpdb->update('' . $ptbd_table_name . '', $dataArr, array(
            'id' => $video_id)) === false) {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'updated';

            echo json_encode($result);
        }

    }

    if ($_POST['action'] == 'deleteVideoRev') {
        $ptbd_table_name = 'wp_trek_pages_tth_video_review';
        $video_id = $_POST['video_id'];

        $result_check = $wpdb->delete($ptbd_table_name, array('id' => $video_id));
        if ($result_check) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'deleted';

            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';

            echo json_encode($result);
        }

    }


    // Faq

//FAQ start

    if ($_POST['action'] == 'addFaq') {
        $ptbd_table_name = 'wp_tth_trek_faq';
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $trek = $_POST['trek'];
        $result_check = $wpdb->insert('' . $ptbd_table_name . '', array(
            'trek' => $trek,
            'question' => $question,
            'content' => $answer
        ));

        $result = new stdClass();
        if ($result_check) {
            $result->statusCode = 200;
            $result->result = 'inserted';
        } else {
            $result->statusCode = 401;
            $result->result = 'failed';
        }
        echo json_encode($result);
    }

    if ($_POST['action'] == 'editFaq') {

        $ptbd_table_name = 'wp_tth_trek_faq';
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $id = $_POST['id'];

        $results = $wpdb->update('' . $ptbd_table_name . '', array(
            'question' => $question,
            'content' => $answer
        ), array('id' => $id));

        $result = new stdClass();
        if ($results) {
            $result->statusCode = 200;
            $result->result = 'Updated';
        } else {
            $result->statusCode = 401;
            $result->result = 'failed';
        }
        echo json_encode($result);

    }
    if ($_POST['action'] == 'fetchFaq') {
        $faq_id = $_POST['id'];
        $ptbd_table_name = 'wp_tth_trek_faq';
        $result_check = $wpdb->get_results('SELECT * FROM ' . $ptbd_table_name . ' where id="' . $faq_id . '"');

        if (!empty($result_check)) {
            $result = new stdClass();
            $result->statusCode = 200;
            $result->result = 'fetched';
            $result->message = $result_check;
            echo json_encode($result);
        } else {
            $result = new stdClass();
            $result->statusCode = 401;
            $result->result = 'failed';
            echo json_encode($result);
        }
    }
    if ($_POST['action'] == 'deleteFaq') {
        $ptbd_table_name = 'wp_tth_trek_faq';
        $faq_id = $_POST['id'];

        $result_check = $wpdb->delete($ptbd_table_name, array('id' => $faq_id));

        $result = new stdClass();
        if ($result_check) {
            $result->statusCode = 200;
            $result->result = 'deleted';
        } else {
            $result->statusCode = 401;
            $result->result = 'failed';
        }
        echo json_encode($result);
    }


// End Video Reviews

//global if end

} else {
    $result = new stdClass();
    $result->message = 'Access Denied!';
    echo json_encode($result);
}
function check_email_validity($email)
{
    if (!is_email($email)) {
        $result = new stdClass();
        $result->statusCode = 200;
        $result->message = 'failed';
        $result->result = 'email-failed';
        echo json_encode($result);
        exit;
    }
}

