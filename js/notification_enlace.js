const notify_btn = document.getElementById('notify-btn-enlace');
const notify_label = document.getElementById('show_notif_enlace');
const notify_container = document.getElementById('notify-menu-enlace');

let xhr = new XMLHttpRequest();

function notify_me(){
    xhr.open('GET', '../asistencias_medicas/select_enlace.php', true);

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

/////////////////////////////////////////////////////////

    notify_container.classList.toggle('show');

    xhr.open('GET', '../asistencias_medicas/data_enlace.php', true);

    xhr.send();

    notify_container.innerHTML = '';

    xhr.onload = function() {

        if (xhr.status == 200) {

            let data = JSON.parse(xhr.responseText);

            data.forEach(message => {
                let li = `<li><a href="./agendar_asistencia.php?id_asistencia_medica=${message.msg}">${message.msg}</a></li>`;

                notify_container.innerHTML += li;
            });

        }
    }
})