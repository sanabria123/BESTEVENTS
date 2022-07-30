-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2022 a las 03:19:06
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bestevents`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf32_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Fiesta de graduación', '2022-07-16 22:47:47'),
(2, 'Bautizos', '2022-07-16 22:47:47'),
(3, 'Despedida de solteros', '2022-07-16 22:47:47'),
(4, 'Boda', '2022-07-16 22:47:47'),
(5, 'Fiestas de 15', '2022-07-16 22:47:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `id_cedula_cliente` int(11) NOT NULL,
  `direccion_cliente` varchar(20) NOT NULL,
  `telefono_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(20) NOT NULL,
  `nombre_dueño_empresa` varchar(30) NOT NULL,
  `cedula_dueño_empresa` int(11) NOT NULL,
  `direccion_empresa` varchar(20) NOT NULL,
  `telefono_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_nombre_evento` varchar(30) NOT NULL,
  `fecha_evento` date NOT NULL,
  `descripcion_evento` varchar(30) NOT NULL,
  `costo_evento` int(11) NOT NULL,
  `cons_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturadecompra`
--

CREATE TABLE `facturadecompra` (
  `id_factura_compra` int(11) NOT NULL,
  `fecha_factura_compra` int(11) NOT NULL,
  `descripcion_factura_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf32_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf32_spanish_ci NOT NULL,
  `imagen` text COLLATE utf32_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `agregado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `agregado`) VALUES
(1, 1, '101', 'bomba', 'vistas/img/productos/101/105.png', 50, 500, '2022-07-18 23:16:58'),
(2, 1, '102', 'pulsera led', 'vistas/img/productos/101/106.png', 50, 12000, '2022-07-18 23:28:16'),
(3, 1, '103', 'centro de mesa', 'vistas/img/productos/101/107.png', 30, 8000, '2022-07-18 23:28:31'),
(4, 1, '104', 'banderin', 'vistas/img/productos/101/108.png', 15, 2500, '2022-07-19 00:50:46'),
(5, 1, '105', 'cortina', 'vistas/img/productos/101/109.png', 10, 10000, '2022-07-18 23:24:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosxevento`
--

CREATE TABLE `productosxevento` (
  `id_productos` int(11) NOT NULL,
  `cons_evento` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosxprov`
--

CREATE TABLE `productosxprov` (
  `cons_proveedor` int(11) NOT NULL,
  `NIT_proveedor` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valor_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `NIT_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(20) NOT NULL,
  `cedula_proveedor` int(11) NOT NULL,
  `direccion_proveedor` varchar(20) NOT NULL,
  `telefono_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `precio_reserva` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `descripcion_servicio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciosxcliente`
--

CREATE TABLE `serviciosxcliente` (
  `consecutivo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `costo_servicio` int(11) NOT NULL,
  `fecha_servicio` date NOT NULL,
  `hora_servicio` time NOT NULL,
  `estado_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf32_spanish_ci NOT NULL,
  `usuario` text COLLATE utf32_spanish_ci NOT NULL,
  `password` text COLLATE utf32_spanish_ci NOT NULL,
  `perfil` text COLLATE utf32_spanish_ci NOT NULL,
  `foto` text COLLATE utf32_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(12, 'admin', 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'Administrador', 'vistas/img/usuarios/admin/347.png', 1, '2022-07-19 18:13:23', '2022-07-19 23:13:23'),
(13, 'Allison Mariana López', 'Allison', '$2a$07$asxx54ahjppf45sd87a5auXiOhADUx46kQ3CXWbLVfioE1H6X9omy', 'Cliente', 'vistas/img/usuarios/Allison/900.png', 1, '2022-07-06 13:40:11', '2022-07-06 18:40:11'),
(14, 'Carlos Torres', 'Carlos', '$2a$07$asxx54ahjppf45sd87a5auelrdZeBYZ4t33w118t1DE5bSBf9deF2', 'Cliente', 'vistas/img/usuarios/Carlos/325.png', 1, '2022-06-16 15:22:03', '2022-06-16 20:22:03'),
(15, 'Andres Felipe Lozano', 'Andres', '', 'Contador', 'vistas/img/usuarios/Andres/431.png', 1, '2022-06-16 10:06:11', '2022-06-23 20:56:29'),
(16, 'Salome Vergara', 'Salome', '$2a$07$asxx54ahjppf45sd87a5auURfDWMYSNikwHrf5gaIcV0pgsYPs21y', 'Cliente', 'vistas/img/usuarios/Salome/983.jpg', 1, '2022-06-16 10:06:45', '2022-06-16 15:06:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`cons_evento`);

--
-- Indices de la tabla `facturadecompra`
--
ALTER TABLE `facturadecompra`
  ADD PRIMARY KEY (`id_factura_compra`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productosxevento`
--
ALTER TABLE `productosxevento`
  ADD PRIMARY KEY (`id_productos`),
  ADD KEY `cons_evento` (`cons_evento`);

--
-- Indices de la tabla `productosxprov`
--
ALTER TABLE `productosxprov`
  ADD PRIMARY KEY (`cons_proveedor`),
  ADD KEY `id_insumos` (`id_productos`),
  ADD KEY `NIT_proveedor` (`NIT_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`NIT_proveedor`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `serviciosxcliente`
--
ALTER TABLE `serviciosxcliente`
  ADD PRIMARY KEY (`consecutivo`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `administrador` (`id_administrador`);

--
-- Filtros para la tabla `productosxevento`
--
ALTER TABLE `productosxevento`
  ADD CONSTRAINT `productosxevento_ibfk_1` FOREIGN KEY (`cons_evento`) REFERENCES `evento` (`cons_evento`);

--
-- Filtros para la tabla `productosxprov`
--
ALTER TABLE `productosxprov`
  ADD CONSTRAINT `productosxprov_ibfk_1` FOREIGN KEY (`cons_proveedor`) REFERENCES `evento` (`cons_evento`),
  ADD CONSTRAINT `productosxprov_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `productosxprov_ibfk_3` FOREIGN KEY (`NIT_proveedor`) REFERENCES `proveedor` (`NIT_proveedor`);

--
-- Filtros para la tabla `serviciosxcliente`
--
ALTER TABLE `serviciosxcliente`
  ADD CONSTRAINT `serviciosxcliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `serviciosxcliente_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  ADD CONSTRAINT `serviciosxcliente_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `serviciosxcliente_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
