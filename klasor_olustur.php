<?php
include 'core/init.php';
include('header.php');
$u_id=$user_data['user_id'];
if (!file_exists('user_uploads/'.md5($u_id))) {
    mkdir('user_uploads/'.md5($u_id));
}
?>
<div id="subheader">
				<div class="inner">
					<h1>Dosya Yükle</h1>
					
				</div>
			</div>
<div id="breadcrumbs">
				<span class="breadcrumbs">
					Şu anda <a class="breadcrumbs-begin" rel="home" href="#">Dosya Yükleme Sayfasındasınız..</a>
					
				</span>
			</div>
			<div class="pagemid">
				<div class="maincontent">

					<div id="main">


<div id="main">

	<div class="portfolio_item">

		<div class="sysform">
			<form action="folder_realize.php" method="post" class="form">

				<p class="name">
					<input type="text" id="name" name="name" style="width:200px;">
					<label for="name">Oluşturacağınız klasörün adını giriniz.</label>
				</p>

				
				
				<p class="folder">
					<select style="width:200px;" name="folder">
						<option selected value="0">Klasörü Seçiniz</option>
						<?php
						$user_id=$user_data['user_id'];
						$sorgu = mysql_query("SELECT * FROM `files` WHERE `owner` = '$user_id' and folder = 1");
						while ($bilgi=mysql_fetch_array($sorgu)){
						?>
						<option value="<?php echo $bilgi['file_id'];?>"><?php echo $bilgi['name'];?></option>
						<?php
						}
						?>
						
						
					</select>
					<label for="email">Oluşturacağınız klasörün hangi klasör içinde olmasını istiyorsanız seçiniz.</label>
				</p>

				

				

				<p class="submit">
					<button class="button red" value="Send" type="reset"><span>Temizle</span></button>
					<button class="button blue" value="Send" type="submit"><span>Oluştur</span></button>
				</p>
					

			</form>
		</div>
		


	</div>
		
</div><!-- .menu -->
<?php

include('footer.php');
?>	