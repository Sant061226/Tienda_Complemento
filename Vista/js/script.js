$(document).ready(function () {
  verUsuarios();
  verCategorias();
  verProductos();
  verProductosTabla();
  verCategoriasTab();
  verCategoriasBot();
  verPedidos();
});
function verUsuarios() {
  $.post("Modelo/VerUsuarios.php", {}, function (respuesta) {
    $("#usuarios").html(respuesta);
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
