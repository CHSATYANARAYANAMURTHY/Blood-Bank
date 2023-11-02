<?php
session_start();
include 'newconn.php';

if (isset($_POST['login'])){
	$username = $_POST['email'];
	$password = $_POST['password'];
	
	$sql ="SELECT * FROM staff where Email=? AND Password=?";
	$stmt=$con->prepare($sql);
	$stmt->bind_param("ss",$username,$password);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	
	session_regenerate_id();
	$_SESSION['id']=$row['Id'];
	$_SESSION['username'] = $row['Email'];
	session_write_close();
	
	if($result->num_rows==1){
		header("location:staff.php");
	}else{
		?>
			<script>
			alert("EMAIL OR PASSWORD IS INCORRECT!"); window.location.href="login staff.php";</script>
			<?php
		
	}
}
?>
<html>
<head>
    <title> Staff Login </title>
    <link rel="stylesheet" type="text/css" href="css/all.min">
    <style>
	body{
    margin: 0;
    padding: 0;
    background: url(blood5.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}
.login-box{
    width: 320px;
    height: 420px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}
.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}
h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}
.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}
.login-box input{
    width: 100%;
    margin-bottom: 20px;
}
.login-box button{
    width: 100%;
    margin-bottom: 20px;
}
.login-box input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid black;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.login-box button[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.login-box button[type="submit"]:hover
{
    cursor: pointer;
    background: #39dc79;
    color: #000;
}
::placeholder {
  color: black;
}
.fa{
  margin-right: 10px;
}
.eye1{
   position: absolute;
   top: 230px;
  right: 40px;
}
#hide1{
  display: none;
}
</style>
</head>
    <body>
    <div class="login-box">
    <img src="nur.png" class="avatar">
        <h1>Login Here</h1>
            <form method="POST" action="#">
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email Address">
            <p>Password</p>
            <input type="password" name="password" id="pass" placeholder="Enter Password">
			<span class="eye1" onclick="myFunction1()">
                <i id="hide1" class="fa fa-eye fa-lg" ></i>
                <i id="hide2" class="fa fa-eye-slash fa-lg"></i>
            </span>
			<button type="Submit" name="login" class="Submit-btn">Login</button>         
            </form>
        
        
        </div>
     <script>
    function myFunction1(){
      var x = document.getElementById("pass");
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
	</script>
    </body>
</html>