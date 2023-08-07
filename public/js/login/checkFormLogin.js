/*
	las expresiones regulares son una forma de comprobar el texto. 
	En una expresión regular decimos que caracteres queremos que
	tenga determinado texto. En caso de cumplirse devuelve un true. 
	Caso contrario, false. 
*/

//lista de inputs de mi formulario.
let inputs = document.querySelectorAll(".form__input");
let messages = document.querySelectorAll(".form__message-error");
let position = 0;
let message = null;

/*
	email: adminte letras alfanúmericas y algunos caracteres especiales (#.+%&). Min 4 y Máx 20.
	password: Admite caracteres alfanumericos y algunos caracteres especiales. Min 4 y Máx 20. 
*/
const regularExpression = {
	email	 			: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password 			: /^[a-zA-Z0-9_.+*=#$%&?]{4,20}$/
};

const positionMessages = [
	"email", "password"
];


/*
	Cada objeto representa el estado del campo de mi formulario.
	Todos los campos inician en 'false'.  
*/
let fields = {
	email 	 : false,
	password : false
};


/*
	checkForm recibe un parametro: input.
	
	busca el nombre del input. Cada uno ejecuta la función 
	'checkField' y le envía tres parametros. 

	1. expresión regular correspondiente al nombre del input. 
	2. input. 
	3. 'name' del formulario.
*/
const checkField = (e) => {
	switch (e.target.name){
		case "email":
			checkExpression(regularExpression.email, 
							e.target, e.target.name);
		break;
		case "password":
			checkExpression(regularExpression.password, 
							e.target, e.target.name);
		break;
	}
}


/*
	checkField acepta tres argumentos: 
	regex: Expresión regular. 
	input: Input que se comprobará.
	fieldName: "name" del formulario. 

	regex.test(input.value): Comprueba que el valor del 
	formulario cumple con la expresión regular.

	fieldsForm[fieldName] = true/false: Busca el objeto correspondiente
	y le cambia el valor boleano. 
*/
const checkExpression = (regex, input, fieldName) => {
	if(regex.test(input.value)){
		document.getElementById(`${fieldName}`).classList.remove("form__input--errorField");
		document.getElementById(`${fieldName}`).classList.add("form__input--successField");
		fields[fieldName] = true;
		position = positionMessages.indexOf(fieldName);
		message = messages[position];
		message.classList.add('hidden');
	}else{
		document.getElementById(`${fieldName}`).classList.remove("form__input--successField");
		document.getElementById(`${fieldName}`).classList.add("form__input--errorField");
		fields[fieldName] = false;
		position = positionMessages.indexOf(fieldName);
		message = messages[position];
		message.classList.remove('hidden');
	}
}


/*
	Comprueba que todos los valores de los campos del formulario
	son validos para ser enviados. 
	En caso de ser 'true' activa el botton. 
	En caso de ser 'false' desactiva el botton. 
*/
const bottonSendDisabled = () =>{
	let buttonSend = document.querySelector(".form__send");
	if (fields.email &&
		fields.password) 
	{
		buttonSend.classList.remove("form_send--disabled");
		buttonSend.disabled = false;
	}else{
		buttonSend.classList.add("form_send--disabled");
		buttonSend.disabled = true;
	}
}


/*
	Por cada input dentro de mi formulario.
	Se hará una comprobación para: Tecleo y/o click 
	Sobre el formulario.

	Las comprobaciones ejecutan la función de checkForm y BottonSendDisabled.
	checkForm: Chequea el valor de los campos del formulario. 
	En caso de ser true o false los actualiza en el objeto (fieldsForm).
	
	bottonSendDisabled: Si todos los valores de los campos 
	(inputs) son validos, habilita el botón para enviar el formulario.
*/
inputs.forEach((input) => {
	input.addEventListener("keyup", checkField);
	input.addEventListener("blur", checkField);
	input.addEventListener("keyup", bottonSendDisabled);
	input.addEventListener("blur", bottonSendDisabled);
});