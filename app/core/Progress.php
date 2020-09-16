<?php

namespace app\core;

class Progress
{
    protected $data = [];
    protected $completion = 0;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function checkProgress()
    {
        return ((object) $this->format());
    }
}
