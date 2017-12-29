<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/27
 * Time: 14:12
 */
require 'class/DB_Handler.class.php';
?>
<table>
    <thead>
    <tr>
        <td width="660">投票主题</td>
        <td width="340">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = $db->select('ve_vote', "");;
    while ($res = $db->arr_ay($sql)) {
        ?>
        <tr>
            <td><?php echo $res['title'] ?></td>
            <td><a href="toupiao.php?id=<?php echo $res['id'] ?>">投票</a> | <a href="liuyan.php?id=<?php echo $res['id'] ?>&title=<?php echo $res['title'] ?>">查看结果</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
