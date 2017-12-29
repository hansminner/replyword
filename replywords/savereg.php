<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/19
 * Time: 15:29
 */
session_start();
if (isset($_SESSION['userword'])) {
    echo "<script>alert('同一台机器不允许同时登录');window.location.href='index.php';</script>";
} else {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/replywords/conn/conn.php';
    $usernc = $_POST['usernc'];
    $sql = mysqli_query($conn, "select usernc from tb_user where usernc='" . $usernc . "'");
    $info = mysqli_fetch_array($sql);
    if ($info) {
        echo "<script>alert('username is used');history.back();</script>";
        exit;
    }
    $ip = $_SERVER['REMOTE_ADDR'];
    if (mysqli_query($conn, "insert into tb_user(usernc,userpwd,truename,email,qq,tel,ip,address,face,regtime,sex,usertype)
        VALUES ('" . $usernc . "','" . md5(trim($_POST['userpwd'])) . "','" . $_POST['truename'] . "',
        '" . $_POST['truename'] . "','" . $_POST['email'] . "','" . $_POST['qq'] . "',
        '" . $_POST['tel'] . "','" . $ip . "','" . $_POST['address'] . "','" . $_POST['face'] . "',
        '" . date("Y-m-d H:i:s") . "','" . $_POST['sex'] . "','0')")) {
        $_SESSION['unc'] = $usernc;
        echo "<script>alert('register success');window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('register failure');history.back();</script>";
    }
}

