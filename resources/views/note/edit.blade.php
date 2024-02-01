@extends('teacher.layout')


@section('title', 'Editar Nota Educativa')
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
					Editar <strong class="color-Text">Nota Educativa</strong>
				</h2>
				<form class="form__content form__content--big" 
						method="POST" 
						action="{{ route('teacher.note.update', $note) }}"
						enctype="multipart/form-data">

					@csrf @method('PUT')
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
									value="{{ $note->title }}" 
									placeholder="Física para principiante"
									autocomplete="off">
						</div>
						<div class="form__item">
							<span>Imagen de la nota educativa:</span>
							<label for="img" class="labelFile">
								<div class="labelFile__input">
									<span class="labelFile__imgText" id="imgFile">Haz click para cambiar la imagen</span>
								</div>
								<span class="labelFile__text">Agregar</span>
							</label>
							<input class="form__file form__input" 
									name="img"
									type="file" 
									id="img" 
									accept="image/*">
						</div>
					</div>
					<div class="grid-two">
						<div class="form__item">
							<label for="super_name">Link de Youtube</label>
							<input class="form__input form__input" 
									name="youtube" 
									type="url" 
									id="youtube"
									value="{{ $note->youtube }}" 
									autocomplete="off">
						</div>
					</div>
					<div class="grid-one">
						<div class="form__item form__item--big">
							<label for="description">Descripción:</label>
							<textarea class="form__textarea form__input form__input--big"
										name="description"
										id="description"
										placeholder="Consolidar el desarrollo formativo del “Diplomado en Ciencia y Calidad Educativa en el Sub - Sistema de Educación Básica”..." 
										required="true"
										rows="7">{{ $note->description }}</textarea>
						</div>
					</div>
					<input class="form__send" 
						type="submit" 
						value="Actualizar">
				</form>
			</div>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/form/form.js') }}"></script>
@endsection