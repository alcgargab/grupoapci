// // --------------- FULLCALENDAR --------------- //
// document.addEventListener('DOMContentLoaded', function() {
//   var calendarEl = document.getElementById('CalendarVacaciones');
//   var calendar = new FullCalendar.Calendar(calendarEl, {
//     plugins: ['dayGrid', 'interaction', 'list', 'timeGrid', 'bootstrap'],
//     locale: 'es',
//     timeZone: 'UTC',
//     themeSystem: 'bootstrap',
//     selectable: true,
//     header: {
//       left: 'prev,next, today',
//       center: 'title',
//       right: 'dayGridMonth,timeGridWeek,dayGridDay,listWeek, miBoton',
//     },
//     dateClick: function(date, view) {
//       // alert('Date: ' + date.dateStr);
//       $('#ModalVacaciones').modal();
//     },
//     events: [
//
//     ],
//     customButtons: {
//       miBoton: {
//         text: "Boton 1",
//         click: function() {
//           Swal.fire({
//             title: 'LISTO!',
//             text: '¡El Expediente se agrego correctamente!',
//             type: 'success',
//           });
//         }
//       }
//     }
//   });
//   calendar.render();
// });
