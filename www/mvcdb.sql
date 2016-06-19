-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 19 2016 г., 21:07
-- Версия сервера: 5.5.25
-- Версия PHP: 5.5.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mvcdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`) VALUES
(1, '12 прорывных технологий, которые изменят мир', 'В последнее время мы то и дело слышим о новых технологиях, каждая из которых вроде бы претендует на то, чтобы стать следующей «big thing».\r\nНо в действительности оказать по-настоящему значительное влияние на нашу жизнь смогут лишь немногие из них. Ниже перечислены самые важные и перспективные технологии, по версии McKinsey Global Institute!\r\n   По оценке экспертов, потенциальная экономическая выгода от внедрения этих технологий уже к 2025 году может составить от 14 до 33 триллионов долларов в год. При этом отмечается, что приведенные цифры не являются прогнозом, а призваны дать представление о том, какое влияние на экономику могут иметь ключевые преимущества внедрения этих технологий.', '2016-06-05'),
(2, 'Усовершенствованная роботехника', 'На сегодняшний день роботы чаще всего используются, чтобы выполнять за человека физически тяжелую, вредную, опасную или неприятную работу, например, во вредном промышленном производстве. Правда, в большинстве случаев это довольно дорогие и не слишком удобные в использовании машины.\r\n\r\nВ будущем, благодаря сенсорам и датчикам, искусственному интеллекту и Интернету вещей, роботы приобретут подобие органов чувств и мышления и смогут качественно выполнять значительно более сложные задачи.\r\n\r\nОни станут более компактными и более простыми в использовании, и сфера их применения значительно расширится.&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;\r\nМожно ожидать, что в ближайшем будущем усовершенствованные роботы найдут широкое применение в промышленности, сфере услуг и даже в медицине. Например, роботехника может помочь значительно повысить качество жизни людей с ограниченной подвижностью.', '2016-06-01'),
(3, 'Хранение энергии', 'Технологии для хранения энергии включают батареи и другие системы, которые позволяют хранить энергию для последующего использования. Литий-ионные батареи и топливные элементы уже используются в электрических и гибридных транспортных средствах, наряду с потребительской электроникой.\r\nВ частности, литий-ионные аккумуляторы за последние годы приобрели большую популярность на фоне заметного снижения стоимости.\r\nВ скором будущем благодаря дальнейшему развитию технологий хранения энергии стоимость электрических транспортных средств станет сопоставима со стоимостью машин с двигателями внутреннего сгорания.\r\n\r\nКроме того, усовершенствованные системы хранения энергии будут способствовать распространению солнечных и ветровых электростанций, а также позволят более экономно расходовать энергию. В развивающихся странах благодаря возобновляемым источникам энергии вкупе с новыми системами хранения энергии люди, которые прежде были этого лишены, получат надежный источник энергии.', '2016-06-05'),
(4, 'День России', '12 июня 1990 года на первом съезде народных депутатов РСФСР была принята Декларация о государственном суверенитете РСФСР.\r\n12 июня стало праздничной датой с 11 июня 1992 года, по постановлению Верховного Совета Российской Федерации как «День принятия Декларации о государственном суверенитете Российской Федерации». 25 сентября того же года были внесены соответствующие изменения в Кодекс законов о труде[3]. 12 июня 1998 года Борис Ельцин в своем телевизионном обращении предложил переименовать праздник в «День России»[4]. Официально это название было присвоено с принятием нового Трудового кодекса в 2002 году.\r\nВ День России в Кремле президент России вручает Государственные премии РФ. В Москве на Красной площади проходят торжества, которые оканчиваются праздничным салютом', '2016-06-12'),
(5, 'Че Гевара, Эрнесто', 'Эрне́сто Че Гева́ра (исп. Ernesto Che Guevara [ˈtʃe ɣeˈβaɾa], полное имя — Эрне́сто Рафаэ́ль Гева́ра де ла Се́рна, исп. Ernesto Rafael Guevara de la Serna; 14 июня 1928, Росарио, Аргентина — 9 октября 1967, Ла-Игера, Боливия)[5][6] — латиноамериканский революционер, команданте Кубинской революции 1959 года и кубинский государственный деятель.\r\nКроме латиноамериканского континента действовал также в Демократической Республике Конго и других странах мира (данные до сих пор носят гриф секретности). Прозвище Че использовал для того, чтобы подчеркнуть своё аргентинское происхождение. Междометие che является распространенным обращением в Аргентине[7].', '2016-06-12'),
(6, 'PHP', 'Требования\r\nЭти функции всегда доступны.\r\nУстановка\r\nДля использования этих функций не требуется проведение установки, поскольку они являются частью ядра PHP.\r\nНастройка во время выполнения\r\nДанное расширение не определяет никакие директивы конфигурации в php.ini.\r\nТипы ресурсов\r\nДанное расширение не определяет никакие типы ресурсов.\r\nПредопределенные константы\r\nПеречисленные ниже константы всегда доступны как часть ядра PHP.', '2016-06-13'),
(7, 'Общие понятия о переменных', 'Как и в любом другом языке программирования, в PHP существует такое понятие, как переменная.\r\n\r\nПри программировании на PHP можно не скупиться на объявление новых переменных. Принципы экономии памяти, которые были актуальны несколько лет назад, сегодня в расчет не принимаются. Однако, при хранении в переменных больших объемов памяти, лучше удалять неиспользуемые переменные, используя оператор Unset.\r\n\r\nВообще, переменная - это область оперативной памяти, доступ к которой осуществляется по имени. Все данные, с которыми работает программа, хранятся в виде переменных (исключение — константа, которая, впрочем, может содержать только число или строку). Такого понятия, как указатель (как в Си), в PHP не существует — при присвоении переменная копируется один-в-один, какую бы сложную структуру она ни имела. Тем не менее, в PHP, начиная с версии 4, существует понятие ссылок — жестких и символических.\r\n\r\nИмена всех переменных в PHP должны начинаться со знака $ — так интерпретатору значительно легче "понять" и отличить их, например, в строках. Имена переменных чувствительны к регистру букв: например, $var — не то же самое, что $Var или $VAR:\r\n\r\nВ официальной документации PHP указано, что имя переменной может состоять не только из букв "Латиницы" и цифр, но также и из любых символов, код ASCII которых старше 127, — в частности, и из символов кириллицы, то есть "русских" букв! Однако не рекоммендуется применять кириллицу в именах переменных — хотя бы из-за того, что в различных кодировках ее буквы имеют различные коды. Впрочем, поэксперементируйте и делайте так, как вам будет удобно.\r\n\r\nМожно сказать, что переменные в PHP — это особые объекты, которые могут содержать в буквальном смысле все, что угодно.', '2016-06-13');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `comment` varchar(256) NOT NULL,
  `art_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `created`, `comment`, `art_id`, `user_id`) VALUES
(1, '2016-06-06 00:00:00', 'Круто!', 3, 1),
(2, '2016-06-07 00:00:00', 'Статья супер!!! ', 3, 3),
(3, '2016-06-07 00:00:00', ' Все гуд!!', 2, 1),
(4, '2016-06-08 00:00:00', 'ОООоо', 3, 3),
(5, '2016-06-12 21:21:22', 'Интересно!', 1, 4),
(6, '2016-06-17 15:44:21', 'Ссылка взята с википедии!', 5, 3),
(8, '2016-06-15 22:16:30', 'Вышел заяц!', 7, 3),
(9, '2016-06-17 16:58:34', 'Привет!', 7, 1),
(16, '2016-06-18 13:25:01', 'Интересно!', 6, 2),
(13, '2016-06-17 15:35:44', 'Доброе утро всем', 7, 3),
(14, '2016-06-17 15:36:20', 'Ещё', 6, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `art_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rates`
--

INSERT INTO `rates` (`art_id`, `user_id`) VALUES
(3, 1),
(3, 3),
(6, 2),
(4, 2),
(7, 2),
(12, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `folderNumber` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `email`, `folderNumber`) VALUES
(1, 'Иван', 'admin', 'c7ba44696e1d9cfd8df208954c2f58f3', 'doctor254452009@ya.ru', 1),
(2, 'Михаил', 'doctor254', 'be7027f83aef27e080b209ad9f02965e', 'ssv@sdc.r', 0),
(3, 'Петр', 'user1', 'be7027f83aef27e080b209ad9f02965e', 'blabla@bla.la', 1),
(4, 'Юзер', 'user2', 'be7027f83aef27e080b209ad9f02965e', 'blabla@bla.la', 0),
(5, 'Единичка', 'doctor2544', 'db85eba6dcbbcdec9b6b58cc7972d356', 'blabla@bla.la', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
