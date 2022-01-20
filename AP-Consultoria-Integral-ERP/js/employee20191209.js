$(document).ready(function() {
  // --------------- Lista de tareas --------------- //
  $("#task").on("keyup", function() {
    var task = $(this).val();
    var total_task = $('#total_task').val();
    var expresion = /^[0-9]*$/;
    if (expresion.test(task)) {
      if (task != "" || task > 0 || task != total_task) {
        $('#total_task').val(task);
        $('#list-task').html('');
        for (var i = 1; i <= task; i++) {
          $('#list-task').append(
            '<li class="list-group-item"> <div class="form-group"> <label for="task' +
            i + '"> Tarea ' + i + ':</label> <input id="task' +
            i +
            '" name="task' + i +
            '" type="text" class="form-control" placeholder="nombre de la tarea" required> </div> </li>'
          );
        }
      } else {
        $('#list-task').html('');
        $('#total_task').val('');
      }
    } else {
      $('#total_task').val('');
      $('#list-task').html('');
    }
  });
});

function validate_task() {
  // ---------- campo comentarios ---------- //
  var coment_e = $('#coment_e').val();
  if (coment_e != " ") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&/()=+\n_ ]*$/;
    if (!expresion.test(coment_e)) {
      $('#ap-error-finis-task').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de comentarios. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-finis-task').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de comentarios obligatorio. </div>'
    );
    return false;
  }
}
