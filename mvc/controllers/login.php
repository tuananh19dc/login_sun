<?php

class login extends controller
{
    public $error=[],$username,$password;
    public function show()
    {
        $model = $this->getModel('users');
        if (isset($_POST['login'])) {
            if (empty($_POST['username'])) {
                $this->error['username'] = "Username không được để trống !!!";
            } else {
                if (!preg_match("/^[A-Za-z0-9_\.]{6,32}$/", $_POST['username'])) {
                    $this->error['username'] = "Username vừa nhập không đúng định dạng";
                } else {
                    $this->username = $_POST['username'];
                }
            }

            if (empty($_POST['password'])) {
                $this->error['password'] = "Password không được để trống !!!";
            } else {
                if (!preg_match("/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/", $_POST['password'])) {
                    $this->error['password'] = "Password vừa nhập không đúng định dạng";
                } else {
                    $this->password = $_POST['password'];
                }
            }

            if(empty($this->error)) {
                if($model->isLogin($this->username,$this->password)){
                    $_SESSION['username'] = $this->username;
                    if(isset($_POST['checkbox'])){
                        setcookie('username', $this->username, time() + 1000000000);
                        setcookie('password', $this->password, time() + 1000000000);
                    }
                    header("location: home");
                }          
            }
        }
        
        $this->getView('login',[
            "error" => $this->error,
            "username" => $this->username,
            "password" => $this->password,
        ]);
    }

    function logout(){
        unset($_SESSION['username']);
        $this->redirectUrl('login');
    }

}
