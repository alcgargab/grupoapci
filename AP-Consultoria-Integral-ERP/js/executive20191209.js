$(document).ready(function() {
  // --------------- Lista de tareas --------------- //
  $("#task-executive").on("keyup", function() {
    var task = $(this).val();
    var total_task = $('#total_task').val();
    var expresion = /^[0-9]*$/;
    if (expresion.test(task)) {
      if (task != "" || task > 0 || task != total_task) {
        $('#total_task_executive').val(task);
        $('#list-task-executive').html('');
        for (var i = 1; i <= task; i++) {
          $('#list-task-executive').append(
            '<li class="list-group-item"> <div class="form-group float-left"> <label for="task' +
            i + '"> Tarea ' + i + ':</label> <input id="task' + i +
            '" name="task' + i +
            '" type="text" class="form-control" placeholder="nombre de la tarea" required> </div> <div class="form-group float-right"> <label for="task' +
            i + '"> Fecha de entrega ' + i +
            ':</label> <input id="date_task' + i +
            '" name="date_task' + i +
            '" type="date" class="form-control" required> </div> </li>'
          );
        }
      } else {
        $('#list-task-executive').html('');
        $('#total_task_executive').val('');
      }
    } else {
      $('#total_task_executive').val('');
      $('#list-task-executive').html('');
    }
  });
  // --------------- validamos si acepto o rechazo la tarea --------------- //
  $('#ap-btn-accept-task').click(function() {
    $('#ap-status-task').val('si');
  });
  $('#ap-btn-deny-task').click(function() {
    $('#ap-status-task').val('no');
  });
});
