<?php

// DB params
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'alku_holiday');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));

// URL Root
define('URLROOT', 'http://holiday.local');

// Site Name
define('SITENAME', 'ALKÜ - İzin Takip Sistemi');

// Page List
define('PAGELIST', [
    '/',
]);


// Set timezone TR
date_default_timezone_set('Europe/Istanbul');