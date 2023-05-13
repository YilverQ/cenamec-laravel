@extends('teacher.layout')


@section('title', 'Crea un nuevo curso')
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
					Editar <strong class="color-Text">módulo</strong>
				</h2>
				<form class="form__content" 
						method="POST" 
						action="{{ route('teacher.module.update', $module) }}"
						enctype="multipart/form-data">

					@csrf @method('PUT')
					<h2 class="form__icon">
						<i class="fa-solid fa-book-open-reader"></i>
					</h2>
					<h2 class="form__title">Datos del módulo</h2>
					<div class="form__item">
						<label for="name">Nombre:</label>
						<input class="form__input form__input--input" 
								name="name" 
								required 
								type="text" 
								id="name"
								value="{{ $module->name }}" 
								placeholder="Física para principiante"
								minlength="3"
								maxlength="50"
								autocomplete="off">
					</div>
					<div class="form__item">
						<label for="course">Este módulo pertenece al curso:</label>
						<select class="form__input form__input--del" 
									name="course" 
									id="course">
							<option selected>{{ $course->name }}</option>
						</select>
					</div>	
					<input class="form__send form_send--disabled" 
						type="submit" 
						value="Editar">
				</form>
			</div>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/module/checkFormModuleUpdate.js') }}"></script>
@endsection