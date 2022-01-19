<?php
session_start();
include "functions.php";

$email = $_POST['email'];
$password = $_POST['password'];

$status = $_POST['status'];

$image = $_FILES['img_avatar'];

$username = $_POST['username'];
$job = $_POST['job'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$vk = $_POST['vk'];
$telegram = $_POST['telegram'];
$instagram = $_POST['instagram'];

$user = get_user_by_email($email);

if (!empty($user)) {
	set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
	redirect_to('create_user.php');
}

$id = add_user($email, $password);
edit_user($id, $username, $job, $phone, $address);
set_status($id, $status);

if( $image['error'] === 0 ) {
	upload_avatar($id, './img/demo/avatars/', $image);
}

add_social($id, $vk, $telegram, $instagram);

set_flash_message('success', 'Пользователь, добавлен!');
redirect_to('users.php');