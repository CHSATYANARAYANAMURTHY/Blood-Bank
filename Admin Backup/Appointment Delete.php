<?php
include "newconn.php";

if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	
	$query="DELETE FROM appointment WHERE AppointmentID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	echo '<script>alert("Deleted Succesful!");window.location.href="View Appointment.php";</script>';
}
?>