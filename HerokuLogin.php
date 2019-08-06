<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	$db = parse_url(getenv("DATABASE_URL"));

	$pdo = new PDO("pgsql:" . sprintf(
	    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
	    $db["host"],
	    $db["port"],
	    $db["user"],
	    $db["pass"],
	    ltrim($db["path"], "/")
));
	$sql = "SELECT studentname, course FROM registercourse";
	$stmt = $pdo->prepare($sql);
	//set the return data type:
	$stmt -> setFetchMode(PDO::FETCH_ASSOC);
	$stmt ->execute();
	$resultSet = $stmt->fetchAll();

 ?>
<ul>
	<?php 
		foreach ($resultSet as $row) {
			echo '<li>'.$row['studentname'].'--'.$row['course'].'<li>';
		}
 ?>
</body>
</html>