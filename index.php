<?php include 'header.php';  ?>
<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
			<div class="col-lg-8 ftco-animate">
				<div class="text w-100 text-center mb-md-5 pb-md-5">
					<h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
					<p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
					<a href="https://vimeo.com/337649532" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="ion-ios-play"></span>
						</div>
						<div class="heading-title ml-5">
							<span>Easy steps for renting a car</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>



<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">What we offer</span>
				<h2 class="mb-2">Featured Vehicles</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="carousel-car owl-carousel">
					<?php

					$query = "SELECT * FROM cars WHERE flag=0 order by rand() limit 10";
					$result = $con->query($query);
					if ($result->num_rows > 0) {
						foreach ($result as $key => $val) {

					?>
							<div class="item">
								<div class="car-wrap rounded ftco-animate">
									<div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo $val['image']; ?>);">
									</div>
									<div class="text">
										<h2 class="mb-0"><a href="#"><?php echo $val['name']; ?></a></h2>
										<div class="d-flex mb-3">
											<span class="cat"><?php echo $val['model']; ?></span>
											<p class="price ml-auto"><?php echo $val['service_charge']; ?> <span>Taka/hour</span></p>
										</div>
										<p class="d-flex mb-0 d-block"><a href="order.php?carid=<?php echo $val['id']; ?>" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.php?carid=<?php echo $val['id']; ?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
									</div>
								</div>
							</div>
					<?php }
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Testimonial</span>
				<h2 class="mb-3">Happy Clients</h2>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel ftco-owl">
					<?php

					$query = "SELECT * FROM testimonials  LEFT JOIN users ON users.id = testimonials.customer_id where status=1 order by rand()";
					$result = $con->query($query);
					if ($result->num_rows > 0) {
						foreach ($result as $key => $val) {

					?>
							<div class="item">
								<div class="testimony-wrap rounded text-center py-4 pb-5">
									<div class="user-img mb-2" style="background-image: url(<?php echo $val['image']; ?>)">
									</div>
									<div class="text pt-4">
										<p class="mb-4"><?php echo $val['comment']; ?></p>
										<p class="name"><?php echo $val['name']; ?></p>
										<!-- <span class="position">Marketing Manager</span> -->
									</div>
								</div>
							</div>
					<?php	}
					}   ?>
					<!-- <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_2.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_3.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div> -->
				</div>
			</div>
			<div style="margin:auto;">
				<a href="add-testimonial.php" class="btn btn-success">Add Your FeedBack</a>
			</div>
		</div>
	</div>
</section>





<?php include 'footer.php'; ?>