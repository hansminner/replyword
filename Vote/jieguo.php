<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/27
 * Time: 14:12
 */
include 'src/jpgraph/jpgraph.php';
include 'src/jpgraph/jpgraph_bar.php';
require 'class/DB_Handler.class.php';

$id = $_GET['id'];
$name = iconv('utf-8', 'gb2312', $_GET['title']);
$sql = $db->select("ve_xvote", " where title_id = '" . $id . "'");
while ($res = $db->arr_ay($sql)) {
    $xdata[] = iconv('utf-8', 'gb2312', $res['option']);
    $ydata[] = intval($res['vote_num']);
}

//创建画布
$graph = new Graph(600, 300);
$graph->SetScale('textlin'); //设置图的类型 设置y轴的值   这里是0到60
$graph->yaxis->scale->SetGrace(100); //阶梯
$graph->img->SetMargin(40, 30, 30, 40); //设置显示区左、右、上、下距边线的距离，单位为像素
$graph->SetShadow();

//画图
$bar = new BarPlot($ydata);
$graph->title->Set($name);
$graph->title->SetFont(FF_SIMSUN);  //设置中文字体,必须否则乱码
$graph->xaxis->SetTickLabels($xdata);       //设置X坐标轴文字
$graph->xaxis->SetFont(FF_SIMSUN);          //设置中文字体
//$bar->value->SetFormatCallback();
//$bar->value->SetFormat('%d');           //在柱形图中显示格式化的评选结果
// $bar->SetFillColor('red'); //设置柱形图的颜色
// $graph->SetMarginColor("lightblue");//设置画布背景色为淡蓝色

//将图输出
$bar->value->Show(); //设置显示数字
//将图添加到画布上
$graph->Add($bar);
$graph->Stroke();
?>

