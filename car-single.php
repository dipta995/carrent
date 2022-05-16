<?php include 'header.php';

 if (empty($_GET['carid']) || $_GET['carid']==NULL|| !isset($_GET['carid'])) {
                    echo "<script>window.location='car.php';</script>";
         
                }
                else {
                    $carid=$_GET['carid'];
                    $query = "SELECT * FROM cars WHERE id=$carid";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        $value = mysqli_fetch_array($result);
                    }
                }
                  
 ?>
		

		<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="car-details">
      				<div class="img rounded" style="background-image: url(<?php echo $value['image']; ?>);"></div>
      				<div class="text text-center">
      					<span class="subheading"><?php echo $value['model']; ?></span>
      					<h2><?php echo $value['name']; ?></h2>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Mileage
		                	<span><?php echo $value['mileage']; ?> /Litter</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Transmission
		                	<span><?php echo $value['transmission']; ?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Seats
		                	<span><?php echo $value['seats']; ?> Adults</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Luggage
		                	<span><?php echo $value['luggage']; ?> Bags</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Fuel
		                	<span><?php echo $value['fuel']; ?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
      	</div>
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
							    </li>
							  </ul>
							</div>
							<style type="text/css">
								.ion-ios-close{
									color: red !important;
								}
							</style>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">

						    	<div class="row">
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="<?php echo ($value['airconditions']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Airconditions</li>
						    				<li class="check"><span class="<?php echo ($value['child_seat']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Child Seat</li>
						    				<li class="check"><span class="<?php echo ($value['gps']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>GPS</li>
						    				<li class="check"><span class="<?php echo ($value['luggage']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Luggage</li>
						    				<li class="check"><span class="<?php echo ($value['music']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Music</li>
						    			</ul>
						    		</div>
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="<?php echo ($value['seat_belt']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Seat Belt</li>
						    				<li class="remove"><span class="<?php echo ($value['sleeping_bed']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Sleeping Bed</li>
						    				<li class="check"><span class="<?php echo ($value['water']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Water</li>
						    				<li class="check"><span class="<?php echo ($value['bluetooth']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Bluetooth</li>
						    				<li class="remove"><span class="<?php echo ($value['onboard_computer']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Onboard computer</li>
						    			</ul>
						    		</div>
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="<?php echo ($value['audio_input']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Audio input</li>
						    				<li class="check"><span class="<?php echo ($value['long_term_trips']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Long Term Trips</li>
						    				<li class="check"><span class="<?php echo ($value['car_kit']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Car Kit</li>
						    				<li class="check"><span class="<?php echo ($value['remote_central_locking']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Remote central locking</li>
						    				<li class="check"><span class="<?php echo ($value['climate_control']==1) ? "ion-ios-checkmark" : "ion-ios-close"; ?>"></span>Climate control</li>
						    			</ul>
						    		</div>
						    	</div>
						    </div>

						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						      <p><?php echo $value['description']; ?></p>
						    </div>

						    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
						      <div class="row">
							   		<div class="col-md-7">
							   			<h3 class="head"><?php 
										   $query = "SELECT * FROM reviews left join users on users.id = reviews.user_id where  car_id = $carid";
										   $result = $con->query($query);
										   echo $result->num_rows; ?> Reviews</h3>
										   <?php
										 	  
											   if ($result->num_rows > 0) {
												   foreach ($result as $key => $review) {
													  
										   ?>
							   			<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left"><?php echo $review['name'] ?></span>
									   				<span class="text-right"><?php echo $review['comment_at'] ?></span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					
													   <?php
													     $rat = $review['rat'];
														 for ($i=0; $i < $rat ; $i++) { 
															 echo '<i class="ion-ios-star"></i>';														 }
														 ?>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p><?php echo $review['comment_at'] ?></p>
									   		</div>
									   	</div>
										   <?php }} ?>
								
							   		</div>
							   		<div class="col-md-5">
							   			<div class="rating-wrap">
								   			<h3 class="head">Give a Review</h3>
								   			<div class="wrap">
									   			<p class="star">
									   				<span>
													   <?php
													$query = "SELECT * FROM reviews where  car_id = $carid";
													$result = $con->query($query);
													if ($result->num_rows > 0) {
														$rat = 0;
														foreach ($result as $key => $rats) {
															$rat += $rats['rat'];
															
														}
													
                                                    $a = ceil($rat / $result->num_rows); 
                                                    if ($a == 0) {
                                                        echo "No ratting";
                                                    } elseif ($a == 1) {
                                                        echo "<i class='ion-ios-star'></i>";
                                                    } elseif ($a == 2) {
                                                        echo "<i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>";
                                                    } elseif ($a == 3) {
                                                        echo "<i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>";
                                                    } elseif ($a == 4) {
                                                        echo "<i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>";
                                                    } elseif ($a == 5) {
                                                        echo "<i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>
                                        <i class='ion-ios-star'></i>";
                                                    } else {
                                                    }
                                                }else{
													echo "no ratting";
												}
                                                ?>
									   					
								   					</span>
								   					<span><?php echo $result->num_rows; ?> Reviews</span>
									   			</p>
					<?php 
					                        $user_id =$_SESSION['id'];
						 $query = "SELECT * FROM reviews where user_id=$user_id and car_id = $carid";
						 $result = $con->query($query);
						 if ($result->num_rows > 0) { } else{
							if(isset($_POST['submit'])){
								$rat =$_POST['rat'];
								$comment = $_POST['comment'];

							$sql = "INSERT INTO reviews (user_id,car_id,rat,comment,comment_at)VALUES ('$user_id','$carid','$rat','$comment',date('m/d/Y'))";
							
							if ($con->query($sql) === TRUE) { 
							}
							}
							   
					?>				   		 
<form action="" method="post">								   		 
<p class="star">
	<div class="rating">
  <label>
    <input name="rat" type="radio" value="1" />
    <span class="icon">★</span>
  </label>
  <label>
    <input name="rat" type="radio" value="2" />
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input name="rat" type="radio" value="3" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>   
  </label>
  <label>
    <input name="rat" type="radio" value="4" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input name="rat" type="radio" value="5" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
 


							</div>
							<br>
  <textarea name="comment" id="" cols="10" rows="2"></textarea>
  <input type="submit" name="submit" class="btn btn-info">
									   			</p>
												   </form>	
												   <?php } ?>
									   		</div>
								   		</div>
							   		</div>
							   	</div>
						    </div>
						  </div>
						</div>
		      </div>
				</div>
      </div>
    </section>
	<div>
					 

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">

		  <?php if ($value['flag']==0) {
			   ?>
          	<span class="subheading"><a class="btn btn-primary py-2 ml-1" href="order.php?carid=<?php echo $value['id']; ?>">Book Now</a></span>
			  <?php } else{?>
				<span class="subheading"><a class="btn btn-danger py-2 ml-1" href="#">Out of Stock</a></span>
				<?php } ?>
            <h2 class="mb-2">Related Cars</h2>
          </div>
        </div>
        <div class="row">
        	<?php 
        	$seats = $value['seats'];
  $query = "SELECT * FROM cars WHERE seats=$seats order by rand() limit 3";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                         foreach ($result as $key => $val) {
                          
        	?>
        	<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo $val['image']; ?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="order.php?carid=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?php echo $val['model']; ?></span>
	    						<p class="price ml-auto"><?php echo $val['service_charge']; ?> <span>Taka/hour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="order.php?carid=<?php echo $val['id']; ?>" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.php?carid=<?php echo $val['id']; ?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    	 <?php }} ?>
    			 
        </div>
    	</div>
    </section>
	<style>
		.rating {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
}

.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rating label:last-child {
  position: static;
}

.rating label:nth-child(1) {
  z-index: 5;
}

.rating label:nth-child(2) {
  z-index: 4;
}

.rating label:nth-child(3) {
  z-index: 3;
}

.rating label:nth-child(4) {
  z-index: 2;
}

.rating label:nth-child(5) {
  z-index: 1;
}

.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rating label .icon {
  float: left;
  color: transparent;
}

.rating label:last-child .icon {
  color: #000;
}

.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: #09f;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px #09f;
}
	</style>
    
<?php include 'footer.php'; ?>