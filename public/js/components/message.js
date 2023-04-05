const crossMessage = document.querySelector('.close-message');
const message = document.querySelector('.message');

if (crossMessage) {
	crossMessage.addEventListener('click', function (){
		message.classList.add('hidden');
	});
}