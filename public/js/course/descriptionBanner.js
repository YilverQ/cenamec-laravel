/*Variables*/
let navItems 		  = document.querySelectorAll(".descriptionBanner__item");
let descriptionCards  = document.querySelectorAll(".descriptionCard");
let collapseIcon 	  = document.querySelector(".collapse__icon");
let collapseTexts	  = document.querySelectorAll(".collapse__text");
let descriptionInfo   = document.querySelector(".descriptionInfo");
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
		item.classList.remove("descriptionBanner__item--checked");
		descriptionCards[key].classList.add("hidden");
	})
}

function showNavCard(key){
	navItems[key].classList.add("descriptionBanner__item--checked");
	descriptionCards[key].classList.remove('hidden');
}


collapseIcon.addEventListener('click', ()=>{
	let bool = collapseIcon.classList.contains('collapse__icon--collapse');
	if (bool) {
		descriptionInfo.classList.remove("hidden");
		collapseIcon.classList.remove("collapse__icon--collapse");
		collapseTexts[1].classList.add("hidden");
		collapseTexts[0].classList.remove("hidden");
	}
	else{
		collapseIcon.classList.add("collapse__icon--collapse");
		descriptionInfo.classList.add("hidden");
		collapseTexts[0].classList.add("hidden");
		collapseTexts[1].classList.remove("hidden");
	}
});