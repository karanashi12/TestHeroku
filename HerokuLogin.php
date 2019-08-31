<?php 
function query($sql)
{
	$db = parse_url(getenv("DATABASE_URL"));

	$pdo = new PDO("pgsql:" . sprintf(
	    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
	    $db["host"],
	    $db["port"],
	    $db["user"],
	    $db["pass"],
	    ltrim($db["path"], "/")
));
	$stmt = $pdo->prepare($sql);
	//set the return data type:
	$stmt -> setFetchMode(PDO::FETCH_ASSOC);
	$stmt ->execute();
	$row = $stmt->fetchAll();

	return $row;
}
?>