<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/19
 * Time: 11:26
 */


include_once "top.php"
?>
<table align="center">
    <tr>
        <td>
            <div align="right">今天是:&nbsp;
                <script language="JavaScript">
                    today = new Date();

                    function initArray() {
                        this.length = initArray.arguments.length;
                        for (var i = 0; i < this.length; i++){
                            this[i + 1] = initArray.arguments[i]
                        }
                    }

                    var d = new initArray(
                        "星期日",
                        "星期一",
                        "星期二",
                        "星期三",
                        "星期四",
                        "星期五",
                        "星期六"
                    );
                    document.write(
                        "<font color =#000000 style='font-family: 宋体'>",
                        today.getFullYear(), "年",
                        today.getMonth() + 1, "月",
                        today.getDate(), "日",
                        "&nbsp;&nbsp;",
                        d[today.getDay() + 1],
                        "</font>"
                    );
                </script>
            </div>
        </td>
        <td width="200" valign="top"><?php include_once "left.php"; ?></td>
        <!--留言信息-->
    </tr>
</table>
<?php
include_once("bottom.php");
?>
