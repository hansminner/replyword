<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/25
 * Time: 15:12
 */
include_once 'conn/conn.php';
session_start();
$sql = mysqli_query($conn, "select count(*) AS total from tb_meeting_info");
$count = mysqli_fetch_array($sql);
$total = $count['total'];
if ($total == 0) {
    echo "<span>no record</span>";
} else {
    if (!isset($_GET['page']) and !is_numeric($_GET['page'])) {
        $page = 1;
    } else {
        $page = intval($_GET['page']);
    }
    $pageSize = 5;
    if ($total % $pageSize == 0) {
        $pageCount = intval($total / $pageSize);
    } else {
        $pageCount = ceil($total / $pageSize);
    }
    $sql = mysqli_query($conn, "select * from tb_meeting_info order by meeting_date desc limit " . ($page - 1) * $pageSize . ",$pageSize");
    ?>
    <table border="0" align="center" cellpadding="0" cellspacing="0">
        <caption><h1>会议信息列表</h1></caption>
        <th>
            <tr>
                <td>会议名称</td>
                <td>部门名称</td>
                <td>会议地点</td>
                <td>会议日期</td>
                <td>会议主持人</td>
                <td>会议记录人</td>
                <td>出席人员</td>
                <td>会议摘要</td>
                <td>操作</td>
            </tr>
        </th>
        <?php
        while ($info = mysqli_fetch_array($sql)) {
            echo "<tr><td>" . $info['meeting_name'] . "</td><td>" . $info['meeting_depart'] . "</td><td>" . $info['meeting_place'] . "</td><td>" . $info['meeting_date'] . "</td><td>" . $info['meeting_host'] . "</td><td>" . $info['meeting_present'] . "</td><td>" . $info['meeting_saver'] . "</td><td>" . $info['meeting_abstract'] . "</td><td>" . "<a href=''>详情</a>" . "</td></tr>";
        }
        ?>
        <tr>
            <td width="" colspan="3">
                <div align="left">共有留言&nbsp;<?php echo $total; ?>&nbsp;条&nbsp;<?php echo $pageSize; ?>
                    &nbsp;条&nbsp;第&nbsp;<?php echo $page; ?>&nbsp;页/共&nbsp;<?php echo $pageCount; ?>&nbsp;页
                </div>
            </td>
            <td width="">
                <div align="right">
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=1" class="al">首页</a>&nbsp;
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=<?php if ($page > 1) {
                        echo $page - 1;
                    } else {
                        echo 1;
                    } ?>" class="al">上一页</a>&nbsp;<a
                            href="<?php echo $_SERVER['PHP_SELF'] ?>?page=<?php if ($page < $pageCount) {
                                echo $page + 1;
                            } else {
                                echo $pageCount;
                            } ?>" class="al">下一页</a>&nbsp;
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=<?php echo $pageCount; ?>" class="al">尾页</a>
                </div>
            </td>
            <td>
                <button onclick='viewPrint()'>预览</button>&nbsp;
                <button onclick='docPrint()'>打印</button>&nbsp;
                <a href='js/createform.php'>导出</a>
            </td>
        </tr>
    </table>
    <?php
}
?>
<OBJECT id=WebBrowser classid=CLSID:8856F961-340A-11D0-A96B-00C04FD705A2 height=0 width=0 VIEWASTEXT></OBJECT>
<script type="application/javascript">
    function viewPrint() {
        document.all.WebBrowser.ExecWB(8, 1)
    }

    function docPrint() {
        document.all.WebBrowser.ExecWB(6, 6)
    }
</script>

