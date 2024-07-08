const notify_btn = document.getElementById('notify-btn-ejecucion');
const notify_label = document.getElementById('show_notif_ejecucion');
const notify_container = document.getElementById('notify-menu-ejecucion');

let xhr = new XMLHttpRequest();

function notify_me(){
    xhr.open('GET', '../asistencias_medicas/select_ejecucion.php', true);

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

    xhr.open('GET', '../asistencias_medicas/data_ejecucion.php', true);

    xhr.send();

    notify_container.innerHTML = '';

    xhr.onload = function() {

        if (xhr.status == 200) {

            let data = JSON.parse(xhr.responseText);

            data.forEach(message => {
                let li = `<li><a href="../asistencias_medicas/asistencia_turnada.php">Nueva Asistencia Médica Turnada: <br> ${message.msg}</a></li>`;

                notify_container.innerHTML += li;
            });

        }
    }
})