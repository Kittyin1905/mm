;window.requestAnimationFrame = window.requestAnimationFrame||function(a){return setTimeout(a,1000/60)};
window.cancelAnimationFrame = window.cancelAnimationFrame||clearTimeout;
function FragmentBanner(option) {

	
	this.whiteList = ['container','controller','size','imgs','size','grid','index','fnTime','boxTime','type'];

	
	this.container = '.banner';
	
	
	this.controller = {
		view : '.banner-view',
		btn : '.banner-btn',
		num : '.banner-number',
		progre : '.banner-progres'
	};

	
	this.grid = {
		line : 5,
		list : 10
	};

	
	this.size = {
		width : 1200,
		height : 675,
	};

	
	this.type = 1;

	
	this.index = 0;

	
	this.fnTime = 5000;

	
	this.boxTime = 2000;

	
	this.activeTime = new Date();

	for(var a = 0,attrLenght = this.whiteList.length; a < attrLenght;a++){

		var attr = this.whiteList[a];
		if(option[attr] != undefined){

			this[attr] = option[attr];
		}
	}
	for(var i in option){

		if(this.whiteList[i] !== undefined){ ; }
	}

	this.init();
}

FragmentBanner.prototype = {

	constructor : FragmentBanner,

	init : function(){

		this.container = document.querySelector(this.container)
		if(!this.container){

			return alert('Acquire banner failed');
		}else{

			this.container.style.width = this.size.width+'px';
			this.container.style.height = this.size.height+'px';
		}
		
		this.elem = {};
		for(var e in this.controller){

			this.elem[e] = this.container.querySelector(this.controller[e]);
			if(this.elem[e] == null){

				return alert('Acquire'+e+'container');
			}
		}

		
		var w = this.size.width / this.grid.list,
			h = this.size.height / this.grid.line;

		this.elem.viewBox = new Array();
		for(var i = 0,iL = this.grid.line;i < iL;i++){

			for(var j = 0,jL = this.grid.list;j < jL;j++){

				var newI = document.createElement('i');

				this.setCss(newI,{
					width : w+'px',
					height : h+'px',
					left : 0,
					top : 0,
					opacity : 1,
					backgroundImage : 'url("'+this.imgs[this.index]+'")',
					backgroundSize : this.size.width + 'px ' + this.size.height +'px',
					backgroundPosition : w * -j+'px ' + h * -i+'px'
				});
				
				this.elem.view.appendChild(newI);
				this.elem.viewBox.push(newI);
			}
		}

		
		for (var b = 1; b >= 0; b--) {
			
			var oB = document.createElement('span');
			(b) ? oB.innerHTML = '&lt;' : oB.innerHTML = '&gt;';
			oB.setIndex = b;
			oB.onclick = function(obj){

				this.show({
					switch : true,
					change : obj.setIndex == 0
				});

			}.bind(this,oB);
			this.elem.btn.appendChild(oB);
		}

		
		for(var n = 0,nL = this.imgs.length; n < nL;n++){

			var oI = document.createElement('i');

			oI.setIndex = n;
			oI.onclick = function(obj){

				
				this.show({
					switch : true,
					change : obj.setIndex
				});
			}.bind(this,oI)
			this.elem.num.appendChild(oI);
		}
		this.elem.numFind = this.elem.num.querySelectorAll('i');

		
		this.progre = new Array;
		for(var p = 1;p >= 0;p--){

			var oP = document.createElement('i');
			this.setCss(oP,{
				width : 0,
				backgroundColor : p ? '#00c3ff' : '#ffc300'
			});
			this.elem.progre.appendChild(oP);
			this.progre.push(oP);
		}

		
		this.show();

		this.elem.numFind[this.index].className = 'on';
	},

	setIndex : function(){

		this.index %= this.imgs.length;
		
		this.index = (this.index < 0) ? this.imgs.length - 1 : this.index;

		this.elem.numFind[this.index].className = 'on'; 
	},

	getTypeTime : function(){

		var timer = new Array();
		switch(this.type){

			case 1:

				timer.push(this.boxTime / 4 + Math.random() * this.boxTime / 4);
				timer.push(timer[0]);
			break;

			default:

				timer.push([Math.random() * this.boxTime / 5,this.boxTime / 10 * 3]);
				timer.push(timer[0][0] + timer[0][1]);
			break;
		}

		return timer;
	},
	
	show : function(order){

		order = order || {};

		if(new Date() >= this.activeTime){

			this.elem.numFind[this.index].className = '';

			this.setCss(this.progre[1],{width : 0})
				.anime(this.progre[1],{
					width : this.size.width
				},this.fnTime,function(){

					this.show({
						switch : true,
						change : true
					});
				}.bind(this));
			
			var status = true,
				activeTime = 0;

			for( var i = 0,iL = this.elem.viewBox.length;i < iL;i++ ){

				var startTime = this.getTypeTime(),
					endTime = this.getTypeTime(),
					obj = this.elem.viewBox[i];

					activeTime = Math.max(activeTime,startTime[1] + endTime[1]);
				
				this.anime(obj,{
					left :  Math.ceil(Math.random() * this.size.width * 2 - this.size.width),
					top : Math.ceil(Math.random() * this.size.height * 2 - this.size.height),
					opacity: 0
				}, startTime[0] ,function(obj){

					if(order.switch && status){
					
						if(/number/i.test(typeof order.change)){

							this.index = order.change;
						}else{

							(order.change) ? ++this.index : --this.index;
						}
						
						this.setIndex();
						this.elem.numFind[this.index].className = 'on';
						status = false;
					}

					this.setCss(obj,{backgroundImage : 'url("'+this.imgs[this.index]+'")'})
						.anime(obj,{
							left : 0,
							top : 0,
							opacity : 1
						},endTime[0]);
				}.bind(this,obj));
			}

			
			this.activeTime = new Date(new Date().getTime() + activeTime);

			this.setCss(this.progre[0],{width : 0})
				.anime(this.progre[0],{
					width : this.size.width
				},activeTime);
		}
	},

	setCss : function(obj,json){

		for( c in json){

			if(c == 'opacity'){

				obj.style.opacity = c;
				obj.style.filter = "alpha(opacity="+ (json[c]*100) +")";
			}else{

				obj.style[c] = json[c];
			}
		}

		return this;
	},

	anime : function(obj,attr,endTime,callback) {

		(obj.timer) && cancelAnimationFrame(obj.timer);

		var cssJosn = obj.currentStyle || getComputedStyle(obj,null),
			start = {},end = {},goTime;

		
		for(var key in attr){

			if(attr[key] != parseFloat(cssJosn[key])){

				start[key] = parseFloat(cssJosn[key]);
				end[key] = attr[key] - start[key];
			}
		}

		goTime = new Date();

		if(endTime instanceof Array){

		 	(function delayFn(){

		 		if((new Date() - goTime) >= endTime[0]){

		 			endTime = endTime[1];
		 			goTime = new Date();
		 			ref();
		 		}else{

		 			obj.timer = requestAnimationFrame(delayFn);
		 		}
		 	})();
		}else{

			ref();
		}


		function ref(){

			var prop = (new Date() - goTime) / endTime;
			(prop >= 1) ? prop = 1 : obj.timer = requestAnimationFrame(ref);
			for(var key in start){

				var val = -end[key] * prop *(prop-2) + start[key];

				if(key == 'opacity'){

					obj.style.opacity = val;
					obj.style.filter = "alpha(opacity="+ (val*100) +")";
				}else{

					obj.style[key] =  val+'px';
				}
			}

			(prop === 1) && callback && callback.call(obj);
		};
	}
}


