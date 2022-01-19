<?php



switch($_SERVER['REQUEST_URI'])
{
      case '/login':
           include('../libs/login.php');
      break;
      case '/registration';
           include('../libs/registration.php');
      break;
      default:
            include('../libs/main.php');
}









































