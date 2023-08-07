class Select{
	constructor(name, nodo, defaultValue){
		this.name = name;
		this.nodo = nodo;
		this.defaultValue = defaultValue;
	}
}

class Option{
	constructor(value, nodo, parent){
		this.value 	= value;
		this.nodo 	= nodo;
		//this.parent = parent;
	}
}

let selects = document.querySelectorAll('.form__input--select');
let selectsObj = [];

let select = null;
selects.forEach( (item) =>{
	let name = item.name;
	let nodo = item;
	let defaultValue = item.value;
	select = new Select(name, item, defaultValue);
	selectsObj.push(select);
});



function getOptions(parent){
	return document.querySelectorAll('.' + name);
}

function disabledOption(option){
	let value = option.value;
	let nodo = option;
}


let optionObj = null;
let optionsMunicipalitie = getOptions('municipalitie');
optionsMunicipalitie.forEach( (item) =>{
	disabledOption(item);
});