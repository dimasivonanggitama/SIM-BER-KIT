
		var elem = document.getElementById("obj1");
		var elem2 = document.getElementById("obj2");
		var elem3 = document.getElementById("obj3");
		
		document.getElementById("obj1").style.opacity = 0;

		moveObj1();
		var opacity = 0;
		var opacity_interval;
		function fadeIn() {
			opacity = Math.round((opacity + 0.0078125) * 100) / 100;
			document.getElementById("obj1").style.opacity = opacity;
		}
		function fadeInObj2() {
			opacity = Math.round((opacity + 0.0078125) * 100) / 100;
			document.getElementById("obj2").style.opacity = opacity;
		}
		function fadeInObj3() {
			opacity = Math.round((opacity + 0.0078125) * 100) / 100;
			document.getElementById("obj3").style.opacity = opacity;
		}


		function fadeOut() {
			document.getElementById("obj1").style.opacity = 0;
			opacity = 0;
		}
		function fadeOutObj2() {
			document.getElementById("obj2").style.opacity = 0;
			opacity = 0;
		}
		function fadeOutObj3() {
			document.getElementById("obj3").style.opacity = 0;
			opacity = 0;
		}
  		function moveObj1() {
			var pos = 0;
			var pos2 = 0;
			var pos3 = 0;
			var id = setInterval(frame, 1);
			function frame() {
  				if (pos == -390) {
      					clearInterval(id);
      					clearInterval(opacity_interval);
					fadeOut();
  					elem.style.left = 780 + 'px';
					opacity_interval = setInterval(fadeIn, 15.625);
					setTimeout(moveObj2, 3000);
  				} else {
	 				//start movement here!
  					pos = pos - 2.5;
					pos2 = pos2 - 2.5;
  					pos3 = pos3 - 2.5;
  					elem.style.left = pos + 'px'; 
  					elem2.style.left = pos2 + 'px'; 
  					elem3.style.left = pos3 + 'px'; 
				}
			}
		}
  		function moveObj2() {
			var pos = 780;
			var pos2 = -390;
			var pos3 = -390;
			var id = setInterval(frame, 1);
			function frame() {
  				if (pos == 390) {
      					clearInterval(id);
      					clearInterval(opacity_interval);
					fadeOutObj2();
  					elem2.style.left = 390 + 'px';
					opacity_interval = setInterval(fadeInObj2, 15.625);
					setTimeout(moveObj3, 3000);
  				} else {
	 				//next
  					pos = pos - 2.5;
					pos2 = pos2 - 2.5;
  					pos3 = pos3 - 2.5;
  					elem.style.left = pos + 'px'; 
  					elem2.style.left = pos2 + 'px'; 
  					elem3.style.left = pos3 + 'px'; 
				}
			}
		}
  		function moveObj3() {
			var pos = 390;
			var pos2 = 390;
			var pos3 = -780;
			var id = setInterval(frame, 1);
			function frame() {
  				if (pos == 0) {
      					clearInterval(id);
      					clearInterval(opacity_interval);
					fadeOutObj3();
  					elem3.style.left = 0 + 'px';
					opacity_interval = setInterval(fadeInObj3, 15.625);
					setTimeout(moveObj1, 3000);
	 				//back to moveObj1
  				} else {
	 				//next
  					pos = pos - 2.5;
					pos2 = pos2 - 2.5;
  					pos3 = pos3 - 2.5;
  					elem.style.left = pos + 'px';
  					elem2.style.left = pos2 + 'px';
  					elem3.style.left = pos3 + 'px'; 
				}
			}
		}