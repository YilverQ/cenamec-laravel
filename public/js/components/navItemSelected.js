/*
	itemNav: Obtenemos todos los elementos de nuestro nav. 
	ubication: Obtenemos la url actual.
	
	result: Tendrá el valor de la ubicación de nuestra url. 
	Ejemplo: si termina en "/home" será: 'home'.

	ubication: Formateamos la url en un array. 
*/
const itemNav = document.querySelectorAll('.nav__item');
let ubication = location.href;
let result = null;
ubication = ubication.split("/").join(" ")


/*
	Pintamos el item dentro del 'nav' según corresponda.
*/
result = ubication.endsWith("home");
if (result){
	itemNav[0].classList.add("nav__item--constrast");
}

result = ubication.endsWith("login");
if (result){
	itemNav[1].classList.add("nav__item--constrast");
}

result = ubication.endsWith("signup");
if (result){
	itemNav[2].classList.add("nav__item--constrast");
}

result = ubication.endsWith("administrator");
if (result){
	itemNav[0].classList.add("nav__item--constrast");
}


result = ubication.endsWith("teacher");
if (result){
	itemNav[0].classList.add("nav__item--constrast");
}