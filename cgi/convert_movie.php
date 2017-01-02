<?php
header('Access-Control-Allow-Origin: *');

if($_FILES["file"]["tmp_name"]){
  list($fileName, $fileType) = explode(".",$_FILES['file']['name']);
  checkFileType($fileType);
  $fileFullName = date("YmdHis").".".$fileType;
  $fileDir = __DIR__."/../video";
  if (move_uploaded_file($_FILES['file']['tmp_name'], "{$fileDir}/{$fileFullName}")) {
    chmod("{$fileDir}/{$fileFullName}", 0644);
    //system("sh run.sh ../video/{$fileName}");
  }
}

function checkFileType($fileType){
  if($fileType != "mov"){
    exit(1);
  }
}