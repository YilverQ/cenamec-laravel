let select = document.querySelectorAll('.form__input--select');

function defaulField(select){
	select.forEach( (item)=> {
		item.selectedIndex = 0;
	});
}

defaulField(select);