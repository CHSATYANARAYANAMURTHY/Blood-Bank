<?php
session_start();
include 'newconn.php';

if (isset($_POST['login'])){
	$username = $_POST['email'];
	$password = $_POST['password'];
	
	$sql ="SELECT * FROM donor where Email=? AND Password=?";
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
		header("location:Setting.php");
	}else{
		?>
			<script>
			alert("EMAIL OR PASSWORD IS INCORRECT!"); window.location.href="login user.php";</script>
			<?php
		
	}
}
?>
<html>
<head>
<title> User Login </title>
<link rel="stylesheet" type="text/css" href="css/all.min">
<style>
body{
	margin:0;
	padding:0;
	font-family:sans-serif;
}
.hero{
height:100%;
width:100%;
background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(blood5.jpg);
background-position: center;
background-size: cover;
position: absolute;
}
.form-box{
width:380px;
height:500px;
position:relative;
margin:6% auto;
 background: rgba(0, 0, 0, 0.5);
    color: #fff;
padding:5px;
overflow:hidden;
}
.button-box{
width:220px;
margin:35px auto;
position: relative;
box-shadow:0 0 20px 9px ##ff61241f;
border-radius:30px;
}
.toggle-btn{
padding:10px 30px;
cursor: pointer;
background: transparent;
border:0;
outline:none;
position:relative;
}
#btn{
top:0;
left:0;
position:absolute;
width:110px;
height:100%;
background: linear-gradient(to right, #ff105f,#ffad06);
border-radius:30px;
transition:.5s;
}
.input-group{
top:100px;
position:absolute;
width:280px;
transition:.5s;
}
.input-field{
width:100%;
padding:10px 0;
margin:15px 0;
border-left:0;
border-top:0;
border-right:0;
border-bottom:1px solid #999;
outine:none;
background:transparent;
color:white;
}
.Submit-btn{
width:85%;
padding:10px 30px;
cursor:pointer;
display:block;
margin-top : 15px;
margin-left: 20px;
height: 40px;
top:20px;
background:linear-gradient(to right, #ff105f,#ffad06);
border:0;
outine:none;
border-radius:30px;
}
.check-box{
margin:30px 10px 30px 0;
}
span{
color:#777;
font-size:12px;
bottom:68px;
position:absolute;
}
#login{
left:50px;
}
#register{
left:450px;
}
::placeholder {
  color: white;
}
.fa{
  margin-right: 10px;
  color: white;
}
.eye1{
   position: absolute;
   top: 100px;
  right: 10px;
}
.eye2{
   position: absolute;
   top: 230px;
  right: 20px;
}
.eye3{
   position: absolute;
   top: 298px;
  right: 20px;
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
<body>
<div class="hero">
<div class="form-box">
<div class="button-box">
<div id="btn"></div>
<button type="button" class="toggle-btn" onclick="Login()">Log In</button>
<button type="button" class="toggle-btn" onclick="Register()">Register</button>
</div>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" id="login"class="input-group">
<input type="email" name="email" class="input-field" placeholder="Email Address" required>
<input type="Password" name="password" class="input-field" id="pass" placeholder="Password" required>
<span class="eye1" onclick="myFunction1()">
                <i id="hide1" class="fa fa-eye fa-lg" ></i>
                <i id="hide2" class="fa fa-eye-slash fa-lg"></i>
            </span>
 <br><br>
<button type="Submit" name="login" class="Submit-btn">Log In</button>

</form>
<form action="insert.php" method="POST" id="register"class="input-group">
<input type="text" name="name" class="input-field" placeholder="Full Name" required>
<input type="email" name="email" class="input-field" placeholder="Email Id" required>
<input type="tel" name="phone" class="input-field" placeholder="Phone Number" required>
<input type="Password" name="password"class="input-field" id="newpass" placeholder="Password" required>
<span class="eye2" onclick="myFunction2()">
                <i id="hide3" class="fa fa-eye fa-lg" ></i>
                <i id="hide4" class="fa fa-eye-slash fa-lg"></i>
            </span>
<input type="Password" name="cpassword"class="input-field" id="confirmpass" placeholder="Confirm Password" required>
<span class="eye3" onclick="myFunction3()">
                <i id="hide5" class="fa fa-eye fa-lg" ></i>
                <i id="hide6" class="fa fa-eye-slash fa-lg"></i>
            </span>
<button type="Submit" name="submit" class="Submit-btn">Submit</button>
</form>
</div>
</div>
<script>
var x= document.getElementById("login");
var y= document.getElementById("register");
var z= document.getElementById("btn");

function Register(){
x.style.left="-400px";
y.style.left="50px";
z.style.left="110px";
}
function Login(){
x.style.left="50px";
y.style.left="450px";
z.style.left="0px";
}
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