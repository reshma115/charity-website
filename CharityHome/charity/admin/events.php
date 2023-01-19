	<?php 
include('header.php');
include('../config.php');
//session_start();
if(isset($_POST['add']))
{
    $file = $_FILES['file'];
   	$id   = $_POST['txt_edit'];
    $title = $_POST['title'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $area = $_POST['area'];
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
            $stmt=$conn->prepare("SELECT image_path FROM event WHERE id = ?");
            $stmt->execute(array($id));
            $row = $stmt->fetch();
            if(file_exists('../'.$row['image_path']))
            {
                unlink('../'.$row['image_path']);
            }
            $stmt = $conn->prepare("UPDATE event SET title = ?, time = ?, date = ?, area = ?,  description = ?,  image_path= ? WHERE id = ?");
            $stmt->execute(array($title, $time, $date, $area, $description, $file_destination, $id));
        }
        else
       {
         $stmt=$conn->prepare("INSERT INTO event (title, time, date, area,  description,  image_path) VALUES(?, ?, ?, ?, ?, ?)");
         $stmt->execute(array($title, $time, $date, $area, $description, $file_destination));
     }
         //header("Location:causes.php");
         echo "<script>window.location='events.php';</script>";
     }
    
    
        

         $stmt = $conn->prepare("SELECT * FROM event");
         $stmt->execute();
         $events = $stmt->fetchAll();

         if(isset($_GET['edit']))
            {
                $edit = $_GET['edit'];
                $stmt = $conn->prepare("SELECT * FROM event WHERE id = ?");
                $stmt->execute(array($edit));
                $row = $stmt->fetch();
                $title = $row['title'];
                $time = $row['time'];
                $date = $row['date'];
                $area = $row['area'];
                $description = $row['description'];
                $file = $row['image_path'];
            }
            
            if(isset($_GET['delete'])) 
             {   
                $del = $_GET['delete'];
                $stmt = $conn->prepare("DELETE FROM event WHERE id = ?");
                $stmt->execute(array($del));
                header("Location:events.php");
             }
 ?>  


	


	<section class="contact-content sec-padding">
		<div class="container">
			
			
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<h2>EVENTS</h2>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="events" class="custom-form row" id="contact-page-contact-form" method="POST" enctype="multipart/form-data">
						<div class="col-md-6">
							<input type="text" name="title" placeholder="Title" id="title" value="<?php if(isset($title)) echo $title ?>">
							<input type="time" name="time" placeholder="Time" value="<?php if(isset($time)) echo $time ?>">
							<input type="date" name="date" placeholder="Date" value="<?php if(isset($date)) echo $date ?>">
                            <input type="text" name="area" placeholder="Area" id="area" value="<?php if(isset($area)) echo $area ?>">
							<textarea name="description" placeholder="Description"><?php if(isset($description)) echo $description ?></textarea>
							<input type="file" name="file" placeholder="File" value="<?php if(isset($file)) echo $file ?>">
							<input type="hidden" name="txt_edit" value="<?php if(isset($edit)) echo $edit; ?>"/>
							
						</div>
						
						<div class="col-md-12"><button class="thm-btn" type="submit" name="add">Submit</button></div>
					</form>
				</div>
				    <div>
                    <h1>EVENTS</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Title</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Area</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sr = 1;
                    foreach ($events as $events) {
                    ?>
                   <tr>
                        <td><?php echo $sr; ?></td>
                        <td><?php echo $events['title']; ?></td>
                        <td><?php echo $events['time']; ?></td>
                        <td><?php echo $events['date']; ?></td>
                        <td><?php echo $events['area']; ?></td>
                        <td><?php echo $events['description']; ?></td>
                        <td><?php echo $events['image_path']; ?></td>
                        <td><a href="events.php?edit=<?php echo $events['id']; ?>"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Are you sure you want to delete this')" href="events.php?delete=<?php echo $events['id'];  ?>"><i class="fa fa-trash"></i></a></td>
                   </tr> 
                   <?php $sr++;} ?>
                </tbody>
            </table>
            </div>
			</div>
		</div>
	</section>


	
	
	<?php
	include('footer.php');
	 ?>