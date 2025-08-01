// Desplaza la pagina a la sección de contacto

document.querySelector("form").addEventListener("submit", function() {
    setTimeout(function() {
        window.location.hash = "#contacto"; 
    }, 100); 
});

        