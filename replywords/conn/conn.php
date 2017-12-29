<?php
$conn = new mysqli("localhost", "root", '', 'db_guestbook');
//mysqli_select_db($conn,"db_guestbook");
mysqli_query($conn, "set name UTF-8");
mysqli_query($conn, "set names UTF8");

