<?php

include('../libs/func.php');


if (isLogined()) {
        redirect('/');
} else {
        if (isDataResived()) {
                checkUser();


        } else {
                include ('../forms/login.html');
                
        }
}        
