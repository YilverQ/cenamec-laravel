class Question{
	constructor(cardQuestions){
		this.questions = cardQuestions.children[1].children;
		this.responsed = false;
		this.successSound = new Audio('/audios/success.mp3');
		this.errorSound = new Audio('/audios/error.mp3');
	}

	paintChoice(){
		for (let i = 0; i < this.questions.length; i++){
			if (this.questions[i].classList.contains('answer-true')){
				this.questions[i].classList.add("question__answer--true");
			}
			else{
				this.questions[i].classList.add("question__answer--false");
			}
		}	
	}

	sumScore(choice){
		if (choice.classList.contains('answer-true') && this.responsed == false ){
			score += 1;
			this.successSound.play();
		}
		else{
			this.errorSound.play();
		}
		this.responsed = true;
	}

	hearCheck(){
		for (let i = 0; i < this.questions.length; i++){
			this.questions[i].addEventListener('click', ()=>{
				this.paintChoice();
				this.sumScore(this.questions[i]);
			});
		}	
	}
}

const cardQuestions = document.querySelectorAll(".question__card");
let child = null;
let score = 0; 
let question = null;
let boxQuestion = document.getElementById('boxQuestion');
let boxPass = document.getElementById('boxPass');
let boxFail = document.getElementById('boxFail');
let buttonSuperHidden = document.getElementById('buttonSuperHidden');
let valuePercentagePass = document.getElementById('value-percentage-pass');
let valuePercentageFail = document.getElementById('value-percentage-fail');
let pathPass = document.getElementById('path-pass');
let pathFail = document.getElementById('path-fail');
child = cardQuestions[0].children[1].children;


cardQuestions.forEach( (card) =>{
	question = new Question(card);
	question.hearCheck();
});

buttonSuperHidden.addEventListener('click', ()=>{
	let num = cardQuestions.length;
	let porcentage = (score * 100) / num;
	porcentage = Math.trunc(porcentage);
	boxQuestion.classList.add('hidden');
	if (porcentage >= 60){
		boxPass.classList.remove('hidden');
		valuePercentagePass.innerHTML = porcentage + "%";
		pathPass.setAttribute('stroke-dasharray', porcentage + ', 100');
		let successSound = new Audio('/audios/complete.mp3');
		successSound.play();
	}
	else{
		boxFail.classList.remove('hidden');
		valuePercentageFail.innerHTML = porcentage + "%";
		pathFail.setAttribute('stroke-dasharray', porcentage + ', 100');
		let errorSound = new Audio('/audios/fail.mp3');
		errorSound.play();
	}
});