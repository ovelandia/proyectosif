--
-- Base de datos: `sif`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`) VALUES
(1, 'Carne'),
(2, 'Pollo'),
(3, 'Vegetales'),
(4, 'Frutas'),
(5, 'Arroz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `tipodocu` int(11) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `genero` int(11) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id`, `nombre`, `apellido`, `tipodocu`, `documento`, `genero`, `direccion`, `ciudad`, `telefono`) VALUES
(1, 'camilo', 'gaona', 2, '1231231', 2, 'asdasd', 'dadsa', '12332'),
(2, 'david', 'cabezas', 2, '131516', 2, 'basdkmbn', 'jbdnasbd', '123546');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `iddetalleventa` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `didventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`iddetalleventa`, `cantidad`, `total`, `didventa`) VALUES
(1, 2, '2000', 9),
(2, 3, '3000', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `iddetalle_factura` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `didfactura` int(11) NOT NULL,
  `didunidadmedida` int(11) NOT NULL,
  `tidinsumos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`iddetalle_factura`, `cantidad`, `valor`, `total`, `didfactura`, `didunidadmedida`, `tidinsumos`) VALUES
(3, 52, '200.00', '1000.00', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `iddistribuidor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `nit` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`iddistribuidor`, `nombre`, `telefono`, `direccion`, `nit`) VALUES
(3, 'dcdss', '464654', 'dssd', '48'),
(4, 'mans', '1234', 'calle n5', '1032'),
(5, 'adasdsa', '151551', '56adadasdas', '11616');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `didtipoempleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `nombre`, `documento`, `direccion`, `telefono`, `email`, `didtipoempleado`) VALUES
(4, 'Camilo', '1012462411', 'caracas', '3213113', 'ca@msienasd', 5),
(5, 'Juan', '1212121', 'bosa', '31315131', 'cascass@oasdas', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `numero_factura` varchar(45) NOT NULL,
  `tiddistribuidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `fecha_factura`, `numero_factura`, `tiddistribuidor`) VALUES
(1, '2017-11-08', '0121', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gennero`
--

CREATE TABLE `gennero` (
  `Idgen` int(11) NOT NULL,
  `descgenn` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gennero`
--

INSERT INTO `gennero` (`Idgen`, `descgenn`) VALUES
(1, 'femenino'),
(2, 'masculino'),
(3, 'Indeterminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `idinsumos` int(11) NOT NULL,
  `insumo` varchar(45) NOT NULL,
  `cantidad_insumos` int(11) NOT NULL,
  `tidunidadmedida` int(11) NOT NULL,
  `cidcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`idinsumos`, `insumo`, `cantidad_insumos`, `tidunidadmedida`, `cidcategoria`) VALUES
(2, 'Arroz Blanco', 20, 1, 3),
(3, 'Pollo', 25, 1, 2),
(5, 'Carne', 40, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metododepago`
--

CREATE TABLE `metododepago` (
  `idmetododepago` int(11) NOT NULL,
  `metododepago` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `metododepago`
--

INSERT INTO `metododepago` (`idmetododepago`, `metododepago`) VALUES
(1, 'tarjeta'),
(2, 'efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `preciounitario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `preciounitario`, `cantidad`) VALUES
(1, 'Pollo Asado', 20000, 5),
(2, 'Pollo Broaster', 1500000, 20),
(3, 'Arroz con Polllo', 50000, 15),
(4, 'Carne a la Plancha', 150000, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productohasinsumos`
--

CREATE TABLE `productohasinsumos` (
  `idproductohas` int(11) NOT NULL,
  `phinsumos` int(11) NOT NULL,
  `phproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productohasinsumos`
--

INSERT INTO `productohasinsumos` (`idproductohas`, `phinsumos`, `phproducto`) VALUES
(1, 2, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idtd` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idtd`, `descripcion`) VALUES
(2, 'Tarjeta'),
(3, 'Cedula Ciudadana'),
(4, 'Cedula Extrajera'),
(5, 'Libreta Militar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoempleado`
--

CREATE TABLE `tipoempleado` (
  `idtipoempleado` int(11) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoempleado`
--

INSERT INTO `tipoempleado` (`idtipoempleado`, `cargo`) VALUES
(2, 'mesero'),
(3, 'cocinero'),
(4, 'Vendedor'),
(5, 'Hornero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa`
--

CREATE TABLE `tipoventa` (
  `idtipoventa` int(11) NOT NULL,
  `tipoventa` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoventa`
--

INSERT INTO `tipoventa` (`idtipoventa`, `tipoventa`) VALUES
(1, 'presencial'),
(2, 'domiciliaria2'),
(3, 'sadasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `idunidad_medida` int(11) NOT NULL,
  `medida` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`idunidad_medida`, `medida`) VALUES
(1, 'Libras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `vcliente` int(11) NOT NULL,
  `vtipoempleado` int(11) NOT NULL,
  `vtipoventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `fecha`, `vcliente`, `vtipoempleado`, `vtipoventa`) VALUES
(9, '2017-11-24 00:00:00', 1, 2, 2),
(10, '2017-11-24 17:22:33', 2, 5, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `tipodocu` (`tipodocu`),
  ADD KEY `genero` (`genero`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`iddetalleventa`),
  ADD KEY `didventa` (`didventa`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`iddetalle_factura`),
  ADD KEY `didfactura` (`didfactura`),
  ADD KEY `dunidadmedida` (`didunidadmedida`),
  ADD KEY `detalle_factura_ibfk_3` (`tidinsumos`);

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`iddistribuidor`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`),
  ADD KEY `didtipoempleado` (`didtipoempleado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `tiddistribuidor` (`tiddistribuidor`);

--
-- Indices de la tabla `gennero`
--
ALTER TABLE `gennero`
  ADD PRIMARY KEY (`Idgen`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`idinsumos`),
  ADD KEY `idunidad_medida` (`tidunidadmedida`),
  ADD KEY `cidcategoria` (`cidcategoria`);

--
-- Indices de la tabla `metododepago`
--
ALTER TABLE `metododepago`
  ADD PRIMARY KEY (`idmetododepago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `productohasinsumos`
--
ALTER TABLE `productohasinsumos`
  ADD PRIMARY KEY (`idproductohas`,`phinsumos`,`phproducto`),
  ADD KEY `phinsumos` (`phinsumos`),
  ADD KEY `phproducto` (`phproducto`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idtd`);

--
-- Indices de la tabla `tipoempleado`
--
ALTER TABLE `tipoempleado`
  ADD PRIMARY KEY (`idtipoempleado`);

--
-- Indices de la tabla `tipoventa`
--
ALTER TABLE `tipoventa`
  ADD PRIMARY KEY (`idtipoventa`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`idunidad_medida`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `vcliente` (`vcliente`),
  ADD KEY `vtipoempleado` (`vtipoempleado`),
  ADD KEY `vtipoventa` (`vtipoventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `iddetalle_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `iddistribuidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `gennero`
--
ALTER TABLE `gennero`
  MODIFY `Idgen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `idinsumos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `metododepago`
--
ALTER TABLE `metododepago`
  MODIFY `idmetododepago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `productohasinsumos`
--
ALTER TABLE `productohasinsumos`
  MODIFY `idproductohas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idtd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipoempleado`
--
ALTER TABLE `tipoempleado`
  MODIFY `idtipoempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipoventa`
--
ALTER TABLE `tipoventa`
  MODIFY `idtipoventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `idunidad_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`tipodocu`) REFERENCES `tipodocumento` (`idtd`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`genero`) REFERENCES `gennero` (`Idgen`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`didventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`didfactura`) REFERENCES `factura` (`idfactura`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`didunidadmedida`) REFERENCES `unidad_medida` (`idunidad_medida`),
  ADD CONSTRAINT `detalle_factura_ibfk_3` FOREIGN KEY (`tidinsumos`) REFERENCES `insumos` (`idinsumos`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`didtipoempleado`) REFERENCES `tipoempleado` (`idtipoempleado`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`tiddistribuidor`) REFERENCES `distribuidor` (`iddistribuidor`);

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`tidunidadmedida`) REFERENCES `unidad_medida` (`idunidad_medida`),
  ADD CONSTRAINT `insumos_ibfk_2` FOREIGN KEY (`cidcategoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Filtros para la tabla `productohasinsumos`
--
ALTER TABLE `productohasinsumos`
  ADD CONSTRAINT `productohasinsumos_ibfk_1` FOREIGN KEY (`phinsumos`) REFERENCES `insumos` (`idinsumos`),
  ADD CONSTRAINT `productohasinsumos_ibfk_2` FOREIGN KEY (`phproducto`) REFERENCES `producto` (`idproducto`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`vcliente`) REFERENCES `cliente` (`Id`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`vtipoempleado`) REFERENCES `tipoempleado` (`idtipoempleado`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`vtipoventa`) REFERENCES `tipoventa` (`idtipoventa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
