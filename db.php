<?php 
$hostname='localhost';
$username='root';
$password='';
$dbname='storeman';
$port='3306';
function query($sql)
{
	global $hostname;
	global $username;
	global $password;
	global $dbname;
	global $port;
	$conn = new mysqli($hostname,$username,$password,$dbname,$port);
	
	if ($conn->connect_error)
		die($conn->error);

	$result = $conn->query($sql);
	if(!$result)
	{
		echo "SQL execution fail <br>";
		die($conn->error);
	}
	
	$row =mysqli_fetch_all($result);
	return $row;
}
?>