/*
	eye : icono de ojo.
	passwordForm: input de tipo password.
*/
const eye = document.getElementById('form_eye');
const passwordForm = document.getElementById("password");


/*
	Cada vez que hacemos click en el icono del ojo:

	1. Intercambiamos el icono del ojo/ojo-Marcado.
	2. Cambiamos el tipo del campo. text/password.
*/
eye.addEventListener("click", () =>{
	eye.classList.toggle("fa-eye");
	eye.classList.toggle("fa-eye-slash");
	if (passwordForm.type == "text"){
		passwordForm.type = "password";

	}else{
		passwordForm.type = "text";
	}
})