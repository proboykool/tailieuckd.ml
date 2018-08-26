<?php
if(isset($_POST['link'])){
	$ten = ucfirst($_POST['name']);
	$mode = $_POST['mod'];
	$link = $_POST['link'];
	$theloai = $_POST['tl'];
	$hangxe = strtoupper($_POST['hangxe']);
	//********** check id ************
	$id = file_get_contents('id.txt');
	$fdall = fopen('id.txt', "w");
	$num = $id;
	$num++;
	fwrite($fdall, $num);
	fclose($fdall);
	// ********************xu ly link*******************
	if(strstr($link, 'dropbox.com')){
	$linkip = str_replace(array('www.dropbox.com','?dl=0'),array('dl.dropboxusercontent.com',''), $link);
	$output = '<a href="'.$linkip.'" target="_blank">Tải về</a><br><br>
		<font color="blue">Share:</font>
		<a href="http://www.facebook.com/sharer.php?u=http://tailieuckd.ml/index.php?shareid='.$id.'&quote='.$ten.'" class="fa fa-facebook" target="_blank"></a>
		<a href="http://twitter.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-twitter" target="_blank"></a>
		<a href="https://plus.google.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-google" target="_blank"></a><br><input type="text" value="http://tailieuckd.ml/index.php?shareid='.$id.'" id="myInputCopy">';
		$linkdownload = urlencode($linkip);
		$linkshare = 'share.php?dropbox='.$linkip.'&online=no&title='.$ten;
	if(strstr($mode,'hangxe')){$tlhx = $hangxe;}elseif(strstr($mode,'chung')){$tlhx = 'CHUYÊN NGÀNH';}
	}elseif(strstr($link, 'drive.google.com')){
	if(strstr($link, 'open')){$iddrive = str_replace('id=', '', strstr($link, 'id'));}else{
		if(strstr($link, 'student.hcmute.edu.vn')){$linkxl = str_replace('/a/student.hcmute.edu.vn','', $link);}else{$linkxl = $link;}
		$idd = explode("/", $linkxl); $iddrive = $idd[5];}
	$output = '<a href="https://drive.google.com/uc?id='.$iddrive.'&export=download" target="_blank">Tải về</a><br><br>
		<font color="blue">Share:</font>
		<a href="http://www.facebook.com/sharer.php?u=http://tailieuckd.ml/index.php?shareid='.$id.'&quote='.$ten.'" class="fa fa-facebook" target="_blank"></a>
		<a href="http://twitter.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-twitter" target="_blank"></a>
		<a href="https://plus.google.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-google" target="_blank"></a><br><input type="text" value="http://tailieuckd.ml/index.php?shareid='.$id.'" id="myInputCopy">';
		$linkdownload = urlencode('https://drive.google.com/uc?id='.$iddrive.'&export=download');
		$linkshare = 'share.php?iddrive='.$iddrive.'&online=no&title='.$ten;
	if(strstr($mode,'hangxe')){$tlhx = $hangxe;}elseif(strstr($mode,'chung')){$tlhx = 'CHUYÊN NGÀNH';}
	}
	//********** Save id document *********
	$fdall = fopen('iddoc.txt', "r");
	$dl1 = fread($fdall,filesize('iddoc.txt'));
	fclose($fdall);
	$fdall = fopen('iddoc.txt', "w");
	$dlid = str_replace('}', ',"'.$id.'":"'.$linkshare.'"}',$dl1);
	fwrite($fdall, $dlid);
	fclose($fdall);
	// ******************data admin all**********************
	$fdall = fopen('alladmin.txt', "r");
	$dl1 = fread($fdall,filesize('alladmin.txt'));
	fclose($fdall);
	$fdall = fopen('alladmin.txt', "w");
	$dlall = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
';
	$dladmin = '<a href="delete.php?ip='.urlencode($dlall).'">Xóa</a>';
	$dladminup = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
	<td>'.$dladmin.'</td>
</tr>
'.$dl1;
	fwrite($fdall, $dladminup);
	fclose($fdall);
	// ******************data all**********************
	$fdall = fopen('allphanmem.txt', "r");
	$dl1 = fread($fdall,filesize('allphanmem.txt'));
	fclose($fdall);
	$fdall = fopen('allphanmem.txt', "w");
	$dlall = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
	fwrite($fdall, $dlall);
	fclose($fdall);
		// ******************data hang xe**********************
	$fdall = fopen('all.txt', "r");
	$dl1 = fread($fdall,filesize('all.txt'));
	fclose($fdall);
	$fdall = fopen('all.txt', "w");
	$dlall = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
	fwrite($fdall, $dlall);
	fclose($fdall);
	if(strstr($mode,'hangxe')){
	if(file_exists($hangxe.'-phanmem.txt')){
	$fdall = fopen($hangxe.'-phanmem.txt', "r");
	$dl1 = fread($fdall,filesize($hangxe.'-phanmem.txt'));
	fclose($fdall);
	$fdall = fopen($hangxe.'-phanmem.txt', "w");
	$dlall = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
	fwrite($fdall, $dlall);
	fclose($fdall);
	}else{
	$fdall = fopen($hangxe.'-phanmem.txt', "a");
	$dlall = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
';
	fwrite($fdall, $dlall);
	fclose($fdall);	
	}
	if(file_exists($hangxe.'.txt')){
	$fdall = fopen($hangxe.'.txt', "r");
	$dl1 = fread($fdall,filesize($hangxe.'.txt'));
	fclose($fdall);
	$fdall = fopen($hangxe.'.txt', "w");
	$dlall = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
	fwrite($fdall, $dlall);
	fclose($fdall);
	}else{
	$fdall = fopen($hangxe.'.txt', "a");
	$dlall = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
';
	fwrite($fdall, $dlall);
	fclose($fdall);	
	}
	}
if(strstr($mode,'chung')){
	$fdall = fopen('chung.txt', "r");
	$dl1 = fread($fdall,filesize('chung.txt'));
	fclose($fdall);
	$fdall = fopen('chung.txt', "w");
	$dlall = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
	fwrite($fdall, $dlall);
	fclose($fdall);
}
	// ******************share done*******************
	echo '<font color="white"><center><h1>Tải lên thành công<h1><br><a href="upload.php"><font size="5" color="red">Tiếp tục tải lên</font></a></center></font>';
}else{
	if(isset($_GET['m'])){
	if(strstr($_GET['mod'],'chung')){$chung = '<input type="radio" name="mod" value="chung" required checked>';}else{$chung = '<input type="radio" name="mod" value="chung" required>';}
	if(strstr($_GET['mod'],'hangxe')){$hangxe = '<input type="radio" name="mod" value="hangxe" required checked>'; $tenhang = 'value="'.$_GET['hangxe'].'"';}else{$hangxe = '<input type="radio" name="mod" value="hangxe" required>'; $tenhang = $_GET['hangxe'];}
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
	<form method="post" action="confirmphanmem.php">
	<h1>Link tài liệu :  <h1><input id="square" name="link" type="text" placeholder="Dán link Google Drive công khai hoặc Tài lên phía dưới" required value="'.$_GET['link'].'"><font color="white">Nếu chưa có link: Tải lên tài liệu <a href="uploadfile.html" target="_blank">-> tại đây <-</a> hoặc link Google Drive (chia sẽ ở chế độ công khai)</font>
	<h1>Tên tài liệu :  <h1><input id="square" name="name" type="text" placeholder="Tên phần mềm" required value="'.$_GET['name'].'">
	<h1>Thể loại :  <h1>
	<input type="radio" name="tl" value="Phần mềm" required checked> Phần mềm <br>
	<h1>Loại :  <h1>
	'.$chung.' Chung <br>
	'.$hangxe.' Theo hãng xe <br>
	<input name="hangxe" id="square" type="text" placeholder="Tên hãng xe" '.$tenhang.'><font color="red"></input>* Lưu ý đánh đúng tên</font>

<br>
<input type="submit">  
</form>
</div>
</body>
</html>';}else{
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
button {
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
	<form method="post" action="confirmphanmem.php">
	<h1>Link tài liệu :  <h1><input id="square" name="link" type="text" placeholder="Dán link Google Drive công khai hoặc Tài lên phía dưới" required><font color="white">Nếu chưa có link: Tải lên tài liệu <a href="uploadfile.html" target="_blank">-> tại đây <-</a> hoặc link Google Drive (chia sẽ ở chế độ công khai)</font>
	<h1>Tên Phần mềm :  <h1><input id="square" name="name" type="text" placeholder="Tên phần mềm" required>
	<h1>Thể loại :  <h1>
	<input type="radio" name="tl" value="Phần mềm" required checked> Phần mềm <br>
	<h1>Loại :  <h1>
	<input type="radio" name="mod" value="chung" required> Tài liệu chung <br>
	<input type="radio" name="mod" value="hangxe" required> Theo hãng xe <br>
	<input name="hangxe" id="square" type="text" placeholder="Tên hãng xe"><font color="red"></input>* Lưu ý đánh đúng tên</font>

<br>
<input type="submit">  
</form>
</div>
</body>
</html>';
}}
?>