const cbxTipo = document.getElementById('tipo_institucion')
cbxTipo.addEventListener('change', getNombreInstitucion)

const cbxNombre = document.getElementById('nombre_institucion')
cbxNombre.addEventListener('change', getDomicilioInstitucion)

const cbxDomicilio = document.getElementById('domicilio_institucion')
cbxDomicilio.addEventListener('change', getMunicipioInstitucion)

const cbxMunicipio = document.getElementById('municipio_institucion')

function fetchAndSetData(url, formData, targetElement) {
    return fetch(url, {
        method: 'POST',
        body : formData,
        mode: 'cors'
    })
        .then(response => response.json())
        .then(data => {
            targetElement.innerHTML = data
        })
        .catch(err => console.log(err))
}


function getNombreInstitucion(){
    let tipo = cbxTipo.value
    let url = '../asistencias_medicas/get_instituciones_medicas.php'
    let formData = new FormData()
    formData.append('id_tipo', tipo)
    fetchAndSetData(url, formData, cbxNombre)
}



function getDomicilioInstitucion(){
    let nombre = cbxNombre.value
    let url = '../asistencias_medicas/get_direccion_institucion.php'
    let formData = new FormData()
    formData.append('id', nombre)
    fetchAndSetData(url, formData, cbxDomicilio)
}


function getMunicipioInstitucion(){
    let domicilio = cbxDomicilio.value
    let url = '../asistencias_medicas/get_municipio_institucion.php'
    let formData = new FormData()
    formData.append('id', domicilio)
    fetchAndSetData(url, formData, cbxMunicipio)
}
