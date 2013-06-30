<?php
include 'core/init.php';
include('header.php');

?>

			<div class="pagemid">
			
				<div class="maincontent">

					<div id="main">
					<div style="float:left;">
						<ul class="atpsocials">
							<li><a href="dosya_yukle.php"><span class="icon-download blue"> Dosya Yükle</span></a></li>
							<li><a href="klasor_olustur.php"><span class="icon-arrow blue"> Klasör Oluştur</span></a></li>
						</ul>
					</div>
			

<div id="main">
	
	<div class="content">
			
		<dl>
			<dt>
			<div style="float:left; margin-left: 0px;"><font size="4">Dosya Adı</font></div>
			</dt>
			<dd>
			<div style="overflow: hidden;"><div style="font-weight:bold; margin-left: 0px; float:left;"><font size="4">Açıklama</font>
			</div>
			
			<div style="overflow: hidden;"><div style="font-weight:bold; margin-right: 50px; float:right;"><font size="4">Sil</font>
			</div>
			<div style="font-weight:bold; margin-right: 80px; float:right;"><font size="4">Değiştirme Tarihi</font>
			</div>
			
			</div>
			</dd>
			
			<?php
				$user_id=$user_data['user_id'];
				$sorgu = mysql_query("SELECT * FROM `files` WHERE `owner` = '$user_id' and `folder` = 0 and `owner_folder` = 0");
				$path=md5($user_id);
				while ($bilgi=mysql_fetch_array($sorgu)){
			?>
			<dt><a href="<?php echo 'user_uploads/'.$path.'/'.$bilgi['name'];?>"><span class="icon-word blue"><?php echo $bilgi['name'];?></span></a></dt>
			<dd>
			<div style="overflow: hidden;">
			<div style="margin-left: 0px; float:left;">
			<?php echo $bilgi['description'];?>
			</div>
			<div style="overflow: hidden;"><div style="font-weight:bold; margin-right: 50px; float:right;"><a href="delete.php?file_id=<?php echo $bilgi['file_id'];?>">Sil</a>
			</div>
			<div style="margin-right: 95px; float:right;">
			<?php echo date("d-m-Y", strtotime($bilgi['upload_date'])). '  -  ' . $bilgi['upload_time'];?>
			</div>
			</div>
			</dd>
			
			<?php
			}
			?>
			
			
		</dl>
		<?php
				$user_id=$user_data['user_id'];
				$sorgu = mysql_query("SELECT * FROM `files` WHERE `owner` = '$user_id' and `folder` = 1");
				$path=md5($user_id);
				while ($bilgi=mysql_fetch_array($sorgu)){
			?>
		<div class="simpletoggle">
		<div style="overflow: hidden;"><div style="font-weight:bold; margin-right: 50px; float:right;"><a href="delete.php?file_id=<?php echo $bilgi['file_id'];?>">Sil</a>
			</div>
					<span class="toggle"><a href="#"><?php echo $bilgi['name'];?> </a>
					</span>
					
					<div style="display: none;" class="toggle_content">
						<div class="toggleinside">
						<?php 
						$i=1;
						$owner_folder= $bilgi['file_id'];
						$say = mysql_query("SELECT COUNT(*) as say FROM `files` WHERE `owner` = '$user_id' AND `owner_folder` = '$owner_folder'");
						$sayi=mysql_fetch_array($say);
						$sayi=$sayi['say'];
						$sorgu2 = mysql_query("SELECT * FROM `files` WHERE `owner` = '$user_id' AND `owner_folder` = '$owner_folder' AND `folder`=0");
						$bilgi2=mysql_fetch_array($sorgu2);
						$owner_folder= $bilgi2['owner_folder'];
						$sorgu3 = mysql_query("SELECT name FROM `files` WHERE `file_id` = '$owner_folder' ");
						$bilgi3 = mysql_fetch_array($sorgu3);
						$klasor = $bilgi3['name'];
						$path=md5($user_id);
						
						while ($i < 2 ){
						?>
							<dl>
							<dt><a href="<?php echo 'user_uploads/'.$path.'/'.$klasor.'/'.$bilgi2['name'];?>"><span class="icon-word blue"><?php echo $bilgi2['name'];?></span></a></dt>
							<dd>
							<div style="overflow: hidden;">
							<div style="margin-left: 0px; float:left;">
							<?php echo $bilgi2['description']; ?>
							</div>
							<div style="margin-right: 55px; float:right;">
							<?php echo date("d-m-Y", strtotime($bilgi2['upload_date'])). '  -  ' . $bilgi2['upload_time'];?>
							</div>
							</div>
							</dd>
							</dl>
						<?php
						$i++;
						}
						?>
			
						</div>
					</div>
		</div>
		<?php
		}
		?>
		
		
		
		
		
	</div>
		
</div><!-- .menu -->
<?php

include('footer.php');
?>	