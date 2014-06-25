<?php

//OpenCorePHP 2.0 Alpha / trunk
// Main core initialization

$domain = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '');

$config_folder = dirname(__FILE__) . '/../application/config';

$bootstrap_dinamic = $config_folder . '/' . $domain . '/bootstrap.php';

if (file_exists($bootstrap_dinamic)) {
    define('BOOTSTRAP_DIR', realpath($config_folder . '/' . $domain));
    require_once($bootstrap_dinamic);
} else {
    define('BOOTSTRAP_DIR', realpath($config_folder));
    require_once($config_folder . '/bootstrap.php');
}

function search($neddle, $dir = BOOTSTRAP_DIR) {

    try {


        $back = opendir($dir);

        while ($d = readdir($back)) {

            if ($d !== '.' && $d !== '..') {
                if ($d == $neddle) {
                    $fm = $dir . '/' . $d;
                    throw new Exception('The valid path to ' . $neddle . ' is "' . substr($fm, strlen(BOOTSTRAP_DIR), strlen($fm)) . '". Fix it!');
                }
            }
        }
        closedir($back);
        search($neddle, $dir . '/..');
    } catch (Exception $exc) {
        die($exc->getMessage());
    }
}

// Init config
$config = Config::getInstance();
$config->init();

// Custom setup
import('log.Logger', 'gui.*', 'db.BaseSQL', 'db.BaseSQLModel', 'util.*');
ob_start();
session_start();
Lang::setupGettext();

if (MAINTENANCE) {

    if ($_SERVER['REMOTE_ADDR'] !== $config->get('core.allowed_ip') && $_GET['access'] !== $config->get('core.access_parameter'))
        die('En mantenimiento...');
}

// Initialize router
$router = Router::getInstance();
$router->dispatch();