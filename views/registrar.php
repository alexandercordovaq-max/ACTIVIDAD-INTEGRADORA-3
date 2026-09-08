<?php require_once __DIR__ . '/header.php'; ?>

<section class="tarjeta">
    <h2>Registrar nuevo producto</h2>

    <form id="formProducto" action="index.php?accion=guardar" method="POST" novalidate>

        <div class="campo">
            <label for="nombre">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ej: Arroz 5kg">
            <span class="error" id="errorNombre"></span>
        </div>

        <div class="campo">
            <label for="categoria">Categoría</label>
            <select id="categoria" name="categoria">
                <option value="">-- Seleccione --</option>
                <option value="Alimentos">Alimentos</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Bebidas">Bebidas</option>
                <option value="Electrónica">Electrónica</option>
                <option value="Otros">Otros</option>
            </select>
            <span class="error" id="errorCategoria"></span>
        </div>

        <div class="campo">
            <label for="cantidad">Cantidad en stock</label>
            <input type="text" id="cantidad" name="cantidad" placeholder="Ej: 25">
            <span class="error" id="errorCantidad"></span>
        </div>

        <div class="campo">
            <label for="precio">Precio unitario ($)</label>
            <input type="text" id="precio" name="precio" placeholder="Ej: 4.50">
            <span class="error" id="errorPrecio"></span>
        </div>

        <div class="campo">
            <label for="email">Correo del proveedor</label>
            <input type="text" id="email" name="email" placeholder="Ej: proveedor@correo.com">
            <span class="error" id="errorEmail"></span>
        </div>

        <button type="submit" class="boton">Guardar producto</button>
    </form>
</section>

<script src="public/js/validaciones.js"></script>

<?php require_once __DIR__ . '/footer.php'; ?>
