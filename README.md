# Sistema de Inventario Básico — PHP + MySQL + MVC

Proyecto integrador que implementa una aplicación web con el patrón **Modelo - Vista - Controlador (MVC)**, usando PHP, MySQL, HTML, CSS y JavaScript.

## Flujo de la aplicación

Vista (formulario) → Controlador (ProductoController) → Modelo (ProductoModel) → Base de datos MySQL

## Estructura del proyecto


proyecto-integradora/
├── config/
│   └── conexion.php          # Conexión a MySQL (independiente)
├── controllers/
│   └── ProductoController.php
├── models/
│   └── ProductoModel.php
├── views/
│   ├── header.php
│   ├── footer.php
│   ├── inicio.php
│   ├── registrar.php
│   ├── listar.php
│   └── resultado.php
├── public/
│   ├── css/estilo.css
│   └── js/validaciones.js
├── database/
│   └── integradora.sql       # Script de creación de la BD
├── index.php                 # Punto de entrada
└── README.md


## Requisitos

- XAMPP / WAMP / LAMP (Apache + PHP + MySQL)
- PHP 7.4 o superior (con extensión `mysqli`)
- MySQL / MariaDB

## Instalación

1. Copiar la carpeta `proyecto-integradora` dentro de `htdocs` (XAMPP) o `www` (WAMP).
2. Abrir phpMyAdmin y ejecutar el script `database/integradora.sql`. Esto crea la base de datos `integradora` y la tabla `productos` con datos de ejemplo.
3. Verificar que `config/conexion.php` tenga los datos correctos:
   - Usuario: `root`
   - Contraseña: `` (vacía)
   - Base de datos: `integradora`
4. Iniciar Apache y MySQL desde el panel de control de XAMPP/WAMP.
5. Abrir en el navegador: `http://localhost/proyecto-integradora/`

## Funcionalidades

- ✅ Registro de productos (formulario → controlador → modelo → INSERT en MySQL)
- ✅ Validaciones en JavaScript (campos vacíos, numéricos, longitud, formato de correo)
- ✅ Validación adicional en el servidor (PHP) antes de insertar
- ✅ Consulta de productos en tabla HTML
- ✅ Búsqueda de productos por nombre o categoría (opcional)
- ✅ Eliminación de productos (opcional)

## Tabla principal: `productos`

| Campo            | Tipo         | Descripción                  |
|------------------|--------------|-------------------------------|
| id               | INT (PK, AI) | Identificador único           |
| nombre           | VARCHAR(100) | Nombre del producto           |
| categoria        | VARCHAR(50)  | Categoría del producto        |
| cantidad         | INT          | Cantidad en stock             |
| precio           | DECIMAL(10,2)| Precio unitario               |
| email_proveedor  | VARCHAR(100) | Correo del proveedor          |
| fecha_registro   | DATETIME     | Fecha de registro automática  |




