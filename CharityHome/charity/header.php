<?php 
include('config.php');
if(isset($_POST['donate']))
{
	//$sel_amount=$_POST['sel-amount'];
	$other_amount=$_POST['other-amount'];
	$card_number=$_POST['card-number'];
	$security_code=$_POST['security_code'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];

	$stmt=$conn->prepare("INSERT INTO donation (other_amount, card_number, security_code, name, email, phone, address, city)VALUES (?,?,?,?,?,?,?,?,?)");
	$stmt->execute(array($other_amount, $card_number, $security_code, $name, $email, $phone, $address, $city));
	//header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Charity Home || Charity and Donation HTML5 Template</title>

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- master stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">



</head>
<body>


	<header class="header">
		<div class="container">
			<div class="logo pull-left">
				<a href="index.html">
					<img src="img/resources/logo.png" alt="Awesome Image"/>
				</a>
			</div>
			<div class="header-right-info pull-right clearfix">
				<div class="single-header-info">
					<div class="icon-box">
						<div class="inner-box">
							<i class="flaticon-interface-2"></i>
						</div>
					</div>
					<div class="content">
						<h3>EMAIL</h3>
						<p>charityhome@mail.com</p>
					</div>
				</div>
				<div class="single-header-info">
					<div class="icon-box">
						<div class="inner-box">
							<i class="flaticon-telephone"></i>
						</div>
					</div>
					<div class="content">
						<h3>Call Now</h3>
						<p><b>(732) 803-010-03</b></p>
					</div>
				</div>
				<div class="single-header-info">
	                <!-- Modal: donate now Starts -->
	                <a class="thm-btn" data-toggle="modal" href="#modal-donate-now">Donate Now</a>
	                <div class="modal fade" id="modal-donate-now" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                  <div class="modal-dialog style-one" role="document">
	                    <div class="modal-content">
	                      <div class="modal-header">
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        <h4 class="modal-title" id="myModalLabel">Make a Donation</h4>
	                      </div>
	                      <div class="modal-body">
		                    <div class="donation-form-outer">
				            	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				                	
				                    <!--Form Portlet-->
				                    <div class="form-portlet">
				                    	<h3>Donation Amount</h3>
				                        
				                        <div class="row clearfix">
				                        	
				                            <div class="form-group  col-xs-12 padd-top-20">
				                            	
				                                <input type="text" placeholder="Amount" value="" name="other-amount">
				                                
				                            </div>
				                            
				                        </div>
				                    </div>
				                    
				                    <hr>
				                    
				                    <!--Form Portlet-->
				                    <div class="form-portlet">
				                    	<h3>Billing Information</h3>
				                        
				                        <div class="row clearfix">
				                            
				                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
				                            	<div class="field-label">Card Number <span class="required">*</span></div>
				                                <input type="text" required="" placeholder="Card Number" value="" name="card-number">
				                            </div>
				                            
				                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
				                            	<div class="field-label">Security Code (CVC) <span class="required">*</span></div>
				                                <input type="password" required="" placeholder="Security Code" value="" name="security_code">
				                            </div>
				                            
				                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
				                            	<div class="field-label">Name <span class="required">*</span></div>
				                                <input type="text" required="" placeholder="First Name" value="" name="name">
				                            </div>
				                            
				                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
				                            	<div class="field-label">Email <span class="required">*</span></div>
				                                <input type="email" required="" placeholder="Email" value="" name="email">
				                            </div>
				                            
				                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
				                            	<div class="field-label">Phone <span class="required">*</span></div>
				                                <input type="text" required="" placeholder="Phone" value="" name="phone">
				                            </div>
				                            
				                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
				                            	<div class="field-label">Address <span class="required">*</span></div>
				                                <input type="text" required="" placeholder="Address " value="" name="address">
				                            </div>
				                            
				                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
				                            	<div class="field-label">City <span class="required">*</span></div>
				                                <select name="city">
				                                	<option>City</option>
				                                    <option>Thane</option>
				                                    <option>Mumbai</option>
				                                    <option>Nashik</option>
				                                    <option>Badlapur</option>
				                                    <option>Pune</option>
				                                    <option>City Other</option>
				                                </select>
				                            </div>
				                            
				                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
				                            	<div class="field-label">Zip / Postal Code <span class="required">*</span></div>
				                                <input type="text" required="" placeholder="Zip Code" value="" name="zip_code">
				                            </div>
				                    
						                    <hr>
						                    
						                    <div class="text-center"><button class="thm-btn mt_30 mb_30" name="donate" type="submit">Donate Now</button></div>
				                            
				                        </div>
				                    </div>
				                    
				                    <hr>
				                    
				                    <!--Form Portlet-->
				                   <!--  <div class="form-portlet">
				                    	<h3>Online Payment Information</h3>
				                        
				                        <div class="payment-option-logo"><img alt="" src="img/resources/payment-logos.png" class="img-responsive"></div>
				                        <br>
				                    </div> -->
				                    
				                </form>
				            </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <!-- Modal: donate now Ends -->
			</div>
		</div>
	</header> <!-- /.header -->


	<nav class="mainmenu-area stricky">
		<div class="container">
			<div class="navigation pull-left">
				<div class="nav-header">
					<ul>
						<li>
							<a href="index.php">Home</a>
							
						</li>
						<li><a href="about.php">About</a></li>						
						<li>
							<a href="causes-grid.php">Causes</a>
							
						</li>	
						<!-- <li>
							<a href="donations.php">Donation</a>
							
						</li> -->					
						<li>
							<a href="events-grid.php">Events</a>
							
						</li>
						<li>
							<a href="volunteer-style-one.php">Volunteer</a>
							
						</li>
						<li>
							<a href="gallery-style-one.php">Gallery</a>
							
						</li>
						
						<li><a href="contact.php">Contact</a></li>
						<li><a href="login.php">Login</a></li>
					</ul>
				</div>
				<div class="nav-footer">
					<button><i class="fa fa-bars"></i></button>
				</div>
			</div>
			<div class="search-box pull-right">
				<form action="#">
					<input type="text" placeholder="Search...">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
	</nav> <!-- /.mainmenu-area -->
