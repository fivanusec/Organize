<?php

namespace app\core;

/**
 * 
 * View
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @version 0.1[ALPHA]
 */

class View
{

    /** @var string for HTML <script> tag for loading external scripts */
    protected $_script = "";

    /** @var string for HTML <link> tag for loading external stylesheets */
    protected $_link = "";

    /** @var string the title of the page */
    protected $title = "";

    /** @var string for HTML <img> tag for loading profile image */
    protected $img = "";

    /**
     * Gets view from extended controller for rendering main app
     * @access public
     * @param string $view
     * @param array $data[optional]
     * @return void
     * @since 0.1[ALPHA]
     */

    public function render($view, array $data = [])
    {
        $this->addData($data);
        $this->getFile(HEADER_MAIN);
        $this->getFile($view);
        $this->getFile(FOOTER_MAIN);
    }

    /**
     * Gets view from extended controller for rendering without headers
     * @access public
     * @param string $view
     * @param array $data[optional]
     * @return void
     * @since 0.1[ALPHA]
     */

    public function renderWithoutHeader($view, array $data = [])
    {
        $this->addData($data);
        $this->getFile($view);
    }

    /**
     * Gets view from extended controller for rendering home page
     * @access public
     * @param string $view
     * @param array $data[optional]
     * @return void
     * @since 0.1[ALPHA]
     */

    public function renderMain($view, array $data = [])
    {
        $this->addData($data);
        $this->getFile(HEADER_FOR_MAIN);
        $this->getFile($view);
        $this->getFile(FOOTER_FOR_MAIN);
    }

    /**
     * Gets string that converts into HTML enteties
     * @param string $string
     * @return string
     * @since 0.1[ALPHA]
     */

    public function escapeHTML($string)
    {
        return (htmlentities($string, HTMLENTITIES_FLAGS, HTMLENTITIES_ENCODING, HTMLENTITIES_DOUBLE_ENCODE));
    }

    /**
     * Gets path that converts into URL
     * @param string $path
     * @return string
     * @since 0.1[ALPHA]
     */

    public function makeURL($path = "")
    {
        if (is_array($path)) {
            return (APP_URL . implode("/", $path));
        }
        return (APP_URL . $path);
    }

    /**
     * Adds data to called view 
     * @param  array $data
     * @return void
     * @since 0.1[ALPHA]
     */

    public function addData(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Adds CSS to called view in form of <link> tags
     * @param  mixed $_link
     * @return void
     * @since 0.1[ALPHA]
     */

    public function addCSS($files)
    {
        if (!is_array($files)) {
            $files = (array)$files;
        }

        foreach ($files as $file) {
            if (file_exists(PUBLIC_ROOT . $file)) {
                $this->_link .= '<link type="text/css" rel="stylesheet" href="' . $this->makeURL($file) . '" />' . "\n";
            }
        }
    }

    /**
     * Adds JS to called view in form of <script> tag
     * @param  mixed $_script
     * @return void
     * @since 0.1[ALPHA]
     */

    public function addJS($files)
    {
        if (!is_array($files)) {
            $files = (array)$files;
        }

        foreach ($files as $file) {
            if (file_exists(PUBLIC_ROOT . $file)) {
                $this->_script .= '<script type="text/javascript" src="' . $this->makeURL($file) . '"></script>' . "\n";
            }
        }
    }

    /**
     * Adds img to called view in form of <img> tag
     * @param mixed $img
     * @return void
     * @since 0.1[ALPHA]
     */

    public function addIMG($files, $class = "profilePic")
    {
        if (!is_array($files)) {
            $files = (array)$files;
        }

        foreach ($files as $file) {
            if (file_exists(PUBLIC_ROOT . $file)) {
                $this->img .= '<img class="' . $class . '" id="profilePicture" alt="avatar" src="' . $this->makeURL($file) . '"/>';
            }
        }
    }

    /**
     * Return <link> tags that loads in the view
     * @access public
     * @return string
     */

    public function getCSS()
    {
        return $this->_link;
    }

    /**
     * Return <script> tags that loads in the view
     * @access public
     * @return string
     */

    public function getJS()
    {
        return $this->_script;
    }

    /**
     * Return <img> tag that loads profile picture
     * @access public
     * @return string
     */

    public function getIMG()
    {
        return $this->img;
    }

    /**
     * Requires in a view file if it exists.
     * @access public
     * @param string $filepath
     * @return void
     */

    public function getFile($file)
    {
        $filename = VIEW . $file . '.php';
        if (file_exists($filename)) {
            require $filename;
        }
    }
}

//EOF