"use strict";

// funciones

// datos de prueba equipos
let Equipos = [];

const Equipo1 = new Equipo(1, "Los cachofieras", "Futbol");


// arrays de jugadores 
const Jugadores = [];
const Jugador1 = new Jugador(101, "Juan Perez", "Delantero", 9);
const Jugador2 = new Jugador(102, "Luis Gomez", "Defensa", 4);
const Jugador3 = new Jugador(103, "Carlos Ruiz", "Centrocampista", 8);

Jugadores.push(Jugador1);
Jugadores.push(Jugador2);
Jugadores.push(Jugador3);

// arrays de entrenadores
const Entrenadores = [];
const Entrenador1 = new Entrenador(201, "Miguel Sanchez", "churriana@gmail.com");
const Entrenador2 = new Entrenador(202, "Pedro Martinez", "pericoelmago@gmail.com");
Entrenadores.push(Entrenador1);
Entrenadores.push(Entrenador2);

Equipo1.altaJugador(Jugador1);
Equipo1.altaEntrenador(Entrenador1);

Equipos.push(Equipo1);







const registroEquipo = function() {

const idequipo = document.querySelector("#idEquipo").value.trim();
const nombreEquipo = document.querySelector("#nombreEquipo").value.trim();
const deporteEquipo = document.querySelector("#deporteEquipo").value.trim();

const idEquipo = parseInt(idequipo);

// comprobar que no exista ya el equipo
if (Equipos.some(equipo => equipo.id === idEquipo)) {
    alert("Equipo ya registrado");
    return;
}

const equipoNuevo = new Equipo (idEquipo, nombreEquipo, deporteEquipo);

Equipos.push(equipoNuevo);
alert("Equipo registrado correctamente.")


};

const registroEntrenador = function() {
  

        const txtEntrenador = document.querySelector("#idEntrenador").value.trim();
        const idEntrenador = parseInt(txtEntrenador);
        const nombreEntrenador = document.querySelector("#nombreEntrenador").value.trim();
        const emailEntrenador = document.querySelector("#emailEntrenador").value;

        const entrenador = new Entrenador (idEntrenador, nombreEntrenador, emailEntrenador);

        // comprobar que existe en el array de entrenadores
if (Entrenadores.some(entrenador => entrenador.id === idEntrenador)) {
    alert("Entrenador ya registrado");
    return;
}
    Entrenadores.push(entrenador);
    alert("Registrado con exito")
}

 


const registroJugador = function() {
  


const txtJugador = document.querySelector("#idJugador").value.trim();
const idJugador = parseInt(txtJugador);
const nombreJugador = document.querySelector("#nombreJugador").value.trim();
const posicionJugador = document.querySelector("#posicionJugador").value.trim();
const txtDorsal = document.querySelector("#dorsalJugador").value.trim();
const idDorsal = parseInt(idDorsal);

const jugador = new Jugador(idJugador, nombreJugador, posicionJugador, idDorsal);

if (Jugadores.some(jugador => jugador.id === idJugador)) {
    alert("Jugador ya registrado");
    return;
}

Jugadores.push(jugador);

};

const asignacionEntrenador = function() {
  


const idEquipo = document.querySelector("#idEquipoAsignar").value.trim();
const idEquipoAsignar = parseInt(idEquipo);
const idEntrenador = document.querySelector("#idEntrenadorAsignar").value.trim();
const idEntrenadorAsignar = parseInt(idEntrenador);



Equipos[idEquipoAsignar].altaEntrenador(idEntrenadorAsignar);


};

const asignacionJugador = function() {
  

const idEquipotxt = document.querySelector("#idEquipoJugador").value.trim();
const idEquipo = parseInt(idEquipotxt);
const idJugadorTxt = document.querySelector("#idJugadorAsignar").value.trim();
const idJugador = parseInt(idJugadorTxt);

Equipos[idEquipo].altaJugador(idJugador);


};



// main


// botones
const btnRegistrarEquipo = document.querySelector("#btnRegistrarEquipo");
const btnRegistrarEntrenador = document.querySelector("#btnRegistrarEntrenador");
const btnRegistrarJugador = document.querySelector("#btnRegistrarJugador");
const btnAsignarEntrenador = document.querySelector("#btnAsignarEntrenador");
const btnAsignarJugador = document.querySelector("#btnAsignarJugador");

// funcionalidad
btnRegistrarEquipo.addEventListener('click', registroEquipo);
btnRegistrarEntrenador.addEventListener('click', registroEntrenador );
btnRegistrarJugador.addEventListener('click', registroJugador);
btnAsignarEntrenador.addEventListener('click', asignacionEntrenador);
btnAsignarJugador.addEventListener('click', asignacionJugador);


// mostrar las tablas


const tablaEquipos = document.querySelector("#tablaEquipos");
const tablaEntrenadores = document.querySelector("#tablaEntrenadores");
const tablaJugadores = document.querySelector("#tablaJugadores");


// mostrar las tablas dinámicamente

// función para pintar la tabla de entrenadores

const pintarTablaEquipos = () => {
  const tablaEquipos = document.querySelector("#tablaEquipos");
  tablaEquipos.innerHTML = `
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Deporte</th>
      <th>Entrenador</th>
      <th>Jugadores</th>
    </tr>
  `;

  Equipos.forEach(equipo => {
    const entrenadorNombre = equipo.entrenador ? equipo.entrenador.nombre : "No asignado";
    const jugadoresNombres = equipo.jugadores.length > 0
      ? equipo.jugadores.map(jugador => jugador.nombre).join(", ")
      : "No hay jugadores"; 


    tablaEquipos.innerHTML += `
      <tr>
        <td>${equipo.id}</td>
        <td>${equipo.nombre}</td>
        <td>${equipo.deporte}</td>
        <td>${entrenadorNombre}</td>
        <td>${jugadoresNombres}</td>
      </tr>
    `;
  });
};

// funcion para pintar la tabla de entrenadores
const pintarTablaEntrenadores = () => {
  tablaEntrenadores.innerHTML = `
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Email</th>
    </tr>
  `;
  Entrenadores.forEach(entrenador => {
    tablaEntrenadores.innerHTML += `
      <tr>
        <td>${entrenador.id}</td>
        <td>${entrenador.nombre}</td>
        <td>${entrenador.email}</td>
      </tr>
    `;
  });
};

// función para pintar la tabla de jugadores
const pintarTablaJugadores = () => {
  tablaJugadores.innerHTML = `
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Posición</th>
      <th>Dorsal</th>
    </tr>
  `;
  Jugadores.forEach(jugador => {
    tablaJugadores.innerHTML += `
      <tr>
        <td>${jugador.id}</td>
        <td>${jugador.nombre}</td>
        <td>${jugador.posicion}</td>
        <td>${jugador.dorsal}</td>
      </tr>
    `;
  });
};

// llamar a las funciones para pintar las tablas después de un registro o asignación
pintarTablaEquipos();
pintarTablaEntrenadores();
pintarTablaJugadores();