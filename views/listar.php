<?php require_once __DIR__ . '/header.php'; ?>

<section class="tarjeta">
    <h2>Inventario registrado</h2>

    <form action="index.php" method="GET" class="form-busqueda">
        <input type="hidden" name="accion" value="listar">
        <input type="text" name="busqueda" placeholder="Buscar por nombre o categoría..."
               value="<?php echo htmlspecialchars($busqueda ?? ''); ?>">
        <button type="submit" class="boton boton-pequeno">Buscar</button>
        <?php if (!empty($busqueda)): ?>
            <a href="index.php?accion=listar" class="boton boton-secundario boton-pequeno">Limpiar</a>
        <?php endif; ?>
    </form>
            
    <?php if (empty($productos)): ?>
        <p class="sin-datos">No hay productos registrados todavía.</p>
    <?php else: ?>
        <table class="tabla-datos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Proveedor</th>
                    <th>Fecha registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $p): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($p['id']); ?></td>
                        <td><?php echo htmlspecialchars($p['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($p['categoria']); ?></td>
                        <td><?php echo htmlspecialchars($p['cantidad']); ?></td>
                        <td>$<?php echo number_format($p['precio'], 2); ?></td>
                        <td><?php echo htmlspecialchars($p['email_proveedor']); ?></td>
                        <td><?php echo htmlspecialchars($p['fecha_registro']); ?></td>
                        <td>
                            <a class="enlace-eliminar" href="index.php?accion=eliminar&id=<?php echo $p['id']; ?>"
                               onclick="return confirm('¿Eliminar este producto del inventario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
