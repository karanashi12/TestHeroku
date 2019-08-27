<!DOCTYPE html>
<html>
<head>
	<title>Get Data</title>
</head>
<body>
<?php 
$hostname='localhost';
$username='root';
$password='';
$dbname='storeman';
$port='8080';
function query($sql)
{
	global $hostname;
	global $username;
	global $password;
	global $dbname;
	global $port;
	$conn = new mysqli($hostname,$username,$password,$dbname,$port);
	$result = $conn->query($sql);
	if (!$result)
		die($conn->error);
	$row = mysqli_fetch_all($result);
	return $row;

	
}
?>

<?php 
if (isset($_POST['Username']) && isset($_POST['Password'])) 
{
	$User=$_POST['Username'];
	$Pass=$_POST['Password'];
	
	$sql = "select * from account where Username='".$User."' and Password='".$Pass."'";
	$row = mysqli_fetch_all($result);

	if(count($row)==0)
		echo "Login Fail";
	else
		echo "Login Success";
}
else echo "<h1>WHAT THE FUCK!</h1>";
 ?>


<table>
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Password</th>
	</tr>		
<?php 
	$sql = "select * from account";
	$row = query($sql);
	for($i = 0 ;$i<count($row);$i++)
	{
?>
		<tr>
			<td><?=$row[$i]["ID"]?></td>
			<td><?=$row[$i]["Username"]?></td>
			<td><?=$row[$i]["Password"]?></td>
		</tr>
<?php
	}
  ?>
</body>
</html>