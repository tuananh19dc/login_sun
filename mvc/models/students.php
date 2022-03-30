<?php

class students extends DB{

    function check_unique($table,$fill,$value){
        $sql = "select * from $table where $fill = '$value'";
        if(mysqli_num_rows(mysqli_query($this->conn,$sql)) > 0){
            return true;
        }
        return false;
    }
    function check_phone($table,$fill,$value){
        $sql = "select * from $table where $fill = '$value'";
        if(mysqli_num_rows(mysqli_query($this->conn,$sql)) > 1){
            return true;
        }
        return false;
    }
}



?>