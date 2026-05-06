<?php

date_default_timezone_set('Asia/Ho_Chi_Minh'); // Set Time Zone required tu PHP 5
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/ProcessFactory.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();
