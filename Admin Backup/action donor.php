<?php
include 'newconn.php';
$update=false;
$id="";
	$name="";
	$email="";
	$phone="";
	$password="";
	$cpass="";
	$address="";
	$age="";
	$gender="";
	$blood="";

if(isset($_POST['add'])){
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Password=$_POST['password'];
	$Address=$_POST['address'];
	$Phone=$_POST['phone'];
	$Age=$_POST['age'];
	$Gender=$_POST['gender'];
	$Blood=$_POST['blood'];
	$cpass=$_POST['cpassword'];

	$emailquery = "select * from donor where Email='$Email'";
	$query = mysqli_query($con,$emailquery);
	$emailcount = mysqli_num_rows($query);
	if($emailcount>0){
		?>
			<script>
			alert("Email Already Registered"); window.location.href="Manage Donor.php";</script>
			<?php
	}else{
	$query="INSERT INTO donor(Name, Email, Phone_Number, Password, Confirm_password, Address, Age, Gender, Blood_Group)
	values('$Name','$Email','$Phone','$Password','$cpass','$Address','$Age','$Gender','$Blood')";
	if (!mysqli_query($con,$query))
{
    die('Error: '.mysqli_error($con));
}
}

echo '<script>alert("Added Successfully!");window.location.href="Manage Donor.php";</script>';

mysqli_close($con);
}
if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	
	$query="DELETE FROM donor WHERE DonorID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	echo '<script>alert("Deleted Successfully!");window.location.href="Manage Donor.php";</script>';
}
if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	$query="select * from donor where DonorID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();
	
	$id=$row['DonorID'];
	$name=$row['Name'];
	$email=$row['Email'];
	$phone=$row['Phone_Number'];
	$password=$row['Password'];
	$address=$row['Address'];
	$age=$row['Age'];
	$gender=$row['Gender'];
	$blood=$row['Blood_Group'];
	$cpass=$row['Confirm_Password'];
	
	$update=true;
}
if(isset($_POST['update'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$blood=$_POST['blood'];
	$cpass=$_POST['cpassword'];
	
	$query="UPDATE donor set Name=?,Email=?,Phone_Number=?,Password=?,Confirm_Password=?,Address=?,Age=?,Gender=?,Blood_Group=? where DonorID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("sssssssssi",$name,$email,$phone,$password,$cpass,$address,$age,$gender,$blood,$id);
	$stmt->execute();
	if(mysqli_affected_rows($con)>0){
	echo '<script>alert("Updated Successfully!");window.location.href="Manage Donor.php";</script>';
	}else{
		echo '<script>alert("No User Is Updated!");window.location.href="Manage Donor.php";</script>';
		echo mysqli_error($con);
	}
}
if(isset($_GET['details'])){
	$id=$_GET['details'];
	$query="select * from donor where DonorID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();
	
	$vid=$row['DonorID'];
	$vname=$row['Name'];
	$vemail=$row['Email'];
	$vphone=$row['Phone_Number'];
	$vaddress=$row['Address'];
	$vage=$row['Age'];
	$vgender=$row['Gender'];
	$vblood=$row['Blood_Group'];
	
}
?>