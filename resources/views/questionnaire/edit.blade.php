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
					Editar <strong class="color-Text">cuestionario</strong>
				</h2>
				<form class="form__content" 
						method="POST" 
						action="{{ route('teacher.question.update', $questionnaire) }}"
						enctype="multipart/form-data">

					@csrf @method('PUT')
					<h2 class="form__icon">
						<i class="fa-solid fa-clipboard-question"></i>
					</h2>
					<h2 class="form__title">Datos del cuestionario</h2>
					<div class="form__item">
						<label for="ask">Pregunta:</label>
						<input class="form__input form__input--input" 
								name="ask" 
								required 
								type="text" 
								id="ask" 
								placeholder="¿Cúal es un área de la ciencia naturales?"
								value="{{ $questionnaire->ask }}" 
								minlength="3"
								maxlength="50"
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
								value="{{ $questionnaire->answer }}" 
								minlength="3"
								maxlength="50"
								autocomplete="off">
					</div>
					<div class="form__item">
						<label for="bad1">1° Respuesta incorrecta:</label>
						<input class="form__input form__input--input" 
								name="bad1" 
								required 
								type="text" 
								id="bad1" 
								placeholder="Artes plásticas"
								value="{{ $questionnaire->bad1 }}" 
								minlength="3"
								maxlength="50"
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
								value="{{ $questionnaire->bad2 }}" 
								minlength="3"
								maxlength="50"
								autocomplete="off">
					</div>
					<div class="form__item">
						<label for="bad3">3° Respuesta incorrecta:</label>
						<input class="form__input form__input--input" 
								name="bad3" 
								required 
								type="text" 
								id="bad3" 
								placeholder="Economía"
								value="{{ $questionnaire->bad3 }}" 
								minlength="3"
								maxlength="50"
								autocomplete="off">
					</div>
					
					<input class="form__send form_send--disabled" 
						type="submit" 
						value="Actualizar">
				</form>
			</div>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/questionnaire/checkFormQuestionnaireUpdate.js') }}"></script>
@endsection