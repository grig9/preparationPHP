<?php
session_start();
include "functions.php";

$id = $_POST['user_id'];
$email = $_POST['email'];
$password = $_POST['password'];

$user = get_user_by_email($email);



// var_dump($user['email']);
// echo "<br>";
// var_dump($email);die;
	
if (!empty($user)) {
	set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
	redirect_to('security.php');
}


edit_credentials($id, $email, $password);
set_flash_message('success', 'Профиль успешно обновлен!');
redirect_to('users.php');