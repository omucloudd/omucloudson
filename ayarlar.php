<?php
include 'core/init.php';
include('header.php');

?>
<div id="subheader">
				<div class="inner">
					<h1>Ayarlar</h1>
					
				</div>
			</div>
<div id="breadcrumbs">
				<span class="breadcrumbs">
					Şu anda <a class="breadcrumbs-begin" rel="home" href="#">Ayarlar Sayfasındasınız..</a>
					
				</span>
			</div>
			<div class="pagemid">
				<div class="maincontent">

					<div id="main">


<div id="main">

	<div class="content">
		<h1>Kişisel Ayarlarınız</h1>
		<div class="sysform">
			<form action="update.php" method="post" class="form">

				<p class="name">
					<input type="text" id="name" name="first_name" style="width:200px;" value="<?php echo $user_data['first_name']?>">
					<label for="name">Adınız</label>
				</p>

				<p class="email">
					<input type="text" id="email" name="last_name" style="width:200px;" value="<?php echo $user_data['last_name']?>">
					<label for="email">Soyadınız</label>
				</p>

				<p class="web">
					<input type="email" id="web" name="email" style="width:200px;" disabled value="<?php echo $user_data['email']?>">
					<label for="web">E-posta Adresiniz</label>
				</p>

				

				<p class="submit">
					<button class="button small blue" value="Send" type="submit"><span>Güncelle</span></button>
				</p>

			</form>
		</div>
		<br>
		<div class="fancytoggle">
			<span class="toggle"><a href="#">Şifremi Değiştirmek İstiyorum</a></span>
			<div style="display: none;" class="toggle_content">
				<div class="toggleinside">
					<div class="sysform">
						<form action="update_pass.php" method="post" class="form">

							<p class="name">
								<input type="password" id="name" name="password" style="width:200px;">
								<label for="name">Eski Şifreniz</label>
							</p>

							<p class="email">
								<input type="password" id="email" name="new_password" style="width:200px;">
								<label for="email">Yeni Şifreniz</label>
							</p>

							<p class="web">
								<input type="password" id="web" name="new_passworda" style="width:200px;">
								<label for="web">Yeni Şifreniz <i>(tekrar)</i></label>
							</p>

							

							<p class="submit">
								<button class="button small blue" value="Send" type="submit"><span>Güncelle</span></button>
							</p>

						</form>
					</div>
				</div>
			</div>
		</div>

		
	</div>
		
</div><!-- .menu -->
<?php

include('footer.php');
?>	