<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/19
 * Time: 10:56
 */
/**
 * @param $content
 * @return string
 * 将文本中的字符转换为html标识符
 */
function unhtml($content) {
    $content = htmlspecialchars($content);
    $content = str_replace("@", "", $content);
    return trim($content);
}

/**
 * @param $str
 * @param $start
 * @param $len
 * 'strlen' 记录字符串的总长度
 * @return string;
 */
function msubstr($str, $start, $len) {
    $strlen = $start + $len;
    $tmpstr = "";
    for ($i = 0; $i < $strlen; $i++) {
        if (ord(substr($str, $i, 1)) > 0xa0) {
            $tmpstr .= substr($str, $i, 2);
            $i++;
        } else {
            $tmpstr .= substr($str, $i, 1);
        }
    }
    return $tmpstr;
}

/**
 * @return string
 */
function get_rand_ip(){
    $arr_1 = array("218","218","66","66","218","218","60","60","202","204","66","66","66","59","61","60","222","221","66","59","60","60","66","218","218","62","63","64","66","66","122","211");
    $randarr= mt_rand(0,count($arr_1));
    $ip1id = $arr_1[$randarr];
    $ip2id=  round(rand(600000,  2550000)  /  10000);
    $ip3id=  round(rand(600000,  2550000)  /  10000);
    $ip4id=  round(rand(600000,  2550000)  /  10000);
    return  $ip1id . "." . $ip2id . "." . $ip3id . "." . $ip4id;
}
