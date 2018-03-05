$(document).ready(function(){
  $("#inventary").click(function(){
      $("#submenu-list").slideToggle("slow");
  });

  $("#buscar-producto").click(function() {
    $("#modal-producto").show( "slow" );
  });

  $("#cerrar-producto").click(function() {
    $("#modal-producto").hide( "slow" );
  });
});
