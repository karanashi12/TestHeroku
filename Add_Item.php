<!DOCTYPE html>
<html>
<head>
  <title>Shop4E Admin</title>
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

<div class="jumbotron text-center">
  <h1>Shop4E</h1>
  <p>We are all in this together</p>
</div>
  
  <form method="post" action="">
    <a href="admin.php">Manage Items</a>
    <?php include('error.php'); ?>
    <div class="input-group">
      <label>Product ID:</label>
      <input type="text" name="pid" >
    </div>
    <div class="input-group">
      <label>Product name:</label>
      <input type="text" name="pname">
    </div>
    <div class="input-group">
      <label>Image source:</label>
      <input type="text" name="image" >
    </div>
    <div class="input-group">
      <label>Price tag:</label>
      <input type="text" name="price" >
    </div>
    <div class="input-group">
      <label>Stock:</label>
      <input type="number" name="stock" min="0">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="Add_item">Add</button>
    </div>
  </form>
</body>
</html>