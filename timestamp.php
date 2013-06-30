<?php
$timestamp = strtotime('2007-02-14 20:25:25');
echo (int)$timestamp;

$upload_time = date('H:i:s');
$upload_date = date ('Y-m-d');
$timestamp = strtotime($upload_date . ' ' . $upload_time);
$timestamp2=strtotime('2013-06-21 12:50:10');
echo '<br>'.$timestamp;
echo '<br>'.$timestamp2;
?>