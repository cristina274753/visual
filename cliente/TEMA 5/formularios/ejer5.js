'use strict';

    const divEditable = document.getElementById("divEditable");
    let fontSize = 14; // tamaño inicial

    document.addEventListener("keydown", function(event) {
      if (event.ctrlKey) {
        switch (event.key.toLowerCase()) {
          case "b": // Ctrl+b → negrita
            document.execCommand("bold");
            event.preventDefault();
            break;
          case "i": // Ctrl+i → cursiva
            document.execCommand("italic");
            event.preventDefault();
            break;
          case "u": // Ctrl+u → subrayado
            document.execCommand("underline");
            event.preventDefault();
            break;
          case "+": // Ctrl++ → aumentar tamaño
          case "=": // algunos teclados usan Ctrl+= para el "+"
            fontSize += 2;
            divEditable.style.fontSize = fontSize + "px";
            event.preventDefault();
            break;
          case "-": // Ctrl+- → disminuir tamaño
            if (fontSize > 6) { // límite mínimo
              fontSize -= 2;
              divEditable.style.fontSize = fontSize + "px";
            }
            event.preventDefault();
            break;
        }
      }
    });
