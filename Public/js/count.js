/**
 * 计数器JS文件，计算阅读量s
 */
var newsIds = {};
$(".news_count").each(function(i){
	//把数据获取到数组中
	newsIds[i] = $(this).attr("news-id");
});

//调试
console.log(newsIds);

url = '/singcms/index.php?c=index&a=getCount';
$.post(url,newsIds,function(result){
	if(result.status == 1){
		console.log(result.data);
//		counts = result.data;
//		$.each(counts,function(news_id,count){
//			console.log(news_id+count);
//			$(".node-".news_id).html(count);
//		});
	}
},"JSON");