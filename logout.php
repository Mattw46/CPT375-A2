<?php
session_start();
session_unset();

$cookieParams = session_get_cookie_params();
$cookieParams['lifetime'] = time()-1337;
setcookie(session_name(), '', $cookieParams['lifetime'], $cookieParams['path'], $cookieParams['domain'],
                              $cookieParams['secure'], $cookieParams['httponly']);
session_destroy();

header("location: ./");