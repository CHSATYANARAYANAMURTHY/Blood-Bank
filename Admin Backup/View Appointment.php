<?php
session_start();
if(!isset($_SESSION['id']))
{

    header('Location: index.php');
}
?>
<?php
include "newconn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
.navbar-nav > li{
  padding-left:40px;
  padding-right:40px;
   font-size: 17px;
}
body{
background: linear-gradient(to right, #ff99ff 0%, #66ccff 100%);
}
</style>
  <title>Appointment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link"  href="Admin.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Admin Profile.php">Profile</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="View Appointment.php">Appointment</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Manage Staff.php">Staff</a>
          <a class="dropdown-item" href="Manage Donor.php">Donor</a>
          
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Report.php">Report</a>
		<li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      </li>
    </ul>
    
  </div>
</nav>
<?php
$query= "SELECT * FROM appointment WHERE Status IN ('Pending', 'Approved')";
$stmt=$con->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
<center>
<div class="container"><br><br>
  <h2>Appointment</h2><br>       
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th style=text-align:center>Name</th>
        <th style=text-align:center; >Email</th>
		<th style=text-align:center; >Phone Number</th>
        <th style=text-align:center; >Date</th>
		 <th style=text-align:center; >Time</th>
		 <th style=text-align:center; >Status</th>
		<th style=text-align:center; >Action</th>
      </tr>
    </thead>
    <tbody>
<?php while($row=$result->fetch_assoc()){?>
      <tr>
        <td style=text-align:center; ><?=$row['Name']; ?></td>
		<td style=text-align:center; ><?=$row['Email']; ?></td>
		<td style=text-align:center; ><?=$row['Phone']; ?></td>
		<td style=text-align:center; ><?=$row['Date']; ?></td>
		<td style=text-align:center; ><?=$row['Time']; ?></td>
		<td style=text-align:center; ><?=$row['Status']; ?></td>
		<td style=text-align:center; >
		<a href="Appointment Delete.php?delete=<?= $row['AppointmentID']; ?>" class="badge badge-danger p-2" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
		</td>
      </tr>
	<?php } ?>

    </tbody>
  </table>
</div>
</center>
</body>
</html>
