"use strict"; //obligatorio

/////////////////////////////////////////////
//funciones
/////////////////////////////////////////////




function calcularPH(ph){

    
    if (ph>=6.5 && ph<8.5){
        return "ph neutro";
    }

    if (ph>=8.5 && ph<11){
        return "ligeramente alcalino";
    }

    if (ph>11){
        return  "muy alcalino";
    }

    if (ph>=3.5 && ph<6.5){
        return "ligeramente acido";
    }

    if (ph<3.5){
        return "muy acido";
    }
}



function recuperarDatosyCalcular(){
    //recuperamos el input donde el usuario ha puesto el numero

    const txtPH=document.querySelector("#txtPH");

    //recuperamos el valor del input

    const ph=Number(txtPH.value);

    //const radio=document.querySelector("#txtRadio").value;

    //calculamos la solucion 

    const resultado= calcularPH(ph);

    //presentamos el resultado al usuario 
    presentarInformacion(ph, resultado);

}


function presentarInformacion(ph, resultado){

    //recuperamos la division del resultado

    const divResultado=document.querySelector("#divResultado");

    //creamos la cadena de caracteres que se mostrara

    //const solucion= num +" x " + 1 + "= " + resultado;

    //mostrara la cadenaa de caracterees 

    divResultado.innerHTML= resultado; 


}

//////////////////////////////////////////////
//main
/////////////////////////////////////////////


//1 recuperamos el boton  del html
const btn=document.querySelector("#btn");

//2 añadimos funcionalidad al boton
btn.addEventListener("click", recuperarDatosyCalcular);