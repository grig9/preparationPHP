<?php
session_start();
include "functions.php";

$email = $_POST['email'];
$password = $_POST['password'];

$user = get_user_by_email($email);

if ( empty($email) or empty($password) ) {
	set_flash_messageset_flash_message('danger', 'Поля эл.адреса или пароля не были заполнены.');
	redirect_to('page_register.php');
}
	
if (!empty($user)) {
	set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
	redirect_to('page_register.php');
}

add_user($email, $password);
set_flash_message('success', 'Регистрация успешна!');
redirect_to('page_login.php');