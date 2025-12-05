<h1 class="mb-4">Calendário de Reservas</h1>

<div id="calendar"></div>

<!-- FULLCALENDAR -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',
        locale: 'pt-br',
        height: "auto",

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },

        events: function(fetchInfo, successCallback, failureCallback) {
            fetch("<?php echo 'http://localhost/RossettoSaas/?api=eventos&empresa_id=' . $_SESSION['empresa_id']; ?>")
                .then(response => response.json())
                .then(data => successCallback(data))
                .catch(() => failureCallback());
        },

        dateClick: function(info) {
            if (confirm("Criar reserva em " + info.dateStr + "?")) {
                window.location.href = "nova-reserva&data=" + info.dateStr;
            }
        },

        eventClick: function(info) {
            let r = info.event;
            let p = r.extendedProps;

            alert(
                "Reserva #" + r.id + "\n" +
                "Cliente: " + r.title + "\n" +
                "Telefone: " + p.telefone + "\n" +
                "Mesa: " + p.mesa + "\n" +
                "Obs: " + (p.observacoes || "Nenhuma")
            );
        }

    });

    calendar.render();
});
</script>
