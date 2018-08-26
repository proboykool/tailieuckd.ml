<?php
if(isset($_GET['dropbox'])){
	if(strstr($_GET['online'],'yes')){$link = $_GET['dropbox'];
	$data='<a href="https://docs.google.com/gview?url='.$link.'&embedded=true" target="_blank">XEM ONLINE</a>
    <a href="'.$link.'" target="_blank">TẢI VỀ</a>';
	}else{
		$link = $_GET['dropbox'];
		$data='<a href="'.$link.'" target="_blank">TẢI VỀ</a>';
	}
}
if(isset($_GET['iddrive'])){
	if(strstr($_GET['online'],'yes')){$iddrive = $_GET['iddrive'];
	$data='<a href="https://drive.google.com/file/d/'.$iddrive.'/preview" target="_blank">XEM ONLINE</a>
    <a href="https://drive.google.com/uc?id='.$iddrive.'&export=download" target="_blank">TẢI VỀ</a>';
	}else{
		$iddrive = $_GET['iddrive'];
	$data='<a href="https://drive.google.com/uc?id='.$iddrive.'&export=download" target="_blank">TẢI VỀ</a>';
	}
}
if(isset($_GET['title'])){$tieude = $_GET['title'];}
if(isset($_GET['error'])){$tieude = 'Tài liệu không tồn tại hoặc đã bị xóa'; 
$data='<a href="/" target="_blank">TRANG CHỦ</a>';}

?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
<title>Chia sẽ</title>
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
	margin-top: 0px;
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
<center><h1 style="margin-top: 25px;"><font color="white"><?php echo $tieude;?></font></center></h1>
  <div class="share" >
  <div id="main" scrolling="no">
    <?php echo $data;?>
  </div>
  </div>
</body>
</html>