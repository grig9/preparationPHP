<?php
session_start();
include "functions.php";

is_not_logged_in( $_SESSION['user'] );

if ( !is_admin($_SESSION['user']) and !is_author($_SESSION['user']['id'], $_GET['id']) ) {
    set_flash_message('danger', 'Можно редактировать, только свой профиль.');
    redirect_to("users.php");
}

$user = get_user_by_id($_GET['id']);


;?>