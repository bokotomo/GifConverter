<!DOCTYPE html>
<html lang="ja"> 
<head>
<meta charset="utf-8">
<title>GifConverter</title>
<meta name="viewport" content="width=device-width">
<link rel='stylesheet' href='design.css?id=1'>
<script src="js/jquery-2.0.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  showFiles();
});

function showFiles(){
  AjaxProc("https://tomo.syo.tokyo/gifconverter/cgi/get_all_file.php", "data=1", function(data){
    var videoFiles = JSON.parse(data["video"]);
    var gifFiles = JSON.parse(data["gif"]);

    $("#gif-area").html("");
    for(i=0;i<gifFiles.length;i++){
      var str = "<div style='background-image: url(./gif/"+gifFiles[i]+");width:200px;height:120px;float:left;background-size: cover;background-position: 50% 50%;'></div>";
      $("#gif-area").append(str);
    }
    $("#video-area").html("");
    for(i=0;i<videoFiles.length;i++){
      var str = "<div>"+videoFiles[i]+"</div>";
      $("#video-area").append(str);
    }
  });
}

function AjaxProc(url, postdata, callback){
  //alert(postdata);
	$.ajax({
		url: url,
		type: 'POST',
		data: postdata,
		success: function(data) {
			//alert(data);
			data = JSON.parse(data);
			callback(data);
		}
	});
}

$(document).on('click','#upload-area-send-button',function(){
  var upload_movie_form = document.getElementById("upload_movie_form");
  upload_movie_form.click();
});

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
  ).done(function(text){
    alert(text);
    showFiles();
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
    <div id="upload-area-send-button">Upload</div>
  </div>
  <div id="gif-show-area">
    <div id="gif-area"></div>
    <div class="clear-fix"></div>
  </div>
  <div id="video-show-area">
    <h2>Videos</h2>
    <div id="video-area"></div>
  </div>
</div>
</body>
</html>