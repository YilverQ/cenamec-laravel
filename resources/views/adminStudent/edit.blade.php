@extends('administrator.layout')


@section('title', 'Editar un estudiante')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
@endsection



@section('content')
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article" id="profile">
			<!--Information-->
			<div class="form">
				<h2 class="tab__title--centered">
					Perfil de <strong class="color-Text">{{ $student->name }}</strong>
				</h2>
				<form class="form__content" 
						method="POST" 
						action="{{ route('admin.student.update', $student) }}">

					@csrf @method('PUT')
					<h2 class="form__icon">
						<i class="fa-solid fa-user-graduate"></i>
					</h2>
					<h2 class="form__title">Ingresar los datos</h2>
					<div class="form__item">
						<label for="name">Nombre:</label>
						<input class="form__input" 
								name="name" 
								required 
								type="text" 
								id="name" 
								value="{{ $student->name }}"
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
								value="{{ $student->lastname }}"
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
								value="{{ $student->identification_card }}"
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
								value="{{ $student->number_phone }}"
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
								value="{{ $student->email }}"
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
						value="Editar">
				</form>
			</div>
		</article>

		<article class="article">
			<section class="tab">
				<img class="tab__img" 
					src="{{ asset('img/administrator/administrators.png') }}" 
					alt="Dos jovenes divertidos">
				
				<div class="tab__information">
					<h2 class="tab__title">
						Ver lista de <strong class="color-Text">estudiantes</strong>
					</h2>
					<ul class="header__bottons">
						<a href="{{ route('administrator.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un estudiante
							</li>
						</a>
						<a href="{{ route('administrator.index') }}">
							<li class="header__loginItem">
								Ver lista de estudiantes
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