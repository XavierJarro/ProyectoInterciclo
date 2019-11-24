function buscarProducto() {
    var producto = document.getElementById("buscarProducto").value;
    /*location.href="buscarRecibidos.php"*/
   if(producto == ""){
        location.href="listar_producto.php"
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
        xmlhttp.open("GET","/proyectoInterciclo/supermarket/admin/controladores/admin/busquedas/busqueda_producto.php?productonombre="+producto,true);
        xmlhttp.send();
    }
    return false;
}