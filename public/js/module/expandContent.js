let expandContents = document.querySelectorAll('.expandContent');
let boxExpandContents = document.querySelectorAll('.boxExpand');
let containerModules = document.querySelectorAll('.containerModules');


function hiddenItems() {
	containerModules.forEach( (container) =>{
		container.classList.add('containerModules--hidden');
	});
};


boxExpandContents.forEach( (box, item) =>{
	box.addEventListener('click', ()=>{
		//hiddenItems();
		containerModules[item].classList.toggle('containerModules--hidden');
		expandContents[item].classList.toggle('fa-caret-down');
		expandContents[item].classList.toggle('fa-caret-up');
	});
});