<?php
if(isset($_POST['img'])){
$image = $_POST['img'];
$img = fopen('oldimage.txt', "w");
fwrite($img, $image);
fclose($img);
}else{
$img = fopen('oldimage.txt', "r");
$image = fread($img,filesize('oldimage.txt'));
fclose($img);
}
if(isset($_GET['psw'])){if($_GET['psw'] == 'tailieuckd'){header('Location: cbg.html');}}
if(isset($_POST['psw'])){if($_POST['psw'] == 'admintailieuckd'){header('Location: admin.page.php?p=dGFpbGlldWNrZDE1MTQ1MzMwZW5jb2RlcGFzc3dvcmRhZG1pbjIwMTg=');}}
if(isset($_GET['shareid'])){
$dl = file_get_contents('iddoc.txt');
if(strstr($dl, '</div></div>')){
$xoadl = explode("<", $dl);
$data = $xoadl[0];
}else{$data = $dl;}
$json = json_decode($data, true);
if(isset($json[$_GET['shareid']])){
	$linkhienthi = $json[$_GET['shareid']];
	$titledoc = str_replace('&title=', '',strstr($linkhienthi, '&title'));
	$titlepage = $titledoc.' - Tài liệu CKD';
	}else{
		$linkhienthi = 'share.php?error=notfound';
		$titlepage = 'Không tìm thấy tài liệu - Tài liệu CKD';
		}

}else{
	if(isset($_GET['u'])){
		$linkhienthi= 'upload.php?link='.$_GET['u'].'&name=&tl=&mod=&hangxe=&nr=&m=1';
		$titlepage = 'Tài liệu CKD';
	}else{
	$linkhienthi= 'intro.html';
	$titlepage = 'Tài liệu CKD';}
}
?>
<!DOCTYPE html>
<html lang="en" class="nav-no-js">

<head>

	<meta charset="UTF-8">
	<title><?php echo $titlepage; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property='og:image' content='image/sharepic.png'/>
	<meta name="description" content="Tài liệu CKD - Chia sẽ đam mê">
	<meta name="keywords" content="Tài liệu ô tô">
	<meta name="author" content="Tài liệu CKD">
	<link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/defaults.css">
    <link rel="stylesheet" href="css/nav-core.css">
	<link rel="stylesheet" href="css/nav-layout.css">

    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie8-core.min.css">
    <link rel="stylesheet" href="css/ie8-layout.min.css">
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
<script src="js/rem.min.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-80233735-3"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-80233735-3');
	</script>
<style>
html, body {
	height: 100%;
	margin: 0;
	padding: 0;
	width: 100%;
    background-image: url("<?php echo $image;?>");
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center;
	overflow: hidden;
}
::-webkit-scrollbar {
display: none;
}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 40px auto 0 auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 315px; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
@font-face {
	font-family: "icon-font";
	src: url('../fonts/icon-font.eot');
	src: url('../fonts/icon-font.eot?#iefix') format('eot'), url('../fonts/icon-font.woff') format('woff'), url('../fonts/icon-font.ttf') format('truetype'), url('../fonts/icon-font.svg#icon-font') format('svg');
}

.icon-desktop:before,
.icon-menu-close:before,
.icon-menu:before,
.icon-mobile:before,
.icon-submenu-down:before,
.icon-submenu-right:before,
.icon-world:before,
header h1:before,
.nav-button:before,
.nav-close:before,
.nav .nav-submenu > a:after,
.nav > ul > .nav-submenu > a:after {
	font-family: "icon-font";
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	font-style: normal;
	font-variant: normal;
	font-weight: normal;
	text-decoration: none;
	text-transform: none;
	vertical-align: top;
}

.icon-desktop:before {
	content: "\E001";
}

.icon-menu-close:before {
	content: "\E002";
}

.icon-menu:before {
	content: "\E003";
}

.icon-mobile:before {
	content: "\E004";
}

.icon-submenu-down:before {
	content: "\E005";
}

.icon-submenu-right:before {
	content: "\E006";
}

.icon-world:before {
	content: "\E007";
}

body {
	padding-top: 4.4rem;
}

header {
	display: block;
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	z-index: 901;
	padding-left: 10px;
	line-height: 4.4rem;
	background: #1E1E1E;
	color: white;
}

header h1 {
	margin: 0;
	font-size: 1.7rem;
	line-height: 4.4rem;
}

header h1:before {
	content: "\E004";
	margin-right: 8px;
}

.nav-button,
.nav-close {
	position: fixed;
	top: 0;
	width: 2.4rem;
	height: 4.4rem;
	overflow: hidden;
	z-index: 902;
	cursor: pointer;
	text-decoration: none;
	line-height: 4.4rem;
	background: #1E1E1E;
	color: white;
}

.nav-button:before,
.nav-close:before {
	display: block;
	text-align: center;
}

.nav-button {
	display: block;
	right: 1rem;
	font-size: 1.7rem;
}

.nav-button:before {
	content: "\E003";
}

.nav-close {
	display: none;
	right: 4rem;
	font-size: 1.9rem;
}

.nav-close:before {
	content: "\E002";
}

.nav {
	padding-top: 4.4rem;
	line-height: 4.4rem;
	background: #1E1E1E;
	color: white;
}

.nav ul {
	border-radius: 0 0 6px 6px;
	background: #1E1E1E;
}

.nav ul ul {
	background: #503131;
}

.nav ul ul ul {
	background: #303030;
}

.nav ul ul ul ul {
	background: #3F3F3F;
}

.nav ul ul ul ul ul {
	background: #474747;
}

.nav li {
	border-top: 1px solid #59544F;
	cursor: pointer;
}

.nav li:hover > a,
.nav li.nav-active > a {
	color: white;
	background: black;
}

.nav .nav-submenu > ul {
	margin-left: 10px;
}

.nav .nav-submenu > a {
	padding-right: 30px !important;
}

.nav a,
.nav a:hover,
.nav a:active,
.nav a:visited {
	border-radius: 6px;
	padding: 0 15px 1px;
	color: white;
	text-decoration: none;
}

.nav .nav-submenu > a:after {
	position: absolute;
	display: block;
	right: 10px;
	top: 1px;
	content: "\E005";
}
iframe {
	width: 98%;
	height: 100%;
	margin: 10px 15px 5px 5px;
}
@media only screen and (min-width: 960px) {
iframe {
	width: 99%;
	height: 86%;
	margin : 5px 15px 5px 5px;
}
body {
	padding: 0 !important;
}

header {
	position: relative;
}

header h1:before {
	content: "\E001";
}

.nav-button {
	display: none;
}

.nav {
	padding: 0 !important;
}

.nav > ul > li {
	border-top: none;
}

.nav li > ul {
	box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
}

.nav ul ul ul {
	border-radius: 0 6px 6px 6px;
}

.nav ul ul ul li:first-child {
	border-top: none;
}

.nav .nav-left > ul {
	border-radius: 6px 0 6px 6px;
}

.nav .nav-submenu li {
	min-width: 110px;
}

.nav .nav-submenu > ul {
	margin: 0;
}

.nav > ul > .nav-submenu > a:after {
	content: "\E005";
}

.nav .nav-submenu > a:after {
	content: "\E006";
}

}
</style>
</head>

<body >
<header>
    <center><h1><a href="/"><img src="image/logo_slogan.png" href="/" style="height: 40px;"/></a></h1></center>
</header>
<center>
<a href="#" class="nav-button">Menu</a>

<nav class="nav">
    <ul>
        <li><a href="/">Trang chủ</a></li>
        <li class="nav-submenu"><a href="#">Loại tài liệu</a>
            <ul>
                <li><a href="show.php?hx=dientu"  target="hienthi">Điện - Điện tử</a></li>
                <li><a href="show.php?hx=dongco" target="hienthi">Động cơ</a></li>
                <li><a href="show.php?hx=dienlanh" target="hienthi">Điện lạnh</a></li>
                <li><a href="show.php?hx=dongson" target="hienthi">Đồng sơn</a></li>
				<li><a href="show.php?hx=khunggam" target="hienthi">Khung gầm</a></li>
				<li><a href="show.php?hx=chung" target="hienthi">Chuyên ngành</a></li>
				<li><a href="show.php?hx=tonghop" target="hienthi">Tổng hợp</a></li>
				<li><a href="show.php?hx=all" target="hienthi">Tất cả</a></li>
            </ul>
        </li>
		<li><a href="show.php?hx=doan" target="hienthi">Đồ án</a></li>
		<li><a href="hangxe.php" target="hienthi">Hãng xe</a></li>
		<li><a href="showvideo.php?tl=all" target="hienthi">Video</a></li>
		<li><a href="show.php?hx=allphanmem" target="hienthi">Phần mềm</a></li>
		<li class="nav-submenu"><a href="#">Chia sẽ</a>
            <ul>
                <li><a href="selectupload.html" target="hienthi">Tài liệu</a></li>
                <li><a href="uploadvideo.php" target="hienthi">Video</a></li>
				<li><a href="uploadphanmem.php" target="hienthi">Phần mềm</a></li>
            </ul>
        </li>
		<li><a onclick="document.getElementById('id01').style.display='block'">Change Background &#x1F512</a></li>
		<li><a onclick="document.getElementById('id02').style.display='block'">Admin &#x1F512</a></li>
		<li><a href="gopy.php" target="hienthi">Góp ý</a></li>
		<li><a href="contact.html" target="hienthi">Liên hệ</a></li>
        <!--<li class="nav-submenu"><a href="#">Products</a>
            <ul>
                <li><a href="#">Food</a></li>
                <li class="nav-submenu"><a href="#">Drinks</a>
                    <ul>
                        <li><a href="#">Water</a></li>
                        <li class="nav-submenu"><a href="#">Cola</a>
                            <ul>
                                <li class="nav-submenu nav-left"><a href="#">Coca Cola</a>
                                    <ul>
                                        <li><a href="#">This one goes left!</a></li>
                                        <li><a href="#">Too much sugar...</a></li>
                                        <li><a href="#">Yummy</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Pepsi</a></li>
                                <li><a href="#">River</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Lemonade</a></li>
                    </ul>
                </li>
                <li><a href="#">Candy</a></li>
                <li><a href="#">Ice Cream</a></li>
            </ul>
        </li>-->
    </ul>
</nav>
</center>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="image/LOGO-CKD.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
	<label for="user"><b>User</b></label>
	<input type="text" value="qtvtailieuckd" name="user" required disabled> 
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <button type="submit">Login</button>
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<div id="id02" class="modal">
  
  <form method="post" class="modal-content animate" action="">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="image/LOGO-CKD.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <button type="submit">Login</button>
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<iframe name="hienthi" style="border:none;" scrolling="yes" src="<?php echo $linkhienthi;?>"></iframe>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/nav.jquery.min.js"></script>
<script>
    $('.nav').nav();
</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>