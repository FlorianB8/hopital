<?php 
$dayMonthYearFormatStringFr = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'dd MMMM yyyy'
);
define('REGEXP_TEXT', '^[a-zA-ZÀ-ÿ\' -]{2,64}$');
define('REGEXP_TEL', '^[0-9]{10}$');
define('REGEXP_PASSWORD', '^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$');
define('DB_NAME', 'mysql:dbname=hospitale2n;host=127.0.0.1');
define('DB_USER', 'hospital_user');
define('DB_PASSWORD', '(!JO9Rzx.70(meqF');
define('DATE_FORMAT', $dayMonthYearFormatStringFr);