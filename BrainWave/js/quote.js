document.addEventListener("DOMContentLoaded", function () {
  var citaForm = document.getElementById("quoteForm");

  citaForm.addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar que el formulario se envíe por defecto

    // Obtener los valores del formulario
    var fecha = document.getElementById("fecha").value;
    var hora = document.getElementById("hora").value;

    // Obtener el ID del psicólogo y el nombre de usuario de la URL
    var urlParams = new URLSearchParams(window.location.search);
    var id_psicologo = urlParams.get("psicologo");
    var usuario = localStorage.getItem("user");

    console.log('usuario:'+usuario);

    // Crear un objeto con los datos a enviar
    var data = {
      fecha: fecha,
      hora: hora,
      id_psicologo: id_psicologo,
      usuario: usuario,
    };

    // Realizar la solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "programQuote.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          alert(xhr.responseText);
          var response = JSON.parse(xhr.responseText);
          if (response.status === "ok") {
            alert("Cita programada correctamente.");
            setTimeout(function () {
              window.location.href = `seeDate.php?user=${usuario}`;
            }, 1500);
          } else {
            console.log("Error al programar la cita. Inténtalo de nuevo.");
          }
          console.log(xhr.responseText);
        } else {
          console.error("Error en la solicitud: " + xhr.statusText);
          alert("Error al programar la cita. Inténtalo otra vez.");
        }
      }
    };

    // Convertir el objeto de datos a formato JSON y enviarlo
    xhr.send(JSON.stringify(data));
  });
});
