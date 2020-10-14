-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 16:48:01
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
-- Base de datos: `profac2`
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
  `cli_correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado`
--

CREATE TABLE `tbl_estado` (
  `est_id` int(1) NOT NULL,
  `est_descrp` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `pro_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `rol_nombre` varchar(10) NOT NULL,
  `rol_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `usu_estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `pro_estado` (`pro_estado`);

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
  ADD KEY `suc_estado` (`suc_estado`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `usu_rolid` (`usu_rolid`),
  ADD KEY `usu_estado` (`usu_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_bodega`
--
ALTER TABLE `tbl_bodega`
  MODIFY `bod_id` int(5) NOT NULL AUTO_INCREMENT;

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
  MODIFY `dpb_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_proveedor_producto`
--
ALTER TABLE `tbl_detalle_proveedor_producto`
  MODIFY `dpp_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `emp_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  MODIFY `est_id` int(1) NOT NULL AUTO_INCREMENT;

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
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  MODIFY `prv_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `rol_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  MODIFY `suc_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(3) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `tbl_producto_ibfk_1` FOREIGN KEY (`pro_estado`) REFERENCES `tbl_estado` (`est_id`);

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
  ADD CONSTRAINT `tbl_sucursal_ibfk_1` FOREIGN KEY (`suc_estado`) REFERENCES `tbl_estado` (`est_id`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`usu_rolid`) REFERENCES `tbl_rol` (`rol_id`),
  ADD CONSTRAINT `tbl_usuario_ibfk_2` FOREIGN KEY (`usu_estado`) REFERENCES `tbl_estado` (`est_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
