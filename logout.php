<?php
session_start();
$cookieParams = session_get_cookie_params();
$cookieParams['lifetime'] = 1337;
session_unset();

setcookie(session_name(), session_id(), $cookieParams['lifetime'], $cookieParams['path'], $cookieParams['domain'],
                                        $cookieParams['secure'], $cookieParams['httponly']);
session_destroy();

header("location: ./");