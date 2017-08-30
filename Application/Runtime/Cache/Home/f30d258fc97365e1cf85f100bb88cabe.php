<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>巨票儿</title>
  <link rel="stylesheet" href="/bigticket/Public/css/home/public.css ">
  <link rel="stylesheet" href="/bigticket/Public/css/home/movies.css">
 </head>
 <body>
	<!-- 头部 -->
	<header class="clear">
		<a href="index.html">
			<img src="/bigticket/Public/css/img/index/logo.jpg" width="46" height="46" border="0" alt="巨票儿">
			巨票儿
		</a>
		<div class="lf nav">
			<ul>
				<li><a href="/bigticket/index.php?m=home&c=index&a=index" >首页</a></li>
				<li><a href="/bigticket/index.php?m=home&c=movies&a=index" class="active">电影</a></li>
				<li><a href="/bigticket/index.php?m=home&c=list&a=index">榜单</a></li>
				<li><a href="advance.html">预告</a></li>
			</ul>
		</div>
		<form class="search-form lf" target="_blank">
			<input class="search" name="seek" type="search" placeholder="按电影名搜索"></input>
			<input class="submit" type="submit" value="" target="_blank"></input>
		</form>
		<div class="rt login">
			<img src="/bigticket/Public/css/img/index/login.png" width="40px" height="40px" border="0" alt="">
			<b></b>
			<div>
				<a href="register.html">注册</a>
				<a href="login.html">登录</a>
			</div>
		</div>
		</div>
	</header>
	<!-- 大的分类：正在热映、即将上映、经典影片 -->
	<div id="big_sort">
		<ul class="sort">
			<li id="hot" class="active">正在上映<span></span></li>
			<li id="coming">即将上映<span></span></li>
			<li id="classics">经典影片<span></span></li>
		</ul>
	</div>
	<!-- 详细分类 -->
	<div id="sort_details">
		<div class="type">
			<p>类型：</p>
			<div>
				<ul class="sort">
					<li class="active">全部</li>
					<li>爱情</li>
					<li>喜剧</li>
					<li>剧情</li>
					<li>动作</li>
					<li>恐怖</li>
					<li>惊悚</li>
					<li>悬疑</li>
					<li>动画</li>
					<li>犯罪</li>
					<li>科幻</li>
					<li>冒险</li>
					<li>家庭伦理</li>
					<li>战争</li>
					<li>情色</li>
					<li>歌舞</li>
					<li>武侠</li>
					<li>黑色电影</li>
					<li>纪录片</li>
					<li>其他</li>
				</ul>
			</div>
		</div>
		<!-- 分割线 -->
		<p></p>
		<div class="area">
			<p>区域：</p>
			<div>
				<ul class="sort">
					<li class="active">全部</li>
					<li>大陆</li>
					<li>美国</li>
					<li>韩国</li>
					<li>日本</li>
					<li>中国香港</li>
					<li>中国台湾</li>
					<li>法国</li>
					<li>英国</li>
					<li>泰国</li>
					<li>印度</li>
					<li>俄罗斯</li>
					<li>意大利</li>
					<li>西班牙</li>
					<li>德国</li>
					<li>加拿大</li>
					<li>其他</li>
				</ul>
			</div>
		</div>
		<!-- 分割线 -->
		<p></p>
		<div class="type">
			<p>时间：</p>
			<div>
				<ul class="sort">
					<li class="active">全部</li>
					<li>2017年以后</li>
					<li>2016年</li>
					<li>2017年</li>
					<li>2014年</li>
					<li>2017年</li>
					<li>2012年</li>
					<li>2011年</li>
					<li>2000-2010年</li>
					<li>90年代</li>
					<li>80年代</li>
					<li>其他</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 排序 -->
	<div id="order">
		<ul class="sort">
			<li class="active"><span><b>·</b></span>按热门排序</li>
			<li><span><b>·</b></span>按时间排序</li>
			<li><span><b>·</b></span>按评价排序</li>
		</ul>
	</div>
	<!-- 电影展示 -->
	<div id="sort_display">
		<ul>
			<li>
				<a href="detail_movie.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="detail_movie.html">银河护卫队2</a>
				<p>9.1</p>
			</li>
			<li>
				<a href="detail_movie.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="detail_movie.html">摔跤吧！爸爸</a>
				<p>9.8</p>
			</li>
			<li>
				<a href="detail_movie.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="detail_movie.html">拆弹·专家</a>
				<p>9.1</p>
			</li>
			<li>
				<a href="detail_movie.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="detail_movie.html">记忆大师</a>
				<p>8.6</p>
			</li>
			<li>
				<a href="detail_movie.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="detail_movie.html">速度与激情8</a>
				<p>9.4</p>
			</li>
			<li>
				<a href="detail_movie.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="detail_movie.html">喜欢你</a>
				<p>8.9</p>
			</li>
			<li>
				<a href="detail_movie.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="detail_movie.html">麻烦家族</a>
				<p>7.0</p>
			</li>	
			<li>
				<a href="detail_movie.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">春娇救志明</a>
				<p>8.7</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">超凡战队</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">蓝精灵：寻找神秘村</a>
				<p>9.0</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">亚瑟王·斗兽争霸</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">毒诫</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">加勒比海盗5</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">傲娇与偏见</a>
				<p>9.1</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">灵狼传奇</a>
				<p>8.6</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">提着心，吊着胆</a>
				<p>8.2</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">午夜惊魂路</a>
				<p>2.6</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">三生三世十里桃花</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">悟空传</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">异形：契约</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">花腰恋歌</a>
				<p>9.1</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">神奇女侠</a>
				<p>8.4</p>
			</li>
			<li>
				<a href="detail_movie.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="detail_movie.html">战狼2</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">碟仙前传</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">变形金刚5：最后的..</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">大话西游之大圣娶亲</a>
				<p>8.8</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">金刚：骷颅岛</a>
				<p>8.6</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">异星觉醒</a>
				<p>暂无评分</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">故乡面·参花情</a>
				<p>8.1</p>
			</li>
			<li>
				<a href="details.html">
					<span></span>
					<img src="" width="160px" height="220px;" border="0">
					<div></div>
				</a>
				<a href="details.html">夜闯寡妇村</a>
				<p>4.3</p>
			</li>
			
		</ul>
	</div>
	<!-- 尾部 -->
	<footer>
		<div>友情链接：<a href="http://www.dytt8.net/">电影天堂</a></div>
		<p>&copy;2017 巨票儿电影&nbsp;&nbsp;制作团队：罗利泰&nbsp;何晓畅&nbsp;刘念祖&nbsp;陈文婷</p>
		<p>Technology:HTML/CSS/JavaScript/PHP/MySql</p>
	</footer>
	<script src="/bigticket/Public/js/home/jquery.js"></script>
	<script src="/bigticket/Public/js/home/public.js"></script>
	<script src="/bigticket/Public/js/home/movies.js"></script>
 </body>
</html>