-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2023 г., 20:34
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fraim`
--

-- --------------------------------------------------------

--
-- Структура таблицы `game`
--

CREATE TABLE `game` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `game`
--

INSERT INTO `game` (`id`, `user_id`, `qty`) VALUES
(5, 20, 9),
(6, 5, 12),
(7, 21, 13),
(8, 22, 9),
(9, 23, 11),
(10, 24, 10),
(11, 25, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `value` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `value`) VALUES
(1, 21, 2),
(2, 5, 4),
(3, 22, 3),
(4, 21, 3),
(5, 20, 2),
(6, 20, 2),
(7, 20, 2),
(8, 20, 2),
(9, 20, 2),
(10, 24, 5),
(11, 24, 5),
(12, 24, 5),
(13, 23, 4),
(14, 23, 4),
(15, 23, 1),
(16, 24, 3),
(17, 23, 1),
(41, 5, 4),
(42, 24, 3),
(43, 5, 4),
(44, 24, 3),
(45, 21, 4),
(46, 21, 4),
(47, 21, 4),
(48, 24, 3),
(49, 21, 4),
(50, 21, 4),
(63, 25, 1),
(64, 25, 5),
(65, 25, 5),
(66, 25, 5),
(67, 25, 5),
(68, 25, 5),
(69, 25, 5),
(70, 25, 5),
(71, 25, 5),
(72, 22, 2),
(73, 22, 2),
(74, 22, 4),
(75, 22, 4),
(76, 22, 4),
(77, 25, 5),
(78, 25, 5),
(79, 23, 3),
(80, 20, 3),
(81, 5, 3),
(82, 23, 2),
(83, 24, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(120) DEFAULT NULL,
  `login` varchar(24) NOT NULL COMMENT 'Логин',
  `password` varchar(60) NOT NULL COMMENT 'Пароль',
  `is_admin` tinyint(1) DEFAULT '0',
  `points` int DEFAULT NULL COMMENT 'количество баллов'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `login`, `password`, `is_admin`, `points`) VALUES
(5, 'Admin', 'Admin', '$2y$10$dH6LBYFk1y6HUAV3u7oilOICWlLNSRr2N599u.93eAv/NR7sdRTce', 1, NULL),
(20, 'Anna', 'Anna', '$2y$10$/wBcsJS2nfTGxiy/Y.lbIuYvwaiSCCIv4quUwGuKYrwj1ocUAYoyK', 0, NULL),
(21, 'Павел', 'Pavel', '$2y$10$sqVgLj1jRCDAsNwzwl5XEe1CEyhAlNHKZp7cR29bS1kBOE1BuLeqm', 0, NULL),
(22, 'Люба', 'Luba', '$2y$10$DnEQplogsG5vPiYaMA8P4Og9UPte5e1PxgPDn3/kJH0CXdlc4gtdC', 0, NULL),
(23, 'Юля', 'Iuliy', '$2y$10$N3FaQxk39HmQwlOaHnzjNut3pxQA/BU/vooeEfOj1.z5xuxu9/kUS', 0, NULL),
(24, 'Вова', 'Vova', '$2y$10$9avEcy3df/Fgu05dY/JfhOoX1WplQrTdx9EoAapYGNhV/PUnFWe9S', 0, NULL),
(25, 'Серега', 'Serega', '$2y$10$.Y0d86SaVLY9x4NCL0W/eOWjsiHiX2TTYQNZDP5CPHzaIhCjiPCGS', 0, NULL),
(26, 'Иван', 'Ivan', '$2y$10$l6zQ1JdmNVKLo92l3I1VR.9QOD.Phs8r3GPqkdqS1.pP5IyPSJ03u', 0, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `game`
--
ALTER TABLE `game`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
