jQuery(document).ready(function () {
  jQuery(".dep-exp").css("display", "none");
  jQuery("#select-trek").change(function () {
    var item = $(this).val();
    getTrekData(item);
  });

   jQuery("#trek-dates-pull-down").on("click", function () {
    console.log("clicked");
     jQuery("#textBody").scrollTop($("#textBody").scrollTop() + 1000);
  });

   jQuery("#cscancel").on("click", function () {
    console.log("clicked");
     jQuery("body").scrollTop($("body").scrollTop() + 100);
  });
});

function submitContactForm(argument) {
  if (argument == "contact-submit") {
    name = jQuery("#input-name").val();
    email = jQuery("#input-email").val();
    subject = jQuery("#input-subject").val();
    message = jQuery("#input-message").val();
    if (name == "" || email == "" || subject == "" || message == "") {
      //alert("all fields required!");
      toastr.error("all fields required!", "Oh no!");
    } else {
      var saveData = jQuery.ajax({
        type: "post",
        dataType: "json",
        url: my_obj.ajax_url,
        data: {
          name: name,
          email: email,
          subject: subject,
          message: message,
          code: 1234,
          action: "contact-form",
        },
        success: function (msg) {
          json = JSON.parse(JSON.stringify(msg));
          if (json.statusCode == 200) {
            if (json.result == "reload") {
              alert("Data added successfully");
            }
          } else {
            toastr.warning("You should select a trek first!", "Empty input", {
              timeOut: 5000,
            });
          }
        },
      });
      // saveData.error(function() { alert("Something went wrong"); });
    }
  }
}

function contactUs() {
  alert("Provide Contact Options!");
}

function bookNow() {
  alert("Booking page- Progressing!");
}

function createNodes(count) {
  trek_id = jQuery("#select-trek").val();
  dep_id = jQuery("#select-date").val();
  if (trek_id == "") {
    toastr.warning("You should select a trek first!", "Empty input", {
      timeOut: 5000,
    });

    return;
  } else if (dep_id == "") {
    toastr.warning("You should select a date first!", "Empty input", {
      timeOut: 5000,
    });

    jQuery("#drpNoOfTrekker").val("");
    return;
  } else if (count == "") {
    toastr.warning("Trekkers count should not be empty!", "Empty input", {
      timeOut: 5000,
    });

    return;
  }
  if (count == "Me Only") {
    counts = 0;
  }
  counts = parseInt(count) + 1;
  jQuery.ajax({
    type: "post",
    dataType: "json",
    url: my_obj.ajax_url,
    data: {
      count: counts,
      trek_selected_id: trek_id,
      dep_selected_id: dep_id,
      action: "get-remaining-seat-count",
    },
    success: function (msg) {
      json = JSON.parse(JSON.stringify(msg));
      if (json.statusCode == 200) {
        if (json.result == "exist1") {
          //booking eligible

          if (count === "" || count === "Me Only") {
            html = "";
          } else {
            // var html = '<div class="container">';
            var html = "";

            for (i = 1; i <= parseInt(count); i++) {
              if (i == 1) {
                html += '<div class="row">';
                html +=
                  '<div class="col-md-2"><label>Name</label><input type="text" class="form-control input-sm naT" name="otherTrekkerName_' +
                  i +
                  '" id="otherTrekkerName_' +
                  i +
                  '" placeholder="Name" required/></div>';

                html +=
                  ' <div class="col-md-2"><label>Phone</label><input type="text" class="form-control input-sm nuT" name="otherTrekkerContact_' +
                  i +
                  '" id="otherTrekkerContact_' +
                  i +
                  '" placeholder="Contact Number" required/></div>';
                html +=
                  '<div class="col-md-2"> <label>Gender</label><select class= "form-control input-sm geT" name="otherTrekkerGender_' +
                  i +
                  '" id="otherTrekkerGender_' +
                  i +
                  '" required><option value="0">Select Gender</option><option value="Male" >Male</option><option value="Female">Female</option><option value="UnSpecifed">UnSpecifed</option> </select></div>';

                html +=
                  '<div class="col-md-2"><label>Date of Birth</label> <input type="date" max="2100-12-31" class="form-control input-sm doT" name="othersdob_' +
                  i +
                  '" id="othersdob_' +
                  i +
                  '" required></div>';
                html +=
                  '<div class="col-md-2"><label>Weight</label> <input type="number" class="form-control input-sm weT" min="30" max="150" placeholder="Weight" name="othersweight_' +
                  i +
                  '" id="othersweight_' +
                  i +
                  '" required></div>';
                html +=
                  '<div class="col-md-2"><label>Height</label> <input type="number" class="form-control input-sm heT" min="50" max="205" placeholder="Height" name="othersheight_' +
                  i +
                  '" id="othersheight_' +
                  i +
                  '" required></div>';

                html += "</div><br>";
              } else {
                html += '<div class="row">';
                html +=
                  '<div class="col-md-2"><input type="text" class="form-control input-sm naT" name="otherTrekkerName_' +
                  i +
                  '" id="otherTrekkerName_' +
                  i +
                  '" placeholder="Name" required/></div>';

                html +=
                  ' <div class="col-md-2"><input type="text" class="form-control input-sm nuT" name="otherTrekkerContact_' +
                  i +
                  '" id="otherTrekkerContact_' +
                  i +
                  '" placeholder="Contact Number" required/></div>';
                html +=
                  '<div class="col-md-2"> <select class= "form-control input-sm geT" name="otherTrekkerGender_' +
                  i +
                  '" id="otherTrekkerGender_' +
                  i +
                  '" required><option value="0">Select Gender</option><option value="Male" >Male</option><option value="Female">Female</option><option value="UnSpecifed">UnSpecifed</option> </select></div>';

                html +=
                  '<div class="col-md-2"> <input type="date" class="form-control input-sm doT" name="othersdob_' +
                  i +
                  '" id="othersdob_' +
                  i +
                  '" required></div>';
                html +=
                  '<div class="col-md-2"> <input type="number" class="form-control input-sm weT" min="30" max="150" placeholder="Weight" name="othersweight_' +
                  i +
                  '" id="othersweight_' +
                  i +
                  '" required></div>';
                html +=
                  '<div class="col-md-2"> <input type="number" class="form-control input-sm heT" min="50" max="205" placeholder="Height" name="othersheight_' +
                  i +
                  '" id="othersheight_' +
                  i +
                  '" required></div>';

                html += "</div><br>";
              }
            }

            // html += '</div>';
          }

          document.getElementById("data").innerHTML = html;
        } else {
          swal({
            title: "You are on the waiting list!",
            text:
              "Selected seats are not available. Available seat count is " +
              json.data +
              " Still want to register!?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
              if (count === "" || count === "Me Only") {
                html = "";
              } else {
                // var html = '<div class="container">';
                var html = "";

                for (i = 1; i <= parseInt(count); i++) {
                  if (i == 1) {
                    html += '<div class="row">';
                    html +=
                      '<div class="col-md-2"><label>Name</label><input type="text" class="form-control input-sm naT" name="otherTrekkerName_' +
                      i +
                      '" id="otherTrekkerName_' +
                      i +
                      '" placeholder="Name" required/></div>';

                    html +=
                      ' <div class="col-md-2"><label>Phone</label><input type="text" class="form-control input-sm nuT" name="otherTrekkerContact_' +
                      i +
                      '" id="otherTrekkerContact_' +
                      i +
                      '" placeholder="Contact Number" required/></div>';
                    html +=
                      '<div class="col-md-2"> <label>Gender</label><select class= "form-control input-sm geT" name="otherTrekkerGender_' +
                      i +
                      '" id="otherTrekkerGender_' +
                      i +
                      '" required><option value="0">Select Gender</option><option value="Male" >Male</option><option value="Female">Female</option><option value="UnSpecifed">UnSpecifed</option> </select></div>';

                    html +=
                      '<div class="col-md-2"><label>Date of Birth</label> <input type="date" max="2100-12-31" class="form-control input-sm doT" name="othersdob_' +
                      i +
                      '" id="othersdob_' +
                      i +
                      '" required></div>';
                    html +=
                      '<div class="col-md-2"><label>Weight</label> <input type="number" class="form-control input-sm weT" min="30" max="150" placeholder="Weight" name="othersweight_' +
                      i +
                      '" id="othersweight_' +
                      i +
                      '" required></div>';
                    html +=
                      '<div class="col-md-2"><label>Height</label> <input type="number" class="form-control input-sm heT" min="50" max="205" placeholder="Height" name="othersheight_' +
                      i +
                      '" id="othersheight_' +
                      i +
                      '" required></div>';

                    html += "</div><br>";
                  } else {
                    html += '<div class="row">';
                    html +=
                      '<div class="col-md-2"><input type="text" class="form-control input-sm naT" name="otherTrekkerName_' +
                      i +
                      '" id="otherTrekkerName_' +
                      i +
                      '" placeholder="Name" required/></div>';

                    html +=
                      ' <div class="col-md-2"><input type="text" class="form-control input-sm nuT" name="otherTrekkerContact_' +
                      i +
                      '" id="otherTrekkerContact_' +
                      i +
                      '" placeholder="Contact Number" required/></div>';
                    html +=
                      '<div class="col-md-2"> <select class= "form-control input-sm geT" name="otherTrekkerGender_' +
                      i +
                      '" id="otherTrekkerGender_' +
                      i +
                      '" required><option value="0">Select Gender</option><option value="Male" >Male</option><option value="Female">Female</option><option value="UnSpecifed">UnSpecifed</option> </select></div>';

                    html +=
                      '<div class="col-md-2"> <input type="date" class="form-control input-sm doT" name="othersdob_' +
                      i +
                      '" id="othersdob_' +
                      i +
                      '" required></div>';
                    html +=
                      '<div class="col-md-2"> <input type="number" class="form-control input-sm weT" min="30" max="150" placeholder="Weight" name="othersweight_' +
                      i +
                      '" id="othersweight_' +
                      i +
                      '" required></div>';
                    html +=
                      '<div class="col-md-2"> <input type="number" class="form-control input-sm heT" min="50" max="205" placeholder="Height" name="othersheight_' +
                      i +
                      '" id="othersheight_' +
                      i +
                      '" required></div>';

                    html += "</div><br>";
                  }
                }

                // html += '</div>';
              }

              document.getElementById("data").innerHTML = html;
            } else {
              swal("Feel free to contact us on query@trekthehimalayas.com");
              html = "";
              document.getElementById("data").innerHTML = html;
              jQuery("#drpNoOfTrekker").val("");
            }
          });
        } //end of else exist2
      }
    },
  });
}

jQuery(document).ready(function () {
  jQuery(document).on("click", "#submitburtrek", function () {
    trek_id = jQuery("#select-trek").val();
    dep_id = jQuery("#select-date").val();
    count = jQuery("#drpNoOfTrekker").val();
    if (trek_id == "") {
      toastr.warning("You should select a trek first!", "Empty input", {
        timeOut: 5000,
      });
      return;
    } else if (dep_id == "") {
      toastr.warning("You should select a date first!", "Empty input", {
        timeOut: 5000,
      });
      jQuery("#drpNoOfTrekker").val("");
      return;
    } else if (count == "") {
      toastr.warning("Trekkers count should not be empty", "Empty input", {
        timeOut: 5000,
      });
      return;
    }
    if (count == "Me Only") {
      counts = 0;
    }
    counts = parseInt(count) + 1;
    jQuery.ajax({
      type: "post",
      dataType: "json",
      url: my_obj.ajax_url,
      data: {
        count: counts,
        trek_selected_id: trek_id,
        dep_selected_id: dep_id,
        action: "get-remaining-seat-count",
      },
      success: function (msg) {
        json = JSON.parse(JSON.stringify(msg));
        if (json.statusCode == 200) {
          if (json.result == "exist1") {
            get_values_book();

            flag = validate();
            if (flag == 1) {
              scrollToTop();
              return;
            } else if (flag == 0) {
              var data = new FormData();
              data.append("select_trek", select_trek);
              data.append("select_date", select_date);
              data.append("firstname", firstname);
              data.append("lastname", lastname);
              data.append("Phone", Phone);
              data.append("mail", mail);
              data.append("select_gender", select_gender);
              data.append("emergency", emergency);
              data.append("dob", dob);
              data.append("weight", weight);
              data.append("height", height);
              data.append("select_country", select_country);
              data.append("State", State);
              data.append("City", City);
              data.append("drpNoOfTrekker", drpNoOfTrekker);
              data.append("select_how", select_how);
              data.append("select_before", select_before);
              data.append("terms", terms);
              data.append("insurance", insurance);
              data.append("txtnote", txtnote);
              data.append("trek_category", trek_category);
              data.append("trek_others", trekkersLists);
              data.append("action", "addTrekBookingDetails");

              jQuery.ajax({
                type: "post",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                url: my_obj.ajax_url,
                data: data,
                success: function (msg) {
                  json = JSON.parse(JSON.stringify(msg));

                  if (json.statusCode == 200) {
                    if (json.result == "reload") {
                      userid = "";
                      bookingid = "";
                      userid = json.userid;
                      bookingid = json.bookingid;

                      //ajax for trekkers
                      jQuery.ajax({
                        url: my_obj.ajax_url,
                        type: "POST",
                        data: {
                          action: "addTrekBookingDetailsTrekkers",
                          trekkers: trekkersLists,
                          bookingId: bookingid,
                          userId: userid,
                          Oname: firstname,
                          Ocontact: Phone,
                          Ogender: select_gender,
                          Odob: dob,
                          Oweight: weight,
                          Oheight: height,
                          Oselect_trek: select_trek,
                          Oselect_date: select_date,
                        },
                        cache: false,
                        success: function (data) {
                          swal({
                            title: "Successful!",
                            text: "Data added!",
                            icon: "success",
                            timer: 2000,
                            buttons: false,
                          }).then(() => {
                            window.location.replace(
                              "/trek/index.php/trek-details/?trek=" +
                                select_trek
                            );
                            // console.log("reload");
                          });
                        },
                      });
                    } else if (json.result == "exist") {
                      toastr.warning(
                        "Already Booked for this trek!",
                        "Duplication Error",
                        { timeOut: 5000 }
                      );
                      return;
                    }
                  } else {
                    toastr.error("Some Error occured", "Error", {
                      timeOut: 5000,
                    });
                  }
                },
              });
            }
          } else if (json.result == "exist2") {
            swal({
              title: "Wanna Proceed?",
              text: "You are on the waiting list, Do you want to continue?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
              if (willDelete) {
                get_values_book();

                flag = validate();
                if (flag == 1) {
                  return;
                } else if (flag == 0) {
                  var data = new FormData();
                  data.append("select_trek", select_trek);
                  data.append("select_date", select_date);
                  data.append("firstname", firstname);
                  data.append("lastname", lastname);
                  data.append("Phone", Phone);
                  data.append("mail", mail);
                  data.append("select_gender", select_gender);
                  data.append("emergency", emergency);
                  data.append("dob", dob);
                  data.append("weight", weight);
                  data.append("height", height);
                  data.append("select_country", select_country);
                  data.append("State", State);
                  data.append("City", City);
                  data.append("drpNoOfTrekker", drpNoOfTrekker);
                  data.append("select_how", select_how);
                  data.append("select_before", select_before);
                  data.append("terms", terms);
                  data.append("insurance", insurance);
                  data.append("txtnote", txtnote);
                  data.append("trek_category", trek_category);
                  data.append("trek_others", trekkersLists);
                  data.append("action", "addTrekBookingDetails");

                  jQuery.ajax({
                    type: "post",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    url: my_obj.ajax_url,
                    data: data,
                    success: function (msg) {
                      json = JSON.parse(JSON.stringify(msg));

                      if (json.statusCode == 200) {
                        if (json.result == "reload") {
                          userid = "";
                          bookingid = "";
                          userid = json.userid;
                          bookingid = json.bookingid;

                          //ajax for trekkers
                          jQuery.ajax({
                            url: my_obj.ajax_url,
                            type: "POST",
                            data: {
                              action: "addTrekBookingDetailsTrekkers",
                              trekkers: trekkersLists,
                              bookingId: bookingid,
                              userId: userid,
                              Oname: firstname,
                              Ocontact: Phone,
                              Ogender: select_gender,
                              Odob: dob,
                              Oweight: weight,
                              Oheight: height,
                              Oselect_trek: select_trek,
                              Oselect_date: select_date,
                            },
                            cache: false,
                            success: function (data) {
                              swal({
                                title: "Successful!",
                                text: "Yea, You are on the waiting list!. We will get to you once your seats are confirmed!",
                                icon: "success",
                                timer: 3000,
                                buttons: false,
                              }).then(() => {
                                window.location.replace(
                                  "/trek/index.php/trek-details/?trek=" +
                                    select_trek
                                );
                              });
                            },
                          });
                        } else if (json.result == "exist") {
                          toastr.warning(
                            "Already Booked for this trek!",
                            "Duplication Error",
                            { timeOut: 5000 }
                          );
                          return;
                        }
                      } else {
                        alert("Some error occured!");
                      }
                    },
                  });
                }
              } else {
                swal("Feel free to contact us on query@trekthehimalayas.com");
              }
            });
          }
        }
      },
    });

    // check_null_value('addTrekDetails');
  });
});

function toLogin() {
  window.location = "/trek/my-account/";
}
function get_values_book() {
  // session =  jQuery("#").val();
  select_trek = jQuery("#select-trek").val();
  select_date = jQuery("#select-date").val();
  firstname = jQuery("#firstname").val();
  lastname = jQuery("#lastname").val();
  Phone = jQuery("#Phone").val();
  mail = jQuery("#mail").val();
  select_gender = jQuery("#select-gender").val();
  emergency = jQuery("#emergency").val();
  dob = jQuery("#dob").val();
  weight = jQuery("#weight").val();
  height = jQuery("#height").val();
  select_country = jQuery("#select-country").val();
  State = jQuery("#State").val();
  City = jQuery("#City").val();
  drpNoOfTrekker = jQuery("#drpNoOfTrekker").val();
  select_how = jQuery("#select-how").val();
  select_before = jQuery("#select-before").val();
  trek_category = jQuery("#select-category-trek").val();
  // terms =  jQuery("#terms").val();
  // insurance =  jQuery("#insurance").val();
  insurance = "false";
  terms = "false";
  if ($("#insurance").prop("checked") == true) {
    insurance = "true";
  }
  if ($("#terms").prop("checked") == true) {
    terms = "true";
  }
  txtnote = jQuery("#txtnote").val();
  if (drpNoOfTrekker != "") {
    trekkersList = [];

    for (i = 1; i <= drpNoOfTrekker; i++) {
      trekkers = {};
      res = "";
      // console.log("#otherTrekkerName_"+i);
      otherTrekkerName = jQuery("#otherTrekkerName_" + i + "").val();
      otherTrekkerContact = jQuery("#otherTrekkerContact_" + i + "").val();
      otherTrekkerGender = jQuery("#otherTrekkerGender_" + i + "").val();
      othersdob = jQuery("#othersdob_" + i + "").val();
      othersweight = jQuery("#othersweight_" + i + "").val();
      othersheight = jQuery("#othersheight_" + i + "").val();
      trekkers["otherTrekkerName"] = otherTrekkerName;
      trekkers["otherTrekkerContact"] = otherTrekkerContact;
      trekkers["otherTrekkerGender"] = otherTrekkerGender;
      trekkers["othersdob"] = othersdob;
      trekkers["othersweight"] = othersweight;
      trekkers["othersheight"] = othersheight;
      // res = JSON.stringify(trekkers);
      trekkersList.push(trekkers);
    }
    trekkersLists = trekkersList;

    // console.log(trekkersLists);
  }
  // alert(insurance);
}

function validate() {
  flag = 0;
  if (select_trek == "") {
    flag = 1;
    jQuery("#select-trek_error").html("Please select trek");
    jQuery("#select-trek_error").css("display", "block");
  } else {
    jQuery("#select-trek_error").html("Please select trek");
    jQuery("#select-trek_error").css("display", "none");
  }
  if (select_date == "") {
    flag = 1;
    jQuery("#select-date_error").html("Please select a date");
    jQuery("#select-date_error").css("display", "block");
  } else {
    jQuery("#select-date_error").html("Please select a date");
    jQuery("#select-date_error").css("display", "none");
  }
  if (firstname == "") {
    flag = 1;
    jQuery("#firstname_error").html("First name should not be empty");
    jQuery("#firstname_error").css("display", "block");
  } else {
    jQuery("#firstname_error").html("First name should not be empty");
    jQuery("#firstname_error").css("display", "none");
  }
  if (lastname == "") {
    flag = 1;
    jQuery("#lastname_error").html("Last name should not be empty");
    jQuery("#lastname_error").css("display", "block");
  } else {
    jQuery("#lastname_error").html("Last name should not be empty");
    jQuery("#lastname_error").css("display", "none");
  }
  if (Phone == "") {
    flag = 1;
    jQuery("#Phone_error").html("Phone number should not be empty");
    jQuery("#Phone_error").css("display", "block");
  } else {
    jQuery("#Phone_error").html("Phone number should not be empty");
    jQuery("#Phone_error").css("display", "none");
  }
  if (mail == "") {
    flag = 1;
    jQuery("#mail_error").html("Mail should not be empty");
    jQuery("#mail_error").css("display", "block");
  } else {
    jQuery("#mail_error").html("Mail should not be empty");
    jQuery("#mail_error").css("display", "none");
  }
  if (select_gender == "") {
    flag = 1;
    jQuery("#gender_error").html("Gender should not be empty");
    jQuery("#gender_error").css("display", "block");
  } else {
    jQuery("#gender_error").html("Gender should not be empty");
    jQuery("#gender_error").css("display", "none");
  }
  if (emergency == "") {
    flag = 1;
    jQuery("#emergency_error").html("Emergency number should not be empty");
    jQuery("#emergency_error").css("display", "block");
  } else {
    jQuery("#emergency_error").html("Emergency number should not be empty");
    jQuery("#emergency_error").css("display", "none");
  }
  if (dob == "") {
    flag = 1;
    jQuery("#dob_error").html("DOB should not be empty");
    jQuery("#dob_error").css("display", "block");
  } else {
    jQuery("#dob_error").html("DOB should not be empty");
    jQuery("#dob_error").css("display", "none");
  }
  if (weight == "") {
    flag = 1;
    jQuery("#weight_error").html("Weight should not be empty");
    jQuery("#weight_error").css("display", "block");
  } else {
    jQuery("#weight_error").html("Weight should not be empty");
    jQuery("#weight_error").css("display", "none");
  }
  if (height == "") {
    flag = 1;
    jQuery("#height_error").html("Height should not be empty");
    jQuery("#height_error").css("display", "block");
  } else {
    jQuery("#height_error").html("Height should not be empty");
    jQuery("#height_error").css("display", "none");
  }
  if (select_country == "") {
    flag = 1;
    toastr.warning("Country should not be empty", "Empty Error", {
      timeOut: 5000,
    });
  }
  if (State == "") {
    flag = 1;
    toastr.warning("State should not be empty", "Empty Error", {
      timeOut: 5000,
    });
  }
  if (City == "") {
    flag = 1;
    toastr.warning("City should not be empty", "Empty Error", {
      timeOut: 5000,
    });
  }
  if (drpNoOfTrekker == "") {
    flag = 1;
    toastr.warning("Trekkers count should not be empty", "Empty Error", {
      timeOut: 5000,
    });
  }
  if (terms == "") {
    flag = 1;
    toastr.warning("Terms should not be empty", "Empty Error", {
      timeOut: 5000,
    });
  }
  if (insurance == "") {
    flag = 1;
    toastr.warning("insurance should not be empty", "Empty Error", {
      timeOut: 5000,
    });
  }
  email = jQuery("#mail").val();
  phone1 = jQuery("#Phone").val();
  phone2 = jQuery("#emergency").val();

  Validatephones();
  ValidateEmail(email);
  checknumber1(phone1);
  checknumber2(phone2);

  return flag;
}

function changeVisibilitySeatsDeatails(id, identify) {
  data1 = id;
  data2 = $(identify).data("start");

  if (data1 == "" || data2 == "") {
    toastr.error("Some error occurred", "Oh no!");
    return;
  } else {
    data = new FormData();
    data.append("departure_id", data1);
    data.append("start_date", data2);
    data.append("action", "getBatchDataUser");
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
          $("#batch-details").html("");
          $("#batch-details").html(json.result);
        } else {
          toastr.error("Some error occurred", "Oh no!");
          return;
        }
      },
    });
  }
}

// To get departure date dynamically

function getTrekData(item) {
  if (item !== "") {
    data = new FormData();
    data.append("trek_id", item);
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

function ValidateEmail(val) {
  var mail1 = val;
  var mailformat =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (mail1.match(mailformat)) {
    jQuery("#mail_error").html("Please enter valid Email");
    jQuery("#mail_error").css("display", "none");
  } else {
    flag = 1;

    jQuery("#mail_error").html("Please enter valid Email");
    jQuery("#mail_error").css("display", "block");
  }
}

function checknumber1(value) {
  var phoneno = /^\d{10}$/;
  if (value.match(phoneno)) {
    jQuery("#Phone_error").html("Please enter valid Phone");
    jQuery("#Phone_error").css("display", "none");
    Validatephones();
    return;
  } else {
    jQuery("#Phone_error").html("Please enter valid Phone");
    jQuery("#Phone_error").css("display", "block");
    Validatephones();
    flag = 1;
  }
}

function checknumber2(value) {
  var phoneno = /^\d{10}$/;
  if (value.match(phoneno)) {
    jQuery("#emergency_error").html("Please enter valid Phone");
    jQuery("#emergency_error").css("display", "none");
    Validatephones();
    return;
  } else {
    jQuery("#emergency_error").html("Please enter valid Phone");
    jQuery("#emergency_error").css("display", "block");
    Validatephones();
    flag = 1;
  }
}

function Validatephones() {
  var phone1 = $("#Phone").val();
  var phone2 = $("#emergency").val();
  phone1S = phone1.toString().length;
  phone2S = phone2.toString().length;
  if (phone1S == 10 && phone2S == 10) {
    if (phone1 === phone2) {
      jQuery("#emergency_error").html("emergency number should be unique");
      jQuery("#emergency_error").css("display", "block");
      flag = 1;
    }
  }
}

function scrollToTop() {
  $(window).scrollTop(0.4);
}

function requestcancellation1(id) {
  // alert("Do you want to ancel this booking wit id "+id);
  var data = new FormData();
  data.append("booking_id", id);
  data.append("action", "requestTrekCancellation");
  swal({
    title: "Are you sure!",
    text: "Do you really want to cancel this trek?",
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
                text: "Cancellation request submitted! You will be get notified once the process is completed.",
                icon: "success",
                timer: 3000,
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

function requestcancellation2(id) {
  swal({
    title: "Processing!",
    text:
      "Your Cancellation request for trek '" +
      id +
      "' is processing!. We will notify you once it is completed.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  });
}

function seatTransfer(id, identifier) {
  data1 = $(identifier).data("trek");
  data2 = $(identifier).data("dep");
  if (id == "" || data1 == "" || data2 == "") {
    toastr.error("Some error occurred", "Oh no!");
    return;
  } else {
    data = new FormData();
    data.append("trek", data1);
    data.append("dep", data2);
    data.append("booking", id);
    data.append("action", "seatTransfer");
    jQuery("#seatTransferFetchData").empty();
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
            jQuery("#seatTransferFetchData").empty();
            jQuery("#seatTransferFetchData").append(json.info);
          }
        } else {
          toastr.error("Something wrong", "Oh no!");
        }
        jQuery("#loader").css("display", "none");
      },
    });
  }
}

function doTransfer() {
  book = jQuery("#transferCurrentBooking").val();
  date = jQuery("#trekDepartureSelect").val();
  if (book == "" || date == "") {
    toastr.error("All fields required!", "Oh no!");
    return;
  } else {
    data = new FormData();
    data.append("book", book);
    data.append("date", date);

    data.append("action", "TransferNow");

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
          if (json.result == "update") {
            swal({
              title: "Success!",
              text: "Seats Transfered Successfully!!",
              icon: "success",
              timer: 3000,
              buttons: false,
            }).then(() => {
              location.reload();
            });
          } else if (json.result == "update1") {
            swal({
              title: "You can't Tranfer!!",
              text: "Your cancellation request is under processing! Please try again later.",
              icon: "warning",
              timer: 3000,
              buttons: false,
            });
          } else if (json.result == "update2") {
            toastr.error("This trek is already cancelled!", "Oh no!");
          }
        } else {
          toastr.error("Something wrong", "Oh no!");
        }
        jQuery("#loader").css("display", "none");
      },
    });
  }
}

function getEventDetails(id) {
  if (id != "") {
    alert("Show details regarding event number " + id);
  } else {
    toastr.error("Some error occurred", "Oh no!");
  }
}