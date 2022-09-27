<?php

function getUser(){
    if(file_exists(__DIR__. '/users.json')){
        $file = __DIR__. '/users.json';
        $data = file_get_contents($file);
        $users = json_decode($data);
        return $users;
    }else{
        return "file json not found.";
    }
}