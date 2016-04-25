<?php
/**
 * Created by PhpStorm.
 * User: Snezhana
 * Date: 25/04/16
 * Time: 09:48
 */

ini_set('include_path', '/../../library/Zend_Framework/library/');

define('DONT_RUN_APP', true);

require_once (realpath(dirname(__FILE__)). '/../../../public/index.php');
$application->bootstrap('db');

class Application_Model_QueueItemTest extends PHPUnit_Framework_TestCase {

    public function testFunction()
    {

        $mQueueItem = new Application_Model_QueueItem();

        $clientName = $mQueueItem->getCustomerName(1);

        $this->assertEquals($clientName, "Miss S Tsaneva");


    }



}