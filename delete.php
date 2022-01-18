<?php
session_start();
include "functions.php";

is_not_logged_in( $_SESSION['user'] );

delete_user_by_id($_GET['id'], './img/demo/avatars/');
set_flash_message('success', 'Пользователь, удален!');
redirect_to("users.php");