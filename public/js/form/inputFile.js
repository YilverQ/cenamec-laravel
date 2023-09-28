let nameImg = document.getElementById('img');
let imgText = document.querySelector(".labelFile__imgText");
const inputHidden = document.getElementById('img');
let text = "";


inputHidden.addEventListener('change', () =>{
	changeTextInputFile();
});


//Cambiar texto.
function changeTextInputFile(){
	text = nameImg.value.replace("C:\\fakepath\\", "");
	imgText.textContent = text;
}