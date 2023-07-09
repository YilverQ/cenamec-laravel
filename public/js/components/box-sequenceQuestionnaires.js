let sequence__item = document.querySelectorAll(".sequence__item");
let buttonLeft = document.getElementById('leftButton');
let rightButton = document.getElementById('rightButton');
let arrow_next = document.querySelector('.buttons-arrows__arrow--next');
let arrow_after = document.querySelector('.buttons-arrows__arrow--after');
let superButton = document.getElementById('buttonSuperHidden');
let questionnaires = document.querySelectorAll('.question');
let state = 0;


/* Actualizamos la secuencia */
sequence__item.forEach( (item, key) => {
	item.addEventListener('click', ()=> {
		state = key;
		changeSequence(state);
		changeNoteUp(state);
	});
});

arrow_next.addEventListener('click', ()=> {
	state ++;
	changeSequence(state);
	changeNoteRight(state);
});

arrow_after.addEventListener('click', ()=> {
	state --;
	changeSequence(state);
	changeNoteLeft(state);
});


/* Comprobamos si el botón "atras" debe verse. 
	Solamente se podrá visualizar si estamos viendo otra nota
	que no sea la primera. 
 */
function changeButton(key){
	if (key > 0) {
		buttonLeft.classList.remove("buttonHidden");
	}
	else{
		buttonLeft.classList.add("buttonHidden");
	}

	if(key + 1 == sequence__item.length){
		rightButton.classList.add('buttonSuperHidden');
		superButton.classList.remove("buttonSuperHidden");
	}
	else{
		rightButton.classList.remove('buttonSuperHidden');
		superButton.classList.add("buttonSuperHidden");
	}
}

/* Cambiamos la secuencia */
function changeSequence(key){
	sequence__item.forEach( (disabledItem) =>{
		disabledItem.classList.remove("sequence__item--selected");
	});
	sequence__item[state].classList.add("sequence__item--selected");
	changeButton(state);
}

function questionnairesDisabled (){
	questionnaires.forEach( (question) =>{
		question.classList.add("question--hidden");
		question.classList.remove("question--right");
		question.classList.remove("question--left");
		question.classList.remove("question--up");
	});
}

function changeNoteRight(key){
	questionnairesDisabled();
	questionnaires[key].classList.add("question--right");
	questionnaires[key].classList.remove('question--hidden');

}

function changeNoteLeft(key){
	questionnairesDisabled();
	questionnaires[key].classList.add("question--left");
	questionnaires[key].classList.remove('question--hidden');
}

function changeNoteUp(key){
	questionnairesDisabled();
	questionnaires[key].classList.add("question--up");
	questionnaires[key].classList.remove('question--hidden');
}