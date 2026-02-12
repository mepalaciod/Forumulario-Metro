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

document.addEventListener('DOMContentLoaded', () => {
  const get= id => (document.getElementById(id) || { value: ''}).value.trim();

 function formateardireccioncompleta() {
    const get = id => (document.getElementById(id) || { value: '' }).value.trim();
    const viaPrincipal = get("viaPrincipal");
    const numero = get("numero");
    const prefijo1 = get("prefijo1");
    const nombreVia = get("nombreVia");
    const viaSecundaria = get("viaSecundaria");
    const prefijo2 = get("prefijo2");
    const cuadrante = get("cuadrante");
    const placa = get("placa");
    const complemento = get("complemento");
const parts = [];
    if (viaPrincipal) parts.push(viaPrincipal);
    if (numero) parts.push(numero);
    if (prefijo1) parts.push(prefijo1);
    if (nombreVia) parts.push(nombreVia);
let secundaria = '';
    if (viaSecundaria) secundaria = `#${viaSecundaria}`;
    if (prefijo2) secundaria += ` ${prefijo2}`;
    if (cuadrante) secundaria += ` ${cuadrante}`;

    if (secundaria) parts.push(secundaria);
    if (placa) parts.push(`- ${placa}`);
    if (complemento) parts.push(complemento);

    const direccion = parts.join(' ').replace(/\s+/g, ' ').trim();
    return direccion.toUpperCase();
  }
  function actualizarDireccion() {
    const direccionFormateada = formateardireccioncompleta();
    document.getElementById("direccionCompleta").innerText = "Dirección completa:" + direccionFormateada;
    document.getElementById("direccion_Completa").value = direccionFormateada;
  }

  const campos = [
    "viaPrincipal","numero","prefijo1","nombreVia",
    "viaSecundaria","prefijo2","cuadrante","placa","complemento"
  ];

  campos.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener("input", actualizarDireccion);
  });

  actualizarDireccion(); });

const genero = document.getElementById('genero');
const cual= document.getElementById('cual');

  genero.addEventListener('change', function() {
    if (this.value === 'OTRAS') {
      cual.disabled = false;
      cual.required = true;
    } else {
      cual.disabled = true;
      cual.required = false;
      cual.value = "";
    }
  });
