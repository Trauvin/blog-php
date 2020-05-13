<?php

function validateUser($user) 
{
    $errors = array();
    
    // checks if there are any fields not filled in
    if(empty($user['username'])) {
        array_push($errors, "Username is required");
    }

    if(empty($user['email'])) {
        array_push($errors, "Email is required");
    }

    if(empty($user['password'])) {
        array_push($errors, "Password is required");
    }

    if($user['passwordConf'] !== $user['password']) {
        array_push($errors, "Password do not match");
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);

    if(isset($existingUser)) {
        array_push($errors, "Email alreday used");
    }

    return $errors;
}

function validateLogin($user) 
{
    $errors = array();
    
    // checks if there are any fields not filled in
    if(empty($user['username'])) {
        array_push($errors, "Username is required");
    }

    if(empty($user['password'])) {
        array_push($errors, "Password is required");
    }
    return $errors;
}