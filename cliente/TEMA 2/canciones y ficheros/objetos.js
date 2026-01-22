'use strict';

class Fichero{  /*clase fichero*/
  constructor(nombreFichero,tamaño){
    this.nombreFichero = nombreFichero;
    this.tamaño = tamaño;
  }


  /*metodos*/
  extensión(){  /*devuelve la extension*/
    let pos = this.nombreFichero.lastIndexOf(".");
    if(pos==-1)
      return "";

    return this.nombreFichero.slice(pos +1 );
  }

  getDatos(){ /*devuelve nombre y tamaño*/
    return `Fichero: ${this.nombreFichero} (${this.tamaño} MB)`;
  }
}




class Canción extends Fichero{  /*clase cancion que extiende de fichero */
  constructor(nombreFichero, tamaño, nombreCanción, duración){
    super(nombreFichero, tamaño);
    this.nombreCanción = nombreCanción;
    this.duración = duración;
  }

  getDatos(){
    return `Canción: ${this.nombreCanción} (${this.duración}seg. ${this.tamaño} MB)`;
  }
}