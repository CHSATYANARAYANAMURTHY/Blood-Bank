<?php
session_start();

if(!isset($_SESSION['id'])){
header("location:index.php");
}
$mysqli = new mysqli('localhost', 'root', '', 'bloodbanksys','3308');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from appointment where Date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['Time'];
            }
            
            $stmt->close();
        }
    }
}

if(isset($_POST['submit'])){
	$donorid = $_POST['DonorID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$timeslot = $_POST['timeslot'];
    $status = "Pending";
    $stmt = $mysqli->prepare("select * from appointment where Date = ? AND Time = ?");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";          
        }else{
            $stmt = $mysqli->prepare("INSERT INTO appointment (DonorID,Name,Email,Phone,Date,Time,Status) VALUES (?,?,?,?,?,?,?)"); 
            $stmt->bind_param('sssssss', $donorid, $name, $email, $phone, $date, $timeslot, $status);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $bookings[]=$timeslot;
            $stmt->close();
            $mysqli->close(); 
        }
    }
   
}

$duration = 30;
$cleanup = 0;
$start = "09:00";
$end = "18:00";


function timeslots($duration,$cleanup,$start,$end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }

        $slots[]=$intStart->format("H:iA")."-". $endPeriod->format("H:iA");

    }

    return $slots;

}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Appointment Booking Slot</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
* 
{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          outline: none;
          font-family:'Poppins','san-serif';
}
body
{
	background: url('donation.jpg');
    background-size: cover;
    color: aliceblue;
    
}
.navbar
{
	position: fixed;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: row;
	flex-wrap: wrap;
	background-color: #0D0D0B;
	width: 100%;
	height: 70px;
	z-index:1;
}
.nav
{
	display: flex;
	justify-content:right;
	list-style:none;
	margin-right:4%;
}
.logo
{
	flex: 1 1 auto;
	margin-left:10%;
	text-transform:uppercase;
	letter-spacing:1px;
	font-weight: bold;
	font-size:35px;
}
a
{
	margin:15px;
	color:#E9E9D4;
	text-decoration:none;
	text-transform:uppercase;
}
a:hover
{
	color:#F1420A;
}
.modal-title{
    color:black;
}
label{
    color:black;
}
</style>
  </head>
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
  <br><br><br><br><br><br>
    <div class="container">
        <h1 class="text-center">Appointment for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-12">
              <?php echo isset($msg)?$msg:""; ?>
            </div>
            <?php $timeslots = timeslots($duration,$cleanup,$start,$end); 
              foreach($timeslots as $ts){
            ?>
            <div class="col-md-2">
              <div class ="form-group">
                 <?php if(in_array($ts,$bookings)){ ?>
                    <button class="btn btn-danger"><?php echo $ts; ?></button>
                 <?php }else{?>
                    <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                 <?php }?>

              </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div id = "myModal" class="modal fade" role="dialog">
    <div class="model-dialog">

    <!-- Modal content -->
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Booking:<span id="slot"></span></h4>
    </div>
    <div class="modal-body">
    <div class="row">
    <div class="col-md-12">
    <form action="" method="post">
    <div class="form-group">
    <label for="">Timeslot</label>
    <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
    </div>
    <div class="form-group">
    <label for="">Name</label>
    <input required type="text" name="name"  class="form-control">
    </div>
    <div class="form-group">
    <label for="">Email</label>
    <input required type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
    <label for="">Phone</label>
    <input required type="text" name="phone" class="form-control">
    </div>
    <div class="form-group">
    <input type="hidden" name="DonorID" value="<?php echo $_SESSION['id'];?>" readonly>
    </div>
    <div class="form-group pull-right">
    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
       $(".book").click(function(){
           var timeslot = $(this).attr('data-timeslot');
           $("#slot").html(timeslot);
           $("#timeslot").val(timeslot);
           $("#myModal").modal("show");
       })
    </script>
  </body>

</html>
