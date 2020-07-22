-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2020 年 7 月 22 日 01:35
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
(1, '山田', '太郎', 'ヤマダ', 'タロウ', 'yamada@example.com', '1111111', '11111111111', 'テストテストテスト', '会社について', '2020-07-22 00:28:38'),
(2, '木村', '花子', 'キムラ', 'ハナコ', 'kimura@example.com', '2222222\r\n', '33333333333', 'テストテストテスト', '購入について', '2020-07-22 00:28:51'),
(3, '鈴木', '一郎', 'スズキ', 'イチロウ', 'suzuki@example.com', '2222222\r\n', '44433333333', 'ああああああああああああああああ', '商品について', '2020-07-22 00:29:03'),
(4, '高橋', '太郎', 'タカハシ', 'タロウ', 'takahashi@example.com', '8789779\r\n', '11111111111', 'いいいいいいいいいいいいいいいい', '支払いについて', '2020-07-22 00:29:12'),
(5, '山田', '花', 'ヤマダ', 'ハナ', 'yamada@example.com', '3334455\r\n', '45323422342', 'あああああ', 'その他', '2020-07-22 00:29:21'),
(6, '木村', '太郎', 'ヤマダ', 'タロウ', 'tarou@example.com', '9875555', '23424323542', 'おおおおおおおおおお', '支払いについて', '2020-07-22 00:37:50');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
