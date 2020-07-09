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

    protected function delete($table, array $where =[]){
       return($this->Db->delete($table,$where));
    }

    protected function update($table, $ID,array $fields, $recordID=null){
        if(!$recordID and $this->exists()){
            $recordID = $this->data()->ID;
        }
        return(!$this->Db->update($table, $recordID, $fields,$ID));
    }
    
    public function exists() {
        return(!empty($this->data));
    }
}

