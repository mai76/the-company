<?php

include "../classes/User.php";

$user = new User;
$user->updataUser($_POST['user_id'], $_POST['first_name'], $_POST['last_name'], $_POST['username']);