'use strict';

// Array para almacenar los votos
    const votos = [];

    // Función para votar
    function votar() {
      const sabor = document.getElementById("sabor").value;
      const notaSeleccionada = document.querySelector('input[name="nota"]:checked');
      
      if (!notaSeleccionada) {
        alert("Por favor, selecciona una puntuación.");
        return;
      }
      
      const nota = parseInt(notaSeleccionada.value);
      
      // Guardar en el array como objeto
      votos.push({ sabor: sabor, nota: nota });
      alert("¡Voto registrado!");
    }

    // Función para mostrar resultados
    function mostrarResultados() {
      if (votos.length === 0) {
        alert("No hay votos registrados todavía.");
        return;
      }
      
      // Objeto para acumular resultados por sabor
      const resultados = {
        vainilla: { total: 0, suma: 0, maximos: 0 },
        fresa: { total: 0, suma: 0, maximos: 0 },
        chocolate: { total: 0, suma: 0, maximos: 0 },
        nata: { total: 0, suma: 0, maximos: 0 }
      };
      
      // Procesar votos
      votos.forEach(voto => {
        const r = resultados[voto.sabor];
        r.total++;
        r.suma += voto.nota;
        if (voto.nota === 5) r.maximos++;
      });
      
      // Construir mensaje
      let mensaje = "Resultados:\n\n";
      for (const sabor in resultados) {
        const r = resultados[sabor];
        if (r.total > 0) {
          const media = (r.suma / r.total).toFixed(2);
          mensaje += `${sabor} → Votos: ${r.total}, Media: ${media}, Máximos: ${r.maximos}\n`;
        } else {
          mensaje += `${sabor} → Sin votos\n`;
        }
      }
      
      alert(mensaje);
    }