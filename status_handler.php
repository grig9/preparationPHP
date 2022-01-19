<?php
include "functions.php";

$id = $_POST['user_id'];
$status = $_POST['status'];

set_status($id, $status);
redirect_to("page_profile.php?id=".$id);