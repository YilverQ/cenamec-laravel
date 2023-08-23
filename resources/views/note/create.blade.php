@extends('teacher.layout')


@section('title', 'Crea una nueva nota')
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
				<form class="form__content form__content--big" 
						method="POST" 
						action="{{ route('teacher.note.store') }}"
						enctype="multipart/form-data">

					@csrf @method('POST')
					<h2 class="form__icon">
						<i class="fa-solid fa-note-sticky"></i>
					</h2>
					<h2 class="form__title">Datos de la nota</h2>
					<div class="grid-two">
						<div class="form__item">
							<label for="super_name">Título de la nota educativa:</label>
							<input class="form__input form__input" 
									name="super_name" 
									required 
									type="text" 
									id="super_name" 
									placeholder="Física para principiante"
									minlength="3"
									maxlength="120"
									autocomplete="off">
						</div>
						<div class="form__item">
							<span>Imagen del curso:</span>
							<label for="img" class="labelFile">
								<div class="labelFile__input">
									<span class="labelFile__imgText" id="imgFile"></span>
								</div>
								<span class="labelFile__text">Agregar</span>
							</label>
							<p>El peso máximo de la imagen es de 2Mb</p>
							<input class="form__file form__input" 
									name="img"
									required  
									type="file" 
									id="img" 
									autocomplete="off" 
									accept="image/*">
						</div>
					</div>
					<div class="grid-one">
						<div class="form__item form__item--big">
							<label for="description">Descripción:</label>
							<textarea class="form__textarea form__input form__input--big"
										name="description"
										id="description"
										placeholder="Consolidar el desarrollo formativo del “Diplomado en Ciencia y Calidad Educativa en el Sub - Sistema de Educación Básica”..." 
										maxlength="800"
										required="true"
										rows="7"></textarea>
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
	<script type="module" src="{{ asset('js/form/inputFile.js') }}"></script>
	<script type="module" src="{{ asset('js/form/form.js') }}"></script>
@endsection