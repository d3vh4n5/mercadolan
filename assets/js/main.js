/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


$(document).ready(function(){
    if ( document.location.pathname === "/MIPROYECTO/index.php"){
	//alert("Página en construcción \nNo se puede comprar de momento");
    }
});

$("#btn_cancelar").click(function(){
	alert("Se canceló el envio del formulario");
        history.back();
        //document.location.href = './productos.php';
});
/*
$(".tarjetaProducto").click(function(){
    alert("Página en construcción \nNo se puede comprar de momento");
});
*/
/* Función para que no se scrolee el contenido del body cuando abro el menú hamburguesa*/
$(document).ready(function(){
    //var $popContainer = $('#check');
    var $body = $('html,body');

    $('#check').on('click', function() {
        //$popContainer.fadeIn();
        $body.addClass('block-scroll'); // clase de manejo
    });
    $('#check').on('click', function() {
        //$popContainer.fadeOut();
        $body.removeClass('block-scroll'); // clase de manejo
    });
});