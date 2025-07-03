const cbxTipo = document.getElementById('folio_expediente')
cbxTipo.addEventListener('change', getNombreInstitucion)

const cbxNombre = document.getElementById('id_sujeto')
cbxNombre.addEventListener('change', getDomicilioInstitucion)


const cbxDomicilio = document.getElementById('id_asistencia')


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
    let url = '../asistencias_medicas/get_sujeto.php'
    let formData = new FormData()
    formData.append('folio_expediente', tipo)
    fetchAndSetData(url, formData, cbxNombre)
}



function getDomicilioInstitucion(){
    let nombre = cbxNombre.value
    let url = '../asistencias_medicas/get_asistencia_medica.php'
    let formData = new FormData()
    formData.append('id_sujeto', nombre)
    fetchAndSetData(url, formData, cbxDomicilio)
}

