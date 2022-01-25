<?php
session_start();


switch($_SERVER['REQUEST_URI'])
{
      case '/login':
           include('../libs/login.php');
      break;
      case '/registration';
           include('../libs/registration.php');
      break;
      case '/':
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
	    );
	    session_destroy();
	    include('../libs/main.php');
      break;
      default:
            include('../libs/main.php');
}









































