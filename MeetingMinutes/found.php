<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/25
 * Time: 15:12
 */
if (!isset($_SESSION)) {
    session_start();
}
if ($_POST['submit'] != "") {
    var_dump(2);
}

?>
<table>
    <caption><h1>查找会议记录</h1></caption>
    <form action="manager.php?lmbs=查找会议结果" method="post">
        <tr>
            <td>查询内容:</td>
            <td><input type="text" name="search_keyword"></td>
        </tr>
        <tr>
            <td>查询类型:</td>
            <td>
                <select name="search_type" id="">
                    <option value="0"><--type--></option>
                    <option value="1">会议编号</option>
                    <option value="2">会议名称</option>
                    <option value="3">会议主持人</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center"><input name="submit" type="submit" value="查找"></td>
        </tr>
    </form>
</table>
