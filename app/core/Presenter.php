<?php

namespace app\core;

/**
<<<<<<< HEAD
 * Presenter
=======
 * Core presenter
>>>>>>> master
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class Presenter
{
    /** @var data: Data that is set to format by presenter */
    protected $data = null;

    /**
     * Construct: Sets the given data to @var $data
     * @access public
     * @param mixed $data
     * @since 0.1[ALPHA]
     */

    public function __construct($data = [])
    {
        $this->data = (object) $data;
    }

    /**
     * Present: Sorts and gives data as is specified in class that extends this class
     * @access public
     * @return string
     * @since 0.1[ALPHA]
     */

    public function present()
    {
        return ((object) $this->format());
    }
}
<<<<<<< HEAD

//EOF
=======
>>>>>>> master
