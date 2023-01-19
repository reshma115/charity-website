	<?php 
	session_start();
include('header.php');

if(isset($_POST['login']))
{
 	$email= $_POST['email'];
 	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
   
    
        include('config.php');
        
        	$stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
        	$stmt->execute(array($email, $password));
        
		if($stmt->rowCount())
        {
            $row = $stmt->fetch();
           /* print_r($row);*/
           $_SESSION["user_id"]=$row['id'];
          $_SESSION["user_name"] = $row['name'];
           
          
        	    //header("Location: admin/index.php");
        	   echo "<script>window.location='admin/index.php';</script>";	 
        	//echo "login sucssesfully";
       }
       /*else{
       		echo "Please check Email/Password";
       }*/
    }


	?>
	


	<section class="contact-content sec-padding">
		<div class="container">
			
			
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<h2>Log-In</h2>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="login" class="custom-form row" id="contact-page-contact-form" method="post">
						<div class="col-md-6">
							<input type="email" name="email" placeholder="Email">
							<input type="password" name="password" placeholder="Password">
							
							
						</div>
						
						<div class="col-md-12"><button class="thm-btn" type="submit" name="login" value="login">Log-In</button></div>
					</form>
				</div>
				
			</div>
		</div>
	</section>


	
	
	<?php
	include('footer.php');
	 ?>