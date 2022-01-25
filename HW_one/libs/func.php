<?php

function redirect($url) {
        header ("Location:$url");
        die;
}

function isLogined() {
	if($_SESSION['login'] && $_SESSION['login']){
	return true;
	}
	else{
        return false;
	}
}
function isDataResived() {
        if($_SERVER['REQUEST_URI']=='/registration'){
		if (strpos(file_get_contents('../libs/users.csv'), $_POST['login'])){
		echo '<br>';
		echo 'Такой логин уже существует';
		}else
		{
		return array_key_exists("submit", $_POST);
		}	
	} else
        {
        return array_key_exists("submit", $_POST);
        }
}

function addUser() {
        $user = [];
        
        $user['login'] = $_POST['login'];
        $user['password'] = md5($_POST['password']);
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


function checkUser() {
        $userCheck = [];
        
        $userCheck['login'] = $_POST['login'];
        $userCheck['password'] = md5($_POST['password']);
        
        insertUserCheck($userCheck);
}

function insertUserCheck(array $userCheck) {
        if (! file_exists('../libs/users.csv')) {
               touch('../libs/users.csv');
        }
        $stringCheck = implode(';', [
                $userCheck['login'],
                $userCheck['password'],
        ]);
        searchLine($stringCheck,$userCheck);
}

function searchLine (string $stringCheck, array $userCheck) {
	if (! strpos(file_get_contents('../libs/users.csv'), $stringCheck)){
	        echo '<br>';
		echo 'Логин или пароль введен не верно, повторите попытку'; 
		include ('../forms/login.html');
		} 
	else{
		$_SESSION['login'] = $userCheck['login'];
		$_SESSION['password'] = $userCheck['password'];
		redirect('/');
		}
}

