/*
	btn: Representa el color que identifica de que lado está nuestro switch.
	leftClick: botón del lado izquierdo de nuestro switch.
	rightClick: botón del lado derecho de nuestro switch.
*/
let btn = document.getElementById('btn');
let leftClick = document.getElementById('leftClick');
let rightClick = document.getElementById('rightClick');


/*
	Si hacemos click en el lado izquierdo.
	Movemos el 'btn' y activamos los estilos
*/
leftClick.addEventListener('click', () => {
	btn.style.left = '0';
	setTimeout( function (){
		leftClick.classList.toggle("toggle-btn--checked");
		rightClick.classList.toggle("toggle-btn--checked");
	}, 200);
});


/*
	Si hacemos click en el lado derecho.
	Movemos el 'btn' y activamos los estilos
*/
rightClick.addEventListener('click', () => {
	btn.style.left = '155px';
	setTimeout( function (){
		leftClick.classList.toggle("toggle-btn--checked");
		rightClick.classList.toggle("toggle-btn--checked");
	}, 200);
});