<?php
session_start();
include "functions.php";

$id = $_POST['user_id'];
$email = $_POST['email'];
$password = $_POST['password'];

$user = get_user_by_email($email);
$user_id = get_user_by_id($id);

if ( empty($email) or empty($password) ) {
	set_flash_message('danger', 'Пустое занчение эл. адреса. или пароля');
	redirect_to('security.php?id='. $id);
}

// если пользователь ничего не менял
if ( empty($password) and $user['email'] === $user_id['email']  ) {
	set_flash_message('success', 'В профиле изменений не было!');
	redirect_to('page_profile.php?id='. $id);
}
	
if ( !empty($user) and $user['email'] !== $user_id['email'] ) {
	set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
	redirect_to('security.php?id='. $id);
}

edit_credentials($id, $email, $password);
set_flash_message('success', 'Профиль успешно обновлен!');
redirect_to('page_profile.php?id='. $id);