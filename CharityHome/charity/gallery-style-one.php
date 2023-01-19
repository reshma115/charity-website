<?php include('header.php'); ?>

	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Gallery</h2>
					<ul class="breadcumb">
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Gallery </span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


    <section class="gallery-section p_0">
        
        <div class="clearfix">       
            <!--Image Box-->

            <?php 
			include('config.php');
			$stmt = $conn->prepare("SELECT * FROM gallery");
			$stmt->execute();
			while($gallery=$stmt->fetch())
			{
				?>
            <div class="image-box">
                <div class="inner-box">
                    <figure class="image"><a href="<?php echo $gallery['image_path']; ?>" class="lightbox-image"><img src="<?php echo $gallery['image_path']; ?>" alt=""></a></figure>
                    <a href="<?php echo $gallery['image_path']; ?>" class="lightbox-image btn-zoom" title="<?php echo $gallery['title']; ?>"><span class="icon fa fa-dot-circle-o"></span></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>


	
	<?php include("footer.php"); ?>