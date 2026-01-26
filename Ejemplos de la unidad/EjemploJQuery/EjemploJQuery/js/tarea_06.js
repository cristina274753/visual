var tamano=14;
var tamano_imagen=10;
var ultima_noticia="false";
var modo_oscuro="false"

$(document).ready(function(){
    function inserta_historico(cadena){
        var color;
        $(".historico").append("<p class='texto'>"+cadena+"</p>");
       
        color=$(".texto").css("color");
        
        $(".historico p").css("color",color);
    };

    // definimos el botón iniciar pedido. Quitamos la imagen con un efecto y hacemos visble las zonas del pedido.
    $("button").on("click",function(){
        $("button").css("color","black");
        $("button").css("font-weight","normal");
        $(this).css("color","red");
        $(this).css("font-weight","bold");

    });

    $("a").on("click",function(){
        $("a").css("color","blue");
        $("a").css("font-weight","normal");
        $(this).css("color","red");
        $(this).css("font-weight","bold");

    });

    // botón aumento tamaño
    $("#T_mas").on("click",function(){
        
        if (tamano<20) {
            tamano=tamano+1;
            tamano_imagen=tamano_imagen-0.5;
    
            $(".texto").css("font-size",tamano+"px");
            $(".tamano_fuente").html("Tamaño fuente: "+tamano+"px");
            $(".img_collage").css("width",tamano_imagen+"rem");
            inserta_historico("Aumenta Fuente")

        }
    });

    // botón disminuye tamaño
    $("#T_menos").on("click",function(){
        if (tamano>14) {
            tamano=tamano-1;
            tamano_imagen=tamano_imagen+0.5;
    
            $(".texto").css("font-size",tamano+"px");
            $(".tamano_fuente").html("Tamaño fuente: "+tamano+"px");
            $(".img_collage").css("width",tamano_imagen+"rem");
            inserta_historico("Reduce Fuente")
        }    
    });

    // botón modo oscuro
    $("#oscuro").on("click",function(){
        $(".texto").css("color","white");
        $("h2").css("color","green");

        $("body").css("background-color","black");
//        $("body").css("background-image","none");
          modo_oscuro="true";
          inserta_historico("Modo Oscuro")

    });

    $("#breve").on("click",function(){
        $(".cuerpo_noticia").slideUp(1200);
        inserta_historico("Web Modo Simplificada")

    });
    
    $(".titulo_noticia").on("click",function(){
        $(this).next(".cuerpo_noticia").slideToggle(1200);
    });

    $("#s_fuente").on("change", function() {        
        var tipo_fuente=$("#s_fuente").val();

        if (tipo_fuente==2) {
            $(".texto,h2").css("font-family","mi-fuente");
        } else if (tipo_fuente==3) {
            $(".texto,h2").css("font-family","Delicious Handrawn");
        } else if (tipo_fuente==1) {
            $(".texto,h2").css("font-family","Verdana");
        }
        inserta_historico("Cambio de fuente")
    });

    $("#ultima").on("click",function(){
        if (ultima_noticia=="false") {
     
            $(".navegacion ul li:first ").before("<li><a>Ultima Noticia</a></li>");        
            $(".navegacion ul li:first ").css("margin","auto 30px");        
            $(".navegacion ul li:first a ").css("color","red");        
            $(".navegacion ul li:first ").css("font-size","20px");        
            $(".noticias .noticia:first").before("<div id='ultima_noticia' class='noticia'><h2 class='titulo_noticia titulo_ultima_noticia'>Última noticia</h2></div>");
            $(".noticias .noticia:first h2").after("<div class='cuerpo_noticia'></div>");
            $(".noticias .noticia:first .cuerpo_noticia").prepend("<p class='texto'>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas 'Letraset', las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>");
            if (modo_oscuro=="true"){
                $(".noticias .noticia:first .cuerpo_noticia p").css("color","white");
            }
            $(".noticias .noticia:first .cuerpo_noticia").append("<img class='img_collage' id='imgU' src='./img/img2.jpeg' alt='Descirpción'>");
            $(".noticias .noticia:first").hide().fadeIn(2000);
            ultima_noticia="true";

            $(".noticias .noticia:first ").on("click", ".titulo_noticia", function() {
                $(".cuerpo_noticia:first").slideToggle(800);
            });

            $(".navegacion ul li:first a").attr("href","#ultima_noticia");
            $(this).hide();
            inserta_historico("Última noticia");       

     
        }
    });
   
   
    $("#reset").on("click",function(){
        $("h2").css("color","black");
        //$("body").css("background-image","url(../img/fondo2.jpg)");//
        $("body").css("background-color","white");
        $(".texto").css("font-size",+"14px");
        $(".tamano_fuente").html("Tamaño fuente: 14px");
        if (modo_oscuro=="true"){
            $(".texto").css("color","black");
        };
        $(".img_collage").css("width","10rem");
        $(".texto,h2").css("font-family","Verdana");
        $(".cuerpo_noticia").slideDown(1000);
        $("button").css("color","black");
        $("button").css("font-weight","normal");
        $("a").css("color","blue");
        $("a").css("font-weight","normal");
        $("#ultima").show();
        if (ultima_noticia=="true"){
            $("#ultima_noticia").remove();
            $(".navegacion ul li:first ").remove();
            ultima_noticia="false";    
        }
        
        $(".historico p").remove();

    });

   
    

    $("#estado").on("click",function(){
        var estado=$("#estado").html();

        if (estado=="Ocultar"){
            $(".menu>p").css("display","none");
            $(".botones>*").css("display","none");
            $(".seleccion_fuente").css("display","none");
            $(".menu").css("width","100px");
            $(".botones").css("width","80px");
            $("#estado").html("Mostrar");
            $("#estado").css("display","inline");
            $(".botones").css("display","inline");
            $(".barra_fuentes").hide();

            inserta_historico("Ocultar opciones de accesibilidad")

        }else{
            $(".menu>p").css("display","inline");
            $(".botones>*").css("display","inline");
            $(".seleccion_fuente").css("display","inline");
            $(".menu").css("width","100%");
            $(".botones").css("width","auto");
            $("#estado").html("Ocultar");
            $(".barra_fuentes").show();

            inserta_historico("Mostrar opciones de accesibilidad");
            
        }

    });
});
