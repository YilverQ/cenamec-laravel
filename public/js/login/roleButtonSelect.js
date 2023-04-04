let role = document.getElementById('role');
const leftClick = document.getElementById('leftClick');
const rightClick = document.getElementById('rightClick');


rightClick.addEventListener('click', () =>{
	role.value = "teacher";
});

leftClick.addEventListener('click', () =>{
	role.value = "student";
});