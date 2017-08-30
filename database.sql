-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: bbt
-- ------------------------------------------------------
-- Server version	5.5.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `realname` varchar(45) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `lastlogintime` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','123','超级管理员','13580490610','354229472@qq.com','1498811465',1),(2,'sama','sama','sama','135135135','354229472@qq.com','1498729036',1),(3,'admin2','admin','he','13580490610','354229472@qq.com',NULL,1),(4,'a','a','','','',NULL,0),(5,'loly','123','loly','18819258319','191464056@qq.com','1498809181',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `client_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `realname` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `lastlogintime` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'sama','sama','sama','13580490610','354229472@qq.com','1498016839',1),(2,'a','a','a444','a','a',NULL,-1),(3,'sama','sama','sama','13580490610','354229472@qq.com','1498058353',1),(4,'client','summer','sama','13580490610','354229472@qq.com','1498298831',1);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hall`
--

DROP TABLE IF EXISTS `hall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hall` (
  `hall_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `hall_capacity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`hall_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hall`
--

LOCK TABLES `hall` WRITE;
/*!40000 ALTER TABLE `hall` DISABLE KEYS */;
INSERT INTO `hall` VALUES (1,'一号厅',100,1),(2,'二号厅',100,1),(3,'三号厅',100,1),(4,'四号厅',100,1),(5,'五号厅',100,1),(6,'六号厅',100,1),(7,'七号厅',100,1),(8,'八号厅',100,1),(9,'IMAX厅',200,1),(10,'一号厅',100,-1);
/*!40000 ALTER TABLE `hall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `m` varchar(20) NOT NULL DEFAULT '',
  `c` varchar(20) NOT NULL DEFAULT '',
  `f` varchar(20) NOT NULL DEFAULT '',
  `data` varchar(100) NOT NULL DEFAULT '',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'影片管理','admin','movie','index','',0,1,1),(2,'场次管理','admin','scene','index','',0,1,1),(3,'菜单管理','admin','menu','index','',0,1,1),(4,'admin','admin','admin','admin','',0,-1,1),(5,'影厅管理','admin','hall','index','',0,1,1),(6,'订单管理','admin','ticket','index','',0,1,1),(7,'管理员管理','admin','admin','index','',0,1,1),(8,'客户管理','admin','client','index','',0,1,1),(9,'购票管理','admin','buy','index','',0,0,1),(10,'推荐位管理','admin','position','index','',0,1,1),(11,'推荐位内容管理','admin','positioncontent','index','',0,1,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie` (
  `movie_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `country` varchar(15) NOT NULL,
  `director` varchar(45) DEFAULT NULL,
  `length` int(11) NOT NULL,
  `mainactor` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `grade` decimal(10,1) NOT NULL DEFAULT '0.0',
  `photo_big` varchar(100) DEFAULT NULL,
  `photo_small` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `create_time` varchar(45) DEFAULT NULL,
  `creater` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (18,'异形：契约','美国',' 雷德利·斯科特',123,'迈克尔·法斯宾德','动作 恐怖 科幻','2017-6-16',8.0,'/bigticket/upload/2017/06/22/594b67e85c404.jpg',NULL,'<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				银河系另一端遥远星球的殖民太空船“契约号（Covenant）”发现了一个未知的天堂世界，但其实这里却是一个布满黑暗和危险的世界，这里唯一的居民是“仿生人（Synthetic）”大卫（&lt;a target=\"_blank\" href=\"http://baike.baidu.com/item/%E8%BF%88%E5%85%8B%E5%B0%94%C2%B7%E6%B3%95%E6%96%AF%E5%AE%BE%E5%BE%B7\"&gt;迈克尔·法斯宾德&lt;/a&gt;&nbsp;饰），也是“普罗米修斯号（Prometheus）”唯一的生还者。 &lt;/div&gt; &lt;div class=\"para\" style=\"font-size:14px;color:#333333;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\"&gt; 	太空船契约号上一片寂静。船员和船上的两千名拓荒者都处在冷冻睡眠之中，只留生化人沃尔特一个人穿梭于舱廊之间。这艘船预计要前往遥远的Origae六号行星，远在银河系的彼端，这批殖民者希望能建立起一个新的人类前哨基地。当契约号的能量收集帆被附近的恒星燃焰破坏，造成几十人的伤亡之后，这份宁静被无情地打破，也让任务偏离了原本的轨道。很快幸存的船员发现这似乎是一处未知的乐土，一个未被打扰的伊甸园，充满了被云雾覆盖的高山，巨大高耸的树木，而且远比Origae六号更近，有十足的潜力能做为新的家园。然而，他们所发现的地方，实际上是一个黑暗而致命的世界，充满了意想不到的曲折。面对远超出他们想像的可怕威胁时，处境艰困的探险者必须踏上一场痛苦的逃脱之途 &lt;/div&gt;\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>','1498114077','admin',-1),(19,'异形：契约','美国','雷德利·斯科特',123,'迈克尔·法斯宾德、凯瑟琳·沃特斯顿、丹尼·麦克布莱德、德米安·毕齐主演','动作 科幻 恐怖','2017-6-16',8.0,'/bigticket/upload/2017/06/22/594b70f35d4cc.jpg',NULL,'《异形：契约》于2017年5月19日在美国上映。2017年6月16日在中国大陆上映','1498116351','admin',-1),(20,'异形：契约','美国','雷德利·斯科特',123,'迈克尔·法斯宾德','动作 恐怖 科幻','2017-6-16',8.0,'/bigticket/upload/2017/06/22/594b7147561f8.jpg','/bigticket/upload/2017/06/22/594b7adf0dc2e.jpg','《异形：契约》于2017年5月19日在美国上映。2017年6月16日在中国大陆上映','1498116460','admin',-1),(21,'变形金刚5：最后的骑士','美国',' 迈克尔·贝',148,'马克·沃尔伯格  伊莎贝拉·莫奈','动作 科幻 冒险','2017-6-23',5.0,'/bigticket/upload/2017/06/27/5952697e5c9dd.jpg','/bigticket/upload/2017/06/27/59526809e76f4.jpg','<span style=\"color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">人类和汽车人们将要面临艰难一战，擎天柱相信是人类毁灭了自己的家园，被洗脑黑化之后决定灭绝人类来完成救赎，失控之后与大黄蜂大打出手。擎天柱在太空中搜寻其统治者五面怪，也是它派赏金猎人禁闭四处搜捕领袖，而擎天柱将在途中遭遇超级反派宇宙大帝。以凯德·伊格尔</span><span style=\"color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">为主的人类，将与机器恐龙一起面对即将到来的威胁。</span>','1498269279','admin',1),(22,'加勒比海盗5：死无对证','美国','乔阿吉姆·罗恩尼',129,'艾斯彭·山德伯格 约翰尼·德普 哈维尔·巴登 布兰顿·思怀兹','喜剧 动作 奇幻','2017-05-26',9.0,'/bigticket/upload/2017/06/27/59526a394b1b4.jpg','/bigticket/upload/2017/06/26/5951270f1cd20.jpg','令人闻风丧胆的“海上屠夫”萨拉查船长 （哈维尔·巴登 饰）竟率领着一众夺命亡灵水手逃出了百慕大三角区。他们扬言要杀尽世上所有的海盗，头号目标就是杰克船长（约翰尼·德普 饰）。要想改写命运，杰克船长唯一的希望就是找到传说中海神波塞冬的三叉戟，拥有它就能拥有统治整个海洋的力量！为了寻获这件神器，杰克船长和聪明美丽的天文学家卡琳娜·史密斯（卡雅·斯考达里奥 饰）以及固执的年轻皇家海军亨利（布兰顿·思怀兹 饰）联手出击。航行着他那破破烂烂的“死海鸥号”，杰克船长不但决心要改变自己的厄运，同时也力求能从史上最狠毒可怕的敌人那里捡回一条命。','1498490644','admin',1),(23,'神奇女侠','美国','派蒂·杰金斯',142,'盖尔·加朵 罗宾·怀特 丹尼·休斯顿','动作 冒险 奇幻','2017-06-02',9.0,'/bigticket/upload/2017/06/27/59526a931adbb.jpg','/bigticket/upload/2017/06/26/595127bc410ed.jpg','影片讲述了神奇女侠故事的起源。亚马逊公主戴安娜生活在只有女性的天堂岛(确实很天堂)。一日，一架战机坠入天堂岛附近海域打破了戴安娜平静的生活。她拯救了被击落入海的史蒂夫后得知了人类正处在生死存亡的关键一刻，于是戴安娜从与世隔绝的天堂岛来到正在经历一战战火的人间。戴安娜带着火神之剑、守护银镯、真言套索、神力护盾，化身神奇女侠来到伦敦拯救人类。第一次亲身体验到了人类战争的威力，不仅重新审视了人性也逐渐理解了身为英雄的意义和代价。','1498490817','admin',1),(24,'摔跤吧！爸爸','印度','尼特什·提瓦瑞',140,'阿米尔·汗 萨卡诗·泰瓦 法缇玛·萨那·纱卡 桑亚·玛荷塔','喜剧 动作 家庭','2017-05-05',10.0,'/bigticket/upload/2017/06/27/59526ac010cc9.jpg','/bigticket/upload/2017/06/26/59512840bc15e.jpg','这是一个温暖幽默的励志故事。马哈维亚 辛格·珀尕（阿米尔汗 饰）曾是印度国家摔跤冠军，因生活所迫放弃摔跤。他希望让儿子可以帮他完成梦想：赢得世界级金牌。结果生了四个女儿。本以为梦想就此破碎的辛格却意外发现女儿身上的惊人天赋，看到冠军希望的他决定不能让女儿的天赋浪费，像其他女孩一样只能洗衣做饭过一生，再三考虑之后，与妻子约定一年时间按照摔跤手的标准训练两个女儿：换掉裙子 、剪掉了长发，让她们练习摔跤，并赢得一个又一个冠军，最终赢来了成为榜样激励千千万万女性的机会……','1498490952','admin',1),(25,'新木乃伊','美国','艾里克斯·库兹曼',106,'汤姆·克鲁斯 索菲亚·波多拉 罗素·克劳 安娜贝拉·沃丽丝','动作 冒险 奇幻','2017-06-09',7.0,'/bigticket/upload/2017/06/27/59526ad43d31d.jpg','/bigticket/upload/2017/06/26/595128811c4fd.png','一位古埃及公主（索菲亚·宝特拉 饰）因以魔法谋朝不遂而被擒，并被扎成为一具木乃伊生生活埋在大漠底下，千年过后一次机缘巧合她得以重回人间，因为曾遭极刑，她怀着满腔怨恨，在复活之后，她决定利用自己可以呼唤沙尘暴的黑暗力量重新打造整个世界，并要重新建立属于自己的王朝，一名叫尼克·莫顿的海豹突击队成员，在执行任务期间，意外地带着自己的小队闯入一个地下古墓，队员经过重重磨难全部丧生，只剩下尼克一个人。木乃伊公主，遗恨千年后重返人间，誓要在新世界再建属于她的埃及王朝！后来尼克与珍妮·哈尔西及一班军人坐上运送棺木的飞机。飞机突然被一大群鸟袭击失事，千钧一发之际阿汤哥为安娜贝拉戴上降落伞，英雄救美最后牺牲了自己。','1498491014','admin',1),(26,'雄狮','澳大利亚','加斯·戴维斯',119,'戴夫·帕特尔 大卫·文翰 妮可·基德曼','剧情','2017-06-22',9.0,'/bigticket/upload/2017/06/27/59526ae39df5a.jpg','/bigticket/upload/2017/06/26/595128ef876a3.jpg','影片根据畅销书《漫漫寻家路》改编，故事源于作者萨罗·布莱尔利的一段真实经历。五岁时萨罗在家乡的火车站不小心与哥哥走散，几经辗转他独自来到了西孟加拉邦首府加尔各答，在加尔各答的街头流浪了几个星期，之后被当地警察送进一所福利院，并被澳大利亚的一对夫妇收养，成长为有教养有学识的青年。在一次与印籍同学的聚会中，唤起他对家乡的回忆。他开始凭借隐约的记忆，使用网络地图寻找过去的家。','1498491129','admin',1),(27,'中国推销员','中国大陆','檀冰',98,'李学东 迈克·泰森 安妮克·阿斯克渥德 李艾 史蒂文·西伯格 王自健','剧情 动作 战争','2017-06-16',8.0,'/bigticket/upload/2017/06/27/59526af5e987b.jpg','/bigticket/upload/2017/06/26/5951293d30204.jpg','是一个令人拍案惊奇的真实故事。中国DH移动通讯公司的推销员严键（李东学 饰）来到了南北长期分裂、冲突不断的北非某国开拓业务。一次突发事件让他卷入了当地的战乱之中，一个更大的阴谋正在降临……一名推销员能否担负起挽救国家分裂的重任？能否顺利完成中华民族品牌打进国际市场的重托？那个神秘的DH公司到底是谁？ 随着国际巨星迈克·泰森、史蒂文·西格尔等先后登场，劲爆的动作、战争场面，惊心动魄的跨国商战，在广袤非洲的异域风情中，演绎出了一场“勇者无敌，旗开德胜”，荡气回肠的传奇故事。','1498491199','admin',1),(28,'忠爱无言','中国大陆','谈宜之',98,'高强 于月仙 李玉峰 王玉宁','剧情 家庭','2017-06-09',9.0,'/bigticket/upload/2017/06/27/59526b0d048cc.jpg','/bigticket/upload/2017/06/26/5951299ca3627.jpg','影片根据真实故事“老人与狗”改编。主要讲述一条小狗（二货 饰）因为意外，结识一位性格倔强孤僻的残疾老人（高强 饰），由格格不入的相互争斗，到同病相怜的息息相处，直到最后相依为命。狗狗为老人拉车赶集修理小电器，相濡以沫，朝夕相处十余载。','1498491297','admin',1),(29,'悟空传','中国大陆','郭子健',123,'彭于晏 倪妮 欧豪 余文乐','剧情 动作 奇幻','2017-07-13',10.0,'/bigticket/upload/2017/06/27/5952691b8ad34.jpg','/bigticket/upload/2017/06/27/5952691e38efe.jpg','电影《悟空传》改编自今何在同名小说，讲述了在大闹天宫的五百年前，未成为齐天大圣的孙悟空，不服天命，向天地诸神发起抗争的故事。这不是西游记的任何章节，这是悟空（彭于晏 饰）的故事，彼时孙悟空还不是震撼天地的齐天大圣，他只是只桀傲不驯的猴子。天庭毁掉他的花果山以掌控众生命运，他便决心跟天庭对抗，毁掉一切戒律。在天庭，孙悟空遇到不能爱的阿紫（倪妮 饰），一生的宿敌杨戬（余文乐 饰），和思念昔日爱人阿月（郑爽 饰）的天蓬（欧豪 饰），他们的身份注定永生相杀，但其实不甘命运摆布的又何止孙悟空一人？却没想到反抗却带来更大的浩劫。他们所做的一切，究竟是不知天高地厚的热血轻狂，还是无奈宿命难改的压抑绝望？难道命运真的早已注定？悟空不服，他再次挥动金箍棒，要让这诸佛都烟消云散！<br />\r\n<div>\r\n	<br />\r\n</div>','1498573091','admin',1),(30,'异形：契约','美国','雷德利·斯科特',116,'迈克尔·法斯宾德 凯瑟琳·沃特斯顿 比利·克鲁德普 卡门·艾乔戈','恐怖 惊悚 科幻','2017-06-16',6.8,'/bigticket/upload/2017/06/27/59526a100425f.jpg','/bigticket/upload/2017/06/27/59526a0bee147.jpg','河系另一端遥远星球的殖民太空船“契约号（Covenant）”发现了一个未知的天堂世界，但其实这里却是一个布满黑暗和危险的世界，这里唯一的居民是“仿生人（Synthetic）”大卫（迈克尔·法斯宾德 饰），也是“普罗米修斯号（Prometheus）”唯一的生还者。<br />\r\n太空船契约号上一片寂静。船员和船上的两千名拓荒者都处在冷冻睡眠之中，只留生化人沃尔特一个人穿梭于舱廊之间。这艘船预计要前往遥远的Origae六号行星，远在银河系的彼端，这批殖民者希望能建立起一个新的人类前哨基地。当契约号的能量收集帆被附近的恒星燃焰破坏，造成几十人的伤亡之后，这份宁静被无情地打破，也让任务偏离了原本的轨道。很快幸存的船员发现这似乎是一处未知的乐土，一个未被打扰的伊甸园，充满了被云雾覆盖的高山，巨大高耸的树木，而且远比Origae六号更近，有十足的潜力能做为新的家园。然而，他们所发现的地方，实际上是一个黑暗而致命的世界，充满了意想不到的曲折。面对远超出他们想像的可怕威胁时，处境艰困的探险者必须踏上一场痛苦的逃脱之途。。<br />','1498573335','admin',1),(31,'妖猫传','中国大陆','陈凯歌',120,'黄轩 染谷将太 张雨绮 秦昊','爱情 奇幻','2017-12-22',10.0,'/bigticket/upload/2017/06/27/59526b996787f.jpg','/bigticket/upload/2017/06/27/59526b9f41ba5.jpg','讲述了晚唐时期，金吾卫陈云樵府中妖猫入侵，长安城笼罩在诡异氛围中。诗人白乐天奉命调查此事，结识了僧人空海，两人抽丝剥茧步步深入，逐渐还原了一段震惊世人的历史真相。','1498573751','admin',1),(32,'捉妖记2','中国大陆','许诚毅',110,'白百何 井柏然 梁朝伟 李宇春','喜剧 奇幻','2018-02-16',10.0,'/bigticket/upload/2017/06/27/59526c23427e8.jpg','/bigticket/upload/2017/06/27/59526c27d3cf0.jpg','上一集与胡巴分别后，天荫（井柏然 饰)带着小岚（白百何 饰）踏上寻父之路，在义薄云天的天师堂堂主云大哥的帮助下，二人得知天荫父亲宋戴天的护妖轨迹；而重回永宁村的胡巴再度被妖王追杀，颠沛流离逃亡时结识大赌徒屠四谷和一只妖怪，三人一起过着相依为命的生活，但又因屠四谷欠下的巨额赌债横生诸多波折。与此同时，江湖盛传小妖王胡巴的重金悬赏令，妖界大军、天师精英、绿林草莽闻风而动，多方势力为抢夺胡巴在清水镇掀起腥风血雨。千钧一发之际，念子心切的天荫和小岚通过天师堂找到胡巴并一起逃离险境。岂料，一场更大的惊天阴谋尾随而至，伺机而动……','1498573913','admin',1),(33,'机器之血','中国大陆','张力嘉',110,'成龙 罗志祥 欧阳娜娜 卡伦·穆尔维','剧情 动作','2017-12-22',10.0,'/bigticket/upload/2017/06/27/59526cab56b8f.jpg','/bigticket/upload/2017/06/27/59526cb16d9d4.jpg','特警林东的女儿Nancy濒临死亡，通过在血液中输入神秘物质的方式侥幸存活。然而，多年后一本关于血液秘密的小说《机器之血》出版，邪恶势力开始关注这本小说和关于血液的秘密。Nancy成为多方争夺的对象，林东想要保护女儿必将遭遇很多困难…','1498574017','admin',1),(34,'美国队长3','美国','安东尼·罗素、乔·罗素',147,'克里斯·埃文斯，小罗伯特·唐尼，塞巴斯蒂安·斯坦，斯嘉丽·约翰逊，伊丽莎白·奥尔森，查德维克·博斯曼，安东尼·麦凯，保罗·贝坦尼，保罗·路德，唐·钱德尔，杰瑞米·雷纳，汤姆·赫兰德，丹尼尔·布鲁赫','动作 科幻 冒险','2016-5-06',7.7,'/bigticket/upload/2017/06/27/59526d2469f8e.jpg','/bigticket/upload/2017/06/27/59526d296ff31.jpg','在奥创对这个世界造成了巨大的影响之后，复仇者联盟还是团结一致保护人类的。但是在一些政治角力的背后，政府中有人认为是有必要控制一下这些超级英雄的超自然能力和他们的行动了。于是，一项管控措施出台。这个措施就是要求复联按照政府的要求来行动。任务的开展、进程和结束，都要由政府主导。这个管控措施在复联中引起了极大的争议。意见最极端、最两极分化不可调和的，就是钢铁侠和美国队长之间的问题，于是，这两个同盟者之间的矛盾就此爆发了出来。而复联的“内战”也不可避免的爆发<br />\r\n<div>\r\n	<br />\r\n</div>','1498574173','admin',1),(35,'血战钢锯岭','美国','梅尔·吉布森',136,'安德鲁·加菲尔德，文斯·沃恩，萨姆·沃辛顿，泰莉莎·帕尔墨，雨果·维文，卢克·布雷西，瑞切尔·格里菲斯','传记 历史 战争 剧情','2016-12-8',8.7,'/bigticket/upload/2017/06/27/59526dba1ef96.jpg','/bigticket/upload/2017/06/27/59526dc0bb14d.jpg','在1942年的太平洋战场，军医戴斯蒙德·道斯（安德鲁·加菲尔德饰）不愿意在前线举枪射杀任何一个人，他因自己的和平理想遭受着其他战士们的排挤。尽管如此，他仍坚守信仰及原则，孤身上阵，无惧枪林弹雨和凶残日军，誓死拯救即使一息尚存的战友。数以百计的同胞在敌人的土地上伤亡惨重，他一人冲入枪林弹雨，不停地祈祷，乞求以自己的绵薄之力尽再救一人，75名受伤战友最终被奇迹般的运送至安全之地，得以生还。','1498574417','admin',1),(36,'死侍','美国','提姆·米勒',106,'瑞安·雷诺兹，莫雷纳·巴卡林，艾德·斯克林，吉娜·卡拉诺，T·J·米勒，布里安娜·希尔德布兰，安德烈·提利','科幻 动作 犯罪 爱情','2016-2-12',7.5,'/bigticket/upload/2017/06/27/59526e9a642e5.jpg','/bigticket/upload/2017/06/27/59526e9d79b1f.jpg','《死侍》是2015年由提姆·米勒执导的科幻动作电影，由瑞安·雷诺兹、莫瑞娜·巴卡琳、艾德·斯克林、吉娜·卡拉诺等主演。该片是《X战警》系列电影的外传。讲述了前任特种兵韦德·威尔逊得了癌症，为了治疗被不知名的组织绑架，用来测试变种人基因。在饱受虐待折磨后他成功逃脱并对把他变成变种人的阿贾克斯进行报复的故事。','1498574544','admin',1),(37,'湄公河行动','中国大陆','林超贤',124,'张涵予 彭于晏 冯文娟 吴旭东 孙淳','动作 警匪','2016-9-30',8.0,'/bigticket/upload/2017/06/27/59526ff4b1dab.jpg','/bigticket/upload/2017/06/27/59526ff8d540e.jpg','2011年10月5日清晨，两艘中国商船在湄公河金三角流域遇袭，船上13名中国船员全部遇难，并在船上发现90万粒毒品。这宗枪杀十三名中国船员的血腥冤案，掀起了悲剧的序幕。面对矛头指向中国运毒、颠倒是非的舆论，为了还遇难同胞一个清白，中国决定派出缉毒精英，组成此次案件的特别行动小组，以高刚（张涵予饰）为队长，潜入金三角查明真相，竭力揪出案件的幕后黑手。然而缉拿真凶的过程并非他们想得那么简单，事件的进展扑朔迷离，通往真相的道路更是险象环生','1498574856','admin',1),(38,'罗曼蒂克消亡史','中国大陆','程耳',90,'葛优，章子怡，浅野忠信，杜淳，钟欣潼，倪大红，袁泉，闫妮，霍思燕，杜江，韩庚，王传君','剧情 悬疑 谍战','2016-12-16',7.7,'/bigticket/upload/2017/06/27/5952706370324.jpg','/bigticket/upload/2017/06/27/595270662af19.jpg','20世纪30年代的上海，战争之下，繁华落尽。叱咤风云的帮派大佬陆先生（葛优饰）答应不甘寂寞的交际花小六（章子怡饰）演电影的女主角，但是小六和男主角勾搭上被要求离开上海，陆先生的妹夫渡部（浅野忠信饰）在途中把小六带回家囚禁成为性奴。管家王妈（闫妮饰）把不苟言笑的车夫（杜淳饰）引荐给了陆先生做贴身侍卫。淞沪战役前夕，日本人计划把陆先生杀死，身为间谍的渡部同意杀死陆先生，陆先生的家人全部被杀。陆先生委托老五（钟欣潼饰）和车夫，杀掉投靠日本人的帮派二哥。抗战结束前夕，陆先生找到被囚禁的小六，与她一起前往吕宋岛。佯装成国民党高级将领的车夫，当面杀死了渡部的大儿子，小六同时举枪击毙渡部。1949年，陆先生独自一人去了香港，从此销声匿迹','1498574957','admin',1),(39,'深海浩劫','美国','彼得·博格',107,'马克·沃尔伯格，吉娜·罗德里格兹，库尔特·拉塞尔，迪伦·奥布莱恩','惊悚 动作 剧情','2016-9-30',7.1,'/bigticket/upload/2017/06/27/595270b44596d.jpg','/bigticket/upload/2017/06/27/595270b6b446f.jpg','迈克·威廉姆斯（马克·沃尔伯格饰）他负责位于墨西哥湾的石油钻塔深水地平线号的维护工作。他跟女儿和妻子Felicia（凯特·哈德森饰）道别，这一走，他就要在钻塔上工作21天之久。他的同事Andrea Fleytas （吉娜·罗德里格兹饰），还有他的老板Jimmy Harrell （库尔特·拉塞尔饰）。在钻塔上，Donald Vidrine （约翰·马尔科维奇饰）和BP石油公司的其他高管们给Jimmy Harrell颁发了年度贡献和安全奖。但是，很快Donald Vidrine就要求赶上预定进度，Jimmy Harrell认为这种操作可能会给钻井平台以及员工们带来危险，但Donald Vidrine忽略了Jimmy Harrell的提醒，一意孤行，将所有人的生命至于了危险之中，并且引发了一系列问题，最终导致了最严重的环境灾难。事故发生之后，Mike迅速采取决断，他必须依靠自己在电子机械方面的渊博知识去拯救剩下的员工们，当然，也包括Andrea Fleytas和Jimmy Harrell。与此同时，Felicia正在家里通过电视关注着这次事故的情况，她内心惴惴不安，不知道丈夫能否逃过此劫<br />\r\n<div>\r\n	<br />\r\n</div>','1498575039','admin',1),(40,'寒战2','中国大陆','陆剑青、梁乐民',110,'郭富城，梁家辉，杨采妮，文咏珊，周润发，彭于晏，李治廷，杨祐宁','剧情 动作 犯罪','2016-7-08',6.9,'/bigticket/upload/2017/06/27/595271fe8da82.jpg','/bigticket/upload/2017/06/27/59527208b0886.jpg','刘杰辉（郭富城饰）荣升警队一哥后，他的妻儿却遭遇了歹徒绑架，对方要求警队以李家俊（彭于晏饰）为交换。虽然费尽心机，但最终被对方得逞，李家俊逃跑，而刘杰辉也由于违反警队规定擅自行动，遭遇香港司法机关质询。刘杰辉一心要揪出绑架案的幕后黑手，而引咎辞职的前警务处行动副处长李文彬，受到已退休的前警务处长蔡元祺（张国柱饰）的蛊惑，在质询过程中临阵倒戈，引发了刘杰辉被弹劾的危机。<br />\r\n同时，立法会议员简奥伟（周润发饰），对李文彬的倒戈也充满疑虑，派出自己的爱徒欧咏恩调查李文彬的行踪，从而发现了李文彬与逃跑的李家俊以及蔡元祺有接触。欧咏恩后来在跟踪过程中被蔡元祺一伙发现，最终死于车祸。欧咏恩的死激怒了简奥伟，使他也加入到了对李文彬的调查之中。简奥伟通过欧咏恩留下的云端文件，获得了李文彬跟李家俊、蔡元祺密会的照片。而刘杰辉也通过反间谍的方式，发现了警队中李文彬的眼线，并顺藤摸瓜找到了蔡元祺藏匿之前失踪冲锋车的地点，同时通过调查发现了蔡元祺控制香港警队信息系统的证据，并最终一举破坏了蔡元祺的阴谋。而更深层次原因——律政司司长黎永廉（李子雄饰）想要竞选香港特首，进而控制香港政府的政治阴谋，依然藏在水下未被揭开<br />','1498575401','admin',1),(41,'危城','中国大陆','陈木胜',119,'刘青云，古天乐，彭于晏，吴京，袁泉，江疏影','动作 武侠','2016-8-12',7.3,'/bigticket/upload/2017/06/27/5952725dea835.jpg','/bigticket/upload/2017/06/27/59527260bfdfa.jpg','时值国家内战、军阀割据的乱世时代，军阀少帅曹少璘（古天乐饰）因杀害三条人命，被普城保卫团团长杨克难（刘青云饰) 绳之于法。可曹家财雄势大，以强权震慑居民，曹家上校张亦(吴京饰)得悉事件后，赶来普城取人，在城中遇上多年不见师弟马锋（彭于晏饰），马锋是位武功高强的浪人，路见不平欲拔刀相助，可是却面临正义与兄弟情之抉择。','1498575466','admin',1),(42,'重返·狼群','中国大陆','亦风',98,'亦风 李微漪','纪录片 剧情','2017-06-16',10.0,'/bigticket/upload/2017/06/29/595473d2b7d9d.jpg','/bigticket/upload/2017/06/29/595473d6d36e6.png','这是一个世界首例放归野生草原狼的真实事件，美女画家李微漪在一次草原采风中意外收养了狼王遗孤，为其取名格林，并带回成都喂养，但繁华的都市无法容纳一匹野性的草原狼，于是李微漪带着格林重返草原，一路追寻狼群的踪迹，历经严寒酷雪，终于目送它成功地重返狼群','1498706906','admin',1),(43,'敦刻尔克22222','美国','克里斯托弗·诺兰',128,'汤姆·哈迪，肯尼思·布拉纳，马克·里朗斯 ，芬恩·怀特海德 ，哈里·斯泰尔斯，希里安·墨菲，阿纽林·巴纳德','剧情 历史 战争 惊悚','2017-07-21',10.0,'/bigticket/upload/2017/06/29/5954780a8650e.jpg','/bigticket/upload/2017/06/29/5954780d2258f.png','影片的故事聚焦二战时期著名的代号为“发电机计划”的敦刻尔克大撤退：1940年5月25日，英法联军防线在德国机械化部队的快速攻势下崩溃，英军在位于法国东北部、靠近比利时边境的港口小城敦刻尔克进行了当时历史上最大规模的军事撤退行动，成功挽救了大量的部队和人力。敦刻尔克大撤退的故事发生在美国全面参与二战之前，美国观众比较熟悉的情节出现在2007年由乔·赖特执导的悬疑片《赎罪》中，影片里涉及敦刻尔克大撤退的五分钟长镜头获得了评论家的一致好评。诺兰的才华毋庸置疑，加上配乐大师汉斯·季默的再度加盟，和《星际穿越》摄影师霍伊特·范·霍特玛的掌镜，让人期待影片将如何展现大撤退的震撼场景。','1498707982','admin',1),(44,'英伦对决yuky','英国，中国大陆','马丁·坎贝尔',110,'成龙，刘涛，皮尔斯·布鲁斯南，斯蒂芬·霍根','动作 惊悚','2017-09-30',10.0,'/bigticket/upload/2017/06/29/5954adcb959f4.jpg','/bigticket/upload/2017/06/29/5954add46521d.jpg','该片根据史蒂芬·莱瑟1992年出版的小说《中国佬》（The Chinaman）改编。讲述了身经百战的越战退伍老兵（成龙 饰）退役之后在伦敦唐人街开了家餐馆。当小女儿被爱尔兰恐怖团伙残害，正义得不到伸张的情况下，悲愤之中他再度举枪为女复仇。','1498721759','admin',1),(45,'血战钢锯岭','美国','梅尔·吉布森',136,'安德鲁·加菲尔德，文斯·沃恩，萨姆·沃辛顿，泰莉莎·帕尔墨，雨果·维文，卢克·布雷西，瑞切尔·格里菲斯','传记 历史 战争 剧情','2016-12-8',8.7,'/bigticket/upload/2017/06/29/5954c875463d3.jpg','','<span style=\"background-color:#000000;\">在1942年的太平洋战场，军医戴斯蒙德·道斯（安德鲁·加菲尔德饰）不愿意在前线举枪射杀任何一个人，他因自己的和平理想遭受着其他战士们的排挤。尽管如此，他仍坚守信仰及原则，孤身上阵，无惧枪林弹雨和凶残日军，誓死拯救即使一息尚存的战友。数以百计的同胞在敌人的土地上伤亡惨重，他一人冲入枪林弹雨，不停地祈祷，乞求以自己的绵薄之力尽再救一人，75名受伤战友最终被奇迹般的运送至安全之地，得以生还。</span><br />\r\n<div>\r\n	<br />\r\n</div>','1498728686','admin',0);
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_content`
--

DROP TABLE IF EXISTS `movie_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_content` (
  `movieId` int(11) NOT NULL,
  `content` varchar(400) NOT NULL,
  PRIMARY KEY (`movieId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_content`
--

LOCK TABLES `movie_content` WRITE;
/*!40000 ALTER TABLE `movie_content` DISABLE KEYS */;
INSERT INTO `movie_content` VALUES (1,'《闪灵》是由华纳兄弟出品的恐怖片，由斯坦利·库布里克执导，杰克·尼克尔森、谢莉·杜瓦尔和丹尼·劳埃德参加演出，该片于1980年5月23日上映。该片讲述了为了寻找灵感，带着他的妻儿接受了一份旅店冬天看门工作的作家杰克·托兰斯被幻象逼疯的故事。');
/*!40000 ALTER TABLE `movie_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` char(100) DEFAULT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'首页大图',1,'首页轮播图',1498314575,1498315914),(2,'正在热映',1,'首页，正在热映',1498314614,0),(3,'即将上映',1,'首页，即将上映',1498314627,0),(4,'往期精彩',1,'已经下映的电影',1498574628,0);
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position_content`
--

DROP TABLE IF EXISTS `position_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position_content` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(5) unsigned NOT NULL,
  `movie_id` varchar(45) NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position_content`
--

LOCK TABLES `position_content` WRITE;
/*!40000 ALTER TABLE `position_content` DISABLE KEYS */;
INSERT INTO `position_content` VALUES (2,4,'34',0,1498574662,0,1),(3,0,'22',0,1498578119,0,1),(4,1,'22',0,1498578126,0,1),(6,0,'21',0,1498578439,0,-1),(7,3,'22',0,1498578457,0,-1),(8,3,'22',0,1498578579,0,-1),(10,1,'41',0,1498705254,0,1),(11,1,'23',0,1498705600,0,1),(12,1,'26',0,1498705737,0,1),(13,1,'37',0,1498705755,0,1),(14,1,'39',0,1498705789,0,1),(15,1,'21',0,1498705804,0,1),(16,2,'21',0,1498706308,0,1),(17,2,'23',0,1498706721,0,1),(18,2,'24',0,1498706731,0,1),(19,2,'22',0,1498706738,0,1),(20,2,'25',0,1498706752,0,1),(21,2,'26',0,1498706787,0,1),(22,2,'28',0,1498706795,0,1),(26,3,'29',0,1498707446,0,1),(27,3,'33',0,1498707460,0,1),(28,3,'32',0,1498707633,0,1),(29,3,'31',0,1498707871,0,1),(30,3,'43',0,1498707992,0,1),(31,4,'36',0,1498710739,0,1),(32,4,'38',0,1498710757,0,1),(33,4,'40',0,1498710765,0,1),(34,4,'37',0,1498710776,0,0),(35,1,'30',0,1498721956,0,1),(36,2,'26',0,1498721975,0,1),(37,1,'29',0,1498729163,0,1),(38,4,'39',0,1498811750,0,1);
/*!40000 ALTER TABLE `position_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scene`
--

DROP TABLE IF EXISTS `scene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scene` (
  `scene_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `year` varchar(45) DEFAULT NULL,
  `month` varchar(45) DEFAULT NULL,
  `date` varchar(45) NOT NULL,
  `hour` varchar(45) DEFAULT NULL,
  `minute` varchar(45) DEFAULT NULL,
  `hall` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `create` varchar(45) DEFAULT NULL,
  `creator` varchar(45) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`scene_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scene`
--

LOCK TABLES `scene` WRITE;
/*!40000 ALTER TABLE `scene` DISABLE KEYS */;
INSERT INTO `scene` VALUES (11,20,'异形：契约','2017','11','04','13','00','六号厅',80,'1498236695','admin',0,'1509771600'),(12,21,'变形金刚5：最后的骑士','2017','06','30','12','10','七号厅',55,'1498269301','admin',1,'1498795800'),(13,30,'异形：契约','2017','06','27','23','40','三号厅',25,'1498577059','admin',1,'1498578000'),(14,44,'英伦对决','2017','06','29','19','40','七号厅',50,'1498721843','admin',1,'1498736400'),(15,45,'血战钢锯岭','2017','06','29','20','20','五号厅',50,'1498728744','admin',-1,'1498738800');
/*!40000 ALTER TABLE `scene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seat`
--

DROP TABLE IF EXISTS `seat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seat` (
  `seat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `scene_id` int(11) DEFAULT NULL,
  `row1` int(11) DEFAULT '0',
  `column1` int(11) DEFAULT '0',
  `row2` int(11) DEFAULT '0',
  `column2` int(11) DEFAULT '0',
  `row3` int(11) DEFAULT '0',
  `column3` int(11) DEFAULT '0',
  `row4` int(11) DEFAULT '0',
  `column4` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`seat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seat`
--

LOCK TABLES `seat` WRITE;
/*!40000 ALTER TABLE `seat` DISABLE KEYS */;
INSERT INTO `seat` VALUES (16,21,11,9,5,9,6,0,0,0,0,1),(18,22,11,5,4,5,5,6,4,6,5,1),(19,23,11,8,2,8,3,9,2,9,3,1),(20,24,11,9,1,9,2,0,0,0,0,1),(21,25,12,9,1,9,2,9,3,9,4,1),(22,26,12,7,5,7,6,0,0,0,0,1),(23,27,12,7,8,7,9,0,0,0,0,1),(24,28,12,7,8,7,9,0,0,0,0,1),(25,29,11,5,6,5,7,5,8,5,9,1),(26,30,11,5,6,5,7,5,8,5,9,1),(27,31,11,5,6,5,7,5,8,5,9,1),(28,32,11,5,6,5,7,5,8,5,9,1),(29,33,15,5,5,5,6,5,7,5,8,1),(30,34,15,5,5,5,6,5,7,5,8,1),(31,35,15,5,5,5,6,5,7,5,8,1),(32,36,15,5,5,5,6,5,7,5,8,1);
/*!40000 ALTER TABLE `seat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `time` varchar(40) NOT NULL,
  `hall` varchar(10) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `totalprice` varchar(10) NOT NULL,
  `buyer` varchar(40) NOT NULL,
  `buyTime` varchar(40) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1,20,'异形：契约','1509771600','0',NULL,'320','admin','1498293816',1),(2,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498293964',1),(3,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498294097',1),(4,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498294139',1),(5,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498294151',1),(6,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498294278',1),(7,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498294281',1),(8,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498294362',1),(9,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498294376',1),(10,20,'异形：契约','1509771600','六号厅',2,'160','admin','1498294481',1),(11,20,'异形：契约','1509771600','六号厅',2,'160','admin','1498294559',1),(12,20,'异形：契约','1509771600','六号厅',3,'240','admin','1498294623',1),(13,20,'异形：契约','1509771600','六号厅',3,'240','admin','1498294699',1),(14,20,'异形：契约','1509771600','六号厅',2,'160','admin','1498295129',1),(15,20,'异形：契约','1509771600','六号厅',2,'160','admin','1498295159',1),(16,20,'异形：契约','1509771600','六号厅',2,'160','admin','1498295387',1),(17,21,'变形金刚5：最后的骑士','1498795800','七号厅',2,'110','admin','1498297098',1),(18,21,'变形金刚5：最后的骑士','1498795800','七号厅',4,'220','admin','1498313782',1),(19,21,'变形金刚5：最后的骑士','1498795800','七号厅',4,'220','admin','1498313822',1),(20,20,'异形：契约','1509771600','六号厅',2,'160','admin','1498319352',1),(21,20,'异形：契约','1509771600','六号厅',2,'160','admin','1498319556',1),(22,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498322589',1),(23,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498322716',1),(24,20,'异形：契约','1509771600','六号厅',2,'160','admin','1498353296',1),(25,21,'变形金刚5：最后的骑士','1498795800','七号厅',4,'220','admin','1498353508',1),(26,21,'变形金刚5：最后的骑士','1498795800','七号厅',2,'110','admin','1498353565',1),(27,21,'变形金刚5：最后的骑士','1498795800','七号厅',2,'110','admin','1498713652',1),(28,21,'变形金刚5：最后的骑士','1498795800','七号厅',2,'110','admin','1498713661',1),(29,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498721897',1),(30,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498721897',1),(31,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498721898',1),(32,20,'异形：契约','1509771600','六号厅',4,'320','admin','1498721899',1),(33,45,'血战钢锯岭','1498738800','五号厅',4,'200','admin','1498728843',-1),(34,45,'血战钢锯岭','1498738800','五号厅',4,'200','admin','1498728844',-1),(35,45,'血战钢锯岭','1498738800','五号厅',4,'200','admin','1498728844',-1),(36,45,'血战钢锯岭','1498738800','五号厅',4,'200','admin','1498728844',-1);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bbt'
--

--
-- Dumping routines for database 'bbt'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-30 23:07:01
