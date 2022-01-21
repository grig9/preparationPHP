<?php
session_start();
include "functions.php";

$id = $_POST['user_id'];
$image = $_FILES['image'];

if( $image['error'] === 0 ) {
  //удаляем текущее изображение пользователя
  delete_image_by_id($id, './img/demo/avatars/');
  //загружаем новое изображение
	upload_avatar($id, './img/demo/avatars/', $image);
  set_flash_message('success', 'Изображение профиля успешно обновлено!');
  redirect_to("page_profile.php?id=".$id);
}

set_flash_message('danger', 'Изображение не удалось загрузить!');
redirect_to("media.php?id=".$id);