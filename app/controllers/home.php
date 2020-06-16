<?php
    namespace app\controllers;
    use app\core;
    
    /**
     *
     * @author Filip Ivanusec<fivanusec@gmail.com>
     * @version 0.1[ALPHA]
     *
    */

    class Home extends core\Controller{

        /**
         * Index: Renders home/index controller
         * @access public
         * @example home/index
         * @return void
         * @since 0.1[ALPHA]
         */

        public function index(){
            $this->View->render('home/index',[
                'title'=>'Organize!'
            ]);
        }
    }