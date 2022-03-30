<?php

class home extends controller
{
    public $error = [];
    function __construct()
    {
        $data = [];
        if(!isset($_SESSION['username'])){
            $this->redirectUrl('');
        }
    }
    function show()
    {
        $model = $this->getModel('students');
        $users = $model->all('students');
        $this->getView('home', [
            'users' => $users
        ]);
    }

    function add()
    {
        $mess = '';
        $model = $this->getModel('students');
        if (isset($_POST['btn-add'])) {
            if (empty($_POST['fullname'])) {
                $this->error['fullname'] = "Họ và tên không được để trống !!!";
            }

            if (empty($_POST['age'])) {
                $this->error['age'] = "Tuổi không được để trống !!!";
            } else {
                if (!preg_match("/^[0-9]{0,5}$/", $_POST['age'])) {
                    $this->error['age'] = "Tuổi vừa nhập không đúng định dạng";
                }
            }

            if (empty($_POST['phone'])) {
                $this->error['phone'] = "Số điện thoại không được để trống !!!";
            } else {
                if (!preg_match("/^[0-9]{0,10}$/", $_POST['phone'])) {
                    $this->error['phone'] = "Số Điện Thoại vừa nhập không đúng định dạng";
                }else{
                    if($model->check_unique('students','phone',$_POST['phone'])){
                        $this->error['phone'] = "Số Điện Thoại vừa nhập đã tồn tại";
                    }
                }
            }

            if (empty($_POST['address'])) {
                $this->error['address'] = "Địa chỉ không được để trống !!!";
            }

            if (empty($_POST['school'])) {
                $this->error['school'] = "Trường học không được để trống !!!";
            }

            if (empty($this->error)) {
                $model = $this->getModel('students');
                $data = [
                    'name' => $_POST['fullname'],
                    'age' => $_POST['age'],
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'school' => $_POST['school'],
                ];
                $model->db_insert('students', $data);
                $mess = "Thêm thành công";
            } else {
                $mess = "Thêm thất bại";
            }
        }
        $this->getView('add', [
            'error' => $this->error,
            'mess' => $mess
        ]);
    }

    function viewEdit($id){
        $model = $this->getModel('users');
        $user = $model->db_fetch_row("select * from students where students.id = '{$id}'");
        $this->getView('edit', [
            'users' => $user
        ]);
    }
    function edit($id)
    {
        $model = $this->getModel('students');
        $user = $model->db_fetch_row("select * from students where students.id = '{$id}'");
        if (isset($_POST['btn-update'])) {
            if (empty($_POST['fullname'])) {
                $_SESSION['error']['fullname'] = "Họ và tên không được để trống !!!";
            }

            if (empty($_POST['age'])) {
                $_SESSION['error']['age'] = "Tuổi không được để trống !!!";
            } else {
                if (!preg_match("/^[0-9]{0,5}$/", $_POST['age'])) {
                    $_SESSION['error']['age'] = "Tuổi vừa nhập không đúng định dạng";
                }
            }

            if (empty($_POST['phone'])) {
                $_SESSION['error']['phone'] = "Số điện thoại không được để trống !!!";
            } else {
                if (!preg_match("/^[0-9]{0,10}$/", $_POST['phone'])) {
                    $_SESSION['error']['phone'] = "Số Điện Thoại vừa nhập không đúng định dạng";
                }else{
                    if($model->check_phone('students','phone',$_POST['phone'])){
                        $_SESSION['error']['phone'] = "Số Điện Thoại vừa nhập đã tồn tại";
                    }
                }
            }

            if (empty($_POST['address'])) {
                $_SESSION['error']['address'] = "Địa chỉ không được để trống !!!";
            }

            if (empty($_POST['school'])) {
                $_SESSION['error']['school'] = "Trường học không được để trống !!!";
            }

            if(empty($_SESSION['error'])){
                $data = [
                    'name' => $_POST['fullname'],
                    'age' => $_POST['age'],
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'school' => $_POST['school'],
                ];
                $model->db_update('students', $data, "id='$id'");
                $_SESSION['mess'] = "Cập nhật thành công";
            }else{
                $_SESSION['mess'] = "Cập nhật thất bại";
            }
            $this->redirectUrl("home/viewEdit/$id");
            
        }
    }
    public function delete($id){
        $model = $this->getModel('students');
        $model->db_delete('students',"id='$id'");
        $this->redirectUrl("home/show");
    }
}
