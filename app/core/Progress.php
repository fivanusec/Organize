<?php

namespace app\core;

/**
 * Progress: Progress system 
 * 
 * 
 * Author: Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class Progress
{
    /** @var data: gets data from the loop  */
    protected $data = [];

    /** @var completion: sets the completed data */
    protected $completion = 0;

    /**
     * Construct: Recives the data from controller and sets into @var data
     * @access public
     * @param mixed $data
     * @since 0.1[ALPHA]
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * CheckProgress: Calls and returns format function in folder progress
     * @access public
     * @param mixed $data
     * @since 0.1[ALPHA]
     */
    
    public function checkProgress()
    {
        return ((object) $this->format());
    }
}

//EOF