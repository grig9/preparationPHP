<?php
session_start();

include "functions.php";

$id = $_POST['user_id'];
$username = $_POST['user_name'];
$job = $_POST['job'];
$phone = $_POST['phone'];
$address = $_POST['address'];

edit_user($id, $username, $job, $phone, $address);

set_flash_message('success', 'Профиль успешно обновлен!');
redirect_to("users.php");