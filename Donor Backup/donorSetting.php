<?php
session_start();

if(!isset($_SESSION['username'])){
header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Change Password</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  
  .fa{
  margin-right: 10px;
}
.eye1{
   position: absolute;
   top: 210px;
	right: 700px;
}
.eye2{
	position: absolute;
	top: 295px;
	right: 700px;
}
.eye3{
	position: absolute;
	top: 380px;
	right: 700px;
}
#hide1{
  display: none;
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
$query=mysqli_query($con,"SELECT * FROM donor where DonorID='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
<header>
    <div class="navbar">
        <a href="#" class="logo">Blood Bank</a>
        <ul class="nav">
            <li><a href="DonorHome.php">Home</a></li>
            <li><a href="donornewAppointment.php">Appointment</a></li>
            <li><a href="donorstatus.php">Status</a></li>
            <li><a href="Donor.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</header>
<body>
    <br><br><br>
    <h1>Change Password</h1>
    <h3>Please Fill-out All Fields</h3>
    <div class="profile-input-field">
        <form method="post" action="#" >
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="fname" style="width:41em;" placeholder="Enter your Fullname" value="<?php echo $row['Name']; ?>" required readonly/>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" style="width:41em;" placeholder="Enter your Email" value="<?php echo $row['Email']; ?>"  required/>
          </div>
          <div class="form-group">
            <label>Old Password</label>
            <input type="password" class="form-control" name="old_pass" id="oldpass" style="width:41em;" placeholder="Enter your Password" value="<?php echo $row['Password']; ?>" required readonly/>
            <span class="eye1" onclick="myFunction1()">
                <i id="hide1" class="fa fa-eye" ></i>
                <i id="hide2" class="fa fa-eye-slash"></i>
            </span>
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
    function myFunction1(){
      var x = document.getElementById("oldpass");
      var y = document.getElementById("hide1");
      var z = document.getElementById("hide2");

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
      $query = "UPDATE donor SET Password = '$new', Email = '$email' WHERE DonorID = '$id'";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    ?>
                     <script type="text/javascript">
            alert("You have change your password successfully!");
            window.location = "Donor.php";
        </script>
        <?php
      }
      ?>
      