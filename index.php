<?php 
  session_start(); 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shop4E - Small but Significant</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style>
		body{
			margin: 0 auto;
			background-color: #F4F4F4;
		}
		.khoi{
			border-radius:15px;
			border: 1px solid;
			width: 90%;
			margin: 10px auto;
		}
		.tieude{
			border-radius: 15px 15px 1px 1px;
			background-color: blue;
			color: white;
			cursor: pointer;
		}
		.khoi ul{
			list-style-type: none;
		}
		.khoi a{
			text-decoration: none;
		}
		.noidung{
			border-radius: 1px 1px 15px 15px;
		}
		.heading{
			background-color: blue;
		}
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
	</style>
</head>
<body>

	<div class="jumbotron text-center" style="margin-bottom:0">
	 	<h1>Shop4E</h1>
	 	<p>Place to find computer power</p> 
	</div>
	<div class="menu">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		  <a class="navbar-brand" href="INDEX2.php">Shop4E</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
			    <?php 
					require_once './db.php';
					$sql="Select * From category";
					$row = Query($sql);
					for($i=0;$i<count($row);$i++)
					{?>
						<li class="nav-item">
							<a class="nav-link" href="INDEX2.php?CID=<?=$row[$i][0]?>"><?=$row[$i][1]?></a>
						</li>
					<?php
					}
				?>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About</a>
		      </li>
		    	  <!-- logged in user information -->
			  <?php  if (isset($_SESSION['username'])) {?>
    		  <li class="nav-item"><h3 style="color: gray"><?php echo $_SESSION['username']; ?></h3></li>
    		  <li class="nav-item"><a class="nav-link" href="index2.php?logout='1'">Logout</a></li>
    			<?php } else { ?>
    			<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
    		<?php } ?>
    		  <li class="nav-item">
    		  	<input  type="text" name="name"> 
    			<input  type="submit" name="submit" value="Search">
    		  </li>
		    </ul>
		  </div>  
		</nav>
	</div>

  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
  	<div class="content">
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
    </div>
  	<?php endif ?>

    


	<div class="container">
		<div class="row">
			<?php 
				if(isset($_GET['CID']))
				{
					$CID=$_GET['CID'];
					$sql ="Select * From products where CID=".$CID;
					$row = Query($sql);
				for($i=0;$i<count($row);$i++) 
					{?>
					<div class="col-sm-4">
						<div class="khoi">
							<div class="tieude"><?=$row[$i][1]?></div>
							<div class="noidung">
								<a href="INDEX2.php?PID=<?=$row[$i][0]?>".>
									<img class="img-thumbnail" src="<?=$row[$i][2]?>" width="100%">
								</a>
							</div>
						</div>
					</div>
					<hr class="d-sm-none">
					<?php 
					} ?>
				<?php
				}
				elseif(isset($_GET['PID']))
				{
					$PID=$_GET['PID'];
					$sql = "Select * from products where PID='".$PID."'";
					$row = Query($sql);
					for($i=0;$i<count($row);$i++) 
						{?>
					<div class="col-sm-12">
						<img src="<?=$row[$i][2]?>" width="100%">
						<h4><?=$row[$i][1]?></h4>
						<h6><?=$row[$i][4]?>.000₫</h6>
						<div>Product ID: <?=$row[$i][0]?></div>
						<a href="order.php"><button>BUY NOW!</button></a>
						<div class="content" style="width: 100%"><?=$row[$i][6]?></div>
					</div>
					<hr class="d-sm-none">
						<?php 
						}
				}
				else
				{
					$sql ="Select * From products";
					$row = Query($sql);
					for($i=0;$i<count($row);$i++) 
						{?>
					<div class="col-sm-4">
						<div class="khoi">
							<div class="tieude"><?=$row[$i][1]?></div>
							<div class="noidung">
								<a href="INDEX2.php?PID=<?=$row[$i][0]?>".>
									<img class="img-thumbnail" src="<?=$row[$i][2]?>" width="100%" height="100%">
								</a>
							</div>
						</div>
					</div>
					<hr class="d-sm-none">
					<?php 
					}
				}
				

				?>
		</div>
	</div>



</body>
</html>