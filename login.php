<?php
ob_start(); 
include 'core/init.php';
include 'header.php';

?>

<div class="clear"></div>
<span class="error" >
<?php


if (empty($_POST) === false) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	if(empty($email) === true || empty($password) === true)  {
		$errors[] = 'Giriş yapmak için mail ve şifre alanlarını doldurmalısınız.';
	} else if (user_exists($email) === false) {
		$errors[] = 'Girmiş olduğunuz e-posta adresine ait bir hesap bulunamamaktadır.';
	} else if (user_active($email) === false) {
		$errors[] = 'Hesabınız aktif edilmediği için giriş sağlanamıyor, lütfen e-posta adresinize giderek hesabınızı aktif ediniz.';
	} else {
		if(strlen($password)>32){
			$errors[] = 'Şifreniz en fazla 32 karakterden oluşabilir.';
		}
		
		$login = login($email, $password);
		if ($login === false) {
			$errors[] = 'Geçersiz şifre girdiniz. Şifrenizi unuttuysanız <a href="#">buraya</a> tıklayarak yardım isteyebilirsiniz.';
		} else{
			$_SESSION['user_id'] = $login;
			header('Location: dosyalar.php');
			exit();
		}
	}
} else {
	$errors[] = 'Herhangi bir girişte bulunmadınız. Yanlış alanlarda geziniyorsunuz...';
}
output_errors($errors);	
?>
</span>
<?php
include 'slide.php';
include 'footer.php';
?>