<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/27
 * Time: 14:12
 * 投票
 */
require 'class/DB_Handler.class.php';
include 'header.php';
include 'header1.php';
if (isset($_GET['id'])) {
    $sel = $db->select("ve_xvote", " where title_id = " . $_GET['id']);
    $array = $db->arr_ay($sel);
}
?>
<form action="toupiao_ok.php" method="post">
    <table>
        <tr>
            <td>
                <blockquote>
                    <blockquote>
                        <p>
                            <span>主题:
                                <?php echo $array['vote_title'] ?>
                                <input type="hidden" name="title" value="<?php echo $array['vote_title'] ?>">
                            </span>
                        </p>
                    </blockquote>
                </blockquote>
            </td>
            <td>
                <div align="center"><span><div align="left">投票结果</div></div>
            </td>
        </tr>
        <?php
        $sql = $db->select("ve_xvote", " where title_id = " . $_GET['id']);
        while ($arr = $db->arr_ay($sql)) {
            ?>
            <tr>
                <td width="646">
                    <label for="">
                        <blockquote>
                            <blockquote>
                                <p>
                                    <input name="radios" type="radio" value="<?php echo $arr['id'] ?>">
                                    <?php echo $arr['option'] ?>
                                </p>
                            </blockquote>
                        </blockquote>
                    </label>
                </td>
                <td width="354"><?php echo $arr['vote_num'] ?>票</td>
            </tr>
            <?php
        }
        ?>
    </table>
    <p>
        <label for=""></label>
        <input type="submit" name="submit" value="vote">
    </p>
</form>
<?php
include 'footer.php';
?>
