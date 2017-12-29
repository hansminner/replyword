<?php
ob_end_clean();
//header("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />");
header("Content-type:application/vnd.ms=excel;charset=utf-8");
header("Content-Disposition:attachment;filename=document.xls");
include_once '../conn/conn.php';
session_start();
$sql = mysqli_query($conn, "select * from tb_meeting_info");
//$info = mysqli_fetch_array($sql);
$title = array(
    '会议名称',
    '部门名称',
    '会议地点',
    '会议日期',
    '会议主持人',
    '会议记录人',
    '出席人员',
    '会议摘要'
);
foreach ($title as $tval) {
    echo iconv('utf-8', 'gb2312', $tval) . "\t";
}
if (mysqli_fetch_array($sql)) {
    while ($info = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
        echo "\n" . iconv('utf-8', 'gb2312', $info['meeting_name']) . "\t" . iconv('utf-8', 'gb2312', $info['meeting_depart']) . "\t" . iconv('utf-8', 'gb2312', $info['meeting_place']) . "\t" . iconv('utf-8', 'gb2312', $info['meeting_date']) . "\t" . iconv('utf-8', 'gb2312', $info['meeting_host']) . "\t" . iconv('utf-8', 'gb2312', $info['meeting_saver']) . "\t" . iconv('utf-8', 'gb2312', $info['meeting_present']) . "\t" . iconv('utf-8', 'gb2312', $info['meeting_abstract']);
    }
}


