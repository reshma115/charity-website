	<?php 
include('header.php');
include('config.php');
if(isset($_POST['send']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$stmt = $conn->prepare("INSERT INTO contact (name, email, phone, message) VALUES(?,?,?,?)");
	$stmt->execute(array($name, $email, $phone, $message));
	header("Location:contact.php");

}
	?>
	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Contact</h2>
					<ul class="breadcumb">
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Contact</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


	<section class="contact-content sec-padding">
		<div class="container">
			<!-- <div class="sec-title text-center">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been <br> the industry's standard dummy text ever since the 1500s, when an unknownto </p>
			</div> -->
			<!-- <div class="google-map" id="contact-page-google-map" data-icon-path="img/resources/map-marker.png" data-map-lat="-37.812802" data-map-lng="144.956981" data-map-zoom="10" data-map-title="Envato HQ"></div> -->
			<div class="row">
				<div class="col-md-8">
					<h2>Contact Form</h2>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="custom-form  row" id="contact-page-custom-form" method="POST">
						<div class="col-md-6">
							<input type="text" name="name" placeholder="Name">
							<input type="email" name="email" placeholder="Email">
							<input type="text" name="phone" placeholder="Phone">
							
						</div>
						<div class="col-md-6">
							<textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>
						</div>
						<div class="col-md-12"><button class="thm-btn" type="submit" name="send">Send</button></div>
					</form>
				</div>
				<div class="col-md-4">
					<h2>Address</h2>
					<ul class="contact-info">
						<li>
							<div class="icon-box">
								<div class="inner">
									<i class="fa fa-map-marker"></i>
								</div>
							</div>
							<div class="content-box">
								<h4>Address</h4>
								<p>Mirpur New Bazar Road, Block-c, <br>Uttara, Dhaka-1210</p>
							</div>
						</li>
						<li>
							<div class="icon-box">
								<div class="inner">
									<i class="fa fa-phone"></i>
								</div>
							</div>
							<div class="content-box">
								<h4>Phone</h4>
								<p>(732) 803-01 03, (732) 806-01 04, (880)172380129</p>
							</div>
						</li>
						<li>
							<div class="icon-box">
								<div class="inner">
									<i class="fa fa-envelope-o"></i>
								</div>
							</div>
							<div class="content-box">
								<h4>Email</h4>
								<p>info@somecompanyname.com, otheremail@gmail.com</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>


	
	<?php
	include('footer.php');
	 ?>