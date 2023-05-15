let nextBtn = document.getElementById('next-btn');
let backBtn = document.getElementById('back-btn');
let fields = document.querySelectorAll(".form__item");
let buttons = [nextBtn, backBtn];


function changeButton(button){
	nextBtn.classList.toggle('toggle-next__button--hidden');
	backBtn.classList.toggle('toggle-next__button--hidden');
	hiddenFields();
};


buttons.forEach( (button) => {
	button.addEventListener('click', changeButton);
});

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