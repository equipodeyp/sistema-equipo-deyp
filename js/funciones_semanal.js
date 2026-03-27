let currentViewedWeek = 1;
    let maxAllowedWeek = 1;
    const currentYear = 2026;

    // Redirección al archivo PHP
    function goToReport() {
        window.location.href = '../generar_reportes/generar_reportesemanal.php';
    }

    // Funciones de fecha (Lunes a Domingo con mes inteligente)
    function getWeekNumber(d) {
        d = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
        d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay() || 7));
        var yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
        return Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
    }

    function getDateRangeOfWeek(weekNo, year) {
        const firstThursday = new Date(year, 0, 4);
        const dayOfFirstThursday = firstThursday.getDay() || 7;
        const firstMonday = new Date(firstThursday.getTime() - (dayOfFirstThursday - 1) * 86400000);
        const monday = new Date(firstMonday.getTime() + (weekNo - 1) * 7 * 86400000);
        const sunday = new Date(monday.getTime() + 6 * 86400000);

        const options = {day:'2-digit', month:'long'};
        if (monday.getMonth() === sunday.getMonth()) {
            return `DEL ${monday.getDate()} AL ${sunday.toLocaleDateString('es-ES', options).toUpperCase()} DE ${year}`;
        } else {
            return `DEL ${monday.toLocaleDateString('es-ES', options).toUpperCase()} AL ${sunday.toLocaleDateString('es-ES', options).toUpperCase()} DE ${year}`;
        }
    }

    function checkReportTime() {
        const now = new Date();
        const day = now.getDay();
        const hour = now.getHours();
        const bPre = document.getElementById('btnPreliminar');
        const bAct = document.getElementById('btnActualizado');

        if (day === 1 && hour >= 9 && hour < 11) {
            bPre.style.display = 'none'; bAct.style.display = 'block';
        } else {
            bPre.style.display = 'block'; bAct.style.display = 'none';
        }
    }

    function init() {
        checkReportTime();
        setInterval(checkReportTime, 10000);
        const today = new Date();
        maxAllowedWeek = getWeekNumber(today) - 1;

        if (maxAllowedWeek < 1) {
            document.getElementById('weekDisplay').innerText = "SIN REPORTES";
        } else {
            currentViewedWeek = maxAllowedWeek;
            updateUI();
        }
    }

    function updateUI() {
        document.getElementById('weekDisplay').innerText = `SEMANA ${currentViewedWeek}`;
        document.getElementById('dateRangeDisplay').innerText = getDateRangeOfWeek(currentViewedWeek, currentYear);
        document.getElementById('pdfFrame').src = `../../docs/REPORTES/SEMANAL/${currentYear}/semanal_${currentViewedWeek}.pdf`;
        document.getElementById('prevBtn').disabled = (currentViewedWeek <= 1);
        document.getElementById('nextBtn').disabled = (currentViewedWeek >= maxAllowedWeek);
    }

    function changeWeek(step) {
        currentViewedWeek += step;
        updateUI();
    }

    window.onload = init;
