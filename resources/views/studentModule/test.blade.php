@extends('student.layout')

@section('title', 'Realizando prueba')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/school.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/percentage.css') }}">
@endsection



@section('content')
	<main class="container">
		<article id="boxQuestion" class="article">
			<div class="box-sequence">
				@foreach ($questionnaires as $key => $item)
					@if ($key != 0)
					<div class="sequence__line"></div>
					@endif
					@if ($key == 0)
					<div class="sequence__item-box"><p class="sequence__item sequence__item--selected">{{ $key + 1 }}</p></div>
					@else
					<div class="sequence__item-box"><p class="sequence__item">{{ $key + 1 }}</p></div>
					@endif
				@endforeach
			</div>


			@if (! isset($questionnaires[0]))
				<div class="contanierMessage">
				<h2 class="tab__title--centered">
					&#x2b50; Este módulo no cuenta con 
					<strong class="color-Text">cuestionarios</strong>,
				</h2>
				<h2 class="tab__title--centered">
					puedes continuar. &#x1f396;
				</h2>
				<img src="{{ asset('img/school/fun.png') }}" alt="Imagen final" class="contanierMessage__img">
				<div class="messageFinal__buttons">
					<form 
		            	action="{{ route('student.module.pass', $module) }}" 
		            	method="POST" 
		            	class="headerBackground__buttons">
		                
		                @csrf
		                @method('POST')

		                <input type="hidden" name="percentage" value="100">
		                <button type="submit" class="header__loginItem header__loginItem--contrast">
								Seguir Estudiando
		                </button>                
		            </form>
					</a>
				</div>
				</div>
			@else

			<div class="questionnaires">
				@foreach ($questionnaires as $key => $item)
				<div class="question">
					<div class="question__card">
						<h3 class="question__ask">{{ $item->ask }}</h3>
						<div class="question__contentAnswer">
							@foreach ($item->choices as $value => $choice)
							@if ($choice == $item->answer)
							<p class="question__answer question__answer--click answer-true">
								{{ $choice }}
							</p>
							@else
							<p class="question__answer question__answer--click">
								{{ $choice }}
							</p>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				@endforeach
			</div>

			<div class="buttons-arrows">
				@if (count($questionnaires) == 1)
				<div id="buttonSuperHidden" class="buttons-arrows__arrow buttons-arrows__arrow--next">
					<p>Finalizar</p>
					<i class="fa-solid fa-arrow-right icon-btn-button"></i>
				</div>	
				@else
				<div id="leftButton" class="buttons-arrows__arrow buttons-arrows__arrow--after buttonHidden">
					<i class="fa-solid fa-arrow-left icon-btn-button"></i>
					<p>Atrás</p>
				</div>	
				<div id="rightButton" class="buttons-arrows__arrow buttons-arrows__arrow--next">
					<p>Siguiente</p>
					<i class="fa-solid fa-arrow-right icon-btn-button"></i>
				</div>
				<div id="buttonSuperHidden" class="buttons-arrows__arrow buttons-arrows__arrow--next buttonSuperHidden">
					<p>Finalizar</p>
					<i class="fa-solid fa-arrow-right icon-btn-button"></i>
				</div>	
				@endif
			</div>
			@endif
		</article>

		<article id="boxPass" class="article hidden">
			<div class="messageFinal">
				<img src="{{ asset('img/school/fun.png') }}" alt="Imagen final" class="messageFinal__img">
				<div class="messageFinal__container">
					<div class="messageFinal__titles">
						<h3 class="messageFinal__title">&#x1f389; ¡Felicidades, has aprobado el módulo: </h3>
						<h3 class="messageFinal__module">
							<strong class="color-Text">
								{{ $module->name }}! &#129321;
							</strong>
						</h3>
					</div>

					<div class="percentage-wrapper">
					  <div class="single-chart">
					    <svg viewBox="0 0 36 36" class="circular-chart green">
					      	<path class="circle-bg"
					        	d="M18 2.0845
					        	a 15.9155 15.9155 0 0 1 0 31.831
					        	a 15.9155 15.9155 0 0 1 0 -31.831"
					      	/>
						    <path id="path-pass" class="circle"
						    	stroke-dasharray="70, 100"
						    	d="M18 2.0845
						        a 15.9155 15.9155 0 0 1 0 31.831
						        a 15.9155 15.9155 0 0 1 0 -31.831"
						    />
					      	<text x="18" y="20.35" class="percentage" id="value-percentage-pass">
					      		00%
					      	</text>
					    	</svg>
					  	</div>
				    	<p class="percentage--title">
				    		Porcentaje de aciertos
				    	</p>
					</div>

					<div class="messageFinal__buttons">
						<form 
			            	action="{{ route('student.module.pass', $module) }}" 
			            	method="POST" 
			            	class="headerBackground__buttons">
			                
			                @csrf
			                @method('POST')

			                <input type="hidden" id="percentage" name="percentage" value="0">
			                <button type="submit" id="submitPercentage" class="header__loginItem header__loginItem--contrast">
									Seguir Estudiando
			                </button>                
			            </form>
						</a>
					</div>
				</div>
			</div>
		</article>


		<article id="boxFail" class="article hidden">
			<div class="messageFinal">
				<img src="{{ asset('img/school/cry.png') }}" alt="Imagen final" class="messageFinal__img">
				<div class="messageFinal__container">
					<div class="messageFinal__titles">
						<h3 class="messageFinal__title">&#x26a0;&#xfe0f; ¡Lo siento, no has aprobado el módulo: </h3>
						<h3 class="messageFinal__module">
							<strong class="color-Text">
								{{ $module->name }}! &#x1f622;
							</strong>
						</h3>
					</div>

					<div class="percentage-wrapper">
					  <div class="single-chart">
					    <svg viewBox="0 0 36 36" class="circular-chart orange">
					      	<path class="circle-bg"
					        	d="M18 2.0845
					        	a 15.9155 15.9155 0 0 1 0 31.831
					        	a 15.9155 15.9155 0 0 1 0 -31.831"
					      	/>
						    <path id="path-fail" class="circle"
						    	stroke-dasharray="30, 100"
						    	d="M18 2.0845
						        a 15.9155 15.9155 0 0 1 0 31.831
						        a 15.9155 15.9155 0 0 1 0 -31.831"
						    />
					      	<text x="18" y="20.35" class="percentage" id="value-percentage-fail">
					      		00%
					      	</text>
					    	</svg>
					  	</div>
				    	<p class="percentage--title">Porcentaje de aciertos</p>
					</div>
					<p class="percentage--title">
						Debes tener al menos un 60% de aciertos para aprobar el módulo educativo
					</p>

					<div class="messageFinal__buttons">
						<a href="{{ route('student.course.display', $course) }}">
							<li class="header__loginItem messageFinal__button--reset">
								Volver al curso
							</li>
						</a>
						<a href="{{ route('student.module.study', $module) }}">
							<li class="header__loginItem header__loginItem--contrast messageFinal__button--back">
								Repetir módulo
							</li>
						</a>
					</div>
				</div>
			</div>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/components/box-sequenceQuestionnaires.js') }}"></script>
	<script type="module" src="{{ asset('js/questionnaire/answerClick.js') }}"></script>
	<script type="module" src="{{ asset('js/questionnaire/inputPercentage.js') }}"></script>
@endsection