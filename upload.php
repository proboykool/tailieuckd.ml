<?php
if(isset($_POST['link'])){
	$ten = ucfirst($_POST['name']);
	$mode = $_POST['mod'];
	$link = $_POST['link'];
	$theloai = $_POST['tl'];
	if(isset($_POST['nr'])){
	$nore = $_POST['nr'];
	}else{$nore = '';}
	//********** check id ************
	$id = file_get_contents('id.txt');
	$fdall = fopen('id.txt', "w");
	$num = $id;
	$num++;
	fwrite($fdall, $num);
	fclose($fdall);
	$hangxe = strtoupper($_POST['hangxe']);
	// ********************xu ly link*******************
	if(strstr($link, 'dropbox.com')){
	$linkip = str_replace(array('www.dropbox.com','?dl=0'),array('dl.dropboxusercontent.com',''), $link);
	if(strstr($nore, 'noreview')){
		$output = '<a href="'.$linkip.'" target="_blank">Tải về</a><br><br>
		<font color="blue">Share:</font>
		<a href="http://www.facebook.com/sharer.php?u=http://tailieuckd.ml/index.php?shareid='.$id.'&quote='.$ten.'" class="fa fa-facebook" target="_blank"></a>
		<a href="http://twitter.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-twitter" target="_blank"></a>
		<a href="https://plus.google.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-google" target="_blank"></a><br>
		<input type="text" value="http://tailieuckd.ml/index.php?shareid='.$id.'" id="myInputCopy">';
		$linkdownload = urlencode($linkip);
		$linkshare = 'share.php?dropbox='.$linkip.'&online=no&title='.$ten;
	}else{
		$output = '<a href="https://docs.google.com/gview?url='.$linkip.'&embedded=true" target="_blank">Xem Online</a><br><br><a href="'.$linkip.'" target="_blank">Tải về</a><br><br>
		<font color="blue">Share:</font>
		<a href="http://www.facebook.com/sharer.php?u=http://tailieuckd.ml/index.php?shareid='.$id.'&quote='.$ten.'" class="fa fa-facebook" target="_blank"></a>
		<a href="http://twitter.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-twitter" target="_blank"></a>
		<a href="https://plus.google.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-google" target="_blank"></a><br>
		<input type="text" value="http://tailieuckd.ml/index.php?shareid='.$id.'" id="myInputCopy">';
		$linkdownload = urlencode($linkip);
		$readlink = urlencode('https://docs.google.com/gview?url='.$linkip.'&embedded=true');
		$linkshare = 'share.php?dropbox='.$linkip.'&online=yes&title='.$ten;
	}
	}elseif(strstr($link, 'drive.google.com')){
	if(strstr($link, 'open')){$iddrive = str_replace('id=', '', strstr($link, 'id'));}else{
		if(strstr($link, 'student.hcmute.edu.vn')){$linkxl = str_replace('/a/student.hcmute.edu.vn','', $link);}else{$linkxl = $link;}
		$idd = explode("/", $linkxl); $iddrive = $idd[5];}
	if(strstr($nore, 'noreview')){
		$output = '<a href="https://drive.google.com/uc?id='.$iddrive.'&export=download" target="_blank">Tải về</a><br><br>
		<font color="blue">Share:</font>
		<a href="http://www.facebook.com/sharer.php?u=http://tailieuckd.ml/index.php?shareid='.$id.'&quote='.$ten.'" class="fa fa-facebook" target="_blank"></a>
		<a href="http://twitter.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-twitter" target="_blank"></a>
		<a href="https://plus.google.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-google" target="_blank"></a><br>
		<input type="text" value="http://tailieuckd.ml/index.php?shareid='.$id.'" id="myInputCopy">';
		$linkdownload = urlencode('https://drive.google.com/uc?id='.$iddrive.'&export=download');
		$linkshare = 'share.php?iddrive='.$iddrive.'&online=no&title='.$ten;
	}else{
		$output = '<a href="https://drive.google.com/file/d/'.$iddrive.'/preview" target="_blank">Xem Online</a><br><br><a href="https://drive.google.com/uc?id='.$iddrive.'&export=download" target="_blank">Tải về</a><br><br>
		<font color="blue">Share:</font>
		<a href="http://www.facebook.com/sharer.php?u=http://tailieuckd.ml/index.php?shareid='.$id.'&quote='.$ten.'" class="fa fa-facebook" target="_blank"></a>
		<a href="http://twitter.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-twitter" target="_blank"></a>
		<a href="https://plus.google.com/share?url=http://tailieuckd.ml/index.php?shareid='.$id.'" class="fa fa-google" target="_blank"></a><br>
		<input type="text" value="http://tailieuckd.ml/index.php?shareid='.$id.'" id="myInputCopy">';
		$linkdownload = urlencode('https://drive.google.com/uc?id='.$iddrive.'&export=download');
		$readlink = urlencode('https://drive.google.com/file/d/'.$iddrive.'/preview');
		$linkshare = 'share.php?iddrive='.$iddrive.'&online=yes&title='.$ten;
		}
	}
	
	
	if(strstr($mode,'hangxe')){$tlhx = $hangxe;}elseif(strstr($mode,'chung')){$tlhx = 'CHUYÊN NGÀNH';}else{$tlhx = 'ĐỒ ÁN';}
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
	// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& PHÂN LOẠI CHUNG &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	// ******************data điện tử******************
	if(strstr($theloai, "Điện - Điện tử")){
		$fdt = fopen('dientu.txt', "r");
		$dl1 = fread($fdt,filesize('dientu.txt'));
	fclose($fdt);
	$fdt = fopen('dientu.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
	// *********************data Động cơ*************************
	if(strstr($theloai, "Động cơ")){
		$fdt = fopen('dongco.txt', "r");
		$dl1 = fread($fdt,filesize('dongco.txt'));
	fclose($fdt);
	$fdt = fopen('dongco.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
	// *********************data Đồng sơn*************************
	if(strstr($theloai, "Đồng sơn")){
		$fdt = fopen('dongson.txt', "r");
		$dl1 = fread($fdt,filesize('dongson.txt'));
	fclose($fdt);
	$fdt = fopen('dongson.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
	// *********************data Điện lạnh*************************
	if(strstr($theloai, "Điện lạnh")){
		$fdt = fopen('dienlanh.txt', "r");
		$dl1 = fread($fdt,filesize('dienlanh.txt'));
	fclose($fdt);
	$fdt = fopen('dienlanh.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
	// *********************data Khung gầm*************************
	if(strstr($theloai, "Khung gầm")){
		$fdt = fopen('khunggam.txt', "r");
		$dl1 = fread($fdt,filesize('khunggam.txt'));
	fclose($fdt);
	$fdt = fopen('khunggam.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
		// *********************data Tổng hợp*************************
	if(strstr($theloai, "Tổng hợp")){
		$fdt = fopen('tonghop.txt', "r");
		$dl1 = fread($fdt,filesize('tonghop.txt'));
	fclose($fdt);
	$fdt = fopen('tonghop.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$tlhx.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
	// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& TÀI LIỆU CHUNG KO THEO HÃNG &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	if(strstr($mode, 'chung')){
		$fhx = fopen('chung.txt', "r");
		$dl1 = fread($fhx,filesize('chung.txt'));
	fclose($fhx);
	$fhx = fopen('chung.txt', "w");
		$dlhx = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>CHUYÊN NGÀNH</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
			fwrite($fhx, $dlhx);
			fclose($fhx);
	}elseif(strstr($mode, 'doan')){
		$fhx = fopen('doan.txt', "r");
		$dl1 = fread($fhx,filesize('doan.txt'));
	fclose($fhx);
	$fhx = fopen('doan.txt', "w");
		$dlhx = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>ĐỒ ÁN</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
			fwrite($fhx, $dlhx);
			fclose($fhx);
	}else{
	// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& PHÂN LOẠI THEO HÃNG XE &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	if(isset($_POST['hangxe'])){
		$mdt = fopen('tlhangxe.txt', "r");
		if(filesize("tlhangxe.txt")>0){
		$dlss = fread($mdt,filesize("tlhangxe.txt"));}else{$dlss='';}
		fclose($mdt);
		if(strstr($dlss, $hangxe)){
	$fhx = fopen($hangxe.'.txt', "r");
	$dl1 = fread($fhx,filesize($hangxe.'.txt'));
	fclose($fhx);
	$fhx = fopen($hangxe.'.txt', "w");
	$dlhx = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
			fwrite($fhx, $dlhx);
			fclose($fhx);
// ******************data điện tử******************
	if(strstr($theloai, "Điện - Điện tử")){
		if(file_exists($hangxe.'-dientu.txt')){
			$fdt = fopen($hangxe.'-dientu.txt', "r");
			$dl1 = fread($fdt,filesize($hangxe.'-dientu.txt'));
	fclose($fdt);
	$fdt = fopen($hangxe.'-dientu.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
		}else{
		$fdt = fopen($hangxe.'-dientu.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}}
	// *********************data Động cơ*************************
	if(strstr($theloai, "Động cơ")){
		if(file_exists($hangxe.'-dongco.txt')){
			$fdt = fopen($hangxe.'-dongco.txt', "r");
			$dl1 = fread($fdt,filesize($hangxe.'-dongco.txt'));
	fclose($fdt);
	$fdt = fopen($hangxe.'-dongco.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
		}else{
		$fdt = fopen($hangxe.'-dongco.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}}
	// *********************data Đồng sơn*************************
	if(strstr($theloai, "Đồng sơn")){
		if(file_exists($hangxe.'-dongson.txt')){
			$fdt = fopen($hangxe.'-dongson.txt', "r");
			$dl1 = fread($fdt,filesize($hangxe.'-dongson.txt'));
	fclose($fdt);
	$fdt = fopen($hangxe.'-dongson.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
		}else{
		$fdt = fopen($hangxe.'-dongson.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}}
	// *********************data Điện lạnh*************************
	if(strstr($theloai, "Điện lạnh")){
		if(file_exists($hangxe.'-dienlanh.txt')){
			$fdt = fopen($hangxe.'-dienlanh.txt', "r");
			$dl1 = fread($fdt,filesize($hangxe.'-dienlanh.txt'));
	fclose($fdt);
	$fdt = fopen($hangxe.'-dienlanh.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
		}else{
		$fdt = fopen($hangxe.'-dienlanh.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}}
		// *********************data Khung gầm*************************
	if(strstr($theloai, "Khung gầm")){
		if(file_exists($hangxe.'-khunggam.txt')){
			$fdt = fopen($hangxe.'-khunggam.txt', "r");
			$dl1 = fread($fdt,filesize($hangxe.'-khunggam.txt'));
	fclose($fdt);
	$fdt = fopen($hangxe.'-khunggam.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
		}else{
		$fdt = fopen($hangxe.'-khunggam.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}}
			// *********************data Tổng hợp*************************
	if(strstr($theloai, "Tổng hợp")){
		if(file_exists($hangxe.'-tonghop.txt')){
			$fdt = fopen($hangxe.'-tonghop.txt', "r");
			$dl1 = fread($fdt,filesize($hangxe.'-tonghop.txt'));
	fclose($fdt);
	$fdt = fopen($hangxe.'-tonghop.txt', "w");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
'.$dl1;
		fwrite($fdt, $dldt);
		fclose($fdt);
		}else{
		$fdt = fopen($hangxe.'-tonghop.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}}
	// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& CHƯA CO HANG XE &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
		}else{
			$ftlhx = fopen('tlhangxe.txt',"w+");
			$dltlhx = $dlss.'
	<li><a href="theloai.php?n='.$hangxe.'"><image src="logo/'.$hangxe.'.png" style="width:50px; height:50px;" align="middle"/>&nbsp;&nbsp;&nbsp;'.$hangxe.'</a></li>';
			fwrite($ftlhx, $dltlhx);
			fclose($ftlhx);
	$fhx = fopen($hangxe.'.txt', "a");
	$dlhx = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
			fwrite($fhx, $dlhx);
			fclose($fhx);
// ******************data điện tử******************
	if(strstr($theloai, "Điện - Điện tử")){
		$fdt = fopen($hangxe.'-dientu.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
	// *********************data Động cơ*************************
	if(strstr($theloai, "Động cơ")){
		$fdt = fopen($hangxe.'-dongco.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
	// *********************data Đồng sơn*************************
	if(strstr($theloai, "Đồng sơn")){
		$fdt = fopen($hangxe.'-dongson.txt', "a");
		$dldt ='<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
	// *********************data Điện lạnh*************************
	if(strstr($theloai, "Điện lạnh")){
		$fdt = fopen($hangxe.'-dienlanh.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
		// *********************data Khung gầm*************************
	if(strstr($theloai, "Khung gầm")){
		$fdt = fopen($hangxe.'-khunggam.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
			// *********************data Tổng hợp*************************
	if(strstr($theloai, "Tổng hợp")){
		$fdt = fopen($hangxe.'-tonghop.txt', "a");
		$dldt = '<!-- '.$id.'-->
	<tr>
    <td>'.$ten.'</td>
	<td>'.$theloai.'</td>
    <td>'.$hangxe.'</td>
	<td>'.$output.'</td>
</tr>
';
		fwrite($fdt, $dldt);
		fclose($fdt);
	}
		}
	}
	}
	// ******************share done*******************
	echo '<font color="white"><center><h1>Tải lên thành công<h1><br><a href="upload.php"><font size="5" color="red">Tiếp tục tải lên</font></a></center></font>';
}else{
	if(isset($_GET['m'])){if(strstr($_GET['tl'],'Điện - Điện tử')){$dientu = '<input type="radio" name="tl" value="Điện - Điện tử" required checked>';}else{$dientu = '<input type="radio" name="tl" value="Điện - Điện tử" required>';}
	if(strstr($_GET['tl'],'Động cơ')){$dongco = '<input type="radio" name="tl" value="Động cơ" required checked>';}else{$dongco = '<input type="radio" name="tl" value="Động cơ" required>';}
	if(strstr($_GET['tl'],'Đồng sơn')){$dongson = '<input type="radio" name="tl" value="Đồng sơn" required checked>';}else{$dongson = '<input type="radio" name="tl" value="Đồng sơn" required>';}
	if(strstr($_GET['tl'],'Điện lạnh')){$dienlanh = '<input type="radio" name="tl" value="Điện lạnh" required checked>';}else{$dienlanh = '<input type="radio" name="tl" value="Điện lạnh" required>';}
	if(strstr($_GET['tl'],'Khung gầm')){$khunggam = '<input type="radio" name="tl" value="Khung gầm" required checked>';}else{$khunggam = '<input type="radio" name="tl" value="Khung gầm" required>';}
	if(strstr($_GET['tl'],'Tổng hợp')){$tonghop = '<input type="radio" name="tl" value="Khung gầm" required checked>';}else{$tonghop = '<input type="radio" name="tl" value="Khung gầm" required>';}
	if(strstr($_GET['mod'],'chung')){$chung = '<input type="radio" name="mod" value="chung" required checked>';}else{$chung = '<input type="radio" name="mod" value="chung" required>';}
	if(strstr($_GET['mod'],'doan')){$doan = '<input type="radio" name="mod" value="doan" required checked>';}else{$doan = '<input type="radio" name="mod" value="doan" required>';}
	if(strstr($_GET['mod'],'hangxe')){$hangxe = '<input type="radio" name="mod" value="hangxe" required checked>'; $tenhang = 'value="'.$_GET['hangxe'].'"';}else{$hangxe = '<input type="radio" name="mod" value="hangxe" required>'; $tenhang = $_GET['hangxe'];}
	if(strstr($_GET['nr'], 'noreview')){$noreview = 'checked';}else{$noreview = '';}
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
	<form method="post" action="confirm.php">
	<h1>Link tài liệu :  <h1><input id="square" name="link" type="text" placeholder="Dán link Google Drive công khai hoặc Tài lên phía dưới" required value="'.$_GET['link'].'"><font color="white">Nếu chưa có link Upload tài liệu <a href="uploadfile.html">-> tại đây <-</a> hoặc link Google Drive (chia sẽ ở chế độ công khai)</font>
	<h1>Tên tài liệu :  <h1><input id="square" name="name" type="text" placeholder="Tên tài liệu" required value="'.$_GET['name'].'">
	<br><input type="radio" name="nr" value="noreview" '.$noreview.'><font color="red">Tài liệu không thể xem trước được chọn ở đây</font>
	<h1>Thể loại :  <h1>
	'.$dientu.' Điện - Điện tử &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	'.$dongco.' Động cơ <br>
	'.$dongson.' Đồng sơn &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
	'.$dienlanh.' Điện lạnh <br>
	'.$khunggam.' Khung gầm  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
	'.$tonghop.' Tổng hợp <br>
	<h1>Loại :  <h1>
	'.$chung.' Tài liệu chung <br>
	'.$doan.' Đồ án <br>
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
	<form method="post" action="confirm.php">
	<h1>Link tài liệu :  <h1><input id="square" name="link" type="text" placeholder="Dán link Google Drive công khai hoặc Tài lên phía dưới" required><font color="white">Nếu chưa có link: Tải lên tài liệu <a href="uploadfile.html">-> tại đây <-</a> hoặc link Google Drive (chia sẽ ở chế độ công khai)</font>
	<h1>Tên tài liệu :  <h1><input id="square" name="name" type="text" placeholder="Tên tài liệu" required>
	<br><input type="radio" name="nr" value="noreview"><font color="red">Tài liệu không thể xem trước được chọn ở đây</font>
	<h1>Thể loại :  <h1>
	<input type="radio" name="tl" value="Điện - Điện tử" required> Điện - Điện tử &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	<input type="radio" name="tl" value="Động cơ" required> Động cơ <br>
	<input type="radio" name="tl" value="Đồng sơn" required> Đồng sơn &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
	<input type="radio" name="tl" value="Điện lạnh" required> Điện lạnh <br>
	<input type="radio" name="tl" value="Khung gầm" required> Khung gầm &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
	<input type="radio" name="tl" value="Tổng hợp" required> Tổng hợp <br>
	<h1>Loại :  <h1>
	<input type="radio" name="mod" value="chung" required> Tài liệu chung <br>
	<input type="radio" name="mod" value="doan" required> Đồ án <br>
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