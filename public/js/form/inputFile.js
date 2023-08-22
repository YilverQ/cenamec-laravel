let nameImg = document.getElementById('img');
let imgText = document.querySelector(".labelFile__imgText");
const labelFile = document.querySelector('.labelFile__text');
const labelFileInput = document.querySelector('.labelFile__input');
let text = "";
//let formFileItem = document.querySelector(".form__item");

//Mouseout
labelFile.addEventListener('mouseout', () =>{
	changeTextInputFile();
});
labelFileInput.addEventListener('mouseout', () =>{
	changeTextInputFile();
});


//Click
labelFileInput.addEventListener('click', () =>{
	setTimeout( ()=>{
		changeTextInputFile();
	}, 10000);
});
labelFile.addEventListener('click', () =>{
	setTimeout( ()=>{
		changeTextInputFile();
	}, 10000);
});


//Cambiar texto.
function changeTextInputFile(){
	text = nameImg.value.replace("C:\\fakepath\\", "");
	imgText.textContent = text;
}