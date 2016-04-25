<?php
/**
 * Created by PhpStorm.
 * User: Zhaky
 * Date: 17/03/2014
 * Time: 03:05
 */

class Application_Model_Service {

    private $serviceId;
    private $serviceTitle;
    private $tServices;

    public function setServiceTitle($serviceTitle) { $this->serviceTitle = $serviceTitle; }
    public function getServiceTitle() { return $this->serviceTitle; }


    public function __construct($serviceId = null) {
        $this->tServices = new Application_Model_DbTable_ServicesTable();

        if ($serviceId) {
            $this->load($serviceId);
        }
    }

    public function load($serviceId) {

        $select = $this->tServices
            ->select('*')->where('ServiceId = ?', $serviceId);

        $fields = $this->tServices->fetchRow($select)->toArray();
        foreach($fields as $field=>$value){

            if (property_exists('Application_Model_Service', $field)) {
                $this->$field = $value;
            }
        }
    }

    public function save() {

        $serviceArray = array("ServiceTitle"    =>  $this->serviceTitle);
        if(!$this->serviceId) {
            $this->tServices->insert($serviceArray);

            $this->tServices->getAdapter()->lastInsertId();
        } else {
            $this->tServices->update($serviceArray,
              array( 'ServiceId = ?'          => $this->serviceId));
        }

    }

   public function getServices() {

       $sql = $this->tServices->select();

       $services = $this->tServices->fetchAll($sql)->toArray();

       return $services;

   }


}