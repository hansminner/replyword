<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/25
 * Time: 9:54
 */
session_start();
include_once('conn/conn.php');
?>
<!--省略部分html代码-->
<?php
if (empty($_SESSION['name']) and empty($_SESSION['id'])) {
    echo "<script>alert('please login');window.location='login/chklogin.php';</script>";
} else {
    include 'userinfo.php';
}
?>
//    省略部分html
<table>
    <tr>
        <td width="180">
            <div class="left">
                <center>
                    <h4 class="h4">分类操作</h4>
                    <ul>
                        <li><a href="manager.php?lmbs=添加会议记录">&nbsp;&nbsp;添加会议记录</a></li>
                        <li><a href="manager.php?lmbs=浏览会议记录">&nbsp;&nbsp;浏览会议记录</a></li>
                        <li><a href="manager.php?lmbs=查找会议记录">&nbsp;&nbsp;查找会议记录</a></li>
                        <li><a href="manager.php?lmbs=管理用户信息">&nbsp;&nbsp;管理用户信息</a></li>
                    </ul>
                    <p>&nbsp;</p>
                    <?php if ($_SESSION['rights'] == 1) { ?>
                        <h4>管理操作</h4>
                        <ul>
                            <li><a href="manager.php?lmbs=用户账户管理">&nbsp;&nbsp;用户账户管理</a></li>
                            <li><a href="manager.php?lmbs=会议信息管理">&nbsp;&nbsp;会议信息管理</a></li>
                            <li><a href="manager.php?lmbs=部门管理">&nbsp;&nbsp;部门管理</a></li>
                        </ul>
                    <?php } ?>
                </center>
            </div>
        </td>
        <td>
            <div class="position">当前位置
                <?php
                if (empty($_GET['lmbs'])) {
                    echo "首页";
                } else {
                    echo $_GET['lmbs'];
                }
                ?>
            </div>
        </td>
        <td width="784">
            <div class="rightbox">

                <div class="include">
                    <?php
                    $lmbs = $_GET['lmbs'];
                    switch ($lmbs) {
                        case "添加会议记录":
                            include 'addmeeting.php';
                            break;
                        case "浏览会议记录":
                            include 'viewmeeting.php';
                            break;
                        case "查找会议记录":
                            include "found.php";
                            break;
                        case "管理用户信息":
                            include "amendinfo.php";
                            break;
                        case "查找会议结果":
                            include "show.php";
                            break;
                        case "修改密码":
                            include "amendpwd.php";
                            break;
                        case "":
                            include "welcome.php";
                            break;
                        //管理员模式
                        case "用户账户管理":
                            include "admin/acc_manager.php";
                            break;
                        case "会议信息管理":
                            include "admin/recourdmanager.php";
                            break;
                        case "部门管理":
                            include "admin/departmanager.php";
                            break;
                    }
                    ?>
                </div>
            </div>
        </td>
    </tr>
</table>

