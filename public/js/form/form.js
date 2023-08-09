class Input{
	constructor(name, regex, nodo, message){
		this.name = name;
		this.regex = regex;
		this.check = false;
		this.nodo = nodo;
		this.message = message;
		this.messageActive = false;
	}

	checkExpression(){
		if (this.regex.test(this.nodo.value)){
			this.nodo.classList.remove("form__input--errorField");
			this.nodo.classList.add("form__input--successField");
			this.check = true;
			this.removeErrorMessage();
			this.messageActive = false;
		}else{
			this.nodo.classList.remove("form__input--successField");
			this.nodo.classList.add("form__input--errorField");
			this.check = false;
			this.makeErrorMessage();
			this.messageActive = true;
		}
	}

	makeErrorMessage(){
		if (this.messageActive == false){
			const paragrahp = document.createElement("P");
			paragrahp.classList.add("form__message-error");
			paragrahp.innerHTML = this.message; 
			let parent = this.nodo.parentNode;
			parent.appendChild(paragrahp);
		}
	}

	removeErrorMessage(){
		if (this.messageActive == true){
			let parent = this.nodo.parentNode;
			parent.removeChild(parent.lastElementChild);
		}
	}
}


const regexInputs = {
	firts_name 	 		: /^[a-zA-ZÀ-ÿ]{3,50}$/,
	second_name 		: /^[a-zA-ZÀ-ÿ]{3,50}$/,
	lastname 			: /^[a-zA-ZÀ-ÿ]{3,50}$/,
	second_lastname 	: /^[a-zA-ZÀ-ÿ]{3,50}$/,
	gender 				: /^(Masculino|Femenino)$/,
	birthdate 			: /^(\d{4})-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/,
	identification_card	: /^\d{6,8}$/,
	number_phone		: /^((0416)|(0212)|(0426)|(0412)|(0414)|(0424))\d{7}$/,
	email	 			: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password 			: /^[a-zA-Z0-9_.+*=#$%&?]{4,20}$/,
	state 				: /^(?!.*Selecciona un Estado).*$/,
	municipalitie 		: /^(?!.*Selecciona un Municipio).*$/,
	parishe 			: /^(?!.*Selecciona una Parroquia).*$/,
	reset_password		: /^(?:[a-zA-Z0-9_.+*=#$%&?]{4,20}|)$/
};

const messagesInputs = {
	firts_name 	 		: 'Debes agregar únicamente un nombre.',
	second_name 		: 'Debes agregar únicamente un nombre.',
	lastname 			: 'Debes agregar únicamente un apellido.',
	second_lastname 	: 'Debes agregar únicamente un apellido.',
	gender 				: 'Debes escoger una opción.',
	birthdate 			: 'Debes escoger una fecha de nacimiento.',
	identification_card	: 'Solamente se admiten números entre 6 y 8 dígitos.',
	number_phone		: 'Debes agregar un número de teléfono válido. Ejemplo: 04160001010, 04140120122',
	email	 			: 'Debes agregar un correo electrónico válido.',
	password 			: 'Debes agregar una contraseña entre 4 y 20 caracteres alfanumericos y signos especiales: .+*=#$%&?',
	state 				: 'Debes escoger una opción.',
	municipalitie 		: 'Debes escoger una opción.',
	parishe 			: 'Debes escoger una opción.',
	reset_password		: 'Debes agregar una contraseña entre 4 y 20 caracteres alfanumericos y signos especiales: .+*=#$%&? o puedes dejarlo en blanco si no quieres actualizar la contraseña'
};

let inputs = document.querySelectorAll(".form__input");
let messages = document.querySelectorAll(".form__message-error");
let input, regex, message = null;
let inputsForms = [];

inputs.forEach( (item)=> {
	regex 	= regexInputs[item.name];
	message = messagesInputs[item.name];
	input 	= new Input(item.name, regex, item, message);
	inputsForms.push(input);
});

function checkField(){
	inputsForms.forEach( (item) =>{
		item.checkExpression();
	});
}


const send = document.querySelector('.form__send');
send.addEventListener('click', (e) =>{
	checkField();
	if (!allCheck()) {
		e.preventDefault();
	}
});


function allCheck(){
	let validated = true;	
	inputsForms.forEach( (item)=>{
		if (!item.check){
			validated = false;
		}
	});
	return validated;
}