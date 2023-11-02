<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
.container{
	margin-top: 5%;
}
.header{
	margin-top:2%;
	color:white;
}
.card-img-top{
	background-color:#ffffff;
}
.btn{
	background-color:#000099;
}

</style>
</head>
<body style="background-color:#002b80;"><br>
<div class="header"></div>
<h1 style="text-align:center; color:white; font-size:50px"> WELCOME <h1>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-4">
<div class="card shadow" style="width: 20rem;">
  <img src="admin.png" class="card-img-top" alt="admin">
  <div class="card-body text-center">
    <h5 class="card-title">Admin</h5>
    <a href="login admin.php" class="btn btn-success">LOGIN</a>
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card shadow" style="width: 20rem;">
  <img src="nurse.png" class="card-img-top" alt="staff">
  <div class="card-body text-center">
    <h5 class="card-title">Staff</h5>
    <a href="login staff.php" class="btn btn-success">LOGIN</a>
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card shadow" style="width: 20rem;">
  <img src="user.png" class="card-img-top" alt="user">
  <div class="card-body text-center">
    <h5 class="card-title">Donor</h5>
    <a href="login user.php" class="btn btn-success">LOGIN</a>
  </div>
</div>
</div>
</div>
</div>
</body>
</html>