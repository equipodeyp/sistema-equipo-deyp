function loadImage(url) {
    return new Promise(resolve => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const res = event.target.result;
                resolve(res);
            }
            const file = this.response;
            reader.readAsDataURL(file);
        }
        xhr.send();
    });
}

let signaturePad = null;

window.addEventListener('load', async () => {

    const canvas = document.querySelector("canvas");
    canvas.height = canvas.offsetHeight;
    canvas.width = canvas.offsetWidth;

    signaturePad = new SignaturePad(canvas, {});2

    const form = document.querySelector('#form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();


        let exp = document.getElementById('exp').value;
        let tomo = document.getElementById('tomo').value;
        let anioa = document.getElementById('anioa').value;
        let anioc = document.getElementById('anioc').value;
        let inc = document.querySelector('input[name="inc"]:checked').value;
        let val = document.querySelector('input[name="val"]:checked').value;
        let ofi = document.querySelector('input[name="ofi"]:checked').value;
        let publica = document.querySelector('input[name="publica"]:checked').value;
        let reservada = document.querySelector('input[name="reservada"]:checked').value;
        let confi = document.querySelector('input[name="confi"]:checked').value;
        let anex = document.getElementById('anex').value;

        // let area = document.getElementById('area').value;

        generatePDF(exp, tomo, anioa, anioc, inc, val, ofi, anex, publica, reservada, confi);
    })

});

async function generatePDF(exp, tomo, anioa, anioc, inc, val, ofi, anex, publica, reservada, confi) {
    const image = await loadImage("../image/formatos/CaratulaExpediente.png");

    const signatureImage = signaturePad.toDataURL();

    const pdf = new jsPDF('p', 'mm', 'letter');

    pdf.addImage(image, 'PNG', 0, 0, 215.9, 279.4);
    pdf.addImage(signatureImage, 'PNG', 200, 605, 300, 60);


    pdf.setFontSize(18);
    // pdf.text(curso, 260, 125);


    const date = new Date();
    pdf.text(date.getUTCDate().toString(), 235, 150);
    pdf.text((date.getUTCMonth() + 1).toString(), 275, 150);
    pdf.text(date.getUTCFullYear().toString(), 320, 150);



     pdf.setFontSize(18);
     pdf.text(exp, 65, 85);
     pdf.text(tomo, 90, 100);
     pdf.text(anioa, 79, 114);
     pdf.text(anioc, 163, 114);
     pdf.text(anex, 128, 154);

    // pdf.text(area, 20, 20);


    // pdf.setFillColor(7,7,7);

      if (parseInt(inc) === 0) {
          pdf.circle(0, 0, 0, 'FD');
      } else {
        pdf.circle(45, 160, 3, 'FD');

    }

     if (parseInt(val) === 0) {
         pdf.circle(0, 0, 0, 'FD');
     } else {
         pdf.circle(82, 160, 3, 'FD');

     }


     if (parseInt(ofi) === 0) {
         pdf.circle(0, 0, 0, 'FD');
     } else {
         pdf.circle(110, 160, 3, 'FD');
    //     //pdf.text(discapacidadDesc, 350, 720);
     }


     if (parseInt(publica) === 0) {
         pdf.circle(0, 0, 0, 'FD');
     } else {
         pdf.circle(80, 191, 3, 'FD');
    //     //pdf.text(discapacidadDesc, 350, 720);
     }

     if (parseInt(reservada) === 0) {
         pdf.circle(0, 0, 0, 'FD');
     } else {
         pdf.circle(123, 191, 3, 'FD');
    //     //pdf.text(discapacidadDesc, 350, 720);
     }


     if (parseInt(confi) === 0) {
         pdf.circle(0, 0, 0, 'FD');
     } else {
         pdf.circle(185, 191, 3, 'FD');
    //     //pdf.text(discapacidadDesc, 350, 720);
     }



    pdf.save("CaratulaExpediente.pdf");

}
