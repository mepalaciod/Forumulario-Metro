const Fecha_de_nacimiento= document.getElementById(Fecha_de_nacimiento).value;
    const hoy= new Date()
    const nacimiento= new Date(Fecha_de_nacimiento)

    let edad= hoy.getFullYear() - nacimiento.getFullYear()
    let mes= hoy.getMonth() - nacimiento.getMonth()

    if(mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
            edad--;
        }
document.getElementById('resultadoEdad').innerHTML = 
            <span class="badge bg-success">Tienes ${0-100} años</span>
    