
"use strict"; 
/////////////////////////////////////////////
//funciones
/////////////////////////////////////////////

/**
 *Calcula la multiplicacion
 *
 * @param {number} num
 * @return {number} 
 */
function calcularMultiplicacion(num){
    return num * 1 ;
}




function recuperarDatosyCalcular(){
    //recuperamos el input donde el usuario ha puesto el numero

    const txtNum=document.querySelector("#txtNum");

    //recuperamos el valor del input

    const num=Number(txtNum.value);

    //const radio=document.querySelector("#txtRadio").value;

    //calculamos la solucion 

    const resultado= calcularMultiplicacion(num);

    //presentamos el resultado al usuario 
    presentarInformacion(num, resultado);

}
 

/**
 *presenta el resultado al usuario en la web 
 *
 * @param {number} num
 * @param {number} resultado
 */
function presentarInformacion(num, resultado){

    //recuperamos la division del resultado

    const divResultado=document.querySelector("#divResultado");

    //creamos la cadena de caracteres que se mostrara

    const solucion= num +" x " + 1 + "= " + resultado;

    //mostrara la cadenaa de caracterees 

    divResultado.innerHTML= solucion; 


}




//////////////////////////////////////////////
//main
/////////////////////////////////////////////


//1 recuperamos el boton  del html
const btnCalcular=document.querySelector("#btnCalcular");

//2 añadimos funcionalidad al boton
btnCalcular.addEventListener("click", recuperarDatosyCalcular);