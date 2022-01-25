<?php

include('../libs/func.php');

if (isLogined()) {
        redirect('/');
} else {
        if (isDataResived()) {
                addUser();
                redirect('/login');

        } else {
                include ('../forms/registration.html');
                
        }
}




















