/*Variables*/
let navItems 		  = document.querySelectorAll(".description2Banner__item");
let description2Cards  = document.querySelectorAll(".description2Card");
let collapseIcon 	  = document.querySelector(".collapse2__icon");
let collapseTexts	  = document.querySelectorAll(".collapse2__text");
let description2Info   = document.querySelector(".description2Info");
let navUbication 	  = null;


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
		item.classList.remove("description2Banner__item--checked");
		description2Cards[key].classList.add("hidden");
	})
}

function showNavCard(key){
	navItems[key].classList.add("description2Banner__item--checked");
	description2Cards[key].classList.remove('hidden');
}


collapseIcon.addEventListener('click', ()=>{
	let bool = collapseIcon.classList.contains('collapse__icon--collapse');
	if (bool) {
		description2Info.classList.remove("hidden");
		collapseIcon.classList.remove("collapse__icon--collapse");
		collapseTexts[1].classList.add("hidden");
		collapseTexts[0].classList.remove("hidden");
	}
	else{
		collapseIcon.classList.add("collapse__icon--collapse");
		description2Info.classList.add("hidden");
		collapseTexts[0].classList.add("hidden");
		collapseTexts[1].classList.remove("hidden");
	}
});