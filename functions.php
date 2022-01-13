<?php 

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
  echo $key;
}

function redirect_to($path) {
  header("Location: $path");
}




