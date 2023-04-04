let btn = document.getElementById('btn');
let leftClick = document.getElementById('leftClick');
let rightClick = document.getElementById('rightClick');
let fields = document.querySelectorAll(".form__item");


function hiddenFields(){
	fields.forEach((input) => {
		input.classList.toggle("form__item--hidden");
	});
};

leftClick.addEventListener('click', () => {
	btn.style.left = '0';
	setTimeout( function (){
		leftClick.classList.toggle("toggle-btn--checked");
		rightClick.classList.toggle("toggle-btn--checked");
	}, 200);
	hiddenFields();
});

rightClick.addEventListener('click', () => {
	btn.style.left = '155px';
	setTimeout( function (){
		leftClick.classList.toggle("toggle-btn--checked");
		rightClick.classList.toggle("toggle-btn--checked");
	}, 200);
	hiddenFields();
});