<?php
/**
 * Controlador: ProductoController
 * Recibe las acciones del usuario y coordina Vista <-> Modelo.
 */

require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../models/ProductoModel.php';

$modelo = new ProductoModel($conexion);
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'inicio';

switch ($accion) {

    case 'registrar':
        // Se muestra el formulario de registro
        require_once __DIR__ . '/../views/registrar.php';
        break;

    case 'guardar':
        // Se procesa el envío del formulario (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombre    = trim($_POST['nombre'] ?? '');
            $categoria = trim($_POST['categoria'] ?? '');
            $cantidad  = intval($_POST['cantidad'] ?? 0);
            $precio    = floatval($_POST['precio'] ?? 0);
            $email     = trim($_POST['email'] ?? '');

            $mensaje = "";
            $exito = false;

            // Validación en el servidor (además de la validación en JS)
            if ($nombre === "" || $categoria === "" || $cantidad <= 0 || $precio <= 0 || $email === "") {
                $mensaje = "Todos los campos son obligatorios y deben tener valores válidos.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mensaje = "El correo electrónico ingresado no es válido.";
            } else {
                $exito = $modelo->insertar($nombre, $categoria, $cantidad, $precio, $email);
                $mensaje = $exito
                    ? "Producto registrado correctamente en el inventario."
                    : "Ocurrió un error al registrar el producto.";
            }

            require_once __DIR__ . '/../views/resultado.php';
        } else {
            header("Location: index.php?accion=registrar");
            exit;
        }
        break;

    case 'listar':
        // Se consultan los productos (con búsqueda opcional)
        $busqueda = isset($_GET['busqueda']) ? trim($_GET['busqueda']) : '';
        $productos = $modelo->obtenerTodos($busqueda);
        require_once __DIR__ . '/../views/listar.php';
        break;

    case 'eliminar':
        // Funcionalidad opcional: eliminar producto
        if (isset($_GET['id'])) {
            $modelo->eliminar(intval($_GET['id']));
        }
        header("Location: index.php?accion=listar");
        exit;
        break;

    default:
        require_once __DIR__ . '/../views/inicio.php';
        break;
}
