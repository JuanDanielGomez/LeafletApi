var hamburguesaBoton = document.querySelector ('.hamburguesa__boton');
var celularNav = document.querySelector ('.celular');

function abrirBarra(){
	celularNav.classList.add('abrir');
}

function cerrarBarra(){
	celularNav.classList.remove('abrir');
}

hamburguesaBoton.addEventListener('click', abrirBarra);
celularNav.addEventListener('click', cerrarBarra);