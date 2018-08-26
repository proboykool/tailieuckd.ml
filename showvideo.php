<?php
if(isset($_GET['tl'])){
$dat = $_GET['tl'];
$data = 'vid'.$dat.'.txt';
if(file_exists($data)){
$mdt = fopen($data, "r");
if(filesize($data)>0){
$dl1 = fread($mdt,filesize($data));}else{$dl1 = '<center><h1>CHƯA CÓ DỮ LIỆU</h1><br><h1>CHIA SẼ TÀI LIỆU <a href="uploadvideo.php">TẠI ĐÂY</a></h1><center>';}
fclose($mdt);
$dl = '
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tên Video" title="Tên tài liệu">
<div style="overflow-y: scroll; height: 95%; width: 100%;">
<table id="myTable" class="scroll" style="background-color: white;">
<thead class="fixedHeader">
  <tr class="header">
    <th style="width:30%;">Tên tài liệu</th>
	<th style="width:25%;">Loại tài liệu</th>
    <th style="width:20%;">Video</th>
	<th style="width:25%;"></th>
  </tr>
</thead>
<tbody class="scrollContent">
'.$dl1.'
</tbody>
</table>
</div>';
}else{
$dl = '<center><h1>CHƯA CÓ DỮ LIỆU</h1><br><h1>CHIA SẼ TÀI LIỆU <a href="uploadvideo.php">TẠI ĐÂY</a></h1><center>';
}
}else{
$dl = '<center><h1>CHƯA CÓ DỮ LIỆU</h1><br><h1>CHIA SẼ TÀI LIỆU <a href="uploadvideo.php">TẠI ĐÂY</a></h1><center>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
<style>
* {
  box-sizing: border-box;
}
html, body {
	height: 95%;
	margin: 0;
	padding: 0;
	width: 100%;
}

#myInput {
  background-image: url('image/searchicon.png');
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
::-webkit-scrollbar {
display: none;
}
</style>
<title>Tài liệu CKD</title>
</head>
<body>
<?php echo $dl; ?>
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
