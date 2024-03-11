-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-02-2024 a las 20:53:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `domotepec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_compras`
--

CREATE TABLE `categoria_compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_compras`
--

INSERT INTO `categoria_compras` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'TRANSPORTE', NULL, NULL),
(2, 'ALIMENTACION', NULL, NULL),
(3, 'LOGISTICA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `hora` varchar(15) NOT NULL,
  `tipo_comprobante` varchar(50) NOT NULL,
  `numero_comprobante` varchar(75) NOT NULL,
  `resp_compra` varchar(50) NOT NULL,
  `user_compra` int(11) NOT NULL,
  `monto` varchar(10) NOT NULL,
  `impuesto` decimal(8,2) DEFAULT NULL,
  `iva` decimal(8,2) DEFAULT NULL,
  `observaciones` varchar(200) NOT NULL,
  `comercio` varchar(200) NOT NULL,
  `img_comprobante` varchar(250) NOT NULL,
  `sucursal_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `hora`, `tipo_comprobante`, `numero_comprobante`, `resp_compra`, `user_compra`, `monto`, `impuesto`, `iva`, `observaciones`, `comercio`, `img_comprobante`, `sucursal_id`, `empresa_id`, `created_at`, `updated_at`) VALUES
(1, '2024-02-08', '12:47:43', 'Ticket', '11250-1569560', '-', 7, '22.00', NULL, NULL, '-', 'rvq grupo', 'storage/compra/1707516113_alerta.png', 1, 2, '2024-02-08 18:47:43', '2024-02-10 04:01:53'),
(3, '2024-02-08', '12:52:35', 'Ticket', '17554-1569560', '-', 7, '22.00', NULL, NULL, '-', 'RVQ', '0', 1, 2, '2024-02-08 18:52:35', '2024-02-08 18:52:35'),
(4, '2024-02-08', '13:46:15', 'Ticket', '16771-1231', '-', 7, '15.90', NULL, NULL, '-', 'cvq', 'storage/compra/1707848020_zoe.jpeg', 1, 2, '2024-02-08 19:46:15', '2024-02-14 00:13:40'),
(5, '2024-02-08', '14:52:52', 'Factura', '17370-2222', '2', 7, '51.98', NULL, NULL, '22', '222', '0', 1, 2, '2024-02-08 20:52:52', '2024-02-08 20:52:52'),
(6, '2024-02-09', '09:37:45', 'Credito Fiscal', '13757-234234', '-', 7, '13.56', NULL, NULL, '-', 'sdf', 'storage/compra/1707513723_WhatsApp Image 2023-12-29 at 16.36.51.jpeg', 1, 2, '2024-02-09 15:37:45', '2024-02-10 03:22:03'),
(7, '2024-02-09', '15:53:01', 'Factura', '17626-452545-45-4', 'ADONAY GARCIA', 7, '21.66', NULL, NULL, 'SIN OBSERVACIONES', 'FREUND SA DE CV', 'storage/compra/1707518594_12670228_460095187529926_249290069118227587_n.jpeg', 1, 2, '2024-02-09 21:53:01', '2024-02-10 04:43:14'),
(8, '2024-02-16', '16:46:18', 'Credito Fiscal', '13562-9659', '-', 8, '60.00', 0.00, 7.80, '-', 'NAVIOMAR EL SALVADOR, S.A DE C.V', '0', 1, 2, '2024-02-16 22:46:18', '2024-02-16 22:46:18'),
(9, '2024-02-16', '16:57:26', 'Credito Fiscal', '17019-9276', '-', 8, '1188.73', 0.00, 0.00, '-', 'OCEANICA', '0', 1, 2, '2024-02-16 22:57:26', '2024-02-16 22:57:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_compras`
--

CREATE TABLE `det_compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` varchar(175) NOT NULL,
  `numero_comprobante` varchar(75) NOT NULL,
  `precio_unitario` varchar(10) NOT NULL,
  `cantidad` varchar(10) NOT NULL,
  `umedida` varchar(10) NOT NULL,
  `subtotal` float(10,2) NOT NULL,
  `categoria_id` varchar(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `det_compras`
--

INSERT INTO `det_compras` (`id`, `producto`, `numero_comprobante`, `precio_unitario`, `cantidad`, `umedida`, `subtotal`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 'SSS', '10181-111', '12', '1', 'Galón', 12.00, '2', '2024-02-08 18:48:39', '2024-02-08 18:48:39'),
(2, 'GASOLINA SUPER', '16771-1231', '3.13751', '4', 'Galón', 12.55, '1', '2024-02-08 19:46:15', '2024-02-08 19:46:15'),
(3, 'GASOLINA SUPER', '17370-2222', '23', '2', 'Metro', 46.00, '1', '2024-02-08 20:52:52', '2024-02-08 20:52:52'),
(4, 'SSSSS', '13757-234234', '12', '1', 'Metro', 12.00, '1', '2024-02-09 15:37:45', '2024-02-09 15:37:45'),
(5, 'GATORADE BLUE', '17626-452545-45-4', '0.85', '12', 'Botella', 10.20, '2', '2024-02-09 21:53:01', '2024-02-09 21:53:01'),
(6, 'CHURROS YUMMIES', '17626-452545-45-4', '8.97', '1', 'Unidad', 8.97, '2', '2024-02-09 21:53:01', '2024-02-09 21:53:01'),
(7, 'ALMACENAJE', '13562-9659', '30', '1', 'Otra', 30.00, '3', '2024-02-16 22:46:18', '2024-02-16 22:46:18'),
(8, 'ALMACENAJE', '13562-9659', '30', '1', 'Otra', 30.00, '3', '2024-02-16 22:46:18', '2024-02-16 22:46:18'),
(9, 'FLETE', '17019-9276', '1188.73', '1', 'Otra', 1188.73, '1', '2024-02-16 22:57:26', '2024-02-16 22:57:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_planilla`
--

CREATE TABLE `empleados_planilla` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `dui` varchar(255) NOT NULL,
  `isss` varchar(255) NOT NULL,
  `afp` varchar(255) NOT NULL,
  `nit` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `descuento` varchar(255) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `empresa_planilla` varchar(255) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados_planilla`
--

INSERT INTO `empleados_planilla` (`id`, `nombre`, `telefono`, `dui`, `isss`, `afp`, `nit`, `cargo`, `fecha_ingreso`, `fecha_nacimiento`, `domicilio`, `correo`, `salario`, `descuento`, `id_empresa`, `empresa_planilla`, `id_usuario`, `created_at`, `updated_at`) VALUES
(9, 'ADSADS', '234', '3234234', '4234', '342', '234', '4', '2024-02-01', '2024-02-16', '234', '234', 234.00, 'n/a', 1, '1', 7, '2024-02-14 03:12:54', '2024-02-14 03:13:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `rubro` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `direccion`, `correo`, `celular`, `telefono`, `logo`, `rubro`, `created_at`, `updated_at`) VALUES
(1, 'TUSYSTEMSV', 'SAN SALVADOR, METROCENTRO', 'avsystemsv@gmail.com', '7785-4545', '2214-5458', 'storage/empresa/1706285968_alerta.png', 'SISTEMAS Y REDES', '2024-01-26 03:27:59', '2024-02-08 02:35:11'),
(2, 'DOMOTEPEC 1.0', 'SAN SALVADOR', 'sansalvador@gmail.com', '5421-2121', '2124-5842', 'storage/empresa/1707341510_WhatsApp Image 2024-01-08 at 10.21.35 AM.jpeg', 'turismo', '2024-02-08 03:31:50', '2024-02-13 03:06:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_planilla`
--

CREATE TABLE `empresa_planilla` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_empresa` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresa_planilla`
--

INSERT INTO `empresa_planilla` (`id`, `nombre_empresa`, `telefono`, `direccion`, `imagen`, `id_empresa`, `created_at`, `updated_at`) VALUES
(1, 'DOMOTEPEC', '8542-1251', 'ILOPANGO EL SALVADOR', 'storage/empresa/1707776941_alerta.png', NULL, '2024-02-13 04:29:01', '2024-02-13 04:29:01');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2024_01_12_200537_add_correo_and_pass2_to_users_table', 2),
(8, '2024_01_24_211720_add_fields_to_users_table', 4),
(9, '2024_01_25_193243_create_empresas_table', 5),
(10, '2024_01_26_175539_create_sucursales_table', 6),
(11, '2024_02_07_211414_rename_remember_token_column_in_users_table', 7),
(12, '2024_01_23_193452_create_productos_table', 8),
(13, '2024_01_15_162851_create_compras_table', 9),
(14, '2024_01_15_165835_create_det_compras_table', 9),
(15, '2024_01_15_170426_create_categoria_compras_table', 9),
(16, '2024_01_05_202933_create_empresa_planilla_table', 10),
(17, '2024_01_06_154858_create_empleados_planilla_table', 11),
(18, '2024_01_18_153435_create_planilla_principal_table', 12),
(19, '2024_01_18_173658_create_planillas_table', 12),
(20, '2024_02_13_181518_add_impuesto_to_compras_table', 13);

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
-- Estructura de tabla para la tabla `planillas`
--

CREATE TABLE `planillas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_empresa_planilla` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_planilla` int(11) NOT NULL,
  `dias_trabajados` double(8,2) NOT NULL,
  `sueldo_diario` double(8,2) NOT NULL,
  `sueldo_hora` double(8,2) NOT NULL,
  `salario_base` double(8,2) NOT NULL,
  `salario_quincenal` double(8,2) NOT NULL,
  `subtotal_devengado` double(8,2) NOT NULL,
  `total_devengado` double(8,2) NOT NULL,
  `cant_horas` double(8,2) NOT NULL,
  `horas_extra` double(8,2) NOT NULL,
  `bonificaciones` double(8,2) NOT NULL,
  `vacaciones` double(8,2) NOT NULL,
  `isss` double(8,2) NOT NULL,
  `afp` double(8,2) NOT NULL,
  `renta_inponible` double(8,2) NOT NULL,
  `isr` double(8,2) NOT NULL,
  `otros_desc` double(8,2) NOT NULL,
  `llegadas_tarde` double(8,2) NOT NULL,
  `prestamos` double(8,2) NOT NULL,
  `dias_injustificados` double(8,2) NOT NULL,
  `adelanto_salarial` double(8,2) NOT NULL,
  `total_ingresos` double(8,2) NOT NULL,
  `total_descuentos` double(8,2) NOT NULL,
  `total_neto` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planilla_principal`
--

CREATE TABLE `planilla_principal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_empresa_planilla` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `t_isss` int(11) NOT NULL,
  `t_afp` int(11) NOT NULL,
  `t_isr` int(11) NOT NULL,
  `t_salario` int(11) NOT NULL,
  `total_Neto` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` varchar(175) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `perecedero` varchar(3) NOT NULL,
  `rotacion_rapida` varchar(3) NOT NULL,
  `control_stock_min` varchar(3) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `sucursal_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `categoria_id`, `perecedero`, `rotacion_rapida`, `control_stock_min`, `usuario_id`, `empresa_id`, `sucursal_id`, `created_at`, `updated_at`) VALUES
(1, 'GASOLINA SUPER', 1, '', '-', '', 7, 1, 1, '2024-02-08 18:47:43', '2024-02-08 18:47:43'),
(2, 'SSS', 1, '', '-', '', 7, 1, 1, '2024-02-08 18:48:39', '2024-02-08 18:48:39'),
(3, 'SSSSS', 1, '', '-', '', 7, 1, 1, '2024-02-09 15:37:45', '2024-02-09 15:37:45'),
(4, 'GATORADE BLUE', 2, '', '-', '', 7, 1, 1, '2024-02-09 21:53:01', '2024-02-09 21:53:01'),
(5, 'CHURROS YUMMIES', 2, '', '-', '', 7, 1, 1, '2024-02-09 21:53:01', '2024-02-09 21:53:01'),
(6, 'ALMACENAJE', 3, '', '-', '', 8, 2, 1, '2024-02-16 22:46:18', '2024-02-16 22:46:18'),
(7, 'FLETE', 1, '', '-', '', 8, 2, 1, '2024-02-16 22:57:26', '2024-02-16 22:57:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_sucursal` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `encargado` varchar(255) NOT NULL,
  `empresa_id` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre_sucursal`, `direccion`, `telefono`, `celular`, `encargado`, `empresa_id`, `created_at`, `updated_at`) VALUES
(1, 'ZZZ', 'ZZZZ', '1212-1211', '1212-1212', 'xcxc', '1', '2024-01-27 04:48:41', '2024-01-27 04:48:41'),
(2, 'XXX', 'XXX', '1111-1111', '1111-1111', '1111', '1', '2024-02-08 02:35:40', '2024-02-08 02:35:40'),
(3, 'ILOPANGO', 'SAN SALVADOR, ILOPANGO', '6666-6666', '7777-7777', 'CARLOS ANDRES VASQUEZ CHOTO', '2', '2024-02-08 04:43:18', '2024-02-08 23:09:51'),
(6, 'SOYAPANGO', 'SOYAPANGO SAN SALVADOR', '5458-7845', '7845-2112', 'OSCAR CHOTO JUAREZ', '2', '2024-02-08 22:04:19', '2024-02-08 23:10:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass2` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `dui` varchar(255) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `sucursal_id` int(11) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `correo`, `usuario`, `password`, `pass2`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `telefono`, `estado`, `cargo`, `dui`, `empresa_id`, `sucursal_id`, `categoria`) VALUES
(7, 'VICTOR DANIEL ANDRES DIAZ', '1323', 'andres', '$2y$10$I/d0STrzxK2cI6nZ97DW7e.NAOUtm/4DIdwKd1ACTISgczONbAoSS', 'andres', NULL, NULL, '2024-01-25 05:29:25', '2024-01-26 21:17:11', '7751-2454', 'Habilitado', 'Administrativo', '44455114-4', 1, 1, '1'),
(8, 'JOSE MIGUEL', 'jose@gmail.com', 'juan', '$2y$10$I/d0STrzxK2cI6nZ97DW7e.NAOUtm/4DIdwKd1ACTISgczONbAoSS', 'juan', NULL, '', '2024-01-25 23:57:14', '2024-01-26 04:39:52', '2154-5121', 'Habilitado', 'Administrativo', '23123123-1', 2, 1, '2'),
(9, 'JOSE', '-', 'jose', '$2y$10$OoLuFf4NlTpcLCvxNr8C..vnCeJXDJQo9PY4YXQiXijAzMVOqF0hW', 'jose', NULL, NULL, '2024-02-14 03:57:10', '2024-02-14 03:57:10', '8745-5475', 'Habilitado', 'Administrativo', '45487512-2', 1, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_compras`
--
ALTER TABLE `categoria_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `det_compras`
--
ALTER TABLE `det_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados_planilla`
--
ALTER TABLE `empleados_planilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa_planilla`
--
ALTER TABLE `empresa_planilla`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `planillas`
--
ALTER TABLE `planillas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planilla_principal`
--
ALTER TABLE `planilla_principal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_usuario_unique` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_compras`
--
ALTER TABLE `categoria_compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `det_compras`
--
ALTER TABLE `det_compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empleados_planilla`
--
ALTER TABLE `empleados_planilla`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empresa_planilla`
--
ALTER TABLE `empresa_planilla`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `planillas`
--
ALTER TABLE `planillas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `planilla_principal`
--
ALTER TABLE `planilla_principal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
