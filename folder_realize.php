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
		Klasör başarılı bir şekilde oluşturuldu.
	</span>
<?php
} else { 
?>
<span class="error" >
<?php


if (empty($_POST) === false) {
		if (empty($_POST['name']) === true) {
			$errors[]= 'Klasörün adını belirtmelisini. <a href="klasor_olustur.php"> Buraya tıklayarak tekrar deneyebilirsiniz.</a>';
		if (file_exists('user_uploads/'.$user_data['user_id'].'/'.$_POST['name'])) {
			$errors[]= 'Seçilen dizinde aynı isimde bir klasör mevcut. <a href="klasor_olustur.php"> Buraya tıklayarak tekrar deneyebilirsiniz.</a>';
		}
		}
	
} else {
	$errors[] = 'Herhangi bir girişte bulunmadınız. Yanlış alanlarda geziniyorsunuz...';
}

if (empty($errors) === true) {
	$uu_id=$user_data['user_id'];
	$name=$_POST['name'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$dosya_orj_ad= $_POST['name'];
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
	$foo=$_POST['folder'];
	if ($foo==0){
		mkdir('user_uploads/'.md5($uu_id).'/'.$_POST['name']);
	}else{
		$sorgu= mysql_query("SELECT `name` FROM `files` WHERE `file_id`=$foo");
		$bilgi = mysql_fetch_array($sorgu);
		$klasor = $bilgi['name'];
		$ad=$_POST['name'];
		mkdir('user_uploads/'.md5($uu_id).'/'.$klasor.'/'.$dosya_orj_ad);
	}
	mysql_query("INSERT INTO `files` (owner, name, upload_time, upload_date, owner_folder, folder) VALUES ('$uu_id', '$dosya_orj_ad', '$time', '$date', '$foo', 1)");
	header ('Location: folder_realize.php?success');
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