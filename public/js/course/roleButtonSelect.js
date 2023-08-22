/*
	role: Valor de nuestro input.
	leftClick: Botton del lado izquierdo de nuestro (switch).
	rightClick: Botton del lado derecho de nuestro (switch).
*/
let role = document.getElementById('disabled');
const leftClick = document.getElementById('leftClick');
const rightClick = document.getElementById('rightClick');

/*
	Cambiamos el valor de 'role' según el click que hagamos.
*/
rightClick.addEventListener('click', () =>{
	role.value = "true";
});

leftClick.addEventListener('click', () =>{
	role.value = "false";
});