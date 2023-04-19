let menu = document.querySelector(".nav__item--menu");
let subMenu = document.querySelector(".submenu");
let divMenu = document.querySelector(".menuMenu");
let	screenWidth = window.innerWidth; //obtiene el tamaño de la ventana.
let listItems = document.querySelectorAll(".submenu__item");

menu.addEventListener("click", () => {
	if (divMenu.style.display == "initial"){
		divMenu.style.display = "none";
	}
	else{
		divMenu.style.display = "initial";
	}
	menu.classList.toggle("nav__item--constrast");
	subMenu.classList.toggle("submenu--activate");
});



/*Cambio de pantalla*/
window.onresize = function(){ //Se ejecuta cuando hay un cambio del tamaño.
	screenWidth = window.innerWidth; //obtiene el tamaño de la ventana.
	menuChange();
};

function menuChange(){
	if (screenWidth >= 501){
		subMenu.classList.remove("completeMenu");
	}
	else{
		subMenu.classList.add("completeMenu");
	}
}
menuChange();