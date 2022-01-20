<?php
include "functions.php";

$id = $_POST['user_id'];
$status = $_POST['status'];

set_status($id, $status);
set_flash_message($id, 'Статус профиля успешно обновлен!');
redirect_to("page_profile.php?id=".$id);