<?php
if(isset($_POST['link'])){
	$ten = ucfirst($_POST['name']);
	$mode = $_POST['mod'];
	$link = $_POST['link'];
	$theloai = $_POST['tl'];
	if(isset($_POST['nr'])){
	$nore = $_POST['nr'];
	}else{$nore = '';}
	$hangxe = strtoupper($_POST['hangxe']);
	if(strstr($mode,'hangxe')){$tlhx = $hangxe;}elseif(strstr($mode,'chung')){$tlhx = 'CHUYÊN NGÀNH';}else{$tlhx = 'ĐỒ ÁN';}
	$tengoc = explode("/", $link);
	if(strstr($link, 'dropbox.com')){
	$checkdd = explode(".", str_replace('?dl=0','',urldecode($tengoc[5])));
	}
	$x = 0;
	while(isset($checkdd[$x])){$x++;}
	$dongy = 'xuly.php?name='.$ten.'&link='.$link.'&tl='.$theloai.'&mod='.$mode.'&hangxe='.$hangxe.'&nr='.$nore;
	$kodongy = 'upload.php?name='.$ten.'&link='.$link.'&tl='.$theloai.'&mod='.$mode.'&hangxe='.$hangxe.'&nr='.$nore.'&m=1';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	background-color: white;
	white-space: wrap; 
	overflow: hidden;
	text-overflow: ellipsis;
	margin-left: 10px;
	margin-right: 10px;
}
th, td {
    padding: 5px;
    text-align: left;
}
th {
	width:40%;
}
.button {
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.buttontrue {background-color: #4CAF50; /* Green */}
.buttonfalse {background-color: #f44336; /* Green */}
</style>
</head>
<body>

<font color="white"><h2>Xác nhận</h2>
<p>Xác nhận thông tin lần cuối trước khi đăng tài liệu</p>
</font>
<table style="width:100%">
  <tr>
    <th>Tên tài liệu</th>
    <td><?php echo $ten;?></td>
  </tr>
  <tr>
    <th>Link tài liệu</th>
    <td><?php echo $link;?></td>
  </tr>
<?php
if(strstr($link, 'dropbox.com')){
echo '
  <tr>
    <th>Tên gốc tài liệu</th>
    <td>'.str_replace('?dl=0','',urldecode($tengoc[5])).'</td>
  </tr>
  <tr>
    <th>Định dạng</th>
    <td>'.$checkdd[$x-1].'</td>
  </tr>';
}

?>
  <tr>
    <th>Thể loại</th>
    <td><?php echo $theloai;?></td>
  </tr>
<?php if(strstr($mode,'hangxe')){
	echo '  
	<tr>
    <th>Loại tài liệu</th>
    <td>THEO HÃNG</td>
	</tr>
    <tr>
    <th>Hãng xe</th>
    <td>'.$tlhx.'</td>
	</tr>';
}elseif(strstr($mode,'chung')){
	echo '  
	<tr>
    <th>Loại tài liệu</th>
    <td>CHUYÊN NGÀNH</td>
	</tr>';
}else{	
echo ' <tr>
    <th>Loại tài liệu</th>
    <td>ĐỒ ÁN</td>
	</tr>';} ?>
  <tr>
    <th>Xem trước</th>
    <td><?php if(strstr($nore, 'noreview')){echo 'Không';}else{echo 'Có';}?></td>
  </tr>
</table><br><br>
<a href="<?php echo $dongy;?>"><button class="button buttontrue" >Đồng ý</button></a>
<a href="<?php echo $kodongy;?>"><button class="button buttonfalse">Trở về</button></a>
</body>
</html>