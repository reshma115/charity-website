<?php
include("header.php");
include("../config.php")
?>

	</section>


	

	<section class="fact-counter-wrapper sec-padding parallax-section">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-6 col-md-offset-3 md-text-center">
					<div class="single-fact">
						<div class="icon-box">
							<i class="flaticon-shapes-2"></i>
						</div>
						<?php
			             $stmt = $conn->prepare("SELECT count(*) FROM donation");
			             $stmt->execute();
			             $row = $stmt->fetch(PDO::FETCH_NUM);
			             $stmtcount = $row[0];
			            ?>
						<span ><?php echo $stmtcount ?></span>
						<p>Total Donations</p>
					</div>
					<div class="single-fact">
						<div class="icon-box">
							<i class="flaticon-people-3"></i>
						</div>
						<?php
				             $stmt = $conn->prepare("SELECT count(*) FROM volunteer");
				             $stmt->execute();
				             $row = $stmt->fetch(PDO::FETCH_NUM);
				             $stmtcount = $row[0];
				            ?>
						<span><?php echo $stmtcount ?></span>
						<p>Total Volunteer</p>
					</div>
					<div class="single-fact">
						<div class="icon-box">
							<i class="flaticon-hands"></i>
						</div>
						<?php
			             $stmt = $conn->prepare("SELECT count(*) FROM causes");
			             $stmt->execute();
			             $row = $stmt->fetch(PDO::FETCH_NUM);
			             $stmtcount = $row[0];
			            ?>
						<span><?php echo $stmtcount ?></span>
						<p>Total Causes</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	
	<?php 
	include('footer.php');
	?>


	