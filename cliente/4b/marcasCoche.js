"use strict"; //obligatorio


let coches=["Mazda", "Peugeot", "Renault", "Nissan", "Kia"];

coches.splice(1, 0, "seat");

coches.splice(1,1,"mitsubishi");

let masDe4=coches.filter(c=>c.length>4);

 

