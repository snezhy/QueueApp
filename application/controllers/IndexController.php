<?php

class IndexController extends Zend_Controller_Param
{

    private $layout;
    private $mService;
    private $mQueueItem;

    public function init()
    {
        $this->layout = Zend_Layout::getMvcInstance();
        $this->mService = new Application_Model_Service();
        $this->mQueueItem = new Application_Model_QueueItem();

    }

    public function indexAction()
    {
        $services = $this->mService->getServices();
        $queue = $this->mQueueItem->getQueue();

        $this->view->services = $services;
        $this->view->queueItmes = $queue;


    }

    public function saveQueueAction($service, $customerType, $title, $firstName,
                                    $lastName, $organisationName) {

        $mQueueItem = new Application_Model_QueueItem();
        $mQueueItem->setServiceId($service);

        switch ($customerType) {
            case "citizen":
                $mQueueItem->setName($title . ' ' . $firstName . ' ' . $lastName);
                break;
            case "organisation":
                $mQueueItem->setName($organisationName);
                break;
            default:
                $mQueueItem->setName("Anonymous");
        }

        $mQueueItem->setType($customerType);
        $mQueueItem->save();

        $this->_helper->viewRenderer->setNoRender(true);

        $this->_helper->redirector('index', 'index');

    }




}







