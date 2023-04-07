@extends('administrator.layout')


@section('title', 'Crea un nuevo profesor')
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
					Crear nuevo <strong class="color-Text">profesor</strong>
				</h2>
				<form class="form__content" 
						method="POST" 
						action="{{ route('admin.teacher.store') }}">

					@csrf @method('POST')
					<h2 class="form__icon">
						<i class="fa-solid fa-chalkboard-user"></i>
					</h2>
					<h2 class="form__title">Ingresar los datos</h2>
					<div class="form__item">
						<label for="name">Nombre:</label>
						<input class="form__input" 
								name="name" 
								required 
								type="text" 
								id="name" 
								placeholder="Vanessa"
								minlength="3"
								maxlength="20"
								autocomplete="off">
					</div>
					<div class="form__item">
						<label for="lastname">Apellido:</label>
						<input class="form__input" 
								name="lastname" 
								required 
								type="text" 
								id="lastname" 
								placeholder="Longa"
								minlength="3"
								maxlength="20"
								autocomplete="off">
					</div>
					<div class="form__item">
						<label for="identification_card">Cédula:</label>
						<input class="form__input" 
								name="identification_card" 
								required 
								type="text" 
								id="identification_card" 
								placeholder="20111333"
								minlength="6"
								maxlength="8"
								autocomplete="off">
					</div>
					<div class="form__item form__item--hidden">
						<label for="number_phone">Número de teléfono:</label>
						<input class="form__input" 
								name="number_phone" 
								required 
								type="text" 
								id="number_phone" 
								placeholder="04120001234"
								minlength="11"
								maxlength="11"
								autocomplete="off">
					</div>
					<div class="form__item form__item--hidden">
						<label for="email">Correo Eléctronico:</label>
						<input class="form__input" 
								name="email" 
								required 
								type="email" 
								id="email" 
								placeholder="vanessa@gmail.com"
								autocomplete="off">
					</div>
					<div class="form__item form__item--hidden">
						<label for="password">Contraseña:</label>
						<input class="form__input" 
								name="password" 
								required 
								type="password" 
								id="password" 
								placeholder="****"
								minlength="4"
								maxlength="20"
								autocomplete="off">
						<p class="form__eye"><i id="form_eye" class="fa-solid fa-eye"></i></p>
					</div>
					<div class="a">
						<div class="button-box">
							<div class="btn" id="btn"></div>
							<button class="toggle-btn toggle-btn--checked"
								type="button" 
								id="leftClick" >1ra Parte</button>
							<button class="toggle-btn"
								type="button" 
								id="rightClick">2da Parte</button>
						</div>
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
						Ver lista de <strong class="color-Text">profesores</strong>
					</h2>
					<ul class="header__bottons">
						<a href="{{ route('admin.teacher.index') }}">
							<li class="header__loginItem">
								Ver profesores
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/form/formEye.js') }}"></script>
	<script type="module" src="{{ asset('js/administrator/checkFormAdmin.js') }}"></script>
	<script type="module" src="{{ asset('js/login/switchSignup.js') }}"></script>
	<script type="module" src="{{ asset('js/login/checkFormSignup.js') }}"></script>
@endsection