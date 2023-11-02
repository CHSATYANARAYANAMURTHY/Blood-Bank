<!doctype html>
<html>
<head>
<title> Home </title>
<link rel="stylesheet" type="text/css" href="css/all.min">
<style>
body{
	margin:0;
	padding:0;
	font-family:Poppins;
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
.about-area,.contact-area{
	position: relative;
	display:flex;
	justify-content:space-around;
	align-items:center;
	flex-wrap:wrap;
	flex-direction:row;
	width:100%;
	height:700px;
}
.text-part{
	width:65%;
	height:80%;
}
h1{
	font-size:50px;
	font-family:Audiowide;
}
p{
	font-size:24px;
	line-height:50px;
}
.about-area,{
	background:#fefefe;
}
.contact-area{
	background:#262626;
	color:#fff
}
html{
	scroll-behavior: smooth;
}
.icon{
font-size:30px;
line-height:100px;
letter-spacing: 1px;
}

* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1500px;
  height: auto;
  position: relative;
  margin: auto;

}
/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: Black;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}
</style>
</head>
<body>
<div class="navbar">
<a href="#" class="logo">Blood Bank</a>
<ul class="nav">
<li><a href="#home">Home</a></li>
<li><a href="#about">About us</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="Login.php">Login</a></li>
</ul>
</div>
<div class="slideshow-container" id="home">

<div class="mySlides fade">
  <img src="blood.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="blood2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="blood3.jpg" style="width:100%">
</div>

</div>
<br>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<div class="about-area" id="about">
<div class="text-part">
<h1>About us</h1>
<p>Blood bank was first founded in 2019 by three individual name Jaskeerat, Keith, and Vincent 
with the aim to ease the blood donation process and spread awareness. From this site, 
volunteers will also be update with our latest campaign. With the covid-19 pandemic going 
around the world, government are requesting patients that recover from covid-19 to donate 
their blood. Therefore, volunteers can come over to our centre to donate their blood.<br>
OBJECTIVE:<br>
i.	Ease the process of blood donation<br>
ii.	To spread awareness about the importance of donating blood<br></p>
 </div>
</div>
<div class="contact-area" id="contact">
<div class="text-part">
<h1>Contact us</h1><br>
<ul style="list-style: none;">
<div class="icon">
<li><i class="fas fa-phone-alt fa-1x"></i> 0351651187</li>
<li><i class="fas fa-envelope fa-1x"></i> bloodbank@gmail.com</li>
<li><i class="fas fa-map-marker-alt fa-1x"></i> 60 Jalan Bukit Jalil, 5700 Kuala Lumpur</li>
</ul>
</div>
 </div> 
</div>
<script>
var slideIndex = 0;
showSlides();
//add the global timer variable
var slides,dots,timer;

function showSlides() {
    var i;
    slides = document.getElementsByClassName("mySlides");
    dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    //put the timeout in the timer variable
    timer = setTimeout(showSlides, 4000); // Change image every 8 seconds
}
function plusSlides(position) {
    //clear/stop the timer
    clearTimeout(timer);
    slideIndex +=position;
    if (slideIndex> slides.length) {slideIndex = 1}
    else if(slideIndex<1){slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    //create a new timer
    timer = setTimeout(showSlides, 4000);
}

function currentSlide(index) {
    //clear/stop the timer
    clearTimeout(timer);
    if (index> slides.length) {index = 1}
    else if(index<1){index = slides.length}
    //set the slideIndex with the index of the function
    slideIndex = index;
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
	for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[index-1].style.display = "block";  
    dots[index-1].className += " active";
    //create a new timer
    timer = setTimeout(showSlides, 4000);
}
</script>


</body>
</html>