<?php
include('header.php');
 ?>


	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Volunteer Profile</h2>
					<ul class="breadcumb">
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Volunteer Profile</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>

	<section class="sec-padding volunteer-profile">
		<div class="container">
			<div class="row">
			<?php 
			include('config.php');
			$stmt = $conn->prepare("SELECT * FROM volunteer");
			$stmt->execute();
			while($volunteer=$stmt->fetch())
			{
				?>
				<div class="col-md-4">
					<img src="<?php echo $volunteer['image_path']; ?>" alt="">
				</div>
				<div class="col-md-8 single-team-member">
					<h3><?php echo $volunteer['name']; ?></h3>
					<span><?php echo $volunteer['designation']; ?></span>
					<p><?php echo $volunteer['description']; ?></p>
					<ul class="infos">
						<li><span>Hobby</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $volunteer['hobby']; ?></span></li>
						<li><span>Degrees</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $volunteer['qualification']; ?></span></li>
						<li><span>Experience</span> <span><?php echo $volunteer['experience']; ?></span></li>
						<li><span>Training</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $volunteer['training']; ?></span></li>
						<!-- <li><span>Degrees</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monday, Friday</span></li> -->
					</ul>
					<ul class="social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>




	<?php 
	include('footer.php');	?>