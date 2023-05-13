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
					Crear un nuevo <strong class="color-Text">módulo</strong>
				</h2>
				<form class="form__content" 
						method="POST" 
						action="{{ route('teacher.module.store') }}"
						enctype="multipart/form-data">

					@csrf @method('POST')
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
								placeholder="Física para principiante"
								minlength="3"
								maxlength="50"
								autocomplete="off">
					</div>
					<div class="form__item">
						<label for="course">Curso:</label>
						<select class="form__input form__input--del" 
									name="course" 
									id="course">
							<option disabled selected>Selecciona un curso</option>
							@foreach($courses as $key => $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
					</div>	
					<input class="form__send form_send--disabled" 
						type="submit" 
						value="Crear">
				</form>
			</div>
		</article>
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
					src="{{ asset('img/administrator/teachers.png') }}" 
					alt="Dos jovenes divertidos">
				
				<div class="tab__information">
					<h2 class="tab__title">
						Ver lista de <strong class="color-Text">módulos</strong>
					</h2>
					<ul class="header__bottons">
						<a href="{{ route('teacher.module.index') }}">
							<li class="header__loginItem">
								Ver módulos
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/module/checkFormModule.js') }}"></script>
@endsection