-- ============================================
-- Base de datos: integradora
-- Proyecto: Sistema de Inventario Básico (MVC)
-- ============================================

CREATE DATABASE IF NOT EXISTS integradora;
USE integradora;

-- Tabla principal: productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    email_proveedor VARCHAR(100) NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Datos de ejemplo
INSERT INTO productos (nombre, categoria, cantidad, precio, email_proveedor) VALUES
('Arroz 5kg', 'Alimentos', 50, 6.75, 'proveedor1@correo.com'),
('Aceite 1L', 'Alimentos', 30, 3.20, 'proveedor2@correo.com'),
('Detergente 1kg', 'Limpieza', 20, 4.50, 'proveedor3@correo.com');
