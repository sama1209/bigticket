<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>巨票儿</title>
  <link rel="stylesheet" href="/bigticket/Public/css/home/public.css ">
  <link rel="stylesheet" href="/bigticket/Public/css/home/index.css">
	 <link rel="stylesheet" href="/bigticket/Public/css/home/list.css">
 </head>
 <body>
	<!-- 头部 -->
	<header class="clear">
		<a href="index.html">
			<img src="Image/index/logo.jpg" width="46" height="46" border="0" alt="巨票儿">
			巨票儿
		</a>
		<div class="lf nav">
			<ul>
				<li><a href="/bigticket/index.php?m=home&c=index&a=index" >首页</a></li>
				<li><a href="/bigticket/index.php?m=home&c=movies&a=index">电影</a></li>
				<li><a href="/bigticket/index.php?m=home&c=list&a=index" class="active">榜单</a></li>
				<li><a href="/bigticket/index.php?m=home&c=list&a=index">预告</a></li>
			</ul>
		</div>
		<form class="search-form lf" target="_blank">
			<input class="search" name="seek" type="search" placeholder="按电影名搜索"></input>
			<input class="submit" type="submit" value="" target="_blank"></input>
		</form>
		<div class="rt login">
			<img src="Image/index/login.png" width="40px" height="40px" border="0" alt="">
			<b></b>
			<div>
				<a href="register.html">注册</a>
				<a href="login.html">登录</a>
			</div>
		</div>
	</header>
	<div id="sortList">
		<ul class="sortList">
			<li id="hot" class="active">热映口碑榜<span></span></li>
			<li id="expected">最受期待榜<span></span></li>
			<li id="ticketNum">票房榜<span></span></li>
		</ul>
	</div>
	<!-- 热映口碑榜 -->
	<div id="hotContent" class="public">
		<ul>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No1Name">超凡战队</a></p>
					<p>主演：<span class="No1Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No1Time">xxxx-xx-xx</span></p>
					<span id="No1score">8.6</span>
				</div>
				<span class="No1Logo"></span>
				<a href="detail_movie.html" id="No1Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No2Name">摔跤吧！爸爸</a></p>
					<p>主演：<span class="No2Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No2Time">xxxx-xx-xx</span></p>
					<span id="No2score">8.6</span>
				</div>
				<span class="No2Logo"></span>
				<a href="detail_movie.html" id="No2Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No3Name">异星觉醒</a></p>
					<p>主演：<span class="No3Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No3Time">xxxx-xx-xx</span></p>
					<span id="No3score">8.6</span>
				</div>
				<span class="No3Logo"></span>
				<a href="detail_movie.html" id="No3Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No4Name">拆弹·专家</a></p>
					<p>主演：<span class="No4Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No4Time">xxxx-xx-xx</span></p>
					<span id="No4score">8.6</span>
				</div>
				<span class="No4Logo"></span>
				<a href="detail_movie.html" id="No4Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No5Name">银河护卫队2</a></p>
					<p>主演：<span class="No5Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No5Time">xxxx-xx-xx</span></p>
					<span id="No5score">8.6</span>
				</div>
				<span class="No5Logo"></span>
				<a href="detail_movie.html" id="No5Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No6Name">毒诫</a></p>
					<p>主演：<span class="No6Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No6Time">xxxx-xx-xx</span></p>
					<span id="No6score">8.6</span>
				</div>
				<span class="No6Logo"></span>
				<a href="detail_movie.html" id="No6Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No7Name">春娇救志明</a></p>
					<p>主演：<span class="No7Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No7Time">xxxx-xx-xx</span></p>
					<span id="No7score">8.6</span>
				</div>
				<span class="No7Logo"></span>
				<a href="detail_movie.html" id="No7Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No8Name">麻烦家族</a></p>
					<p>主演：<span class="No8Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No8Time">xxxx-xx-xx</span></p>
					<span id="No8score">8.6</span>
				</div>
				<span class="No8Logo"></span>
				<a href="detail_movie.html" id="No8Img"></a>
			</li>
		</ul>
	</div>
	<!-- 最受期待榜 -->
	<div id="expectedContent" class="public">
		<ul>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No1Name">变形金刚5：最后的..</a></p>
					<p>主演：<span class="No1Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No1Time">xxxx-xx-xx</span></p>
					<span id="No1expectNums"><strong>423423</strong> 人想看</span>
				</div>
				<span class="No1Logo"></span>
				<a href="detail_movie.html" id="No1Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No2Name">战狼2</a></p>
					<p>主演：<span class="No2Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No2Time">xxxx-xx-xx</span></p>
					<span id="No2expectNums"><strong>423423</strong> 人想看</span>
				</div>
				<span class="No2Logo"></span>
				<a href="detail_movie.html" id="No2Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No3Name">超凡战队</a></p>
					<p>主演：<span class="No3Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No3Time">xxxx-xx-xx</span></p>
					<span id="No3expectNums"><strong>423423</strong> 人想看</span>
				</div>
				<span class="No3Logo"></span>
				<a href="detail_movie.html" id="No3Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No4Name">拆弹·专家</a></p>
					<p>主演：<span class="No4Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No4Time">xxxx-xx-xx</span></p>
					<span id="No4expectNums"><strong>423423</strong> 人想看</span>
				</div>
				<span class="No4Logo"></span>
				<a href="detail_movie.html" id="No4Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No5Name">春娇救志明</a></p>
					<p>主演：<span class="No5Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No5Time">xxxx-xx-xx</span></p>
					<span id="No5expectNums"><strong>423423</strong> 人想看</span>
				</div>
				<span class="No5Logo"></span>
				<a href="detail_movie.html" id="No5Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No6Name">毒诫</a></p>
					<p>主演：<span class="No6Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No6Time">xxxx-xx-xx</span></p>
					<span id="No6expectNums"><strong>423423</strong> 人想看</span>
				</div>
				<span class="No6Logo"></span>
				<a href="detail_movie.html" id="No6Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No7Name">神奇女侠</a></p>
					<p>主演：<span class="No7Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No7Time">xxxx-xx-xx</span></p>
					<span id="No7expectNums"><strong>423423</strong> 人想看</span>
				</div>
				<span class="No7Logo"></span>
				<a href="detail_movie.html" id="No7Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No8Name">加勒比海盗5</a></p>
					<p>主演：<span class="No8Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No8Time">xxxx-xx-xx</span></p>
					<span id="No8expectNums"><strong>423423</strong> 人想看</span>
				</div>
				<span class="No8Logo"></span>
				<a href="detail_movie.html" id="No8Img"></a>
			</li>
		</ul>
	</div>
	<!-- 票房榜 -->
	<div id="ticketNumContent" class="public">
		<ul>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No1Name">变形金刚5：最后的..</a></p>
					<p>主演：<span class="No1Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No1Time">xxxx-xx-xx</span></p>
					<span id="No1tiketNums">总票房：<strong>142</strong>千万</span>
				</div>
				<span class="No1Logo"></span>
				<a href="detail_movie.html" id="No1Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No2Name">拆弹·专家</a></p>
					<p>主演：<span class="No2Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No2Time">xxxx-xx-xx</span></p>
					<span id="No2tiketNums">总票房：<strong>114</strong>千万</span>
				</div>
				<span class="No2Logo"></span>
				<a href="detail_movie.html" id="No2Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No3Name">摔跤吧！爸爸</a></p>
					<p>主演：<span class="No3Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No3Time">xxxx-xx-xx</span></p>
					<span id="No3tiketNums">总票房：<strong>77</strong>千万</span>
				</div>
				<span class="No3Logo"></span>
				<a href="detail_movie.html" id="No3Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No4Name">记忆大师</a></p>
					<p>主演：<span class="No4Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No4Time">xxxx-xx-xx</span></p>
					<span id="No4tiketNums">总票房：<strong>67</strong>千万</span>
				</div>
				<span class="No4Logo"></span>
				<a href="detail_movie.html" id="No4Img"></a>
			</li>
			<li>
				<div id="" class="rt">
					<p><a href="detail_movie.html" id="No5Name">银河护卫队2</a></p>
					<p>主演：<span class="No5Actors">xxx,xxxxx,xxxxxx</span></p>
					<p>上映时间：<span class="No5Time">xxxx-xx-xx</span></p>
					<span id="No5tiketNums">总票房：<strong>16</strong>千万</span>
				</div>
				<span class="No5Logo"></span>
				<a href="detail_movie.html" id="No5Img"></a>
			</li>
		</ul>
	</div>
	<!-- 尾部 -->

	<!-- 尾部 -->
	<footer>
		<div>友情链接：<a href="http://www.dytt8.net/">电影天堂</a></div>
		<p>&copy;2017 巨票儿电影&nbsp;&nbsp;制作团队：罗利泰&nbsp;何晓畅&nbsp;刘念祖&nbsp;陈文婷</p>
		<p>Technology:HTML/CSS/JavaScript/PHP/MySql</p>
	</footer>
	<script src="/bigticket/Public/js/home/jquery.js"></script>
	<script src="/bigticket/Public/js/home/public.js"></script>
	<script>
        //定义一个分类查询函数
        var publicDivs = document.querySelectorAll("div.public");
        var sortLis = document.querySelectorAll("#sortList ul li");
        for(var i = 0; i < sortLis.length; i++){
            sortLis[i].onclick = function(){
                for(var i = 0; i < sortLis.length; i++){
                    sortLis[i].className = "";
                }
                this.className = "active";
                for(var i = 0; i < sortLis.length; i++){
                    if(sortLis[i].className == "active"){
                        publicDivs[i].style.display = "block";
                    }else{publicDivs[i].style.display = "none";}
                }
            }
        }

        var hotSpans = document.querySelectorAll("#hotContent ul li>span");
        for(var i = 1;i < hotSpans.length;i++){
            hotSpans[i].innerHTML = (i+1);
        }
        var expectSpans = document.querySelectorAll("#expectedContent ul li>span");
        for(var i = 1;i < expectSpans.length;i++){
            expectSpans[i].innerHTML = (i+1);
        }
        var totalTicketSpans = document.querySelectorAll("#ticketNumContent ul li>span");
        for(var i = 1;i < totalTicketSpans.length;i++){
            totalTicketSpans[i].innerHTML = (i+1);
        }
        var Imgs = document.querySelectorAll("div.public ul li>a");
        var names = document.querySelectorAll("div.public ul li>div>p a");
        for(var i = 0;i < Imgs.length;i++){
            Imgs[i].style.backgroundImage = "url(Image/list/" + names[i].innerHTML + ".jpg)";
        }
	</script>
 </body>
</html>