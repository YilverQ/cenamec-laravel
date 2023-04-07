const xmark = document.querySelector('.closeText');
const cancelButton = document.querySelector('.windows__cancel');
const sheetWindows = document.querySelector('.sheetWindows');
const iconDelete = document.querySelector('.icon--delete');


iconDelete.addEventListener('click', (event)=>{
	alert("hola");
	event.preventDefault();
});


xmark.addEventListener('click', () => {
	sheetWindows.classList.toggle('sheetWindows--hidden');
});

cancelButton.addEventListener('click', () => {
	sheetWindows.classList.toggle('sheetWindows--hidden');
});