// Desplaza la pagina a la sección de contacto

document.querySelector("form").addEventListener("submit", function() {
    setTimeout(function() {
        window.location.hash = "#contacto"; 
    }, 100); 
});   

// Valida los datos suministrados en el login por parte de los usuarios
function validarFormulario() {
  const usuario = document.forms["login"]["usuario"].value;
  const clave = document.forms["login"]["clave"].value;
  if (usuario == "" || clave == "") {
    alert("Todos los campos son obligatorios.");
    return false;
  }
}
