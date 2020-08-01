-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 01 2020 г., 07:13
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `date_bron`
--

-- --------------------------------------------------------

--
-- Структура таблицы `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `date_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `date`
--

INSERT INTO `date` (`id`, `date`, `date_at`, `phone`) VALUES
(278, '[\"2020-1-13\",\"2020-7-24\",\"2020-7-27\",\"2020-8-22\",\"2020-8-26\"]', '2020-08-01 03:20:03', '+7(222)-222-22-22'),
(279, '[\"2020-8-18\",\"2020-8-13\",\"2020-9-18\",\"2020-9-30\",\"2020-9-29\",\"2020-9-22\",\"2020-9-23\",\"2020-9-26\",\"2020-9-27\",\"2020-9-28\",\"2020-8-25\",\"2020-8-23\",\"2020-7-27\",\"2020-7-23\",\"2020-7-15\",\"2020-7-25\",\"2020-7-18\",\"2020-7-20\"]', '2020-08-01 03:20:33', '+7(222)-222-22-22'),
(280, '[\"2020-10-30\",\"2020-10-10\",\"2020-10-20\",\"2020-010-08\",\"2020-3-10\",\"2020-3-19\",\"2020-3-31\",\"2020-3-29\",\"2020-3-22\",\"2020-2-20\",\"2020-2-18\",\"2020-2-17\",\"2020-2-16\",\"2020-2-29\",\"2020-08-01\",\"2020-8-10\"]', '2020-08-01 03:22:01', '+7(333)-333-33-33'),
(281, '[\"2020-1-17\",\"2020-1-29\",\"2020-1-22\",\"2020-1-23\",\"2020-1-31\"]', '2020-08-01 03:24:00', '+7(333)-333-33-33'),
(282, '[\"2020-4-24\",\"2020-4-19\"]', '2020-08-01 03:26:25', '+7(222)-222-22-22'),
(283, '[\"2020-03-05\",\"2020-3-13\"]', '2020-08-01 03:27:27', '+7(222)-222-22-22'),
(284, '[\"2020-011-09\",\"2020-11-11\",\"2020-5-24\",\"2020-5-19\",\"2020-5-31\",\"2020-5-30\",\"2020-5-29\",\"2020-5-22\",\"2020-5-23\",\"2020-5-25\"]', '2020-08-01 04:12:59', '+7(324)-324-32-42');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;