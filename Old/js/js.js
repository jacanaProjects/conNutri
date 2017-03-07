function setarAtributo(idElemento,atributo,valorAtributo){
	$x = document.getElementById(idElemento);
	$x.setAttribute(atributo,valorAtributo);
}
function removeAtributo(idElemento,atributo){
	$x = document.getElementById(idElemento);
	$x.removeAttribute(atributo);
}