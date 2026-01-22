'use strict';

 function comprobar() {
      // Obtener los checkbox
      const manana = document.getElementById("manana");
      const tarde = document.getElementById("tarde");
      const noche = document.getElementById("noche");
      
      // Crear lista de seleccionados
      let seleccionados = [];
      if (manana.checked) seleccionados.push("Mañana");
      if (tarde.checked) seleccionados.push("Tarde");
      if (noche.checked) seleccionados.push("Noche");
      
      const resultadoDiv = document.getElementById("resultado");
      
      // Validar condiciones
      if (seleccionados.length === 0 || seleccionados.length === 3) {
        resultadoDiv.innerHTML = "<span class='error'>Error: Debes seleccionar al menos una opción y como máximo dos.</span>";
      } else {
        resultadoDiv.innerHTML = "<span class='ok'>Has seleccionado: " + seleccionados.join(", ") + "</span>";
      }
    }