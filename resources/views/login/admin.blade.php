@extends('login.layout')


@section('title', 'Administrador')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
@endsection


@section('content')
	<form class="form__content" 
		method="POST" 
		action="{{ route('login.auth') }}">
		
		@csrf
		<h2 class="form__icon">
			<i class="fa-solid fa-user-shield"></i>
		</h2>
		<h2 class="form__title">Administrador</h2>
		<div class="form__item form__item--small">
			<label for="email">Correo Eléctronico:</label>
			<input class="form__input" 
					name="email" 
					required 
					type="email" 
					id="email" 
					placeholder="yilver@gmail.com"
					autocomplete="off">
		</div>
		<div class="form__item form__item--small">
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
			<input type="hidden" id="role" name="role" value="admin">
		</div>
		<input class="form__send form_send--disabled" type="submit" value="Entrar">
	</form>
@endsection


@section('scripts')
	<script type="module" src="{{ asset('js/form/formEye.js') }}"></script>
	<script type="module" src="{{ asset('js/form/checkForm.js') }}"></script>
@endsection