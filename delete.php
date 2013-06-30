<?php

include 'core/init.php';
include('header.php');
$id = $_GET['file_id'];

$user_id=$user_data['user_id'];
$sorgu = mysql_query("SELECT * FROM `files` WHERE `file_id`='$id' AND `owner`='$user_id'");
$bilgi=mysql_fetch_array($sorgu);
if ($bilgi['folder'] == 0){
$user_id=$user_data['user_id'];
$sifreli_id=md5($user_id);
unlink('user_uploads/'.$sifreli_id.'/'.$bilgi['name']);
mysql_query("DELETE FROM `files` WHERE `file_id` = $id");
mysql_query("UPDATE `users` SET web = 1 WHERE user_id = $user_id ");
header('Location: dosyalar.php');
}else{
$user_id=$user_data['user_id'];
$sifreli_id=md5($user_id);
rmdir('user_uploads/'.$sifreli_id.'/'.$bilgi['name']);
mysql_query("DELETE FROM `files` WHERE `file_id` = $id");
mysql_query("UPDATE `users` SET web = 1 WHERE user_id = $user_id ");
header('Location: dosyalar.php');
}
?>

<?php

include('footer.php');
?>	