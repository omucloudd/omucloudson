<?php
ob_start(); 
include 'core/init.php';
include 'header.php';
?>
<div class="clear"></div>
<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
?>
	<div class="clear"></div>
	<span class="download" >
		Dosyanız başarılı bir şekilde yüklendi.
	</span>
<?php
} else { 
?>
<span class="error" >
<?php


if (empty($_POST) === false) {
		if (empty($_FILES['file']['name']) === true) {
			$errors[]= 'Yükleyeceğiniz dosyayı seçmediniz. <a href="dosya_yukle.php"> Buraya tıklayarak tekrar deneyebilirsiniz.</a>';
			
		}
	
} else {
	$errors[] = 'Herhangi bir girişte bulunmadınız. Yanlış alanlarda geziniyorsunuz...';
}

if (empty($errors) === true) {
	$dosya_orj_ad= $_FILES['file']['name'];
	$dosya_orj_ad = ereg_replace('ç', 'c', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('ğ', 'g', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('ı', 'i', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('ö', 'o', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('ş', 's', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('ü', 'u', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('Ç', 'C', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('Ğ', 'G', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('İ', 'I', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('Ö', 'O', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('Ş', 'S', $dosya_orj_ad);
	$dosya_orj_ad = ereg_replace('Ü', 'U', $dosya_orj_ad);
	$uu_id=$user_data['user_id'];
	$foo=$_POST['folder'];
	if ($foo==0){
	move_uploaded_file($_FILES["file"]["tmp_name"],
	"user_uploads/" . md5($uu_id) . "/" . $dosya_orj_ad);
	
	}else{
	$sorgu= mysql_query("SELECT `name` FROM `files` WHERE `file_id`=$foo");
		$bilgi = mysql_fetch_array($sorgu);
		$klasor = $bilgi['name'];
		$ad=$_POST['name'];
	move_uploaded_file($_FILES["file"]["tmp_name"],
	"user_uploads/" . md5($uu_id) ."/". $klasor . "/" . $dosya_orj_ad);
	}
	$file_name = $dosya_orj_ad;
	$file_type = $_FILES["file"]["type"];
	$file_tmp_name=$_FILES["file"]["tmp_name"];
	$file_size=$_FILES["file"]["size"];
	$upload_time = date('H:i:s');
	$upload_date = date('Y-m-d');
	upload_file($user_data['user_id'], $file_name, $_POST['description'], $file_type, $file_tmp_name, $file_size, $upload_time, $upload_date, $foo);
	header ('Location: upload_realize.php?success');
	exit();
	
} else {
	output_errors($errors);	
}
}
?>
</span>
<?php
include 'slide.php';
include 'footer.php';
?>