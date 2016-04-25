<?php
/**
 * Created by PhpStorm.
 * User: Snezhana
 * Date: 21/04/2016
 * Time: 22:04
 */

class Application_Model_QueueItem {

    private $queueItemId;
    private $type;
    private $name;
    private $serviceId;
    private $timestamp;
    private $tQueue;
    private $db;

    public function getQueueItemId() { return $this->queueItemId; }
    public function setType($type) { $this->type = $type; }
    public function getType() { return $this->type; }
    public function setName($name) { $this->name = $name; }
    public function getName() { return $this->name; }
    public function setServiceId($serviceId) { $this->serviceId = $serviceId; }
    public function getServiceId() { return $this->serviceId; }
    public function getTimestamp() { return $this->timestamp; }



    public function __construct($queueItemId = null) {
        $this->tQueue = new Application_Model_DbTable_QueueTable();
        $this->db = $this->tQueue->getAdapter();

        if ($queueItemId) {
            $this->load($queueItemId);
        }
    }

    public function load($queueItemId) {

        $select = $this->tQueue
            ->select('*')->where('QueueItemId = ?', $queueItemId);

        $fields = $this->tQueue->fetchRow($select)->toArray();
        foreach($fields as $field=>$value){
            /* $field = explode("_", $field);
             $field = $field[0].$field[1];*/

            if (property_exists('Application_Model_QueueItem', $field)) {
                $this->$field = $value;
            }
        }
    }

    public function save() {

        $queueItemArray = array('Type'          =>  $this->type,
                                'Name'          =>  $this->name,
                                'ServiceId'     =>  $this->serviceId);

        if(!$this->queueItemId) {
            $this->tQueue->insert($queueItemArray);

            $this->tQueue->getAdapter()->lastInsertId();
        } else {
            $this->tQueue->update($queueItemArray,
                array( 'QueueItemId = ?'     => $this->queueItemId));
        }

    }

    public function getAllQueueItems() {

        $sql = $this->tQueue->select()->order('Timestamp DESC');
        $queue = $this->tQueue->fetchAll($sql)->toArray();

        return $queue;
    }

    public function getCustomerName($queueId) {

        $sql = $this->tQueue->select()->where('QueueItemId = ?', $queueId);

        $customer = $this->tQueue->fetchRow($sql)->toArray();

        return $customer['Name'];

    }

    public function getQueue() {

        $sql = $this->db->select()
            ->from('queue')
            ->joinLeft('services', 'queue.ServiceId = services.ServiceId');

        $queue = $this->db->fetchAll($sql);
        return $queue;
    }


} 