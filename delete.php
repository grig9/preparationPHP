<?php
session_start();
include "functions.php";

if( is_not_logged_in() ) {
  redirect_to("page_login.php");
}


delete_user_by_id($_GET['id'], './img/demo/avatars/');
set_flash_message('success', 'Пользователь, удален!');
redirect_to("users.php");