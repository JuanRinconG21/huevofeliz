const botonAgregar = document.getElementById('agregarCarrito');
const contadorCarrito = document.getElementById('contadorCarrito');

let contador = 0;

botonAgregar.addEventListener('click', function() {
  contador++;
  contadorCarrito.textContent = contador;
});