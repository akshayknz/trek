<div class="col-md-3 col-sm-6 item"><div class="card item-card card-block"><h4 class="card-title text-right"><a class="btn btn-primary" onclick="bookNow()">Book Now</a></h4> <img src="'.$result[$i]->trek_profile_image.'" alt="Photo of sunset"style="height:120px; width:250px;"><h5 class="item-card-title mt-3 mb-3">'.$result[$i]->trek_name.'</h5><div class="card-text"><tr><td>Distance:</td><td>'.$result[$i]->trek_distance.'</td></tr><br><tr><td>Grade:</td><td>'.$result[$i]->trek_grade.'</td><tr><br><tr><td>Altitude:</td><td>'.$result[$i]->trek_altitude.'FT</td></tr><br><a href="/trek/index.php/trek-details?trek='.$result[$i]->id.'" target="_blank">View Details</a></div></div></div>