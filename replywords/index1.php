<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/19
 * Time: 14:50
 */
switch ($id) {
    case "首页":
        include "main.php";
        break;

    case "用户注册":
        include "reg.php";
        break;

    case "发表留言":
        include "leaveword.php";
        break;

    case "查看留言":
        include "lookleaveword.php";
        break;

    case "查询留言":
        include "searchword.php";
        break;

    case "版主管理":
        include "login.php";
        break;

    case "注册登录":
        include "logout.php";
        break;

    case "编辑留言":
        include "editleaveword.php";
        break;

    case "回复编辑留言":
        include "editreplyword.php";
        break;

    case "详细信息":
        include "lookxx.php";
        break;

    default:
        include "main.php";
        break;
}

