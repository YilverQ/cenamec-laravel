@extends('student.layout')


@section('title', 'Estudiando Módulo')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/school.css') }}">
@endsection



@section('content')
	<main class="container">
		<article class="article">
			<div class="box-sequence">
				@foreach ($notes as $key => $item)
					@if ($key != 0)
					<div class="sequence__line"></div>
					@endif
					@if ($key == 0)
					<div class="sequence__item-box"><p class="sequence__item sequence__item--selected">{{ $key + 1 }}</p></div>
					@else
					<div class="sequence__item-box"><p class="sequence__item">{{ $key + 1 }}</p></div>
					@endif
				@endforeach
			</div>

			<div class="notes">
				@foreach ($notes as $key => $item)
				@if ($key == 0)
				<div class="note">
					<img src="{{ $item->img }}" alt="Imagen de una nota" class="note__img">
					<h3 class="note__title">{{ $item->title }}</h3>
					<p class="note__description">{{ $item->description }}</p>
				</div>
				@else
				<div class="note note--hidden">
					<img src="{{ $item->img }}" alt="Imagen de una nota" class="note__img">
					<h3 class="note__title">{{ $item->title }}</h3>
					<p class="note__description">{{ $item->description }}</p>
				</div>
				@endif
				@endforeach
			</div>

			<div class="buttons-arrows">
				<div id="leftButton" class="buttons-arrows__arrow buttons-arrows__arrow--after buttonHidden">
					<i class="fa-solid fa-arrow-left icon-btn-button"></i>
					<p>Atrás</p>
				</div>	
				<div id="rightButton" class="buttons-arrows__arrow buttons-arrows__arrow--next">
					<p>Siguiente</p>
					<i class="fa-solid fa-arrow-right icon-btn-button"></i>
				</div>
				<a href="{{ route('student.module.test', $module) }}" id="buttonSuperHidden" class="buttons-arrows__arrow buttons-arrows__arrow--next buttonSuperHidden">
					<p>Realizar Cuestionario</p>
					<i class="fa-solid fa-arrow-right icon-btn-button"></i>
				</a>
			</div>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/components/box-sequence.js') }}"></script>
@endsection