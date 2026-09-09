<?php require_once __DIR__ . '/header.php'; ?>

<section class="tarjeta resultado <?php echo $exito ? 'exito' : 'fallo'; ?>">
    <h2><?php echo $exito ? '✅ ¡Registro exitoso!' : '⚠️ No se pudo registrar'; ?></h2>
    <p><?php echo htmlspecialchars($mensaje); ?></p>
    <div class="acciones-inicio">
        <a class="boton" href="index.php?accion=listar">Ver inventario</a>
        <a class="boton boton-secundario" href="index.php?accion=registrar">Registrar otro producto</a>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
