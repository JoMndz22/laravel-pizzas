-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-08-2020 a las 00:36:53
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emkt_api`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/images/cebolla.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre`, `precio`, `imagen`, `created_at`, `updated_at`) VALUES
(6, 'Champiñon', 1.25, 'uploads/C1h3fw0xTrrcgyEnE3eIuzGEBomkHZew0JKNFrMF.png', '2020-08-12 19:07:00', '2020-08-13 18:07:41'),
(19, 'Aceitunas', 1.60, 'uploads/U0FDHEzclebRyT6R2hwsrMBjolc4bSYLimXlUyXq.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_11_181315_create_ingredientes_table', 1),
(5, '2020_08_11_214336_create_pizzas_table', 1),
(6, '2020_08_12_042156_create_sucursales_table', 1),
(7, '2020_08_12_065849_create_pizza_ingredientes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzas`
--

CREATE TABLE `pizzas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pizzas`
--

INSERT INTO `pizzas` (`id`, `nombre`, `precio`, `imagen`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'WORKS', 13.55, 'uploads/tVdBzv0853T1mK0w4p7Yv7TZ4eWet8oGW7cDG0fy.jpeg', 'No dejes de probar esta pizza cargada con una combinación irresistible de pepperoni, jamón, salchicha italiana, rodajas de cebolla y chile verde, Hongos, aceitunas negras maduras y queso mozzarella.\r\n', '2020-08-13 18:15:14', '2020-08-13 18:15:14'),
(3, 'HAWAIANA', 13.55, 'uploads/Zdx55HOOnGqcjkSmiXj7EAIM3p5omtV17bnGYafp.jpeg', 'Descripcion Traiga su gusto de las zonas tropicales a su casa con nuestr\r\nTraiga su gusto de las zonas tropicales a su casa con nuestra pizza con piña.', '2020-08-13 18:18:23', '2020-08-13 18:18:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza_ingredientes`
--

CREATE TABLE `pizza_ingredientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pizza_id` bigint(20) UNSIGNED NOT NULL,
  `ingredientes_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pizza_ingredientes`
--

INSERT INTO `pizza_ingredientes` (`id`, `pizza_id`, `ingredientes_id`, `created_at`, `updated_at`) VALUES
(2, 1, 19, NULL, NULL),
(3, 1, 6, NULL, NULL),
(4, 3, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `direccion`, `mapa`, `horario`, `telefonos`, `created_at`, `updated_at`) VALUES
(1, 'LA GRAN VÍA', 'Centro Comercial La Gran Vía, Locales N° 225-226, Carretera Panamericana Edificio #11, Antiguo Cuscatlán, La Libertad.', NULL, 'Domingo a Jueves 11:00 AM - 09:00 PM Viernes a Sábado 11:00 AM - 10:00 PM', '2222-9999', '2020-08-13 16:14:57', '2020-08-13 16:14:57'),
(2, 'MULTIPLAZA DDDD', 'Centro Comercial La Gran Vía, Locales N° 225-226, Carretera Panamericana Edificio #11, Antiguo Cuscatlán, La Libertad.', NULL, 'Domingo a Jueves 11:00 AM - 09:00 PM Viernes a Sábado 11:00 AM - 10:00 PM', '2222-0000', '2020-08-13 16:16:14', '2020-08-13 18:06:38'),
(3, 'GALERIAS', 'Centro Comercial La Gran Vía, Locales N° 225-226, Carretera Panamericana Edificio #11, Antiguo Cuscatlán, La Libertad.', NULL, 'Domingo a Jueves 11:00 AM - 09:00 PM Viernes a Sábado 11:00 AM - 10:00 PM', '2222-9999', '2020-08-13 16:16:21', '2020-08-13 16:16:21'),
(4, 'SANTA ELENA', 'Centro Comercial La Gran Vía, Locales N° 225-226, Carretera Panamericana Edificio #11, Antiguo Cuscatlán, La Libertad.', NULL, 'Domingo a Jueves 11:00 AM - 09:00 PM Viernes a Sábado 11:00 AM - 10:00 PM', '2222-9999', '2020-08-13 16:16:32', '2020-08-13 16:16:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Josué Méndez', 'josue.mendez087@gmail.com', NULL, '$2y$10$yrycsX5flFzRIEBpN6V0quS.dXldLcSAr2OUmY8xAnrmBQyHL6yF.', NULL, '2020-08-13 18:29:19', '2020-08-13 18:29:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pizza_ingredientes`
--
ALTER TABLE `pizza_ingredientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_ingredientes_pizza_id_foreign` (`pizza_id`),
  ADD KEY `pizza_ingredientes_ingredientes_id_foreign` (`ingredientes_id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pizza_ingredientes`
--
ALTER TABLE `pizza_ingredientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pizza_ingredientes`
--
ALTER TABLE `pizza_ingredientes`
  ADD CONSTRAINT `pizza_ingredientes_ingredientes_id_foreign` FOREIGN KEY (`ingredientes_id`) REFERENCES `ingredientes` (`id`),
  ADD CONSTRAINT `pizza_ingredientes_pizza_id_foreign` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
