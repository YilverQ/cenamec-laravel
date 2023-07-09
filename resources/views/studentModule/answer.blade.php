	{{ $number = mt_srand(1, 4) }}
	@if ($number == 1)
	<p class="question__answer question__answer--click question__answer--true">
		{{ $item->answer }}
	</p>
	<p class="question__answer question__answer--click">
		{{ $item->bad1 }}
	</p>
	<p class="question__answer question__answer--click">
		{{ $item->bad2 }}
	</p>
	<p class="question__answer question__answer--click">
		{{ $item->bad3 }}
	</p>

	@elseif ($number == 2)
	<p class="question__answer question__answer--click">
		{{ $item->bad1 }}
	</p>
	<p class="question__answer question__answer--click question__answer--true">
		{{ $item->answer }}
	</p>
	<p class="question__answer question__answer--click">
		{{ $item->bad2 }}
	</p>
	<p class="question__answer question__answer--click">
		{{ $item->bad3 }}
	</p>

	@elseif ($number == 3)
	<p class="question__answer question__answer--click">
		{{ $item->bad1 }}
	</p>
	<p class="question__answer question__answer--click">
		{{ $item->bad2 }}
	</p>
	<p class="question__answer question__answer--click question__answer--true">
		{{ $item->answer }}
	</p>
	<p class="question__answer question__answer--click">
		{{ $item->bad3 }}
	</p>

	@else 
	<p class="question__answer question__answer--click">
		{{ $item->bad1 }}
	</p>
	<p class="question__answer question__answer--click">
		{{ $item->bad2 }}
	</p>
	<p class="question__answer question__answer--click">
		{{ $item->bad3 }}
	</p>
	<p class="question__answer question__answer--click question__answer--true">
		{{ $item->answer }}
	</p>
	@endif



<script type="text/javascript">
	let options = document.querySelectorAll('.question__answer');
options.forEach( (option) => {
	option.addEventListener('click', ()=>{
		console.log(option);
		if (option.classList.contains('question__answer--true')){
			console.log("Esta es la respuesta correcta");
		}
		else{
			console.log("Esta es una respuesta incorrecta");
		}
	});
});
</script>




<h3 class="question__ask">{{ $item->ask }}</h3>
						<div class="question__contentAnswer">
							
							@foreach ($item->choices as $key => $choice)
								@if ($choice == $item->answer)
								<p class="question__answer question__answer--click question__answer--true answer-true">
									{{ $choice }}
								</p>
								@else
								<p class="question__answer question__answer--click">
									{{ $choice }}
								</p>
								@endif
							@endforeach

						</div>





						<div class="questionnaires">
				@foreach ($questionnaires as $key => $item)
				<div class="question">
					<div class="question__card">
						<h3 class="question__ask">{{ $item->ask }}</h3>
						<div class="question__contentAnswer">
							@foreach ($questionnaires->choices as $value => $choice)
							<p class="question__answer question__answer--click question__answer--true">
								{{ $choice }}
							</p>
							<p class="question__answer question__answer--click">
								{{ $choice }}
							</p>
							@endforeach
						</div>
					</div>
				</div>
				@endforeach
			</div>