/**
 * 图片上传功能
 */
$(function() {
    //横幅海报
    $('#file_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response){
                // alert(data);
                // var obj = $.parseJSON(data);
                // alert(obj.data);
                // alert(data);
                var obj = eval('('+data+')');
                // console(obj);
                //下面这部分就没执行
                $('#' + file.id).find('.data').html(' 上传完毕');
                //成功之后，就以缩略图的形式展示
                $("#upload_org_code_img").attr("src",'/bigticket'+obj.data);
                $("#file_upload_image").attr('value','/bigticket'+obj.data);
                $("#upload_org_code_img").show();
            }else{
                alert('上传失败');
            }
        },
    });

});
$(function () {
    //竖幅小图，就多了个small
    $('#file_upload_small').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                //由json字符串转化为json对象
                //alert(data);
                var obj = eval('('+data+')');

                $('#' + file.id).find('.data').html(' 上传完毕');

                $("#upload_org_code_img_small").attr("src",'/bigticket'+obj.data);
                $("#file_upload_image_small").attr('value','/bigticket'+obj.data);
                $("#upload_org_code_img_small").show();
            }else{
                alert('上传失败');
            }
        },
    });
})





