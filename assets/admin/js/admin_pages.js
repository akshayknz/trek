jQuery(document).ready(function() {
   newsImage = [];
});

function edit_this_mail() {
   // body...
   var mail = $("#tth_pages_mail").html();
   $("#tth-pages-mail").val(mail);
}

function edit_this_c1() {
   // body...
   var c1 = $("#tth_pages_c1").html();
   $("#tth-pages-c1").val(c1);

}
function edit_this_w1() {
   // body...
   var c1 = $("#tth_pages_w1").html();
   $("#tth-pages-working-hours").val(c1);

}
function edit_this_b1() {
   // body...
   var c1 = $("#tth_pages_b1").html();
   $("#tth-pages-business").val(c1);

}

function edit_this_c2() {
   // body...
   var c2 = $("#tth_pages_c2").html();
   $("#tth-pages-c2").val(c2);

}

function updateContactMail() {
   var dataVal = $("#tth-pages-mail").val();
   if (dataVal == '') {
      alert("Sorry mail should not be empty!");
      return;
   } else {
      // update data
      var data = new FormData();
      data.append('dataVal', dataVal);
      data.append('action', 'contactMail');
      data.append('actionId', '6563');


      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);

            if (json.statusCode == 200) {

               if (json.result == 'updated') {

                  location.reload();
               }
            } else {
               alert("Some error occured!");
            }
         }
      });
   }
}

function updateContactC1() {
   var dataVal = $("#tth-pages-c1").val();
   if (dataVal == '') {
      alert("Sorry Phone number should not be empty!");
      return;
   } else {
      // update data
      var data = new FormData();
      data.append('dataVal', dataVal);
      data.append('action', 'contactMail');
      data.append('actionId', '6543');


      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);

            if (json.statusCode == 200) {

               if (json.result == 'updated') {

                  location.reload();


               }
            } else {
               alert("Some error occured!");
            }
         }
      });
   }
}

function updateWorkingHours() {
   var dataVal = $("#tth-pages-working-hours").val();
   if (dataVal == '') {
      alert("Sorry Working hours should not be empty!");
      return;
   } else {
      // update data
      var data = new FormData();
      data.append('dataVal', dataVal);
      data.append('action', 'contactMail');
      data.append('actionId', '6277');


      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);

            if (json.statusCode == 200) {

               if (json.result == 'updated') {

                  location.reload();
               }
            } else {
               alert("Some error occured!");
            }
         }
      });
   }
}

function updateBusiness() {
   var dataVal = $("#tth-pages-business").val();
   if (dataVal == '') {
      alert("Sorry Business Info should not be empty!");
      return;
   } else {
      // update data
      var data = new FormData();
      data.append('dataVal', dataVal);
      data.append('action', 'contactMail');
      data.append('actionId', '6288');


      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);

            if (json.statusCode == 200) {

               if (json.result == 'updated') {

                  location.reload();
               }
            } else {
               alert("Some error occured!");
            }
         }
      });
   }
}
// NewsLetter

function createNewsLetter() {

   var news_title = $("#news-title").val();
   var news_sub_title = $("#news-sub-title").val();
   var news_know_more = $("#news-know-more").val();
   var news_category = $("#tth-news-category").val();
// Check know more url

   // if (news_know_more != undefined || news_know_more != '') {
   // var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
   // var match = news_know_more.match(regExp);
   // if (match && match[2].length == 11) {
   //    if(news_category=='info'){
   //       news_category = 'info-video';
   //    }
   //    }
   // }




   if (newsImage[0] != '') {
      var news_cover_photo = newsImage[0];
      jQuery("#news-note").html("Cover photo selected");
   } else {
      jQuery("#news-note").html("Cover photo required!");
      swal("Warning","You should select the Cover Photo");
      return;
   }
 
   var news_priority = $("#news-priority").val();
   if(news_category=='slider'){
      var news_content = 'Slider for tth home page';
      
   }else{
      var news_content = CKEDITOR.instances.news_content.getData();
       news_content = news_content.replace(/"/g, "&&");
   }
  

   if ((news_title == '') || (news_sub_title == '') || (newsImage == '') || (news_priority == '') || (news_content == '')||(news_know_more=='')) {
      swal("Warning","All fields required");
      return;
   } else {
      var data = new FormData();
      data.append('news_title', news_title);
      data.append('news_category', news_category);
      data.append('news_sub_title', news_sub_title);
      data.append('newsImage', news_cover_photo);
      data.append('news_know_more', news_know_more);
      data.append('news_priority', news_priority);
      data.append('action', 'addNews');
      data.append('news_content', news_content);
      jQuery("#loader").css("display", "block");

      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);
            jQuery("#loader").css("display", "none");
            if (json.statusCode == 200) {

               if (json.result == 'inserted') {
                 swal("Success","Added successfully!");

                  location.reload();
               }
            } else {
               swal("Warning","Some error occured!");
            }
         }
      });
   }

}

function updateNewsLetter() {
  
   var news_id = '';
   var news_id = $("#news-id-edit").val();
   var news_title = $("#news-title-edit").val();
   var news_sub_title = $("#news-sub-title-edit").val();
   var news_know_more = $("#news-know-more-edit").val();
   var tth_news_category = $("#tth-news-category-edit").val();
   // if (news_know_more != undefined || news_know_more != '') {
   // var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
   // var match = news_know_more.match(regExp);
   // if (match && match[2].length == 11) {
   //    if(tth_news_category=='info'){
   //       tth_news_category = 'info-video';
   //    }
   //    }
   // }


   if (newsImage.length>0) {
      var news_cover_photo = newsImage[0];
   }else{
      news_cover_photo ='';
   }

   var news_priority = $("#news-priority-edit").val();
   var news_content = CKEDITOR.instances.news_content_edit.getData();
   var news_content = news_content.replace(/"/g, "&&");
   if ((news_title == '') || (news_sub_title == '') || (news_priority == '') || (news_content == '')||(news_know_more=='')) {
      swal("Warning","All fields required!");
      return;
   } else {
      var data = new FormData();
      data.append('news_title', news_title);
       data.append('news_know_more', news_know_more);
      data.append('news_sub_title', news_sub_title);
      if (news_cover_photo != '') {
         data.append('newsImage', news_cover_photo);
      } else {
         data.append('newsImage', '');
      }

      data.append('news_priority', news_priority);
      data.append('action', 'updateNews');
      data.append('tth_news_category', tth_news_category);
      data.append('news_content', news_content);
      data.append('news_id', news_id);

      jQuery("#loader").css("display", "block");
      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);
            jQuery("#loader").css("display", "none");
            if (json.statusCode == 200) {

               if (json.result == 'updated') {
                  swal("Success","Updated Successfully");

                  location.reload();
               }
            } else {
             swal("Warning","Some error occured!");
            }
         }
      });
   }
}

function updateNewsLetterFetch(id) {

   if (id == '') {
      swal("Warning","Something went wrong!");
      return;
   }
   var data = new FormData();

   data.append('action', 'getNews');
   data.append('news_id', id);

   jQuery("#loader").css("display", "block");
   jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_objs.ajax_url_pages,
      data: data,
      success: function(msg) {

         json = JSON.parse(msg);

         if (json.statusCode == 200) {

            if (json.result == 'fetched') {
               // alert(json.message[0].trek_tth_title);
               $("#news-title-edit").val(json.message[0].trek_tth_title);
               $("#news-sub-title-edit").val(json.message[0].trek_tth_sub);
               $("#news-know-more-edit").val(json.message[0].tth_know_more);
               $("#tth-news-category-edit").val(json.message[0].trek_tth_category);
               // var news_cover_photo = newsImage[0];
               $("#news_tth_cover_edit").attr("src", json.message[0].trek_tth_news_poster);
               $("#news-priority-edit").val(json.message[0].trek_tth_news_priority);
               $("#news-id-edit").val(json.message[0].id);
               var news_content = json.message[0].trek_tth_content;
               var news_content = news_content.replace(/"/g, "&&");
               CKEDITOR.instances.news_content_edit.setData(news_content);
               jQuery("#loader").css("display", "none");
            }
         } else {
           swal("Warning","Some error occured!");
         }
      }
   });
}

function deleteNewsLetter(id) {

   if (id == '') {
     swal("Warning","Some error occured!");
      return;
   }
   var data = new FormData();

   data.append('action', 'deleteNews');
   data.append('news_id', id);

   jQuery("#loader").css("display", "block");
   jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_objs.ajax_url_pages,
      data: data,
      success: function(msg) {

         json = JSON.parse(msg);
         jQuery("#loader").css("display", "none");
         if (json.statusCode == 200) {

            if (json.result == 'deleted') {
               swal("Success","Deleted Successfully!");

               location.reload();
            }
         } else {
            swal("Warning","Some error occured!");
      }
   }
   });
}


// function uploadNewsImage() {
//    newsImage = [];
//    var images = wp.media({
//       title: "Upload Images",
//       multiple: false,
//       library: {
//          type: 'image'
//       },
//    }).open().on("select", function(e) {

//       var uploadedImages = images.state().get("selection");

//       // selectimg=uploadedImages.toJSON();
//       // ;
//       count = uploadedImages.toJSON().length;
//       selectimage = uploadedImages.toJSON();
//       if (count == 1) {
//          result = selectimage[0].url;
//       }
//       newsImage.push(result);

//    })

// }


// End NewsLetter 


// Team members

function createTeamMember() {

   var role = $("#people-role").val();
   var people_priority = $("#people-priority").val();
   var people_name = $("#people-name").val();
   var people_description = $("#people-description").val();
   var people_description_long = $("#people-description-long").val();

   if (newsImage[0] != '') {
      var people_image = newsImage[0];

   }


   if ((role == '') || (people_priority == '') || (people_name == '') || (people_image == '') || (people_description == '')|| (people_description_long == '')) {
      alert("All fields required!");
      return;
   } else {
      var data = new FormData();
      data.append('role', role);
      data.append('people_priority', people_priority);
      data.append('people_name', people_name);
      data.append('people_image', people_image);
      data.append('people_description', people_description);
      data.append('people_description_long', people_description_long);
      data.append('action', 'addMember');

      jQuery("#loader").css("display", "block");

      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);
            jQuery("#loader").css("display", "none");
            if (json.statusCode == 200) {

               if (json.result == 'inserted') {
                  alert("Member added!");

                  location.reload();
               }
            } else {
               alert("Some error occured!");
            }
         }
      });
   }

}

function EditTeamMember() {
   // alert("update news");
   var people_id = '';
   people_id = $("#people-id-edit").val();
   var role = $("#people-role-edit").val();
   var people_priority = $("#people-priority-edit").val();
   var people_name = $("#people-name-edit").val();
   var people_description = $("#people-description-edit").val();
   var people_description_long = $("#people-description-long-edit").val();
   var people_image = "";
   if (newsImage[0] != '') {
       people_image = newsImage[0];

   }
   
   if ((role == '') || (people_priority == '') || (people_name == '') || (people_description == '')|| (people_description_long == '')) {
      alert("All fields required!");
      return;
   } else {
      var data = new FormData();
      data.append('role', role);
      data.append('people_priority', people_priority);
      data.append('people_name', people_name);
      if ((people_image != '')||(people_image != 'undefined')) {
         data.append('people_image', people_image);
        
      } else {
         data.append('people_image', '');
        
      }

      data.append('people_description', people_description);
      data.append('people_description_long', people_description_long);
      data.append('people_id', people_id);
      data.append('action', 'updatePeople');

      // for (var pair of data.entries()) {
      //     console.log(pair[0]+ ', ' + pair[1]); 
      // }
      // return;
      // alert(people_id);

      jQuery("#loader").css("display", "block");
      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);
            jQuery("#loader").css("display", "none");
            if (json.statusCode == 200) {

               if (json.result == 'updated') {
                  // alert("Updated!");

                  location.reload();
               }
            } else {
               alert("Some error occured!");
            }
         }
      });
   }
}


function EditTeamMemberFetch(id) {
   newsImage = [];
   if (id == '') {
      alert("Something went wrong!");
      return;
   }
   var data = new FormData();

   data.append('action', 'getPeople');
   data.append('people_id', id);

   jQuery("#loader").css("display", "block");
   jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_objs.ajax_url_pages,
      data: data,
      success: function(msg) {

         json = JSON.parse(msg);

         if (json.statusCode == 200) {

            if (json.result == 'fetched') {

               $("#people-role-edit").val(json.message[0].trek_tth_role);
               $("#people-priority-edit").val(json.message[0].trek_tth_role_priority);
               $("#people-image-edit").attr("src", json.message[0].trek_tth_images);
               $("#people-name-edit").val(json.message[0].trek_tth_name);
               $("#people-description-edit").val(json.message[0].trek_tth_short_description);
               $("#people-description-long-edit").val(json.message[0].trek_tth_long_description);
               $("#people-id-edit").val(json.message[0].id);

               jQuery("#loader").css("display", "none");
            }
         } else {
            alert("Some error occured!");
         }
      }
   });
}

function deletePeople(id) {


   if (id == '') {
      alert("Something went wrong!");
      return;
   }
   var data = new FormData();

   data.append('action', 'deletePeople');
   data.append('people_id', id);

   jQuery("#loader").css("display", "block");
   jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_objs.ajax_url_pages,
      data: data,
      success: function(msg) {

         json = JSON.parse(msg);
         jQuery("#loader").css("display", "none");
         if (json.statusCode == 200) {

            if (json.result == 'deleted') {
               alert("Deleted!");

               location.reload();
            }
         } else {
            alert("Some error occured!");
         }
      }
   });
}

// End Team Memeber

// Award selection

function createRecoginition() {

   var role = 'recoginition';
   var tth_award_brief = $("#tth-award-brief").val();
   var award_priority_rec = $("#tth-award-priority-rec").val();
   console.log(tth_award_brief);
   if ((newsImage[0] == 'undefined') || (newsImage[0] != '')) {
      var award_image = newsImage[0];

   } else {
      alert("You should select an image");
   }


   if ((role == '') || (tth_award_brief == '') || (award_priority_rec == '') || (award_image == '')) {
      alert("All fields required!");
      return;
   } else {
      var data = new FormData();
      data.append('role', role);
      data.append('tth_award_brief', tth_award_brief);
      data.append('award_priority', award_priority_rec);
      data.append('award_image', award_image);
      data.append('action', 'addAwards');


      jQuery("#loader").css("display", "block");

      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);
            jQuery("#loader").css("display", "none");
            if (json.statusCode == 200) {

               if (json.result == 'inserted') {
                  alert("Award added!");

                  location.reload();
               }
            } else {
               alert("Some error occured!");
            }
         }
      });
   }

}


function createCertification() {

   var role = 'certification';
   var award_title = $("#tth-award-name").val();
   var award_priority = $("#tth-award-priority").val();

   if ((newsImage[0] == 'undefined') || (newsImage[0] != '')) {
      var award_image = newsImage[0];
      $("#tth-award-img").attr("src", award_image);

   } else {
      alert("You should select an image");
      return;
   }


   if ((role == '') || (award_title == '') || (award_priority == '') || (award_image == '')) {
      alert("All fields required!");
      return;
   } else {
      var data = new FormData();
      data.append('role', role);
      data.append('award_title', award_title);
      data.append('award_priority', award_priority);
      data.append('award_image', award_image);
      data.append('action', 'addAwards');

      jQuery("#loader").css("display", "block");

      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);
            jQuery("#loader").css("display", "none");
            if (json.statusCode == 200) {

               if (json.result == 'inserted') {
                  alert("Award added!");

                  location.reload();
               }
            } else {
               alert("Some error occured!");
            }
         }
      });
   }

}

function EditAwards() {
   var breif = $("#tth-award-berif-rec-edit").val();
   var priority = $("#tth-award-priority-rec-edit").val();
   var award_id = $("#award_edit_id").val();



   if ((breif == '') || (priority == '') || (award_id == '')) {
      alert("All fields required!");
      return;
   } else {
      var data = new FormData();
      data.append('breif', breif);
      data.append('priority', priority);
      data.append('award_id', award_id);
      data.append('action', 'EditAwards');

      // for (var pair of data.entries()) {
      //     console.log(pair[0]+ ', ' + pair[1]); 
      // }
      // return;
      // alert(people_id);

      jQuery("#loader").css("display", "block");
      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);
            jQuery("#loader").css("display", "none");
            if (json.statusCode == 200) {

               if (json.result == 'updated') {
                  alert("Updated!");

                  location.reload();
               }
            } else {
               alert("Some error occured!");
            }
         }
      });
   }
}


function EditAwardFetch(id) {

   if (id == '') {
      alert("Something went wrong!");
      return;
   }
   var breif = $("#recoginition_breif_" + id).val();
   var priority = $("#recoginition_priority_" + id).val();

   $("#tth-award-berif-rec-edit").val(breif);
   $("#tth-award-priority-rec-edit").val(priority);
   $("#award_edit_id").val(id);


}

function deleteAward(id) {


   if (id == '') {
      alert("Something went wrong!");
      return;
   }
   var data = new FormData();

   data.append('action', 'deleteAward');
   data.append('award_id', id);

   jQuery("#loader").css("display", "block");
   jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_objs.ajax_url_pages,
      data: data,
      success: function(msg) {

         json = JSON.parse(msg);
         jQuery("#loader").css("display", "none");
         if (json.statusCode == 200) {

            if (json.result == 'deleted') {
               swal("Deleted!");

               location.reload();
            }
         } else {
            swal("Some error occured!");
         }
      }
   });
}



// End Award


// Video Reviews

function createVideoReview() {

   var video_name = $("#video-name").val();
   var video_title = $("#video-title").val();
   var video_year = $("#video-year").val();
   var video_priority = $("#video-priority").val();
   var video_url = $("#video-url").val();
   var video_trek = $("#video-trek").val();


   if ((video_trek == '') ||(video_name == '') || (video_title == '') ||  (video_year == '') || (video_priority == '') || (video_url == '')) {
     swal("Warning","All requirement");
      return;
   } else {
      var data = new FormData();
      data.append('video_name', video_name);
      data.append('video_title', video_title);
      // data.append('video_image', video_image);
      data.append('video_year', video_year);
      data.append('action', 'addVideoRev');
      data.append('video_priority', video_priority);
      data.append('video_url', video_url);
      data.append('video_trek', video_trek);
      //    for (var pair of data.entries()) {
      //     console.log(pair[0]+ ', ' + pair[1]); 
      // }
      // return;
      jQuery("#loader").css("display", "block");

      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);
            jQuery("#loader").css("display", "none");
            if (json.statusCode == 200) {

               if (json.result == 'inserted') {
                 
                  swal("Success","Video Review Added!");

                  location.reload();
               }
            } else {
             
                swal("Warning","Some error occured!");
            }
         }
      });
   }

}

function updateVideoReview() {
   
   var video_name = $("#video-name-edit").val();
   var video_title = $("#video-title-edit").val();
   // console.log(newsImage[0]);
   if (newsImage.length > 0) {
      var video_image = newsImage[0];
   }

   var video_year = $("#video-year-edit").val();
   var video_priority = $("#video-priority-edit").val();
   var video_url = $("#video-url-edit").val();
   var video_id = $("#video-id-edit").val();
   var video_trek = $("#video-trek-edit").val();
   if (video_id == '') {
     
                swal("Warning","Something went wrong!");

      return;
   }


   if ((video_trek == '') ||(video_name == '') || (video_title == '') || (video_year == '') || (video_priority == '') || (video_url == '')) {
      swal("Warning","All fields required!");
      return;
   } else {
      var data = new FormData();
      data.append('video_name', video_name);
      data.append('video_title', video_title);
      if (newsImage.length > 0) {
         data.append('video_image', video_image);
      } else {
         data.append('video_image', '');
      }

      data.append('video_year', video_year);
      data.append('video_id', video_id);
      data.append('action', 'updateVideoRev');
      data.append('video_priority', video_priority);
      data.append('video_url', video_url);
       data.append('video_trek', video_trek);
    

      jQuery("#loader").css("display", "block");
      jQuery.ajax({
         type: "post",
         cache: false,
         contentType: false,
         processData: false,
         url: my_objs.ajax_url_pages,
         data: data,
         success: function(msg) {

            json = JSON.parse(msg);
            jQuery("#loader").css("display", "none");
            if (json.statusCode == 200) {

               if (json.result == 'updated') {
                  swal("Success","Review Updated!");

                  location.reload();
               }
            } else {
               swal("Warning","Some error occured!");
            }
         }
      });
   }
}

function updateVideoReviewFetch(id) {
   if (id == '') {
      swal("Warning","Something went wrong!");
      return;
   }
   var data = new FormData();

   data.append('action', 'getVideoRev');
   data.append('video_id', id);

   jQuery("#loader").css("display", "block");
   jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_objs.ajax_url_pages,
      data: data,
      success: function(msg) {

         json = JSON.parse(msg);

         if (json.statusCode == 200) {

            if (json.result == 'fetched') {
               // alert(json.message[0].trek_tth_title);
               $("#video-name-edit").val(json.message[0].trek_tth_name);
               $("#video-title-edit").val(json.message[0].trek_tth_title);
               // var news_cover_photo = newsImage[0];
               var img = ' <img src="' + json.message[0].trek_tth_video_poster + '" id="video-image-edit" style="max-height: 200px;max-width: 200px;"><br>';
               $("#image-container").html(img);
               $("#video-priority-edit").val(json.message[0].trek_tth_video_priority);
               $("#video-trek-edit").val(json.message[0].assigned_trek);
               $("#video-year-edit").val(json.message[0].trek_tth_year);
               $("#video-url-edit").val(json.message[0].trek_tth_video_url);
               $("#video-id-edit").val(json.message[0].id);


               jQuery("#loader").css("display", "none");
            }
         } else {
            swal("Warning","Some error occured!");
         }
      }
   });
}

function deleteVideoReview(id) {
   
   if (id == '') {
      swal("Warning","Something went wrong!");
      return;
   }
   var data = new FormData();

   data.append('action', 'deleteVideoRev');
   data.append('video_id', id);
    var didConfirm = confirm("Are you sure You want to delete");
      if (didConfirm == false) {
         return;
      }
   jQuery("#loader").css("display", "block");
   jQuery.ajax({
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      url: my_objs.ajax_url_pages,
      data: data,
      success: function(msg) {

         json = JSON.parse(msg);
         jQuery("#loader").css("display", "none");
         if (json.statusCode == 200) {

            if (json.result == 'deleted') {
               swal("Success","Review Deleted!");

               location.reload();
            }
         } else {
            swal("Warning","Some error occured!");
         }
      }
   });
}


function uploadNewsImage() {
   newsImage = [];
   var images = wp.media({
      title: "Upload Images",
      multiple: false,
      library: {
         type: 'image'
      },
   }).open().on("select", function(e) {

      var uploadedImages = images.state().get("selection");

      // selectimg=uploadedImages.toJSON();
      // ;
      count = uploadedImages.toJSON().length;
      selectimage = uploadedImages.toJSON();
      if (count == 1) {
         result = selectimage[0].url;
      }
      newsImage.push(result);
  
      jQuery("#review-note").html("<h6 style='color:green;'font-style:italic;>Cover photo added</h6>");
      jQuery("#news-note").html("<h6 style='color:green;'font-style:italic;>Cover photo added</h6>");

   })

}



// End Videos




// function uploadNewsImage() {
//    newsImage = [];
//    var images = wp.media({
//       title: "Upload Images",
//       multiple: false,
//       library: {
//          type: 'image'
//       },
//    }).open().on("select", function(e) {

//       var uploadedImages = images.state().get("selection");

//       // selectimg=uploadedImages.toJSON();
//       // ;
//       count = uploadedImages.toJSON().length;
//       selectimage = uploadedImages.toJSON();
//       if (count == 1) {
//          result = selectimage[0].url;
//       }
//       newsImage.push(result);

//    })

// }