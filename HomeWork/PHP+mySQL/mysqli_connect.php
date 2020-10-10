<?php

define('DB_USER', 'u330522094_calejohn');
define('DB_PASSWORD', 'password1');
define('DB_HOST', 'localhost');
define('DB_NAME', 'u330522094_webscripting');

$conn = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('could not connect to mysql: '.
mysqli_connect_error() );

?>