let selectState = document.getElementById('state');
let inputMunicipalitie = document.querySelector(".form__item--municipalitie");

let selectMunicipalitie = document.getElementById('municipalitie');
let inputParishe = document.querySelector(".form__item--parishe");

let municipalities = document.querySelectorAll(".municipalitie");
let parishes 	   = document.querySelectorAll(".parishe");
let stateInput = document.getElementById("state");

let selectParishe = document.getElementById('parishe');
let selectField = [selectState, selectMunicipalitie, selectParishe];

selectState.selectedIndex = 0;


selectState.addEventListener("click", ()=>{
	if (selectState.value != "Selecciona un Estado"){
		checkMunicipalitie(selectState.value);
		resetMunicipalitieField(selectMunicipalitie);
		resetMunicipalitieField(selectParishe);
	}
});

selectMunicipalitie.addEventListener("click", ()=>{
	if (selectMunicipalitie.value != "Selecciona un Municipio"){
		checkParishe(selectMunicipalitie.value);
		resetMunicipalitieField(selectParishe);
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


checkMunicipalitie(selectState.value);
resetMunicipalitieField(selectMunicipalitie);
checkParishe(selectMunicipalitie.value);
resetMunicipalitieField(selectParishe);