const notify_btn = document.getElementById('notify-btn-analisis');
const notify_label = document.getElementById('show_notif_analisis');
const notify_container = document.getElementById('notify-menu-analisis');

let xhr = new XMLHttpRequest();

function notify_me(){
    xhr.open('GET', '../subdireccion_de_analisis_de_riesgo/select_analisis.php', true);

    xhr.send();

    xhr.onload = () =>{
        if (xhr.status == 200) {
            let get_data = JSON.parse(xhr.responseText);

            if (get_data == get_data) {
                notify_label.innerHTML = get_data;
            }
            else {
                notify_container.innerHTML += get_data;
            }
        }
    }
}

window.onload = () =>{
    notify_me();

    setInterval(() => {
    notify_me();
    }, 1000 );
}

notify_btn.addEventListener('click', (e)=>{
    e.preventDefault();

///////////////////////////////////////////////////////////////////////////////////////////

    notify_container.classList.toggle('show');

    xhr.open('GET', '../subdireccion_de_analisis_de_riesgo/data_analisis.php', true);

    xhr.send();

    notify_container.innerHTML = '';

    xhr.onload = function() {

        if (xhr.status == 200) {

            let data = JSON.parse(xhr.responseText);

            data.forEach(message => {
                let li = `<li><a href="../subdireccion_de_analisis_de_riesgo/detalle_asistencia_completada.php?id_asistencia=${message.msg}">Seguimiento Registrado: <br> ${message.msg}</a></li>`;

                notify_container.innerHTML += li;
            });

        }
    }
})