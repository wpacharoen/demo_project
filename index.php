<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset='UTF-8'>
	<title>Cospace</title>
  <link rel="icon" type="image/gif/png/ico" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <style>
  .no-js #loader { display: none;  }
  .js #loader { display: block; position: absolute; left: 100px; top: 0; }
  </style>
</head>
<body>
	<div class="se-pre-con"></div>
   <div class="container-fluid" style="padding-top:50px;">
      <div class="col-md-4 col-md-offset-4" >
        <div class="boxbtn">
          <img src="img/logoweb.png" alt="" width="150px"><br>
          <label for="" style="font-size:20px;color:#fff;">Cospace</label>
          <hr style="border-color:#777;">
          <a href="room_server.php" class=" button "><i class="glyphicon glyphicon-user"></i> Professor</a><br>
          <a href="room_client.php" class=" button "><i class="glyphicon glyphicon-education"></i> Students</a><br>
          <hr style="border-color:#777;">
					<div class="" style="background-color:#444; padding:15px; border-radius:10px;color:#fff;" align="center">
						<h5>คำชี้แจง</h5>
						<p>ปุ่ม <i class="glyphicon glyphicon-user"></i> Professor สำหรับอาจารย์ผู้สอนเท่านั้น</p>
						<p>ปุ่ม <i class="glyphicon glyphicon-education"></i> Students สำหรับนักศึกษาที่สนใจเข้าร่วมการบรรยาย</p>
					</div>
        </div>
      </div>
   </div>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
   <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
   <script>
   	$(window).load(function() {
   		$(".se-pre-con").fadeOut("slow");;
   	});
   </script>
</body>
</html>
