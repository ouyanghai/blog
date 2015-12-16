
$(function()
{
	$("#login-form").submit(function(e){
		e.preventDefault();
		$.post(url,
			  	{'username':$('#User_username').val(),'password':$('#User_password').val()},
				function(data){
			  		if(data.code=='success'){
						$("#login").html('欢迎回来，'+data.username+',<a href="'+logout_url+'">退出</a><br/><img src="'+data.pic+'" width="40" style="padding:2px;border 1px solid #ccc"/>').css('text-align','right');
					}
				},
				'json'
		);
	});
});

/*
$(function(){
	//当表单提交的时候
	$("#login-form").submit(function(e){
		e.preventDefault();//阻止默认
		//return false;//阻止事件冒泡+阻止默认
		//ajax发送数据到一个方法当中
		$.post(url,{'username':$('#User_username').val(),'password':$('#User_password').val()},function(data){
		if(data.code=='success'){
			$("#login").html('欢迎您回来,'+data.username+',退出<br><img src="'+data.pic+'"  width="40" style="padding:2px;border:1px solid #ccc"/>').css('text-align','right');
		}
		},'json');
	});
});

*/