<?php
require __DIR__. '/users/users.php';

$userId = $_GET['id'];
if(!isset($_GET['id'])){
    echo "Not Found";
    exit;
}
deleteUser($userId);
header("Location: index.php");