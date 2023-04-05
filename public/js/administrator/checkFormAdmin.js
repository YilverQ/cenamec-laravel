let inputs = document.querySelectorAll(".form__input");

const regularExpression = {
	name 	 			: /^[a-zA-ZÀ-ÿ]{3,20}$/,
	lastname 			: /^[a-zA-ZÀ-ÿ]{3,20}$/,
	email	 			: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password 			: /^[a-zA-Z0-9_.+#$¡!"%&()?]{4,20}$/
};

let fieldsForm = {
	name 	 			: true,
	lastname 			: true,
	email 				: true,
	password 			: false
};

const checkForm = (e) => {
	switch (e.target.name){
		case "name":
			checkField(regularExpression.name, 
							e.target, e.target.name);
		break;
		case "lastname":
			checkField(regularExpression.lastname, 
							e.target, e.target.name);
		break;
		case "email":
			checkField(regularExpression.email, 
							e.target, e.target.name);
		break;
		case "password":
			checkField(regularExpression.password, 
							e.target, e.target.name);
		break;
	}
}

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


const bottonSendDisabled = () =>{
	let buttonSend = document.querySelector(".form__send");
	if (fieldsForm.name && 
		fieldsForm.lastname && 
		fieldsForm.email &&
		fieldsForm.password) 
	{
		buttonSend.classList.remove("form_send--disabled");
		buttonSend.disabled = false;
	}else{
		buttonSend.classList.add("form_send--disabled");
		buttonSend.disabled = true;
	}
}


inputs.forEach((input) => {
	input.addEventListener("keyup", checkForm);
	input.addEventListener("blur", checkForm);
	input.addEventListener("keyup", bottonSendDisabled);
	input.addEventListener("blur", bottonSendDisabled);
});