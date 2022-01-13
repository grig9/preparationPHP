<?php
	session_start();
	include "functions.php";

	$result = get_user_by_email($_POST['email']);
	
	if (!empty($result)) {
		set_flash_message('danger', '<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.');
		redirect_to('page_register.php');
		exit;
	}

	add_user($_POST['email'], $_POST['password']);
	set_flash_message('success', 'Регистрация успешна');
	redirect_to('page_login.php');