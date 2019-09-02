<?php 
require_once './connect.php';  
if(isset($_POST["username"]) && isset($_POST["password"]))
{
  $user = $_POST["username"];
  $pass = $_POST["password"];
  $sql ="SELECT * FROM admin WHERE username = '$user' AND password= '$pass'";
  $rows = pg_query($sql);
  if(pg_num_rows($rows)==1) { ?>
    <script>
            alert("Login successfully!!");
        </script>
    <?php
    } else { 
        ?>
            <script>
                alert("Wrong Username/Password");
                window.location.href = "/index.php";
            </script>
        <?php }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>ATN Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<style type="text/css">
* {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
th, td {
  padding: 15px;
}
</style>

<div class="jumbotron text-center">
  <h1>ATN Admin</h1>
</div>
<a href="/Add_Item.php">Add new item</a>
  <div class="col-sm-12">
  	<table>
  		<tr>
  			<th>Product ID</th>
  			<th>Product Name</th>
  			<th>Price</th>
  			<th>Stock</th>
  		</tr>
  		<?php 
          include('./HerokuLogin.php');
          $sql="Select * From product";
          $row = query($sql);
          for($i=0;$i<count($row);$i++)
        {?>
  		<tr>
  			<td><?=$row[$i][0]?></td>
  			<td><?=$row[$i][1]?></td>
  			<td><?=$row[$i][3]?></td>
        <td><?=$row[$i][4]?></td>
        <td><img src="<?=$row[$i][2]?>"></td>
  		</tr>
      <?php } ?>
  	</table>
  </div>
</body>
</html>