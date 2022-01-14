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

function is_admin($user) {
  if($user['role'] === 'admin') {
    return true;
  }

  return false;
}

function delete_user_by_id($id) {
  include "connect_db.php";

  $sql = "DELETE FROM users WHERE id = ?";

  $statement = $pdo->prepare($sql);
  $statement->execute([$id]);

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