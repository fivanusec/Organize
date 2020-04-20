<?php
namespace app\controllers;

use app\core;
use app\utils;
use app\models;
use app\prezenter;

class User extends core\Controller{
    
    public function createCard(string $userID=""){
        if(!models\CreateCard::_create($userID)){
            utils\Redirect::to("/public/user/dash/{$userID}"); 
        }
    }

    public function createTodo(string $userID="",string $TodoID=""){
        if(!models\CreateTodo::_create($TodoID)){
            utils\Redirect::to("/public/user/todo/{$userID}/{$TodoID}");
        }
    }

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

        $this->View->render('user/todo',[
            'title'=>'Todo',
            'user'=>(new prezenter\User($User->data()))->present(),
            'todoID'=>$TodoID,
            'Todo_List'=>($todo)
        ]);
    }
    
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
        
        $this->View->render('user/dash',[
            'title'=>'Dash',
            'user'=>(new prezenter\User($User->data()))->present(),
            'cards'=>($cards)
        ]);
    }

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

        $this->View->render('user/todo_list',[
            'title'=>'Todo List',
            'user'=>(new prezenter\User($User->data()))->present()
        ]);
    }
}

