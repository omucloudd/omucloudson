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
		Bilgileriniz başarılı bir şekilde güncellendi.
	</span>
<?php
} else { 
?>
<span class="error" >
<?php


if (empty($_POST) === false) {
	$required_fields=array('first_name','last_name');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[]= 'Ayarlarınız güncellerken boş alan bırakamazsınız';
			break 1;
		}
	}
	
} else {
	$errors[] = 'Herhangi bir girişte bulunmadınız. Yanlış alanlarda geziniyorsunuz...';
}

if (empty($errors) === true) {
	$u_user_id = $user_data['user_id'];
	$u_first_name = $_POST['first_name'];
	$u_last_name = $_POST['last_name'];
	
	update_user($u_user_id, $u_first_name, $u_last_name);
	header ('Location: update.php?success');
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