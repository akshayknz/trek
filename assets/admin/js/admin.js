jQuery(document).ready(function () {
	 jQuery('#Modal_departure').on("hide.bs.modal", function() {
    location.reload();
  })
  jQuery(document).on("click", ".delconfdeluser", function () {
    alert("confirmation button clicked");
    var url_string = window.location.href; //window.location.href
    var url = new URL(url_string);
    var useraction = url.searchParams.get("action");
    var useractionid = url.searchParams.get("user");
    var useractionnonce = url.searchParams.get("_wpnonce");
    alert("action " + useraction);
    alert("id " + useractionid);
    alert("nonce " + useractionnonce);
  });

  jQuery(document).delegate("a.add-record1", "click", function (e) {
    e.preventDefault();
    var content = jQuery("#sample_table tr"),
        size = jQuery("#tbl_posts1 >tbody >tr").length + 1,
        element = null,
        element = content.clone();
    element.attr("id", "rec-bg-" + size);
    element.find(".delete-record").attr("id", "bg-" + size);
    element.find(".name").attr("id", "name_bg-" + size);
    element.find(".val").attr("id", "val_bg-" + size);
    element.appendTo("#tbl_posts_body1");
    element.find(".sn").html(size);
    $(".delete-record").css("display", "none");
    $("#bg-" + size).css("display", "block");
  });

  jQuery(document).delegate("a.add-record2", "click", function (e) {
    e.preventDefault();
    var content = jQuery("#sample_table tr"),
        size = jQuery("#tbl_posts2 >tbody >tr").length + 1,
        element = null,
        element = content.clone();
    element.attr("id", "rec-clth-" + size);
    element.find(".delete-record").attr("id", "clth-" + size);
    element.find(".name").attr("id", "name_clth-" + size);
    element.find(".val").attr("id", "val_clth-" + size);
    element.appendTo("#tbl_posts_body2");
    element.find(".sn").html(size);
    $(".delete-record").css("display", "none");
    $("#clth-" + size).css("display", "block");
  });

  jQuery(document).delegate("a.add-record3", "click", function (e) {
    e.preventDefault();
    var content = jQuery("#sample_table tr"),
        size = jQuery("#tbl_posts3 >tbody >tr").length + 1,
        element = null,
        element = content.clone();
    element.attr("id", "rec-pu-" + size);
    element.find(".delete-record").attr("id", "pu-" + size);
    element.find(".name").attr("id", "name_pu-" + size);
    element.find(".val").attr("id", "val_pu-" + size);
    element.appendTo("#tbl_posts_body3");
    element.find(".sn").html(size);
    $(".delete-record").css("display", "none");
    $("#pu-" + size).css("display", "block");
  });

  jQuery(document).delegate("a.add-record4", "click", function (e) {
    e.preventDefault();
    var content = jQuery("#sample_table tr"),
        size = jQuery("#tbl_posts4 >tbody >tr").length + 1,
        element = null,
        element = content.clone();
    element.attr("id", "rec-hg-" + size);
    // element.find('.delete-record').attr('data-id', size);
    element.find(".delete-record").attr("id", "hg-" + size);
    element.find(".name").attr("id", "name_hg-" + size);
    element.find(".val").attr("id", "val_hg-" + size);
    element.appendTo("#tbl_posts_body4");
    element.find(".sn").html(size);
    $(".delete-record").css("display", "none");
    $("#hg-" + size).css("display", "block");
  });

  jQuery(document).delegate("a.add-record5", "click", function (e) {
    e.preventDefault();
    var content = jQuery("#sample_table tr"),
        size = jQuery("#tbl_posts5 >tbody >tr").length + 1,
        element = null,
        element = content.clone();
    element.attr("id", "rec-fg-" + size);
    // element.find('.delete-record').attr('data-id',size);
    element.find(".delete-record").attr("id", "fg-" + size);
    element.find(".name").attr("id", "name_fg-" + size);
    element.find(".val").attr("id", "val_fg-" + size);
    element.appendTo("#tbl_posts_body5");
    element.find(".sn").html(size);
    $(".delete-record").css("display", "none");
    $("#fg-" + size).css("display", "block");
  });

  jQuery(document).delegate("a.delete-record", "click", function (e) {
    e.preventDefault();
    var didConfirm = confirm("Are you sure You want to delete");
    if (didConfirm == true) {
      // var targetDiv = jQuery(this).attr('targetDiv');
      var uid = jQuery(this).attr("id");
      var res = uid.split("-");
      uid = res[0];
      id = res[1];

      jQuery("#rec-" + uid + "-" + id).remove();

      //regenerate index number on table
      if (uid == "fg") {
        $("#tbl_posts_body5 tr").each(function (index) {
          $(this)
              .find("span.sn")
              .html(index + 1);
          console.log("hello " + index);
        });
        size = jQuery("#tbl_posts5 >tbody >tr").length;
        //
        $(".delete-record").css("display", "none");
        $("#fg-" + size).css("display", "block");

        return true;
      }

      if (uid == "hg") {
        $("#tbl_posts_body4 tr").each(function (index) {
          $(this)
              .find("span.sn")
              .html(index + 1);
          console.log("hello " + index);
        });
        size = jQuery("#tbl_posts4 >tbody >tr").length;
        //
        $(".delete-record").css("display", "none");
        $("#hg-" + size).css("display", "block");

        return true;
      }
      if (uid == "pu") {
        $("#tbl_posts_body3 tr").each(function (index) {
          $(this)
              .find("span.sn")
              .html(index + 1);
          console.log("hello " + index);
        });
        size = jQuery("#tbl_posts3 >tbody >tr").length;
        //
        $(".delete-record").css("display", "none");
        $("#pu-" + size).css("display", "block");

        return true;
      }

      if (uid == "clth") {
        $("#tbl_posts_body2 tr").each(function (index) {
          $(this)
              .find("span.sn")
              .html(index + 1);
          console.log("hello " + index);
        });
        size = jQuery("#tbl_posts2 >tbody >tr").length;
        //
        $(".delete-record").css("display", "none");
        $("#clth-" + size).css("display", "block");

        return true;
      }

      if (uid == "bg") {
        $("#tbl_posts_body1 tr").each(function (index) {
          $(this)
              .find("span.sn")
              .html(index + 1);
          console.log("hello " + index);
        });
        size = jQuery("#tbl_posts1 >tbody >tr").length;
        //
        $(".delete-record").css("display", "none");
        $("#bg-" + size).css("display", "block");

        return true;
      }
    } else {
      return false;
    }
  });

  //trek essential modal query end

  //trek essential nav start

  $(".open1").click(function () {
    $(".frm").hide("fast");
    $("#sf2").show("slow");
  });

  $(".open2").click(function () {
    $(".frm").hide("fast");
    $("#sf3").show("slow");
  });

  $(".open3").click(function () {
    $(".frm").hide("fast");
    $("#sf4").show("slow");
  });

  $(".open4").click(function () {
    $(".frm").hide("fast");
    $("#sf5").show("slow");
  });

  $(".open5").click(function () {
    $("#loader").show();
    setTimeout(function () {
      $("#basicform").html("<h2>Thanks for your time.</h2>");
    }, 1000);
    return false;
  });

  $(".back2").click(function () {
    $(".frm").hide("fast");
    $("#sf1").show("slow");
  });
  $(".back3").click(function () {
    $(".frm").hide("fast");
    $("#sf2").show("slow");
  });
  $(".back4").click(function () {
    $(".frm").hide("fast");
    $("#sf3").show("slow");
  });
  $(".back5").click(function () {
    $(".frm").hide("fast");
    $("#sf4").show("slow");
  });
  //trek essential nav end

  // toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
  map_url = [];
  profile_url = [];
  gallery_url = [];
  slider_url = [];
  profile_url_edit = [];
  gallery_url_edit = [];
  slider_url_edit = [];
  couponImage = [];
  trek_maps_url = [];
  trek_maps_url_edit = [];

  // jQuery(document).ready(function() {
  // jQuery('.js-example-basic-single').select2();
  // });

  // jQuery("ul.wp-submenu li:nth-child(4)").hide();
  jQuery("body").on("click", "#next1", function () {
    // $("body").scrollTop(0);

    get_values();
    flag = tab1();
    menutab1();
    if (flag == 1) {
      toastr.warning("Please complete required Fields on Trek Details section");
      return;
    }

    var next = jQuery(".nav-tabs > .active").next("li");
    if (next.length) {
      next.find("a").trigger("click");
    } else {
      jQuery("#myTabs a:first").tab("show");
    }
  });
  jQuery("body").on("click", "#next2", function () {
    // $("body").scrollTop(0);
    get_values();
    flag2 = tab2();
    menutab2();
    if (flag2 == 1) {
      toastr.warning(
          "Please complete required Fields on Image Section and continue"
      );
      return;
    }
    var next = jQuery(".nav-tabs > .active").next("li");
    if (next.length) {
      next.find("a").trigger("click");
    } else {
      jQuery("#myTabs a:first").tab("show");
    }
  });
  jQuery("body").on("click", "#next2edit", function () {
    // $("body").scrollTop(0);
    get_values();
    flag2 = tab2edit();
    // menutab2edit();
    if (flag2 == 1) {
      alert("Please complete required Fields on tab 2");
      return;
    }
    var next = jQuery(".nav-tabs > .active").next("li");
    if (next.length) {
      next.find("a").trigger("click");
    } else {
      jQuery("#myTabs a:first").tab("show");
    }
  });

  jQuery("body").on("click", "#next3", function () {
    // $("body").scrollTop(0);
    get_values();
    flag3 = tab3();
    menutab3();
    if (flag3 == 1) {
      // alert("Please complete required Fields on tab 3");
      toastr.warning("Please complete required Fields on tab 3", "wait!");

      return;
    }
    var next = jQuery(".nav-tabs > .active").next("li");
    if (next.length) {
      next.find("a").trigger("click");
    } else {
      jQuery("#myTabs a:first").tab("show");
    }
  });
  jQuery("body").on("click", "#next3edit", function () {
    // $("body").scrollTop(0);
    get_values();
    flag3 = tab3edit();
    menutab3edit();
    if (flag3 == 1) {
      // alert("Please complete required Fields on tab 3");
      toastr.warning("Please complete required Fields on tab 3", "wait!");
      return;
    }
    var next = jQuery(".nav-tabs > .active").next("li");
    if (next.length) {
      next.find("a").trigger("click");
    } else {
      jQuery("#myTabs a:first").tab("show");
    }
  });
  jQuery("body").on("click", "#next4", function () {
    // $("body").scrollTop(0);
    get_values();
    flag4 = tab4();
    menutab4();
    if (flag4 == 1) {
      toastr.warning("Please complete required Fields on tab 4", "wait!");
      return;
    }
    var next = jQuery(".nav-tabs > .active").next("li");
    if (next.length) {
      next.find("a").trigger("click");
    } else {
      jQuery("#myTabs a:first").tab("show");
    }
  });

  jQuery("#coupon_selected_trek").change(function () {
    var item = $(this).val();
    getTrekData(item);
  });

  jQuery("#coupon_type").change(function () {
    if (jQuery(this).val() == "wel12") {
      // set trek count as 1
      jQuery("#coupon_trek_count").val("1");
      //clear values of selected trek and selected departure
      // jQuery("#coupon_selected_trek").val('');
      // jQuery("#coupon_selected_departure").val('');
      // hide selected trek and selected departure
      jQuery("#specific-trek").css("display", "none");

      //display exclue trek
      jQuery("#non-specific-trek").css("display", "block");
    } else if (jQuery(this).val() == "gen12") {
      //clear values of selected trek and selected departure
      // jQuery("#coupon_trek_count").val('');
      // jQuery("#coupon_selected_trek").val('');
      // jQuery("#coupon_selected_departure").val('');
      // hide selected trek and selected departure
      jQuery("#specific-trek").css("display", "none");

      //display exclue trek
      jQuery("#non-specific-trek").css("display", "block");
    } else if (jQuery(this).val() == "spec12") {
      //clear values of excluded trek
      // jQuery("#coupon_trek_count").val('');
      // jQuery("#coupon_excluded_treks").val('');
      //hide exclude trek
      jQuery("#non-specific-trek").css("display", "none");
      //display selected trek and selected departure
      jQuery("#specific-trek").css("display", "block");
    }
  });

  jQuery("#trek_grade").change(function () {
    if (jQuery(this).val() == "createGrade") {
      $("#trek_grade").val("");
      $("#exampleModal").modal("show");
    }
  });
  jQuery("#trek_season").change(function () {
    if (jQuery(this).val() == "createSeason") {
      $("#trek_season").val("");
      $("#exampleModalSeason").modal("show");
    }
  });
  jQuery("#trek_theme").change(function () {
    if (jQuery(this).val() == "createTheme") {
      $("#trek_theme").val("");
      $("#exampleModalTheme").modal("show");
    }
  });
  jQuery("#trek_event").change(function () {
    if (jQuery(this).val() == "createEvent") {
      $("#trek_event").val("");
      $("#exampleModalEvent").modal("show");
    }
  });

  jQuery("#trek_cancel_policy").change(function () {
    jQuery("#cancel_id_modal").val("");
    jQuery("#cancel_icon").attr("disabled", true);
    var id = jQuery(this).children(":selected").attr("id");

    var res = id.split("-");
    elementid = res[0];
    element_action = res[1];
    if (elementid == "00") {
      jQuery("#cancel_id_modal").val("");
      return;
    }
    if (elementid != "" && element_action != "") {
      var data = new FormData();
      data.append("policy_id", elementid);
      data.append("action", "getPolicyContent");

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
            if (json.result == "fetch") {
              jQuery("#cancel_id_modal").val(json.id);
              jQuery("#cancel_icon").attr("disabled", false);
            }
          } else {
            alert("Some error occured!");
          }
        },
      });
    } else {
      alert("Id null");
    }
  });

  function tab1() {
    flag = 0;
    if (trek_name == "") {
      jQuery("#trek_name").css("border-color", "red");
      flag = 1;
    } else {
      jQuery("#trek_name").css("border-color", "");
    }
    if (trek_country == "") {
      flag = 1;
      jQuery("#trek_country").css("border-color", "red");
    } else {
      jQuery("#trek_country").css("border-color", "");
    }
    if (trek_state == "") {
      flag = 1;
      jQuery("#trek_state").css("border-color", "red");
    } else {
      jQuery("#trek_state").css("border-color", "");
    }
    if (trek_season == "") {
      flag = 1;
      jQuery("#trek_season").css("border-color", "red");
    } else {
      jQuery("#trek_season").css("border-color", "");
    }
    if (trek_grade == "") {
      flag = 1;
      jQuery("#trek_grade").css("border-color", "red");
    } else {
      jQuery("#trek_grade").css("border-color", "");
    }
    if (trek_day == "") {
      flag = 1;
      jQuery("#trek_day").css("border-color", "red");
    } else {
      jQuery("#trek_day").css("border-color", "");
    }
    if (trek_altitude == "") {
      flag = 1;
      jQuery("#trek_altitude").css("border-color", "red");
    } else {
      jQuery("#trek_altitude").css("border-color", "");
    }
    if (trek_distance == "") {
      flag = 1;
      jQuery("#trek_distance").css("border-color", "red");
    } else {
      jQuery("#trek_distance").css("border-color", "");
    }

    if (trek_trail_type == "") {
      flag = 1;
      jQuery("#trek_trail_type").css("border-color", "red");
    } else {
      jQuery("#trek_trail_type").css("border-color", "");
    }

    if (trek_tax == "") {
      flag = 1;
      jQuery("#trek_tax").css("border-color", "red");
    } else {
      jQuery("#trek_tax").css("border-color", "");
    }
    if (trek_transportation_insurace == "") {
      flag = 1;
      jQuery("#trek_trans_ins").css("border-color", "red");
    } else {
      jQuery("#trek_trans_ins").css("border-color", "");
    }
    if (trek_fitness_required == "") {
      flag = 1;
      jQuery("#trek_fitness_required").css("border-color", "red");
    } else {
      jQuery("#trek_fitness_required").css("border-color", "");
    }
    if (trek_about_video == "") {
      flag = 1;
      jQuery("#trek_about_video").css("border-color", "red");
    } else {
      jQuery("#trek_about_video").css("border-color", "");
    }
    if (trek_suitable_for == "") {
      flag = 1;
      jQuery("#trek_suitable_for").css("border-color", "red");
    } else {
      jQuery("#trek_suitable_for").css("border-color", "");
    }
    if (trek_experience == "") {
      flag = 1;
      jQuery("#trek_experience").css("border-color", "red");
    } else {
      jQuery("#trek_experience").css("border-color", "");
    }

    return flag;
  }

  function tab2() {
    flag = 0;

    if (profile_url == "") {
      flag = 1;
      jQuery(".gallarybox1").css("box-shadow", "10px 10px #fc6262");
    } else {
      jQuery(".gallarybox1").css("box-shadow", "10px 10px #64b381");
    }
    if (gallery_url == "") {
      flag = 1;
      jQuery(".gallarybox2").css("box-shadow", "10px 10px #fc6262");
    } else {
      jQuery(".gallarybox2").css("box-shadow", "10px 10px #64b381");
    }
    if (slider_url == "") {
      flag = 1;
      jQuery(".gallarybox3").css("box-shadow", "10px 10px #fc6262");
    } else {
      jQuery(".gallarybox3").css("box-shadow", "10px 10px #64b381");
    }

    if (trek_maps_url == "") {
      flag = 1;
      jQuery(".gallarybox4").css("box-shadow", "10px 10px #fc6262");
    } else {
      jQuery(".gallarybox4").css("box-shadow", "10px 10px #64b381");
    }

    return flag;
  }

  function tab2edit() {
    flag = 0;

    return flag;
  }

  function tab3() {
    flag = 0;
    if (trek_pp == "") {
      flag = 1;
      jQuery("#trek_pp").css("border-color", "red");
    } else {
      jQuery("#trek_pp").css("border-color", "");
    }
    if (trek_drop == "") {
      flag = 1;
      jQuery("#trek_drop").css("border-color", "red");
    } else {
      jQuery("#trek_drop").css("border-color", "");
    }
    if (trek_cancel_policy == "&#&#&") {
      flag = 1;
      jQuery("#trek_cancel_policy").css("border-color", "red");
    } else {
      jQuery("#trek_cancel_policy").css("border-color", "");
    }
    if (trek_essential == "") {
      flag = 1;
      jQuery("#trek_essential").css("border-color", "red");
    } else {
      jQuery("#trek_essential").css("border-color", "");
    }
    if (trek_participation_policy == "") {
      flag = 1;
      jQuery("#trek_participation_policy").css("border-color", "red");
    } else {
      jQuery("#trek_participation_policy").css("border-color", "");
    }
    if (trek_fitness_policy == "") {
      flag = 1;
      jQuery("#trek_fitness_policy").css("border-color", "red");
    } else {
      jQuery("#trek_fitness_policy").css("border-color", "");
    }

    if (trek_overview == "") {
      flag = 1;
      jQuery("#trek_overview_error").css("display", "block");
    } else {
      jQuery("#trek_overview_error").css("display", "none");
    }

    if (trek_about == "") {
      flag = 1;
      jQuery("#trek_about_error").css("display", "block");
    } else {
      jQuery("#trek_about_error").css("display", "none");
    }

    return flag;
  }

  function tab3edit() {
    flag = 0;
    if (trek_pp == "" || trek_pp == null) {
      flag = 1;
      jQuery("#trek_pp").css("border-color", "red");
    } else {
      jQuery("#trek_pp").css("border-color", "");
    }
    // if(trek_pup2==''){
    //   flag = 1;
    //      jQuery("#trek_pup2").css("border-color","red");
    // }else{
    //      jQuery("#trek_pup2").css("border-color","");
    // }
    if (trek_drop == "" || trek_drop == null) {
      flag = 1;
      jQuery("#trek_drop").css("border-color", "red");
    } else {
      jQuery("#trek_drop").css("border-color", "");
    }
    // if (trek_flag == '') {
    //    flag = 1;
    //    jQuery("#trek_flag").css("border-color", "red");
    // } else {
    //    jQuery("#trek_flag").css("border-color", "");
    // }
    if (trek_cancel_policy == "&#&#&") {
      flag = 1;
      jQuery("#trek_cancel_policy").css("border-color", "red");
    } else {
      jQuery("#trek_cancel_policy").css("border-color", "");
    }
    if (trek_essential == "") {
      flag = 1;
      jQuery("#trek_essential").css("border-color", "red");
    } else {
      jQuery("#trek_essential").css("border-color", "");
    }

    if (trek_overview == "") {
      flag = 1;
      jQuery("#trek_overview_error").css("display", "block");
    } else {
      jQuery("#trek_overview_error").css("display", "none");
    }

    if (trek_about == "") {
      flag = 1;
      jQuery("#trek_about_error").css("display", "block");
    } else {
      jQuery("#trek_about_error").css("display", "none");
    }

    return flag;
  }

  function tab4() {
    flag = 0;

    if (trek_cost_terms_inclusion == "") {
      flag = 1;
      jQuery("#trek_cost_terms_inclusion_error").css("display", "block");
    } else {
      jQuery("#trek_cost_terms_inclusion_error").css("display", "none");
    }

    if (trek_cost_terms_exclusion == "") {
      flag = 1;
      jQuery("#trek_cost_terms_exclusion_error").css("display", "block");
    } else {
      jQuery("#trek_cost_terms_exclusion_error").css("display", "none");
    }

    if (trek_cost_terms_note == "") {
      flag = 1;
      jQuery("#trek_cost_terms_note_error").css("display", "block");
    } else {
      jQuery("#trek_cost_terms_note_error").css("display", "none");
    }

    if (trek_cost_terms_tour_fee == "") {
      flag = 1;
      jQuery("#trek_cost_terms_fee_error").css("display", "block");
    } else {
      jQuery("#trek_cost_terms_fee_error").css("display", "none");
    }

    return flag;
  }

  function tab5() {
    flag = 0;
    if (trek_rr == "") {
      flag = 1;
      jQuery("#trek_rr").css("border-color", "red");
    } else {
      jQuery("#trek_rr").css("border-color", "");
    }

    if (trek_filter_theme == "") {
      flag = 1;
      jQuery("#trek_theme").css("border-color", "red");
    } else {
      jQuery("#trek_theme").css("border-color", "");
    }
    if (trek_filter_interests == "") {
      flag = 1;
      jQuery("#trek_filter_interests").css("border-color", "red");
    } else {
      jQuery("#trek_filter_interests").css("border-color", "");
    }
    if (trek_filter_from == "") {
      flag = 1;
      jQuery("#trek_filter_from").css("border-color", "red");
    } else {
      jQuery("#trek_filter_from").css("border-color", "");
    }
    if (trek_filter_to == "") {
      flag = 1;
      jQuery("#trek_filter_to").css("border-color", "red");
    } else {
      jQuery("#trek_filter_to").css("border-color", "");
    }

    if (trek_map_url == "") {
      flag = 1;
      jQuery("#trek_map_youtube_url").css("border-color", "red");
    } else {
      jQuery("#trek_map_youtube_url").css("border-color", "");
    }

    if (trek_cost_terms_cancellation == "") {
      flag = 1;
      jQuery("#trek_cancel_tb_error").css("display", "block");
    } else {
      jQuery("#trek_cancel_tb_error").css("display", "none");
    }

    if (trek_reach_air == "") {
      flag = 1;
      jQuery("#trek_how_reach_error_pp").css("display", "block");
    } else {
      jQuery("#trek_how_reach_error_pp").css("display", "none");
    }

    if (trek_reach_bus == "") {
      flag = 1;
      jQuery("#trek_how_reach_error_pp1").css("display", "block");
    } else {
      jQuery("#trek_how_reach_error_pp1").css("display", "none");
    }
    if (trek_reach_train == "") {
      flag = 1;
      jQuery("#trek_how_reach_error_pp2").css("display", "block");
    } else {
      jQuery("#trek_how_reach_error_pp2").css("display", "none");
    }

    return flag;
  }

  //transport

  //description

  //others

  function menutab1() {
    if (
        trek_tax == "" ||
        trek_about_video == "" ||
        trek_fitness_required == "" ||
        trek_experience == "" ||
        trek_suitable_for == "" ||
        trek_transportation_insurace == "" ||
        trek_name == "" ||
        trek_country == "" ||
        trek_state == "" ||
        trek_season == "" ||
        trek_grade == "" ||
        trek_day == "" ||
        trek_altitude == "" ||
        trek_distance == "" ||
        trek_season == "" ||
        trek_trail_type == ""
    ) {
      jQuery("#menu_home").css("border-color", "red");
    } else {
      jQuery("#menu_home").css("border-color", "");
    }
  }

  function menutab2() {
    if (
        profile_url == "" ||
        gallery_url == "" ||
        slider_url == "" ||
        trek_maps_url == ""
    ) {
      jQuery("#menu_one").css("border-color", "red");
    } else {
      jQuery("#menu_one").css("border-color", "");
    }
  }

  function menutab3() {
    if (
        trek_pp == "" ||
        trek_fitness_policy == "" ||
        trek_participation_policy == "" ||
        trek_drop == "" ||
        trek_cancel_policy == "&#&#&" ||
        trek_essential == "" ||
        trek_overview == "" ||
        trek_about == ""
    ) {
      jQuery("#menu_two").css("border-color", "red");
    } else {
      jQuery("#menu_two").css("border-color", "");
    }
  }

  function menutab3edit() {
    if (
        trek_cancel_policy == "&#&#&" ||
        trek_fitness_policy == "" ||
        trek_participation_policy == "" ||
        trek_essential == "" ||
        trek_overview == "" ||
        trek_about == "" ||
        trek_drop == null ||
        trek_pp == null ||
        trek_drop == "" ||
        trek_pp == ""
    ) {
      jQuery("#menu_two").css("border-color", "red");
    } else {
      jQuery("#menu_two").css("border-color", "");
    }
  }

  function menutab4() {
    if (
        trek_cost_terms_inclusion == "" ||
        trek_cost_terms_exclusion == "" ||
        trek_cost_terms_note == "" ||
        trek_cost_terms_tour_fee == ""
    ) {
      jQuery("#menu_three").css("border-color", "red");
    } else {
      jQuery("#menu_three").css("border-color", "");
    }
  }

  function menutab5() {
    if (
        trek_rr == "" ||
        trek_reach_air == "" ||
        trek_reach_air == "" ||
        trek_reach_bus == "" ||
        trek_reach_train == "" ||
        trek_filter_from == "" ||
        trek_filter_to == "" ||
        trek_filter_theme == "" ||
        trek_filter_interests == ""
    ) {
      jQuery("#menu_four").css("border-color", "red");
    } else {
      jQuery("#menu_four").css("border-color", "");
    }
  }

  jQuery(document).on("click", "#submitbut1", function () {
    get_values();
    tab1();
    tab2();
    tab3();
    tab4();
    tab5();
    menutab1();
    menutab2();
    menutab3();
    menutab4();
    menutab5();

    check_null_value("addTrekDetails");
  });
  jQuery(document).on("click", "#submitbut2", function () {
    // alert("submit");

    get_values();
    tab1();
    tab2();
    tab3();
    tab4();
    tab5();
    menutab1();
    menutab2();
    menutab3();
    menutab4();
    menutab5();

    check_null_value("addTrekDetails");
  });

  //add trek state change

  // jQuery('#trek_state').change(function() {
  //    var item = $(this);
  //    pikState(item.val())
  // });

  jQuery("#trek_pp").change(function () {
    var item = jQuery(this).val();
    updateAutomaticallyReachSection(item);
  });

  jQuery("#trek_drop").change(function () {
    var item = jQuery(this).val();
    updateAutomaticallyDropSection(item);
  });

  jQuery("#trek_cancel_policy").change(function () {
    var item = jQuery(this).val();
    var itemId = $(this).find("option:selected").attr("id");
    var res = itemId.split("-");
    elementid = res[0];
    if (elementid != "") {
      if (elementid != "00") {
        updateAutomaticallyPolicySection(elementid);
      }
    }
    return;
  });

  // if (jQuery('#trek_state').val()!==null)
  // {
  //     var name = jQuery('#trek_state').val();
  //     pikState(name);
  // }
});

//pickup state

// function pikState(name) {
//    var state = name;

//    data = new FormData();
//    data.append('trek_pick_state', state);
//    data.append('action', 'getPlace');
//    //jQuery("#loader").css("display", "block");

//    jQuery.ajax({
//       type: "post",
//       cache: false,
//       contentType: false,
//       processData: false,
//       url: my_obj.ajax_url,
//       data: data,
//       success: function(msg) {

//          //trek_pp,trek_drop

//          jQuery('#trek_pp').html("<option value=''>--Select Pickup Place--</option>");
//          jQuery('#trek_drop').html("<option value=''>--Select Drop Place--</option>");

//          json = JSON.parse(msg);
//          for (var i = 0; i < json.length; i++) {
//             jQuery('#trek_pp').append("<option value='" + json[i].id + "'>" + json[i].trek_pickup_place + "</option>");
//             jQuery('#trek_drop').append("<option value='" + json[i].id + "'>" + json[i].trek_pickup_place + "</option>");

//             // console.log("PAIR " + i + ": " + json[i].trek_pickup_place);
//             // console.log("PAIR " + i + ": " + json[i].id);
//          }

//       }
//    });

// }

function editTrekDetails(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "submitbut4" || element_action == "submitbut5") {
      //action

      get_values();
      check_null_value_edit("editTrekDetails", elementid);
    }
  }
}

function get_values() {
  trek_name = jQuery("#trek_name").val();
  trek_cost = jQuery("#trek_cost").val();
  trek_tax = jQuery("#trek_tax").val();
  // trek_country = jQuery("#trek_country").val();
  trek_country = jQuery("#trek_country option:selected").text();
  // trek_state = jQuery("#trek_state").val();
  trek_state = jQuery("#trek_state option:selected").text()
  trek_season = jQuery("#trek_season").val();
  trek_grade = jQuery("#trek_grade").val();
  trek_day = jQuery("#trek_day").val();
  trek_altitude = jQuery("#trek_altitude").val();
  trek_distance = jQuery("#trek_distance").val();
  trek_season = jQuery("#trek_season").val();
  trek_trail_type = jQuery("#trek_trail_type").val();
  trek_pp = jQuery("#trek_pp").val();
  // trek_map_url = jQuery("#trek_map_youtube_url").val();
  trek_drop = jQuery("#trek_drop").val();
  cancel_policy_id = jQuery("#cancel_id_modal").val();
  trek_team_member = jQuery("#trek_team_member").val();
  trek_leader = jQuery("#trek_leader").val();
  trek_cook = jQuery("#trek_cook").val();
  trek_flag = "nil";
  trek_participation_policy = jQuery("#trek_participation_policy").val();
  trek_fitness_policy = jQuery("#trek_fitness_policy").val();
  trek_filter_from = jQuery("#trek_filter_from").val();
  trek_filter_to = jQuery("#trek_filter_to").val();
  trek_filter_from = trek_filter_from.toUpperCase();
  trek_filter_to = trek_filter_to.toUpperCase();
  trek_rail_head = jQuery("#trek_rail_head").val();
  trek_airport = jQuery("#trek_airport").val();
  trek_base_camp = jQuery("#trek_base_camp").val();
  trek_snow = jQuery("#trek_snow").val();
  trek_stay = jQuery("#trek_stay").val();
  trek_service_from = jQuery("#trek_service_from").val();
  trek_food = jQuery("#trek_food").val();

  trek_rr = jQuery("#trek_rr").val();
  trek_filter_theme = jQuery("#trek_theme").val();
  trek_filter_interests = jQuery("#trek_filter_interests option:selected").text();
  trek_filter_interests = trek_filter_interests.trim();
  trek_suitable_for = jQuery("#trek_suitable_for").val();
  trek_experience = jQuery("#trek_experience").val();
  trek_fitness_required = jQuery("#trek_fitness_required").val();
  trek_about_video = jQuery("#trek_about_video").val();
  trek_transportation_insurace = jQuery("#trek_trans_ins").val();

  trek_discount_percentage = jQuery("#trek_discount_percentage").val();
  trek_discount_end_date = jQuery("#trek_discount_end_date").val();

  trek_cost_terms_cancellation =
      CKEDITOR.instances.trek_cost_terms_cancellation.getData();
  trek_cost_terms_cancellation = trek_cost_terms_cancellation.replace(/"/g,"&&");

  trek_cost_terms_tour_fee =
      CKEDITOR.instances.trek_cost_terms_tour_fee.getData();
  trek_cost_terms_tour_fee = trek_cost_terms_tour_fee.replace(/"/g, "&&");

  trek_cost_terms_note = CKEDITOR.instances.trek_cost_terms_note.getData();
  trek_cost_terms_note = trek_cost_terms_note.replace(/"/g, "&&");

  trek_cost_terms_exclusion =
      CKEDITOR.instances.trek_cost_terms_exclusion.getData();
  trek_cost_terms_exclusion = trek_cost_terms_exclusion.replace(/"/g, "&&");

  trek_cost_terms_inclusion =
      CKEDITOR.instances.trek_cost_terms_inclusion.getData();
  trek_cost_terms_inclusion = trek_cost_terms_inclusion.replace(/"/g, "&&");

  trek_reach_air = CKEDITOR.instances.trek_reach_air.getData();
  trek_reach_air = trek_reach_air.replace(/\\/g, '');
  trek_reach_air = trek_reach_air.replace(/"/g, "&&");

  trek_reach_bus = CKEDITOR.instances.trek_reach_bus.getData();
  trek_reach_bus = trek_reach_bus.replace(/\\/g, '');
  trek_reach_bus = trek_reach_bus.replace(/"/g, "&&");
  trek_reach_train = CKEDITOR.instances.trek_reach_train.getData();
  trek_reach_train = trek_reach_train.replace(/\\/g, '');
  trek_reach_train = trek_reach_train.replace(/"/g, "&&");

  //

  trek_overview = CKEDITOR.instances.trek_overview.getData();
  trek_overview = trek_overview.replace(/"/g, "&&");
  // trek_brief =  CKEDITOR.instances.trek_brief.getData();
  //  trek_brief=trek_brief.replace(/"/g, "&&");
  // trek_itinerary =  CKEDITOR.instances.trek_itinerary.getData();
  //  trek_itinerary=trek_itinerary.replace(/"/g, "&&");

  trek_about = CKEDITOR.instances.trek_about.getData();
  trek_about = trek_about.replace(/"/g, "&&");

  // trek_rr =  CKEDITOR.instances.trek_rr.getData();
  // trek_rr=trek_rr.replace(/"/g, "&&");

  //

  trek_cancel_policy = jQuery("#trek_cancel_policy").val();
  trek_cancel_policy = trek_cancel_policy + "&#&#&" + cancel_policy_id;
  trek_essential = jQuery("#trek_essential").val();
  // trek_reach =  jQuery("#trek_reach").val();

  // trek_rr =  jQuery("#trek_rr").val();

  var yt = [];
  var size = jQuery("#tbl_posts >tbody >tr").length;
  for (var i = 1; i <= size; i++) {
    var temp = $("#link-" + i).val();
    yt.push(temp);
  }
  let text = yt.toString();
  // console.log(text);

  trek_youtube_links = text;
  var map = [];
  var size = jQuery('#tbl_posts-map >tbody >tr').length;
  for (var i = 1; i <= size; i++) {
    var temp = $('#link-map-' + i).val();
    map.push(temp);
  }
  let mp = map.toString();
  trek_map_url = mp;
}

function check_null_value(action) {
  actionPage = "";
  actionPage = action;
  flag = 0;
  // alert(trek_pp);

  if (
      trek_name == "" ||
      trek_pp == "" ||
      trek_participation_policy == "" ||
      trek_fitness_policy == "" ||
      trek_drop == "" ||
      trek_country == "" ||
      profile_url == "" ||
      gallery_url == "" ||
      slider_url == "" ||
      trek_maps_url == "" ||
      trek_state == "" ||
      trek_season == "" ||
      trek_grade == "" ||
      trek_day == "" ||
      trek_altitude == "" ||
      trek_distance == "" ||
      trek_season == "" ||
      trek_trail_type == "" ||
      trek_cancel_policy == "&#&#&" ||
      trek_essential == "" ||
      trek_reach_air == "" ||
      trek_overview == "" ||
      trek_cost_terms_inclusion == "" ||
      trek_about == "" ||
      trek_rr == ""
  ) {
    flag = 1;
    validate("add");
    // tab1();tab2();tab3();tab4();tab5();menutab1();menutab2();menutab3();menutab4();menutab5();
  } else {
    flag = 2;
  }
  if (flag == 2) {
    var data = new FormData();
    data.append("trek_map_url", trek_map_url);
    data.append("trek_reach_air", trek_reach_air);
    data.append("trek_reach_bus", trek_reach_bus);
    data.append("trek_reach_train", trek_reach_train);
    data.append("trek_cost_terms_cancellation", trek_cost_terms_cancellation);
    data.append("trek_cost_terms_tour_fee", trek_cost_terms_tour_fee);
    data.append("trek_cost_terms_note", trek_cost_terms_note);
    data.append("trek_cost_terms_exclusion", trek_cost_terms_exclusion);
    data.append("trek_cost_terms_inclusion", trek_cost_terms_inclusion);
    data.append("trek_discount_percentage", trek_discount_percentage);
    data.append("trek_discount_end_date", trek_discount_end_date);
    data.append("trek_transportation_insurace", trek_transportation_insurace);
    data.append("trek_youtube_videos", trek_youtube_links);
    data.append("trek_name", trek_name);
    data.append("trek_cost", trek_cost);
    data.append("trek_service_tax", trek_tax);
    data.append("trek_region_country", trek_country);
    data.append("trek_region_state", trek_state);
    data.append("trek_season", JSON.stringify(trek_season));
    data.append("trek_grade", trek_grade);
    data.append("trek_days", trek_day);
    data.append("trek_altitude", trek_altitude);
    data.append("trek_distance", trek_distance);
    data.append("trek_best_months", trek_season);
    data.append("trek_trail_type", trek_trail_type);
    data.append("trek_pickup_place1", trek_pp);
    data.append("trek_drop_place", trek_drop);
    data.append("trek_selected_flags", trek_flag);

    data.append("trek_cancellation_policies", trek_cancel_policy);
    data.append("trek_essential", trek_essential);

    data.append("trek_overview", trek_overview);
    data.append("trek_participation_policy", trek_participation_policy);
    data.append("trek_fitness_policy", trek_fitness_policy);

    data.append("trek_about_trek", trek_about);
    data.append("trek_rail_head", trek_rail_head);
    data.append("trek_airport", trek_airport);
    data.append("trek_base_camp", trek_base_camp);
    data.append("trek_snow", trek_snow);
    data.append("trek_stay", trek_stay);
    data.append("trek_service_from", trek_service_from);
    data.append("trek_food", trek_food);

    data.append("trek_filter_from", trek_filter_from);
    data.append("trek_filter_to", trek_filter_to);

    data.append("trek_risk_respond", trek_rr);
    data.append("action", actionPage);
    data.append("trek_upload1", profile_url);
    data.append("trek_upload2", gallery_url);
    data.append("trek_upload3", slider_url);
    data.append("trek_upload4", trek_maps_url);
    data.append("trek_filter_theme", JSON.stringify(trek_filter_theme));
    data.append("trek_filter_interests", trek_filter_interests);
    data.append("trek_suitable_for", trek_suitable_for);
    data.append("trek_experience", trek_experience);
    data.append("trek_fitness_required", trek_fitness_required);
    data.append("trek_about_video", trek_about_video);

    data.append("trek_team_member", trek_team_member);
    data.append("trek_leader", trek_leader);
    data.append("trek_cook", trek_cook);
    data.append("code", 3254);

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
        // console.log("Response status true json :"+json);
        jQuery("#loader").css("display", "none");
        if (json.statusCode == 200) {
          if (json.result == "reload") {
            // alert("Please add detailed Itinerary");
            swal({
              title: "Saved!",
              text: "Please add detailed Itinerary!",
              icon: "success",
              timer: 2000,
              buttons: false,
            }).then(() => {
              // console.log("Redirect to itinerary page!");
              window.location.replace("admin.php?page=trek_itinerary");
            });
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

function check_null_value_edit(action, id) {
  var actionPage = "";
  var actionId = "";
  var actionId = id;
  var actionPage = action;
  var flag = 0;
  var profile = $("#allprofileimg").val();
  var gallery = $("#allgalleryimg").val();
  var slider = $("#allsliderimg").val();
  var mapimgs = $("#allmaptmpimg").val();

  if (
      trek_tax == "" ||
      trek_about_video == "" ||
      trek_fitness_required == "" ||
      trek_experience == "" ||
      trek_suitable_for == "" ||
      trek_transportation_insurace == "" ||
      trek_name == "" ||
      trek_country == "" ||
      trek_state == "" ||
      trek_season == "" ||
      trek_grade == "" ||
      trek_day == "" ||
      trek_altitude == "" ||
      trek_distance == "" ||
      trek_season == "" ||
      trek_trail_type == "" ||
      trek_rr == "" ||
      trek_cost_terms_cancellation == "" ||
      trek_reach_air == "" ||
      trek_reach_bus == "" ||
      trek_reach_train == "" ||
      trek_filter_from == "" ||
      trek_filter_to == "" ||
      trek_filter_theme == "" ||
      trek_filter_interests == "" ||
      trek_cancel_policy == "&#&#&" ||
      trek_essential == "" ||
      trek_overview == "" ||
      trek_about == "" ||
      trek_cost_terms_inclusion == "" ||
      trek_cost_terms_exclusion == "" ||
      trek_cost_terms_note == "" ||
      trek_cost_terms_tour_fee == ""
  ) {
    flag = 1;

    validate("edit");
  } else {
    flag = 2;
  }
  if (flag == 2) {
    // jQuery("#loader").css("display", "block");
    var data = new FormData();
    data.append("trek_map_url", trek_map_url);
    data.append("trek_reach_air", trek_reach_air);
    data.append("trek_reach_bus", trek_reach_bus);
    data.append("trek_reach_train", trek_reach_train);
    data.append("trek_cost_terms_cancellation", trek_cost_terms_cancellation);
    data.append("trek_cost_terms_tour_fee", trek_cost_terms_tour_fee);
    data.append("trek_cost_terms_note", trek_cost_terms_note);
    data.append("trek_cost_terms_exclusion", trek_cost_terms_exclusion);
    data.append("trek_cost_terms_inclusion", trek_cost_terms_inclusion);
    data.append("trek_discount_percentage", trek_discount_percentage);
    data.append("trek_discount_end_date", trek_discount_end_date);
    data.append("trek_youtube_videos", trek_youtube_links);
    data.append("trek_transportation_insurace", trek_transportation_insurace);
    data.append("trek_name", trek_name);
    data.append("trek_cost", trek_cost);
    data.append("trek_service_tax", trek_tax);
    data.append("trek_region_country", trek_country);
    data.append("trek_region_state", trek_state);
    data.append("trek_season", JSON.stringify(trek_season));
    data.append("trek_grade", trek_grade);
    data.append("trek_days", trek_day);
    data.append("trek_altitude", trek_altitude);
    data.append("trek_distance", trek_distance);
    data.append("trek_best_months", trek_season);
    data.append("trek_trail_type", trek_trail_type);
    data.append("trek_pickup_place1", trek_pp);
    data.append("trek_team_member", trek_team_member);
    data.append("trek_cook", trek_cook);
    data.append("trek_leader", trek_leader);
    data.append("trek_drop_place", trek_drop);
    data.append("trek_selected_flags", trek_flag);

    data.append("trek_cancellation_policies", trek_cancel_policy);
    data.append("trek_essential", trek_essential);

    data.append("trek_overview", trek_overview);
    data.append("trek_participation_policy", trek_participation_policy);
    data.append("trek_fitness_policy", trek_fitness_policy);

    data.append("trek_about_trek", trek_about);
    data.append("trek_rail_head", trek_rail_head);
    data.append("trek_airport", trek_airport);
    data.append("trek_base_camp", trek_base_camp);
    data.append("trek_snow", trek_snow);
    data.append("trek_stay", trek_stay);
    data.append("trek_service_from", trek_service_from);
    data.append("trek_food", trek_food);
    data.append("trek_filter_interests", trek_filter_interests);
    data.append("trek_filter_theme", JSON.stringify(trek_filter_theme));
    data.append("trek_filter_from", trek_filter_from);
    data.append("trek_filter_to", trek_filter_to);
    // data.append('trek_total_seats',trek_total_seats);

    // data.append('trek_upload4',trek_map);

    data.append("trek_risk_respond", trek_rr);
    data.append("action", actionPage);
    data.append("trek_id", actionId);
    data.append("trek_upload1", profile);
    data.append("trek_upload2", gallery);
    data.append("trek_upload3", slider);
    data.append("trek_upload4", mapimgs);

    data.append("trek_suitable_for", trek_suitable_for);
    data.append("trek_experience", trek_experience);
    data.append("trek_fitness_required", trek_fitness_required);
    data.append("trek_about_video", trek_about_video);

    // if(map_url==''){
    //   old_map = jQuery("#mapnull").val();
    //   data.append('trek_upload4',old_map);
    // }else{
    //    data.append('trek_upload4',map_url);
    // }

    data.append("code", 3254);

    // console.log(data);

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
          if (json.result == "reload") {
            swal({
              title: "Saved!",
              text: "The data is saved!",
              icon: "success",
              timer: 2000,
              buttons: false,
            }).then(() => {
              location.reload();
            });
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

function validate(action) {
  if (trek_name == "") {
    jQuery("#trek_name").css("border-color", "red");
  } else {
    jQuery("#trek_name").css("border-color", "");
  }
  if (trek_country == "") {
    jQuery("#trek_country").css("border-color", "red");
  } else {
    jQuery("#trek_country").css("border-color", "");
  }
  if (trek_state == "") {
    jQuery("#trek_state").css("border-color", "red");
  } else {
    jQuery("#trek_state").css("border-color", "");
  }
  if (trek_season == "") {
    jQuery("#trek_season").css("border-color", "red");
  } else {
    jQuery("#trek_season").css("border-color", "");
  }
  if (trek_grade == "") {
    jQuery("#trek_grade").css("border-color", "red");
  } else {
    jQuery("#trek_grade").css("border-color", "");
  }
  if (trek_day == "") {
    jQuery("#trek_day").css("border-color", "red");
  } else {
    jQuery("#trek_day").css("border-color", "");
  }
  if (trek_altitude == "") {
    jQuery("#trek_altitude").css("border-color", "red");
  } else {
    jQuery("#trek_altitude").css("border-color", "");
  }
  if (trek_distance == "") {
    jQuery("#trek_distance").css("border-color", "red");
  } else {
    jQuery("#trek_distance").css("border-color", "");
  }
  if (trek_season == "") {
    jQuery("#trek_season").css("border-color", "red");
  } else {
    jQuery("#trek_season").css("border-color", "");
  }
  if (trek_trail_type == "") {
    jQuery("#trek_trail_type").css("border-color", "red");
  } else {
    jQuery("#trek_trail_type").css("border-color", "");
  }
  if (trek_pp == "" || trek_pp == null) {
    jQuery("#trek_pp").css("border-color", "red");
  } else {
    jQuery("#trek_pp").css("border-color", "");
  }
  if (trek_drop == "" || trek_drop == null) {
    jQuery("#trek_drop").css("border-color", "red");
  } else {
    jQuery("#trek_drop").css("border-color", "");
  }

  if (
      trek_drop == "" ||
      trek_drop == null ||
      trek_pp == "" ||
      trek_pp == null
  ) {
    // jQuery("#menu_two").css("background-color","#f7adb1");

    jQuery("#menu_two").css("boarder-color", "#F5B0B0");
  } else {
    // jQuery("#menu_two").css("background-color","");
    jQuery("#menu_two").css("boarder-color", "");
  }
  // if(trek_end_date==''){
  //      jQuery("#trek_end_date").css("border-color","red");
  // }else{
  //      jQuery("#trek_end_date").css("border-color","");
  // }
  // if(trek_start_date==''){
  //      jQuery("#trek_start_date").css("border-color","red");
  // }else{
  //      jQuery("#trek_start_date").css("border-color","");
  // }
  // if(trek_total_seats==''){
  //      jQuery("#trek_total_seats").css("border-color","red");
  // }else{
  //      jQuery("#trek_total_seats").css("border-color","");
  // }
  if (action != "edit") {
    if (profile_url == "") {
      jQuery("#trek_upload1").css("border-color", "red");
    } else {
      jQuery("#trek_upload1").css("border-color", "");
    }
    if (gallery_url == "") {
      jQuery("#trek_upload2").css("border-color", "red");
    } else {
      jQuery("#trek_upload2").css("border-color", "");
    }
    if (slider_url == "") {
      jQuery("#trek_upload3").css("border-color", "red");
    } else {
      jQuery("#trek_upload3").css("border-color", "");
    }
    if (trek_maps_url == "") {
      jQuery("#trek_upload4").css("border-color", "red");
    } else {
      jQuery("#trek_upload4").css("border-color", "");
    }
    if (map_url == "") {
      jQuery("#trek_map").css("border-color", "red");
    } else {
      jQuery("#trek_map").css("border-color", "");
    }
    if (
        profile_url == "" ||
        gallery_url == "" ||
        slider_url == "" ||
        trek_maps_url == ""
    ) {
      jQuery("#menu_one").css("border-color", "red");
    } else {
      jQuery("#menu_one").css("border-color", "");
    }

    if (
        trek_cancel_policy == "&#&#&" ||
        trek_essential == "" ||
        trek_overview == "" ||
        trek_about == "" ||
        trek_drop == "" ||
        trek_drop == null ||
        trek_pp == "" ||
        trek_pp == null
    ) {
      jQuery("#menu_two").css("border-color", "red");
    } else {
      jQuery("#menu_two").css("border-color", "");
    }
  }

  if (trek_cancel_policy == "&#&#&") {
    jQuery("#trek_cancel_policy").css("border-color", "red");
  } else {
    jQuery("#trek_cancel_policy").css("border-color", "");
  }
  if (trek_essential == "") {
    jQuery("#trek_essential").css("border-color", "red");
  } else {
    jQuery("#trek_essential").css("border-color", "");
  }
  if (trek_reach_air == "") {
    jQuery("#trek_reach_air").css("border-color", "red");
  } else {
    jQuery("#trek_reach_air").css("border-color", "");
  }
  if (trek_overview == "") {
    jQuery("#trek_overview").css("border-color", "red");
  } else {
    jQuery("#trek_overview").css("border-color", "");
  }
  if (trek_about == "") {
    jQuery("#trek_about").css("border-color", "red");
  } else {
    jQuery("#trek_about").css("border-color", "");
  }

  if (trek_rr == "") {
    jQuery("#trek_rr").css("border-color", "red");
  } else {
    jQuery("#trek_rr").css("border-color", "");
  }

  if (
      trek_tax == "" ||
      trek_about_video == "" ||
      trek_fitness_required == "" ||
      trek_experience == "" ||
      trek_suitable_for == "" ||
      trek_transportation_insurace == "" ||
      trek_name == "" ||
      trek_country == "" ||
      trek_state == "" ||
      trek_season == "" ||
      trek_grade == "" ||
      trek_day == "" ||
      trek_altitude == "" ||
      trek_distance == "" ||
      trek_season == "" ||
      trek_trail_type == ""
  ) {
    jQuery("#menu_home").css("border-color", "red");
  } else {
    jQuery("#menu_home").css("border-color", "");
  }

  if (
      trek_cancel_policy == "&#&#&" ||
      trek_essential == "" ||
      trek_overview == "" ||
      trek_about == ""
  ) {
    jQuery("#menu_two").css("border-color", "red");
  } else {
    jQuery("#menu_two").css("border-color", "");
  }

  if (
      trek_cost_terms_inclusion == "" ||
      trek_cost_terms_exclusion == "" ||
      trek_cost_terms_note == "" ||
      trek_cost_terms_tour_fee == ""
  ) {
    jQuery("#menu_three").css("border-color", "red");
  } else {
    jQuery("#menu_three").css("border-color", "");
  }

  if (
      trek_rr == "" ||
      trek_cost_terms_cancellation == "" ||
      trek_reach_air == "" ||
      trek_reach_bus == "" ||
      trek_reach_train == "" ||
      trek_filter_from == "" ||
      trek_filter_to == "" ||
      trek_filter_theme == "" ||
      trek_filter_interests == ""
  ) {
    jQuery("#menu_four").css("border-color", "red");
  } else {
    jQuery("#menu_four").css("border-color", "");
  }
}

// function validate_menu(){
//     //Details
// if((trek_name=='')||(trek_country=='')||(trek_state=='')||(trek_season=='')||(trek_grade=='')||(trek_day=='')||(trek_altitude=='')||(trek_distance=='')||(trek_season=='')||(trek_trail_type=='')){
//      jQuery("#menu_home").css("border-color","red");
// }else{
//      jQuery("#menu_home").css("border-color","");
// }
// //transport
// if((trek_pup1=='')||(trek_drop=='')||(trek_flag=='')||(trek_transportation=='')||(trek_upload1=='')||(trek_upload2=='')||(trek_upload3=='')){
//      jQuery("#menu_one").css("border-color","red");
// }else{
//      jQuery("#menu_one").css("border-color","");
// }

// //description
// if((trek_cancel_policy=='')||(trek_essential=='')||(trek_reach=='')||(trek_overview=='')||(trek_brief=='')||(trek_itinerary=='')||(trek_cost_terms=='')||(trek_about=='')){
//      jQuery("#menu_two").css("border-color","red");
//         }else{
//          jQuery("#menu_two").css("border-color","");
//         }
//   //others

// if((trek_fitness=='')||(trek_map=='')||(trek_faq=='')||(trek_rr=='')){
//      jQuery("#menu_three").css("border-color","red");
//     }else{
//          jQuery("#menu_three").css("border-color","");
//     }
// }

// all treks

function allpageView(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "allview") {
      //action
    }
  }
}

function allpageEdit(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "alledit") {
      //action
    }
  }
}

function allpageDelete(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "alldelete") {
      //action
      var data = new FormData();
      data.append("trek_id", elementid);
      data.append("action", "deleteTrek");

      swal({
        title: "Are you sure?",
        text: "Do you really want to delete this trek & it's departures?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
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
                if (json.result == "reload") {
                  swal({
                    title: "Done!",
                    text: "Successfully deleted!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      });
    }
  }
}

function allpageStatus(id, act) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  element_trek_name = res[2];

  if (element_trek_name == "") {
    trek_name = "this trek";
  } else {
    trek_name = element_trek_name;
  }
  if (elementid != "" && element_action != "") {
    if (element_action == "allpublish") {
      //action
      var data = new FormData();
      data.append("trek_id", elementid);
      data.append("action", "unpublishThisTrek");

      if (act == "pub") {
        data.append("accomp", "publish");
        swal({
          title: "Do you want to Un-publish " + trek_name + " ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
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
                  if (json.result == "reload") {
                    swal({
                      title: "Successful!",
                      text: "Trek Unpublished!",
                      icon: "success",
                      timer: 2000,
                      buttons: false,
                    }).then(() => {
                      location.reload();
                    });
                  }
                } else {
                  toastr.error("Some error occurred", "Oh no!");
                }
              },
            });
          }
        });
      } else if (act == "top") {
        data.append("accomp", "toppick");
        swal({
          title: "Do you want to remove " + trek_name + " from top picks ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
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
                  if (json.result == "reload") {
                    swal({
                      title: "Successful!",
                      text: "Trek Removed!",
                      icon: "success",
                      timer: 2000,
                      buttons: false,
                    }).then(() => {
                      location.reload();
                    });
                  }
                } else {
                  toastr.error("Some error occurred", "Oh no!");
                }
              },
            });
          }
        });
      } else {
        swal("Something went wrong");
        return;
      }

      //var r = confirm("Do you want to Unpublish " + trek_name + " ?");
    } else if (element_action == "allunpublish2") {
      //action

      var data = new FormData();
      data.append("trek_id", elementid);
      data.append("action", "publishThisTrek");
      if (act == "pub") {
        data.append("accomp", "publish");

        swal({
          title:
              "Itinerary Field is still pending! Do you want to publish " +
              trek_name +
              " anyway?",
          text: "You can edit Itinerary anytime.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            jQuery.ajax({
              type: "post",
              cache: false,
              contentType: false,
              processData: false,
              url: my_obj.ajax_url,
              data: data,
              success: function (msg) {
                json = JSON.parse(msg);
                // console.log("amal "+msg);

                if (json.statusCode == 200) {
                  if (json.result == "reload1") {
                    swal({
                      title: "Successful!",
                      text: "Trek Published!",
                      icon: "success",
                      timer: 2000,
                      buttons: false,
                    }).then(() => {
                      location.reload();
                    });
                  } else if (json.result == "reload2") {
                    // alert("Please add all itinerary and continue!");
                    toastr.warning(
                        "Please add all itinerary and continue!",
                        "Oh no!"
                    );
                  }
                } else {
                  toastr.error("Some error occurred", "Oh no!");
                }
              },
            });
          } else {
            var r1 = confirm("Move to Itinerary Page?");
            if (r1 == true) {
              window.location.replace("admin.php?page=trek_itinerary");
            }
          }
        });
      } else if (act == "top") {
        data.append("accomp", "toppick");

        swal({
          title:
              "Itinerary Field is still pending! Do you want to display " +
              trek_name +
              " in top picks?",
          text: "You can edit Itinerary anytime.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            jQuery.ajax({
              type: "post",
              cache: false,
              contentType: false,
              processData: false,
              url: my_obj.ajax_url,
              data: data,
              success: function (msg) {
                json = JSON.parse(msg);
                // console.log("amal "+msg);

                if (json.statusCode == 200) {
                  if (json.result == "reload1") {
                    swal({
                      title: "Successful!",
                      text: "Trek Added!",
                      icon: "success",
                      timer: 2000,
                      buttons: false,
                    }).then(() => {
                      location.reload();
                    });
                  } else if (json.result == "reload2") {
                    // alert("Please add all itinerary and continue!");
                    toastr.warning(
                        "Please add all itinerary and continue!",
                        "Oh no!"
                    );
                  }
                } else {
                  toastr.error("Some error occurred", "Oh no!");
                }
              },
            });
          } else {
            var r1 = confirm("Move to Itinerary Page?");
            if (r1 == true) {
              window.location.replace("admin.php?page=trek_itinerary");
            }
          }
        });
      } else {
        swal("Something went wrong");
        return;
      }
    } else if (element_action == "allunpublish1") {
      //action

      var data = new FormData();
      data.append("trek_id", elementid);
      data.append("action", "publishThisTrek");
      if (act == "pub") {
        data.append("accomp", "publish");
        var r = confirm("Do you want to Publish " + trek_name + " ?");
        if (r == true) {
          jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
              json = JSON.parse(msg);
              // console.log("amal "+msg);

              if (json.statusCode == 200) {
                if (json.result == "reload1") {
                  swal({
                    title: "Successful!",
                    text: "Trek Published!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                } else if (json.result == "reload2") {
                  toastr.warning(
                      "Please add all itinerary and continue",
                      "Oh no!"
                  );
                  // alert("Please add all itinerary and continue!");
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      } else if (act == "top") {
        data.append("accomp", "toppick");
        var r = confirm(
            "Do you want to display " + trek_name + " in top picks?"
        );
        if (r == true) {
          jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
              json = JSON.parse(msg);
              // console.log("amal "+msg);

              if (json.statusCode == 200) {
                if (json.result == "reload1") {
                  swal({
                    title: "Successful!",
                    text: "Trek Added!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                } else if (json.result == "reload2") {
                  toastr.warning(
                      "Please add all itinerary and continue",
                      "Oh no!"
                  );
                  // alert("Please add all itinerary and continue!");
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      } else {
        swal("Something went wrong");
        return;
      }
    }
  }
}

function addFlag() {
  flagName = $("#flag-name").val();
  if (flagName != "") {
    data = new FormData();
    data.append("trek_flag_name", flagName);
    data.append("action", "addNewFlag");
    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "reload") {
            swal({
              title: "Saved!",
              text: "The data is saved!",
              icon: "success",
              timer: 2000,
              buttons: false,
            }).then(() => {
              location.reload();
            });
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.error("flag name should not be empty", "Oh no!");
    //alert("flag name should not be empty");
  }
}

function addGrade1() {
  gradeName = $("#grade-name").val();
  // alert(gradeName);
  if (gradeName != "") {
    jQuery("#exampleModal").modal("hide");
    data = new FormData();
    data.append("trek_grade_name", gradeName);
    data.append("action", "addNewGrade");
    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "data") {
            newGrade = json.data;
            val = "";
            val += "<option>" + newGrade + "</option>";
            jQuery("#trek_grade").append(val);
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.warning("Grade should not be empty", "Wait!");
    // alert("Grade should not be empty");
  }
}
function addSeason1() {
  seasonName = $("#season-name").val();
  // alert(gradeName);
  if (seasonName != "") {
    jQuery("#exampleModalSeason").modal("hide");
    data = new FormData();
    data.append("trek_season_name", seasonName);
    data.append("action", "addNewSeason");
    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "data") {
            newGrade = json.data;
            val = "";
            val += "<option>" + newGrade + "</option>";
            jQuery("#trek_season").append(val);
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.warning("Grade should not be empty", "Wait!");
    // alert("Grade should not be empty");
  }
}
function addTheme1() {
  themeName = $("#theme-name").val();
  // alert(gradeName);
  if (themeName != "") {
    jQuery("#exampleModalTheme").modal("hide");
    data = new FormData();
    data.append("trek_theme_name", themeName);
    data.append("action", "addNewTheme");
    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "data") {
            newGrade = json.data;
            val = "";
            val += "<option>" + newGrade + "</option>";
            jQuery("#trek_theme").append(val);
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.warning("Theme name should not be empty", "Wait!");
    // alert("Grade should not be empty");
  }
}
function addPlace() {
  pickupPlaceName = $("#trek_create_pickup").val();
  trek_create_howtoreach = CKEDITOR.instances.trek_create_howtoreach.getData();
  trek_create_howtoreach = trek_create_howtoreach.replace(/"/g, "&&");
  if (pickupPlaceName != "" || trek_create_howtoreach != "") {
    jQuery("#exampleModalPickUp").modal("hide");
    data = new FormData();
    data.append("trek_create_pickup", pickupPlaceName);
    data.append("trek_create_howtoreach", trek_create_howtoreach);
    data.append("action", "addNewPickupPlace");
    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "data") {
            newPlace = json.data;
            val = "";
            val += "<option>" + newPlace + "</option>";
            jQuery("#trek_pp").append(val);
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.error("All Fields Required", "Wait!");
    // alert("All Fiels Required!");
  }
}

function flagEdit(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "flagEdit") {
      data = new FormData();
      data.append("trek_flag_id", elementid);
      data.append("action", "getFlag");
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

          if (json.statusCode == 200) {
            if (json.output != "" && json.outputIt != "") {
              // location.reload();

              jQuery("#flag-name-edit").val(json.output);
              jQuery("#flag-name-id").val(json.outputId);
              jQuery("#loader").css("display", "none");
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  }
}

function trekkersrNoteNySales(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "note") {
      data = new FormData();
      data.append("trek_booking_id", elementid);
      data.append("action", "getBookingNote");
      // jQuery("#loader").css("display", "block");

      jQuery.ajax({
        type: "post",
        cache: false,
        contentType: false,
        processData: false,
        url: my_obj.ajax_url,
        data: data,
        success: function (msg) {
          json = JSON.parse(msg);
          $("#trekNoteBySalesBooking").val("");
          if (json.statusCode == 200) {
            $("#trekNoteBySales").val(json.data);
            $("#trekNoteBySalesBooking").val(json.bookingId);
          } else if (json.statusCode == 400) {
            $("#trekNoteBySalesBooking").val(json.bookingId);
          }
        },
        // jQuery("#loader").css("display", "none");
      });
    }
  } else {
    toastr.error("Some error occurred", "Oh no!");
  }
}

function trekkersSaverNoteNySales() {
  let bookingId = $("#trekNoteBySalesBooking").val();
  let BookingContent = $("#trekNoteBySales").val();
  if (bookingId != "") {
    data = new FormData();
    data.append("trek_booking_id", bookingId);
    data.append("trek_booking_note", BookingContent);
    data.append("action", "getBookingNoteSaveRequest");
    // jQuery("#loader").css("display", "block");

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
          toastr.success("Note updated successfully", "Success!");
          setTimeout(function () {
            location.reload();
          }, 3000);
        } else if (json.statusCode == 400) {
          toastr.error("Request Failed", "Oh no!");
        }
      },
      // jQuery("#loader").css("display", "none");
    });
  } else {
    toastr.error("Some error occurred", "Oh no!");
  }
}

function flagDelete(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "flagDelete") {
      data = new FormData();
      data.append("trek_flag_id", elementid);
      data.append("action", "deleteFlag");

      swal({
        title: "Are you sure?",
        text: "Do you really want to delete this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          jQuery("#loader").css("display", "block");

          jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
              jQuery("#loader").css("display", "none");
              json = JSON.parse(msg);

              if (json.statusCode == 200) {
                if (json.result == "reload") {
                  swal({
                    title: "Done!",
                    text: "Successfully deleted!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      });

      // var r = confirm("Do you really want to delete this item!");
      // if (r == true) {
      //     jQuery("#loader").css("display", "block");
      //
      //     jQuery.ajax({
      //         type: "post",
      //         cache: false,
      //         contentType: false,
      //         processData: false,
      //         url: my_obj.ajax_url,
      //         data: data,
      //         success: function (msg) {
      //
      //             jQuery("#loader").css("display", "none");
      //             json = JSON.parse(msg);
      //
      //             if (json.statusCode == 200) {
      //
      //                 if (json.result == 'reload') {
      //                     location.reload();
      //                 }
      //             } else {
      //                 alert("Some error occured!");
      //             }
      //         }
      //     });
      // }
    }
  }
}

function updateFlag() {
  var flagName = "";
  var flagId = "";
  flagName = jQuery("#flag-name-edit").val();
  flagId = jQuery("#flag-name-id").val();

  data = new FormData();
  data.append("trek_flag_name", flagName);
  data.append("trek_flag_id", flagId);
  data.append("action", "updateFlag");
  jQuery("#loader").css("display", "block");

  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      jQuery("#loader").css("display", "none");
      json = JSON.parse(msg);

      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal({
            title: "Updated!",
            text: "The data is updated!",
            icon: "success",
            timer: 2000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function editCancelPolicyClass() {
  var li = document.getElementById("box2id");

  if (li.className == "col-md-12 box2") {
    jQuery("#box1id").css("display", "block");
    jQuery("#box2id").removeClass("col-md-12 box2").addClass("col-md-8 box2");
    // jQuery("#addCancelPolicy").css("display","block");
    // jQuery("#updateCancelPolicy").css("display","none");
  } else if (li.className == "col-md-8 box2") {
    jQuery("#box1id").css("display", "none");
    jQuery("#box2id").removeClass("col-md-8 box2").addClass("col-md-12 box2");
  }
}

function addCancelPolicy() {
  policyName = jQuery("#trek_cancel_policy_name").val();
  privacyPolicyContent = CKEDITOR.instances.ckeditor.getData();

  if (policyName == "" || privacyPolicyContent == "") {
    // alert("All Fields Required!");
    toastr.error("All Fields Required.", "Oh no!");
    return;
  }
  data = new FormData();
  data.append("trek_cancel_policy_name", policyName);
  data.append("trek_cancel_content", privacyPolicyContent);
  data.append("action", "addPolicyAction");
  jQuery("#loader").css("display", "block");

  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      jQuery("#loader").css("display", "none");
      json = JSON.parse(msg);

      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal({
            title: "Saved!",
            text: "The data is saved!",
            icon: "success",
            timer: 2000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function policyDelete(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "policyDelete") {
      var data = new FormData();
      data.append("policy_id", elementid);
      data.append("action", "deletePolicy");

      swal({
        title: "Are you sure?",
        text: "Do you really want to delete this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          jQuery("#loader").css("display", "block");

          jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
              jQuery("#loader").css("display", "none");
              json = JSON.parse(msg);

              if (json.statusCode == 200) {
                if (json.result == "reload") {
                  swal({
                    title: "Done!",
                    text: "Successfully deleted!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      });
    }
  }
}

function policyEdit(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "policyEdit") {
      jQuery("#addCancelPolicy").css("display", "none");
      jQuery("#updateCancelPolicy").css("display", "block");
      jQuery("#updateepolicy").css("display", "block");
      jQuery("#createpolicy").css("display", "none");
      jQuery(".allcards").css("display", "none");
      jQuery(".allcardunique-" + elementid).css("display", "block");

      jQuery("#" + elementid + "-policyCancelBut").css("display", "");
      jQuery("#" + elementid + "-policyEdit").css("display", "none");

      jQuery("#" + elementid + "-policySelected").css(
          "border",
          "3px solid rgba(3, 166, 120, 1)"
      );

      data = new FormData();
      data.append("trek_policy_id", elementid);
      data.append("action", "getPolicy");
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

          if (json.statusCode == 200) {
            if (
                json.outputName != "" &&
                json.outputContent != "" &&
                json.outputId != ""
            ) {
              // location.reload();
              jQuery("#trek_cancel_policy_name").val("");
              jQuery("#trek_cancel_policy_id").val("");
              // CKEDITOR.instances.ckeditor.setData('');

              jQuery("#trek_cancel_policy_name").val(json.outputName);
              jQuery("#trek_cancel_policy_id").val(json.outputId);
              CKEDITOR.instances.ckeditor.setData("" + json.outputContent + "");

              jQuery("#loader").css("display", "none");
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  }
}

function policycancelBut(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "policyCancelBut") {
      jQuery(".allcards").css("display", "block");
      jQuery("#addCancelPolicy").css("display", "block");
      jQuery("#updateCancelPolicy").css("display", "none");
      jQuery("#updateepolicy").css("display", "none");
      jQuery("#createpolicy").css("display", "block");
      jQuery("#" + elementid + "-policyCancelBut").css("display", "none");
      jQuery("#" + elementid + "-policyEdit").css("display", "");
      jQuery("#" + elementid + "-policySelected").css(
          "border",
          "1px solid rgba(255, 0, 0, 0.8)"
      );
      jQuery("#trek_cancel_policy_name").val("");
      jQuery("#trek_cancel_policy_id").val("");
      CKEDITOR.instances.ckeditor.setData("");
    }
  }
}

function updateCancelPolicy() {
  var PolicyName = "";
  var policyId = "";
  var policydata = "";
  PolicyName = jQuery("#trek_cancel_policy_name").val();
  policyId = jQuery("#trek_cancel_policy_id").val();
  policydata = CKEDITOR.instances.ckeditor.getData();

  data = new FormData();
  data.append("trek_policy_name", PolicyName);
  data.append("trek_policy_id", policyId);
  data.append("trek_policy_content", policydata);
  data.append("action", "updatePolicy");
  jQuery("#loader").css("display", "block");

  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      jQuery("#loader").css("display", "none");
      json = JSON.parse(msg);

      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal({
            title: "Updated!",
            text: "The data is updated!",
            icon: "success",
            timer: 2000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function upload1() {
  profile_url = [];
  var images = wp
      .media({
        title: "Upload Images",
        multiple: false,
        library: {
          type: "image",
        },
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");

        // selectimg=uploadedImages.toJSON();
        // ;
        count = uploadedImages.toJSON().length;
        selectimage = uploadedImages.toJSON();
        if (count == 1) {
          result = selectimage[0].url;
        }
        profile_url.push(result);
        $("#trek_upload_img1").append(result);
        jQuery(".gallarybox1").css("box-shadow", "10px 10px green");
        jQuery("#p1").css("display", "none");
        jQuery("#p2").css("display", "block");
        if (selectimage[0].url != "") {
          jQuery("#p2").append(
              '<img  src="' +
              selectimage[0].url +
              '" style="height: 100px;width: 100px;padding: 5px"/>'
          );
        }
      });
}
function upload15() {
  couponImage = [];
  var images = wp
      .media({
        title: "Upload Images",
        multiple: false,
        library: {
          type: "image",
        },
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");

        // selectimg=uploadedImages.toJSON();
        // ;
        count = uploadedImages.toJSON().length;
        selectimage = uploadedImages.toJSON();
        if (count == 1) {
          result = selectimage[0].url;
        }
        couponImage.push(result);
        console.log(couponImage);
        // $('#trek_upload_img1').append(result);
        jQuery(".couponImg1").css("box-shadow", "10px 10px green");
      });
}
function upload2() {
  gallery_url = [];
  var images = wp
      .media({
        title: "Upload Images",
        multiple: true,
        library: {
          type: "image",
        },
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");
        var selectimg = uploadedImages;
        selectimg.map(function (image) {
          var itemdetails = image.toJSON();
          gallery_url.push(itemdetails.url);
          // console.log(itemdetails.url);
          $("#trek_upload_img2").append(gallery_url);
          jQuery(".gallarybox2").css("box-shadow", "10px 10px green");
          jQuery("#g1").css("display", "none");
          jQuery("#g2").css("display", "block");
          if (itemdetails.url != "") {
            jQuery("#g2").append(
                '<img  src="' +
                itemdetails.url +
                '" style="height: 60px;width: 60px;padding: 5px"/>'
            );
          }
        });
      });
}

function upload3() {
  slider_url = [];
  var images = wp
      .media({
        title: "Upload Images",
        multiple: true,
        library: {
          type: "image",
        },
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");
        var selectimg = uploadedImages;
        selectimg.map(function (image) {
          var itemdetails = image.toJSON();
          slider_url.push(itemdetails.url);
          // console.log(itemdetails.url);
          $("#trek_upload_img3").append(slider_url);
          jQuery(".gallarybox3").css("box-shadow", "10px 10px green");
          jQuery("#s1").css("display", "none");
          jQuery("#s2").css("display", "block");
          if (itemdetails.url != "") {
            jQuery("#s2").append(
                '<img  src="' +
                itemdetails.url +
                '" style="height: 60px;width: 60px;padding: 5px"/>'
            );
          }
        });
      });
}

function upload4() {
  trek_maps_url = [];
  var images = wp
      .media({
        title: "Upload Images",
        multiple: true,
        library: {
          type: "image",
        },
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");
        var selectimg = uploadedImages;
        selectimg.map(function (image) {
          var itemdetails = image.toJSON();
          trek_maps_url.push(itemdetails.url);
          console.log(itemdetails.url);
          $("#trek_upload_img4").append(trek_maps_url);
          jQuery(".gallarybox4").css("box-shadow", "10px 10px green");
          jQuery("#l1").css("display", "none");
          jQuery("#l2").css("display", "block");
          if (itemdetails.url != "") {
            jQuery("#l2").append(
                '<img  src="' +
                itemdetails.url +
                '" style="height: 60px;width: 60px;padding: 5px"/>'
            );
          }
        });
      });
}

function upload1Edit() {
  // console.log("==========upload fun================");
  profile_url_edit = [];
  var images = wp
      .media({
        title: "Upload Images",
        multiple: false,
        library: {
          type: "image",
        },
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");
        var selectimg = uploadedImages;
        selectimg.map(function (image) {
          var itemdetails = image.toJSON();
          profile_url_edit.push(itemdetails.url);
          // console.log("==========Added url================");
          // console.log(itemdetails.url);
          jQuery("#allprofileimg").val(profile_url_edit);
          profileval = jQuery("#allprofileimg").val();
          //  console.log("==========textarea  value================");
          // console.log(profileval);
          // console.log(itemdetails.url);
          if (itemdetails.url != "") {
            jQuery("#pe2").append(
                '<img  src="' +
                itemdetails.url +
                '" style="height: 60px;width: 60px;padding: 5px;"/>'
            );
          }
        });
        // $('#trek_upload_img3').append(slider_url);
        jQuery(".gallarybox1").css("box-shadow", "10px 10px #64b381");
      });
}

function upload2Edit() {
  // console.log("==========upload fun================");

  var images = wp
      .media({
        title: "Upload Images",
        multiple: true,
        library: {
          type: "image",
        },
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");
        var selectimg = uploadedImages;
        selectimg.map(function (image) {
          var itemdetails = image.toJSON();
          gallery_url_edit = [];
          gallery_url_edit.push(itemdetails.url);
          // console.log("==========Added url================");
          // console.log(gallery_url_edit);
          existingGalleryImages = jQuery("#allgalleryimg").val();
          existingGalleryImagesArray = existingGalleryImages.split(",");
          // console.log("==========Existing Array================");
          // console.log(existingGalleryImagesArray);
          if (existingGalleryImagesArray.length == 1) {
            if (existingGalleryImagesArray[0] == "") {
              resultG = gallery_url_edit;
            } else {
              resultG = gallery_url_edit.concat(existingGalleryImagesArray);
            }
          } else {
            resultG = gallery_url_edit.concat(existingGalleryImagesArray);
          }

          // console.log("==========Result Array================");
          // console.log(resultG);
          jQuery("#allgalleryimg").val(resultG);
          txtareaGallery = jQuery("#allgalleryimg").val();

          //  console.log("==========textarea  value================");
          // console.log(txtareaGallery);
          // console.log(itemdetails.url);
          if (itemdetails.url != "") {
            jQuery("#ge2").append(
                '<img  src="' +
                itemdetails.url +
                '" style="height: 60px;width: 60px;padding: 5px"/>'
            );
          }
        });
        // $('#trek_upload_img2').append(gallery_url_edit);
        jQuery(".gallarybox2").css("box-shadow", "10px 10px #64b381");
      });
}

function upload3Edit() {
  // console.log("==========upload fun================");

  var images = wp
      .media({
        title: "Upload Images",
        multiple: true,
        library: {
          type: "image",
        },
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");
        var selectimg = uploadedImages;
        selectimg.map(function (image) {
          var itemdetails = image.toJSON();
          slider_url_edit = [];
          slider_url_edit.push(itemdetails.url);
          // console.log("==========Added url================");
          // console.log(slider_url_edit);
          existingSliderImages = jQuery("#allsliderimg").val();
          existingSliderImagesArray = existingSliderImages.split(",");
          //   console.log("==========Existing Array================");
          // console.log(existingSliderImagesArray);
          // console.log("==========Existing Array length================");
          // console.log(existingSliderImagesArray.length);
          if (existingSliderImagesArray.length == 1) {
            if (existingSliderImagesArray[0] == "") {
              resultS = slider_url_edit;
            } else {
              resultS = slider_url_edit.concat(existingSliderImagesArray);
            }
          } else {
            resultS = slider_url_edit.concat(existingSliderImagesArray);
          }

          //   console.log("==========Result Array================");
          // console.log(resultS);
          jQuery("#allsliderimg").val(resultS);
          txtareaSlider = jQuery("#allsliderimg").val();

          //  console.log("==========textarea  value================");
          // console.log(txtareaSlider);
          // console.log(itemdetails.url);
          if (itemdetails.url != "") {
            jQuery("#se2").append(
                '<img  src="' +
                itemdetails.url +
                '" style="height: 60px;width: 60px;padding: 5px"/>'
            );
          }
        });
        // $('#trek_upload_img3').append(slider_url_edit);
        jQuery(".gallarybox3").css("box-shadow", "10px 10px #64b381");
      });
}
function upload4Edit() {
  // console.log("==========upload fun================");

  var images = wp
      .media({
        title: "Upload Images",
        multiple: true,
        library: {
          type: "image",
        },
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");
        var selectimg = uploadedImages;
        selectimg.map(function (image) {
          var itemdetails = image.toJSON();
          trek_maps_url_edit = [];
          trek_maps_url_edit.push(itemdetails.url);
          // console.log("==========Added url================");
          // console.log(slider_url_edit);
          existingMapTmpImages = jQuery("#allmaptmpimg").val();
          existingMapTmpImagesArray = existingMapTmpImages.split(",");
          //   console.log("==========Existing Array================");
          // console.log(existingSliderImagesArray);
          // console.log("==========Existing Array length================");
          // console.log(existingSliderImagesArray.length);
          if (existingMapTmpImagesArray.length == 1) {
            if (existingMapTmpImagesArray[0] == "") {
              resultS = trek_maps_url_edit;
            } else {
              resultS = trek_maps_url_edit.concat(existingMapTmpImagesArray);
            }
          } else {
            resultS = trek_maps_url_edit.concat(existingMapTmpImagesArray);
          }

          //   console.log("==========Result Array================");
          // console.log(resultS);
          jQuery("#allmaptmpimg").val(resultS);
          txtareaMap = jQuery("#allmaptmpimg").val();

          //  console.log("==========textarea  value================");
          // console.log(txtareaSlider);
          // console.log(itemdetails.url);
          if (itemdetails.url != "") {
            jQuery("#le2").append(
                '<img  src="' +
                itemdetails.url +
                '" style="height: 60px;width: 60px;padding: 5px"/>'
            );
          }
        });
        // $('#trek_upload_img3').append(slider_url_edit);
        jQuery(".gallarybox4").css("box-shadow", "10px 10px #64b381");
      });
}

function slider_img_edit(id) {
  var res = id.split("-");
  elementid = res[1];
  element_action = res[0];
  // console.log("elementid "+elementid);
  url = jQuery("#sliderimg-" + elementid).attr("src");
  // console.log(id+" url is "+url);
  //  console.log("==========All url================");
  sliderArray = jQuery("#allsliderimg").val();
  var resArray = sliderArray.split(",");
  // console.log(resArray);
  resultArray = _.without(resArray, url);
  // console.log("==========removing url================");
  //  console.log(url);
  //  console.log("==========removed url================");
  //  console.log(resultArray);
  jQuery("#sliderimg-" + elementid).hide();
  jQuery("#sliderclose-" + elementid).hide();
  jQuery("#allsliderimg").val(resultArray);
  sliderArrayUpdate = jQuery("#allsliderimg").val();
  // console.log("==========slider updated array================");
  // console.log(sliderArrayUpdate);
}

function map_img_edit(id) {
  var res = id.split("-");
  elementid = res[1];
  element_action = res[0];
  // console.log("elementid "+elementid);
  var url = jQuery("#maptmpimg-" + elementid).attr("src");
  // console.log(id+" url is "+url);
  //  console.log("==========All url================");
  var mapTmpArray = jQuery("#allmaptmpimg").val();
  var resArray = mapTmpArray.split(",");

  var resultArray = _.without(resArray, url);

  jQuery("#maptmpimg-" + elementid).hide();
  jQuery("#maptmpclose-" + elementid).hide();
  jQuery("#allmaptmpimg").val(resultArray);
}

function gallery_img_edit(id) {
  var res = id.split("-");
  elementid = res[1];
  element_action = res[0];
  // console.log("elementid "+elementid);
  var url = jQuery("#galleryimg-" + elementid).attr("src");
  // console.log(id+" url is "+url);
  // console.log("==========All url================");
  var galleryArray = jQuery("#allgalleryimg").val();
  var resArraygallery = galleryArray.split(",");
  // console.log(resArraygallery);
  var resultArraygallery = _.without(resArraygallery, url);
  // console.log("==========removing url================");
  //  console.log(url);
  //  console.log("==========removed url================");
  //  console.log(resultArraygallery);
  jQuery("#galleryimg-" + elementid).hide();
  jQuery("#galleryclose-" + elementid).hide();
  jQuery("#allgalleryimg").val(resultArraygallery);
  galleryArrayUpdate = jQuery("#allgalleryimg").val();
  // console.log("==========slider updated array================");
  // console.log(galleryArrayUpdate);
}

function uploadMap() {
  map_url = [];
  var images = wp
      .media({
        title: "Upload Images",
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        var uploadedImages = images.state().get("selection");

        // selectimg=uploadedImages.toJSON();
        // ;
        count = uploadedImages.toJSON().length;
        selectimage = uploadedImages.toJSON();
        if (count == 1) {
          result = selectimage[0].url;
        }
        map_url.push(result);
        jQuery("#trek_map").val("File Selected");
        jQuery("#trek_map").css("border", "2px solid green");
      });
}

function deleteGradeModal(act) {
  if (act == "season") {
    jQuery("#exampleModalSeason2").modal("show");
  } else if (act == "theme") {
    jQuery("#exampleModalTheme2").modal("show");
  } else {
    jQuery("#exampleModal2").modal("show");
  }
}

function deletePickupModal() {
  jQuery("#exampleModal3").modal("show");
}

function deleteGrade() {
  id = jQuery("#trek_grade_delete").val();
  if (id == "") {
    toastr.warning("Please select grade and continue!", "Wait!");
    // alert("Please select grade and continue!");
    return;
  }
  var data = new FormData();
  data.append("grade_id", id);
  data.append("action", "deleteGrade");

  swal({
    title: "Are you sure?",
    text: "Do you really want to delete this Grade?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
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
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully deleted!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    } else {
    }
  });
}

function deleteSeason() {
  id = jQuery("#trek_season_delete").val();
  if (id == "") {
    toastr.warning("Please select Season and continue!", "Wait!");
    // alert("Please select grade and continue!");
    return;
  }
  var data = new FormData();
  data.append("season_id", id);
  data.append("action", "deleteSeason");

  swal({
    title: "Are you sure?",
    text: "Do you really want to delete this Season?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
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
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully deleted!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    } else {
    }
  });
}

function deleteTheme() {
  id = jQuery("#trek_theme_delete").val();
  if (id == "") {
    toastr.warning("Please select Theme and continue!", "Wait!");
    // alert("Please select grade and continue!");
    return;
  }
  var data = new FormData();
  data.append("theme_id", id);
  data.append("action", "deleteTheme");

  swal({
    title: "Are you sure?",
    text: "Do you really want to delete this Theme?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
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
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully deleted!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    } else {
    }
  });
}

function deletePickupPlace() {
  id = jQuery("#trek_pickup_delete").val();
  if (id == "") {
    toastr.error("Please select a place and continue!", "Wait!");
    // alert("Please select a place and continue!");
    return;
  }

  var data = new FormData();
  data.append("pickup_id", id);
  data.append("action", "deletePickup");
  jQuery("#loader").css("display", "block");

  swal({
    title: "Are you sure?",
    text: "Do you really want to delete this Place?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      jQuery.ajax({
        type: "post",
        cache: false,
        contentType: false,
        processData: false,
        url: my_obj.ajax_url,
        data: data,
        success: function (msg) {
          jQuery("#loader").css("display", "none");
          json = JSON.parse(msg);

          if (json.statusCode == 200) {
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully deleted!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  });

  // var r = confirm("Do you really want to delete this Place?");
  // if (r == true) {
  //     jQuery.ajax({
  //         type: "post",
  //         cache: false,
  //         contentType: false,
  //         processData: false,
  //         url: my_obj.ajax_url,
  //         data: data,
  //         success: function (msg) {
  //             jQuery("#loader").css("display", "none");
  //             json = JSON.parse(msg);
  //
  //             if (json.statusCode == 200) {
  //
  //                 if (json.result == 'reload') {
  //                     location.reload();
  //                 }
  //             } else {
  //                 alert("Some error occured!");
  //             }
  //         }
  //     });
  // }
}

function viewCancelPolicyModal() {
  id = jQuery("#cancel_id_modal").val();
  if (id == "") {
    alert("Please choose a policy and click me!");
    return;
  } else {
    // alert("cli");
    var data = new FormData();
    data.append("policy_id", id);
    data.append("action", "getPolicyContent");
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
          if (json.result == "fetch") {
            jQuery("#exampleModalPolicyLabel").empty();
            jQuery("#exampleModalPolicyContent").empty();
            jQuery("#cancel_id_modal").val("");
            jQuery("#cancel_id_modal").val(json.id);
            jQuery("#cancel_icon").attr("disabled", false);

            jQuery("#exampleModalPolicyLabel").append(json.name);
            jQuery("#exampleModalPolicyContent").append(json.content);
            jQuery("#exampleModalPolicy").modal("show");
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

function enableOverview() {
  var r = confirm("Do you want to manually edit this field?");
  if (r == true) {
    editor4.setReadOnly(false);
  }
}

function autoGenerateOverview() {
  // $("#trek_overview").val('');
  content = "";
  region = "";
  duration = "";
  grade = "";
  altitude = "";
  km = "";
  region = $("#trek_country").val();
  duration = $("#trek_day").val();
  grade = $("#trek_grade").val();
  altitude = $("#trek_altitude").val();
  km = $("#trek_distance").val();
  content = "<p><strong>Region </strong>:- ";
  content += region ? region : "Nil";
  content += "<br /> <strong>Duration </strong>:-";
  content += duration ? duration + " days" : "Nil";
  content += "<br /> <strong>Grade</strong> :-";
  content += grade ? grade : "Nil";
  content += "<br /> <strong>Max Altitude</strong> :-";
  content += altitude ? altitude + " FT" : "Nil";
  content += "<br><strong>Approx Trekking Km</strong> :-";
  content += km ? km + " Km" : "Nil";

  content += "</p>";
  // console.log(content);
  CKEDITOR.instances["trek_overview"].setData(content);
}

function howReach(id) {
  if (id == "") {
    toastr.error("Some error occurred", "Oh no!");
    return;
  } else {
    var data = new FormData();
    data.append("placeId", id);
    data.append("action", "getHowReachContent");
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
          if (json.result == "fetch") {
            // alert(json.content);
            CKEDITOR.instances["trek_reach_air"].setData(json.content);
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

//Detailed itinerary

//get id and number of days

function itineraryEdit(id) {
  if (id != "") {
    $("#trek_itinerary_addbut").css("display", "none");
    $("#trek_itinerary_updatebut").css("display", "none");
    $("#trek_itinerary_section2").css("display", "none");
    CKEDITOR.instances.trek_itinerary_detailed.setData("");
    CKEDITOR.instances.trek_itinerary_brief.setData("");
    var res = id.split("-");
    elementid = res[0];
    element_action = res[1];
    element_days = res[2];
    jQuery("#trek_itinerary_totaldays").val("");
    $("#trek_itinerary_totaldays").val(element_days);
    data = "";
    data += ' <option value="">--Select Day--</option>';
    jQuery("#trek_itinerary_modal").empty();
    jQuery("#trek_itinerary_tr_id").val("");
    jQuery("#trek_itinerary_tr_id").val(elementid);
    for (i = 1; i <= element_days; i++) {
      data += "<option>" + i + "</option>";
    }
    jQuery("#trek_itinerary_modal").append(data);
    // alert("hello");
    // jQuery("#editModalItinerary").modal('show');
  } else {
    toastr.error("Some error occurred", "Oh no!");
  }
}

function itineraryPreview(id) {
  $("#itinerarybody").empty();
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid == "" || element_action == "") {
    toastr.error("Some error occurred", "Oh no!");
    return;
  } else {
    var data = new FormData();
    data.append("trek_id", elementid);
    data.append("action", "getAllTrekItineraryPreview");
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

        if (json.statusCode == 200) {
          jQuery("#loader").css("display", "none");
          if (json.result == "fetchh") {
            // alert(json.content);
            count = json.data.length;
            target = "";
            for (i = 0; i < count; i++) {
              brief = "";
              detail = "";
              brief = json.data[i].brief.replace(/&&/g, '"');
              detail = json.data[i].detailed.replace(/&&/g, '"');
              target += '<div class="card itinerarybox"><center><h4>Day ';
              target += json.data[i].itinerary_day;
              target += " - ";
              target += json.data[i].itinerary_head;
              target += "</h4></center><h4>Breif Itinerary</h4><p>";
              target += brief;
              target += "</p><h4>Detailed Itinerary</h4><p>";
              target += detail;
              target += "</p></div>";
            }
            $("#itinerarybody").empty();
            $("#itinerarybody").append(target);
            jQuery("#loader").css("display", "none");
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

function upload(file) {
  // var dir =WP_PLUGIN_DIR .<?= plugin_dir_url(__FILE__) ?>fileUpload/upload.php
  var files = file.files[0];
  var form = new FormData();
  form.append("upload-image", files);
  $("#uploaderr").text("");
  $("#uploadSucess").text("");
  $("#uploadSucess").text("File Uploading.. please wait.");
  $.ajax({
    type: "POST",
    url: my_obj_up.ajax_upload,
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      var temp = JSON.parse(data);

      if (temp.result == "success") {
        var url = "/" + temp.message;
        $("#uploadurl").val(url);
        $("#uploadSucess").text("File Selected.");
        //uploadurl,uploaderr
      } else {
        $("#uploaderr").text("There is some issues with this file.");
        $("#uploadSucess").text("");
        //failed
      }
    },
  });
}

function addfitness() {
  $("#uploadSucess").text("");
  $("#uploaderr").text("");
  var url = $("#uploadurl").val();
  var name = $("#fit-name").val();

  if (url == "" || name == "") {
    $("#uploaderr").text("Both fields required.");
  } else {
    var data = new FormData();
    data.append("fit_upload_url", url);
    data.append("fit_name", name);
    data.append("action", "addFitness");
    $("#uploaderr").text("");

    $.ajax({
      type: "POST",
      url: my_obj.ajax_url,
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        var temp = JSON.parse(data);
        if (temp.message == "success") {
          window.location.reload();
        } else {
          $("#uploaderr").text("Add failed.");
        }
      },
    });
  }
}

function loadSection2() {
  trek_id = jQuery("#trek_itinerary_tr_id").val();
  itinerary_day = jQuery("#trek_itinerary_modal").val();
  if (itinerary_day == "") {
    $("#trek_itinerary_addbut").css("display", "none");
    $("#trek_itinerary_updatebut").css("display", "none");
    $("#trek_itinerary_section2").css("display", "none");
    return;
  }
  if (trek_id == "" || itinerary_day == "") {
    toastr.error("Some error occurred", "Oh no!");
  } else {
    $("#trek_itinerary_addbut").css("display", "none");
    $("#trek_itinerary_updatebut").css("display", "none");
    $("#trek_itinerary_section2").css("display", "none");
    jQuery("#loader").css("display", "block");
    var data = new FormData();
    data.append("trek_id", trek_id);
    data.append("itinerary_day", itinerary_day);
    data.append("action", "getTrekItinerary");
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
          jQuery("#loader").css("display", "none");
          if (json.result == "fetchh") {
            // alert(json.content);
            // console.log("fetch");
            // console.log(json);
            var brief = json.brief.replace(/&&/g, '"');
            var detail = json.detailed.replace(/&&/g, '"');
            CKEDITOR.instances.trek_itinerary_detailed.setData(detail);
            CKEDITOR.instances.trek_itinerary_brief.setData(brief);
            jQuery("#trek_itinerary_head").val(json.head);
            jQuery("#trek_itinerary_addbut").css("display", "none");
            jQuery("#trek_itinerary_updatebut").css("display", "block");
            jQuery("#trek_itinerary_section2").css("display", "block");
          } else if (json.result == "empty") {
            // console.log("empty");
            // console.log(json);
            jQuery("#trek_itinerary_head").val("");
            CKEDITOR.instances.trek_itinerary_detailed.setData("");
            CKEDITOR.instances.trek_itinerary_brief.setData("");
            jQuery("#trek_itinerary_tr_id").val("");
            jQuery("#trek_itinerary_modal").val("");
            if (json.trek_id != "" || json.itinerary_day != "") {
              jQuery("#trek_itinerary_tr_id").val(json.trek_id);
              jQuery("#trek_itinerary_modal").val(json.itinerary_day);
            } else {
              toastr.error("Some error occurred", "Oh no!");
            }

            jQuery("#trek_itinerary_addbut").css("display", "block");
            jQuery("#trek_itinerary_updatebut").css("display", "none");
            jQuery("#trek_itinerary_section2").css("display", "block");
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

function additinerary() {
  total_days = $("#trek_itinerary_totaldays").val();
  trek_id = jQuery("#trek_itinerary_tr_id").val();
  itinerary_day = jQuery("#trek_itinerary_modal").val();
  itinerary_head = jQuery("#trek_itinerary_head").val();
  trek_itinerary_brief = CKEDITOR.instances.trek_itinerary_brief.getData();
  trek_itinerary_brief = trek_itinerary_brief.replace(/"/g, "&&");
  trek_itinerary_detailed =
      CKEDITOR.instances.trek_itinerary_detailed.getData();
  trek_itinerary_detailed = trek_itinerary_detailed.replace(/"/g, "&&");
  // alert(itinerary_day);
  if (
      trek_id == "" ||
      itinerary_day == "" ||
      trek_itinerary_brief == "" ||
      trek_itinerary_detailed == ""
  ) {
    // alert("All fields required!");
    toastr.warning("All fields required!", "wait!");
    return;
  } else {
    jQuery("#loader").css("display", "block");
    var data = new FormData();
    data.append("trek_id", trek_id);
    data.append("total_days", total_days);
    data.append("itinerary_day", itinerary_day);
    data.append("trek_itinerary_brief", trek_itinerary_brief);
    data.append("itinerary_head", itinerary_head);
    data.append("trek_itinerary_detailed", trek_itinerary_detailed);
    data.append("action", "addTrekItineraryDay");
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
          jQuery("#loader").css("display", "none");
          if (json.result == "inserted") {
            // alert(json.content);
            // console.log("inserted");
            // console.log(json);
            CKEDITOR.instances.trek_itinerary_detailed.setData("");
            CKEDITOR.instances.trek_itinerary_brief.setData("");
            jQuery("#trek_itinerary_modal").val("");
            $("#trek_itinerary_addbut").css("display", "none");
            $("#trek_itinerary_updatebut").css("display", "none");
            $("#trek_itinerary_section2").css("display", "none");
          } else if (json.result == "completed") {
            swal({
              title: "Saved!",
              text: "The data is saved!",
              icon: "success",
              timer: 2000,
              buttons: false,
            }).then(() => {
              location.reload();
            });
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

function updateitinerary() {
  trek_id = jQuery("#trek_itinerary_tr_id").val();
  itinerary_day = jQuery("#trek_itinerary_modal").val();
  trek_itinerary_brief = CKEDITOR.instances.trek_itinerary_brief.getData();
  trek_itinerary_brief = trek_itinerary_brief.replace(/"/g, "&&");
  trek_itinerary_detailed =
      CKEDITOR.instances.trek_itinerary_detailed.getData();
  trek_itinerary_detailed = trek_itinerary_detailed.replace(/"/g, "&&");
  trek_itinerary_head = jQuery("#trek_itinerary_head").val();
  // alert(itinerary_day);
  if (
      trek_id == "" ||
      itinerary_day == "" ||
      trek_itinerary_brief == "" ||
      trek_itinerary_detailed == "" ||
      trek_itinerary_head == ""
  ) {
    // alert("All fields required!");
    toastr.warning("All fields required!", "Wait!");
    return;
  } else {
    jQuery("#loader").css("display", "block");
    var data = new FormData();
    data.append("trek_id", trek_id);
    data.append("itinerary_day", itinerary_day);
    data.append("trek_itinerary_brief", trek_itinerary_brief);
    data.append("trek_itinerary_detailed", trek_itinerary_detailed);
    data.append("trek_itinerary_head", trek_itinerary_head);
    data.append("action", "updateTrekItineraryDay");
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
          jQuery("#loader").css("display", "none");
          if (json.result == "updated") {
            // alert(json.content);
            // console.log("updated");
            // console.log(json);
            CKEDITOR.instances.trek_itinerary_detailed.setData("");
            CKEDITOR.instances.trek_itinerary_brief.setData("");
            jQuery("#trek_itinerary_modal").val("");
            $("#trek_itinerary_addbut").css("display", "none");
            $("#trek_itinerary_updatebut").css("display", "none");
            $("#trek_itinerary_section2").css("display", "none");
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

function itineraryDelete(id) {
  if (id != "") {
    var res = id.split("-");
    elementid = res[0];
    element_action = res[1];
    if (elementid != "" && element_action != "") {
      if (element_action == "itineraryDelete") {
        //action
        data = new FormData();
        data.append("trek_itinerary_trek_id", elementid);
        data.append("action", "itineraryDelete");

        swal({
          title: "Are you sure?",
          text: "Do you really want to clear all itinerary?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            jQuery("#loader").css("display", "block");

            jQuery.ajax({
              type: "post",
              cache: false,
              contentType: false,
              processData: false,
              url: my_obj.ajax_url,
              data: data,
              success: function (msg) {
                jQuery("#loader").css("display", "none");
                json = JSON.parse(msg);

                if (json.statusCode == 200) {
                  if (json.result == "reload") {
                    swal({
                      title: "Done!",
                      text: "Successfully cleared!",
                      icon: "success",
                      timer: 2000,
                      buttons: false,
                    }).then(() => {
                      location.reload();
                    });
                  }
                } else {
                  toastr.error("Some error occurred", "Oh no!");
                }
              },
            });
          } else {
          }
        });

        // var r = confirm("Do you really want to clear all itinerary?");
        // if (r == true) {
        //     jQuery("#loader").css("display", "block");
        //
        //     jQuery.ajax({
        //         type: "post",
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         url: my_obj.ajax_url,
        //         data: data,
        //         success: function (msg) {
        //
        //             jQuery("#loader").css("display", "none");
        //             json = JSON.parse(msg);
        //
        //             if (json.statusCode == 200) {
        //
        //                 if (json.result == 'reload') {
        //                     location.reload();
        //                 }
        //             } else {
        //                 toastr.error('Some error occurred', 'Oh no!');
        //             }
        //         }
        //     });
        // }
      } else {
        toastr.error("something went wrong!", "Oh no!");
      }
    } else {
      toastr.error("something went wrong!", "Oh no!");
    }
  }
}

// end of itinerary

// start risk and respond

function addmenuRR() {
  $("#uploadSucess").text("");
  $("#uploaderr").text("");
  var url = $("#uploadurl").val();
  var name = $("#rr-name").val();

  if (url == "" || name == "") {
    $("#uploaderr").text("Both fields required.");
  } else {
    var data = new FormData();
    data.append("trek_rr_content", url);
    data.append("trek_rr_name", name);
    data.append("action", "addNewRrTemplate");
    $("#uploaderr").text("");

    $.ajax({
      type: "POST",
      url: my_obj.ajax_url,
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        var temp = JSON.parse(data);
        if (temp.message == "success") {
          window.location.reload();
        } else {
          $("#uploaderr").text("Add failed.");
        }
      },
    });
  }
}

function addmenuBrochure() {
  $("#uploadSucess").text("");
  $("#uploaderr").text("");
  var url = $("#uploadurl").val();
  var name = $("#rr-name").val();

  if (url == "" || name == "") {
    $("#uploaderr").text("All fields Required.");
  } else {
    var data = new FormData();
    data.append("trek_br_content", url);
    data.append("trek_br_name", name);
    data.append("action", "addNewBrTemplate");
    $("#uploaderr").text("");

    $.ajax({
      type: "POST",
      url: my_obj.ajax_url,
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        var temp = JSON.parse(data);
        if (temp.message == "success") {
          window.location.reload();
        } else {
          $("#uploaderr").text("Add failed.");
        }
      },
    });
  }
}

function menuRiskDelete(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "RRDelete") {
      data = new FormData();
      data.append("trek_rr_id", elementid);
      data.append("action", "deleteRRTemplate");

      swal({
        title: "Are you sure?",
        text: "Do you really want to delete this Template!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          jQuery("#loader").css("display", "block");

          jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
              jQuery("#loader").css("display", "none");
              json = JSON.parse(msg);

              if (json.statusCode == 200) {
                if (json.result == "reload") {
                  swal({
                    title: "Done!",
                    text: "Successfully deleted!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      });
    }
  }
}

function manageBrochure(id, action) {
  if (action == "activate" || action == "delete") {
    let act = "";
    if (action == "activate") {
      act = "activateBRTemplate";
    } else if (action == "delete") {
      act = "deleteBRTemplate";
    }

    var res = id.split("-");
    elementid = res[0];
    element_action = res[1];
    if (elementid != "" && element_action != "") {
      if (element_action == "BBDelete") {
        data = new FormData();
        data.append("trek_br_id", elementid);
        data.append("action", act);

        swal({
          title: "Are you sure!",
          text: "Do you really want to perform this action?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            jQuery("#loader").css("display", "block");

            jQuery.ajax({
              type: "post",
              cache: false,
              contentType: false,
              processData: false,
              url: my_obj.ajax_url,
              data: data,
              success: function (msg) {
                jQuery("#loader").css("display", "none");
                json = JSON.parse(msg);

                if (json.statusCode == 200) {
                  if (json.result == "reload") {
                    swal({
                      title: "Done!",
                      text: "Request Completed!",
                      icon: "success",
                      timer: 2000,
                      buttons: false,
                    }).then(() => {
                      location.reload();
                    });
                  }
                } else {
                  toastr.error("Some error occurred", "Oh no!");
                }
              },
            });
          }
        });
      }
    }
  } else {
    toastr.error("Some error occurred", "Oh no!");
  }
}

function manageBrochureWarning(id) {
  var res = id.split("-");
    elementid = res[0];
    swal({
        title: "Are you sure?",
        text: "Do you really want to delete this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {

            data = new FormData();
            data.append("id", elementid);
            data.append("action", "deleteBrochure");


            jQuery.ajax({
                type: "post",
                cache: false,
                contentType: false,
                processData: false,
                url: my_obj.ajax_url,
                data: data,
                success: function (msg) {
                    jQuery("#loader").css("display", "none");
                    json = JSON.parse(msg);
                    console.log(json);

                    if (json.statusCode == 200) {

                        swal({
                            title: "Deleted!",
                            text: "The data is deleted!",
                            icon: "success",
                            timer: 2000,
                            buttons: false,
                        }).then(() => {
                            location.reload();
                        });

                    } else {
                        toastr.error("Some error occurred", "Oh no!");
                    }
                },
            });


        }
    });
}

// add pickup js start
function addPickup() {
  pickName = $("#pickup_name").val();
  pickReach_air = CKEDITOR.instances.pickup_reach_air.getData();
  pickReach_bus = CKEDITOR.instances.pickup_reach_bus.getData();
  pickReach_train = CKEDITOR.instances.pickup_reach_train.getData();
  pickstate = $("#pickup_state").val();

  if (pickName != "" && pickstate != "") {
    data = new FormData();
    data.append("trek_pickup_name", pickName);
    data.append("trek_pickup_state", pickstate);
    data.append("trek_pickup_reach_air", pickReach_air);
    data.append("trek_pickup_reach_bus", pickReach_bus);
    data.append("trek_pickup_reach_train", pickReach_train);
    data.append("action", "addNewPickup");

    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "reload") {
            swal({
              title: "Saved!",
              text: "The data is saved!",
              icon: "success",
              timer: 2000,
              buttons: false,
            }).then(() => {
              location.reload();
            });
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.warning("All values required", "Wait");
    // alert("All values required");
  }
}

//add pickup end

//delete pickup start

function pickDelete(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "pickDelete") {
      data = new FormData();
      data.append("trek_pick_id", elementid);
      data.append("action", "pickDelete");

      swal({
        title: "Are you sure?",
        text: "Do you really want to delete this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          jQuery("#loader").css("display", "block");
          jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
              jQuery("#loader").css("display", "none");
              json = JSON.parse(msg);
              if (json.statusCode == 200) {
                if (json.result == "reload") {
                  swal({
                    title: "Done!",
                    text: "Successfully deleted!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      });

      // var r = confirm("Do you really want to delete this item!");
      // if (r == true) {
      //     jQuery("#loader").css("display", "block");
      //
      //     jQuery.ajax({
      //         type: "post",
      //         cache: false,
      //         contentType: false,
      //         processData: false,
      //         url: my_obj.ajax_url,
      //         data: data,
      //         success: function (msg) {
      //             jQuery("#loader").css("display", "none");
      //             json = JSON.parse(msg);
      //             if (json.statusCode == 200) {
      //
      //                 if (json.result == 'reload') {
      //                     location.reload();
      //                 }
      //             } else {
      //                 alert("Some error occured!")
      //
      //             }
      //         }
      //     });
      // }
    }
  }
}

//delete pickup end

//update trek start

function pickEdit(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  if (elementid != "" && element_action != "") {
    if (element_action == "pickEdit") {
      data = new FormData();
      data.append("trek_pick_id", elementid);
      data.append("action", "getTrek");
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

          if (json.statusCode == 200) {
            // console.log(json);
            if (json.output != "" && json.outputIt != "") {
              // location.reload();

              jQuery("#pickup_name1").val(json.outputPlace);
              jQuery("#pickup_state1").val(json.outputState);
              jQuery("#flag-name-id").val(json.outputId);
              CKEDITOR.instances.pickup_reach_air1.setData(json.outputHowAir);
              CKEDITOR.instances.pickup_reach_bus1.setData(json.outputHowBus);
              CKEDITOR.instances.pickup_reach_train1.setData(
                  json.outputHowTrain
              );

              jQuery("#loader").css("display", "none");
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  }
}

//update trek end
//update trek modal
function updatePickup() {
  var flagName = "";
  var flagId = "";
  pickplace = jQuery("#pickup_name1").val();
  pickId = jQuery("#flag-name-id").val();
  pickstate = jQuery("#pickup_state1").val();
  pickReach_air = CKEDITOR.instances.pickup_reach_air1.getData();
  pickReach_bus = CKEDITOR.instances.pickup_reach_bus1.getData();
  pickReach_train = CKEDITOR.instances.pickup_reach_train1.getData();
  //  if (
  //   pickplace == "" ||
  //   pickId == "" ||
  //   pickstate == "" ||
  //   pickReach_air == "" ||
  //   pickReach_bus == "" ||
  //   pickReach_train == ""
  // )

  if (
      pickplace == "" ||
      pickId == "" ||
      pickstate == ""

  ) {
    // alert("Something wrong!");
    toastr.error("Something wrong", "Oh no!");
    return;
  }
  data = new FormData();
  data.append("trek_pick_place", pickplace);
  data.append("trek_pick_id", pickId);
  data.append("trek_pick_state", pickstate);
  data.append("trek_pick_reach_air", pickReach_air);
  data.append("trek_pick_reach_bus", pickReach_bus);
  data.append("trek_pick_reach_train", pickReach_train);
  data.append("action", "updatePick");
  jQuery("#loader").css("display", "block");

  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      jQuery("#loader").css("display", "none");
      json = JSON.parse(msg);

      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal({
            title: "Updated!",
            text: "The data is updated!",
            icon: "success",
            timer: 2000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

//update trek modal end

//drop down state function start

//drop dwon state function enf
function updateAutomaticallyReachSection(id) {
  if (id == "") {
    toastr.error("Something wrong", "Oh no!");
    return;
  }
  data = new FormData();
  data.append("trek_pick_id", id);
  data.append("action", "getTrek");
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

      if (json.statusCode == 200) {
        // console.log(json);
        if (json.outputHow != "") {
          // location.reload();
          let target = "";
          target += json.outputHowAir;
          target += json.outputHowBus;
          target += json.outputHowTrain;

          // CKEDITOR.instances.trek_reach.setData('');
          // alert(json.outputHow);
          CKEDITOR.instances.trek_reach_air.setData(target);
          // CKEDITOR.instances.trek_reach_bus.setData(datares_train);
          // CKEDITOR.instances.trek_reach_train.setData(datares_bus);

          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}
function updateAutomaticallyDropSection(id) {
  if (id == "") {
    toastr.error("Something wrong", "Oh no!");
    return;
  }
  data = new FormData();
  data.append("trek_pick_id", id);
  data.append("action", "getTrek");
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

      if (json.statusCode == 200) {
        // console.log(json);
        if (json.outputHow != "") {
          // location.reload();
          let target = "";
          target += json.outputHowAir;
          target += json.outputHowBus;
          target += json.outputHowTrain;

          // CKEDITOR.instances.trek_reach.setData('');
          // alert(json.outputHow);
          // CKEDITOR.instances.trek_reach_air.setData(target);
          CKEDITOR.instances.trek_reach_bus.setData(target);
          // CKEDITOR.instances.trek_reach_train.setData(datares_bus);

          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}
function updateAutomaticallyPolicySection(id) {
  if (id == "") {
    toastr.error("Something wrong", "Oh no!");
    return;
  }
  jQuery("#loader").css("display", "block");
  var data = new FormData();
  data.append("policy_id", id);
  data.append("action", "getPolicyContent");
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
        if (json.result == "fetch") {
          // console.log(json);
          cancellation = json.content;
          // CKEDITOR.instances.trek_reach.setData('');
          // alert(json.outputHow);
          CKEDITOR.instances.trek_cost_terms_cancellation.setData(cancellation);
          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}
//Booking

function calculateEndDate(action) {
  if (action == "add") {
    sdate = jQuery("#departure-start-date").val();
    days = parseInt(jQuery("#departure-duration").val());
    filteredDay = days - 1;
    var date = new Date(sdate);

    date.setDate(date.getDate() + +filteredDay);

    var dd = date.getDate();
    var mm = date.getMonth() + 1;
    var y = date.getFullYear();
    if (dd < 10) {
      dd = "0" + dd;
    }
    if (mm < 10) {
      mm = "0" + mm;
    }
    var someFormattedDate = y + "-" + mm + "-" + dd;
    $("#departure-end-date").val(someFormattedDate);
  } else {
    sdate = jQuery("#departure-start-date-edit").val();
    days = parseInt(jQuery("#departure-duration-edit").val());

    var date = new Date(sdate);

    date.setDate(date.getDate() + +days);

    var dd = date.getDate();
    var mm = date.getMonth() + 1;
    var y = date.getFullYear();
    if (dd < 10) {
      dd = "0" + dd;
    }
    if (mm < 10) {
      mm = "0" + mm;
    }
    var someFormattedDate = y + "-" + mm + "-" + dd;

    $("#departure-end-date-edit").val(someFormattedDate);
  }
}

function clearAddDeparture() {
  jQuery("#departure-start-date").val("");
  jQuery("#departure-end-date").val("");
  jQuery("#departure-Total-seats").val("");
  jQuery("#departure-select-section").val("B1");
}

function addBookingDeparture(id) {
  if (id == "") {
    // alert("Something went wrong!");
    toastr.error("Something wrong", "Oh no!");
    return;
  }
  start_date = jQuery("#departure-start-date").val();
  end_date = jQuery("#departure-end-date").val();
  seats = jQuery("#departure-Total-seats").val();
  section = jQuery("#departure-select-section").val();
  event = jQuery("#trek_event").val();
  eventText = $("#trek_event option:selected").text();

  if (start_date == "" || end_date == "" || seats == "" || section == "") {
    // alert("All fields required!");
    toastr.error("All fields required", "Oh no!");
    return;
  }
  var data = new FormData();
  data.append("trek_id", id);
  data.append("start_date", start_date);
  data.append("end_date", end_date);
  data.append("seats", seats);
  data.append("sections", section);
  data.append("eventId", event);
  data.append("eventText", eventText);
  data.append("action", "addDepartureDate");
  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      json = JSON.parse(msg);
      // console.log(json);
      if (json.statusCode == 200) {
        if (json.result == "inserted") {
          swal({
            title: "Saved!",
            text: "The data is saved!",
            icon: "success",
            timer: 2000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        } else if (json.result == "batch_exist") {
          toastr.error("Batch duplication", "Oh no!");
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function deleteDeparture(id) {
  if (id == "") {
    toastr.error("Something wrong", "Oh no!");
    return;
  } else {
    var res = id.split("-");
    elementid = res[0];
    element_action = res[1];
    if (elementid == "" || element_action == "") {
      toastr.error("Some error occurred", "Oh no!");
    }
    if (element_action == "delete") {
      //action
      var data = new FormData();
      data.append("departureId", elementid);
      data.append("action", "deleteDeparture");

      swal({
        title: "Are you sure?",
        text: "Do you really want to delete this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
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
                if (json.result == "reload") {
                  swal({
                    title: "Done!",
                    text: "Successfully deleted!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      });
    }
  }
}

function editDeparture(id) {
  if (id == "") {
    toastr.error("Some error occurred", "Oh no!");
    return;
  } else {
    var res = id.split("-");
    elementid = res[0];
    element_action = res[1];

    if (elementid != "" && element_action != "") {
      jQuery("#" + elementid + "-cardTrek").css("background", "");
      jQuery("#departure-ids-edit").val("");
      jQuery("#departure-start-date-edit").val("");
      jQuery("#departure-end-date-edit").val("");
      jQuery("#departure-Total-seats-edit").val("");
      jQuery("#departure-select-section-edit").val("");
      document.querySelector('#departure-show').checked = false
      var data = new FormData();
      data.append("departureId", elementid);
      data.append("action", "getDepartureContent");

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

          if (json.statusCode == 200) {
            if (json.result == "fetch") {
            console.log(json)
              jQuery("#departure-ids-edit").val(json.val);
              jQuery("#departure-start-date-edit").val(json.start);
              jQuery("#departure-end-date-edit").val(json.end);
              jQuery("#departure-Total-seats-edit").val(json.seats);
              jQuery("#trek_event_edit").val(json.eventId);
              jQuery("#departure-select-section-edit").val(json.section);
              json.show == 2 ? document.querySelector('#departure-show').checked = true : null;
              jQuery("#loader").css("display", "none");
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  }
}

function updateBookingDeparture() {
  departureId = jQuery("#departure-ids-edit").val();
  sdate = jQuery("#departure-start-date-edit").val();
  edate = jQuery("#departure-end-date-edit").val();
  seats = jQuery("#departure-Total-seats-edit").val();
  section = jQuery("#departure-select-section-edit").val();
  eventId = jQuery("#trek_event_edit").val();
  eventText = $("#trek_event_edit option:selected").text();
  show = document.querySelector("#departure-show").checked;

  if (
      departureId != "" &&
      sdate != "" &&
      edate != "" &&
      seats != "" &&
      section != ""
  ) {
    var data = new FormData();
    data.append("departureId", departureId);
    data.append("sdate", sdate);
    data.append("edate", edate);
    data.append("seats", seats);
    data.append("eventId", eventId);
    data.append("eventText", eventText);
    data.append("section", section);
    data.append("action", "updateDepartureContent");
    data.append("show", show);

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

        if (json.statusCode == 200) {
          jQuery("#loader").css("display", "none");
          if (json.result == "updated") {
            st = window.location.href;

            var url = new URL(st);
            var c = url.searchParams.get("dep");
            jQuery("#loader").css("display", "none");
            if (c != null) {
              location.replace("admin.php?page=trek_manage_booking");
            } else {
              location.reload();
            }
          } else if (json.result == "batch_exist") {
            toastr.error("Batch duplication error", "Oh no!");
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

function choosedep() {
  jQuery("#loader").css("display", "block");
  val = jQuery("#trek_choose_dep").val();
  trek = jQuery("#ppcdat").val();
  if (val == "") {
    data =
        '<tr><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>';
    jQuery("#trek_user_details").empty();
    jQuery("#trek_user_details").append(data);
    jQuery("#loader").css("display", "none");
    return;
  } else {
    jQuery.ajax({
      url: my_obj.ajax_url,
      type: "POST",
      data: {
        action: "getTrekkersDeparture",
        trekId: trek,
        dateId: val,
      },
      cache: false,
      success: function (data) {
        json = JSON.parse(data);
        if (json.statusCode == 200) {
          if (json.result == "Fetch") {
            jQuery("#trek_user_details").empty();
            jQuery("#trek_user_details").append(json.data);
            jQuery("#loader").css("display", "none");
          } else if (json.result == "not exist") {
            jQuery("#trek_user_details").empty();
            jQuery("#trek_user_details").append(json.data);
            jQuery("#loader").css("display", "none");
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  }
}

function ownerDetails(id) {
  if (id == "") {
    toastr.error("Some error occurred", "Oh no!");
    jQuery("#ownerDetailsBooking").empty();

    return;
  }

  jQuery("#loader").css("display", "block");
  jQuery.ajax({
    url: my_obj.ajax_url,
    type: "POST",
    data: {
      action: "getOwnerDetailsBooking",
      ownerId: id,
    },
    cache: false,
    success: function (data) {
      json = JSON.parse(data);
      if (json.statusCode == 200) {
        if (json.result == "Fetch") {
          jQuery("#ownerDetailsBooking").empty();
          jQuery("#ownerDetailsBooking").append(json.data);
          jQuery("#loader").css("display", "none");
        } else if (json.result == "not exist") {
          jQuery("#ownerDetailsBooking").empty();
          jQuery("#ownerDetailsBooking").append(json.data);
          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function trekkersrDetails(id) {
  if (id == "") {
    jQuery("#trekkersDetailsBooking").empty();
    jQuery("#trekkersDetailsBooking").append(
        '<tr><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>'
    );
    // alert("Something went wrong!");
    toastr.error("Something went wrong!", "Oh no!");
    return;
  }
  jQuery("#loader").css("display", "block");
  jQuery.ajax({
    url: my_obj.ajax_url,
    type: "POST",
    data: {
      action: "getTrekkersDetailsBooking",
      bookingId: id,
    },
    cache: false,
    success: function (data) {
      json = JSON.parse(data);
      if (json.statusCode == 200) {
        if (json.result == "Fetch") {
          jQuery("#trekkersDetailsBooking").empty();
          jQuery("#trekkersDetailsBooking").append(json.data);
          jQuery("#loader").css("display", "none");
        } else if (json.result == "not exist") {
          jQuery("#trekkersDetailsBooking").empty();
          jQuery("#trekkersDetailsBooking").append(json.data);
          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Something wrong", "Oh no!");
      }
    },
  });
}

//participation

//start fit

function addFit() {
  PartName = $("#fit-name").val();
  trek_partic_data = CKEDITOR.instances.trek_fit_add.getData();
  trek_partic_data = trek_partic_data.replace(/"/g, "&&");
  // alert(PartName);
  // alert(trek_partic_data);
  if (PartName !== "") {
    data = new FormData();
    data.append("trek_fit_name", PartName);
    data.append("trek_fit_data", trek_partic_data);
    data.append("action", "addnewFit");
    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "reload") {
            swal({
              title: "Saved!",
              text: "The data is saved!",
              icon: "success",
              timer: 2000,
              buttons: false,
            }).then(() => {
              location.reload();
            });
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.error("Participation name should not be empty", "Wait!");
    //alert("Participation name should not be empty");
  }
}

function addEss(fun) {
  var essential = "";
  if (fun == "foot") {
    var size = jQuery("#tbl_posts5 tr").length - 1;

    var target = "";
    for (var i = 1; i <= size; i++) {
      var name = $("#name_fg-" + i).val();
      var value = $("#val_fg-" + i).val();
      target += "<tr>";
      target += "<td>";
      target += name;
      target += "</td>";
      target += "<td>";
      target += value;
      target += "</td>";
      target += "</tr>";

      console.log("Name is " + name + " value is " + value);
      // console.log('#name_fg-'+i);
    }
    var idData = jQuery("#modalData5").val();
    // alert(size);
  } else if (fun == "head") {
    var size = jQuery("#tbl_posts4 tr").length - 1;

    var target = "";
    for (var i = 1; i <= size; i++) {
      var name = $("#name_hg-" + i).val();
      var value = $("#val_hg-" + i).val();
      target += "<tr>";
      target += "<td>";
      target += name;
      target += "</td>";
      target += "<td>";
      target += value;
      target += "</td>";
      target += "</tr>";

      console.log("Name is " + name + " value is " + value);
      // console.log('#name_fg-'+i);
    }

    var idData = jQuery("#modalData4").val();
  } else if (fun == "util") {
    var size = jQuery("#tbl_posts3 tr").length - 1;

    var target = "";
    for (var i = 1; i <= size; i++) {
      var name = $("#name_pu-" + i).val();
      var value = $("#val_pu-" + i).val();
      target += "<tr>";
      target += "<td>";
      target += name;
      target += "</td>";
      target += "<td>";
      target += value;
      target += "</td>";
      target += "</tr>";

      console.log("Name is " + name + " value is " + value);
      // console.log('#name_fg-'+i);
    }
    var idData = jQuery("#modalData3").val();
  } else if (fun == "cloths") {
    var size = jQuery("#tbl_posts2 tr").length - 1;
    var target = "";
    for (var i = 1; i <= size; i++) {
      var name = $("#name_clth-" + i).val();
      var value = $("#val_clth-" + i).val();
      target += "<tr>";
      target += "<td>";
      target += name;
      target += "</td>";
      target += "<td>";
      target += value;
      target += "</td>";
      target += "</tr>";

      console.log("Name is " + name + " value is " + value);
      // console.log('#name_fg-'+i);
    }
    var idData = jQuery("#modalData2").val();
  } else if (fun == "bgear") {
    var size = jQuery("#tbl_posts1 tr").length - 1;
    var target = "";
    for (var i = 1; i <= size; i++) {
      var name = $("#name_bg-" + i).val();
      var value = $("#val_bg-" + i).val();
      target += "<tr>";
      target += "<td>";
      target += name;
      target += "</td>";
      target += "<td>";
      target += value;
      target += "</td>";
      target += "</tr>";

      console.log("Name is " + name + " value is " + value);
      // console.log('#name_fg-'+i);
    }
    var idData = jQuery("#modalData1").val();
  } else if (fun == "default") {
    essential = jQuery("#ess-name").val();
     if(essential==="")
        {
            toastr.error("Title cannot be empty", "Oh no!");
            return;
        }
  } else if (fun == "basic-edit") {
    var idData = jQuery("#modalDataEdit1").val();
    var target = jQuery("#edit-basic-gear").val();
    var fun = "bgear";
  } else if (fun == "head-edit") {
    var idData = jQuery("#modalDataEdit4").val();
    var target = jQuery("#edit-head-gear").val();
    var fun = "head";
  } else if (fun == "cloth-edit") {
    var idData = jQuery("#modalDataEdit2").val();
    var target = jQuery("#edit-cloth-gear").val();
    var fun = "cloths";
  } else if (fun == "personal-edit") {
    var idData = jQuery("#modalDataEdit3").val();
    var target = jQuery("#edit-utility-gear").val();
    var fun = "util";
  } else if (fun == "foot-edit") {
    var idData = jQuery("#modalDataEdit5").val();
    var target = jQuery("#edit-foot-gear").val();
    var fun = "foot";
  }

  data = new FormData();

  if (essential != "") {
    data.append("trek_ess_data", essential);
    data.append("actionData", fun);
    data.append("action", "addnewEss");
  } else {
    data.append("trek_ess_id", idData);
    data.append("trek_ess_data", target);
    data.append("actionData", fun);
    data.append("action", "addnewEss");
  }

  if (fun != null) {
    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "reload") {
            swal({
              title: "Saved!",
              text: "The data is saved!",
              icon: "success",
              timer: 2000,
              buttons: false,
            }).then(() => {
              location.reload();
            });
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.error("Participation name should not be empty", "Wait!");
    //alert("Participation name should not be empty");
  }
}

function FitEdit(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  data = new FormData();
  data.append("elementid", elementid);
  data.append("action", "getFitness");
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

      if (json.statusCode == 200) {
        if (json.output != "" && json.outputIt != "") {
          // location.reload();
          var data = json.data_desc;
          data = data.replace(/&&/g, '"');
          jQuery("#fit-name-edit").val(json.name);
          CKEDITOR.instances.trek_fit_edit.setData("" + data + "");
          jQuery("#flag-name-id").val(json.outputId);
          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function EssEdit(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  data = new FormData();
  data.append("requested", elementid);
  data.append("elementId", element_action);
  data.append("action", "getEssetials");
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

      if (json.statusCode == 200) {
        if (json.output != "" && json.outputIt != "") {
          // location.reload();
          var data = json.target;
          var ids = json.output;
          var type = json.type;

          if (type == "foot") {
            jQuery("#edit-foot-gear").val(json.target);
            jQuery("#modalDataEdit5").val(json.output);
            jQuery("#foot-edit-table-body").html(json.target);
          } else if (type == "head") {
            jQuery("#edit-head-gear").val(json.target);
            jQuery("#modalDataEdit4").val(json.output);
            jQuery("#head-edit-table-body").html(json.target);
          } else if (type == "util") {
            jQuery("#edit-utility-gear").val(json.target);
            jQuery("#modalDataEdit3").val(json.output);
            jQuery("#utility-edit-table-body").html(json.target);
          } else if (type == "cloths") {
            jQuery("#edit-cloth-gear").val(json.target);
            jQuery("#modalDataEdit2").val(json.output);
            jQuery("#cloth-edit-table-body").html(json.target);
          } else if (type == "bgear") {
            jQuery("#edit-basic-gear").val(json.target);
            jQuery("#modalDataEdit1").val(json.output);
            jQuery("#basic-edit-table-body").html(json.target);
          }

          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function updatefit() {
  var partName = "";
  var partId = "";
  var partData = "";
  partName = jQuery("#fit-name-edit").val();

  partData = CKEDITOR.instances.trek_fit_edit.getData();
  partData = partData.replace(/"/g, "&&");

  partId = jQuery("#flag-name-id").val();

  data = new FormData();
  data.append("trek_fit_name", partName);
  data.append("trek_fit_id", partId);
  data.append("trek_fit_data", partData);
  data.append("action", "updatefitData");
  jQuery("#loader").css("display", "block");

  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      jQuery("#loader").css("display", "none");
      json = JSON.parse(msg);

      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal({
            title: "Updated!",
            text: "The data is updated!",
            icon: "success",
            timer: 2000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function updateEss() {
  var partName = "";
  var partId = "";
  var partData = "";
  partName = jQuery("#ess-name-edit").val();

  partData = CKEDITOR.instances.trek_ess_edit.getData();
  partData = partData.replace(/"/g, "&&");

  partId = jQuery("#flag-name-id").val();

  data = new FormData();
  data.append("trek_ess_name", partName);
  data.append("trek_ess_id", partId);
  data.append("trek_ess_data", partData);
  data.append("action", "updateEssData");
  jQuery("#loader").css("display", "block");

  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      jQuery("#loader").css("display", "none");
      json = JSON.parse(msg);

      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal({
            title: "Updated!",
            text: "The data is updated!",
            icon: "success",
            timer: 2000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function FitDelete(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];

  data = new FormData();
  data.append("trek_part_id", elementid);
  data.append("action", "deleteFit");

  swal({
    title: "Are you sure?",
    text: "Do you really want to delete this item!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      jQuery("#loader").css("display", "block");
      jQuery.ajax({
        type: "post",
        cache: false,
        contentType: false,
        processData: false,
        url: my_obj.ajax_url,
        data: data,
        success: function (msg) {
          jQuery("#loader").css("display", "none");
          json = JSON.parse(msg);

          if (json.statusCode == 200) {
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully deleted!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  });
}

function EssDelete(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];

  data = new FormData();
  data.append("trek_part_id", elementid);
  data.append("action", "deleteEss");

  swal({
    title: "Are you sure?",
    text: "Do you really want to delete this item!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      jQuery("#loader").css("display", "block");
      jQuery.ajax({
        type: "post",
        cache: false,
        contentType: false,
        processData: false,
        url: my_obj.ajax_url,
        data: data,
        success: function (msg) {
          jQuery("#loader").css("display", "none");
          json = JSON.parse(msg);

          if (json.statusCode == 200) {
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully deleted!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  });
}

///end participation

//start fitness
//start participation

function addParticiaption() {
  PartName = $("#partic-name").val();
  trek_partic_data = CKEDITOR.instances.trek_participation_add.getData();
  trek_partic_data = trek_partic_data.replace(/"/g, "&&");
  // alert(PartName);
  // alert(trek_partic_data);
  if (PartName !== "") {
    data = new FormData();
    data.append("trek_part_name", PartName);
    data.append("trek_part_data", trek_partic_data);
    data.append("action", "addNewPart");
    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "reload") {
            swal({
              title: "Saved!",
              text: "The data is saved!",
              icon: "success",
              timer: 2000,
              buttons: false,
            }).then(() => {
              location.reload();
            });
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.error("Participation name should not be empty", "Wait!");
    // alert("Participation name should not be empty");
  }
}

function participationEdit(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];
  data = new FormData();
  data.append("elementid", elementid);
  data.append("action", "getPart");
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

      if (json.statusCode == 200) {
        if (json.output != "" && json.outputIt != "") {
          // location.reload();
          var data = json.data_desc;
          data = data.replace(/&&/g, '"');

          jQuery("#part-name-edit").val(json.name);
          CKEDITOR.instances.trek_participation_edit.setData("" + data + "");
          jQuery("#flag-name-id").val(json.outputId);
          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function updatePart() {
  var partName = "";
  var partId = "";
  var partData = "";
  partName = jQuery("#part-name-edit").val();

  partData = CKEDITOR.instances.trek_participation_edit.getData();
  partData = partData.replace(/"/g, "&&");

  partId = jQuery("#flag-name-id").val();

  data = new FormData();
  data.append("trek_part_name", partName);
  data.append("trek_part_id", partId);
  data.append("trek_part_data", partData);
  data.append("action", "updatePartData");
  jQuery("#loader").css("display", "block");

  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      jQuery("#loader").css("display", "none");
      json = JSON.parse(msg);

      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal({
            title: "Updated!",
            text: "The data is updated!",
            icon: "success",
            timer: 2000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function participationDelete(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];

  data = new FormData();
  data.append("trek_part_id", elementid);
  data.append("action", "deletePart");

  swal({
    title: "Are you sure?",
    text: "Do you really want to delete this item!!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      jQuery("#loader").css("display", "block");
      jQuery.ajax({
        type: "post",
        cache: false,
        contentType: false,
        processData: false,
        url: my_obj.ajax_url,
        data: data,
        success: function (msg) {
          jQuery("#loader").css("display", "none");
          json = JSON.parse(msg);
          if (json.statusCode == 200) {
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully deleted!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  });
}

//end fitness

function departureDelete(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];

  if (elementid != "" && element_action != "") {
    if (element_action == "departureDelete") {
      data = new FormData();
      data.append("trek_id", elementid);
      data.append("action", "deleteAllDeparture");

      swal({
        title: "Are you sure?",
        text: "Do you really want to clear all departure related with this trek?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          jQuery("#loader").css("display", "block");
          jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
              jQuery("#loader").css("display", "none");
              json = JSON.parse(msg);
              if (json.statusCode == 200) {
                if (json.result == "reload") {
                  swal({
                    title: "Done!",
                    text: "Successfully deleted!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      });
    }
  }
}

function getModalDeparture(id, spin) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];

  if (elementid != "" && element_action != "" && spin != "") {
    if (element_action == "getDeparture") {
      data = new FormData();
      data.append("trek_id", elementid);
      data.append("spin", spin);
      data.append("action", "getModalDeparture");
      jQuery("#departureDetailsBooking").empty();
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

          if (json.statusCode == 200) {
            if (json.result == "Fetch") {
              jQuery("#departureDetailsBooking").empty();
              jQuery("#departureDetailsBooking").append(json.info);

              jQuery(document).ready(function () {
                jQuery(".detailsdep").css("display", "none");
                jQuery(".expand-collapse h5").each(function () {
                  var tis = jQuery(this),
                      state = false,
                      answer = tis.next("div").slideUp();
                  tis.click(function () {
                    state = !state;
                    answer.slideToggle(state);
                    tis.toggleClass("active", state);
                  });
                });
                jQuery("#myTable").dataTable();
              });
              if (json.flag == 1) {
                jQuery(".getAll").css("border-color", "red");
                jQuery(".getUpcoming").css("border-color", "");
                jQuery(".getPrevious").css("border-color", "");
              } else if (json.flag == 2) {
                jQuery(".getAll").css("border-color", "");
                jQuery(".getUpcoming").css("border-color", "red");
                jQuery(".getPrevious").css("border-color", "");
              } else if (json.flag == 3) {
                jQuery(".getAll").css("border-color", "");
                jQuery(".getUpcoming").css("border-color", "");
                jQuery(".getPrevious").css("border-color", "red");
              } else {
                jQuery(".getAll").css("border-color", "");
                jQuery(".getUpcoming").css("border-color", "");
                jQuery(".getPrevious").css("border-color", "");
              }
            }
          } else {
            toastr.error("Something wrong", "Oh no!");
          }
          jQuery("#loader").css("display", "none");
        },
      });
    }
  } else {
    toastr.error("Something wrong", "Oh no!");
  }
}

function cancellationActionButton(id) {
  var res = id.split("-");
  elementid = "";
  elementid = res[0];
  element_action = res[1];

  if (elementid != "" && element_action != "") {
    if (element_action == "getCancelInfo") {
      data = new FormData();
      data.append("trek_id", elementid);
      data.append("action", "getModalDepartureCancellation");
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

          if (json.statusCode == 200) {
            if (json.result == "cancel") {
              swal({
                title: "Action Required!",
                text: " Pending Request count : " + json.data + "",
                icon: "warning",
                buttons: true,
              }).then((willDelete) => {
                if (willDelete) {
                  window.location.replace(
                      "admin.php?page=manage_cancellation&num=" + elementid
                  );
                }
              });
            } else if (json.result == "non") {
              // alert("No cancellation request recieved for this trek");
              toastr.error("No cancellation request recieved for this trek");
            }
          } else {
            toastr.error("Something wrong", "Oh no!");
          }
          jQuery("#loader").css("display", "none");
        },
      });
    }
  } else {
    toastr.error("Something wrong", "Oh no!");
  }
}

function generateCouponCode() {
  len = 10;
  arr = "iAg1BCaD2ErFv9GqHIh3bJeKLw4MsNO5PcQlRt6xSyTkU7uVmWz8dXnYfo0pZj";
  var ans = "";
  for (var i = len; i > 0; i--) {
    ans += arr[Math.floor(Math.random() * arr.length)];
  }
  jQuery("#coupon_code").val(ans);
  // alert(ans);
}

function generateCouponCodeEvent() {
  len = 10;
  arr = "iAg1BCaD2ErFv9GqHIh3bJeKLw4MsNO5PcQlRt6xSyTkU7uVmWz8dXnYfo0pZj";
  var ans = "evn";
  for (var i = len; i > 0; i--) {
    ans += arr[Math.floor(Math.random() * arr.length)];
  }

  jQuery("#event_code").val(ans);
  // alert(ans);
}
function createCoupon(lst) {
  // console.log(lst);

  jQuery("#coupon_form").validate({
    rules: {
      coupon_display_tran: {
        required: true,
      },
      coupon_name: {
        required: true,
      },

      trk_coupon_type: {
        required: true,
      },

      coupon_code: {
        required: true,
      },

      generate_coupon_amount: {
        required: true,
      },
      coupon_description: {
        required: true,
      },

      coupon_trems_cond: {
        required: true,
      },

      coupon_merge_type: {
        required: true,
      },

      coupon_expire: {
        required: true,
      },

      coupon_region_inc_type: {
        required: true,
      },

      coupon_trek_inc_type: {
        required: true,
      },

      coupon_included_treks: {
        required: true,
      },

      coupon_included_region: {
        required: true,
      },

      coupon_display_type: {
        required: true,
      },

      coupon_website_limit_batch: {
        required: true,
      },

      coupon_individual_user: {
        email: true,
        required: true,
      },

      coupon_individual_limit_batch: {
        required: true,
      },
    },
  });
  if ($("#coupon_form").valid()) {
    if (lst == "") {
      return;
    }
    coupon_name = jQuery("#coupon_name").val();
    coupon_type = jQuery("#trk_coupon_type").val();
    coupon_transf = jQuery("#coupon_display_tran").val();
    coupon_code = jQuery("#coupon_code").val();
    coupon_amount = jQuery("#generate_coupon_amount").val();

    coupon_description = jQuery("#coupon_description").val();
    coupon_terms = jQuery("#coupon_trems_cond").val();
    coupon_merge = jQuery("#coupon_merge_type").val();
    coupon_expiry = jQuery("#coupon_expire").val();
    coupon_region_type = jQuery("#coupon_region_inc_type").val();
    coupon_trek_type = jQuery("#coupon_trek_inc_type").val();
    coupon_inc_region = jQuery("#coupon_included_region").val();
    coupon_inc_trek = jQuery("#coupon_included_treks").val();
    coupon_display_category = jQuery("#coupon_display_type").val();
    coupon_web_usage = jQuery("#coupon_website_limit_batch").val();
    coupon_ind_usage = jQuery("#coupon_individual_limit_batch").val();
    coupon_ind_email = jQuery("#coupon_individual_user").val();
    coupon_display_category = jQuery("#coupon_display_type").val();

    if (couponImage.length == 1) {
      var coupon_image = couponImage[0];
    } else {
      toastr.error("You should select the Cover Photo", "Oh no!");
      return;
    }

    data = new FormData();
    data.append("coupon_name", coupon_name);
    data.append("coupon_transfer", coupon_transf);
    data.append("coupon_code", coupon_code);
    data.append("coupon_type", coupon_type);
    data.append("coupon_amount", coupon_amount);
    data.append("coupon_description", coupon_description);
    data.append("coupon_terms", coupon_terms);
    data.append("coupon_merge", coupon_merge);
    data.append("coupon_expiry", coupon_expiry);
    data.append("coupon_region_type", coupon_region_type);
    data.append("coupon_trek_type", coupon_trek_type);
    data.append("coupon_inc_region", coupon_inc_region);
    data.append("coupon_inc_trek", coupon_inc_trek);
    data.append("coupon_display_category", coupon_display_category);
    data.append("coupon_web_usage", coupon_web_usage);
    data.append("coupon_ind_usage", coupon_ind_usage);
    data.append("coupon_ind_email", coupon_ind_email);

    if (lst == "create") {
      data.append("coupon_cover_photo", coupon_image);
      data.append("action", "createNewCoupon");
    } else if (lst == "update") {
      up = jQuery("#upid").val();
      data.append("updateId", up);
      data.append("action", "updateNewCoupon");
    }

    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        console.log(msg);
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          swal({
            title: "Done!",
            text: "Coupon Updated successfully!",
            icon: "success",
            timer: 3000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        } else {
          toastr.error("Something wrong", "Oh no!");
        }
      },
    });
  }
}

function getTrekData(item) {
  if (item !== "") {
    data = new FormData();
    data.append("trek_id", item);
    data.append("action", "get_trekData");
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
        $("#coupon_selected_departure").html("");

        for (var i = 0; i < json.date.length; i++) {
          $("#coupon_selected_departure").append(
              '<option value="' + json.id[i] + '">' + json.date[i] + "</option>"
          );
        }
        jQuery("#loader").css("display", "none");
      },
    });
  }
}

function editCoupon(data) {
  // console.log(data);
}

function deleteCoupon(id) {
  var res = id.split("-");
  elementid = res[0];
  element_action = res[1];

  if (elementid != "" && element_action != "") {
    if (element_action == "Coupondelete") {
      data = new FormData();
      data.append("coupon_id", elementid);
      data.append("action", "deleteCoupon");

      swal({
        title: "Are you sure?",
        text: "Do you really want to delete this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          jQuery("#loader").css("display", "block");

          jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
              jQuery("#loader").css("display", "none");
              json = JSON.parse(msg);

              if (json.statusCode == 200) {
                if (json.result == "reload") {
                  swal({
                    title: "Done!",
                    text: "Successfully deleted!",
                    icon: "success",
                    timer: 2000,
                    buttons: false,
                  }).then(() => {
                    location.reload();
                  });
                }
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      });
    }
  }
}

function approveCancellation(id) {
  // alert(id);
  if (id != "") {
    var data = new FormData();
    data.append("booking_id", id);
    data.append("action", "requestTrekCancellationAdmin");
    swal({
      title: "Are you sure!",
      text: "Do you really want to approve Cancellation?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
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
              if (json.result == "reload") {
                swal({
                  title: "Done!",
                  text: "Cancellation request approved!",
                  icon: "success",
                  timer: 3000,
                  buttons: false,
                }).then(() => {
                  //send mail
                  //     console.log("#bookingStat-"+id);
                  // jQuery("#bookingStat-"+id).html('<a class="btn btn-danger">Cancelled</a>');
                  location.reload();
                });
              }
            } else {
              toastr.error("Some error occurred", "Error");
            }
          },
        });
      }
    });
  } else {
    swal("Action Failed!");
    return;
  }
}

function cancellationActionButton1() {
  swal({
    title: "Everything Looks Great!",
    text: "No cancellation request available!",
    icon: "success",
    timer: 3000,
    buttons: false,
  });
}

function addGrade() {
  gradeName = $("#event-name").val();
  if (gradeName != "") {
    jQuery("#exampleModalEvent").modal("hide");
    data = new FormData();
    data.append("trek_grade_name", gradeName);
    data.append("action", "addNewEvent");
    jQuery("#loader").css("display", "block");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        jQuery("#loader").css("display", "none");
        json = JSON.parse(msg);

        if (json.statusCode == 200) {
          if (json.result == "data") {
            newGrade = json.data;
            newId = json.id;
            val = "";
            val += '<option value="' + newId + '">' + newGrade + "</option>";
            jQuery("#trek_event").append(val);
          }
        } else {
          toastr.error("Some error occurred", "Oh no!");
        }
      },
    });
  } else {
    toastr.warning("Grade should not be empty", "Wait!");
    // alert("Grade should not be empty");
  }
}

function deleteEvent() {
  id = jQuery("#trek_event_delete").val();
  if (id == "") {
    toastr.warning("Please select event and continue!", "Wait!");
    // alert("Please select grade and continue!");
    return;
  }
  var data = new FormData();
  data.append("event_id", id);
  data.append("action", "deleteEvent");

  swal({
    title: "Are you sure?",
    text: "Do you really want to delete this Event?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
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
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully deleted!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    } else {
    }
  });
}

// vendor -map

function vendorEdit(id) {
  $("#vendor-name-id").val("");
  $("#vendor-name-id").val(id);
  $("#treks").prop("selectedIndex", 0);
}

function vendor_Edit(id) {
  $("#vendor-name-id").val("");
  $("#vendor-name-id").val(id);
  //$('#treks').prop('selectedIndex', 0);

  // var res = id.split("-");
  // elementid = res[0];
  // element_action = res[1];

  data = new FormData();
  data.append("vendor_pick_id", id);
  data.append("action", "getVendor_edit");
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

      if (json.statusCode == 200) {
        // console.log(json);
        if (json.output != "" && json.outputIt != "") {
          // location.reload();

          var trId = json.outputPlaceID;
          $("#treks option")
              .filter(function () {
                return this.id === trId;
              })
              .prop("selected", true);

          // jQuery("#treks").val(json.outputPlaceID);
          jQuery("#loader").css("display", "none");
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function addVendor() {
  id_ven = $("#vendor-name-id").val();
  ven_name = $("#treks :selected").text();
  ven_id = $("#treks option:selected").attr("id");

  var res = id_ven.split("-");
  trekid = res[0];
  trekname = res[1];

  data = new FormData();
  data.append("trek_name", trekname);
  data.append("trek_id", trekid);
  data.append("vendor_name", ven_name);
  data.append("vendor_id", ven_id);
  data.append("action", "addVendor_main");
  jQuery("#loader").css("display", "block");

  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      jQuery("#loader").css("display", "none");
      json = JSON.parse(msg);

      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal({
            title: "Saved!",
            text: "The data is saved!",
            icon: "success",
            timer: 2000,
            buttons: false,
          }).then(() => {
            location.reload();
          });
        }
      } else {
        toastr.error("Some error occurred", "Oh no!");
      }
    },
  });
}

function ChangeVendorStatus(id) {
  var res = id.split("-");
  elementid = res[0];
  vendor_id = res[1];
  console.log("id " + elementid);
  console.log("vendor id " + vendor_id);

  data = new FormData();
  data.append("vendor_id", elementid);
  data.append("trek_vendor_id", vendor_id);
  data.append("action", "ChangeVendorStatus");

  swal({
    title: "Are you sure?",
    text: "Do you really want to change the status!",
    icon: "info",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      jQuery("#loader").css("display", "block");

      jQuery.ajax({
        type: "post",
        cache: false,
        contentType: false,
        processData: false,
        url: my_obj.ajax_url,
        data: data,
        success: function (msg) {
          jQuery("#loader").css("display", "none");
          json = JSON.parse(msg);

          if (json.statusCode == 200) {
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully changed!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  });
}

function VendorDelete(id) {
  data = new FormData();
  data.append("trek_vendor_id", id);
  data.append("action", "deleteVendor");

  swal({
    title: "Are you sure?",
    text: "Do you really want to remove this vendor?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      jQuery("#loader").css("display", "block");

      jQuery.ajax({
        type: "post",
        cache: false,
        contentType: false,
        processData: false,
        url: my_obj.ajax_url,
        data: data,
        success: function (msg) {
          jQuery("#loader").css("display", "none");
          json = JSON.parse(msg);

          if (json.statusCode == 200) {
            if (json.result == "reload") {
              swal({
                title: "Done!",
                text: "Successfully deleted!",
                icon: "success",
                timer: 2000,
                buttons: false,
              }).then(() => {
                location.reload();
              });
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  });
}

//contacts

function createNewContact() {
  //usererr,usersuccess,tth_user_phone2,tth_user_phone1,tth_user_mail,tth_user
  $("#usererr").html("");
  var mail = $("#tth_user_mail").val();
  var ph1 = $("#tth_user_phone1").val();
  var ph2 = $("#tth_user_phone2").val();
  var user = $("#tth_user").val();

  if (mail === "" || ph1 === "" || ph2 === "" || user === "") {
    $("#usererr").html("All fields are required.");
  } else {
    // console.log(mail);
    // console.log(ph1);
    // console.log(ph2);
    // console.log(user);

    var data = new FormData();
    data.append("user_id", user);
    data.append("mail", mail);
    data.append("phone1", ph1);
    data.append("phone2", ph2);
    data.append("action", "addContact");

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
          swal("Success", "Added successfully!");

          location.reload();
        } else if (json.statusCode == 201) {
          $("#usererr").html("User already added.");
        } else {
          swal("Warning", "Some error occured!");
        }
      },
    });
  }
}
function updateContactFetch(id) {

  if (id == '') {
     swal("Warning","Something went wrong!");
     return;
  }
  var data = new FormData();

  data.append('action', 'getContact');
  data.append('id', id);

  jQuery("#loader").css("display", "block");
  jQuery.ajax({
     type: "post",
     cache: false,
     contentType: false,
     processData: false,
     url: my_obj.ajax_url,
     data: data,
     success: function(msg) {
      console.log(msg);
      json = JSON.parse(msg);
      console.log(json);

        if (json.statusCode == 200) {

           if (json.result == 'fetched') {
              $("#edit_tth_user").val(json.name);
              $("#edit_tth_user_mail").val(json.email);
              $("#edit_tth_user_phone1").val(json.contact_num1);
              $("#edit_tth_user_phone2").val(json.contact_num2);
              document.getElementById('upadteContactButton').dataset.id = json.id;
              jQuery('#editModal').modal('show');
              jQuery("#loader").css("display", "none");
           }
        } else {
          swal("Warning","Some error occured!");
        }
     }
  });
}
function updateContact(e) {
  id = e.currentTarget.dataset.id;
  if (id == '') {
     swal("Warning","Something went wrong!");
     return;
  }
  var data = new FormData();

  data.append('action', 'updateContact');
  data.append('contact_name', $('#edit_tth_user').val());
  data.append('contact_email', $('#edit_tth_user_mail').val());
  data.append('contact_num1', $('#edit_tth_user_phone1').val());
  data.append('contact_num2', $('#edit_tth_user_phone2').val());
  data.append('id', id);

  jQuery("#loader").css("display", "block");
  jQuery.ajax({
     type: "post",
     cache: false,
     contentType: false,
     processData: false,
     url: my_obj.ajax_url,
     data: data,
     success: function(msg) {
      console.log(msg);
      json = JSON.parse(msg);
      console.log(json);

        if (json.statusCode == 200) {

           if (json.message == 'success') {
              jQuery('#editModal').modal('hide');
              location.reload();
              jQuery("#loader").css("display", "none");
           }
        } else {
          swal("Warning","Some error occured!");
        }
     }
  });
}
function deleteContact(id) {
  if (id == "") {
    swal("Warning", "Some error occured!");
    return;
  }
  var data = new FormData();

  data.append("action", "deleteContact");
  data.append("con_id", id);

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
      console.log(json);
      jQuery("#loader").css("display", "none");
      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal("Success", "Deleted Successfully!");

          location.reload();
        }
      } else {
        swal("Warning", "Some error occurred!");
      }
    },
  });
}


//cooks

function createNewCook() {
  //usererr,usersuccess,tth_user_phone2,tth_user_phone1,tth_user_mail,tth_user
  $("#usererr").html("");
  var mail = $("#tth_user_mail").val();
  var ph1 = $("#tth_user_phone1").val();
  var ph2 = $("#tth_user_phone2").val();
  var user = $("#tth_user").val();

  if (mail === "" || ph1 === "" || ph2 === "" || user === "") {
    $("#usererr").html("All fields are required.");
  } else {
    // console.log(mail);
    // console.log(ph1);
    // console.log(ph2);
    // console.log(user);

    var data = new FormData();
    data.append("user_id", user);
    data.append("mail", mail);
    data.append("phone1", ph1);
    data.append("phone2", ph2);
    data.append("action", "addCook");

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
          swal("Success", "Added successfully!");

          location.reload();
        } else if (json.statusCode == 201) {
          $("#usererr").html("User already added.");
        } else {
          swal("Warning", "Some error occured!");
        }
      },
    });
  }
}
function updateCookFetch(id) {

  if (id == '') {
     swal("Warning","Something went wrong!");
     return;
  }
  var data = new FormData();

  data.append('action', 'getCook');
  data.append('id', id);

  jQuery("#loader").css("display", "block");
  jQuery.ajax({
     type: "post",
     cache: false,
     contentType: false,
     processData: false,
     url: my_obj.ajax_url,
     data: data,
     success: function(msg) {
      console.log(msg);
      json = JSON.parse(msg);
      console.log(json);

        if (json.statusCode == 200) {

           if (json.result == 'fetched') {
              $("#edit_tth_user").val(json.name);
              $("#edit_tth_user_mail").val(json.email);
              $("#edit_tth_user_phone1").val(json.cook_num1);
              $("#edit_tth_user_phone2").val(json.cook_num2);
              document.getElementById('upadteCookButton').dataset.id = json.id;
              jQuery('#editModal').modal('show');
              jQuery("#loader").css("display", "none");
           }
        } else {
          swal("Warning","Some error occured!");
        }
     }
  });
}
function updateCook(e) {
  id = e.currentTarget.dataset.id;
  if (id == '') {
     swal("Warning","Something went wrong!");
     return;
  }
  var data = new FormData();

  data.append('action', 'updateCook');
  data.append('cook_name', $('#edit_tth_user').val());
  data.append('cook_email', $('#edit_tth_user_mail').val());
  data.append('cook_num1', $('#edit_tth_user_phone1').val());
  data.append('cook_num2', $('#edit_tth_user_phone2').val());
  data.append('id', id);

  jQuery("#loader").css("display", "block");
  jQuery.ajax({
     type: "post",
     cache: false,
     contentType: false,
     processData: false,
     url: my_obj.ajax_url,
     data: data,
     success: function(msg) {
      console.log(msg);
      json = JSON.parse(msg);
      console.log(json);

        if (json.statusCode == 200) {

           if (json.message == 'success') {
              jQuery('#editModal').modal('hide');
              location.reload();
              jQuery("#loader").css("display", "none");
           }
        } else {
          swal("Warning","Some error occured!");
        }
     }
  });
}
function deleteCook(id) {
  if (id == "") {
    swal("Warning", "Some error occured!");
    return;
  }
  var data = new FormData();

  data.append("action", "deleteCook");
  data.append("con_id", id);

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
      console.log(json);
      jQuery("#loader").css("display", "none");
      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal("Success", "Deleted Successfully!");

          location.reload();
        }
      } else {
        swal("Warning", "Some error occurred!");
      }
    },
  });
}


//leaders

function createNewLeader() {
  //usererr,usersuccess,tth_user_phone2,tth_user_phone1,tth_user_mail,tth_user
  $("#usererr").html("");
  var mail = $("#tth_user_mail").val();
  var ph1 = $("#tth_user_phone1").val();
  var ph2 = $("#tth_user_phone2").val();
  var user = $("#tth_user").val();

  if (mail === "" || ph1 === "" || ph2 === "" || user === "") {
    $("#usererr").html("All fields are required.");
  } else {
    // console.log(mail);
    // console.log(ph1);
    // console.log(ph2);
    // console.log(user);

    var data = new FormData();
    data.append("user_id", user);
    data.append("mail", mail);
    data.append("phone1", ph1);
    data.append("phone2", ph2);
    data.append("action", "addLeader");

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
          swal("Success", "Added successfully!");

          location.reload();
        } else if (json.statusCode == 201) {
          $("#usererr").html("User already added.");
        } else {
          swal("Warning", "Some error occured!");
        }
      },
    });
  }
}
function updateLeaderFetch(id) {

  if (id == '') {
     swal("Warning","Something went wrong!");
     return;
  }
  var data = new FormData();

  data.append('action', 'getLeader');
  data.append('id', id);

  jQuery("#loader").css("display", "block");
  jQuery.ajax({
     type: "post",
     cache: false,
     contentType: false,
     processData: false,
     url: my_obj.ajax_url,
     data: data,
     success: function(msg) {
      console.log(msg);
      json = JSON.parse(msg);
      console.log(json);

        if (json.statusCode == 200) {

           if (json.result == 'fetched') {
              $("#edit_tth_user").val(json.name);
              $("#edit_tth_user_mail").val(json.email);
              $("#edit_tth_user_phone1").val(json.leader_num1);
              $("#edit_tth_user_phone2").val(json.leader_num2);
              document.getElementById('upadteLeaderButton').dataset.id = json.id;
              jQuery('#editModal').modal('show');
              jQuery("#loader").css("display", "none");
           }
        } else {
          swal("Warning","Some error occured!");
        }
     }
  });
}
function updateLeader(e) {
  id = e.currentTarget.dataset.id;
  if (id == '') {
     swal("Warning","Something went wrong!");
     return;
  }
  var data = new FormData();

  data.append('action', 'updateLeader');
  data.append('leader_name', $('#edit_tth_user').val());
  data.append('leader_email', $('#edit_tth_user_mail').val());
  data.append('leader_num1', $('#edit_tth_user_phone1').val());
  data.append('leader_num2', $('#edit_tth_user_phone2').val());
  data.append('id', id);

  jQuery("#loader").css("display", "block");
  jQuery.ajax({
     type: "post",
     cache: false,
     contentType: false,
     processData: false,
     url: my_obj.ajax_url,
     data: data,
     success: function(msg) {
      console.log(msg);
      json = JSON.parse(msg);
      console.log(json);

        if (json.statusCode == 200) {

           if (json.message == 'success') {
              jQuery('#editModal').modal('hide');
              location.reload();
              jQuery("#loader").css("display", "none");
           }
        } else {
          swal("Warning","Some error occured!");
        }
     }
  });
}
function deleteLeader(id) {
  if (id == "") {
    swal("Warning", "Some error occured!");
    return;
  }
  var data = new FormData();

  data.append("action", "deleteLeader");
  data.append("con_id", id);

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
      console.log(json);
      jQuery("#loader").css("display", "none");
      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal("Success", "Deleted Successfully!");

          location.reload();
        }
      } else {
        swal("Warning", "Some error occurred!");
      }
    },
  });
}




//links

function savelinks() {
  var yt = [];

  let text = $("#tbl_posts").val();
  let name = $("#trek_link_name").val();
  let cat = $("#trek_link_categ").val();
  let trek = $("#trek_link").val();

  //errlinks
  if (text === "" || name === "" || cat === "") {
    toastr.error("All fields are required.", "Oh no!");
  } else {
    var data = new FormData();
    data.append("action", "addlinks");
    data.append("links", text);
    data.append("link_name", name);
    data.append("link_cat", cat);
    data.append("trek_id", trek);

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        json = JSON.parse(msg);
        // console.log(json);
        // jQuery("#loader").css("display", "none");
        if (json.statusCode == 200) {
          swal("Success", "Added Successfully!");

          location.reload();
        } else {
          swal("Warning", "Some error occurred!");
        }
      },
    });
  }
}

function deleteLink(id) {
  if (id == "") {
    toastr.error("Something wrong", "Oh no!");
    return;
  } else {
    var res = id.split("-");
    elementid = res[0];
    element_action = res[1];
    if (elementid == "" || element_action == "") {
      toastr.error("Some error occurred", "Oh no!");
    }
    if (element_action == "delete") {
      //action
      var data = new FormData();
      data.append("linkId", elementid);
      data.append("action", "deleteLink");

      swal({
        title: "Are you sure?",
        text: "Do you really want to delete this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          jQuery.ajax({
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            url: my_obj.ajax_url,
            data: data,
            success: function (msg) {
              json = JSON.parse(msg);
              console.log(json);

              if (json.statusCode == 200) {
                swal({
                  title: "Done!",
                  text: "Successfully deleted!",
                  icon: "success",
                  timer: 2000,
                  buttons: false,
                }).then(() => {
                  location.reload();
                });
              } else {
                toastr.error("Some error occurred", "Oh no!");
              }
            },
          });
        }
      });
    }
  }
}

function editLink(id) {
  if (id == "") {
    toastr.error("Some error occurred", "Oh no!");
    return;
  } else {
    var res = id.split("-");
    elementid = res[0];
    element_action = res[1];

    if (elementid != "" && element_action != "") {
      jQuery("#" + elementid + "-cardTrek").css("background", "");
      jQuery("#trek_link_name_edit").val("");
      jQuery("#trek_link_categ_edit").val("");
      jQuery("#tbl_posts_body_edit").val("");
      jQuery("#tbl_posts_edit").val("");

      var data = new FormData();
      data.append("linkId", elementid);
      data.append("action", "getlinkContent");
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

          if (json.statusCode == 200) {
            if (json.result == "fetch") {
              jQuery("#trek_link_name_edit").val(json.name);
              jQuery("#trek_link_categ_edit").val(json.category);
              jQuery("#trek_link_edit").val(json.val);
              jQuery("#tbl_posts_edit").val(json.links);
              jQuery("#loader").css("display", "none");
              $("#exampleModal_edit").modal("show");
            }
          } else {
            toastr.error("Some error occurred", "Oh no!");
          }
        },
      });
    }
  }
}

function updatelinks() {
  var yt = [];

  let text = jQuery("#tbl_posts_edit").val();
  console.log(text);
  let name = $("#trek_link_name_edit").val();
  let cat = $("#trek_link_categ_edit").val();
  let trek = $("#trek_link_edit").val();

  //errlinks
  if (text === "" || name === "" || cat === "") {
    toastr.error("All fields are required.", "Oh no!");
  } else {
    var data = new FormData();
    data.append("action", "updateLinks");
    data.append("links", text);
    data.append("link_name", name);
    data.append("link_cat", cat);
    data.append("id", trek);

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        json = JSON.parse(msg);
        // console.log(json);
        jQuery("#loader").css("display", "none");
        if (json.statusCode == 200) {
          swal("Success", "Update Successfully!");

          location.reload();
        } else {
          swal("Warning", "Some error occurred!");
        }
      },
    });
  }
}

function viewmessage(id) {
  // console.log(id);
  var data = new FormData();
  data.append("action", "getMessage");
  data.append("id", id);

  jQuery.ajax({
    type: "post",
    cache: false,
    contentType: false,
    processData: false,
    url: my_obj.ajax_url,
    data: data,
    success: function (msg) {
      json = JSON.parse(msg);

      $("#subject_modal").text(json.subject);
      $("#message_modal").text(json.message);
      $("#Username_modal").text(json.name);
      $("#mail_modal").text(json.mail);
      $("#message_time_modal").text(json.date);
      $("#noticeModal").modal("show");
    },
  });
}

//Add remarks
function addRemarks() {
  let Trekker_ID = $("#hdntrekkerid").val();
  let OffLoad =    $('input[name=radOffLoad]:checked').val();
  let Transport = $('input[name=radTransport]:checked').val();
  let Comments = $("#txtComments").val();
  let Added_By = $("#hdnUserID").val();
 
  if ($.trim(Comments) == "") {
    alert("Comment is Required!");    
    return false;
  }
  else if (Added_By != "") {
    data = new FormData();
    data.append("Trekker_ID", Trekker_ID);
    data.append("OffLoad", OffLoad);
    data.append("Transport", Transport);
    data.append("Comments", $.trim(Comments));
    data.append("Added_By", Added_By);
    data.append("action", "addremarks");
    // jQuery("#loader").css("display", "block");

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
          toastr.success("Remarks added successfully", "Success!");
          setTimeout(function () {
            location.reload();
          }, 3000);
        } else if (json.statusCode == 400) {
          toastr.error("Request Failed", "Oh no!");
        }
      },
      // jQuery("#loader").css("display", "none");
    });
  } else {
    toastr.error("Some error occurred", "Oh no!");
  }
}

//Update remarks
function updatedRemarks() {
  let RemarksID = $("#hdnremarksID").val();
  let OffLoad =    $('input[name=radeditOffLoad]:checked').val();
  let Transport = $('input[name=radeditTransport]:checked').val();
  let Comments = $("#txteditComments").val();
  let Added_By = $("#hdnUserID").val();

  if ($.trim(Comments) == "") {
    alert("Comment is Required!");    
    return false;
  }
  else if (Added_By != "") {
    data = new FormData();
    data.append("RemarksID", RemarksID);
    data.append("OffLoad", OffLoad);
    data.append("Transport", Transport);
    data.append("Comments", $.trim(Comments));
    data.append("Added_By", Added_By);
    data.append("action", "updateremarks");
    // jQuery("#loader").css("display", "block");

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
          toastr.success("Remarks updated successfully", "Success!");
          setTimeout(function () {
            location.reload();
          }, 3000);
        } else if (json.statusCode == 400) {
          toastr.error("Request Failed", "Oh no!");
        }
      },
      // jQuery("#loader").css("display", "none");
    });
  } else {
    toastr.error("Some error occurred", "Oh no!");
  }
}

//Change Trekkers status
function changeStatus(selectedValue,trekkerid,selectedDepartureID)
{  
  let Added_By = $("#hdnUserID").val();
  $("#hdntrekkerid1").val(trekkerid);
  if(selectedValue==3)//Transfer trek
  {
    jQuery("#Modal_departure").modal("show");  
	$("#select-date").val(selectedDepartureID);
  }
  else {
  if (confirm("Are you sure want to change status")) {
data = new FormData();
    data.append("Trekker_ID", trekkerid);
    data.append("Status", selectedValue); 
    data.append("Added_By", Added_By);
    data.append("action", "updatetrekkerstatus");
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
          toastr.success("Status updated successfully", "Success!");
          setTimeout(function () {
            location.reload();
          }, 3000);
        } else if (json.statusCode == 400) {
          toastr.error("Request Failed", "Oh no!");
        }
      },
     
    });
  }
}
}
//Upcomming departure date
function getTrekDepartureData(trekid) {
  if (trekid !== "") {
    data = new FormData();
    data.append("trek_id", trekid);
    data.append("action", "get_trekData");

    jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_obj.ajax_url,
      data: data,
      success: function (msg) {
        json = JSON.parse(msg);
        $("#select-date").html("");
        $("#select-date").append('<option value="">Select Trek Date</option>');
        for (var i = 0; i < json.date.length; i++) {
          $("#select-date").append(
            '<option value="' + json.id[i] + '">' + json.date[i] + "</option>"
          );
        }
      },
    });
  }
}


//Update departure date
function updateDepartureDate()
{
  let Added_By = $("#hdnUserID").val();
  data = new FormData();
  var departuredate=$("#select-date").val();
  var trekkerid=$("#hdntrekkerid1").val();
  var trekid=$("#select-trek").val();
  data.append("Trekker_ID", trekkerid);
  data.append("Departure_Date", departuredate); 
  data.append("Added_By", Added_By);
  data.append("TrekID", trekid);
  data.append("action", "updatetrekkerdeparturedate");
  
  if(departuredate>0)
  {
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
        toastr.success("Updated successfully", "Success!");
        return false;
        //setTimeout(function () {
          //location.reload();
        //}, 3000);
      } else if (json.statusCode == 400) {
        toastr.error("Request Failed", "Oh no!");
      }
    },
   
  });
}
else
{ toastr.error("Choose one date and continue", "Oh no!");
//setTimeout(function () {
  //location.reload();
//}, 1500); 
}
}

//leaders Rating
//Add
function createNewLeaderRating() {
  //usererr,usersuccess,tth_user_phone2,tth_user_phone1,tth_user_mail,tth_user
  $("#usererr").html("");
  var leaderid = $("#trek_leader").val();
  var noofbatch = $("#tth_no_of_batches").val();
  var noofdays = $("#tth_no_of_days").val();
  var rating = $("#input-2").val();
  var Added_By = $("#hdnUserID").val();
  if (leaderid === "" || noofbatch === "" || noofdays === "" || rating === "") {
    $("#usererr").html("All fields are required.");
  } else {
  
    var data = new FormData();
    data.append("leaderid", leaderid);
    data.append("noofbatch", noofbatch);
    data.append("noofdays", noofdays);
    data.append("rating", rating);
    data.append("Added_By", Added_By);
    data.append("action", "addTrekLeaderRating");

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
          swal("Success", "Added successfully!");

          location.reload();
        } else if (json.statusCode == 201) {
          $("#usererr").html("User already added.");
        } else {
          swal("Warning", "Some error occured!");
        }
      },
    });
  }
}

function updateLeaderRatingFetch(id) {

  if (id == '') {
     swal("Warning","Something went wrong!");
     return;
  }
  var data = new FormData();

  data.append('action', 'getTrekLeaderRating');
  data.append('id', id);

  jQuery("#loader").css("display", "block");
  jQuery.ajax({
     type: "post",
     cache: false,
     contentType: false,
     processData: false,
     url: my_obj.ajax_url,
     data: data,
     success: function(msg) {
      console.log(msg);
      json = JSON.parse(msg);
      console.log(json);

        if (json.statusCode == 200) {

           if (json.result == 'fetched') {
              $("#edit_tth_user").val(json.name);
              $("#edit_tth_user_mail").val(json.email);
              $("#edit_tth_user_phone1").val(json.leader_num1);
              $("#edit_tth_user_phone2").val(json.leader_num2);
              document.getElementById('upadteLeaderButton').dataset.id = json.id;
              jQuery('#editModal').modal('show');
              jQuery("#loader").css("display", "none");
           }
        } else {
          swal("Warning","Some error occured!");
        }
     }
  });
}
function updateLeader(e) {
  id = e.currentTarget.dataset.id;
  if (id == '') {
     swal("Warning","Something went wrong!");
     return;
  }
  var data = new FormData();

  data.append('action', 'updateLeader');
  data.append('leader_name', $('#edit_tth_user').val());
  data.append('leader_email', $('#edit_tth_user_mail').val());
  data.append('leader_num1', $('#edit_tth_user_phone1').val());
  data.append('leader_num2', $('#edit_tth_user_phone2').val());
  data.append('id', id);

  jQuery("#loader").css("display", "block");
  jQuery.ajax({
     type: "post",
     cache: false,
     contentType: false,
     processData: false,
     url: my_obj.ajax_url,
     data: data,
     success: function(msg) {
      console.log(msg);
      json = JSON.parse(msg);
      console.log(json);

        if (json.statusCode == 200) {

           if (json.message == 'success') {
              jQuery('#editModal').modal('hide');
              location.reload();
              jQuery("#loader").css("display", "none");
           }
        } else {
          swal("Warning","Some error occured!");
        }
     }
  });
}
function deleteLeaderRating(id) {
  if (id == "") {
    swal("Warning", "Some error occured!");
    return;
  }
  if(confirm("Are you sure want to delete?"))
  {
  var data = new FormData();

  data.append("action", "deleteLeaderRating");
  data.append("con_id", id);

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
      console.log(json);
      jQuery("#loader").css("display", "none");
      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal("Success", "Deleted Successfully!");

          location.reload();
        }
      } else {
        swal("Warning", "Some error occurred!");
      }
    },
  });
}
}

//Cook Rating
//Add
function createNewCookRating() {
  //usererr,usersuccess,tth_user_phone2,tth_user_phone1,tth_user_mail,tth_user
  $("#usererr").html("");
  var cookid = $("#trek_cook").val();
  var noofbatch = $("#tth_no_of_batches").val();
  var noofdays = $("#tth_no_of_days").val();
  var rating = $("#input-2").val();
  var Added_By = $("#hdnUserID").val();
  if (cookid === "" || noofbatch === "" || noofdays === "" || rating === "") {
    $("#usererr").html("All fields are required.");
  } else {
  
    var data = new FormData();
    data.append("cookid", cookid);
    data.append("noofbatch", noofbatch);
    data.append("noofdays", noofdays);
    data.append("rating", rating);
    data.append("Added_By", Added_By);
    data.append("action", "addTrekCookRating");

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
          swal("Success", "Added successfully!");

          location.reload();
        } else if (json.statusCode == 201) {
          $("#usererr").html("User already added.");
        } else {
          swal("Warning", "Some error occured!");
        }
      },
    });
  }
}

function deleteCookRating(id) {
  if (id == "") {
    swal("Warning", "Some error occured!");
    return;
  }
  if(confirm("Are you sure want to delete?"))
  {
  var data = new FormData();

  data.append("action", "deleteCookRating");
  data.append("con_id", id);

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
      console.log(json);
      jQuery("#loader").css("display", "none");
      if (json.statusCode == 200) {
        if (json.result == "reload") {
          swal("Success", "Deleted Successfully!");

          location.reload();
        }
      } else {
        swal("Warning", "Some error occurred!");
      }
    },
  });
}
}