<?php
/**
 * Created by PhpStorm.
 * User: 无双大吊
 * Date: 2017/12/25
 * Time: 15:00
 */
session_start();
session_destroy();
echo "<script>alert('success');location=('../index.php');</script>";