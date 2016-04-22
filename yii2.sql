-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 22 2016 г., 17:19
-- Версия сервера: 5.6.28-log
-- Версия PHP: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `pseudonym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `firstName`, `lastname`, `pseudonym`) VALUES
(5, 'Михаил', 'Булгаков', 'Афанасьевич '),
(6, 'Джоан', 'Роулинг', 'Potter'),
(7, 'Фёдор', 'Достоевский', 'Михайлович ');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text,
  `year` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `title`, `text`, `year`, `author_id`) VALUES
(13, 'Белая гвардия', '"Белая гвардия" - увлекательная семейная сага Михаила Булгакова, в которой автор частично изобразил историю собственной семьи. Любовь и предательство на фоне войны, вера и отчаяние, страх и безудержная отвага - все это Булгаков передал простыми и понятными сердцу каждого словами.', 1924, 5),
(14, 'Мастер и Маргарита', '«Мастер и Маргарита» - культовый роман, ярчайший шедевр русской литературы, так до конца и не понятый, загадочный и манящий. Нечистая сила во главе с самим Дьяволом Воландом однажды весенним днем появляется в Москве, чтобы навести порядок', 1967, 5),
(15, 'Harry Potter and the Philosopher\'s Stone', 'Simple text', 1997, 6),
(16, 'Harry Potter and the Chamber of Secrets', 'Simple text #2', 1998, 6),
(17, 'Harry Potter and the Prisoner of Azkaban ', 'Simple text #3', 1999, 6),
(18, 'Идиот', '"Идиот". Роман, в котором творческие принципы Достоевского воплощаются в полной мере, а удивительное владение сюжетом достигает подлинного расцвета. Яркая и почти болезненно талантливая история несчастного князя Мышкина, неистового Парфена Рогожина и отчаявшейся Настасьи Филипповны,', 1869, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
