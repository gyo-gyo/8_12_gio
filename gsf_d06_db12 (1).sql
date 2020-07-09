-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-07-09 14:23:55
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsf_d06_db12`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `dream_table`
--

CREATE TABLE `dream_table` (
  `id` int(12) NOT NULL,
  `times` int(12) NOT NULL,
  `time` int(12) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dream_table`
--

INSERT INTO `dream_table` (`id`, `times`, `time`, `date`, `type`, `comment`) VALUES
(1, 8, 9, '2020-06-12', '殺される夢', '友達に刺される'),
(2, 8, 9, '2020-06-22', '楽しい夢', '海に行った'),
(4, 2, 2, '2020-06-22', '楽しい夢', '気持ちはいい感じ   '),
(5, 9, 9, '2020-06-23', '恋愛', '好きな人     '),
(6, 9, 9, '2020-06-23', '恋愛', '好きな人'),
(7, 1, 1, '2020-06-24', '楽しい夢', '最近眠りが浅いです。');

-- --------------------------------------------------------

--
-- テーブルの構造 `sns`
--

CREATE TABLE `sns` (
  `id` int(1) NOT NULL,
  `lat` int(12) DEFAULT NULL,
  `lon` int(12) DEFAULT NULL,
  `title` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tennki` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `sns`
--

INSERT INTO `sns` (`id`, `lat`, `lon`, `title`, `text`, `tennki`, `time`) VALUES
(1, NULL, NULL, 'ｔｒｒｒえ', 'ええええええ', NULL, '2020-07-09 20:26:24'),
(2, NULL, NULL, 'ｔｒｒｒえ', 'ええええええ', NULL, '2020-07-09 20:33:07'),
(3, NULL, NULL, 'ｔｒｒｒえ', 'ええええええ', NULL, '2020-07-09 21:15:41');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(2, 'G\'sに行く', '2020-06-22', '2020-06-20 15:29:03', '2020-06-20 15:29:03'),
(3, '天神に行く', '2020-07-16', '2020-06-20 15:31:06', '2020-06-20 15:31:06'),
(4, '福大の課題する', '0000-00-00', '2020-06-20 15:32:08', '2020-06-20 15:32:08'),
(5, 'オンライン飲み会', '2020-06-27', '2020-06-20 15:33:33', '2020-06-20 15:33:33'),
(6, '美容室に行く', '2020-06-20', '2020-06-20 16:39:59', '2020-06-20 16:39:59'),
(7, 'エステに行く', '2020-06-27', '2020-06-20 16:48:29', '2020-06-20 16:48:29'),
(8, 'ネイル行く', '2020-06-24', '2020-06-20 16:49:27', '2020-06-20 16:49:27'),
(9, 'G\'S課題する', '2020-06-26', '2020-06-20 16:50:54', '2020-06-20 16:50:54'),
(10, 'さちおか飲み', '2020-06-25', '2020-06-20 16:54:51', '2020-06-20 16:54:51'),
(11, 'ネイル行く', '2020-06-27', '2020-06-27 15:12:45', '2020-06-27 15:12:45'),
(12, '美容室に行く', '2020-07-04', '2020-06-27 16:44:24', '2020-06-27 16:44:24');

-- --------------------------------------------------------

--
-- テーブルの構造 `userdeta`
--

CREATE TABLE `userdeta` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `userdeta`
--

INSERT INTO `userdeta` (`id`, `email`, `password`, `created`) VALUES
(1, 'gyo.gyo.xxxx.16@gmail.com', '$2y$10$ThqPMkrgPjtdi24KyDR3ruUldhz/QV6kYe3bAA5xNYiT6P517JMs2', '2020-07-04 04:53:42');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1', 0, 0, '2020-06-30 18:36:17', '2020-06-30 18:36:17'),
(5, 'test3', 'test3', 0, 0, '2020-07-04 16:09:03', '2020-07-04 16:09:03');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `dream_table`
--
ALTER TABLE `dream_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sns`
--
ALTER TABLE `sns`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `userdeta`
--
ALTER TABLE `userdeta`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `dream_table`
--
ALTER TABLE `dream_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルのAUTO_INCREMENT `sns`
--
ALTER TABLE `sns`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルのAUTO_INCREMENT `userdeta`
--
ALTER TABLE `userdeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルのAUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
