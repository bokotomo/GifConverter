<?php
$dir = __DIR__.'/gif';
$files = scandir($dir);
?><!DOCTYPE html>
<html lang="ja"> 
<head>
<meta charset="utf-8">
<title>GifConverter</title>
<meta name="viewport" content="width=device-width">
<link rel='stylesheet' href='design.css'>
<script src="js/jquery-2.0.2.min.js"></script>
<script type="text/javascript">

function uploadMovieButton(){
  var upload_movie_form = document.getElementById("upload_movie_form");
  upload_movie_form.click();
}

function uploadMovie(){
  postdata = "data=1";
  AjaxProc("https://tomo.syo.tokyo/gifconverter/cgi/convert_movie.php",postdata,{
    
  });
}

function AjaxProc(url, postdata, callback){
  var req = new XMLHttpRequest();
  req.open('POST', url, true);
  req.setRequestHeader('content-type','application/x-www-form-urlencoded;charset=UTF-8');
  req.send('name=' + encodeURIComponent(document.fm.name.value));
  var data = eval('(' + req.responseText + ')');
  alert(data);
}
</script>
</head>
<body>
<div id="page">

<div id="upload-area">
  <form onchange="uploadMovie();">
    <input type="file" id="upload_movie_form" style="display: none;">
  </form>
  <div id="upload-area-send-button" onclick="uploadMovieButton();">Upload</div>
</div>
<div style="width:800px;margin:20px auto 0px;">
  <?php
  foreach($files as $v){
    if($v != "." && $v != ".."){
      echo "<div style='background-image: url(./gif/{$v});width:200px;height:120px;float:left;background-size: cover;background-position: 50% 50%;'></div>";
    }
  }
  ?>
</div>
</div>
</body>
</html>