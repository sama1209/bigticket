/**
 *文章管理页面，添加按钮操作 
 */
$("#button-add").click(function(){
	var url = SCOPE.add_url;
	window.location.href = url;
});

//进行购票,get方法，传送scene_id，到具体的场次页面
$("#button-buy").click(function(){
    var id = $(this).attr('attr-id');
    var url = SCOPE.select_url +'&id='+id;
    // alert(url);
	console.log(url);
    window.location.href = url;
});


$("#singcms-button-buy").click(function(){
    //通过序列化表单值来创建对象数组
    var data = $("#singcms-form").serializeArray();
    //再把他存到一个关联数组里面
    postData = {};
    $(data).each(function(i){
        //存到一个对象数组中
        postData[this.name] = this.value;
        //console.log(this.value);
    });
    //console.log(postData);
    //把获取到的数据post给服务器
    //  路径很重要
    //不同的视图上的save_url是不同的，实际上是每个都有自己的add方法，但必须指出其控制器名称
    //一个方法，只需要在定义不同的路径，就可以重复利用，不错
    url = SCOPE.save_url;
    //  /singcms/admin.php?c=menu
    jump_url = SCOPE.jump_url;
    $.post(
        url,
        postData,
        function(result){
            window.location.href=jump_url;
        },"JSON");
});


/*
 *提交form表单操作 
 */
$("#singcms-button-submit").click(function(){
	//通过序列化表单值来创建对象数组
	var data = $("#singcms-form").serializeArray();
	//再把他存到一个关联数组里面
	postData = {};
	$(data).each(function(i){
		//存到一个对象数组中
		postData[this.name] = this.value;
		//console.log(this.value);
	});
	//console.log(postData);
	//把获取到的数据post给服务器
	//  路径很重要
	//不同的视图上的save_url是不同的，实际上是每个都有自己的add方法，但必须指出其控制器名称
	//一个方法，只需要在定义不同的路径，就可以重复利用，不错
	url = SCOPE.save_url;
	//  /singcms/admin.php?c=menu
	jump_url = SCOPE.jump_url;
	$.post(
			url,
			postData,
			function(result){
				console.log("test outside");
		if(result.status == 1){
			console.log("test");
			//window.location.href=jump_url;
			//成功
			return dialog.success(result.message,jump_url);
		}else if(result.status == 0){
			//失败
			return dialog.error(result.message);
		}
	},"JSON");
	// dialog.success('提交成功',jump_url);
	// window.location.href=jump_url;
});

/*
 * 编辑模型
 */
$('.singcms-table #singcms-edit').on('click',function(){
	console.log("1231321")
	var id = $(this).attr('attr-id');
	var url = SCOPE.edit_url +'&id='+id;
	//地址+ID跳转
	window.location.href = url;
});

/*
 * 删除操作JS
 */
$('.singcms-table #singcms-delete').on('click',function(){
	var id = $(this).attr('attr-id');
	var a = $(this).attr('attr-a');
	var message = $(this).attr("attr-message");
	//传入路径，找到了controller层中的setStatus方法
	var url = SCOPE.set_status_url;
	
	data = {};
	data['id'] = id;
	data['status'] = -1;
	
	layer.open({
		type : 2,
		title : '是否提交？',
        btn: ['yes', 'no'],
		icon : 3,
		closeBtn : 2,
		content : "是否确定" + message,
		scrollbar : true,
		yes: function(){
			//若缺点，执行相关跳转
			todelete(url,data);
		},
	});
	
});
/*
 * 真正的操作请求
 */
function todelete(url,data){
	$.post(
		     //具体的url地址会不同模块调用不一样
			//向/singcms/admin.php?c=menu&a=setStatus 中提交data数据，并且返回json格式的返回值
			url,
			data,
			function(s){
				if(s.status ==1){
					return dialog.success(s.message,'');
				}else{
					return dialog.error(s.message);
				}			
			}
		,"JSON");
}

/*
 * 排序操作
 */
$('#button-listorder').click(function(){
	//获取当前页面上Listorder的内容
	//序列化表单，创建对象数组
	var data = $("#singcms-listorder").serializeArray();
	postData = {};
	$(data).each(function(i){
		postData[this.name] = this.value;
	});
	console.log(postData);
	//'listorder_url' : '/singcms/admin.php?c=menu&a=listorder'
	var url = SCOPE.listorder_url;
	$.post(url,postData,function(result){
				if(result.status == 1){
					//成功				
					return dialog.success(result.message,result['data']['jump_url']);
				}else if(result.status == 0){
					//失败
					return dialog.error(result.message,result['data']['jump_url']);
				}		
			},"JSON");	
});

/*
 * 推送js相关
 */
$('#singcms-push').click(function(){
	var id = $("#select-push").val();
	if(id == 0){
		return dialog.error("请选择推荐位");
	}
	push = {};
	postData = {};
	$("input[name='pushcheck']:checked").each(function(i){
		push[i] = $(this).val();
	});
	
	//最后post给服务器，
	postData['push'] = push;//文章主键id的列表
	postData['position_id'] = id;
	
	var url  = SCOPE.push_url;
	$.post(url,postData,function(result){
		if(result.status == 1){
			return dialog.success(result.message,result['data']['jump_url']);
		}
		if(result.status == 0){
			return dialog.error(result.message);
		}
	},"JSON");
});


/**
 * 修改状态
 */
$('.singcms-table #singcms-on-off').on('click', function(){
	//attr 获取该属性的值
    //前端页面上attr-id属性，在这里就可以兼容地为所有的控件得到一个Id，无论是menu，news还是什么的，都是以有attr-id这一属性，厉害
    var id = $(this).attr('attr-id');
    var status = $(this).attr("attr-status");
    //要跳转的url
    var url = SCOPE.set_status_url;

    var data = {};
    data['id'] = id;
    data['status'] = status;

    layer.open({
        type : 2,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定更改状态",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url, data);
        },

    });

});