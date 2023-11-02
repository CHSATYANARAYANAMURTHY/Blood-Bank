<?php 
include("newconn.php");

if (isset($_POST['submit'])){
	$username = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	
	$emailquery = "select * from donor where Email='$email'";
	$query = mysqli_query($con,$emailquery);
	$emailcount = mysqli_num_rows($query);
	if($emailcount>0){
		?>
			<script>
			alert("Email Already Registered"); window.location.href="login user.php";</script>
			<?php
		
	}else{
		if($password === $cpassword){
			
			$insertquery = "insert into donor(Name, Email, Phone_Number, Password, Confirm_Password) value('$username', '$email', '$phone' ,'$password', '$cpassword')";
			$iquery = mysqli_query($con, $insertquery);

		}else{
			?>
			<script>
			alert("Password Not Matching"); window.location.href="login user.php";</script>
			<?php
		}echo '<script>alert("Register Successfully");window.location.href="login user.php";</script>';
	}
}
mysqli_close($con);

?>