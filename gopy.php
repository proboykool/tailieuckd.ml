<?php
if(isset($_POST['ten'])){
	$ten = ucfirst($_POST['ten']);
	$loai = $_POST['loai'];
	$noidung = $_POST['noidung'];
	// ******************data admin all**********************
	$fdall = fopen('gopy.txt', "r");
	$dl1 = fread($fdall,filesize('gopy.txt'));
	fclose($fdall);
	$fdall = fopen('gopy.txt', "w");
	$dladminup = '<tr>
    <td>'.$ten.'</td>
	<td>'.$loai.'</td>
    <td>'.$noidung.'</td>
</tr>
'.$dl1;
	fwrite($fdall, $dladminup);
	fclose($fdall);
	echo '<center><h1><font color="white">Cảm ơn bạn đã góp ý</font></h1></center>';
}else{
	// form sharing
	echo '
	<html>
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}
</style>
<title>Góp ý</title>
<body>
<div class="my-block">
	<form method="post" action="">
	<h1>Tiêu đề :  <h1><input id="square" name="ten" type="text" required>
	<br>
	<input type="radio" name="loai" value="Góp ý" required> Góp ý &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	<input type="radio" name="loai" value="Lỗi" required> Lỗi <br>
	<h1>Nội dung :  <h1><textarea id="square" name="noidung" type="text" required></textarea>

<br>
<input type="submit">  
</form>
</div>
</body>
</html>';
}
?>