<?php
header('Access-Control-Allow-Origin: *');
echo "ok";

if($_FILES["file"]["tmp_name"]){
  list($file_name,$file_type) = explode(".",$_FILES['file']['name']);
  $fileName = date("YmdHis").".".$file_type;
  $file = "../video/";
  if (move_uploaded_file($_FILES['file']['tmp_name'], $file."/".$name)) {
    chmod($file."/".$name, 0644);
    system("sh run.sh ../video/{$fileName}");
  }
}