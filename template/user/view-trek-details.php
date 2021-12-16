<head><link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/><link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet"/><style>body{background-color:#f9f9fa}.padding{padding:18px}.user-card-full{overflow:auto;width:100%}.card{border-radius:5px;-webkit-box-shadow:0 1px 20px 0 rgba(69, 90, 100, 0.08);box-shadow:0 1px 20px 0 rgba(69,90,100,0.08);border:none;margin-bottom:30px}.m-r-0{margin-right:0px}.m-l-0{margin-left:0px}.user-card-full .user-profile{border-radius:5px 0 0 5px}.bg-c-lite-green{background:-webkit-gradient(linear, left top, right top, from(#F29263), to(#EE5A6F));background:linear-gradient(to right,#EE5A6F,#F29263)}.user-profile{padding:20px 0}.card-block{padding:1.25rem}.m-b-25{margin-bottom:25px}.img-radius{border-radius:5px}h6{font-size:14px}.card .card-block p{line-height:25px}@media only screen and (min-width: 1400px){p{font-size:14px}}.tx{min-height:200px;max-height:200px;overflow:auto}.card-block{padding:1.25rem}.b-b-default{border-bottom:1px solid #E0E0E0}.m-b-20{margin-bottom:20px}.p-b-5{padding-bottom:5px !important}.card .card-block p{line-height:25px}.m-b-10{margin-bottom:10px}.text-muted{color:#000 !important}.b-b-default{border-bottom:1px solid #E0E0E0}.f-w-600{font-weight:700;font-size:16px}.m-b-20{margin-bottom:20px}.m-t-40{margin-top:20px}.p-b-5{padding-bottom:5px !important}.m-b-10{margin-bottom:10px}.m-t-40{margin-top:20px}.user-card-full .social-link li{display:inline-block}.user-card-full .social-link li a{font-size:20px;margin:0 10px 0 0;-webkit-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}.t{color:tomato}</style> <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script> <script type="text/javascript"></script> </head><body class="snippet-body"><div class="page-content page-container" id="page-content"><div class="padding"><div class=""><div class="col-xl-12 col-md-12 container" ><div class="card user-card-full" style="border-style: solid;"><div class="row m-l-0 m-r-0"><div class="col-sm-12"><div class="card-block"><div style="text-align: center;"><h1 class="">'.$result->trek_name.'</h1><hr></div><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Trek Cost</p><h6 class="text-muted f-w-400"><a href="mailto:query@trekthehimalayas.com">query@trekthehimalayas.com</a>  </h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Service tax</p><h6 class="text-muted f-w-400">INR &nbsp;'.$result->trek_service_tax.'</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Days</p><h6 class="text-muted f-w-400">'.$result->trek_days.'</h6></div></div><hr><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Country</p><h6 class="text-muted f-w-400">'.$result->trek_region_country.'</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">State</p><h6 class="text-muted f-w-400">'.$result->trek_region_state.'</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">City</p><h6 class="text-muted f-w-400">'.$result->trek_region_city.'</h6></div></div><hr><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Grade</p><h6 class="text-muted f-w-400">'.$result->trek_grade.'</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Altitude</p><h6 class="text-muted f-w-400">'.$result->trek_altitude.' FT</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Distance</p><h6 class="text-muted f-w-400">'.$result->trek_distance.' Km</h6></div></div><hr><div class="row"><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Trek Flags</p><h6 class="text-muted f-w-400">'.$result->trek_selected_flags.'</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Best Season</p><h6 class="text-muted f-w-400">'.$result->trek_best_months.'</h6></div><div class="col-sm-4"><p class="m-b-10 f-w-600 t">Total Seats</p><h6 class="text-muted f-w-400">'.$result->trek_total_seats.'</h6></div></div><hr><div class="row"><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Transportation</p><h6 class="text-muted f-w-400">'.$result->trek_transportation.'</h6></div><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Trail Type</p><h6 class="text-muted f-w-400">'.$result->trek_trail_type.'</h6></div><div class="col-sm-4 tx "><p class="m-b-10 f-w-600 t">About the Trek</p><h6 class="text-muted f-w-400">'.$trek_about.'</h6></div></div><hr><div class="row"><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Overview</p><h6 class="text-muted f-w-400">'.$trek_overview.'</h6></div><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Trek brief</p><h6 class="text-muted f-w-400">'.$trek_brief.'</h6></div><div class="col-sm-4 tx"><p class="m-b-10 f-w-600 t">Pick up & Drop</p><h6 class="text-muted f-w-400">'.$trek_how_reach.'</h6></div><hr><div class="col-sm-12 tx pull-right" style="margin-top:10px;"><p class="m-b-10 f-w-600 t" style="color:blue;">Cancellation Policy</p><h6 class="text-muted f-w-400"><a data-toggle="modal" data-target="#myModal"style="color:blue;">Cancellation Policy</a></h6></div></div><hr></div></div></div></div></div></div></div></div><div class="modal" id="myModal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title">'.$resultPolicyName.'</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><p>'.$resultPolicyContent.'</p></div><div class="modal-footer"> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></div></div></div></div></body>