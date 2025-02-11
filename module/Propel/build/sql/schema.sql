
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- ausenciaempleado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ausenciaempleado`;

CREATE TABLE `ausenciaempleado`
(
    `idausenciaempleado` INTEGER NOT NULL AUTO_INCREMENT,
    `idempleado` INTEGER NOT NULL,
    `ausenciaempleado_fecha` DATE NOT NULL,
    `ausenciaempleado_nota` TEXT,
    PRIMARY KEY (`idausenciaempleado`),
    INDEX `idempleado` (`idempleado`),
    CONSTRAINT `idempleado_ausenciaempleado`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- canalcomunicacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `canalcomunicacion`;

CREATE TABLE `canalcomunicacion`
(
    `idcanalcomunicacion` INTEGER NOT NULL AUTO_INCREMENT,
    `canalcomunicacion_nombre` VARCHAR(255) NOT NULL,
    `canalcomunicacion_descripcion` TEXT NOT NULL,
    PRIMARY KEY (`idcanalcomunicacion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clinica
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clinica`;

CREATE TABLE `clinica`
(
    `idclinica` INTEGER NOT NULL AUTO_INCREMENT,
    `clinica_nombre` VARCHAR(45) NOT NULL,
    `clinica_direccion` VARCHAR(45) NOT NULL,
    `clinica_registropatronal` VARCHAR(45) NOT NULL,
    `clinica_telefono` VARCHAR(45),
    PRIMARY KEY (`idclinica`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clinicaempleado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clinicaempleado`;

CREATE TABLE `clinicaempleado`
(
    `idclinicaempleados` INTEGER NOT NULL AUTO_INCREMENT,
    `idclinica` INTEGER NOT NULL,
    `idempleado` INTEGER NOT NULL,
    PRIMARY KEY (`idclinicaempleados`),
    INDEX `idclinica` (`idclinica`),
    INDEX `idempleado` (`idempleado`),
    CONSTRAINT `idclinica_clinicaempleado`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_clinicaempleado`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- compra
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `compra`;

CREATE TABLE `compra`
(
    `idcompra` INTEGER NOT NULL AUTO_INCREMENT,
    `idempleado` INTEGER NOT NULL,
    `idproveedor` INTEGER NOT NULL,
    `compra_creadaen` DATETIME NOT NULL,
    `compra_fecha` DATE NOT NULL,
    `compra_importe` DECIMAL(10,2) NOT NULL,
    `compra_status` enum('pagada','no pagada') NOT NULL,
    `compra_pagaren` DATE NOT NULL,
    `compra_comprobante` TEXT COMMENT 'ruta a archivo de factura o nota de remision',
    `compra_folio` VARCHAR(45),
    PRIMARY KEY (`idcompra`),
    INDEX `idoproveedor` (`idproveedor`),
    INDEX `idempleado` (`idempleado`),
    CONSTRAINT `idempleado_compra`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idproveedor_compra`
        FOREIGN KEY (`idproveedor`)
        REFERENCES `proveedor` (`idproveedor`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- compradetalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `compradetalle`;

CREATE TABLE `compradetalle`
(
    `idcompradetalle` INTEGER NOT NULL AUTO_INCREMENT,
    `idcompra` INTEGER NOT NULL,
    `idproductoclinica` INTEGER COMMENT 'la compra puede ser de productos',
    `idinsumoclinica` INTEGER COMMENT 'la compra puede ser de insumos',
    `compradetalle_cantidad` DECIMAL(10,2) NOT NULL,
    `compradetalle_costounitario` DECIMAL(10,2) NOT NULL,
    `compradetalle_subtotal` DECIMAL(10,2),
    PRIMARY KEY (`idcompradetalle`),
    INDEX `idcompra` (`idcompra`),
    INDEX `idproductoclinica` (`idproductoclinica`),
    INDEX `idinsumoclinica` (`idinsumoclinica`),
    CONSTRAINT `idcompra_compradetalle`
        FOREIGN KEY (`idcompra`)
        REFERENCES `compra` (`idcompra`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idinsumoclinica_compradetalle`
        FOREIGN KEY (`idinsumoclinica`)
        REFERENCES `insumoclinica` (`idinsumoclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idproductoclinica_compradetalle`
        FOREIGN KEY (`idproductoclinica`)
        REFERENCES `productoclinica` (`idproductoclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- concepto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `concepto`;

CREATE TABLE `concepto`
(
    `idconcepto` INTEGER NOT NULL AUTO_INCREMENT,
    `concepto_nombre` VARCHAR(255) NOT NULL,
    `concepto_descripcion` TEXT NOT NULL,
    PRIMARY KEY (`idconcepto`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- conceptoincidencia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `conceptoincidencia`;

CREATE TABLE `conceptoincidencia`
(
    `idconceptoincidencia` INTEGER NOT NULL AUTO_INCREMENT,
    `conceptoincidencia_nombre` VARCHAR(255) NOT NULL,
    `conceptoincidencia_descripcion` TEXT NOT NULL,
    PRIMARY KEY (`idconceptoincidencia`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- configuracion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `configuracion`;

CREATE TABLE `configuracion`
(
    `idconfiguracion` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'aqui van las configuraciones del sistema, fechas para considerar las comisiones, desde el 9 al 23 ',
    `idclinica` INTEGER NOT NULL,
    `configuracion_numerocancelaciones` INTEGER NOT NULL,
    `configuracion_valormaximocancelacion` DECIMAL(10,2) NOT NULL COMMENT 'cuál es el valor máximo de la venta para que se pueda cancelar',
    `configuracion_hastacuantosdias` INTEGER COMMENT 'cuántos días después de haber hecho la venta se puede cancelar',
    PRIMARY KEY (`idconfiguracion`),
    INDEX `idclinica` (`idclinica`),
    CONSTRAINT `idclinica_configuracion`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- egresoclinica
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `egresoclinica`;

CREATE TABLE `egresoclinica`
(
    `idegresoclinica` INTEGER NOT NULL AUTO_INCREMENT,
    `idclinica` INTEGER NOT NULL,
    `idempleado` INTEGER NOT NULL,
    `idconcepto` INTEGER NOT NULL,
    `egresoclinica_fecha` DATETIME NOT NULL,
    `egresoclinica_fechaegreso` DATE NOT NULL,
    `egresoclinica_cantidad` DECIMAL(10,2) NOT NULL,
    `egresoclinica_iva` DECIMAL(10,2) NOT NULL,
    `egresoclinica_comprobante` TEXT COMMENT 'ruta del archivo comprobante, voucher, etc',
    `egresoclinica_nota` TEXT,
    PRIMARY KEY (`idegresoclinica`),
    INDEX `idclinica` (`idclinica`),
    INDEX `idempleado` (`idempleado`),
    INDEX `idconcepto` (`idconcepto`),
    CONSTRAINT `idclinica_egresoclinica`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idconcepto_egresoclinica`
        FOREIGN KEY (`idconcepto`)
        REFERENCES `concepto` (`idconcepto`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_egresoclinica`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- empleado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado`
(
    `idempleado` INTEGER NOT NULL AUTO_INCREMENT,
    `empleado_registradoen` DATETIME NOT NULL,
    `empleado_nombre` VARCHAR(255) NOT NULL,
    `empleado_nss` VARCHAR(45),
    `empleado_rfc` VARCHAR(45),
    `empleado_calle` VARCHAR(45),
    `empleado_numero` VARCHAR(45),
    `empleado_colonia` VARCHAR(45),
    `empleado_codigopostal` VARCHAR(45),
    `empleado_ciudad` VARCHAR(45),
    `empleado_sexo` enum('Hombre','Mujer'),
    `empleado_fechanacimiento` DATE,
    `empleado_telefono` VARCHAR(45),
    `empleado_celular` VARCHAR(45),
    `empleado_comprobantedomiclio` TEXT COMMENT 'ruta al archio',
    `empleado_comprobanteidentificacion` TEXT,
    `empleado_sueldo` DECIMAL(10,2),
    `empleado_foto` TEXT,
    `empleado_tipocomisionproducto` enum('porcentaje','cantidad'),
    `empleado_cantidadcomisionproducto` DECIMAL(10,2),
    `empleado_tipocomisionservicio` enum('porcentaje','cantidad'),
    `empleado_cantidadcomisionservicio` DECIMAL(10,2),
    PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- empleadoacceso
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `empleadoacceso`;

CREATE TABLE `empleadoacceso`
(
    `idempleadoacceso` INTEGER NOT NULL AUTO_INCREMENT,
    `idempleado` INTEGER NOT NULL,
    `idrol` INTEGER NOT NULL,
    `empleadoacceso_username` VARCHAR(45) NOT NULL,
    `empleadoacceso_password` VARCHAR(45) NOT NULL,
    `empleadoacceso_ensesion` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`idempleadoacceso`),
    INDEX `idempleado` (`idempleado`),
    INDEX `idrol` (`idrol`),
    CONSTRAINT `idempleado_empleadoacceso`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idrol_empleadoacceso`
        FOREIGN KEY (`idrol`)
        REFERENCES `rol` (`idrol`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- empleadocomision
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `empleadocomision`;

CREATE TABLE `empleadocomision`
(
    `idempleadocomision` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'cantidad de dinero que se llevó de comisión',
    `idempledo` INTEGER NOT NULL,
    `idclinica` INTEGER NOT NULL,
    `empleadocomision_fecha` DATE NOT NULL,
    `empleadocomision_comisionservicios` DECIMAL(10,2) NOT NULL COMMENT 'comisiones que ha juntado ese día por la venta de servicios',
    `empleadocomision_comisionproductos` DECIMAL(10,2) NOT NULL COMMENT 'comisiones que ha juntado ese día por la venta de servicios',
    `empleadocomision_serviciosvendidos` INTEGER NOT NULL COMMENT 'cantidad de servicios vendidos ese día',
    `empleadocomision_productosvendidos` INTEGER NOT NULL COMMENT 'cantidad de productos vendidos ese dia',
    `empleadocomision_acumulado` DECIMAL(10,2) NOT NULL COMMENT 'cantidad de dinero que ha vendido la pedicurista. ',
    PRIMARY KEY (`idempleadocomision`),
    INDEX `idempleado` (`idempledo`),
    INDEX `idclinica` (`idclinica`),
    CONSTRAINT `idclinica_empleadocomision`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_empleadocomision`
        FOREIGN KEY (`idempledo`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- empleadohorario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `empleadohorario`;

CREATE TABLE `empleadohorario`
(
    `idempleadohorario` INTEGER NOT NULL AUTO_INCREMENT,
    `idempleado` INTEGER NOT NULL,
    `empleadohorario_entrada` TIME NOT NULL,
    `empleadohorario_salida` TIME NOT NULL,
    `empleadohorario_dia` enum('lunes','martes','miercoles','jueves','viernes','sabado','domingo') NOT NULL,
    `empleadohorario_descanso` TINYINT(1) NOT NULL,
    PRIMARY KEY (`idempleadohorario`),
    INDEX `idempleado` (`idempleado`),
    CONSTRAINT `idempleado_empleadohorario`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- empleadoreceso
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `empleadoreceso`;

CREATE TABLE `empleadoreceso`
(
    `idempleadoreceso` INTEGER NOT NULL AUTO_INCREMENT,
    `idempleado` INTEGER NOT NULL,
    `idclinica` INTEGER NOT NULL,
    `empleadoreceso_fecha` DATE NOT NULL,
    `empleadoreceso_inicio` DATETIME NOT NULL,
    `empleadoreceso_fin` DATETIME,
    PRIMARY KEY (`idempleadoreceso`),
    INDEX `idclinica_empleadoreceso` (`idclinica`),
    INDEX `idempleado_empleadoreceso` (`idempleado`),
    CONSTRAINT `idclinica_empleadoreceso`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_empleadoreceso`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- empleadoreporte
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `empleadoreporte`;

CREATE TABLE `empleadoreporte`
(
    `idempleadoreporte` INTEGER NOT NULL AUTO_INCREMENT,
    `idclinica` INTEGER NOT NULL,
    `idempleado` INTEGER NOT NULL,
    `idempleadoreportado` INTEGER NOT NULL,
    `idconceptoincidencia` INTEGER NOT NULL,
    `empleadoreporte_fechacreacion` DATETIME NOT NULL COMMENT 'la definimos nosotros al momento de hacer el insert',
    `empleadoreporte_comentario` TEXT NOT NULL,
    `empleadoreporte_fechasuceso` DATE NOT NULL,
    PRIMARY KEY (`idempleadoreporte`),
    INDEX `idclinica` (`idclinica`),
    INDEX `idempleado` (`idempleado`),
    INDEX `idempleadoreportado` (`idempleadoreportado`),
    INDEX `idconceptoincidencia` (`idconceptoincidencia`),
    CONSTRAINT `idclinica_empleadoreporte`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idconceptoincidencia_empleadoreporte`
        FOREIGN KEY (`idconceptoincidencia`)
        REFERENCES `conceptoincidencia` (`idconceptoincidencia`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_empleadoreporte`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleadoreportado_empleadoreporte`
        FOREIGN KEY (`idempleadoreportado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- encargadoclinica
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `encargadoclinica`;

CREATE TABLE `encargadoclinica`
(
    `idencargadoclinica` INTEGER NOT NULL AUTO_INCREMENT,
    `idclinica` INTEGER NOT NULL,
    `idempleado` INTEGER NOT NULL,
    PRIMARY KEY (`idencargadoclinica`),
    INDEX `idclinica` (`idclinica`),
    INDEX `idempleado` (`idempleado`),
    CONSTRAINT `idclinica_encargadoclinica`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_encargadoclinica`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- estatusseguimiento
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `estatusseguimiento`;

CREATE TABLE `estatusseguimiento`
(
    `idestatusseguimiento` INTEGER NOT NULL AUTO_INCREMENT,
    `estatusseguimiento_nombre` VARCHAR(100),
    `estatusseguimiento_color` VARCHAR(100),
    PRIMARY KEY (`idestatusseguimiento`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- estatusvisita
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `estatusvisita`;

CREATE TABLE `estatusvisita`
(
    `idestatusvisita` INTEGER NOT NULL AUTO_INCREMENT,
    `estatusvisita_nombre` VARCHAR(100) NOT NULL,
    `estatusvisita_color` VARCHAR(100) NOT NULL,
    `estatusvisita_cssname` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`idestatusvisita`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- faltante
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `faltante`;

CREATE TABLE `faltante`
(
    `idfaltante` INTEGER NOT NULL AUTO_INCREMENT,
    `idclinica` INTEGER NOT NULL,
    `idempleadogenerador` INTEGER NOT NULL COMMENT 'id del empleado que generó el registro del faltant',
    `idempleadodeudor` INTEGER NOT NULL,
    `faltante_creadaen` DATETIME,
    `faltante_fecha` DATE NOT NULL COMMENT 'fecha en la que ocurrió el faltant',
    `faltante_hora` TIME NOT NULL COMMENT 'hora en la que ocurrió el faltant',
    `faltante_cantidad` DECIMAL(10,2),
    `faltante_comentario` TEXT,
    `faltante_comprobante` TEXT,
    `faltante_comprobantefirmado` TEXT,
    PRIMARY KEY (`idfaltante`),
    INDEX `idempleadogenerador` (`idempleadogenerador`),
    INDEX `idempleadodeudor` (`idempleadodeudor`),
    CONSTRAINT `idempleadodeudor_faltante`
        FOREIGN KEY (`idempleadodeudor`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleadogenerador_faltante`
        FOREIGN KEY (`idempleadogenerador`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- grupo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo`
(
    `idgrupo` INTEGER NOT NULL AUTO_INCREMENT,
    `grupo_nombre` VARCHAR(255) NOT NULL,
    `grupo_descripcion` VARCHAR(45),
    `grupo_creadoen` DATETIME COMMENT 'este lo setea el sistema',
    PRIMARY KEY (`idgrupo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- grupopaciente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `grupopaciente`;

CREATE TABLE `grupopaciente`
(
    `idgrupopaciente` INTEGER NOT NULL AUTO_INCREMENT,
    `idgrupo` INTEGER NOT NULL,
    `idpaciente` INTEGER NOT NULL,
    PRIMARY KEY (`idgrupopaciente`),
    INDEX `idgrupo` (`idgrupo`),
    INDEX `idpaciente` (`idpaciente`),
    CONSTRAINT `idgrupo_grupopaciente`
        FOREIGN KEY (`idgrupo`)
        REFERENCES `grupo` (`idgrupo`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idpaciente_grupopaciente`
        FOREIGN KEY (`idpaciente`)
        REFERENCES `paciente` (`idpaciente`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- grupopersonal
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `grupopersonal`;

CREATE TABLE `grupopersonal`
(
    `idgrupopersonal` INTEGER NOT NULL AUTO_INCREMENT,
    `idpaciente` INTEGER NOT NULL,
    `idpacienteagregado` INTEGER NOT NULL,
    PRIMARY KEY (`idgrupopersonal`),
    INDEX `idpaciente` (`idpaciente`),
    INDEX `idpacienteagregado` (`idpacienteagregado`),
    CONSTRAINT `idpaciente_grupopersonal`
        FOREIGN KEY (`idpaciente`)
        REFERENCES `paciente` (`idpaciente`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idpacienteagregado_grupopersonal`
        FOREIGN KEY (`idpacienteagregado`)
        REFERENCES `paciente` (`idpaciente`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- insumo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `insumo`;

CREATE TABLE `insumo`
(
    `idinsumo` INTEGER NOT NULL AUTO_INCREMENT,
    `insumo_nombre` VARCHAR(255) NOT NULL,
    `insumo_descripcion` TEXT,
    `insumo_costo` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`idinsumo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- insumoclinica
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `insumoclinica`;

CREATE TABLE `insumoclinica`
(
    `idinsumoclinica` INTEGER NOT NULL AUTO_INCREMENT,
    `idinsumo` INTEGER NOT NULL,
    `idclinica` INTEGER NOT NULL,
    `insumoclinica_existencia` DECIMAL(10,2) NOT NULL COMMENT 'cantidad de un insumo X disponible en una de las clinicas',
    `insumoclinica_minimo` DECIMAL(10,2),
    `insumoclinica_maximo` DECIMAL(10,2),
    `insumoclinica_reorden` DECIMAL(10,2),
    PRIMARY KEY (`idinsumoclinica`),
    INDEX `idinsumo` (`idinsumo`),
    INDEX `idclinica` (`idclinica`),
    CONSTRAINT `idclinica_insumoclinica`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idinsumo_insumoclinica`
        FOREIGN KEY (`idinsumo`)
        REFERENCES `insumo` (`idinsumo`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- loginlog
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `loginlog`;

CREATE TABLE `loginlog`
(
    `idloginlog` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `idempleado` int(11) unsigned NOT NULL,
    `loginlog_fechainicio` DATETIME NOT NULL,
    `loginlog_fechafin` DATETIME,
    `loginlog_geo` TEXT,
    PRIMARY KEY (`idloginlog`),
    INDEX `idempleado` (`idempleado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- membresia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `membresia`;

CREATE TABLE `membresia`
(
    `idmembresia` INTEGER NOT NULL AUTO_INCREMENT,
    `membresia_nombre` VARCHAR(255) NOT NULL,
    `membresia_descripcion` TEXT NOT NULL,
    `membresia_servicios` DECIMAL(10,2) NOT NULL,
    `membresia_cupones` DECIMAL(10,2) NOT NULL,
    `servicio_generaingreso` TINYINT(1) NOT NULL,
    `servicio_generacomision` TINYINT(1) NOT NULL,
    `servicio_tipocomision` enum('porcentaje','cantidad'),
    `servicio_comision` DECIMAL(10,2),
    `membresia_precio` DECIMAL(10,2) NOT NULL,
    `membresia_vigencia` INTEGER,
    PRIMARY KEY (`idmembresia`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- membresiaclinica
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `membresiaclinica`;

CREATE TABLE `membresiaclinica`
(
    `idmembresiaclinica` INTEGER NOT NULL AUTO_INCREMENT,
    `idmembresia` INTEGER NOT NULL,
    `idclinica` INTEGER NOT NULL,
    `membresiaclinica_precio` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`idmembresiaclinica`),
    INDEX `idmembresia` (`idmembresia`),
    INDEX `idclinica` (`idclinica`),
    CONSTRAINT `idclinica_membresiaclinica`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idmembresia_membresiaclinica`
        FOREIGN KEY (`idmembresia`)
        REFERENCES `membresia` (`idmembresia`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- metaclinica
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `metaclinica`;

CREATE TABLE `metaclinica`
(
    `idmetaclinica` INTEGER NOT NULL AUTO_INCREMENT,
    `idclinica` INTEGER NOT NULL,
    `metaclinica_anio` INTEGER NOT NULL,
    `metaclinica_mes` INTEGER NOT NULL COMMENT 'valor del 1 al 12',
    `metaclinica_meta` DECIMAL(15,5) NOT NULL,
    PRIMARY KEY (`idmetaclinica`),
    INDEX `idclinica` (`idclinica`),
    CONSTRAINT `idclinica_metaclinica`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- metaempleado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `metaempleado`;

CREATE TABLE `metaempleado`
(
    `idmetaempleado` INTEGER NOT NULL AUTO_INCREMENT,
    `idempleado` INTEGER NOT NULL,
    `metaempleado_meta` DECIMAL(15,5) NOT NULL,
    `metaempleado_anio` INTEGER NOT NULL,
    `metaempleado_mes` INTEGER NOT NULL,
    PRIMARY KEY (`idmetaempleado`),
    INDEX `idempleado` (`idempleado`),
    CONSTRAINT `idempleado_metaempleado`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- paciente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `paciente`;

CREATE TABLE `paciente`
(
    `idpaciente` INTEGER NOT NULL AUTO_INCREMENT,
    `idclinica` INTEGER,
    `idempleado` INTEGER,
    `paciente_nombre` VARCHAR(255) NOT NULL,
    `paciente_celular` VARCHAR(45) NOT NULL,
    `paciente_telefono` VARCHAR(45),
    `paciente_calle` VARCHAR(100),
    `paciente_numero` VARCHAR(45),
    `paciente_colonia` VARCHAR(100),
    `paciente_codigopostal` VARCHAR(5),
    `paciente_ciudad` VARCHAR(100),
    `paciente_estado` VARCHAR(45),
    `paciente_sexo` enum('Hombre','Mujer'),
    `paciente_fechanacimiento` DATE,
    `paciente_fecharegistro` DATE NOT NULL,
    `paciente_name` VARCHAR(255) NOT NULL,
    `paciente_ap` VARCHAR(255) NOT NULL,
    `paciente_am` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idpaciente`),
    INDEX `idempleado` (`idempleado`),
    INDEX `idclinica` (`idclinica`),
    CONSTRAINT `idclinica_paciente`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_paciente`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pacientelog
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pacientelog`;

CREATE TABLE `pacientelog`
(
    `idpacientelog` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `idpaciente` INTEGER NOT NULL,
    `idempleado` INTEGER NOT NULL,
    `pacientelog_fecha` DATETIME NOT NULL,
    `pacientelog_nombre_old` VARCHAR(255) DEFAULT '' NOT NULL,
    `pacientelog_telefono_old` VARCHAR(255) DEFAULT '' NOT NULL,
    `pacientelog_nombre_new` VARCHAR(255) DEFAULT '' NOT NULL,
    `pacientelog_telefono_new` VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (`idpacientelog`),
    INDEX `idpaciente` (`idpaciente`),
    INDEX `idempleado` (`idempleado`),
    CONSTRAINT `idempleado_pacientelog`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idpaciente_pacientelog`
        FOREIGN KEY (`idpaciente`)
        REFERENCES `paciente` (`idpaciente`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pacientemembresia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pacientemembresia`;

CREATE TABLE `pacientemembresia`
(
    `idpacientemembresia` INTEGER NOT NULL AUTO_INCREMENT,
    `idpaciente` INTEGER NOT NULL,
    `idclinica` INTEGER NOT NULL,
    `idmembresia` INTEGER NOT NULL,
    `pacientemembresia_folio` VARCHAR(255) NOT NULL,
    `pacientemembresia_fechainicio` DATETIME NOT NULL,
    `pacientemembresia_serviciosdisponibles` INTEGER NOT NULL,
    `pacientemembresia_cuponesdisponibles` INTEGER NOT NULL,
    `pacientemembresia_estatus` enum('activa','terminada','cancelada','vencida') DEFAULT 'activa' NOT NULL COMMENT 'se agregó la columna estatus para saber con una sola consulta si aún tiene cupones o servicios disponibles una membresia',
    `pacientemembresia_vigencia` DATETIME,
    PRIMARY KEY (`idpacientemembresia`),
    INDEX `idmembresia` (`idmembresia`),
    INDEX `idpaciente` (`idpaciente`),
    INDEX `idclinica` (`idclinica`),
    CONSTRAINT `idclinica_pacientemembresia`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idmembresia_pacientemembresia`
        FOREIGN KEY (`idmembresia`)
        REFERENCES `membresia` (`idmembresia`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idpaciente_pacientemembresia`
        FOREIGN KEY (`idpaciente`)
        REFERENCES `paciente` (`idpaciente`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pacientemembresiadetalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pacientemembresiadetalle`;

CREATE TABLE `pacientemembresiadetalle`
(
    `idpacientemembresiadetalle` INTEGER NOT NULL AUTO_INCREMENT,
    `idpacientemembresia` INTEGER NOT NULL,
    `pacientemembresiadetalle_fecha` DATE NOT NULL,
    `idvisitadetalle` INTEGER NOT NULL,
    PRIMARY KEY (`idpacientemembresiadetalle`),
    INDEX `idpacientemembresia` (`idpacientemembresia`),
    INDEX `idvisitadetalle` (`idvisitadetalle`),
    CONSTRAINT `idpacientemembresia_pacientemembresiadetalle`
        FOREIGN KEY (`idpacientemembresia`)
        REFERENCES `pacientemembresia` (`idpacientemembresia`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idvisitadetalle_pacientemembresiadetalle`
        FOREIGN KEY (`idvisitadetalle`)
        REFERENCES `visitadetalle` (`idvisitadetalle`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pacienteseguimiento
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pacienteseguimiento`;

CREATE TABLE `pacienteseguimiento`
(
    `idpacienteseguimiento` INTEGER NOT NULL AUTO_INCREMENT,
    `idpaciente` INTEGER NOT NULL,
    `idclinica` INTEGER NOT NULL,
    `idempleado` INTEGER NOT NULL,
    `idcanalcomunicacion` INTEGER NOT NULL,
    `idestatusseguimiento` INTEGER NOT NULL,
    `pacienteseguimiento_fechacreacion` DATETIME NOT NULL COMMENT 'fecha en que se registró el movimient',
    `pacienteseguimiento_comentario` TEXT NOT NULL,
    `pacienteseguimiento_fecha` DATETIME NOT NULL COMMENT 'fecha en que se realizó el seguimiento ya sea llamada, mensaje, et',
    PRIMARY KEY (`idpacienteseguimiento`),
    INDEX `idpaciente` (`idpaciente`),
    INDEX `idempleado` (`idempleado`),
    INDEX `idclinica` (`idclinica`),
    INDEX `idcanalcomunicacion` (`idcanalcomunicacion`),
    INDEX `idestatuseguimiento` (`idestatusseguimiento`),
    CONSTRAINT `idcanalcomunicacion_pacienteseguimiento`
        FOREIGN KEY (`idcanalcomunicacion`)
        REFERENCES `canalcomunicacion` (`idcanalcomunicacion`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idclinica_pacienteseguimiento`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_pacienteseguimiento`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idestatusseguimiento_pacienteseguimiento`
        FOREIGN KEY (`idestatusseguimiento`)
        REFERENCES `estatusseguimiento` (`idestatusseguimiento`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idpaciente_pacienteseguimiento`
        FOREIGN KEY (`idpaciente`)
        REFERENCES `paciente` (`idpaciente`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- producto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto`
(
    `idproducto` INTEGER NOT NULL AUTO_INCREMENT,
    `producto_nombre` VARCHAR(45) NOT NULL,
    `producto_descripcion` VARCHAR(45) NOT NULL,
    `producto_costo` VARCHAR(45) NOT NULL,
    `producto_precio` VARCHAR(45) NOT NULL COMMENT 'igual en todas las clínicas ',
    `producto_generaingreso` TINYINT(1) NOT NULL,
    `producto_generacomision` TINYINT(1) NOT NULL,
    `producto_tipocomision` enum('cantidad','porcentaje'),
    `producto_comision` DECIMAL(10,2),
    `producto_fotografia` TEXT,
    PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productoclinica
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productoclinica`;

CREATE TABLE `productoclinica`
(
    `idproductoclinica` INTEGER NOT NULL AUTO_INCREMENT,
    `idproducto` INTEGER NOT NULL,
    `idclinica` INTEGER NOT NULL,
    `productoclinica_existencia` DECIMAL(10,2) NOT NULL,
    `productoclinica_minimo` DECIMAL(10,2) NOT NULL,
    `productoclinica_maximo` DECIMAL(10,2) NOT NULL,
    `productoclinica_reorden` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`idproductoclinica`),
    INDEX `idproducto` (`idproducto`),
    INDEX `idclnica` (`idclinica`),
    CONSTRAINT `idclinica_productoclinica`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idproducto_productoclinica`
        FOREIGN KEY (`idproducto`)
        REFERENCES `producto` (`idproducto`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productoinventario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productoinventario`;

CREATE TABLE `productoinventario`
(
    `idproductoinventario` INTEGER NOT NULL AUTO_INCREMENT,
    `idclinica` INTEGER NOT NULL,
    `idproductoclinica` INTEGER NOT NULL,
    `productoinventario_fecha` DATE NOT NULL,
    `productoinventario_cantidad` INTEGER NOT NULL,
    PRIMARY KEY (`idproductoinventario`),
    INDEX `idclinica` (`idclinica`),
    INDEX `idproductoclinica` (`idproductoclinica`),
    CONSTRAINT `idclinica_productoinventario`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idproductoclinica_productoinventario`
        FOREIGN KEY (`idproductoclinica`)
        REFERENCES `productoclinica` (`idproductoclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- proveedor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor`
(
    `idproveedor` INTEGER NOT NULL AUTO_INCREMENT,
    `proveedor_nombre` VARCHAR(255),
    `proveedor_rfc` VARCHAR(45),
    `proveedor_telefono` VARCHAR(255) COMMENT 'nombre de la persona encargada de vender',
    `proveedor_celular` VARCHAR(45),
    `proveedor_contacto` VARCHAR(45),
    `proveedor_direccion` VARCHAR(255),
    `proveedor_codigopostal` VARCHAR(45),
    `proveedor_ciudad` VARCHAR(255),
    `proveedor_estado` VARCHAR(45),
    `proveedor_email` VARCHAR(45),
    PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- recurso
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `recurso`;

CREATE TABLE `recurso`
(
    `idrecurso` INTEGER NOT NULL AUTO_INCREMENT,
    `recurso_nombre` VARCHAR(45) NOT NULL,
    `recurso_descripcion` TEXT NOT NULL,
    PRIMARY KEY (`idrecurso`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- rol
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol`
(
    `idrol` INTEGER NOT NULL AUTO_INCREMENT,
    `rol_nombre` VARCHAR(255) NOT NULL,
    `rol_descripcion` TEXT,
    PRIMARY KEY (`idrol`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- rolrecurso
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `rolrecurso`;

CREATE TABLE `rolrecurso`
(
    `idrolrecurso` INTEGER NOT NULL AUTO_INCREMENT,
    `idrol` INTEGER NOT NULL,
    `idrecurso` INTEGER NOT NULL,
    PRIMARY KEY (`idrolrecurso`),
    INDEX `idrol` (`idrol`),
    INDEX `idrecurso` (`idrecurso`),
    CONSTRAINT `idrecurso_rolrecurso`
        FOREIGN KEY (`idrecurso`)
        REFERENCES `recurso` (`idrecurso`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idrol_rolrecurso`
        FOREIGN KEY (`idrol`)
        REFERENCES `rol` (`idrol`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- servicio
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `servicio`;

CREATE TABLE `servicio`
(
    `idservicio` INTEGER NOT NULL AUTO_INCREMENT,
    `servicio_nombre` VARCHAR(255) NOT NULL,
    `servicio_descripcion` TEXT NOT NULL,
    `servicio_generaingreso` TINYINT(1) NOT NULL,
    `servicio_generacomision` TINYINT(1) NOT NULL,
    `servicio_tipocomision` enum('porcentaje','cantidad'),
    `servicio_comision` DECIMAL(10,2),
    `servicio_dependencia` enum('ninguno','membresia','cupon') NOT NULL,
    PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- servicioclinica
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `servicioclinica`;

CREATE TABLE `servicioclinica`
(
    `idservicioclinica` INTEGER NOT NULL AUTO_INCREMENT,
    `idservicio` INTEGER NOT NULL,
    `idclinica` INTEGER NOT NULL,
    `servicioclinica_precio` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`idservicioclinica`),
    INDEX `idservicio` (`idservicio`),
    INDEX `idclinica` (`idclinica`),
    CONSTRAINT `idclinica_servicioclinica`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idservicio_servicioclinica`
        FOREIGN KEY (`idservicio`)
        REFERENCES `servicio` (`idservicio`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- servicioinsumo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `servicioinsumo`;

CREATE TABLE `servicioinsumo`
(
    `idservicioinsumo` INTEGER NOT NULL AUTO_INCREMENT,
    `idservicio` INTEGER NOT NULL,
    `idinsumo` INTEGER NOT NULL,
    `servicioinsumo_cantidad` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`idservicioinsumo`),
    INDEX `idservicio` (`idservicio`),
    INDEX `idinsumo` (`idinsumo`),
    CONSTRAINT `idinsumo_servicioinsumo`
        FOREIGN KEY (`idinsumo`)
        REFERENCES `insumo` (`idinsumo`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idservicio_servicioinsumo`
        FOREIGN KEY (`idservicio`)
        REFERENCES `servicio` (`idservicio`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- transferencia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `transferencia`;

CREATE TABLE `transferencia`
(
    `idtransferencia` INTEGER NOT NULL AUTO_INCREMENT,
    `idempleado` INTEGER NOT NULL COMMENT 'el id del empleado que generó la transferenci',
    `idempleadoreceptor` INTEGER COMMENT 'empleado quien puso aceptado la transferencia',
    `idclinicaremitente` INTEGER NOT NULL COMMENT 'clinica quien envía los productos o insumo',
    `idclinicadestinataria` INTEGER NOT NULL,
    `transferencia_creadaen` DATETIME NOT NULL,
    `transferencia_estatus` enum('enviada','aceptada','rechazada','cancelada') NOT NULL,
    `transferencia_fechamovimiento` DATE NOT NULL COMMENT 'fecha en que la clínica receptora, aceptó o rechazó la petic',
    `transferencia_comprobante` TEXT COMMENT 'representa la ruta del comprobante pdf de la transferencia',
    `transferencia_nota` TEXT,
    PRIMARY KEY (`idtransferencia`),
    INDEX `idclinicaremitente` (`idclinicaremitente`),
    INDEX `idclinicadestinataria` (`idclinicadestinataria`),
    INDEX `idempleado` (`idempleado`),
    INDEX `idempleadoreceptor` (`idempleadoreceptor`),
    CONSTRAINT `idclinicadestinataria_transferencia`
        FOREIGN KEY (`idclinicadestinataria`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idclinicaremitente_transferencia`
        FOREIGN KEY (`idclinicaremitente`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_transferencia`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleadoreceptor_transferencia`
        FOREIGN KEY (`idempleadoreceptor`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- transferenciadetalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `transferenciadetalle`;

CREATE TABLE `transferenciadetalle`
(
    `idtransferenciadetalle` INTEGER NOT NULL AUTO_INCREMENT,
    `idtransferencia` INTEGER NOT NULL,
    `idproductoclinica` INTEGER,
    `idinsumoclinica` INTEGER,
    `transferenciadetalle_cantidad` DECIMAL(10,2),
    PRIMARY KEY (`idtransferenciadetalle`),
    INDEX `idtransferencia` (`idtransferencia`),
    INDEX `idproductoclinica` (`idproductoclinica`),
    INDEX `idinsumoclinica` (`idinsumoclinica`),
    CONSTRAINT `idinsumoclinica_transferenciadetalle`
        FOREIGN KEY (`idinsumoclinica`)
        REFERENCES `insumoclinica` (`idinsumoclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idproductoclinica_transferenciadetalle`
        FOREIGN KEY (`idproductoclinica`)
        REFERENCES `productoclinica` (`idproductoclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idtransferencia_transferenciadetalle`
        FOREIGN KEY (`idtransferencia`)
        REFERENCES `transferencia` (`idtransferencia`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- visita
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `visita`;

CREATE TABLE `visita`
(
    `idvisita` INTEGER NOT NULL AUTO_INCREMENT,
    `idempleado` INTEGER NOT NULL,
    `idempleadocreador` INTEGER NOT NULL,
    `idpaciente` INTEGER NOT NULL,
    `idclinica` INTEGER NOT NULL,
    `visita_tipo` enum('consulta','servicio') NOT NULL,
    `visita_creadaen` DATETIME NOT NULL,
    `visita_canceladaen` DATETIME,
    `visita_fechainicio` DATETIME NOT NULL,
    `visita_fechafin` DATETIME NOT NULL,
    `visita_status` enum('por confirmar','confimada','cancelo','no se presento','reprogramda','en servicio','terminado') NOT NULL,
    `visita_estatuspago` enum('pagada','no pagada','cancelada'),
    `visita_total` DECIMAL(10,2),
    `visita_nota` TEXT,
    `visita_year` INTEGER NOT NULL,
    `visita_month` INTEGER NOT NULL,
    `visita_day` INTEGER NOT NULL,
    `visita_foliomembresia` VARCHAR(45),
    `visita_cuponmembresia` VARCHAR(45),
    `visita_horainicio` DATETIME NOT NULL,
    `visita_horafin` DATETIME,
    `visita_duracion` INTEGER NOT NULL,
    `visita_descuento` DECIMAL(10,2) NOT NULL,
    `idvisitapadre` INTEGER,
    PRIMARY KEY (`idvisita`),
    INDEX `idempleadocreador` (`idempleadocreador`),
    INDEX `idempleado` (`idempleado`),
    INDEX `idpaciente` (`idpaciente`),
    INDEX `idclinica` (`idclinica`),
    INDEX `idvisitapadre` (`idvisitapadre`),
    CONSTRAINT `idclinica_visita`
        FOREIGN KEY (`idclinica`)
        REFERENCES `clinica` (`idclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleado_visita`
        FOREIGN KEY (`idempleado`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idempleadocreador_visita`
        FOREIGN KEY (`idempleadocreador`)
        REFERENCES `empleado` (`idempleado`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idpaciente_visita`
        FOREIGN KEY (`idpaciente`)
        REFERENCES `paciente` (`idpaciente`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idvisitapadre_visita`
        FOREIGN KEY (`idvisitapadre`)
        REFERENCES `visita` (`idvisita`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- visitadetalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `visitadetalle`;

CREATE TABLE `visitadetalle`
(
    `idvisitadetalle` INTEGER NOT NULL AUTO_INCREMENT,
    `idvisita` INTEGER NOT NULL,
    `idproductoclinica` INTEGER,
    `idservicioclinica` INTEGER,
    `idmembresia` INTEGER,
    `visitadetalle_cargo` enum('producto','servicio','membresia') NOT NULL COMMENT 'si el cargo es tipo producto entonces el idproducto no será nul',
    `visitadetalle_preciounitario` DECIMAL(10,2) NOT NULL,
    `visitadetalle_cantidad` DECIMAL(10,2) NOT NULL,
    `visitadetalle_subtotal` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`idvisitadetalle`),
    INDEX `idproductoclinica` (`idproductoclinica`),
    INDEX `idservicioclinica` (`idservicioclinica`),
    INDEX `idvisita` (`idvisita`),
    INDEX `idmembresia_visitadetalle` (`idmembresia`),
    CONSTRAINT `idmembresia_visitadetalle`
        FOREIGN KEY (`idmembresia`)
        REFERENCES `membresia` (`idmembresia`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idproductoclinica_visitadetalle`
        FOREIGN KEY (`idproductoclinica`)
        REFERENCES `productoclinica` (`idproductoclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idservicioclinica_visitadetalle`
        FOREIGN KEY (`idservicioclinica`)
        REFERENCES `servicioclinica` (`idservicioclinica`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idvisita_visitadetalle`
        FOREIGN KEY (`idvisita`)
        REFERENCES `visita` (`idvisita`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- visitalog
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `visitalog`;

CREATE TABLE `visitalog`
(
    `idvisitalog` INTEGER NOT NULL AUTO_INCREMENT,
    `idvisita` INTEGER NOT NULL,
    `idempleado` INTEGER,
    `visitalog_fecha` DATETIME,
    `visitalog_accion` VARCHAR(45),
    PRIMARY KEY (`idvisitalog`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- visitapago
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `visitapago`;

CREATE TABLE `visitapago`
(
    `idvisitapago` INTEGER NOT NULL AUTO_INCREMENT,
    `idvisita` INTEGER NOT NULL,
    `visitapago_tipo` enum('efectivo','tarjeta','tarjeta de puntos') NOT NULL,
    `visitapago_cantidad` DECIMAL(10,2) NOT NULL,
    `visitapago_fecha` DATETIME NOT NULL,
    `visitapago_referencia` TEXT,
    PRIMARY KEY (`idvisitapago`),
    INDEX `idvisita` (`idvisita`),
    CONSTRAINT `idvisita_visitapago`
        FOREIGN KEY (`idvisita`)
        REFERENCES `visita` (`idvisita`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
