<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

// When cookie was created. We need to set parameter to make it more secure

session_set_cookie_params([
    'lifetime'=> 1800,
    'domain'=> 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

// session_regenerate_id(true);    

// This checks if the time is equals or more than 30 mins then regenerate new id
if (isset($_SESSION['last_regeneration'])) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
} else{
    $interval = 60 * 30;

    if(time() - $_SESSION['last_regeneration'] >= $interval){

        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
        
    }
}