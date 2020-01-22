-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 22 2020 г., 20:16
-- Версия сервера: 5.7.28-0ubuntu0.18.04.4
-- Версия PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `smetter_airlines`
--

-- --------------------------------------------------------

--
-- Структура таблицы `flights`
--

CREATE TABLE `flights` (
  `flight_code` varchar(5) NOT NULL,
  `flight_from` varchar(255) NOT NULL,
  `flight_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `flights`
--

INSERT INTO `flights` (`flight_code`, `flight_from`, `flight_to`) VALUES
('AE210', 'Санкт-Петербург', 'Москва'),
('UA155', 'Санкт-Петербург', 'Одесса'),
('UT455', 'Москва', 'Ноябрьск'),
('UT456', 'Ноябрьск', 'Москва');

-- --------------------------------------------------------

--
-- Структура таблицы `flights_date`
--

CREATE TABLE `flights_date` (
  `id` int(11) NOT NULL,
  `flight` varchar(255) NOT NULL,
  `flight_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `flights_date`
--

INSERT INTO `flights_date` (`id`, `flight`, `flight_date`) VALUES
(1, 'AE210', '2020-01-20 22:29:56'),
(2, 'AE210', '2020-01-21 22:29:56'),
(3, 'AE210', '2020-01-24 22:30:00'),
(4, 'AE210', '2020-01-28 21:00:00'),
(5, 'UA155', '2020-01-30 22:32:05'),
(6, 'UA155', '2020-02-04 08:00:00'),
(7, 'UT455', '2020-01-27 02:30:40'),
(8, 'UT455', '2020-02-12 20:15:00'),
(9, '	\r\nUT456', '2020-02-01 05:20:00'),
(10, '	\r\nUT456', '2020-01-24 05:33:00');

-- --------------------------------------------------------

--
-- Структура таблицы `flights_seats`
--

CREATE TABLE `flights_seats` (
  `id` int(11) NOT NULL,
  `flight_code` varchar(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seat` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `flights_seats`
--

INSERT INTO `flights_seats` (`id`, `flight_code`, `user_id`, `seat`) VALUES
(1, '3', 1, '1F'),
(2, '3', 2, '1E'),
(3, '4', 3, '3F');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `passport` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `passport`) VALUES
(1, 'Дмитрий Редькин', '7413 895656'),
(2, 'Татьяна Демышева', '7518 895421'),
(3, 'Антон Барковский', '2356 885511');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `flights`
--
ALTER TABLE `flights`
  ADD UNIQUE KEY `code` (`flight_code`);

--
-- Индексы таблицы `flights_date`
--
ALTER TABLE `flights_date`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `flights_seats`
--
ALTER TABLE `flights_seats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passport` (`passport`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `flights_date`
--
ALTER TABLE `flights_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `flights_seats`
--
ALTER TABLE `flights_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

