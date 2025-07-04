$(document).ready(function () {
  verUsuarios();
  verCategorias();
  verProductos();
  verProductosTabla();
  verCategoriasTab();
  verCategoriasBot();
  verPedidos();
  verPedUs()
});
function verUsuarios() {
  $.post("Modelo/VerUsuarios.php", {}, function (respuesta) {
    $("#usuarios").html(respuesta);
  });
}
function verPedUs() {
  $.post("Modelo/VerPedidosClientes.php", {}, function (respuesta) {
    $("#tebcli").html(respuesta);
  });
}
function verCategorias() {
  $.post("Modelo/VerCategorias.php", {}, function (respuesta) {
    $("#categorias").html(respuesta);
  });
}
function verCategoriasBot() {
  $.post("Modelo/VerCategoriasBot.php", {}, function (respuesta) {
    $("#catbo").html(respuesta);
  });
}
function verCategoriasTab() {
  $.post("Modelo/VerCategoriasTab.php", {}, function (respuesta) {
    $("#tabcat").html(respuesta);
  });
}
function verProductos() {
  $.post("Modelo/VerProductos.php", {}, function (respuesta) {
    $("#producto").html(respuesta);
  });
}
function verPedidos() {
  $.post("Modelo/VerPedidos.php", {}, function (respuesta) {
    $("#tebped").html(respuesta);
  });
}
function verProductosTabla() {
  $.post("Modelo/VerTabla.php", {}, function (respuesta) {
    $("#tablaprod").html(respuesta);
  });
}
function compraSimulada() {
  var id = $("#id").val();
  $.post(
    "index.php?accion=compraSimulada",
    {
      id: id,
    },
    function (documento) {
      $("#compra").html(documento);
    }
  );
}
$(document).on('click', '.filtro-categoria', function (e) {
  e.preventDefault();
  var id_categoria = $(this).data('id');
  $.post("Modelo/VerProductosFiltro.php", { id_categoria: id_categoria }, function (respuesta) {
    $("#producto").html(respuesta);
  });
});
$(document).on('click', '.filtro-categoria', function (e) {
  e.preventDefault();
  var id_categoria = $(this).data('id');
  // Quitar la clase activa de todos los botones
  $('.navbar button').removeClass('active');
  // Agregar la clase activa al botón presionado
  $(this).closest('button').addClass('active');
  $.post("Modelo/VerProductosFiltro.php", { id_categoria: id_categoria }, function (respuesta) {
    $("#producto").html(respuesta);
  });
});
$(document).ready(function() {
  $('#abrirModalCliente').click(function(e) {
    e.preventDefault();
    $('#modalCliente').fadeIn();
  });
  $('#cerrarModalCliente').click(function() {
    $('#modalCliente').fadeOut();
  });
  // Cierra el modal si se hace clic fuera del contenido
  $('#modalCliente').click(function(e) {
    if (e.target === this) $(this).fadeOut();
  });
});