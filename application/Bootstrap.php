<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{


    protected function _initRequest()
    {
        $this->bootstrap('FrontController');
        $front = $this->getResource('FrontController');
        $request = new Zend_Controller_Request_Http();
        $front->setRequest($request);
        return $request;
    }


    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');

    }

    protected function _initScript()
    {
        $this->view->headScript()
            ->prependFile( "/js/lib/jquery/jquery-v1.12.3.min.js", $type = 'text/javascript' );
    }

    protected function _initStyles() {

        $this->bootstrap('view');
        $view = $this->getResource('view');


        $basePath = ((Core_Utils::is_https() == false)?'http':'https') . '://' . $_SERVER['SERVER_NAME'] . $view->baseUrl();

        $this->view->headLink()->appendStylesheet($basePath . '/css/lib/foundation/css/foundation.css');
        $this->view->headLink()->appendStylesheet($basePath . '/css/site.css');
    }

}

