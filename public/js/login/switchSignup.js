/*
	btn: Representa el color que identifica de que lado está nuestro switch.
	leftClick: botón del lado izquierdo de nuestro switch.
	rightClick: botón del lado derecho de nuestro switch.
	fields: obtenemos todos los campos de nuestro formulario.
*/
let btn = document.getElementById('btn');
let leftClick = document.getElementById('leftClick');
let rightClick = document.getElementById('rightClick');
let fields = document.querySelectorAll(".form__item");
let screenWidth = window.innerWidth; //obtiene el tamaño de la ventana.
let buttonLeftCSS = "155px";


/*
	Funcion que nos permite:
	1. Ocultar todos los campos que estaban visibles.
	2. Mostrar todos los campos que estaban ocultos.  
*/
function hiddenFields(){
	fields.forEach((input) => {
		input.classList.toggle("form__item--hidden");
	});
};


/*
	Si hacemos click en el lado izquierdo.
	Movemos el 'btn' y activamos los estilos
*/
leftClick.addEventListener('click', () => {
	btn.style.left = '0';
	setTimeout( function (){
		leftClick.classList.add("toggle-btn--checked");
		rightClick.classList.remove("toggle-btn--checked");
	}, 200);
	hiddenFields();
});


/*
	Si hacemos click en el lado derecho.
	Movemos el 'btn' y activamos los estilos
*/
rightClick.addEventListener('click', () => {
	btn.style.left = buttonLeftCSS;
	setTimeout( function (){
		leftClick.classList.remove("toggle-btn--checked");
		rightClick.classList.add("toggle-btn--checked");
	}, 200);
	hiddenFields();
});



/*Cambio de pantalla*/
window.onresize = function(){ //Se ejecuta cuando hay un cambio del tamaño.
	screenWidth = window.innerWidth; //obtiene el tamaño de la ventana.
	buttonChangeCss();
};

buttonChangeCss();
function buttonChangeCss(){
	if (screenWidth >= 501){
		buttonLeftCSS = "155px"
	}
	else{
		buttonLeftCSS = "125px"
	}
}