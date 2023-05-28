/*
	las expresiones regulares son una forma de comprobar el texto. 
	En una expresión regular decimos que caracteres queremos que
	tenga determinado texto. En caso de cumplirse devuelve un true. 
	Caso contrario, false. 
*/

//lista de inputs de mi formulario.
let inputs = document.querySelectorAll(".form__input");

/*
	name: Solamente admite letras del abecedario en mayúsculas, minúsculas y acentos. Min 3 y Máx 20.
	answer: Solamente admite letras del abecedario en mayúsculas, minúsculas y acentos. Min 3 y Máx 20.
	bad1: Solamente admite números. Min 6 y Máx 8. 
	number_phone: Solamente admite números. Min 11 y Máx 11. 
	bad3: adminte letras alfanúmericas y algunos caracteres especiales (#.+%&). Min 4 y Máx 20.
	password: Admite caracteres alfanumericos y algunos caracteres especiales. Min 4 y Máx 20. 
*/
const regularExpression = {
	ask 	: /^[a-zA-ZÀ-ÿ-¿?\s0-9]{3,50}$/,
	answer 	: /^[a-zA-ZÀ-ÿ-¿?\s0-9]{3,50}$/,
	bad1	: /^[a-zA-ZÀ-ÿ-¿?\s0-9]{3,50}$/,
	bad2 	: /^[a-zA-ZÀ-ÿ-¿?\s0-9]{3,50}$/,
	bad3	: /^[a-zA-ZÀ-ÿ-¿?\s0-9]{3,50}$/,
};


/*
	Ya los campos vienen comprobados por defecto. A excepción de password. 
	cada objeto representa el estado del campo de mi formulario. 
*/
let fields = {
	ask 	: true,
	answer 	: true,
	bad1 	: true,
	bad2 	: true,
	bad3 	: true,
};


/*
	checkForm recibe un parametro: input.
	
	busca el nombre del input. Cada uno ejecuta la función 
	'checkField' y le envía tres parametros. 

	1. expresión regular correspondiente al nombre del input. 
	2. input. 
	3. 'ask' del formulario.
*/
const checkField = (e) => {
	switch (e.target.name){
		case "ask":
			checkExpression(regularExpression.ask, 
							e.target, e.target.name);
		break;
		case "answer":
			checkExpression(regularExpression.answer, 
							e.target, e.target.name);
		break;
		case "bad1":
			checkExpression(regularExpression.bad1, 
							e.target, e.target.name);
		break;
		case "bad2":
			checkExpression(regularExpression.bad2, 
							e.target, e.target.name);
		break;
		case "bad3":
			checkExpression(regularExpression.bad3, 
							e.target, e.target.name);
		break;
	}
}

/*
	checkField acepta tres argumentos: 
	regex: Expresión regular. 
	input: Input que se comprobará.
	fieldName: "ask" del formulario. 

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
	}else{
		document.getElementById(`${fieldName}`).classList.remove("form__input--successField");
		document.getElementById(`${fieldName}`).classList.add("form__input--errorField");
		fields[fieldName] = false;
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
	if (fields.ask && 
		fields.answer && 
		fields.bad1 &&
		fields.bad2 &&
		fields.bad3) 
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

bottonSendDisabled();