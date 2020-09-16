<?php

namespace app\core;

use app\utils;

/**
 * Core model
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class Model
{

    /** @var Db: Set to be instance of utils\Database class */
    protected  $Db = null;

    /** @var data: Set to be data that is pulled from database */
    protected $data = [];

    /**
     * Construct: Calls and sets $Db to new instance of the utils\Database class
     * @access public
     * @since 0.1[ALPHA]
     */

    public function __construct()
    {
        $this->Db = utils\Database::getIstance();
    }

    /**
     * Data: Returns the data pulled from database
     * @access public
     * @return array
     * @since 0.1[ALPHA]
     */

    public function data()
    {
        return ($this->data);
    }

    /**
     * Upload: Gets the picture data and uploads it onto server
     * @access public
     * @param mixed $targetFile
     * @param mixed $ID
     * @return string|boolean
     * @since 0.1[ALPHA]
     */

    public function upload($targetFile, $ID)
    {
        $upload = utils\PictrueHandler::upload($targetFile, $ID);
        return $upload;
    }

    /**
     * Find: Retrieves and stores a specified record from the database into a 
     * class property. Returns true if the record was found, or false if not.
     * @access protected
     * @param string $table
     * @param array $where
     * @return \App\Core\Model
     * @since 0.1[ALPHA]
     */

    protected function find($table, array $where = [])
    {
        $data = $this->Db->select($table, $where);
        if ($data->count()) {
            $this->data = $data->first();
        }
        return $this;
    }

    /**
     * FindInner: Retrieves and stores a specified record from the database into a 
     * class property. Returns true if the record was found, or false if not.
     * 
     * NOTE: This method connects into database to run queries that contains INNER JOIN
     * 
     * @access protected
     * @param string $table
     * @param array $where
     * @return \App\Core\Model
     * @since 0.1[ALPHA]
     */

    protected function findInner(array $tables = [], array $where = [])
    {
        $data = $this->Db->inner($tables, $where);
        if ($data->count()) {
            $this->data = $data->results();
        }
        return $this;
    }

    /**
     * FindAll: Retrieves and stores a specified record from the database into a 
     * class property. Returns true if the record was found, or false if not.
     * 
     * NOTE: This method connects into database to retrive all data from query
     * 
     * @access protected
     * @param string $table
     * @param array $where
     * @return \App\Core\Model
     * @since 0.1[ALPHA]
     */

    protected function findAll($table, array $where = [])
    {
        $data = $this->Db->select($table, $where);
        if ($data->count()) {
            $this->data = $data->results();
        }
        return $this;
    }

    /**
     * Create: Inserts a new record into the database, returning the unique
     * record ID if successful, otherwise returns false.
     * @access protected
     * @param string $table
     * @param array $fields
     * @return string|boolean
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    protected function create($table, array $fields)
    {
        return ($this->Db->insert($table, $fields));
    }

    /**
     * Delete: Retrives and deletes the record from database,
     * or false if not
     * @access protected
     * @param string $table
     * @param array $fields
     * @return string|boolean
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    protected function delete($table, array $where = [])
    {
        return ($this->Db->delete($table, $where));
    }

    /**
     * Update: Updates a specified record in the database.
     * @access protected
     * @param string $table
     * @param array $fields
     * @param integer $recordID [optional]
     * @return void
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    protected function update($table, $ID, array $fields, $recordID = null)
    {
        if (!$recordID and $this->exists()) {
            $recordID = $this->data()->ID;
        }
        return (!$this->Db->update($table, $recordID, $fields, $ID));
    }

    /**
     * Exists: Returns true if the record data has been pulled from the database
     * and stored in a class property, or false if not.
     * @access public
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function exists()
    {
        return (!empty($this->data));
    }
}
