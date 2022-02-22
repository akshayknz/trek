<?php

defined('ABSPATH') or die('Hei, Access restricted!');

$user_ID = get_current_user_id();

function show_all_treks($atts)
{
    $id = $atts['id'];
    global $wpdb, $table_prefix;
    if ($id == 'top_picks') {
        $query = 'SELECT * FROM ' . $table_prefix . 'trektable_addtrekdetails where id in (select trek_id from wp_trektable_top_picks where top_status=0) and trek_adddetails_status=0 and trek_publish_status=0';
        $result = $wpdb->get_results($query);
    } else {
        $query = "SELECT
  wp_trektable_addtrekdetails.*,
  wp_trektable_addtrekdetails.trek_adddetails_status,
  COUNT(wp_trektable_trek_departure.id) AS totalDeparture
FROM
  wp_trektable_addtrekdetails
LEFT JOIN wp_trektable_trek_departure ON wp_trektable_addtrekdetails.id = wp_trektable_trek_departure.trek_selected_trek
and wp_trektable_trek_departure.trek_departure_status !=1
where wp_trektable_addtrekdetails.trek_adddetails_status=0 and wp_trektable_addtrekdetails.trek_publish_status=0
GROUP BY wp_trektable_addtrekdetails.id order by
wp_trektable_addtrekdetails.id desc";
        $result = $wpdb->get_results($query);
    }

// print_r(json_encode($result));
    // die;

    $content = '';

    if (!empty($result)) {
        $fcount = count($result);

        for ($i = 0; $i < $fcount; $i++) {
            if (isset($result[$i]->trek_selected_flags)) {
                if ($result[$i]->trek_selected_flags != 'nil') {
                    $trek_graph_img = $result[$i]->trek_selected_flags;
                } else {
                    $trek_graph_img = get_template_directory_uri() . '/assets/illustration/mountain1.svg';
                }

            } else {
                $trek_graph_img = get_template_directory_uri() . '/assets/illustration/mountain1.svg';
            }
            if (($result[$i]->trek_cost == null) || ($result[$i]->totalDeparture != 0)) {
                if ($i == 0) {
                    $content .= '<div id="slider-one-item" class="item"><div class="image show-top-img" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . $trek_graph_img . '" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank"><div class="button"> View Details <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></div></a></div></div>';
                } else {
                    $content .= '<div class="item"><div class="image show-top-img" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . $trek_graph_img . '" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank"><div class="button"> View Details <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></div></a></div></div>';
                }

            } else {
                if ($i == 0) {
                    $content .= '<div id="slider-one-item" class="item"><div class="image show-top-img" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . $trek_graph_img . '" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/index.php/trek-details?trek=' . $result[$i]->id . '" target="_blank"><div class="button"> View Details <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></div></a></div></div>';
                } else {
                    $content .= '<div class="item"><div class="image show-top-img" style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(' . $result[$i]->trek_profile_image . '); " ><img src="' . $trek_graph_img . '" alt=""> <h4>' . $result[$i]->trek_name . '</h4><p>' . $result[$i]->trek_region_state . '</p></div><div class="bottom"><div class="content"><div class="left"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/duration.svg" alt="" /></div><div class="info"><p>Duration</p><p class="bold">' . $result[$i]->trek_days . ' Days</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/grade.svg" alt="" /></div><div class="info"><p>Grade</p><p class="bold">' . $result[$i]->trek_grade . '</p></div></div></div></div><div class="right"><div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/approx.svg" alt="" /></div><div class="info"><p>Approx</p><p class="bold">' . $result[$i]->trek_distance . ' Km.</p></div></div><div class="icon"><div><img src="' . get_template_directory_uri() . '/assets/icons/altitude.svg" alt="" /></div><div class="info"><p>Altitude</p><p class="bold">' . $result[$i]->trek_altitude . ' Ft.</p></div></div></div></div></div><a href="' . get_site_url() . '/trek-details/?trek=' . $result[$i]->id . '" target="_blank"><div class="button"> View Details <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt="" /></div></a></div></div>';
                }

            }

        }

    } else {
        $content .= '<h4>No treks available!</h4>';
    }

    return $content;
}


function sticky_buttons($atts)
{
    $type = $atts['type'];
    $content = '';
    if ($type == 'general') {
        $content .= '<div class="floating"><p><a href="';
        $content .= site_url() . '/customize_trip';
        $content .= '" class="sticky-note" style="color:white;">Customize</a></p><p><a href="';
        $content .= site_url() . '/alltreks';
        $content .= '" class="sticky-note" style="color:white;">Search Trek</a></p></div>';

    } else if ($type == 'booking') {
        $trek = $atts['trek'];
        $content .= '<div class="floating"><p><a href="';
        $content .= site_url() . '/booking?trek=' . $trek;
        $content .= '" class="sticky-note" style="color:white;">Book Now</a></p><p><a href="';
        $content .= '#tth_help_supp';
        $content .= '" class="sticky-note" style="color:white;">Dates</a></p></div>';
    }
    return $content;

}


function show_recoginition()
{
    global $wpdb, $table_prefix;

    $query = "select trek_tth_brief,trek_tth_award_image from wp_trek_pages_tth_awards where trek_tth_role='recoginition' order by trek_tth_award_priority ASC limit 2;";
    $result = $wpdb->get_results($query);
// print_r(json_encode($result));
    // die;

    $content = '<div class="bottom">';

    if (!empty($result)) {
        $fcount = count($result);
        $content .= '';
        for ($i = 0; $i < $fcount; $i++) {

            $content .= ' <div class="box"> <div class="image tth-circle-img"><img src="' . $result[$i]->trek_tth_award_image . '" alt=""/> </div><div> <p> ' . $result[$i]->trek_tth_brief . ' </p><img src="' . get_template_directory_uri() . '/assets/icons/star.svg" alt=""/> </div></div>';

        }
        $content .= ' </div>';
    } else {
        $content .= '';
    }

    return $content;
}

// Upcoming treks

function tth_list_upcoming_treks()
{
    global $wpdb, $table_prefix;

    $query = "SELECT 
        b.trek_name, 
        b.trek_cost,
        b.trek_days,
        a.trek_start_date as trek_start_date,
        b.id as trek_id,
        a.trek_departure_status,
        a.dep_event_name
        FROM wp_trektable_trek_departure AS a
        LEFT JOIN wp_trektable_addtrekdetails AS b
        ON a.trek_selected_trek = b.id 
        and a.trek_start_date < CURDATE()
        AND trek_departure_status!=1  group by trek_name";

    $upcoming_treks = $wpdb->get_results($query);


    if (!empty($upcoming_treks)) {
        $fcount = count($upcoming_treks);
        $content= '';
        $content .= '<section class="table-sec" style="padding-top: 10px;"> <div class="container" > <p class="subtitle">Top Picks</p><div class="heading-filter"> <h2>Upcoming Treks</h2><input type="text" id="reg_trekkers_dob" name="reg_trekkers_dob" placeholder="Filter by date" class=" custom_date_picker required date-width" style="font-size: 12px;width: 15%;margin: 15px 0;padding: 5px;border-radius: 6px;" readonly="" onchange="renderDeps(this.id)"></div><table class="table"> <thead ><tr > <th scope="col" style="text-align: left;border-bottom: 1px solid #dedddd;padding-bottom: 10px;">Trek Name</th> <th scope="col" style="text-align: left;border-bottom: 1px solid #dedddd;padding-bottom: 10px;">Status</th><th scope="col" style="text-align: left;border-bottom: 1px solid #dedddd;padding-bottom: 10px;">Date</th> <th scope="col" style="text-align: left;border-bottom: 1px solid #dedddd;padding-bottom: 10px;">Cost In Rupees</th><th scope="col"></th> </tr></thead><tbody id="treks_data_filter"> ';

        for ($i = 0; $i < $fcount; $i++) {

            if ($upcoming_treks[$i]->trek_id == '') {
                continue;
            }
            if($upcoming_treks[$i]->dep_event_name)
            {
                $trek_close_opn='<td class="green">Open (<i style="color: green;">'.$upcoming_treks[$i]->dep_event_name.'</i>)</td>';
            }
            else
            {
                $trek_close_opn='<td class="green">Open</td>';
            }


                $content .= '<tr style="border-bottom: 1px solid #dedddd;"> <td scope="row" style="padding-left: 0px;">' . $upcoming_treks[$i]->trek_name . '</td>'.$trek_close_opn.'<td>' . date("d/m/Y", strtotime($upcoming_treks[$i]->trek_start_date)) . '</td><td>' . number_format($upcoming_treks[$i]->trek_cost) . '</td><td class="border-0 td-block" style="display: flex;border-top: 4px solid #faf5f5 !important;margin-top: -3px;"><a class="button" href="'.  home_url() .'/index.php/trek-details?trek='.$upcoming_treks[$i]->trek_id.'" target="_blank" style="margin-right: 10px;"> More Info <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""> </a><a class="button" href="'.  home_url() .'/booking?trek='.$upcoming_treks[$i]->trek_id.'"> Book Now <img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""> </a></td></tr>';

        }
        $content .= '</tbody> </table> </div></section>';
    } else {
        $content .= '';
    }

    return $content;
}




function show_certification()
{
    global $wpdb, $table_prefix;

    $query = "select trek_tth_award_image from wp_trek_pages_tth_awards where trek_tth_role='certification' order by trek_tth_award_priority ASC limit 8;";
    $result = $wpdb->get_results($query);
// print_r(json_encode($result));
    // die;

    if (!empty($result)) {
        $fcount = count($result);
        $content .= '';

        $content .= '<div class="first">';
        for ($i = 0; $i < $fcount; $i++) {

            $content .= '<img src="' . $result[$i]->trek_tth_award_image . '" alt="" />';
            if ($i == 3) {
                break;
            }
        }
        $content .= '</div>';

        if ($fcount >= 4) {
            $content .= '<div class="last">';
            for ($i = 4; $i < $fcount; $i++) {

                $content .= '<img src="' . $result[$i]->trek_tth_award_image . '" alt="" />';
            }
            $content .= '</div>';
        }
    } else {
        $content .= '';
    }

    return $content;
}

function tth_slider_home()
{
    global $wpdb, $table_prefix;

    $query = "select trek_tth_title,trek_tth_sub,trek_tth_category,trek_tth_news_poster,tth_know_more from wp_trek_pages_tth_news where trek_tth_category='slider' order by trek_tth_news_priority ASC limit 8;";
    $result = $wpdb->get_results($query);
    $content .= '';
    if (!empty($result)) {
        $fcount = count($result);


        for ($i = 0; $i < $fcount; $i++) {

            $content .= '<div class="hero" style=" background-image: url(';
            $content .= '' . $result[$i]->trek_tth_news_poster . ');';


            $content .= 'background-size: cover;background-position: bottom;height: 700px;display: flex;align-items: center;justify-content: center;"> <div class="content"> <h1> ' . stripslashes($result[$i]->trek_tth_title) . ' </h1> <p> ' . stripslashes($result[$i]->trek_tth_sub) . ' </p><div class="home_slider_hrf"><a href="' . $result[$i]->tth_know_more . '" target="_BLANK"><button class="btn_home_slider">Know More <span class="brn_home_slider_spn"><img src="' . get_template_directory_uri() . '/assets/icons/darrow.svg" alt=""></span></button></a></div></div></div>';
        }

    } else {
        $content .= '';

    }

    return $content;
}

function tth_why_tth_home()
{
    global $wpdb, $table_prefix;

    $query = "SELECT * FROM wp_tth_trek_why_tth_new";
    $result = $wpdb->get_results($query);
    $content .= '';
    if (!empty($result)) {
        $fcount = count($result);


        for ($i = 0; $i < $fcount; $i++) {

            $content .= '<div class="slider-column"> <h4> ' . $result[$i]->textData . ' : </h4> <p>' . $result[$i]->descData . '</p><div class="slider-images">';
            $videoGalleryUrls = $result[$i]->imgs;
            $explodeGalley = explode(",", $videoGalleryUrls);
            $counts = count($explodeGalley);
            for ($k = 0; $k < $counts; $k++) {
                $content .= '<img src="' . $explodeGalley[$k] . '" alt="">';
            }
            $content .= '</div></div>';
        }


    } else {
        $content .= '';

    }

    return $content;
}


function video_review_four($atts)
{
    $type = $atts['type'];
    global $wpdb, $table_prefix;
    if (isset($type)) {
        $query = "select trek_tth_name,trek_tth_title,trek_tth_year,trek_tth_video_poster,trek_tth_video_url from wp_trek_pages_tth_video_review where find_in_set('" . $type . "',assigned_trek) order by trek_tth_video_priority ASC;";
        $result = $wpdb->get_results($query);

    } else {
        return;
    }

    $content = '';

    if (!empty($result)) {
        $fcount = count($result);
        $content .= '';
        $j = 1;
        for ($i = 0; $i < $fcount; $i++) {


            if ($i == 0) {
                $content .= ' <div id="slider-two-item" class="item">';
            } else {
                $content .= ' <div id="item" class="item">';
            }

            $content .= '<div class="image"> <iframe height="315" src=' . $result[$i]->trek_tth_video_url . ' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div>';
            $j = $j + 1;
        }
    } else {
        $content .= '<div>No Reviews Available</div>';
    }

    return $content;
}

function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

function show_tth_news()
{
    $args = array(
        'post_type' => 'post',
        'status' => 'publish',
        'posts_per_page' => 3
      );
      global $post;
      $post_query = new WP_Query($args);
      if($post_query->have_posts() ) {
        while($post_query->have_posts() ) {
            $post_query->the_post();
            ?>
            <div class="cardbox blog_story_card">
            <img src='<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );echo $url; ?>' alt='TTH Latest Information' />    
            <div class="boxing"> 
                 <p class="subtitle">
                 posted by 
                    <span><?php echo get_the_author_meta('display_name', $author_id) ?></span> | 
                    <span> <?php echo get_the_date(); ?></span>
                </p>
                 <h4>
                     <?php the_title(); ?>
                </h4> 
                 <p><?php
                        $excerpt = substr(get_the_excerpt(), 0, 120);
                        echo substr($excerpt, 0, strrpos($excerpt, ' ')).'...';
                      ?></p>
                 <div class="btn">
                 <a href="<?php echo get_permalink(get_the_ID());  ?>" target ="_blank" style="color:white;"> 
                 Know More
                 </a> 
             
                 </div>
                </div>
            </div>
        <?php
      }
    }
}


function show_tth_info_section()
{
    global $wpdb, $table_prefix;

    $query = "select trek_tth_title,trek_tth_sub,trek_tth_content,trek_tth_news_poster,tth_know_more,trek_tth_category from wp_trek_pages_tth_news where trek_tth_category in ('info','info-video')  order by trek_tth_news_priority ASC limit 8;";
    $result = $wpdb->get_results($query);
// print_r(json_encode($result));
    // die;

    $content = '';

    if (!empty($result)) {
        $fcount = count($result);
        $content .= '';
        for ($i = 0; $i < $fcount; $i++) {

            $news1 = $result[$i]->trek_tth_news_poster;
            $description = limit_text($result[$i]->trek_tth_content, 20);

            if ($result[$i]->trek_tth_category == 'info') {
                if ($i == 0) {
                    $content .= '<div id="tek_info_item_box" class="item_info"><div class="box1" id="" style="background: url(' . $news1 . ')!important;"> <div class="description"> <h4>' . $result[$i]->trek_tth_title . '</h4> <div class="grid"> <div class="left"> <p> ' . $description . '</p><div class="button"><a href="' . $result[$i]->tth_know_more . '" target ="_blank" style="color:white;display:flex;"> Know More <img src="' . get_template_directory_uri() . '/assets/icons/darrow2.svg" class="trek-info-knw-more" alt=""/></a>  </div></div></div></div></div></div>';
                } else {
                    // $content .='<div class="box2" style="background: url('.$news1.')!important;"> <div class="description"> <h4>'.$result[$i]->trek_tth_title.'</h4> <div class="grid"> <div class="left"> <p> '.$description.'</p><div class="button"> Watch More <img src="'.get_template_directory_uri().'/assets/icons/darrow2.svg" alt=""/> </div></div><div class="play"><i class="fas fa-play"></i></div></div></div></div>';
                    $content .= '<div id="tek_info_item_box" class="item_info"><div class="box1" id="" style="background: url(' . $news1 . ')!important;"> <div class="description"> <h4>' . $result[$i]->trek_tth_title . '</h4> <div class="grid"> <div class="left"> <p> ' . $description . '</p><div class="button"><a href="' . $result[$i]->tth_know_more . '" target ="_blank" style="color:white;display:flex;"> Know More  <img src="' . get_template_directory_uri() . '/assets/icons/darrow2.svg" class="trek-info-knw-more" alt=""/></a> </div></div></div></div></div></div>';
                }

            } else if ($result[$i]->trek_tth_category == 'info-video') {

                $content .= '<div class="box1 info_video_tth"><iframe height="500" src=' . $result[$i]->tth_know_more . ' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';


            }

        }
    } else {
        $content .= '';
    }

    return $content;
}


function show_tth_discount_coupons()
{
    global $wpdb, $table_prefix;

    $the_user = get_user_by( 'id', get_current_user_id() );
    $result = $wpdb->get_results('SELECT coupon_code,coupon_description,coupon_name,coupon_image 
    FROM wp_trektable_coupons_new 
    WHERE (coupon_display_category="website" AND coupon_expiry>CURDATE())
    OR (coupon_display_category="individual" AND coupon_ind_email="'.$the_user->user_email.'" AND coupon_expiry>CURDATE());');

    $content = '';

    if (!empty($result)) {
        $fcount = count($result);
        $content .= '';
        for ($i = 0; $i < $fcount; $i++) {


            $description = limit_text($result[$i]->coupon_description, 20);
            $content .= ' <div class="cardbox"> <img src="' . $result[$i]->coupon_image . '" alt=""> <div class="card-color"> <div class="meta"> <h4 class="loyalty_dis">' . $result[$i]->coupon_code . '</h4> <p class="tth_track">' . $result[$i]->coupon_description . ' </p></div><div class="box-1"> <p style="padding-top: 10px !IMPORTANT;">use code</p><div class="button1"> ' . $result[$i]->coupon_code . '<i class="far fa-copy" id="' . $result[$i]->coupon_code . '" onclick="copy_txt(\'' . $result[$i]->coupon_code . '\')" style="cursor: pointer;"></i> </div><div class="box2"> <p> t&c supply</p></div></div></div></div>';


        }
    } else {
        $content .= '<h1>No coupons available</h1>';
    }

    return $content;
}


function show_tth_select_location()
{
    global $wpdb, $table_prefix;

    $query = "select coupon_code,coupon_description,coupon_name,coupon_image from wp_trektable_coupons where coupon_delete_status='0' and coupon_publish_status='1';";
    $result = $wpdb->get_results($query);
// print_r(json_encode($result));
    // die;

    $content = '';

    if (!empty($result)) {
        $fcount = count($result);
        $content .= '';
        for ($i = 0; $i < $fcount; $i++) {


            $description = limit_text($result[$i]->coupon_description, 20);
            $content .= ' <div class="cardbox"> <img src="' . $result[$i]->coupon_image . '" alt=""> <div class="card-color"> <div class="meta"> <h4 class="loyalty_dis">' . $result[$i]->coupon_code . '</h4> <p class="tth_track">' . $result[$i]->coupon_description . ' </p></div><div class="box-1"> <p>use code</p><div class="button1"> ' . $result[$i]->coupon_code . '<i class="far fa-copy"></i> </div><div class="box2"> <p> t&c supply</p></div></div></div></div>';


        }
    } else {
        $content .= '';
    }

    return $content;
}

function show_tth_home_select()
{
    global $wpdb, $table_prefix;

    $query = "SELECT distinct(trek_filter_location) FROM wp_trektable_addtrekdetails where trek_filter_location!=''";
    $result = $wpdb->get_results($query);


    $content = '';

    if (!empty($result)) {
        $fcount = count($result);
        $content .= '';
        for ($i = 0; $i < $fcount; $i++) {
            $content .= '<option>' . $result[$i]->trek_filter_location . '</option>';


        }
    } else {
        $content .= '';
    }

    return $content;
}