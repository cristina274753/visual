"use strict"; //obligatorio

let cadena= "* Uno\n* Dos\n* Tres \n* Cuatro\n";

cadena=cadena.replaceAll("\n", "");
cadena=cadena.replaceAll(" ", "");

alert(cadena);
cadena= cadena.split("*");
alert(cadena);


let sol= "<ul><li>"+ cadena[1] +"</li><li>"+ cadena[2]+ "</li><li>" + cadena[3]+ "</li><li>" + cadena[4] + "</li></ul>";

alert (sol);

