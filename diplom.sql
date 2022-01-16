-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 16 2022 г., 18:31
-- Версия сервера: 5.7.33
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Основы Java Script', '2021-11-04 12:03:34', '2021-11-04 12:03:34'),
(2, 'Игры на Java Script', '2021-11-04 12:53:06', '2021-11-05 08:57:10'),
(4, 'Продвинутый Java Script', '2021-11-05 08:57:38', '2021-11-05 08:57:47'),
(8, 'Тест', '2021-11-12 17:07:12', '2021-11-12 20:10:04');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_name`, `course_id`, `text`, `created_at`, `updated_at`) VALUES
(1, 4, 'Elka', 3, 'Курс оказался очень насыщенным, в котором я узнал очень много нововведений и интересных вещей.\r\nПри выборе Института ключевыми факторами стали: время обучения, стоимость, количество часов и профессионализм ментора.\r\nОчень понравилось насыщенность и актуальность информации', '2021-11-05 08:28:38', '2021-11-05 08:28:38'),
(2, 4, 'Elka', 2, 'Благодаря обучению у меня появились знания работы JavaScripta, курс дал мне представление о фреймворках и вариантах их использования. ', '2021-11-05 09:24:34', '2021-11-05 09:24:34'),
(3, 3, 'Yota', 1, 'Я долго искал курсы \"JavaScript\", которые бы шли именно в вечернее время, чтобы успевать на них с учебы. В процессе обучения на курсах Института IBA мне очень понравилось то, что программа делает акцент на практику и не перегружает теорией. За 10 занятий почти на каждом мы решали практические задачи под руководством тренера Ивана, на мой взгляд очень опытного и компетентного преподавателя! Обстановка занятий отличная - хороший комфортный класс, современные компьютеры. Сам институт находится, можно сказать, в центре, поэтому добираться для меня проблем не было. Спасибо вам, курсы реально полезные и продуманные!', '2021-11-04 09:24:34', '2021-11-04 09:24:34'),
(12, 5, 'Ashelinn', 2, 'hd hfdhf kjdhg sh gkhkdfhg h', '2021-11-05 13:12:20', '2021-11-05 13:12:20'),
(13, 5, 'Ashelinn', 2, 'jsahfdjhfsjhg jhgkh gkdhg dgf fh h  t', '2021-11-05 13:12:27', '2021-11-05 13:12:27'),
(19, 6, 'Brain', 1, 'Спасибо за ваш отзыв', '2021-11-07 08:49:51', '2021-11-07 08:49:51'),
(20, 1, 'Admin', 2, 'зучите принцип работы таких ветвлений, а также научитесь составлять верные условия для проверки данных.Вами будет изучено 3 тип', '2021-11-09 17:55:09', '2021-11-09 17:55:09'),
(24, 6, 'Brain', 6, 'fdfd gdfg dfg dg zg', '2021-11-09 18:24:04', '2021-11-09 18:24:04'),
(25, 6, 'Brain', 6, 'dfgdfgd jdjg ldkjg djg ldjgh dfghd hdh fh', '2021-11-09 18:24:12', '2021-11-09 18:24:12'),
(26, 4, 'Elka', 1, 'Написать комментарий', '2021-11-13 06:55:39', '2021-11-13 06:55:39'),
(27, 3, 'Yota', 2, 'сообщение от Yota', '2022-01-16 07:30:17', '2022-01-16 07:30:17');

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block1` text COLLATE utf8mb4_unicode_ci,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block2` text COLLATE utf8mb4_unicode_ci,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exercise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `title`, `category_id`, `author`, `price`, `cover`, `description`, `introduction`, `video`, `block1`, `img1`, `block2`, `img2`, `exercise`, `file`, `author_id`, `created_at`, `updated_at`) VALUES
(1, '1 Введение в язык JS. Что к чему', 1, 'Mentor', 400, '/assets/courses/Mentor/1 Введение в язык JS. Что к чему/cover.jpg', 'Первая лекция будет полностью теоретической. В ней вы познакомитесь с основными понятиями в JavaScript, рассмотрите различные примеры и все это в формате интересной презентации. Вы узнаете из чего состоит язык, зачем он используется, какие функции выполняет.', 'Современный мир веба очень сложно представить без JS. JavaScript – это душа веб-сайта, так как все интерактивные действия выполняет JS. JavaScript является встроенным компонентом в веб-программировании, поэтому его не нужно устанавливать или настраивать.', '/assets/courses/Mentor/1 Введение в язык JS. Что к чему/video.mp4', '<h3>Информация про JavaScript</h3>\r\n<p>JavaScript является преимущественно клиентским языком, обычно использующимся для работы на стороне клиента. С его помощью можно разрабатывать приложения с самым разнообразным функционалом. Это может быть: аналог механических часов, различная анимация, графические эффекты и многое другое. Ничего не мешает создать практически все веб-приложение на JS.</p>\r\n<p>Сегодня сложно переоценить роль JavaScript в вебе. Согласно <a href=\"https://w3techs.com/technologies/details/cp-javascript\" class=\"header-menu__bluelink\">статистике w3techs</a>, сегодня свыше <b>97%</b> сайтов применяют JS. Оставшиеся <b>3%</b> - это преимущественно сайты визитки и одностраничники. Невероятная популярность языка делает его одним из самых желанных для изучения и выгодных в плане дальнейшего трудоустройства.\r\n</p>', '/assets/courses/Mentor/1 Введение в язык JS. Что к чему/javascript_anim.gif', '<h2>История языка</h2>\r\n<p>Язык основан в 1995 году компанией Netscape. Изначально предназначался в роли языка сценариев для их браузера Navigator 2. В начале пути носил название LiveScript. Разработчики воспользовались волной популярность Java и сменили название на JavaScript. </p>\r\n<p>Такое решение запутало многих и даже по сей день их часто путают начинающие разработчики. Многие заявляют, что это одинаковые языки или имеют малозначимые отличия. Это совсем не так, JS и Java – совсем разные языки. Единственная схожесть в них – название.</p>\r\n<p>Изначально JS не имел большинства из сегодня доступных функций, его возможности были крайне скудными. Главной целью являлось лишь добавление небольшого интерактива странице. Разработчики хотели, чтобы результаты после нажатий на кнопки обрабатывались в пределах одной страницы.</p>\r\n<p>Сейчас JavaScript может использоваться и в качестве серверного языка. Прежде JS всегда рассматривался исключительно в качестве клиентского языка, работающего исключительно в браузере пользователя. Для работы с сервером приходилось пользоваться чем-то вроде Java, PHP, ASP.NET, Ruby. За счёт Node.js появилась возможность оперировать запросами на сервере посредством JS.</p>', '/assets/courses/Mentor/1 Введение в язык JS. Что к чему/1538747976.jpg', '', '', 2, '2021-11-04 10:48:08', '2021-11-04 10:48:08'),
(2, '2 Условные операторы в языке JavaScript', 1, 'Mentor', 350, '/assets/courses/Mentor/2 Условные операторы в языке JavaScript/cover.jpg', 'Ветвление или же условные операторы позволяют проверить некое условие и выполнить код в зависимости от результата условия. Вы изучите принцип работы таких ветвлений, а также научитесь составлять верные условия для проверки данных.Вами будет изучено 3 типа условий и каждый из них будет рассмотрен на практике.', 'Условные конструкции позволяют проверить некое выражение и в зависимости от его результата выполнить необходимый код. В уроке мы познакомимся с конструкцией «if - else» и конструкцией «switch - case».', '/assets/courses/Mentor/2 Условные операторы в языке JavaScript/uslovie.mp4', NULL, '', NULL, '', '', '', 2, '2021-11-04 10:49:44', '2021-11-04 10:49:44'),
(3, '3 Массивы данных. Одномерные и многомерные массивы', 1, 'Mentor', 350, '/assets/courses/Mentor/3 Массивы данных. Одномерные и многомерные массивы/123.jpeg', 'За урок мы научимся работать с массивами данных в языке JavaScript. При помощи массивов можно хранить большие объемы информации в одном единственном месте. Мы изучим одномерные и многомерные массивы данных.', 'За урок мы научимся работать с массивами данных в языке JavaScript. При помощи массивов можно хранить большие объемы информации в одном единственном месте. Мы изучим одномерные и многомерные массивы данных.', '/assets/courses/Mentor/3 Массивы данных. Одномерные и многомерные массивы/uslovie.mp4', '<p>Массивы позволяют хранить большой объем информации в одном месте. В языке <b>JavaScript</b> можно найти несколько основных типов массивов. </p>\r\n<h3>Одномерный массив</h3>\r\n<p>Одномерный массив состоит из нескольких элементов, объединенных под одним именем. Чтобы создать массив необходимо создать переменную и присвоить ей значение <b>new Array()</b>. Внутри вы можете через запятую записывать различные значения, которые и будут элементами массива.</p>\r\n<p>В массивах отсчет начинается с 0, поэтому первый элемент по индексу будет равен 0, второй - 1 и так далее.</p>\r\n<p>Примеры создания массива:</p>', '/assets/courses/Mentor/3 Массивы данных. Одномерные и многомерные массивы/code1.jpg', '<p>Работать с элементами массива можно точно как с переменными. Мы можем их выводить или же устанавливать для них новые значения.</p>\r\n<p>Для массивов существует несколько дополнительных функций, которые ещё будут изучены в ходе курса. Сейчас был изучен лишь метод <b>length</b>, который позволяет получить длину всего массива.</p>\r\n<p>Пример метода:</p>', '/assets/courses/Mentor/3 Массивы данных. Одномерные и многомерные массивы/code2.jpg', '', '', 2, '2021-11-04 10:51:38', '2021-11-04 10:51:38'),
(5, 'Пишем игру Логика на чистом Java Script', 2, 'Brain', 950, '/assets/courses/Mentor/Пишем игру Логика на чистом Java Script/734137443-1.jpg', 'Цель данного урока - создать простую игру под названием \"Логика\". В э\r\nтой игре игроку предоставляется 10 шансов, чтобы угадать последовательность цветов. После каждого варианта игроку выдается результат угадывания. Реализовывать игру будем на чистом Java Script', 'Прежде, чем писать логику, продумайте дизайн игры. Сделайте разметку страницы и пропишите все стили. Вы также можете взять исходные файлы к уроку (смотри в конце статьи)', '/assets/courses/Mentor/Пишем игру Логика на чистом Java Script/logica.mp4', NULL, '', NULL, '', '', '/assets/courses/Mentor/Пишем игру Логика на чистом Java Script/logicFiole.rar', 6, '2021-11-04 10:54:36', '2021-11-04 10:54:36'),
(6, 'Пишем HTML5 арканоид на чистом JavaScript и Canvas', 2, 'Brain', 1200, '/assets/courses/Mentor/Пишем HTML5 арканоид на чистом JavaScript и Canvas/arkanoid.jpg', 'В этом вебинаре я покажу, что самостоятельно сделать небольшую игру на JavaScript - просто. Более того, мы сделаем ее за 1 час! И при этом нам не потребуется никаких дополнительных библиотек или фреймворков. Мы напишем весь код на чистом JavaScript с использованием HTML5 canvas.', '<p>В ходе обучения мы разберем следующие темы:</p>\r\n<ul>\r\n<li> основы работы с HTML5 canvas, </li>\r\n<li> загрузка и отрисовка спрайтов,</li>\r\n<li> движение изображений,</li>\r\n<li> обработка столкновений,</li>\r\n<li> покадровая анимация,</li>\r\n<li> обработка событий ввода.</li>\r\n</ul>\r\n<p>\r\nА главное, мы разберем, как создавать игры на JavaScript: напишем код игровой логики. Полученные знания станут отличной отправной точкой к дальнейшему более глубокому практическому применению языка JavaScript и разработки игр на нем.</p>\r\n<p>\r\nБудет полезно пройти этот вебинар до начала изучения вашего первого HTML5-фреймворка для создания игр. Возможности игровых JS-движков станут намного понятнее, т.к. вы уже будете знать, как они реализованы и что за ними стоит.</p>', '/assets/courses/Mentor/Пишем HTML5 арканоид на чистом JavaScript и Canvas/canvas.mp4', NULL, '', NULL, '', '', '', 6, '2021-11-04 11:02:59', '2021-11-04 11:02:59'),
(8, '11 События и обработчик событий в JavaScript', 1, 'Mentor', 400, '/assets/courses/Brain/11 События и обработчик событий в JavaScript/cover.jpg', 'Для работы с пользователем вам необходимо научиться обрабатывать его действия: нажатия, перемещения, наведение мыши и прочее. За урок мы научимся отслеживать действия пользователя и в зависимости от них выполнять различный код.', 'В HTML есть специальные атрибуты для каждого тега, которые способны вызвать функцию при определенном действии пользователя. Такие обработчики могут срабатывать в определенное событие: нажатие, наведение мышки, двойной клик, выбор элемента и так далее.', '/assets/courses/Brain/11 События и обработчик событий в JavaScript/uslovie.mp4', '<p>В качестве значения для атрибута можно поместить функцию, которая будет вызываться каждый раз при срабатывании события. К примеру, если мы хотим вызвать всплывающее окно при двойном клике на текст, то стоит записать следующий HTML-код:</p>\r\n<code>\r\n<p ondblclick=\"testFunction()\">Нажмите два раза</p>\r\n</code>\r\n<p>При двойном нажатии будет вызываться функция testFunction. Осталось лишь добавить саму функцию:</p>\r\n<code>\r\nfunction testFunction() {\r\n	alert(\"Вы нажали два раза!\");\r\n}\r\n</code>\r\n<p>Вы также можете передать неограниченное количество параметров в саму функцию. Для этого при вызове функции в круглых скобках записывайте значения для передачи данных.</p>', '', NULL, '', '/assets/courses/Brain/11 События и обработчик событий в JavaScript/logicFiole.rar', '/assets/courses/Brain/11 События и обработчик событий в JavaScript/logicFiole.rar', 2, '2021-11-04 11:17:02', '2021-11-04 11:18:53'),
(9, 'Курс от Билла Гейтса', 2, 'Gates', 30000, '/assets/courses/Gates/Курс от Билла Гейтса/Gates.jpg', 'Курс от Билла Гейтса.', 'Курс от Билла Гейтса.', '/assets/courses/Gates/Курс от Билла Гейтса/canvas.mp4', NULL, '', NULL, '', '', '', 7, '2021-11-04 15:16:42', '2021-11-04 15:16:42'),
(10, '9 Взаимодействие с пользователем', 4, 'Brain', 1500, '/assets/courses/Brain/9 Взаимодействие с пользователем/bigKS.jpg', 'В уроке вы познакомитесь с каждой из функций и научитесь получать данные от пользователя, выводить для него всплывающие сообщения и делать много других интерактивных вещей.', 'Для взаимодействия с пользователем, в JavaScript существуют три очень удобные и практичные функции', '/assets/courses/Brain/9 Взаимодействие с пользователем/video.mp4', NULL, '', NULL, '', '', '', 6, '2021-11-11 17:05:52', '2021-11-11 17:05:52');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `mentors`
--

CREATE TABLE `mentors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `mentors`
--

INSERT INTO `mentors` (`id`, `mentor_id`, `fullname`, `text`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 7, 'Билл Гейтс', 'Все и так знают, кто я', '/assets/mentors/Gates.jpg', '2021-11-04 15:39:48', '2021-11-04 15:39:48'),
(2, 2, 'Ментор', '<p>Увлекаюсь программированием с 13 лет. Коммерческим программированием занимаюсь с 2009г. Основной язык – JavaScript. Очень нравится писать на нём хотя знаю и несколько других языков. Разнообразие применения JavaScript просто поражает. Зная его можно создать web-приложение, desktop и даже мобильное приложение!</p>\r\n<p>Также с 2014г преподаю курсы по web-разработке в Новосибирске, с 2019 года – на этом сайте.</p>', '/assets/mentors/platon.jpg', '2021-11-04 15:41:01', '2021-11-04 15:41:01'),
(3, 6, 'Мегамозг', 'Живу фронтенд-разработкой c 2014 года. За это время прошёл путь от начинающего до ведущего разработчика в компании EPAM.\r\n\r\nТакже являюсь лидером фронтенд-сообщества внутри компании, где помогаю готовить доклады и веду встречи по фронтенд. Последние два года занимаюсь развитием и обучением коллег как лектор и ментор.', '/assets/mentors/brain.jpg', '2021-11-04 15:41:19', '2021-11-04 15:41:19'),
(5, 7, 'Тест', 'Выбран Gates', '/assets/mentors/Torvaldc.jpg', '2021-11-11 17:56:35', '2021-11-11 17:58:29'),
(6, 7, 'Человек', 'выбран один из зарегестрированных пользователей', '/assets/mentors/Kaspersky.jpg', '2021-11-15 15:36:22', '2021-11-15 15:36:22');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_30_194100_create_roles_table', 1),
(6, '2021_10_30_194531_add_ban_to_users_table', 1),
(10, '2021_11_04_114453_create_categories_table', 2),
(11, '2021_11_04_120428_create_courses_table', 3),
(17, '2021_11_04_155134_create_mentors_table', 5),
(19, '2021_11_04_134441_create_comments_table', 6),
(20, '2021_11_07_101748_create_payments_table', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Ashelinn_11@mail.ru', '$2y$10$oIJEQBbRegxlXGS9y.87m.SkPE193w2F05s4iv3it6.4aSyCn6LFC', '2021-11-09 17:16:37');

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 4, 5, '2021-11-01 10:21:05', '2021-11-01 10:21:05'),
(2, 3, 3, '2021-11-02 10:21:05', '2021-11-02 10:21:05'),
(3, 4, 3, '2021-11-02 10:52:46', '2021-11-02 10:52:46'),
(4, 4, 1, '2021-11-07 13:30:11', '2021-11-07 13:30:11'),
(5, 3, 9, '2021-11-07 13:31:53', '2021-11-07 13:31:53'),
(6, 4, 2, '2021-11-13 08:17:47', '2021-11-13 08:17:47');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Администратор', NULL, NULL),
(2, 'Ментор', NULL, NULL),
(3, 'Пользователь', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `ban`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Admin', 1, 'admin@mail.ru', NULL, '$2y$10$aq7d/VlKKSMZUWte1jAjaOqhh4XueHF77PXCWTdyKI9uQyVUM6ieq', NULL, '2021-10-30 18:28:42', '2021-11-12 19:02:44', 1),
(2, 'Mentor', 1, 'mentor@mail.ru', NULL, '$2y$10$bSUtlP3t5xbd08lqrLO.qupMi/Cptn6PmeVSGfJ02WXit7yK8VgRG', NULL, '2021-10-30 18:30:07', '2021-11-15 15:37:24', 2),
(3, 'Yota', 1, 'yota@mail.ru', NULL, '$2y$10$iedYkIzuq4rXGe49883nwOE7PEBbVD7PV87udviE1ZrxIFBLrVEwu', NULL, '2021-10-30 18:30:21', '2021-11-12 19:16:59', 3),
(4, 'Elka', 0, 'elka@mail.ru', NULL, '$2y$10$86ZlH2RyqjusnwQDwsQj5eVoAhOgJL2x4c4Qic96yw4z4EipQjS4C', NULL, '2021-10-30 18:40:22', '2021-11-15 15:38:28', 3),
(5, 'Ashelinn', 0, 'Ashelinn_11@mail.ru', NULL, '$2y$10$Fa75i8VlhjuXQ7Bs0Qp2zOiFDEMwIslWm8YzeNksCfB87Jy6C7P16', NULL, '2021-11-01 18:14:47', '2021-11-05 13:12:56', 3),
(6, 'Brain', 1, 'brain@mail.ru', NULL, '$2y$10$4MtksuV0clSETPE2KjbX.eJEITy5LNcxlFZjCPcWvSaWmLVnPuc/W', NULL, '2021-11-04 08:54:17', '2021-11-04 08:54:17', 2),
(7, 'Gates', 1, 'gates@mail.ru', NULL, '$2y$10$3aQF1alVwYaZfAMkGCgjfO3Kqd9mihzWVzbO8NLxF1DKcETK8NIdK', NULL, '2021-11-04 15:15:18', '2021-11-12 20:24:08', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_course_id_foreign` (`course_id`);

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `courses_author_id_foreign` (`author_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentors_mentor_id_foreign` (`mentor_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_course_id_foreign` (`course_id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `mentors`
--
ALTER TABLE `mentors`
  ADD CONSTRAINT `mentors_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
