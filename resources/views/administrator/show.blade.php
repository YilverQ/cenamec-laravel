@extends('administrator.layout')


@section('title', 'Gestiona a los Administradores')
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
						src="{{ asset('img/administrator/administrators.png') }}" 
						alt="Dos jovenes divertidos">

				<div class="tab__information">
					<h2 class="tab__title">
						Datos del administrador: <strong class="color-Text">{{ $admin->name }}</strong>
					</h2>
					<section class="content-data">
						<div class="data-view">
							<h3 class="data-view__title">Nombre:</h3>
							<p class="data-view__description">{{ $admin->name }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Apellido:</h3>
							<p class="data-view__description">{{ $admin->lastname }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Correo electrónico:</h3>
							<p class="data-view__description">{{ $admin->email }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Fecha de creación:</h3>
							<p class="data-view__description">{{ $admin->created_at }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Fecha de actualización:</h3>
							<p class="data-view__description">{{ $admin->updated_at }}</p>	
						</div>			            
					</section>
					<ul class="header__bottons">
						<a href="{{ route('administrator.edit', $admin) }}">
							<li class="header__loginItem header__loginItem--contrast">
								Editar administrador
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