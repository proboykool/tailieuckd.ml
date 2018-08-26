<?php
if(isset($_GET['n'])){
$dl = $_GET['n'];
}
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
<title>Chọn loại</title>
<style>
.share {
  border: none;
  padding: 40px 0px;
  position: relative;
  text-align: center;
  width: 100%;
}

.share a {
  background: white;
  border: 1px solid blue;
  border-radius: 3px;
  color: blue;
  display: block;
  margin: 10px;
  margin-left: 24%;
  padding: 14px;
  text-decoration: none;
  font-size: 20px;
  width: 50%;
}

.share a:hover {
  background: #000099;
  border: 1px boild #000099;
  color: white;
}
#main {
	margin-top: 0;
	overflow: hidden;
	
}
#author {
	text-align: center;
}
::-webkit-scrollbar {
display: none;
}
</style>
</head>
<body>
  <div class="share" >
  <div id="main" scrolling="no">
    <a href="show.php?tl=dientu&hx=<?php echo $dl;?>">ĐIỆN - ĐIỆN TỬ</a>
    <a href="show.php?tl=dongco&hx=<?php echo $dl;?>">ĐỘNG CƠ</a>
    <a href="show.php?tl=dongson&hx=<?php echo $dl;?>">ĐỒNG SƠN</a>
	<a href="show.php?tl=dienlanh&hx=<?php echo $dl;?>">ĐIỆN LẠNH</a>
	<a href="show.php?tl=tonghop&hx=<?php echo $dl;?>">TỔNG HỢP</a>
	<a href="show.php?tl=phanmem&hx=<?php echo $dl;?>">PHẦN MỀM</a>
	<a href="show.php?hx=<?php echo $dl;?>">TẤT CẢ</a>
  </div>
  </div>
</body>
</html>