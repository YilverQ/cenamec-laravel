@extends('login.layout')


@section('title', 'Ingreso')
@section('styles')
	<link rel="stylesheet" type="text/css" href="./css/login/logout.css">
@endsection


@section('content')
	<form class="form__content">
		<h2 class="form__icon"><i class="fa-solid fa-graduation-cap"></i></h2>
		<h2 class="form__title">¡Bienvenido!</h2>
		<div class="form__item">
			<label for="email">Correo Eléctronico:</label>
			<input class="form__input" 
					name="email" 
					required 
					type="email" 
					id="email" 
					placeholder="yilver@gmail.com"
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
		<div class="a">
			<input type="hidden" id="role" name="role" value="student">
			<div class="button-box">
				<div class="btn" id="btn"></div>
				<input class="toggle-btn toggle-btn--checked"
					type="button" 
					id="leftClick" 
					name="role"
					value="Estudiante">
				<input class="toggle-btn"
					type="button" 
					id="rightClick"
					name="role"
					value="Profesor">
			</div>
		</div>
		<input class="form__send form_send--disabled" type="submit" value="Seguir aprendiendo">
	</form>
@endsection


@section('scripts')
	<script type="module" src="./js/login/formEye.js"></script>
	<script type="module" src="./js/login/switchField.js"></script>
	<script type="module" src="./js/login/checkForm.js"></script>
	<script type="module" src="./js/login/roleButtonSelect.js"></script>
@endsection