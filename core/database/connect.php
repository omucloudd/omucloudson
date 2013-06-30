<?php 
$connect_error= 'Üzgünüz, Sisteme baðlanma sýrasýnda bir hata oluþtu.';
mysql_connect('localhost','root','') or die($connect_error);
mysql_select_db('omucloud_vt') or die($connect_error); 
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'");
?>