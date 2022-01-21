<?php
session_start();
include "functions.php";

$id = $_GET['id'];

is_not_logged_in( $_SESSION['user'] );

if ( is_admin($_SESSION['user']) ) {
  delete_user_by_id($id, './img/demo/avatars/');
  set_flash_message('success', 'Пользователь, удален!');
  redirect_to("users.php");
}

if ( is_author($_SESSION['user']['id'], $id) ) {
  delete_user_by_id($id, './img/demo/avatars/');
  unset( $_SESSION['user'] );
  redirect_to("page_register.php");
}

set_flash_message('danger', 'Можно редактировать, только свой профиль.');
redirect_to("users.php");