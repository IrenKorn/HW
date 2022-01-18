<?php


if($_SERVER['REQUEST_URI']='/' || '\'\''){
  session_start();
  if($_SESSION===Array()){
  echo <<<HTML
  <p><a href="/app/login.php"">Войти</a></p>
  <p><a href="/app/registrate.php">Зарегистрироваться</a></p>
  HTML;


 

 // include('form.php');
  //print_r($_SERVER);
  //<<<HTML   
  //<p><a href="http://localhost:8022/login">Войти</a></p>
  //<p><a href="http://localhost:8022/registrate">Зарегистрироваться</a></p>
  //HTML;
}
}
//*/



























