<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', '1');

// Define path to application directory
defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define path to base url
defined('BASE_URL')
|| define('BASE_URL', realpath(dirname(__FILE__)));


// Define application environment
defined('APPLICATION_ENV')
|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    realpath(APPLICATION_PATH. '/utils'),
    realpath(APPLICATION_PATH . '/../library/Zend_Framework/library/'),
    get_include_path(),
)));

//set_include_path(get_include_path() . realpath(APPLICATION_PATH . '/../library/Zend_Framework/library/Zend'));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'


);
$application->bootstrap()
    ->run();
