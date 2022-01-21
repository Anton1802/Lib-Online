-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 17 2022 г., 14:08
-- Версия сервера: 8.0.27-0ubuntu0.20.04.1
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `name` varchar(99) NOT NULL,
  `path` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `path`) VALUES
(1, 'Локальные сети', 'pdfbooks/Локальные сети.pdf'),
(2, 'Основы цифровой схемотехники', 'pdfbooks/_Novikov_YU.V.__Osnovue_cifrovoi_shemotehniki._Baz.PDF'),
(3, 'Основы электроники для чайников', 'pdfbooks/Osnovy_elektroniki_dlya_chaynikov_2018_Shamie_Ketlin.pdf'),
(4, 'Условно-графические обозначения', 'pdfbooks/Условно графические обозначения.pdf'),
(5, 'Самоучитель PHP', 'pdfbooks/Самоучитель PHP.pdf'),
(6, 'PowerShell', 'pdfbooks/posh_popov.pdf'),
(7, 'Bash скриптинг', 'pdfbooks/Advanced-Bash-Scripting-Guide.pdf'),
(8, 'Модернизация и ремонт ПК', 'pdfbooks/Mueller.19.pdf'),
(9, 'Командная строка LINUX', 'pdfbooks/Командная строка LINUX.pdf'),
(10, 'Гравитация и эфир', 'pdfbooks/Bakulin_A_Gravitaciya_I_Yefir.a6.pdf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
