<?php
session_start();
include "functions.php";

$id = $_POST['user_id'];
$email = $_POST['email'];
$password = $_POST['password'];

if ( empty($email) ) {
	set_flash_message('danger', 'Пустое занчение эл. адреса.');
	redirect_to('security.php?id='. $id);
}

$user = get_user_by_email($email);
$user_id = get_user_by_id($id);

// если пользователь ничего не менял
if ( empty($password) and $user['email'] === $user_id['email']  ) {
	set_flash_message('info', 'В профиле изменений не было!');
	redirect_to('page_profile.php?id='. $id);
}
// если пользователь поменял эл. адрес, а пароль пуст
if ( empty($password) and $user['email'] !== $user_id['email']  ) {
	set_flash_message('danger', 'Пустое занчение пароля.');
	redirect_to('security.php?id='. $id);
}
	
if ( !empty($user) and $user['email'] !== $user_id['email'] ) {
	set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
	redirect_to('security.php?id='. $id);
}

edit_credentials($id, $email, $password);
set_flash_message('success', 'Профиль успешно обновлен!');
redirect_to('page_profile.php?id='. $id);