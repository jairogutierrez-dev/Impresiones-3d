function showToast(message, duration = 3000) {
  const toast = document.createElement('div');
  toast.className = 'toast';
  toast.textContent = message;
  document.body.appendChild(toast);

  // Forzar reflow para activar la animación
  void toast.offsetWidth;
  toast.classList.add('show');

  // Ocultar y eliminar después del tiempo indicado
  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => document.body.removeChild(toast), 300);
  }, duration);
}


document.addEventListener("DOMContentLoaded", (event) => {
  //guardamos el numero de elementos en las cookies para que se pueda ver el numero de elementos en todo momento
  const cookies = document.cookie.split(";");
  let cookie = null;
  cookies.forEach((item) => {
    if (item.indexOf("items") > -1) {
      cookie = item;
    }
  });
  if (cookie != null) {
    const count = cookie.split("=")[1];
    //console.log(count);
    if (count > 0) {
      document.querySelector(
        ".btn-carrito"
      ).innerHTML = `<i class="fas fa-shopping-cart"></i> (${count}) Carrito`;
    }
  }
});

const bCarrito = document.querySelector(".btn-carrito");

bCarrito.addEventListener("click", (event) => {
  //#carrito-container -> div blanco que agrupa el carrito
  const carritoContainer = document.querySelector("#carrito-container");

  if (carritoContainer.style.display == "") {
    //si el #carrito-containe esta oculto se muestra con la propieda de block
    carritoContainer.style.display = "block";
    actualizarCarritoUI();
  } else {
    carritoContainer.style.display = "";
  }
});

function actualizarCarritoUI() {
    //console.log("ACTULIZACSION CARRITOOOOOO");
  fetch(
    "/api-carrito.php?action=mostrar"
  )
    .then((response) => response.json())
    .then((data) => {
      console.log(data.items);

      //con esta variable obtenemos el objeto tabla del menu.php, para poder incrustar los datos en esa tabla
      let tablaCont = document.querySelector("#tabla");
      let precioTotal = "";
      let html = "";

      data.items.forEach((element) => {
        html += ` 
				<div class='fila'>
					<div class='imagen'>
						<img src='images/productos-images/${element.imagen}' width='100' />
					</div>
					
					<div class='info'>
						<input type='hidden' value='${element.id_producto}' />
						<div class='nombre'>${element.nombre}</div>
						<div>Precio $${element.precio}</div>
						<div>Subtotal: $${element.subtotal}</div>
						<div class='botones'>
							<button class='btn-remove'> - </button> ${element.cantidad} <button class='btn-sumar'> + </button>
						</div>
					</div>
					<hr>
				</div>
			`;
      });

      data.items.forEach((element) => {
        if (element.id_producto == null) {
          removeItemFromCarrito(element.id_producto);
        }
      });

      if (!data.info || !data.items) {
        console.error("Error en la respuesta del servidor:", data);
        alert("Hubo un error al cargar el carrito. Intenta más tarde.");
        return;
        }

      precioTotal = `<p>Total: $${data.info.total}</p>`;

      tablaCont.innerHTML = precioTotal + html;

      //llevamos la cuenta  de la cantidad elementos dentro del carrito con cookies,

      document.cookie = `items=${data.info.count}`;

      bCarrito.innerHTML = `<i class="fas fa-shopping-cart"></i> (${data.info.count}) Carrito`;

      //anadimos un listener al boton para poder borrar elmentos de nuestra lista, seleccionamos todos los botones que sirven para borrar
      document.querySelectorAll(".btn-remove").forEach((boton) => {
        //anadimos un evento por cada boton
        boton.addEventListener("click", (e) => {
          //obtenemos el valor del id del objeto subiendo hasta el div padre
          const id = boton.parentElement.parentElement.children[0].value;

          removeItemFromCarrito(id);
        });
      });

      //anadimos mas prodcutos con el boton +
      document.querySelectorAll(".btn-sumar").forEach((boton) => {
        //anadimos un evento por cada boton
        boton.addEventListener("click", (e) => {
          //obtenemos el valor del id del objeto subiendo hasta el div padre
          const id = boton.parentElement.parentElement.children[0].value;

          addItemToCarrito(id);
        });
      });
    });
}

const botones = document.querySelectorAll(".btn-add");

botones.forEach((boton) => {
  // conseguimos el id de cada elemento accediento al input id que esta oculto
  const id =
    boton.parentElement.parentElement.parentElement.parentElement.parentElement
      .children[0].value;

  boton.addEventListener("click", (e) => {
    addItemToCarrito(id);
    //console.log("CARRITOOOOOOOOOOOOOOOOOO")
  });
});

//funcion que borra un item del carrito
function removeItemFromCarrito(id) {
  //cuando hacemos la llamada de un API necesitamos un fetch
  fetch(
    "api-carrito.php?action=remove&id_producto=" +
      id
  )
    .then((res) => res.json())
    .then((data) => {
      //console.log(data.status);
      actualizarCarritoUI();
    });
}

function addItemToCarrito(id) {

    //   require_once('api/carrito/api-carrito.php');	
    //   add(id);

  //cuando hacemos la llamada de un API necesitamos un fetch
  fetch(
    "api-carrito.php?action=add&id_producto=" +
      id
  )
    .then((res) => res.json())
    .then((data) => {
      //console.log(data.status);
      actualizarCarritoUI();
    });
    
    showToast('Producto agregado al carrito');
}
