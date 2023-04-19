/*
	role: Valor de nuestro input.
	leftClick: Botton del lado izquierdo de nuestro (switch).
	rightClick: Botton del lado derecho de nuestro (switch).
*/
let iconStudent = document.getElementById('iconStudent');
let iconTeacher = document.getElementById('iconTeacher');
let role = document.getElementById('role');
let titleH2 = document.querySelector('.form__title');
let buttonSend = document.getElementById('form__send');
const leftClick = document.getElementById('leftClick');
const rightClick = document.getElementById('rightClick');

/*
	Cambiamos el valor de 'role' según el click que hagamos.
*/
rightClick.addEventListener('click', () =>{
	iconStudent.classList.add('hidden');
	iconTeacher.classList.remove('hidden');
	buttonSend.value = 'Seguir enseñando';
	role.value = "teacher";
	titleH2.textContent = "¡Bienvenido profesor!";
});

leftClick.addEventListener('click', () =>{
	iconStudent.classList.remove('hidden');
	iconTeacher.classList.add('hidden');
	buttonSend.value = 'Seguir aprendiendo';
	role.value = "student";
	titleH2.textContent = "¡Bienvenido estudiante!";
});