function buscarSucursal() {
    var sucursal = document.getElementById("buscarSucursal").value;
    /*location.href="buscarRecibidos.php"*/
   if(sucursal == ""){
        location.href="listar_sucursal.php"
        document.getElementById("tablaDatos").value;
        /*document.getElementById("tablaDatos").innerHTML = "pepe";*/
    }else{
        if(window.XMLHttpRequest){
            //code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }else{
            //code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200) {
                /*alert("llegue");*/
                document.getElementById("tablaDatos").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/proyectoInterciclo/supermarket/admin/controladores/admin/busquedas/busqueda_sucursal.php?nombresucursal="+sucursal,true);
        xmlhttp.send();
    }
    return false;
}