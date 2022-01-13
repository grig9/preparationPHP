<?php 



function get_user_by_email($email) {
	include "connect_db.php";
	
	$sql = "SELECT * FROM users WHERE email=:email";

  $statement = $pdo->prepare($sql);
  $statement->execute($_POST);
  $user = $statement->fetch(PDO::FETCH_ASSOC);

	return $user;
}





