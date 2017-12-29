<?php
//检测是否已经登录
//session_start();
//if (isset($_SESSION['name']) and isset($_SESSION['id']) and isset($_SESSION['rights'])) {
//    echo "<meta http-equiv=\"refresh\" content=\"0;url=manager.php\" />";
//}else{
//    echo "<meta http-equiv=\"refresh\" content=\"0;url=chklogin.php\" />";
//}
?>
    <form action="" method="post">
        <li><label for="">用户名</label><input name="username" type="text"></li>
        <li><label for="">密&nbsp;&nbsp;码</label><input name="pass" type="password"></li>
        <li><input name="submit" type="submit" value="登录"><input type="reset"></li>
    </form>
<?php
session_start();
include_once '../conn/conn.php';
if (isset($_POST['submit']) && $_POST['submit'] == '登录') {
    if (empty($_POST['username']) or empty($_POST['pass'])) {
        echo "<script>alert('can\'t login in ');history.go(-1);</script>";
    } else {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $sql1 = mysqli_query($conn, "select * from tb_meeting_user where user_name = '$username'");
        $info1 = mysqli_fetch_array($sql1);
        if ($info1) {
            $sql2 = mysqli_query($conn, "select * from tb_meeting_user where user_name = '$username' and user_password = '$pass'");
            $info2 = mysqli_fetch_array($sql2);
            if ($info2) {
                if ($info2['user_whether'] == 0) {
                    $_SESSION['id'] = $info2['user_id'];
                    $_SESSION['name'] = $info2['user_name'];
                    $_SESSION['rights'] = $info2['user_rights'];
                    $_SESSION['lasttime'] = $info2['user_last_login_date'];
                    $logindate = date("Y-m-d H:i:s", time());
                    $logincount = $info2['user_login_count'];
                    $logincount++;
                    $sql3 = mysqli_query($conn, "update tb_meeting_user set user_last_login_date = '$logindate',user_login_count = $logincount where user_id = " . $_SESSION['id']);
                    echo "<meta http-equiv=\"refresh\" content=\"2;url=..\manager.php\" />";
                } elseif ($info2['user_whether'] == 1) {
                    echo "<script>alert('account banned');history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('password wrong')</script>";
            }
        } else {
            echo "<script>alert('username not exist')</script>";
        }
    }
}
