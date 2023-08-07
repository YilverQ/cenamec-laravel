let selectState = document.getElementById('state');
let inputMunicipalitieDisabled = document.querySelector(".form__item--disabled--municipalitie");
let inputMunicipalitie = document.querySelector(".form__item--municipalitie");

let selectMunicipalitie = document.getElementById('municipalitie');
let inputParisheDisabled = document.querySelector(".form__item--disabled--parishe");
let inputParishe = document.querySelector(".form__item--parishe");

let municipalities = document.querySelectorAll(".municipalitie");
let parishes 	   = document.querySelectorAll(".parishe");
let stateInput = document.getElementById("state");

let selectParishe = document.getElementById('parishe');

selectState.selectedIndex = 0;

selectState.addEventListener("click", ()=>{
	if (selectState.value != "Selecciona un Estado"){
		inputMunicipalitieDisabled.classList.add('form__item--hidden');
		inputMunicipalitie.classList.remove('form__item--hidden');
		checkMunicipalitie(selectState.value);
		resetMunicipalitieField(selectMunicipalitie);
		resetMunicipalitieField(selectParishe);
	}
	else{
		inputMunicipalitieDisabled.classList.remove('form__item--hidden');
		inputMunicipalitie.classList.add('form__item--hidden');
	}
});

selectMunicipalitie.addEventListener("click", ()=>{
	if (selectMunicipalitie.value != "Selecciona un Municipio"){
		inputParisheDisabled.classList.add('form__item--hidden');
		inputParishe.classList.remove('form__item--hidden');
		checkParishe(selectMunicipalitie.value);
		resetMunicipalitieField(selectParishe);
	}
	else{
		inputParisheDisabled.classList.remove('form__item--hidden');
		inputParishe.classList.add('form__item--hidden');
	}
});


function checkMunicipalitie(selectValue){
	selectValue = selectValue.replace(' ', "_");
	municipalities.forEach( (item) =>{
		if (item.classList.contains("municipalitie--" + selectValue)){
			item.classList.remove("hidden");
		}else{
			item.classList.add("hidden");
		}
	});
}


function checkParishe(selectValue){
	selectValue = selectValue.replace(' ', "_");
	let newStateInput 	= stateInput.value.replace(' ', "_");
	parishes.forEach( (item) =>{
		if (item.classList.contains("parishe--" + selectValue)
			&& item.classList.contains("state--" + newStateInput)){
			item.classList.remove("hidden");
		}else{
			item.classList.add("hidden");
		}
	});
}

function resetMunicipalitieField(select){
	select.selectedIndex = 0;
}