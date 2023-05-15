let xmark = document.querySelector('.closeText');
let cancelButton = document.querySelector('.windows__cancel');
let sheetWindows = document.querySelector('.sheetWindows');
let deleteButton = document.querySelector('.windows__confirm');
let cancelOptions = [cancelButton, xmark];
let formsDelete = document.querySelectorAll(".form__delete");


//Se cancela la acción. Se cierra la ventana emergente.
cancelOptions.forEach( (cancelBtn) => {
	cancelBtn.addEventListener('click', () =>{
		sheetWindows.classList.toggle('sheetWindows--hidden');
	})
});


//Se confirma la acción. Se prosige con la funcionalidad.
//Eliminamos el elemento.
formsDelete.forEach( (formDelete)=> {
	formDelete.addEventListener('click', (e) =>{
		e.preventDefault();
		sheetWindows.classList.toggle('sheetWindows--hidden');
		deleteButton.addEventListener('click', ()=>{
			formDelete.submit();
		});
	});
});