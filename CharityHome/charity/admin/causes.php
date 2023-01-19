	<?php 
include('header.php');
include('../config.php');
//session_start();
if(isset($_POST['add']))
{
    $file = $_FILES['file'];
   	$id   = $_POST['txt_edit'];
    $title = $_POST['title'];
    $raised = $_POST['raised'];
    $goal = $_POST['goal'];
    $description = $_POST['description'];
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
      
 
    
        if(!empty($id))
        {
            $stmt=$conn->prepare("SELECT image_path FROM causes WHERE id = ?");
            $stmt->execute(array($id));
            $row = $stmt->fetch();
            if(file_exists('../'.$row['image_path']))
            {
                unlink('../'.$row['image_path']);
            }
            $stmt = $conn->prepare("UPDATE causes SET title = ?, raised = ?, goal = ?, description = ?,  image_path= ? WHERE id = ?");
            $stmt->execute(array($title, $raised, $goal, $description, $file_destination, $id));
        }
        else
       {
         $stmt=$conn->prepare("INSERT INTO causes (title, raised, goal, description,  image_path) VALUES(?, ?, ?, ?, ?)");
         $stmt->execute(array($title, $raised, $goal, $description, $file_destination));
     }
         //header("Location:causes.php");
         echo "<script>window.location='causes.php';</script>";
     }
    
    
        

         $stmt = $conn->prepare("SELECT * FROM causes");
         $stmt->execute();
         $causes = $stmt->fetchAll();

         if(isset($_GET['edit']))
            {
                $edit = $_GET['edit'];
                $stmt = $conn->prepare("SELECT * FROM causes WHERE id = ?");
                $stmt->execute(array($edit));
                $row = $stmt->fetch();
                $title = $row['title'];
                $raised = $row['raised'];
                $goal = $row['goal'];
                $description = $row['description'];
                $file = $row['image_path'];
            }
            
            if(isset($_GET['delete'])) 
             {   
                $del = $_GET['delete'];
                $stmt = $conn->prepare("DELETE FROM causes WHERE id = ?");
                $stmt->execute(array($del));
                header("Location:causes.php");
             }
 ?>  

	
	


	<section class="contact-content sec-padding">
		<div class="container">
			
			
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<h2>CUASES</h2>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="cuases" class="custom-form row" id="contact-page-contact-form" method="POST" enctype="multipart/form-data">
						<div class="col-md-6">
							<input type="text" name="title" placeholder="Title" id="title" value="<?php if(isset($title))  echo $title;?>">
							<input type="text" name="raised" placeholder="Raised" value="<?php if(isset($raised))  echo $raised;?>">
							<input type="text" name="goal" placeholder="Goal" value="<?php if(isset($goal))  echo $goal;?>">
							<textarea name="description" placeholder="Description" ><?php if(isset($description))  echo $description;?></textarea>
							<input type="file" name="file" placeholder="File" value="<?php if(isset($file))  echo $file;?>">
							<input type="hidden" name="txt_edit" value="<?php if(isset($edit)) echo $edit; ?>"/>
							
						</div>
						
						<div class="col-md-12"><button class="thm-btn" type="submit" name="add">Submit</button></div>
					</form>
				</div>
				
			</div>
            <div>
            <h1>CUASES</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Title</th>
                        <th>Raised</th>
                        <th>Goal</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sr = 1;
                    foreach ($causes as $causes) {
                    ?>
                   <tr>
                        <td><?php echo $sr; ?></td>
                        <td><?php echo $causes['title']; ?></td>
                        <td><?php echo $causes['raised']; ?></td>
                        <td><?php echo $causes['goal']; ?></td>
                        <td><?php echo $causes['description']; ?></td>
                        <td><?php echo $causes['image_path']; ?></td>
                        <td><a href="causes.php?edit=<?php echo $causes['id']; ?>"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Are you sure you want to delete this')" href="causes.php?delete=<?php echo $causes['id'];  ?>"><i class="fa fa-trash"></i></a></td>
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