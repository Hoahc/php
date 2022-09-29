<?php
require __DIR__. '/users/users.php';

$userId = $_GET['id'];
if(!isset($_GET['id'])){
    echo "Not Found";
    exit;
}

$user = getUserById($userId);
if(!$user){
    echo "Not Found";
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    updateUser($_POST, $userId);

    if(isset($_FILES['picture'])){
        uploadImage($_FILES['picture'], $user);
    }

    header("Location: index.php");
}



include "_form.php";

?>

