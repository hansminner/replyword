<?php session_start(); ?>
<?php require_once("top.php"); ?>
<?php //include_once("./conn/conn.php");  ?>
<?php include_once("./class/DB_Handler.class.php"); ?>
<?php
//$rsm=new com("adodb.recordset");
//$sqlm="select * from `look_jj` where word='".$_SESSION['name']."'";               //查询判断用户
//$rsm->open($sqlm,$conn,1,1);
$select = $db->select('look_jj', 'word=' . $_SESSION['name']);
$res = $db->arr_ay($select);
if ($res['word'] == $_SESSION['name']) {                                                            //判断用户
    $date = date("y-m-d H:i:s");                                                                                     //获取系统时间
    //    $rsh = new com("adodb.recordset");
    //    $sqh = "select * from `look_jj` where `nowe`<'" . $date . "' and `word`='" . $_SESSION['name'] . "'";              //查询设置时间
    //    $rsh->open($sqh, $conn, 1, 1);
    $select = $db->select('look_jj', "where nows<'" . $date . "','word=' " . $_SESSION['name']);
    $res = $db->arr_ay($select);

    if ($res['nows'] < $date) {                                                                                                                          //对时间进行判断
//        echo "<script>alert('您好:【" . $res['word'] . "】系统" . $res['leixing'] . "【" . $res['title'] . "】发布时间是" . $res['nows'] . "');window.location.href='post_chk.php?id=" . $res['id'] . "&idp=" . $res['leixing'] . "&nore=" . $res['title'] . "&nord=" . $res['leixing'] . "';</script>";
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta http-equiv="refresh" content="60">
    <title>个人网络日记</title>
    <script language="JavaScript" type="text/JavaScript">
        <!--
        function MM_reloadPage(init) {  //reloads the window if Nav4 resized
            if (init == true) with (navigator) {
                if ((appName == "Netscape") && (parseInt(appVersion) == 4)) {
                    document.MM_pgW = innerWidth;
                    document.MM_pgH = innerHeight;
                    onresize = MM_reloadPage;
                }
            }
            else if (innerWidth != document.MM_pgW || innerHeight != document.MM_pgH) location.reload();
        }

        MM_reloadPage(true);
        //-->
    </script>
    <style type="text/css">
        <!--
        a:visited {
            color: #6633FF;
            text-decoration: none;
        }

        a:hover {
            color: #0066CC;
            text-decoration: none;
        }

        -->
    </style>
</head>

<body>
<table width="274" height="29" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="27">
            <div align="center"><a href="index.php?act="><font size="2">设置闹钟</font></a></div>
        </td>
        <td>
            <div align="center"><a href="index.php?act=cso"><font size="2">正在执行</font></a></div>
        </td>

</table>
<hr width="400">
<div align="left">
    <?php
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    } else {
        $act = "";
    }
    switch ($act) {
        case "":
            ?>
            <table width="350" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="266">
                        <form name="form1" method="post" action="post.chk.php">
                            <table width="100%" height="236" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div align="center"><font color="#0066FF" size="2">设置标题：
                                                <select name="sela" id="sela">
                                                    <option value="once">请选择</option>
                                                    <?php
                                                    $rs = new com("adodb.recordset");
                                                    $sql = "select * from `look_class` where `sclass`='" . $_SESSION['name'] . "'";
                                                    $rs->open($sql, $conn, 1, 3);
                                                    while (!$rs->eof) {
                                                        ?>
                                                        <option value="<?php echo $rs->fields[1]; ?>"><?php echo $rs->fields[1]; ?></option>
                                                        <?php
                                                        $rs->movenext;
                                                    }
                                                    $rs->close();                        //关闭连接
                                                    $conn->close();
                                                    ?>
                                                </select>
                                            </font></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div align="center"><font color="#0066FF" size="2">设置日期：</font>
                                            <select name="selb" size="1" id="selb">
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                            </select>
                                            <font color="#0066FF" size="2">年</font>
                                            <select name="selc" size="1" id="selc">
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <font color="#0066FF" size="2">月</font>
                                            <select name="seld" size="1" id="seld">
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <font color="#0066FF" size="2">日</font></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div align="center"><font color="#0066FF" size="2">设置时间：</font>
                                            <select name="sele" size="1" id="sele">
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                            </select>
                                            <font color="#0066FF" size="2">时</font>
                                            <select name="self" size="1" id="self">
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                                <option value="60">60</option>
                                            </select>
                                            <font color="#0066FF" size="2">分</font>
                                            <select name="seli" size="1" id="seli">
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                                <option value="60">60</option>
                                            </select>
                                            <font color="#0066FF" size="2">秒</font></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div align="center"><font color="#FF0000" size="2">
                                                <input type="radio" name="vb" value="每天一次">
                                                <font color="#0066FF">每天一次</font>
                                                <input name="vb" type="radio" value="提醒一次" checked>
                                                <font color="#0066FF">提醒一次 </font></font></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div align="center">
                                            <input type="submit" name="Submit" value="开 启">
                                            <input name="hid" type="hidden" id="hid"
                                                   value="<?php echo $_SESSION['name']; ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>

            <?php
            break;
        case "ast":
            ?>
            <?php
            break;
        case "bst":
            ?>
            <?php
            break;
        case "cst":
            ?>
            <table width="350" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="266">
                        <form name="form1" method="post" action="modichk.php">
                            <table width="100%" height="197" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <div align="center"><font color="#0066FF" size="2">您的待账号：</font></div>
                                    </td>
                                    <td><input name="admin" type="text" id="admin"
                                               value="<?php echo $_SESSION['name']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div align="center"><font color="#0066FF" size="2">填写旧密码： </font></div>
                                    </td>
                                    <td><input name="pwd" type="text" id="pwd"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div align="center"><font color="#0066FF" size="2">填写新密码： </font></div>
                                    </td>
                                    <td><input name="xpwd" type="text" id="xpwd"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div align="center"><font color="#0066FF" size="2">确认新密码：</font></div>
                                    </td>
                                    <td><input name="qpwd" type="text" id="qpwd"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div align="center">
                                            <input type="submit" name="Submit6" value="修改">
                                            <input type="reset" name="Submit7" value="重置">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
            <?php
            break;
        case "csy":
            ?>
            <table width="350" border="1" align="center" cellpadding="0" cellspacing="0">
                <?php
                $rse = new com("adodb.recordset");
                $sqle = "select * from `look_yong` where `admin`='" . $_SESSION['name'] . "'";
                $rse->open($sqle, $conn, 1, 3);
                ?>
                <tr>
                    <td height="266">
                        <table width="100%" height="254" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="40%">&nbsp; <font color="#0066FF" size="2">
                                        <div align="center">你的账号：</div>
                                    </font></td>
                                <td width="60%">&nbsp;<font color="#0066FF" size="2">
                                        <div align="center"><?php echo $rse->fields[1]; ?></div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td>&nbsp;<font color="#0066FF" size="2">
                                        <div align="center">注册时间：</div>
                                    </font></td>
                                <td>&nbsp;<font color="#0066FF" size="2">
                                        <div align="center"><?php echo $rse->fields[3]; ?></div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td>&nbsp; <font color="#0066FF" size="2">
                                        <div align="center">IP地<font color="#FFFFFF">你</font>址：</div>
                                    </font></td>
                                <td>&nbsp; <font color="#0066FF" size="2">
                                        <div align="center"><?php echo $rse->fields[4]; ?></div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td>&nbsp; <font color="#0066FF" size="2">
                                        <div align="center">你的邮箱：</div>
                                    </font></td>
                                <td>&nbsp;<font color="#0066FF" size="2">
                                        <div align="center"><?php echo $rse->fields[9]; ?></div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td>&nbsp; <font color="#0066FF" size="2">
                                        <div align="center">真实姓名：</div>
                                    </font></td>
                                <td>&nbsp;<font color="#0066FF" size="2">
                                        <div align="center"><?php echo $rse->fields[10]; ?></div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td>&nbsp;<font color="#0066FF" size="2">
                                        <div align="center">密保问题：</div>
                                    </font></td>
                                <td>&nbsp;<font color="#0066FF" size="2">
                                        <div align="center"><?php echo $rse->fields[7]; ?></div>
                                    </font></td>
                            </tr>
                        </table>
                    </td>
                    <?php
                    $rse->close();                        //关闭连接
                    $conn->close();
                    ?>
                </tr>
            </table>
            <?php
            break;
        case "csl":
            ?>
            <table width="350" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="266">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <form action="post.php" method="post" name="form2">
                                        <div align="center"><font color="#0066FF" size="2">添加标题：</font>
                                            <input name="name" type="text" id="name">
                                            <input type="submit" name="Submit4" value="提交">
                                            <input name="hid" type="hidden" id="hid"
                                                   value="<?php echo $_SESSION['name']; ?>">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td height="184" valign="top">
                                    <?php
                                    $rsa = new com("adodb.recordset");
                                    $sqla = "select * from `look_class` where `sclass`='" . $_SESSION['name'] . "'";
                                    $rsa->open($sqla, $conn, 1, 3);
                                    while (!$rsa->eof) {
                                        ?>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="21%">
                                                    <div align="center"><font color="#0066FF"
                                                                              size="2"><?php echo $rsa->fields[0]; ?></font>
                                                    </div>
                                                </td>
                                                <td width="50%">
                                                    <div align="center"><font color="#0066FF"
                                                                              size="2"><?php echo $rsa->fields[1]; ?></font>
                                                    </div>
                                                </td>
                                                <td width="29%">
                                                    <div align="center"><font color="#0066FF" size="2"><a
                                                                    href="wei.php?act=add&id=<?php echo $rsa->fields[0]; ?>">【删除】</a></font>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php
                                        $rsa->movenext;
                                    }
                                    $rsa->close();                        //关闭连接
                                    $conn->close();
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <font color="#0066FF" size="2">&nbsp;</font>
                        <p>&nbsp;</p></td>
                </tr>
            </table>
            <?php
            break;
        case "cso":
            ?>
            <table width="548" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="671" height="266" valign="top">

                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <div align="center"><font color="#0066FF" size="2">id</font></div>
                                </td>
                                <td width="31%">
                                    <div align="center"><font color="#0066FF" size="2">标题</font></div>
                                </td>
                                <td width="34%">
                                    <div align="center"><font color="#0066FF" size="2">时间</font></div>
                                </td>
                                <td width="14%">
                                    <div align="center"><font color="#0066FF" size="2">类型</font></div>
                                </td>
                                <td width="13%">
                                    <div align="center"><font color="#0066FF" size="2">操作</font></div>
                                </td>
                            </tr>
                            <?php
                            $rsr = new com("adodb.recordset");
                            $sqlr = "select * from `look_jj` where `word`='" . $_SESSION['name'] . "'";
                            $rsr->open($sqlr, $conn, 1, 1);
                            while (!$rsr->eof) {
                                ?>
                                <tr>
                                    <td width="8%">
                                        <div align="center"><font color="#0066FF"
                                                                  size="2"><?php echo $rsr->fields[0]; ?></font></div>
                                    </td>
                                    <td>
                                        <div align="center"><font color="#0066FF"
                                                                  size="2"><?php echo $rsr->fields[1]; ?></font></div>
                                    </td>
                                    <td>
                                        <div align="center"><font color="#0066FF"
                                                                  size="2"><?php echo $rsr->fields[2]; ?></font></div>
                                    </td>
                                    <td>
                                        <div align="center"><font color="#0066FF"
                                                                  size="2"><?php echo $rsr->fields[4]; ?></font></div>
                                    </td>
                                    <td>
                                        <div align="center"><font color="#0066FF" size="2"><a
                                                        href="postchk.php?id=<?php echo $rsr->fields[0]; ?>">delete</a></font>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $rsr->movenext;
                            }
                            $rsr->close();                        //关闭连接
                            $conn->close();
                            ?>
                        </table>

                    </td>
                </tr>
            </table>
            <?php
            break;
    }
    ?>
</div>
</body>
<?php require_once("wei.php"); ?>
</html>
