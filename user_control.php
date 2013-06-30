<hr>
<nav>
	<div class="menu">
		<ul class="sf-menu" style="float:left;">
			<li><a href="dosyalar.php">Dosyalar</a></li>
			<li><a href="ayarlar.php">Ayarlar</a></li>
			<li><a href="logout.php">Çıkış Yap</a></li>
		
		</ul>
	</div>
</nav>
<div style="float:right; margin-right:10px;">
<div class="fancytoggle" style="width:220px;">
		<span class="toggle"><a href="#"><span class="icon-male black"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></span></a></span>
		<div style="display: none;" class="toggle_content">
			<div class="toggleinside">
				<hr><a href="ayarlar.php"><span class="icon-star">Ayarlar</span></a><hr>
				<a href="#"><span class="icon-help">Yardım</span></a><hr>
				<a href="logout.php"><span class="icon-arrow">Çıkış</span></a><hr>
			</div>
		</div>
	</div>
</div><hr>