/*
*Copyright 2014 sealiu
*Author:SEALiu
*Date:2014-2-19
*/
addEvent(window,'load',function(){
	addEvent(document.getElementById('button-add-question-xz'),'click',changeHiddenShow_Xz);
});

addEvent(window,'load',function(){
	addEvent(document.getElementById('button-add-question-pd'),'click',changeHiddenShow_Pd);
});

addEvent(window,'load',function(){
	addEvent(document.getElementById('close-add-question-xz'),'click',close);
});
addEvent(window,'load',function(){
	addEvent(document.getElementById('close-add-question-pd'),'click',close);
});
addEvent(window,'load',function(){
	addEvent(document.getElementById('begin-to-compete'),'click',begin_to_compete);
});
addEvent(window,'load',function(){
	addEvent(document.getElementById('alert-info'),'click',changeHiddenShow_AlertInfo);
});
function addEvent(obj, type, fn) {
	if (typeof obj.addEventListener != 'undefined') {
		obj.addEventListener(type, fn, false);
	} else if (typeof obj.attachEvent != 'undefined') {
		obj.attachEvent('on' + type, function () {
			fn.call(obj, window.event);
		});
	}
}
function changeHiddenShow_Xz(){
	var xz=document.getElementById('add-question-xz');
	var pd=document.getElementById('add-question-pd');
	if(xz.className=="show"){
		xz.className="hidden";
	}else if(xz.className=="hidden"){
		xz.className="show";
		pd.className="hidden";
	}
}

function changeHiddenShow_Pd(){
	var xz=document.getElementById('add-question-xz');
	var pd=document.getElementById('add-question-pd');
	if(pd.className=="show"){
		pd.className="hidden";
	}else if(pd.className=="hidden"){
		pd.className="show";
		xz.className="hidden";
	}
}
function close(){
	var xz=document.getElementById('add-question-xz');
	var pd=document.getElementById('add-question-pd');
	xz.className="hidden";
	pd.className="hidden";
}
function changeHiddenShow_AlertInfo(){
	var a=document.getElementById("copy-info");
	a.className=="hidden"? a.className="show":a.className="hidden";
}
