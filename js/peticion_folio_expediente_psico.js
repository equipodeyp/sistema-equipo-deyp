


const cbxTipo = document.getElementById('folio_expediente_psico')
cbxTipo.addEventListener('change', getNombreInstitucion)

const cbxNombre = document.getElementById('id_sujeto_psico')
cbxNombre.addEventListener('change', getDomicilioInstitucion)


const cbxDomicilio = document.getElementById('id_asistencia_psico')



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
    let url = '../subdireccion_de_analisis_de_riesgo/get_sujeto_psico.php'
    let formData = new FormData()
    formData.append('folio_expediente_psico', tipo)
    fetchAndSetData(url, formData, cbxNombre)
}



function getDomicilioInstitucion(){
    let nombre = cbxNombre.value
    let url = '../subdireccion_de_analisis_de_riesgo/get_asistencia_psico.php'
    let formData = new FormData()
    formData.append('id_sujeto_psico', nombre)
    fetchAndSetData(url, formData, cbxDomicilio)
}
