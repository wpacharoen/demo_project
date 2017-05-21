
<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset='UTF-8'>
	<title>Cospace</title>
  <link rel="icon" type="image/gif/png/ico" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/scoll.css">
	<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <style>
  .no-js #loader { display: none;  }
  .js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.modal {
	    display: none; /* Hidden by default */
	    position: fixed; /* Stay in place */
	    z-index: 1; /* Sit on top */
	    padding-top: 100px; /* Location of the box */
	    left: 0;
	    top: 0;
	    width: 100%; /* Full width */
	    height: 100%; /* Full height */
	    overflow: auto; /* Enable scroll if needed */
	    background-color: rgb(0,0,0); /* Fallback color */
	    background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
	}
  </style>
	<script src="https://cdn.netpie.io/microgear.js"></script>    <!-- Microgaer library -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
  <script>
  	$(window).load(function() {
  		$(".se-pre-con").fadeOut("slow");
  	});
  </script>
</head>
<body onload="InitThis()">
	<div class="se-pre-con"></div>
   <div class="container-fluid boxslide" style="padding:5px;">
        <div class="" align="center">
					<div class="" align="left" style="position:relation;background-color:#333;padding:10px;border-radius:5px;">
						<img src="img/logoweb.png" alt="" width="80px"><label for="" style="font-size:20px;color:#fff;">Cospace</label>
						<span id="data" style="color:#fff; float:right; font-size:15px; padding:10px; background-color:#444; border-radius:10px;" align="right">
							<span > Connecting </span><img src="img/ajax-loader.gif" alt="" width="40px">
						</span>
						<span style="color:#fff; float:right; font-size:15px; padding:10px;  border-radius:10px;" align="center">
							<div class=" " style="width:60px;height:60px; padding:18px;  border-radius:35px; background-color:rgb(99, 195, 87); ">
								<span id="yourslot" style="padding-left:0;">?</span>
							</div>
						</span>
						<div class="center" style="color:#fff; top:50px;">
							<label for="">Topic: </label><span id="topic"> - </span>
						</div>
					</div>
					<hr style="border-color:#777;">
					<div class="col-md-9" style="background-color:#666;">
						<div class="panel-body">
							<div class="" id="loadingpdf" style="height:600px;padding-top:190px;">
								<img src="img/logoweb.png" alt="" width="80px">
								<label for=""> Wait for host..</label>
								<img src="img/Loading.gif" alt="" width="80px">
							</div>
							<canvas id="the-canvas" width="100%" style="display:none; background-color:#666;"></canvas>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel-body" style="background-color:#444;" align="left">
							<label for="" style="color:#fff;font-size:18px;">Question and Answer</label>
							<hr style="border-color:#aaa;">
							<div class="scrollbar chatget" id="style-1" style="background-color:#555; height:400px; overflow-y: scroll; ">
								<div class="force-overflow" id="chathtml">
									<div class="" style="background-color:#333;margin-top:10px;padding:50px; border-radius:10px; color:#fff;" align="center">
										No message
									</div>
								</div>
							</div>
							<div class="input-group">
								 <input type="text" id="varChat" class="form-control" placeholder="คุณต้องการถามอะไร" onkeydown="if (event.keyCode == 13) { sendChat() }">
								 <div class="input-group-btn">
									 <button class="btn btn-info" type="submit" onclick="sendChat()">
										 ส่ง
									 </button>
								 </div>
							 </div>
						</div>
					</div>
        </div>


   </div>

	 <div id="myModal" class="modal">
		 <!-- Modal content -->
		 <div class="col-md-2 col-md-offset-5">
			 <div class="boxslide" style="" align="center">
				 <input type="text" name="" id="yourname" class="form-control" style="width:80%;" placeholder="ชื่อ-นามสกุล" onkeydown="if (event.keyCode == 13) { setname() }">
				 <a href="#" class="btn btn-info btn-lg" style="margin:20px;" onclick="setname()">Apply</a><br>
				 <strong style="color:red; display:none;" id="alertname">**กรุณาใส่ชื่อคุณ**</strong>
			 </div>
		 </div>
	 </div>
	 </div>
</body>
</html>

<script>
	const APPID = "WoodySmartDevice"; 	//Application ID ของอุปกรณ์ที่เชื่อมต่อ NETPIE
	const KEY = "M7kVw9eIkJHrkDM";	// Key ของอุปกรณ์ที่เชื่อมต่อ NETPIE
	const SECRET = "o7RRS3momIcIsLlSAtBwMa2zs"; //Secret ของอุปกรณ์ที่เชื่อมต่อ NETPIE

	const ALIAS = "htmlgear";		// ชื่ออุปกรณ์ที่เชื่อมต่อ NETPIE
	var slot = (Math.floor(Math.random()*100)%34) + 1, // ใส่ slot number ของผู้ใช้ที่ได้รับ assign
			iplocal = '', 	// บอก ip client
			name = '',
		  url = '',
			yourchat = '',
			htmlchat = '',
					cbx = '',
					cby = '';
			//---------------------------------draw----------------------------------------------
			var mousePressed = false;
			var lastX, lastY;
			var ctx;

			function Draw(x, y,Color,Width,isDown) {
			  if (isDown) {
			      ctx.beginPath();
			      ctx.strokeStyle = Color;
			      ctx.lineWidth = Width;
			      ctx.lineJoin = "round";
			      ctx.moveTo(lastX, lastY);
			      ctx.lineTo(x, y);
			      ctx.closePath();
			      ctx.stroke();
			  }
			  lastX = x; lastY = y;
			}
			//---------------------netpie----------------------
	var microgear = Microgear.create({
	   key: KEY,
	   secret: SECRET,
	   alias : ALIAS
	});

	if(name==''){
		setTimeout(function() {
			  $('#myModal').fadeIn("slow");
			}, 500);
	}
	function sendChat() {
		yourchat = $('#varChat').val();
		$('#varChat').val('');
	}
	function setname() {
		if($('#yourname').val() != ''){
			name = $('#yourname').val();
			$('#myModal').fadeOut("slow");
			document.getElementById("data").innerHTML = "Name : "+name+"<br> IP local : "+iplocal+"<br> Slot : "+slot;
			document.getElementById("yourslot").innerHTML = slot;
		}else{
			$('#alertname').fadeIn();
		}

	}
	function getColor(){
	   return '#' + Math.random().toString(16).slice(2, 8).toUpperCase();
	}
var test = false;
	microgear.on('message',function(topic,msg) { //ตรวจพบข้อความที่ส่งมายังอุปกรณ์
		 var strtopic = topic.split("/");

		 if(strtopic[3] == 'slide'){
			 var data = msg.split(";");
			 url = data[1];
			 $('#topic').html(' '+data[2])
			 $('#loadingpdf').hide();
			 $('#the-canvas').fadeIn();
			 if(!test){
			 	createpdf(parseInt(data[0]),url,data[3]);
				test = true;
				var start = data[4];
				var end = new Date().getTime();
    		console.log('load milliseconds passed: ', end - start);


			}else{
				queueRenderPage(parseInt(data[0]));
				var start = data[4];
				var end = new Date().getTime();
    		console.log('change slide milliseconds passed: ', end - start);

			}

		 }
		 if(topic == '/WoodySmartDevice/billboard/chat/'+slot && strtopic[3] == 'chat'){
			 console.log('y : '+msg);
			 htmlchat += '<table class="" style="margin-top:10px;width:100%;"> \
										 <tbody style="padding:10px;"> \
											 <tr > \
													 <td align="left" style="color:#fff;"> \
														 <div class="" align="right"><span style="background-color:#777; padding:10px; border-radius:5px;">'
														 +msg+
														 '</span></div> \
													 </td> \
													 <td style="width:50px;"  align="center"> \
													 <div class="slot" align="center">'+slot+'</div> \
													 </td> \
											 </tr> \
										 </tbody> \
									 </table>';
			$('#chathtml').html(htmlchat);
			$('.chatget').scrollTop($('.chatget')[0].scrollHeight);
		 }
		 if(topic != '/WoodySmartDevice/billboard/chat/'+slot && strtopic[3] == 'chat'){
			 console.log('f : '+msg);
			 htmlchat += '<table class="" style="margin-top:10px; width:100%;">\
										 <tbody style="padding:10px;">\
											 <tr >\
													 <td style="width:50px;"  align="center">';
				 if(strtopic[4] == 'TC'){
					 htmlchat +=  '<div class="slot" style="background-color:#50a9c6;" align="center">'+strtopic[4]+'</div>'
				 }else{
					 htmlchat +=  '<div class="slot" align="center">'+strtopic[4]+'</div>'
				 }
					htmlchat +=  '</td>\
													 <td align="left" style="color:#fff;">\
														 <div class=""> <span  style="background-color:#777; padding:10px; border-radius:5px;">'
														 +msg+
														 '</span></div>\
													 </td>\
											 </tr>\
										 </tbody>\
									 </table>';
			var audio = new Audio("audio/all-eyes-on-me.mp3");
	    audio.play();
			$('#chathtml').html(htmlchat);
			$('.chatget').scrollTop($('.chatget')[0].scrollHeight);
		 }
		 if(topic == '/WoodySmartDevice/billboard/draw/mousedown'){
			 console.log('status :'+strtopic[4]);
			 console.log('data : '+msg);
			 var datasplit = msg.split(";");
			 var xyall = datasplit[0].split("|");
			 for (var i = 0; i < xyall.length; i++) {
				 var xy = xyall[0].split(",");
				 console.log(xy[0]+','+xy[1]);
				 ctx = document.getElementById('the-canvas').getContext("2d");
				 mousePressed = true;
				 Draw(xy[0],xy[1],datasplit[2],datasplit[1],false);
			 }
		 }
		 if(topic == '/WoodySmartDevice/billboard/draw/mousemove'){
			 console.log('status : '+strtopic[4]);
			 console.log('data : '+msg);
			 var datasplit = msg.split(";");
			 var xyall = datasplit[0].split("|");
			 for (var i = 0; i < xyall.length; i++) {
				 var xy = xyall[0].split(",");
				 console.log(xy[0]+','+xy[1]);
				 ctx = document.getElementById('the-canvas').getContext("2d");
				 mousePressed = true;
				 Draw(xy[0],xy[1],datasplit[2],datasplit[1],true);
			 }
		 }
		 if(topic == '/WoodySmartDevice/billboard/draw/moveup'){
			 console.log('status :'+strtopic[4]);
			 mousePressed = false;
		 }
	});
	microgear.on('connected', function() { //ตรวจสอบเมื่อเชื่อมต่ออุปกรณ์กับ NETPIE
		 microgear.subscribe("/billboard/slide");
		 microgear.subscribe("/billboard/chat/+");
		 microgear.subscribe("/billboard/draw/+");
	   microgear.setAlias(ALIAS);  //กำหนดชื่ออุปกรณ์ที่เชื่อมต่อกับ NETPIE
	  setInterval(function() {	 // กำหนดให้ทำงานตลอดเวลาทุกๆ 3000 มิลลิวินาที
				if(name){
					microgear.publish("/billboard/slot/"+slot,iplocal+';'+name);
				}
		},500);
		setInterval(function() {	 // กำหนดให้ทำงานตลอดเวลาทุกๆ 3000 มิลลิวินาที
				if(yourchat){
					microgear.publish("/billboard/chat/"+slot,yourchat);
					yourchat = '';
				}
		},100);
	});

	microgear.on('disconnected', function() {	//ตรวจสอบเมื่อตัดการเชื่อมต่ออุปกรณ์กับ NETPIE
                 // แสดงข้อความเมื่อตัดการเชื่อมต่ออุปกรณ์กับ NETPIE
	   document.getElementById("data").innerHTML = "Now I am disconnected with netpie...";

	});

	// ตรวจพบอุปกรณ์ที่เชื่อมต่อ NETPIE ด้วย APPID เดียวกัน
	microgear.on('present', function(event) {
		console.log(event);
	});

	//ตรวจพบเหตุการณ์ที่อุปกรณ์เคยเชื่อมต่อ NETPIE ด้วย APPID เดียวกันหายไป
	microgear.on('absent', function(event) {
		console.log(event);
	});

	microgear.connect(APPID);  // เชื่อมอุปกรณ์กับ NETPIE

	// get local ip
var RTCPeerConnection = window.webkitRTCPeerConnection || window.mozRTCPeerConnection;

if (RTCPeerConnection) (function () {
    var rtc = new RTCPeerConnection({iceServers:[]});
    if (1 || window.mozRTCPeerConnection) {
        rtc.createDataChannel('', {reliable:false});
    };

    rtc.onicecandidate = function (evt) {
        if (evt.candidate) grepSDP("a="+evt.candidate.candidate);
    };
    rtc.createOffer(function (offerDesc) {
        grepSDP(offerDesc.sdp);
        rtc.setLocalDescription(offerDesc);
    }, function (e) { console.warn("offer failed", e); });


    var addrs = Object.create(null);
    addrs["0.0.0.0"] = false;
    function updateDisplay(newAddr) {
        if (newAddr in addrs) return;
        else addrs[newAddr] = true;
        var displayAddrs = Object.keys(addrs).filter(function (k) { return addrs[k]; });
				iplocal = displayAddrs.join(" or perhaps ") || "n/a";
				console.log('Your local IP : '+iplocal);
    }

    function grepSDP(sdp) {
        var hosts = [];
        sdp.split('\r\n').forEach(function (line) {
            if (~line.indexOf("a=candidate")) {
                var parts = line.split(' '),
                    addr = parts[4],
                    type = parts[7];
                if (type === 'host') updateDisplay(addr);
            } else if (~line.indexOf("c=")) {
                var parts = line.split(' '),
                    addr = parts[2];
                updateDisplay(addr);
            }
        });
    }
})(); else {

		iplocal =  "IP for Device";
}
//---------------------------------------------------------slide-------------------------------------------------------


// The workerSrc property shall be specified.
PDFJS.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

var pdfDoc = null,
		pageNum = 1,
		pageRendering = false,
		pageNumPending = null,
		scale = 1.5,
		canvas = document.getElementById('the-canvas'),
		ctx = canvas.getContext('2d');

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */

function renderPage(num) {
	numPagesnow = num;
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
}
function queueRenderPage(num) {
	if (pageRendering) {
		pageNumPending = num;
	} else {
		renderPage(num);
	}
}

function onPrevPage() {
	if (pageNum <= 1) {
		return;
	}
	pageNum--;
	queueRenderPage(pageNum);
}

function onNextPage(num) {
	if (pageNum >= pdfDoc.numPages) {
		return;
	}
	queueRenderPage(num);
}

 function createpdf(num,url,size) {
	 scale = size;
	 PDFJS.getDocument(url).then(function(pdfDoc_) {
		 pdfDoc = pdfDoc_;
		 renderPage(num);
	 });
 }

 function ZoomIn_Out() {
 	console.log($('#mySelect').val());
 	if(url == ''){
 		scale = $('#mySelect').val();
 	}else{
 		PDFJS.getDocument(url).then(function(pdfDoc_) {
 			scale = $('#mySelect').val();
 			pdfDoc = pdfDoc_;
 			document.getElementById('page_count').textContent = pdfDoc.numPages;
 			renderPage(pageNum);
 		});
 	}
 }

</script>
