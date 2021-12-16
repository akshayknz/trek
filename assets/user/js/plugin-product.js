








jQuery(document).ready(function () {
// jQuery('#choice-select-trek').val("001");
var url_string = window.location.href; //window.location.href
var url = new URL(url_string);

var c = url.searchParams.get("num");

if (c==null) {
	jQuery('#choice-select-trek').val('A001');
}else{
	jQuery('#choice-select-trek').val(c);
}


jQuery('#choice-select-trek').on('change', function() {
  if(this.value=='A001'){
  	// alert(window.location.pathname);
  	window.location.replace(window.location.pathname);
  	// location.reload();
  }else if(this.value!==''){
  	trek = this.value;
  	getVendorTrek(trek);
  	
  }
});



});

function validateProfileUrl(trek,vendor){
	if((trek!='')||(vendor!='')){
		//code
		data = new FormData();
	    data.append('trek_id', trek);
	    data.append('vendor', vendor);
	    data.append('action', 'validateProfileUrl'); 
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
	                if (json.result == 'fetch') {

	                }
	            } else {
	                toastr.error('Some error occurred', 'Oh no!');
	            }
	        }
	    });
	}else{
		toastr.error('Some error occurred', 'Oh no!');
	}
}

function getVendorTrek(trek){
	if(trek!=''){
		//code
	data = new FormData();
    data.append('trek_id', trek);
    data.append('action', 'getVendorTrekMap'); 
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
                if (json.result == 'fetch') {
                   // return 
                
                    if(json.data != null){
	                   	vendor = json.data;
	                   	url = window.location.pathname;
	                   	append = `${url}?num=${trek}&ven=${vendor}`;
	                   	window.location.replace(append);
	                   	// alert(`Reload page with trek id ${trek} and vendor id ${vendor} and url ${append}`);
	                   }else{
	                   	 toastr.error('No Products Available for this trek', 'Vendor not exist!');
	                   	 return null;
	                   }
                }
            } else {
                toastr.error('Some error occurred', 'Oh no!');
            }
        }
    });
	}else{
		toastr.error('Some error occurred', 'Oh no!');
	}
}


function exploreTreks(){
	$(".exploreNewTreks").html("<h1>Hello TTH</h1>")
}





// function choiceProductTrek(val){
// 	selVendor ='';selTrek ='';selDeparture ='';
// 	selTrek = jQuery("#choice-select-trek").val();
// 	selDeparture = jQuery("#choice-select-departure").val();
// 	if((selTrek=='')||(selDeparture=='')){
// 		jQuery("#choice-select-vendor").val('');
// 		jQuery("#choice-select-vendor").css("display","none");
// 	}else{
// 		jQuery("#choice-select-vendor").css("display","block");
// 	}
// 	alert(selTrek);

// }
// function choiceProductDeparture(val){
// 	selTrek ='';selTrek ='';selDeparture ='';
// 	selTrek = jQuery("#choice-select-trek").val();
// 	selDeparture = jQuery("#choice-select-departure").val();
// 	if((selTrek=='')||(selDeparture=='')){
// 		jQuery("#choice-select-vendor").val('');
// 		jQuery("#choice-select-vendor").css("display","none");
// 	}else{
// 		jQuery("#choice-select-vendor").css("display","block");
// 	}
// 	alert(selDeparture);

// }
// function choiceProductVendor(val){
// 	selVendor ='';selTrek ='';selDeparture ='';
// 	selTrek = jQuery("#choice-select-trek").val();
// 	selDeparture = jQuery("#choice-select-departure").val();
// 	if((selTrek=='')||(selDeparture=='')){
// 		jQuery("#choice-select-vendor").val('');
// 		jQuery("#choice-select-vendor").css("display","none");
// 		return;
// 	}
// 	selVendor = jQuery("#choice-select-vendor").val();
// 	alert(selVendor);

// }