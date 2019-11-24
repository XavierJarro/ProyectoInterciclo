function getURL()
{
var dir = newFunction();
dir += document.getElementById('cantidadproducto').value;

window.location.href=dir;

    function newFunction() {
        return "../../controladores/usuario/pedidos/pedido_usuario.php?cantpro=";
    }
}