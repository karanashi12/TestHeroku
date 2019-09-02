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
if (isset($_POST['login'])) {

  $username = pg_escape_string($pdo, $_POST['username']);
  $password = pg_escape_string($pdo, $_POST['password']);

  $password = md5($password);

  $sql = "SELECT * FROM admin WHERE username= '$username' AND password = '$password' ";
  $stmt = $pdo->prepare($sql);
  $stmt -> execute();
  $login = (bool) $stmt->featchAll();
  if ($login) {
    header('Location: Admin.php');
  }
}
  
 ?>