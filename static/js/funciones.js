function verificar(){
    
    var capa = document.getElementById('contenedor');
    var dato = document.getElementById('opcion').value;
    
    var direccion = "../view/vistaProfesor.php";
    
    if(dato=="registraProfesor"){
        direccion = "../view/vistaProfesor.php";
    }else if(dato=="reporteEspecifico"){
        direccion = "../view/reporteProfesorEspecifico.php";
    }else if(dato=="reporteDetalle"){
        direccion = "../view/reporteProfesorDetalle.php";
    }
    
    
    var ajax = new XMLHttpRequest();
    ajax.open("get",direccion,true);
    ajax.send(null);
    ajax.onreadystatechange=function(){
       
        if(ajax.readyState==3){
            capa.innerHTML="<div> Procesando...</div>";
        }else if(ajax.readyState==4){
            capa.innerHTML=ajax.responseText;
        }
    };  
}
