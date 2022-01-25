<?php
  
include ('../forms/main.html');
include('../libs/func.php');


if(isLogined()){
	echo 'Hello, ' . $_SESSION['login'] . ' !';
} 
