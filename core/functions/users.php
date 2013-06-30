<?php


function upload_file($user_id, $file_name, $description, $file_type, $file_tmp_name, $file_size, $upload_time, $upload_date, $owner_folder){
	if(mysql_result(mysql_query ("SELECT COUNT(`file_id`) FROM `files` WHERE `name` = '$file_name' AND `owner_folder` = $owner_folder AND `owner`=$user_id"),0) == 1) {
		mysql_query("UPDATE `files` SET upload_time= '$upload_time' WHERE name= '$file_name'" );
		mysql_query("UPDATE `files` SET upload_date= '$upload_date' WHERE name= '$file_name'" );
		$timestamp = strtotime($upload_date . ' ' . $upload_time);
		mysql_query("UPDATE `files` SET modified= '$timestamp' WHERE name= '$file_name'" );
		mysql_query("UPDATE `users` SET web = 1 WHERE user_id = $user_id ");
	}else{
		$timestamp = strtotime($upload_date . ' ' . $upload_time);
		mysql_query("INSERT INTO `files` (owner, name, description, type, tmp_name, size, upload_time, upload_date, owner_folder, modified) VALUES ('$user_id', '$file_name', '$description', '$file_type', '$file_tmp_name', '$file_size', '$upload_time', '$upload_date', '$owner_folder', '$timestamp')");
		mysql_query("UPDATE `users` SET web = 1 WHERE user_id = $user_id ");
	}
}
function update_password($user_id, $password){
	
	mysql_query("UPDATE `users` SET password = '$password' WHERE user_id = '$user_id'");
}

function update_user($user_id, $first_name, $last_name){
	
	mysql_query("UPDATE `users` SET first_name = '$first_name' WHERE user_id = '$user_id'");
	mysql_query("UPDATE `users` SET last_name = '$last_name' WHERE user_id = '$user_id'");
}
function register_user($register_data){
	array_walk($register_data, 'array_sanitize');
	$register_data['password']=md5($register_data['password']);
	
	$fields= '`' . implode('`, `', array_keys($register_data)) . '`';
	$data= '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
}

function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	if ($func_num_args>1){
		unset($func_get_args[0]);
		
		$fields= '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields from `users` WHERE `user_id` = $user_id"));
		
		return $data;
	}
	
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false; 
}

function user_exists($email){
	$email=sanitize($email);
	return(mysql_result(mysql_query ("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'"),0) == 1) ? true : false;
}

function user_active($email){
	$email=sanitize($email);
	return(mysql_result(mysql_query ("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' AND `active` = 1"),0) == 1) ? true : false;
}

function user_id_from_email($email){
	$email=sanitize($email);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'"),0,'user_id');
}

function login($email, $password) {
	$user_id = user_id_from_email($email);
	$email=sanitize($email);
	$password=md5($password);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}
?>