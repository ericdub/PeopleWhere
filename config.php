<?php


define('NUM_SCHEDULES',10);
define('USERNAME','xxxxx');
define('PASSWORD','xxxxx');

define('APP_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR );
define('SCHEDULES_PATH', APP_PATH . 'schedules' . DIRECTORY_SEPARATOR);


define('COOKIEFILE', APP_PATH . 'cookies.txt');
define('LOGIN_URL','http://schedule.dbrl.org/login.asp?staffaction=signin&email=');

define('SCHEDULE_FETCH_URL','http://schedule.dbrl.org/reports/schedule.asp?selectedreporttype=2&reporttype=2&selectedstaffid=142&rotationid=0&dispname=1&dispabsences=1&dispshifts=1');

// Organization IDs
//&orgid=9
$departments = array(
    9 => 'Public Services',
    7 => 'Circ-Front Desk',
    8 => 'Circ-Shelving',
   // 3 => 'CCPL',
   // 10 => 'Maintenance',
    5 => 'Outreach',
   // 11 => 'Regional Services',
    4 => 'SBCPL'
);

$librarians = array( 'Angela S', 'Betsy C', 'Brandy S', 'Hilary A', 'Hollis S', 'Judy P', 'Kirk H',
    'Lauren W', 'Nina S', 'Patricia M', 'Sally A', 'Sarah H', 'Seth S', 'Svetlana G' );
