<?php
header('Access-Control-Allow-Origin: *');
echo "ok";
$fileName="";
system("sh run.sh ../video/{$fileName}");