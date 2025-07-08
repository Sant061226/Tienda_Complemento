$(document).ready(function () {
  verCategorias();
  verProductos();
  verProductosTabla();
  verCategoriasTab();
  verCategoriasBot();
  verPedidos();
  verPedUs();
  iniciarCarruselesAutomaticos();
  VerdetalleProducto();
  verCarrito();

});
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
$(document).ready(function () {
  $('#abrirModalCliente').click(function (e) {
    e.preventDefault();
    $('#modalCliente').fadeIn();
  });
  $('#cerrarModalCliente').click(function () {
    $('#modalCliente').fadeOut();
  });
  // Cierra el modal si se hace clic fuera del contenido
  $('#modalCliente').click(function (e) {
    if (e.target === this) $(this).fadeOut();
  });
});
var carruselTimers = {};

function iniciarCarruselesAutomaticos() {
  $('.carousel').each(function () {
    var $carousel = $(this);
    var $imgs = $carousel.find('.carousel-img');
    var carouselId = $carousel.data('prod');
    if ($imgs.length > 1) {
      // Evita múltiples intervalos para el mismo carrusel
      if (carruselTimers[carouselId]) {
        clearInterval(carruselTimers[carouselId]);
      }
      $imgs.hide().first().show();
      carruselTimers[carouselId] = setInterval(function () {
        var idx = $imgs.index($imgs.filter(':visible'));
        $imgs.eq(idx).hide();
        idx = (idx + 1) % $imgs.length;
        $imgs.eq(idx).show();
      }, 3000);
    }
  });
}

// Al cargar productos o filtrar
$(document).on('DOMSubtreeModified', '#producto', function () {
  iniciarCarruselesAutomaticos();
});


// Botones manuales
$(document).on('click', '.carousel .prev, .carousel .next', function () {
  var $carousel = $(this).closest('.carousel');
  var $imgs = $carousel.find('.carousel-img');
  var idx = $imgs.index($imgs.filter(':visible'));
  $imgs.eq(idx).hide();
  if ($(this).hasClass('next')) {
    idx = (idx + 1) % $imgs.length;
  } else {
    idx = (idx - 1 + $imgs.length) % $imgs.length;
  }
  $imgs.eq(idx).show();
});
// carrito 
function VerdetalleProducto() {
  var id = $("input[name='id']").val();

  $.post("Modelo/detalleProducto.php", { id: id }, function (respuesta) {
    $("#detalle-producto").html(respuesta);
  });

}

$('#btnAgregarCarrito').on('click', function (e) {
  e.preventDefault();
  var datos = $('#Form-agregarCarrito').serialize();
  $.post('index.php?accion=agregarCarrito', datos, function (respuesta) {
    verCarrito();
    alert('Producto añadido al carrito');
  });
});


function verCarrito() {
  $('#tabla-carrito').load('index.php?accion=verCarrito');
}




