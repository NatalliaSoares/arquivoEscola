$(document).ready(function () {
  $('#menu').hide();
  $('.div-btn-menu').mousemove(function () {
    $('#menu').show();
  });
  $('#menu').mousemove(function () {
    $('#menu').show();
  });
  $('li').mousemove(function () {
    $(this).addClass('selecionado');
  });
  $('.div-btn-menu').mouseout(function () {
    $('#menu').hide();
  });
  $('#menu').mouseout(function () {
    $('#menu').hide();
  });
  $('li').mouseout(function () {
    $(this).removeClass('selecionado');
  });
});
