<?php
header('Access-Control-Allow-Origin: *');

run();

function run(){
  $gifDir = __DIR__.'/../gif/';
  $gifFiles = scandir($gifDir);
  $gifFiles = removeFilesDots($gifFiles);
  $videoDir = __DIR__.'/../video/';
  $videoFiles = scandir($videoDir);
  $videoFiles = removeFilesDots($videoFiles);
  $filesArray = [
    "video" => json_encode($videoFiles),
    "gif" => json_encode($gifFiles),
  ];
  echo json_encode($filesArray);
}

function removeFilesDots($files){
  foreach($files as $key => $val) {
    if($val == "." || $val == ".."){
      unset($files[$key]);
    }
  }
  return array_values($files);
}