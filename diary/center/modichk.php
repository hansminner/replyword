<?php
require '../class/DB_Handler.class.php';
if (isset($_POST['submit']) && $_POST['submit'] == '提交') {
    $admin = $_POST['admin'];           //接收用户名
    $pwd = $_POST['pwd'];                //接收旧密码
    $xpwd = $_POST['xpwd'];             //接收新密码
    if ($admin != "" && $pwd != "" && $xpwd != "") {
        $query = $db->select("look_yong", "where admin='" . $admin . "' and adminchk='" . $pwd . "'");
        $res = $db->arr_ay($query);
        if ($res['admin'] == $admin && $res['adminchk'] == $pwd && $xpwd != $res['adminchk']) {
            $update = $db->update("db_diary", "adminchk", $res['id']);
            echo "<script>alert('修改成功!');window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('修改失败!');window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('不允许为空！!');window.location.href='../index.php';</script>";
    }
}

?>
<table>
    <form action="" method="post">
        <tr>
            <td>UserName</td>
            <td><input name="admin" type="text"></td>
        </tr>
        <tr>
            <td>old Password</td>
            <td><input name="pwd" type="text"></td>
        </tr>
        <tr>
            <td>new Password</td>
            <td><input name="xpwd" type="text"></td>
        </tr>
        <tr>
            <td><input name="submit" type="submit"></td>
        </tr>
    </form>
</table>
