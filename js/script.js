const clicksH1s = [];
const listaEmails = [];
const coches = [];
let lastCarId = 0;
let cocheParaMover;



document.addEventListener("DOMContentLoaded", function(event){
	
	cambiarColores();
	formularioNuevoCoche();
	rellenarTablaCoches();
	formularioMoverCoche();
	//lastCarId = getLastCarId();
});

function getLastCarId(){
	let lastId = 0;
	for(let coche of coches){
		if(coche.id > lastId){
			lastId = coche.id;
		}
	}
	return lastId;
}




function formularioMoverCoche(){
	formMoverCoche.addEventListener("submit", function(event){//evento es el formulario 
		const kilometros = parseInt(this.elements.km.value);//accedemos a los elementos del formulario y lo casteamos
															//como integer
		this.elements.km.value = 1;


		cocheParaMover.mover(kilometros);
		/*console.log(kilometros);
		cocheParaMover.kilometros += kilometros;
		console.log(cocheParaMover);
		cocheParaMover.combustible -= cocheParaMover.consumo * kilometros;//reducimos combustible
		//consumo de litro * kilometro */

		console.log(cocheParaMover);
		//celdaCombustibleTablaCoches(cocheParaMover);//quitamod celda porque coche ya tiene la celda integrada

		



		divMoverCoche.classList.add("ocultar");//ocultamos el div
		cocheParaMover = undefined;//volvemos a inciar la variable global a indefinido para volver a empezar
		/*const marcaValue = this.elements.inputMarca.value;
		const modeloValue = this.elements.inputModelo.value;
		this.elements.inputMarca.value = "";
		this.elements.inputModelo.value = "";

		const nuevoCoche = crearCoche(marcaValue, modeloValue);
		coches.push(nuevoCoche);

		crearFilaTablaCoches(nuevoCoche);*/


		event.preventDefault();// ell fromulario te sacaria de la pagina, se evita el comportamiento por defecto
	});
}






function formularioNuevoCoche(){
	formularioCoches.addEventListener("submit", function(event){//
		const marcaValue = this.elements.inputMarca.value;
		const modeloValue = this.elements.inputModelo.value;
		this.elements.inputMarca.value = "";
		this.elements.inputModelo.value = "";

		const nuevoCoche = crearCoche(marcaValue, modeloValue);
		coches.push(nuevoCoche);

		crearFilaTablaCoches(nuevoCoche);

		event.preventDefault();
	});
}

function crearCoche(marca, modelo){
	lastCarId = lastCarId + 1;
	const coche = {
		id: lastCarId,
		marca: marca,
		modelo: modelo,
		kilometros: 100,
		combustible: 50,
		combustibleMax: 50,
		consumo: 0.1,
		//Hacer funcion que te reduce combustible segun avanzas los kilmetros
		actualizarCeldaCombustible: function(){
			//pintamos el porcentaje de combustible que queda en el deposito
					// 
					const combustible = this.combustible * 100 / this.combustibleMax;
					this.celdaCombustible.innerHTML = combustible + '%';
					this.celdaCombustible.classList.remove("combustible-alto");
					this.celdaCombustible.classList.remove("combustible-medio");
					this.celdaCombustible.classList.remove("combustible-bajo");
					if(combustible >= 70){
						this.celdaCombustible.classList.add("combustible-alto");
					}
					else if(combustible >= 30){
						this.celdaCombustible.classList.add("combustible-medio");
					}
					else{
						this.celdaCombustible.classList.add("combustible-bajo");
					}
					},
					mover: function(km){

							this.kilometros += km;
							this.combustible -= this.consumo * kilometros;//reducimos combustible
							//consumo de litro * kilometro 
							this.actualizarCeldaCombustible();


					}

			}
			return coche;
}

function cambiarColores(){
	//const title = document.getElementById("title");
	title.innerHTML = "blablabla";

	const h1s = document.getElementsByTagName("h1");
	/*for(let i = 0; i < h1s.length; i++){
		h1s[i].style.backgroundColor = "blue";
	}*/
	let h1;
	for (h1 of h1s) {
		h1.style.backgroundColor = "blue";
		/*h1.addEventListener("click", function(event){
			this.style.backgroundColor = "green";
		});*/
		h1.onclick = function(event){
			this.style.backgroundColor = "green";
			clicksH1s.push(this);
			//console.log(clicksH1s);
		}
	}

	cambiarColor.addEventListener("click", function(event){
		let h1;
		for(h1 of clicksH1s){
			h1.style.backgroundColor = "yellow";
		}
	});

	/*const botones = document.getElementsByTagName("button");
	let boton;
	for (boton of botones) {
		boton.addEventListener("click", function(event){
			//event.target.style.backgroundColor = "blue";
			let h1;
			for(h1 of clicksH1s){
				h1.style.backgroundColor = "yellow";
			}
		});
	}*/
}



function rellenarTablaCoches(){

	/*const motorTesla = {
		numero: 2,
		potencia: 500
	}


	const bateria = {
		capacidadMax: 100,
		carga: 50,
		cargar: function(cantidad) {
			this.carga = this.carga + cantidad;
		}
	}

	const coche = {
		id: 1,
		marca: 'Tesla',
		modelo: 'S',
		bateria: bateria,
		motor: motorTesla,
		kilometros: 150
	}
	coche.bateria.cargar(20);

	console.log(coche);

	const coche1 = {
		id: 2,
		marca: 'Ferrari',
		modelo: 'f40',
		kilometros: 1505
	}

	const coche2 = {
		id: 3,
		marca: 'Seat',
		modelo: 'panda',
		kilometros: 15
	}*/

	coches.push(crearCoche("Tesla", "S"));
	coches.push(crearCoche("Ferrari", "F40"));
	coches.push(crearCoche("Seat", "Panda"));

	for(let i = 0; i < coches.length; i++){
		crearFilaTablaCoches(coches[i]);
	}
}

function crearFilaTablaCoches(coche){
	const newTr = document.createElement("tr");
	const tdMarca = document.createElement("td");
	const tdModelo = document.createElement("td");
	const tdKilometros = document.createElement("td");
	const tdCombustible = document.createElement("td");
	const tdAcciones = document.createElement("td");

	const marcaText = document.createTextNode(coche.marca);
	tdMarca.appendChild(marcaText);

	const modeloText = document.createTextNode(coche.modelo);
	tdModelo.appendChild(modeloText);

	tdKilometros.innerHTML = coche.kilometros;

	coche.celdaCombustible = tdCombustible;// creamos una nueva propiedad al coche

	coche.actualizarCeldaCombustible();//solo recibe coche porque ya tiene la propiedad de la celda integrada

	
	//boton mover
	const btnMover = document.createElement("button");
	btnMover.innerHTML = "Mover";
	btnMover.onclick = activarFormMoverCoche;//referenciamos a una funcion que tengo fuera
	tdAcciones.appendChild(btnMover);


	const btnColor = document.createElement("button");
	btnColor.innerHTML = "Cambiar Color";
	btnColor.onclick = function(event){
		this.parentNode.parentNode.classList.toggle("importante");
	}
	tdAcciones.appendChild(btnColor);





	//BOTON ELIMINAR
	const btnEliminar = document.createElement("button");
	btnEliminar.innerHTML = "Eliminar";
	btnEliminar.onclick = eliminarFilaCoche;
	tdAcciones.appendChild(btnEliminar);



	newTr.appendChild(tdMarca);
	newTr.appendChild(tdModelo);
	newTr.appendChild(tdKilometros);
	newTr.appendChild(tdCombustible);
	newTr.appendChild(tdAcciones);
	newTr.dataset.idCoche = coche.id;
	//newTr.classList.add("importante");
	newTr.classList.add("visible");
	newTr.classList.add("visible");
	//newTr.classList.remove("visible");
	console.log(newTr.classList.contains("visible"));
	newTr.classList.replace("visible", "invisible");
	//newTr.classList.toggle("importante");
	tablaCoches.appendChild(newTr);
}



//funcion que me invoca el formulario Mover que se muestra en la pagina
function activarFormMoverCoche(event){
	const miDataset = this.parentNode.parentNode.dataset;
	const idCoche = miDataset.idCoche;

	if (cocheParaMover === undefined || idCoche != cocheParaMover.id) {//3 iguales , mismo valor mismo tipo
		divMoverCoche.classList.remove("ocultar");//si no existe no crea la clase "ocultar"		
		cocheParaMover = getCarById(idCoche);
		textFormMoverCoche.innerHTML="Mover " + cocheParaMover.marca  + " " + cocheParaMover.modelo;

	}
	else{
		divMoverCoche.classList.add("ocultar");//toogle?
		cocheParaMover = undefined;
	}
	
	//accedemos al id del coche 
	
}







/*function celdaCombustibleTablaCoches(coche){
	//pintamos el porcentaje de combustible que queda en el deposito
	// 
	const combustible = coche.combustible * 100 / coche.combustibleMax;
	coche.celdaCombustible.innerHTML = combustible + '%';
	coche.celdaCombustible.classList.remove("combustible-alto");
	coche.celdaCombustible.classList.remove("combustible-medio");
	coche.celdaCombustible.classList.remove("combustible-bajo");
	if(combustible >= 70){
		coche.celdaCombustible.classList.add("combustible-alto");
	}
	else if(combustible >= 30){
		coche.celdaCombustible.classList.add("combustible-medio");
	}
	else{
		coche.celdaCombustible.classList.add("combustible-bajo");
	}
}*/ // METODO DE COCHE



function eliminarFilaCoche(event){
	this.parentNode.parentNode.remove();
	//const marca = this.parentNode.parentNode.firstChild.innerHTML;
	const miDataset = this.parentNode.parentNode.dataset;
	const idCoche = miDataset.idCoche;
	const index = coches.indexOf(getCarById(idCoche));
	if(index >= 0){
		coches.splice(index, 1);
	}
	console.log(coches);
}

function getCarByMarca(valor){
	for(let coche of coches){
		if(coche.marca === valor){
			return coche;
		}
	}
	/*for(let i = 0; i < coches.length; i++){
		if(coches[i].marca === marca){
			return coches[i];
		}
	}*/
	return null;
}

function getCarById(id){
	for(let coche of coches){
		if(coche.id == id){
			return coche;
		}
	}
	return null;
}

/*const listaPrueba = ["a", "b", "c"];
listaPrueba.push("d");
console.log(listaPrueba);
const index = listaPrueba.indexOf("h");
console.log(index);
if(index >= 0){
	listaPrueba.splice(index, 1);
}

console.log(listaPrueba);
*/

const clicksH1s = [];
const listaEmails = [];
const coches = [];
let lastCarId = 0;
let cocheParaMover;



document.addEventListener("DOMContentLoaded", function(event){
	
	cambiarColores();
	formularioNuevoCoche();
	rellenarTablaCoches();
	formularioMoverCoche();
	//lastCarId = getLastCarId();
});

function getLastCarId(){
	let lastId = 0;
	for(let coche of coches){
		if(coche.id > lastId){
			lastId = coche.id;
		}
	}
	return lastId;
}




function formularioMoverCoche(){
	formMoverCoche.addEventListener("submit", function(event){//evento es el formulario 
		const kilometros = parseInt(this.elements.km.value);//accedemos a los elementos del formulario y lo casteamos
															//como integer
		this.elements.km.value = 1;


		cocheParaMover.mover(kilometros);
		/*console.log(kilometros);
		cocheParaMover.kilometros += kilometros;
		console.log(cocheParaMover);
		cocheParaMover.combustible -= cocheParaMover.consumo * kilometros;//reducimos combustible
		//consumo de litro * kilometro */

		console.log(cocheParaMover);
		//celdaCombustibleTablaCoches(cocheParaMover);//quitamod celda porque coche ya tiene la celda integrada

		



		divMoverCoche.classList.add("ocultar");//ocultamos el div
		cocheParaMover = undefined;//volvemos a inciar la variable global a indefinido para volver a empezar
		/*const marcaValue = this.elements.inputMarca.value;
		const modeloValue = this.elements.inputModelo.value;
		this.elements.inputMarca.value = "";
		this.elements.inputModelo.value = "";

		const nuevoCoche = crearCoche(marcaValue, modeloValue);
		coches.push(nuevoCoche);

		crearFilaTablaCoches(nuevoCoche);*/


		event.preventDefault();// ell fromulario te sacaria de la pagina, se evita el comportamiento por defecto
	});
}






function formularioNuevoCoche(){
	formularioCoches.addEventListener("submit", function(event){//
		const marcaValue = this.elements.inputMarca.value;
		const modeloValue = this.elements.inputModelo.value;
		this.elements.inputMarca.value = "";
		this.elements.inputModelo.value = "";

		const nuevoCoche = crearCoche(marcaValue, modeloValue);
		coches.push(nuevoCoche);

		crearFilaTablaCoches(nuevoCoche);

		event.preventDefault();
	});
}

function crearCoche(marca, modelo){
	lastCarId = lastCarId + 1;
	const coche = {
		id: lastCarId,
		marca: marca,
		modelo: modelo,
		kilometros: 100,
		combustible: 50,
		combustibleMax: 50,
		consumo: 0.1,
		//Hacer funcion que te reduce combustible segun avanzas los kilmetros
		actualizarCeldaCombustible: function(){
			//pintamos el porcentaje de combustible que queda en el deposito
					// 
					const combustible = this.combustible * 100 / this.combustibleMax;
					this.celdaCombustible.innerHTML = combustible + '%';
					this.celdaCombustible.classList.remove("combustible-alto");
					this.celdaCombustible.classList.remove("combustible-medio");
					this.celdaCombustible.classList.remove("combustible-bajo");
					if(combustible >= 70){
						this.celdaCombustible.classList.add("combustible-alto");
					}
					else if(combustible >= 30){
						this.celdaCombustible.classList.add("combustible-medio");
					}
					else{
						this.celdaCombustible.classList.add("combustible-bajo");
					}
					},
					mover: function(km){

							this.kilometros += km;
							this.combustible -= this.consumo * kilometros;//reducimos combustible
							//consumo de litro * kilometro 
							this.actualizarCeldaCombustible();


					}

			}
			return coche;
}

function cambiarColores(){
	//const title = document.getElementById("title");
	title.innerHTML = "blablabla";

	const h1s = document.getElementsByTagName("h1");
	/*for(let i = 0; i < h1s.length; i++){
		h1s[i].style.backgroundColor = "blue";
	}*/
	let h1;
	for (h1 of h1s) {
		h1.style.backgroundColor = "blue";
		/*h1.addEventListener("click", function(event){
			this.style.backgroundColor = "green";
		});*/
		h1.onclick = function(event){
			this.style.backgroundColor = "green";
			clicksH1s.push(this);
			//console.log(clicksH1s);
		}
	}

	cambiarColor.addEventListener("click", function(event){
		let h1;
		for(h1 of clicksH1s){
			h1.style.backgroundColor = "yellow";
		}
	});

	/*const botones = document.getElementsByTagName("button");
	let boton;
	for (boton of botones) {
		boton.addEventListener("click", function(event){
			//event.target.style.backgroundColor = "blue";
			let h1;
			for(h1 of clicksH1s){
				h1.style.backgroundColor = "yellow";
			}
		});
	}*/
}



function rellenarTablaCoches(){

	/*const motorTesla = {
		numero: 2,
		potencia: 500
	}


	const bateria = {
		capacidadMax: 100,
		carga: 50,
		cargar: function(cantidad) {
			this.carga = this.carga + cantidad;
		}
	}

	const coche = {
		id: 1,
		marca: 'Tesla',
		modelo: 'S',
		bateria: bateria,
		motor: motorTesla,
		kilometros: 150
	}
	coche.bateria.cargar(20);

	console.log(coche);

	const coche1 = {
		id: 2,
		marca: 'Ferrari',
		modelo: 'f40',
		kilometros: 1505
	}

	const coche2 = {
		id: 3,
		marca: 'Seat',
		modelo: 'panda',
		kilometros: 15
	}*/

	coches.push(crearCoche("Tesla", "S"));
	coches.push(crearCoche("Ferrari", "F40"));
	coches.push(crearCoche("Seat", "Panda"));

	for(let i = 0; i < coches.length; i++){
		crearFilaTablaCoches(coches[i]);
	}
}

function crearFilaTablaCoches(coche){
	const newTr = document.createElement("tr");
	const tdMarca = document.createElement("td");
	const tdModelo = document.createElement("td");
	const tdKilometros = document.createElement("td");
	const tdCombustible = document.createElement("td");
	const tdAcciones = document.createElement("td");

	const marcaText = document.createTextNode(coche.marca);
	tdMarca.appendChild(marcaText);

	const modeloText = document.createTextNode(coche.modelo);
	tdModelo.appendChild(modeloText);

	tdKilometros.innerHTML = coche.kilometros;

	coche.celdaCombustible = tdCombustible;// creamos una nueva propiedad al coche

	coche.actualizarCeldaCombustible();//solo recibe coche porque ya tiene la propiedad de la celda integrada

	
	//boton mover
	const btnMover = document.createElement("button");
	btnMover.innerHTML = "Mover";
	btnMover.onclick = activarFormMoverCoche;//referenciamos a una funcion que tengo fuera
	tdAcciones.appendChild(btnMover);


	const btnColor = document.createElement("button");
	btnColor.innerHTML = "Cambiar Color";
	btnColor.onclick = function(event){
		this.parentNode.parentNode.classList.toggle("importante");
	}
	tdAcciones.appendChild(btnColor);





	//BOTON ELIMINAR
	const btnEliminar = document.createElement("button");
	btnEliminar.innerHTML = "Eliminar";
	btnEliminar.onclick = eliminarFilaCoche;
	tdAcciones.appendChild(btnEliminar);



	newTr.appendChild(tdMarca);
	newTr.appendChild(tdModelo);
	newTr.appendChild(tdKilometros);
	newTr.appendChild(tdCombustible);
	newTr.appendChild(tdAcciones);
	newTr.dataset.idCoche = coche.id;
	//newTr.classList.add("importante");
	newTr.classList.add("visible");
	newTr.classList.add("visible");
	//newTr.classList.remove("visible");
	console.log(newTr.classList.contains("visible"));
	newTr.classList.replace("visible", "invisible");
	//newTr.classList.toggle("importante");
	tablaCoches.appendChild(newTr);
}



//funcion que me invoca el formulario Mover que se muestra en la pagina
function activarFormMoverCoche(event){
	const miDataset = this.parentNode.parentNode.dataset;
	const idCoche = miDataset.idCoche;

	if (cocheParaMover === undefined || idCoche != cocheParaMover.id) {//3 iguales , mismo valor mismo tipo
		divMoverCoche.classList.remove("ocultar");//si no existe no crea la clase "ocultar"		
		cocheParaMover = getCarById(idCoche);
		textFormMoverCoche.innerHTML="Mover " + cocheParaMover.marca  + " " + cocheParaMover.modelo;

	}
	else{
		divMoverCoche.classList.add("ocultar");//toogle?
		cocheParaMover = undefined;
	}
	
	//accedemos al id del coche 
	
}







/*function celdaCombustibleTablaCoches(coche){
	//pintamos el porcentaje de combustible que queda en el deposito
	// 
	const combustible = coche.combustible * 100 / coche.combustibleMax;
	coche.celdaCombustible.innerHTML = combustible + '%';
	coche.celdaCombustible.classList.remove("combustible-alto");
	coche.celdaCombustible.classList.remove("combustible-medio");
	coche.celdaCombustible.classList.remove("combustible-bajo");
	if(combustible >= 70){
		coche.celdaCombustible.classList.add("combustible-alto");
	}
	else if(combustible >= 30){
		coche.celdaCombustible.classList.add("combustible-medio");
	}
	else{
		coche.celdaCombustible.classList.add("combustible-bajo");
	}
}*/ // METODO DE COCHE



function eliminarFilaCoche(event){
	this.parentNode.parentNode.remove();
	//const marca = this.parentNode.parentNode.firstChild.innerHTML;
	const miDataset = this.parentNode.parentNode.dataset;
	const idCoche = miDataset.idCoche;
	const index = coches.indexOf(getCarById(idCoche));
	if(index >= 0){
		coches.splice(index, 1);
	}
	console.log(coches);
}

function getCarByMarca(valor){
	for(let coche of coches){
		if(coche.marca === valor){
			return coche;
		}
	}
	/*for(let i = 0; i < coches.length; i++){
		if(coches[i].marca === marca){
			return coches[i];
		}
	}*/
	return null;
}

function getCarById(id){
	for(let coche of coches){
		if(coche.id == id){
			return coche;
		}
	}
	return null;
}

/*const listaPrueba = ["a", "b", "c"];
listaPrueba.push("d");
console.log(listaPrueba);
const index = listaPrueba.indexOf("h");
console.log(index);
if(index >= 0){
	listaPrueba.splice(index, 1);
}

console.log(listaPrueba);
*/

