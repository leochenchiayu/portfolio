-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-10 23:55:01
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `portfolio`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_to_comment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `thumb_up`
--

CREATE TABLE `thumb_up` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `thumb_up_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `name`, `image`) VALUES
(1, '1074889', '8e27e099836d796ad963272fd7aa96d0e1badb22', 'Leo', NULL),
(2, '1074889@etech.ncyu.edu.tw', NULL, '陳佳佑', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `work_path` varchar(225) DEFAULT NULL,
  `work_name` varchar(225) DEFAULT NULL,
  `work_description` varchar(225) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `category` varchar(25) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pic_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `work`
--

INSERT INTO `work` (`id`, `work_path`, `work_name`, `work_description`, `title`, `category`, `user_id`, `pic_type`) VALUES
(1, './image/character_painting.jpg', '運動人，簡化造型', '先利用illustrator影像描圖描繪人框，在將人框的做細部的調整，做出簡化造型特色', '造型設計', 'painting', 1, 1),
(2, './image/super_April.jpg', 'Super April', '這個是幫一位國中老師協助她製作一個屬於他的吉祥物，字體部分調整為類似斜體的感覺，讓整個方向感與前進感增加。而人物的部分則是用老師本身的外型做鋼筆描繪，讓整體感覺不脫離老師應有的特色!', '造型設計', 'painting', 1, 1),
(3, './image/animal_painting.jpg', 'Lion', '這個一樣是造型設計的作品，將原本的獅子輪廓描繪出來，再將轉為色塊，邊形。', '造型設計', 'painting', 1, 1),
(4, './image/0001.jpg', 'The Power of Nature', '利用PhotoShop的濾鏡，以及圖層效果，而背後樹木也是使用塗層效果做去被，而不是鋼筆或是鋼索工具', '影像處理', 'painting', 1, 1),
(5, './image/white_house.jpg', '白宮', '這個作品是使用圖層效果做去被，並且搭配重疊字體，字體修改做修正', '影像處理', 'painting', 1, 2),
(6, './image/high_heel.jpg', '光輝的高跟鞋教堂', '利用PhotoShop的濾鏡，反光效果，再將原本的高跟鞋做反轉及給予漸層', '影像處理', 'painting', 1, 1),
(7, './image/index_main.JPG', '學車五車', '使用快速快門呈現腳踏車呼嘯而過的感覺，快門:1/500', '大一攝影作品', 'photography', 1, 1),
(8, './image/IMG_1896.jpg', '嘉大鮮奶', '拍出嘉義大學的特色，牛奶及優格，而下放的布襯托出食物色系(暖色系)的感覺', '大三攝影作品', 'photography', 1, 1),
(9, './image/DSC_0265.jpg', 'NCYU鮮乳', '以遠近視角的方式拍出NCYU嘉義大學鮮奶', '大三攝影作品', 'photography', 1, 1),
(10, './image/DSC_0242.jpg', '嘉農鮮乳', '以遠近視角的方式拍出嘉義大學鮮奶', '大三攝影作品', 'photography', 1, 1),
(11, './image/photo.jpg', '偷吃的松鼠', '在夏日炎炎的日子裡，一群松鼠們在台南孔廟聚集，等著人餵食。而這張攝影作品先利用三分法，將重點放在四個角落，等時機一到按下快門。', '大一攝影作品', 'photography', 1, 2),
(12, './image/IMG_5401.jpg', '車水馬龍', '這張攝影作品是在台南小東路上拍，在下班放學時段按下慢速快門，讓車子的光線顯現出來。快門:15', '大一攝影作品', 'photography', 1, 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `work_id` (`post_id`);

--
-- 資料表索引 `thumb_up`
--
ALTER TABLE `thumb_up`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `thumb_up`
--
ALTER TABLE `thumb_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `work` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `thumb_up`
--
ALTER TABLE `thumb_up`
  ADD CONSTRAINT `thumb_up_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thumb_up_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `work` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
