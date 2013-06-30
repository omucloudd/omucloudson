﻿<?php
session_name('omucloud');
session_start();

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';
if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'first_name', 'last_name', 'password',  'email');
	if (user_active($user_data['email']) === false) {
		session_destroy();
		header('Location: index.php');
		exit();
	}
}
$errors = array();
?>