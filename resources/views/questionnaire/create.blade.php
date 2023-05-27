@extends('teacher.layout')


@section('title', 'Crea una cuestionario')
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
					Crear una nueva <strong class="color-Text">nota educativa</strong>
				</h2>
				<form class="form__content" 
						method="POST" 
						action="{{ route('teacher.note.store') }}"
						enctype="multipart/form-data">

					@csrf @method('POST')
					<h2 class="form__icon">
						<i class="fa-solid fa-note-sticky"></i>
					</h2>
					<h2 class="form__title">Datos de la nota</h2>
					<div class="form__item">
						<label for="title">Título:</label>
						<input class="form__input form__input--input" 
								name="title" 
								required 
								type="text" 
								id="title" 
								placeholder="Física para principiante"
								minlength="3"
								maxlength="50"
								autocomplete="off">
					</div>
					<div class="form__item">
						<label for="description">Descripción:</label>
						<textarea class="form__textarea form__input--input"
									name="description"
									id="description"
									placeholder="Curso de introducción a la física es un curso que promueve la educación en los niños, niñas, adolecentes y adultos. Con este curso podrás aprender sobre diversas áreas de la física." 
									maxlength="255"
									required="true"
									rows="7"></textarea>
					</div>
					<div class="form__item">
						<span>Imágen de la nota educativa:</span>
						<label for="img" class="labelFile">
							<div class="labelFile__input">
								<span class="labelFile__imgText" id="imgFile"></span>
							</div>
							<span class="labelFile__text">Agregar</span>
						</label>
						<input class="form__file" 
								name="img"
								required  
								type="file" 
								id="img" 
								autocomplete="off" 
								accept="image/*">
					</div>
					<input class="form__send form_send--disabled" 
						type="submit" 
						value="Crear">
				</form>
			</div>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/form/inputFile.js') }}"></script>
	<script type="module" src="{{ asset('js/form/resetField.js') }}"></script>
	<script type="module" src="{{ asset('js/note/checkFormNote.js') }}"></script>
@endsection