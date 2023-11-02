<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['id']){
header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Donor Profile</title>
  <link rel="stylesheet" href="styles.css">
  </head>
  <?php
  include 'newconn.php';
$id=$_SESSION['id'];
$query=mysqli_query($con,"SELECT * FROM donor where Id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
<header>
    <div class="navbar">
        <a href="#" class="logo">Blood Bank</a>
        <ul class="nav">
            <li><a href="Donor%20Home.php">Home</a></li>
            <li><a href="Appointment.php">Appointment</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</header>
<body>
    <br><br><br>
    <h1>User Profile</h1>
    <h3>Please Fill-out All Fields</h3>
    <div class="profile-input-field">
        <form method="post" action="#" >
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="fname" style="width:41em;" placeholder="Enter your Fullname" value="<?php echo $row['Name']; ?>" required />
          </div>
          <div class="form-group">
            <label>Gender</label>
            <input type="text" class="form-control" name="gender" style="width:41em;" placeholder="Enter your Gender" required value="<?php echo $row['Gender']; ?>" />
          </div>
          <div class="form-group">
            <label>Age</label>
            <input type="number" class="form-control" name="age" style="width:41em;" placeholder="Enter your Age" value="<?php echo $row['Age']; ?>">
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" style="width:41em;" required placeholder="Enter your Address" value="<?php echo $row['Address']; ?>">
          </div>
          <div class="form-group">
            <label>
          <div class="btn">
            <input type="submit" name="submit" class="btn btn-primary" style="width:15em;height:1cm; margin:1;">
          </div>
          <div class="btn">
            <input type="submit" name="change_password" value="Change Password" class="btn btn-primary" style="width:15em;height:1cm; margin:1;">
          </div>
        </form>
      </div>
    </body>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
      $query = "UPDATE donor SET Name = '$fullname',
                      Gender = '$gender', Age = $age, Address = '$address'
                      WHERE Id = '$id'";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "Donor.php";
        </script>
        <?php
      }
      if (isset($_POST["change_password"])){
        ?>
        <script type="text/javascript"> 
        window.location="Setting.php";
        </script>

        <?php 
      }             
?>