/*
	crossMessage: Icono de 'x' en el mensaje flash.
	message: div que contiene todo el mensaje. 
*/
const crossMessage = document.querySelector('.close-message');
const message = document.querySelector('.message');


/*
	Si existe un elemento crossMessage quiere decir que existe un mensaje flash. 
	Si no existe, no hace nada. 

	Cuando hacemos click en el icono 'x' del mensaje flash
	Ocultamos el 'message'. 
*/
if (crossMessage) {
	crossMessage.addEventListener('click', function (){
		message.classList.add('hidden');
	});

	setTimeout(function() {
        message.classList.add('hidden');
    }, 2000);
}