-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2023 a las 21:16:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soutofoods`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `pin`, `created_at`, `updated_at`) VALUES
(1, 'pepe mujica', 'pepe@gmail.com', '1234', NULL, NULL),
(2, 'juan oviedo', 'juan@gmail.com', '1234', NULL, NULL),
(3, 'hector guerra', 'hector@gmail.com', '1234', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_26_005000_add_column_users', 1),
(7, '2023_02_26_210538_create_customers_table', 1),
(8, '2023_03_04_123913_create_products_table', 1),
(9, '2023_03_04_143809_create_orders_table', 1),
(10, '2023_03_04_150046_create_ordersdetails_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` double(14,2) NOT NULL DEFAULT 0.00,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `date3` date NOT NULL,
  `comments` text NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `rebate` double(14,2) DEFAULT NULL,
  `rebateEmail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `total`, `date1`, `date2`, `date3`, `comments`, `customerEmail`, `rebate`, `rebateEmail`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 62.70, '2023-02-23', '2023-02-24', '2023-02-25', 'esto es un comentario de prueba', 'juan@gmail.com', 45.00, 'juancito@gmail.com', '2023-03-12 20:54:58', '2023-03-12 20:54:58'),
(2, 2, 1, 254.84, '2023-02-23', '2023-02-24', '2023-02-25', 'prueba del comentario', 'juan@gmail.com', 12.00, 'juancito@gmail.com', '2023-03-12 21:22:49', '2023-03-12 21:22:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `upc` varchar(255) DEFAULT NULL,
  `pallet` int(11) DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `amount` int(11) NOT NULL DEFAULT 0,
  `notes` double(8,2) NOT NULL DEFAULT 0.00,
  `finalprice` double(8,2) NOT NULL DEFAULT 0.00,
  `qtyone` int(11) NOT NULL DEFAULT 0,
  `qtytwo` int(11) NOT NULL DEFAULT 0,
  `qtythree` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ordersdetails`
--

INSERT INTO `ordersdetails` (`id`, `order_id`, `product_id`, `name`, `upc`, `pallet`, `price`, `amount`, `notes`, `finalprice`, `qtyone`, `qtytwo`, `qtythree`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sigurd Hilpert', 'CNCMJBKW5JS', 9, 11.81, 20, 2.44, 9.37, 5, 7, 8, '2023-03-12 20:54:58', '2023-03-12 20:54:58'),
(2, 1, 17, 'Wava Pacocha III', 'XKCZYC49G6J', 38, 5.51, 15, 1.33, 4.18, 5, 2, 8, '2023-03-12 20:54:58', '2023-03-12 20:54:58'),
(3, 2, 32, 'Sydni Bogan', 'SEJYBDZ2', 15, 18.20, 17, 12.40, 5.80, 10, 2, 5, '2023-03-12 21:22:49', '2023-03-12 21:22:49'),
(4, 2, 34, 'Heaven Brown', 'HCUCMGJ1', 13, 13.63, 23, 2.55, 11.08, 13, 5, 5, '2023-03-12 21:22:49', '2023-03-12 21:22:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itemnumber` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `upc` varchar(255) NOT NULL,
  `pallet` int(11) NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `itemnumber`, `name`, `description`, `upc`, `pallet`, `price`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'KBYNWQAB', 'Sigurd Hilpert', 'Deleniti ducimus at aut repellat velit et hic.', 'CNCMJBKW5JS', 9, 11.81, 1, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(2, 'PZZWULST', 'Kari Kozey', 'Vel aliquid cupiditate voluptas cum sint vitae.', 'OZHCQYL954X', 11, 6.64, 1, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(3, 'NILIALWVKFL', 'Willie Beier MD', 'Aut suscipit voluptatibus fugit ipsum.', 'JJMNQRMO', 39, 9.75, 2, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(4, 'GPCHROYKJDX', 'Reva Runolfsson', 'Voluptates quae libero ea porro quibusdam.', 'EKQNQL9X', 18, 9.51, 1, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(5, 'EQDMIFJ3', 'Camylle O\'Keefe', 'Vel non recusandae ipsa itaque.', 'RXTAQWOJUXW', 39, 15.85, 2, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(6, 'QAAYHUR2DKT', 'Ms. Fanny Schuppe DVM', 'Quae dicta consectetur velit repellat.', 'AIRBRKHS', 18, 11.51, 3, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(7, 'LTPFNJX9', 'Issac Steuber', 'Occaecati voluptatum iusto ducimus eius.', 'YSYTPKHB', 42, 2.65, 2, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(8, 'WGLPNY389MD', 'Mrs. Nelda Reichert', 'Quasi aperiam magni est.', 'QEEXVHER', 40, 9.03, 2, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(9, 'UTVRTI25M33', 'Enrique Lubowitz Sr.', 'Eligendi mollitia nesciunt consequatur quas enim.', 'RCFVSWHF8OG', 4, 15.02, 3, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(10, 'RJYTFAN4', 'Sidney Prohaska PhD', 'Quas est harum est eos ea voluptatum rerum.', 'TFFULP4J', 35, 9.46, 2, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(11, 'XGCMRXPDK2U', 'Dr. Concepcion Dietrich Jr.', 'Qui sit praesentium incidunt et eaque et.', 'BIPUXYAMJBU', 37, 8.67, 3, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(12, 'PTRGQFSQ', 'Louisa Gulgowski I', 'Quo inventore accusamus numquam voluptas.', 'DXPVPX8JBIR', 40, 9.81, 3, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(13, 'NEXUQBDOTV4', 'Dr. Arlo Keeling PhD', 'Et quam ratione ut id.', 'PLECWPRO', 35, 14.80, 3, '2023-03-12 20:51:48', '2023-03-12 20:51:48'),
(14, 'QOKKXI67011', 'Daron Rodriguez', 'Dolores culpa nam dolores vero.', 'VGOJNURM', 7, 12.41, 3, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(15, 'KBVYJAKG', 'Cara Leannon', 'Esse quibusdam ullam minima sint illo et.', 'YCAJWQYO', 38, 19.63, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(16, 'KTHOQUZ84CX', 'Mr. Clifford White', 'Magni provident eum rerum officiis et ipsam et.', 'FIHKYF5EJWR', 31, 5.95, 3, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(17, 'NCMMHF3H0HF', 'Wava Pacocha III', 'Voluptatem non atque amet quod.', 'XKCZYC49G6J', 38, 5.51, 1, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(18, 'OSSRCCX439I', 'Dr. Franco Abbott', 'Fugiat enim est sit non dicta.', 'PJYKPPEC', 1, 18.91, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(19, 'RECAOPMV', 'Lorine Johns', 'Tenetur iure omnis quos repellendus nobis.', 'WOWGYIJ3422', 22, 17.81, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(20, 'FEMPMVEDBHE', 'Prof. Concepcion Schultz III', 'Debitis odit optio minus est quisquam.', 'MYWJEEYV', 15, 14.48, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(21, 'OOWEETZG', 'Idella Gibson PhD', 'Repellat beatae in ut quaerat quia neque animi.', 'ZLIKJU24', 50, 12.05, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(22, 'UPGNLHEZ', 'Henderson Harris Jr.', 'Saepe et harum quaerat autem vel magnam vel.', 'RTDZVWGP', 25, 8.72, 3, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(23, 'LYTSUFYV', 'Dereck Douglas', 'Sunt quia quia quibusdam fugiat et.', 'WKROIUXDJ49', 49, 6.69, 1, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(24, 'ABXILH4C', 'Kevon Bernier DDS', 'Eos corrupti qui facilis velit aliquam ut est ut.', 'ORUMHTYS', 7, 17.48, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(25, 'XIXZFM7KWXH', 'Alexa Dibbert', 'Hic rerum sint recusandae.', 'KYMALEK75E7', 36, 2.03, 1, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(26, 'XHMUHX7V', 'Mrs. Sharon Kuvalis', 'Dolores facere enim libero similique.', 'NZOPWMQE', 20, 9.92, 1, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(27, 'RETJYK0XKDR', 'Dr. Jade Shields I', 'Exercitationem ut qui similique ducimus eos aut.', 'JFBJTS37', 14, 19.97, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(28, 'LKCQOSCSECF', 'Rozella Rice', 'Asperiores totam et sequi voluptate.', 'CYGKNQFF', 24, 3.03, 1, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(29, 'IQXALGDEC91', 'Quinn Wunsch', 'Temporibus quaerat omnis ea perspiciatis.', 'SHGSMNOM', 27, 14.96, 3, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(30, 'POTHCYGN7I4', 'Dr. Maria Flatley', 'Maxime commodi sit omnis architecto.', 'VAMIOX5T722', 5, 5.38, 3, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(31, 'HBFLKVRCALG', 'Jacklyn Pollich', 'Enim quasi illum neque aut corporis.', 'DVVQQTOYYSU', 21, 1.75, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(32, 'KEPZEJG7UY8', 'Sydni Bogan', 'Iste temporibus molestias impedit ducimus.', 'SEJYBDZ2', 15, 18.20, 1, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(33, 'ZKXMKTEB4N8', 'Prof. Lazaro Effertz DDS', 'Impedit odit quo ut sunt numquam.', 'PGOIVTO3YHD', 5, 13.72, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(34, 'YAJQYG70', 'Heaven Brown', 'Aut dolore delectus et ullam aut iusto.', 'HCUCMGJ1', 13, 13.63, 1, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(35, 'HTSHJKU1V3A', 'Mrs. Zelma Lindgren', 'Qui quibusdam animi recusandae qui qui.', 'LEFXCGID', 29, 9.52, 1, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(36, 'LAEXYR5X', 'Cathryn Prohaska', 'Facere incidunt aut consectetur et eum excepturi.', 'NXMTINDT', 11, 10.12, 3, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(37, 'PQFEGA7O308', 'Mrs. Robyn Abshire III', 'Aut ea qui nam quod esse non.', 'QINLHT7T', 49, 1.19, 2, '2023-03-12 20:51:49', '2023-03-12 20:51:49'),
(38, 'YEELNB8O67V', 'Adrien Gleason', 'Nulla autem sit minima atque quis.', 'TICADDKA', 37, 4.17, 1, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(39, 'OPGBNQL9', 'Prof. Stephan Zboncak', 'Excepturi qui in et est sunt aut.', 'PBSYBFPMPJM', 22, 15.81, 3, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(40, 'KHPFXFUHH0X', 'Rowena Harber', 'Libero eveniet est molestiae quia voluptates.', 'RWVDETTUHF5', 8, 7.29, 3, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(41, 'HVANMYS88NS', 'Kobe Yost PhD', 'Eveniet est qui et voluptatem.', 'TYTKLYG1', 10, 16.96, 3, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(42, 'PZIDNIFN', 'Robert Hagenes V', 'Eius tempore culpa in quam inventore et.', 'LLOGRJEJOVF', 21, 8.67, 3, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(43, 'OFYSWBQ8F7D', 'Prof. Emanuel Hansen MD', 'Similique et ea ratione voluptatem quis ullam.', 'UAMVLB5K', 5, 7.83, 2, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(44, 'RVRFTQI8', 'Greta Murray Sr.', 'Non consequatur minus non aperiam in.', 'XFWFWM6Y', 34, 14.41, 2, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(45, 'DCQSGL4FX8X', 'Payton Fadel', 'A architecto voluptatem officia iure.', 'NTBBNN94KZX', 37, 13.89, 2, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(46, 'LMOZURMH', 'Prof. Soledad Berge', 'Neque hic ut aut. Vitae atque facere autem nemo.', 'JCUINTNG5EF', 13, 12.44, 3, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(47, 'PFRYQNDCGUU', 'Kianna Lehner', 'Aut ea modi animi.', 'SKVEVNDE', 16, 18.13, 3, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(48, 'CHPZTQEV', 'Waylon White', 'Laudantium sed necessitatibus ut ex eius impedit.', 'QIIJCGWG', 47, 6.24, 3, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(49, 'RDGXGPTS', 'Prof. Otto Wintheiser', 'Eaque omnis dolor earum amet fugit libero.', 'EPKIOE8FXO6', 32, 1.81, 1, '2023-03-12 20:51:50', '2023-03-12 20:51:50'),
(50, 'GPFXML42', 'Ayla Gottlieb', 'Aut nulla qui illum sit rem.', 'XCEBXVEHRSE', 4, 13.11, 3, '2023-03-12 20:51:50', '2023-03-12 20:51:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `date3` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `date1`, `date2`, `date3`) VALUES
(1, 'siproced', 'siproced@gmail.com', NULL, '$2y$10$q.wtnYvAoE9U68mmEn9d4.bnOB/AI15iBJfAgoOpgjksYNnp1xWne', NULL, NULL, NULL, '2023-02-23', '2023-02-24', '2023-02-25'),
(2, 'juan', 'juan@gmail.com', NULL, '$2y$10$ojmik5jgiAmAcN6uvnXudu2hrCUkJkEdYozuwpxL8.qK3XI/Igsny', NULL, NULL, NULL, '2023-02-23', '2023-02-24', '2023-02-25'),
(3, 'pepe', 'pepe@gmail.com', NULL, '$2y$10$861XgU2JvNPx0GIY9hifKuuIcV/ut8H95ZHPYys2PDrUMjAh6fEsu', NULL, NULL, NULL, '2023-05-10', '2023-06-05', '2023-07-08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indices de la tabla `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordersdetails_order_id_foreign` (`order_id`),
  ADD KEY `ordersdetails_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD CONSTRAINT `ordersdetails_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordersdetails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
