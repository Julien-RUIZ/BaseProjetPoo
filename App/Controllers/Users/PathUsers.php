<?php

$PathUsers = [
    [
        'path' => 'Users',
        'namespace'=>'App\Controllers\Users',
        'class' => 'UsersController',
        'methode' => 'getUser'],
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
        'methode' => 'LogoutUser'
    ]
];
