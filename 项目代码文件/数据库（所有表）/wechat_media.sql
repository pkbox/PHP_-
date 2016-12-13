-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-12 10:06:32
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wechat_media`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_content_comment`
--

CREATE TABLE IF NOT EXISTS `admin_content_comment` (
  `C_ID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `userImg` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `PariseCount` int(11) NOT NULL,
  `MediaID` int(11) NOT NULL,
  PRIMARY KEY (`C_ID`),
  KEY `MediaID` (`MediaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `admin_content_comment`
--

INSERT INTO `admin_content_comment` (`C_ID`, `userName`, `userImg`, `time`, `content`, `PariseCount`, `MediaID`) VALUES
(1, '用户1', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 0, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。', 7, 3),
(2, '用户2', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 0, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。', 0, 15),
(3, '用户3', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 0, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。', 0, 15),
(4, '用户4', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 0, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。', 0, 9),
(5, '用户5', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 0, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。', 0, 9),
(6, 'yonghu', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 1480934928, '123456', 5, 3),
(7, 'yonghu', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 1480935591, 'jalj kl\n', 0, 3),
(8, 'yonghu', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 1480935602, 'wotaijiade ', 0, 3),
(9, 'yonghu', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 1480935655, '123456789', 0, 3),
(10, 'yonghu', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 1480984603, '我想说点什么', 0, 3),
(11, 'yonghu', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 1480993567, '如果说你是一个好人哪么就做点好人应该做的事情', 0, 3),
(12, 'yonghu', 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg', 1480993591, '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `admin_recommend_collection`
--

CREATE TABLE IF NOT EXISTS `admin_recommend_collection` (
  `ad_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Uid` int(11) NOT NULL,
  `MediaId` int(11) NOT NULL,
  PRIMARY KEY (`ad_Id`),
  KEY `MediaId` (`MediaId`),
  KEY `Uid` (`Uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `admin_recommend_collection`
--

INSERT INTO `admin_recommend_collection` (`ad_Id`, `Time`, `Uid`, `MediaId`) VALUES
(3, '2016-12-08 02:24:42', 1, 3),
(4, '2016-12-08 02:24:55', 1, 9),
(5, '2016-12-08 02:24:55', 1, 10),
(6, '2016-12-08 02:25:11', 2, 12),
(7, '2016-12-08 02:25:11', 2, 33),
(8, '2016-12-08 02:25:24', 3, 14),
(9, '2016-12-08 02:25:24', 3, 29),
(10, '2016-12-08 02:25:30', 4, 16),
(11, '2016-12-08 02:25:41', 4, 30),
(12, '2016-12-08 02:25:41', 4, 26),
(13, '2016-12-08 02:29:05', 10, 16),
(14, '2016-12-08 02:29:05', 11, 29);

-- --------------------------------------------------------

--
-- 表的结构 `admin_recommend_lists`
--

CREATE TABLE IF NOT EXISTS `admin_recommend_lists` (
  `AR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `time` date NOT NULL,
  `Director` varchar(50) NOT NULL,
  `Actor` varchar(50) NOT NULL,
  `Score` float NOT NULL,
  `Type_id` int(11) NOT NULL,
  `introduce` text NOT NULL,
  `VideoAddress` varchar(255) NOT NULL,
  `PariseCount` int(11) NOT NULL,
  `contentImg` varchar(255) NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AR_ID`),
  UNIQUE KEY `title` (`title`),
  KEY `Type_id` (`Type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- 转存表中的数据 `admin_recommend_lists`
--

INSERT INTO `admin_recommend_lists` (`AR_ID`, `title`, `thumb`, `reason`, `time`, `Director`, `Actor`, `Score`, `Type_id`, `introduce`, `VideoAddress`, `PariseCount`, `contentImg`, `createTime`) VALUES
(3, '007之打破量子危机', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(9, '007之打破量子危机1', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(10, '007之打破量子危机2', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(11, '007之打破量子危机3', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(12, '007之打破量子危机4', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(13, '007之打破量子危机5', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(14, '007之打破量子危机6', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(15, '007之打破量子危机7', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(16, '007之打破量子危机8', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 1, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(17, '007之打破量子危机9', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 1, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(18, '007之打破量子危机10', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 2, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(19, '007之打破量子危机11', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 8, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(23, '007之打破量子危机13', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 3, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(24, '007之打破量子危机14', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 6, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(25, '007之打破量子危机15', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 5, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(26, '007之打破量子危机16', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(28, '007之打破量子危机18', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(29, '007之打破量子危机19', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(30, '007之打破量子危机20', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(31, '007之打破量子危机21', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 1, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(32, '007之打破量子危机22', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 04:38:10'),
(33, '007之打破量子危机23', 'http://imgsrc.baidu.com/forum/mpic/item/8d918150cffde930377abefc.jpg', '他冷酷但多情，机智且勇敢，总能在最危难时化险为夷，也总能邂逅一段浪漫的爱情', '2016-12-01', 'Michael Apted', '皮尔斯·布鲁斯南/苏菲·玛索', 9.1, 7, '1965年，这部电影如片名所示，以强大的火力和雷霆万钧之势横扫全球电影院，这时确实已掌握固定的观众。《金手指》的成功为下一部007电影的票房铺下平坦的道路，这正是《霹雳弹》的情形。\r\nBroccoli和Saltzman一起制作这部电影，凯文·麦克格罗瑞(Kevin McClory)则参与《霹雳弹》原著的编写工作(与弗莱明和编剧杰克·维明翰Jack Whittingham合作）。第四部007电影场景主要设在巴哈马群岛，由第1、2部的导演泰伦斯·杨掌舵，此片带有相当的自信和大胆的精神，S.P.E.C.T.R.E.（就是诺博士领导的邪恶组织，听起来很耳熟对吧？《王牌大贱谍》就是从这里抄来的灵感）以两颗抢夺来的原子弹对全世界进行勒索，007必须对抗他们。《霹雳弹》于1965年赢得奥斯卡最佳视觉特效奖，片中并有007系列电影中最迷人的邦德女郎——克劳迪娜·奥格尔、卢仙娜·帕鲁兹、Martine Beswick和Molly Peterson。', 'vedio/song.mp3', 0, 'http://img3.imgtn.bdimg.com/it/u=1583531370,2829295735&fm=21&gp=0.jpg', '2016-12-06 16:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `media_type`
--

CREATE TABLE IF NOT EXISTS `media_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `media_type`
--

INSERT INTO `media_type` (`id`, `type`) VALUES
(1, '科幻'),
(2, '悬疑'),
(3, '励志'),
(4, '动作'),
(5, '爱情'),
(6, '恐怖'),
(7, '剧情'),
(8, '喜剧');

-- --------------------------------------------------------

--
-- 表的结构 `music_recommend_lists`
--

CREATE TABLE IF NOT EXISTS `music_recommend_lists` (
  `MusicName` varchar(50) NOT NULL,
  `music_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Singer` varchar(50) NOT NULL,
  `FromMedia` varchar(50) NOT NULL,
  `MusicAddress` varchar(255) NOT NULL,
  PRIMARY KEY (`music_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `music_recommend_lists`
--

INSERT INTO `music_recommend_lists` (`MusicName`, `music_Id`, `Singer`, `FromMedia`, `MusicAddress`) VALUES
('天空之城', 1, '李志', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200003iDFNR04D7QS.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30'),
('其实都一样', 2, '刘大毅', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200001oXRgW2Xrogq.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30'),
('丑八怪', 3, '薛之谦', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200003iDFNR04D7QS.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30'),
('红玫瑰', 4, '陈奕迅', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200001oXRgW2Xrogq.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30'),
('平淡日子里的刺', 5, '宋冬野', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200003iDFNR04D7QS.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30'),
('天空之城', 6, '李志', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200001oXRgW2Xrogq.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30'),
('其实都一样', 7, '刘大毅', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200001oXRgW2Xrogq.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30'),
('天空之城', 8, '李志', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200001oXRgW2Xrogq.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30'),
('其实都一样', 9, '刘大毅', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200001oXRgW2Xrogq.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30'),
('天空之城', 10, '李志', '《廊桥遗梦》', 'http://cc.stream.qqmusic.qq.com/C200001oXRgW2Xrogq.m4a?vkey=CE91D556B206DFC4B4545563423220F5AAA5DE87019320A2B7160F5E200C89832276B9309D5D0860EC8C6F52194FEA663A9B978F220708A8&guid=868249018&fromtag=30');

-- --------------------------------------------------------

--
-- 表的结构 `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `text`
--

INSERT INTO `text` (`id`, `time`) VALUES
(1, '2016-12-06 04:37:27');

-- --------------------------------------------------------

--
-- 表的结构 `user_lists`
--

CREATE TABLE IF NOT EXISTS `user_lists` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Wechatid` char(28) NOT NULL,
  `Time` date NOT NULL,
  PRIMARY KEY (`User_Id`),
  UNIQUE KEY `Wechatid` (`Wechatid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `user_lists`
--

INSERT INTO `user_lists` (`User_Id`, `Name`, `Wechatid`, `Time`) VALUES
(1, '高康', '18664840001', '2016-11-17'),
(2, '刘仁', '18664840002', '2016-11-19'),
(3, '天雷', '18664840003', '2016-11-21'),
(4, '静华', '18664840004', '2016-11-22'),
(5, '世林', '18664840005', '2016-11-25'),
(6, '朱涛', '18664840006', '2016-11-29'),
(7, '路飞', '18664840007', '2016-12-01'),
(8, '索隆', '18664840008', '2016-12-01'),
(9, '香格斯', '18664840009', '2016-12-01'),
(10, '青雉', '18664840010', '2016-12-01'),
(11, '鹰眼', '18664840011', '2016-12-01'),
(12, '明哥', '18664840012', '2016-12-01'),
(13, '萨博', '18664840013', '2016-12-01');

-- --------------------------------------------------------

--
-- 表的结构 `user_recommend_collection`
--

CREATE TABLE IF NOT EXISTS `user_recommend_collection` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `Time` date NOT NULL,
  `Uid` int(11) NOT NULL,
  `MediaId` int(11) NOT NULL,
  PRIMARY KEY (`us_id`),
  KEY `MediaId` (`MediaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `user_recommend_collection`
--

INSERT INTO `user_recommend_collection` (`us_id`, `Time`, `Uid`, `MediaId`) VALUES
(1, '2016-12-01', 1, 1),
(2, '2016-12-01', 1, 2),
(3, '2016-12-01', 3, 3),
(4, '2016-12-01', 5, 4),
(5, '2016-12-01', 5, 5),
(6, '2016-12-01', 2, 6),
(7, '2016-12-01', 4, 7),
(8, '2016-12-01', 4, 8),
(9, '2016-12-01', 4, 9),
(10, '2016-12-01', 3, 10),
(11, '0000-00-00', 0, 11),
(12, '0000-00-00', 0, 11),
(13, '0000-00-00', 0, 11),
(14, '0000-00-00', 0, 7),
(15, '0000-00-00', 0, 6);

-- --------------------------------------------------------

--
-- 表的结构 `user_recommend_lists`
--

CREATE TABLE IF NOT EXISTS `user_recommend_lists` (
  `UR_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `PariseCount` int(11) NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`UR_Id`),
  UNIQUE KEY `Title` (`Title`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `user_recommend_lists`
--

INSERT INTO `user_recommend_lists` (`UR_Id`, `Name`, `thumb`, `Title`, `Reason`, `PariseCount`, `createTime`, `UserID`) VALUES
(1, '高康', 'http://p.xdsq.net/attachment/Mon_1402/148_1750080_2716c0dd02f070b.jpg', '天台', '我喜欢周杰伦！！！！！！！！！！！！！！！！！', 1, '2016-11-08 16:00:00', 1),
(2, '刘仁', 'http://www.sfs-cn.com/node3/node924/node20962/node20963/images/00167858.jpg', '奇异博士', '我喜欢奇异博士！！！！！！！！！！', 2, '2016-11-01 16:00:00', 2),
(3, '天雷', 'http://www.sfs-cn.com/node3/node924/node23790/node23791/images/00198677.jpg', '唐人街探案', '我喜欢王宝强啊！！', 3, '2016-11-04 16:00:00', 3),
(4, '世林', 'http://p.xdsq.net/attachment/Mon_1401/148_1750080_53c93273f0997f2.jpg', '白一山', '我喜欢邓超呀！！！！', 4, '2016-11-05 16:00:00', 4),
(5, '朱涛', 'http://www.sfs-cn.com/node3/node924/node21794/node21795/images/00176267.jpg', '疯狂动物城', '我喜欢小兔子呀！！！', 5, '2016-11-07 16:00:00', 5),
(6, '静华', 'http://pic.58pic.com/58pic/13/10/75/50h58PICQGn_1024.jpg\r\n', '我的战争', '我喜欢！！！！', 6, '2016-12-07 16:00:00', 6),
(7, '路飞', 'http://pic.58pic.com/58pic/12/56/93/71N58PICZIc.jpg', '火锅英雄', '我喜欢！！！！', 7, '2016-11-10 16:00:00', 7),
(8, '索隆', 'http://www.sfs-cn.com/node3/node924/node19850/node19851/images/00154777.jpg', '生死阻击', '我喜欢！！！', 8, '2016-11-12 16:00:00', 8),
(9, '鹰眼', 'http://www.tiprc.org.tw/blog_wp/wp-content/uploads/images/20120602.jpg', '激战', '我喜欢！！！！', 9, '2016-11-16 16:00:00', 9),
(10, '萨博', 'http://pic.baike.soso.com/p/20120906/20120906155926-985977158.jpg', '僵尸世界大战', '我喜欢呀！！！', 10, '2016-11-21 16:00:00', 10),
(11, '明哥', 'http://pic.hqshuaimi.com/uploads2011/allimg/111009/17-111009112234.jpg', '微微一笑很倾城', '我不喜欢呀！！！！', 12, '2016-11-22 16:00:00', 11);

--
-- 限制导出的表
--

--
-- 限制表 `admin_content_comment`
--
ALTER TABLE `admin_content_comment`
  ADD CONSTRAINT `admin_content_comment_ibfk_1` FOREIGN KEY (`MediaID`) REFERENCES `admin_recommend_lists` (`AR_ID`);

--
-- 限制表 `admin_recommend_collection`
--
ALTER TABLE `admin_recommend_collection`
  ADD CONSTRAINT `admin_recommend_collection_ibfk_1` FOREIGN KEY (`MediaId`) REFERENCES `admin_recommend_lists` (`AR_ID`),
  ADD CONSTRAINT `admin_recommend_collection_ibfk_2` FOREIGN KEY (`Uid`) REFERENCES `user_lists` (`User_Id`);

--
-- 限制表 `admin_recommend_lists`
--
ALTER TABLE `admin_recommend_lists`
  ADD CONSTRAINT `admin_recommend_lists_ibfk_1` FOREIGN KEY (`Type_id`) REFERENCES `media_type` (`id`);

--
-- 限制表 `user_recommend_collection`
--
ALTER TABLE `user_recommend_collection`
  ADD CONSTRAINT `user_recommend_collection_ibfk_1` FOREIGN KEY (`MediaId`) REFERENCES `user_recommend_lists` (`UR_Id`);

--
-- 限制表 `user_recommend_lists`
--
ALTER TABLE `user_recommend_lists`
  ADD CONSTRAINT `user_recommend_lists_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_lists` (`User_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
