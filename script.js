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

  const fechaNacimiento = document.getElementById("Fecha_de_nacimiento"); 
  const resultadoEdad = document.getElementById("resultadoEdad"); 
  Fecha_de_nacimiento.addEventListener("change", () => 
    { 
    const hoy = new Date(); 
    const nacimiento = new Date(Fecha_de_nacimiento.value); let edad = hoy.getFullYear() - nacimiento.getFullYear(); 
    const mes = hoy.getMonth() - nacimiento.getMonth();
    if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) { edad--; } 
    if (edad < 0) { edad = 0; } 
    if (edad > 100) { edad = 100; }
    resultadoEdad.textContent = edad; });
    
    document.getElementById("Nivel_academico").addEventListener("change", function() {
      const Nivel_academico = this.value;
      const Grado = document.getElementById("Grado");
      const semestreContainer = document.getElementById("semestreContainer");

      Grado.innerHTML = `<option value="" selected disabled>Seleccionar</option>`;
      semestreContainer.style.display = "none";

      if (Nivel_academico === "PRIMARIA") {
        console.log("PRIMARIA");
        Grado.disabled = false;
        for (let i = 1; i <= 5; i++)      {
        const option = document.createElement("option");
        option.value = i;
      option.textContent = i;
      Grado.appendChild(option);
    }
  }
    
    else if (Nivel_academico === "SECUNDARIA") {
        Grado.disabled = false;
    for (let i = 6; i <= 11; i++) {
      const option = document.createElement("option");
      option.value = i;
      option.textContent = i;
      Grado.appendChild(option);
    }
  } 

else if (Nivel_academico === "MEDIA") {
    Grado.disabled = false;
    for (let i = 6; i <= 11; i++) {
      const option = document.createElement("option");
      option.value = i;
      option.textContent = i;
      Grado.appendChild(option);
    }
} 

else if (Nivel_academico === "SUPERIOR") {
    Grado.disabled = false;
    gradoContainer.style.display = "none";
    if (Nivel_academico === "SUPERIOR")
    semestreContainer.style.display = "block";
  }
});

  document.getElementById("Presenta_Discapacidad").addEventListener("change", function() {
      const Presenta_Discapacidad= this.value;
      const Tipo_de_discapacidadContainer = document.getElementById("Tipo_de_discapacidadContainer");
    
      if (Presenta_Discapacidad === "SI") {
    Tipo_de_discapacidadContainer.style.display = "block";
      } else if (Presenta_Discapacidad === "NO") {
        Tipo_de_discapacidad.disabled = "false";
        Tipo_de_discapacidadContainer.style.display="none";
      } else {
    Tipo_de_discapacidadContainer.style.display = "none";
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

const municipioSelect = document.getElementById("Municipio_de_residencia");
const comunaSelect = document.getElementById("comuna_corregimiento");
const barrioSelect = document.getElementById("barrio_donde_vive");

municipioSelect.addEventListener("change", function() {
  const municipio = this.value;
  comunaSelect.innerHTML = `<option value="" selected disabled>Seleccionar</option>`;
  barrioSelect.innerHTML = `<option value="" selected disabled>Seleccionar</option>`;

  if (datos[municipio]) {
    Object.keys(datos[municipio]).forEach(comuna => {
      const option = document.createElement("option");
      option.value = comuna;
      option.textContent = comuna;
      comunaSelect.appendChild(option);
  });
}
});

comunaSelect.addEventListener("change", function() {
  const municipio = municipioSelect.value;
  const comuna = this.value; 
  barrioSelect.innerHTML = `<option value="" selected disabled>Seleccionar</option>`;

  if (datos[municipio] && datos[municipio][comuna]){ 
    datos[municipio][comuna].forEach(barrio => {
      const option = document.createElement("option");
      option.value = barrio;
      option.textContent = barrio;
      barrioSelect.appendChild(option);
  });
}
});

function mostrarValoresFormulario() {
  const formulario = {
    razon: document.getElementById("Razones").value,
    tipo_documento: document.getElementById("Tipo_documento").value,
    numero_documento: document.getElementById("Numero_documento").value,
    primer_nombre: document.getElementById("Primer_nombre").value,
    segundo_nombre: document.getElementById("Segundo_nombre").value,
    primer_apellido: document.getElementById("Primer_apellido").value,
    segundo_apellido: document.getElementById("Segundo_apellido").value,
    nombres_apellidos: document.getElementById("Nombres_apellidos").value,
    genero: document.getElementById("genero").value,
    cual: document.getElementById("cual").value,
    via_principal: document.getElementById("viaPrincipal").value,
    numero: document.getElementById("numero").value,
    prefijo1: document.getElementById("prefijo1").value,
    nombre_via: document.getElementById("nombreVia").value,
    via_secundaria: document.getElementById("viaSecundaria").value,
    prefijo2: document.getElementById("prefijo2").value,
    cuadrante: document.getElementById("cuadrante").value,
    placa: document.getElementById("placa").value,
    complemento: document.getElementById("complemento").value,
    direccion_completa: document.getElementById("direccion_Completa").value,
    municipio: document.getElementById("Municipio_de_residencia").value,
    comuna: document.getElementById("comuna_corregimiento").value,
    barrio: document.getElementById("barrio_donde_vive").value,
    fecha_nacimiento: document.getElementById("Fecha_de_nacimiento").value,
    edad: document.getElementById("resultadoEdad").textContent,
    estrato: document.getElementById("Estrato_Socioeconómico").value,
    sisben: document.getElementById("Nivel_o_puntaje_del_SISBEN").value,
    telefono: document.getElementById("Teléfono_célular").value,
    nivel_academico: document.getElementById("Nivel_academico").value,
    grado: document.getElementById("Grado").value,
    semestre: document.getElementById("Semestre").value,
    civica: document.getElementById("Número_de_cívica_personalizada").value,
    presenta_discapacidad: document.getElementById("Presenta_Discapacidad").value,
    tipo_discapacidad: document.getElementById("Tipo_de_discapacidad").value,
    beneficio_sapiencia: document.getElementById("¿Qué_beneficio_tiene_activo_con_Sapiencia?").value
  };

  console.log("=== DATOS DEL FORMULARIO ===");
  console.table(formulario);
  console.log(formulario);
}