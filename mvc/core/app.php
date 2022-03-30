<?php

class app{
    protected $controller ="login";
    protected $action="show";
    protected $param=[];
    function __construct()
    {   
        
        
        // echo $_GET['url'];
        !empty($this->getUrl())? $arr = $this->getUrl():$arr = ['login','show'];
                   
            // Xử lý controller
            if(file_exists("./mvc/controllers/$arr[0].php")){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
            require_once "./mvc/controllers/$this->controller.php";

            // xử lý Action
            if(isset($arr[1])){
                if(method_exists($this->controller,$arr[1])){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }

            // Xử lý Param
            !empty($arr)?$this->param=$arr:$this->param = [];
            
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller,$this->action],$this->param);
    }

    function getUrl(){
        if(isset($_GET['url'])){        
            return $arr = explode("/",trim($_GET['url']));
        }
        return [];

    }
}

?>