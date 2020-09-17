<?php

namespace app\core;

<<<<<<< HEAD
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
=======
class Progress
{
    protected $data = [];
    protected $completion = 0;

>>>>>>> master
    public function __construct($data)
    {
        $this->data = $data;
    }

<<<<<<< HEAD
    /**
     * CheckProgress: Calls and returns format function in folder progress
     * @access public
     * @param mixed $data
     * @since 0.1[ALPHA]
     */
    
=======
>>>>>>> master
    public function checkProgress()
    {
        return ((object) $this->format());
    }
}
<<<<<<< HEAD

//EOF
=======
>>>>>>> master
