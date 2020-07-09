<?php
namespace app\controllers;

use app\core;
use app\utils;
use app\models;
use app\prezenter;

    /**
     *
     * @author Filip Ivanusec<fivanusec@gmail.com>
     * @version 0.1[ALPHA]
     *
    */

class User extends core\Controller{

    /**
     * deletecard: Deletes card and all of it's content
     * @access public
     * @return void
     * @since 0.1[ALPHA]
     */

    public function deletecard($Card, $userID=""){
        if(models\Cards::getDelete($Card)){
            utils\Redirect::to("/public/user/dash/{$userID}");
        }
    }

    public function updateCard($Card, $userID){
        if(models\UpdateCard::_update($Card)){
            utils\Redirect::to("/public/user/dash/{$userID}");
        }
    }

    public function updateTodo($TodoListID, $TodoID,$userID){
        if(models\UpdateTodo::_update($TodoListID)){
            utils\Redirect::to("/public/user/todo/{$userID}/{$TodoID}");
        }
    }

    public function deleteTodo($Todo_ID, $userID, $TodoID){
        if(models\Todo::getDelete($Todo_ID)){
            utils\Redirect::to("/public/user/todo/{$userID}/{$TodoID}");
        }
    }
    
    /**
     * createCard: Sends user ID to create card
     * @access public
     * @return void
     * @since 0.1[ALPHA]
    */

    public function createCard(string $userID=""){
        if(!models\CreateCard::_create($userID)){
            utils\Redirect::to("/public/user/dash/{$userID}"); 
        }
    }

    /**
     * createTodo: Sends TODO ID to create TODO card
     *  @access public
     *  @return void
     *  @since 0.1[ALPHA]
    */

    public function createTodo(string $userID="",string $TodoID=""){
        if(!models\CreateTodo::_create($TodoID)){
            utils\Redirect::to("/public/user/todo/{$userID}/{$TodoID}");
        }
    }

    /**
     * Todo: Renders TODO View
     * @example user/todo
     * @access public
     * @return void
     * @since 0.1[ALPHA]
     * 
    */

    public function todo(string $user="",string $TodoID=""){
        utils\Auth::checkAuth();

        if($user){
            $userSession="USER";
            if(utils\Session::sessionExists($userSession)){
                $user=utils\Session::get($userSession);
            }
        }

        if(!$User=models\User::getInstance($user)){
            echo "Error";
        }

        if($TodoID){
            if($Todo=models\Todo::getInstance($TodoID)){
                $todo=$Todo->data();
            }else{
                $todo=[];
            }
        }

        $this->View->addCSS("css/todo.css");
        $this->View->render('user/todo',[
            'title'=>'Todo',
            'user'=>(new prezenter\User($User->data()))->present(),
            'todoID'=>$TodoID,
            'Todo_List'=>($todo)
        ]);
    }
    
    /**
     * Dash: Renders DASH View
     * @example user/dash
     * @access public
     * @return void
     * @since 0.1[ALPHA]
     * 
    */

    public function dash(string $user=""){
        
        utils\Auth::checkAuth();
        
        if($user){
            $userSession="USER";
            if(utils\Session::sessionExists($userSession)){
                $user=utils\Session::get($userSession);
            }
        }

        if(!$User=models\User::getInstance($user)){
            echo "Error";
        }
        
        if($Card=models\Cards::getInstance($user)){
            $cards=$Card->data();
        }else{
            $cards =[];
        }

        $this->View->addJS("JS/organizeDash.js");
        $this->View->addCSS("css/organizeDash.css");
        $this->View->render('user/dash',[
            'title'=>"Dash",
            'user'=>(new prezenter\User($User->data()))->present(),
            'cards'=>($cards)
        ]);
    }

    /**
     * TodoList: Renders Todo list view
     * @example user/todo
     * @access public
     * @return void
     * @since 0.1[ALPHA]
     * 
    */

    public function todoList(string $user="", string $TodoID="", string $todoListID=""){

        utils\Auth::checkAuth();

        if($user){
            $userSession="USER";
            if(utils\Session::sessionExists($userSession)){
                $user=utils\Session::get($userSession);
            }
        }

        if(!$User=models\User::getInstance($user)){
            echo "Error";
        }

        $this->View->addCSS("css/todoList.css");
        $this->View->render('user/todo_list',[
            'title'=>'Todo List',
            'user'=>(new prezenter\User($User->data()))->present()
        ]);
    }

    /**
     * Edituser: Render edit user view
     * @example user/edituser
     * @access public
     * @return void
     * @since 0.1[ALPHA]
     * 
    */

    public function editUser(string $user=""){
        utils\Auth::checkAuth();

        if($user){
            $userSession="USER";
            if(utils\Session::sessionExists($userSession)){
                $user=utils\Session::get($userSession);
            }
        }

        if(!$User=models\User::getInstance($user)){
            echo "Error";
        }

        $this->View->addJS("JS/edituser.js");
        $this->View->addCSS("css/editUser.css");
        $this->View->render('user/editUser',[
            'title'=>'Edit user',
            'user'=>(new prezenter\User($User->data()))->present()
        ]);
    }

    /**
     * Updateuser: Updates user in Database
     * @example user/updateuser
     * @access public
     * @return void
     * @since 0.1[ALPHA]
     * 
    */

    public function updateuser(string $user){
        if(!models\UpdateUser::updateuser($user)){
            utils\Redirect::to("/public/user/editUser/{$user}");
        }
        utils\Redirect::to("/public/user/editUser/{$user}");
    }
}