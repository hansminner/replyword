<?php
//move_uploaded_file();
session_start();
include_once 'conn/conn.php';
function f_postfix($f_type, $f_upfiles) {
    $is_pass = false;
    $tmp_upfiles = explode(".", $f_upfiles);
    $tmp_num = count($tmp_upfiles);
    for ($num = 0; $num < count($f_type); $num++) {
        if (strtolower($tmp_upfiles[$tmp_num - 1]) == $f_type["$num"]) {
            $is_pass = $f_type["$num"];
        }
    }
    return $is_pass;
}

if ($_FILES['meeting_documents']['size'] <= 0) {
    echo "<script>alert('please upload');history.go(-1);</script>";
} else {
    $f_type = array('txt');
    $record_path = "upfile";
    if ($postf = f_postfix($f_type, $_FILES['meeting_documents']['name']) != false) {
        $new_path = time() . ".txt";
        if ($_FILES['meeting_documents']['size'] > 0 and $_FILES['meeting_documents']['size'] < 1000000) {
            $date = $_POST['b_y'] . "-" . $_POST['b_m'] . "-" . $_POST['b_d'];
            $filepath = $record_path . "\\" . $new_path;
            $sql = mysqli_query($conn, "insert into tb_meeting_info(meeting_name,meeting_depart,meeting_place,meeting_date,meeting_host,
                meeting_saver,meeting_present,meeting_abstract,meeting_address)VALUES (
                '$_POST[meeting_name]','$_POST[meeting_depart]','$_POST[meeting_place]','$date','$_POST[meeting_host]','$_POST[meeting_saver]',
                '$_POST[meeting_present]','$_POST[textarea]','$filepath')");
//            $info = mysqli_fetch_array($sql); 不可以用
            if (mysqli_insert_id ($conn)) {
                move_uploaded_file($_FILES['meeting_documents']['tmp_name'], $record_path . "\\" . $new_path);
                echo "<script>alert('添加成功');history.go(-1);</script>";
            } else {
                echo "<script>alert('添加失败');history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('over the limit');history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('only .txt form');history.go(-1);</script>";
    }
}
