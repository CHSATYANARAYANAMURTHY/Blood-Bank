<?php
include 'newconn.php';
$update=false;
$id="";
	$name="";
	$email="";
	$phone="";
	$password="";
	$address="";
	$gender="";

if(isset($_POST['add'])){
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Password=$_POST['password'];
	$Address=$_POST['address'];
	$Phone=$_POST['phone'];
	$Gender=$_POST['gender'];
	
	$emailquery = "select * from staff where Email='$Email'";
	$query = mysqli_query($con,$emailquery);
	$emailcount = mysqli_num_rows($query);
	if($emailcount>0){
		?>
			<script>
			alert("Email Already Registered"); window.location.href="Manage Staff.php";</script>
			<?php
	}else{
	$query="INSERT INTO staff(Name, Email, Phone_Number, Password, Address, Gender)
	values('$Name','$Email','$Phone','$Password','$Address','$Gender')";
	if (!mysqli_query($con,$query))
{
    die('Error: '.mysqli_error($con));
}
}

echo '<script>alert("Added Successfully!");window.location.href="Manage Staff.php";</script>';

mysqli_close($con);
}
if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	
	$query="DELETE FROM staff WHERE StaffID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	echo '<script>alert("Deleted Successfully!");window.location.href="Manage Staff.php";</script>';
}
if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	$query="select * from staff where StaffID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();
	
	$id=$row['StaffID'];
	$name=$row['Name'];
	$email=$row['Email'];
	$phone=$row['Phone_Number'];
	$password=$row['Password'];
	$address=$row['Address'];
	$gender=$row['Gender'];
	
	$update=true;
}
if(isset($_POST['update'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	
	$query="UPDATE staff set Name=?,Email=?,Phone_Number=?,Password=?,Gender=?,Address=? where StaffID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("ssssssi",$name,$email,$phone,$password,$gender,$address,$id);
	$stmt->execute();
	if(mysqli_affected_rows($con)>0){
	echo '<script>alert("Updated Successfully!");window.location.href="Manage Staff.php";</script>';
	}else{
		echo '<script>alert("No User Is Updated!");window.location.href="Manage Staff.php";</script>';
		echo mysqli_error($con);
	}
}
if(isset($_GET['details'])){
	$id=$_GET['details'];
	$query="select * from staff where StaffID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();
	
	$vid=$row['StaffID'];
	$vname=$row['Name'];
	$vemail=$row['Email'];
	$vphone=$row['Phone_Number'];
	$vaddress=$row['Address'];
	$vgender=$row['Gender'];
	
}

?>