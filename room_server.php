<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset='UTF-8'>
	<title>Cospace</title>

  <link rel="icon" type="image/gif/png/ico" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/scoll.css">
	<script src="js/jscolor.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<style>
  .no-js #loader { display: none;  }
  .js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.boxchat{
	  position:absolute;
	  position:fixed;
	  width:300px;
	  height:340px;
	  background-color:#444;
		border-radius: 5px;
	  z-index:99;
		bottom: 0px;
		right:20px;
		border-style: solid;
	 	border-width: 1px;
		border-color: #aaa;

	}
  </style>
	<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
	<script src="https://cdn.netpie.io/microgear.js"></script>    <!-- Microgaer library -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
  <script>
  	$(window).load(function() {
  		$(".se-pre-con").fadeOut("slow");
  	});
  </script>
	<style media="screen">
		.toolbox{
			padding: 10px;
			z-index: 1;
			width: 50px;
			background-color: #e9e9e9;
			position: absolute;
			position: fixed;
			top: 20%;
			border-radius: 5px;
			text-align: center;
		}
		.btntoolbox{
			font-size: 20px;
			color: #000;
		}
		.btntoolbox:hover{
			color: #aaa;
		}
		.btnpickercolor{
			width: 30px;
			height: 30px;
			background-color: red;
		}

	</style>
</head>
<body onload="InitThis()">
	<div class="toolbox">
		<a class="btntoolbox" href="#"><i class="	fa fa-pencil" onclick="customline()"></i></a>
		<a class="btntoolbox" href="#"><i class="	fa fa-font"></i></a>
		<a class="btntoolbox" href="#"><i class="	glyphicon glyphicon-refresh" onclick="repdf()"></i></a>
		<hr style="margin:2px; border-color:#aaa;">
		<a class="btntoolbox" href="#" onclick="ZoomIn()"><i class="fa fa-search-plus"></i></a>
		<a class="btntoolbox" href="#" onclick="ZoomOut()"><i class="fa fa-search-minus"></i></a>
		<span style="font-size:2px;">scale</span><br>
		<span id="scale" style="font-size:2px;">1.5</span>
		<hr style="margin:2px; border-color:#aaa;">
		<div style="display:none;" id="customline">
			<span style="font-size:2px;">color</span><br>
			<button class="btn btnpickercolor jscolor {valueElement:'chosen-value', onFineChange:'setTextColor(this)'}" type="button" name="button"></button>
			<hr style="margin:2px; border-color:#aaa;">
			<span style="font-size:2px;">line width</span><br>
			<a class="btntoolbox" href="#" onclick="lineWidthsoilup()"><i class="glyphicon glyphicon-plus"></i></a>
			<a class="btntoolbox" href="#" onclick="lineWidthsoildown()"><i class="glyphicon glyphicon-minus"></i></a>
			<hr style="margin:5px; border-color:#aaa;">
			<span style="font-size:2px;">view</span><br>
			<hr id="lineshow" style="margin:2px; border-color:#fff; border-width:3px;">
			<hr style="margin:5px; border-color:#aaa;">
		</div>
		<script type="text/javascript">
			function customline() {
				$('#customline').fadeIn();
				usedrawing();
			}
		</script>
	</div>
	<div class="se-pre-con"></div>
	 <div class="row">
			<div class="col-md-9">
				<div class="boxslide panel-body">
					<div class="" style="background-color:#444; padding:10px; border-radius:5px;color:#fff;" align="">
						<label for="" style="color:#fff;">Topic :</label> <span id="topic"> - </span>
						<span style="float:right;">
							&nbsp; &nbsp;
							<a id="prev" class="btn btn-info" >Previous</a>
							<a id="next" class="btn btn-info">Next</a>
							&nbsp; &nbsp;
							<span>Page: <span id="page_num">?</span> / <span id="page_count">?</span></span>
						</span>
					</div>
					<hr style="border-color:#777;">
					<div class="" style="background-color:#666;" align="center">
						<div id="uploadfile" class="" style="position:relation;background-color:#666; width:100%; height:600px;">
							<div class="center" style="width:500px;">
								<a href="#" class="btnfile" onclick="gotofile()">Upload file PDF only</a>
								<form id="uploadPDFtoserver" action="uploadPDF.php" method="post" enctype="multipart/form-data">
									<input type="file" name="fileToUpload" id="fileToUpload" style="display:none;" onchange="submitform()">
									<input type="submit" id="submitgo" value="Submit" style="display:none;"/>
								</form>
								<hr style="border-color:#777;">
								<div class="progress" id="progress" style="display:none;">
								  <div id="GOprogress" class="progress-bar progress-bar-striped active" role="progressbar"
								  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
								    40%
								  </div>
								</div>
								<div class="alert alert-danger" id="alert" style="display:none;" align="left"></div>
							</div>
						</div>
						<style media="screen">
							.cursordraw{
								cursor:url('data:image/x-icon;base64,AAACAAEAICAQAAAAAADoAgAAFgAAACgAAAAgAAAAQAAAAAEABAAAAAAAAAIAAAAAAAAAAAAAEAAAAAAAAAAAAAAAhYWFAPqv6ADgm4sASkpKAJ/l7QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACIAAAAAAAAAAAAAAAAAAAEiIAAAAAAAAAAAAAAAAAAxEiIAAAAAAAAAAAAAAAADMxEgAAAAAAAAAAAAAAAAMzMxAAAAAAAAAAAAAAAAAzMzMAAAAAAAAAAAAAAAADMzMwAAAAAAAAAAAAAAAAMzMzAAAAAAAAAAAAAAAAAzMzMAAAAAAAAAAAAAAAADMzMwAAAAAAAAAAAAAAAABTMzAAAAAAAAAAAAAAAAAFVTMAAAAAAAAAAAAAAAAABFVQAAAAAAAAAAAAAAAAAARAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD///////////////////////////////////////////////////////////////////////////////////////P////h////wP///4H///8D///+B////A////gf///wP///4H///+D////B////w////8///////////////w=='), auto;
							}
						</style>
						<canvas id="the-canvas" class="" width="100%"></canvas>
					</div>
					<hr style="border-color:#777;">

				</div>
			</div>
      <div class="col-md-3">
        <div class="boxbtn panel-body">
					<div  id="connected" align="right">
						<img src="img/logoweb.png" alt="" width="40px"><span style="color:#fff;"> Connecting </span><img src="img/ajax-loader.gif" alt="" width="40px">
					</div>
					<hr style="border-color:#777; margin:2px;">
				<!-- show next slide -->
					<div class="" align="left">
						<span style="margin:0px; color:#aaa;" >Next slide</span>
					</div>
					<canvas id="the-canvas2" width="100%"></canvas>
					<hr style="border-color:#777; margin:0px;">
				<!-- show who lookin present -->
					<div class="" align="left">
						<span style="margin:0px; color:#aaa;" >จำนวนคนที่กำลังดู presentation </span><span id="people" style="color:#fff;">(0)</span>
					</div>
					<div id="slotOnline" >
						<div class="scrollbar" id="style-1" style="background-color:#666; height:300px; overflow-y: scroll; ">
							<div class="force-overflow">
								<table class="table">
									<tbody id="slotall">
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<hr style="border-color:#777;">
			<!-- Show youfile -->
					<div class="" style="background-color:#777; padding:10px; border-radius:10px;">Your file</div>
					<hr style="border-color:#777;">
					<div class="" style="padding:10px; background-color:#666;" align="left">
					  <img src="img/Treetog-I-Documents.ico" alt="" width="25px"> All File "PDF" that you upload
						<div class="result"  style="padding-left:50px;"></div>
					</div>
        </div>
      </div>
			<!-- chat box -->
			<div class="boxchat" style="" id="chatbox">
				<div class="" style="padding:10px;">
					<label for="" style="color:#fff;">Chat box </label> &nbsp;&nbsp;&nbsp;
					<span style="background-color:red; color:#fff; padding:5px; border-radius:15px; display:none;" id="numberchat">&nbsp;10&nbsp;</span>
					<span style="float:right;">
						<a href="#" id="boxH" style="color:#fff;" onclick="chatboxhide()"><i class="glyphicon glyphicon-chevron-down"></i></a>
						<a href="#" id="boxS" style="color:#fff;display:none;" onclick="chatboxshow()"><i class="glyphicon glyphicon-chevron-up"></i></a>
					</span>
				</div>
				<div class="scrollbar chatget" id="style-1" style="background-color:#555; height:260px; overflow-y: scroll; ">
					<div class="force-overflow" id="chathtml">
						<div class="" style="background-color:#333;margin-top:10px;padding:20px; border-radius:10px; color:#fff;" align="center">
							!!! Not message chat
						</div>
					</div>
				</div>
				<input type="text" name="" onclick="readall()" id="varChat" onkeydown="if (event.keyCode == 13) { sendChat() }" class="form-control" value="" placeholder="คุณต้องการส่งอะไร">
			</div>
		</div>
</body>
</html>
<script src="js/jquery_from/jquery.form.js" ></script>
<script >

	loadpage();
	chatboxhide();
	setInterval(function() { loadpage(); },3000);
	function loadpage() {
		$( ".result" ).load( "listfile.php" );
	}
	function submitform() {
		$('#submitgo').click();
	}
	function chatboxhide() {
		$('#boxH').hide();
		$('#boxS').fadeIn();
 		$( "#chatbox" ).animate({ "top": "+=300px" }, "fast" );
	}
	function chatboxshow() {
		$('#boxS').hide();
		$('#boxH').fadeIn();
 		$( "#chatbox" ).animate({ "top": "-=300px" }, "fast" );
	}
	function gotofile() {
		$('#fileToUpload').click();
	}
	$('#uploadPDFtoserver').ajaxForm({
	 type: "post",
	 url: "uploadPDF.php",
	 dataType: 'html', // serializes the form's elements.
	 uploadProgress: function (event,position,total,percent) {
		 $('#progress').css('display','block');
		 $('#GOprogress').css('width',percent+'%');
		 $('#GOprogress').html(percent+'%');
		 console.log(percent);
	 },
	 success: function(result) {
		 var file = result.split(";");
		 console.log(result);
		 if(file[0] == 'success' ){
			seturl(file[1]);
		 }else{
			$('#alert').fadeIn();
			$('#alert').html(result);
		 }
		 //console.log(result);
	 },
	 error: function(xhr,textStatus){ alert(textStatus);}
	});
</script>
<script>
	var numberbox = 35;
	var htmlbox = "";
	var peoplelooking;
	var numPagesnow= '';
	var url = '';
	var topicToday ='';
	var htmlchat = '';
	var yourchat='';
	var numchat = 0;
	//--------------------------------pdf val--------------------------------------------
	var pdfDoc = null,
			pageNum = 1,
			pageRendering = false,
			pageNumPending = null,
			scale = 1.5,
			canvas = document.getElementById('the-canvas'),
			ctx = canvas.getContext('2d');
			canvas2 = document.getElementById('the-canvas2'),
			ctx2 = canvas2.getContext('2d');

	//---------------------------------draw----------------------------------------------
	var mousePressed = false;
	var lastX, lastY;
	var color = '#fff',lineWidthsoil = 3,mousedown,moveup,mousemove;
	var ctx,bfxy='';
	var mouseset = 0;

	function usedrawing() {
		mouseset = 1;
		$('#the-canvas').addClass('cursordraw');

	}
	function lineWidthsoilup() {
		lineWidthsoil = parseInt(lineWidthsoil) + 1;
		console.log(lineWidthsoil);
		$('#linewidth').html(lineWidthsoil);
		$('#lineshow').css('borderWidth',''+lineWidthsoil);
	}
	function lineWidthsoildown() {
		lineWidthsoil = parseInt(lineWidthsoil) - 1;
		console.log(lineWidthsoil);
		$('#linewidth').html(lineWidthsoil);
		$('#lineshow').css('borderWidth',''+lineWidthsoil);
	}
	function setTextColor(picker) {
		color =  '#' + picker.toString();
		$('#lineshow').css('borderColor',''+color);

	}
	// function stylecanvas() {

	// 	lineWidthsoil= $('#selWidth').val();
	// 	color =  $('#selColor').val();
	// }
	function InitThis() {
	  ctx = document.getElementById('the-canvas').getContext("2d");
	  $('#the-canvas').mousedown(function (e) {
			if(mouseset != 1){
				return;
			}
			mousedown = "mousedown";
			mousePressed = true;
			bfxy += (e.pageX - $(this).offset().left) +','+(e.pageY - $(this).offset().top)+"|";
			Draw(e.pageX - $(this).offset().left,e.pageY - $(this).offset().top , false);
	  });

	  $('#the-canvas').mousemove(function (e) {
				mousemove = "mousemove";
	      if (mousePressed) {
						bfxy += (e.pageX - $(this).offset().left) +','+(e.pageY - $(this).offset().top)+"|";
	          Draw(e.pageX - $(this).offset().left,e.pageY - $(this).offset().top, true);
	      }
	  });

	  $('#the-canvas').mouseup(function (e) {
				moveup = "mouseup";
				//console.log(statusnow);
	      mousePressed = false;
	  });
	    $('#the-canvas').mouseleave(function (e) {
				statusnow = "mouseleave";
	      mousePressed = false;
	  });
	}

	function Draw(x, y, isDown) {
	  if (isDown) {
	      ctx.beginPath();
				ctx.strokeStyle = color;
        ctx.lineWidth = lineWidthsoil;
	      ctx.lineJoin = "round";
	      ctx.moveTo(lastX, lastY);
	      ctx.lineTo(x, y);
	      ctx.closePath();
	      ctx.stroke();
	  }
	  lastX = x; lastY = y;
	}
	//---------------------netpie----------------------
	function readall() {
		$('#numberchat').fadeOut();
		numchat = 0;
	}
	function seturl(file) {
		topic = file.split(".");
		$('#topic').html(topic[0]);
		topicToday = topic[0];
		url = 'FilePDF_upload/'+file;
		pdf(url);
	}
	function sendChat() {
		yourchat = $('#varChat').val();
		$('#varChat').val('');
	}

	for(var i=0; i<numberbox; i++){
		htmlbox += '<tr style="background-color:#777;" id="slot'+(i+1)+'"> \
								<td style="width:50px;"> \
									<div class="slot" id="bg'+(i+1)+'">'+(i+1)+'</div> \
								</td> \
								<td align="left" style="color:#fff;" id="'+(i+1)+'">blank</td>\
							</tr>'
	}
	document.getElementById("slotall").innerHTML = htmlbox;

	const APPID = "WoodySmartDevice";		// Application ID ของอุปกรณ์ที่เชื่อมต่อ NETPIE
	const KEY = "M7kVw9eIkJHrkDM";		// Key ของอุปกรณ์ที่เชื่อมต่อ NETPIE
	const SECRET = "o7RRS3momIcIsLlSAtBwMa2zs";  // Secret ของอุปกรณ์ที่เชื่อมต่อ NETPIE
	const ALIAS = "billboard";			// ชื่ออุปกรณ์ที่เชื่อมต่อ NETPIE

	var microgear = Microgear.create({
		key: KEY,
		secret: SECRET,
		alias : ALIAS
	});

	microgear.on('message',function(topic,msg) {	// ตรวจพบข้อความที่ส่งมายังอุปกรณ์
		//console.log(topic+" : "+msg);
		var strtopic = topic.split("/");

		if(topic.indexOf("/billboard/slot")!=-1){
				var m = topic.split("/billboard/slot/");
				var data = msg.split(";");
				//console.log(m);
				$('#slot'+m[1]).fadeIn();
				document.getElementById(m[1]).innerHTML = '<span>IP Local : '+data[0]+'</span><br> \
																					 				 <span>Name : '+data[1]+'</span><br> ';
		}
		if(topic == '/WoodySmartDevice/billboard/chat/'+'TC' && strtopic[3] == 'chat'){
			console.log('y : '+msg);
			htmlchat += '<table class="" style="margin-top:10px;width:100%;" > \
										<tbody style="padding:10px;"> \
											<tr > \
													<td align="left" style="color:#fff;"> \
														<div class="" align="right"><span style="background-color:#777; padding:10px; border-radius:5px;">'
														+msg+
														'</span></div> \
													</td> \
													<td style="width:50px;"  align="center"> \
													<div class="slot" style="background-color:#50a9c6;" align="center">'+'TC'+'</div> \
													</td> \
											</tr> \
										</tbody> \
									</table>';
		 $('#chathtml').html(htmlchat);
		 $('.chatget').scrollTop($('.chatget')[0].scrollHeight);
		}
		if(topic != '/WoodySmartDevice/billboard/chat/'+'TC' && strtopic[3] == 'chat'){
			console.log('f : '+msg);
			htmlchat += '<table class="" style="margin-top:10px; width:100%;">\
										<tbody style="padding:10px;">\
											<tr >\
													<td style="width:50px;"  align="center">\
													<div class="slot" align="center">'+strtopic[4]+'</div>\
													</td>\
													<td align="left" style="color:#fff;">\
														<div class=""> <span  style="background-color:#777; padding:10px; border-radius:5px;">'
														+msg+
														'</span></div>\
													</td>\
											</tr>\
										</tbody>\
									</table>';
			numchat++;
			var audio = new Audio("audio/all-eyes-on-me.mp3");
			audio.play();
		 $('#numberchat').html('&nbsp;'+numchat+'&nbsp;');
		 $('#numberchat').fadeIn();
		 $('#chathtml').html(htmlchat);
		 $('.chatget').scrollTop($('.chatget')[0].scrollHeight);
		}
	});
	checkonline();
	setInterval(function() {
	checkonline();
},10000);
	function checkonline() {
		var checkwho = 0;
		for (var i = 0; i <= 35; i++) {
			if($('#'+i).text() == 'blank'){
				$('#slot'+i).hide();
			}else{
				checkwho++;
			}
		}
		$('#people').html('('+(checkwho-1)+')');
	}


	microgear.on('connected', function() {	  	// ตรวจสอบเมื่อเชื่อมต่ออุปกรณ์กับ NETPIE
		microgear.setAlias(ALIAS);		// กำหนดชื่ออุปกรณ์ที่เชื่อมต่อกับ NETPIE
                            // แสดงข้อความเมื่อเชื่อมต่ออุปกรณ์กับ NETPIE
		document.getElementById("connected").innerHTML = '<img src="img/logoweb.png" alt="" width="40px"> \
																											<span id="connected" style="color:#fff;"> Connected </span> \
																											<i class="glyphicon glyphicon-record" style="color:rgb(131, 166, 62);"></i>';
		microgear.subscribe("/billboard/slot/+");
		microgear.subscribe("/billboard/chat/+");
		microgear.subscribe("/billboard/draw/+");
		microgear.subscribe("/billboard/slide/");
		setInterval(function() {	 // กำหนดให้ทำงานตลอดเวลาทุกๆ 3000 มิลลิวินาที
			if(numPagesnow){
				console.log('slide num : '+numPagesnow);
				microgear.publish("/billboard/slide",numPagesnow + ';' +url+';'+topicToday+';'+scale);
				numPagesnow = '';
			}
		},200);
		setInterval(function() {	 // กำหนดให้ทำงานตลอดเวลาทุกๆ 3000 มิลลิวินาที
				if(yourchat){
					microgear.publish("/billboard/chat/"+'TC',yourchat);
					yourchat = '';
				}
		},100);
		//-----------------------draw-----------------------------------------
		setInterval(function() {
				if(mousedown == 'mousedown' ){
					console.log(mousedown);
					microgear.publish("/billboard/draw/mousedown",bfxy+';'+lineWidthsoil+';'+color);
					console.log(bfxy);
					bfxy ='';
					mousedown = 'canDraw';
				}
		},100);
		setInterval(function() {
				if(mousemove == 'mousemove' && mousedown == 'canDraw'){
					console.log(mousemove);
					microgear.publish("/billboard/draw/mousemove",bfxy+';'+lineWidthsoil+';'+color);
					console.log(bfxy+';'+lineWidthsoil+';'+color);
					bfxy ='';
					mousemove = '';
				}
		},150);
		setInterval(function() {
				if(moveup){
					console.log(moveup);
					microgear.publish("/billboard/draw/moveup",'moveup');
					microgear.publish("/billboard/draw/moveup",'moveup');
					microgear.publish("/billboard/draw/moveup",'moveup');
					moveup = '';
					mousedown = '';
				}
		},50);
	});
	microgear.on('disconnected', function() {	// ตรวจสอบเมื่อตัดการเชื่อมต่ออุปกรณ์กับ NETPIE
		// แสดงข้อความเมื่อตัดการเชื่อมต่ออุปกรณ์กับ NETPIE
		document.getElementById("connected").innerHTML = '<img src="img/logoweb.png" alt="" width="40px"> \
																											<span id="connected" style="color:#fff;"> Disconnected </span> \
																											<i class="glyphicon glyphicon-record" style="color:red;"></i>';
	});
	microgear.on('present', function(event) {	// ตรวจพบอุปกรณ์ที่เชื่อมต่อกับ NETPIE ด้วย APPID เดียวกัน
		console.log(event);
	});
	microgear.on('absent', function(event) {	// ตรวจพบว่าอุปกรณ์ที่เคยเชื่อมต่อกับ NETPIE ด้วย APPID เดียวกันหายไป
		console.log(event);
	});
	microgear.connect(APPID);  // เชื่อมอุปกรณ์กับ NETPIE

	// -----------------------------------------------------slide pdf-------------------------------------------------------------------------
	$(document).keydown(function(e) {
	    switch(e.which) {
	        case 37:onPrevPage();
								//alert('<-');// left
				        break;
	        case 39:onNextPage();
								//alert('->');// right
				        break;
	        default: return; // exit this handler for other keys
	    }
	    e.preventDefault(); // prevent the default action (scroll / move caret)
	});
	// If absolute URL from the remote server is provided, configure the CORS
	// header on that server.


	// The workerSrc property shall be specified.
	PDFJS.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';
	/**
	 * Get page info from document, resize canvas accordingly, and render page.
	 * @param num Page number.
	 */

	function renderPage(num) {
		numPagesnow = num;
		renderPage2(num);
	  pageRendering = true;
	  // Using promise to fetch the page
	  pdfDoc.getPage(num).then(function(page) {
	    var viewport = page.getViewport(scale);
	    canvas.height = viewport.height;
	    canvas.width = viewport.width;

	    // Render PDF page into canvas context
	    var renderContext = {
	      canvasContext: ctx,
	      viewport: viewport
	    };
	    var renderTask = page.render(renderContext);

	    // Wait for rendering to finish
	    renderTask.promise.then(function() {
	      pageRendering = false;
	      if (pageNumPending !== null) {
	        // New page rendering is pending
	        renderPage(pageNumPending);
	        pageNumPending = null;
	      }
	    });
	  });

	  // Update page counters
	  document.getElementById('page_num').textContent = pageNum;
	}
	function renderPage2(num) {
		num += 1;
	  pageRendering = true;
	  // Using promise to fetch the page
	  pdfDoc.getPage(num).then(function(page2) {
	    var viewport = page2.getViewport(0.4);
	    canvas2.height = viewport.height;
	    canvas2.width = viewport.width;
			var renderContext = {
				canvasContext: ctx2,
				viewport: viewport
			};
			var renderTask = page2.render(renderContext);
	  });
	}


	/**
	 * If another page rendering in progress, waits until the rendering is
	 * finised. Otherwise, executes rendering immediately.
	 */
	function queueRenderPage(num) {
	  if (pageRendering) {
	    pageNumPending = num;
	  } else {
	    renderPage(num);
	  }
	}

	/**
	 * Displays previous page.
	 */
	function onPrevPage() {
	  if (pageNum <= 1) {
	    return;
	  }
	  pageNum--;
	  queueRenderPage(pageNum);
	}
	document.getElementById('prev').addEventListener('click', onPrevPage);

	/**
	 * Displays next page.
	 */
	function onNextPage() {
	  if (pageNum >= pdfDoc.numPages) {
	    return;
	  }
	  pageNum++;
	  queueRenderPage(pageNum);
	}
	document.getElementById('next').addEventListener('click', onNextPage);

	/**
	 * Asynchronously downloads PDF.
	 */
	//pdf('FilePDF_upload/Mypresentation.pdf');
function pdf(url2) {
	$('#uploadfile').hide();
	$('#the-canvas').fadeIn();
	url = url2;
	pageNum = 1;
	PDFJS.getDocument(url).then(function(pdfDoc_) {
		pdfDoc = pdfDoc_;
		document.getElementById('page_count').textContent = pdfDoc.numPages;

		// Initial/first page rendering
		renderPage(pageNum);
	});
}

function repdf() {
	$('#uploadfile').hide();
	$('#the-canvas').fadeIn();

	PDFJS.getDocument(url).then(function(pdfDoc_) {
		pdfDoc = pdfDoc_;
		document.getElementById('page_count').textContent = pdfDoc.numPages;

		// Initial/first page rendering
		renderPage(pageNum);
	});
}
function ZoomIn() {
	console.log(scale);
	if(scale != 15){
	scale = scale + 0.1;
	$('#scale').html(scale.toFixed(1));
	console.log(scale);
		PDFJS.getDocument(url).then(function(pdfDoc_) {
			pdfDoc = pdfDoc_;
			document.getElementById('page_count').textContent = pdfDoc.numPages;
			renderPage(pageNum);
		});
	}
}
function ZoomOut() {
	console.log(scale);
	if(scale != 0.5){
		scale = scale - 0.1;
		$('#scale').html(scale.toFixed(1));
		console.log(scale);
			PDFJS.getDocument(url).then(function(pdfDoc_) {
				pdfDoc = pdfDoc_;
				document.getElementById('page_count').textContent = pdfDoc.numPages;
				renderPage(pageNum);
			});
	}
}

</script>
