/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */




$("#btn_cancelar").click(function(){
	alert("Se canceló el envio del formulario");
        document.location.href = './productos.php';
});
$("#btn_cancelar_cat").click(function(){
	//alert("Se canceló el envio del formulario");
        document.location.href = './categorias.php';
});

$(".tarjetaProducto").click(function(){
    alert("Página en construcción \nNo se puede comprar de momento");
});

$(document).ready(function(){
    if ( document.location.pathname === "/MIPROYECTO/index.php"){
	alert("Página en construcción \nNo se puede comprar de momento");
    };
});