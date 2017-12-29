<table cellpadding="0" cellspacing="0" border="0">
    <form id="theForm" name="theForm" action="addmeeting_chk.php" method="post" onsubmit="return check_submit()"
          enctype="multipart/form-data">
        <tr>
            <td colspan="3"><h1 align="center">添加会议记录</h1></td>
        </tr>
        <tr>
            <td width="120">
                <div>会议名称</div>
            </td>
            <td><input name="meeting_name" type="text"></td>
            <td align="left" width="180"><span class="sp1">填写会议记录名称</span></td>
        </tr>
        <tr>
            <td width="120">
                <div>部门名称</div>
            </td>
            <td><input name="meeting_depart" type="text"></td>
            <td align="left" width="180"><span class="sp1">填写部门名称</span></td>
        </tr>
        <tr>
            <td width="120">
                <div>会议地点</div>
            </td>
            <td><input name="meeting_place" type="text"></td>
            <td align="left" width="180"><span class="sp1">填写会议地点</span></td>
        </tr>
        <tr>
            <td width="120">
                <div>会议日期</div>
            </td>
            <td>
                <select name="b_y" id="">
                    <option value="2017">2017</option>
                </select>年
                <select name="b_m" id="">
                    <option value="12">12</option>
                </select>月
                <select name="b_d" id="">
                    <option value="25">25</option>
                </select>日
            </td>
            <td align="left" width="180"><span class="sp1">填写会议日期</span></td>
        </tr>
        <tr>
            <td width="120">
                <div>会议主持人</div>
            </td>
            <td><input name="meeting_host" type="text"></td>
            <td align="left" width="180"><span class="sp1">填写会议主持人</span></td>
        </tr>
        <tr>
            <td width="120">
                <div>会议记录人</div>
            </td>
            <td><input name="meeting_saver" type="text"></td>
            <td align="left" width="180"><span class="sp1">填写会议记录人</span></td>
        </tr>
        <tr>
            <td width="120">
                <div>出席人员</div>
            </td>
            <td><input name="meeting_present" type="text"></td>
            <td align="left" width="180"><span class="sp1">填写会议出席人员</span></td>
        </tr>
        <tr>
            <td>上传会议内容</td>
            <td><input name="meeting_documents" type="file" size="16"></td>
            <td align="left" width="180"><span class="sp1">请上传txt格式会议文稿</span></td>
        </tr>
        <tr>
            <td width="120">
                <div>会议摘要</div>
            </td>
            <td><textarea name="textarea" rows="4"></textarea></td>
            <td align="left" width="180"><span class="sp1">填写会议记录摘要</span></td>
        </tr>
        <tr>
            <td height="12" rowspan="3"></td>
        </tr>
        <tr>
            <td height="30" colspan="2">
                <div align="center">
                    <input type="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset">
                </div>
            </td>
        </tr>
    </form>
</table>