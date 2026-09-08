<?php
/**
 * Archivo de conexión a la base de datos MySQL.
 * Usuario: root, sin contraseña (requerimiento del proyecto).
 */

$host   = "localhost";
$usuario = "root";
$clave   = "";
$baseDatos = "integradora";

$conexion = new mysqli($host, $usuario, $clave, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
