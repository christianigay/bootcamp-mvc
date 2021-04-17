<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
defined('UPLOAD_DIR') || define('UPLOAD_DIR', getcwd() . '/storage/');
include_once('vendor/autoload.php');