-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Вер 28 2023 р., 20:35
-- Версія сервера: 8.0.30
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `building_materials`
--

-- --------------------------------------------------------

--
-- Структура таблиці `brand`
--

CREATE TABLE `brand` (
  `id` int NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'DEC'),
(6, 'BrandsUnit'),
(7, 'BrandSize'),
(8, 'AIKO');

-- --------------------------------------------------------

--
-- Структура таблиці `country`
--

CREATE TABLE `country` (
  `id` int NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Україна'),
(2, 'Німмеччина'),
(6, 'Чехія'),
(7, 'Польща'),
(8, 'Японія');

-- --------------------------------------------------------

--
-- Структура таблиці `material`
--

CREATE TABLE `material` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `img` varchar(255) NOT NULL,
  `unitId` int NOT NULL,
  `price_per_unit` int NOT NULL,
  `expiration_date` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Немає',
  `countryId` int NOT NULL,
  `brandId` int NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Немає',
  `supplierId` int NOT NULL,
  `typeId` int NOT NULL,
  `countPostman` int NOT NULL,
  `statusPostman` int NOT NULL,
  `datePostman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warehousePostman` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `material`
--

INSERT INTO `material` (`id`, `name`, `description`, `img`, `unitId`, `price_per_unit`, `expiration_date`, `countryId`, `brandId`, `size`, `supplierId`, `typeId`, `countPostman`, `statusPostman`, `datePostman`, `warehousePostman`) VALUES
(1, 'Цегла', 'Красна цегла - це матеріал, що здавна використовується в будівництві і відомий своєю неперевершеною естетичною привабливістю та надійністю. Виробник: Corporation.', 'chegla.jpg\n', 2, 500, '150 років', 1, 1, '25x10x5', 2, 8, 100, 1, '2023-09-05 00:00:00', 1),
(11, 'Пісок', 'Пісок в мішках - це маса дрібних частинок каміння, мінералів і органічних матеріалів, яка зазвичай збирається і упаковується в спеціальні мішки для зручності транспортування та використання. Основна характеристика піску в мішках - це його зернистість, яка може варіюватися від дуже дрібного до грубого, залежно від призначення.<br/>\r\n\r\nПісок в мішках використовується в різних галузях, включаючи будівництво, ландшафтний дизайн, сільське господарство та інші галузі. В будівництві пісок може використовуватися для виготовлення бетону, стяжки підлоги, а також для штукатурки та інших будівельних робіт. У ландшафтному дизайні пісок в мішках використовується для створення доріжок, алеї, а також для декоративного оформлення садів і парків.\r\n<br/>\r\nПісок в мішках може бути збагаченим поживними речовинами та мінералами для використання в сільському господарстві, де він може покращувати якість грунту та сприяти врожайності рослин.', 'изображение_2023-09-22_183736854.png', 6, 700, 'Немає', 1, 8, '50 кг', 5, 5, 50, 2, '2023-09-22 18:39:08', 1),
(12, 'Пісок ', 'Пісок - це маса дрібних частинок каміння, мінералів і органічних матеріалів, яка зазвичай збирається і упаковується в спеціальні мішки для зручності транспортування та використання. Основна характеристика піску в мішках - це його зернистість, яка може варіюватися від дуже дрібного до грубого, залежно від призначення.<br/>\r\n\r\nПісок в мішках використовується в різних галузях, включаючи будівництво, ландшафтний дизайн, сільське господарство та інші галузі. В будівництві пісок може використовуватися для виготовлення бетону, стяжки підлоги, а також для штукатурки та інших будівельних робіт. У ландшафтному дизайні пісок в мішках використовується для створення доріжок, алеї, а також для декоративного оформлення садів і парків.\r\n<br/>\r\nПісок в мішках може бути збагаченим поживними речовинами та мінералами для використання в сільському господарстві, де він може покращувати якість грунту та сприяти врожайності рослин.', 'изображение_2023-09-22_184130008.png', 1, 50, 'Немає', 1, 8, 'Немає', 5, 5, 1000, 1, '2023-09-22 18:42:23', 1),
(13, 'Цемент ', 'Цемент в мішках - це будівельний матеріал у формі порошку або дрібних гранул, який зазвичай упаковується в спеціальні мішки для зручності транспортування, зберігання та використання. Цей матеріал є одним із ключових компонентів для виготовлення бетону та різних видів будівельних сумішей.', 'изображение_2023-09-22_184552817.png', 6, 150, '4 роки', 2, 1, 'Немає', 6, 4, 50, 1, '2023-09-22 18:45:58', 2),
(14, 'Черепиця', 'Красна - це будівельний матеріал у формі плиток або листів, який використовується для покриття дахів будинків і споруд. Вона має яскравий червоний або теракотовий колір, який надає будинкам стильний і привабливий зовнішній вигляд. Красна черепиця може бути виготовлена з різних матеріалів, таких як глина, бетон або метал, і вона є популярним вибором для покрівель завдяки своїй естетичної привабливості і довговічності.', 'изображение_2023-09-22_185211158.png', 2, 20, '100 років', 8, 6, '30х15х2', 2, 11, 2000, 2, '2023-09-22 18:52:21', 1),
(15, 'Сіра черепиця', 'Черепиця - це будівельний матеріал у формі плиток або листів, який використовується для покриття дахів будинків і споруд. Вона має яскравий червоний або теракотовий колір, який надає будинкам стильний і привабливий зовнішній вигляд. Красна черепиця може бути виготовлена з різних матеріалів, таких як глина, бетон або метал, і вона є популярним вибором для покрівель завдяки своїй естетичної привабливості і довговічності.', 'изображение_2023-09-22_185249674.png', 2, 20, '100 років', 8, 6, '30х15х2', 2, 11, 2000, 1, '2023-09-22 18:52:53', 1),
(16, 'Чорна черепиця', 'Черепиця - це будівельний матеріал у формі плиток або листів, який використовується для покриття дахів будинків і споруд. Вона має яскравий червоний або теракотовий колір, який надає будинкам стильний і привабливий зовнішній вигляд. Красна черепиця може бути виготовлена з різних матеріалів, таких як глина, бетон або метал, і вона є популярним вибором для покрівель завдяки своїй естетичної привабливості і довговічності.', 'изображение_2023-09-22_185327279.png', 2, 20, '100 років', 8, 6, '30х15х2', 2, 11, 2000, 2, '2023-09-22 18:53:30', 1),
(17, 'Зелена черепиця', 'Черепиця - це будівельний матеріал у формі плиток або листів, який використовується для покриття дахів будинків і споруд. Вона має яскравий червоний або теракотовий колір, який надає будинкам стильний і привабливий зовнішній вигляд. Красна черепиця може бути виготовлена з різних матеріалів, таких як глина, бетон або метал, і вона є популярним вибором для покрівель завдяки своїй естетичної привабливості і довговічності.', 'изображение_2023-09-22_185355823.png', 2, 20, '100 років', 8, 6, '30х15х2', 2, 9, 2000, 1, '2023-09-22 18:53:59', 1),
(18, 'Коричнева черепиця ', 'Черепиця - це будівельний матеріал у формі плиток або листів, який використовується для покриття дахів будинків і споруд. Вона має яскравий червоний або теракотовий колір, який надає будинкам стильний і привабливий зовнішній вигляд. Красна черепиця може бути виготовлена з різних матеріалів, таких як глина, бетон або метал, і вона є популярним вибором для покрівель завдяки своїй естетичної привабливості і довговічності.', 'изображение_2023-09-22_185439375.png', 2, 20, '100 років', 8, 6, '30х15х2', 2, 9, 2000, 1, '2023-09-22 18:54:41', 1),
(19, 'Блок', 'Бетонний блок - це будівельний матеріал, який виготовляється шляхом формування суміші цементу, піску, води та агрегатів у певну форму та розміри, а потім залишається висихати та тверднути. Бетонні блоки мають зазвичай прямокутну або квадратну форму і використовуються у будівництві для створення стін, перегородок, фундаментів та інших будівельних конструкцій.\r\nОсновні характеристики бетонних блоків включають їх розмір, масу та міцність. Їх розмір може варіюватися від стандартних до спеціально виготовлених, відповідно до конкретних потреб будівельного проекту. Блоки можуть бути легкими (з додаванням легких агрегатів) або важкими, залежно від вимог до міцності та ізоляції.\r\nБетонні блоки легко монтувати, оскільки вони зазвичай мають спеціальні пази та шпонки, які дозволяють їх точно зєднувати. Вони також можуть бути оброблені, фарбовані або прикрашені для досягнення бажаного зовнішнього вигляду.\r\nБетонні блоки застосовуються в різних галузях будівництва, включаючи житлове будівництво, комерційне будівництво, ландшафтний дизайн та інші галузі завдяки їхній надійності та відносно низькій вартості. Вони також можуть бути використані для поліпшення теплоізоляції та звукоізоляції будівель.', 'изображение_2023-09-22_190300553.png', 2, 50, '70 років', 6, 6, '390x190x190', 6, 7, 750, 1, '2023-09-22 19:04:05', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `password`
--

CREATE TABLE `password` (
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `password`
--

INSERT INTO `password` (`password`) VALUES
('$2y$10$uLUpDi4HU2QdnzdUs1lbuujUH9m6DihWRCX6.JvDoP.4ODuHwlS3u');

-- --------------------------------------------------------

--
-- Структура таблиці `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'На складі'),
(2, 'Замовлений'),
(3, 'Немає в наявності');

-- --------------------------------------------------------

--
-- Структура таблиці `supplier`
--

CREATE TABLE `supplier` (
  `id` int NOT NULL,
  `name_company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `supplier`
--

INSERT INTO `supplier` (`id`, `name_company`, `address`, `phone`, `email`) VALUES
(1, 'Постачальник Америка', 'Америка вул Американська 51', '+38092841512', 'asdasd@gmail.com'),
(2, 'Постачальник Чехія', 'Чехія вул Чехська 51', '+380982145612', 'gsgsd2ads@gmail.com'),
(5, 'Постчальник Україна', 'Київ вул. Київська', '+38098124512', 'postman@gmail.com'),
(6, 'Постачальник Польща', 'Польща, вул Польська 24', '+38098124512', 'Poland@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблиці `type`
--

CREATE TABLE `type` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(4, 'Цемент'),
(5, 'Пісок'),
(7, 'Бетонний блок'),
(8, 'цеглаповнотіла'),
(9, 'Металочерепиця'),
(10, 'профнастил'),
(11, 'Черепиця');

-- --------------------------------------------------------

--
-- Структура таблиці `units`
--

CREATE TABLE `units` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, 'кг'),
(2, 'шт'),
(6, 'мішок');

-- --------------------------------------------------------

--
-- Структура таблиці `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `warehouse`
--

INSERT INTO `warehouse` (`id`, `address`) VALUES
(1, 'Україна, Київ, вул Київська 25'),
(2, 'Україна, Вінниця, вул Вінницька 54');

-- --------------------------------------------------------

--
-- Структура таблиці `warehouse_material`
--

CREATE TABLE `warehouse_material` (
  `id` int NOT NULL,
  `materialId` int NOT NULL,
  `statusId` int NOT NULL,
  `count` int NOT NULL,
  `price_per_units` int NOT NULL,
  `warehouseId` int NOT NULL,
  `appearance_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `warehouse_material`
--

INSERT INTO `warehouse_material` (`id`, `materialId`, `statusId`, `count`, `price_per_units`, `warehouseId`, `appearance_date`) VALUES
(2, 1, 1, 100, 550, 2, '2023-09-21 18:17:24'),
(14, 17, 1, 2000, 35, 1, '2023-09-22 19:05:30'),
(15, 15, 1, 2000, 25, 1, '2023-09-22 19:05:39'),
(19, 12, 1, 1000, 70, 1, '2023-09-22 19:07:50'),
(20, 13, 1, 50, 200, 2, '2023-09-22 19:09:33'),
(21, 19, 1, 700, 75, 1, '2023-09-22 19:09:39'),
(22, 18, 1, 2000, 25, 1, '2023-09-22 19:09:56');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unitId` (`unitId`),
  ADD KEY `countryId` (`countryId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `postmanId` (`supplierId`),
  ADD KEY `typeId` (`typeId`),
  ADD KEY `statusPostmanId` (`statusPostman`),
  ADD KEY `warehousePostmanId` (`warehousePostman`);

--
-- Індекси таблиці `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `warehouse_material`
--
ALTER TABLE `warehouse_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materialId2` (`materialId`),
  ADD KEY `statusId2` (`statusId`),
  ADD KEY `warehouseId2` (`warehouseId`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `country`
--
ALTER TABLE `country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `material`
--
ALTER TABLE `material`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблиці `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `type`
--
ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `units`
--
ALTER TABLE `units`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблиці `warehouse_material`
--
ALTER TABLE `warehouse_material`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `brandId` FOREIGN KEY (`brandId`) REFERENCES `brand` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `countryId` FOREIGN KEY (`countryId`) REFERENCES `country` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `postmanId` FOREIGN KEY (`supplierId`) REFERENCES `supplier` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `statusPostmanId` FOREIGN KEY (`statusPostman`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `typeId` FOREIGN KEY (`typeId`) REFERENCES `type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `unitId` FOREIGN KEY (`unitId`) REFERENCES `units` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `warehousePostmanId` FOREIGN KEY (`warehousePostman`) REFERENCES `warehouse` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `warehouse_material`
--
ALTER TABLE `warehouse_material`
  ADD CONSTRAINT `materialId2` FOREIGN KEY (`materialId`) REFERENCES `material` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `statusId2` FOREIGN KEY (`statusId`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `warehouseId2` FOREIGN KEY (`warehouseId`) REFERENCES `warehouse` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
