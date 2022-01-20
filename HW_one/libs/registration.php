<?php

function isLogined() {
        return false;
}

function redirect($url) {
        header ("Location:$url");
        exit( );
}

function isDataResived() {
        return array_key_exists("submit", $_POST);
}

function addUser() {
        $user = [];
        
        $user['login'] = $_POST['login'];
        $user['password'] = $_POST['password'];
        $user['name'] = $_POST['name'];
        insertUser($user);
}


function insertUser(array $user) {
        if (! file_exists('../libs/users.csv')) {
               touch('../libs/users.csv');
        }
        
        $fileData = file('../libs/users.csv');
        
        $id = count($fileData) + 1;
        
        $string = implode(';', [
                $id,
                $user['login'],
                $user['password'],
                $user['name'],
        ]) . "\n";
        
        file_put_contents('../libs/users.csv', $string, FILE_APPEND);
}

if (isLogined()) {
        redirect('/');
} else {
        if (isDataResived()) {
                addUser();
                redirect('/login');

        } else {
                include ('../forms/registration.php');
                
        }
}




















