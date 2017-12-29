<?php echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">'; ?>

<form action="" method="post" accept-charset="UTF-8" onsubmit="document.charset='UTF-8'">
    <li>
        <label for="">留言主题</label>
        <input name="title" type="text">
    </li>
    <li>
        <label for="">留言内容</label>
        <textarea name="content" cols="30" rows="10" type="text">
        </textarea>
    </li>
    <li>
        <input name='submit' type='submit' value='提交'>
        <input type="reset" value="取消">
    </li>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/19
 * Time: 16:29
 */
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/replywords/conn/conn.php';
include_once "../function.php";
if (isset($_SESSION['unc'])) {
    $sql = mysqli_query($conn, "select id from tb_user where usernc='" . $_SESSION["unc"] . "'");
    $info = mysqli_fetch_array($sql);
    $userid = $info['id'];
}
if (isset($_SESSION['userword'])) {
    $sql = mysqli_query($conn, "select id from tb_adm WHERE userword='" . $_SESSION["userword"] . "'");
    $info = mysqli_fetch_array($sql);
    $userid = $info['id'];
}
if (isset($_POST['submit']) && $_POST['submit'] == '提交') {
    $content = $_POST['content'];
    $title = $_POST['title'];

    if (!empty(trim($_POST['content']))) {
//        var_dump(is_file("filterwords.txt"));exit;
        if (is_file("filterwords.txt")) {
            $filter_word = file("filterwords.txt");
            for ($i = 0; $i < count($filter_word); $i++) {
                //过滤敏感词
                if (preg_match("/" . trim($filter_word[$i]) . "/i", $content)) {
                    echo "<script>alert('include filter word');history.back(-1);</script>";
                    exit;
                }
            }

        }
        $createtime = date("Y-m-d H:i:s");
        if (mysqli_query($conn, "insert into tb_leaveword(Userid,Createtime,Title,Content)
            VALUES ('$userid','$createtime','$title','$content')")) {
            echo "<script>alert('reply success');window.location.href='index.php?id=" . urlencode('查看留言') . "';</script>";
        } else {
            echo "<script>alert('reply failure');history.back();</script>";
        }
    }
}
