-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 08 2022 г., 16:41
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cards`
--

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

CREATE TABLE `card` (
  `path` varchar(34) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int NOT NULL,
  `name` varchar(34) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `person` int NOT NULL,
  `available` int NOT NULL,
  `id` int UNSIGNED NOT NULL,
  `count` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`path`, `num`, `name`, `price`, `person`, `available`, `id`, `count`) VALUES
('./img/hotel1.jpg', 1, 'Room #1', 1250, 1, 2, 1, 10),
('./img/hotel1.jpg', 2, 'Room #2', 1551, 3, 1, 3, 5),
('./img/hotel1.jpg', 3, 'Room #3', 1450, 3, 1, 4, 3),
('./img/hotel1.jpg', 4, 'Room #4', 1550, 3, 1, 5, 2),
('./img/hotel1.jpg', 5, 'Room #5', 2000, 4, 0, 6, 0),
('./img/hotel1.jpg', 6, 'Room #6', 2500, 6, 0, 7, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `del`
--

CREATE TABLE `del` (
  `fio` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasport` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `evict` date NOT NULL,
  `number` int NOT NULL,
  `dop1` int NOT NULL,
  `dop2` int NOT NULL,
  `dop3` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `del`
--

INSERT INTO `del` (`fio`, `pasport`, `date`, `evict`, `number`, `dop1`, `dop2`, `dop3`, `id`) VALUES
('сыр сыр сыр', '7777 777777', '2022-02-28', '2022-03-16', 1, 0, 0, 0, 5),
('сыр сыр сыр', '7777 777777', '2022-02-28', '2022-03-01', 1, 0, 0, 0, 5),
('сыр сыр сыр', '6017 777777', '2022-02-28', '2022-03-04', 2, 0, 0, 0, 6),
('Ля ля ля', '6017 777777', '2022-02-28', '2022-03-04', 2, 0, 0, 0, 7),
('Ля ля ля', '6017 12312312', '2002-03-12', '2022-03-08', 2, 1, 1, 1, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `fio` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasport` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `evict` date NOT NULL,
  `number` int NOT NULL,
  `dop1` int NOT NULL,
  `dop2` int NOT NULL,
  `dop3` int NOT NULL,
  `id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `card`
--
ALTER TABLE `card`
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
-- AUTO_INCREMENT для таблицы `card`
--
ALTER TABLE `card`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
