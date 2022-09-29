<?php

function getUser(){
    return json_decode(file_get_contents(__DIR__. '/users.json'),true);
}

function getUserById($id){
    $users = getUser();
    foreach($users as $user){
        if($user['id'] == $id){
            return $user;
        }
    }
    return null;
}

function createUser($data){
    $users = getUser();

    $last_item    = end($users);
    $last_item_id = $last_item['id'];
    $data['id'] = ++$last_item_id;

    $users[] = $data;

    putJson($users);

    return $data;
}

function updateUser($data,$id){
    $updateUser = [];
    $users = getUser();
    foreach($users as $i => $user){
        if($user['id'] == $id){
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }

    putJson($users);

    return $updateUser;
}

function deleteUser($id){
    $users = getUser();
    foreach($users as $i => $user){
        if($user['id'] == $id){
            array_splice($users,$i,1);
        }
    }

    putJson($users);
}

function uploadImage($file,$user){
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }

        $fileName = $file['name'];

        $dotPosition = strpos($fileName, '.');

        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${user['id']}.$extension");

        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}

function putJson($users){
    file_put_contents(__DIR__. '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors)
{
    $isValid = true;

    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = 'Name is required';
    }
    if (!$user['username']) {
        $isValid = false;
        $errors['username'] = 'Username is required';
    }
    if ($user['email']){
        if(!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $errors['email'] = 'This must be a valid email address';
        }
    } else {
        $isValid = false;
        $errors['email'] = 'Email is required';
    }

    if ($user['phone']){
        if (!preg_match('/^[0-9]{10}+$/', $user['phone']) && !filter_var($user['phone'], FILTER_VALIDATE_INT)) {
            $isValid = false;
            $errors['phone'] = 'This must be a valid phone number';
        }
    } else {
        $isValid = false;
        $errors['phone'] = 'Phone is required';
    }

    return $isValid;
}
