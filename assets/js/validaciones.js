/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


/*$(document).ready(function() {
    alert("Listo");
    })*/

//Código para el formulario de las categorías

$("#form_categorias").submit(function(){
    var id = $("#id").val();
    var categoria = $("#categoria").val();
    
    if ($.trim(id)===''){
        alert('Agregar un ID / Basgall Juan');
        return false;
    }else if ($.trim(categoria)===''){
        alert('Agregar una categoria / Basgall Juan');
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
    
    if ($.trim(id)===''){
        errores.push("Agregar ID del producto");
        console.log(errores);
    };
    if ($.trim(nombreProducto)===''){
        errores.push("Agregar Nombre del producto");
    };
    if ($.trim(imagenProducto)===''){
        errores.push("Agregar Imagen del producto");
    };
    if ($.trim(descripcion)===''){
        errores.push("Agregar Descripción del producto");
    };
    if ($.trim(categoria)===''){
        errores.push("Agregar Categoria del producto");
    };
    if ($.trim(precio)===''){
        errores.push("Agregar Precio del producto");
    };
    if (errores.length > 0){
        errores.push("Basgall Juan A");
        alert(errores.join("\n"));
        errores = [];
        return false;
    };
    return true;
});