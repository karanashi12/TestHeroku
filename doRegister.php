<!DOCTYPE html>
<html>
<head>
	<title>Processing</title>
</head>
<body>
	<?php 
		$name = $_POST["txtName"];
		$course = $_POST["cbCourse"];
		$dob = $_POST["dob"];
		$gender = $_POST["gender"];
		$fav_book = $_POST["book"];
		$fav_car = $_POST["car"];
		$fav =$fav_book.$fav_car;
		include 'CreateConnection.php';

		$stmt = $conn->prepare("insert into RegisterCourse(studentname, course, dob, gender, fav) VALUES (?,?,?,?,?)");
		$stmt->bind_param("sssss",$name,$course,$dob,$gender,$fav);
		$stmt->execute();
		$conn->close();
	 ?>
	 <h2>Thank you <?php echo $name ?> for registered <?php echo $course ?> </h2>
	 <ul>
	     <li><?php echo $dob ?></li>
	     <li><?php echo $gender ?></li>
	     <li><?php echo $fav_book ?></li>
	     <li><?php echo $fav_car ?></li>
	 </ul>
	 <a href="Register.php">back</a>
</body>
</html>