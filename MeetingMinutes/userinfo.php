<?php
//session_start();
include_once "conn/conn.php";
/* 查找用户资料*/
$sql = mysqli_query($conn, "select * from tb_meeting_user where user_id = ".$_SESSION['id']);
$info = mysqli_fetch_array($sql);
?>
<table cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td width="58" align="center">尊敬的:</td>
        <td width="48" align="left"><?php echo $info['user_name']; ?></td>
        <td width="68">您的身份</td>
        <td width="78" align="left">
            <?php
            if ($info['user_rights'] == 0) {
                echo "<echo>普通用户</echo>";
            } else if ($info['user_rights'] == 1) {
                echo "<echo>管理员</echo>";
            }
            ?>
        </td>
        <td>CurrentTime: <span class="dates"><?php echo date("Y年m月d日"); ?></span>&nbsp;</td>
        <td width="78">LastLoginTime:</td>
        <td width="138">
            <?php
            if ($info['user_login_count'] == 1) {
                echo "--------";
            } else {
                echo $_SESSION['lasttime'];
            }
            ?>
        </td>
        <td width="50">当前为</td>
        <td width="100" align="left">第&nbsp;<?php echo $info['user_login_count']; ?>&nbsp;登录</td>
        <td width="70"><a href="login/logout.php">退出登录</a></td>
        <!--        <td width="51"><a href="logout.php"><img src="" alt="" onclick="logout()"></a></td>-->
    </tr>
</table>
<script>
    function logout() {
        if (confirm("确定要退出登录吗?")) {
            window.open('logout.php', '_parent', '', false);
        } else {
            return false;
        }
    }
</script>


