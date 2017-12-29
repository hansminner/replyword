<form action="" method="post">
    <li><label for="">用户名</label><input name="username" type="text"></li>
    <li><label for="">密&nbsp;&nbsp;码</label><input name="password" type="text"></li>
    <li><input name="submit" type="submit" value="登录"><input type="reset"></li>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/20
 * Time: 15:33
 */
session_start();
include_once 'conn/conn.php';
if (isset($_SESSION['unc'])) {
    echo "<script>alert('can\'t login in a same computer');window.location.href='../replyword/index.php'</script>";
} else {
    if (isset($_POST['submit']) && $_POST['submit'] == '登录') {
        if ($_POST['username'] != "" && $_POST['password'] != "") {
            $check = "select Userword from tb_adm where Userword ='" . $_POST['username'] . "'and Password = '" . $_POST['password'] . "'";
            $result = mysqli_query($conn, $check);
            $info = mysqli_num_rows($result);
            if ($info == 1) {
                $_SESSION["userword"] = $_POST["username"];
                echo "<script>alert('login success');window.location.href='admin_browse.php';</script>";
            } else {
                echo "<script>alert('login error');window.location.href='index.php';</script>";
            }
        }
    }
}
