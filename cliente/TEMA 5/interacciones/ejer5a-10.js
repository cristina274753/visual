'use strict';

const listaAlimentos = document.querySelectorAll('#lista-alimentos li');
const segundaDivision = document.getElementById('segunda-division');

listaAlimentos.forEach(item => {
    item.addEventListener('click', () => {
        const p = document.createElement('p');
        p.textContent = item.textContent;
        segundaDivision.appendChild(p);
    });
});
