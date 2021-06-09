-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2021 a las 00:07:30
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inv_picky_evaluacion`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `add_detalle_factura_temp` (IN `codigo` BIGINT, IN `cantidad` INT, IN `token_user` VARCHAR(50), IN `descuento` INT)  BEGIN
	DECLARE precio_actual decimal;
    SELECT pre_reventa INTO precio_actual FROM productos WHERE id_producto=codigo;
    INSERT INTO detalle_factura_temp(token_user, id_producto, cantidad,descuento, precio_venta) VALUES(token_user,codigo,cantidad, descuento,precio_actual);
    
    SELECT tmp.id, tmp.id_producto, p.des_producto,tmp.cantidad,tmp.descuento, tmp.precio_venta FROM detalle_factura_temp tmp
    INNER JOIN productos p
    on tmp.id_producto= p.id_producto
    WHERE tmp.token_user=token_user;
	
END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `cxgbcvbcvbcvbcvbcfhgdf` (IN `id_cargo_` BIGINT, IN `cargo_` VARCHAR(50), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` INT(20))  NO SQL
BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO cargos(cargo,fec_registro,usr_registro) VALUES (cargo_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE  cargos SET
  cargo = cargo_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
   id_cargo = id_cargo_;
    WHEN 'eliminar' THEN
    DELETE FROM cargos WHERE 
   id_cargo = id_cargo_;
     WHEN 'consultar' THEN
     SELECT * FROM  cargos
     WHERE  id_cargo = id_cargo_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `del_detalle_tem` (IN `id_detalle` BIGINT, IN `token` VARCHAR(50))  BEGIN
DELETE FROM detalle_factura_temp WHERE id= id_detalle;

    SELECT tmp.id, tmp.id_producto, p.des_producto,tmp.cantidad,tmp.descuento,tmp.precio_venta FROM detalle_factura_temp tmp
    INNER JOIN productos p
    on tmp.id_producto= p.id_producto
    WHERE tmp.token_user=token;

END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `procesar_venta` (IN `cod_usuario` BIGINT, IN `cod_cliente` BIGINT, IN `token` VARCHAR(50))  BEGIN
	DECLARE factura bigint;
    DECLARE registros bigint;
    
    DECLARE total decimal;
    DECLARE nueva_existencia int;
    DECLARE existencia_actual int;
    
    DECLARE tmp_cod_producto bigint;
    DECLARE tmp_cant_producto int;
    DECLARE a int;
    set a=1;
    
    
    CREATE TEMPORARY TABLE tbl_tmp_tokenuser(
    	id bigint NOT null AUTO_INCREMENT PRIMARY key,
        cod_prod bigint,
        cant_pro int
    );
     	SET registros = (SELECT COUNT(*) FROM detalle_factura_temp WHERE token_user= token);  
    IF registros > 0 THEN
    
    	INSERT INTO tbl_tmp_tokenuser(cod_prod, cant_pro) 
        SELECT id_producto, cantidad FROM detalle_factura_temp 
        WHERE token_user=token;
        
        INSERT INTO factura (id_cliente, User_registro) VALUES(cod_cliente,cod_usuario);
        
        SET factura = LAST_INSERT_ID();
        
        INSERT INTO detalle_factura(id_factura,id_producto,cantidad,descuento,precio_venta) SELECT (factura) AS id_factura, id_producto, cantidad,descuento, precio_venta FROM 			detalle_factura_temp WHERE token_user=token;
        
        WHILE a <= registros DO
        
        SELECT cod_prod, cant_pro INTO tmp_cod_producto, tmp_cant_producto FROM tbl_tmp_tokenuser WHERE id=a;
        SELECT cantidad INTO existencia_actual FROM inventarios WHERE id_producto = tmp_cod_producto;
        
        SET nueva_existencia = existencia_actual - tmp_cant_producto;
        UPDATE inventarios SET cantidad= nueva_existencia WHERE id_producto = tmp_cod_producto;
        
         set a=a+1;
        
        END WHILE; 
        
        SET total=(SELECT SUM((cantidad*precio_venta)-((cantidad*precio_venta)*(descuento/100))) FROM detalle_factura_temp  WHERE token_user=token);

        
        UPDATE factura SET totalFactura =total WHERE id_factura=factura;
        DELETE FROM detalle_factura_temp  WHERE token_user=token;
        TRUNCATE TABLE tbl_tmp_tokenuser;
        SELECT * FROM factura WHERE id_factura=factura;
        
        
    ELSE
    SELECT 0;
    END IF;
END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_Clientes` (IN `accion_` VARCHAR(10), IN `id_persona_` BIGINT, IN `num_id_persona_` VARCHAR(15), IN `nom_persona_` VARCHAR(50), IN `ape_persona_` VARCHAR(50), IN `eda_persona_` INT(3), IN `fec_na_persona_` DATE, IN `gen_persona_` VARCHAR(15), IN `usr_registro_` VARCHAR(30), IN `id_correo_` BIGINT, IN `correo_` VARCHAR(40), IN `rel_correo_persona_` BIGINT, IN `id_telefono_` BIGINT, IN `telefono_` VARCHAR(9), IN `rel_telefonos_persona_` BIGINT, IN `id_direccion_` BIGINT, IN `direccion_` VARCHAR(250), IN `rel_direcciones_persona_` BIGINT, IN `id_cliente_` BIGINT, IN `rtn_empresa_` INT(14), IN `nom_empresa_` VARCHAR(50), IN `id_tip_cliente_` BIGINT)  BEGIN
    CASE accion_ 
    
    /* COMIENZO DE LA INSTANCIA INSERT EN TABLAS PERSONAS, CORREOS, TELEFONOS, DIRECCIONES Y CLIENTES */
    WHEN 'nuevo' THEN
    START TRANSACTION;
    
    INSERT INTO `personas`(`num_id_persona`, `nom_persona`, `ape_persona`, `eda_persona`, `fec_na_persona`, `gen_persona`, `fec_registro`, `usr_registro`) 
    VALUES (num_id_persona_,nom_persona_,ape_persona_,eda_persona_,fec_na_persona_,gen_persona_,now(),usr_registro_);
    SELECT @id_persona := MAX(id_persona) FROM `personas`;
    
    INSERT INTO `correos`(`correo`, `fec_registro`, `usr_registro`) 
    VALUES (correo_,now(),usr_registro_);
    SELECT @id_correo := MAX(id_correo) FROM `correos`;
    INSERT INTO `rel_correos_persona`(`id_correo`, `id_persona`) 
    VALUES (@id_correo,@id_persona);
    
    INSERT INTO `telefonos`(`telefono`, `fec_registro`, `usr_registro`)
    VALUES (telefono_,now(),usr_registro_);
    SELECT @id_telefono := MAX(id_telefono) FROM `telefonos`;
    INSERT INTO `rel_telefonos_persona`(`id_telefono`, `id_persona`) 
    VALUES (@id_telefono,@id_persona);
    
    INSERT INTO `direcciones`(`direccion`, `fec_registro`, `usr_registro`) 
    VALUES (direccion_,now(),usr_registro_);
    SELECT @id_direccion := MAX(id_direccion) FROM `direcciones`;
    INSERT INTO `rel_direcciones_persona`(`id_direccion`, `id_persona`) 
    VALUES (@id_direccion,@id_persona);
    
    INSERT INTO `clientes`(`id_persona`, `rtn_empresa`, `nom_empresa`, `id_tip_cliente`, `fec_registro`, `usr_registro`)   
    VALUES (@id_persona,rtn_empresa_,nom_empresa_,id_tip_cliente_,now(),usr_registro_);
    
    COMMIT;
    /* FINALIZA INSERCION DE TABLAS */
    
    /* COMIENZO DE LA INSTANCIA DE EDICION EN TABLAS PERSONAS, CORREOS, TELEFONOS, DIRECCIONES Y CLIENTES */
    WHEN 'editar' THEN
    START TRANSACTION;
    
    UPDATE `personas` SET
    `num_id_persona`= num_id_persona_,
    `nom_persona` = nom_persona_, 
    `ape_persona` = ape_persona_, 
    `eda_persona` = eda_persona_,
    `fec_na_persona` = fec_na_persona_,
    `gen_persona`= gen_persona_,
    `fec_registro` = now(), 
    `usr_registro`=usr_registro_
    WHERE `id_persona` = id_persona_;
    SELECT @id_persona := MAX(id_persona) FROM `personas`;
    
    UPDATE `correos` SET 
    `correo`=correo_, 
    `fec_registro`=now(),
    `usr_registro`=usr_registro_
     WHERE `id_correo` = id_correo_;

    UPDATE `rel_correos_persona` SET
    `id_correo`=id_correo_,
    `id_persona`=id_persona_
    WHERE `rel_correo_persona`=rel_correo_persona_;
    
    UPDATE `telefonos` SET
     `telefono`=telefono_, 
     `fec_registro`=now(), 
     `usr_registro`=usr_registro_
     WHERE `id_telefono`=id_telefono_;
    
   UPDATE `rel_telefonos_persona` SET
   `id_telefono`=id_telefono_, 
   `id_persona`=id_persona_
   WHERE rel_telefono_persona=rel_telefonos_persona_;
   
   UPDATE `direcciones` SET
   `direccion`=direccion_ ,
   `fec_registro`=now(), 
    `usr_registro`=usr_registro_
    WHERE `id_direccion`=id_direccion_;
    
    UPDATE `rel_direcciones_persona` SET
    `id_direccion`=id_direccion_,
    `id_persona`=id_persona_
    WHERE `rel_direccion_persona`=rel_direcciones_persona_;
    
    UPDATE `clientes` SET
    `rtn_empresa`=rtn_empresa_,
     `nom_empresa`=nom_empresa_,
     `id_tip_cliente`=id_tip_cliente_,
     `fec_registro`=now(),
     `usr_registro`=usr_registro_
    WHERE `id_cliente`=id_cliente_;
  
  COMMIT;
  /* FINALIZA EDICION DE TABLAS */
  
  /* COMIENZO DE LA INSTANCIA DE ELIMINACION EN TABLAS PERSONAS, CORREOS, TELEFONOS, DIRECCIONES Y CLIENTES */
  WHEN 'eliminar' THEN
  START TRANSACTION;
  
   DELETE FROM `personas` WHERE `id_persona` = id_persona_;
 
   DELETE FROM `correos` WHERE `id_correo` = id_correo_;
   DELETE FROM `rel_correos_persona` WHERE `rel_correo_persona`=rel_correo_persona_;
  
   DELETE FROM `telefonos` WHERE `id_telefono`=id_telefono_;
   DELETE FROM `rel_telefonos_persona` WHERE rel_telefono_persona=rel_telefonos_persona_;
  
   DELETE FROM `direcciones` WHERE `id_direccion`=id_direccion_;
   DELETE FROM `rel_direcciones_persona` WHERE `rel_direccion_persona`=rel_direcciones_persona_;
  
   DELETE FROM `clientes`WHERE `id_cliente`=id_cliente_;
     
   COMMIT;
   /* FINALIZA ELIMINACION DE TABLAS */
   
   /* COMIENZO DE LA INSTANCIA DE CONSULTA EN TABLAS PERSONAS, CORREOS, TELEFONOS, DIRECCIONES Y CLIENTES */
   WHEN 'consultar' THEN
   START TRANSACTION;
   
   SELECT * FROM `personas` WHERE `id_persona` = id_persona_;
    
   SELECT * FROM `correos` WHERE `id_correo` = id_correo_;
   SELECT * FROM `rel_correos_persona` WHERE `rel_correo_persona`=rel_correo_persona_;
   
   SELECT * FROM `telefonos` WHERE `id_telefono`=id_telefono_;
   SELECT * FROM `rel_telefonos_persona` WHERE rel_telefono_persona=rel_telefonos_persona_;
   
   SELECT * FROM `direcciones` WHERE `id_direccion`=id_direccion_;
   SELECT * FROM `rel_direcciones_persona` WHERE `rel_direccion_persona`=rel_direcciones_persona_;
   
   SELECT * FROM `clientes`WHERE `id_cliente`=id_cliente_;
   
   /* FINALIZA INSTANCIA CONSULTA*/
   
   END CASE;
   END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `SP_DATOSGRAFICO_BAR` ()  SELECT * FROM productos$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_Empleados4` (IN `accion_` VARCHAR(10), IN `id_persona_` BIGINT, IN `num_id_persona_` VARCHAR(15), IN `nom_persona_` VARCHAR(50), IN `ape_persona_` VARCHAR(50), IN `eda_persona_` INT(3), IN `fec_na_persona_` DATE, IN `gen_persona_` VARCHAR(15), IN `usr_registro_` VARCHAR(30), IN `id_correo_` BIGINT, IN `correo_` VARCHAR(40), IN `rel_correo_persona_` BIGINT, IN `id_telefono_` BIGINT, IN `telefono_` VARCHAR(9), IN `rel_telefonos_persona_` BIGINT, IN `id_direccion_` BIGINT, IN `direccion_` VARCHAR(250), IN `rel_direcciones_persona_` BIGINT, IN `id_empleado_` BIGINT, IN `fot_empleado_` VARCHAR(50), IN `sal_empleado_` DOUBLE, IN `id_cargo_` BIGINT, IN `id_tip_empleados_` BIGINT, IN `fec_ingreso_` DATETIME, IN `fec_salida_` DATETIME, IN `est_empleado_` TINYINT, IN `id_usuario_` BIGINT, IN `id_rol_` BIGINT, IN `nom_usuario_` VARCHAR(30), IN `pass_usuario_` VARCHAR(30), IN `last_session_` DATETIME, IN `activacion_` INT(11), IN `token_` VARCHAR(40), IN `token_password_` VARCHAR(100), IN `pass_request_` INT(11))  BEGIN
    CASE accion_ 
    WHEN 'nuevo' THEN
    START TRANSACTION;
    
    INSERT INTO `personas`(`num_id_persona`, `nom_persona`, `ape_persona`, `eda_persona`, `fec_na_persona`, `gen_persona`, `fec_registro`, `usr_registro`) 
    VALUES (num_id_persona_,nom_persona_,ape_persona_,eda_persona_,fec_na_persona_,gen_persona_,now(),usr_registro_);
    SELECT @id_persona := MAX(id_persona) FROM `personas`;
    
    INSERT INTO `correos`(`correo`, `fec_registro`, `usr_registro`) 
    VALUES (correo_,now(),usr_registro_);
    SELECT @id_correo := MAX(id_correo) FROM `correos`;
    INSERT INTO `rel_correos_persona`(`id_correo`, `id_persona`) 
    VALUES (@id_correo,@id_persona);
    
    INSERT INTO `telefonos`(`telefono`, `fec_registro`, `usr_registro`)
    VALUES (telefono_,now(),usr_registro_);
    SELECT @id_telefono := MAX(id_telefono) FROM `telefonos`;
    INSERT INTO `rel_telefonos_persona`(`id_telefono`, `id_persona`) 
    VALUES (@id_telefono,@id_persona);
    
    INSERT INTO `direcciones`(`direccion`, `fec_registro`, `usr_registro`) 
    VALUES (direccion_,now(),usr_registro_);
    SELECT @id_direccion := MAX(id_direccion) FROM `direcciones`;
    INSERT INTO `rel_direcciones_persona`(`id_direccion`, `id_persona`) 
    VALUES (@id_direccion,@id_persona);
    
    INSERT INTO `empleados`(`id_persona`,`fot_empleado`, `sal_empleado`, `id_cargo`, `id_tip_empleado`, `fec_ingreso`, `fec_salida`,`est_empleado`,`fec_registro`,`usr_registro`)    VALUES(@id_persona,fot_empleado_,sal_empleado_,id_cargo_,id_tip_empleados_,fec_ingreso_,fec_salida_,est_empleado_,now(),usr_registro_);
    
    INSERT INTO `usuario`(`id_persona`,`id_rol`, `nom_usuario`, `pass_usuario`, `last_session`, `activacion`, `token`, `token_password`, `pass_request`, `fec_registro`, `usr_registro`) 
    VALUES (@id_persona,id_rol_,nom_usuario_,pass_usuario_,last_session_,activacion_,token_,token_password_,pass_request_,now(),usr_registro_);  
    COMMIT;
    
    WHEN 'editar' THEN
    START TRANSACTION;
    
    UPDATE `personas` SET
    `num_id_persona`= num_id_persona_,
    `nom_persona` = nom_persona_, 
    `ape_persona` = ape_persona_, 
    `eda_persona` = eda_persona_,
    `fec_na_persona` = fec_na_persona_,
    `gen_persona`= gen_persona_,
    `fec_registro` = now(), 
    `usr_registro`=usr_registro_
    WHERE `id_persona` = id_persona_;
    SELECT @id_persona := MAX(id_persona) FROM `personas`;
    
    UPDATE `correos` SET 
    `correo`=correo_, 
    `fec_registro`=now(),
    `usr_registro`=usr_registro_
     WHERE `id_correo` = id_correo_;

    UPDATE `rel_correos_persona` SET
    `id_correo`=id_correo_,
    `id_persona`=id_persona_
    WHERE `rel_correo_persona`=rel_correo_persona_;
    
    UPDATE `telefonos` SET
     `telefono`=telefono_, 
     `fec_registro`=now(), 
     `usr_registro`=usr_registro_
     WHERE `id_telefono`=id_telefono_;
    
   UPDATE `rel_telefonos_persona` SET
   `id_telefono`=id_telefono_, 
   `id_persona`=id_persona_
   WHERE rel_telefono_persona=rel_telefonos_persona_;
   
   UPDATE `direcciones` SET
   `direccion`=direccion_ ,
   `fec_registro`=now(), 
    `usr_registro`=usr_registro_
    WHERE `id_direccion`=id_direccion_;
    
    UPDATE `rel_direcciones_persona` SET
    `id_direccion`=id_direccion_,
    `id_persona`=id_persona_
    WHERE `rel_direccion_persona`=rel_direcciones_persona_;
    
    UPDATE `empleados` SET
    `fot_empleado`=fot_empleado_,
    `sal_empleado`=sal_empleado_,
    `id_cargo`=id_cargo_ ,
    `id_tip_empleado`=id_tip_empleados_,
    `fec_ingreso`=fec_ingreso_,
    `fec_salida`=fec_salida_,
    `est_empleado`=est_empleado_,
    `fec_registro`=now(), 
    `usr_registro`=usr_registro_
    WHERE `id_empleado`=id_empleado_;

     
       UPDATE `usuario` SET
      
       `id_rol`=id_rol_,
       `nom_usuario`=nom_usuario_,
       `pass_usuario`=pass_usuario_,
       `last_session`=last_session_,
       `activacion`=activacion_,
       `token`=token_,
       `token_password`=token_password_,
       `pass_request`=pass_request_,
       `fec_registro`=now(), 
      `usr_registro`=usr_registro_
      WHERE `id_usuario`=id_usuario_;
  
  COMMIT;
  
  WHEN 'eliminar' THEN
  START TRANSACTION;
  
  DELETE FROM `personas` WHERE `id_persona` = id_persona_;
 
  
  DELETE FROM `correos` WHERE `id_correo` = id_correo_;
  DELETE FROM `rel_correos_persona` WHERE `rel_correo_persona`=rel_correo_persona_;
  
  DELETE FROM `telefonos` WHERE `id_telefono`=id_telefono_;
  DELETE FROM `rel_telefonos_persona` WHERE rel_telefono_persona=rel_telefonos_persona_;
  
  DELETE FROM `direcciones` WHERE `id_direccion`=id_direccion_;
  DELETE FROM `rel_direcciones_persona` WHERE `rel_direccion_persona`=rel_direcciones_persona_;
  
     DELETE FROM `empleados`WHERE `id_empleado`=id_empleado_;
     
   DELETE FROM `usuario` WHERE `id_usuario`=id_usuario_;
   
   COMMIT;
   
   WHEN 'consultar' THEN
   START TRANSACTION;
   
   SELECT * FROM `personas` WHERE `id_persona` = id_persona_;
    
     SELECT * FROM `correos` WHERE `id_correo` = id_correo_;
  SELECT * FROM `rel_correos_persona` WHERE `rel_correo_persona`=rel_correo_persona_;
   
   SELECT * FROM `telefonos` WHERE `id_telefono`=id_telefono_;
  SELECT * FROM `rel_telefonos_persona` WHERE rel_telefono_persona=rel_telefonos_persona_;
   
  SELECT * FROM `direcciones` WHERE `id_direccion`=id_direccion_;
  SELECT * FROM `rel_direcciones_persona` WHERE `rel_direccion_persona`=rel_direcciones_persona_;
  
  SELECT * FROM `empleados`WHERE `id_empleado`=id_empleado_;
  
   SELECT * FROM `usuario` WHERE `id_usuario`=id_usuario_;
   
   END CASE;
   END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_factura` (IN `accion` VARCHAR(20), IN `id_factura_` INT(14), IN `fec_factura_` DATETIME, IN `id_cliente_` BIGINT, IN `cod_factura_` VARCHAR(20), IN `rango_cai_` INT, IN `usr_registro_` VARCHAR(30), IN `id_det_fact_` BIGINT, IN `id_producto_` BIGINT, IN `cantidad_` INT, IN `descripcion_` VARCHAR(250), IN `descuento_` FLOAT, IN `pre_unitario_` FLOAT, IN `total_` FLOAT, IN `id_det_imp_` BIGINT, IN `importe_gravado_15_` FLOAT, IN `importe_gravado_18_` FLOAT, IN `importe_exento_` FLOAT, IN `importe_exonerado_` FLOAT, IN `isv_15_` FLOAT, IN `isv_18_` FLOAT, IN `total_factura_` FLOAT, IN `id_dat_exo_` BIGINT, IN `num_ord_com_` INT, IN `num_cons_regi_exo_` INT, IN `num_regi_sag_` INT)  BEGIN
	case accion 
        WHEN 'nuevo' THEN
        START TRANSACTION;
        INSERT INTO factura 
        	(fec_factura,
             id_cliente, 
             cod_factura, 
             rango_Cai, 
             fec_registro, 
             usr_registro) 
             VALUES (fec_factura_, 
                      id_cliente_, 
                      cod_factura_, 
                      rango_Cai_,  
                      now(), 
                     usr_registro_);
 SELECT @Id_factura := MAX(Id_factura) FROM  factura;
INSERT into detalle_factura
 (id_factura,
id_producto,
cantidad,
descripcion,
descuento,
pre_unitario,
total,
fec_registro,
usr_registro)
    VALUES (@id_factura,
id_producto_,
cantidad_,
descripcion_,
descuento_,
pre_unitario_,
total_,
now(),
usr_registro_);
SELECT @Id_det_fact := MAX(Id_det_fact) FROM  detalle_factura;
INSERT into detalles_impuestos
(id_det_fact,
importe_gravado_15,
importe_gravado_18,
importe_exento,
importe_exonerado,
isv_15,
isv_18,
total_factura,
fec_registro,
usr_registro)
    VALUES (@id_det_fact,
importe_gravado_15_,
importe_gravado_18_,
importe_exento_,
importe_exonerado_,
isv_15_,
isv_18_,
total_factura_,
now(),
usr_registro_);
SELECT @Id_det_imp := MAX(Id_det_imp) FROM  detalles_impuestos;
INSERT into datos_exonerados
(id_factura,
 num_ord_com, 
num_cons_regi_exo,
 num_regi_Sag, 
fec_registro,
 usr_registro)
   VALUES (@id_factura, 
num_ord_com_,
 num_cons_regi_exo_, 
num_regi_sag_,
 now(), 
usr_registro_);
SELECT @Id_dat_exo := MAX(Id_dat_exo) FROM  datos_exonerados;
                       COMMIT;    
        WHEN 'editar' THEN
START TRANSACTION;
      UPDATE factura SET   fec_factura=fec_factura_,id_cliente=id_cliente_,cod_factura=cod_factura_,rango_cai=rango_cai_,fec_registro=now(),usr_registro=usr_registro_
WHERE id_factura=id_factura_;
SELECT @Id_factura := MAX(Id_factura) FROM  `factura`;
UPDATE detalle_factura SET
id_factura=id_factura_,id_producto=id_producto_,cantidad=cantidad_,descripcion=descripcion_,pre_unitario=pre_unitario_,total=total_,fec_registro=now(),usr_registro=usr_registro_
WHERE id_det_Fact=id_det_fact_;
UPDATE detalles_impuestos SET
id_det_fact=id_det_fact_,importe_gravado_15=importe_gravado_15_,importe_gravado_18=importe_gravado_18_,importe_exento=importe_exento_,importe_exonerado=importe_exonerado_,isv_15=isv_15_,isv_18=isv_18_,total_factura=total_factura_,fec_registro=now(),usr_registro=usr_registro_
 WHERE id_det_imp=id_det_imp_;
UPDATE datos_exonerados SET
id_factura=id_factura_,num_ord_com=num_ord_com_,num_cons_regi_exo=num_cons_regi_exo_,num_regi_Sag=num_regi_Sag_,fec_registro=now(),usr_registro=usr_registro_
WHERE id_dat_exo=id_dat_exo_;
COMMIT;
 WHEN 'eliminar' THEN
START TRANSACTION;
DELETE from factura WHERE id_factura=id_factura_;
DELETE from detalle_factura WHERE id_det_fact=id_det_fact_;
DELETE from detalles_impuestos WHERE id_det_imp=id_det_imp_;
DELETE from datos_exonerados WHERE id_dat_exo=id_dat_exo_;
COMMIT;    
WHEN 'consultar' THEN
START TRANSACTION;
 SELECT * FROM factura WHERE id_factura= id_factura_;
SELECT * FROM detalle_factura WHERE id_det_fact=id_det_fact_;
SELECT * FROM detalles_impuestos WHERE id_det_imp=id_det_imp_;
SELECT * FROM datos_exonerados WHERE id_dat_exo=id_dat_exo_;
COMMIT;    
    END CASE;
END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_Producto` (IN `accion_` VARCHAR(10), IN `id_producto_` BIGINT, IN `id_proveedor_` BIGINT, IN `id_marca_` BIGINT, IN `id_categoria_` BIGINT, IN `id_grupo_` BIGINT, IN `id_tip_impuesto_` BIGINT, IN `id_uni_medida_` BIGINT, IN `nom_producto_` VARCHAR(50), IN `des_producto_` VARCHAR(250), IN `fot_producto_` VARCHAR(50), IN `pre_compra_` FLOAT, IN `pre_venta_` FLOAT, IN `pre_reventa_` FLOAT, IN `sto_minimo_` INT, IN `sto_maximo_` INT, IN `usr_registro_` VARCHAR(30))  NO SQL
BEGIN
	CASE accion_ 
        WHEN 'nuevo' THEN
        START TRANSACTION;
          INSERT INTO `productos` (`id_proveedor`, `id_marca`, `id_categoria`,`id_grupo`, `id_tip_impuesto`,`id_uni_medida`, `nom_producto`,`des_producto`,`fot_producto`,`pre_compra`,`pre_venta`,`pre_reventa`,`sto_minimo`, `sto_maximo`, `fec_registro`, `usr_registro`) 
          VALUES (id_proveedor_, id_marca_,id_categoria_, id_grupo_,id_tip_impuesto_,id_uni_medida_,nom_producto_,des_producto_,fot_producto_,pre_compra_,pre_venta_,pre_reventa_,sto_minimo_,sto_maximo_,now(),usr_registro_);
           COMMIT;    
        WHEN 'editar' THEN
        	UPDATE `productos` SET
        		`id_proveedor`=id_proveedor_,
            `id_marca`=id_marca_,
            `id_categoria`=id_categoria_,
            `id_grupo`=id_grupo_,
            `id_tip_impuesto`=id_tip_impuesto_,
            `id_uni_medida`=id_uni_medida_,
            `nom_producto`=nom_producto_,
            `des_producto`=des_producto_,
            `fot_producto`=fot_producto_,
            `pre_compra`=pre_compra_,
            `pre_venta`=pre_venta_,
            `pre_reventa`=pre_reventa_,
            `sto_minimo`=sto_minimo_,
            `sto_maximo`=sto_maximo_,
            `fec_registro`= now(),
            `usr_registro`=usr_registro_
        		WHERE `id_producto`=id_producto_;
WHEN 'eliminar' THEN
        	DELETE from `productos` WHERE `id_producto`=id_producto_;
        	WHEN 'consultar' THEN
    	SELECT * FROM `productos` WHERE `id_producto`=id_producto_;
    END CASE;
 
END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_Proveedores2` (IN `id_Proveedor_` INT(14), IN `rtn_empresa_` INT(14), IN `nom_empresa_` VARCHAR(50) CHARSET utf8, IN `con_empresa_` VARCHAR(50) CHARSET utf8, IN `id_banco_` BIGINT, IN `num_cuenta_` BIGINT, IN `accion` VARCHAR(20) CHARSET utf8, IN `usr_registro_` VARCHAR(30) CHARSET utf8, IN `correo_` VARCHAR(40) CHARSET utf8, IN `id_correo_` BIGINT, IN `rel_correo_proveedores_` BIGINT, IN `telefono_` VARCHAR(40) CHARSET utf8, IN `id_telefono_` BIGINT, IN `rel_telefonos_proveedores_` BIGINT, IN `direccion_` VARCHAR(40) CHARSET utf8, IN `id_direccion_` BIGINT, IN `rel_direccion_proveedores_` BIGINT)  BEGIN

/*Inicio del case*/
	CASE accion 

        WHEN 'nuevo' THEN
        START TRANSACTION;

/*Inicio de Insert en proveedores*/
 INSERT INTO `PROVEEDORES` 
        	(`rtn_empresa`, 
             `nom_empresa`, 
             `con_empresa`, 
             `id_banco`, 
             `num_cuenta`, 
             `fec_registro`, 
             `usr_registro`) 
             VALUES (rtn_empresa_, 
                     nom_empresa_, 
                     con_empresa_, 
                     id_banco_, 
                     num_cuenta_, 
                     now(), 
                     usr_registro_);
                SELECT @Id_Proveedor := MAX(Id_Proveedor) FROM  `proveedores`;
 /*Inicio de Insert en correos*/               
           INSERT INTO `CORREOS`
           (`correo`, 
            `fec_registro`, 
            `usr_registro`) 
            VALUES (correo_, 
                    now(), 
                    usr_registro_);
    SELECT @id_correo := MAX(id_correo) FROM `correos`;
    INSERT INTO `rel_correo_proveedores`(`id_correo`, `id_proveedor`) 
    VALUES (@id_correo,@id_proveedor);
    

          INSERT INTO `TELEFONOS`
           (`telefono`, 
            `fec_registro`, 
            `usr_registro`) 
            VALUES (telefono_, 
                    now(), 
                    usr_registro_);

   SELECT @id_telefono := MAX(id_telefono) FROM `telefonos`;
    INSERT INTO `rel_telefonos_proveedores`(`id_telefono`, `id_proveedor`) 
    VALUES (@id_telefono,@id_proveedor);


          INSERT INTO `DIRECCIONES`
           (`direccion`, 
            `fec_registro`, 
            `usr_registro`) 
            VALUES (direccion_, 
                    now(), 
                    usr_registro_);
    SELECT @id_direccion := MAX(id_direccion) FROM `direcciones`;
    INSERT INTO `rel_direcciones_proveedores`(`id_direccion`, `id_proveedor`) 
    VALUES (@id_direccion,@id_proveedor);


Commit   ;               


/*Inicio de Actualizar*/

        WHEN 'editar' THEN
        START TRANSACTION;

/*Inicio de UPDATE en proveedores*/

        	UPDATE proveedores SET
        		rtn_empresa=rtn_empresa_,nom_empresa=nom_empresa_,con_empresa=con_empresa_,id_banco=id_banco_,num_cuenta=num_cuenta_
        		WHERE `id_proveedor`=id_proveedor_;
                


/*Inicio de UPDATE en CORREOS*/

            UPDATE `correos` SET
            `correo` = correo_ , `fec_registro` = now(), `usr_registro` = usr_registro_
            where `id_correo` = id_correo_;

    UPDATE `rel_correo_proveedores` SET
    `id_correo`=id_correo_,
    `id_proveedor`=id_proveedor_
    WHERE `id_correo_proveedor`=rel_correo_proveedores_;

            UPDATE `direcciones` SET
            `direccion` = direccion_ , `fec_registro` = now(), `usr_registro` = usr_registro_
            where `id_direccion` = id_direccion_;

    UPDATE `rel_direcciones_proveedores` SET
    `id_direccion`=id_direccion_,
    `id_proveedor`=id_proveedor_
    WHERE `rel_direccion_proveedor`=rel_direccion_proveedores_;


            UPDATE `telefonos` SET
            `telefono` = telefono_ , `fec_registro` = now(), `usr_registro` = usr_registro_
            where `id_telefono` = id_telefono_;

   UPDATE `rel_telefonos_proveedores` SET
   `id_telefono`=id_telefono_, 
   `id_proveedor`=id_proveedor_
   WHERE `id_telefono_proveedor`=rel_telefonos_proveedores_;

           
                
			COMMIT;

/*Inicio de DELETE*/


         WHEN 'eliminar' THEN
         START TRANSACTION;

/*Inicio de DELETE en PROVEEDORES*/

        	DELETE from `proveedores` WHERE `id_proveedor`=id_proveedor_;
            
            
 
/*Inicio de DELETE en CORREO*/
           
            DELETE FROM `correos` where `id_correo`= id_correo_;
 
	    DELETE FROM `rel_correo_proveedores` WHERE `id_correo_proveedor`=rel_correo_proveedores_;
  

            DELETE FROM `direcciones` where `id_direccion` = id_direccion_;

 	   DELETE FROM `rel_direcciones_proveedores` WHERE `rel_direccion_proveedor`=rel_direccion_proveedores_;
 

            DELETE FROM `telefonos` where `id_telefono`= id_telefono_;
            
           DELETE FROM `rel_telefonos_proveedores` WHERE `id_telefono_proveedor`=rel_telefonos_proveedores_;
  
commit;
/*Inicio de DELETE en REL_CORREO_PROVEEDORES*/


/*Inicio de SELECT*/

        	WHEN 'consultar' THEN
             START TRANSACTION;

/*Inicio de SELECT en Proveedores*/

    	SELECT * FROM `PROVEEDORES` WHERE id_proveedor= id_proveedor_;

		 

/*Inicio de SELECT en correos*/       

        SELECT * FROM correos where id_correo= id_correo_;

SELECT * FROM `rel_correo_proveedores` WHERE `id_correo_proveedor`=rel_correo_proveedores_;

        SELECT * FROM direcciones where id_direccion= id_direccion_;

 SELECT * FROM `rel_direcciones_proveedores` WHERE `rel_direccion_proveedor`=rel_direccion_proveedores_;
  
        SELECT * FROM telefonos where id_telefono= id_telefono_;

SELECT * FROM `rel_telefonos_proveedores` WHERE `id_telefono_proveedor`=rel_telefonos_proveedores_;


        COMMIT;
    END CASE;
 
END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Cantidades_Producto` (IN `id_cant_productos_` BIGINT, IN `id_producto_` BIGINT, IN `cantidad_` INT(11), IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO cantidades_producto(id_producto,cantidad,fec_registro,usr_registro) VALUES (id_producto_,cantidad_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE  cantidades_producto SET
    id_producto = id_producto_,
  cantidad = cantidad_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
   id_cant_productos = id_cant_productos_;
    WHEN 'eliminar' THEN
    DELETE FROM cantidades_producto WHERE 
   id_cant_productos = id_cant_productos_;
     WHEN 'consultar' THEN
     SELECT * FROM  cantidades_producto
     WHERE   id_cant_productos = id_cant_productos_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Cargos` (IN `id_cargo_` BIGINT, IN `cargo_` VARCHAR(50), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
        WHEN 'nuevo' THEN
        	INSERT INTO cargos(cargo,fec_registro,usr_registro) 					VALUES (cargo_,NOW(),usr_registro_);
    	WHEN 'editar' THEN
            UPDATE  cargos SET
          	cargo = cargo_,
          	fec_registro = NOW(),
          	usr_registro = usr_registro_
    		WHERE id_cargo = id_cargo_;
    	WHEN 'eliminar' THEN
    		DELETE FROM cargos 
            WHERE id_cargo = id_cargo_;
     	WHEN 'consultar' THEN
     		SELECT * FROM  cargos
     		WHERE  id_cargo = id_cargo_;
     END CASE;
END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Categorias` (IN `id_categoria_` BIGINT, IN `categoria_` VARCHAR(50), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO categorias(categoria,fec_registro,usr_registro) VALUES (categoria_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE  categorias SET
  categoria = categoria_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
  id_categoria = id_categoria_;
    WHEN 'eliminar' THEN
    DELETE FROM categorias WHERE 
   id_categoria = id_categoria_;
     WHEN 'consultar' THEN
     SELECT * FROM  categorias
     WHERE  id_categoria = id_categoria_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Empresas` (IN `id_empresa_` BIGINT, IN `rtn_empresa_` INT(15), IN `nom_empresa_` VARCHAR(50), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO empresas(rtn_empresa,nom_empresa) VALUES (rtn_empresa_,nom_empresa_);
    WHEN 'editar' THEN
    UPDATE  empresas SET
   rtn_empresa =  rtn_empresa_,
   nom_empresa =  nom_empresa_
    WHERE
   id_empresa = id_empresa_;
    WHEN 'eliminar' THEN
    DELETE FROM empresas WHERE 
   id_empresa = id_empresa_;
     WHEN 'consultar' THEN
     SELECT * FROM  empresas
     WHERE   id_empresa = id_empresa_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Entidad_Banco` (IN `id_banco_` BIGINT, IN `nom_banco_` VARCHAR(30), IN `abr_banco_` VARCHAR(3), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO entidad_banco(nom_banco,abr_banco,fec_registro,usr_registro) VALUES (nom_banco_,abr_banco_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE  entidad_banco SET
 nom_banco = nom_banco_,
 abr_banco = abr_banco_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
  id_banco = id_banco_;
    WHEN 'eliminar' THEN
    DELETE FROM entidad_banco WHERE 
  id_banco = id_banco_;
     WHEN 'consultar' THEN
     SELECT * FROM  entidad_banco
     WHERE  id_banco = id_banco_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Grupos` (IN `id_grupo_` BIGINT, IN `grupo_` VARCHAR(50), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO grupos(grupo,fec_registro,usr_registro) VALUES (grupo_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE  grupos SET
  grupo = grupo_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
   id_grupo = id_grupo_;
    WHEN 'eliminar' THEN
    DELETE FROM grupos WHERE 
   id_grupo = id_grupo_;
     WHEN 'consultar' THEN
     SELECT * FROM  grupos
     WHERE  id_grupo = id_grupo_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Marcas` (IN `id_marca_` BIGINT, IN `marca_` VARCHAR(50), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO marcas(marca,fec_registro,usr_registro) VALUES (marca_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE  marcas SET
  marca = marca_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
   id_marca = id_marca_;
    WHEN 'eliminar' THEN
    DELETE FROM marcas WHERE 
    id_marca = id_marca_;
     WHEN 'consultar' THEN
     SELECT * FROM  marcas
     WHERE   id_marca = id_marca_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Regimen_Facturacion` (IN `id_regi_fact_` BIGINT, IN `cai_` VARCHAR(37), IN `cor_inic_` VARCHAR(8), IN `cor_fin_` VARCHAR(8), IN `fec_lim_emi` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO regimen_facturacion(cai,cor_inic,cor_fin,fec_lim_emi) VALUES (cai_,cor_inic_,cor_fin_,fec_lim_emi);
    WHEN 'editar' THEN
    UPDATE regimen_facturacion SET
    cai = cai_,
    cor_inic = cor_inic_,
    cor_fin = cor_fin_,
    fec_lim_emi = fec_lim_emi_
    WHERE
    id_regi_fact = id_regi_fact_;
    WHEN 'eliminar' THEN
    DELETE FROM regimen_facturacion WHERE 
     id_regi_fact = id_regi_fact_;
     WHEN 'consultar' THEN
     SELECT * FROM  regimen_facturacion
     WHERE   id_regi_fact = id_regi_fact_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Tipos_Empleado` (IN `id_tip_empleado_` BIGINT, IN `tipo_empleado_` VARCHAR(50), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO tipos_empleado(tipo_empleado,fec_registro,usr_registro) VALUES (tipo_empleado_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE  tipos_empleado SET
tipo_empleado = tipo_empleado_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
   id_tip_empleado =id_tip_empleado_;
    WHEN 'eliminar' THEN
    DELETE FROM tipos_empleado WHERE 
   id_tip_empleado =id_tip_empleado_;
     WHEN 'consultar' THEN
     SELECT * FROM  tipos_empleado
     WHERE   id_tip_empleado =id_tip_empleado_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Tipos_Impuestos` (IN `id_tip_impuestos_` BIGINT, IN `nom_isv_` VARCHAR(50), IN `porcentaje_` DECIMAL(10,0), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO tipos_impuestos(nom_isv,porcentaje,fec_registro,usr_registro) VALUES (nom_isv_,porcentaje_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE tipos_impuestos SET
  nom_isv = nom_isv_,
   porcentaje = porcentaje_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
  id_tip_impuestos = id_tip_impuestos_;
    WHEN 'eliminar' THEN
    DELETE FROM tipos_impuestos WHERE 
   id_tip_impuestos = id_tip_impuestos_;
     WHEN 'consultar' THEN
     SELECT * FROM  tipos_impuestos
     WHERE  id_tip_impuestos = id_tip_impuestos_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Tipo_Clientes` (IN `id_tip_cliente_` BIGINT, IN `tip_cliente_` VARCHAR(50), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO tipo_clientes(tip_cliente,fec_registro,usr_registro) VALUES (tip_cliente_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE  tipo_clientes SET
 tip_cliente = tip_cliente_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
  id_tip_cliente = id_tip_cliente_;
    WHEN 'eliminar' THEN
    DELETE FROM tipo_clientes WHERE 
  id_tip_cliente = id_tip_cliente_;
     WHEN 'consultar' THEN
     SELECT * FROM  tipo_clientes
     WHERE  id_tip_cliente = id_tip_cliente_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Tipo_Rol` (IN `id_rol_` BIGINT, IN `rol_` VARCHAR(50), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO tipo_rol(rol,fec_registro,usr_registro) VALUES (rol_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE tipo_rol SET
  rol = rol_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
 id_rol_ = id_rol_;
    WHEN 'eliminar' THEN
    DELETE FROM tipo_rol WHERE 
  id_rol_ = id_rol_;
     WHEN 'consultar' THEN
     SELECT * FROM  tipo_rol
     WHERE  id_rol_ = id_rol_;
     END CASE;
     END$$

CREATE DEFINER=`INPIKI2`@`%` PROCEDURE `Sp_SIUD_Unidades_Medidas` (IN `id_uni_medida_` BIGINT, IN `uni_medida_` VARCHAR(50), IN `fec_registro_` DATETIME, IN `usr_registro_` VARCHAR(30), IN `accion` VARCHAR(20))  BEGIN
    CASE accion 
    WHEN 'nuevo' THEN
    INSERT INTO unidades_medidas(uni_medida,fec_registro,usr_registro) VALUES (uni_medida_,NOW(),usr_registro_);
    WHEN 'editar' THEN
    UPDATE  unidades_medidas SET
  uni_medida = uni_medida_,
  fec_registro = NOW(),
  usr_registro = usr_registro_
    WHERE
  id_uni_medida =id_uni_medida_;
    WHEN 'eliminar' THEN
    DELETE FROM unidades_medidas WHERE 
 id_uni_medida =id_uni_medida_;
     WHEN 'consultar' THEN
     SELECT * FROM  unidades_medidas
     WHERE   id_uni_medida =id_uni_medida_;
     END CASE;
     END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` bigint(20) NOT NULL,
  `tabla_modificada` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fila_modificada` bigint(20) NOT NULL,
  `cam_modificado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registro_actual` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registro_anterior` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `accion_realizada` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usr_anterior` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `tabla_modificada`, `fila_modificada`, `cam_modificado`, `registro_actual`, `registro_anterior`, `accion_realizada`, `fec_registro`, `usr_registro`, `usr_anterior`) VALUES
(1, 'personas', 1, 'nom_persona', 'Hellen', 'Ricardo', 'Update', '2021-06-23 16:07:27', 'admin', 'Franklin'),
(2, 'personas', 2, 'nom_persona', 'Franklin', 'Hellen', 'Insert', '2021-06-16 22:37:38', 'Hellen', 'Franklin'),
(3, 'entidad_banco', 2, 'Nombre banco', 'Ficohsas', 'Ficohsa', 'UPDATE', '2021-06-08 15:54:56', 'root-kevin', 'root-kevin'),
(4, 'entidad_banco', 2, 'Abreviatura banco', 'Fch', 'Ficohsa', 'UPDATE', '2021-06-08 15:54:56', 'root-kevin', 'root-kevin'),
(5, 'Regimen_Facturacion', 1, 'CAI', '08011998222', '08011998155471', 'UPDATE', '2021-06-08 15:59:42', '', ''),
(6, 'Regimen_Facturacion', 1, 'Correlativo Inicial', '1500', '1000', 'UPDATE', '2021-06-08 15:59:42', '', ''),
(7, 'Regimen Facturacion', 1, 'Correlativo Final', '5006', '500', 'UPDATE', '2021-06-08 15:59:42', '', ''),
(8, 'Regimen Facturacion', 1, 'Fecha limite de emisión', '2021-05-19', '2021-05-25', 'UPDATE', '2021-06-08 15:59:42', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidades_producto`
--

CREATE TABLE `cantidades_producto` (
  `id_cant_productos` bigint(20) NOT NULL,
  `id_producto` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` bigint(20) NOT NULL,
  `cargo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `cargo`, `fec_registro`, `usr_registro`) VALUES
(1, 'Administrador', '2021-04-27 01:20:00', 'SUPERADMIN'),
(2, 'Vendedor', '2021-04-27 09:39:43', 'Root--PRUEBA'),
(3, 'Guardia', '2021-05-30 01:43:20', 'Franklin');

--
-- Disparadores `cargos`
--
DELIMITER $$
CREATE TRIGGER `tr_cargos_delete` AFTER DELETE ON `cargos` FOR EACH ROW INSERT INTO bitacora VALUES (null,'cargos',OLD.id_cargo,'cargo',OLD.cargo,'','DELETED',NOW(),OLD.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_cargos_insert` AFTER INSERT ON `cargos` FOR EACH ROW INSERT INTO bitacora VALUES (null,'cargos',NEW.id_cargo,'cargo',NEW.cargo,'','INSERTED',NOW(),NEW.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_cargos_update` AFTER UPDATE ON `cargos` FOR EACH ROW INSERT INTO bitacora VALUES (null,'cargos',NEW.id_cargo,'cargo',NEW.cargo,OLD.cargo,'UPDATE',NOW(),NEW.usr_registro,OLD.usr_registro)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` bigint(20) NOT NULL,
  `categoria` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `fec_registro`, `usr_registro`) VALUES
(1, 'Mujeres', '2021-04-27 09:37:26', 'Root--PRUEBA'),
(2, 'Caballeros', '2021-05-28 00:25:25', 'Franklin'),
(5, 'Mascotas', '2021-05-29 15:37:01', 'Franklin');

--
-- Disparadores `categorias`
--
DELIMITER $$
CREATE TRIGGER `tr_categoria_Update` AFTER UPDATE ON `categorias` FOR EACH ROW INSERT INTO bitacora  VALUES(null,'categorias',NEW.id_categoria,'categoria',NEW.categoria,OLD.categoria,'UPDATE',NOW(),NEW.usr_registro,OLD.usr_registro)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_categoria_delete` AFTER DELETE ON `categorias` FOR EACH ROW INSERT INTO bitacora VALUES
(null,'categorias',OLD.id_categoria,'categoria','',OLD.categoria,'DELETED',NOW(),'',OLD.usr_registro)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_categoria_insert` AFTER INSERT ON `categorias` FOR EACH ROW INSERT INTO bitacora VALUES (null,'categorias',NEW.id_categoria,'categoria',NEW.categoria,'','INSERTED',NOW(),NEW.usr_registro,'')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` bigint(20) NOT NULL,
  `id_persona` bigint(20) NOT NULL,
  `rtn_empresa` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_empresa` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `id_tip_cliente` bigint(20) NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_persona`, `rtn_empresa`, `nom_empresa`, `id_tip_cliente`, `fec_registro`, `usr_registro`) VALUES
(1, 2, '0', '-', 1, '2021-04-27 02:18:06', 'Root'),
(2, 5, '8011996654586', 'medex', 2, '2021-04-29 07:30:12', 'Root--PRUEBA'),
(3, 12, '3567854458', 'jkdwjkcwjk', 2, '2021-04-29 07:51:32', 'Root--PRUEBA'),
(4, 13, '987845', 'lenovo', 1, '2021-04-29 07:53:55', 'Root--PRUEBA'),
(9, 24, '1', 'no', 1, '2021-04-29 08:31:42', 'Root--PRUEBA'),
(10, 25, '0', '0', 1, '2021-04-29 08:35:43', 'Root--PRUEBA'),
(11, 26, '-', '-', 1, '2021-04-29 08:38:27', 'Root--PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `id_correo` bigint(20) NOT NULL,
  `correo` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`id_correo`, `correo`, `fec_registro`, `usr_registro`) VALUES
(1, 'correo@gmail.com', '2021-04-27 10:36:14', 'Root--HELLEN'),
(2, 'solaris@gmail.com', '2021-06-07 02:19:12', 'Root-Kevin'),
(3, 'consumidor@gmail.com', '2021-04-27 10:20:00', 'Root--MAGM'),
(4, 'hellen@gmail.com', '2021-05-31 01:19:06', 'HELLEN'),
(5, 'marioalexgarciamont@yahoo.com', '2021-04-29 07:24:42', 'Root--PRUEBA'),
(6, 'kevin@yahoo.com', '2021-04-29 07:30:12', 'Root--PRUEBA'),
(7, 'luishot69@gmail.com', '2021-04-29 07:31:59', 'Root--PRUEBA'),
(8, 'vwdvw@gmail.com', '2021-04-29 07:41:59', 'Root--PRUEBA'),
(9, 'cdwvwdv@vjdbev.com', '2021-04-29 07:43:21', 'Root--PRUEBA'),
(10, 'kavin.gay@gmail.com', '2021-04-29 07:49:41', 'Root--PRUEBA'),
(11, 'gay@gmail.com', '2021-04-29 07:51:32', 'Root--PRUEBA'),
(12, 'gay22@gmail.com', '2021-04-29 07:53:55', 'Root--PRUEBA'),
(13, 'kevingay@gmail.com', '2021-04-29 07:57:01', 'Root--PRUEBA'),
(14, 'hjjbcwd@yahoo.com', '2021-04-29 07:58:31', 'Root--PRUEBA'),
(15, 'gay@yahoo.com', '2021-04-29 08:00:04', 'Root--PRUEBA'),
(17, 'kevin@hotmail.com', '2021-04-29 08:02:59', 'Root--PRUEBA'),
(18, 'moran@gmail.com', '2021-04-29 08:04:56', 'Root--PRUEBA'),
(19, 'anuel@yahoo.com', '2021-04-29 08:09:05', 'Root--PRUEBA'),
(20, 'rene@yahoo.com', '2021-04-29 08:11:02', 'Root--PRUEBA'),
(21, 'jose@gmail.com', '2021-04-29 08:20:36', 'Root--PRUEBA'),
(22, 'vedve@gmail.com', '2021-04-29 08:29:26', 'Root--PRUEBA'),
(23, 'mario@gmail.com', '2021-04-29 08:31:42', 'Root--PRUEBA'),
(24, 'kmaze@hotmail.com', '2021-04-29 08:35:43', 'Root--PRUEBA'),
(25, 'hellen.amordekevin@gmail.com', '2021-04-29 08:38:27', 'Root--PRUEBA'),
(26, 'edwin@gmail.com', '2021-05-30 03:49:48', 'Root--HELLEN'),
(27, 'ARMANDO@GMAILCOM', '2021-05-30 03:59:49', 'Root--HELLEN'),
(30, 'liam7@gmail.com', '2021-05-30 02:59:39', 'HELLEN'),
(31, 'liam8@gmail.com', '2021-05-30 03:09:50', 'HELLEN'),
(32, 'gkarla@gmail.com', '2021-05-30 20:48:45', 'HELLEN'),
(33, 'shjd@gos.com', '2012-05-30 00:00:00', 'hellen'),
(35, 'suyd@gs.com', '2012-05-30 00:00:00', 'hellen'),
(36, 'gjoa7@gmail.com', '2021-05-30 21:18:29', 'HELLEN'),
(39, 'gonzap@gmail.com', '2021-06-01 14:20:47', 'HELLEN'),
(40, 'Orlando4@gmail.com', '2021-06-01 15:20:49', 'HELLEN'),
(41, 'fran@gmail.com', '2021-06-01 15:27:17', 'HELLEN'),
(42, 'lewis.ham@gmail.com', '2021-06-04 04:38:35', 'Root--Kevin'),
(44, 'kmaze97@gmail.com', '2021-06-07 00:34:05', 'Root-Kevin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_exonerados`
--

CREATE TABLE `datos_exonerados` (
  `id_dat_exo` bigint(20) NOT NULL,
  `id_factura` bigint(20) NOT NULL,
  `num_ord_com` int(11) NOT NULL,
  `num_cons_regi_exo` int(11) NOT NULL,
  `num_regi_sag` int(11) NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_impuestos`
--

CREATE TABLE `detalles_impuestos` (
  `id_det_imp` bigint(20) NOT NULL,
  `id_det_fact` bigint(20) NOT NULL,
  `importe_gravado_15` float NOT NULL,
  `importe_gravado_18` float NOT NULL,
  `importe_exento` float NOT NULL,
  `importe_exonerado` float NOT NULL,
  `isv_15` float NOT NULL,
  `isv_18` float NOT NULL,
  `total_factura` float NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_det_fact` bigint(20) NOT NULL,
  `id_factura` bigint(20) NOT NULL,
  `id_producto` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` float DEFAULT NULL,
  `precio_venta` decimal(10,0) NOT NULL,
  `fec_registro` datetime DEFAULT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura_temp`
--

CREATE TABLE `detalle_factura_temp` (
  `id` bigint(20) NOT NULL,
  `token_user` varchar(50) NOT NULL,
  `id_producto` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `precio_venta` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` bigint(20) NOT NULL,
  `direccion` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `direccion`, `fec_registro`, `usr_registro`) VALUES
(1, 'La casa #3', '2021-04-27 10:36:14', 'Root--HELLEN'),
(2, 'La Casa #2', '2021-06-07 02:19:12', 'Root-Kevin'),
(3, 'La casa #2', '2021-05-31 01:19:06', 'HELLEN'),
(4, 'res. villa foresta', '2021-05-30 03:49:48', 'Root--HELLEN'),
(5, 'COL. RYETERW', '2021-05-30 03:59:49', 'Root--HELLEN'),
(6, 'Col Las Brisas Tegucigalpa hhn', '2021-05-30 02:59:39', 'HELLEN'),
(7, 'Col Las Brisas Tegucigalpa gg', '2021-05-30 03:09:50', 'HELLEN'),
(8, 'Col Las Brisas Tegucigalpa hh', '2021-05-30 20:48:45', 'HELLEN'),
(9, 'sd', '2012-05-30 00:00:00', 'hellen'),
(10, 'ajydbs', '2012-05-30 00:00:00', 'hellen'),
(11, 'Col Las Brisas Tegucigalpa hhi', '2021-05-30 21:18:29', 'HELLEN'),
(14, 'Col Las Brisas Tegucigalpa', '2021-06-01 14:20:47', 'HELLEN'),
(15, 'Col Las Vegas', '2021-06-01 15:20:49', 'HELLEN'),
(16, 'Col Las Brisas Tegucigalpa', '2021-06-01 15:27:17', 'HELLEN'),
(18, 'prados universitarios', '2021-06-07 00:34:05', 'Root-Kevin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` bigint(20) NOT NULL,
  `id_persona` bigint(20) NOT NULL,
  `sal_empleado` double NOT NULL,
  `id_cargo` bigint(20) NOT NULL,
  `id_tip_empleado` bigint(20) NOT NULL,
  `fec_ingreso` date DEFAULT NULL,
  `fec_salida` date DEFAULT NULL,
  `motivoSalida` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `est_empleado` tinyint(1) NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_persona`, `sal_empleado`, `id_cargo`, `id_tip_empleado`, `fec_ingreso`, `fec_salida`, `motivoSalida`, `est_empleado`, `fec_registro`, `usr_registro`) VALUES
(3, 1, 10000, 1, 1, NULL, NULL, '', 1, '2021-04-27 01:25:27', 'SUPERADMIN'),
(4, 3, 11854, 1, 1, '2021-04-27', '2021-04-30', '', 1, '2021-05-31 01:19:06', 'HELLEN'),
(5, 27, 55555, 1, 1, '2021-05-29', '2021-05-30', '', 1, '2021-05-30 03:49:48', 'Root--HELLEN'),
(6, 28, 1111, 1, 1, '2021-05-29', '2021-05-29', '', 2, '2021-05-30 03:59:49', 'Root--HELLEN'),
(7, 39, 5906, 1, 1, '2012-05-30', '2012-05-30', '', 1, '2012-05-30 00:00:00', 'hellen'),
(8, 40, 9000, 1, 1, '2021-05-07', '2021-04-28', '', 1, '2021-05-30 21:18:29', 'HELLEN'),
(11, 43, 15000, 2, 1, '2021-06-05', '2021-06-12', '', 1, '2021-06-01 14:20:47', 'HELLEN'),
(12, 45, 9000, 2, 1, '2021-06-03', '2021-06-03', '', 1, '2021-06-01 15:27:17', 'HELLEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` bigint(20) NOT NULL,
  `rtn_empresa` int(11) NOT NULL,
  `nom_empresa` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `rtn_empresa`, `nom_empresa`) VALUES
(3, 801257411, 'Hush'),
(5, 15204530, 'Nike');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad_banco`
--

CREATE TABLE `entidad_banco` (
  `id_banco` bigint(20) NOT NULL,
  `nom_banco` varchar(30) CHARACTER SET latin1 NOT NULL,
  `abr_banco` varchar(8) CHARACTER SET latin1 NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entidad_banco`
--

INSERT INTO `entidad_banco` (`id_banco`, `nom_banco`, `abr_banco`, `fec_registro`, `usr_registro`) VALUES
(1, 'Banco Atlantida', 'ATL', '2021-04-27 09:41:18', 'Root--PRUEBA'),
(2, 'Ficohsas', 'Fch', '2021-06-23 10:33:52', 'root-kevin');

--
-- Disparadores `entidad_banco`
--
DELIMITER $$
CREATE TRIGGER `tr_banco_update` AFTER UPDATE ON `entidad_banco` FOR EACH ROW IF (new.nom_banco <> old.nom_banco) 
THEN 
INSERT INTO bitacora  VALUES(null,'entidad_banco',NEW.id_banco,'Nombre banco',new.nom_banco,old.nom_banco,'UPDATE',now(),new.usr_registro,old.usr_registro);
IF (new.abr_banco <> old.abr_banco)
THEN 
INSERT INTO bitacora  VALUES(null,'entidad_banco',NEW.id_banco,'Abreviatura banco',new.abr_banco,old.abr_banco,'UPDATE',now(),new.usr_registro,old.usr_registro);
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` bigint(20) NOT NULL,
  `fec_factura` datetime NOT NULL DEFAULT current_timestamp(),
  `id_cliente` bigint(20) NOT NULL,
  `totalFactura` decimal(10,0) DEFAULT NULL,
  `User_registro` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `fec_factura`, `id_cliente`, `totalFactura`, `User_registro`) VALUES
(3, '2021-04-27 04:25:17', 1, '2000', 1),
(4, '2021-04-27 13:21:19', 1, '4200', 1),
(5, '2021-04-28 15:06:55', 1, '1150', 2),
(6, '2021-04-28 15:50:48', 1, '1610', 1),
(7, '2021-04-28 15:52:48', 1, '1150', 1),
(8, '2021-04-29 04:02:07', 1, '10350', 1),
(9, '2021-04-29 04:27:03', 1, '4140', 2),
(10, '2021-04-29 04:27:49', 1, '1150', 2),
(11, '2021-04-29 04:35:37', 1, '2300', 1),
(12, '2021-04-29 16:37:32', 1, '6900', 1),
(13, '2021-04-29 17:46:54', 1, NULL, 1),
(14, '2021-04-29 17:47:22', 1, NULL, 1),
(15, '2021-04-29 17:49:08', 1, NULL, 1),
(16, '2021-04-29 17:51:24', 1, NULL, 1),
(17, '2021-04-29 17:51:40', 1, NULL, 1),
(18, '2021-04-29 17:51:48', 1, NULL, 1),
(19, '2021-04-29 17:54:35', 1, '3105', 1),
(20, '2021-04-29 18:03:41', 1, '2070', 1),
(21, '2021-04-29 18:05:34', 1, '2070', 1),
(22, '2021-04-29 18:15:02', 1, '2070', 1),
(23, '2021-04-29 18:16:51', 1, '2070', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gdfgdf`
--

CREATE TABLE `gdfgdf` (
  `trt` int(11) NOT NULL,
  `trtt` int(11) NOT NULL,
  `trfsd` int(11) NOT NULL,
  `rtsdf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` bigint(20) NOT NULL,
  `grupo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `grupo`, `fec_registro`, `usr_registro`) VALUES
(2, 'Verano', '2021-05-28 00:51:05', 'Franklin'),
(3, 'Primavera', '2021-05-28 00:52:31', 'Franklin'),
(4, 'Otoño', '2021-05-28 00:57:00', 'Franklin'),
(5, 'Invierno', '2021-05-28 22:38:21', 'Franklin'),
(6, 'Hogar', '2021-05-29 19:15:34', 'Franklin'),
(7, 'Tecnologia', '2021-05-29 22:34:09', 'Franklin'),
(8, 'Salud', '2021-05-29 22:37:55', 'Franklin');

--
-- Disparadores `grupos`
--
DELIMITER $$
CREATE TRIGGER `tr_grupos_delete` AFTER DELETE ON `grupos` FOR EACH ROW INSERT INTO bitacora VALUES (null,'grupos',OLD.id_grupo,'grupo',OLD.grupo,'','DELETED',NOW(),OLD.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_grupos_insert` AFTER INSERT ON `grupos` FOR EACH ROW INSERT INTO bitacora VALUES (null,'grupos',NEW.id_grupo,'grupo',NEW.grupo,'','INSERTED',NOW(),NEW.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_grupos_update` AFTER UPDATE ON `grupos` FOR EACH ROW INSERT INTO bitacora VALUES (null,'grupos',NEW.id_grupo,'grupo',NEW.grupo,OLD.grupo,'UPDATE',NOW(),NEW.usr_registro,OLD.usr_registro)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `id_inventario` bigint(20) NOT NULL,
  `id_producto` bigint(20) NOT NULL,
  `concepto` varchar(250) CHARACTER SET latin1 NOT NULL,
  `entradas` int(11) NOT NULL,
  `salidas` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`id_inventario`, `id_producto`, `concepto`, `entradas`, `salidas`, `cantidad`, `fec_registro`, `usr_registro`) VALUES
(4, 4, 'compra de mercaderia', 200, 0, 200, '2021-06-04 05:23:39', 'Root--PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` bigint(20) NOT NULL,
  `marca` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`, `fec_registro`, `usr_registro`) VALUES
(1, 'Nike', '2021-04-27 09:39:15', 'Root--PRUEBA'),
(2, 'Adidas', '2021-05-26 22:38:18', 'Root--PRUEBA'),
(5, 'Huawei', '2021-05-27 23:58:46', 'Franklin'),
(7, 'Hush', '2021-05-28 22:35:51', 'Franklin'),
(8, 'Gucci', '2021-05-29 16:20:29', 'Franklin'),
(9, 'HyK', '2021-05-30 22:24:29', 'Franklin');

--
-- Disparadores `marcas`
--
DELIMITER $$
CREATE TRIGGER `tr_marca_delete` AFTER DELETE ON `marcas` FOR EACH ROW INSERT INTO bitacora VALUES (null,'marcas',OLD.id_marca,'marca',OLD.marca,'','DELETED',NOW(),OLD.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_marca_insert` AFTER INSERT ON `marcas` FOR EACH ROW INSERT INTO bitacora VALUES (null,'marcas',NEW.id_marca,'marca',NEW.marca,'','INSERTED',NOW(),NEW.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_marca_update` AFTER UPDATE ON `marcas` FOR EACH ROW INSERT INTO bitacora VALUES (null,'marcas',NEW.id_marca,'marca',NEW.marca,OLD.marca,'UPDATE',NOW(),NEW.usr_registro,OLD.usr_registro)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `Idmodulo` bigint(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`Idmodulo`, `Nombre`, `Descripcion`, `Estatus`) VALUES
(1, 'Inicio', 'Inicio al sistema segun rol', 1),
(2, 'Facturacion', 'Facturacion Crear ver Editar la Factura', 1),
(3, 'Empleados', 'Empleados Crear Ver Editar el empleado', 1),
(4, 'Proveedores', 'Proveedores crear editar ver el proveedor', 1),
(5, 'Clientes', 'Clientes Crear Editar Ver el cliente', 1),
(6, 'Producto', 'Producto Crear Editar Ver el producto', 1),
(7, 'Configuracion', 'Crear ver editar Las tablas de configuracion', 1),
(8, 'Repositorio', 'dsadsads', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `Idpermiso` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL,
  `idmodulo` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`Idpermiso`, `idrol`, `idmodulo`, `r`, `w`, `u`, `d`) VALUES
(88, 1, 1, 1, 1, 1, 1),
(89, 1, 2, 1, 1, 1, 1),
(90, 1, 3, 1, 1, 1, 1),
(91, 1, 4, 1, 1, 1, 1),
(92, 1, 5, 1, 1, 1, 1),
(93, 1, 6, 1, 1, 1, 1),
(94, 1, 7, 1, 1, 1, 1),
(95, 1, 8, 1, 1, 1, 1),
(200, 2, 1, 1, 1, 1, 1),
(201, 2, 2, 1, 1, 1, 1),
(202, 2, 3, 1, 1, 1, 1),
(203, 2, 4, 1, 1, 1, 1),
(204, 2, 5, 1, 1, 1, 1),
(205, 2, 6, 1, 1, 1, 1),
(206, 2, 7, 1, 1, 1, 1),
(207, 2, 8, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` bigint(20) NOT NULL,
  `num_id_persona` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nom_persona` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ape_persona` varchar(50) CHARACTER SET latin1 NOT NULL,
  `eda_persona` int(11) NOT NULL,
  `fec_na_persona` date DEFAULT NULL,
  `gen_persona` varchar(15) CHARACTER SET latin1 NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='TABLA QUE ALMACENA DATOS DE PERSONA';

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `num_id_persona`, `nom_persona`, `ape_persona`, `eda_persona`, `fec_na_persona`, `gen_persona`, `fec_registro`, `usr_registro`) VALUES
(1, '0808200012345', 'Ricardo David', 'Peralta', 20, '2020-01-01', 'Hombre', '2021-04-27 10:36:14', 'Root--HELLEN'),
(2, '0', 'Consumidor ', 'Final', 5, '2020-01-01', 'otr', '2021-04-27 10:20:00', 'Root--MAGM'),
(3, '123456789', 'Equipo', 'Coevaluador', 20, '2021-04-27', 'Femenino', '2021-05-31 01:19:06', 'HELLEN'),
(4, '0801199706871', 'Alexander', 'Garcia', 24, '1997-03-31', 'masc', '2021-04-29 07:24:42', 'Root--PRUEBA'),
(5, '801199665440', 'kevin ', 'zelaya', 24, '1996-12-24', 'masc', '2021-04-29 07:30:12', 'Root--PRUEBA'),
(6, '0801199569542', 'Luis', 'Moran', 32, '1995-01-01', 'masc', '2021-04-29 07:31:59', 'Root--PRUEBA'),
(7, '354354654', 'vevewve', 'vsvsdvs', 32, '1996-11-03', 'otr', '2021-04-29 07:41:59', 'Root--PRUEBA'),
(8, '978754564', 'mkvdjkkjb', 'jkcwjkdkbj', 23, '1996-11-26', 'otr', '2021-04-29 07:43:21', 'Root--PRUEBA'),
(9, '32659878', 'kavin', 'amaya', 36, '1996-12-12', 'otr', '2021-04-29 07:49:41', 'Root--PRUEBA'),
(12, '3265987754', 'jkwsbjkfwkj', 'meonwf', 89, '1995-12-12', 'otr', '2021-04-29 07:51:32', 'Root--PRUEBA'),
(13, '0232545', 'pojwff', 'vcwbdw', 78, '1996-12-15', 'otr', '2021-04-29 07:53:55', 'Root--PRUEBA'),
(14, '032565', 'pjjkknc', 'qwesasd', 14, '1996-07-29', 'otr', '2021-04-29 07:57:01', 'Root--PRUEBA'),
(15, '0325670', 'poiuwq', 'qwertsdf', 36, '1995-08-23', 'otr', '2021-04-29 07:58:31', 'Root--PRUEBA'),
(16, '0265887', 'ertes', 'mkdw', 36, '1995-12-31', 'otr', '2021-04-29 08:00:04', 'Root--PRUEBA'),
(17, '3265789', 'mjiuyg', 'poiuy', 15, '2002-12-31', 'otr', '2021-04-29 08:00:54', 'Root--PRUEBA'),
(18, '0254736', 'mnvcxz', 'polkijc', 23, '1985-12-31', 'otr', '2021-04-29 08:02:59', 'Root--PRUEBA'),
(19, '0326549', 'azsxdcvfv', 'hnbfiqwe', 36, '1997-12-31', 'masc', '2021-04-29 08:04:56', 'Root--PRUEBA'),
(20, '23548201', 'sony', 'iphone', 36, '1981-12-31', 'masc', '2021-04-29 08:09:05', 'Root--PRUEBA'),
(21, '02365', 'rene', 'zuniga', 23, '1995-12-31', 'masc', '2021-04-29 08:11:02', 'Root--PRUEBA'),
(22, '3205', 'jose', 'pineda', 23, '1997-12-25', 'masc', '2021-04-29 08:20:36', 'Root--PRUEBA'),
(23, '987', 'lkkhg', 'qreca', 32, '1995-12-31', 'otr', '2021-04-29 08:29:26', 'Root--PRUEBA'),
(24, '87965', 'kjsnckasbcjk', 'hvcjhcwskc', 23, '1997-12-31', 'otr', '2021-04-29 08:31:42', 'Root--PRUEBA'),
(25, '0801199923456', 'kevin ', 'zela', 77, '2021-11-11', 'masc', '2021-04-29 08:35:43', 'Root--PRUEBA'),
(26, '080199696450', 'hellen amor', 'de kevin', 36, '1996-12-31', 'fem', '2021-04-29 08:38:27', 'Root--PRUEBA'),
(27, '2821199414321', 'EDWIN', 'ACOSTA', 27, '2021-06-16', 'Masculino', '2021-05-30 03:49:48', 'Root--HELLEN'),
(28, '12345867465', 'ARMANDO', 'LOPEZ', 25, '2021-05-29', 'Masculino', '2021-05-30 03:59:49', 'Root--HELLEN'),
(29, '181119999876', 'EDWIN', 'ACOSTA', 30, '2021-05-29', 'Masculino', '2021-05-30 04:13:16', 'Root--HELLEN'),
(31, '987652341', 'EDWIN', 'ACOSTA', 20, '2021-05-28', 'Masculino', '2021-05-30 05:00:53', 'Root--HELLEN'),
(32, '0801-2002-29376', 'Liam', 'hakja', 39, '2021-04-28', 'Masculino', '2021-05-30 02:59:39', 'HELLEN'),
(33, '0801-2002-29377', 'jared', 'bll', 78, '2021-05-13', 'Femenino', '2021-05-30 03:09:50', 'HELLEN'),
(34, '0987-2002-29382', 'Karla', 'hsj', 67, '2021-05-13', 'Femenino', '2021-05-30 20:48:45', 'HELLEN'),
(35, '0801-2342-23452', 'Fer', 'ado', 34, '2000-04-23', 'm', '2012-05-30 00:00:00', 'hellen'),
(37, '0808-2342-23452', 'Fer', 'ado', 34, '2000-04-23', 'm', '2012-05-30 00:00:00', 'hellen'),
(39, '0808-2342-00000', 'Fer', 'ado', 34, '2000-04-23', 'm', '2012-05-30 00:00:00', 'hellen'),
(40, '0806-3674-11111', 'joselin', 'Valle', 67, '2021-05-13', 'Femenino', '2021-05-30 21:18:29', 'HELLEN'),
(43, '0801-1997-37482', 'Paola', 'Gonzalez', 56, '2021-06-04', 'Femenino', '2021-06-01 14:20:47', 'HELLEN'),
(44, '0801199823451', 'Orlando', 'Sandrez', 23, '2021-05-31', 'Masculino', '2021-06-01 15:20:49', 'HELLEN'),
(45, '243526656789', 'Orlando', 'pavon', 76, '2021-06-11', 'Masculino', '2021-06-01 15:27:17', 'HELLEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_seguridad`
--

CREATE TABLE `preguntas_seguridad` (
  `id_preg_seg` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `preguntas` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas_seguridad`
--

INSERT INTO `preguntas_seguridad` (`id_preg_seg`, `id_user`, `preguntas`) VALUES
(4, 1, '¿Color favorito?'),
(5, 1, 'Casa'),
(6, 3, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` bigint(20) NOT NULL,
  `id_proveedor` bigint(20) NOT NULL,
  `id_marca` bigint(20) NOT NULL,
  `id_categoria` bigint(20) NOT NULL,
  `id_grupo` bigint(20) NOT NULL,
  `id_tip_impuesto` bigint(20) NOT NULL,
  `id_uni_medida` bigint(20) NOT NULL,
  `nom_producto` varchar(50) CHARACTER SET latin1 NOT NULL,
  `des_producto` varchar(250) CHARACTER SET latin1 NOT NULL,
  `pre_compra` float NOT NULL,
  `pre_venta` float NOT NULL,
  `pre_reventa` float NOT NULL,
  `sto_minimo` int(11) NOT NULL,
  `sto_maximo` int(11) NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_proveedor`, `id_marca`, `id_categoria`, `id_grupo`, `id_tip_impuesto`, `id_uni_medida`, `nom_producto`, `des_producto`, `pre_compra`, `pre_venta`, `pre_reventa`, `sto_minimo`, `sto_maximo`, `fec_registro`, `usr_registro`) VALUES
(4, 1, 2, 2, 5, 1, 1, 'tenis nike', 'color azul', 300, 400, 460, 10, 30, '2021-06-04 05:23:39', 'Root--PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` bigint(20) NOT NULL,
  `rtn_empresa` bigint(20) DEFAULT NULL,
  `nom_empresa` varchar(50) CHARACTER SET latin1 NOT NULL,
  `con_empresa` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_banco` bigint(20) NOT NULL,
  `num_cuenta` bigint(20) NOT NULL,
  `nacionalidad` varchar(30) CHARACTER SET latin1 NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `rtn_empresa`, `nom_empresa`, `con_empresa`, `id_banco`, `num_cuenta`, `nacionalidad`, `fec_registro`, `usr_registro`) VALUES
(1, 8011999230531, 'Solaris de Honduras #4', 'Kevin amaya', 2, 1020200102000000, 'Estadounidense', '2021-06-07 02:19:12', 'Root-Kevin'),
(2, NULL, 'mercedes', 'lewis hamilton', 1, 20161005688, 'otra', '2021-06-04 04:38:35', 'Root--Kevin'),
(4, 8011999234549, 'lotus', 'kevin garcia', 1, 2014567434565, 'Hondureño', '2021-06-07 00:34:05', 'Root-Kevin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regimen_facturacion`
--

CREATE TABLE `regimen_facturacion` (
  `id_regi_fact` bigint(20) NOT NULL,
  `cai` varchar(37) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cor_inic` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cor_fin` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_lim_emi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regimen_facturacion`
--

INSERT INTO `regimen_facturacion` (`id_regi_fact`, `cai`, `cor_inic`, `cor_fin`, `fec_lim_emi`) VALUES
(1, '08011998222', '1500', '5006', '2021-05-19');

--
-- Disparadores `regimen_facturacion`
--
DELIMITER $$
CREATE TRIGGER `tr_regimen_update` AFTER UPDATE ON `regimen_facturacion` FOR EACH ROW IF (new.cai <> old.cai) 
THEN 
INSERT INTO bitacora  VALUES(null,'Regimen_Facturacion',NEW.id_regi_fact,'CAI',new.cai,old.cai,'UPDATE',now(),'','');

IF (new.cor_inic <> old.cor_inic)
THEN 
INSERT INTO bitacora  VALUES(null,'Regimen_Facturacion',NEW.id_regi_fact,'Correlativo Inicial',new.cor_inic,old.cor_inic,'UPDATE',now(),'','');

IF (new.cor_fin <> old.cor_fin) 
THEN 
INSERT INTO bitacora  VALUES(null,'Regimen Facturacion',NEW.id_regi_fact,'Correlativo Final',new.cor_fin,old.cor_fin,'UPDATE',now(),'','');

IF (new.fec_lim_emi <> old.fec_lim_emi)
THEN 
INSERT INTO bitacora  VALUES(null,'Regimen Facturacion',NEW.id_regi_fact,'Fecha limite de emisión',new.fec_lim_emi,old.fec_lim_emi,'UPDATE',now(),'','');
END IF;
END IF;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_correos_persona`
--

CREATE TABLE `rel_correos_persona` (
  `rel_correo_persona` bigint(20) NOT NULL,
  `id_correo` bigint(20) NOT NULL,
  `id_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rel_correos_persona`
--

INSERT INTO `rel_correos_persona` (`rel_correo_persona`, `id_correo`, `id_persona`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 3),
(4, 5, 4),
(5, 6, 5),
(6, 7, 6),
(7, 8, 7),
(8, 9, 8),
(9, 10, 9),
(10, 11, 12),
(11, 12, 13),
(12, 13, 14),
(13, 14, 15),
(14, 15, 16),
(15, 17, 18),
(16, 18, 19),
(17, 19, 20),
(18, 20, 21),
(19, 21, 22),
(20, 22, 23),
(21, 23, 24),
(22, 24, 25),
(23, 25, 26),
(24, 26, 27),
(25, 27, 28),
(26, 30, 32),
(27, 31, 33),
(28, 32, 34),
(29, 33, 35),
(30, 35, 39),
(31, 36, 40),
(34, 39, 43),
(35, 40, 44),
(36, 41, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_correo_proveedores`
--

CREATE TABLE `rel_correo_proveedores` (
  `id_correo_proveedor` bigint(20) NOT NULL,
  `id_correo` bigint(20) NOT NULL,
  `id_proveedor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rel_correo_proveedores`
--

INSERT INTO `rel_correo_proveedores` (`id_correo_proveedor`, `id_correo`, `id_proveedor`) VALUES
(1, 2, 1),
(2, 42, 2),
(4, 44, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_direcciones_persona`
--

CREATE TABLE `rel_direcciones_persona` (
  `rel_direccion_persona` bigint(20) NOT NULL,
  `id_direccion` bigint(20) NOT NULL,
  `id_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rel_direcciones_persona`
--

INSERT INTO `rel_direcciones_persona` (`rel_direccion_persona`, `id_direccion`, `id_persona`) VALUES
(1, 1, 1),
(2, 3, 3),
(3, 4, 27),
(4, 5, 28),
(5, 6, 32),
(6, 7, 33),
(7, 8, 34),
(8, 9, 35),
(9, 10, 39),
(10, 11, 40),
(13, 14, 43),
(14, 15, 44),
(15, 16, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_direcciones_proveedores`
--

CREATE TABLE `rel_direcciones_proveedores` (
  `rel_direccion_proveedor` bigint(20) NOT NULL,
  `id_direccion` bigint(20) NOT NULL,
  `id_proveedor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rel_direcciones_proveedores`
--

INSERT INTO `rel_direcciones_proveedores` (`rel_direccion_proveedor`, `id_direccion`, `id_proveedor`) VALUES
(1, 2, 1),
(3, 18, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_telefonos_persona`
--

CREATE TABLE `rel_telefonos_persona` (
  `rel_telefono_persona` bigint(20) NOT NULL,
  `id_telefono` bigint(20) NOT NULL,
  `id_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rel_telefonos_persona`
--

INSERT INTO `rel_telefonos_persona` (`rel_telefono_persona`, `id_telefono`, `id_persona`) VALUES
(38, 1, 1),
(39, 3, 2),
(40, 4, 3),
(41, 5, 4),
(42, 6, 5),
(43, 7, 6),
(44, 8, 7),
(45, 9, 8),
(46, 10, 9),
(47, 11, 12),
(48, 12, 13),
(49, 13, 14),
(50, 14, 15),
(51, 15, 16),
(52, 16, 18),
(53, 17, 19),
(54, 18, 20),
(55, 19, 21),
(56, 20, 22),
(57, 21, 23),
(58, 22, 24),
(59, 23, 25),
(60, 24, 26),
(61, 25, 27),
(62, 26, 28),
(63, 27, 32),
(64, 28, 33),
(65, 29, 34),
(66, 30, 35),
(67, 31, 39),
(68, 32, 40),
(71, 35, 43),
(72, 36, 44),
(73, 37, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_telefonos_proveedores`
--

CREATE TABLE `rel_telefonos_proveedores` (
  `id_telefono_proveedor` bigint(20) NOT NULL,
  `id_telefono` bigint(20) NOT NULL,
  `id_proveedor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rel_telefonos_proveedores`
--

INSERT INTO `rel_telefonos_proveedores` (`id_telefono_proveedor`, `id_telefono`, `id_proveedor`) VALUES
(21, 2, 1),
(23, 39, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_seguridad`
--

CREATE TABLE `respuestas_seguridad` (
  `id_resp_seg` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_preg_seg` bigint(20) NOT NULL,
  `respuesta` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas_seguridad`
--

INSERT INTO `respuestas_seguridad` (`id_resp_seg`, `id_usuario`, `id_preg_seg`, `respuesta`) VALUES
(4, 1, 4, 'Azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id_telefono` bigint(20) NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id_telefono`, `telefono`, `fec_registro`, `usr_registro`) VALUES
(1, '9999-9999', '2021-04-27 10:36:14', 'Root--HELLEN'),
(2, '33333334', '2021-06-07 02:19:12', 'Root-Kevin'),
(3, '99999999', '2021-04-27 10:14:04', 'Root--PRUEBA'),
(4, '90909090', '2021-05-31 01:19:06', 'HELLEN'),
(5, '96471574', '2021-04-29 07:24:42', 'Root--PRUEBA'),
(6, '96000102', '2021-04-29 07:30:12', 'Root--PRUEBA'),
(7, '32125465', '2021-04-29 07:31:59', 'Root--PRUEBA'),
(8, '98784521', '2021-04-29 07:41:59', 'Root--PRUEBA'),
(9, '32654587', '2021-04-29 07:43:21', 'Root--PRUEBA'),
(10, '96458745', '2021-04-29 07:49:41', 'Root--PRUEBA'),
(11, '36458745', '2021-04-29 07:51:32', 'Root--PRUEBA'),
(12, '32120200', '2021-04-29 07:53:55', 'Root--PRUEBA'),
(13, '32650200', '2021-04-29 07:57:01', 'Root--PRUEBA'),
(14, '36144758', '2021-04-29 07:58:31', 'Root--PRUEBA'),
(15, '31020000', '2021-04-29 08:00:04', 'Root--PRUEBA'),
(16, '32010200', '2021-04-29 08:02:59', 'Root--PRUEBA'),
(17, '87141200', '2021-04-29 08:04:56', 'Root--PRUEBA'),
(18, '87450000', '2021-04-29 08:09:05', 'Root--PRUEBA'),
(19, '85254631', '2021-04-29 08:11:02', 'Root--PRUEBA'),
(20, '88000000', '2021-04-29 08:20:36', 'Root--PRUEBA'),
(21, '32020000', '2021-04-29 08:29:26', 'Root--PRUEBA'),
(22, '36000001', '2021-04-29 08:31:42', 'Root--PRUEBA'),
(23, '77889988', '2021-04-29 08:35:43', 'Root--PRUEBA'),
(24, '96540222', '2021-04-29 08:38:27', 'Root--PRUEBA'),
(25, '98795219', '2021-05-30 03:49:48', 'Root--HELLEN'),
(26, '474652765', '2021-05-30 03:59:49', 'Root--HELLEN'),
(27, '23456755', '2021-05-30 02:59:39', 'HELLEN'),
(28, '43783256', '2021-05-30 03:09:50', 'HELLEN'),
(29, '54345678', '2021-05-30 20:48:45', 'HELLEN'),
(30, '6578-2345', '2012-05-30 00:00:00', 'hellen'),
(31, '0578-0000', '2012-05-30 00:00:00', 'hellen'),
(32, '8787-9999', '2021-05-30 21:18:29', 'HELLEN'),
(35, '3182-3542', '2021-06-01 14:20:47', 'HELLEN'),
(36, '12374635', '2021-06-01 15:20:49', 'HELLEN'),
(37, '6543218', '2021-06-01 15:27:17', 'HELLEN'),
(39, '88778877', '2021-06-07 00:34:05', 'Root-Kevin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_empleado`
--

CREATE TABLE `tipos_empleado` (
  `id_tip_empleado` bigint(20) NOT NULL,
  `tipo_empleado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_empleado`
--

INSERT INTO `tipos_empleado` (`id_tip_empleado`, `tipo_empleado`, `fec_registro`, `usr_registro`) VALUES
(1, 'Permanente', '2021-04-27 01:27:26', 'SUPERADMIN'),
(2, 'Por Hora', '2021-04-27 09:40:17', 'Root--PRUEBA'),
(3, 'Temporal', '2021-05-30 02:15:52', 'Franklin');

--
-- Disparadores `tipos_empleado`
--
DELIMITER $$
CREATE TRIGGER `tr_tip_empleado_Delete` AFTER DELETE ON `tipos_empleado` FOR EACH ROW INSERT INTO bitacora VALUES (null,'tipos_empleado',OLD.id_tip_empleado,'tipo_empleado',OLD.tipo_empleado,'','DELETED',NOW(),OLD.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_tip_empleado_Insert` AFTER INSERT ON `tipos_empleado` FOR EACH ROW INSERT INTO bitacora VALUES (null,'tipos_empleados',NEW.id_tip_empleado,'tipo_empleado',NEW.tipo_empleado,'','INSERTED',NOW(),NEW.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_tip_empleado_Update` AFTER UPDATE ON `tipos_empleado` FOR EACH ROW INSERT INTO bitacora VALUES (null,'tipos_empleado',NEW.id_tip_empleado,'tipo_empleado',NEW.tipo_empleado,OLD.tipo_empleado,'UPDATE',NOW(),NEW.usr_registro,OLD.usr_registro)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_impuestos`
--

CREATE TABLE `tipos_impuestos` (
  `id_tip_impuestos` bigint(20) NOT NULL,
  `nom_isv` varchar(50) CHARACTER SET latin1 NOT NULL,
  `porcentaje` decimal(10,0) NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_impuestos`
--

INSERT INTO `tipos_impuestos` (`id_tip_impuestos`, `nom_isv`, `porcentaje`, `fec_registro`, `usr_registro`) VALUES
(1, 'ISV', '15', '2021-04-27 09:38:35', 'Root--PRUEBA'),
(2, 'sobre la renta', '18', '2021-05-28 13:59:01', 'Franklin'),
(5, 'recargos', '2', '2021-05-29 23:51:22', 'Franklin');

--
-- Disparadores `tipos_impuestos`
--
DELIMITER $$
CREATE TRIGGER `tr_tiposimpuestos_Insert` AFTER INSERT ON `tipos_impuestos` FOR EACH ROW INSERT INTO bitacora  VALUES(null,'Tipos_impuestos',NEW.id_tip_impuestos,'Tipos Impuestos',new.nom_isv,'','INSERTED',now(),new.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_tiposimpuestos_delete` AFTER DELETE ON `tipos_impuestos` FOR EACH ROW INSERT INTO bitacora  VALUES(null,'Tipos_impuestos',OLD.id_tip_impuestos,'Tipos de Impuestos',OLD.nom_isv,'','DELETED',now(),OLD.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_tiposimpuestos_update` AFTER UPDATE ON `tipos_impuestos` FOR EACH ROW IF (new.nom_isv <> old.nom_isv) 
THEN 
INSERT INTO bitacora  VALUES(null,'Tipos_impuestos',NEW.id_tip_impuestos,'Nombre Impuesto',new.nom_isv,old.nom_isv,'UPDATE',now(),new.usr_registro,old.usr_registro);
IF (new.porcentaje <> old.porcentaje)
THEN 
INSERT INTO bitacora  VALUES(null,'Tipos_impuestos',NEW.id_tip_impuestos,'Porcentaje',new.porcentaje,old.porcentaje,'UPDATE',now(),new.usr_registro,old.usr_registro);
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_clientes`
--

CREATE TABLE `tipo_clientes` (
  `id_tip_cliente` bigint(20) NOT NULL,
  `tip_cliente` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_clientes`
--

INSERT INTO `tipo_clientes` (`id_tip_cliente`, `tip_cliente`, `fec_registro`, `usr_registro`) VALUES
(1, 'Natural', '2021-04-27 01:20:57', 'SUPERADMIN'),
(2, 'Juridico', '2021-04-28 00:28:47', 'SUPERADMIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_rol`
--

CREATE TABLE `tipo_rol` (
  `id_rol` bigint(20) NOT NULL,
  `rol` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_rol`
--

INSERT INTO `tipo_rol` (`id_rol`, `rol`, `fec_registro`, `usr_registro`) VALUES
(1, 'Administrador', '2021-04-27 01:21:37', 'SUPERADMIN'),
(2, 'AdminCoevaluacion', '2021-06-04 00:22:44', 'prueba luis'),
(3, 'Jefe de Bodega', '2021-06-05 00:39:36', 'Prueba Luis');

--
-- Disparadores `tipo_rol`
--
DELIMITER $$
CREATE TRIGGER `tr_rol_Delete` AFTER DELETE ON `tipo_rol` FOR EACH ROW INSERT INTO bitacora VALUES (null,'tipo_rol',OLD.id_rol,'rol',OLD.rol,'','DELETED',NOW(),OLD.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_rol_Update` AFTER UPDATE ON `tipo_rol` FOR EACH ROW INSERT INTO bitacora VALUES (null,'tipo_rol',NEW.id_rol,'rol',NEW.rol,OLD.rol,'UPDATE',NOW(),NEW.usr_registro,OLD.usr_registro)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_rol_insert` AFTER INSERT ON `tipo_rol` FOR EACH ROW INSERT INTO bitacora VALUES (null,'tipo_rol',NEW.id_rol,'rol',NEW.rol,'','INSERTED',NOW(),NEW.usr_registro,'')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_medidas`
--

CREATE TABLE `unidades_medidas` (
  `id_uni_medida` bigint(20) NOT NULL,
  `uni_medida` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidades_medidas`
--

INSERT INTO `unidades_medidas` (`id_uni_medida`, `uni_medida`, `fec_registro`, `usr_registro`) VALUES
(1, 'Pieza', '2021-04-27 09:38:11', 'Root--PRUEBA'),
(3, 'Kg', '2021-05-29 23:22:06', 'Franklin');

--
-- Disparadores `unidades_medidas`
--
DELIMITER $$
CREATE TRIGGER `tr_uni_medida_delte` AFTER DELETE ON `unidades_medidas` FOR EACH ROW INSERT INTO bitacora VALUES (null,'unidades_medidas',OLD.id_uni_medida,'uni_medida',OLD.uni_medida,'','DELETED',NOW(),OLD.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_uni_medida_insert` AFTER INSERT ON `unidades_medidas` FOR EACH ROW INSERT INTO bitacora VALUES (null,'unidades_medidas',NEW.id_uni_medida,'uni_medida',NEW.uni_medida,'','INSERTED',NOW(),NEW.usr_registro,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_uni_medida_update` AFTER UPDATE ON `unidades_medidas` FOR EACH ROW INSERT INTO bitacora VALUES (null,'unidades_medidas',NEW.id_uni_medida,'uni_medida',NEW.uni_medida,OLD.uni_medida,'INSERTED',NOW(),NEW.usr_registro,OLD.usr_registro)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(20) NOT NULL,
  `id_persona` bigint(20) NOT NULL,
  `id_rol` bigint(20) NOT NULL,
  `nom_usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) DEFAULT NULL,
  `token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `token_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass_request` int(11) DEFAULT NULL,
  `fec_registro` datetime NOT NULL,
  `usr_registro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_persona`, `id_rol`, `nom_usuario`, `pass_usuario`, `last_session`, `activacion`, `token`, `token_password`, `pass_request`, `fec_registro`, `usr_registro`) VALUES
(1, 1, 1, 'JOSEPGMMMMMMM', 'aa917ec319b79362a5ff7332cf4c07fc4f4d4a82575c4c27c76b3d49d1ad3164', '2021-05-26 23:13:09', 1, '', '', 1, '2021-04-27 01:28:08', 'SUPERADMIN'),
(2, 3, 2, 'EQUIPOCOE', '6945ac13c33dbef9623b33779550cfbf053f609c41f99ad80bb4e2655872a157', '2021-05-27 00:09:42', 1, '', '', 1, '2021-04-27 10:34:18', 'Root--HELLEN'),
(3, 4, 1, 'GARCIA', 'GARCIA1234*', '2021-06-06 23:22:03', 1, NULL, '', 1, '2021-05-29 18:14:13', 'ROOT'),
(4, 27, 2, 'EDWIN', 'EDWIN_123', '2021-06-04 02:21:32', 1, NULL, '', 1, '2021-05-30 03:49:48', 'Root--HELLEN'),
(5, 28, 1, 'ARMANDO', 'ARMANDO_1234', NULL, 0, NULL, NULL, NULL, '2021-05-30 03:59:49', 'Root--HELLEN'),
(6, 39, 1, 'hosdr', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', NULL, 1, NULL, NULL, NULL, '2012-05-30 00:00:00', 'hellen'),
(7, 40, 1, 'jos87', '2ac3f282aecbe886366ecf5678707a49ee3836de1b5d5eb10a9c582dd16306e8', NULL, 1, NULL, NULL, NULL, '2021-05-30 21:18:29', 'HELLEN'),
(10, 43, 1, 'HELLEN7', '5994471ABB01112AFCC18159F6CC74B4F511B99806DA59B3CAF5A9C173CACFC5', NULL, 1, NULL, NULL, NULL, '2021-06-01 14:20:47', 'HELLEN'),
(11, 45, 1, 'fran@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, 1, NULL, NULL, NULL, '2021-06-01 15:27:17', 'HELLEN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indices de la tabla `cantidades_producto`
--
ALTER TABLE `cantidades_producto`
  ADD PRIMARY KEY (`id_cant_productos`),
  ADD UNIQUE KEY `id_producto_2` (`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `id_persona` (`id_persona`),
  ADD KEY `id_persona_2` (`id_persona`),
  ADD KEY `id_tip_cliente` (`id_tip_cliente`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id_correo`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `datos_exonerados`
--
ALTER TABLE `datos_exonerados`
  ADD PRIMARY KEY (`id_dat_exo`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `detalles_impuestos`
--
ALTER TABLE `detalles_impuestos`
  ADD PRIMARY KEY (`id_det_imp`),
  ADD UNIQUE KEY `id_det_fact_2` (`id_det_fact`),
  ADD KEY `id_det_fact` (`id_det_fact`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_det_fact`),
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_factura_temp`
--
ALTER TABLE `detalle_factura_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `id_persona` (`id_persona`),
  ADD KEY `id_persona_2` (`id_persona`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_tip_empleado` (`id_tip_empleado`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `rtn_empresa` (`rtn_empresa`);

--
-- Indices de la tabla `entidad_banco`
--
ALTER TABLE `entidad_banco`
  ADD PRIMARY KEY (`id_banco`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`Idmodulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`Idpermiso`),
  ADD KEY `idrol` (`idrol`),
  ADD KEY `idodulo` (`idmodulo`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `num_id_persona` (`num_id_persona`);

--
-- Indices de la tabla `preguntas_seguridad`
--
ALTER TABLE `preguntas_seguridad`
  ADD PRIMARY KEY (`id_preg_seg`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nom_producto` (`nom_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_tip_impuesto` (`id_tip_impuesto`),
  ADD KEY `id_uni_medida` (`id_uni_medida`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `num_cuenta` (`num_cuenta`),
  ADD UNIQUE KEY `rtn_empresa` (`rtn_empresa`) USING BTREE,
  ADD KEY `id_banco` (`id_banco`);

--
-- Indices de la tabla `regimen_facturacion`
--
ALTER TABLE `regimen_facturacion`
  ADD PRIMARY KEY (`id_regi_fact`);

--
-- Indices de la tabla `rel_correos_persona`
--
ALTER TABLE `rel_correos_persona`
  ADD PRIMARY KEY (`rel_correo_persona`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_persona_2` (`id_persona`),
  ADD KEY `id_correo` (`id_correo`);

--
-- Indices de la tabla `rel_correo_proveedores`
--
ALTER TABLE `rel_correo_proveedores`
  ADD PRIMARY KEY (`id_correo_proveedor`),
  ADD KEY `id_correo` (`id_correo`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `rel_direcciones_persona`
--
ALTER TABLE `rel_direcciones_persona`
  ADD PRIMARY KEY (`rel_direccion_persona`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `rel_direcciones_proveedores`
--
ALTER TABLE `rel_direcciones_proveedores`
  ADD PRIMARY KEY (`rel_direccion_proveedor`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `rel_telefonos_persona`
--
ALTER TABLE `rel_telefonos_persona`
  ADD PRIMARY KEY (`rel_telefono_persona`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_telefono` (`id_telefono`);

--
-- Indices de la tabla `rel_telefonos_proveedores`
--
ALTER TABLE `rel_telefonos_proveedores`
  ADD PRIMARY KEY (`id_telefono_proveedor`),
  ADD KEY `id_telefono` (`id_telefono`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `respuestas_seguridad`
--
ALTER TABLE `respuestas_seguridad`
  ADD PRIMARY KEY (`id_resp_seg`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_preg_seg` (`id_preg_seg`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id_telefono`);

--
-- Indices de la tabla `tipos_empleado`
--
ALTER TABLE `tipos_empleado`
  ADD PRIMARY KEY (`id_tip_empleado`);

--
-- Indices de la tabla `tipos_impuestos`
--
ALTER TABLE `tipos_impuestos`
  ADD PRIMARY KEY (`id_tip_impuestos`);

--
-- Indices de la tabla `tipo_clientes`
--
ALTER TABLE `tipo_clientes`
  ADD PRIMARY KEY (`id_tip_cliente`);

--
-- Indices de la tabla `tipo_rol`
--
ALTER TABLE `tipo_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `unidades_medidas`
--
ALTER TABLE `unidades_medidas`
  ADD PRIMARY KEY (`id_uni_medida`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_persona` (`id_persona`),
  ADD UNIQUE KEY `nom_usuario` (`nom_usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_persona_2` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cantidades_producto`
--
ALTER TABLE `cantidades_producto`
  MODIFY `id_cant_productos` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `id_correo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `datos_exonerados`
--
ALTER TABLE `datos_exonerados`
  MODIFY `id_dat_exo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalles_impuestos`
--
ALTER TABLE `detalles_impuestos`
  MODIFY `id_det_imp` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_det_fact` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `detalle_factura_temp`
--
ALTER TABLE `detalle_factura_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `entidad_banco`
--
ALTER TABLE `entidad_banco`
  MODIFY `id_banco` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  MODIFY `id_inventario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `Idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `Idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `preguntas_seguridad`
--
ALTER TABLE `preguntas_seguridad`
  MODIFY `id_preg_seg` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `regimen_facturacion`
--
ALTER TABLE `regimen_facturacion`
  MODIFY `id_regi_fact` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rel_correos_persona`
--
ALTER TABLE `rel_correos_persona`
  MODIFY `rel_correo_persona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `rel_correo_proveedores`
--
ALTER TABLE `rel_correo_proveedores`
  MODIFY `id_correo_proveedor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rel_direcciones_persona`
--
ALTER TABLE `rel_direcciones_persona`
  MODIFY `rel_direccion_persona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `rel_direcciones_proveedores`
--
ALTER TABLE `rel_direcciones_proveedores`
  MODIFY `rel_direccion_proveedor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rel_telefonos_persona`
--
ALTER TABLE `rel_telefonos_persona`
  MODIFY `rel_telefono_persona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `rel_telefonos_proveedores`
--
ALTER TABLE `rel_telefonos_proveedores`
  MODIFY `id_telefono_proveedor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `respuestas_seguridad`
--
ALTER TABLE `respuestas_seguridad`
  MODIFY `id_resp_seg` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id_telefono` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `tipos_empleado`
--
ALTER TABLE `tipos_empleado`
  MODIFY `id_tip_empleado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos_impuestos`
--
ALTER TABLE `tipos_impuestos`
  MODIFY `id_tip_impuestos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_clientes`
--
ALTER TABLE `tipo_clientes`
  MODIFY `id_tip_cliente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_rol`
--
ALTER TABLE `tipo_rol`
  MODIFY `id_rol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidades_medidas`
--
ALTER TABLE `unidades_medidas`
  MODIFY `id_uni_medida` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cantidades_producto`
--
ALTER TABLE `cantidades_producto`
  ADD CONSTRAINT `CANTIDADES_PRODUCTO_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `CLIENTES_ibfk_1` FOREIGN KEY (`id_tip_cliente`) REFERENCES `tipo_clientes` (`id_tip_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CLIENTES_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_exonerados`
--
ALTER TABLE `datos_exonerados`
  ADD CONSTRAINT `DATOS_EXONERADOS_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_impuestos`
--
ALTER TABLE `detalles_impuestos`
  ADD CONSTRAINT `DETALLES_IMPUESTOS_ibfk_1` FOREIGN KEY (`id_det_fact`) REFERENCES `detalle_factura` (`id_det_fact`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `DETALLE_FACTURA_ibfk_2` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `DETALLE_FACTURA_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_factura_temp`
--
ALTER TABLE `detalle_factura_temp`
  ADD CONSTRAINT `detalle_factura_temp_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `EMPLEADOS_ibfk_1` FOREIGN KEY (`id_tip_empleado`) REFERENCES `tipos_empleado` (`id_tip_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EMPLEADOS_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EMPLEADOS_ibfk_3` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FACTURA_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD CONSTRAINT `INVENTARIOS_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `tipo_rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`idmodulo`) REFERENCES `modulos` (`Idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas_seguridad`
--
ALTER TABLE `preguntas_seguridad`
  ADD CONSTRAINT `preguntas_seguridad_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `PRODUCTOS_ibfk_10` FOREIGN KEY (`id_uni_medida`) REFERENCES `unidades_medidas` (`id_uni_medida`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCTOS_ibfk_4` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCTOS_ibfk_5` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCTOS_ibfk_7` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCTOS_ibfk_8` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCTOS_ibfk_9` FOREIGN KEY (`id_tip_impuesto`) REFERENCES `tipos_impuestos` (`id_tip_impuestos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `PROVEEDORES_ibfk_1` FOREIGN KEY (`id_banco`) REFERENCES `entidad_banco` (`id_banco`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_correos_persona`
--
ALTER TABLE `rel_correos_persona`
  ADD CONSTRAINT `REL_CORREOS_PERSONA_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REL_CORREOS_PERSONA_ibfk_2` FOREIGN KEY (`id_correo`) REFERENCES `correos` (`id_correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_correo_proveedores`
--
ALTER TABLE `rel_correo_proveedores`
  ADD CONSTRAINT `REL_CORREO_PROVEEDORES_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REL_CORREO_PROVEEDORES_ibfk_2` FOREIGN KEY (`id_correo`) REFERENCES `correos` (`id_correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_direcciones_persona`
--
ALTER TABLE `rel_direcciones_persona`
  ADD CONSTRAINT `REL_DIRECCIONES_PERSONA_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REL_DIRECCIONES_PERSONA_ibfk_2` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_direcciones_proveedores`
--
ALTER TABLE `rel_direcciones_proveedores`
  ADD CONSTRAINT `REL_DIRECCIONES_PROVEEDORES_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REL_DIRECCIONES_PROVEEDORES_ibfk_2` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_telefonos_persona`
--
ALTER TABLE `rel_telefonos_persona`
  ADD CONSTRAINT `REL_TELEFONOS_PERSONA_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REL_TELEFONOS_PERSONA_ibfk_2` FOREIGN KEY (`id_telefono`) REFERENCES `telefonos` (`id_telefono`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_telefonos_proveedores`
--
ALTER TABLE `rel_telefonos_proveedores`
  ADD CONSTRAINT `REL_TELEFONOS_PROVEEDORES_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REL_TELEFONOS_PROVEEDORES_ibfk_2` FOREIGN KEY (`id_telefono`) REFERENCES `telefonos` (`id_telefono`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas_seguridad`
--
ALTER TABLE `respuestas_seguridad`
  ADD CONSTRAINT `respuestas_seguridad_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuestas_seguridad_ibfk_2` FOREIGN KEY (`id_preg_seg`) REFERENCES `preguntas_seguridad` (`id_preg_seg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `USUARIO_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `USUARIO_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `tipo_rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
