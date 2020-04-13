<?php

include(ROOT_PATH . '/app/database/db.php');

if(isset($_POST['register-btn'])) {
    unset($_POST['register-btn'], $_POST['passwordConf']);
    // define admin post users, 0[true] or 1[false]
    $_POST['admin'] = 0;
    // encrypted the password 
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // create user and getting id
    $user_id = create('users', $_POST);
    $user = selectOne('users', ['id' => $user_id]);

    dd($user);
}