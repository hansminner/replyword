<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/27
 * Time: 15:10
 */

namespace Vote;

use mysqli;

class DB_Handler {
    private $host;
    private $root;
    private $pwd;
    private $database;
    private $conn;

    function __construct($host, $root, $pwd, $database) {
        $this->host = $host;
        $this->root = $root;
        $this->pwd = $pwd;
        $this->database = $database;
        $this->conn = mysqli_connect($this->host, $this->root, $this->pwd); //$link
        mysqli_select_db($this->conn, $this->database);
        mysqli_query($this->conn, "set names UTF8");
    }

    /**
     * 连接数据库
     */
    //    function connect() {
    //        $this->conn = mysqli_connect($this->host, $this->root, $this->pwd);
    //        mysqli_select_db($this->conn, $this->database);
    //        mysqli_query($this->conn, "set name UTF-8");
    //    }

    function query($sql) {
        return mysqli_query($this->conn, $sql);
    }

    function arr_ay($result) {
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    function rows($result) {
        return mysqli_num_rows($result);
    }

    function dbclose() {
        mysqli_close($this->conn);
    }

    /**
     * 查询
     * @param $table
     * @param $where
     * @return bool|\mysqli_result
     */
    function select($table, $where) {
        return $this->query("select * from $table $where");
    }

    /**
     * 查询
     * @param $table
     * @param $where
     * @return bool|\mysqli_result
     */
    function insert($table, $fileds, $values) {
        return $this->query("insert into db_diary.$table($fileds)VALUES ($values)");
    }

    /**
     * 查询
     * @param $table
     * @param $where
     * @return bool|\mysqli_result
     */
    function del($table, $where) {
        return $this->query("delete from $table WHERE $where");
    }

    /**
     * 查询
     * @param $table
     * @param $where
     * @return bool|\mysqli_result
     */
    function update($table, $fields, $where) {
        return $this->query("update db_diary.$table set $fields WHERE $table.id = " . $where);
    }
}

//在这里实例化就不用在每一个php页面填写实例化了/ tp框架中的应该是因为直接读取配置,一个项目中数据库通用
$db = new DB_Handler('localhost', 'root', '', 'db_diary');