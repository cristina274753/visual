"use strict";

// objeto Equipo

class Equipo {
    constructor(id, nombre, deporte, entrenador) {
        this.id = id;
        this.nombre = nombre;
        this.deporte = deporte;
        this.entrenador = entrenador,
        this.jugadores = [];

    }

        altaEntrenador(entrenador){
       

        if (entrenador === this.entrenador) {
            return "Este entrenador ya tiene equipo.";  
        } else {

        this.entrenador = entrenador;
        return "Entrenador agregado al equipo";
    }
}

    altaJugador(jugador){
       const jugadorNuevo = this.jugadores.find(b => b === jugador.id);

        if (jugadorNuevo) {
            return "Este jugador ya esta en el equipo.";  
        } else {

        this.jugadores.push(jugador);
        return "Jugador agregado al equipo";
    }
    
  
}
}

// objeto Entrenador

class Entrenador {
    constructor(id, nombre, email) {
        this.id = id;
        this.nombre = nombre;
        this.email = email;
    }
    

    
}

// objeto jugador


class Jugador {
    constructor(id, nombre, posicion, dorsal) {
        this.id = id;
        this.nombre = nombre;
        this.posicion = posicion;
        this.dorsal = dorsal;
    }
    
  
}