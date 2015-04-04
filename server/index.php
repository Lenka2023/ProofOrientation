<?php
// include library for Mersenne Twister tools
require_once "mersenne_twister.php";

use mersenne_twister\twister;

#--------------------------------------------
// initialize random function by currant time
mt_srand(time());
// initialize currant session ID
$id = '';
// create and initialize new object for session ID counting
$twister = new twister(mt_rand());
// create random session ID by 4 random hexadecimal connection
for($i = 0; $i < 4; $i++)
$id = $id.dechex($twister->int32());
// setup session ID
session_id($id);

session_start();

// change the following paths if necessary
$yii='/opt/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
