<?php
const BASE_URL = "http://localhost/SistemasInversionePickiMVC";
//Conexion a la base de datos
const DB_HOST = "127.0.0.1";
const DB_NAME = "inversionespickyevaluacion";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "utf8";

/* const DB_HOST = "142.44.161.115";
const DB_NAME = "PI-INVERPIKY";
const DB_USER = "INPIKI2";
const DB_PASSWORD = "eGZTD5Kx6ZrAzhxk##30";
const DB_CHARSET = "utf8"; */
// Variables para las conversion de modeda
const SPD = ".";
const SPM = ",";
const SMONEY = "L";
const CURRENCY = "HN";

//Modulos
const MPEDIDOS = 5;
const MCLIENTES = 3;

//Roles
const RADMINISTRADOR = 1;
const RCLIENTES = 2;

//Empresa
const NOMBRE_REMITENTE = "Inversiones Picky";
const NOMBRE_EMPRESA = "Inversiones Picky";
const WEB_EMPRESA = BASE_URL;
const DIRECCION = "Honduras, Tegucigalpa";
const TELEFONO = "(504) 9874-8587";
const EMAIL_EMPRESA = "josedesarrollop@gmail.com";
const INTENTOSBLOQUEOS = 3;
const PREGUNTAS = 3;

//Variable para la Zona horaria 
date_default_timezone_set("America/Tegucigalpa");