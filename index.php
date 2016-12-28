<!DOCTYPE html>
<html lang="ja"> 
<head>
<meta charset="utf-8">
<title>GifConverter</title>
<meta name="viewport" content="width=device-width">
<link rel='stylesheet' href='design.css'>
<script src="js/jquery-2.0.2.min.js"></script>
<script type="text/javascript">
function uploadMovie(){
  var upload_movie_form = document.getElementById("upload_movie_form");
  upload_movie_form.click();
  console.log(upload_movie_form);
  postdata = "data=1";
  AjaxProc("https://tomo.syo.tokyo/gifconverter/cgi/convert_movie.php",postdata,{
    
  });
}

function AjaxProc(url, postdata, callback){
  //alert(postdata);
	$.ajax({
		url: url,
		type: 'POST',
		data: postdata,
		success: function(data) {
			alert(data);
			data = JSON.parse(data);
			callback(data);
		}
	});
}
</script>
</head>
<body>
<div id="page">

<div id="upload-area">
  <form>
    <input type="file" id="upload_movie_form" style="display: none;">
  </form>
  <div id="upload-area-send-button" onclick="uploadMovie();">Upload</div>
</div>

</div>
</body>
</html>