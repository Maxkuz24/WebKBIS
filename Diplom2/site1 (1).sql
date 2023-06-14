-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2023 г., 23:23
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bron`
--

CREATE TABLE `bron` (
  `id` int NOT NULL,
  `name` text,
  `date` date DEFAULT NULL,
  `time` text,
  `prepodawatel` text,
  `kabinet` text,
  `id_stud` int DEFAULT NULL,
  `id_zapisi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bron`
--

INSERT INTO `bron` (`id`, `name`, `date`, `time`, `prepodawatel`, `kabinet`, `id_stud`, `id_zapisi`) VALUES
(11, 'Нейронные сети', '2023-05-06', '11:50-12:40', 'Короченцев Д. А.', '1-234', 51, 0),
(14, 'Нейронные сети', '2023-05-06', '11:50-12:40', 'Короченцев Д. А.', '1-234', 51, 0),
(15, 'Нейронные сети', '2023-05-06', '11:50-12:40', 'Короченцев Д. А.', '1-234', 51, 0),
(16, 'Базы данных', '2023-05-24', '12:00-13:40', 'Короченцев Д. А.', '8-231', 53, 0),
(17, 'Нейронные сети', '2023-05-06', '11:50-12:40', 'Короченцев Д. А.', '1-234', 51, 0),
(18, 'Нейронные сети', '2023-05-06', '11:50-12:40', 'Короченцев Д. А.', '1-234', 51, 0),
(136, 'Сетевые технологии', '2023-06-29', '11:50-12:40', 'Короченцев Д. А.', '1-234', 1, 51),
(138, 'Базы данных', '2023-06-10', '22:34-22:35', 'Лапсарь А. П.', '8-234', 1, 86),
(139, 'Базы данных', '2023-06-03', '15:25-17:00', 'Домбаян Г. С.', '1-388', 1, 84);

-- --------------------------------------------------------

--
-- Структура таблицы `closezapisi`
--

CREATE TABLE `closezapisi` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prepodawatel` varchar(20) NOT NULL,
  `kabinet` varchar(10) NOT NULL,
  `kolstud` int DEFAULT NULL,
  `kolprepod` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `closezapisi`
--

INSERT INTO `closezapisi` (`id`, `name`, `date`, `time`, `prepodawatel`, `kabinet`, `kolstud`, `kolprepod`) VALUES
(66, 'Нейронные сети', '2023-06-20', '12:00-13:40', 'Короченцев Д. А.', '1-234', 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL,
  `id_topic` int DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `img`, `content`, `status`, `id_topic`, `created_date`) VALUES
(1, 1, 'Студент кафедры КБИС меняет подход к обучению', '1685992385_max.jpg', 'Студент факультета ИИВТ ведет разработку виртуального обучающего тренажера для проведения специальных обследований защищаемых помещений на предмет выявления закладных устройств на Unreal Engine 5, что изменит подход к обучению', 1, 1, '2023-03-24 00:17:55'),
(17, 1, '14 студентов ДГТУ успешно сдали сертификационный тест от ГК Astra Linux', '1685992455_1.JPG', 'Ребята прошли обучение по предмету «Операционные системы» и далее успешно сдали сертификационный тест от ГК Astra Linux на основе базового и расширенного администрирования по продукту Astra Linux Special Edition\r\n</br></br>\r\nПомимо практических навыков и сертификатов ребята получили возможность участия в проекте «Астра-карьера» и конкурсе «Астра-стипендия», где могут получать от компании-разработчика финансовую поддержку.', 1, 1, '2023-05-19 00:03:44');

-- --------------------------------------------------------

--
-- Структура таблицы `prepod`
--

CREATE TABLE `prepod` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL,
  `id_topic` int DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `prepod`
--

INSERT INTO `prepod` (`id`, `id_user`, `title`, `img`, `content`, `status`, `id_topic`, `created_date`, `iduser`) VALUES
(1, 71, 'Короченцев Д. А.', '1685485676_Korochentsev.JPG', 'Зав. кафедрой, доцент , к.т.н. </br>Короченцев Денис Александрович </br>Научные интересы: Техническая защита информации от утечек техническим каналам, программно-аппаратная защита информации штатными и дополнительными средствами, разработка алгоритмов распознавания угроз информационной безопасности с использованием методов нечеткой логики.', 1, 1, '2023-05-19 14:05:22', 71),
(2, 71, 'Лапсарь А. П.', 'Lapsar.jpg', 'Доцент , к.т.н. , Доцент </br>Лапсарь Алексей Петрович </br>\nЗаместитель начальника отдела Управления ФСТЭК России по Южному и Северо-Кавказскому федеральным округам. Сфера деятельности: реализация государственной политики в области технической защиты информации ограниченного доступа в зоне ответственности Управления.', 1, 1, '2023-05-19 00:06:39', 1),
(3, 71, 'Болдырихин Н. В.', 'Boldyrikhin.JPG', 'Доцент , кандидат технических наук </br>Болдырихин Николай Вячеславович </br> В настоящее время является доцентом кафедры КБИС, ведет пять лекционных дисциплин, проводит все виды занятий, занимается научной деятельностью, является куратором учебной группы. Научные интересы: Управление наблюдениями, радиотехника, радиолокация, информационная безопасность, сети связи', 1, 3, '2023-05-19 14:15:45', 4),
(4, 71, 'Гапон Н. В.', 'Gapon1.jpg', 'Старший преподаватель, м.н.с. </br>Гапон Николай Валерьевич </br> Обладаю навыками работы в области цифровой обработки сигналов, компьютерного зрения. Научные интересы: Цифровая обработка сигналов, компьютерное зрение', 1, 2, '2023-05-19 01:54:42', 1),
(5, 71, 'Язвинская Н. Н.', 'Yazvinskaya1.jpg', 'Кандидат технических наук , Доцент </br>Язвинская Наталья Николаевна </br> Стаж научно-педагогической работы, в том числе стаж педагогической  работы в образовательных организациях ВПО: 10 лет, с 30.08.2005 г. Научные интересы: Математическое моделирование и исследования технологических процессов изготовления аккумуляторов, как элементов электротехнических систем для изделий машиностроения', 1, 3, '2023-05-19 14:07:13', 1),
(6, 71, 'Типаева Э. Р.', 'Tipaeva1.jpg', 'Старший преподаватель </br>Типаева Эльмира Рафаиловна</br> Работаю в качестве инженера и ассистента на кафедре «Математика». По роду своей деятельности регулярно провожу практические занятия и консультации со студентами очной формы обучения по дисциплинам: математика. Также отвечаю за введение документации кафедры. Научные интересы: Математические методы, численные методы, эволюционные алгоритмы, программирование', 1, 3, '2023-05-19 14:07:56', 1),
(7, 71, 'Алферова И. А.', 'Alferova.png', 'Старший преподаватель </br>Алферова Ирина Александровна </br> Проходит обучение в аспирантуре по специальности 05.13.01 «Системный анализ, управление и обработка информации». Научные интересы: Криптография, применение эллиптических кривых в криптографии, кодирование информации', 1, 1, '2023-05-19 14:16:07', 1),
(8, 71, 'Рощина Е. В.', 'Roshina.jpg', 'Доцент , к.э.н </br>Рощина Евгения Валерьевна </br> Читает лекции, проводит практические занятия по дисциплинам кафедры. Осуществляет руководство производственной практикой, курсовыми и дипломным проектированием студентов.\n\nПринимает участие в региональных, общероссийских и международных научных и научно-практических конференциях. Научные интересы: Инновационные методы и технологии управления и защиты данных', 1, 2, '2023-05-19 14:11:17', 1),
(9, 71, 'Савельев В. А.', 'Savelev.JPG', 'Доцент , к.ф.-м.н , доцент </br>Савельев Василий Александрович </br> В настоящее время является доцентом кафедры КБИС, ведет пять лекционных дисциплин в рамках программирования', 1, 2, '2023-05-19 14:09:04', 1),
(10, 71, 'Решетникова И. В.', 'Reshetnikova1.JPEG', 'Доцент , кандидат технических наук , доцент </br>Решетникова Ирина Витальевна </br> В настоящее время является доцентом кафедры КБИС, ведет дисциплины, связанные с сетевыми технологиями и проектированием информационных систем и технологий. Научные интересы: Телекоммуникационные системы и сети связи', 1, 3, '2023-05-19 14:13:07', 1),
(11, 71, 'Домбаян Г. С.', 'Dombayan.jpg', 'Программист </br>Домбаян Григорий Сергеевич </br> В настоящее время на кафедре КБИС ведет практические занятия по дисциплинам связанным с программированием и базами данных. Научные интересы: Нечеткая логика, базы данных, теория расписаний', 1, 1, '2023-05-19 14:14:53', 1),
(12, 71, 'Сафарьян О. А.', 'Safaryan.JPEG', 'доцент , кандидат технических наук </br>Сафарьян Ольга Витальевна </br> В настоящее время является доцентом кафедры КБИС, ведет множество дисциплины. К научным интересам относятся: Стабильность и точность установки частоты генератора; оценка отклонения частоты генератора; обработка и анализ результатов измерений фаз генераторов; синтез оптимальных параметров, технология распределенного реестра, безопасность компьютерных систем', 1, 1, '2023-05-19 14:09:57', 1),
(13, 71, 'Ревякина Е. А.', 'Revyakina.jpg', 'Доцент , к.т.н. , доцент </br>Ревякина Елена Александровна </br>  В настоящее время является доцентом кафедры КБИС, ведет множество дисциплины. К научным интересам относятся: Математические, технические и программные средства обеспечения информационной безопасности', 1, 1, '2023-05-19 14:12:28', 1),
(14, 71, 'Куликова О. В.', 'Kulikova.jpg', 'Доцент , к.ф.-м.н. </br>Куликова Ольга Витальевна</br> В настоящее время является доцентом кафедры КБИС, ведет дисциплины, связанные с программированием, защитой информации и разработкой баз данных', 1, 2, '2023-05-19 14:13:25', 1),
(15, 71, 'Енгибарян И. А.', 'Engibaryan1.png', 'Доцент , кандидат технических наук </br>Енгибарян Ирина Алешаевна</br> В настоящее время является доцентом кафедры КБИС, ведет дисциплины, связанные с интеллектуальными информационными системами, а также сетями и телекоммуникациями', 1, 1, '2023-05-19 14:13:47', 1),
(16, 71, 'Егорова Р. В.', 'Egorova1.jpg', 'Доцент , к.т.н. </br>Егорова Римма Викторовна </br> В настоящее время является доцентом кафедры КБИС, ведет дисциплины, связанные с программированием, а также проводит нормоконтроль ВКР студентов. Научные интересы: Порошковая металлургия, материаловедение, аддитивное производство', 1, 2, '2023-05-19 14:14:13', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(1, 'Базы данных', 'Обучения базам данных'),
(2, 'Нейронные сети', 'Чат GPT'),
(3, 'ТСЗИ', 'Технические средства защиты информации'),
(10, 'Программирование', 'Различные языки программирования'),
(11, 'Сетевые технологии', 'Сети');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `admin` tinyint NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES
(1, 2, 'Kimedo', 'kindmikee@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dWtQN1FhRWk1Um1xSTlUYw$EAk7pRV9aj5Z4fyx8XitTy+nPvJgJaXPJwGf3DPH0XU', '2023-03-28 17:51:51'),
(70, 0, 'user', 'user@mail.ru', '$argon2i$v=19$m=65536,t=4,p=1$NEtOZjFpY1BtL3pSb3pRbQ$8lbB38TsV5wD5pTY4/hOD7H1mh0JoV+fJcbyO3RCBHU', '2023-03-28 18:22:23'),
(71, 2, 'admin', 'admin@mail.ru', '$argon2i$v=19$m=65536,t=4,p=1$M0UwQzE2b0xKcUNXQlIucw$lWpA32B1qWU9Gi1itSSPpiVSzInjWIVsDhcOFdQhM+w', '2023-05-13 19:29:49'),
(72, 0, 'adad', 'q@mail.ru', '$argon2i$v=19$m=65536,t=4,p=1$STdmRmVVRXpyUFZ5L0M4Rw$uUEcqPDR+s62J0AdO0HXFiCiNGnweDKSseGbnO/tY9k', '2023-05-14 17:20:18'),
(73, 0, 'Mуedo', 'kindmikee1@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$N21TRTUvZXBRbUNnUFlQLw$+ucIGerSuGJX3NVYBX5YIOJbHUP2T9iRaqsH4teKZoc', '2023-05-19 11:37:52'),
(75, 0, 'rgsgsrge', 'rgegerg@efs.ru', '$argon2i$v=19$m=65536,t=4,p=1$aDZQaTlHeUpjUFZqaWRoaw$LcJQ/e9pgA/hultV0DQEj/cKckPWMqTAcWT50sv6wD8', '2023-05-29 08:42:05'),
(80, 1, 'admin', 'admin@xn--mail-o5da.ru', '$argon2i$v=19$m=65536,t=4,p=1$N0VMQkpRQkx6cEdIWlFZRQ$cRfn8gFA+502NeY0lIZXPZpreTSvrQ/a8StlUMZcz1g', '2023-06-01 09:31:10');

-- --------------------------------------------------------

--
-- Структура таблицы `zapisi`
--

CREATE TABLE `zapisi` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prepodawatel` varchar(20) NOT NULL,
  `kabinet` varchar(10) NOT NULL,
  `kolstud` int DEFAULT NULL,
  `kolprepod` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `zapisi`
--

INSERT INTO `zapisi` (`id`, `name`, `date`, `time`, `prepodawatel`, `kabinet`, `kolstud`, `kolprepod`) VALUES
(86, 'Базы данных', '2023-06-10', '16:30-18:00', 'Лапсарь А. П.', '8-234', 1, 15),
(51, 'Сетевые технологии', '2023-06-29', '11:50-12:40', 'Короченцев Д. А.', '1-234', 1, 5),
(87, 'ТСЗИ', '2023-06-16', '10:50-12:30', 'Короченцев Д. А.', '8-423', 0, 7),
(85, 'Нейронные сети', '2023-06-15', '12:25-13:00', 'Рощина Е. В.', '1-326', 0, 3),
(83, 'Нейронные сети', '2023-06-22', '12:25-13:00', 'Лапсарь А. П.', '1-326', 0, 5),
(84, 'Базы данных', '2023-06-03', '15:25-17:00', 'Домбаян Г. С.', '1-388', 1, 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bron`
--
ALTER TABLE `bron`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `closezapisi`
--
ALTER TABLE `closezapisi`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `prepod`
--
ALTER TABLE `prepod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `zapisi`
--
ALTER TABLE `zapisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bron`
--
ALTER TABLE `bron`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT для таблицы `closezapisi`
--
ALTER TABLE `closezapisi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `prepod`
--
ALTER TABLE `prepod`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `zapisi`
--
ALTER TABLE `zapisi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `prepod`
--
ALTER TABLE `prepod`
  ADD CONSTRAINT `prepod_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
