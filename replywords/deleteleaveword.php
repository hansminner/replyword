<table>
    <p align="center">版主登录</p>
    <th>
        <td>主题</td>
        <td>用户</td>
        <td>发帖时间</td>
        <td>回复次数</td>
        <td>全主题删除</td>
    </th>
    <tbody>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tbody>
</table>
<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/20
 * Time: 16:17
 */
session_start();
$_SESSION['userword'] = 18024579565;
include_once $_SERVER['DOCUMENT_ROOT'] . '/replywords/conn/conn.php';

if (isset($_SESSION['userword']) && isset($_GET['del_id'])) {
    // del reply
    $result = mysqli_query($conn, "delete from tb_leaveword where id = '" . $_GET['del_id'] . "'");
    //del title
    $res = mysqli_query($conn, "select * from tb_replyword where leave_id = '" . $_GET['del_id'] . "'");
    if (mysqli_num_rows($res > 0)) {
        $results = mysqli_query($conn, "delete from tb_replyword where leave_id='" . $_GET['del_id'] . "'");
        if ($result == true and results == true) {
            echo "<script>alert('delete replywords success');history.back()</script>";
        } else {
            echo "<script>alert(replyworreplywordsry.back()</script>";
        }
    } else {
        if ($result) {
            echo "<script>alert('delete replyword succreplywordstory.back()</script>";
        } else {
            echo "<script>alert('delete replyword erroreplywordsry.back()</script>";
        }
    }
}else{
    echo "<script>alert('you don\'t have permission');history.back()</script>";
}