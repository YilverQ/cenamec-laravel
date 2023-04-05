let inputs = document.querySelectorAll(".form__input");

const regularExpression = {
	email	 			: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password 			: /^[a-zA-Z0-9_.+#$¡!"%&()?]{4,20}$/
};

let fields = {
	email 	 : false,
	password : false
};

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


inputs.forEach((input) => {
	input.addEventListener("keyup", checkField);
	input.addEventListener("blur", checkField);
	input.addEventListener("keyup", bottonSendDisabled);
	input.addEventListener("blur", bottonSendDisabled);
});