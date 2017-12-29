<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/27
 * Time: 10:11
 */
if (!isset($_SESSION)) {
    session_start();
}
include_once 'conn/conn.php';
$keyword = $_POST['search_keyword'];
$type = $_POST['search_type'];
switch ($type) {
    case 0:
        echo "<script>alert('choose type');history.go(-1);</script>";
        break;
    case 1:
        $sql = "select * from tb_meeting_info where meeting_id = $keyword";
        break;
    case 2:
        $sql = "select * from tb_meeting_info where meeting_name LIKE '%" . $keyword . "'";
        break;
    case 3:
        $sql = "select * from tb_meeting_info where meeting_host LIKE '%" . $keyword . "'";
}
$query = mysqli_query($conn, $sql);
?>
<h3>会议信息浏览</h3>
<table>
    <th>
        <tr>
            <td>会议编号</td>
            <td>会议名称</td>
            <td>会议主持人</td>
            <td>查看详情</td>
        </tr>
    </th>
    <tbody>
    <?php
    while ($info = mysqli_fetch_array($query)) {
        echo "<tr><td>" . $info['meeting_id'] . "</td><td>" . $info['meeting_name'] . "</td><td>" . $info['meeting_host'] . "</td><td><a href='meetinginfo.php'>查看详情</a></td></tr>";
    };
    ?>
    </tbody>
</table>

