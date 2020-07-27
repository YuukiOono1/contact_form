-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2020 年 7 月 27 日 02:43
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `task`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name_kana` varchar(20) NOT NULL,
  `first_name_kana` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `post_code` varchar(9) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `about` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`id`, `last_name`, `first_name`, `last_name_kana`, `first_name_kana`, `email`, `post_code`, `telephone`, `content`, `about`, `created_at`) VALUES
(1, '山田', '太郎', 'yamada', 'tarou', 'yamada@gmail.com', '1111111', '11111111111', 'テスト', '会社について', '2020-07-27 00:37:25'),
(2, '田中', '太郎', 'tanaka', 'tarou', 'tanaka@gmail.com', '222222', '22222222222', 'テストテストテスト', '購入について', '2020-07-27 00:38:29'),
(3, '木村', '花子', 'キムラ', 'ハナコ', 'kimura@gmail.com', '1111111', '22222222222', 'aaaaaaaaaa', '商品について', '2020-07-27 00:39:16'),
(4, '山田', '花子', 'yamada', 'hanako', 'hanako@gmail.com', '3333333', '33333333333', 'テストテスト', '支払いについて', '2020-07-27 00:40:02'),
(5, '遠藤', '太郎', 'endou', 'tarou', 'endou@gmail.com', '2222222', '34334242342', 'あああああああ', 'その他', '2020-07-27 00:40:51'),
(6, '鈴木', '一郎', 'suzuki', 'ichiro', 'suzuki@gmail.com', '1231234', '23212341234', 'test', 'その他', '2020-07-27 02:15:16'),
(7, '高橋', '太郎', 'takahashi', 'tarou', 'takahashi@example.com', '1232322', '12312342345', 'test', '会社について', '2020-07-27 02:31:33');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
