<?php

$PathUsers = [
    [
        'path' => 'Users/Account',
        'namespace'=>'App\Controllers\Users',
        'class' => 'UsersController',
        'methode' => 'getUserInfo'],
    [
        'path' => 'Users/Registration',
        'namespace'=>'App\Controllers\Users',
        'class' => 'CreateUsersController',
        'methode' => 'CreateUser'],
    [
        'path' => 'Users/Login',
        'namespace'=>'App\Controllers\Users',
        'class' => 'LoginUsersController',
        'methode' => 'LoginUser'],
    [
        'path' => 'Users/Logout',
        'namespace'=>'App\Controllers\Users',
        'class' => 'LogoutUsersController',
        'methode' => 'LogoutUser'],
    [
        'path' => 'Users/Update',
        'namespace'=>'App\Controllers\Users',
        'class' => 'UpdateUsersController',
        'methode' => 'UpdateUser'],
    [
        'path' => 'Users/UpdatePassword',
        'namespace'=>'App\Controllers\Users',
        'class' => 'UpdatePasswordUsersController',
        'methode' => 'UpdatePassword'
    ]
];
