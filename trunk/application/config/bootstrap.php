<?php

//Avoid double execution
if (defined('FRAMEWORK_DIR'))
    return array();

error_reporting(-1);

// Debug mode: shows detailed information about errors and exceptions when posible.
define('MAINTENANCE', 1);

// Debug mode: shows detailed information about errors and exceptions when posible.
define('DEBUG_MODE', 1);

// Production mode: if enabled, no error or exception information is sent to the browser.
define('IN_PRODUCTION', 0);

// Absolute path to application directory // add ../ for your subfolder
$application_dir = BOOTSTRAP_DIR . '/../../application';

if (is_dir($application_dir))
    define('APPLICATION_DIR', $application_dir);
else
    search('application');

$opencore_path = BOOTSTRAP_DIR . '/../../../opencorephp';

if (is_dir($opencore_path))
    define('FRAMEWORK_DIR', realpath($opencore_path));
else
    search('opencorephp');

// Add framework root directory to the include path
set_include_path(FRAMEWORK_DIR . PATH_SEPARATOR . get_include_path());

// Include core functions
require_once 'functions/import.php';
require_once 'functions/l.php';
require_once 'functions/url.php';
require_once 'functions/src.php';
require_once 'functions/fb.php';
require_once 'functions/print_r.php';
require_once 'functions/iecho.php';

// Import core classes
import('core.*');