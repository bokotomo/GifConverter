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
$(document).on('change','.movieform',function(){
  var fd = new FormData();
  if($("#upload_movie_form").val()!== ''){
    fd.append("file", $("#upload_movie_form").prop("files")[0] );
  }
  fd.append("dir",$("#hoge").val());
  var postData = {
    type: "POST",
    dataType: "text",
    data: fd,
    processData: false,
    contentType: false
  };
  $.ajax(
    "https://tomo.syo.tokyo/gifconverter/cgi/convert_movie.php",
    postData
  ).done(function( text ){
    alert(text);
  });
});
</script>
</head>
<body>
<div id="page">

<div id="upload-area">
  <form class="movieform">
    <input type="file" id="upload_movie_form" name="movie_form" style="display: none;">
  </form>
<input id="hoge" type="hidden" value="hoge">
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