let percentage = document.getElementById('percentage');
let submitPercentage = document.getElementById('submitPercentage');
let buttonSuperHidden = document.getElementById('buttonSuperHidden');
let valuePercentagePass = document.getElementById('value-percentage-pass');
let valuePercentageFail = document.getElementById('value-percentage-fail');

buttonSuperHidden.addEventListener('click', ()=> {
	let pass = valuePercentagePass.textContent.trim();
	let value = 0;
	if (pass == "00%") {
		value = valuePercentageFail.textContent.trim();
	}
	else{
		value = valuePercentagePass.textContent.trim();
	}
	percentage.value = value.replace(/%/g, "");
});
