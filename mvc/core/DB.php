<?php

class DB
{
    public $conn;
    function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'sun');
        $this->conn->set_charset("utf8");
    }

    public function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    public function all($table)
    {
        $a = [];
        $users = $this->query("SELECT * FROM $table");
        while ($row = mysqli_fetch_assoc($users)) {
            $a[] = $row;
        }
        return $a;
    }

    //Thực thi chuổi truy vấn
    public function db_query($query_string)
    {

        $result = mysqli_query($this->conn, $query_string);
        if (!$result) {
            $this->db_sql_error('Query Error', $query_string);
        }
        return $result;
    }

    // Lấy một dòng trong CSDL
    public function db_fetch_row($query_string)
    {

        $result = array();
        $mysqli_result = $this->db_query($query_string);
        $result = mysqli_fetch_assoc($mysqli_result);
        mysqli_free_result($mysqli_result);
        return $result;
    }

    //Lấy một mảng trong CSDL
    public function db_fetch_array($query_string)
    {

        $result = array();
        $mysqli_result = $this->db_query($query_string);
        while ($row = mysqli_fetch_assoc($mysqli_result)) {
            $result[] = $row;
        }
        mysqli_free_result($mysqli_result);
        return $result;
    }
    //Lấy số bản ghi
    public function db_num_rows($query_string)
    {

        $mysqli_result = $this->db_query($query_string);
        return mysqli_num_rows($mysqli_result);
    }

    // thêm vào bảng
    public function db_insert($table, $data)
    {
        // tách mảng thành chuỗi
        $fields = "(" . implode(", ", array_keys($data)) . ")";
        $values = "";
        foreach ($data as $field => $value) {
            if ($value === NULL)
                $values .= "NULL, ";
            else
                $values .= "'" . $this->escape_string($value) . "', ";
        }
        // xóa dấu phẩy và cách
        $values = substr($values, 0, -2);
        $this->db_query("
            INSERT INTO `{$table}` $fields
            VALUES($values)
        ");
        return mysqli_insert_id($this->conn);
    }

    // cập nhật bảng
    public function db_update($table, $data, $where)
    {

        $sql = "";
        foreach ($data as $field => $value) {
            if ($value === NULL)
                $sql .= "$field=NULL, ";
            else
                $sql .= "$field='" . $this->escape_string($value) . "', ";
        }
        $sql = substr($sql, 0, -2);
        $this->db_query("
            UPDATE `{$table}`
            SET $sql
            WHERE $where
   ");
        return mysqli_affected_rows($this->conn);
    }

    // xóa bảng
    public function db_delete($table, $where)
    {

        $query_string = "DELETE FROM `{$table}` WHERE $where";
        $this->db_query($query_string);
        return mysqli_affected_rows($this->conn);
    }

    public function escape_string($str)
    {

        return mysqli_real_escape_string($this->conn, $str);
    }

    // Hiển thị lỗi SQL
    public function db_sql_error($message, $query_string = "")
    {


        $sqlerror = "<table width='100%' border='1' cellpadding='0' cellspacing='0'>";
        $sqlerror .= "<tr><th colspan='2'>{$message}</th></tr>";
        $sqlerror .= ($query_string != "") ? "<tr><td nowrap> Query SQL</td><td nowrap>: " . $query_string . "</td></tr>\n" : "";
        $sqlerror .= "<tr><td nowrap> Error Number</td><td nowrap>: " . mysqli_errno($this->conn) . " " . mysqli_error($this->conn) . "</td></tr>\n";
        $sqlerror .= "<tr><td nowrap> Date</td><td nowrap>: " . date("D, F j, Y H:i:s") . "</td></tr>\n";
        $sqlerror .= "<tr><td nowrap> IP</td><td>: " . getenv("REMOTE_ADDR") . "</td></tr>\n";
        $sqlerror .= "<tr><td nowrap> Browser</td><td nowrap>: " . getenv("HTTP_USER_AGENT") . "</td></tr>\n";
        $sqlerror .= "<tr><td nowrap> Script</td><td nowrap>: " . getenv("REQUEST_URI") . "</td></tr>\n";
        $sqlerror .= "<tr><td nowrap> Referer</td><td nowrap>: " . getenv("HTTP_REFERER") . "</td></tr>\n";
        $sqlerror .= "<tr><td nowrap> PHP Version </td><td>: " . PHP_VERSION . "</td></tr>\n";
        $sqlerror .= "<tr><td nowrap> OS</td><td>: " . PHP_OS . "</td></tr>\n";
        $sqlerror .= "<tr><td nowrap> Server</td><td>: " . getenv("SERVER_SOFTWARE") . "</td></tr>\n";
        $sqlerror .= "<tr><td nowrap> Server Name</td><td>: " . getenv("SERVER_NAME") . "</td></tr>\n";
        $sqlerror .= "</table>";
        $msgbox_messages = "<meta http-equiv=\"refresh\" content=\"9999\">\n<table class='smallgrey' cellspacing=1 cellpadding=0>" . $sqlerror . "</table>";
        echo $msgbox_messages;
        exit;
    }
}
