<?php
include('header.php');
?>
	
	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Causes</h2>
					<ul class="breadcumb">
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Causes</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


	<section class="recent-causes sec-padding pb_60">
		<div class="container">
			<div class="row">
			<?php 
			include('config.php');
			$stmt = $conn->prepare("SELECT * FROM causes");
			$stmt->execute();
			while($causes=$stmt->fetch())
			{
				?>
			
	          <div class="col-sm-12 col-md-4 col-lg-4">
	            <div class="causes sm-col5-center mb_30">
	              <div class="thumb">
	                <img class="full-width" alt="" src="<?php echo $causes['image_path']; ?>">
	                <div class="donate-piechart">
	                  <div class="piechart-block">
	                    <div class="piechart style-one"  data-fg-color="rgba(250,119,68,1)" data-value=".75">
						  <span>.75</span>
						</div>
	                  </div>
	                </div>
	              </div>
	              <div class="causes-details clearfix">
	                <h4 class="title"><a href="#"><?php echo $causes['title']; ?></a></h4>
	                <ul class="about-causes list-inline clearfix">
	                  <li class="causes-raised">Raised: $<?php echo $causes['raised']; ?></li>
	                  <li class="causes-goal">Goal: $<?php echo $causes['goal']; ?></li>
	                </ul>
	                <p><?php echo $causes['description']; ?></p>
	               
	              </div>
	            </div>
	          </div>
	          
	          <?php } ?>
	         
	          
	          
	          
	        </div>
		</div>
	</section>


	
	
	<?php
	include('footer.php');
	 ?>