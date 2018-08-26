<?php
if(isset($_GET['p'])){
if($_GET['p'] == 'dGFpbGlldWNrZDE1MTQ1MzMwZW5jb2RlcGFzc3dvcmRhZG1pbjIwMTg='){
if($_GET['del'] == 'true'){$mdt = fopen('gopy.txt', "w"); fclose($mdt);}
$mdt = fopen('gopy.txt', "r");
if(filesize('gopy.txt')>0){
$dl1 = fread($mdt,filesize('gopy.txt'));
fclose($mdt);
$dl = '
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Loại góp ý" title="Tên tài liệu" style="background-color: white;">
<div style="overflow-y: scroll; height: 85%; width: 100%;">
<table id="myTable" class="scroll" style="background-color: white;">
<thead class="fixedHeader">
  <tr class="header">
    <th style="width:35%;">Tiêu đề</th>
	<th style="width:20%;">Loại</th>
    <th style="width:45%;">Nội dung</th>
  </tr>
</thead>
<tbody class="scrollContent">
'.$dl1.'
</tbody>
</table>
</div>';}else{$dl = '<h1><b>Không có góp ý</b></h1>';}
echo '
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
<title>Admin TailieuCKD</title>
<style>
* {
  box-sizing: border-box;
}
html, body {
	height: 95%;
	margin: 5px 0 0 0;
	padding: 0;
	width: 100%;
}
#myInput {
  background-image: url("image/searchicon.png");
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 10px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 20px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
  max-width: 20px;
  white-space: wrap; 
  overflow: hidden;
  text-overflow: ellipsis;
}
#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
#author {
	text-align: center;
}
h1 {
	color: black;
}
::-webkit-scrollbar {
display: none;
}
p{
	display: inline-block;
}
.navbaradmin {
	font-size: 16px;
}
@media only screen and (min-width: 960px) {
.navbaradmin {
	font-size: 25px;
}
}
</style>
</head>
<body>
<div class="navbaradmin"><a href="/"><p>Trang chủ</p></a>&nbsp;|&nbsp;<a href="admin.page.php?p=dGFpbGlldWNrZDE1MTQ1MzMwZW5jb2RlcGFzc3dvcmRhZG1pbjIwMTg="><p>Admin Page</p></a>&nbsp;|&nbsp;<p>Góp ý</p>&nbsp;|&nbsp;<a href="noidunggopy.php?p=dGFpbGlldWNrZDE1MTQ1MzMwZW5jb2RlcGFzc3dvcmRhZG1pbjIwMTg=&del=true"><p>Xóa tất cả góp ý</p></a></div>
'.$dl.'
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>
';
}else{
echo '<html>
    <head>
        <meta http-equiv="refresh" content="3;url=/" />
		<title>Admin TailieuCKD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
<center><h1>Bạn không được phép truy cập vào đây<br>Chuyển hướng về trang chủ<h1></center>
    </body>
</html>';
}
}else{
echo '<html>
    <head>
        <meta http-equiv="refresh" content="3;url=/" />
		<title>Admin TailieuCKD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
<center><h1>Bạn không được phép truy cập vào đây<br>Chuyển hướng về trang chủ<h1></center>
    </body>
</html>';
}
?>

