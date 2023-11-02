<?php
include 'newconn.php';
         $sql ="SELECT Blood_Group, count(Blood_Group) as Blood FROM donor WHERE Blood_Group IN ('A', 'B', 'AB', 'O')
GROUP BY Blood_Group;";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $name[]  = $row['Blood_Group']  ;
            $total[] = $row['Blood'];
		 }
		 ?>
 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reports</title>
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
<br><br>
<div class="col-lg-8 col-md-8 col-sm-8" align="center" style="width:80%";>
    <h2 class="text-center" style="font-family:'Sans-serif'">Blood Storage Report</h2>
<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
// The type of chart we want to create
type: 'pie',

// The data for our dataset
data: {
    labels: <?php echo json_encode($name);?>,
    datasets: [{
        label: 'Assigned Licenses',
        backgroundColor:  [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
        borderColor: 'rgb(36,247,27,1.00)',
        data: <?php echo json_encode($total);?>,
    }]
},
options: {}
});

</script>
</div>
</body>
</html>