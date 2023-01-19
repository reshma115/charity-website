	<?php 
include('header.php');
include('../config.php');
//session_start();
if(isset($_POST['add']))
{
    $file = $_FILES['file'];
   	$id   = $_POST['txt_edit'];
    $title = $_POST['title'];
    /*$raised = $_POST['raised'];
    $goal = $_POST['goal'];
    $description = $_POST['description'];*/
    $filetmp = $file['tmp_name'];
    $filepath = "../uploads/".$title;
    $file_size = $file['size'];
    $file_error = $file['error'];
    
        $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $allowed = array('jpg', 'jpeg', 'gif', 'png');
        if(in_array($file_ext, $allowed))
        {
            if($file_error === 0)
            {
                if($file_size <= 2097152)
                {
                    $file_name_new = uniqid('', true).'.'.$file_ext;
                    $file_destination = '../uploads/' . $file_name_new;
                    if(move_uploaded_file($filetmp, $file_destination))
                    {
                        $file_destination = str_replace('../', '', $file_destination);
                        // header("Location:index.php?success");
                    }
                    else
                    {
                        $errors[4] = "Sorry you cannot upload image.";
                    }
                }
            }
        }
      
 
    
        /*if(!empty($id))
        {
            $stmt=$conn->prepare("SELECT image_path FROM gallery WHERE id = ?");
            $stmt->execute(array($id));
            $row = $stmt->fetch();
            if(file_exists('../'.$row['image_path']))
            {
                unlink('../'.$row['image_path']);
            }
            $stmt = $conn->prepare("UPDATE gallery SET title = ?, image_path= ? WHERE id = ?");
            $stmt->execute(array($title, $file_destination, $id));
        }
        else
       {*/
         $stmt=$conn->prepare("INSERT INTO gallery (title, image_path) VALUES(?, ?)");
         $stmt->execute(array($title, $file_destination));
     /*}*/
         //header("Location:causes.php");
         echo "<script>window.location='gallery.php';</script>";
     }
    
    
        
/*
         $stmt = $conn->prepare("SELECT * FROM gallery");
         $stmt->execute();
         $gallery = $stmt->fetchAll();

         if(isset($_GET['edit']))
            {
                $edit = $_GET['edit'];
                $stmt = $conn->prepare("SELECT * FROM gallery WHERE id = ?");
                $stmt->execute(array($edit));
                $row = $stmt->fetch();
                $title = $row['title'];*/
                /*$event_description = $row['event_description'];
                $date = $row['date'];
                $time = $row['time'];*/
                /*$file = $row['image_path'];
            }
            
            if(isset($_GET['delete'])) 
             {   
                $del = $_GET['delete'];
                $stmt = $conn->prepare("DELETE FROM gallery WHERE id = ?");
                $stmt->execute(array($del));
                header("Location:gallery.php");
             }*/
   

	?>
	


	<section class="contact-content sec-padding">
		<div class="container">
			
			
			<div class="row">
				<div class="col-md-8 offset-col-md-6">
					<h2>GALLERY</h2>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="gallery" class="custom-form row" id="contact-page-contact-form" method="POST" enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="form-portlet">
                                        <h3>Donation Amount</h3>
                                        
                                        <div class="row clearfix">
                                            <div class="form-group col-xs-12 clearfix">
                                                
                                               <!--  <div class="radio-select"> -->
                                                    <input type="radio" id="amount-1" name="sel-amount">
                                                    <label for="amount-1">$10</label>
                                                <!-- </div> -->
                                                
                                                <!-- <div class="radio-select"> -->
                                                    <input type="radio" checked="" id="amount-2" name="sel-amount">
                                                    <label for="amount-2">$25</label>
                                                <!-- </div> -->
                                                
                                                <!-- <div class="radio-select"> -->
                                                    <input type="radio" id="amount-3" name="sel-amount">
                                                    <label for="amount-3">$50</label>
                                               <!--  </div> -->
                                                
                                                <!-- <div class="radio-select"> -->
                                                    <input type="radio" id="amount-4" name="sel-amount">
                                                    <label for="amount-4">$100</label>
                                                <!-- </div> -->
                                                
                                                <!-- <div class="radio-select"> -->
                                                    <input type="radio" id="amount-5" name="sel-amount">
                                                    <label for="amount-5">$150</label>
                                                <!-- </div> -->
                                                
                                                <!-- <div class="radio-select"> -->
                                                    <input type="radio" id="amount-6" name="sel-amount">
                                                    <label for="amount-6">$200</label>
                                                <!-- </div> -->
                                                
                                                <div class="radio-select">
                                                    OR
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="form-group  col-xs-12 padd-top-20">
                                                
                                                <input type="text" placeholder="Other Amount" value="" name="other-amount">
                                                
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
                                                <input type="text" required="" placeholder="Card Number" value="" name="name">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                <div class="field-label">Security Code (CVC) <span class="required">*</span></div>
                                                <input type="text" required="" placeholder="Security Code" value="" name="name">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                <div class="field-label">Name <span class="required">*</span></div>
                                                <input type="text" required="" placeholder="First Name" value="" name="name">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                <div class="field-label">Email <span class="required">*</span></div>
                                                <input type="email" required="" placeholder="Email" value="" name="name">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                <div class="field-label">Phone <span class="required">*</span></div>
                                                <input type="text" required="" placeholder="Phone" value="" name="name">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                <div class="field-label">Address <span class="required">*</span></div>
                                                <input type="text" required="" placeholder="Address 1" value="" name="name">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                <div class="field-label">City <span class="required">*</span></div>
                                                <select>
                                                    <option>City</option>
                                                    <option>City Name</option>
                                                    <option>City Other</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                <div class="field-label">Zip / Postal Code <span class="required">*</span></div>
                                                <input type="text" required="" placeholder="Zip Code" value="" name="name">
                                            </div>
                                    
                                            <hr>
                                            
                                            <div class="text-center"><button class="thm-btn mt_30 mb_30" type="submit">Donate Now</button></div>
                                            
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    
                                    <!--Form Portlet-->
                                    <div class="form-portlet">
                                        <h3>Online Payment Information</h3>
                                        
                                        <div class="payment-option-logo"><img alt="" src="img/resources/payment-logos.png" class="img-responsive"></div>
                                        <br>
                                    </div>ss
							<input type="hidden" name="txt_edit" value="<?php if(isset($edit)) echo $edit; ?>"/>
							
						</div>
						
						<div class="col-md-12"><button class="thm-btn" type="submit" name="add">Submit</button></div>
					</form>
				</div>
				
			</div>
            <div>
            <h1>GALLERY</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sr = 1;
                    foreach ($gallery as $gallery) {
                    ?>
                   <tr>
                        <td><?php echo $sr; ?></td>
                        <td><?php echo $gallery['title']; ?></td>
                        <td><?php echo $gallery['image_path']; ?></td>
                        <td><a href="gallery.php?edit=<?php echo $gallery['id']; ?>"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Are you sure you want to delete this')" href="gallery.php?delete=<?php echo $gallery['id'];  ?>"><i class="fa fa-trash"></i></a></td>
                   </tr> 
                   <?php $sr++;} ?>
                </tbody>
            </table>
            </div>
		</div>
	</section>


	
	
	<?php
	include('footer.php');
	 ?>