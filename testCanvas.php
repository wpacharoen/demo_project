<html>
<head></head>
<body onload="InitThis();">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="JsCode.js"></script>
    <div align="center">
        <canvas id="myCanvas" width="500" height="200" style="border:2px solid black"></canvas>
        <br /><br />
        <button onclick="javascript:clearArea();return false;">Clear Area</button>
        Line width : <select id="selWidth">
            <option value="1">1</option>
            <option value="3">3</option>
            <option value="5">5</option>
            <option value="7">7</option>
            <option value="9" selected="selected">9</option>
            <option value="11">11</option>
        </select>
        Color : <select id="selColor">
            <option value="black">black</option>
            <option value="blue" selected="selected">blue</option>
            <option value="red">red</option>
            <option value="green">green</option>
            <option value="yellow">yellow</option>
            <option value="gray">gray</option>
        </select>
    </div>
</body>
</html>
<script>
var mousePressed = false;
var lastX, lastY;
var ctx;

function InitThis() {
  ctx = document.getElementById('myCanvas').getContext("2d");

  $('#myCanvas').mousedown(function (e) {
      mousePressed = true;
      Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
  });

  $('#myCanvas').mousemove(function (e) {
      if (mousePressed) {
          Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
      }
  });

  $('#myCanvas').mouseup(function (e) {
      mousePressed = false;
  });
    $('#myCanvas').mouseleave(function (e) {
      mousePressed = false;
  });
}

function Draw(x, y, isDown) {
  if (isDown) {
      ctx.beginPath();
      ctx.strokeStyle = $('#selColor').val();
      ctx.lineWidth = $('#selWidth').val();
      ctx.lineJoin = "round";
      ctx.moveTo(lastX, lastY);
      ctx.lineTo(x, y);
      ctx.closePath();
      ctx.stroke();
  }
  lastX = x; lastY = y;
}

</script>
