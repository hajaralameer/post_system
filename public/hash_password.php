<?php
$password = '123'; // Replace with the password you want to hash
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

echo $hashed_password;
?>
