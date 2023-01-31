/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

/* Las validaciones de esta manera no permiten que se
 * ingresen espacios en blanco, ni uno ni varios, ya que 
 * con el "required" del HTML, podes pasarlo ingresando
 * un espacio en blanco y no te sale el aviso de "requerido",
 * pero con estas validaciones en JS evitamos ese problema. */


function iniciar(){
    document.elformulario.addEventListener("invalid", validacion, true);
    document.getElementById('enviar').addEventListener('click', enviar, false);
    document.elformulario.addEventListener('input', controlar,false);
}
function validacion(e) {
    var elemento = e.target;
    elemento.style.background='pink';
}
function controlar(e) {
    var elemento = e.target;
    if (elemento.validity.valid){
        elemento.style.background='lightgreen';
    }else{
        elemento.style.background='pink';
    }
}
function enviar(){
    var valido = document.elformulario.checkValidity();
    if (valido) {
        document.elformulariosubmit();
    }
}
window.addEventListener('load', iniciar, false);

//Código para el formulario de las categorías

$("#form_categorias").submit(function(){
    var categoria = $("#categoria").val();
    if ($.trim(categoria)===''){
        alert('Espacio en blanco en el nombre de la categoria.. \n\n Elimínelo y coloque un nombre correcto por favor.');
        return false;
    }
    return true;
});

//Código para el formulario de productos



$("#form_productos").submit(function(){
    var id = $("#pId").val();
    var nombreProducto = $("#pNombre").val();
    var imagenProducto = $("#pImagen").val();
    var categoria = $("#pCategoria").val();
    var precio = $("#pPrecio").val();
    var descripcion = $("#pDescripcion").val();
    var errores = [];
    
    if ($.trim(nombreProducto)===''){
        errores.push("Espacio en blanco en: Nombre del producto");
    };
    if ($.trim(imagenProducto)===''){
        errores.push("Agregar Imagen del producto");
    };
    if ($.trim(descripcion)===''){
        errores.push("Espacio en blanco en: Descripción del producto");
    };
    if ($.trim(precio)===''){
        errores.push("Agregar Precio del producto");
    };
    if (precio <= 0){
        errores.push("El precio no puede ser negativo ni ser nulo");
    }
    if (errores.length > 0){
        errores.push("Por favor elimine los espacios en blanco y coloque la información correcta para continuar.");
        alert(errores.join("\n"));
        errores = [];
        return false;
    };
    return true;
});