let xmark = document.querySelector('.imgOptions__closeButton');
let containerImgOptions = document.querySelector('.containerImgOptions');
let cancelOptions = [xmark];
let profileimgButton = document.getElementById('profileimg');


//Se cancela la acción. Se cierra la ventana emergente.
cancelOptions.forEach( (cancelBtn) => {
	cancelBtn.addEventListener('click', () =>{
		containerImgOptions.classList.add('containerImgOptions--hidden');
	})
});


profileimgButton.addEventListener('click', (e) =>{
	containerImgOptions.classList.remove('containerImgOptions--hidden');
});
