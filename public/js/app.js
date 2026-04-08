function calcularEdad() {
const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;

if (!fecha_nacimiento){
  document.getElementById("resultadoEdad").innerHTML = `<span class="badge bg-warning">Selecciona una fecha</span>`;
    return;
}

const hoy = new Date();
const nacimiento = new Date(fecha_nacimiento);

let edad = hoy.getFullYear() - nacimiento.getFullYear();
let mes = hoy.getMonth() - nacimiento.getMonth();

if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
  edad--;
}

document.getElementById("resultadoEdad").innerHTML = `<span class="badge bg-success">Tienes ${edad} </span>`;
}
document.getElementById("fecha_nacimiento").addEventListener("change", calcularEdad);

document.addEventListener('DOMContentLoaded', () => {
  const get= id => (document.getElementById(id) || { value: ''}).value.trim();

 function formateardireccioncompleta() {
    const get = id => (document.getElementById(id) || { value: '' }).value.trim();
    const viaprincipal = get("viaprincipal");
    const numero = get("numero");
    const prefijo1 = get("prefijo1");
    const nombrevia = get("nombrevia");
    const viasecundaria = get("viasecundaria");
    const prefijo2 = get("prefijo2");
    const cuadrante = get("cuadrante");
    const placa = get("placa");
    const complemento = get("complemento");
const parts = [];
    if (viaprincipal) parts.push(viaprincipal);
    if (numero) parts.push(numero);
    if (prefijo1) parts.push(prefijo1);
    if (nombrevia) parts.push(nombrevia);
let secundaria = '';
    if (viasecundaria) secundaria = `#${viasecundaria}`;
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
    document.getElementById("direccioncompleta").innerText = "Dirección completa:" + direccionFormateada;
    document.getElementById("direccioncompleta").value = direccionFormateada;
  }

  const campos = [
    "viaprincipal","numero","prefijo1","nombrevia",
    "viasecundaria","prefijo2","cuadrante","placa","complemento"
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

  const fecha_nacimiento = document.getElementById("fecha_nacimiento"); 
  const resultadoEdad = document.getElementById("resultadoEdad"); 
  fecha_nacimiento.addEventListener("change", () => 
    { 
    const hoy = new Date(); 
    const nacimiento = new Date(fecha_nacimiento.value); let edad = hoy.getFullYear() - nacimiento.getFullYear(); 
    const mes = hoy.getMonth() - nacimiento.getMonth();
    if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) { edad--; } 
    if (edad < 0) { edad = 0; } 
    if (edad > 100) { edad = 100; }
    resultadoEdad.textContent = edad; });
    
    document.getElementById("nivel_academico").addEventListener("change", function() {
      const nivel_academico = this.value;
      const grado = document.getElementById("grado");
      const semestreContainer = document.getElementById("semestreContainer");

      grado.innerHTML = `<option value="" selected disabled>Seleccionar</option>`;
      semestreContainer.style.display = "none";

      if (nivel_academico === "PRIMARIA") {
        console.log("PRIMARIA");
        grado.disabled = false;
        for (let i = 1; i <= 5; i++)      {
        const option = document.createElement("option");
        option.value = i;
      option.textContent = i;
      grado.appendChild(option);
    }
  }
    
    else if (nivel_academico === "SECUNDARIA") {
        grado.disabled = false;
    for (let i = 6; i <= 11; i++) {
      const option = document.createElement("option");
      option.value = i;
      option.textContent = i;
      grado.appendChild(option);
    }
  } 

else if (nivel_academico === "MEDIA") {

    document.getElementById("gradoContainer").style.display = "none";
    grado.innerHTML = '<option value="" selected disabled>Seleccionar</option>';
    grado.disabled = true;
}

else if (nivel_academico === "SUPERIOR") {
    grado.disabled = false;
    gradoContainer.style.display = "none";
    if (nivel_academico === "SUPERIOR")
    semestreContainer.style.display = "block";
  }
});

  document.getElementById("presenta_discapacidad").addEventListener("change", function() {
      const presenta_discapacidad= this.value;
      const tipo_discapacidadContainer = document.getElementById("tipo_discapacidadContainer");
    
      if (presenta_discapacidad === "SI") {
    tipo_discapacidadContainer.style.display = "block";
      } else if (presenta_discapacidad === "NO") {
        tipo_discapacidad.disabled = "false";
        tipo_discapacidadContainer.style.display="none";
      } else {
    tipo_discapacidadContainer.style.display = "none";
  }
});

const datos = {
  "MEDELLÍN": { 
    "Comuna 1 - Popular": ["Popular Nº1", "Popular Nº2", "Granizal", "La Isla"], 
    "Comuna 2 - Santa Cruz": ["La Rosa", "La Frontera", "La Salle", "Moscú Nº1"],
    "Comuna 3 - Manrique": ["Campo Valdés Nº1", "Campo Valdés Nº2", "Versalles Nº1", "Versalles Nº2"], 
    "Comuna 4 - Aranjuez": ["Brasilia", "Moravia", "San Pedro", "Aranjuez"], 
    "Comuna 5 - Castilla": ["Castilla", "Florencia", "Boyacá Las Brisas", "Las Cabañas"], 
    "Comuna 6 - Doce de Octubre": ["Doce de Octubre Nº1", "Doce de Octubre Nº2", "Santander", "Kennedy"], 
    "Comuna 7 - Robledo": ["Aures Nº1", "Aures Nº2", "Robledo", "Córdoba"], 
    "Comuna 8 - Villa Hermosa": ["Villa Hermosa", "La Mansión", "Enciso", "El Pinal"], 
    "Comuna 9 - Buenos Aires": ["Buenos Aires", "Miraflores", "Alejandro Echavarría", "Bomboná Nº2"],
    "Comuna 10 - La Candelaria": ["Centro", "San Diego", "Las Palmas", "Prado"], 
    "Comuna 11 - Laureles-Estadio": ["Laureles", "Estadio", "San Joaquín", "Bolivariana"], 
    "Comuna 12 - La América": ["La América", "Santa Lucía", "Campo Alegre", "Ferrini"], 
    "Comuna 13 - San Javier": ["San Javier Nº1", "San Javier Nº2", "Veinte de Julio", "El Salado"], 
    "Comuna 14 - El Poblado": ["El Poblado", "Patio Bonito", "Castropol", "La Florida"], 
    "Comuna 15 - Guayabal": ["Guayabal", "Trinidad", "Campo Amor", "Cristo Rey"], 
    "Comuna 16 - Belén": ["Belén", "Los Alpes", "La Gloria", "Rincón de Los Ángeles"], 
    "Santa Elena (corregimiento)": ["Santa Elena"], 
    "San Cristóbal (corregimiento)": ["San Cristóbal"], 
    "San Antonio de Prado (corregimiento)": ["San Antonio de Prado"], 
    "Altavista (corregimiento)": ["Altavista"], 
    "Palmitas (corregimiento)": ["Palmitas"] 
  },
  "BELLO": { "Niquía": ["Niquía", "Niquía Camacol", "Niquía Sector Estación"], 
    "Zamora": ["Zamora", "Zamora Parte Alta"], 
    "Cabañas": ["Cabañas", "Cabañas Norte"], 
    "París": ["París", "París Parte Alta"], 
    "Santa Ana": ["Santa Ana"], 
    "San Félix (corregimiento)": ["San Félix"] 
  },  
  "ENVIGADO": { 
    "Zona Centro": ["Centro", "La Magnolia", "El Dorado"], 
    "Zona Noroccidental": ["El Trianón", "El Esmeraldal"], 
    "Zona Suroriental": ["San Rafael", "Las Antillas"], 
    "Perico (corregimiento)": ["Perico"], 
    "Arenales (corregimiento)": ["Arenales"] }, 
    
  "ITAGÜI": { 
    "Santa María": ["Santa María Nº1", "Santa María Nº2"], 
    "San Gabriel": ["San Gabriel"], 
    "Ditaires": ["Ditaires"], 
    "La Gloria": ["La Gloria"], "El Rosario": ["El Rosario"] 
  }, 
  "SABANETA": { 
      "Centro": ["Centro", "San José"], 
      "La Doctora": ["La Doctora", "María Auxiliadora"] 
    }, 
  "BARBOSA": { 
        "Centro": ["Centro"], 
        "El Hatillo": ["El Hatillo"], 
        "Popalito": ["Popalito"] }, 
  "CALDAS": { 
        "Centro": ["Centro"], 
        "La Corrala": ["La Corrala"], 
        "La Miel": ["La Miel"] }, 
  "COPACABANA": { 
    "Centro": ["Centro"], 
    "El Zarzal": ["El Zarzal"], 
    "La Chuscala": ["La Chuscala"] }, 
  "LA_ESTRELLA": { 
    "Centro": ["Centro"], 
    "La Ferrería": ["La Ferrería"], 
    "La Tablaza": ["La Tablaza"] 
  } 
};

const municipio_residenciaSelect = document.getElementById("municipio_residencia");
const comuna_corregimientoSelect = document.getElementById("comuna_corregimiento");
const barrioSelect = document.getElementById("barrio");

municipio_residenciaSelect.addEventListener("change", function() {
  const municipio_residencia = this.value;
  comuna_corregimientoSelect.innerHTML = `<option value="" selected disabled>Seleccionar</option>`;
  barrioSelect.innerHTML = `<option value="" selected disabled>Seleccionar</option>`;

  if (datos[municipio_residencia]) {
    Object.keys(datos[municipio_residencia]).forEach(comuna_corregimiento => {
      const option = document.createElement("option");
      option.value = comuna_corregimiento;
      option.textContent = comuna_corregimiento;
      comuna_corregimientoSelect.appendChild(option);
  });
}
});

comuna_corregimientoSelect.addEventListener("change", function() {
  const municipio_residencia = municipio_residenciaSelect.value;
  const comuna_corregimiento = this.value; 
  barrioSelect.innerHTML = `<option value="" selected disabled>Seleccionar</option>`;

  if (datos[municipio_residencia] && datos[municipio_residencia][comuna_corregimiento]){ 
    datos[municipio_residencia][comuna_corregimiento].forEach(barrio => {
      const option = document.createElement("option");
      option.value = barrio;
      option.textContent = barrio;
      barrioSelect.appendChild(option);
  });
}
});

function mostrarValoresFormulario() {
  const formulario = {
    razon: document.getElementById("razones_diligenciamiento").value,
    tipo_documento: document.getElementById("tipo_documento").value,
    numero_documento: document.getElementById("numero_documento").value,
    primer_nombre: document.getElementById("primer_nombre").value,
    segundo_nombre: document.getElementById("segundo_nombre").value,
    primer_apellido: document.getElementById("primer_apellido").value,
    segundo_apellido: document.getElementById("segundo_apellido").value,
    nombres_apellidos: document.getElementById("nombres_apellidos_civica").value,
    genero: document.getElementById("genero").value,
    cual: document.getElementById("cual").value,
    viaprincipal: document.getElementById("viaprincipal").value,
    numero: document.getElementById("numero").value,
    prefijo1: document.getElementById("prefijo1").value,
    nombre_via: document.getElementById("nombrevia").value,
    via_secundaria: document.getElementById("viasecundaria").value,
    prefijo2: document.getElementById("prefijo2").value,
    cuadrante: document.getElementById("cuadrante").value,
    placa: document.getElementById("placa").value,
    complemento: document.getElementById("complemento").value,
    direccioncompleta: document.getElementById("direccioncompleta").value,
    municipio: document.getElementById("municipio_residencia").value,
    comuna: document.getElementById("comuna_corregimiento").value,
    barrio: document.getElementById("barrio").value,
    fecha_nacimiento: document.getElementById("fecha_nacimiento").value,
    edad: document.getElementById("resultadoEdad").textContent,
    estrato: document.getElementById("estrato_socioeconómico").value,
    sisben: document.getElementById("sisben").value,
    telefono: document.getElementById("celular").value,
    nivel_academico: document.getElementById("nivel_academico").value,
    grado: document.getElementById("grado").value,
    semestre: document.getElementById("semestre").value,
    civica: document.getElementById("numero_civica").value,
    presenta_discapacidad: document.getElementById("presenta_discapacidad").value,
    tipo_discapacidad: document.getElementById("tipo_discapacidad").value,
    beneficio_sapiencia: document.getElementById("beneficio_sapiencia?").value
  };

  console.log("=== DATOS DEL FORMULARIO ===");
  console.table(formulario);
  console.log(formulario);
}