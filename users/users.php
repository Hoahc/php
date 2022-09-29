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

function uploadImage($file){
    if(!is_dir(__DIR__.'/images')){
        mkdir(__DIR__.'/images');
    }

    $filename = $_FILES['picture']['name'];
    $dotPosition = strpos($filename,'.');
    $extension = substr($filename,$dotPosition + 1);
    move_uploaded_file($file['tmp_name'],__DIR__."/images/${user['id']}.$extension");

    $user['extension'] = $extension;
    updateUser($user,$user['id']);
}

function putJson($users){
    file_put_contents(__DIR__. '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}
