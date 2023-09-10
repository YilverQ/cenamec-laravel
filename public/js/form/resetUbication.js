let state = document.getElementById("state");
let municipalitie = document.getElementById("municipalitie");
let optState = document.getElementById("opt-state");
let optMunicipalitie = document.getElementById("opt-municipalitie");
let optParishe = document.getElementById("opt-parishe");


function changeValueOptionAll(){
	optMunicipalitie.innerHTML = "Selecciona un Municipio";
	optParishe.innerHTML = "Selecciona una Parroquia";
	optState.innerHTML = "Selecciona un Estado";
}

function changeValueOptionOnly(){
	optMunicipalitie.innerHTML = "Selecciona un Municipio";
	optParishe.innerHTML = "Selecciona una Parroquia";
}

state.addEventListener('click', ()=> {
	changeValueOptionAll();
})

municipalitie.addEventListener('click', ()=> {
	changeValueOptionOnly();
})