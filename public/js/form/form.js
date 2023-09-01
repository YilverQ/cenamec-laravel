class Input{
	constructor(name, regex, nodo, message){
		this.name 	= name;
		this.regex 	= regex;
		this.check 	= false;
		this.nodo 	= nodo;
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

//Expresiones regulares.
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
	reset_password		: /^(?:[a-zA-Z0-9_.+*=#$%&?]{4,20}|)$/,
	super_name			: /^[a-zA-ZÀ-ÿ-:;,.\s\d]{3,120}$/, 
	img 	 			: /[a-zA-Z\t\h]+|(^$)/,
	purpose 			: /[a-zA-Z\t\h:;,.]{3,5000}/,
	general_objetive 	: /[a-zA-Z\t\h:;,.]{3,5000}/,
	specific_objetive 	: /[a-zA-Z\t\h:;,.]{3,5000}/,
	competence 			: /[a-zA-Z\t\h:;,.]{3,5000}/,
	course 		 		: /^(?!Selecciona un curso$).+$/,
	description 		: /[a-zA-Z\t\h:;,]{3,800}/,
	ask					: /^[a-zA-Z\u00C0-\u00FF:;,\s\d¿?]{3,120}$/, 
	answer				: /^[a-zA-ZÀ-ÿ-:;,.\s\d]{3,120}$/, 
	bad1				: /^[a-zA-ZÀ-ÿ-:;,.\s\d]{3,120}$/, 
	bad2				: /^[a-zA-ZÀ-ÿ-:;,.\s\d]{3,120}$/, 
	bad3				: /^[a-zA-ZÀ-ÿ-:;,.\s\d]{3,120}$/, 
};

//Mensajes de alerta.
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
	reset_password		: 'Debes agregar una contraseña entre 4 y 20 caracteres alfanumericos y signos especiales: .+*=#$%&? o puedes dejarlo en blanco si no quieres actualizar la contraseña',
	super_name			: 'Debes agregar entre 3 y 120 caracteres', 
	img 	 			: 'Debes agregar una imagen',
	purpose 			: 'Debes agregar un texto.',
	general_objetive 	: 'Debes agregar un texto.',
	specific_objetive 	: 'Debes agregar un texto.',
	competence 			: 'Debes agregar un texto.',
	course 		 		: 'Debes elegir un curso',
	description 		: 'Debes agregar un texto de máximo 800 caracteres',
	ask					: 'Debes agregar entre 3 y 120 caracteres', 
	answer				: 'Debes agregar entre 3 y 120 caracteres', 
	bad1				: 'Debes agregar entre 3 y 120 caracteres', 
	bad2				: 'Debes agregar entre 3 y 120 caracteres', 
	bad3				: 'Debes agregar entre 3 y 120 caracteres', 
};

//Variables del programa.
let inputs = document.querySelectorAll(".form__input");
let messages = document.querySelectorAll(".form__message-error");
let input, regex, message = null;
let inputsForms = [];


//Creamos un objeto de tipo Input para cada input.
inputs.forEach( (item)=> {
	regex 	= regexInputs[item.name];
	message = messagesInputs[item.name];
	input 	= new Input(item.name, regex, item, message);
	inputsForms.push(input);
});


//Chequeamos el input. 
function checkField(){
	inputsForms.forEach( (item) =>{
		item.checkExpression();
		console.log(item);
	});
}


//Comprobamos todos los campos esten validados antes de enviarse el formulario.
const send = document.querySelector('.form__send');
send.addEventListener('click', (e) =>{
	checkField();
	if (!allCheck()) {
		e.preventDefault();
	}
});


//Comprueba que todos los campos esten validados.
function allCheck(){
	let validated = true;	
	inputsForms.forEach( (item)=>{
		if (!item.check){
			validated = false;
		}
	});
	return validated;
}