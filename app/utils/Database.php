<?php
namespace app\utils;

use PDO;
use PDOException;

class Database
{
    protected static $Database=null;
    private $_PDO=null;
    private $sql=null;
    private $error=false;
    private $count=0;

    public function __construct()
    {
        try
        {
            $host="localhost";
            $name="Organize";
            $username="root";
            $password="";
            $this->_PDO=new PDO("mysql:host={$host};dbname={$name}", $username, $password);
            $this->_PDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public static function getIstance()
    {
        if(!isset(self::$Database))
        {
            self::$Database= new Database;
        }
        return (self::$Database);
    }

    public function actionInner($action, array $tables=[], array $where=[])
    {
        if(count($where)==6)
        {
            $operator=$where[1];
            $operator1=$where[4];
            $operators = ["=", ">", "<", ">=", "<="];
            if(in_array($operator, $operators))
            {
                $field1=$where[0];
                $filed2=$where[3];
                $field3=$where[5];
                $value=$where[2];
                $params =[":value"=>$value];
                if(!$this->query("{$action} FROM {$tables[0]} INNER JOIN {$tables[1]} ON {$filed2} {$operator1} {$field3} WHERE {$tables[0]}.{$field1} {$operator} :value",$params)->error())
                {
                    return $this;
                }
            }
            return false;
        }
    }

    public function action($action, $table, array $where=[])
    {
        if(count($where)===3)
        {
            $operator = $where[1];
            $operators = ["=", ">", "<", ">=", "<="];
            if(in_array($operator, $operators))
            {
                $field=$where[0];
                $value = $where[2];
                $params = [":value" => $value];
                if (!$this->query("{$action} FROM {$table} WHERE {$field} {$operator} :value", $params)->error()) 
                {
                    return $this;
                }
            }
        }
        else
        {
            if (!$this->query("{$action} FROM {$table}")->error()) 
            {
                return $this;
            }
        }
        return false;
    }

    public function query($sql, array $params = []) 
    {
        //echo $sql; //mostly testing output from queries
        $this->_count = 0;
        $this->_error = false;
        $this->_results = [];
       if (($this->_query = $this->_PDO->prepare($sql))) 
       {
            foreach ($params as $key => $value) 
            {
                $this->_query->bindValue($key, $value);
            }
            if ($this->_query->execute()) 
            {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } 
            else 
            {
                $this->_error = true;
                //die(print_r($this->_query->errorInfo()));
            }
        }
        return $this;
    }

    public function insert($table, array $fields) 
    {
        if (count($fields)) 
        {
            $params = [];
            foreach ($fields as $key => $value) 
            {
                $params[":{$key}"] = $value;
            }
            $columns = implode(" , ", array_keys($fields));
            $values = implode(", ", array_keys($params));
            if (!$this->query("INSERT INTO {$table} ({$columns}) VALUES({$values})", $params)->error()) 
            {
                return($this->_PDO->lastInsertId());
            }
        }
        return false;
    }

    public function update($table, $id, array $fields, $fieldName)
    {
        if (count($fields)) 
        {
            $x = 1;
            $set = "";
            $params = [];
            foreach ($fields as $key => $value) 
            {
                $params[":{$key}"] = $value;
                $set .= "`{$key}` = :$key";
                if ($x < count($fields)) 
                {
                    $set .= ", ";
                }
                $x ++;
            }
            if (!$this->query("UPDATE {$table} SET {$set} WHERE {$fieldName} = {$id}", $params)->error()) 
            {
                return true;
            }
            return false;
        }
    }

    public function delete($table,array $where)
    {
        return($this->action('DELETE',$table,$where));
    }

    public function select($table, array $where = []) 
    {
        return($this->action('SELECT *', $table, $where));
    }

    public function inner(array $table=[], $where=[])
    {
        return($this->actionInner('SELECT *', $table, $where));
    }

    public function results($key = null) 
    {
        return(isset($key) ? $this->_results[$key] : $this->_results);
    }

    public function error() 
    {
        return($this->_error);
    }

    public function count() 
    {
        return($this->_count);
    }

    public function first() 
    {
        return($this->results(0));
    }
}