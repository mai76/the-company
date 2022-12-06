<?php

include "../classes/User.php";

$user = new User;
$user->delateUser($_POST['user_id']);