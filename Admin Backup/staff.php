<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    
body {
  background-image: url('blood3.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
    margin:0;
	padding:0;
    font-family: 'Poppins','san-serif';
}
.navbar-header{
	height:70px;
	font-size:50px;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="font-size:3vw">BLOODBANK</a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php" ><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
	 <ul class="nav navbar-nav navbar-right">
	 <li><a href="Report.php">Report</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Manage Staff.php">Staff</a></li>
          <li><a href="Manage Donor.php">Donor</a></li>
        </ul>
      </li>
      <li><a href="#">Appointment</a></li>
      <li><a href="Admin Profile.php">Profile</a></li>
    </ul>
  </div>
</nav> 
</body>
</html>