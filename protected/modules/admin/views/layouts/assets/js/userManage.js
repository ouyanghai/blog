$(function(){
	$("#u_sub").click(function(){
		$.ajax({
			type: 'post',
			url : '/admin/user/manage',
			dataType: 'text',
			data: $("#uform").serialize(),
			beforeSend:function(){
				$("#u_sub").html('修改中...');
				$(this).attr('disabled',true);
			},
			success: function(data){
				if(data === false){
					alert('修改失败');
					return;
				}
				alert('修改成功');
				//关闭子窗口
				var mask = window.parent.document.getElementById('mask');
				var user = window.parent.document.getElementById('user_manage');
				mask.style.display='none';
				user.style.display='none';
				//window.location.reload();
			},
			error: function(data){
				alert('操作失败');
			}
		});
	});
	$("#mod_sub").click(function(event){
		event.preventDefault();
		var username = $("#mod_user").val();
		var password = $("#mod_pass").val();
		$.ajax({
			type: 'post',
			url: '/admin/user/modpass',
			data: {username:username,password:password},
			dataType: 'json',
			success:function(data){
				if(data === true){
					alert('修改成功');	
				}else{
					alert('修改失败!'+data);
					return;
				}
			},
			error: function(){
				alert('操作失败');
			}
		});
	});
});

function userDel(id){
	$.ajax({
		type: 'post',
		url: '/admin/user/del',
		data: {id:id},
		dataType: 'json',
		success: function(data){
			if(data === false){
				alert('删除失败');
				return;
			}
			alert('删除成功');
			window.location.reload();
		},
		error: function(){
			alert('操作失败');
		}
	})
}

function getUserInfo(id){
	var url = '/admin/user/getuserinfo/id/'+id;
	$("#user_iframe").attr('src',url);
	$("#mask,#user_manage").show();
}

function close(){
	$("#mask,#user_manage").hide();
}



