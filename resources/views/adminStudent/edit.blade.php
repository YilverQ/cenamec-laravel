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
					Editar el perfil de <strong class="color-Text">{{ $student->name }}</strong>
				</h2>
				<form class="form__content" 
						method="POST" 
						action="{{ route('admin.student.update', $student) }}">

					@csrf @method('PUT')
					<h2 class="form__icon">
						<i class="fa-solid fa-user-graduate"></i>
					</h2>
					<h2 class="form__title">Datos del estudiante</h2>
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
								type="password" 
								id="password" 
								placeholder="****"
								minlength="4"
								maxlength="20"
								autocomplete="off">
						<p class="form__eye"><i id="form_eye" class="fa-solid fa-eye"></i></p>
					</div>
					<div class="a">
						<div class="toggle-next">
							<button class="toggle-next__button"
								type="button" 
								id="next-btn">
								Siguiente
								<i class="fa-solid fa-arrow-right icon-btn-button"></i>
							</button>
							<button class="toggle-next__button toggle-next__button--hidden"
								type="button" 
								id="back-btn">
								<i class="fa-solid fa-arrow-left icon-btn-button"></i>
								Atrás
							</button>
						</div>
					</div>
					<input class="form__send hidden" 
						type="submit" 
						value="Editar">
				</form>
			</div>
		</article>

		<article class="article">
			<section class="tab">
				<img class="tab__img" 
					src="{{ asset('img/administrator/students.png') }}" 
					alt="Dos estudiantes divertidos">
				
				<div class="tab__information">
					<h2 class="tab__title">
						Ver lista de <strong class="color-Text">estudiantes</strong>
					</h2>
					<ul class="header__bottons">
						<a href="{{ route('admin.student.index') }}">
							<li class="header__loginItem">
								Ver estudiantes
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
	<script type="module" src="{{ asset('js/form/switchFormUser.js') }}"></script>
	<script type="module" src="{{ asset('js/administrator/checkFormTeachStudent.js') }}"></script>
@endsection