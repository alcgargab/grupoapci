$(document).ready(function() {
  var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral/";
  // var base = "https://www.apci.com.mx/";
  // ---------- execelcia ---------- //
  $("#cImgEx").mouseover(function() {
    $("#imgEx").attr("src", base +
      "images/Iconos/apci_icon_exelencia_h.webp");
    $("#cImgEx").css("background-color", "rgba(17, 65, 116, 0.7)");
  }).mouseout(function() {
    $("#imgEx").attr("src", base +
      "images/Iconos/apci_icon_exelencia.webp");
    $("#cImgEx").css("background-color", "rgba(252, 189, 73, 0.7)");
  });
  // ---------- respeto ---------- //
  $("#cImgRe").mouseover(function() {
    $("#imgRe").attr("src", base +
      "images/Iconos/apci_icon_respeto_h.webp");
    $("#cImgRe").css("background-color", "rgba(17, 65, 116, 0.7)");
  }).mouseout(function() {
    $("#imgRe").attr("src", base +
      "images/Iconos/apci_icon_respeto.webp");
    $("#cImgRe").css("background-color", "rgba(252, 189, 73, 0.7)");
  });
  // ---------- honestidad ---------- //
  $("#cImgHo").mouseover(function() {
    $("#imgHo").attr("src", base +
      "images/Iconos/apci_icon_honestidad_h.webp");
    $("#cImgHo").css("background-color", "rgba(17, 65, 116, 0.7)");
  }).mouseout(function() {
    $("#imgHo").attr("src", base +
      "images/Iconos/apci_icon_honestidad.webp");
    $("#cImgHo").css("background-color", "rgba(252, 189, 73, 0.7)");
  });
  // ---------- lealtad ---------- //
  $("#cImgLe").mouseover(function() {
    $("#imgLe").attr("src", base +
      "images/Iconos/apci_icon_lealtad_h.webp");
    $("#cImgLe").css("background-color", "rgba(17, 65, 116, 0.7)");
  }).mouseout(function() {
    $("#imgLe").attr("src", base +
      "images/Iconos/apci_icon_lealtad.webp");
    $("#cImgLe").css("background-color", "rgba(252, 189, 73, 0.7)");
  });
  // ---------- pasión ---------- //
  $("#cImgPa").mouseover(function() {
    $("#imgPa").attr("src", base +
      "images/Iconos/apci_icon_pasion_h.webp");
    $("#cImgPa").css("background-color", "rgba(17, 65, 116, 0.7)");
  }).mouseout(function() {
    $("#imgPa").attr("src", base +
      "images/Iconos/apci_icon_pasion.webp");
    $("#cImgPa").css("background-color", "rgba(252, 189, 73, 0.7)");
  });
  // ---------- transparencia ---------- //
  $("#cImgTr").mouseover(function() {
    $("#imgTr").attr("src", base +
      "images/Iconos/apci_icon_transparencia_h.webp");
    $("#cImgTr").css("background-color", "rgba(17, 65, 116, 0.7)");
  }).mouseout(function() {
    $("#imgTr").attr("src", base +
      "images/Iconos/apci_icon_transparencia.webp");
    $("#cImgTr").css("background-color", "rgba(252, 189, 73, 0.7)");
  });
  // ---------- footer ---------- //
  // ---------- caemi ---------- //
  $('#ap-li-c').mouseover(function() {
    $("#ap-li-c").addClass('ap-footer-mouseover');
  }).mouseout(function() {
    $("#ap-li-c").removeClass('ap-footer-mouseover');
  });
  // ---------- s.assper ---------- //
  $('#ap-li-s').mouseover(function() {
    $("#ap-li-s").addClass('ap-footer-mouseover');
  }).mouseout(function() {
    $("#ap-li-s").removeClass('ap-footer-mouseover');
  });
  // ---------- telecomunicaciones viales ---------- //
  $('#ap-li-t').mouseover(function() {
    $("#ap-li-t").addClass('ap-footer-mouseover');
  }).mouseout(function() {
    $("#ap-li-t").removeClass('ap-footer-mouseover');
  });
  // ---------- rheo ---------- //
  $('#ap-li-r').mouseover(function() {
    $("#ap-li-r").addClass('ap-footer-mouseover');
  }).mouseout(function() {
    $("#ap-li-r").removeClass('ap-footer-mouseover');
  });
});
