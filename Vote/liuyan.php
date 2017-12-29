<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/27
 * Time: 14:12
 * 留言
 */
require 'class/DB_Handler.class.php';
?>
<img src="jieguo.php?id=<?php echo $_GET['id'] ?>&title=<?php echo $_GET['title']; ?>" alt="">

<!--留言列表-->
<table border="1" cellspacing="0">
    <thead>
    <tr>
        <td width="200">用户信息</td>
        <td width="600">留言内容</td>
    </tr>
    </thead>
    <?php
    $select = $db->select("ve_liu", "where title_id = " . $_GET['id']);
    while ($res = $db->arr_ay($select)) {
        ?>
        <tr>
            <td><?php echo $res['user_id'] ?></td>
            <td height="100"><?php echo $res['content'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>

<br>
<!--提交留言-->
<table>
    <form action="liuyan_ok.php" method="post">
        <tr>
            <td>留言主题</td>
            <td>
                <input name="liu_title" type="text" value="<?php echo $_GET['title']; ?>">
                <input name="title_id" type="hidden" value="<?php echo $_GET['id']; ?>">
            </td>
        </tr>
        <tr>
            <td>留言内容</td>
            <td>
                <textarea name="liu_content" id="" cols="30" rows="10">

                </textarea>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="submit"></td>
        </tr>
    </form>
</table>
