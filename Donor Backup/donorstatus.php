<?php
session_start();

if(!isset($_SESSION['id'])){
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Booking Status</title>
  <link rel="stylesheet" href="style.css">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
* 
{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          outline: none;
          font-family:'Poppins','san-serif';
}
body
{
	background: url('donation.jpg');
    background-size: cover;
    color: aliceblue;
    
}
.navbar
{
	position: fixed;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: row;
	flex-wrap: wrap;
	background-color: #0D0D0B;
	width: 100%;
	height: 70px;
	z-index:1;
}
.nav
{
	display: flex;
	justify-content:right;
	list-style:none;
	margin-right:4%;
}
.logo
{
	flex: 1 1 auto;
	margin-left:10%;
	text-transform:uppercase;
	letter-spacing:1px;
	font-weight: bold;
	font-size:35px;
}
a
{
	margin:15px;
	color:#E9E9D4;
	text-decoration:none;
	text-transform:uppercase;
}
a:hover
{
	color:#F1420A;
}
.profile-input-field
{
    position: absolute;
    top: 22%;
    transform: rotateY(-50%);
    width: 100%;
    padding: 0 20px;
}
.form-group
{
    max-height: 330px;
    max-width: 546px;
    margin: 0 auto;
    background:rgba(0,0,0,0.8);
    border border-radius: 5px;
    display:flex;
    flex-direction: column;
    box-shadow: 0 0 10px rgba(0,0,0,0.13);
}
input
{
    margin: 10px 0;
    background: transparent;
    border: 0;
    border-bottom: 2px solid #c5ecfd;
    padding: 10px;
    color: black;
    width: 100%;
    height: 40px;
    text-align: center;
}
.btn
{
    text-align: center;
    cursor: pointer;
    text-transform: uppercase;
}
#history {
    border-collapse: collapse;
	width: 100%;
}
		  
#history td, #history th{
background:#00e600;
opacity: 1.0;
color:white;
border: 1px solid #ddd;
padding: 8px;
}
		  
#history tr: hover{
background-color: #ddd;
}
		  
#history th{
padding-top:12px; 
padding-bottom: 12px;
text-align: left;
background-color: #02b865;
color: white;
}
  </style>
  </head>
  <header>
<div class="navbar">
<a href="#" class="logo">Blood Bank</a>
<ul class="nav">
<li><a href="DonorHome.php">Home</a></li>
    <li><a href="Donor.php">Profile</a></li>
		<li><a href="donorHistory.php">History</a></li>
			<li><a href="donornewAppointment.php">Appointment</a></li>
				<li><a href="logout.php">Logout</a></li>
</ul>
</div>
</header>
<body>
<center><br><br><br><br>
  <h1>Booking Status</h1>
  <div>  
  
        <?php

		    include ("newconn.php"); 
		    $id=$_SESSION['id'];
			$sql = "SELECT appointment.AppointmentID, appointment.Name, appointment.Email, appointment.Phone, appointment.Date, appointment.Time, appointment.Status, appointment.DonorID 
					FROM appointment INNER JOIN donor on appointment.DonorID = donor.DonorID
					WHERE (Status = 'pending' OR Status = 'Approved') AND donor.DonorID = '{$_SESSION["id"]}'
					ORDER BY date DESC" or die(mysqli_error());
            $result = mysqli_query($con,$sql);
            ?>

<table id="history">
		<!-- static row/table header -->
		    <tr>
				
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Date</th>
				<th>Time</th>
				<th>Status</th>
                <th>Action</th>
              
            </tr>  
            
            <?php
		    while ($row = mysqli_fetch_array($result))
			{
			    echo '<tr>';
				
				/*echo '<td>';
				echo $row['contact_name']
				echo '</td>';*/
				
				echo '<td>' .$row['AppointmentID'].'</td>';
				echo '<td>' .$row['Name'].'</td>';
				echo '<td>' .$row['Email'].'</td>';
				echo '<td>' .$row['Phone'].'</td>';
				echo '<td>' .$row['Date'].'</td>';
                echo '<td>' .$row['Time'].'</td>';
                echo '<td>' .$row['Status'].'</td>';
				echo '<td><a onclick="return confirm(\'Cancel booking '.$row['AppointmentID'].' ?\')"
				href="Donordelete.php?Id='.$row['AppointmentID'].'">Delete</td>';
				
				echo '</tr>';
			}
			?>
        </table>
<center><br><br><br><br>
  <h3>*Please call our centre to inform cancellation on your booking*</h3>
</body>

</html>
