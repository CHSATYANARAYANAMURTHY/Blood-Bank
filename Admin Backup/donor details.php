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
<title> Staff </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body  style="background-color:#49EEB5;">
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-10">
</div>
</div>
</div>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 mt-5 bg-info p-2 rounded">
<h2 class="bg-light p-2 rounded text-center text-dark">Donor</h2>
<h4 class="text-light mt-3">Name : <?= $vname; ?></h4>
<h4 class="text-light mt-3">Email : <?= $vemail; ?></h4>
<h4 class="text-light mt-3">Age : <?= $vage; ?></h4>
<h4 class="text-light mt-3">Blood Group : <?= $vblood; ?></h4>
<h4 class="text-light mt-3">Contact Number : <?= $vphone; ?></h4>
<h4 class="text-light mt-3">Address : <?= $vaddress; ?></h4>
<h4 class="text-light mt-3">Gender : <?= $vgender; ?></h4>
</div>
</div>
</div>
</body>
</html>