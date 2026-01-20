-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql3112.db.sakura.ne.jp
-- 生成日時: 2026 年 1 月 20 日 21:21
-- サーバのバージョン： 8.0.43
-- PHP のバージョン: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `whitemarmot50_php02`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_userinfo_table`
--

CREATE TABLE `gs_userinfo_table` (
  `id` int NOT NULL,
  `user_type` varchar(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `user_pw` varchar(128) NOT NULL,
  `teacher_flg` int NOT NULL,
  `kanri_flg` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `gs_userinfo_table`
--

INSERT INTO `gs_userinfo_table` (`id`, `user_type`, `name`, `user_id`, `user_pw`, `teacher_flg`, `kanri_flg`) VALUES
(1, '教員', '細川浩直', 'aaa111', '$2y$10$u2o0ClMZFmx2xvhSRgUN8u51J1omQD2yOafceO32u5/.wC/mBm.iS', 1, 0),
(2, '卒業生', '山田太郎', 'aaa222', '$2y$10$nthwEi4jj4A2g5TupZTXHO.Ej/PCdYZ29KXdTgBtmGsBpq.LqDd8G', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_userinfo_table`
--
ALTER TABLE `gs_userinfo_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_userinfo_table`
--
ALTER TABLE `gs_userinfo_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
