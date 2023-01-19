	<?php 
include('header.php');
include('../config.php');
//session_start();
if(isset($_POST['add']))
{
    $file = $_FILES['file'];
   	$id   = $_POST['txt_edit'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $qualification = $_POST['qualification'];
    $designation = $_POST['designation'];
    $hobby = $_POST['hobby'];
    $experience = $_POST['experience'];
    $training = $_POST['training'];
    //$area = $_POST['area'];
    $description = $_POST['description'];
    $filetmp = $file['tmp_name'];
    $filepath = "../uploads/".$name;
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
      
 
    
        if(!empty($id))
        {
            $stmt=$conn->prepare("SELECT image_path FROM volunteer WHERE id = ?");
            $stmt->execute(array($id));
            $row = $stmt->fetch();
            if(file_exists('../'.$row['image_path']))
            {
                unlink('../'.$row['image_path']);
            }
            $stmt = $conn->prepare("UPDATE volunteer SET name = ?, email = ?, contact = ?, qualification = ?, designation = ?, hobby = ?, experience = ?, training = ?,  description = ?,  image_path= ? WHERE id = ?");
            $stmt->execute(array($name, $email, $contact, $qualification, $designation, $hobby, $experience, $training, $description, $file_destination, $id));
        }
        else
       {
         $stmt=$conn->prepare("INSERT INTO volunteer (name, email, contact, qualification, designation, hobby, experience, training, description,  image_path) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
         $stmt->execute(array($name, $email, $contact, $qualification, $designation, $hobby, $experience, $training, $description, $file_destination));
     }
         //header("Location:causes.php");
         echo "<script>window.location='volunteer.php';</script>";
     }
    
    
        

         $stmt = $conn->prepare("SELECT * FROM volunteer");
         $stmt->execute();
         $volunteer = $stmt->fetchAll();

         if(isset($_GET['edit']))
            {
                $edit = $_GET['edit'];
                $stmt = $conn->prepare("SELECT * FROM volunteer WHERE id = ?");
                $stmt->execute(array($edit));
                $row = $stmt->fetch();
                $name = $row['name'];
                $email = $row['email'];
                $contact = $row['contact'];
                $qualification = $row['qualification'];
                $designation = $row['designation'];
                $hobby = $row['hobby'];
                $experience = $row['experience'];
                $training = $row['training'];
                $description = $row['description'];
                $file = $row['image_path'];
            }
            
            if(isset($_GET['delete'])) 
             {   
                $del = $_GET['delete'];
                $stmt = $conn->prepare("DELETE FROM volunteer WHERE id = ?");
                $stmt->execute(array($del));
                header("Location:volunteer.php");
             }
 

	?>
	


	<section class="contact-content sec-padding">
		<div class="container">
			
			
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<h2>VOLUNTEER</h2>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="volunteer" class="custom-form row" id="contact-page-contact-form" method="POST" enctype="multipart/form-data">
						<div class="col-md-6">
							<input type="text" name="name" placeholder="Name" id="name" value="<?php if(isset($name)) echo $name ?>">
							<input type="email" name="email" placeholder="Email-Id" value="<?php if(isset($email)) echo $email ?>">
                            <input type="text" name="contact" placeholder="Contact" value="<?php if(isset($contact)) echo $contact ?>">
							<input type="text" name="qualification" placeholder="Qualification" value="<?php if(isset($qualification)) echo $qualification ?>">
                            <input type="text" name="designation" placeholder="Designation" value="<?php if(isset($designation)) echo $designation ?>">
                            <input type="text" name="hobby" placeholder="Hobby" id="hobby" value="<?php if(isset($hobby)) echo $hobby ?>">
                            <input type="text" name="experience" placeholder="Experience" id="experience" value="<?php if(isset($experience)) echo $experience ?>">
                            <input type="text" name="training" placeholder="Training" id="training" value="<?php if(isset($training)) echo $training ?>">
							<textarea name="description" placeholder="Description"><?php if(isset($description)) echo $description ?></textarea>
							<input type="file" name="file" placeholder="File" value="<?php if(isset($file)) echo $file ?>">
							<input type="hidden" name="txt_edit" value="<?php if(isset($edit)) echo $edit; ?>"/>
							
						</div>
						
						<div class="col-md-12"><button class="thm-btn" type="submit" name="add">Submit</button></div>
					</form>
				</div>
				
			</div>
            <div>
            <h1>VOLUNTEER</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Qualification</th>
                        <th>Designation</th>
                        <th>Hobby</th>
                        <th>Experience</th>
                        <th>Training</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sr = 1;
                    foreach ($volunteer as $volunteer) {
                    ?>
                   <tr>
                        <td><?php echo $sr; ?></td>
                        <td><?php echo $volunteer['name']; ?></td>
                        <td><?php echo $volunteer['email']; ?></td>
                        <td><?php echo $volunteer['contact']; ?></td>
                        <td><?php echo $volunteer['qualification']; ?></td>
                        <td><?php echo $volunteer['designation']; ?></td>
                        <td><?php echo $volunteer['hobby']; ?></td>
                        <td><?php echo $volunteer['experience']; ?></td>
                        <td><?php echo $volunteer['training']; ?></td>
                        <td><?php echo $volunteer['description']; ?></td>
                        <td><?php echo $volunteer['image_path']; ?></td>
                        <td><a href="volunteer.php?edit=<?php echo $volunteer['id']; ?>"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Are you sure you want to delete this')" href="volunteer.php?delete=<?php echo $volunteer['id'];  ?>"><i class="fa fa-trash"></i></a></td>
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