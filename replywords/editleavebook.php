<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/replywords/conn/conn.php';

$_SESSION['id'] = 11;
$info1 = mysqli_fetch_array(mysqli_query($conn, "select Userid from tb_leaveword where id ='" . $_GET['id'] . "'"))

?>
<!--<input type="text" value="--><?php
//echo $info['Userid'];
//?><!--" name="id" style="display: none">-->
<form action="" method="post">
    <li>
        <label for="">留言主题</label>
        <input name="title" type="text"
               value="
               <?php
               $info = mysqli_fetch_array(mysqli_query($conn, "select title from tb_leaveword where id ='" . $_GET['id'] . "'"));
               echo $info['title'];
               ?>">
    </li>
    <li>
        <label for="">留言内容</label>
        <textarea name="content" cols="30" rows="10" type="text">
            <?php
            $info = mysqli_fetch_array(mysqli_query($conn, "select content from tb_leaveword where id ='" . $_GET['id'] . "'"));
            echo $info['content'];
            ?>
        </textarea>
    </li>
    <li>
        <?php
        if ($info1['Userid'] == $_SESSION['id']) {
            echo "<input name='submit' type='submit' value='编辑'>";
        }
        ?>
        <input type="reset" value="取消">
    </li>
</form>

<?php
$id = $_GET['id'];
if ($_POST['submit'] != "") {
    if (mysqli_query($conn, "update tb_leaveword set title='" . $_POST['title'] . "',content='" . $_POST['content'] . "'
    where id = '" . $_GET['id'] . "'
    ")) {
        echo "<script>alert('success');window.opener.location.reload();window.close();</script>";
    } else {
        echo "<script>alert('erro');history.back();</script>";
    }
    exit;
}
$sql = mysqli_query($conn, "select * from tb_leaveword where id='" . $_GET['id'] . "'");
$info = mysqli_fetch_array($sql);
?>
