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

			@if (! isset($notes[0]))
				<div class="contanierMessage">
					<h2 class="tab__title--centered">
						&#x2b50; Este módulo no cuenta con 
						<strong class="color-Text">notas educativas</strong>,
					</h2>
					<h2 class="tab__title--centered">
						puedes continuar con la siguiente sección. &#x1f44d;
					</h2>
					<img src="{{ asset('img/school/fun.png') }}" alt="Imagen final" class="contanierMessage__img">
					<div class="messageFinal__buttons">
						<a href="{{ route('student.module.test', $module) }}" class="headerBackground__buttons">
							<p class="header__loginItem header__loginItem--contrast">
								Realizar Cuestionario
							</p>
						</a>
					</div>
				</div>
			@else
			<div class="notes">
				@foreach ($notes as $key => $item)
				@if ($key == 0)
				<div class="note">
					<img src="{{ $item->img }}" alt="Imagen de una nota" class="note__img">
					<h3 class="note__title">{{ $item->title }}</h3>
					<p class="note__description">{{ $item->description }}</p>
					@if ($item->youtube != null)
						<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $item->code_youtube }}?si=CcAFru3KL8m1oQ1j" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					@endif
				</div>
				@else
				<div class="note note--hidden">
					<img src="{{ $item->img }}" alt="Imagen de una nota" class="note__img">
					<h3 class="note__title">{{ $item->title }}</h3>
					<p class="note__description">{!! nl2br($item->description) !!}</p>
					@if ($item->youtube != null)
						<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $item->code_youtube }}?si=CcAFru3KL8m1oQ1j" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					@endif
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
			@endif
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/components/box-sequence.js') }}"></script>
@endsection