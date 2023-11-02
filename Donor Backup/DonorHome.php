<?php
session_start();

if(!isset($_SESSION['username'])){
header("location:index.php");
}
?>
<!doctype html>
<html>
<head>
<title> Donor </title>
<link rel="stylesheet" type="text/css" href="css/all.min">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*    
body{
	margin:0;
	padding:0;
	font-family:'Poppins','san-serif';
}
.navbar{
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
.nav{
	display: flex;
	justify-content:right;
	list-style:none;
	margin-right:4%;
}
.logo{
	flex: 1 1 auto;
	margin-left:10%;
	text-transform:uppercase;
	letter-spacing:1px;
	font-weight: bold;
	font-size:35px;
}
a{
	margin:15px;
	color:#E9E9D4;
	text-decoration:none;
	text-transform:uppercase;
}
a:hover{
	color:#F1420A;
}
.banner-area{
	position: relative;
	background-image:url(blood.jpg);
	width:100%;
	height:100vh;
	background-repeat:no-repeat;
	-webkit-background-size:cover;
	background-size:cover;
}
.contact-area{
	position:relative;
	display:flex;
	justify-content:space-around;
	align-items:baseline;
	flex-wrap:wrap;
	flex-direction:row;
	width:100%;
	height:700px;
    bottom: 0%;
}
p{
	font-size:24px;
	line-height:50px;
}
.contact-area{
	background:#262626;
	color:#fff;
    bottom:0%;
    width: 100%;
}
html{
	scroll-behavior: smooth;
}
.icon{
font-size:30px;
line-height:100px;
letter-spacing: 1px;
}
</style>
</head>
<body>
<div class="navbar">
<a href="#" class="logo">Blood Bank</a>
<ul class="nav">
<li><a href="#about">Guideline</a></li>
<li><a href="#contact">Contact Us</a></li>
<li><a href="donornewAppointment.php">Appointment</a></li>
<li><a href="donorstatus.php">Status</a></li>
<li><a href="donorHistory.php">History</a></li>
<li><a href="Donor.php">Profile</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>
<div class="banner-area" id="home"></div>
    <div class="about-area" id="about">
        <div class="text-part">
            <h1>General Blood & Platelet Donor Guidelines</h1>
            <h2>Why Guidelines Are Important</h2>
            <p>Donor eligibility rules help to protect the health and safety of the donor as well as the person who will receive a blood transfusion. The general guidelines listed below will help you determine if you are eligible to donate blood or platelets.</p>
            <h2>You and Your Donation Are Important to Us</h2>
            <p>Before donating, one of our medical professionals will discuss your health history with you in a private, confidential setting. After taking your pulse, blood pressure, and temperature and checking for anemia, we will determine whether you are eligible to be a donor.</p>
            <h2>General Guidelines</h2>
            <p>To donate blood or platelets, you must be in 'good general health', weigh at least 50 kilograms, and be at least 16 years old. Parental consent is required for blood donation by 16 year olds; 16 year olds are NOT eligible to donate platelets. No parental consent is required for those who are at least 17 years old. If you are 76 or older, you will need your doctor’s written approval for blood or platelet donation.</p>
            <h2>What Is ‘Good’ Health?</h2>
            <p>Good health means that you feel well and are able to carry out normal daily activities. If you have a chronic medical condition such as diabetes or high blood pressure, you may still be eligible as long as you are receiving treatment to control your condition.</p>
            <h2>Needed Identification</h2>
            <p>We require that you provide identification that shows your name and your photograph or signature.</p>
            <h2>What Conditions Would Make You Ineligible to Be a Donor?</h2>
            <p>You will not be eligible to donate blood or platelets if you:</p>
                <ul>
                    <li>Have tested positive for hepatitis B or hepatitis C, lived with or had sexual contact in the past 12 months with anyone who has hepatitis B or symptomatic hepatitis C.</li>
                    <li>Had a tattoo in the past<b> 3</b> months or received a blood transfusion (except with your own blood) in the past <b>3</b>  months.</li>
                    <li>Have ever had a positive test for the AIDS virus.</li>
                    <li>Are a man who has had sex with another man in the past <b>3</b> months.</li>
                    <li>Have used injectable drugs, including anabolic steroids, unless prescribed by a physician <b>in the past 3 months.</b></li>
                    <li>Have engaged in prostitution in the past 3 months.</li>
                    <li>Have lived in or visited the United Kingdom for three months or more <b>cumulatively</b> between 1980 and 1996.</li>
                    <li>Have spent five years or more in France or Ireland between 1980 and 2001</li>
                    <li>Have traveled in the <b>past 3 months</b>, or lived in the past three years, in an area where malaria is endemic.</li>
                </ul>
             <p>Blood donors must wait at least 56 days between blood donations and 7 days before donating platelets. Platelet donors may donate once every seven days, not to exceed six times in any eight-week period, and must wait 7 days before donating blood.</p>
 </div>
</div>
    <footer>
    <div class="contact-area" id="contact">
        <div class="text-part">
            <h1>Contact us</h1><br>
            <ul style="list-style: none;">
                <div class="icon">
                    <li><i class="fas fa-phone-alt fa-1x"></i> 0351651187</li>
                    <li><i class="fas fa-envelope fa-1x"></i> bloodbank@gmail.com</li>
                    <li><i class="fas fa-map-marker-alt fa-1x"></i> Bukit Jalil</li>
                    </ul>
        </div>
        </div>
 </div>
        </footer>
</div>
</body>
</html>