'use strict';

///////////////////////////////////////////////////////////////////////////////////////////////
//hospital
///////////////////////////////////////////////////////////////////////////////////////////////

function Hospital() {
    
    this.medicos=[];
    this.citas=[];
}



Hospital.prototype.altaMedico= function(oMedico){  

    const medico = this.medicos.find(b => b.idMedico === oMedico.idMedico);

        if (medico) {

            const error="<p>Error: idMedico registrado previamente</p>";

            const mensaje = document.querySelector("#listado");

            return mensaje.innerHTML = error;
; 
        } else {

            const confirmacion= "<p>Alta de medico OK</p>";

            this.medicos.push(oMedico);

            const mensaje = document.querySelector("#listado");

        return mensaje.innerHTML = confirmacion;
        }
}

Hospital.prototype.altaCita= function(oCita){  
    
    

    this.citas.push(oCita);

    const confirmacion= "<p>Alta de medico OK</p>";

    const mensaje = document.querySelector("#listado");
        
    return mensaje.innerHTML = confirmacion;

}

Hospital.prototype.listadoMedicos= function(){  

    let ordenarbtn=true;

    /*inicio tabla*/
    let tabla=  `<table> 
            <caption>Listado Medicos</caption>
            <thead>
            <tr>
                <th>idMedico</th>
                <th>colegiado</th>
            </tr>
            </thead>
            <tbody>`;
    


        tabla+= medicos.toHTMLRow;
    

    /*fin tabla*/
    tabla+=`</tbody>
            <tfoot>
                <tr>
                <th colspan="2">Medicos sin email: </th>
                </tr>
            </tfoot>
            </table> <button type="button" id="ordenar">ordenar por medicos</button>`; //añadimos el boton 
  
  return tabla;
    
}

Hospital.prototype.listadoCitas= function(){  
    
     /*inicio tabla*/
    let tabla=  `<table> 
            <caption>Listado Citas</caption>
            <thead>
            <tr>
                <th>idMedico</th>
                <th>medico</th>
                <th>paciente</th>
                <th>fecha</th>
                <th>hora</th>
            </tr>
            </thead>
            <tbody>`;
    


    for (let medico of this.medicos){
        medico= medico.toHTMLRow();
        tabla+=medico;
    }

    /*fin tabla*/
    tabla+=`</tbody></table>`;
  
  return tabla;
}

Hospital.prototype.getNombreMedico= function(idMedico){  
    
    return Medico.nombre;
}

Hospital.prototype.ordenarMedicos= function(tipo){  /*fila de la tabla*/
    
    let arrOrd= medicos.toSorted((p1,p2)=> p1.nombre.localeCompare(p2.nombre, "es"));

    listadoMedicos();
    return ;
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//medico
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Medico{

    constructor(idMedico, colegiado) {
        this.idMedico = idMedico;
        this.colegiado = colegiado;
    }

    toHTMLRow() {

        let fila="";

        for (medico of Hospital.medicos){

            fila+= "<td>MEDICO--> id:" + this.idMedico + " - colegiado: " + this.colegiado+ "</td>";
        }
        

        return fila;
    }

}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//cita
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


class Cita {

    constructor(idMedico, paciente, fecha, hora) {
        this.idMedico = idMedico;
        this.paciente = paciente;
        this.fecha = fecha;
        this.hora = hora;
    }

    toHTMLRow(nombreMedico) {
        let detalles = "<td>CITA--> id:" + this.idMedico + " - paciente: " + this.paciente+ " - fecha: " + this.fecha+ " - hora: "+ this.hora;+ "</td>"
        return detalles;
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Persona
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function Persona (nombre, telefono, email){
  Medico.call(this, idMedico, colegiado);
  this.nombre = nombre;
  this.telefono = telefono;
  this.email=email;
}




