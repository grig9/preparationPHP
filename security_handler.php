<?php
session_start();
include "functions.php";

$id = $_POST['user_id'];
$email = $_POST['email'];
$password = $_POST['password'];
var_dump($_POST['password']);die;


$user = get_user_by_email($email);
$user_id = get_user_by_id($id);

if ( empty($email) ) {
	set_flash_message('danger', 'Пустое занчение эл. адреса.');
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

if ($user['email'] !== $user_id['email'] and empty($password) ) {
	$password = $user_id['password'];
}

edit_credentials($id, $email, $password);
set_flash_message('success', 'Профиль успешно обновлен!');
redirect_to('page_profile.php?id='. $id);