
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
