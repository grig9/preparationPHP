<?php 

function get_all_users_from_db() {
  include "connect_db.php";

  $sql = "SELECT * FROM users";

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $users = $statement->fetchAll(PDO::FETCH_ASSOC);

  return $users;
}

function is_not_logged_in() {
  if(isset($_SESSION['user']) and !empty($_SESSION['user'])) {
    return false;
  }

  return true;    
}

function is_logged_in() {
  if(isset($_SESSION['user']) and !empty($_SESSION['user'])) {
    return true;
  }

  return false;
}

function is_admin($user) {
  if($user['role'] === 'admin') {
    return true;
  }

  return false;
}

function is_author($logged_user, $edit_user_id) {
  if ($logged_user === $edit_user_id) {
    return true;
  }

  return false;
}

function delete_user_by_id($id, $path) {
  delete_image_by_id($id, $path);

  include "connect_db.php";

  $sql = "DELETE FROM users WHERE id = ?";
  $statement = $pdo->prepare($sql);
  $statement->execute([$id]);

}

function get_image_name_by_id($id){
  $user = get_user_by_id($id);

  return $user['image_name'];
}

function get_user_by_id($id) {
  include "connect_db.php";

  $sql = "SELECT * FROM users WHERE id = ?";
  $statement = $pdo->prepare($sql);
  $statement->execute([$id]);
  $user = $statement->fetch(PDO::FETCH_ASSOC);

  return $user;
}

function delete_image_by_id($id, $path) {
  $image_name = $path . get_image_name_by_id($id);
  unlink($image_name);
}

function login($email, $password) {

  $user = get_user_by_email($email);
  
  if(empty($user)) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
    return false;
  }

  if($user['password'] !== $password) {
    return false;
  }

  $_SESSION['user'] = $user;

  return true;
}

function get_user_by_email($email) {
  include "connect_db.php";

  $sql = "SELECT * FROM users WHERE email = ?";
  $statement = $pdo->prepare($sql);
  $statement->execute([$email]);
  $user = $statement->fetch(PDO::FETCH_ASSOC);

  return $user;
}

function add_user($email, $password) {
  include "connect_db.php";

  $sql = "INSERT INTO users (email, password) VALUES (?,?)";
  $statement = $pdo->prepare($sql);
  $statement->execute([$email, $password]);

  $user = get_user_by_email($email);
  return $user['id'];
}

function set_flash_message($key, $message) {
  $_SESSION[$key] = $message;
}

function display_flash_message($key) {
  if(isset($_SESSION[$key])) {
    echo "<div class=\"alert alert-{$key}\" role=\"alert\">{$_SESSION[$key]}</div>";
    unset($_SESSION[$key]);
  }
}

function redirect_to($path) {
  header("Location: {$path}");
  exit;
}


function edit_user($id, $username, $job, $phone, $address) {
  include "connect_db.php";

  $sql = "UPDATE users SET name = ?, position = ?, phone = ?, address = ?  WHERE id = ?";
  $statement = $pdo->prepare($sql);
  $statement->execute([$username, $job, $phone, $address, $id]);
}

function set_status($id, $status) {
  include "connect_db.php";

  $sql = "UPDATE users SET status = ? WHERE id = ?";
  $statement = $pdo->prepare($sql);
  $statement->execute([$status, $id]);
}

function upload_image($path_to, $image) {
  $extension = pathinfo($image['name'])['extension'];
  $new_name = uniqid() . '.' . $extension;
  $upload_file = $path_to . $new_name;
  move_uploaded_file($image['tmp_name'], $upload_file);
  return $new_name;
}

function upload_avatar($id, $path_to, $image) {
  $new_name = upload_image($path_to, $image);

  include "connect_db.php";

  $sql = "UPDATE users SET image_name = ? WHERE id = ?";
  $statement = $pdo->prepare($sql);
  $statement->execute([$new_name, $id]);
}

function add_social($id, $vk, $telegram, $instagram) {
  include "connect_db.php";

  $sql = "UPDATE users SET vk = ?, telegram = ?, instagram = ? WHERE id = ?";
  $statement = $pdo->prepare($sql);
  $statement->execute([$vk, $telegram, $instagram, $id]);
}