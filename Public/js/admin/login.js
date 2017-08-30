/**
 * 前端登录业务类
 */
var login = {
		check:function(){
			//获取用户名和密码
			 var username = $('input[name="username"]').val();
			 var password = $('input[name="password"]').val();
             var passcode = $('input[name="passcode"]').val();


			//前端筛选一次
			if(!username){
				dialog.error("用户名不能为空");
			}
			if(!password){
				dialog.error("密码不能为空");
			}
            if(!passcode){
                dialog.error("验证码不能为空");
            }
			//执行异步请求  $.post
			var url = "/bigticket/index.php?m=admin&c=login&a=check";
			var mydata = {'username':username,'password':password,'passcode':passcode};

			console.log(mydata);

			$.post(url,mydata,function(result){
				if(result.status == 0){
					return dialog.error(result.message);
				}
				if(result.status == 1){
					// console.log("success");
					// exit();
					return dialog.success(result.message,'/bigticket/admin.php?m=admin&c=index&a=index');
				}
			},'JSON');



            // $.ajax({
            //     url:url,
            //     type:"POST",
            //     data:mydata,
            //     // contentType:"application/x-www-form-urlencoded; charset=UTF-8",
            //     dataType:"JSON",
            //     success: function(){
            //         if(result.status == 0){
            //             		return dialog.error(result.message);
            //             	}
				// 	if(result.status == 1){
            //             		return dialog.success(result.message,'/bigticket/admin.php?m=admin&c=index&a=index');
            //             	}
            //     }
            // });
		}
}