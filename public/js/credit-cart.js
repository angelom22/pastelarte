// console.log("hola");
const tarjeta = document.querySelector("#tarjeta"),
  btnAbrirFormulario = document.querySelector("#btnAbrirFormulario"),
  formulario = document.querySelector("#formularioTarjeta"),
  numeroTarjeta = document.querySelector("#tarjeta .numero"),
  nombreTarjeta = document.querySelector("#tarjeta .nombre"),
  logoMarca = document.querySelector("#logoMarca"),
  firma = document.querySelector("#tarjeta .firma p"),
  mesExpiracion = document.querySelector("#tarjeta #expiracion .mes"),
  yearExpiracion = document.querySelector("#tarjeta #expiracion .year"),
  ccv = document.querySelector("#tarjeta .ccv");

// * Voltemos la tarjeta para mostrar frente
const mostrarFrente = () => {
  if (tarjeta.classList.contains("active")) {
    tarjeta.classList.remove("active");
  }
};

// * Rotacion de la tarjeta
tarjeta.addEventListener("click", () => {
  tarjeta.classList.toggle("active");
});

// * Boton de abrir formulario
btnAbrirFormulario.addEventListener("click", () => {
  btnAbrirFormulario.classList.toggle("active");
  formulario.classList.toggle("active");
});

// * Select del mes generado dinamicamente
for (let i = 1; i <= 12; i++) {
  let opcion = document.createElement("option");
  opcion.value = i;
  opcion.innerText = i;
  formulario.selectMes.appendChild(opcion);
}

// * Select del año generado dinamicamente
const yearActual = new Date().getFullYear();

for (let i = yearActual; i <= yearActual + 10; i++) {
  let opcion = document.createElement("option");
  opcion.value = i;
  opcion.innerText = i;
  formulario.selectYear.appendChild(opcion);
}

//  * Input número de tarjeta
formulario.inputNumero.addEventListener("keyup", (e) => {
  let valorInput = e.target.value;

  formulario.inputNumero.value = valorInput
    //  Eliminamos espacios en blanco
    .replace(/\s/g, "")
    //  Eliminar las letras
    .replace(/\D/g, "")
    //  Colocamos espacio cada 4 números
    .replace(/([0-9]{4})/g, "$1 ")
    //  Elimina el ultimo espaciado
    .trim();

  numeroTarjeta.textContent = valorInput;

  // resetea el valor del input numero
  if (valorInput == "") {
    numeroTarjeta.textContent = "#### #### #### ###";
    logoMarca.innerHTML = "";
  }
  // Valida si la tarjeta comienza con el número 4 y coloca la imagen Visa
  if (valorInput[0] == 4) {
    logoMarca.innerHTML = "";
    const imagen = document.createElement("img");
    imagen.src = "/img/logos/visa.png";
    logoMarca.appendChild(imagen);
  }
  // Valida si la tarjeta comienza con el número 5 y coloca la imagen MasterCard
  else if (valorInput[0] == 5) {
    logoMarca.innerHTML = "";
    const imagen = document.createElement("img");
    imagen.src = "/img/logos/mastercard.png";
    logoMarca.appendChild(imagen);
  }

  // Volteamos la tarjeta para que el usuario vea el frente
  mostrarFrente();
});

//  * Input nombre de la tarjeta
formulario.inputNombre.addEventListener("keyup", (e) => {
  let valorInput = e.target.value;

  formulario.inputNombre.value = valorInput.replace(/[0-9]/g, "");
  nombreTarjeta.textContent = valorInput;
  firma.textContent = valorInput;

  if (valorInput == "") {
    nombreTarjeta.textContent = "Jhon Doe";
  }

  mostrarFrente();
});

// * Select del mes
formulario.selectMes.addEventListener("change", (e) => {
  mesExpiracion.textContent = e.target.value;
  mostrarFrente();
});

// * Select del año
formulario.selectYear.addEventListener("change", (e) => {
  yearExpiracion.textContent = e.target.value.slice(2);
  mostrarFrente();
});

// *CCV
formulario.inputCCV.addEventListener("keyup", () => {
  if (!tarjeta.classList.contains("active")) {
    tarjeta.classList.toggle("active");
  }

  formulario.inputCCV.value = formulario.inputCCV.value
    //  Eliminamos los espacios en blanco
    .replace(/\s/g, "")
    //  Eliminar las letras
    .replace(/\D/g, "");

  ccv.textContent = formulario.inputCCV.value;
});
