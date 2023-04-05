let inputs = document.querySelectorAll(".form__input");

const regularExpression = {
	name 	 			: /^[a-zA-ZÀ-ÿ]{3,20}$/,
	lastname 			: /^[a-zA-ZÀ-ÿ]{3,20}$/,
	identification_card	: /^\d{6,8}$/,
	number_phone		: /^\d{11,11}$/,
	email	 			: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password 			: /^[a-zA-Z0-9_.+#$¡!"%&()?]{4,20}$/
};

let fields = {
	name 	 			: false,
	lastname 			: false,
	identification_card : false,
	number_phone 		: false,
	email 				: false,
	password 			: false
};

const checkField = (e) => {
	switch (e.target.name){
		case "name":
			checkExpression(regularExpression.name, 
							e.target, e.target.name);
		break;
		case "lastname":
			checkExpression(regularExpression.lastname, 
							e.target, e.target.name);
		break;
		case "identification_card":
			checkExpression(regularExpression.identification_card, 
							e.target, e.target.name);
		break;
		case "number_phone":
			checkExpression(regularExpression.number_phone, 
							e.target, e.target.name);
		break;
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


const bottonSendDisabled = () =>{
	let buttonSend = document.querySelector(".form__send");
	if (fields.name && 
		fields.lastname && 
		fields.identification_card &&
		fields.number_phone &&
		fields.email &&
		fields.password) 
	{
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