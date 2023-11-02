<?php
session_start();
if(!isset($_SESSION['id']))
{

    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
  
  <title>Admin Change Password</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    font-family: 'Poppins','san-serif';
}
h1
{
    color:aliceblue;
    text-align: center;
    margin: 3px;
	padding-top:30px;
}
h3
{
    color: aliceblue;
    text-align: center;
}
body
{
    background-color: #618DF4;
    color: aliceblue;

}
.profile-input-field
{
    position: absolute;
    top: 28%;
    transform: rotateY(-50%);
    width: 100%;
    padding: 0 20px;
}
.form-group
{
    max-height: 170px;
    max-width: 550px;
    margin: 0 auto;
    background:rgba(0,0,0,0.8);
    border border-radius: 5px;
    display:flex;
    flex-direction: column;
    box-shadow: 0 0 10px rgba(0,0,0,0.13);
    text-align: center;
}
input
{
    margin: 10px 0;
    background: transparent;
    border: 0;
    border-bottom: 2px solid #c5ecfd;
    padding: 10px;
    color: ghostwhite;
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

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a{
  float: right;
  font-size: 16px;
  color: white;
  text-align: center;
   padding-left:40px;
  padding-right:40px;
  padding-top:29px;
  text-decoration: none;
}

.dropdown {
  float: right;
   padding-left:40px;
  padding-right:40px;
 padding-top:15px;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

 a:hover, .dropdown:hover .dropbtn {
 color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.navbar >li{
  padding-left:40px;
  padding-right:40px;
   font-size: 17px;
}
  
  .fa{
  margin-right: 10px;
}

.eye2{
   position: absolute;
   top: 295px;
  right: 500px;
}
.eye3{
   position: absolute;
   top: 380px;
  right: 500px;
}

#hide3{
  display: none;
}
#hide5{
  display: none;
}
</style>
  </head>
  <?php
  include 'newconn.php';
$id=$_SESSION['id'];
$query=mysqli_query($con,"SELECT * FROM admin where AdminID='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>

<body>
<div class="navbar">
  <a href="logout.php">Logout</a>
  <a href="Report.php">Report</a>
  <div class="dropdown">
    <button class="dropbtn">Manage
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Manage Staff.php">Staff</a>
      <a href="Manage Donor.php">Donor</a>
    </div>
  </div> 
  <a href="View Appointment.php">Appointment</a>
  <a href="Admin Profile.php">Profile</a>
  <a href="Admin.php">Home</a>
</div>
    <h1>Change Password</h1>
    <div class="profile-input-field">
        <form method="post" action="#" >
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="fname" style="width:41em;" placeholder="Enter your Fullname" value="<?php echo $row['Name']; ?>" required readonly/>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" style="width:41em;" placeholder="Enter your Email" value="<?php echo $row['Email']; ?>"  required readonly/>
          </div>
          <div class="form-group">
            <label>Old Password</label>
            <input type="password" class="form-control" name="old_pass" id="oldpass" style="width:41em;" placeholder="Enter your Password" value="<?php echo $row['Password']; ?>" required readonly/>
            
          </div>
          <div class="form-group">
            <label>New Password</label>
            <input type="password" class="form-control" name="new_pass" id="newpass" style="width:41em;" required placeholder="Enter your New Password" >
            <span class="eye2" onclick="myFunction2()">
                <i id="hide3" class="fa fa-eye" ></i>
                <i id="hide4" class="fa fa-eye-slash"></i>
            </span>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="confirm_pass" id="confirmpass" style="width:41em;" required placeholder="Enter your New Password again" >
            <span class="eye3" onclick="myFunction3()">
                <i id="hide5" class="fa fa-eye" ></i>
                <i id="hide6" class="fa fa-eye-slash"></i>
            </span>
          </div>
          <div class="form-group">
            <label>
          <div class="btn">
            <input type="submit" name="submit" class="btn btn-primary" style="width:15em;height:1cm; margin:1;">
          </div>
        </form>
      </div>
      
      <script>
   
    function myFunction2(){
      var x = document.getElementById("newpass");
      var y = document.getElementById("hide3");
      var z = document.getElementById("hide4");

      if(x.type === 'password'){
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
      }
      else{
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
      }
      
    }
    function myFunction3(){
      var x = document.getElementById("confirmpass");
      var y = document.getElementById("hide5");
      var z = document.getElementById("hide6");

      if(x.type === 'password'){
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
      }
      else{
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
      }
      
    }

    </script>
    </body>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $fullname = $_POST['fname'];
        $email = $_POST['email'];
        $old = $_POST['old_pass'];
        $new = $_POST['new_pass'];
        $confirm = $_POST['confirm_pass'];
if($new=== $confirm){
			
			$insertquery = "update admin SET Password = '$new' WHERE AdminID = '$id'";
			$iquery = mysqli_query($con, $insertquery);

		}else{
			?>
			<script>
			alert("Password Not Matching"); window.location.href="Admin Password.php";</script>
			<?php
		}echo '<script>alert("Password Change Successfully");window.location.href="Admin Password.php";</script>';
	}
mysqli_close($con);

?>