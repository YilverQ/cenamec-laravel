/*Variables*/
let navItems 		  	= document.querySelectorAll(".description3Banner__item");
let description3Cards  	= document.querySelectorAll(".description3Card");
let collapseIcon 	  	= document.querySelector(".collapse3__icon");
let collapseTexts	  	= document.querySelectorAll(".collapse3__text");
let description3Info   	= document.querySelector(".description3Info");
let navUbication 	  	= null;


navItems.forEach( (item, key) =>{
	let card = null;
	item.addEventListener('click', ()=>{
		hiddenNavCards();
		showNavCard(key);
		navUbication = key;
	});
});

function hiddenNavCards() {
	navItems.forEach( (item, key) =>{
		item.classList.remove("description3Banner__item--checked");
		description3Cards[key].classList.add("hidden");
	})
}

function showNavCard(key){
	navItems[key].classList.add("description3Banner__item--checked");
	description3Cards[key].classList.remove('hidden');
}


collapseIcon.addEventListener('click', ()=>{
	let bool = collapseIcon.classList.contains('collapse__icon--collapse');
	if (bool) {
		description3Info.classList.remove("hidden");
		collapseIcon.classList.remove("collapse__icon--collapse");
		collapseTexts[1].classList.add("hidden");
		collapseTexts[0].classList.remove("hidden");
	}
	else{
		collapseIcon.classList.add("collapse__icon--collapse");
		description3Info.classList.add("hidden");
		collapseTexts[0].classList.add("hidden");
		collapseTexts[1].classList.remove("hidden");
	}
});