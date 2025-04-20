//document.getElementById("input-compra").addEventListener("click", function() {
document
  .getElementById("input-compra")
  .addEventListener("input", function (evt) {
    console.log("he pulsado el boton");

    fetch(
      "/api-carrito.php?action=mostrar"
    )
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
      });

    location.href = "finalizar-compra-accion.php";
  });

// let input = document.getElementById('input-compra');

// input.addEventListener('change', function () {

//            console.log('he pulsado el boton');
//            location.href = 'buscador-de-modelos-pelicula.php';
// });
