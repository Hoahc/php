<?php
require __DIR__. '/users/users.php';

$userId = $_POST['id'];
if(!isset($_POST['id'])){
    echo "Not Found";
    exit;
}
deleteUser($userId);
header("Location: index.php");