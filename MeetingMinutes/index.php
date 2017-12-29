<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/25
 * Time: 9:43
 */
include_once 'conn/conn.php';
session_start();
if (isset($_SESSION['name']) and isset($_SESSION['id']) and isset($_SESSION['rights'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=manager.php\" />";
}else{
    echo "<meta http-equiv=\"refresh\" content=\"0;url=login\chklogin.php\" />";
}

