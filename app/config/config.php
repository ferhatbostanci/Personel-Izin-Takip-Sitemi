<?php

// DB params
define('DB_HOST', '134.209.239.61');
define('DB_USER', 'root');
define('DB_PASS', 'ALKUHoliday07.');
define('DB_NAME', 'HolidayDB');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));

// URL Root
define('URLROOT', 'http://holiday.local');

// Site Name
define('SITENAME', 'ALKÜ Personel İzin Takip Sistemi');

// Page List
define('PAGELIST', [
    '/',
    'users/login',
    'users/register',
]);


// Set timezone TR
date_default_timezone_set('Europe/Istanbul');