@extends('administrator.layout')


@section('title', 'Datos de un profesor')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
@endsection



@section('content')
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/administrator/students.png') }}" 
						alt="Dos estudiantes divertidos">

				<div class="tab__information">
					<h2 class="tab__title">
						Datos del estudiante: <strong class="color-Text">{{ $student->name }}</strong>
					</h2>
					<section class="content-data">
						<div class="data-view">
							<h3 class="data-view__title">Nombre:</h3>
							<p class="data-view__description">{{ $student->name }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Apellido:</h3>
							<p class="data-view__description">{{ $student->lastname }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Número de teléfono:</h3>
							<p class="data-view__description">{{ $student->number_phone }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Número de cédula:</h3>
							<p class="data-view__description">{{ $student->identification_card }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Correo electrónico:</h3>
							<p class="data-view__description">{{ $student->email }}</p>	
						</div>		            
					</section>
					<ul class="header__bottons">
						<a href="{{ route('admin.student.edit', $student) }}">
							<li class="header__loginItem header__loginItem--contrast">
								Editar estudiante
							</li>
						</a>
						<a href="{{ route('admin.student.index') }}">
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
	<script type="module" src="{{ asset('js/administrator/checkFormAdmin.js') }}"></script>
@endsection