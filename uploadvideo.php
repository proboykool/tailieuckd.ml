<?php
if(isset($_POST['link'])){
	$ten = ucfirst($_POST['name']);
	$theloai = $_POST['tl'];
	if(strstr($theloai, 'chung')){$theloai = 'Ôtô';}
	$link = $_POST['link'];
	// ********************xu ly link*******************
	if(strstr($link, 'youtube.com')){
	$list = strstr($link,'&list');
	$ti = strstr($link, '&t=');
	$linkip = str_replace(array('watch?v=',$list,$ti),array('embed/','',''), $link);
	$output = '<a href="'.$linkip.'?autoplay=1" target="_blank">Xem Video</a>';
	}elseif(strstr($link, 'drive.google.com')){
	if(strstr($link, 'open')){$iddrive = str_replace('id=', '', strstr($link, 'id'));}else{$id = explode("/", $link); $iddrive = $id[5];}
	$output = '<a href="https://drive.google.com/file/d/'.$iddrive.'/preview" target="_blank">Xem Video</a>';
	}
	
	$hangxe = 'VIDEO';
	// ******************data all**********************
	$fdall = fopen('vidall.txt', "r");
	$dl1 = fread($fdall,filesize('vidall.txt'));
	fclose($fdall);
	$fdall = fopen('vidall.txt', "w");
	$dlall = '<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
	fwrite($fdall, $dlall);
	fclose($fdall);
	// ******************share done*******************
	echo '<font color="white"><center><h1>Tải lên thành công<h1><br><a href="uploadvideo.php"><font size="5" color="red">Tiếp tục tải lên</font></a></center></font>';
}else{
	// form sharing
	echo '
	<html>
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
	<style>
html, body {
    height: 80%;
    margin: 0;
	margin-left: 5%;
	margin-top: 5px;
    padding: 0;
	width: 80%
}
.my-block {
    text-align: left!important;
    display: table-cell;
    vertical-align: middle;
}
.my-block h3 {
    margin-left: 30%;
}
iv.round2 {
    border: 2px solid grey;
    border-radius: 8px;
}
input[type=text] {
	font-size: 15px;
    width: 75%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
	border-radius: 4px;
	background-color: #f8f8f8;
}
textarea {
	font-size: 15px;
    width: 75%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}
input[type=button], input[type=submit], input[type=reset] {
	font-size: 15px;
	width: 100%;
    background-color: #3390FF;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: small;
    margin: 4px 2px;
    cursor: pointer;
}
h1 {
	font-size: 20px;
	color: white;
}
h2 {
	font-size: 15px;
}
#square {
	width: 100%;
}
#author {
	text-align: center;
	font-weight: normal!important;
	text-decoration: normal!important;
	font-size: small!important;
}
::-webkit-scrollbar {
display: none;
}
</style>
<title>Upload</title>
<body link="red" vlink="red" alink="red">
<div class="my-block">
	<form method="post" action="">
	<h1>Link tài liệu :  <h1><input id="square" name="link" type="text" placeholder="Dán link Google Drive, Youtube công khai hoặc Tài lên phía dưới" required><font color="white">Link Youtube.com, link Google Drive (công khai) hoặc Tải lên video <a href="uploadfile.html" target="_blank">-> tại đây <-</a></font>
	<h1>Tên video :  <h1><input id="square" name="name" type="text" placeholder="Tên video" required>
	<h1>Thể loại :  <h1>
	<input type="radio" name="tl" value="Điện - Điện tử" required> Điện - Điện tử <br>
	<input type="radio" name="tl" value="Động cơ" required> Động cơ <br>
	<input type="radio" name="tl" value="Đồng sơn" required> Đồng sơn <br>
	<input type="radio" name="tl" value="Điện lạnh" required> Điện lạnh <br>
	<input type="radio" name="tl" value="Khung gầm" required> Khung gầm <br>
	<input type="radio" name="tl" value="chung" required> Chung không thể loại <br>

<br>
<input type="submit">  
</form>
</div>
</body>
</html>';
}
?>