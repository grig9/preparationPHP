-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 17 2022 г., 17:06
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lesson_php`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vk` varchar(255) NOT NULL,
  `telegram` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `status`, `position`, `image_name`, `phone`, `address`, `vk`, `telegram`, `instagram`, `role`) VALUES
(90, 'Alita@smartadminwebapp.com', '1', 'Alita Gray', '', 'Project Manager, Gotbootstrap Inc', 'avatar-c.png', '+1 317-456-2564', '134 Hamtrammac, Detroit, MI, 48314, USA', '', '', '', 'admin'),
(91, 'john.cook@smartadminwebapp.com', '2', 'Dr. John Cook PhD', '', 'Human Resources, Gotbootstrap Inc.', 'avatar-e.png', '+1 317-456', '55 Smyth Rd, Detroit, MI, 48341, USA', '', '', '', 'user'),
(93, 'oliver.kopyov@smartadminwebapp.com', '3', 'Oliver Kopyov', '', 'IT Director, Gotbootstrap Inc.', 'avatar-b.png', '+1 317-456-2564', '15 Charist St, Detroit, MI, 48212, USA', '', '', '', 'user'),
(94, 'jim.ketty@smartadminwebapp.com', '4', 'Jim Ketty123', '', 'Staff Orgnizer, Gotbootstrap Inc.', 'avatar-k.png', '+1 317-456-2564', '134 Tasy Rd, Detroit, MI, 48212, USA', '', '', '', 'user'),
(95, 'john.oliver@smartadminwebapp.com', '5', 'Dr. John Oliver', '', 'Oncologist, Gotbootstrap Inc.', 'avatar-g.png', '+1 313-779-8134', '134 Gallery St, Detroit, MI, 46214, USA', '', '', '', 'user'),
(96, 'sarah.mcbrook@smartadminwebapp.com', '6', 'Sarah McBrook', '', 'Xray Division, Gotbootstrap Inc.', 'avatar-h.png', '+1 313-779-7613', '13 Jamie Rd, Detroit, MI, 48313, USA', '', '', '', 'user'),
(97, 'jimmy.fallan@smartadminwebapp.com', '7', 'Jimmy Fellan', '', 'Accounting, Gotbootstrap Inc.', 'avatar-i.png', '+1 313-779-4314', '55 Smyth Rd, Detroit, MI, 48341, USA', '', '', '', 'user'),
(98, 'arica.grace@smartadminwebapp.com', '8', 'Arica Grace', '', 'Accounting, Gotbootstrap Inc.', 'avatar-j.png', '+1 313-779-3347', '798 Smyth Rd, Detroit, MI, 48341, USA', '', '', '', 'user'),
(115, 'john_connor@terminatro.com', '4321', 'John Connor', 'Не беспокоить', 'killer terminator', '61e2c11fd82e7.png', '911', 'future', 'vk.johnconnor', 'johnconnor', 'johnconnor', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
