const eye = document.getElementById('form_eye');
const passwordForm = document.getElementById("password");

eye.addEventListener("click", () =>{
	eye.classList.toggle("fa-eye");
	eye.classList.toggle("fa-eye-slash");
	if (passwordForm.type == "text"){
		passwordForm.type = "password";

	}else{
		passwordForm.type = "text";
	}
})