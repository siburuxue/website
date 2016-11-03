$(function(){
	//当前地址栏中的地址
	var url = location.href;
	//以"/"把地址分割成若干个数组
	var arr = url.split("/");
	var arr1 = arr[5].replace('.html',"").split("?");
	var str = "/" + arr[3] + "/" + arr[4] + "/" + arr1[0];
	if($('#hid_url').val() != undefined){
		str = $('#hid_url').val()
	}
	$('.sidebar-nav a').each(function(){
		var $this = $(this);
		if($(this).attr('href') == str){
			$(this).parent().addClass('active');
			$('.sidebar-nav > div + ul').hide(1,function(){
				$this.parents('ul').show(1);
			});
		}
	});
	$('.sidebar-nav > div').click(function(){
		if($(this).next().css('display') == "none"){
			$(this).next().show();
		}else{
			$(this).next().hide();
		}
	});
	//个人信息
	$('#userinfo > li > a').css('color',"#FFF");
	$('#userinfo > li > a').toggle(function(){
		$('#userinfo > li > ul').show();
		$('#userinfo > li > ul > li').show();
	},function(){
		$('#userinfo > li > ul').hide();
		$('#userinfo > li > ul > li').hide();
	});
});
//验证特殊字符
function chkStr(obj){
	var str = "~`!@#$%^&*()+=[]{}|\\'\";:,.<>/?~·！@#￥%……&*（）-+={}【】、|；：‘“”’《，。》、？";
	var arr = str.split("");
	for(var i = 0;i < arr.length;i++){
		if(obj.indexOf(arr[i]) != -1){
			return false
		}
	}
	return true;
}
//随机生成字符串
//obj:生成的字符串长度
function randomString(obj){
	var str = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var randomStr = "";
	for(var i = 0;i < obj;i++){
		var num = Math.ceil(Math.random() * 10000000 % 35);
		randomStr += str[num];
	}
	return randomStr;
}
//数字CHECK(整数)
function chkNumbers(obj){
	var reg = /^[0-9]*[1-9][0-9]*$/;
	return reg.test(obj);
}
//数字CHECK(小数)
function chkDecimal(obj){
	var reg = /^\d+[.]?\d*$/;
	return reg.test(obj);
}
//邮箱CHECK
function chkMail(obj){
	var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return reg.test(obj);
}
//数字格式化 made by 郭鑫
//numObj:十进制整数
function numFormat(obj){
	if(!chkNumbers(obj.replace(".",""))){
		return false;
	}else{
		var numFormat=obj.toString();
		var l=numFormat.match(/^\d*/)[0].length;
		var m=l%3?l%3:3; 
		numFormat=numFormat.slice(0,m)+numFormat.slice(m,l).replace(/(\d{3})/g,",$1")+numFormat.slice(l);  
		return numFormat;
	}	
}
//汉字CHCEK
function charChk(obj){
	var reg = /^[u4E00-u9FA5]+$/;
	return reg.test(obj);
}