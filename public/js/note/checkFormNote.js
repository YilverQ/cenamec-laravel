/*
	las expresiones regulares son una forma de comprobar el texto. 
	En una expresión regular decimos que caracteres queremos que
	tenga determinado texto. En caso de cumplirse devuelve un true. 
	Caso contrario, false. 
*/

//lista de inputs de mi formulario.
let inputs 		= document.querySelectorAll(".form__input--input");
let labelFile 	= document.querySelector(".labelFile");
let textFile 	= document.querySelector(".labelFile__imgText");
let labelFileInput = document.querySelector(".labelFile__input");

/*
	title: Solamente admite letras del abecedario en mayúsculas, minúsculas y acentos. Min 3 y Máx 20.
	lastname: Solamente admite letras del abecedario en mayúsculas, minúsculas y acentos. Min 3 y Máx 20.
	email: adminte letras alfanúmericas y algunos caracteres especiales (#.+%&). Min 4 y Máx 20.
	password: Admite caracteres alfanumericos y algunos caracteres especiales. Min 4 y Máx 20. 
*/
const regularExpression = {
	title 	 	: /^[a-zA-ZÀ-ÿ\s\d]{3,50}$/,
	description : /[a-zA-Z\t\h]{3,255}/,
	imgFile 	: /.$/,
};


/*
	Ya los campos vienen comprobados por defecto. A excepción de password. 
	cada objeto representa el estado del campo de mi formulario. 
*/
let fieldsForm = {
	title 		: false,
	description : false,
	imgFile 	: false,
};


/*
	checkForm recibe un parametro: input.
	
	busca el nombre del input. Cada uno ejecuta la función 
	'checkField' y le envía tres parametros. 

	1. expresión regular correspondiente al nombre del input. 
	2. input. 
	3. 'title' del formulario.
*/
const checkForm = (e) => {
	switch (e.target.name){
		case "title":
			checkField(regularExpression.title, 
							e.target, e.target.name);
		break;
		case "description":
			checkField(regularExpression.description, 
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
const checkField = (regex, input, fieldName) => {
	if(regex.test(input.value)){
		document.getElementById(`${fieldName}`).classList.remove("form__input--errorField");
		document.getElementById(`${fieldName}`).classList.add("form__input--successField");
		fieldsForm[fieldName] = true;
	}else{
		document.getElementById(`${fieldName}`).classList.remove("form__input--successField");
		document.getElementById(`${fieldName}`).classList.add("form__input--errorField");
		fieldsForm[fieldName] = false;
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
	if (fieldsForm.title && 
		fieldsForm.description &&
		fieldsForm.imgFile) 
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
	input.addEventListener("keyup", checkForm);
	input.addEventListener("blur", checkForm);
	input.addEventListener("keyup", bottonSendDisabled);
	input.addEventListener("blur", bottonSendDisabled);
});



//Comprobar el campo para subir archivos
const checkFileField = (regex, input, fieldName) => {
	//console.log(regex)
	if(regex.test(input)){
		//console.log(fieldsForm[fieldName])
		fieldsForm[fieldName] = true;
	}else{
		fieldsForm[fieldName] = false;
	}
}

function FileCheck(){
	checkFileField(regularExpression.imgFile, textFile.innerHTML, "imgFile");
	bottonSendDisabled();
}

labelFile.addEventListener("click", FileCheck);
labelFile.addEventListener('mouseout', FileCheck);
labelFileInput.addEventListener('click', FileCheck);
labelFileInput.addEventListener('mouseout', FileCheck);