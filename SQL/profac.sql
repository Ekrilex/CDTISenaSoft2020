-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2020 a las 21:41:55
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `profac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bodega`
--

CREATE TABLE `tbl_bodega` (
  `bod_id` int(5) NOT NULL,
  `bod_descrp` varchar(20) NOT NULL,
  `bod_tamano` int(3) NOT NULL,
  `bod_sucid` int(5) NOT NULL,
  `bod_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_bodega`
--

INSERT INTO `tbl_bodega` (`bod_id`, `bod_descrp`, `bod_tamano`, `bod_sucid`, `bod_estado`) VALUES
(1, 'bodega falabella', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_borrador_factura`
--

CREATE TABLE `tbl_borrador_factura` (
  `fab_id` int(10) NOT NULL,
  `fab_sucid` int(3) NOT NULL,
  `fab_clinit` int(10) NOT NULL,
  `fab_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `fab_subtot` double UNSIGNED NOT NULL,
  `fab_iva` double UNSIGNED NOT NULL,
  `fab_total` double UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `cli_id` int(3) NOT NULL,
  `cli_nit` int(10) NOT NULL,
  `cli_nombre` varchar(20) NOT NULL,
  `cli_apelld` varchar(20) NOT NULL,
  `cli_direcc` varchar(50) DEFAULT NULL,
  `cli_telefn` varchar(10) NOT NULL,
  `cli_estado` int(1) NOT NULL DEFAULT 1,
  `cli_correo` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`cli_id`, `cli_nit`, `cli_nombre`, `cli_apelld`, `cli_direcc`, `cli_telefn`, `cli_estado`, `cli_correo`) VALUES
(2, 45456465, 'Julian ANdres', 'Ordonez', 'prueba', '4874866648', 1, 'Ordonez.01@gmail.com'),
(1, 1005893454, 'Juan', 'Castellar', 'prueba', '5465486845', 1, 'Castellar@gmail.com'),
(3, 2147483647, 'Alejandro', 'Bettin Flores', 'cra 3nort #65n - 23', '4878165486', 1, 'Ajelandro123@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_factura_producto`
--

CREATE TABLE `tbl_detalle_factura_producto` (
  `dfp_id` int(3) NOT NULL,
  `dfp_facid` int(10) NOT NULL,
  `dfp_procod` int(10) NOT NULL,
  `dfp_estado` int(1) NOT NULL DEFAULT 1,
  `dfp_estfac` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_permiso_rol`
--

CREATE TABLE `tbl_detalle_permiso_rol` (
  `pro_id` int(3) NOT NULL,
  `pro_permid` int(3) NOT NULL,
  `pro_rolid` int(3) NOT NULL,
  `pro_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_producto_bodega`
--

CREATE TABLE `tbl_detalle_producto_bodega` (
  `dpb_id` int(3) NOT NULL,
  `dpb_bodid` int(3) NOT NULL,
  `dpb_procod` int(10) NOT NULL,
  `dpb_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_detalle_producto_bodega`
--

INSERT INTO `tbl_detalle_producto_bodega` (`dpb_id`, `dpb_bodid`, `dpb_procod`, `dpb_estado`) VALUES
(1, 1, 3, 1),
(2, 1, 2, 1),
(3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_proveedor_producto`
--

CREATE TABLE `tbl_detalle_proveedor_producto` (
  `dpp_id` int(3) NOT NULL,
  `dpp_procod` int(10) NOT NULL,
  `dpp_prvid` int(3) NOT NULL,
  `dpp_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `emp_id` int(5) NOT NULL,
  `emp_razsoc` varchar(50) NOT NULL,
  `emp_nit` int(11) NOT NULL,
  `emp_nomcom` varchar(50) NOT NULL,
  `emp_corfis` varchar(20) NOT NULL,
  `emp_telfis` varchar(10) NOT NULL,
  `emp_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`emp_id`, `emp_razsoc`, `emp_nit`, `emp_nomcom`, `emp_corfis`, `emp_telfis`, `emp_estado`) VALUES
(1, 'probar el sistema', 743658, 'Falabella', 'Falabella@hotmail.co', '4564685', 1),
(2, 'prueba', 878486488, 'Variedades S.A', 'VAR845@gmail.com', '87864648', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado`
--

CREATE TABLE `tbl_estado` (
  `est_id` int(1) NOT NULL,
  `est_descrp` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estado`
--

INSERT INTO `tbl_estado` (`est_id`, `est_descrp`) VALUES
(1, '1'),
(2, '0'),
(3, '2'),
(4, '3'),
(5, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_factura`
--

CREATE TABLE `tbl_estado_factura` (
  `etf_id` int(1) NOT NULL,
  `etf_descrp` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_factura`
--

CREATE TABLE `tbl_factura` (
  `fac_id` int(10) NOT NULL,
  `fac_sucid` int(3) NOT NULL,
  `fac_clinit` int(10) NOT NULL,
  `fac_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `fac_subtot` double UNSIGNED NOT NULL,
  `fac_iva` double UNSIGNED NOT NULL,
  `fac_total` double UNSIGNED NOT NULL,
  `fac_fabid` int(10) NOT NULL,
  `fac_estado` int(1) NOT NULL DEFAULT 1,
  `fac_usuid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permiso`
--

CREATE TABLE `tbl_permiso` (
  `per_id` int(3) NOT NULL,
  `per_descrp` varchar(20) NOT NULL,
  `per_accion` varchar(9) NOT NULL,
  `per_modulo` varchar(15) NOT NULL,
  `per_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `pro_id` int(3) NOT NULL,
  `pro_codigo` int(10) NOT NULL,
  `pro_nombre` varchar(20) NOT NULL,
  `pro_marca` varchar(20) NOT NULL,
  `pro_foto` varchar(150) DEFAULT NULL,
  `pro_precio` double UNSIGNED NOT NULL,
  `pro_stock` int(10) NOT NULL,
  `pro_estado` int(1) NOT NULL DEFAULT 1,
  `pro_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`pro_id`, `pro_codigo`, `pro_nombre`, `pro_marca`, `pro_foto`, `pro_precio`, `pro_stock`, `pro_estado`, `pro_usu`) VALUES
(1, 1234567891, 'Martillos', 'CAT', 'assets/img/imagenesProductos/Martillo.jpg', 10000, 50, 3, 1),
(2, 1234567892, 'Tornillos', 'STD', 'assets/img/imagenesProductos/tornillo.jpg', 800, 100, 3, 1),
(3, 2147483647, 'Taladroo', 'DeWALT', 'assets/img/imagenesProductos/Taladro.jpg', 150000, 500, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedor`
--

CREATE TABLE `tbl_proveedor` (
  `prv_id` int(3) NOT NULL,
  `prv_razsoc` varchar(50) NOT NULL,
  `prv_nit` int(11) NOT NULL,
  `prv_nomcom` varchar(50) NOT NULL,
  `prv_correo` varchar(20) NOT NULL,
  `prv_telefo` varchar(10) NOT NULL,
  `prv_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `rol_id` int(3) NOT NULL,
  `rol_nombre` varchar(30) NOT NULL,
  `rol_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`rol_id`, `rol_nombre`, `rol_estado`) VALUES
(1, 'Administrador', 1),
(2, 'Vendedor', 1),
(3, 'Jefe Bodega', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sucursal`
--

CREATE TABLE `tbl_sucursal` (
  `suc_id` int(5) NOT NULL,
  `suc_nombre` varchar(20) NOT NULL,
  `suc_telefo` varchar(10) NOT NULL,
  `suc_direcc` varchar(50) NOT NULL,
  `suc_barrio` varchar(20) DEFAULT NULL,
  `suc_ciudad` varchar(20) DEFAULT NULL,
  `suc_empid` int(5) NOT NULL,
  `suc_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_sucursal`
--

INSERT INTO `tbl_sucursal` (`suc_id`, `suc_nombre`, `suc_telefo`, `suc_direcc`, `suc_barrio`, `suc_ciudad`, `suc_empid`, `suc_estado`) VALUES
(1, 'Falabella Norte', '484864848', 'AV 3A norte #26n-28', 'Vipasa', 'Cali', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usu_id` int(3) NOT NULL,
  `usu_nombre` varchar(20) NOT NULL,
  `usu_apelld` varchar(20) NOT NULL,
  `usu_login` varchar(5) NOT NULL,
  `usu_passwod` varchar(50) NOT NULL,
  `usu_telefn` varchar(10) NOT NULL,
  `usu_direcc` varchar(50) NOT NULL,
  `usu_rolid` int(3) NOT NULL,
  `usu_estado` int(1) NOT NULL DEFAULT 1,
  `usu_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_id`, `usu_nombre`, `usu_apelld`, `usu_login`, `usu_passwod`, `usu_telefn`, `usu_direcc`, `usu_rolid`, `usu_estado`, `usu_sucursal`) VALUES
(1, 'Juan', 'Castellar', 'Jcast', 'testUsu', '8786848', 'prueba', 1, 1, 1),
(2, 'Luyi Daniel', 'Mosquera', 'Ldan', 'vendedor', '4866464', 'prueba', 2, 1, 1),
(3, 'Alejandro', 'Bettin Florez', 'Abett', 'jefeBodega', '4866464', 'prueba', 3, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bodega`
--
ALTER TABLE `tbl_bodega`
  ADD PRIMARY KEY (`bod_id`),
  ADD KEY `bod_sucid` (`bod_sucid`),
  ADD KEY `bod_estado` (`bod_estado`);

--
-- Indices de la tabla `tbl_borrador_factura`
--
ALTER TABLE `tbl_borrador_factura`
  ADD PRIMARY KEY (`fab_id`),
  ADD KEY `fab_sucid` (`fab_sucid`),
  ADD KEY `fab_clinit` (`fab_clinit`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`cli_nit`),
  ADD KEY `cli_estado` (`cli_estado`);

--
-- Indices de la tabla `tbl_detalle_factura_producto`
--
ALTER TABLE `tbl_detalle_factura_producto`
  ADD PRIMARY KEY (`dfp_id`),
  ADD KEY `dfp_facid` (`dfp_facid`),
  ADD KEY `dfp_procod` (`dfp_procod`),
  ADD KEY `dfp_estado` (`dfp_estado`),
  ADD KEY `dfp_estfac` (`dfp_estfac`);

--
-- Indices de la tabla `tbl_detalle_permiso_rol`
--
ALTER TABLE `tbl_detalle_permiso_rol`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_permid` (`pro_permid`),
  ADD KEY `pro_rolid` (`pro_rolid`),
  ADD KEY `pro_estado` (`pro_estado`);

--
-- Indices de la tabla `tbl_detalle_producto_bodega`
--
ALTER TABLE `tbl_detalle_producto_bodega`
  ADD PRIMARY KEY (`dpb_id`),
  ADD KEY `dpb_estado` (`dpb_estado`);

--
-- Indices de la tabla `tbl_detalle_proveedor_producto`
--
ALTER TABLE `tbl_detalle_proveedor_producto`
  ADD PRIMARY KEY (`dpp_id`),
  ADD KEY `dpp_procod` (`dpp_procod`),
  ADD KEY `dpp_prvid` (`dpp_prvid`),
  ADD KEY `dpp_estado` (`dpp_estado`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_estado` (`emp_estado`);

--
-- Indices de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `tbl_estado_factura`
--
ALTER TABLE `tbl_estado_factura`
  ADD PRIMARY KEY (`etf_id`);

--
-- Indices de la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD PRIMARY KEY (`fac_id`),
  ADD KEY `fac_sucid` (`fac_sucid`),
  ADD KEY `fac_clinit` (`fac_clinit`),
  ADD KEY `fac_fabid` (`fac_fabid`),
  ADD KEY `fac_estado` (`fac_estado`),
  ADD KEY `fac_usuid` (`fac_usuid`);

--
-- Indices de la tabla `tbl_permiso`
--
ALTER TABLE `tbl_permiso`
  ADD PRIMARY KEY (`per_id`),
  ADD KEY `per_estado` (`per_estado`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_estado` (`pro_estado`),
  ADD KEY `pro_usu` (`pro_usu`);

--
-- Indices de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD PRIMARY KEY (`prv_id`),
  ADD KEY `prv_estado` (`prv_estado`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`rol_id`),
  ADD KEY `rol_estado` (`rol_estado`);

--
-- Indices de la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  ADD PRIMARY KEY (`suc_id`),
  ADD KEY `suc_estado` (`suc_estado`),
  ADD KEY `suc_empid` (`suc_empid`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `usu_rolid` (`usu_rolid`),
  ADD KEY `usu_estado` (`usu_estado`),
  ADD KEY `usu_sucursal` (`usu_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_bodega`
--
ALTER TABLE `tbl_bodega`
  MODIFY `bod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_borrador_factura`
--
ALTER TABLE `tbl_borrador_factura`
  MODIFY `fab_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_factura_producto`
--
ALTER TABLE `tbl_detalle_factura_producto`
  MODIFY `dfp_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_permiso_rol`
--
ALTER TABLE `tbl_detalle_permiso_rol`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_producto_bodega`
--
ALTER TABLE `tbl_detalle_producto_bodega`
  MODIFY `dpb_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_proveedor_producto`
--
ALTER TABLE `tbl_detalle_proveedor_producto`
  MODIFY `dpp_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `emp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  MODIFY `est_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_estado_factura`
--
ALTER TABLE `tbl_estado_factura`
  MODIFY `etf_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  MODIFY `fac_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_permiso`
--
ALTER TABLE `tbl_permiso`
  MODIFY `per_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  MODIFY `prv_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `rol_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  MODIFY `suc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_bodega`
--
ALTER TABLE `tbl_bodega`
  ADD CONSTRAINT `tbl_bodega_ibfk_1` FOREIGN KEY (`bod_sucid`) REFERENCES `tbl_sucursal` (`suc_id`),
  ADD CONSTRAINT `tbl_bodega_ibfk_2` FOREIGN KEY (`bod_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_borrador_factura`
--
ALTER TABLE `tbl_borrador_factura`
  ADD CONSTRAINT `tbl_borrador_factura_ibfk_1` FOREIGN KEY (`fab_sucid`) REFERENCES `tbl_sucursal` (`suc_id`),
  ADD CONSTRAINT `tbl_borrador_factura_ibfk_2` FOREIGN KEY (`fab_clinit`) REFERENCES `tbl_cliente` (`cli_nit`);

--
-- Filtros para la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD CONSTRAINT `tbl_cliente_ibfk_1` FOREIGN KEY (`cli_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_detalle_factura_producto`
--
ALTER TABLE `tbl_detalle_factura_producto`
  ADD CONSTRAINT `tbl_detalle_factura_producto_ibfk_1` FOREIGN KEY (`dfp_facid`) REFERENCES `tbl_factura` (`fac_id`),
  ADD CONSTRAINT `tbl_detalle_factura_producto_ibfk_2` FOREIGN KEY (`dfp_procod`) REFERENCES `tbl_producto` (`pro_id`),
  ADD CONSTRAINT `tbl_detalle_factura_producto_ibfk_3` FOREIGN KEY (`dfp_estado`) REFERENCES `tbl_estado` (`est_id`),
  ADD CONSTRAINT `tbl_detalle_factura_producto_ibfk_4` FOREIGN KEY (`dfp_estfac`) REFERENCES `tbl_estado_factura` (`etf_id`);

--
-- Filtros para la tabla `tbl_detalle_permiso_rol`
--
ALTER TABLE `tbl_detalle_permiso_rol`
  ADD CONSTRAINT `tbl_detalle_permiso_rol_ibfk_1` FOREIGN KEY (`pro_permid`) REFERENCES `tbl_permiso` (`per_id`),
  ADD CONSTRAINT `tbl_detalle_permiso_rol_ibfk_2` FOREIGN KEY (`pro_rolid`) REFERENCES `tbl_rol` (`rol_id`),
  ADD CONSTRAINT `tbl_detalle_permiso_rol_ibfk_3` FOREIGN KEY (`pro_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_detalle_producto_bodega`
--
ALTER TABLE `tbl_detalle_producto_bodega`
  ADD CONSTRAINT `tbl_detalle_producto_bodega_ibfk_1` FOREIGN KEY (`dpb_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_detalle_proveedor_producto`
--
ALTER TABLE `tbl_detalle_proveedor_producto`
  ADD CONSTRAINT `tbl_detalle_proveedor_producto_ibfk_1` FOREIGN KEY (`dpp_procod`) REFERENCES `tbl_producto` (`pro_id`),
  ADD CONSTRAINT `tbl_detalle_proveedor_producto_ibfk_2` FOREIGN KEY (`dpp_prvid`) REFERENCES `tbl_proveedor` (`prv_id`),
  ADD CONSTRAINT `tbl_detalle_proveedor_producto_ibfk_3` FOREIGN KEY (`dpp_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD CONSTRAINT `tbl_empresa_ibfk_1` FOREIGN KEY (`emp_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD CONSTRAINT `tbl_factura_ibfk_1` FOREIGN KEY (`fac_sucid`) REFERENCES `tbl_sucursal` (`suc_id`),
  ADD CONSTRAINT `tbl_factura_ibfk_2` FOREIGN KEY (`fac_clinit`) REFERENCES `tbl_cliente` (`cli_nit`),
  ADD CONSTRAINT `tbl_factura_ibfk_3` FOREIGN KEY (`fac_fabid`) REFERENCES `tbl_borrador_factura` (`fab_id`),
  ADD CONSTRAINT `tbl_factura_ibfk_4` FOREIGN KEY (`fac_estado`) REFERENCES `tbl_estado` (`est_id`),
  ADD CONSTRAINT `tbl_factura_ibfk_5` FOREIGN KEY (`fac_usuid`) REFERENCES `tbl_usuario` (`usu_id`);

--
-- Filtros para la tabla `tbl_permiso`
--
ALTER TABLE `tbl_permiso`
  ADD CONSTRAINT `tbl_permiso_ibfk_1` FOREIGN KEY (`per_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD CONSTRAINT `tbl_producto_ibfk_1` FOREIGN KEY (`pro_estado`) REFERENCES `tbl_estado` (`est_id`),
  ADD CONSTRAINT `tbl_producto_ibfk_2` FOREIGN KEY (`pro_usu`) REFERENCES `tbl_usuario` (`usu_id`);

--
-- Filtros para la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD CONSTRAINT `tbl_proveedor_ibfk_1` FOREIGN KEY (`prv_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD CONSTRAINT `tbl_rol_ibfk_1` FOREIGN KEY (`rol_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  ADD CONSTRAINT `tbl_sucursal_ibfk_1` FOREIGN KEY (`suc_estado`) REFERENCES `tbl_estado` (`est_id`),
  ADD CONSTRAINT `tbl_sucursal_ibfk_2` FOREIGN KEY (`suc_empid`) REFERENCES `tbl_empresa` (`emp_id`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`usu_rolid`) REFERENCES `tbl_rol` (`rol_id`),
  ADD CONSTRAINT `tbl_usuario_ibfk_2` FOREIGN KEY (`usu_estado`) REFERENCES `tbl_estado` (`est_id`),
  ADD CONSTRAINT `tbl_usuario_ibfk_3` FOREIGN KEY (`usu_sucursal`) REFERENCES `tbl_sucursal` (`suc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
