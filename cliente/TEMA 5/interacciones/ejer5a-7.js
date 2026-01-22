'use strict';


let arrProvincias = ["Álava","Albacete","Alicante","Almería","Ávila","Badajoz","Baleares",
"Barcelona","Burgos","Cáceres","Cádiz","Castellón","Ciudad Real","Córdoba","Coruña","Cuenca",
"Girona","Granada","Guadalajara","Guipuzcoa","Huelva","Huesca","Jaén","León","Lleida",
"Rioja","Lugo","Madrid","Málaga", "Murcia","Navarra","Orense","Asturias","Palencia","Las Palmas",
"Pontevedra","Salamanca","Tenerife","Cantabria","Segovia","Sevilla","Soria","Tarragona","Teruel",
"Toledo","Valencia","Valladolid","Vizcaya","Zamora","Zaragoza","Ceuta","Melilla"];

const inputCP = document.getElementById('cp');
const pProvincia = document.getElementById('provincia');

inputCP.addEventListener('input', () => {
    let cp = inputCP.value;

    // Solo números
    cp = cp.replace(/\D/g, '');
    inputCP.value = cp;

    if(cp.length === 5) {
        let primeraParte = parseInt(cp.substring(0,2), 10);

        // Validar que las dos primeras cifras estén entre 01 y 52
        if(primeraParte >= 1 && primeraParte <= 52) {
            // Ajustamos índice (01 → 0)
            pProvincia.textContent = "Provincia: " + arrProvincias[primeraParte - 1];
        } else {
            pProvincia.textContent = "Código postal inválido";
        }
    } else {
        pProvincia.textContent = "";
    }
});
