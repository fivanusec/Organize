<?php

namespace app\utils;

class Response
{
    private $_data = [];

    public function setData($data)
    {
        if (!is_array($data)) {
            $data = (array) $data;
        }
        $this->_data = array_merge($this->_data, $data);
        return $this;
    }

    public function setError()
    {
        $this->_data["success"] = false;
        return $this;
    }

    public function setStatusCode($status)
    {
        $statuses = [
            200 => "OK",
            401 => "Unauthorized",
            403 => "Forbidden",
            400 => "Bad Request",
            404 => "Not Found",
            405 => "Method Not Allowed",
            500 => "Internal Server Error"
        ];
        if (array_key_exists($status, $statuses)) {
            header("HTTP/1.1 {$status} " . $statuses[$status]);
        }
        return $this;
    }

    public function setSuccess()
    {
        $this->_data["success"] = true;
        return $this;
    }

    public function outputJSON()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
        die(json_encode($this->_data));
    }

    public static function error($status, $data = [])
    {
        $Response = new Response();
        $Response->setError();
        $Response->setData($data);
        $Response->setStatusCode($status);
        $Response->outputJSON();
    }

    public static function success($data = [])
    {
        $Response = new Response();
        $Response->setSuccess();
        $Response->setData($data);
        $Response->setStatusCode(200);
        $Response->outputJSON();
    }
}
