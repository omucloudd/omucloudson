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
		Şifreniz başarılı bir şekilde güncellendi.
	</span>
<?php
} else { 
?>
<span class="error" >
<?php


if (empty($_POST) === false) {
	$required_fields=array('password','new_password','new_passworda');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[]= 'Tüm şifre alanlarını doldurmanız gerekmektedir';
			break 1;
		}
	}
	
	if(empty($errors) === true) {
		
		if(strlen($_POST['new_password']) < 8){
		 $errors[]='Şifreniz 8 karakterden fazla olmalıdır.';
		}
		if($_POST['new_password'] !== $_POST['new_passworda']){
			$errors[]='Yeni şifreniz ve tekrarı aynı olmalıdır.';
		}
		$email = $user_data['email'];
		$password = $_POST['password'];
		$login = login($email, $password);
		if ($login === false) {
			$errors[] = 'Şu anda geçerli olan şifrenizi yanlış girdiniz. Şifrenizi değiştirmek için güvenlik amaçlı eski şifrenizi de doğru girmeniz gerekmektedir.
			<br> Şifrenizi değiştirmeyi tekrar denemek için <a href="ayarlar.php"> tıklayınız. </a>';
		}
	}
} else {
	$errors[] = 'Herhangi bir girişte bulunmadınız. Yanlış alanlarda geziniyorsunuz...';
}

if (empty($errors) === true) {
	$u_user_id = $user_data['user_id'];
	$u_password = md5($_POST['new_password']);
	
	update_password($u_user_id, $u_password);
	header ('Location: update_pass.php?success');
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