'use strict';


const emoji = document.getElementById('emoji');
let clickTimeout = null;

// Click izquierdo: cambia a cara triste (pero espera un poco para no interferir con doble click)
emoji.addEventListener('click', () => {
    // Esperamos 250ms para ver si viene un dblclick
        emoji.textContent = '🙁';
});

// Doble click: cambia a cara molesta
emoji.addEventListener('dblclick', () => {
    emoji.textContent = '😒';
});

// Click derecho: vuelve a la cara sonriente y bloquea el menú contextual
emoji.addEventListener('contextmenu', (e) => {
    e.preventDefault(); // Evita mostrar el menú del navegador
    emoji.textContent = '😀';
});

