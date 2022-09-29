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

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);

    if ($isValid) {
        $user = updateUser($_POST, $userId);
        uploadImage($_FILES['picture'], $user);
        header("Location: index.php");
    }
}



include "_form.php";

?>

