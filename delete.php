<?php
$dl = urldecode($_GET['ip']);
$redlad = '	<td><a href="delete.php?ip='.urlencode($dl).'">Xóa</a></td>
</tr>';
$dladmin = str_replace('</tr>',$redlad,$dl);
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('all.txt', "r");
$dl1 = fread($mdt,filesize('all.txt'));
fclose($mdt);
$mdt1 = fopen('all.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
preg_match_all('#<td>(.*?)</td>#', $dl, $vitri);
$xacnhan = $vitri[1];
if($xacnhan[2] != 'CHUYÊN NGÀNH' && $xacnhan[2] != 'ĐỒ ÁN'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen($xacnhan[2].'.txt', "r");
$dl1 = fread($mdt,filesize($xacnhan[2].'.txt'));
fclose($mdt);
$mdt1 = fopen($xacnhan[2].'.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
}
if($xacnhan[1] == 'Điện - Điện tử'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('dientu.txt', "r");
$dl1 = fread($mdt,filesize('dientu.txt'));
fclose($mdt);
$mdt1 = fopen('dientu.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
if($xacnhan[2] != 'CHUYÊN NGÀNH' && $xacnhan[2] != 'ĐỒ ÁN'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen($xacnhan[2].'-dientu.txt', "r");
$dl1 = fread($mdt,filesize($xacnhan[2].'-dientu.txt'));
fclose($mdt);
$mdt1 = fopen($xacnhan[2].'-dientu.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++	
}	
}
if($xacnhan[1] == 'Động cơ'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('dongco.txt', "r");
$dl1 = fread($mdt,filesize('dongco.txt'));
fclose($mdt);
$mdt1 = fopen('dongco.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
if($xacnhan[2] != 'CHUYÊN NGÀNH' && $xacnhan[2] != 'ĐỒ ÁN'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen($xacnhan[2].'-dongco.txt', "r");
$dl1 = fread($mdt,filesize($xacnhan[2].'-dongco.txt'));
fclose($mdt);
$mdt1 = fopen($xacnhan[2].'-dongco.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++	
}
}
if($xacnhan[1] == 'Đồng sơn'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('dongson.txt', "r");
$dl1 = fread($mdt,filesize('dongson.txt'));
fclose($mdt);
$mdt1 = fopen('dongson.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
if($xacnhan[2] != 'CHUYÊN NGÀNH' && $xacnhan[2] != 'ĐỒ ÁN'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen($xacnhan[2].'-dongson.txt', "r");
$dl1 = fread($mdt,filesize($xacnhan[2].'-dongson.txt'));
fclose($mdt);
$mdt1 = fopen($xacnhan[2].'-dongson.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++	
}
}
if($xacnhan[1] == 'Điện lạnh'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('dienlanh.txt', "r");
$dl1 = fread($mdt,filesize('dienlanh.txt'));
fclose($mdt);
$mdt1 = fopen('dienlanh.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
if($xacnhan[2] != 'CHUYÊN NGÀNH' && $xacnhan[2] != 'ĐỒ ÁN'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen($xacnhan[2].'-dienlanh.txt', "r");
$dl1 = fread($mdt,filesize($xacnhan[2].'-dienlanh.txt'));
fclose($mdt);
$mdt1 = fopen($xacnhan[2].'-dienlanh.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++	
}
}
if($xacnhan[1] == 'Khung gầm'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('khunggam.txt', "r");
$dl1 = fread($mdt,filesize('khunggam.txt'));
fclose($mdt);
$mdt1 = fopen('khunggam.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
if($xacnhan[2] != 'CHUYÊN NGÀNH' && $xacnhan[2] != 'ĐỒ ÁN'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen($xacnhan[2].'-khunggam.txt', "r");
$dl1 = fread($mdt,filesize($xacnhan[2].'-khunggam.txt'));
fclose($mdt);
$mdt1 = fopen($xacnhan[2].'-khunggam.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++	
}
}
if($xacnhan[1] == 'Phần mềm'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('allphanmem.txt', "r");
$dl1 = fread($mdt,filesize('allphanmem.txt'));
fclose($mdt);
$mdt1 = fopen('allphanmem.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
if($xacnhan[2] != 'CHUYÊN NGÀNH' && $xacnhan[2] != 'ĐỒ ÁN'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen($xacnhan[2].'-phanmem.txt', "r");
$dl1 = fread($mdt,filesize($xacnhan[2].'-phanmem.txt'));
fclose($mdt);
$mdt1 = fopen($xacnhan[2].'-phanmem.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++	
}
}
if($xacnhan[1] == 'Tổng hợp'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('tonghop.txt', "r");
$dl1 = fread($mdt,filesize('tonghop.txt'));
fclose($mdt);
$mdt1 = fopen('tonghop.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
if($xacnhan[2] != 'CHUYÊN NGÀNH' && $xacnhan[2] != 'ĐỒ ÁN'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen($xacnhan[2].'-tonghop.txt', "r");
$dl1 = fread($mdt,filesize($xacnhan[2].'-tonghop.txt'));
fclose($mdt);
$mdt1 = fopen($xacnhan[2].'-tonghop.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++	
}
}
if($xacnhan[2] == 'CHUYÊN NGÀNH'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('chung.txt', "r");
$dl1 = fread($mdt,filesize('chung.txt'));
fclose($mdt);
$mdt1 = fopen('chung.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
}	
if($xacnhan[2] == 'ĐỒ ÁN'){
// +++++++++++++++++++xoa+++++++++++++++
$mdt = fopen('doan.txt', "r");
$dl1 = fread($mdt,filesize('doan.txt'));
fclose($mdt);
$mdt1 = fopen('doan.txt', "w");
$dl2 = str_replace($dl, '',urldecode($dl1));
fwrite($mdt1, $dl2);
fclose($mdt1);
// +++++++++++++++++++end xoa+++++++++++
}	
$mdt = fopen('alladmin.txt', "r");
$dl1 = fread($mdt,filesize('alladmin.txt'));
fclose($mdt);
$mdt1 = fopen('alladmin.txt', "w");
$dl2 = str_replace($dladmin, '',$dl1);
fwrite($mdt1, $dl2);
fclose($mdt1);

preg_match('#<!-- (.*?)-->#', $dl, $iddoc);
$dl1 = file_get_contents('iddoc.txt');
if(strstr($dl1, '</div></div>')){
$data = str_replace(array('<div style="text-align: center;"><div style="position:relative; top:0; margin-right:auto;margin-left:auto; z-index:99999">', '</div></div>'), array('', ''), $dl1);
}else{$data = $dl1;}
$json = json_decode($data, true);
$iddd = $iddoc[1];
$redata = str_replace(',"'.$iddd.'":"'.$json[$iddd].'"', '' ,$data);
$fdall = fopen('iddoc.txt', "w");
fwrite($fdall, $redata);
fclose($fdall);
// +++++++++++++++++++end xoa+++++++++++
echo '
<html>
    <head>
        <meta http-equiv="refresh" content="1;url=admin.page.php?p=dGFpbGlldWNrZDE1MTQ1MzMwZW5jb2RlcGFzc3dvcmRhZG1pbjIwMTg=" />
    </head>
    <body>
<center><h1>Xóa thành công<h1></center>
    </body>
</html>';
?>