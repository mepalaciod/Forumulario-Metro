function calcularEdad() {
const Fecha_de_nacimiento = document.getElementById("Fecha_de_nacimiento").value;

if (!Fecha_de_nacimiento){
  document.getElementById("resultadoEdad").innerHTML = `<span class="badge bg-warning">Selecciona una fecha</span>`;
    return;
}

const hoy = new Date();
const nacimiento = new Date(Fecha_de_nacimiento);

let edad = hoy.getFullYear() - nacimiento.getFullYear();
let mes = hoy.getMonth() - nacimiento.getMonth();

if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
  edad--;
}

document.getElementById("resultadoEdad").innerHTML = `<span class="badge bg-success">Tienes ${edad} </span>`;
}
document.getElementById("Fecha_de_nacimiento").addEventListener("change", calcularEdad);

function formateardireccionCompleta (víaPrincipal, numero, prefijo1, nombreVia, prefijo2, cuadrante, placa, complemento) {
  return `${víaPrincipal} ${numero}, ${prefijo1}, ${nombreVia} ${viaSecundaria} ${prefijo2} ${cuadrante} ${placa} ${complemento}`.toUpperCase();
}

function actualizarDireccion() {
  const víaPrincipal = document.getElementById("Vía_principal").value;
  const numero = document.getElementById("numero").value;
  const prefijo1 = document.getElementById("prefijo1").value;
  const nombreVia = document.getElementById("nombreVia").value;
  const viaSecundaria = document.getElementById("viaSecundaria").value;
  const prefijo2 = document.getElementById("prefijo2").value;
  const cuadrante = document.getElementById("cuadrante").value;
  const placa = document.getElementById("placa").value;
  const complemento = document.getElementById("complemento").value;
  
  const direccionFormateada = formateardireccionCompleta(víaPrincipal, numero, prefijo1, nombreVia, viaSecundaria, prefijo2, cuadrante, placa, complemento);
  document.getElementById("direccionCompletaInput").value = direccionFormateada;
}

// Event listeners para los campos de dirección
document.getElementById("Vía_principal").addEventListener("change", actualizarDireccion);
document.getElementById("numero").addEventListener("change", actualizarDireccion);
document.getElementById("prefijo1").addEventListener("input", actualizarDireccion);
document.getElementById("nombreVia").addEventListener("change", actualizarDireccion);
document.getElementById("viaSecundaria").addEventListener("change", actualizarDireccion);
document.getElementById("prefijo2").addEventListener("input", actualizarDireccion);
document.getElementById("cuadrante").addEventListener("change", actualizarDireccion);
document.getElementById("placa").addEventListener("input", actualizarDireccion);
document.getElementById("complemento").addEventListener("input", actualizarDireccion);

