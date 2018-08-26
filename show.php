<?php
if(isset($_GET['hx'])){
if(isset($_GET['tl'])){
$dat1 = $_GET['tl'];
$dat = $_GET['hx'];
$data = $dat.'-'.$dat1.'.txt';
}else{
$dat = $_GET['hx'];
$data = $dat.'.txt';
}
if(file_exists($data)){
$mdt = fopen($data, "r");
if(filesize($data)>0){
$dl1 = fread($mdt,filesize($data));}else{$dl1 = '<h1>Do not have data</h1>';}
fclose($mdt);
$dl = '
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tên tài liệu" title="Tên tài liệu" style="background-color: white;">
<div style="overflow-y: scroll; height: 95%; width: 100%;">
<table id="myTable" class="scroll" style="background-color: white;">
<thead class="fixedHeader">
  <tr class="header">
    <th style="width:30%;">Tên tài liệu</th>
	<th style="width:25%;">Loại tài liệu</th>
    <th style="width:20%;">Hãng xe</th>
	<th style="width:25%;"></th>
  </tr>
</thead>
<tbody class="scrollContent">
'.$dl1.'
</tbody>
</table>
</div>';
}else{
	$dl = '<h1>Do not have data</h1>';
}
}else{
$dl = '<h1>Do not have data</h1>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
padding: 10px;
  font-size: 15px;
  border-radius: 50%;
  text-align: center;
  text-decoration: none;
  margin: 0px 0px;
  width: 35px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}
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
h1 {
	color: white;
}
::-webkit-scrollbar {
display: none;
}
button {

    background: transparent;
    border: none !important;
    font-size:0;
}
</style>
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
