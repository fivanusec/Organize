<?php
namespace app\utils;

class React{
    public static function danger(){
        return '<div class="row justify-content-center fixed-top" style="margin-top:70px;">
                <div class="col-md-6 text-center">
                <div class="alert alert-danger" id="danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>There was an error!</strong>
                </div>
                </div>
                </div>';
    }
    
    public static function successReg(){
            return '
                <div class="row justify-content-center fixed-top" style="margin-top:70px;">
                <div class="col-md-6 text-center">
                <div class="alert alert-success" id="success" role="alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Registration was successfull!</strong>
                </div>
                </div>
                </div>';
        
    }
    
    public static function successCard(){
        return '
                <div class="row justify-content-center fixed-top" style="margin-top:70px;">
                <div class="col-md-6 text-center">
                <div class="alert alert-success" id="success" role="alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Registration was successfull!</strong>
                </div>
                </div>
                </div>';
    }
}

