<?php

include "../classes/User.php";

$unc_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$user = new User;   //oblject
$user->createUser($_POST['first_name'], $_POST['last_name'], $_POST['username'], $unc_password);
