<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://cdn.netpie.io/microgear.js"></script>

<div id="colorPicker" style="height:10px;width:50px;border-style:solid;border-width:1px" onclick="color=randomColor()"></div>
<canvas id="myCanvas" height="960" width="1280" style="cursor:pointer;"></canvas>
<script>
    const APPID     = "WoodySmartDevice";
    const APPKEY    = "RaYjZMBjkJJujyM";
    const APPSECRET = "niB4XbtgnTZMtszJmcEGgLkB2";

	var mX=0, mY=0;			// พิกัดของปากกา
	var painting = false;	// อยู่ในโหมดวาดเส้นหรือเปล่า
	var myid = Math.floor(Math.random()*100000).toString();		// สุ่ม ID ของตัวเองขึ้นมา
	var color;		// สีของเส้นของตัวเอง

	var canvas = document.getElementById("myCanvas");			// ดึง HTML DIV มาใช้
	var context = canvas.getContext("2d");						// ดึง canvas ของ DIV มาใช ตั้งชื่อตัวแปรว่า context้
	context.lineWidth = 2;										// ความหนาของเส้น = 2
	var buffer = '';

	$('#myCanvas').mousedown(function(e){
	  mX = e.pageX - this.offsetLeft;	// ตำแหน่งพิกัด X ของปากกา
	  mY = e.pageY - this.offsetTop;	// ตำแหน่งพิกัด Y ของปากกา
	  context.moveTo(mX,mY);			// เลื่อปากกา
	  painting = true;					// เข้าสู่โหมดวาดเส้น
	});

	$('#myCanvas').mouseup(function(e){
	  painting = false;				// ออกจากโหมดวาดเส้น
	});

	$('#myCanvas').mousemove(function(e){
	  if (painting) {							// ทำก็ต่อเมื่ออยู่ในโหมดวาดเส้น ก็คือ mouse down อยู่
		  context.beginPath();
		  context.lineTo(mX,mY);
		  if (!buffer) buffer = mX+','+mY+';';	// ถ้า buffer ว่างอยู่ แทรกจุดเริ่มต้นลงไป
		  mX = e.pageX - this.offsetLeft;		// ตำแหน่งพิกัด X ของปากกา
		  mY = e.pageY - this.offsetTop;		// ตำแหน่งพิกัด Y ของปากกา
		  context.lineTo(mX,mY);				// ลากเส้นบนจอตัวเอง
		  context.strokeStyle = color;			// เซตสีของตัวเอง
		  context.stroke();						// แสดงเส้น
		  buffer += mX+','+mY+';';				// append พิกีดลงในตัวแปร buffer รอส่งพร้อมกันหลายๆจุด
      }
	});

    var microgear = Microgear.create({
        key: APPKEY,
        secret: APPSECRET,
        alias : myid
    });

    // ฟังก์ชั่นสุ่มสี อัพเดตให้จานสี และ ส่งค่ากลับ
    function randomColor() {
	    var letters = '0123456789ABCDEF';
	    var c = '#';
	    for (var i = 0; i < 6; i++ ) {
	        c += letters[Math.floor(Math.random() * 16)];
	    }
		document.getElementById('colorPicker').style.backgroundColor = c;
		return c;
    }

    microgear.on('message',function(topic,msg) {
		console.log(topic+' --> '+msg);
		// ถ้า topic ของ message ที่ได้รับ ดูแล้วเป็น message ของตัวเอง ก็จะไม่ทำอะไรต่อ
		if (topic == '/'+APPID+'/draw/'+myid) return;

		//แต่ถ้าเป็น message ของคนอื่น จะเอามาประมวลผล่
		// message จะอยู่ในรูปแบบนี้ ---> สี;x1,y1;x2,y2;...;xn,yn;
		var dlist = msg.split(';');		// ตัด string ด้วยอักษร ; ได้ผลลัพธ์เป็น array --> ["สี" , "x1,y1", "x2,y2", ..., "xn,yn"]
		var dcolor = dlist[0];			// ช่องแรก จะเป็นค่าสี เช่น #FF0000 คือสีแดง

		// เริ่มจาก array ช่องที่ 1
		for (var i=1; i <dlist.length-1; i++) {
			var a = dlist[i].split(',');		// split ตามอักษร ,
			if (i>1) {							// ถ้าเป็นพิกัดแรก เราจะไม่ลากเส้น แต่จะยกปากกาไปวาง
				context.lineTo(a[0],a[1]);
			}
			else {								// ถ้าเป็นพิกัดถัดๆมา จะลากเส้นมาที่นี่
				context.beginPath();
				context.moveTo(a[0],a[1]);
			}
	    }
	    context.strokeStyle = dcolor;			// เซตสีเส้น
		context.stroke();						// สั่งให้ HTML5 canvas แสดงเส้น
    });

    microgear.on('connected', function() {
    	microgear.subscribe('/draw/+');			// subscribe การวาดของทุกคน สังเกตตรงสัญลักษณ์ +
		color = randomColor();					// สุ่มสีของตัวเองขึ้นมา
    	console.log('myID is '+myid);
    	console.log('Connected...');
    });

    microgear.connect(APPID);

	setInterval(function() {					// ทำทุก 200 ms
		if (buffer) {
			console.log(color+';'+buffer);
			microgear.publish('/draw/'+myid, color+';'+buffer);		// publish สีกับพิกัดการวาดของตัวเอง ไปที่ topic /draw/<MYID>
			buffer = '';
		}
	},200);
</script>
