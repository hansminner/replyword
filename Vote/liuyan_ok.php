<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/27
 * Time: 14:12
 * 留言审核
 */

require '../function.php';
require 'class/DB_Handler.class.php';
//var_dump($_SERVER['DOCUMENT_ROOT'] . "/Common/filterwords.txt");exit;
if (isset($_POST['submit']) and $_POST['submit'] == 'submit') {
    $title = $_POST['title_id'];
    $user_ip = get_rand_ip();
    $user_id = 2;
    $date = date("Y-m-d");
    $content = $_POST['liu_content'];
    if (!empty(trim($content))) {
        //dirname(__FILE__)当前脚本所在目录,再上一级就是项目的根目录了
        if (is_file(dirname(dirname(__FILE__)) . "\Common\\filterwords.txt")) {
            $filter_word = file(dirname(dirname(__FILE__)) . "\Common\\filterwords.txt");
            for ($i = 0; $i < count($filter_word); $i++) {
                //过滤敏感词
                if (preg_match("/" . trim($filter_word[$i]) . "/i", $content)) {
                    echo "<script>alert('include filter word');history.back(-1);</script>";
                    exit;
                }
            }

        }
    }
    $res = $db->insert("ve_liu", "title_id,user_id,user_ip,date,content", "$title,$user_id,'$user_ip','$date','$content'");
    if ($res) {
        echo "<script>alert('succese');history.go(-1);</script>";
    }
}