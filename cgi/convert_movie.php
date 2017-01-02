<?php
header('Access-Control-Allow-Origin: *');

run();

function run(){
  if($_FILES["file"]["tmp_name"]){
    list($fileName, $fileType) = explode(".", $_FILES['file']['name']);
    checkFileType($fileType);
    $fileFullName = date("YmdHis").".{$fileType}";
    $fileDir = __DIR__."/../video";
    if (move_uploaded_file($_FILES['file']['tmp_name'], "{$fileDir}/{$fileFullName}")) {
      chmod("{$fileDir}/{$fileFullName}", 0644);
      $runFile = __DIR__."/run.sh";
      $videoFile = __DIR__."/../video/{$fileName}";
      system("sh {$runFile} {$videoFile}");
    }
  }
}

function checkFileType($fileType){
  if($fileType != "mov" && $fileType != "mp4"){
    exit(1);
  }
}