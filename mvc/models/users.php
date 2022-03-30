<?php

class users extends DB{

    function isLogin($username,$password){
        $sql = "SELECT * FROM `users` where `username` = '$username' and `password` = '$password'";
        if(mysqli_num_rows($this->db_query($sql)) > 0){
            return true;
        }
        return false;
    }
}

?>