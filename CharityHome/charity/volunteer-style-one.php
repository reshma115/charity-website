<?php include('header.php'); ?>

<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Volunteer</h2>
					<ul class="breadcumb">
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Volunteer</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


	<section class="sec-padding meet-Volunteer pb_30">
		<div class="container">
			<div class="row">
			<?php 
			include('config.php');
			$stmt = $conn->prepare("SELECT * FROM volunteer");
			$stmt->execute();
			while($volunteer=$stmt->fetch())
			{
				?>
				<div class="col-md-3">
					<div class="single-team-member mb_60">
						<div class="img-box">
							<img class="full-width" src="<?php echo $volunteer['image_path']; ?>" alt="">
							<div class="overlay">
								<div class="box">
									<div class="content">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h3><?php echo $volunteer['name']; ?></h3>
						<span><?php echo $volunteer['designation']; ?></span>
						<p><?php echo $volunteer['description']; ?></p>
						<!-- <a href="volunteer-profile.php" class="thm-btn">View Profile</a> -->
					</div>
				</div>
				<?php } ?>
				
				
				
				
				
				
			</div>
		</div>
	</section>


	<!-- <section class="overlay-white sec-padding parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 promote-project text-center">
					<h3>Save Children From Hunger</h3>
					<div class="sec-title colored text-center">
						<span class="decor">
							<span class="inner"></span>
						</span>
					</div>
					<h2>Became a part of the world lorem ipsum</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam quaerat atque, dolore. Amido ipsum dolor sit amet, consectetur adipisicing elit. Numquam quaerat atque, dolore.Lorem ipsum dolor sit amet, consectetur.</p>
					<a href="#" class="thm-btn">Donate Now</a>
                    <a href="#" class="thm-btn inverse">Read More</a>
				</div>
			</div>
		</div>
	</section> -->


	
	
	<?php
	include('footer.php');
	 ?>