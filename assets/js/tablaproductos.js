/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

window.onresize = function() { // Detectar cuando se cambia el tamaño de la ventana
  var width = window.innerWidth; // Obtener el ancho de la ventana
  if (width < 1640){
    var zoom = width / 1640; // Calcular el valor del zoom (800 es el ancho de la página original)
    document.body.style.zoom = zoom; // Establecer el valor del zoom en el cuerpo de la página     
  }
}

var width = window.innerWidth; // Obtener el ancho de la ventana
if (width < 1640){
    var zoom = width / 1640; // Calcular el valor del zoom (800 es el ancho de la página original)
    document.body.style.zoom = zoom; // Establecer el valor del zoom en el cuerpo de la página     
}

document.addEventListener('DOMContentLoaded', ()=>{

  const $tabla = document.getElementById('tablaCategorias')
  // const dataTable = new DataTable($tabla)

})