<?php 
seasion_start();
$db = parse_url(getenv("DATABASE_URL"));

  $pdo = new PDO("pgsql:" . sprintf(
      "host=%s;port=%s;user=%s;password=%s;dbname=%s",
      $db["host"],
      $db["port"],
      $db["user"],
      $db["pass"],
      ltrim($db["path"], "/");
      ));

  $params = array(
    'user' => $_POST['username'],
    'pass' => $_POST['password']
  );
  $sql = "SELECT * FROM admin WHERE username= :user AND password = :pass ";
  $stmt = $pdo->prepare($sql);
  $stmt -> execute($params);
  $login = (bool) $stmt->featchAll();
  if ($login) {
    header('Location: Admin.php');
  }
 ?>