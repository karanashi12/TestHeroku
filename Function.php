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

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM admin WHERE username= '$username' AND password = '$password' ";
  $row = pg_query($sql);

  if (pg_num_rows($row)==1) {
    header('Location: Admin.php');
  }
}
  
 ?>