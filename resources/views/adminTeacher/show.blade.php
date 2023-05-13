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
						src="{{ asset('img/administrator/teachers.png') }}" 
						alt="Dos jovenes divertidos">

				<div class="tab__information">
					<h2 class="tab__title">
						Datos del profesor: <strong class="color-Text">{{ $teacher->name }}</strong>
					</h2>
					<section class="content-data">
						<div class="data-view">
							<h3 class="data-view__title">Nombre:</h3>
							<p class="data-view__description">{{ $teacher->name }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Apellido:</h3>
							<p class="data-view__description">{{ $teacher->lastname }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Número de teléfono:</h3>
							<p class="data-view__description">{{ $teacher->number_phone }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Número de cédula:</h3>
							<p class="data-view__description">{{ $teacher->identification_card }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Correo electrónico:</h3>
							<p class="data-view__description">{{ $teacher->email }}</p>	
						</div>			            
					</section>
					<ul class="header__bottons">
						<a href="{{ route('admin.teacher.edit', $teacher) }}">
							<li class="header__loginItem header__loginItem--contrast">
								Editar profesor
							</li>
						</a>
						<a href="{{ route('admin.teacher.index') }}">
							<li class="header__loginItem">
								Ver lista de profesores
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