<?php require_once __DIR__ . '/header.php'; ?>

<section class="tarjeta bienvenida">
    <h2>Bienvenido/a</h2>
    <p>Esta aplicación permite gestionar un inventario básico de productos, aplicando el patrón <strong>Modelo - Vista - Controlador (MVC)</strong> con PHP y MySQL.</p>
    <div class="acciones-inicio">
        <a class="boton" href="index.php?accion=registrar">➕ Registrar producto</a>
        <a class="boton boton-secundario" href="index.php?accion=listar">📋 Ver inventario</a>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
