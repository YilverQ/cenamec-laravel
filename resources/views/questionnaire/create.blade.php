@extends('teacher.layout')


@section('title', 'Crea un cuestionario')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
@endsection

@section('content')
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article" id="profile">
			<!--Information-->
			<div class="form">
				<h2 class="tab__title--centered">
					Crear un nuevo <strong class="color-Text">cuestionario</strong>
				</h2>
				<form class="form__content form__content--big" 
						method="POST" 
						action="{{ route('teacher.question.store') }}"
						enctype="multipart/form-data">

					@csrf @method('POST')
					<h2 class="form__icon">
						<i class="fa-solid fa-clipboard-question"></i>
					</h2>
					<h2 class="form__title">Datos del cuestionario</h2>
					<div class="grid-two">
						<div class="form__item">
							<label for="ask">Pregunta:</label>
							<input class="form__input form__input--input" 
									name="ask" 
									required 
									type="text" 
									id="ask" 
									placeholder="¿Cúal es un área de la ciencia naturales?"
									minlength="3"
									maxlength="120"
									autocomplete="off">
						</div>
						<div class="form__item">
							<label for="answer">Respuesta correcta:</label>
							<input class="form__input form__input--input" 
									name="answer" 
									required 
									type="text" 
									id="answer" 
									placeholder="Física"
									minlength="3"
									maxlength="120"
									autocomplete="off">
						</div>
					</div>

					<div class="grid-two">
						<div class="form__item">
							<label for="bad1">1° Respuesta incorrecta:</label>
							<input class="form__input form__input--input" 
									name="bad1" 
									required 
									type="text" 
									id="bad1" 
									placeholder="Artes plásticas"
									minlength="3"
									maxlength="120"
									autocomplete="off">
						</div>
						<div class="form__item">
							<label for="bad2">2° Respuesta incorrecta:</label>
							<input class="form__input form__input--input" 
									name="bad2" 
									required 
									type="text" 
									id="bad2" 
									placeholder="Educación física"
									minlength="3"
									maxlength="120"
									autocomplete="off">
						</div>
					</div>

					<div class="grid-one">
						<div class="form__item form__item--big">
							<label for="bad3">3° Respuesta incorrecta:</label>
							<input class="form__input form__input--input" 
									name="bad3" 
									required 
									type="text" 
									id="bad3" 
									placeholder="Economía"
									minlength="3"
									maxlength="120"
									autocomplete="off">
						</div>
					</div>
					
					<input class="form__send" 
						type="submit" 
						value="Crear">
				</form>
			</div>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/form/form.js') }}"></script>
@endsection