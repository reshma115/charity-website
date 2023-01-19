<?php include('header.php'); ?>
	
	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Events</h2>
					<ul class="breadcumb">
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Events</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


	<section class="event-feature sec-padding pb_60" data-bg-color="#fafafa">
		<div class="container">
			<div class="row">
			<?php 
			include('config.php');
			$stmt = $conn->prepare("SELECT * FROM event");
			$stmt->execute();
			while($events=$stmt->fetch())
			{
				?>
				<div class="col-sm-6 col-md-4">
	              <div class="event border-1px mb_30">
	                <div class="row">
	                  <div class="col-sm-12">
	                    <div class="event-thumb">
	                      <div class="thumb">
	                        <img class="full-width" src="<?php echo $events['image_path']; ?>" alt="">
	                      </div>
	                      <ul class="event-date">
	                        <li class="date"><?php echo date("d", strtotime($events['date'])); ?></li>
	                        <li class="month"><?php echo date("M", strtotime($events['date'])); ?></li>
	                      </ul>
	                    </div>
	                  </div>
	                  <div class="col-sm-12">
	                    <div class="event-content p_20">
	                      <h4 class="event-title"><a href="#"><?php echo $events['title']; ?></a></h4>
	                      <ul class="event-held list-inline">
	                        <li class="mr-10" data-text-color="#555"><i class="fa fa-clock-o"></i> <?php echo $events['time']; ?></li>
	                        <li data-text-color="#555"> <i class="fa fa-map-marker"></i> <?php echo $events['area']; ?></li>
	                      </ul>
	                      <p class="mb-0"><?php echo $events['description']; ?></p>
	                     <!--  <a class="text-thm" href="#"> Read More </a> -->
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
				
				<?php } ?>
				
				
				
	        </div>
			<!-- <div class="col-sm-12">
				<!--Pagination-->
				<!-- <div class="pager-outer clearfix text-center mt_30 mb_0">
				    <ul class="pagination mb_0">
				        <li><a href="#">Prev</a></li>
				        <li><a href="#">1</a></li>
				        <li class="active"><a href="#">2</a></li>
				        <li><a href="#">3</a></li>
				        <li><a href="#">-</a></li>
				        <li><a href="#">4</a></li>
				        <li><a href="#">5</a></li>
				        <li><a href="#">Next</a></li>
				    </ul>
				</div>
			</div> --> 
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
	</section>
 -->

	
	
	<?php
	include('footer.php');
	 ?>