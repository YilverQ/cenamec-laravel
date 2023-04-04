let btn = document.getElementById('btn');
let leftClick = document.getElementById('leftClick');
let rightClick = document.getElementById('rightClick');


leftClick.addEventListener('click', () => {
	btn.style.left = '0';
	setTimeout( function (){
		leftClick.classList.toggle("toggle-btn--checked");
		rightClick.classList.toggle("toggle-btn--checked");
	}, 200);
});

rightClick.addEventListener('click', () => {
	btn.style.left = '155px';
	setTimeout( function (){
		leftClick.classList.toggle("toggle-btn--checked");
		rightClick.classList.toggle("toggle-btn--checked");
	}, 200);
});