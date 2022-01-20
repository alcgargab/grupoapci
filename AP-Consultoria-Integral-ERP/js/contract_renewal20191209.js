// --------------- VALIDAR PROXIMA FIRMA DE CONTRATOS --------------- //
$(document).ready(function() {
  $("#btnValidarContratos").click(function() {
    var total = $("#totalRegistros").val();
    for (var i = 0; i < total; i++) {
      var fechahoy = new Date();
      var newfecha = fechahoy.getFullYear() + "-" + ("0" + (fechahoy.getMonth() +
        1)).slice(-2) + "-" + fechahoy.getDate();
      var fecha = $("#proximaFecha" + i).val();
      if (newfecha == fecha) {
        Swal.fire({
          title: '¡ATENCIÓN!',
          text: '¡El día de hoy hay empleados que deben de firmar contrato!',
          type: 'info',
          timer: 3000
        });
      } else {
        // Swal.fire({
        //   title: '¡Relajate!',
        //   text: '¡Hoy NO hay empleados que deben de firmar contrato!',
        //   type: 'error',
        //   timer: 2150
        // });
      }
    }
  });
});
