<?php
    $nameA=$nameB='';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
	if(isset($_POST["texta"])){
	    $nameA=test_input($_POST['texta']);
	}   
	if(isset($_POST['textb'])){
	    $nameB=test_input($_POST['textb']);
	}   
    }

    

    function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	 return $data;
    }
    echo <<<_END
    <!DOCTYPE html>
    <html>
      <head>
        <title>index</title>
      </head>
 
     <body>
	  <form method="post" action="" style="margin-left: 50px">
	    A: <input type="text" name="texta">
	    B: <input type="text" name="textb">
	       <input type="submit" value="Submit">
	  </form>
	<br><br>
	
	<div align="center">
	<p>
	R: <span id="rVal"></span>
	G: <span id="gVal"></span>
	B: <span id="bVal"></span>
	</p>
	<canvas id = "schema" width = "600" height = "400" ></canvas>
	    
	</div>
	
	
	<script type="text/javascript">
    	
        	var canvas = document.getElementById('schema');
        	var context = canvas.getContext('2d');
        	var destX = 0;
			var destY = 0;

			var imageObj = new Image();
			imageObj.onload = function()
			{
				context.drawImage(imageObj, destX, destY,imageObj.width,imageObj.height,0,0,canvas.width,canvas.height);
			};
    		imageObj.src = "Heatmap.jpg";

		canvas.onclick = function(e) {
   	 		var x = e.clientX;
   	 		var addx = canvas.offsetLeft;;
    		var y = e.clientY;
    		var addy = canvas.offsetTop;
    		var canvasColor = context.getImageData(x-addx, y-addy,1, 1); // rgba e [0,255]
    		var pixels = canvasColor.data;
    		var r = pixels[0];
    		var g = pixels[1];
    		var b = pixels[2];
    		document.body.style.backgroundColor = "rgb("+r+','+g+','+b+")";
    		document.getElementById("rVal").innerText = r;
    		document.getElementById("gVal").innerText = g;
    		document.getElementById("bVal").innerText = b;
		}
		

	</script>
		
	</body>
</html>
_END;
?>
