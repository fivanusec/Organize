<?php
namespace app\core;

/**
 * 
 * Core View class
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @version 0.1[ALPHA]
 */

class View{
    
    /**TODO */
    protected $_script="";
    protected $_link="";
    protected $title="";

    /**
    * Gets view from extended controller
    * @access public
    * @param string $view
    * @param array $data[optional]
    * @return void
    * @since 0.1[ALPHA]
    */

    public function render($view, array $data=[]){
        $this->addData($data);
        $filename=VIEW.$view.'.php';
        if(file_exists($filename)){
            require_once $filename;
        }
    }

    /**
     * Gets string that converts into HTML enteties
     * @param string $string
     * @return string
     * @since 0.1[ALPHA]
     */
    
    public function escapeHTML($string) {
        return(htmlentities($string, HTMLENTITIES_FLAGS, HTMLENTITIES_ENCODING, HTMLENTITIES_DOUBLE_ENCODE));
    }

    /**
     * Gets path that converts into URL
     * @param string $path
     * @return string
     * @since 0.1[ALPHA]
     */
    
    public function makeURL($path = "") {
        if (is_array($path)) {
            return(APP_URL . implode("/", $path));
        }
        return(APP_URL . $path);
    }
    
    /**
     * Adds data to called view 
     * @param  array $data
     * @return void
     * @since 0.1[ALPHA]
     */

    public function addData(array $data) {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Implement in progress
     */

    public function addCSS($files){
        if(!is_array($files)){
            $files=(array)$files;
        }

        foreach($files as $file){
            if (file_exists(PUBLIC_CSS . $file)) {
                $this->_link .= '<link type="text/css" rel="stylesheet" href="' . $this->makeURL($file) . '" />' . "\n";
            }
        }
    }

    public function addJS($files){
        if(!is_array($files)){
            $files=(array)$files;
        }

        foreach($files as $file){
            if (file_exists(PUBLIC_JS . $file)) {
                $this->_script .= '<script type="text/javascript" src="' . $this->makeURL($file) . '"></script>' . "\n";
            }
        }
    }

    public function getCSS(){
        return $this->_link;
    }

    public function getJS(){
        return $this->_script;
    }
}