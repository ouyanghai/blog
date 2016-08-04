var DEG = 0;//
var face_index = 0;
var LENGTH = 0;
var HALF = 0;
var DEG_NUM = 0;//转动单位
var PIC_INDEX = 0;//相册照片显示序列
var THUMB_INDEX = 0;
$(function(){
	gotop();
	$('#gotop').click(function(){
		$(document).scrollTop(0);	
	});
	$("#container li").each(function(index){
		LENGTH = $("#container").children("li").length;
		HALF = parseInt(LENGTH/2);
		DEG = 360/LENGTH;
		$(this).css("-webkit-transform","rotateY("+index*DEG+"deg) translateZ(350px)");
	});
	$("#container li").click(function(e){
		index = $(this).index();
		var tdeg = 0;//转动度数
		var back_index = (face_index>HALF) ? face_index-HALF:face_index+HALF;
		if((face_index<back_index &&(index<face_index||index>back_index))||(face_index>back_index&&(index>back_index&&index<face_index))){
			DEG_NUM += index>face_index?(LENGTH-index+face_index):(face_index-index);
		}else{
			DEG_NUM -= index>=face_index?index-face_index:LENGTH-face_index+index;
		}
		tdeg = DEG_NUM*DEG;
		$("#container").css("-webkit-transform","rotateY("+tdeg+"deg)");
		face_index = index;
	});
	$("#thumb-pic li").click(function(e){
		index = $(this).index();
		$("#thumb-pic li").eq(PIC_INDEX).find("div").show();
		$("#main-pic li").eq(PIC_INDEX).hide();

		PIC_INDEX = index;
		$("#thumb-pic li").eq(PIC_INDEX).find("div").hide();
		$("#main-pic li").eq(PIC_INDEX).css("display","table");
	});

	$("#main-pic li").eq(PIC_INDEX).css("display","table");
	$("#thumb-pic li").eq(PIC_INDEX).find("div").hide();
	//上一张图片
	$("#main-pic #prev").click(function(){
		var len = $("#main-pic li").length;
		$("#main-pic li").eq(PIC_INDEX).hide();
		$("#thumb-pic li").eq(PIC_INDEX).find("div").show();
		PIC_INDEX -= 1;
		if(PIC_INDEX < 0){
			PIC_INDEX += 1;
		}
		$("#main-pic li").eq(PIC_INDEX).css("display","table");
		$("#thumb-pic li").eq(PIC_INDEX).find("div").hide();
	});
	//下一张图片
	$("#main-pic #next").click(function(){
		var len = $("#main-pic li").length;
		$("#main-pic li").eq(PIC_INDEX).hide();
		$("#thumb-pic li").eq(PIC_INDEX).find("div").show();
		PIC_INDEX += 1;
		if(PIC_INDEX >= len){
			PIC_INDEX -=1;
		}
		$("#main-pic li").eq(PIC_INDEX).css("display","table");
		$("#thumb-pic li").eq(PIC_INDEX).find("div").hide();
	});
	$("#thumb-next").click(function(){
		var len = $("#thumb-box li").length;
		THUMB_INDEX = THUMB_INDEX+6<len-1 ?THUMB_INDEX+6: THUMB_INDEX; 
		$("#thumb-box li").each(function(index){
			$("#thumb-pic li").eq(index).hide();
		});
		for (var j = 0; j < 6; j++) {
			if(THUMB_INDEX+j <len){
				$("#thumb-pic li").eq(THUMB_INDEX+j).show();	
			}
		};
		
	});
	$("#thumb-prev").click(function(){
		var len = $("#thumb-box li").length;
		THUMB_INDEX = THUMB_INDEX-6>=0 ?THUMB_INDEX-6: THUMB_INDEX; 
		$("#thumb-box li").each(function(index){
			$("#thumb-pic li").eq(index).hide();
		});
		for (var j = 0; j < 6; j++) {
			if(THUMB_INDEX+j <len){
				$("#thumb-pic li").eq(THUMB_INDEX+j).show();	
			}
		};
		
	});
	//
	$("#container li").mouseover(function(){
		if($(this).index() == face_index){
			$(this).find("a").css("height","30px");	
			$(this).find("span").css("height","30px");
		}
	}).mouseout(function(){
		$(this).find('a').css('height','0px');
		$(this).find('span').css('height','0px');
	});
	
    $("#close-x").click(function(){
    	$("#album-mask").hide();
    	$(document.body).css("overflow","visible");
    });
    if($("#album-mask").css("display") == 'block'){
    	$(document.body).css("overflow","hidden");
    }
});

function gotop(){
	h = $(window).height();
	t = $(document).scrollTop();
	if(t > 0){
		$('#gotop').show();
	}else{
		$('#gotop').hide();
	}
}

$(window).scroll(function(e){
	gotop();		
});
function cpraise(id){
	$.ajax({
		type: 'post',
		url:"/web/cpraise",
		dataType: 'json',
		data:{click:1,id:id},
		beforeSend:function(){
			$("#cpraise").prop("href","javascript:;");
		},
		success:function(data){
			if(data.success == true){
				$("#cpraise").html(data.praise);
			}
		},
		error:function(){
			alert("网络不给力！");
		}
	});
}
