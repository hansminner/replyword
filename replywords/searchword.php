<form action="" method="post">
    <li><input type="index" name="keyword"></li>
    <li><input type="radio" name="type" value="1"></li>
    <li><input type="radio" name="type" value="2"></li>
    <li><input type="radio" name="type" value="3"></li>
    <li><input type="submit" name="submit"></li>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/20
 * Time: 14:31
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/replywords/conn/conn.php';
if ($_POST['submit'] != "") {
    $type = $_POST["type"];
    $keyword = $_POST['keyword'];
    if ($type == 1) {
        $sql = mysqli_query($conn, "select * from tb_leaveword where title LIKE '%" . $keyword . "'");
    } elseif ($type == 2) {
        $sql = mysqli_query($conn, "select * from tb_leaveword where content LIKE '%" . $keyword . "'");
    } elseif ($type == 3) {
        $sql0 = mysqli_query($conn, "select id from tb_user where usernc LIKE '%" . $keyword . "'");
        $info0 = mysqli_fetch_array($sql0);
        $sql = mysqli_query($conn, "select * from tb_leaveword where userid = '" . $info0["id"] . "'");
    }
    $info = mysqli_fetch_array($sql);
    if ($info == false) {
        echo "<br><br><div align='center'>sorry,not found</div>";
    } else {
        //循环显示查询结果
        do {
            echo "<li>".$info["Title"]."</li><li>".$info["Content"]."</li>";
        } while ($info = mysqli_fetch_array($sql));
    }
}
?>