$(document).ready(function() {
  function vv3() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-3',
          success: function(venta) {
            $('#vd3').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv3, 1000);

  function vvm3() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb3 = $('#banderamb3').val();
    var banderamr3 = $('#banderamr3').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-3',
          success: function(venta) {
            $('#vm3').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb3 == 0) {
              Swal.fire({
                title: 'Angel López ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb3').val(1);
            } else if (venta == 121 && banderamb3 == 1) {
              $('#banderamb3').val(0);
            } else if (venta == 150 && banderamr3 == 0) {
              Swal.fire({
                title: 'Angel López ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr3').val(1);
            } else if (venta == 151 && banderamr3 == 1) {
              $('#banderamr3').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm3, 1000);

  function vv4() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-4',
          success: function(venta) {
            $('#vd4').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv4, 1000);

  function vvm4() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb4 = $('#banderamb4').val();
    var banderamr4 = $('#banderamr4').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-4',
          success: function(venta) {
            $('#vm4').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb4 == 0) {
              Swal.fire({
                title: 'Cinthia Bautista ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb4').val(1);
            } else if (venta == 121 && banderamb4 == 1) {
              $('#banderamb4').val(0);
            } else if (venta == 150 && banderamr4 == 0) {
              Swal.fire({
                title: 'Cinthia Bautista ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr4').val(1);
            } else if (venta == 151 && banderamr4 == 1) {
              $('#banderamr4').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm4, 1000);

  function vv5() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-5',
          success: function(venta) {
            $('#vd5').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv5, 1000);

  function vvm5() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb5 = $('#banderamb5').val();
    var banderamr5 = $('#banderamr5').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-5',
          success: function(venta) {
            $('#vm5').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb5 == 0) {
              Swal.fire({
                title: 'Ivan Flores ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb5').val(1);
            } else if (venta == 121 && banderamb5 == 1) {
              $('#banderamb5').val(0);
            } else if (venta == 150 && banderamr5 == 0) {
              Swal.fire({
                title: 'Ivan Flores ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr5').val(1);
            } else if (venta == 151 && banderamr5 == 1) {
              $('#banderamr5').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm5, 1000);

  function vv6() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-6',
          success: function(venta) {
            $('#vd6').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv6, 1000);

  function vvm6() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb6 = $('#banderamb6').val();
    var banderamr6 = $('#banderamr6').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-6',
          success: function(venta) {
            $('#vm6').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb6 == 0) {
              Swal.fire({
                title: 'Mendy Martinez ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb6').val(1);
            } else if (venta == 121 && banderamb6 == 1) {
              $('#banderamb6').val(0);
            } else if (venta == 150 && banderamr6 == 0) {
              Swal.fire({
                title: 'Mendy Martinez ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr6').val(1);
            } else if (venta == 151 && banderamr6 == 1) {
              $('#banderamr6').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm6, 1000);

  function vv7() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-7',
          success: function(venta) {
            $('#vd7').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv7, 1000);

  function vvm7() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb7 = $('#banderamb7').val();
    var banderamr7 = $('#banderamr7').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-7',
          success: function(venta) {
            $('#vm7').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb7 == 0) {
              Swal.fire({
                title: 'Sagrario Fernandez ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb7').val(1);
            } else if (venta == 121 && banderamb7 == 1) {
              $('#banderamb7').val(0);
            } else if (venta == 150 && banderamr7 == 0) {
              Swal.fire({
                title: 'Sagrario Fernandez ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr7').val(1);
            } else if (venta == 151 && banderamr7 == 1) {
              $('#banderamr7').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm7, 1000);

  function vv8() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-8',
          success: function(venta) {
            $('#vd8').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv8, 1000);

  function vvm8() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb8 = $('#banderamb8').val();
    var banderamr8 = $('#banderamr8').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-8',
          success: function(venta) {
            $('#vm8').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb8 == 0) {
              Swal.fire({
                title: 'Berenice Pineda ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb8').val(1);
            } else if (venta == 121 && banderamb8 == 1) {
              $('#banderamb8').val(0);
            } else if (venta == 150 && banderamr8 == 0) {
              Swal.fire({
                title: 'Berenice Pineda ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr8').val(1);
            } else if (venta == 151 && banderamr8 == 1) {
              $('#banderamr8').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm8, 1000);

  function vv9() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-9',
          success: function(venta) {
            $('#vd9').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv9, 1000);

  function vvm9() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb9 = $('#banderamb9').val();
    var banderamr9 = $('#banderamr9').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-9',
          success: function(venta) {
            $('#vm9').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb9 == 0) {
              Swal.fire({
                title: 'Georgina Arias ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb9').val(1);
            } else if (venta == 121 && banderamb9 == 1) {
              $('#banderamb9').val(0);
            } else if (venta == 150 && banderamr9 == 0) {
              Swal.fire({
                title: 'Georgina Arias ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr9').val(1);
            } else if (venta == 151 && banderamr9 == 1) {
              $('#banderamr9').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm9, 1000);

  function vv10() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-10',
          success: function(venta) {
            $('#vd10').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv10, 1000);

  function vvm10() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb10 = $('#banderamb10').val();
    var banderamr10 = $('#banderamr10').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-10',
          success: function(venta) {
            $('#vm10').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb10 == 0) {
              Swal.fire({
                title: 'Dafne Quiroz ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb10').val(1);
            } else if (venta == 121 && banderamb10 == 1) {
              $('#banderamb10').val(0);
            } else if (venta == 150 && banderamr10 == 0) {
              Swal.fire({
                title: 'Dafne Quiroz ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr10').val(1);
            } else if (venta == 151 && banderamr10 == 1) {
              $('#banderamr10').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm10, 1000);

  function vv11() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-11',
          success: function(venta) {
            $('#vd11').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv11, 1000);

  function vvm11() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb11 = $('#banderamb11').val();
    var banderamr11 = $('#banderamr11').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-11',
          success: function(venta) {
            $('#vm11').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb11 == 0) {
              Swal.fire({
                title: 'Gabriela Romero ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb11').val(1);
            } else if (venta == 121 && banderamb11 == 1) {
              $('#banderamb11').val(0);
            } else if (venta == 150 && banderamr11 == 0) {
              Swal.fire({
                title: 'Gabriela Romero ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr11').val(1);
            } else if (venta == 151 && banderamr11 == 1) {
              $('#banderamr11').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm11, 1000);

  function vv12() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-12',
          success: function(venta) {
            $('#vd12').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv12, 1000);

  function vvm12() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb12 = $('#banderamb12').val();
    var banderamr12 = $('#banderamr12').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-12',
          success: function(venta) {
            $('#vm12').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb12 == 0) {
              Swal.fire({
                title: 'Maria del Carmen Rodriguez ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb12').val(1);
            } else if (venta == 121 && banderamb12 == 1) {
              $('#banderamb12').val(0);
            } else if (venta == 150 && banderamr12 == 0) {
              Swal.fire({
                title: 'Maria del Carmen Rodriguez ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr12').val(1);
            } else if (venta == 151 && banderamr12 == 1) {
              $('#banderamr12').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm12, 1000);

  function vv13() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-dia-13',
          success: function(venta) {
            $('#vd13').html('<b>' + venta + '</b>')
          }
        });
      }
    }
  }
  setInterval(vv13, 1000);

  function vvm13() {
    // var base = "https://ventascc.televiales.net/";
    var base = "http://127.0.0.1/ventas-call-center/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    var banderamb13 = $('#banderamb13').val();
    var banderamr13 = $('#banderamr13').val();
    if (sesion == "ok") {
      if (tsesion == "5") {
        $.ajax({
          url: base + 'Ventas/ventas-del-mes-13',
          success: function(venta) {
            $('#vm13').html('<b>' + venta + '</b>');
            if (venta == 120 && banderamb13 == 0) {
              Swal.fire({
                title: 'Karla Balam ¡Feliciadades!',
                text: 'Has alcanzado la meta BÁSICA',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                },
                backdrop: 'rgba(0, 0, 0, 0.7)'
              });
              $('#banderamb13').val(1);
            } else if (venta == 121 && banderamb13 == 1) {
              $('#banderamb13').val(0);
            } else if (venta == 150 && banderamr13 == 0) {
              Swal.fire({
                title: 'Karla Balam ¡Feliciadades!',
                text: 'Has alcanzado la meta REAL',
                imageUrl: base + 'images/Icono/aplausos.gif',
                timer: 60000,
                animation: false,
                customClass: {
                  popup: 'animated tada'
                }
              });
              $('#banderamr13').val(1);
            } else if (venta == 151 && banderamr13 == 1) {
              $('#banderamr13').val(0);
            }
          }
        });
      }
    }
  }
  setInterval(vvm13, 1000);
});
