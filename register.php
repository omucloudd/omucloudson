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
		Kaydınızı başarılı bir şekilde gerçekleştirildi. Giriş Yap kısmından Girişinizi gerçekleştirebilirsiniz.
		<br> İlerleyen zamanlarda sizden e-postanıza giderek, hesabınızı aktif yapmanızı isteyebiliriz.
	</span>
<?php
} else { 
?>
<span class="error" >
<?php


if (empty($_POST) === false) {
	$required_fields=array('first_name','last_name','email','password','passworda');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[]= 'Tüm alanları doldurmanız gerekmektedir';
			break 1;
		}
	}
	
	if(empty($errors) === true) {
		if(user_exists($_POST['email']) === true) {
			$errors[]='Girmiş olduğunuz ' . htmlentities($_POST['email']) . ' e-posta adresi ile daha önceden üye olunmuştur. <br>Şifrenizi unuttuysanız seçenekleri belirlemek için lütfen <a href="#">buraya</a> tıklayınız.';			
		}
		if(strlen($_POST['password']) < 8){
		 $errors[]='Şifreniz 8 karakterden fazla olmalıdır.';
		}
		if($_POST['password'] !== $_POST['passworda']){
			$errors[]='Şifre ve tekrarı aynı olmalıdır.';
		}
	}
} else {
	$errors[] = 'Herhangi bir girişte bulunmadınız. Yanlış alanlarda geziniyorsunuz...';
}

if (empty($errors) === true) {
	$register_data = array (
		'first_name' 	=> $_POST['first_name'],
		'last_name'		=> $_POST['last_name'],
		'email'			=> $_POST['email'],
		'password'		=> $_POST['password']
	);
	
	register_user($register_data);
	header ('Location: register.php?success');
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