@extends('administrator.layout')


@section('title', 'Editar un administrador')
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
					Perfil de <strong class="color-Text">{{ $admin->name }}</strong>
				</h2>
				<form class="form__content" 
						method="POST" 
						action="{{ route('administrator.update', $admin) }}">

					@csrf @method('PUT')
					<h2 class="form__icon">
						<i class="fa-solid fa-user-shield"></i>
					</h2>
					<h2 class="form__title">Sus datos</h2>
					<div class="form__item">
						<label for="name">Nombre:</label>
						<input class="form__input" 
								name="name" 
								required 
								type="text" 
								id="name" 
								value="{{ $admin->name }}"
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
								value="{{ $admin->lastname }}"
								minlength="3"
								maxlength="20"
								autocomplete="off">
					</div>
					<div class="form__item">
						<label for="email">Correo Eléctronico:</label>
						<input class="form__input" 
								name="email" 
								required 
								type="email" 
								id="email" 
								value="{{ $admin->email }}"
								autocomplete="off">
					</div>
					<div class="form__item">
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
					<input class="form__send form_send--disabled" 
							type="submit" 
							value="Actualizar datos">
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
						Ver lista de <strong class="color-Text">administradores</strong>
					</h2>
					<ul class="header__bottons">
						<a href="{{ route('administrator.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un administrador
							</li>
						</a>
						<a href="{{ route('administrator.index') }}">
							<li class="header__loginItem">
								Ver administradores
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
@endsection