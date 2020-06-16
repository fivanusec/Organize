<?php
namespace app\core;

use app\utils;

class Model{
    
    protected  $Db = null;
    protected $data=[];
    
    public function __construct(){
        $this->Db=utils\Database::getIstance();
    }
    
    public function data() {
        return($this->data);
    }
    
    protected function find($table, array $where = []) {
        $data = $this->Db->select($table, $where);
        if ($data->count()) {
            $this->data = $data->first();
        }
        return $this;
    }

    protected function findInner(array $tables=[], array $where=[]){
        $data=$this->Db->inner($tables,$where);
        if($data->count()){
            $this->data=$data->results();
        }
        return $this;
    }
    
    protected function findAll($table, array $where = []){
        $data = $this->Db->select($table, $where);
        if ($data->count()) {
            $this->data = $data->results();
        }
        return $this;
    }
    
    protected function create($table, array $fields) {
        return($this->Db->insert($table, $fields));
    }

    /*protected function update($table, array $fields, $recordID=null){
        if($table=="users"){
            if (!$recordID and $this->exists()) {
                $recordID = $this->data()->ID;
            }
            return(!$this->Db->update($table, $recordID, $fields));
        }
        if($table=="Cards"){
            if (!$recordID and $this->exists()) {
                $recordID = $this->data()->Card_ID;
            }
            return(!$this->Db->update($table, $recordID, $fields));
        }
        if($table=="Todo_List"){
            if (!$recordID and $this->exists()) {
                $recordID = $this->data()->Todo_List_ID;
            }
            return(!$this->Db->update($table, $recordID, $fields));
        }
        if($table=="Todo_Items"){
            if (!$recordID and $this->exists()) {
                $recordID = $this->data()->Todo_Items_ID;
            }
            return(!$this->Db->update($table, $recordID, $fields));
        }
    }*/
    
    public function exists() {
        return(!empty($this->data));
    }
}

