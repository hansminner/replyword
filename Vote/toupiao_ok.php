<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/27
 * Time: 14:12
 */
require 'class/DB_Handler.class.php';
require '../function.php';
//$ip = $_SERVER['REMOTE_ADDR'];
$ip = get_rand_ip();
$date = date('Y-m-d');
if (isset($_POST['submit']) and $_POST['submit'] == 'vote') {
    $sql = $db->select("ve_ip", " where ip = '$ip' and title = '" . $_POST['title'] . "'");
    $row = $db->rows($sql);
    if ($row >= 1) {
        echo "<script>alert('您已经投过票了');window.location.href='index.php';</script>";
    } else {
        $update = $db->update("ve_xvote", "vote_num = vote_num + 1", "'" . $_POST['radios'] . "'");
        $insert = $db->insert("ve_ip", "ip,title,content,date", "'$ip','" . $_POST['title'] . "','" . $_POST['radios'] . "','$date'");
        echo "<script>alert('投票成功');window.location.href='index.php';</script>";
    }
};