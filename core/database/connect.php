<?php 
$connect_error= '�zg�n�z, Sisteme ba�lanma s�ras�nda bir hata olu�tu.';
mysql_connect('localhost','root','') or die($connect_error);
mysql_select_db('omucloud_vt') or die($connect_error); 
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'");
?>