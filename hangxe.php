<?php
$fdlt = fopen('tlhangxe.txt', "r");
if(filesize("tlhangxe.txt")>0){
$fdlgt = fread($fdlt,filesize("tlhangxe.txt"));}else{$fdlgt='';}
fclose($fdlt);
if(strstr($fdlgt,'li')){

$dl = '
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tên hãng xe" title="Type in a name">
<div style="overflow-y: scroll; height: 95%; width: 100%;">
<ul id="myUL">
'.$fdlgt.'
</ul>
</div>';
}else{
	$dl = '<center><h1>CHƯA CÓ DỮ LIỆU</h1><br><h1>CHIA SẼ TÀI LIỆU <a href="upload.php">TẠI ĐÂY</a></h1><center>';
}
?>
<!DOCTYPE html>
<html>
<head>
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
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #BEBFC4;
  margin-bottom: 10px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #BEBFC4;
  margin-top: -1px; /* Prevent double borders */
  background-color: #fff;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
#author {
	text-align: center;
}
::-webkit-scrollbar {
display: none;
}
</style>
<title>Chọn hãng xe</title>
</head>
<body>


<?php echo $dl;?>

<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>

</body>
</html>
