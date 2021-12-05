-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 05 2021 г., 06:19
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `deputatim`
--

-- --------------------------------------------------------

--
-- Структура таблицы `deputat`
--

CREATE TABLE `deputat` (
  `id` int(11) NOT NULL,
  `fio` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viloyat` int(10) NOT NULL,
  `region` int(10) NOT NULL,
  `okrug` int(11) NOT NULL,
  `problems` int(11) NOT NULL,
  `solved` int(11) NOT NULL,
  `contacts` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `deputat`
--

INSERT INTO `deputat` (`id`, `fio`, `viloyat`, `region`, `okrug`, `problems`, `solved`, `contacts`) VALUES
(1, 'Xikmat Boboqulovich', 1, 1, 2, 10, 8, '<p>Tel: 97-244-19-40</p>\r\n<p>Lavozimi: Termiz mintaqaviy temir yoʼl uzeliga qarashli Termiz aloqa va ishorat korxonasi bosh hisobchisi</p>\r\n<p>Partiyaviyligi : Oʼz.XDP</p>\r\n<p>Doimiy komissiya aʼzoligi : mahalliy byudjetni shakllantirish va ijro etish, iqtisodiy islohotlarni amalga oshirish va tadbirkorlikni rivojlantirish masalalari boʼyicha doimiy komissiyasi raisi</p>\r\n'),
(2, 'Moxira Raxmatullaevna', 1, 1, 9, 6, 0, '<p>Tel: 97-244-19-40</p>\r\n<p>Lavozimi: Oʼzbekiston taʼlim, fan va madaniyat xodimlari kasaba uyushmasi Surxondaryo viloyati boʼyicha maʼsul tashkilotchisi</p>\r\n<p>Partiyaviyligi : Oʼz.MTDP</p>\r\n<p>Doimiy komissiya aʼzoligi : nodavlat notijorat tashkilotlari va fuqarolik jamiyatining boshqa institutlari bilan hamkorlikda ishlash masalalalari boʼyicha doimiy komissiyasi raisi</p>'),
(3, 'Lapasova Oynabod', 1, 1, 16, 2, 2, '<p>Tel: 91-581-70-20</p>\r\n<p>Lavozimi: Termiz shahar 8-son umumtaʼlim maktabi direktori</p>\r\n<p>Partiyaviyligi : Oʼz “Аdolat” SDP</p>\r\n<p>Doimiy komissiya aʼzoligi : Yoshlar siyosati va sogʼlom avlodni tarbiyalash masalalari boʼyicha doimiy komissiyasi raisi</p>\r\n'),
(4, 'Abjalov Farrux', 1, 1, 16, 5, 2, '<p>Tel: 93-078-29-29</p>\r\n<p>Lavozimi: Oʼzbekiston XDP shahar Kengashi raisi </p>\r\n<p>Partiyaviyligi : Oʼz.XDP</p>\r\n<p>Doimiy komissiya aʼzoligi : Reglament va deputatlik odobi boʼyicha doimiy komissiya raisi</p>'),
(5, 'Baxtiyor Xolto\'rayevich', 1, 1, 21, 4, 1, '<p>Tel: 90-747-03-00</p>\r\n<p>Lavozimi: Termiz shahar koʼp tarmoqli markaziy poliklinikasi bosh vrachi </p>\r\n<p>Partiyaviyligi : Oʼz.MTDP</p>\r\n<p>Doimiy komissiya aʼzoligi : Аgrar, suv xoʼjaligi masalalalari va ekologiya boʼyicha doimiy komissiya raisi</p>'),
(6, 'Panji Abduxoliqovich', 1, 1, 23, 23, 1, '<p>Tel: 90-246-56-65</p>\r\n<p>Lavozimi: Surxondaryo viloyati “Suvoqova” davlat unitar korxonasi boshligʼi </p>\r\n<p>Partiyaviyligi : Oʼz.LiDeP</p>\r\n<p>Doimiy komissiya aʼzoligi : Sanoat, transport, qurilish, kommunal xoʼjaligi masalalalari va aholiga xizmat koʼrsatish boʼyicha doimiy komissiya</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `problem`
--

CREATE TABLE `problem` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deputat_id` int(10) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deputat_answer` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `problem`
--

INSERT INTO `problem` (`id`, `user_id`, `deputat_id`, `title`, `body`, `file`, `status`, `deputat_answer`) VALUES
(1, 1, 3, 'Tok bilan muammo', 'Muammo haqida to\'liq matn', '', 4, 'Ushbu muammoni bartaraf qilish uchun, adliya boshqarmasiga xat yuborildi'),
(2, 1, 3, 'Bog\'ishamol mahallasida asvalt yotqizish', 'Asvalt yotqizish bilan bog\'liq muammo matni', '', 4, 'tez kunlarda bartaraf etiladi');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `creator` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sms_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `access_token`, `email`, `avatar`, `created_date`, `update_date`, `creator`, `status`, `sms_code`, `address`, `phone_number`, `fio`, `passport`) VALUES
(1, 'jkjk', '$2y$13$ldeDlup.xoOSLXp0X7XU/uUgpNJLpnuMnRTa8G4ut72cLTEBv158a', 'MBkEoh2livkfr2M2rRJJJhhaA_kmNzNX', NULL, 'xjoha@mail.ru', NULL, '2021-12-04 13:34:44', '2021-12-04 13:34:44', 9, 2000, '463380', '3', '998911631236', 'Jahongir Xushboqov', 'AA5635624'),
(2, 'oynabod_lapasova', '$2y$13$kridVU6QlH/yMLA.fseDmOitqwdcJUT9FAVbBaxyi5W2oMaPU1/au', 'PsjJQUDQ-2HwFhcAeHCecJqmVwWGWpkX', NULL, 'oynabod@mail.ru', NULL, '2021-12-05 05:34:07', '2021-12-05 05:34:07', 9, 1000, '704819', '1', '998915817020', 'Lapasova Oynabod', 'AA8569965');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `deputat`
--
ALTER TABLE `deputat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `deputat`
--
ALTER TABLE `deputat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `problem`
--
ALTER TABLE `problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
