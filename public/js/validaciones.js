// Validaciones del formulario de registro de productos
// Se ejecutan antes de enviar los datos al controlador (PHP)

document.getElementById('formProducto').addEventListener('submit', function (evento) {

    let esValido = true;

    // Referencias a los campos
    const nombre = document.getElementById('nombre');
    const categoria = document.getElementById('categoria');
    const cantidad = document.getElementById('cantidad');
    const precio = document.getElementById('precio');
    const email = document.getElementById('email');

    // Referencias a los mensajes de error
    const errorNombre = document.getElementById('errorNombre');
    const errorCategoria = document.getElementById('errorCategoria');
    const errorCantidad = document.getElementById('errorCantidad');
    const errorPrecio = document.getElementById('errorPrecio');
    const errorEmail = document.getElementById('errorEmail');

    // Limpiar estados previos
    [nombre, categoria, cantidad, precio, email].forEach(campo => campo.classList.remove('invalido'));
    [errorNombre, errorCategoria, errorCantidad, errorPrecio, errorEmail].forEach(span => span.textContent = '');

    // 1. Nombre: campo vacío y longitud mínima/máxima
    const valorNombre = nombre.value.trim();
    if (valorNombre === '') {
        marcarError(nombre, errorNombre, 'El nombre del producto es obligatorio.');
        esValido = false;
    } else if (valorNombre.length < 3 || valorNombre.length > 100) {
        marcarError(nombre, errorNombre, 'El nombre debe tener entre 3 y 100 caracteres.');
        esValido = false;
    }

    // 2. Categoría: no debe estar vacía
    if (categoria.value === '') {
        marcarError(categoria, errorCategoria, 'Debe seleccionar una categoría.');
        esValido = false;
    }

    // 3. Cantidad: campo numérico, entero, mayor que cero
    const valorCantidad = cantidad.value.trim();
    if (valorCantidad === '') {
        marcarError(cantidad, errorCantidad, 'La cantidad es obligatoria.');
        esValido = false;
    } else if (!/^\d+$/.test(valorCantidad)) {
        marcarError(cantidad, errorCantidad, 'La cantidad debe ser un número entero positivo.');
        esValido = false;
    } else if (parseInt(valorCantidad, 10) <= 0 || parseInt(valorCantidad, 10) > 100000) {
        marcarError(cantidad, errorCantidad, 'La cantidad debe estar entre 1 y 100000.');
        esValido = false;
    }

    // 4. Precio: campo numérico decimal, mayor que cero
    const valorPrecio = precio.value.trim();
    if (valorPrecio === '') {
        marcarError(precio, errorPrecio, 'El precio es obligatorio.');
        esValido = false;
    } else if (!/^\d+(\.\d{1,2})?$/.test(valorPrecio)) {
        marcarError(precio, errorPrecio, 'Ingrese un precio válido (ej: 4.50).');
        esValido = false;
    } else if (parseFloat(valorPrecio) <= 0) {
        marcarError(precio, errorPrecio, 'El precio debe ser mayor a 0.');
        esValido = false;
    }

    // 5. Correo electrónico: formato válido
    const valorEmail = email.value.trim();
    const patronEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (valorEmail === '') {
        marcarError(email, errorEmail, 'El correo del proveedor es obligatorio.');
        esValido = false;
    } else if (!patronEmail.test(valorEmail)) {
        marcarError(email, errorEmail, 'Ingrese un correo electrónico válido.');
        esValido = false;
    }

    // Si alguna validación falló, se detiene el envío del formulario
    if (!esValido) {
        evento.preventDefault();
    }
});

// Función auxiliar para marcar un campo como inválido y mostrar su mensaje
function marcarError(campo, spanError, mensaje) {
    campo.classList.add('invalido');
    spanError.textContent = mensaje;
}
