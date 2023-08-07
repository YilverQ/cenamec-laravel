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


let inputs = document.querySelectorAll(".form__input");
let buttonSend = document.querySelector(".form__send");
let messages = document.querySelectorAll(".form__message-error");
let input, regex = null;
let inputsForms = [];

const signupInputs = {
	firts_name 	 		: /^[a-zA-ZÀ-ÿ]{3,50}$/,
	second_name 		: /^[a-zA-ZÀ-ÿ]{3,50}$/,
	lastname 			: /^[a-zA-ZÀ-ÿ]{3,50}$/,
	second_lastname 	: /^[a-zA-ZÀ-ÿ]{3,50}$/,
	gender 				: /^/,
	birthdate 			: /^/,
	identification_card	: /^\d{6,8}$/,
	number_phone		: /^((0416)|(0212)|(0426)|(0412)|(0414)|(0424))\d{7}$/,
	email	 			: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password 			: /^[a-zA-Z0-9_.+*=#$%&?]{4,20}$/,
	state 				: /^(?!.*Selecciona un Estado).*$/,
	municipalitie 		: /^(?!.*Selecciona un Municipio).*$/,
	parishe 			: /^(?!.*Selecciona una Parroquia).*$/
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
	parishe 			: 'Debes escoger una opción.'
}

inputs.forEach( (item, i)=> {
	regex = signupInputs[item.name];
	let message = messagesInputs[item.name];
	input = new Input(item.name, regex, item, message);
	inputsForms.push(input);
});


const checkField = (e) => {
	inputsForms.forEach( (item) =>{
		if (item.name == e.target.name){
			item.checkExpression();
		}
	});
}


const bottonSendDisabled = () =>{
	let validated = true;	
	inputsForms.forEach( (item)=>{
		if (!item.check){
			validated = false;
		}
	});
	if (validated){
		buttonSend.classList.remove("form_send--disabled");
		buttonSend.disabled = false;
	}else{
		buttonSend.classList.add("form_send--disabled");
		buttonSend.disabled = true;
	}
}


inputs.forEach((input) => {
	input.addEventListener("keyup", checkField);
	input.addEventListener("blur", checkField);
	input.addEventListener("keyup", bottonSendDisabled);
	input.addEventListener("blur", bottonSendDisabled);
});