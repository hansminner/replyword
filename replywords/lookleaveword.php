<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/19
 * Time: 17:16
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/replywords/conn/conn.php';

$sql = mysqli_query($conn, "select count(*) as total from tb_leaveword");
$info = mysqli_fetch_array($sql);
$total = $info['total'];
if ($total == 0) {
    echo "<div align=center>sorry,no reply</div>";
} else {
    if (!isset($_GET['page']) || !is_numeric($_GET['page'])) {
        $page = 1;
    } else {
        $page = intval($_GET['page']);
    }
    $pagesize = 3;
    if ($total % $pagesize == 0) {
        $pagecount = intval($total / $pagesize);
    } else {
        $pagecount = ceil($total / $pagesize);
    }
    $sql = mysqli_query($conn, "select * from tb_leaveword order by Createtime desc limit " . ($page - 1) * $pagesize . ",$pagesize ");
    while ($info = mysqli_fetch_array($sql)) {
        $sql1 = mysqli_query($conn, "select Username,face,ip,email,qq from tb_user where id = '" . $info['Userid'] . "'");
        $info1 = mysqli_fetch_array($sql1);
        echo "<div>
            <li>" . $info1['Username'] . " | " . $info1['email'] . " | " . $info1['qq'] . " | " . "</li>
            <li>" . $info['Title'] . "</li>
            <li>" . $info['Content'] . "</li>
          </div>";
        $adm = $info1['Username'];
        $adms = mysqli_query($conn, "select id from tb_adm where userword='" . $adm . "'");
        $re = mysqli_fetch_array($adms);
        //判断当前登陆的管理员是不是该条留言的发表者,如果是显示编辑按钮
        if ($re['id'] == $info['Userid'] && $adm != "") {
            echo "<a href='editleavebook.php'>编辑</a>";
        } elseif ($adm == $info1['Username'] and $adm != "") {
            echo "<a href='editleavebook.php'>编辑</a>";
        } else {
            echo "<a href='editleavebook.php' style='display: none'>编辑</a>";
        }
        if ($adm != "") {
        } else if ($adm != $info1['Username'] and $adm != "") {
            echo "<a href='editleavebook.php'>回复此帖</a>";
        } else {
        }
    }
}
?>
<?php $id = 10 ?>
<table width="650" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="351">
            <div align="left">共有留言&nbsp;<?php echo $total; ?>&nbsp;条&nbsp;<?php echo $pagesize; ?>
                &nbsp;条&nbsp;第&nbsp;<?php echo $page; ?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
            </div>
        </td>
        <td width="199">
            <div align="right">
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=1&id=<?php echo urlencode($id); ?>" class="al">首页</a>&nbsp;
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=<?php if ($page > 1) {
                    echo $page - 1;
                } else {
                    echo 1;
                } ?>&id=<?php echo urlencode($id); ?>" class="al">上一页</a>&nbsp;<a
                        href="<?php echo $_SERVER['PHP_SELF'] ?>?page=<?php if ($page < $pagecount) {
                            echo $page + 1;
                        } else {
                            echo $pagecount;
                        } ?>&id=<?php echo urlencode($id); ?>" class="al">下一页</a>&nbsp;
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=<?php echo $pagecount; ?>&id=<?php echo urlencode($id); ?>" class="al">尾页</a>
            </div>
        </td>
    </tr>
</table>

