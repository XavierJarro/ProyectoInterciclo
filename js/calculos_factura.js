

function ShowSelected()
{
/* Para obtener el valor */
var cod = document.getElementById("cantidad").value;
alert(cod);
 
/* Para obtener el texto */
var combo = document.getElementById("cantidad");
var selected = combo.options[combo.selectedIndex].text;
alert(selected);
}