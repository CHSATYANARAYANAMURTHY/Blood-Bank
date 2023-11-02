<?php
session_start();
if(!isset($_SESSION['id']))
{

    header('Location: index.php');
}
?>
<?php
include 'action donor.php';
?>
<html>
<head>
<title> Donor </title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.navbar-nav > li{
  padding-left:40px;
  padding-right:40px;
   font-size: 17px;
}

</style>
</head>

<body style="background-color:#49EEB5;">
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
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-10"><br>
<h3 class="text-center text-info"> Donor </h3>
<hr>
</div>
</div>
<div class="row">
<div class="col-md-4">
<br><br>
<form action="action donor.php" method="post">
<input type="hidden" name="id" value="<?= $id; ?>">
<div class="form-group">
<input type="text" name="name" value="<?= $name; ?>" class="form-control"  placeholder="Name" required>
</div>
<div class="form-group">
<input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="Email" required>
</div>
<div class="form-group">
<input type="password" name="password" value="<?= $password; ?>" class="form-control" placeholder="Password" required>
</div>
<div class="form-group">
<input type="password" name="cpassword" value="<?= $cpass; ?>" class="form-control" placeholder="Confirm Password" required>
</div>
<div class="form-group">
<input type="text" name="address"  value="<?= $address; ?>" class="form-control" placeholder="Address" required>
</div>
<div class="form-group">
<input type="tel" name="phone" value="<?= $phone; ?>" class="form-control" placeholder="Phone Number" required>
</div>
<div class="form-group">
<input type="number" name="age" value="<?= $age; ?>" class="form-control" placeholder="Age" required>
</div>
<div class="form-group">
<label>Gender:</label><br>
<input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') echo 'checked="checked"'; ?>" /> Male<br>
<input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') echo 'checked="checked"'; ?>" /> Female<br>
</div>
<div class="form-group">
<label for="blood">Blood Group:</label>
  <select id="blood" name="blood">
  <option selected="true" disabled="disabled">Choose Blood Group</option>  
    <option value="A" <?php if ($blood == 'A') echo 'selected="selected""'; ?>"/>A</option>
    <option value="B" <?php if ($blood == 'B') echo 'selected="selected""'; ?>"/>B</option>
    <option value="AB" <?php if ($blood == 'AB') echo 'selected="selected""'; ?>"/>AB</option>
    <option value="O" <?php if ($blood == 'O') echo 'selected="selected""'; ?>"/>O</option>
  </select><br>
  </div>
<div class="form-group">
<?php if($update==true){?>
<input type="submit" name="update" class="btn btn-success btn block" value="Update User">
<?php } else{?>
<input type="submit" name="add" class="btn btn-primary btn block" value="Add User">
<?php } ?>
</div>
</form>
</div>
<div class="col-md-8">
<?php
$query="SELECT * FROM donor";
$stmt=$con->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
 <table class="table table-hover"><br><br>
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
		<th>Phone Number</th>
		<th>Email Address</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php while($row=$result->fetch_assoc()){?>
      <tr>
        <td><?=$row['DonorID']; ?></td>
        <td><?=$row['Name']; ?></td>
		<td><?=$row['Phone_Number']; ?></td>
		<td><?=$row['Email']; ?></td>
		<td>
	    <a href="donor details.php?details=<?= $row['DonorID']; ?>" class="badge badge-primary p-2">Details</a>
		<a href="action donor.php?delete=<?= $row['DonorID']; ?>" class="badge badge-danger p-2" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
		<a href="Manage Donor.php?edit=<?= $row['DonorID']; ?>" class="badge badge-success p-2" name="update">Update</a>
		</td>
      </tr>
	<?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>
</body>
</html>