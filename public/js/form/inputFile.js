let nameImg = document.getElementById('img');
let imgText = document.querySelector(".labelFile__imgText");
const labelFile = document.querySelector('.labelFile__text');
const labelFileInput = document.querySelector('.labelFile__input');
let text = "";


labelFile.addEventListener('mouseout', () =>{
	text = nameImg.value.replace("C:\\fakepath\\", "");
	imgText.textContent = text;
});

labelFileInput.addEventListener('mouseout', () =>{
	text = nameImg.value.replace("C:\\fakepath\\", "");
	imgText.textContent = text;
});