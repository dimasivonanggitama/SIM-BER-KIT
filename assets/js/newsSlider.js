var i = 1;
var iterationInitializationNews;
var opacity = 0;
var opacity_interval;
var elem = [];
var pos = [];
//document.getElementById("obj1").style.opacity = 0;

for (iterationInitializationNews = 1; iterationInitializationNews <= totalNews; iterationInitializationNews++) {
	elem[iterationInitializationNews] = document.getElementById("obj"+iterationInitializationNews);
	
	if (iterationInitializationNews >= 4) {
		//fadeOut(iterationInitializationNews);
		//pos[iterationInitializationNews] = 0;
 		//elem[iterationInitializationNews].style.left = pos[iterationInitializationNews] + 'px'; 
 		//elem[iterationInitializationNews].style.height = 393 + 'px'; 
	}
}
		
if (totalNews > 2) moveObj();

function fadeIn(parameter) {
	opacity = Math.round((opacity + 0.0078125) * 100) / 100;
	document.getElementById("obj"+parameter).style.opacity = opacity;
	if (opacity == 1) clearInterval(opacity_interval);
}

function fadeOut(parameter) {
	document.getElementById("obj"+parameter).style.opacity = 0;
	opacity = 0;
}

function moveObj() {
	switch (i) {
		default:
			//pos[i] = -780;
			if (i == totalNews) i = 1;
			else i++;
			//if (pos[i] = -1170)
			//alert(i);
			//break;
		case 1:
			pos[1] = 0;
			pos[2] = 0;
			pos[3] = 0;
			break;
		case 2:
			pos[1] = 780;
			pos[2] = -390;
			pos[3] = -390;
			break;
		case 3:
			pos[1] = 390;
			pos[2] = 390;
			pos[3] = -780;
			break;
	}
	//penentuan golongan untuk j yang lebih besar dari 3
	//var j;
	//while (true) {
	//	j = i - 3;
	//	if (j = 1) {
	//		pos[1] = 0;
	//		pos[2] = 0;
	//		pos[3] = 0;
	//		break;
	//	}
	//	if (j = 2) {
	//		pos[1] = 780;
	//		pos[2] = -390;
	//		pos[3] = -390;
	//		break;
	//	}
	//	if (j = 3) {
	//		pos[1] = 780;
	//		pos[2] = -390;
	//		pos[3] = -390;
	//		break;
	//	}
	//}
		
	//if (i = 1 || i == i + 3

	var frame_interval = setInterval(frame, 1);
	function frame() {
		if (pos[1] == -390) {
			clearInterval(frame_interval);
			clearInterval(opacity_interval);
			fadeOut(1);
			elem[1].style.left = 780 + 'px';
			opacity_interval = setInterval(fadeIn, 15.625, 1);
			if (i == totalNews) i = 1;
			else i++;
			setTimeout(moveObj, 3000);
		} else if (pos[1] == 390 && i != 3) {
      			clearInterval(frame_interval);
      			clearInterval(opacity_interval);
			fadeOut(2);
  			elem[2].style.left = 390 + 'px';
			opacity_interval = setInterval(fadeIn, 15.625, 2);
			if (i == totalNews) i = 1;
			else i++;
			setTimeout(moveObj, 3000);
		} else if (pos[1] == 0 && i == 3) {
      			clearInterval(frame_interval);
      			clearInterval(opacity_interval);
			fadeOut(3);
  			elem[3].style.left = 0 + 'px';
			opacity_interval = setInterval(fadeIn, 15.625, 3);
			if (i == totalNews) i = 1;
			else i++;
			setTimeout(moveObj, 3000);
		} else if (i >= 4) {
      			//clearInterval(frame_interval);
      			//clearInterval(opacity_interval);
			//fadeOut(i);
  			//elem[i].style.left = 0 + 'px';
			//opacity_interval = setInterval(fadeIn, 15.625, 3);
			//if (i == totalNews) i = 1;
			//else i++;
			//setTimeout(moveObj, 3000);
 			//pos[i] -= 2.5;
 			//elem[i].style.left = pos[i] + 'px'; 
			//back to the first object
		} else {
 			//do movement first!
			pos[1] -= 2.5;
			pos[2] -= 2.5;
 			pos[3] -= 2.5;
 			elem[1].style.left = pos[1] + 'px'; 
  			elem[2].style.left = pos[2] + 'px'; 
  			elem[3].style.left = pos[3] + 'px'; 
		}
	}
}