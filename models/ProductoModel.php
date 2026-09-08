<?php
/**
 * Modelo: ProductoModel
 * Responsable de toda la comunicación con la base de datos.
 * No contiene HTML ni lógica de presentación.
 */

require_once __DIR__ . '/../config/conexion.php';

class ProductoModel
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    // Insertar un nuevo producto
    public function insertar($nombre, $categoria, $cantidad, $precio, $email)
    {
        $sql = "INSERT INTO productos (nombre, categoria, cantidad, precio, email_proveedor)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssids", $nombre, $categoria, $cantidad, $precio, $email);
        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }

    // Obtener todos los productos (con búsqueda opcional por nombre o categoría)
    public function obtenerTodos($busqueda = "")
    {
        if ($busqueda !== "") {
            $sql = "SELECT * FROM productos WHERE nombre LIKE ? OR categoria LIKE ? ORDER BY id DESC";
            $stmt = $this->conexion->prepare($sql);
            $like = "%" . $busqueda . "%";
            $stmt->bind_param("ss", $like, $like);
            $stmt->execute();
            $resultado = $stmt->get_result();
        } else {
            $sql = "SELECT * FROM productos ORDER BY id DESC";
            $resultado = $this->conexion->query($sql);
        }

        $productos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
        return $productos;
    }

    // Eliminar un producto por id (funcionalidad opcional)
    public function eliminar($id)
    {
        $sql = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }
}
