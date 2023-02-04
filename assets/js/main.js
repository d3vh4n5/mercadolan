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

/*============ CARRUSEL HECHO POR MI ==============*/


let imagenes = $('.imagen');
let puntos = $('.punto');
let posicion = 1;


function posicionUno(){
    posicion = 1;
    imagenes.css({"left": "0"})
    puntos.css({"background": "var(--nofocusPunto)"})
    $('.uno').css({"background": "var(--focusPunto)"})
}
function posicionDos(){
    posicion = 2;
    imagenes.css({"left": "-100%"})
    puntos.css({"background": "var(--nofocusPunto)"})
    $('.dos').css({"background": "var(--focusPunto)"})
}
function posicionTres(){
    posicion = 3;
    imagenes.css({"left": "-200%"})
    puntos.css({"background": "var(--nofocusPunto)"})
    $('.tres').css({"background": "var(--focusPunto)"})
}


function moverCarrusel(boton){
    
    if (posicion === 1 && boton ==='adelante'){
        posicionDos()
    }else if(posicion === 1 && boton ==='atras'){
        posicionTres()
    }else if (posicion === 2 && boton ==='adelante'){
        posicionTres()
    }else if (posicion === 2 && boton ==='atras'){
        posicionUno()
    }else if (posicion === 3 && boton ==='adelante'){
        posicionUno()
    } else {
        posicionDos()
    }
}

$('.atras').click(function(){
    moverCarrusel('atras');
    clearInterval(refrescarCarrusel);
    setTimeout(()=>{
        refrescarCarrusel = setInterval(()=>{moverCarrusel('adelante')},6000)
        return
    },4000)
})
$('.adelante').click(function(){
    moverCarrusel('adelante');
    clearInterval(refrescarCarrusel);
    setTimeout(()=>{
        refrescarCarrusel = setInterval(()=>{moverCarrusel('adelante')},6000)
        return
    },4000)
})
refrescarCarrusel = setInterval(()=>{moverCarrusel('adelante')},6000)


/*==== carrusel tarjetas =====*/

let movimientos = 1;
let carrusel = $('.contenedorTarjetasCarrusel');
let distancia = 0;
function moverCarruselTarjetas(boton){
    //let tarjetas = $('.tarjetaProducto').length/2;/*Divido por 2 porque puse tambien la lsita de tarjetas*/
    //Termine seleccionando con JS vanila porque el jQuery no me seleccionaba la
    //subclase tarjetaCarrusel
    let tarjetas = document.getElementsByClassName("tarjetaCarrusel");
    tarjetas = tarjetas.length;
    console.log(tarjetas);
    
    console.log('Movimientos: '+ movimientos);
    
    if (movimientos === (tarjetas-4) && boton === 'adelante'){
        console.log('apago boton adelante');
        $('.adelanteFila').css({"display": "none"});
        $('.atrasFila').css({"display": "block"});
    }else if(movimientos ===1 && boton === 'atras'){
        console.log('apago boton atras')
        $('.atrasFila').css({"display": "none"});
        $('.aelanteFila').css({"display": "block"});
    }else if (boton === "adelante" && movimientos !== (tarjetas-4)){
        distancia = distancia + 240;
        console.log('distancia: '+distancia)
        movimientos++;
        $('.atrasFila').css({"display": "block"});
        carrusel.css({"left": "-"+distancia+"px"});
    }else if (boton === "atras" && movimientos !== 1){
        distancia = distancia - 240;
        console.log('distancia: '+distancia)
        movimientos--;
        $('.adelanteFila').css({"display": "block"});
        carrusel.css({"left": "-"+distancia+"px"});
    }
    
}

$('.atrasFila').click(function(){moverCarruselTarjetas('atras');});
$('.adelanteFila').click(function(){moverCarruselTarjetas('adelante');});
